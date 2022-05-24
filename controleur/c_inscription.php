<?php
/*if(isset($_POST['forminscription'])){
    
    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['password']))
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mail = htmlspecialchars($_POST['mail']);
        $password = $_POST['password'];
    }
    else
    {
        $erreur = "erreur";
    }*/
 
    function forminscription(){
        $pseudo=$_POST['pseudo'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        $count=$this->model->check_user($user_name,$email_id);
        if($count > 0){
        echo 'This User Already Exists';
        }
        else{
        $data = array(
        'id' =>null,
        'pseudo' =>$_POST['pseudo'],
        'password' =>$_POST['password'],
        'email' =>$_POST['email']
        );
        $this->model->insert_user($data);
        }
    /*$pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = $_POST['mdp'];
    $mdp2 = $_POST['mdp2'];
    */
    
    function setUtilisateur($pseudo, $email, $password) {
        $resultat = false;
        echo "test";
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

}

// appel du script de vue qui permet de gerer l'affichage des donnees
include "$racine/vue/header.php";
include "$racine/vue/v_inscription.php";
include "$racine/vue/footer.php";
?>