<?php
session_start();
session_unset();
session_destroy();
header("Location: /Menu-Makan/dashboard.php");
exit();