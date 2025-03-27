<?php
$font_style = $_COOKIE['font_style'] ?? 'Arial';
$font_size = $_COOKIE['font_size'] ?? '16';
$font_color = $_COOKIE['font_color'] ?? '#000000';
$bg_color = $_COOKIE['bg_color'] ?? '#ffffff';
?>
<html>
<head>
    <title>Selected Preferences</title>
    <style>
        body { font-family: Arial; max-width: 500px; margin: 20px auto; padding: 10px; }
        .preference { margin: 10px 0; }
        button { background: #007bff; color: white; padding: 8px 15px; border: none; cursor: pointer; margin: 5px; }
    </style>
</head>
<body>
    <h2>Selected Preferences</h2>
    <div class="preference">Font Style: <?php echo htmlspecialchars($font_style); ?></div>
    <div class="preference">Font Size: <?php echo htmlspecialchars($font_size); ?>px</div>
    <div class="preference">Font Color: <?php echo htmlspecialchars($font_color); ?></div>
    <div class="preference">Background Color: <?php echo htmlspecialchars($bg_color); ?></div>
    <button onclick="window.location.href='apply.php'">Apply Preferences</button>
    <button onclick="window.location.href='index.php'">Change Preferences</button>
</body>
</html>