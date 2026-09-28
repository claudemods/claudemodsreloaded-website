<?php
# v2.0 28-09-2026 modern rebuild using shared assets, same wording
$page_title = 'claudemods Arch Linux Repositories';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include __DIR__ . '/includes/head.php'; ?>
</head>
<body>
    <main class="shell">
        <a class="home-link" href="index.php">&larr; claudemods reloaded</a>

        <header class="page-header">
            <h1>claudemods Arch Linux Repositories</h1>
            <p>v1 will contain kernels and working packages if any break claudemods-dev will be kde dev packages</p>
        </header>

        <section class="repo-card">
            <h2>How to Use These Repositories</h2>
            <ol>
                <li>Copy the repository configuration below</li>
                <li>Add it to your <code>/etc/pacman.conf</code> file</li>
                <li>Update your package database with <code>sudo pacman -Sy</code></li>
                <li>Install packages from the repository</li>
            </ol>
            <p class="note"><strong>Note:</strong> These repositories have signature checking disabled (SigLevel = Never). Use at your own risk.</p>
        </section>

        <section class="repo-card">
            <div class="repo-name">claudemods-v1</div>
            <div class="repo-label">Repository Configuration:</div>
            <div class="repo-entry">
<pre id="repo1-config">[claudemods-v1]
SigLevel = Never
Server = https://claudemodsreloaded.co.uk/claudemods-v1/</pre>
                <button type="button" class="copy-btn" data-copy-target="repo1-config">Copy</button>
            </div>
        </section>

        <section class="repo-card">
            <div class="repo-name">claudemods-dev</div>
            <div class="repo-label">Repository Configuration:</div>
            <div class="repo-entry">
<pre id="repo2-config">[claudemods-dev]
SigLevel = Never
Server = https://claudemodsreloaded.co.uk/claudemods-dev/</pre>
                <button type="button" class="copy-btn" data-copy-target="repo2-config">Copy</button>
            </div>
        </section>

        <footer class="footer">
            <p>claudemods Arch Linux Repositories &copy; 2023</p>
            <p>Repository Server: https://claudemodsreloaded.co.uk/</p>
        </footer>
    </main>

    <script src="<?php echo asset('assets/js/site.js'); ?>"></script>
</body>
</html>
