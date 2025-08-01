<?php

    session_start();
    //session_destroy();
    if (!isset($_SESSION["contacts"])) {
       $_SESSION["contacts"] = [];
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        $name = $_POST["name"] ?? '';
        $email = $_POST["email"] ?? '';
        $message = $_POST["message"] ?? '';

        if(!empty($name) && !empty($email) && !empty($message)) {
            $newContact = [
                "name" => $name,
                "email" => $email,
                "message" => $message
            ];

            //nettoyer les données
            
            //enregistrer les données (dans cet exemple c'est dans la session en attendant de voir la bdd)

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <main>
        <form action="" method="POST">
            <input placeholder="name" type="text" id="name" name="name">
            <input placeholder="email" type="email" id="email" name="email">
            <input placeholder="message" type="message" id="message" name="message">
            <input type="submit" value="Envoyer">
        </form>
    </main>
</body>
</html>