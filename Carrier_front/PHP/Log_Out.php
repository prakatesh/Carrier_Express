
<?php
    session_start();
    session_destroy();
    header("Location: ../HTML/Lab_Home.html");
?>