<?php
abstract class BddManager{
	private static $bdd;
	/**
	 * Fonction permettant la connexion à la base de données
	 *
	 * @return object # objet connexion base de données PDO
	 */
	private static function getBdd()
	{
		if(self::$bdd == null){
			self::$bdd = new PDO('mysql:host='.host.'; dbname='.nombase , user , password);
			self::$bdd->exec('SET NAMES utf8');
			self::$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
		return self::$bdd;
	}
	
	// Exécute une requête SQL éventuellement paramétrée
	protected function executerRequete($sql, $params = null) {
		if ($params == null) {
			$resultat = self::getBdd()->query($sql);    // exécution directe
		}
		else {
			$resultat = self::getBdd()->prepare($sql);  // requête préparée
			$resultat->execute($params);
		}
		return $resultat;
	}
}
?>