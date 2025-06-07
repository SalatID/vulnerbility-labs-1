<?php
$dir = __DIR__;
$files = scandir($dir);

echo "<h2>Index of /backup</h2><ul>";
foreach ($files as $file) {
    if ($file === '.' || $file === '..') continue;
    $url = htmlspecialchars($file);
    echo "<li><a href=\"/backup/$url\">$url</a></li>";
}
echo "</ul>";