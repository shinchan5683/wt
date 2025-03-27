<?php
$font_style = $_COOKIE['font_style'] ?? 'Arial';
$font_size = $_COOKIE['font_size'] ?? '16';
$font_color = $_COOKIE['font_color'] ?? '#000000';
$bg_color = $_COOKIE['bg_color'] ?? '#ffffff';
?>
<html>
<head>
    <style>
        body {
            font-family: <?php echo htmlspecialchars($font_style); ?>, sans-serif;
            font-size: <?php echo htmlspecialchars($font_size); ?>px;
            color: <?php echo htmlspecialchars($font_color); ?>;
            background-color: <?php echo htmlspecialchars($bg_color); ?>;
        }
    </style>
</head>
<body>
    <h1>Preferences Applied</h1>
    <p>Your selected preferences have been applied to this page.</p>
    <a href="index.php">Back to Settings</a>
</body>
</html>