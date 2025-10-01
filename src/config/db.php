<?php
require __DIR__ . '/config.local.php'; // Fichier non versionné dans git pour ne pas exposer les identifiants de connexion

// Connexion à la base de données
try { //On essaye de se connecter à la base de données
  //PDO permet de se connecter à une base de données en utilisant PHP
$sqlClient = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD,[ 
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]); //on transmet les variables de connexion, on ajoute une option de gestion d'erreur car PDO ne le fait pas par défaut et une option pour que les résultats soient retournés sous forme de tableau associatif.

} catch (Exception $e) { //Si la connexion échoue, on attrape l'erreur avec PDOException
  die('Erreur : ' . $e->getMessage()); //die arrête l'exécution du script et affiche le message d'erreur
}

?>