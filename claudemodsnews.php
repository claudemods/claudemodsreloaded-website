<?php
# v1.0 25-07-2025
# ui created its cool
# img arch iso creator is working now 
date_default_timezone_set('Europe/London');

$news_items = [
    [
        'title' => 'claudemods Distribution News',
        'content' => 'No new updates available at this time. Current available builds can be found at: 
        <a href="https://drive.google.com/drive/folders/1PsEbYVgRC8RP8SX7nfJle6CM4OjeK9HJ" target="_blank" style="color: #00ffff;">Google Drive Download Link</a>',
        'date' => date('d-m-Y'),
        'author' => 'claudemods',
        'category' => 'distro'
    ],
    [
        'title' => 'claudemods website v3.01.1',
        'content' => 'Latest changes:
        - New claudemods news button (25-03-2025)
        - Improved responsive design
        - Enhanced security features',
        'date' => date('d-m-Y'),
        'author' => 'claudemods',
        'category' => 'website'
    ],
    [
        'title' => 'Apex Arch/CachyOS',
        'content' => 'Current builds:
        - Apex KLGE Minimal v1.0 (17-03-2025)
        - Apex Gamester v1.0 (11-02-2025)
        - Apex CKGE Full v1.04.2 (31-05-2025)
        - Apex CKHE Full v1.02 (05-06-2025)',
        'date' => date('d-m-Y'),
        'author' => 'claudemods',
        'category' => 'distro'
    ],
    [
        'title' => 'Spitfire Arch/CachyOS',
        'content' => 'Current builds:<br>- Spitfire CKGE Minimal v1.0 (02-06-2025)<br>- Spitfire CKGBE Minimal v1.0 (02-06-2025)<br>- Spitfire CKHE Minimal v1.01 (13-06-2025)<br><br>Spitfire Alpine:<br>- Spitfire AKGE Minimal v1.0 (11-07-2025)',
        'date' => date('d-m-Y'),
        'author' => 'claudemods',
        'category' => 'distro'
    ],
    [
        'title' => 'Scripts & Apps',
        'content' => 'claudemods C++ Arch Img/Iso Script Beta v2.01 released (' . date('d-m-Y') . ')<br><br>New fixes for .img and new "Update Script" Option It Now Works. Menu:<br><ul><li>Guide</li><li>Setup Scripts</li><li>Create Image</li><li>Create ISO</li><li>Show Disk Usage</li><li>Install ISO to USB</li><li>CMI BTRFS/EXT4 Installer</li><li>Update Script</li><li>Exit</li></ul>',
        'date' => date('d-m-Y'),
        'author' => 'claudemods',
        'category' => 'scripts'
    ]
];

// Get current category from URL or default to 'all'
$current_category = isset($_GET['category']) ? $_GET['category'] : 'all';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>claudemods News Portal</title>
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
            max-width: 1200px;
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
        
        .layout {
            display: grid;
            grid-template-columns: 200px 1fr;
            gap: 15px;
            margin-top: 15px;
        }
        
        .sidebar {
            background: var(--dark-bg);
            border-radius: 10px;
            padding: 15px;
            height: fit-content;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .sidebar h3 {
            color: var(--secondary-color);
            margin-bottom: 10px;
            padding-bottom: 8px;
            border-bottom: 1px solid var(--secondary-color);
            font-size: 1.1em;
        }
        
        .category-list {
            list-style: none;
        }
        
        .category-list li {
            margin-bottom: 8px;
        }
        
        .category-list a {
            color: var(--accent-color);
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
            padding: 6px 8px;
            border-radius: 5px;
            font-size: 0.9em;
        }
        
        .category-list a:hover, .category-list a.active {
            background: var(--highlight);
            color: var(--highlight-text);
            transform: translateX(5px);
        }
        
        .category-list i {
            margin-right: 8px;
            width: 16px;
            text-align: center;
        }
        
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 15px;
        }
        
        .news-item {
            background: var(--card-bg);
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: fadeInUp 0.8s ease-out forwards;
            border-left: 3px solid var(--secondary-color);
        }
        
        .news-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
            background: rgba(0, 50, 100, 0.6);
        }
        
        .news-item h2 {
            color: var(--secondary-color);
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 1.2em;
        }
        
        .news-meta {
            display: flex;
            justify-content: space-between;
            font-size: 0.8em;
            color: var(--accent-color);
            margin-bottom: 10px;
            padding-bottom: 8px;
            border-bottom: 1px dashed rgba(0, 255, 255, 0.3);
        }
        
        .news-content {
            white-space: pre-line;
            margin-bottom: 10px;
            font-size: 0.9em;
        }
        
        .news-content ul, .news-content ol {
            padding-left: 18px;
            margin: 8px 0;
            font-size: 0.9em;
        }
        
        .news-content li {
            margin-bottom: 4px;
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
        
        .news-category {
            display: inline-block;
            background: rgba(0, 255, 255, 0.2);
            padding: 2px 8px;
            border-radius: 20px;
            font-size: 0.75em;
            margin-top: 8px;
            color: var(--accent-color);
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
        
        /* Adjusted animation delays for the news items to make bottom two smaller */
        .news-item:nth-child(1) { 
            animation-delay: 0.4s; 
            grid-column: span 1;
        }
        .news-item:nth-child(2) { 
            animation-delay: 0.6s; 
            grid-column: span 1;
        }
        .news-item:nth-child(3) { 
            animation-delay: 0.8s; 
            grid-column: span 1;
        }
        .news-item:nth-child(4) { 
            animation-delay: 1.0s; 
            grid-column: span 1;
        }
        .news-item:nth-child(5) { 
            animation-delay: 1.2s; 
            grid-column: span 1;
        }
        
        /* Make all news items equal size */
        .news-item {
            min-height: 250px;
            display: flex;
            flex-direction: column;
        }
        
        .news-content {
            flex-grow: 1;
        }
        
        @media (max-width: 768px) {
            .layout {
                grid-template-columns: 1fr;
            }
            
            .news-grid {
                grid-template-columns: 1fr;
            }
            
            .news-item {
                min-height: auto;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1><i class="fas fa-newspaper"></i> claudemods News Portal</h1>
            <p class="subtitle">Latest updates as of <?= date('d-m-Y H:i:s') ?> (UK Time)</p>
        </header>
        
        <div class="layout">
            <aside class="sidebar">
                <h3><i class="fas fa-filter"></i> Categories</h3>
                <ul class="category-list">
                    <li><a href="?category=all" class="<?= $current_category === 'all' ? 'active' : '' ?>"><i class="fas fa-star"></i> All News</a></li>
                    <li><a href="?category=distro" class="<?= $current_category === 'distro' ? 'active' : '' ?>"><i class="fas fa-linux"></i> Distributions</a></li>
                    <li><a href="?category=scripts" class="<?= $current_category === 'scripts' ? 'active' : '' ?>"><i class="fas fa-code"></i> Scripts</a></li>
                    <li><a href="?category=website" class="<?= $current_category === 'website' ? 'active' : '' ?>"><i class="fas fa-globe"></i> Website</a></li>
                </ul>
                
                <h3 style="margin-top: 20px;"><i class="fas fa-info-circle"></i> About</h3>
                <p style="font-size: 0.85em; line-height: 1.4;">
                    claudemods provides custom Linux distributions and development tools for advanced users.
                </p>
            </aside>
            
            <main class="news-main">
                <div class="news-grid">
                    <?php foreach($news_items as $item): ?>
                        <?php if($current_category === 'all' || $current_category === $item['category']): ?>
                            <article class="news-item">
                                <h2><?= htmlspecialchars($item['title']) ?></h2>
                                <div class="news-meta">
                                    <span><i class="far fa-calendar-alt"></i> <?= htmlspecialchars($item['date']) ?></span>
                                    <span><i class="far fa-user"></i> <?= htmlspecialchars($item['author']) ?></span>
                                </div>
                                <div class="news-content"><?= $item['content'] ?></div>
                                <div class="news-category">
                                    <i class="fas fa-tag"></i> <?= ucfirst($item['category']) ?>
                                </div>
                            </article>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    
                    <?php if($current_category !== 'all' && !in_array($current_category, array_column($news_items, 'category'))): ?>
                        <article class="news-item">
                            <h2>No News Found</h2>
                            <div class="news-content">There are no news items in this category at the moment.</div>
                        </article>
                    <?php endif; ?>
                </div>
            </main>
        </div>
        
        <footer>
            <p>&copy; <?= date('Y') ?> claudemods. All rights reserved.</p>
            <p>Last updated: <?= date('d-m-Y H:i:s') ?> (UK Time)</p>
        </footer>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add click effect to news items
            document.querySelectorAll('.news-item').forEach(item => {
                item.addEventListener('click', function() {
                    this.style.transform = 'scale(0.98)';
                    setTimeout(() => { this.style.transform = '' }, 200);
                });
            });
            
            // Animate elements as they come into view
            const animateOnScroll = () => {
                const elements = document.querySelectorAll('.news-item');
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
