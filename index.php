<?php
if (!isset($_SESSION)) {
    header('Location: login.php');
} else {
    echo 'yes';
}
?>