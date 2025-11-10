<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>claudemods Arch Linux Repositories</title>
<style>
:root {
    --primary-color: #1793d1;
    --primary-dark: #0d6fa5;
    --secondary-color: #333;
    --light-bg: #f5f5f5;
    --card-bg: #ffffff;
    --success-color: #28a745;
    --border-radius: 8px;
    --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background-color: var(--light-bg);
    color: var(--secondary-color);
    line-height: 1.6;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

header {
    text-align: center;
    padding: 40px 0;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    border-radius: var(--border-radius);
    margin-bottom: 30px;
    box-shadow: var(--shadow);
}

header h1 {
    font-size: 2.5rem;
    margin-bottom: 10px;
}

header p {
    font-size: 1.2rem;
    opacity: 0.9;
}

.repo-card {
    background-color: var(--card-bg);
    border-radius: var(--border-radius);
    padding: 25px;
    margin-bottom: 25px;
    box-shadow: var(--shadow);
    transition: transform 0.3s ease;
}

.repo-card:hover {
    transform: translateY(-5px);
}

.repo-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.repo-name {
    font-size: 1.5rem;
    font-weight: bold;
    color: var(--primary-color);
}

.repo-content {
    margin-bottom: 20px;
}

.repo-section {
    margin-bottom: 15px;
}

.repo-section-title {
    font-weight: bold;
    margin-bottom: 5px;
    color: var(--secondary-color);
}

.repo-entry {
    background-color: var(--light-bg);
    padding: 12px 15px;
    border-radius: var(--border-radius);
    font-family: monospace;
    word-break: break-all;
    position: relative;
    padding-right: 50px;
}

.copy-btn {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    background-color: var(--primary-color);
    color: white;
    border: none;
    border-radius: 4px;
    padding: 5px 10px;
    cursor: pointer;
    font-size: 0.8rem;
    transition: background-color 0.2s;
}

.copy-btn:hover {
    background-color: var(--primary-dark);
}

.copy-btn.copied {
    background-color: var(--success-color);
}

footer {
    text-align: center;
    margin-top: 40px;
    padding: 20px;
    color: #666;
    font-size: 0.9rem;
}

.instructions {
    background-color: var(--card-bg);
    border-radius: var(--border-radius);
    padding: 25px;
    margin-bottom: 25px;
    box-shadow: var(--shadow);
}

.instructions h2 {
    color: var(--primary-color);
    margin-bottom: 15px;
}

.instructions ol {
    padding-left: 20px;
}

.instructions li {
    margin-bottom: 10px;
}

.instructions code {
    background-color: var(--light-bg);
    padding: 2px 6px;
    border-radius: 4px;
    font-family: monospace;
}

@media (max-width: 768px) {
    .repo-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .repo-name {
        margin-bottom: 10px;
    }
}
</style>
</head>
<body>
<div class="container">
<header>
<h1>claudemods Arch Linux Repositories</h1>
<p>Custom packages and development builds for Arch Linux</p>
</header>

<section class="instructions">
<h2>How to Use These Repositories</h2>
<ol>
<li>Copy the repository configuration below</li>
<li>Add it to your <code>/etc/pacman.conf</code> file</li>
<li>Update your package database with <code>sudo pacman -Sy</code></li>
<li>Install packages from the repository</li>
</ol>
<p><strong>Note:</strong> These repositories have signature checking disabled (SigLevel = Never). Use at your own risk.</p>
</section>

<section class="repo-card">
<div class="repo-header">
<div class="repo-name">claudemods-v1</div>
</div>
<div class="repo-content">
<div class="repo-section">
<div class="repo-section-title">Repository Configuration:</div>
<div class="repo-entry" id="repo1-config">
[claudemods-v1]<br>
SigLevel = Never<br>
Server = https://claudemodsreloaded.co.uk/claudemods-v1/
<button class="copy-btn" data-target="repo1-config">Copy</button>
</div>
</div>
</div>
</section>

<section class="repo-card">
<div class="repo-header">
<div class="repo-name">claudemods-dev</div>
</div>
<div class="repo-content">
<div class="repo-section">
<div class="repo-section-title">Repository Configuration:</div>
<div class="repo-entry" id="repo2-config">
[claudemods-dev]<br>
SigLevel = Never<br>
Server = https://claudemodsreloaded.co.uk/claudemods-dev/
<button class="copy-btn" data-target="repo2-config">Copy</button>
</div>
</div>
</div>
</section>

<footer>
<p>claudemods Arch Linux Repositories &copy; 2023</p>
<p>Repository Server: https://claudemodsreloaded.co.uk/</p>
</footer>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const copyButtons = document.querySelectorAll('.copy-btn');

    copyButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const targetElement = document.getElementById(targetId);

            // Get the text content, but exclude the button text
            const textToCopy = targetElement.textContent.replace('Copy', '').trim();

            // Use the Clipboard API to copy text
            navigator.clipboard.writeText(textToCopy).then(() => {
                // Visual feedback
                const originalText = this.textContent;
                this.textContent = 'Copied!';
            this.classList.add('copied');

            setTimeout(() => {
                this.textContent = originalText;
                this.classList.remove('copied');
            }, 2000);
            }).catch(err => {
                console.error('Failed to copy text: ', err);
                alert('Failed to copy text to clipboard. Please copy manually.');
            });
        });
    });
});
</script>
</body>
</html>
