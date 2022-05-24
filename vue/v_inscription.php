<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Inscritpion</title>
  <link rel="stylesheet" href="style.css">

</head>
<body>
<body>
 
 <div align="center"> 
 <h1> Inscription </h2> 
 <br/> 
 <form method="POST" action='./v_inscription.php'> 

 <table>
 <tr>
 <td align="right">
     <label for="pseudo">Pseudo : </label>
 </td>
 <td>
 <input type="text" placeholder ="Votre pseudo" id="pseudo" name ="pseudo" /> 
 </td>
 </tr>
 <tr>
     <td align="right">
     <label for="mail">Mail : </label>
     </td>
 <td>
 <input type="email" placeholder ="Votre mail" id="mail" name ="email" /> 
 </td>
 </tr>
 <tr>
     <td align="right" >
     <label for="mdp">Mot de passe : </label>
     </td>
 <td>
 <input type="password" placeholder ="Votre mot de passe" id="pass" name ="mdp" /> 
 </td>
 </tr>
 </table> 
 </br>
 <input type="submit" name="forminscription" value="Je m'inscris" />
 <br>
<?php
if(isset($erreur)){
    echo $erreur;
}
?>
</br>
</body>
</html>
</body>
</html>