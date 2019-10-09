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

function combattants_liste()
{
	require './views/combattants_liste.php';
}

function combattant()
{
	require './views/combattant.php';
}

function pronostics_liste()
{
	require './views/liste_pronostics.php';
}

if(isset($_REQUEST['btnLogin'])){
	loginUser();
}elseif(isset($_POST['btnFightersList'])){
	combattants_liste();
}elseif(isset($_POST['btnFighter']) || isset($_REQUEST['btnFighter'])){
	combattant();
}elseif(isset($_POST['btnPronos'])){
	pronostics_liste();
}else{
	main();
}

?>