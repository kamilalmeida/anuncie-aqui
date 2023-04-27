<?php

session_start();
unset($_SESSION['cLogin']);
session_destroy();
header("Location:index.php");