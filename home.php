<?php
session_cache_expire(180);
session_start();

function main()
{
	require './views/index.php';
}

function loginUser()
{
	require './views/login.php';
}

function competitions_liste()
{
	require './views/competitions_liste.php';
}

function combattants_liste()
{
	require './views/combattants_liste.php';
}

function pronostics_liste()
{
	require './views/liste_pronostics.php';
}

if(isset($_REQUEST['btnLogin'])){
	loginUser();
}elseif(isset($_POST['btnFighter'])){
	combattants_liste();
}elseif(isset($_POST['btnPronos'])){
	pronostics_liste();
}elseif(isset($_POST['btnCompet'])){
	competitions_liste();
}else{
	main();
}

?>