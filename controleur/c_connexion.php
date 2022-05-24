<?php
if(!isset($_SESSION)){
    session_start();
}
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}


// // get current logged in user   


// recuperation des donnees GET, POST, et SESSION


if(isset($_POST['formconnexion'])){
    //echo "ok";
    $pseudoconnect = $_POST['formmail'];
    $passconnect = hash('sha256', $_POST['formmdp']);
    $passconnect = $_POST['formmdp'];

    //echo $pseudoconnect . ' ' . $passconnect;
    //echo "test";

$db = new PDO('mysql:host=localhost;dbname=mediateq', 'root', '');
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM abonnee where email = '$pseudoconnect' and password = '$passconnect'";
   // echo $sql;
    $result = $db->prepare($sql);
    $result->execute();
    $row = $result->rowCount();
    $fetch= $result->fetch();
    if ($row > 0){

                  echo"<center><h5 class='text-success'>Login successfully, hello $pseudoconnect</h5></center>";
                  $_SESSION['email'] = $pseudoconnect;
            } else{
                echo"<center><h5 class='text-danger'>Invalid username or password</h5></center>";
            }
    
    //login($pseudoconnect, $passconnect);
    
}
else
    {
        $erreur = "erreur";
    }
// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


// traitement si necessaire des donnees recuperees


// appel du script de vue qui permet de gerer l'affichage des donnees
/*if(isLoggedOn()){
     include "$racine/controleurs/".controleurPrincipal("defaut"); //page par défaut : si connecté catalogue, sinon connexion
} else {*/
    $title = "Connexion";
    include "$racine/vue/header.php";
    include "$racine/vue/v_connexion.php";
    include "$racine/vue/footer.php";
    include "$racine/modele/authentification.php";
 
?>