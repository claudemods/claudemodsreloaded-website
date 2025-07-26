<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
<head>
    <title>ClaudeMods ISO Creator Guide</title>
    <style>
        body {
            background: linear-gradient(-45deg, #0066cc, #0099ff, #00ccff, #66ccff);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            color: #00ffff;
            font-family: 'Courier New', monospace;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .terminal {
            border: 2px solid #00ffff;
            border-radius: 5px;
            padding: 0;
            width: 90%;
            max-width: 1000px;
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.7);
            background-color: rgba(0, 20, 40, 0.85);
            overflow: hidden;
        }
        
        .terminal-header {
            background-color: rgba(0, 40, 80, 0.7);
            padding: 5px 10px;
            border-bottom: 1px solid #00ffff;
            text-align: center;
            font-weight: bold;
        }
        
        .terminal-body {
            padding: 15px;
        }
        
        .title {
            text-align: center;
            font-weight: bold;
            margin: 10px 0;
            color: #00ffff;
            text-shadow: 0 0 5px rgba(0, 255, 255, 0.5);
        }
        
        .subtitle {
            text-align: center;
            font-style: italic;
            margin-bottom: 20px;
            color: #66ffff;
        }
        
        .section {
            margin: 20px 0;
            border-left: 2px solid #00ffff;
            padding-left: 10px;
        }
        
        .section-title {
            font-weight: bold;
            color: #00ffff;
            margin-bottom: 10px;
        }
        
        .option {
            margin: 5px 0;
            padding-left: 20px;
        }
        
        .option:before {
            content: "• ";
            color: #00ffff;
        }
        
        .tip {
            color: #88ffff;
            font-style: italic;
        }
        
        .warning {
            color: #ff6666;
            font-weight: bold;
        }
        
        .emoji {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="terminal">
        <div class="terminal-header"></div>
        <div class="terminal-body">
            <div class="title">ClaudeMods Img ISO Creator v2.01 Guide</div>
            <div class="subtitle">"Create Bootable ISO Images from Your EXT4/BTRFS System
            <div class="section">
                <div class="section-title"><span class="emoji">🔧</span> Quick Start Guide</div>
                <div class="option">Compile and Run With Install Command: run the executable in your terminal</div>
                <div class="option">Main Menu Options:
                    <div style="padding-left: 20px;">
                        - Create System Image (EXT4/BTRFS)<br>
                        - ISO Creation Setup<br>
                        - Generate Bootable ISO<br>
                        - Check Disk Usage
                    </div>
                </div>
                <div class="option">First Run Configuration: The script will automatically:
                    <div style="padding-left: 20px;">
                        - Create configuration directory at ~/.config/cmi/<br>
                        - Load any existing settings from configuration.txt<br>
                        - Detect your username and set appropriate paths
                    </div>
                </div>
            </div>
            
            <div class="section">
                <div class="section-title"><span class="emoji">📝</span> Step-by-Step Usage Guide</div>
                
                <div class="option">System Image Creation:
                    <div style="padding-left: 20px;">
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
                
                <div class="option">ISO Preparation: Use the "ISO Creation Setup" menu to configure:
                    <div style="padding-left: 20px;">
                        • Set ISO Tag - Identifier for your ISO (e.g., "2025")<br>
                        • Set ISO Name - Output filename (e.g., "claudemods.iso")<br>
                        • Set Output Directory - Where to save ISO<br>
                        &nbsp;&nbsp;(Supports $USER variable, e.g., "/home/$USER/Downloads")<br>
                        • Select vmlinuz - Choose kernel from /boot<br>
                        • Generate mkinitcpio - Create initramfs<br>
                        • Edit GRUB Config - Customize bootloader settings
                    </div>
                </div>
                
                <div class="option">ISO Generation:
                    <div style="padding-left: 20px;">
                        - Select "Create ISO" from main menu<br>
                        - The script will:<br>
                        &nbsp;&nbsp;• Verify all required settings are configured<br>
                        &nbsp;&nbsp;• Use xorriso to create bootable ISO<br>
                        &nbsp;&nbsp;• Save to your specified output directory
                    </div>
                </div>
                
                <div class="option">Post-Creation:
                    <div style="padding-left: 20px;">
                        - Wait 4 minutes if writing directly to USB<br>
                        - Test ISO in virtual machine before deployment<br>
                        - Checksum file (.md5) is generated for verification
                    </div>
                </div>
            </div>
            
            <div class="section">
                <div class="section-title"><span class="emoji">💡</span> Pro Tips</div>
                <div class="tip">• Configuration persists between runs in ~/.config/cmi/configuration.txt</div>
                <div class="tip">• Main menu shows current configuration status</div>
                <div class="tip">• For BTRFS: Uses zstd:22 compression by default</div>
                <div class="tip">• For EXT4: Uses standard formatting with optimizations</div>
                <div class="tip">• Excludes temporary and system directories automatically</div>
            </div>
            
            <div class="section">
                <div class="section-title"><span class="emoji">⚠️</span> Important Notes</div>
                <div class="warning">• Close all applications before system cloning</div>
                <div class="warning">• If you reboot, you'll need to re-select vmlinuz</div>
                <div class="warning">• Edit GRUB config to match your kernel name if not default</div>
                <div class="warning">• Large images will take time to process - be patient</div>
            </div>
        </div>
    </div>
</body>
</html>
