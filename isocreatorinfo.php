<?php
# v1.0 added youtube sound
$title = "Multi-ISO Creator Script Beta";
$description = "for Arch, Ubuntu, and Debian systems";
$arch_title = "Advanced C++ Arch Img Iso Script Beta";
$arch_description = "for Arch systems only";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary-blue: #0066cc;
            --primary-cyan: #00ffff;
            --dark-bg: #001a33;
        }
        body {
            background-color: var(--primary-blue);
            color: var(--primary-cyan);
            font-family: 'Courier New', monospace;
        }
        .header-gif {
            max-width: 600px;
            border-radius: 10px;
            border: 2px solid var(--primary-cyan);
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.5);
        }
        .badge-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin: 20px 0;
        }
        .feature-card {
            background-color: rgba(0, 26, 51, 0.8);
            border-left: 4px solid var(--primary-cyan);
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 255, 255, 0.2);
        }
        .terminal {
            background-color: var(--dark-bg);
            color: var(--primary-cyan);
            padding: 15px;
            border-radius: 5px;
            font-family: monospace;
            border: 1px solid var(--primary-cyan);
        }
        .blink {
            animation: blink 1s infinite;
        }
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }
        .section-title {
            border-bottom: 2px solid var(--primary-cyan);
            padding-bottom: 10px;
            margin-top: 30px;
        }
        .donate-btn {
            background: linear-gradient(45deg, #ff6b6b, #ffa3a3);
            border: none;
            font-weight: bold;
            margin: 10px;
        }
        /* Hidden YouTube player */
        #youtube-player {
            position: absolute;
            width: 0;
            height: 0;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <!-- Hidden YouTube Player (audio only) -->
    <div id="youtube-player"></div>

    <div class="container py-4">
        <!-- Animated Header -->
        <div class="text-center mb-4 animate__animated animate__fadeIn">
            <img src="https://i.postimg.cc/JhMRf2RZ/claudemods-03-17-2025.gif" class="header-gif" alt="Claudemods Logo">
            <h1 class="mt-3"><?php echo $title; ?> <span class="badge bg-info">v2.0</span></h1>
            <p class="lead"><?php echo $description; ?></p>
        </div>
        
        <div class="container py-4">
        <!-- Arch-Specific Header -->
        <div class="text-center mb-4 animate__animated animate__fadeIn">
            <h1 class="mt-3"><?php echo $arch_title; ?> <span class="badge bg-info">v2.01</span></h1>
            <p class="lead"><?php echo $arch_description; ?></p>
        </div>

        <!-- Distro Badges -->
        <div class="badge-container animate__animated animate__fadeIn">
            <a href="https://www.linux.org" target="_blank" class="btn btn-outline-danger">OS-Linux</a>
            <a href="https://archlinux.org" target="_blank" class="btn btn-outline-info">DISTRO-Arch</a>
            <a href="https://ubuntu.com/" target="_blank" class="btn btn-outline-warning">DISTRO-Ubuntu</a>
            <a href="https://www.debian.org" target="_blank" class="btn btn-outline-primary">DISTRO-Debian</a>
        </div>

        <!-- DeepSeek Badge -->
        <div class="text-center mb-4 animate__animated animate__fadeIn">
            <a href="https://chat.deepseek.com/" target="_blank" class="btn btn-primary">
                Built Using DeepSeek <img src="https://i.postimg.cc/ydBbyvRt/Deepseek.jpg" alt="DeepSeek Logo" style="height: 20px; margin-left: 5px;">
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="text-center mb-4 animate__animated animate__fadeIn">
            <a href="https://claudemodsreloaded.com/imgisoguide.php" class="btn btn-outline-light me-2">📖 Guide</a>
            <a href="https://claudemodsreloaded.com/claudemodsnews.php" class="btn btn-outline-light me-2">📰 News</a>
            <a href="https://www.paypal.com/paypalme/claudemods?country.x=GB&locale" class="btn donate-btn">💝 Support Me</a>
        </div>

        <!-- Donation Badges -->
        <div class="text-center mb-4 animate__animated animate__fadeIn">
            <a href="https://ko-fi.com/claudemods" class="btn btn-outline-info me-2">Ko-Fi</a>
            <a href="https://github.com/sponsors/claudemods" class="btn btn-outline-purple">GitHub Sponsors</a>
        </div>

        <!-- Introduction -->
        <div class="text-center mb-4 animate__animated animate__fadeIn">
            <h5>Hello, welcome to claudemods Multi ISO Creator Written in C, C++ And Rust And More!</h5>
            <p>Sailing the 7 seas like Penguin's Eggs Remastersys, Refracta, Systemback and father Knoppix!</p>
        </div>
        
        <!-- Project Sections -->
        <div class="row">
            <div class="col-md-6 animate__animated animate__fadeInRight">
                <div class="feature-card p-3">
                    <h3>🖥️ Claudemods Arch Advanced Ext4/Btrfs Img Iso Creator v2.01</h3>
                    <p>For UEFI Btrfs/Ext4 Arch Systems</p>
                    <p>Without Separate Swap Or Home</p>
                </div>
            </div>
            <div class="col-md-6 animate__animated animate__fadeInLeft">
                <div class="feature-card p-3">
                    <h3>🖥️ Claudemods Multi Iso Creator v2.0</h3>
                    <p>For UEFI EXT4 Arch Ubuntu, Debian Systems</p>
                    <p>Without Separate Swap Or Home</p>
                </div>
            </div>
        </div>

        <!-- Experimental Notice -->
        <div class="alert alert-warning mt-4 animate__animated animate__fadeIn">
            <h4 class="alert-heading">⚠️ Experimental Playground</h4>
            <p>These projects are an experimental playground with wild ideas and lots of things being made in this repository.</p>
            <p>Contribute if you want and test all new scripts with caution!</p>
        </div>

        <!-- Features Section -->
        <div class="mt-4 animate__animated animate__fadeIn">
            <h2 class="section-title">✨ Features</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="terminal">
                        <h4>Img Iso Method Supports Arch Only</h4>
                        <p>🚀 Generate bootable ISOs with custom configurations</p>
                        <p>🛠️ Customizable branding and kernel options</p>
                        <p>🖼️ Create compressed system images (Btrfs and Ext4)</p>
                        <p>📊 Disk usage reporting</p>
                        <p>🔄 Rsync-based file copying</p>
                        <p>🗜️ SquashFS compression with zstd</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="terminal">
                        <h4>My Other ISO Methods Supports</h4>
                        <p>🚀 Multi-Distro Support</p>
                        <p>🐧 Arch, Ubuntu, Debian, CachyOS</p>
                        <p>🤖 initramfs generation</p>
                        <p>⏱️ Real-time updates</p>
                        <p>📝 Command Line Tools</p>
                        <p>🎨 Colorful terminal output</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Installation Section -->
        <div class="mt-4 animate__animated animate__fadeIn">
            <h2 class="section-title">💾 Installation</h2>
            <div class="terminal">
                <h4>Main Default Installation Methods:</h4>
                # All-in-one advanced C++ script Beta v2.0 MainBranch:
                <p><span class="text-success">$</span> bash -c "$(curl -fsSL https://raw.githubusercontent.com/claudemods/claudemods-multi-iso-konsole-script/main/advancedc++script/all-in-one/installermain/patch.sh)"</p>
               # All-in-one advanced C++ script Beta v2.0 DevBranch:
                <p><span class="text-success">$</span> bash -c "$(curl -fsSL https://raw.githubusercontent.com/claudemods/claudemods-multi-iso-konsole-script/main/advancedc++script/all-in-one-devbranch/installermain/patch.sh)"</p>
                # Advanced C++ Arch Img Iso Script Beta v2.01 MainBranch (Active But Being Worked On To Be Made Stable):
                <p><span class="text-success">$</span> bash -c "$(curl -fsSL https://raw.githubusercontent.com/claudemods/claudemods-multi-iso-konsole-script/main/advancedimgscript/installer/patch.sh)"</p>
                # Advanced C++ Arch Img Iso Script Beta v2.01 DevBranch (Coming Soon):
                <p><span class="text-success">$</span> bash -c "$(curl -fsSL https://raw.githubusercontent.com/claudemods/claudemods-multi-iso-konsole-script/main/advancedimgscript/installer/patch.sh)</p>
                <p><span class="blink">_</span></p>
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

        var player;

        function onYouTubeIframeAPIReady() {
            player = new YT.Player('youtube-player', {
                height: '0',
                width: '0',
                videoId: 'jSgxYu8kESU',
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
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animation for terminal cursor
        setInterval(() => {
            const blink = document.querySelector('.blink');
            blink.style.visibility = blink.style.visibility === 'hidden' ? 'visible' : 'hidden';
        }, 500);
    </script>
</body>
</html>
