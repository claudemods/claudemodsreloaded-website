<?php
# v2.0 28-09-2026
# modern rebuild using shared assets, same wording
# v1.01 26-07-2025
#added youtube audio
header('Content-Type: text/html; charset=utf-8');
$page_title = 'ClaudeMods ISO Creator Guide';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include __DIR__ . '/includes/head.php'; ?>
</head>
<body class="theme-gradient">
    <main class="terminal-window">
        <div class="terminal-bar">
            <span class="dot"></span><span class="dot"></span><span class="dot"></span>
            <a href="index.php">claudemods reloaded &rarr;</a>
        </div>
        <div class="terminal-body">
            <h1 class="t-title">ClaudeMods Img ISO Creator v2.01 Guide</h1>
            <p class="t-subtitle">Create Bootable ISO Images from Your EXT4/BTRFS System</p>

            <section class="t-section">
                <h2 class="t-section-title"><span aria-hidden="true">🔧</span> Quick Start Guide</h2>
                <div class="t-option">Compile and Run With Install Command: run the executable in your terminal</div>
                <div class="t-option">Main Menu Options:
                    <div class="t-sub">
                        - Create System Image (EXT4/BTRFS)<br>
                        - ISO Creation Setup<br>
                        - Generate Bootable ISO<br>
                        - Check Disk Usage
                    </div>
                </div>
                <div class="t-option">First Run Configuration: The script will automatically:
                    <div class="t-sub">
                        - Create configuration directory at ~/.config/cmi/<br>
                        - Load any existing settings from configuration.txt<br>
                        - Detect your username and set appropriate paths
                    </div>
                </div>
            </section>

            <section class="t-section">
                <h2 class="t-section-title"><span aria-hidden="true">📝</span> Step-by-Step Usage Guide</h2>

                <div class="t-option">System Image Creation:
                    <div class="t-sub">
                        - Select "Create Image" from main menu<br>
                        - Enter your username when prompted<br>
                        - Specify image size for ext4 (e.g., "6" for 6GB)<br>
                        - Specify image size for btrfs will need to be uncompressed system size i need to fix mechanism but (e.g., "6" for 6GB)<br>
                        - Choose filesystem type (btrfs or ext4)<br>
                        - The script will automatically:<br>
                        &nbsp;&nbsp;• Create blank image file<br>
                        &nbsp;&nbsp;• Format with selected filesystem<br>
                        &nbsp;&nbsp;• Mount and clone your system<br>
                        &nbsp;&nbsp;• Compress into SquashFS format<br>
                        &nbsp;&nbsp;• Generate MD5 checksum
                    </div>
                </div>

                <div class="t-option">ISO Preparation: Use the "ISO Creation Setup" menu to configure:
                    <div class="t-sub">
                        • Set ISO Tag - Identifier for your ISO (e.g., "2025")<br>
                        • Set ISO Name - Output filename (e.g., "claudemods.iso")<br>
                        • Set Output Directory - Where to save ISO<br>
                        &nbsp;&nbsp;(Supports $USER variable, e.g., "/home/$USER/Downloads")<br>
                        • Select vmlinuz - Choose kernel from /boot<br>
                        • Generate mkinitcpio - Create initramfs<br>
                        • Edit GRUB Config - Customize bootloader settings
                    </div>
                </div>

                <div class="t-option">ISO Generation:
                    <div class="t-sub">
                        - Select "Create ISO" from main menu<br>
                        - The script will:<br>
                        &nbsp;&nbsp;• Verify all required settings are configured<br>
                        &nbsp;&nbsp;• Use xorriso to create bootable ISO<br>
                        &nbsp;&nbsp;• Save to your specified output directory
                    </div>
                </div>

                <div class="t-option">Post-Creation:
                    <div class="t-sub">
                        - Wait 4 minutes if writing directly to USB<br>
                        - Test ISO in virtual machine before deployment<br>
                        - Checksum file (.md5) is generated for verification
                    </div>
                </div>
            </section>

            <section class="t-section">
                <h2 class="t-section-title"><span aria-hidden="true">💡</span> Pro Tips</h2>
                <div class="t-tip">• Configuration persists between runs in ~/.config/cmi/configuration.txt</div>
                <div class="t-tip">• Main menu shows current configuration status</div>
                <div class="t-tip">• For BTRFS: Uses zstd:22 compression by default</div>
                <div class="t-tip">• For EXT4: Uses standard formatting with optimizations</div>
                <div class="t-tip">• Excludes temporary and system directories automatically</div>
            </section>

            <section class="t-section">
                <h2 class="t-section-title"><span aria-hidden="true">⚠️</span> Important Notes</h2>
                <div class="t-warning">• Close all applications before system cloning</div>
                <div class="t-warning">• If you reboot, you'll need to re-select vmlinuz</div>
                <div class="t-warning">• Edit GRUB config to match your kernel name if not default</div>
                <div class="t-warning">• Large images will take time to process - be patient</div>
            </section>
        </div>
    </main>

    <script>
        window.CM_MUSIC = { start: 'main', tracks: { main: { id: 'cvtc-q7Rjrw', label: 'ISO Guide' } } };
    </script>
    <script src="<?php echo asset('assets/js/music.js'); ?>"></script>
    <script src="<?php echo asset('assets/js/site.js'); ?>"></script>
</body>
</html>
