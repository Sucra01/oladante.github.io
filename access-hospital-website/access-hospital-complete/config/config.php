<?php
declare(strict_types=1);
const DB_HOST='127.0.0.1'; const DB_NAME='access_hospital'; const DB_USER='root'; const DB_PASS='';
const APP_NAME='Access Hospital'; const BASE_URL='/access-hospital';
date_default_timezone_set('Africa/Kampala');
if(session_status()!==PHP_SESSION_ACTIVE){ session_name('ACCESS_HOSPITAL'); session_start(); }
function db(): PDO { static $pdo; if($pdo instanceof PDO)return $pdo; $pdo=new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4',DB_USER,DB_PASS,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,PDO::ATTR_EMULATE_PREPARES=>false]); return $pdo; }
function e(?string $v):string{return htmlspecialchars($v??'',ENT_QUOTES,'UTF-8');}
function redirect(string $url):never{header('Location: '.$url);exit;}
function flash(?string $set=null):?string{ if($set!==null){$_SESSION['_flash']=$set;return null;} $v=$_SESSION['_flash']??null;unset($_SESSION['_flash']);return $v; }
function csrf_token():string{if(empty($_SESSION['_csrf']))$_SESSION['_csrf']=bin2hex(random_bytes(32));return $_SESSION['_csrf'];}
function csrf_field():string{return '<input type="hidden" name="csrf" value="'.e(csrf_token()).'">';}
function verify_csrf():void{if(!hash_equals($_SESSION['_csrf']??'',(string)($_POST['csrf']??''))){http_response_code(419);exit('Invalid CSRF token.');}}
function json_response(array $d,int $s=200):never{http_response_code($s);header('Content-Type: application/json');echo json_encode($d);exit;}
function require_post():void{if($_SERVER['REQUEST_METHOD']!=='POST')json_response(['success'=>false,'message'=>'POST request required.'],405);}
function audit(string $action,string $entity,?int $entityId=null,?string $details=null):void{try{ $s=db()->prepare('INSERT INTO audit_logs(admin_id,action,entity,entity_id,details) VALUES(?,?,?,?,?)');$s->execute([$_SESSION['admin_id']??null,$action,$entity,$entityId,$details]); }catch(Throwable $e){}}
