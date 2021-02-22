<?php
session_start();
session_unset();
session_destroy();
echo '<script type="text/javascript">';
echo ' alert("You have been logged out.")';
echo '</script>';
?>