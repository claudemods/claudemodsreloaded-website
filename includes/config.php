<?php
/** Copyright (c) 2023-2026 claudemods
 * Shared settings for every page. Change a value here once and it updates everywhere.
 */

$site_version = 'v4.0';
$copyright    = 'Copyright (c) 2023-2026 claudemods';

/**
 * Returns an asset path with a ?v= stamp from the file's modified time.
 * After you re-upload a CSS/JS file with FileZilla, browsers fetch the new copy
 * automatically instead of showing the old cached one.
 */
function asset($path)
{
    $file = __DIR__ . '/../' . $path;
    $v = is_file($file) ? filemtime($file) : '1';
    return htmlspecialchars($path . '?v=' . $v);
}
