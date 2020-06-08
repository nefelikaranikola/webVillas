<?php


//έστω μια νέα ημ/νία λήξης, 120 μέρες μετά
$expire = time() + 120*24*60*60;

//βάζουμε το νέο cookie στον browser του χρήστη
setcookie('css', $_POST['css'], $expire, '/');

//var_dump((isset($_COOKIE['css']) && $_COOKIE['css'] == 'light') ? 'bg-light' : 'bg-dark'); die;

header("Location: /");
exit;

?>

