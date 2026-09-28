<?php
# v2.0 28-09-2026
# modern rebuild using shared assets, same wording
# v1.02 11-06-2026
# ui updated - simplified to focus on current projects
# kept youtube background audio
# removed news categories, now showing current focus and distributions only
date_default_timezone_set('Europe/London');
$page_title = 'claudemods - Current Projects';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include __DIR__ . '/includes/head.php'; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body class="page-news">
    <main class="shell">
        <a class="home-link" href="index.php"><i class="fas fa-arrow-left"></i> claudemods reloaded</a>

        <header class="page-header reveal">
            <h1><i class="fas fa-cog"></i> claudemods</h1>
            <p>Current Projects &amp; Updates - <?= date('d-m-Y H:i:s') ?> (UK Time)</p>
        </header>

        <!-- Notice Section -->
        <div class="notice reveal">
            <p><i class="fas fa-info-circle"></i> <strong>Important Notice:</strong></p>
            <p>A lot of things have been changed recently. Not many updates have been done to the website till now. All updates have changed. I am now focusing on a selected amount of things from time to time and perhaps new updates to other things on the odd occasion.</p>
            <p>Distributions can now only be built manually using this GitHub page if you're already on Arch: <a href="https://github.com/claudemods/claudemods-distribution-iso-creator-Beta" target="_blank" rel="noopener"><i class="fab fa-github"></i> claudemods-distribution-iso-creator-Beta</a></p>
        </div>

        <!-- Distributions Section -->
        <section class="section reveal">
            <h2><i class="fab fa-linux"></i> claudemods Distributions Currently Being Updated occasionally</h2>
            <p class="section-note"><i class="fas fa-random"></i> Random updates only</p>

            <div class="distro-grid">
                <div class="distro-card spitfire">
                    <div class="series-header spitfire">🔥 Spitfire Series (Burgundy Theme + Black Theme)</div>
                    <ul class="series-list">
                        <li>⚡ Spitfire CKGE Minimal - Lightweight edition</li>
                        <li>🛠️ Spitfire CKGE Minimal Dev - Kde Dev included</li>
                        <li>🎯 Spitfire CKGE Full - Extra applications for gamers e.g steam</li>
                        <li>🔧 Spitfire CKGE Full Dev - Kde Dev included</li>
                        <li>🚀 Spitfire CKGBE Full - Black Edition Of Spitfire</li>
                        <li>📁 Spitfire CKGBE Full Dev - Kde Dev included</li>
                    </ul>
                </div>

                <div class="distro-card apex">
                    <div class="series-header apex">🟣 Apex Series (Blue Theme)</div>
                    <ul class="series-list">
                        <li>⚡ Apex CKGE Minimal - Lightweight edition</li>
                        <li>🛠️ Apex CKGE Minimal Dev - Kde Dev included</li>
                        <li>🎯 Apex CKGE Full - Extra applications for gamers e.g steam</li>
                        <li>🔧 Apex CKGE Full Dev - Kde Dev included</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Windows Apps/Scripts Section -->
        <section class="section reveal">
            <h2><i class="fab fa-windows"></i> Windows Apps/Scripts</h2>
            <p class="section-note"><i class="fas fa-exclamation-triangle"></i> a select few of other apps and scripts but may still be old</p>

            <ul class="app-list">
                <li class="windows">
                    <span class="app-icon"><i class="fas fa-save"></i></span>
                    <span class="app-name">claudemods claudebackup</span>
                    <span class="app-version">v1.01 - 05-06-2026</span>
                    <a href="https://github.com/claudemods/Windows/tree/main/claudebackup" target="_blank" rel="noopener" class="app-link"><i class="fab fa-github"></i> github.com/claudemods/Windows/tree/main/claudebackup</a>
                </li>
                <li class="windows">
                    <span class="app-icon"><i class="fas fa-shield-alt"></i></span>
                    <span class="app-name">claudemods Defender Remover</span>
                    <span class="app-version">v1.0 - 14-05-2026</span>
                    <a href="https://github.com/claudemods/Windows/tree/main/DefenderRemover" target="_blank" rel="noopener" class="app-link"><i class="fab fa-github"></i> github.com/claudemods/Windows/tree/main/DefenderRemover</a>
                </li>
                <li class="windows">
                    <span class="app-icon"><i class="fas fa-ban"></i></span>
                    <span class="app-name">claudemods update blocker</span>
                    <span class="app-version">v1.01 - 18-05-2026</span>
                    <a href="https://github.com/claudemods/Windows/tree/main/claudeupdateblocker" target="_blank" rel="noopener" class="app-link"><i class="fab fa-github"></i> github.com/claudemods/Windows/tree/main/claudeupdateblocker</a>
                </li>
            </ul>
        </section>

        <!-- Linux Apps/Scripts Section -->
        <section class="section reveal">
            <h2><i class="fab fa-linux"></i> Linux Apps/Scripts</h2>
            <p class="section-note"><i class="fas fa-exclamation-triangle"></i> a select few of other apps and scripts but may still be old</p>

            <ul class="app-list">
                <li class="linux">
                    <span class="app-icon"><i class="fas fa-terminal"></i></span>
                    <span class="app-name">claudemods multi iso console script</span>
                    <span class="app-version">v2.03.2</span>
                    <a href="https://github.com/claudemods/claudemods-multi-iso-konsole-script" target="_blank" rel="noopener" class="app-link"><i class="fab fa-github"></i> github.com/claudemods/claudemods-multi-iso-konsole-script</a>
                </li>
                <li class="linux">
                    <span class="app-icon"><i class="fas fa-sync-alt"></i></span>
                    <span class="app-name">claudemods kde-systemtray-updater</span>
                    <span class="app-version">v1.03.2 - 19-01-2026</span>
                    <a href="https://github.com/claudemods/Kde-SystemTray-Updater" target="_blank" rel="noopener" class="app-link"><i class="fab fa-github"></i> github.com/claudemods/Kde-SystemTray-Updater</a>
                </li>
                <li class="linux">
                    <span class="app-icon"><i class="fas fa-music"></i></span>
                    <span class="app-name">claudemods apex music</span>
                    <span class="app-version">v1.03.1-build - 29-01-2026</span>
                    <a href="https://github.com/claudemods/ApexMusic" target="_blank" rel="noopener" class="app-link"><i class="fab fa-github"></i> github.com/claudemods/ApexMusic</a>
                </li>
                <li class="linux">
                    <span class="app-icon"><i class="fas fa-th-large"></i></span>
                    <span class="app-name">claudemods 11menu advanced</span>
                    <span class="app-version">v1.0 - 03-11-2025</span>
                    <a href="https://github.com/claudemods/11-menu-advanced" target="_blank" rel="noopener" class="app-link"><i class="fab fa-github"></i> github.com/claudemods/11-menu-advanced</a>
                </li>
            </ul>
        </section>

        <footer class="footer">
            <p>&copy; <?= date('Y') ?> claudemods. All rights reserved.</p>
            <p>Last updated: <?= date('d-m-Y H:i:s') ?> (UK Time)</p>
        </footer>
    </main>

    <script>
        window.CM_MUSIC = { start: 'main', tracks: { main: { id: 'QbfEHgzNyN4', label: 'claudemods news' } } };
    </script>
    <script src="<?php echo asset('assets/js/music.js'); ?>"></script>
    <script src="<?php echo asset('assets/js/site.js'); ?>"></script>
</body>
</html>
