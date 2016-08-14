<?php

setcookie("username", "", time()-100);

header("Location: index.php");