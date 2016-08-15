<?php
session_start();

// session'ı sonlandıralım
session_destroy();

header("Location: index.php");