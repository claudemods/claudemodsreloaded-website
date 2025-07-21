<?php
/** Copyright (c) 2025 claudemods
 * claudemods website v3.0.1 19-07-2025
 * added pwa support
 * oi you cheeky bugger *wink *wink feel free to gather ideas its what its for ha 
 */

// Set headers to prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- PWA Meta Tags -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="ClaudeMods">
    <link rel="apple-touch-icon" href="icons/icon-192x192.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#00568f">
    
    <title><?php echo htmlspecialchars($page_title); ?></title>

$page_title = "ClaudeMods Reloaded";
$guide_title = "Guide To Linux";
$author = "Aaron Douglas D'souza";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <style>
        :root {
            --primary: #00568f;
            --secondary: #dfc43d;
            --accent: #800020;
            --text: #ffffff;
            --highlight: #00FFFF;
            --warning: #ff0000;
            --success: #00FF00;
            --badge-red: #e06c75;
            --badge-teal: #56b6c2;
            --badge-gold: #FFD700;
            --cyan-glow: 0 0 10px #00ffff, 0 0 20px #00ffff;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, var(--primary) 0%, #003366 100%);
            color: var(--text);
            margin: 0;
            padding: 2px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            line-height: 1.2;
            font-size: 14px; /* Increased from 12px */
            overflow: hidden;
            position: relative;
        }

        .container {
            width: 99%;
            max-width: 900px; /* Increased from 850px */
            background-color: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(8px);
            border-radius: 6px;
            padding: 10px; /* Increased from 6px */
            box-shadow: var(--cyan-glow), 
                        0 3px 10px rgba(0, 0, 0, 0.2);
            border: 3px solid var(--highlight);
            margin: 2px auto;
            transition: transform 0.3s ease;
        }

        .header-gif {
            max-width: 85%; /* Increased from 80% */
            height: auto;
            margin: 0 auto 8px; /* Increased from 4px */
            display: block;
            border-radius: 3px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .top-button-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 6px; /* Increased from 4px */
            margin-bottom: 10px; /* Increased from 6px */
        }

        .top-button {
            padding: 6px 12px; /* Increased from 3px 8px */
            border-radius: 3px;
            font-weight: 600;
            text-decoration: none;
            background-color: var(--secondary);
            color: var(--primary);
            transition: all 0.15s ease;
            font-size: 12px; /* Increased from 11px to match bottom buttons */
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            white-space: nowrap;
            height: 30px; /* Added fixed height to match bottom buttons */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .top-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
        }

        .badge-container {
            display: flex;
            flex-direction: column;
            gap: 6px; /* Increased from 4px */
            margin: 10px 0; /* Increased from 6px 0 */
        }

        .badge-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 6px; /* Increased from 4px */
        }

        .badge {
            padding: 5px 8px; /* Increased from 3px 6px */
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.15s ease;
            font-size: 11px; /* Increased from 9px */
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            white-space: nowrap;
            height: 30px; /* Added fixed height */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .badge-red { background-color: var(--badge-red); color: white; }
        .badge-teal { background-color: var(--badge-teal); color: white; }
        .badge-gold { background-color: var(--badge-gold); color: #000; }

        .content-section {
            margin: 10px 0; /* Increased from 6px 0 */
            text-align: center;
        }

        .welcome-text {
            color: var(--warning);
            font-size: 14px; /* Increased from 12px */
            font-weight: 700;
            margin: 6px 0; /* Increased from 4px 0 */
        }

        .description-text {
            color: var(--highlight);
            font-size: 13px; /* Increased from 11px */
            margin: 0 auto 10px; /* Increased from 0 auto 6px */
            line-height: 1.3;
        }

        .description-text a {
            color: var(--highlight);
            text-decoration: none;
            font-weight: 600;
            border-bottom: 1px dotted var(--highlight);
        }

        .repo-section, .copy-section {
            margin: 10px 0; /* Increased from 6px 0 */
            text-align: center;
        }

        .repo-buttons-container, .copy-buttons-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 6px; /* Increased from 4px */
        }

        .repo-button {
            background-color: var(--accent);
            color: white;
            border: none;
            padding: 6px 12px; /* Increased from 3px 8px */
            border-radius: 3px;
            cursor: pointer;
            font-weight: 600;
            font-size: 12px; /* Increased from 11px */
            transition: all 0.15s ease;
            height: 30px; /* Added fixed height */
        }

        .repo-button:hover {
            background-color: #9a0028;
            transform: translateY(-1px);
        }

        .repo-options {
            display: none;
            margin-top: 6px; /* Increased from 4px */
            background-color: rgba(0, 0, 0, 0.3);
            border-radius: 3px;
            padding: 6px; /* Increased from 4px */
            animation: fadeIn 0.15s ease-out;
        }

        .repo-option {
            display: block;
            padding: 5px 8px; /* Increased from 3px 6px */
            margin: 3px 0; /* Increased from 2px 0 */
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 2px;
            color: white;
            text-decoration: none;
            font-size: 11px; /* Increased from 10px */
        }

        .copy-notification {
            display: none;
            color: var(--success);
            margin-top: 5px; /* Increased from 3px */
            font-size: 11px; /* Increased from 10px */
            font-weight: 600;
            animation: fadeIn 0.15s ease-out;
        }

        /* Rest of the CSS remains unchanged */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Distribution Gallery Styles - Left Animation */
        .gallery-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            display: none;
            overflow-y: auto;
        }

        .gallery-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: var(--primary);
            color: white;
            position: relative;
            border: 3px solid var(--highlight);
            border-radius: 6px;
            box-shadow: var(--cyan-glow);
            transform: translateX(-100%);
            transition: transform 0.5s ease-out;
        }

        body.gallery-open .gallery-container {
            transform: translateX(0);
        }

        body.gallery-closing .gallery-container {
            transform: translateX(-100%);
        }

        /* CCM Overlay Styles - Middle Animation */
        .ccm-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            display: none;
            overflow-y: auto;
        }

        .ccm-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: var(--primary);
            color: white;
            position: relative;
            border: 3px solid var(--highlight);
            border-radius: 6px;
            box-shadow: var(--cyan-glow);
            transform: scale(0.5);
            opacity: 0;
            transition: all 0.5s ease-out;
        }

        body.ccm-open .ccm-container {
            transform: scale(1);
            opacity: 1;
        }

        body.ccm-closing .ccm-container {
            transform: scale(0.5);
            opacity: 0;
        }

        /* Guide to Linux Overlay Styles - Middle Animation */
        .guide-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            display: none;
            overflow-y: auto;
        }

        .guide-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: linear-gradient(135deg, var(--primary) 0%, #003366 100%);
            color: var(--highlight);
            position: relative;
            border: 3px solid var(--highlight);
            border-radius: 6px;
            box-shadow: var(--cyan-glow);
            transform: scale(0.5);
            opacity: 0;
            transition: all 0.5s ease-out;
        }

        body.guide-open .guide-container {
            transform: scale(1);
            opacity: 1;
        }

        body.guide-closing .guide-container {
            transform: scale(0.5);
            opacity: 0;
        }

        .close-gallery,
        .close-ccm,
        .close-guide {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: var(--badge-red);
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            font-weight: 600;
            z-index: 1001;
            box-shadow: 0 0 5px var(--highlight);
        }

        .close-gallery:hover,
        .close-ccm:hover,
        .close-guide:hover {
            background-color: #9a0028;
            box-shadow: 0 0 10px var(--highlight);
        }

        .gallery-badges {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
            animation: fadeIn 1s ease-in-out;
        }

        .gallery-image-pair {
            width: 48%;
            margin-bottom: 40px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.5s ease-in-out forwards;
        }

        @keyframes fadeInUp {
            to { opacity: 1; transform: translateY(0); }
        }

        .gallery-image-pair.left { animation-delay: 0.5s; }
        .gallery-image-pair.right { animation-delay: 1s; }

        .gallery-image-box {
            margin-bottom: 15px;
            background: rgba(0, 0, 0, 0.7);
            padding: 10px;
            border-radius: 5px;
            box-shadow: var(--cyan-glow);
            border: 2px solid var(--highlight);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .gallery-image-box:hover {
            transform: scale(1.03);
            box-shadow: 0 0 15px var(--highlight);
            z-index: 10;
        }

        .gallery-image-box img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 3px;
            transition: transform 0.5s ease;
            border: 1px solid var(--highlight);
        }

        .gallery-image-box:hover img {
            transform: scale(1.1);
        }

        .gallery-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 15px;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 1px;
            animation: fadeIn 1s ease-in-out;
        }

        .gallery-title.cyan {
            color: var(--highlight);
            text-shadow: var(--cyan-glow);
        }

        .gallery-title.burgundy {
            color: #800020;
            text-shadow: 0 0 3px var(--highlight);
        }

        .gallery-title.gold {
            color: #ffd700;
            text-shadow: 0 0 5px #ffd700;
        }

        .gallery-clear {
            clear: both;
        }

        .deepseek-container {
            text-align: center;
            margin: 20px 0;
            line-height: 3;
            animation: fadeIn 1s ease-in-out 0.2s forwards;
            opacity: 0;
        }
        
        /* Cyan text below DeepSeek logo */
        .deepseek-text {
            text-align: center;
            margin: 10px 0;
            color: var(--highlight);
        }
        
        .deepseek-text .first-line {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .deepseek-text .second-line {
            font-size: 14px;
        }

        /* CCM Content Styles */
        .ccm-section {
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            text-align: center;
            backdrop-filter: blur(8px);
            border: 1px solid var(--highlight);
        }

        /* Guide Content Styles */
        .guide-content {
            color: var(--highlight);
            padding: 20px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .guide-profile-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
            width: 100%;
        }

        .guide-profile-image {
            max-width: 200px;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 3px solid var(--highlight);
            box-shadow: var(--cyan-glow);
        }

        .guide-pre {
            background-color: rgba(0, 0, 0, 0.3);
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            white-space: pre-wrap;
            word-wrap: break-word;
            color: var(--highlight);
            margin: 15px 0;
            width: 100%;
        }

        .guide-h1, .guide-h2 {
            color: var(--text);
        }

        .guide-h1 {
            font-size: 1.8em;
            margin-top: 30px;
            border-bottom: 2px solid #4a6fa5;
            padding-bottom: 5px;
            text-align: center;
        }

        .guide-h2 {
            font-size: 1.5em;
            margin-top: 25px;
        }

        .guide-a {
            color: var(--highlight);
            text-decoration: none;
        }

        .guide-a:hover {
            text-decoration: underline;
        }

        .guide-command {
            background-color: #2d2d2d;
            color: #f8f8f2;
            padding: 2px 5px;
            border-radius: 3px;
            font-family: monospace;
        }

        .guide-note {
            background-color: rgba(255, 243, 212, 0.2);
            padding: 10px;
            border-left: 4px solid #f0ad4e;
            margin: 15px 0;
            color: var(--highlight);
        }

        .tool-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 15px;
        }

        .tool-card {
            background-color: rgba(0, 0, 0, 0.3);
            border-left: 4px solid var(--highlight);
            padding: 15px;
            border-radius: 4px;
            transition: transform 0.2s;
            text-align: left;
            color: var(--text);
            animation: fadeInUp 0.5s ease forwards;
            opacity: 0;
        }

        .tool-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--cyan-glow);
        }

        .tool-card h3 {
            margin-top: 0;
            color: var(--text);
        }

        .ccm-section a {
            color: var(--highlight);
            text-decoration: none;
        }

        .ccm-section a:hover {
            text-decoration: underline;
            text-shadow: var(--cyan-glow);
        }

        .ccm-emoji {
            font-size: 1.2em;
            margin-left: 0;
            display: inline;
        }

        /* Animation for tool cards */
        .tool-card:nth-child(1) { animation-delay: 0.1s; }
        .tool-card:nth-child(2) { animation-delay: 0.2s; }
        .tool-card:nth-child(3) { animation-delay: 0.3s; }
        .tool-card:nth-child(4) { animation-delay: 0.4s; }
        .tool-card:nth-child(5) { animation-delay: 0.5s; }
        .tool-card:nth-child(6) { animation-delay: 0.6s; }
        .tool-card:nth-child(7) { animation-delay: 0.7s; }
        .tool-card:nth-child(8) { animation-delay: 0.8s; }
        .tool-card:nth-child(9) { animation-delay: 0.9s; }
        .tool-card:nth-child(10) { animation-delay: 1s; }

        /* Back Button */
        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: var(--warning);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            box-shadow: 0 0 5px rgba(0,0,0,0.3);
            z-index: 100;
            text-decoration: none;
            display: none;
        }
        
        .back-button:hover {
            background-color: #cc0000;
            box-shadow: 0 0 10px rgba(255,0,0,0.5);
        }

        /* Support Me Button Styles - Updated to match top-button */
        .support-button {
            padding: 6px 12px;
            border-radius: 3px;
            font-weight: 600;
            text-decoration: none;
            background-color: var(--secondary);
            color: var(--primary);
            transition: all 0.15s ease;
            font-size: 12px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            white-space: nowrap;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
        }
        
        .support-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
        }

        @media (max-width: 768px) {
            .gallery-image-pair {
                width: 100%;
            }
            
            .gallery-image-pair.left, .gallery-image-pair.right {
                animation-delay: 0.5s !important;
            }
            
            .tool-list {
                grid-template-columns: 1fr;
            }
        }

        /* When gallery/ccm/guide is open, shift main content */
        body.gallery-open .container,
        body.ccm-open .container,
        body.guide-open .container {
            transform: translateX(30%);
            filter: blur(2px);
            opacity: 0.7;
            pointer-events: none;
        }

        /* Gallery/CCM/Guide content layout */
        .gallery-content,
        .ccm-content,
        .guide-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <!-- YouTube Video Containers (hidden, audio only) -->
    <div id="youtube-player-main" style="display:none;"></div>
    <div id="youtube-player-gallery" style="display:none;"></div>
    <div id="youtube-player-guide" style="display:none;"></div>
    <div id="youtube-player-ccm" style="display:none;"></div>
    
    <!-- Back Button (hidden by default) -->
    <button class="back-button" id="back-button">← Back</button>
    
    <div class="container">
        <div class="top-button-row">
            <a href="#" class="top-button" id="show-gallery">Distributions</a>
            <a href="#" class="top-button" id="show-guide">Guide to Linux</a>
            <a href="#" class="top-button" id="show-ccm">ClaudeModsCCM</a>
            <button class="support-button" onclick="window.open('https://ko-fi.com/claudemods', '_blank')">
                Support My Work
            </button>
        </div>
        
        <img src="https://i.postimg.cc/JhMRf2RZ/claudemods-03-17-2025.gif" alt="ClaudeMods" class="header-gif">
        
        <div class="badge-container">
            <div class="badge-row">
                <a href="https://www.gtainside.com/user/mapmods100" target="_blank" class="badge badge-red">Gta Mods</a>
                <a href="https://www.linux.org" target="_blank" class="badge badge-red">OS Linux</a>
            </div>
            
            <div class="badge-row">
                <a href="https://archlinux.org" target="_blank" class="badge badge-teal">DISTRO Arch</a>
                <a href="https://cachyos.org/" target="_blank" class="badge" style="background-color: var(--highlight); color: #000;">DISTRO CachyOS</a>
            </div>
            
            <div class="badge-row">
                <a href="https://www.claudemodsreloaded.com" target="_blank" class="badge badge-gold">claudemods website v3.0</a>
                <a href="https://www.gtainside.com/user/mapmods100" target="_blank" class="badge badge-gold">gta inside v1.5</a>
                <a href="https://drive.google.com/drive/folders/1MH0CHGvwdDzGSXpjgfBqvfty_asq6cqf" target="_blank" class="badge badge-gold">Google Drive v2.0</a>
                <a href="https://sourceforge.net/projects/claudemods/" target="_blank" class="badge badge-gold">Sourceforge v2.0</a>
                <a href="https://github.com/claudemods" target="_blank" class="badge badge-gold">Github v2.2</a>
                <a href="https://www.pling.com/u/claudemods/" target="_blank" class="badge badge-gold">Pling v2.0</a>
            </div>
        </div>
        
        <div class="content-section">
            <div class="welcome-text">Welcome to the official site for claudemods's mods</div>
            
            <div class="description-text">
                At claudemods, I am based in the UK, in Manchester.<br>
                Providing You With Custom Linux Distributions, Linux Applications, Linux Scripts And Pc Game Mods.<br>
                I've Been Making Scripts Since Late 2019! All Linux Applications And Linux Scripts Have Been Built Using <a href="https://www.deepseek.com" target="_blank">https://www.deepseek.com</a> since July 2024<br>
                All New Arch Iso's Are Created With My Own Iso Creator Tools
            </div>
        </div>
        
        <div class="repo-section">
            <div class="repo-buttons-container">
                <button class="repo-button" onclick="toggleRepo('v1')">V1 Repo</button>
                <button class="repo-button" onclick="toggleRepo('v2')">V2 Repo</button>
            </div>
            
            <div id="v1-repo-options" class="repo-options">
                <a href="https://www.claudemodsreloaded.com/v1-kernels-tested" target="_blank" class="repo-option">v1-kernels-tested</a>
                <a href="https://www.claudemodsreloaded.com/v1-base" target="_blank" class="repo-option">v1-base</a>
                <a href="https://www.claudemodsreloaded.com/v1-core" target="_blank" class="repo-option">v1-core</a>
            </div>
            
            <div id="v2-repo-options" class="repo-options">
                <a href="https://www.claudemodsreloaded.com/v2-kernels-rolling" target="_blank" class="repo-option">v2-kernels-rolling</a>
                <a href="https://www.claudemodsreloaded.com/v2-base" target="_blank" class="repo-option">v2-base</a>
                <a href="https://www.claudemodsreloaded.com/v2-core" target="_blank" class="repo-option">v2-core</a>
                <a href="https://www.claudemodsreloaded.com/v2-desktop" target="_blank" class="repo-option">v2-desktop</a>
            </div>
        </div>
        
        <div class="copy-section">
            <div class="copy-buttons-container">
                <button class="repo-button" onclick="copyRepoConfig('v1')">Copy V1 Repo Config</button>
                <button class="repo-button" onclick="copyRepoConfig('v2')">Copy V2 Repo Config</button>
            </div>
            <div id="copy-notification" class="copy-notification">
                Configuration copied to clipboard!
            </div>
        </div>
    </div>

    <!-- Distribution Gallery Overlay -->
    <div class="gallery-overlay" id="gallery-overlay">
        <button class="close-gallery" id="close-gallery">× Close</button>
        <div class="gallery-container">
            <!-- Badges at the top -->
            <div class="gallery-badges">
                <a href="https://archlinux.org/" target="_blank"><img src="https://img.shields.io/badge/OS-Arch-0000FF?style=for-the-badge&logo=linux" /></a>
                <a href="https://cachyos.org/" target="_blank"><img src="https://img.shields.io/badge/DISTRO-CachyOS-00FFFF?style=for-the-badge&logo=CachyOS" /></a>
            </div>

            <!-- DeepSeek logo below badges -->
            <div class="deepseek-container">
                <a href="https://www.deepseek.com/" target="_blank">
                    <img 
                        alt="Homepage" 
                        src="https://i.postimg.cc/Hs2vbbZ8/Deep-Seek-Homepage.png?raw=true" 
                        style="height: 30px; width: auto;" 
                    />
                </a>
            </div>

            <!-- Image Gallery Content -->
            <div class="gallery-content">
                <!-- First Row -->
                <div class="gallery-image-pair left">
                    <div class="gallery-title cyan">Apex CKGE Full</div>
                    <div class="gallery-image-box">
                        <img src="https://i.postimg.cc/fWJGVHgm/claudemodsapex.webp" alt="Apex CKGE Full 1">
                    </div>
                    <div class="gallery-image-box">
                        <img src="https://i.postimg.cc/d3S9GmH0/Apex-Desktop.png" alt="Apex CKGE Full 2">
                    </div>
                </div>
                
                <div class="gallery-image-pair right">
                    <div class="gallery-title burgundy">SpitFire CKGE Minimal</div>
                    <div class="gallery-image-box">
                        <img src="https://i.postimg.cc/YqHFyPgw/claudemods.webp" alt="SpitFire CKGE 1">
                    </div>
                    <div class="gallery-image-box">
                        <img src="https://i.postimg.cc/d0gMqrmG/Spit-Fire-Desktio.png" alt="SpitFire CKGE 2">
                    </div>
                </div>
                
                <div class="gallery-clear"></div>
                
                <!-- Second Row -->
                <div class="gallery-image-pair left">
                    <div class="gallery-title cyan">SpitFire CKGBE Minimal</div>
                    <div class="gallery-image-box">
                        <img src="https://i.postimg.cc/xTmRX7Dk/claudemodsckgbe2.webp" alt="SpitFire CKGBE Minimal 1">
                    </div>
                    <div class="gallery-image-box">
                        <img src="https://i.postimg.cc/5tz1TbZ4/Desktop-CKGBE.png" alt="SpitFire CKGBE Minimal 2">
                    </div>
                </div>
                
                <div class="gallery-image-pair right">
                    <div class="gallery-title gold">Apex Gamester</div>
                    <div class="gallery-image-box">
                        <img src="https://i.postimg.cc/7Y7Zj108/apextools-high.webp" alt="Apex Gamester">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CCM Overlay -->
    <div class="ccm-overlay" id="ccm-overlay">
        <button class="close-ccm" id="close-ccm">× Close</button>
        <div class="ccm-container">
            <!-- Badges at the top -->
            <div class="gallery-badges">
                <a href="https://archlinux.org/" target="_blank"><img src="https://img.shields.io/badge/OS-Arch-0000FF?style=for-the-badge&logo=linux" /></a>
                <a href="https://cachyos.org/" target="_blank"><img src="https://img.shields.io/badge/DISTRO-CachyOS-00FFFF?style=for-the-badge&logo=CachyOS" /></a>
            </div>

            <!-- DeepSeek logo below badges -->
            <div class="deepseek-container">
                <a href="https://www.deepseek.com/" target="_blank">
                    <img 
                        alt="Homepage" 
                        src="https://i.postimg.cc/Hs2vbbZ8/Deep-Seek-Homepage.png?raw=true" 
                        style="height: 30px; width: auto;" 
                    />
                </a>
                <!-- Cyan text below DeepSeek logo -->
                <div class="deepseek-text">
                    <div class="first-line">ClaudeMods Custom Modifications</div>
                    <div class="second-line">Powered by DeepSeek AI since July 2024</div>
                </div>
            </div>

            <!-- CCM Content -->
            <div class="ccm-content">
                <div class="ccm-section">
                    <h2>Incus System Containers<span class="ccm-emoji"></span></h2>
                    <div class="tool-list">
                        <div class="tool-card">
                            <h3><a href="https://drive.google.com/drive/folders/1-6eOluk8Zws0PhXDHFea_qMYayjwUopB" target="_blank">Google Drive Resources</a></h3>
                        </div>
                    </div>
                </div>
                
                <div class="ccm-section">
                    <h2>Isos To Build From<span class="ccm-emoji">📀</span></h2>
                    <div class="tool-list">
                        <div class="tool-card">
                            <h3><a href="https://drive.google.com/drive/folders/1rm-s7avP_G9NkhXK0tKkTh1a_UJ6YIYl" target="_blank">Google Drive ISO Collection</a></h3>
                        </div>
                    </div>
                </div>
                
                <div class="ccm-section">
                    <h2>Claudemods Distributions<span class="ccm-emoji">📀</span></h2>
                    <div class="tool-list">
                        <div class="tool-card">
                            <h3><a href="https://drive.google.com/drive/folders/1PsEbYVgRC8RP8SX7nfJle6CM4OjeK9HJ" target="_blank">Custom Distributions</a></h3>
                        </div>
                    </div>
                </div>
                
                <div class="ccm-section">
                    <h2>Container Tools<span class="ccm-emoji">📦</span></h2>
                    <div class="tool-list">
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/ACCU" target="_blank">ACCU</a></h3>
                            <p>Advanced Container Creation Utility</p>
                        </div>
                    </div>
                </div>
                
                <div class="ccm-section">
                    <h2>ISO Creator Tools<span class="ccm-emoji">📀</span></h2>
                    <div class="tool-list">
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/Arch-Incus-Iso-Creator-Script" target="_blank">Arch Incus ISO Creator</a></h3>
                            <p>Script for creating Arch Linux ISOs</p>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/ApexArchIsoCreatorGuiAppImage" target="_blank">Apex Arch ISO Creator (GUI)</a></h3>
                            <p>Graphical Arch ISO creator (AppImage)</p>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/ApexArchIsoCreatorScriptAppImage" target="_blank">Apex Arch ISO Creator (Script)</a></h3>
                            <p>Script version of Arch ISO creator</p>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/claudemods-multi-iso-konsole-script" target="_blank">Multi-ISO Konsole Script</a></h3>
                            <p>Create Debian/Ubuntu ISOs</p>
                        </div>
                    </div>
                </div>
                
                <div class="ccm-section">
                    <h2>Cloning Tools<span class="ccm-emoji">💾</span></h2>
                    <div class="tool-list">
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/claudemods-chromeoscloner" target="_blank">Chrome OS Cloner</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/CS2A" target="_blank">Clone Linux System To Archives</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/plasma6cloner" target="_blank">Plasma 6 Cloner</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/btrfssystemcloner" target="_blank">btrfssystemcloner</a></h3>
                        </div>
                    </div>
                </div>
                
                <div class="ccm-section">
                    <h2>Installers<span class="ccm-emoji">🛠️</span></h2>
                    <div class="tool-list">
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/ApexArchInstallerAppImage" target="_blank">Arch Installer (GUI, ext4)</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/Apex-InstallerBtrfs" target="_blank">Arch Installer (Script, Btrfs)</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/claudemods-DebianInstaller" target="_blank">Debian Installer (ext4)</a></h3>
                        </div>
                    </div>
                </div>
                
                <div class="ccm-section">
                    <h2>AppImages<span class="ccm-emoji">🖥️</span></h2>
                    <h3>Browsers</h3>
                    <div class="tool-list">
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/ApexBrowserAppImage" target="_blank">Apex Browser</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/CachyBrowserAppImage" target="_blank">Cachy Browser</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/FireFoxAppImage" target="_blank">Firefox</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/MicroSoftEdgeAppImage" target="_blank">Microsoft Edge</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/BraveBrowserAppImage" target="_blank">Brave Browser</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/ChromiumAppImage" target="_blank">Chromium</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/OperaAppImage" target="_blank">Opera</a></h3>
                        </div>
                    </div>
                    
                    <h3>Multimedia</h3>
                    <div class="tool-list">
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/VlcAppImage" target="_blank">VLC</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://www.pling.com/p/2259804" target="_blank">Kdenlive</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://www.pling.com/p/2259392" target="_blank">Shotcut</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://www.pling.com/p/2259793" target="_blank">Krita</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://www.pling.com/p/2287241" target="_blank">Netflix</a></h3>
                        </div>
                    </div>
                    
                    <h3>Graphics</h3>
                    <div class="tool-list">
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/GimpAppImage" target="_blank">GIMP</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/InkscapeAppImage" target="_blank">Inkscape</a></h3>
                        </div>
                    </div>
                    
                    <h3>AI Tools</h3>
                    <div class="tool-list">
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/DeepSeekAppImage" target="_blank">Deepseek</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/QwenAiAppimage" target="_blank">Qwen AI</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/GeminiAppImage" target="_blank">Gemini</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/ChatGptAppImage" target="_blank">ChatGPT</a></h3>
                        </div>
                    </div>
                    
                    <h3>Utilities</h3>
                    <div class="tool-list">
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/Custom-Bottle-For-Gamers" target="_blank">Custom Bottle For Gamers</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/YoutubeAndDownloader" target="_blank">YouTube Downloader</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://www.pling.com/p/2259406" target="_blank">qBittorrent</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/AutoArchChrootQt6Appimage" target="_blank">Arch Auto Chroot</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/ArchMirrorChanger" target="_blank">Arch Mirror Changer</a></h3>
                        </div>
                    </div>
                    
                    <h3>Social</h3>
                    <div class="tool-list">
                        <div class="tool-card">
                            <h3><a href="https://www.pling.com/p/2195889" target="_blank">Facebook</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://www.pling.com/p/2195882" target="_blank">Facebook Messenger</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/DiscordAppImage" target="_blank">Discord</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://www.pling.com/p/2195838" target="_blank">WhatsApp</a></h3>
                        </div>
                    </div>
                </div>
                
                <div class="ccm-section">
                    <h2>KDE Tools<span class="ccm-emoji">🖱️</span></h2>
                    <div class="tool-list">
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/11menu" target="_blank">11menu</a></h3>
                            <p>Custom KDE menu</p>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://github.com/claudemods/Dolphin-As-Root-Plasma-5-and-Plasma-6" target="_blank">Dolphin as Root</a></h3>
                            <p>Root file manager integration</p>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://www.pling.com/p/2195815" target="_blank">KDE Store</a></h3>
                        </div>
                    </div>
                </div>
                
                <div class="ccm-section">
                    <h2>Wallpapers<span class="ccm-emoji">🖼️</span></h2>
                    <div class="tool-list">
                        <div class="tool-card">
                            <h3><a href="https://www.pling.com/p/2284610/" target="_blank">Rift</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://www.pling.com/p/2284618/" target="_blank">Escape</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://www.pling.com/p/2284615/" target="_blank">July</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://www.pling.com/p/2284611/" target="_blank">Today</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://www.pling.com/p/2284612/" target="_blank">Tomorrow</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://www.pling.com/p/2284613/" target="_blank">Yesterday</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://www.pling.com/p/2284614/" target="_blank">June</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://www.pling.com/p/2284616/" target="_blank">Soon</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://www.pling.com/p/2284617/" target="_blank">Wraft</a></h3>
                        </div>
                        <div class="tool-card">
                            <h3><a href="https://www.pling.com/p/2284620/" target="_blank">DayOne</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Guide to Linux Overlay -->
    <div class="guide-overlay" id="guide-overlay">
        <button class="close-guide" id="close-guide">× Close</button>
        <div class="guide-container">
            <!-- Badges at the top -->
            <div class="gallery-badges">
                <a href="https://archlinux.org/" target="_blank"><img src="https://img.shields.io/badge/OS-Arch-0000FF?style=for-the-badge&logo=linux" /></a>
                <a href="https://cachyos.org/" target="_blank"><img src="https://img.shields.io/badge/DISTRO-CachyOS-00FFFF?style=for-the-badge&logo=CachyOS" /></a>
            </div>

            <!-- DeepSeek logo below badges -->
            <div class="deepseek-container">
                <a href="https://www.deepseek.com/" target="_blank">
                    <img 
                        alt="Homepage" 
                        src="https://i.postimg.cc/Hs2vbbZ8/Deep-Seek-Homepage.png?raw=true" 
                        style="height: 30px; width: auto;" 
                    />
                </a>
            </div>

            <!-- Guide Content -->
            <div class="guide-content">
                <div class="guide-profile-section">
                    <img src="https://i.postimg.cc/7LwstxCz/me.webp" alt="Profile Image" class="guide-profile-image">
                    <h1 class="guide-h1"><?php echo $guide_title; ?></h1>
                </div>

                <div class="guide-center">
                    <pre class="guide-pre">
History of Myself: <?php echo $author; ?>

I am 28 years old, originally from London in the UK, though I now live in Manchester.

I hate the words "Noob" or "Newbie," but I was once a new Linux user. I started using Nobara around September 2023.
From there, I began creating a custom taskbar, which can be seen in the project link below:
Though the original color was burgundy and it was called "SpitFire."

Project Link: <a href="https://github.com/claudemods/ApexKLGE-Minimal" class="guide-a">ApexKLGE-Minimal</a>

More photos of my old projects can be found here:
<a href="https://www.claudemods.co.uk/distributions/theme-photos" class="guide-a">Theme Photos</a>

I was originally an advanced Windows user who enjoyed testing betas and development builds.
In fact, I tested Windows 8/8.1/10/11 before their official releases and was testing KDE Plasma 6 before it came out.

I have also tested games like "Skull and Bones" by Ubisoft before their release. I like to get involved.

Since I am a game mod creator, music creator, and now a software engineer,
I have a lot of free time on my hands after putting my game mod updates on hold.

I've made tons of scripts and applications for Linux, and I wish to help others with what I've learned.

Below, you'll find many useful tutorials for Linux,
including application building and complex Bash commands that everyday users might not know.

More to come I will update this soon!
                    </pre>
                </div>

                <div class="guide-center">
                    <h1 class="guide-h1">First, Watch This Video from Chris Titus Tech</h1>
                    <p>He shares many useful tips in this video:</p>
                    <a href="https://youtu.be/u0CIrKkBung?si=X7u6aIUhP7jTYLAA" class="guide-a">Chris Titus Tech's Video</a>
                    <p>Please support him if you can!</p>
                </div>

                <div class="guide-center">
                    <pre class="guide-pre">
<h1 class="guide-h1">System Commands For Updating</h1>

<div class="guide-note">Please remove the quotes "" from commands - they are hypothetical</div>

<h2 class="guide-h2">Arch Updating</h2>

Update Package List
<span class="guide-command">sudo pacman -Sy</span>

Update All Installed Packages
<span class="guide-command">sudo pacman -Syu</span>

Reboot Your System before next steps

Clean Old Packages
<span class="guide-command">sudo pacman -Scc</span>


<h2 class="guide-h2">Ubuntu/Debian Updating</h2>

Update Package List
<span class="guide-command">sudo apt update</span>

Update All Installed Packages
<span class="guide-command">sudo apt full-upgrade</span>

Reboot Your System Before Next Steps

Clean Old Packages
<span class="guide-command">sudo apt-get clean</span>

Auto Remove Unused Packages
<span class="guide-command">sudo apt autoremove</span>
                    </pre>
                </div>

                <div class="guide-center">
                    <pre class="guide-pre">
<h1 class="guide-h1">Changing Passwords, Usernames, Home Folder, Adding to Group</h1>

To Change Your Password
<span class="guide-command">sudo passwd username</span>
Example: <span class="guide-command">sudo passwd root</span>

Change Username and Home Folder
Log in to the root account.
Change Username:
<span class="guide-command">sudo usermod -l newusername oldusername</span>
Example: <span class="guide-command">sudo usermod -l apex manowar</span>

Change Home Folder:
<span class="guide-command">sudo usermod -d /home/yournewusername -m yournewusername</span>
Example: <span class="guide-command">sudo usermod -d /home/apex -m apex</span>

Add User to Group:
<span class="guide-command">sudo usermod -aG groupname username</span>
Example: <span class="guide-command">sudo usermod -aG arch apex</span>
                    </pre>
                </div>

                <div class="guide-center">
                    <pre class="guide-pre">
<h1 class="guide-h1">Setup Wi-Fi in Konsole</h1>

To Get a Wi-Fi List:
<span class="guide-command">nmcli d wifi</span>

To Connect to Wi-Fi:
<span class="guide-command">nmcli d wifi connect BSSID password yourpassword</span>
Example (fake credentials):
<span class="guide-command">nmcli d wifi connect 2E:FB:FA:B9:82:94 password tttodayjunior</span>
                    </pre>
                </div>

                <div class="guide-center">
                    <pre class="guide-pre">
<h1 class="guide-h1">Complex Linux Commands, For Arch, Ubuntu, Debian</h1>
Install your drivers for your PC
<span class="guide-command">sudo apt install ubuntu-drivers-common</span>
<span class="guide-command">sudo ubuntu-drivers autoinstall</span>
                    </pre>
                </div>

                <div class="guide-center">
                    <pre class="guide-pre">
<h1 class="guide-h1">Guide For Arch, Ubuntu, Debian To Compile C++ Applications</h1>

<h2 class="guide-h2">Arch Needed Packages To Compile Qt6 Applications</h2>

<span class="guide-command">sudo -S base-devel qt6-base qt6-tools</span>

Files Need To Compile C++
main.cpp main.pro

Other Things That Can Be Used
.h files to add different functions within the project 
resources.qrc to embed other files

<h2 class="guide-h2">Ubuntu/Debian Packages To Compile Qt6 Applications</h2>

<span class="guide-command">sudo apt install build-essential qt6-base-dev</span>
                    </pre>
                </div>

                <div class="guide-center">
                    <h1 class="guide-h1">Example Files For .cpp .pro And resources.qrc</h1>
                    <a href="https://github.com/claudemods/Guide-To-Linux/blob/main/example.cpp" class="guide-a">Example main.cpp</a><br>
                    <a href="https://github.com/claudemods/Guide-To-Linux/blob/main/example.h" class="guide-a">Example backend.h</a><br>
                    <a href="https://github.com/claudemods/Guide-To-Linux/blob/main/example.pro" class="guide-a">Example main.pro</a><br>
                    <a href="https://github.com/claudemods/Guide-To-Linux/blob/main/example.qrc" class="guide-a">Example resources.qrc</a>
                </div>

                <div class="guide-center">
                    <pre class="guide-pre">
<h1 class="guide-h1">Everyday Use Tools for Arch, Ubuntu, Debian</h1>

Edit Text in Konsole
Install nano from your repos:
<span class="guide-command">sudo pacman -S nano</span> (Arch)
<span class="guide-command">sudo apt install nano</span> (Ubuntu/Debian)

Custom Application Manager
<a href="https://github.com/vinifmor/bauh" class="guide-a">bauh</a>

Custom DNS Manager
<a href="https://github.com/DnsChanger/dnsChanger-desktop" class="guide-a">dnsChanger-desktop</a>

Application Store Website
<a href="https://www.pling.com" class="guide-a">www.pling.com</a>

KSystemlog
<a href="https://apps.kde.org/en-gb/ksystemlog/" class="guide-a">KSystemlog</a>

scrcpy
<a href="https://github.com/Genymobile/scrcpy" class="guide-a">scrcpy</a>

spectacle
<a href="https://apps.kde.org/en-gb/spectacle/" class="guide-a">spectacle</a>

ark
<a href="https://apps.kde.org/en-gb/ark/" class="guide-a">ark</a>

file manager
<a href="https://apps.kde.org/en-gb/dolphin/" class="guide-a">dolphin</a>

dolphin service menus for arch
<a href="https://www.pling.com/p/2160116" class="guide-a">Dolphin Service Menus</a>

custom windows menu
<a href="https://github.com/claudemods/11menu" class="guide-a">11menu</a>

hide files in dolphin
<a href="https://github.com/claudemods/hideitems" class="guide-a">hideitems</a>

open dolphin as root 
<a href="https://github.com/claudemods/Dolphin-As-Root-Plasma-5-and-Plasma-6" class="guide-a">Dolphin As Root</a>

stacer 
<a href="https://appimage.github.io/Stacer/" class="guide-a">Stacer</a>

create arch isos with script
<a href="https://www.pling.com/p/2261487" class="guide-a">Arch ISO Script</a>

create arch isos with gui application
<a href="https://flatpak.opendesktop.org/p/2262634" class="guide-a">Arch ISO GUI</a>

Create Docker Containers From Cloned Linux Systems
<a href="https://github.com/claudemods/ACCU" class="guide-a">ACCU</a>

view and edit html
<a href="https://github.com/claudemods/apex-htmlviewer" class="guide-a">apex-htmlviewer</a>

custom decentralized browser
<a href="https://github.com/claudemods/ApexBrowserAppImage" class="guide-a">ApexBrowser</a>

setup bottles for games
<a href="https://github.com/claudemods/Custom-Bottle-For-Gamers" class="guide-a">Custom Bottle For Gamers</a>

custom arch installer gui
<a href="https://github.com/claudemods/ApexArchInstallerAppImage" class="guide-a">ApexArchInstaller</a>

custom arch btrfs installer script
<a href="https://github.com/claudemods/Apex-InstallerBtrfs" class="guide-a">Apex-InstallerBtrfs</a>

create arch bootable usb
<a href="https://github.com/claudemods/ApexBootableUsbAppimage" class="guide-a">ApexBootableUsb</a>
                    </pre>
                </div>
            </div>
        </div>
    </div>

    <!-- YouTube API Script -->
    <script>
        // YouTube API Script
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var mainPlayer, galleryPlayer, guidePlayer, ccmPlayer;

function onYouTubeIframeAPIReady() {
    // Main page player (audio only)
    mainPlayer = new YT.Player('youtube-player-main', {
        videoId: 'MyhlgjOm5E8',
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
            'onReady': onMainPlayerReady,
            'onStateChange': onMainPlayerStateChange
        }
    });

    // Gallery player (audio only)
    galleryPlayer = new YT.Player('youtube-player-gallery', {
        videoId: 'P5ZNMGPv7Qc',
        playerVars: {
            'autoplay': 0,
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
            'onReady': onGalleryPlayerReady,
            'onStateChange': onGalleryPlayerStateChange
        }
    });

    // Guide player (audio only)
    guidePlayer = new YT.Player('youtube-player-guide', {
        videoId: 'TxgLIUJ_c48',
        playerVars: {
            'autoplay': 0,
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
            'onReady': onGuidePlayerReady,
            'onStateChange': onGuidePlayerStateChange
        }
    });

    // CCM player (audio only) - Using your specified video ID
    ccmPlayer = new YT.Player('youtube-player-ccm', {
        videoId: 'TSnc3lXrFpE',
        playerVars: {
            'autoplay': 0,
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
            'onReady': onCcmPlayerReady,
            'onStateChange': onCcmPlayerStateChange
        }
    });
}

function onMainPlayerReady(event) {
    event.target.mute();
    event.target.playVideo();
    setTimeout(function() {
        event.target.unMute();
    }, 1000);
}

function onMainPlayerStateChange(event) {
    if (event.data == YT.PlayerState.ENDED) {
        if (!document.body.classList.contains('gallery-open') && 
            !document.body.classList.contains('ccm-open') && 
            !document.body.classList.contains('guide-open')) {
            event.target.playVideo();
        }
    }
}

function onGalleryPlayerReady(event) {
    // Gallery player will be started when gallery is opened
}

function onGalleryPlayerStateChange(event) {
    if (event.data == YT.PlayerState.ENDED) {
        if (document.body.classList.contains('gallery-open')) {
            event.target.playVideo();
        }
    }
}

function onGuidePlayerReady(event) {
    // Guide player will be started when guide is opened
}

function onGuidePlayerStateChange(event) {
    if (event.data == YT.PlayerState.ENDED) {
        if (document.body.classList.contains('guide-open')) {
            event.target.playVideo();
        }
    }
}

function onCcmPlayerReady(event) {
    // CCM player will be started when CCM is opened
}

function onCcmPlayerStateChange(event) {
    if (event.data == YT.PlayerState.ENDED) {
        if (document.body.classList.contains('ccm-open')) {
            event.target.playVideo();
        }
    }
}

function toggleRepo(version) {
    document.getElementById('v1-repo-options').style.display = 'none';
    document.getElementById('v2-repo-options').style.display = 'none';
    document.getElementById(version + '-repo-options').style.display = 'block';
}

function copyRepoConfig(version) {
    let configText = version === 'v1' ? 
        `[claudemods-v1-kernels-tested]
SigLevel = Never
Server = https://claudemodsreloaded.com/v1-kernels-tested

[claudemods-v1-core]
SigLevel = Never
Server = https://github.com/claudemods/claudemods-v1/releases/download/v1-core/

[claudemods-v1-base]
SigLevel = Never
Server = https://claudemodsreloaded.com/v1-base-final/` :
        `[claudemods-v2-kernels-rolling] 🚀
SigLevel = Never
Server = https://claudemodsreloaded.com/v2-kernels-rolling/  

[claudemods-v2-base] 🚀
SigLevel = Never
Server = https://claudemodsreloaded.com/v2-base/  

[claudemods-v2-core] 🚀
SigLevel = Never
Server = https://claudemodsreloaded.com/v2-core/  

[claudemods-v2-desktop] 🚀
SigLevel = Never
Server = https://claudemodsreloaded.com/v2-desktop/`;
    
    navigator.clipboard.writeText(configText).then(() => {
        const notification = document.getElementById('copy-notification');
        notification.style.display = 'block';
        setTimeout(() => notification.style.display = 'none', 2000);
    });
}

// PWA Service Worker Registration
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js')
            .then(registration => {
                console.log('ServiceWorker registration successful with scope: ', registration.scope);
                
                // Check for updates periodically
                setInterval(() => {
                    registration.update().then(() => {
                        console.log('Checking for service worker update');
                    });
                }, 60 * 60 * 1000); // Check every hour
            })
            .catch(err => {
                console.log('ServiceWorker registration failed: ', err);
            });
    });
}

// PWA Install Prompt Handling
let deferredPrompt;
const installButton = document.createElement('button');
installButton.textContent = 'Install ClaudeMods PWA';
installButton.className = 'top-button';
installButton.style.margin = '10px auto';
installButton.style.display = 'none'; // Hidden by default
installButton.onclick = () => {
    if (deferredPrompt) {
        deferredPrompt.prompt();
        deferredPrompt.userChoice.then((choiceResult) => {
            if (choiceResult.outcome === 'accepted') {
                console.log('User accepted the install prompt');
                // Hide the button after installation
                installButton.style.display = 'none';
            } else {
                console.log('User dismissed the install prompt');
            }
            deferredPrompt = null;
        });
    }
};

// Add the button to your top-button-row
const buttonRow = document.querySelector('.top-button-row');
if (buttonRow) {
    buttonRow.appendChild(installButton);
}

window.addEventListener('beforeinstallprompt', (e) => {
    // Prevent Chrome 67 and earlier from automatically showing the prompt
    e.preventDefault();
    // Stash the event so it can be triggered later
    deferredPrompt = e;
    
    // Show our install button
    installButton.style.display = 'block';
    
    // Optional: Log analytics event that PWA is available
    console.log('PWA install prompt available');
});

// Track app installed event
window.addEventListener('appinstalled', (evt) => {
    console.log('PWA was installed');
    // Hide the install button
    installButton.style.display = 'none';
    // Optional: Log analytics event that PWA was installed
});

document.addEventListener('DOMContentLoaded', function() {
    // Get all overlay and button elements
    const showGalleryBtn = document.getElementById('show-gallery');
    const closeGalleryBtn = document.getElementById('close-gallery');
    const galleryOverlay = document.getElementById('gallery-overlay');
    
    const showCcmBtn = document.getElementById('show-ccm');
    const closeCcmBtn = document.getElementById('close-ccm');
    const ccmOverlay = document.getElementById('ccm-overlay');
    
    const showGuideBtn = document.getElementById('show-guide');
    const closeGuideBtn = document.getElementById('close-guide');
    const guideOverlay = document.getElementById('guide-overlay');
    
    const backButton = document.getElementById('back-button');
    const body = document.body;
    
    // Show gallery (slides in from left)
    showGalleryBtn.addEventListener('click', function(e) {
        e.preventDefault();
        body.classList.add('gallery-open');
        galleryOverlay.style.display = 'block';
        document.documentElement.style.overflow = 'hidden';
        backButton.style.display = 'block';
        
        // Pause main video
        if (mainPlayer && typeof mainPlayer.pauseVideo === 'function') {
            mainPlayer.pauseVideo();
        }
        
        // Play gallery video (audio only)
        if (galleryPlayer && typeof galleryPlayer.playVideo === 'function') {
            galleryPlayer.mute();
            galleryPlayer.playVideo();
            setTimeout(function() {
                galleryPlayer.unMute();
            }, 1000);
        }
    });
    
    // Close gallery (slides out to left)
    closeGalleryBtn.addEventListener('click', function() {
        body.classList.add('gallery-closing');
        body.classList.remove('gallery-open');
        
        setTimeout(() => {
            galleryOverlay.style.display = 'none';
            document.documentElement.style.overflow = '';
            backButton.style.display = 'none';
            body.classList.remove('gallery-closing');
            
            // Play main video (audio only)
            if (mainPlayer && typeof mainPlayer.playVideo === 'function') {
                mainPlayer.mute();
                mainPlayer.playVideo();
                setTimeout(function() {
                    mainPlayer.unMute();
                }, 1000);
            }
            
            // Pause gallery video
            if (galleryPlayer && typeof galleryPlayer.pauseVideo === 'function') {
                galleryPlayer.pauseVideo();
            }
        }, 500); // Match this with your CSS transition duration
    });
    
    // Show CCM (pops up from middle)
    showCcmBtn.addEventListener('click', function(e) {
        e.preventDefault();
        body.classList.add('ccm-open');
        ccmOverlay.style.display = 'block';
        document.documentElement.style.overflow = 'hidden';
        backButton.style.display = 'block';
        
        // Pause main video
        if (mainPlayer && typeof mainPlayer.pauseVideo === 'function') {
            mainPlayer.pauseVideo();
        }
        
        // Play CCM video (audio only)
        if (ccmPlayer && typeof ccmPlayer.playVideo === 'function') {
            ccmPlayer.mute();
            ccmPlayer.playVideo();
            setTimeout(function() {
                ccmPlayer.unMute();
            }, 1000);
        }
    });
    
    // Close CCM (pops back to middle)
    closeCcmBtn.addEventListener('click', function() {
        body.classList.add('ccm-closing');
        body.classList.remove('ccm-open');
        
        setTimeout(() => {
            ccmOverlay.style.display = 'none';
            document.documentElement.style.overflow = '';
            backButton.style.display = 'none';
            body.classList.remove('ccm-closing');
            
            // Play main video (audio only)
            if (mainPlayer && typeof mainPlayer.playVideo === 'function') {
                mainPlayer.mute();
                mainPlayer.playVideo();
                setTimeout(function() {
                    mainPlayer.unMute();
                }, 1000);
            }
            
            // Pause CCM video
            if (ccmPlayer && typeof ccmPlayer.pauseVideo === 'function') {
                ccmPlayer.pauseVideo();
            }
        }, 500); // Match this with your CSS transition duration
    });
    
    // Show Guide (pops up from middle)
    showGuideBtn.addEventListener('click', function(e) {
        e.preventDefault();
        body.classList.add('guide-open');
        guideOverlay.style.display = 'block';
        document.documentElement.style.overflow = 'hidden';
        backButton.style.display = 'block';
        
        // Pause main video
        if (mainPlayer && typeof mainPlayer.pauseVideo === 'function') {
            mainPlayer.pauseVideo();
        }
        
        // Play guide video (audio only)
        if (guidePlayer && typeof guidePlayer.playVideo === 'function') {
            guidePlayer.mute();
            guidePlayer.playVideo();
            setTimeout(function() {
                guidePlayer.unMute();
            }, 1000);
        }
    });
    
    // Close Guide (pops back to middle)
    closeGuideBtn.addEventListener('click', function() {
        body.classList.add('guide-closing');
        body.classList.remove('guide-open');
        
        setTimeout(() => {
            guideOverlay.style.display = 'none';
            document.documentElement.style.overflow = '';
            backButton.style.display = 'none';
            body.classList.remove('guide-closing');
            
            // Play main video (audio only)
            if (mainPlayer && typeof mainPlayer.playVideo === 'function') {
                mainPlayer.mute();
                mainPlayer.playVideo();
                setTimeout(function() {
                    mainPlayer.unMute();
                }, 1000);
            }
            
            // Pause guide video
            if (guidePlayer && typeof guidePlayer.pauseVideo === 'function') {
                guidePlayer.pauseVideo();
            }
        }, 500); // Match this with your CSS transition duration
    });
    
    // Back button functionality
    backButton.addEventListener('click', function() {
        if (body.classList.contains('gallery-open')) {
            closeGalleryBtn.click();
        } else if (body.classList.contains('ccm-open')) {
            closeCcmBtn.click();
        } else if (body.classList.contains('guide-open')) {
            closeGuideBtn.click();
        }
    });
    
    // Close gallery when clicking outside content
    galleryOverlay.addEventListener('click', function(e) {
        if (e.target === galleryOverlay) {
            closeGalleryBtn.click();
        }
    });
    
    // Close CCM when clicking outside content
    ccmOverlay.addEventListener('click', function(e) {
        if (e.target === ccmOverlay) {
            closeCcmBtn.click();
        }
    });
    
    // Close Guide when clicking outside content
    guideOverlay.addEventListener('click', function(e) {
        if (e.target === guideOverlay) {
            closeGuideBtn.click();
        }
    });
    
    // Gallery image hover effects
    const imageBoxes = document.querySelectorAll('.gallery-image-box');
    
    imageBoxes.forEach((box, index) => {
        // Set a delay for each image box based on its position
        box.style.transitionDelay = `${index * 0.1}s`;
        
        // Add mouseenter event for sequential effect
        box.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
            this.querySelector('img').style.transform = 'scale(1.1)';
        });
        
        box.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.querySelector('img').style.transform = 'scale(1)';
        });
    });

    // Auto-enlarge images from left to right every 3 seconds
    let currentIndex = 0;
    function autoEnlarge() {
        // Reset all images
        imageBoxes.forEach(box => {
            box.style.transform = 'scale(1)';
            if (box.querySelector('img')) {
                box.querySelector('img').style.transform = 'scale(1)';
            }
        });

        // Enlarge current image
        if (imageBoxes[currentIndex]) {
            imageBoxes[currentIndex].style.transform = 'scale(1.05)';
            if (imageBoxes[currentIndex].querySelector('img')) {
                imageBoxes[currentIndex].querySelector('img').style.transform = 'scale(1.1)';
            }
        }

        // Move to next image
        currentIndex = (currentIndex + 1) % imageBoxes.length;
        
        // Repeat every 3 seconds
        setTimeout(autoEnlarge, 3000);
    }

    // Start the auto-enlarge effect after initial animations complete
    setTimeout(autoEnlarge, 5000);
    
    // Check if the app is running as a PWA
    if (window.matchMedia('(display-mode: standalone)').matches) {
        console.log('Running as PWA');
        // You can add PWA-specific behavior here
        installButton.style.display = 'none'; // Hide install button if already installed
    }
});
    </script>
</body>
</html>
