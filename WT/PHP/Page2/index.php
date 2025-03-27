<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    setcookie('font_style', $_POST['font_style'], time() + 3600, '/');
    setcookie('font_size', $_POST['font_size'], time() + 3600, '/');
    setcookie('font_color', $_POST['font_color'], time() + 3600, '/');
    setcookie('bg_color', $_POST['bg_color'], time() + 3600, '/');
    header('Location: display.php');
    exit;
}
?>
<html>
<body>
    <form method="POST">
        <div >
            <label for="font_style">Font Style:</label>
            <select name="font_style" id="font_style" required>
                <option value="Times New Roman">Times New Roman</option>
                <option value="Courier New">Courier New</option>
            </select>
        </div>
        <div >
            <label for="font_size">Font Size (px):</label>
            <select name="font_size" id="font_size" required>
                <option value="12">12px</option>
                <option value="16">16px</option>
            </select>
        </div>
        <div >
            <label for="font_color">Font Color:</label>
            <input type="color" name="font_color" id="font_color" value="#000000" required>
        </div>
        <div >
            <label for="bg_color">Background Color:</label>
            <input type="color" name="bg_color" id="bg_color" value="#ffffff" required>
        </div>
        <button type="submit">Save</button>
    </form>
</body>
</html>