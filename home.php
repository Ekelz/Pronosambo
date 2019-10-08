<?php
session_cache_expire(180);
session_start();

function main()
{
	require './views/index.php';
}

function login()
{
	require './views/login.php';
}

if(isset($_POST['btnLogin']))
{
	login();
}else{
	main();
}

?>