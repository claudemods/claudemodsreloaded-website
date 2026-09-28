/* Copyright (c) 2023-2026 claudemods
 * Site scripts: overlays (Distributions / Guide / CCM), photo gallery + viewer,
 * copy buttons, CCM search, scroll reveal and PWA install.
 * Every feature checks its elements exist first, so this one file works on every page.
 */
(function () {
    'use strict';

    var body = document.body;
    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var ANIM_MS = reduceMotion ? 0 : 500;   // matches the CSS transition time

    function $(sel, root) { return (root || document).querySelector(sel); }
    function $$(sel, root) { return Array.prototype.slice.call((root || document).querySelectorAll(sel)); }
    function music(key) { if (window.CMMusic) window.CMMusic.play(key); }

    /* ============================================================
       Copy buttons
       - <code class="cmd">...</code> gets a Copy button automatically
       - <button data-copy-target="id"> copies the text of #id
       ============================================================ */
    function copyText(text) {
        if (navigator.clipboard && window.isSecureContext) {
            return navigator.clipboard.writeText(text);
        }
        return new Promise(function (resolve, reject) {
            var ta = document.createElement('textarea');
            ta.value = text;
            ta.setAttribute('readonly', '');
            ta.style.position = 'fixed';
            ta.style.opacity = '0';
            document.body.appendChild(ta);
            ta.select();
            try { document.execCommand('copy') ? resolve() : reject(); } catch (e) { reject(e); }
            document.body.removeChild(ta);
        });
    }

    function flash(btn, ok) {
        if (!btn.dataset.label) btn.dataset.label = btn.textContent;
        btn.textContent = ok ? 'Copied!' : 'Failed';
        btn.classList.add(ok ? 'is-copied' : 'is-failed');
        clearTimeout(btn._t);
        btn._t = setTimeout(function () {
            btn.textContent = btn.dataset.label;
            btn.classList.remove('is-copied', 'is-failed');
        }, 2000);
    }

    $$('code.cmd').forEach(function (code) {
        var wrap = document.createElement('span');
        wrap.className = 'cmd-wrap';
        code.parentNode.insertBefore(wrap, code);
        wrap.appendChild(code);

        var btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'copy-btn';
        btn.textContent = 'Copy';
        btn.setAttribute('aria-label', 'Copy command');
        btn.addEventListener('click', function () {
            copyText(code.textContent.trim()).then(
                function () { flash(btn, true); },
                function () { flash(btn, false); }
            );
        });
        wrap.appendChild(btn);
    });

    $$('[data-copy-target]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var target = document.getElementById(btn.getAttribute('data-copy-target'));
            if (!target) return;
            copyText(target.textContent.trim()).then(
                function () { flash(btn, true); },
                function () { flash(btn, false); alert('Failed to copy text to clipboard. Please copy manually.'); }
            );
        });
    });

    /* ============================================================
       Overlays
       Buttons with data-open="gallery" open #gallery-overlay.
       Each overlay has data-music="trackKey" and data-anim="slide-left|zoom".
       ============================================================ */
    var activeOverlay = null;
    var lastTrigger = null;

    function openOverlay(name, fromHash) {
        var ov = document.getElementById(name + '-overlay');
        if (!ov || activeOverlay) return;

        activeOverlay = ov;
        lastTrigger = document.activeElement;
        clearTimeout(ov._hideTimer);
        ov.hidden = false;
        ov.scrollTop = 0;
        void ov.offsetWidth;                // force layout so the entrance animation plays
        ov.classList.add('is-open');
        body.classList.add('overlay-open');

        music(ov.getAttribute('data-music'));
        if (!fromHash && history.replaceState) history.replaceState(null, '', '#' + name);

        var closeBtn = $('[data-close]', ov);
        if (closeBtn) closeBtn.focus({ preventScroll: true });
        ov.dispatchEvent(new CustomEvent('overlay:open'));
    }

    function closeOverlay() {
        var ov = activeOverlay;
        if (!ov) return;
        activeOverlay = null;

        ov.classList.remove('is-open');
        body.classList.remove('overlay-open');
        ov.dispatchEvent(new CustomEvent('overlay:close'));
        ov._hideTimer = setTimeout(function () { ov.hidden = true; }, ANIM_MS);

        music('main');
        if (history.replaceState) history.replaceState(null, '', location.pathname + location.search);
        if (lastTrigger && lastTrigger.focus) lastTrigger.focus({ preventScroll: true });
    }

    document.addEventListener('click', function (e) {
        var opener = e.target.closest('[data-open]');
        if (opener) {
            e.preventDefault();
            openOverlay(opener.getAttribute('data-open'));
            return;
        }
        if (e.target.closest('[data-close]')) {
            closeOverlay();
            return;
        }
        // click on the dark area around a panel closes it
        if (activeOverlay && e.target === activeOverlay) closeOverlay();
    });

    // Open straight from a link, e.g. index.php#gallery / #guide / #ccm
    function openFromHash() {
        var name = location.hash.replace('#', '');
        if (name && document.getElementById(name + '-overlay')) openOverlay(name, true);
    }
    openFromHash();
    window.addEventListener('hashchange', function () {
        if (!location.hash) closeOverlay(); else openFromHash();
    });

    /* ============================================================
       Distributions gallery
       - hover to zoom (CSS)
       - auto-enlarge each photo left→right every 3 seconds
       - click a photo to open it full screen
       ============================================================ */
    var shots = $$('.shot');
    var galleryOverlay = $('#gallery-overlay');

    shots.forEach(function (shot) {
        var pair = shot.closest('.gallery-pair');
        var title = pair ? $('.gallery-title', pair) : null;
        shot.dataset.caption = title ? title.textContent.trim() : '';
    });

    var featureTimer = null;
    var featureIndex = 0;

    function autoEnlarge() {
        shots.forEach(function (s) { s.classList.remove('is-featured'); });
        if (shots[featureIndex]) shots[featureIndex].classList.add('is-featured');
        featureIndex = (featureIndex + 1) % shots.length;
        featureTimer = setTimeout(autoEnlarge, 3000);
    }

    if (galleryOverlay && shots.length && !reduceMotion) {
        galleryOverlay.addEventListener('overlay:open', function () {
            featureIndex = 0;
            featureTimer = setTimeout(autoEnlarge, 2500);   // after the entrance animation
        });
        galleryOverlay.addEventListener('overlay:close', function () {
            clearTimeout(featureTimer);
            shots.forEach(function (s) { s.classList.remove('is-featured'); });
        });
    }

    /* ---------- full screen photo viewer ---------- */
    var lightbox = null, lbImg, lbCap, lbIndex = 0, touchX = null;

    function buildLightbox() {
        lightbox = document.createElement('div');
        lightbox.className = 'lightbox';
        lightbox.hidden = true;
        lightbox.setAttribute('role', 'dialog');
        lightbox.setAttribute('aria-modal', 'true');
        lightbox.setAttribute('aria-label', 'Photo viewer');
        lightbox.innerHTML =
            '<button type="button" class="lb-btn lb-close" aria-label="Close">&times;</button>' +
            '<button type="button" class="lb-btn lb-prev" aria-label="Previous photo">&#8249;</button>' +
            '<figure><img alt=""><figcaption></figcaption></figure>' +
            '<button type="button" class="lb-btn lb-next" aria-label="Next photo">&#8250;</button>';
        document.body.appendChild(lightbox);

        lbImg = $('img', lightbox);
        lbCap = $('figcaption', lightbox);

        $('.lb-close', lightbox).addEventListener('click', closeLightbox);
        $('.lb-prev', lightbox).addEventListener('click', function () { stepLightbox(-1); });
        $('.lb-next', lightbox).addEventListener('click', function () { stepLightbox(1); });
        lightbox.addEventListener('click', function (e) {
            if (e.target === lightbox || e.target.tagName === 'FIGURE') closeLightbox();
        });
        lightbox.addEventListener('touchstart', function (e) { touchX = e.touches[0].clientX; }, { passive: true });
        lightbox.addEventListener('touchend', function (e) {
            if (touchX === null) return;
            var dx = e.changedTouches[0].clientX - touchX;
            if (Math.abs(dx) > 50) stepLightbox(dx < 0 ? 1 : -1);
            touchX = null;
        });
    }

    function showLightbox(i) {
        lbIndex = (i + shots.length) % shots.length;
        var shot = shots[lbIndex];
        var img = $('img', shot);
        lbImg.src = img.currentSrc || img.src;
        lbImg.alt = img.alt;
        lbCap.innerHTML = '';
        lbCap.appendChild(document.createTextNode(shot.dataset.caption));
        var small = document.createElement('small');
        small.textContent = (lbIndex + 1) + ' / ' + shots.length;
        lbCap.appendChild(small);
    }

    function openLightbox(i) {
        if (!lightbox) buildLightbox();
        showLightbox(i);
        clearTimeout(lightbox._hideTimer);
        lightbox.hidden = false;
        void lightbox.offsetWidth;
        lightbox.classList.add('is-open');
        $('.lb-close', lightbox).focus({ preventScroll: true });
    }

    function closeLightbox() {
        if (!lightboxOpen()) return;
        lightbox.classList.remove('is-open');
        clearTimeout(lightbox._hideTimer);
        lightbox._hideTimer = setTimeout(function () { lightbox.hidden = true; }, reduceMotion ? 0 : 300);
        if (shots[lbIndex]) shots[lbIndex].focus({ preventScroll: true });
    }

    function stepLightbox(dir) { showLightbox(lbIndex + dir); }

    function lightboxOpen() { return !!lightbox && lightbox.classList.contains('is-open'); }

    shots.forEach(function (shot, i) {
        shot.addEventListener('click', function () { openLightbox(i); });
    });

    /* ---------- keyboard ---------- */
    document.addEventListener('keydown', function (e) {
        var lbOpen = lightboxOpen();
        if (e.key === 'Escape') {
            if (lbOpen) closeLightbox(); else closeOverlay();
        } else if (lbOpen && e.key === 'ArrowRight') {
            stepLightbox(1);
        } else if (lbOpen && e.key === 'ArrowLeft') {
            stepLightbox(-1);
        }
    });

    /* ============================================================
       CCM search
       ============================================================ */
    var search = $('#ccm-search');
    if (search) {
        var emptyNote = $('#ccm-empty');
        search.addEventListener('input', function () {
            var q = search.value.trim().toLowerCase();
            var anyVisible = false;

            $$('#ccm-overlay .ccm-section').forEach(function (section) {
                var heading = $('h2', section);
                var sectionMatch = q && heading && heading.textContent.toLowerCase().indexOf(q) !== -1;
                var sectionVisible = false;

                $$('.tool-group', section).forEach(function (group) {
                    var gh = $('h3', group);
                    var groupMatch = sectionMatch || (q && gh && gh.textContent.toLowerCase().indexOf(q) !== -1);
                    var groupVisible = false;

                    $$('.tool-card', group).forEach(function (card) {
                        var show = !q || groupMatch || card.textContent.toLowerCase().indexOf(q) !== -1;
                        card.hidden = !show;
                        if (show) groupVisible = true;
                    });
                    if (gh) group.hidden = !groupVisible;
                    if (groupVisible) sectionVisible = true;
                });

                section.hidden = !sectionVisible;
                if (sectionVisible) anyVisible = true;
            });

            if (emptyNote) emptyNote.hidden = anyVisible;
        });
    }

    /* ============================================================
       Reveal on scroll (news page etc.)
       ============================================================ */
    var reveals = $$('.reveal');
    if (reveals.length) {
        if ('IntersectionObserver' in window && !reduceMotion) {
            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    // also reveal anything already scrolled past (e.g. page reloaded half way down)
                    if (entry.isIntersecting || entry.boundingClientRect.top < 0) {
                        entry.target.classList.add('is-visible');
                        io.unobserve(entry.target);
                    }
                });
            }, { rootMargin: '0px 0px -60px 0px' });
            reveals.forEach(function (el) { io.observe(el); });
        } else {
            reveals.forEach(function (el) { el.classList.add('is-visible'); });
        }
    }

    /* ============================================================
       PWA (home page only: <body data-pwa>)
       ============================================================ */
    if (body.hasAttribute('data-pwa')) {
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function () {
                navigator.serviceWorker.register('/sw.js').then(function (registration) {
                    setInterval(function () { registration.update(); }, 60 * 60 * 1000); // check every hour
                }).catch(function (err) {
                    console.log('ServiceWorker registration failed: ', err);
                });
            });
        }

        var deferredPrompt = null;
        var installButton = document.createElement('button');
        installButton.type = 'button';
        installButton.className = 'btn btn-gold';
        installButton.textContent = 'Install ClaudeMods PWA';
        installButton.hidden = true;
        installButton.addEventListener('click', function () {
            if (!deferredPrompt) return;
            deferredPrompt.prompt();
            deferredPrompt.userChoice.then(function (choice) {
                if (choice.outcome === 'accepted') installButton.hidden = true;
                deferredPrompt = null;
            });
        });

        var nav = $('.top-nav');
        if (nav) nav.appendChild(installButton);

        window.addEventListener('beforeinstallprompt', function (e) {
            e.preventDefault();
            deferredPrompt = e;
            installButton.hidden = false;
        });
        window.addEventListener('appinstalled', function () { installButton.hidden = true; });
        if (window.matchMedia('(display-mode: standalone)').matches) installButton.hidden = true;
    }
})();
