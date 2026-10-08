<?php
declare(strict_types=1);
const DB_HOST='127.0.0.1';const DB_NAME='access_hospital';const DB_USER='root';const DB_PASS='';
$message='';$error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
 try{$pdo=new PDO('mysql:host='.DB_HOST.';charset=utf8mb4',DB_USER,DB_PASS,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);$sql=file_get_contents(__DIR__.'/database.sql');$pdo->exec($sql);$message='Installation completed. You can now open the admin portal.';}catch(Throwable $e){$error='Installation failed: '.$e->getMessage();}
}
?><!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Access Hospital Setup</title><link rel="stylesheet" href="assets/css/admin.css"></head><body><main style="max-width:650px;margin:8vh auto;padding:20px"><div class="card"><h1>Access Hospital Setup</h1><p>This creates the Access Hospital MySQL database and all hospital management tables.</p><?php if($message):?><div class="flash"><?=htmlspecialchars($message)?></div><p><a class="btn" href="admin/login.php">Open Admin Portal</a></p><?php elseif($error):?><div class="flash"><?=htmlspecialchars($error)?></div><?php endif;?><form method="post"><button>Install / Reinstall Database</button></form><p class="muted">Warning: this setup imports database.sql, which resets the application tables. Do not run it against a live database unless you intend to reset it.</p></div></main></body></html>
