<?php
session_start();
if (!isset($_SESSION['page_visits'])) {
    $_SESSION['page_visits'] = 0;
}
$_SESSION['page_visits']++;
?>
<h1>Page Visit Counter</h1>
<p>This page has been visited <?php echo $_SESSION['page_visits']; ?> time(s) during this session.</p>