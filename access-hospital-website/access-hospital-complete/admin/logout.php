<?php require_once __DIR__.'/auth.php'; if(admin_logged_in())audit('logout','admin',(int)$_SESSION['admin_id']);session_unset();session_destroy();redirect('login.php');
