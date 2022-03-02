<?php
session_start();

$pdo = new PDO('mysql:host=localhost;dbname=team', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING) );

$error = '';
$content = '';