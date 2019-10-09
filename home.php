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

function combattant()
{
	require './views/combattant.php';
}

function pronostics_liste()
{
	require './views/liste_pronostics.php';
}

function resultats()
{
	require './views/resultats.php';
}

if(isset($_REQUEST['btnLogin'])){
	loginUser();
}elseif(isset($_POST['btnFightersList'])){
	combattants_liste();
}elseif(isset($_POST['btnFighter'])){
	combattant();
}elseif(isset($_POST['btnPronos'])){
	pronostics_liste();
}elseif(isset($_POST['btnResults'])){
	resultats();
}elseif(isset($_POST['btnCompet'])){
	competitions_liste();
}else{
	main();
}

?>