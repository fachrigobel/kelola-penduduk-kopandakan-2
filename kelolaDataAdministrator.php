<?php
session_start();

require_once 'functions.php';

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}
