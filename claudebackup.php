<?php
/**
 * claudebackup - Windows Backup ISO Tool File Browser
 * Companion to claudebackup beta v1.0 - VHDX to WIM to ISO Automation
 */

// Configuration
$config = [
    'directory' => '.',
'page_title' => 'claudebackup | Windows Backup ISO Creation Tool',
'site_name' => 'claudebackup',
'excluded_files' => ['.', '..', 'index.php', '.htaccess', '.gitignore', 'index.html']
];

// Get current directory from query parameter
$current_dir = isset($_GET['dir']) ? $_GET['dir'] : '';
if ($current_dir) {
    $requested_dir = realpath($config['directory'] . DIRECTORY_SEPARATOR . $current_dir);
    $base_dir = realpath($config['directory']);

    // Security: Prevent directory traversal
    if ($requested_dir === false || strpos($requested_dir, $base_dir) !== 0) {
        $current_dir = '';
        $directory = $base_dir;
    } else {
        $directory = $requested_dir;
    }
} else {
    $directory = realpath($config['directory']);
}

// Security: Prevent directory traversal
if ($directory === false) {
    die('Invalid directory');
}

// Get files and folders, exclude all .php files
$items = scandir($directory);
$filtered_items = [];

foreach ($items as $item) {
    if ($item == '.' || $item == '..') continue;
    if ($item == 'index.php') continue;
    if ($item == 'index.html') continue;
    if (pathinfo($item, PATHINFO_EXTENSION) == 'php') continue;
    $filtered_items[] = $item;
}

$file_data = [];
$folder_data = [];

foreach ($filtered_items as $item) {
    $item_path = $directory . DIRECTORY_SEPARATOR . $item;

    if (is_dir($item_path)) {
        $folder_data[] = [
            'name' => $item,
            'modified' => filemtime($item_path),
            'is_folder' => true,
            'path' => $current_dir ? $current_dir . DIRECTORY_SEPARATOR . $item : $item
        ];
    } elseif (is_file($item_path)) {
        $file_data[] = [
            'name' => $item,
            'size' => filesize($item_path),
            'modified' => filemtime($item_path),
            'download_url' => htmlspecialchars($current_dir ? $current_dir . DIRECTORY_SEPARATOR . $item : $item),
            'is_folder' => false
        ];
    }
}

// Sort folders and files
usort($folder_data, function($a, $b) {
    return strcasecmp($a['name'], $b['name']);
});

usort($file_data, function($a, $b) {
    return $b['modified'] - $a['modified'];
});

// Build breadcrumb navigation
$breadcrumbs = [];
if ($current_dir) {
    $parts = explode(DIRECTORY_SEPARATOR, $current_dir);
    $accumulated_path = '';
    foreach ($parts as $part) {
        $accumulated_path = $accumulated_path ? $accumulated_path . DIRECTORY_SEPARATOR . $part : $part;
        $breadcrumbs[] = [
            'name' => $part,
            'path' => $accumulated_path
        ];
    }
}

// Helper function to format file size
function formatSize($bytes) {
    if ($bytes == 0) return '0 Bytes';
    $k = 1024;
    $sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    $i = floor(log($bytes) / log($k));
    return number_format($bytes / pow($k, $i), 2) . ' ' . $sizes[$i];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>claudebackup | Windows Backup ISO Creation Tool</title>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 100%);
    min-height: 100vh;
    padding: 20px;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
}

.header {
    background: linear-gradient(135deg, rgba(0, 0, 0, 0.95) 0%, rgba(30, 30, 46, 0.95) 100%);
    backdrop-filter: blur(10px);
    padding: 2rem;
    border-radius: 15px;
    border: 2px solid #ff3333;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    margin-bottom: 2rem;
    text-align: center;
}

.header h1 {
    color: #00ffff;
    font-size: 2.2rem;
    margin-bottom: 0.5rem;
    font-weight: 700;
    text-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
    font-family: 'Consolas', monospace;
}

.header .version-badge {
    display: inline-block;
    background: rgba(255, 51, 51, 0.2);
    color: #ff3333;
    padding: 0.3rem 1rem;
    border-radius: 20px;
    font-size: 0.9rem;
    margin-bottom: 1rem;
    border: 1px solid #ff3333;
}

.header p {
    color: #00ffff;
    font-size: 1.1rem;
    opacity: 0.9;
}

.tool-description {
    background: rgba(0, 0, 0, 0.85);
    backdrop-filter: blur(10px);
    padding: 1.5rem 2rem;
    border-radius: 10px;
    margin-bottom: 2rem;
    border: 1px solid #ff3333;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
}

.tool-description h2 {
    color: #ff3333;
    margin-bottom: 1rem;
    font-size: 1.3rem;
}

.tool-description p {
    color: #00ffff;
    margin-bottom: 0.8rem;
    line-height: 1.6;
}

.tool-description strong {
    color: #00ffff;
    font-weight: bold;
}

.feature-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1rem;
    margin: 1.5rem 0;
}

.feature-card {
    background: rgba(255, 51, 51, 0.1);
    padding: 1rem;
    border-radius: 8px;
    border: 1px solid rgba(255, 51, 51, 0.3);
}

.feature-card h3 {
    color: #ff3333;
    font-size: 1rem;
    margin-bottom: 0.5rem;
}

.feature-card p {
    color: #00ffff;
    font-size: 0.9rem;
    margin-bottom: 0;
}

.steps-section {
    background: rgba(0, 0, 0, 0.85);
    backdrop-filter: blur(10px);
    padding: 1.5rem 2rem;
    border-radius: 10px;
    margin-bottom: 2rem;
    border: 1px solid #ff3333;
}

.steps-section h2 {
    color: #ff3333;
    margin-bottom: 1rem;
    font-size: 1.3rem;
}

.step {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
    align-items: flex-start;
}

.step-number {
    background: #ff3333;
    color: #000;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    flex-shrink: 0;
    margin-top: 2px;
}

.step-content {
    color: #00ffff;
    line-height: 1.5;
}

.step-content strong {
    color: #ff3333;
}

.requirements {
    background: rgba(0, 0, 0, 0.85);
    backdrop-filter: blur(10px);
    padding: 1.5rem 2rem;
    border-radius: 10px;
    margin-bottom: 2rem;
    border-left: 5px solid #ff3333;
    border-right: 1px solid #ff3333;
    border-top: 1px solid #ff3333;
    border-bottom: 1px solid #ff3333;
}

.requirements h2 {
    color: #ff3333;
    margin-bottom: 1rem;
    font-size: 1.3rem;
}

.requirements ul {
    list-style: none;
    padding: 0;
}

.requirements li {
    color: #00ffff;
    padding: 0.5rem 0;
    border-bottom: 1px solid rgba(255, 51, 51, 0.2);
}

.requirements li:last-child {
    border-bottom: none;
}

.requirements li::before {
    content: '▸ ';
    color: #ff3333;
}

.breadcrumb {
    background: rgba(0, 0, 0, 0.85);
    backdrop-filter: blur(10px);
    padding: 1rem 2rem;
    border-radius: 10px;
    margin-bottom: 1rem;
    border: 1px solid #ff3333;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
}

.breadcrumb a {
    color: #00ffff;
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: 500;
}

.breadcrumb a:hover {
    color: #ff3333;
    text-decoration: underline;
}

.breadcrumb span {
    color: #ff3333;
    margin: 0 0.5rem;
}

.file-list {
    background: rgba(0, 0, 0, 0.85);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    border: 1px solid #ff3333;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin-bottom: 2rem;
}

.file-list h2 {
    color: #ff3333;
    padding: 1.5rem 2rem 0.5rem;
    font-size: 1.3rem;
}

.file-header {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    gap: 1rem;
    padding: 1rem 2rem;
    background: linear-gradient(135deg, #ff3333 0%, #cc0000 100%);
    color: #00ffff;
    font-weight: 600;
    border-bottom: 2px solid #00ffff;
}

.file-item {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    gap: 1rem;
    padding: 1rem 2rem;
    border-bottom: 1px solid rgba(255, 51, 51, 0.3);
    transition: all 0.3s ease;
    text-decoration: none;
    color: inherit;
    cursor: pointer;
}

.file-item:hover {
    background: rgba(255, 51, 51, 0.2);
    transform: translateX(5px);
}

.file-item:last-child {
    border-bottom: none;
}

.file-name {
    font-weight: 600;
    color: #00ffff;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.folder-name {
    font-weight: 600;
    color: #00ffff;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.file-name::before {
    content: '📄';
    font-size: 1.2em;
}

.folder-name::before {
    content: '📁';
    font-size: 1.2em;
}

.file-size {
    color: #00ffff;
    display: flex;
    align-items: center;
    opacity: 0.8;
}

.file-modified {
    color: #00ffff;
    display: flex;
    align-items: center;
    opacity: 0.7;
}

.folder-size {
    color: #00ffff;
    font-style: italic;
    opacity: 0.7;
}

.empty-state {
    text-align: center;
    padding: 3rem;
    color: #00ffff;
}

.empty-state p {
    font-size: 1.1rem;
    margin-bottom: 1rem;
    color: #00ffff;
}

.warning-note {
    background: rgba(255, 51, 51, 0.1);
    padding: 1.5rem;
    border-radius: 10px;
    margin-top: 1rem;
    border-left: 4px solid #ff3333;
    border-right: 1px solid #ff3333;
    border-top: 1px solid #ff3333;
    border-bottom: 1px solid #ff3333;
}

.warning-note p {
    color: #00ffff;
    line-height: 1.6;
}

.warning-note strong {
    color: #ff3333;
}

@media (max-width: 768px) {
    .file-header, .file-item {
        grid-template-columns: 1fr;
        gap: 0.5rem;
    }

    .file-header {
        display: none;
    }

    .file-name::before, .folder-name::before {
        display: inline-block;
        margin-right: 0.5rem;
    }

    .header h1 {
        font-size: 1.5rem;
    }

    .feature-grid {
        grid-template-columns: 1fr;
    }
}
</style>
</head>
<body>
<!-- YouTube Player Container (hidden, audio only) -->
<div id="youtube-player" style="display:none;"></div>

<div class="container">
<div class="header">
<h1>🖥️ claudebackup</h1>
<div class="version-badge">beta v1.0 ── 10-05-2026</div>
<p>VHDX to WIM to ISO - GUI Automation Tool</p>
<p>Create Bootable Windows Backup ISOs from Your System</p>
</div>

<!-- Tool Description Section -->
<div class="tool-description">
<h2>🔧 About This Tool</h2>
<p><strong>claudebackup</strong> is a GUI automation tool that converts your Windows system into a bootable backup ISO. It automates the complex process of creating a VHDX backup, converting it to a WIM image, and packaging it into a bootable ISO file.</p>

<div class="feature-grid">
<div class="feature-card">
<h3>📀 Full System Backup</h3>
<p>Creates a complete VHDX backup of your C: drive using Windows Backup (wbadmin)</p>
</div>
<div class="feature-card">
<h3>🔄 VHDX to WIM Conversion</h3>
<p>Converts mounted VHDX to compressed WIM format using wimlib with LZMS solid compression</p>
</div>
<div class="feature-card">
<h3>💿 Bootable ISO Creation</h3>
<p>Packages the WIM into a bootable ISO using Windows ADK oscdimg with BIOS and UEFI support</p>
</div>
<div class="feature-card">
<h3>⏱️ Time-Aware</h3>
<p>Process takes 45 minutes to 3 hours depending on system specifications</p>
</div>
</div>
</div>

<!-- Steps Section -->
<div class="steps-section">
<h2>📋 How It Works</h2>

<div class="step">
<div class="step-number">1</div>
<div class="step-content">
<strong>Select Backup Location:</strong> Choose where to store the VHDX backup file
</div>
</div>

<div class="step">
<div class="step-number">2</div>
<div class="step-content">
<strong>Create VHDX Backup:</strong> The tool runs <code>wbadmin</code> to create a full system backup of your C: drive
</div>
</div>

<div class="step">
<div class="step-number">3</div>
<div class="step-content">
<strong>Mount VHDX:</strong> Automatically locates and mounts the VHDX file to drive V:
</div>
</div>

<div class="step">
<div class="step-number">4</div>
<div class="step-content">
<strong>Create WIM Image:</strong> Uses <code>wimlib-imagex</code> to capture the VHDX contents into <code>install.wim</code>
</div>
</div>

<div class="step">
<div class="step-number">5</div>
<div class="step-content">
<strong>Build Bootable ISO:</strong> Uses Windows ADK <code>oscdimg</code> to create a bootable ISO with timestamped filename
</div>
</div>
</div>

<!-- Requirements Section -->
<div class="requirements">
<h2>⚙️ System Requirements</h2>
<ul>
<li>Windows 10 or Windows 11 (64-bit)</li>
<li>PowerShell 5.1 or later (Run as Administrator)</li>
<li>Windows ADK (Assessment and Deployment Kit) installed</li>
<li>wimlib 1.14.5 Supplied in the tool directory</li>
<li>Iso_Build folder Supplied with Windows boot files</li>
<li>Sufficient disk space for VHDX + WIM + ISO (100GB+ recommended)</li>
<li>Administrator privileges required</li>
</ul>
</div>

<!-- Download Section -->
<div class="file-list">
<h2>📦 Downloads & Files</h2>

<?php if (empty($folder_data) && empty($file_data)): ?>
<div class="empty-state">
<p>📂 No files available in this directory</p>
<p style="font-size: 0.9rem; opacity: 0.7;">
</p>
</div>
<?php else: ?>
<div class="file-header">
<div>Name</div>
<div>Size</div>
<div>Last Modified</div>
</div>

<?php foreach ($folder_data as $folder): ?>
<a href="?dir=<?php echo urlencode($folder['path']); ?>" class="file-item">
<div class="folder-name"><?php echo htmlspecialchars($folder['name']); ?></div>
<div class="folder-size">Folder</div>
<div class="file-modified"><?php echo date('Y-m-d H:i', $folder['modified']); ?></div>
</a>
<?php endforeach; ?>

<?php foreach ($file_data as $file): ?>
<a href="<?php echo $file['download_url']; ?>" class="file-item" download>
<div class="file-name"><?php echo htmlspecialchars($file['name']); ?></div>
<div class="file-size"><?php echo formatSize($file['size']); ?></div>
<div class="file-modified"><?php echo date('Y-m-d H:i', $file['modified']); ?></div>
</a>
<?php endforeach; ?>
<?php endif; ?>
</div>

<?php if ($current_dir || !empty($breadcrumbs)): ?>
<div class="breadcrumb">
<a href="?">📁 Root Directory</a>
<?php foreach ($breadcrumbs as $crumb): ?>
<span>/</span>
<a href="?dir=<?php echo urlencode($crumb['path']); ?>"><?php echo htmlspecialchars($crumb['name']); ?></a>
<?php endforeach; ?>
</div>
<?php endif; ?>

<div class="warning-note">
<p><strong>⚠️ Important Notes:</strong></p>
<p>1. <strong>Run as Administrator</strong> - Required for VHDX mounting and wbadmin operations</p>
<p>2. <strong>Close other applications</strong> - The backup process requires exclusive access to system files</p>
<p>3. <strong>Free disk space</strong> - Ensure you have 2-3x your C: drive usage available as free space</p>
<p>4. <strong>Output ISO</strong> will be saved as: <code>windowsbackup-YYYY-MM-DD_hhmmAM/PM.iso</code></p>
<p>5. The resulting ISO can be used to restore your system or deploy to other machines</p>
</div>
</div>

<!-- YouTube API Script -->
<script>
// YouTube API Script
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var backupPlayer;

function onYouTubeIframeAPIReady() {
    // Backup page player (audio only)
    backupPlayer = new YT.Player('youtube-player', {
        videoId: 'dOtUqFKBg0I',
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
            'onReady': onBackupPlayerReady,
            'onStateChange': onBackupPlayerStateChange
        }
    });
}

function onBackupPlayerReady(event) {
    event.target.mute();
    event.target.playVideo();
    setTimeout(function() {
        event.target.unMute();
    }, 1000);
}

function onBackupPlayerStateChange(event) {
    if (event.data == YT.PlayerState.ENDED) {
        event.target.playVideo();
    }
}
</script>
</body>
</html>
