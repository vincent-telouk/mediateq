<?php

include_once "Manager.php";

function setUtilisateur($pseudo, $email, $password) {
    $resultat = false;
    $passconnect = hash('sha256', $mdp);
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('INSERT INTO abonnee (pseudo, password, mail) VALUES (:pseudo, :password, :mail)');
        var_dump($req);
        $req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $req->bindParam(':mail', $email, PDO::PARAM_STR);
        $req->bindParam(':password', $passconnect, PDO::PARAM_STR);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


?>