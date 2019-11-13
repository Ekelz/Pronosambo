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

function disconnect()
{
	// Unset all of the session variables.
	$_SESSION = array();
	
	// If it's desired to kill the session, also delete the session cookie.
	// Note: This will destroy the session, and not just the session data!
	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(
			session_name(),
			'',
			time() - 42000,
			$params["path"],
			$params["domain"],
			$params["secure"],
			$params["httponly"]
		);
	}
	
	// Finally, destroy the session.
	session_destroy();
	main();
}

if (isset($_REQUEST['btnLogin'])) {
	loginUser();
} elseif (isset($_POST['btnFightersList'])) {
	combattants_liste();
} elseif (isset($_POST['btnFighter'])) {
	combattant();
} elseif (isset($_POST['btnPronos'])) {
	pronostics_liste();
} elseif (isset($_POST['btnResults'])) {
	resultats();
} elseif (isset($_POST['btnCompet'])) {
	competitions_liste();
} elseif (isset($_POST['btnDC'])) {
	disconnect();
}else{
	main();
}

?>