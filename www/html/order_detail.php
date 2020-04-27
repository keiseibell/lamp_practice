<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'order.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);

$token = $_POST['csrf_token'] ;

if(is_valid_csrf_token($token) !== false){
  $data = get_order_detail($db,$_POST["order_id"]);
}
include_once VIEW_PATH . 'order-detail-view.php';