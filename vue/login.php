<?php

session_start();
echo "test";

echo $_POST['email'];
echo $_POST['password'];
if (isset($_POST['email'], $_POST['pass'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $db = new PDO('mysql:host=localhost;dbname=mediateq', 'root');

    $sql = "SELECT * FROM user where email = ?";
    $result = $db->prepare($sql);
    $result->execute($email);

    if ($result->rowCount() > 0) {
        $data = $result->fetch();

        if (password_verify($pass, $data['password'])) {
            echo "Connexion effectuée";
            $_SESSION['email'] = $email;
        }
    } else {
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (email, password) VALUES (?, ?)";
        $result = $db->prepare($sql);
        $result->execute($email, $hashedPassword);

        echo "Enregistrement effectué";
    }
}