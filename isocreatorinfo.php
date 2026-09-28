<?php
# v2.0 28-09-2026 modern rebuild using shared assets (no bootstrap), same wording, copy buttons on commands
# v1.0 added youtube sound
$title = "Btrfs System Cloner";
$description = "for Arch Systems";
$arch_title = "Advanced C++ Arch Img Iso Script++ Beta MainBranch";
$arch_description = "for Arch systems only";
$page_title = $title;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include __DIR__ . '/includes/head.php'; ?>
</head>
<body class="page-iso">
    <main class="shell shell-wide">
        <!-- Header -->
        <div class="hero reveal">
            <img src="https://i.postimg.cc/JhMRf2RZ/claudemods-03-17-2025.gif" class="header-gif" alt="Claudemods Logo">
            <h1><?php echo $title; ?> <span class="ver">v1.04.2</span></h1>
            <p class="lead"><?php echo $description; ?></p>
        </div>

        <!-- Arch-Specific Header -->
        <div class="hero reveal">
            <h1><?php echo $arch_title; ?> <span class="ver">v2.03.2</span></h1>
            <p class="lead"><?php echo $arch_description; ?></p>
        </div>

        <!-- Distro Badges -->
        <div class="btn-row reveal">
            <a href="https://www.linux.org" target="_blank" rel="noopener" class="btn btn-outline red">OS-Linux</a>
            <a href="https://archlinux.org" target="_blank" rel="noopener" class="btn btn-outline cyan">DISTRO-Arch</a>
        </div>

        <!-- DeepSeek Badge -->
        <div class="btn-row reveal">
            <a href="https://chat.deepseek.com/" target="_blank" rel="noopener" class="btn btn-primary">
                Built Using DeepSeek <img src="https://i.postimg.cc/ydBbyvRt/Deepseek.jpg" alt="DeepSeek Logo">
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="btn-row reveal">
            <a href="https://github.com/claudemods/btrfssystemcloner" target="_blank" rel="noopener" class="btn btn-outline light">📖 Btrfs System Cloner</a>
            <a href="https://claudemodsreloaded.co.uk/imgisoguide.php" class="btn btn-outline light">📖 Iso Guide</a>
            <a href="https://claudemodsreloaded.co.uk/claudemodsnews.php" class="btn btn-outline light">📰 News</a>
            <a href="https://www.paypal.com/paypalme/claudemods?country.x=GB&amp;locale" target="_blank" rel="noopener" class="btn btn-donate">💝 Support Me</a>
        </div>

        <!-- Donation Badges -->
        <div class="btn-row reveal">
            <a href="https://ko-fi.com/claudemods" target="_blank" rel="noopener" class="btn btn-outline cyan">Ko-Fi</a>
            <a href="https://github.com/sponsors/claudemods" target="_blank" rel="noopener" class="btn btn-outline purple">GitHub Sponsors</a>
        </div>

        <!-- Introduction -->
        <div class="intro-text reveal">
            <h2>Hello, welcome to claudemods Multi ISO Creator Written in C, C++ And Rust And More!</h2>
            <p>Sailing the 7 seas like Penguin's Eggs Remastersys, Refracta, Systemback and father Knoppix!</p>
        </div>

        <!-- Project Sections -->
        <div class="grid-2 reveal">
            <div class="feature-card">
                <h3>🖥️ Btrfs System Cloner 1.04.2</h3>
                <p>For UEFI Btrfs Arch Systems</p>
                <p>Without Separate Swap Or Home</p>
            </div>
            <div class="feature-card">
                <h3>🖥️ Advanced C++ Arch Img Iso Script++ Beta v2.03.2 MainBranch</h3>
                <p>For UEFI Arch/Cachyos Systems</p>
                <p>Without Separate Swap Or Home</p>
            </div>
        </div>

        <!-- Experimental Notice -->
        <div class="alert-warn reveal">
            <h4>⚠️ Experimental Playground</h4>
            <p>These projects are an experimental playground with wild ideas and lots of things being made in this repository.</p>
            <p>Contribute if you want and test all new scripts with caution!</p>
        </div>

        <!-- Features Section -->
        <section class="reveal">
            <h2 class="section-title">✨ Features</h2>
            <div class="grid-2">
                <div class="term">
                    <h4>Btrfs Img Method Supports Arch Only</h4>
                    <p>🚀 Generate bootable Btrfs Imgs with custom configurations</p>
                    <p>🛠️ Customizable branding and kernel options</p>
                    <p>🖼️ Create compressed system images (Btrfs)</p>
                    <p>📊 Disk usage reporting</p>
                    <p>🔄 Rsync-based file copying</p>
                </div>
                <div class="term">
                    <h4>Img ISO Methods Supports</h4>
                    <p>🐧 Arch, CachyOS</p>
                    <p>🤖 initramfs generation</p>
                    <p>⏱️ Real-time updates</p>
                    <p>📝 Command Line Tools</p>
                    <p>🎨 Colorful terminal output</p>
                </div>
            </div>
        </section>

        <!-- Installation Section -->
        <section class="reveal">
            <h2 class="section-title">💾 Installation</h2>
            <div class="term">
                <h4>Available Arch Btrfs System CLoner:</h4>
                <p class="comment"># Github Link:</p>
                <p><a href="https://github.com/claudemods/btrfssystemcloner" target="_blank" rel="noopener">https://github.com/claudemods/btrfssystemcloner</a></p>

                <h4>Available Arch Iso Creator Installation Methods:</h4>

                <p class="comment"># All-in-one CMI Commander and TUI Advanced C++ DevBranch:</p>
                <code class="cmd">bash -c "$(curl -fsSL https://raw.githubusercontent.com/claudemods/claudemods-multi-iso-konsole-script/refs/heads/main/advancedc%2B%2Bscript/all-in-one-devbranch/cmi-commander-tui/installermain/patch.sh)"</code>

                <p class="comment"># All-in-one advanced C++ script Beta v2.0 MainBranch:</p>
                <code class="cmd">bash -c "$(curl -fsSL https://raw.githubusercontent.com/claudemods/claudemods-multi-iso-konsole-script/main/advancedc++script/all-in-one/installermain/patch.sh)"</code>

                <p class="comment"># All-in-one advanced C++ script v2.0 DevBranch:</p>
                <code class="cmd">bash -c "$(curl -fsSL https://raw.githubusercontent.com/claudemods/claudemods-multi-iso-konsole-script/main/advancedc++script/all-in-one-devbranch/installermain/patch.sh)"</code>

                <p class="comment"># Advanced C script Beta v2.0 MainBranch:</p>
                <code class="cmd">bash -c "$(curl -fsSL https://raw.githubusercontent.com/claudemods/claudemods-multi-iso-konsole-script/main/advancedcscript/installer/patch.sh)"</code>

                <p class="comment"># Advanced C++ Arch Img Iso Script Beta v2.01 MainBranch</p>
                <code class="cmd">bash -c "$(curl -fsSL https://raw.githubusercontent.com/claudemods/claudemods-multi-iso-konsole-script/main/advancedimgscript/installer/patch.sh)"</code>

                <p class="comment"># Advanced C++ Arch Img Iso Script+ Beta v2.03.1 MainBranch</p>
                <code class="cmd">bash -c "$(curl -fsSL https://raw.githubusercontent.com/claudemods/claudemods-multi-iso-konsole-script/refs/heads/main/advancedimgscript%2B/installer/patch.sh)"</code>

                <p class="comment"># Advanced C++ Arch Img Iso Script++ Beta v2.03.2 MainBranch</p>
                <code class="cmd">bash -c "$(curl -fsSL https://raw.githubusercontent.com/claudemods/claudemods-multi-iso-konsole-script/refs/heads/main/advancedimgscript%2B%2B/installer/patch.sh)"</code>

                <p><span class="blink">_</span></p>
            </div>
        </section>
    </main>

    <script>
        window.CM_MUSIC = { start: 'main', tracks: { main: { id: 'jSgxYu8kESU', label: 'ISO Creator' } } };
    </script>
    <script src="<?php echo asset('assets/js/music.js'); ?>"></script>
    <script src="<?php echo asset('assets/js/site.js'); ?>"></script>
</body>
</html>
