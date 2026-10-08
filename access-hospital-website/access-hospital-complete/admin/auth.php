<?php
declare(strict_types=1);require_once __DIR__.'/../config/config.php';
function admin_logged_in():bool{return !empty($_SESSION['admin_id']);}
function require_admin():void{if(!admin_logged_in())redirect('login.php');}
