<?php
/** Copyright (c) 2023-2026 claudemods
 * claudemods website v4.0 28-09-2026
 * modern rebuild: shared stylesheet + scripts in /assets, same wording, same tabs, same music
 * photos now open full screen, music player button, CCM search, copy buttons in the guide
 *
 * claudemods website v3.01.2 25-07-2025
 * pwa support added but not working
 * new copyright notice
 *  new button animations and other animations thats all for today
 * oi you cheeky bugger *wink *wink feel free to gather ideas its what its for ha
 */

// Set headers to prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$page_title = "claudemods reloaded";
$guide_title = "Guide To Linux";
$author = "Aaron Douglas D'souza";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include __DIR__ . '/includes/head.php'; ?>

    <!-- PWA Meta Tags -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="ClaudeMods">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="apple-touch-icon" href="icons/icon-192x192.png">
    <link rel="manifest" href="/manifest.json">
</head>
<body data-pwa>

    <!-- ============================ MAIN PAGE ============================ -->
    <main class="shell">
        <div class="glow-card">
            <nav class="top-nav" aria-label="Main">
                <a class="btn btn-burgundy" href="claudemodsnews.php" target="_blank" rel="noopener">claudemods news</a>
                <a class="btn btn-gold" href="#gallery" data-open="gallery">Distributions</a>
                <a class="btn btn-gold" href="#guide" data-open="guide">Guide to Linux</a>
                <a class="btn btn-gold" href="#ccm" data-open="ccm">ClaudeModsCCM</a>
                <a class="btn btn-burgundy" href="https://ko-fi.com/claudemods" target="_blank" rel="noopener">Support My Work</a>
            </nav>

            <img src="https://i.postimg.cc/JhMRf2RZ/claudemods-03-17-2025.gif" alt="ClaudeMods" class="header-gif">

            <div class="badge-rows">
                <div class="badge-row">
                    <a href="https://www.gtainside.com/user/mapmods100" target="_blank" rel="noopener" class="badge badge-red" style="--i:0">Gta Mods</a>
                    <a href="https://www.linux.org" target="_blank" rel="noopener" class="badge badge-red" style="--i:1">OS Linux</a>
                </div>
                <div class="badge-row">
                    <a href="https://archlinux.org" target="_blank" rel="noopener" class="badge badge-teal" style="--i:2">DISTRO Arch</a>
                    <a href="https://cachyos.org/" target="_blank" rel="noopener" class="badge badge-cyan" style="--i:3">DISTRO CachyOS</a>
                </div>
                <div class="badge-row">
                    <a href="https://www.claudemodsreloaded.co.uk" target="_blank" rel="noopener" class="badge badge-gold" style="--i:4">claudemods website <?php echo $site_version; ?></a>
                    <a href="https://www.gtainside.com/user/mapmods100" target="_blank" rel="noopener" class="badge badge-gold" style="--i:5">gta inside v1.5</a>
                    <a href="https://drive.google.com/drive/folders/1MH0CHGvwdDzGSXpjgfBqvfty_asq6cqf" target="_blank" rel="noopener" class="badge badge-gold" style="--i:6">Google Drive v2.0</a>
                    <a href="https://sourceforge.net/projects/claudemods/" target="_blank" rel="noopener" class="badge badge-gold" style="--i:7">Sourceforge v2.0</a>
                    <a href="https://github.com/claudemods" target="_blank" rel="noopener" class="badge badge-gold" style="--i:8">Github v2.2</a>
                    <a href="https://www.pling.com/u/claudemods/" target="_blank" rel="noopener" class="badge badge-gold" style="--i:9">Pling v2.0</a>
                </div>
            </div>

            <section class="intro">
                <h1 class="welcome-text">Welcome to the official site for claudemods's mods</h1>
                <p class="description-text">
                    At claudemods, I am based in the UK, in Manchester.<br>
                    Providing You With Custom Linux Distributions, Linux Applications, Linux Scripts And Pc Game Mods.<br>
                    I've Been Making Scripts Since Late 2019! All Linux Applications And Linux Scripts Have Been Built Using <a href="https://www.deepseek.com" target="_blank" rel="noopener">https://www.deepseek.com</a> since July 2024<br>
                    All New Arch Iso's Are Created With My Own Iso Creator Tools
                </p>
            </section>

            <footer class="footer"><?php echo $copyright; ?></footer>
        </div>
    </main>

    <!-- ===================== DISTRIBUTIONS (slides in from left) ===================== -->
    <div class="overlay" id="gallery-overlay" data-anim="slide-left" data-music="gallery" hidden>
        <button type="button" class="overlay-close" data-close>&times; Close</button>
        <div class="panel" role="dialog" aria-modal="true" aria-label="Distributions">
            <div class="panel-badges">
                <a href="https://archlinux.org/" target="_blank" rel="noopener"><img src="https://img.shields.io/badge/OS-Arch-0000FF?style=for-the-badge&logo=linux" alt="OS Arch"></a>
                <a href="https://cachyos.org/" target="_blank" rel="noopener"><img src="https://img.shields.io/badge/DISTRO-CachyOS-00FFFF?style=for-the-badge&logo=CachyOS" alt="DISTRO CachyOS"></a>
            </div>
            <div class="deepseek">
                <a href="https://www.deepseek.com/" target="_blank" rel="noopener"><img src="https://i.postimg.cc/Hs2vbbZ8/Deep-Seek-Homepage.png?raw=true" alt="Homepage"></a>
            </div>

            <!--
                To add a distribution: copy one .gallery-pair block below.
                Title colour classes: cyan / burgundy / gold. --i sets the entrance order.
            -->
            <div class="gallery">
                <div class="gallery-pair" style="--i:0">
                    <h2 class="gallery-title cyan">Apex CKGE Full</h2>
                    <button type="button" class="shot"><img src="https://i.postimg.cc/fWJGVHgm/claudemodsapex.webp" alt="Apex CKGE Full 1" loading="lazy"><span class="zoom-hint" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></span></button>
                    <button type="button" class="shot"><img src="https://i.postimg.cc/d3S9GmH0/Apex-Desktop.png" alt="Apex CKGE Full 2" loading="lazy"><span class="zoom-hint" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></span></button>
                </div>

                <div class="gallery-pair" style="--i:1">
                    <h2 class="gallery-title burgundy">SpitFire CKGE Minimal</h2>
                    <button type="button" class="shot"><img src="https://i.postimg.cc/YqHFyPgw/claudemods.webp" alt="SpitFire CKGE 1" loading="lazy"><span class="zoom-hint" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></span></button>
                    <button type="button" class="shot"><img src="https://i.postimg.cc/d0gMqrmG/Spit-Fire-Desktio.png" alt="SpitFire CKGE 2" loading="lazy"><span class="zoom-hint" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></span></button>
                </div>

                <div class="gallery-pair" style="--i:2">
                    <h2 class="gallery-title cyan">SpitFire CKGBE Minimal</h2>
                    <button type="button" class="shot"><img src="https://i.postimg.cc/xTmRX7Dk/claudemodsckgbe2.webp" alt="SpitFire CKGBE Minimal 1" loading="lazy"><span class="zoom-hint" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></span></button>
                    <button type="button" class="shot"><img src="https://i.postimg.cc/5tz1TbZ4/Desktop-CKGBE.png" alt="SpitFire CKGBE Minimal 2" loading="lazy"><span class="zoom-hint" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></span></button>
                </div>

                <div class="gallery-pair" style="--i:3">
                    <h2 class="gallery-title gold">Apex Gamester</h2>
                    <button type="button" class="shot"><img src="https://i.postimg.cc/7Y7Zj108/apextools-high.webp" alt="Apex Gamester" loading="lazy"><span class="zoom-hint" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></span></button>
                </div>
            </div>

            <footer class="footer"><?php echo $copyright; ?></footer>
        </div>
    </div>

    <!-- ===================== CLAUDEMODSCCM (pops up from middle) ===================== -->
    <div class="overlay" id="ccm-overlay" data-anim="zoom" data-music="ccm" hidden>
        <button type="button" class="overlay-close" data-close>&times; Close</button>
        <div class="panel" role="dialog" aria-modal="true" aria-label="ClaudeModsCCM">
            <div class="panel-badges">
                <a href="https://archlinux.org/" target="_blank" rel="noopener"><img src="https://img.shields.io/badge/OS-Arch-0000FF?style=for-the-badge&logo=linux" alt="OS Arch"></a>
                <a href="https://cachyos.org/" target="_blank" rel="noopener"><img src="https://img.shields.io/badge/DISTRO-CachyOS-00FFFF?style=for-the-badge&logo=CachyOS" alt="DISTRO CachyOS"></a>
            </div>
            <div class="deepseek">
                <a href="https://www.deepseek.com/" target="_blank" rel="noopener"><img src="https://i.postimg.cc/Hs2vbbZ8/Deep-Seek-Homepage.png?raw=true" alt="Homepage"></a>
                <div>
                    <div class="first-line">ClaudeMods Custom Modifications</div>
                    <div class="second-line">Powered by DeepSeek AI since July 2024</div>
                </div>
            </div>

            <label class="panel-search">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg>
                <input type="search" id="ccm-search" placeholder="Search…" aria-label="Search tools" autocomplete="off">
            </label>
            <p class="empty-note" id="ccm-empty" hidden>No matches.</p>

            <div class="ccm-sections">
                <section class="ccm-section">
                    <h2>Incus System Containers</h2>
                    <div class="tool-group"><div class="tool-list">
                        <div class="tool-card"><h3><a href="https://drive.google.com/drive/folders/1-6eOluk8Zws0PhXDHFea_qMYayjwUopB" target="_blank" rel="noopener">Google Drive Resources</a></h3></div>
                    </div></div>
                </section>

                <section class="ccm-section">
                    <h2>Isos To Build From <span aria-hidden="true">📀</span></h2>
                    <div class="tool-group"><div class="tool-list">
                        <div class="tool-card"><h3><a href="https://drive.google.com/drive/folders/1rm-s7avP_G9NkhXK0tKkTh1a_UJ6YIYl" target="_blank" rel="noopener">Google Drive ISO Collection</a></h3></div>
                    </div></div>
                </section>

                <section class="ccm-section">
                    <h2>Claudemods Distributions <span aria-hidden="true">📀</span></h2>
                    <div class="tool-group"><div class="tool-list">
                        <div class="tool-card"><h3><a href="https://drive.google.com/drive/folders/1PsEbYVgRC8RP8SX7nfJle6CM4OjeK9HJ" target="_blank" rel="noopener">Custom Distributions</a></h3></div>
                    </div></div>
                </section>

                <section class="ccm-section">
                    <h2>Container Tools <span aria-hidden="true">📦</span></h2>
                    <div class="tool-group"><div class="tool-list">
                        <div class="tool-card"><h3><a href="https://github.com/claudemods/ACCU" target="_blank" rel="noopener">ACCU</a></h3><p>Advanced Container Creation Utility</p></div>
                    </div></div>
                </section>

                <section class="ccm-section">
                    <h2>ISO Creator Tools <span aria-hidden="true">📀</span></h2>
                    <div class="tool-group"><div class="tool-list">
                        <div class="tool-card"><h3><a href="https://github.com/claudemods/Arch-Incus-Iso-Creator-Script" target="_blank" rel="noopener">Arch Incus ISO Creator</a></h3><p>Script for creating Arch Linux ISOs</p></div>
                        <div class="tool-card"><h3><a href="https://github.com/claudemods/ApexArchIsoCreatorGuiAppImage" target="_blank" rel="noopener">Apex Arch ISO Creator (GUI)</a></h3><p>Graphical Arch ISO creator (AppImage)</p></div>
                        <div class="tool-card"><h3><a href="https://github.com/claudemods/ApexArchIsoCreatorScriptAppImage" target="_blank" rel="noopener">Apex Arch ISO Creator (Script)</a></h3><p>Script version of Arch ISO creator</p></div>
                        <div class="tool-card"><h3><a href="https://github.com/claudemods/claudemods-multi-iso-konsole-script" target="_blank" rel="noopener">Multi-ISO Konsole Script</a></h3><p>Create Debian/Ubuntu ISOs</p></div>
                    </div></div>
                </section>

                <section class="ccm-section">
                    <h2>Cloning Tools <span aria-hidden="true">💾</span></h2>
                    <div class="tool-group"><div class="tool-list">
                        <div class="tool-card"><h3><a href="https://github.com/claudemods/claudemods-chromeoscloner" target="_blank" rel="noopener">Chrome OS Cloner</a></h3></div>
                        <div class="tool-card"><h3><a href="https://github.com/claudemods/CS2A" target="_blank" rel="noopener">Clone Linux System To Archives</a></h3></div>
                        <div class="tool-card"><h3><a href="https://github.com/claudemods/plasma6cloner" target="_blank" rel="noopener">Plasma 6 Cloner</a></h3></div>
                        <div class="tool-card"><h3><a href="https://github.com/claudemods/btrfssystemcloner" target="_blank" rel="noopener">btrfssystemcloner</a></h3></div>
                    </div></div>
                </section>

                <section class="ccm-section">
                    <h2>Installers <span aria-hidden="true">🛠️</span></h2>
                    <div class="tool-group"><div class="tool-list">
                        <div class="tool-card"><h3><a href="https://github.com/claudemods/ApexArchInstallerAppImage" target="_blank" rel="noopener">Arch Installer (GUI, ext4)</a></h3></div>
                        <div class="tool-card"><h3><a href="https://github.com/claudemods/Apex-InstallerBtrfs" target="_blank" rel="noopener">Arch Installer (Script, Btrfs)</a></h3></div>
                        <div class="tool-card"><h3><a href="https://github.com/claudemods/claudemods-DebianInstaller" target="_blank" rel="noopener">Debian Installer (ext4)</a></h3></div>
                    </div></div>
                </section>

                <section class="ccm-section">
                    <h2>AppImages <span aria-hidden="true">🖥️</span></h2>

                    <div class="tool-group">
                        <h3>Browsers</h3>
                        <div class="tool-list">
                            <div class="tool-card"><h3><a href="https://github.com/claudemods/ApexBrowserAppImage" target="_blank" rel="noopener">Apex Browser</a></h3></div>
                            <div class="tool-card"><h3><a href="https://github.com/claudemods/CachyBrowserAppImage" target="_blank" rel="noopener">Cachy Browser</a></h3></div>
                            <div class="tool-card"><h3><a href="https://github.com/claudemods/FireFoxAppImage" target="_blank" rel="noopener">Firefox</a></h3></div>
                            <div class="tool-card"><h3><a href="https://github.com/claudemods/MicroSoftEdgeAppImage" target="_blank" rel="noopener">Microsoft Edge</a></h3></div>
                            <div class="tool-card"><h3><a href="https://github.com/claudemods/BraveBrowserAppImage" target="_blank" rel="noopener">Brave Browser</a></h3></div>
                            <div class="tool-card"><h3><a href="https://github.com/claudemods/ChromiumAppImage" target="_blank" rel="noopener">Chromium</a></h3></div>
                            <div class="tool-card"><h3><a href="https://github.com/claudemods/OperaAppImage" target="_blank" rel="noopener">Opera</a></h3></div>
                        </div>
                    </div>

                    <div class="tool-group">
                        <h3>Multimedia</h3>
                        <div class="tool-list">
                            <div class="tool-card"><h3><a href="https://github.com/claudemods/VlcAppImage" target="_blank" rel="noopener">VLC</a></h3></div>
                            <div class="tool-card"><h3><a href="https://www.pling.com/p/2259804" target="_blank" rel="noopener">Kdenlive</a></h3></div>
                            <div class="tool-card"><h3><a href="https://www.pling.com/p/2259392" target="_blank" rel="noopener">Shotcut</a></h3></div>
                            <div class="tool-card"><h3><a href="https://www.pling.com/p/2259793" target="_blank" rel="noopener">Krita</a></h3></div>
                            <div class="tool-card"><h3><a href="https://www.pling.com/p/2287241" target="_blank" rel="noopener">Netflix</a></h3></div>
                        </div>
                    </div>

                    <div class="tool-group">
                        <h3>Graphics</h3>
                        <div class="tool-list">
                            <div class="tool-card"><h3><a href="https://github.com/claudemods/GimpAppImage" target="_blank" rel="noopener">GIMP</a></h3></div>
                            <div class="tool-card"><h3><a href="https://github.com/claudemods/InkscapeAppImage" target="_blank" rel="noopener">Inkscape</a></h3></div>
                        </div>
                    </div>

                    <div class="tool-group">
                        <h3>AI Tools</h3>
                        <div class="tool-list">
                            <div class="tool-card"><h3><a href="https://github.com/claudemods/DeepSeekAppImage" target="_blank" rel="noopener">Deepseek</a></h3></div>
                            <div class="tool-card"><h3><a href="https://github.com/claudemods/QwenAiAppimage" target="_blank" rel="noopener">Qwen AI</a></h3></div>
                            <div class="tool-card"><h3><a href="https://github.com/claudemods/GeminiAppImage" target="_blank" rel="noopener">Gemini</a></h3></div>
                            <div class="tool-card"><h3><a href="https://github.com/claudemods/ChatGptAppImage" target="_blank" rel="noopener">ChatGPT</a></h3></div>
                        </div>
                    </div>

                    <div class="tool-group">
                        <h3>Utilities</h3>
                        <div class="tool-list">
                            <div class="tool-card"><h3><a href="https://github.com/claudemods/Custom-Bottle-For-Gamers" target="_blank" rel="noopener">Custom Bottle For Gamers</a></h3></div>
                            <div class="tool-card"><h3><a href="https://github.com/claudemods/YoutubeAndDownloader" target="_blank" rel="noopener">YouTube Downloader</a></h3></div>
                            <div class="tool-card"><h3><a href="https://www.pling.com/p/2259406" target="_blank" rel="noopener">qBittorrent</a></h3></div>
                            <div class="tool-card"><h3><a href="https://github.com/claudemods/AutoArchChrootQt6Appimage" target="_blank" rel="noopener">Arch Auto Chroot</a></h3></div>
                            <div class="tool-card"><h3><a href="https://github.com/claudemods/ArchMirrorChanger" target="_blank" rel="noopener">Arch Mirror Changer</a></h3></div>
                        </div>
                    </div>

                    <div class="tool-group">
                        <h3>Social</h3>
                        <div class="tool-list">
                            <div class="tool-card"><h3><a href="https://www.pling.com/p/2195889" target="_blank" rel="noopener">Facebook</a></h3></div>
                            <div class="tool-card"><h3><a href="https://www.pling.com/p/2195882" target="_blank" rel="noopener">Facebook Messenger</a></h3></div>
                            <div class="tool-card"><h3><a href="https://github.com/claudemods/DiscordAppImage" target="_blank" rel="noopener">Discord</a></h3></div>
                            <div class="tool-card"><h3><a href="https://www.pling.com/p/2195838" target="_blank" rel="noopener">WhatsApp</a></h3></div>
                        </div>
                    </div>
                </section>

                <section class="ccm-section">
                    <h2>KDE Tools <span aria-hidden="true">🖱️</span></h2>
                    <div class="tool-group"><div class="tool-list">
                        <div class="tool-card"><h3><a href="https://github.com/claudemods/11menu" target="_blank" rel="noopener">11menu</a></h3><p>Custom KDE menu</p></div>
                        <div class="tool-card"><h3><a href="https://github.com/claudemods/Dolphin-As-Root-Plasma-5-and-Plasma-6" target="_blank" rel="noopener">Dolphin as Root</a></h3><p>Root file manager integration</p></div>
                        <div class="tool-card"><h3><a href="https://www.pling.com/p/2195815" target="_blank" rel="noopener">KDE Store</a></h3></div>
                    </div></div>
                </section>

                <section class="ccm-section">
                    <h2>Wallpapers <span aria-hidden="true">🖼️</span></h2>
                    <div class="tool-group"><div class="tool-list">
                        <div class="tool-card"><h3><a href="https://www.pling.com/p/2284610/" target="_blank" rel="noopener">Rift</a></h3></div>
                        <div class="tool-card"><h3><a href="https://www.pling.com/p/2284618/" target="_blank" rel="noopener">Escape</a></h3></div>
                        <div class="tool-card"><h3><a href="https://www.pling.com/p/2284615/" target="_blank" rel="noopener">July</a></h3></div>
                        <div class="tool-card"><h3><a href="https://www.pling.com/p/2284611/" target="_blank" rel="noopener">Today</a></h3></div>
                        <div class="tool-card"><h3><a href="https://www.pling.com/p/2284612/" target="_blank" rel="noopener">Tomorrow</a></h3></div>
                        <div class="tool-card"><h3><a href="https://www.pling.com/p/2284613/" target="_blank" rel="noopener">Yesterday</a></h3></div>
                        <div class="tool-card"><h3><a href="https://www.pling.com/p/2284614/" target="_blank" rel="noopener">June</a></h3></div>
                        <div class="tool-card"><h3><a href="https://www.pling.com/p/2284616/" target="_blank" rel="noopener">Soon</a></h3></div>
                        <div class="tool-card"><h3><a href="https://www.pling.com/p/2284617/" target="_blank" rel="noopener">Wraft</a></h3></div>
                        <div class="tool-card"><h3><a href="https://www.pling.com/p/2284620/" target="_blank" rel="noopener">DayOne</a></h3></div>
                    </div></div>
                </section>
            </div>

            <footer class="footer"><?php echo $copyright; ?></footer>
        </div>
    </div>

    <!-- ===================== GUIDE TO LINUX (pops up from middle) ===================== -->
    <div class="overlay" id="guide-overlay" data-anim="zoom" data-music="guide" hidden>
        <button type="button" class="overlay-close" data-close>&times; Close</button>
        <div class="panel" role="dialog" aria-modal="true" aria-label="Guide to Linux">
            <div class="panel-badges">
                <a href="https://archlinux.org/" target="_blank" rel="noopener"><img src="https://img.shields.io/badge/OS-Arch-0000FF?style=for-the-badge&logo=linux" alt="OS Arch"></a>
                <a href="https://cachyos.org/" target="_blank" rel="noopener"><img src="https://img.shields.io/badge/DISTRO-CachyOS-00FFFF?style=for-the-badge&logo=CachyOS" alt="DISTRO CachyOS"></a>
            </div>
            <div class="deepseek">
                <a href="https://www.deepseek.com/" target="_blank" rel="noopener"><img src="https://i.postimg.cc/Hs2vbbZ8/Deep-Seek-Homepage.png?raw=true" alt="Homepage"></a>
            </div>

            <div class="guide">
                <div class="guide-profile">
                    <img src="https://i.postimg.cc/7LwstxCz/me.webp" alt="Profile Image">
                    <h2 class="guide-h1"><?php echo $guide_title; ?></h2>
                </div>

                <div class="guide-block guide-bio">
                    <p class="bio-name">History of Myself: <?php echo htmlspecialchars($author); ?></p>
                    <p>I am 29 years old, originally from London in the UK, though I now live in Manchester.</p>
                    <p>I hate the words "Noob" or "Newbie," but I was once a new Linux user. I started using Nobara around September 2023.<br>
                    From there, I began creating a custom taskbar, which can be seen in the project link below:<br>
                    Though the original color was burgundy and it was called "SpitFire."</p>
                    <p>Project Link: <a href="https://github.com/claudemods/ApexKLGE-Minimal" target="_blank" rel="noopener">ApexKLGE-Minimal</a></p>
                    <p>More photos of my old projects can be found here:<br>
                    <a href="https://www.claudemods.co.uk/distributions/theme-photos" target="_blank" rel="noopener">Theme Photos</a></p>
                    <p>I was originally an advanced Windows user who enjoyed testing betas and development builds.<br>
                    In fact, I tested Windows 8/8.1/10/11 before their official releases and was testing KDE Plasma 6 before it came out.</p>
                    <p>I have also tested games like "Skull and Bones" by Ubisoft before their release. I like to get involved.</p>
                    <p>Since I am a game mod creator, music creator, and now a software engineer,<br>
                    I have a lot of free time on my hands after putting my game mod updates on hold.</p>
                    <p>I've made tons of scripts and applications for Linux, and I wish to help others with what I've learned.</p>
                    <p>Below, you'll find many useful tutorials for Linux,<br>
                    including application building and complex Bash commands that everyday users might not know.</p>
                    <p>More to come I will update this soon!</p>
                </div>

                <div class="guide-block guide-center">
                    <h2 class="guide-h1">First, Watch This Video from Chris Titus Tech</h2>
                    <p>He shares many useful tips in this video:</p>
                    <p><a href="https://youtu.be/u0CIrKkBung?si=X7u6aIUhP7jTYLAA" target="_blank" rel="noopener">Chris Titus Tech's Video</a></p>
                    <p>Please support him if you can!</p>
                </div>

                <div class="guide-block">
                    <h2 class="guide-h1">System Commands For Updating</h2>
                    <div class="guide-note">Please remove the quotes "" from commands - they are hypothetical</div>

                    <h3 class="guide-h2">Arch Updating</h3>
                    <div class="step"><span class="step-label">Update Package List</span><code class="cmd">sudo pacman -Sy</code></div>
                    <div class="step"><span class="step-label">Update All Installed Packages</span><code class="cmd">sudo pacman -Syu</code></div>
                    <p class="step-plain">Reboot Your System before next steps</p>
                    <div class="step"><span class="step-label">Clean Old Packages</span><code class="cmd">sudo pacman -Scc</code></div>

                    <h3 class="guide-h2">Ubuntu/Debian Updating</h3>
                    <div class="step"><span class="step-label">Update Package List</span><code class="cmd">sudo apt update</code></div>
                    <div class="step"><span class="step-label">Update All Installed Packages</span><code class="cmd">sudo apt full-upgrade</code></div>
                    <p class="step-plain">Reboot Your System Before Next Steps</p>
                    <div class="step"><span class="step-label">Clean Old Packages</span><code class="cmd">sudo apt-get clean</code></div>
                    <div class="step"><span class="step-label">Auto Remove Unused Packages</span><code class="cmd">sudo apt autoremove</code></div>
                </div>

                <div class="guide-block">
                    <h2 class="guide-h1">Changing Passwords, Usernames, Home Folder, Adding to Group</h2>

                    <p class="guide-sub">To Change Your Password</p>
                    <div class="step"><code class="cmd">sudo passwd username</code></div>
                    <div class="step"><span class="step-label">Example:</span><code class="cmd">sudo passwd root</code></div>

                    <p class="guide-sub">Change Username and Home Folder</p>
                    <p>Log in to the root account.</p>
                    <p>Change Username:</p>
                    <div class="step"><code class="cmd">sudo usermod -l newusername oldusername</code></div>
                    <div class="step"><span class="step-label">Example:</span><code class="cmd">sudo usermod -l apex manowar</code></div>

                    <p>Change Home Folder:</p>
                    <div class="step"><code class="cmd">sudo usermod -d /home/yournewusername -m yournewusername</code></div>
                    <div class="step"><span class="step-label">Example:</span><code class="cmd">sudo usermod -d /home/apex -m apex</code></div>

                    <p class="guide-sub">Add User to Group:</p>
                    <div class="step"><code class="cmd">sudo usermod -aG groupname username</code></div>
                    <div class="step"><span class="step-label">Example:</span><code class="cmd">sudo usermod -aG arch apex</code></div>
                </div>

                <div class="guide-block">
                    <h2 class="guide-h1">Setup Wi-Fi in Konsole</h2>
                    <p class="guide-sub">To Get a Wi-Fi List:</p>
                    <div class="step"><code class="cmd">nmcli d wifi</code></div>
                    <p class="guide-sub">To Connect to Wi-Fi:</p>
                    <div class="step"><code class="cmd">nmcli d wifi connect BSSID password yourpassword</code></div>
                    <p>Example (fake credentials):</p>
                    <div class="step"><code class="cmd">nmcli d wifi connect 2E:FB:FA:B9:82:94 password tttodayjunior</code></div>
                </div>

                <div class="guide-block">
                    <h2 class="guide-h1">Complex Linux Commands, For Arch, Ubuntu, Debian</h2>
                    <p>Install your drivers for your PC</p>
                    <div class="step"><code class="cmd">sudo apt install ubuntu-drivers-common</code></div>
                    <div class="step"><code class="cmd">sudo ubuntu-drivers autoinstall</code></div>
                </div>

                <div class="guide-block">
                    <h2 class="guide-h1">Guide For Arch, Ubuntu, Debian To Compile C++ Applications</h2>

                    <h3 class="guide-h2">Arch Needed Packages To Compile Qt6 Applications</h3>
                    <div class="step"><code class="cmd">sudo pacman -S base-devel qt6-base qt6-tools</code></div>

                    <p class="guide-sub">Files Need To Compile C++</p>
                    <p>main.cpp main.pro</p>

                    <p class="guide-sub">Other Things That Can Be Used</p>
                    <p>.h files to add different functions within the project<br>
                    resources.qrc to embed other files</p>

                    <h3 class="guide-h2">Ubuntu/Debian Packages To Compile Qt6 Applications</h3>
                    <div class="step"><code class="cmd">sudo apt install build-essential qt6-base-dev</code></div>
                </div>

                <div class="guide-block guide-center">
                    <h2 class="guide-h1">Example Files For .cpp .pro And resources.qrc</h2>
                    <div class="link-stack">
                        <a href="https://github.com/claudemods/Guide-To-Linux/blob/main/example.cpp" target="_blank" rel="noopener">Example main.cpp</a>
                        <a href="https://github.com/claudemods/Guide-To-Linux/blob/main/example.h" target="_blank" rel="noopener">Example backend.h</a>
                        <a href="https://github.com/claudemods/Guide-To-Linux/blob/main/example.pro" target="_blank" rel="noopener">Example main.pro</a>
                        <a href="https://github.com/claudemods/Guide-To-Linux/blob/main/example.qrc" target="_blank" rel="noopener">Example resources.qrc</a>
                    </div>
                </div>

                <div class="guide-block">
                    <h2 class="guide-h1">Everyday Use Tools for Arch, Ubuntu, Debian</h2>

                    <p class="guide-sub">Edit Text in Konsole</p>
                    <p>Install nano from your repos:</p>
                    <div class="step"><code class="cmd">sudo pacman -S nano</code><span class="step-suffix">(Arch)</span></div>
                    <div class="step"><code class="cmd">sudo apt install nano</code><span class="step-suffix">(Ubuntu/Debian)</span></div>

                    <div class="tool-links">
                        <a class="tool-link" href="https://github.com/vinifmor/bauh" target="_blank" rel="noopener"><span class="tool-link-label">Custom Application Manager</span><span class="tool-link-name">bauh</span></a>
                        <a class="tool-link" href="https://github.com/DnsChanger/dnsChanger-desktop" target="_blank" rel="noopener"><span class="tool-link-label">Custom DNS Manager</span><span class="tool-link-name">dnsChanger-desktop</span></a>
                        <a class="tool-link" href="https://www.pling.com" target="_blank" rel="noopener"><span class="tool-link-label">Application Store Website</span><span class="tool-link-name">www.pling.com</span></a>
                        <a class="tool-link" href="https://apps.kde.org/en-gb/ksystemlog/" target="_blank" rel="noopener"><span class="tool-link-label">KSystemlog</span><span class="tool-link-name">KSystemlog</span></a>
                        <a class="tool-link" href="https://github.com/Genymobile/scrcpy" target="_blank" rel="noopener"><span class="tool-link-label">scrcpy</span><span class="tool-link-name">scrcpy</span></a>
                        <a class="tool-link" href="https://apps.kde.org/en-gb/spectacle/" target="_blank" rel="noopener"><span class="tool-link-label">spectacle</span><span class="tool-link-name">spectacle</span></a>
                        <a class="tool-link" href="https://apps.kde.org/en-gb/ark/" target="_blank" rel="noopener"><span class="tool-link-label">ark</span><span class="tool-link-name">ark</span></a>
                        <a class="tool-link" href="https://apps.kde.org/en-gb/dolphin/" target="_blank" rel="noopener"><span class="tool-link-label">file manager</span><span class="tool-link-name">dolphin</span></a>
                        <a class="tool-link" href="https://www.pling.com/p/2160116" target="_blank" rel="noopener"><span class="tool-link-label">dolphin service menus for arch</span><span class="tool-link-name">Dolphin Service Menus</span></a>
                        <a class="tool-link" href="https://github.com/claudemods/11menu" target="_blank" rel="noopener"><span class="tool-link-label">custom windows menu</span><span class="tool-link-name">11menu</span></a>
                        <a class="tool-link" href="https://github.com/claudemods/hideitems" target="_blank" rel="noopener"><span class="tool-link-label">hide files in dolphin</span><span class="tool-link-name">hideitems</span></a>
                        <a class="tool-link" href="https://github.com/claudemods/Dolphin-As-Root-Plasma-5-and-Plasma-6" target="_blank" rel="noopener"><span class="tool-link-label">open dolphin as root</span><span class="tool-link-name">Dolphin As Root</span></a>
                        <a class="tool-link" href="https://appimage.github.io/Stacer/" target="_blank" rel="noopener"><span class="tool-link-label">stacer</span><span class="tool-link-name">Stacer</span></a>
                        <a class="tool-link" href="https://www.pling.com/p/2261487" target="_blank" rel="noopener"><span class="tool-link-label">create arch isos with script</span><span class="tool-link-name">Arch ISO Script</span></a>
                        <a class="tool-link" href="https://flatpak.opendesktop.org/p/2262634" target="_blank" rel="noopener"><span class="tool-link-label">create arch isos with gui application</span><span class="tool-link-name">Arch ISO GUI</span></a>
                        <a class="tool-link" href="https://github.com/claudemods/ACCU" target="_blank" rel="noopener"><span class="tool-link-label">Create Docker Containers From Cloned Linux Systems</span><span class="tool-link-name">ACCU</span></a>
                        <a class="tool-link" href="https://github.com/claudemods/apex-htmlviewer" target="_blank" rel="noopener"><span class="tool-link-label">view and edit html</span><span class="tool-link-name">apex-htmlviewer</span></a>
                        <a class="tool-link" href="https://github.com/claudemods/ApexBrowserAppImage" target="_blank" rel="noopener"><span class="tool-link-label">custom decentralized browser</span><span class="tool-link-name">ApexBrowser</span></a>
                        <a class="tool-link" href="https://github.com/claudemods/Custom-Bottle-For-Gamers" target="_blank" rel="noopener"><span class="tool-link-label">setup bottles for games</span><span class="tool-link-name">Custom Bottle For Gamers</span></a>
                        <a class="tool-link" href="https://github.com/claudemods/ApexArchInstallerAppImage" target="_blank" rel="noopener"><span class="tool-link-label">custom arch installer gui</span><span class="tool-link-name">ApexArchInstaller</span></a>
                        <a class="tool-link" href="https://github.com/claudemods/Apex-InstallerBtrfs" target="_blank" rel="noopener"><span class="tool-link-label">custom arch btrfs installer script</span><span class="tool-link-name">Apex-InstallerBtrfs</span></a>
                        <a class="tool-link" href="https://github.com/claudemods/ApexBootableUsbAppimage" target="_blank" rel="noopener"><span class="tool-link-label">create arch bootable usb</span><span class="tool-link-name">ApexBootableUsb</span></a>
                    </div>
                </div>
            </div>

            <footer class="footer"><?php echo $copyright; ?></footer>
        </div>
    </div>

    <!-- Music for each tab (YouTube video IDs, audio only) -->
    <script>
        window.CM_MUSIC = {
            start: 'main',
            tracks: {
                main:    { id: 'MyhlgjOm5E8', label: 'Home' },
                gallery: { id: 'P5ZNMGPv7Qc', label: 'Distributions' },
                guide:   { id: 'TxgLIUJ_c48', label: 'Guide to Linux' },
                ccm:     { id: 'TSnc3lXrFpE', label: 'ClaudeModsCCM' }
            }
        };
    </script>
    <script src="<?php echo asset('assets/js/music.js'); ?>"></script>
    <script src="<?php echo asset('assets/js/site.js'); ?>"></script>
</body>
</html>
