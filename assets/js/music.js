/* Copyright (c) 2023-2026 claudemods
 * Background music — hidden YouTube players (audio only), one per track.
 *
 * Each page sets its tracks BEFORE loading this file:
 *   <script>
 *     window.CM_MUSIC = {
 *       start: 'main',
 *       tracks: {
 *         main:    { id: 'MyhlgjOm5E8', label: 'Home' },
 *         gallery: { id: 'P5ZNMGPv7Qc', label: 'Distributions' }
 *       }
 *     };
 *   </script>
 *
 * Other scripts switch track with CMMusic.play('gallery').
 * Each track keeps its place when paused, just like the old separate players.
 */
(function () {
    'use strict';

    var cfg = window.CM_MUSIC;
    if (!cfg || !cfg.tracks) return;

    var STORAGE_KEY = 'cm-music-muted';
    var PLAYING = 1, ENDED = 0;

    var players = {};      // key -> YT.Player
    var ready = {};        // key -> true once the player can take commands
    var current = cfg.start || Object.keys(cfg.tracks)[0];
    var apiLoaded = false;
    var unlocked = false;  // true after the visitor has clicked/tapped/pressed a key
    var blockedTimer = null;

    var muted = false;
    try { muted = localStorage.getItem(STORAGE_KEY) === '1'; } catch (e) { /* storage blocked */ }

    /* ---------- UI: the little "now playing" pill ---------- */
    var host = document.createElement('div');
    host.className = 'music-host';
    host.setAttribute('aria-hidden', 'true');

    var pill = document.createElement('div');
    pill.className = 'music-pill';
    pill.setAttribute('role', 'group');
    pill.setAttribute('aria-label', 'Background music');
    pill.innerHTML =
        '<span class="eq" aria-hidden="true"><i></i><i></i><i></i><i></i></span>' +
        '<span class="music-text"><span class="music-kicker">Now playing</span>' +
        '<span class="music-label" aria-live="polite"></span></span>' +
        '<button type="button" class="music-toggle">' +
        '<svg class="ico-on" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 5 6 9H2v6h4l5 4V5z"/><path d="M15.5 8.5a5 5 0 0 1 0 7"/><path d="M19 5a10 10 0 0 1 0 14"/></svg>' +
        '<svg class="ico-off" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 5 6 9H2v6h4l5 4V5z"/><path d="m23 9-6 6"/><path d="m17 9 6 6"/></svg>' +
        '</button>';

    var labelEl = pill.querySelector('.music-label');
    var toggleBtn = pill.querySelector('.music-toggle');

    function setBlocked(on) {
        pill.classList.toggle('is-blocked', on);
        updateUI();
    }

    function updateUI() {
        var track = cfg.tracks[current] || {};
        pill.classList.toggle('is-muted', muted);
        if (muted) {
            labelEl.textContent = 'Music off';
        } else if (pill.classList.contains('is-blocked')) {
            labelEl.textContent = 'Tap to play music';
        } else {
            labelEl.textContent = track.label || 'Music';
        }
        toggleBtn.setAttribute('aria-label', muted ? 'Turn music on' : 'Turn music off');
        toggleBtn.title = muted ? 'Turn music on' : 'Turn music off';
    }

    /* ---------- players ---------- */
    function ensurePlayer(key) {
        if (players[key] || !apiLoaded) return;
        var el = document.createElement('div');
        host.appendChild(el);
        players[key] = new YT.Player(el, {
            height: '1',
            width: '1',
            videoId: cfg.tracks[key].id,
            playerVars: {
                autoplay: 0, controls: 0, disablekb: 1, fs: 0, loop: 1,
                modestbranding: 1, playsinline: 1, rel: 0, iv_load_policy: 3, enablejsapi: 1
            },
            events: {
                onReady: function () {
                    ready[key] = true;
                    if (key === current) start(key);
                },
                onStateChange: function (e) { onState(key, e); }
            }
        });
    }

    function start(key) {
        var p = players[key];
        if (!p || !ready[key] || muted) { updateUI(); return; }

        if (unlocked) {
            p.unMute();
            p.playVideo();
        } else {
            // Browsers allow muted autoplay, so start muted then unmute (same trick as before).
            p.mute();
            p.playVideo();
            setTimeout(function () {
                if (current === key && !muted) p.unMute();
            }, 1000);
        }

        // If the browser still blocked sound, ask the visitor to tap.
        clearTimeout(blockedTimer);
        blockedTimer = setTimeout(function () {
            if (current !== key || muted || unlocked) return;
            var state = p.getPlayerState ? p.getPlayerState() : -1;
            var silent = p.isMuted ? p.isMuted() : false;
            if (state !== PLAYING || silent) setBlocked(true);
        }, 2500);
    }

    function pause(key) {
        var p = players[key];
        if (p && ready[key] && p.pauseVideo) p.pauseVideo();
    }

    function onState(key, e) {
        if (key !== current) {
            if (e.data === PLAYING) e.target.pauseVideo();
            return;
        }
        if (e.data === ENDED) e.target.playVideo();         // loop
        if (e.data === PLAYING && !(e.target.isMuted && e.target.isMuted())) setBlocked(false);
        pill.classList.toggle('is-playing', e.data === PLAYING);
    }

    /* ---------- public API ---------- */
    function play(key) {
        if (!cfg.tracks[key]) return;
        if (key !== current) {
            pause(current);
            current = key;
            pill.classList.remove('is-playing');
        }
        updateUI();
        ensurePlayer(key);
        start(key);
    }

    function setMuted(value) {
        muted = value;
        try { localStorage.setItem(STORAGE_KEY, muted ? '1' : '0'); } catch (e) { /* ignore */ }
        if (muted) {
            clearTimeout(blockedTimer);
            pill.classList.remove('is-blocked', 'is-playing');
            pause(current);
            updateUI();
        } else {
            unlocked = true;
            play(current);
        }
    }

    window.CMMusic = { play: play, setMuted: setMuted };

    /* ---------- interaction ---------- */
    pill.addEventListener('click', function () {
        if (pill.classList.contains('is-blocked')) {
            unlocked = true;
            setBlocked(false);
            start(current);
        } else {
            setMuted(!muted);
        }
    });

    // The first click/tap/keypress anywhere lets the browser play sound.
    function unlock(e) {
        if (pill.contains(e.target)) return;   // the pill handles its own clicks
        unlocked = true;
        ['pointerdown', 'keydown', 'touchstart'].forEach(function (t) {
            document.removeEventListener(t, unlock, true);
        });
        if (!muted) {
            var p = players[current];
            if (p && ready[current]) { p.unMute(); p.playVideo(); }
        }
    }
    ['pointerdown', 'keydown', 'touchstart'].forEach(function (t) {
        document.addEventListener(t, unlock, true);
    });

    /* ---------- boot ---------- */
    function init() {
        apiLoaded = true;
        play(current);
    }

    function mount() {
        document.body.appendChild(host);
        document.body.appendChild(pill);
        updateUI();

        if (window.YT && window.YT.Player) {
            init();
        } else {
            var previous = window.onYouTubeIframeAPIReady;
            window.onYouTubeIframeAPIReady = function () {
                if (typeof previous === 'function') previous();
                init();
            };
            var tag = document.createElement('script');
            tag.src = 'https://www.youtube.com/iframe_api';
            document.head.appendChild(tag);
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', mount);
    } else {
        mount();
    }
})();
