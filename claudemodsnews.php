<?php
# v1.02 11-06-2026
# ui updated - simplified to focus on current projects
# kept youtube background audio
# removed news categories, now showing current focus and distributions only
date_default_timezone_set('Europe/London');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>claudemods - Current Projects</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #0066cc;
            --secondary-color: #00ffff;
            --accent-color: #00ffff;
            --text-color: #00ffff;
            --dark-bg: rgba(0, 20, 40, 0.8);
            --card-bg: rgba(0, 40, 80, 0.5);
            --highlight: rgba(0, 255, 255, 0.2);
            --highlight-text: #00ffff;
            --spitfire-color: #ff4444;
            --apex-color: #9945FF;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--primary-color), #004080);
            color: var(--text-color);
            line-height: 1.6;
            min-height: 100vh;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s ease-out forwards;
        }
        
        @keyframes fadeInUp {
            to { opacity: 1; transform: translateY(0); }
        }
        
        header {
            text-align: center;
            padding: 20px 0;
            margin-bottom: 20px;
            animation-delay: 0.2s;
            background: var(--dark-bg);
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            border-bottom: 3px solid var(--secondary-color);
        }
        
        h1 {
            font-size: 2em;
            margin: 0 0 10px;
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
            color: var(--secondary-color);
        }
        
        .subtitle {
            font-size: 1em;
            opacity: 0.9;
        }
        
        .content-section {
            background: var(--card-bg);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            border-left: 3px solid var(--secondary-color);
            animation: fadeInUp 0.8s ease-out forwards;
        }
        
        .content-section:nth-child(2) { animation-delay: 0.3s; }
        .content-section:nth-child(3) { animation-delay: 0.5s; }
        .content-section:nth-child(4) { animation-delay: 0.7s; }
        .content-section:nth-child(5) { animation-delay: 0.9s; }
        
        .content-section:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
            background: rgba(0, 50, 100, 0.6);
            transition: all 0.3s ease;
        }
        
        .content-section h2 {
            color: var(--secondary-color);
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 1.3em;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .content-section h2 i {
            font-size: 1.1em;
        }
        
        .notice-box {
            background: rgba(0, 255, 255, 0.1);
            border: 1px solid rgba(0, 255, 255, 0.3);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            animation: fadeInUp 0.8s ease-out 0.1s forwards;
        }
        
        .notice-box p {
            margin-bottom: 8px;
        }
        
        .notice-box a {
            color: #ffffff;
            font-weight: bold;
        }
        
        .distro-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 12px;
            margin-top: 15px;
        }
        
        .distro-card {
            background: rgba(0, 30, 60, 0.7);
            border-radius: 6px;
            padding: 12px;
            border-left: 2px solid var(--secondary-color);
            transition: transform 0.2s ease;
        }
        
        .distro-card:hover {
            transform: translateX(5px);
            background: rgba(0, 50, 100, 0.7);
        }
        
        .distro-card.spitfire {
            border-left-color: var(--spitfire-color);
        }
        
        .distro-card.apex {
            border-left-color: var(--apex-color);
        }
        
        .series-header {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 1.1em;
            padding-bottom: 5px;
            border-bottom: 1px dashed rgba(0, 255, 255, 0.3);
        }
        
        .series-header.spitfire {
            color: var(--spitfire-color);
        }
        
        .series-header.apex {
            color: var(--apex-color);
        }
        
        .app-list {
            list-style: none;
            padding: 0;
        }
        
        .app-list li {
            padding: 10px;
            margin-bottom: 8px;
            background: rgba(0, 30, 60, 0.7);
            border-radius: 6px;
            border-left: 2px solid var(--secondary-color);
            transition: transform 0.2s ease;
        }
        
        .app-list li:hover {
            transform: translateX(5px);
            background: rgba(0, 50, 100, 0.7);
        }
        
        .app-list li.windows {
            border-left-color: #00a4ef;
        }
        
        .app-list li.linux {
            border-left-color: #fcc624;
        }
        
        .app-list a {
            color: var(--accent-color);
            text-decoration: none;
            font-size: 0.9em;
            word-break: break-all;
        }
        
        .app-list a:hover {
            color: white;
            text-decoration: underline;
        }
        
        .app-name {
            font-weight: bold;
            display: block;
            margin-bottom: 4px;
        }
        
        .app-version {
            font-size: 0.8em;
            opacity: 0.8;
        }
        
        .app-link {
            display: block;
            margin-top: 4px;
        }
        
        a {
            color: var(--accent-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        a:hover {
            color: white;
            text-decoration: underline;
        }
        
        footer {
            text-align: center;
            padding: 20px 0;
            margin-top: 30px;
            border-top: 2px solid var(--secondary-color);
            animation: fadeInUp 0.8s ease-out 0.4s forwards;
            background: var(--dark-bg);
            border-radius: 10px;
            font-size: 0.9em;
        }
        
        #youtube-player {
            position: absolute;
            width: 0;
            height: 0;
            overflow: hidden;
        }
        
        @media (max-width: 768px) {
            .distro-grid {
                grid-template-columns: 1fr;
            }
            
            .container {
                padding: 10px;
            }
            
            h1 {
                font-size: 1.5em;
            }
        }
    </style>
</head>
<body>
    <!-- Hidden YouTube Player (audio only) -->
    <div id="youtube-player"></div>

    <div class="container">
        <header>
            <h1><i class="fas fa-cog"></i> claudemods</h1>
            <p class="subtitle">Current Projects & Updates - <?= date('d-m-Y H:i:s') ?> (UK Time)</p>
        </header>
        
        <!-- Notice Section -->
        <div class="notice-box">
            <p><i class="fas fa-info-circle"></i> <strong>Important Notice:</strong></p>
            <p>A lot of things have been changed recently. Not many updates have been done to the website till now. All updates have changed. I am now focusing on a selected amount of things from time to time and perhaps new updates to other things on the odd occasion.</p>
            <p>Distributions can now only be built manually using this GitHub page if you're already on Arch: <a href="https://github.com/claudemods/claudemods-distribution-iso-creator-Beta" target="_blank"><i class="fab fa-github"></i> claudemods-distribution-iso-creator-Beta</a></p>
        </div>
        
        <!-- Distributions Section -->
        <div class="content-section">
            <h2><i class="fas fa-linux"></i> claudemods Distributions Currently Being Updated occasionally</h2>
            <p style="margin-bottom: 15px; font-size: 0.9em;"><i class="fas fa-random"></i> Random updates only</p>
            
            <div class="distro-grid">
                <!-- Spitfire Series -->
                <div class="distro-card spitfire">
                    <div class="series-header spitfire">🔥 Spitfire Series (Burgundy Theme + Black Theme)</div>
                    <div style="font-size: 0.9em; line-height: 1.8;">
                        ⚡ Spitfire CKGE Minimal - Lightweight edition<br>
                        🛠️ Spitfire CKGE Minimal Dev - Kde Dev included<br>
                        🎯 Spitfire CKGE Full - Extra applications for gamers e.g steam<br>
                        🔧 Spitfire CKGE Full Dev - Kde Dev included<br>
                        🚀 Spitfire CKGBE Full - Black Edition Of Spitfire<br>
                        📁 Spitfire CKGBE Full Dev - Kde Dev included
                    </div>
                </div>
                
                <!-- Apex Series -->
                <div class="distro-card apex">
                    <div class="series-header apex">🟣 Apex Series (Blue Theme)</div>
                    <div style="font-size: 0.9em; line-height: 1.8;">
                        ⚡ Apex CKGE Minimal - Lightweight edition<br>
                        🛠️ Apex CKGE Minimal Dev - Kde Dev included<br>
                        🎯 Apex CKGE Full - Extra applications for gamers e.g steam<br>
                        🔧 Apex CKGE Full Dev - Kde Dev included
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Windows Apps/Scripts Section -->
        <div class="content-section">
            <h2><i class="fab fa-windows"></i> Windows Apps/Scripts</h2>
            <p style="font-size: 0.85em; margin-bottom: 15px;"><i class="fas fa-exclamation-triangle"></i> a select few of other apps and scripts but may still be old</p>
            
            <ul class="app-list">
                <li class="windows">
                    <span class="app-name"><i class="fas fa-save"></i> claudemods claudebackup</span>
                    <span class="app-version">v1.01 - 05-06-2026</span>
                    <a href="https://github.com/claudemods/Windows/tree/main/claudebackup" target="_blank" class="app-link"><i class="fab fa-github"></i> github.com/claudemods/Windows/tree/main/claudebackup</a>
                </li>
                <li class="windows">
                    <span class="app-name"><i class="fas fa-shield-alt"></i> claudemods Defender Remover</span>
                    <span class="app-version">v1.0 - 14-05-2026</span>
                    <a href="https://github.com/claudemods/Windows/tree/main/DefenderRemover" target="_blank" class="app-link"><i class="fab fa-github"></i> github.com/claudemods/Windows/tree/main/DefenderRemover</a>
                </li>
                <li class="windows">
                    <span class="app-name"><i class="fas fa-ban"></i> claudemods update blocker</span>
                    <span class="app-version">v1.01 - 18-05-2026</span>
                    <a href="https://github.com/claudemods/Windows/tree/main/claudeupdateblocker" target="_blank" class="app-link"><i class="fab fa-github"></i> github.com/claudemods/Windows/tree/main/claudeupdateblocker</a>
                </li>
            </ul>
        </div>
        
        <!-- Linux Apps/Scripts Section -->
        <div class="content-section">
            <h2><i class="fab fa-linux"></i> Linux Apps/Scripts</h2>
            <p style="font-size: 0.85em; margin-bottom: 15px;"><i class="fas fa-exclamation-triangle"></i>a select few of other apps and scripts but may still be old</p>
            
            <ul class="app-list">
                <li class="linux">
                    <span class="app-name"><i class="fas fa-terminal"></i> claudemods multi iso console script</span>
                    <span class="app-version">v2.03.2</span>
                    <a href="https://github.com/claudemods/claudemods-multi-iso-konsole-script" target="_blank" class="app-link"><i class="fab fa-github"></i> github.com/claudemods/claudemods-multi-iso-konsole-script</a>
                </li>
                <li class="linux">
                    <span class="app-name"><i class="fas fa-sync-alt"></i> claudemods kde-systemtray-updater</span>
                    <span class="app-version">v1.03.2 - 19-01-2026</span>
                    <a href="https://github.com/claudemods/Kde-SystemTray-Updater" target="_blank" class="app-link"><i class="fab fa-github"></i> github.com/claudemods/Kde-SystemTray-Updater</a>
                </li>
                <li class="linux">
                    <span class="app-name"><i class="fas fa-music"></i> claudemods apex music</span>
                    <span class="app-version">v1.03.1-build - 29-01-2026</span>
                    <a href="https://github.com/claudemods/ApexMusic" target="_blank" class="app-link"><i class="fab fa-github"></i> github.com/claudemods/ApexMusic</a>
                </li>
                <li class="linux">
                    <span class="app-name"><i class="fas fa-th-large"></i> claudemods 11menu advanced</span>
                    <span class="app-version">v1.0 - 03-11-2025</span>
                    <a href="https://github.com/claudemods/11-menu-advanced" target="_blank" class="app-link"><i class="fab fa-github"></i> github.com/claudemods/11-menu-advanced</a>
                </li>
            </ul>
        </div>
        
        <footer>
            <p>&copy; <?= date('Y') ?> claudemods. All rights reserved.</p>
            <p>Last updated: <?= date('d-m-Y H:i:s') ?> (UK Time)</p>
        </footer>
    </div>
    
    <!-- YouTube API Script -->
    <script>
        // YouTube API Script
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        var player;

        function onYouTubeIframeAPIReady() {
            player = new YT.Player('youtube-player', {
                height: '0',
                width: '0',
                videoId: 'QbfEHgzNyN4',
                playerVars: {
                    'autoplay': 1,
                    'controls': 0,
                    'disablekb': 1,
                    'fs': 0,
                    'loop': 1,
                    'modestbranding': 1,
                    'playsinline': 1,
                    'rel': 0,
                    'showinfo': 0,
                    'iv_load_policy': 3,
                    'enablejsapi': 1
                },
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        function onPlayerReady(event) {
            // Mute initially to avoid autoplay restrictions
            event.target.mute();
            event.target.playVideo();
            
            // Unmute after a short delay
            setTimeout(function() {
                event.target.unMute();
            }, 1000);
        }

        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.ENDED) {
                event.target.playVideo();
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Add click effect to content sections
            document.querySelectorAll('.content-section').forEach(item => {
                item.addEventListener('click', function() {
                    this.style.transform = 'scale(0.98)';
                    setTimeout(() => { this.style.transform = '' }, 200);
                });
            });
            
            // Animate elements as they come into view
            const animateOnScroll = () => {
                const elements = document.querySelectorAll('.content-section, .distro-card, .app-list li');
                elements.forEach(el => {
                    const rect = el.getBoundingClientRect();
                    if (rect.top < window.innerHeight - 100) {
                        el.style.opacity = '1';
                        el.style.transform = 'translateY(0)';
                    }
                });
            };
            
            window.addEventListener('scroll', animateOnScroll);
            animateOnScroll(); // Run once on load
        });
    </script>
</body>
</html>