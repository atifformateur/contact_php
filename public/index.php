<?php

    session_start();
    //session_destroy();
    if (!isset($_SESSION["contacts"])) {
       $_SESSION["contacts"] = [];
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $name = htmlspecialchars(trim($_POST["name"] ?? ''));
        $email = htmlspecialchars(trim($_POST["email"] ?? ''));
        $message = htmlspecialchars(trim($_POST["message"] ?? ''));

        if(!empty($name) && !empty($email) && !empty($message)) {

            $newContact = [
                "name" => $name,
                "email" => $email,
                "message" => $message
            ];

            $_SESSION['contacts'][] = $newContact;


        }
    }
    $contacts = $_SESSION['contacts'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../asset/css/style.css">
</head>
<body>
    <h1>Formulaire de contact</h1>
     <main>
        <section>
            <h2>Le formulaire</h2>
            <form class="formContainer" action="" method="POST">
                <div>
                    <input placeholder="name" type="text" id="name" name="name">
                </div>
                <div>
                    <input placeholder="email" type="email" id="email" name="email">
                </div>
                <div>
                    <input placeholder="message" type="message" id="message" name="message">
                </div>
                <div>
                    <input type="submit" value="Envoyer">
                </div>
            </form>
        </section>
        <section>
            <h2>Nos messages reçu</h2>
            <div class="contactContainer">
                <?php 
                    if(!empty($contacts)) {
                        foreach ($contacts as $contact) {
                            echo "
                            <article>
                                <h3>$contact[name]</h3>
                                <span>l'email est: $contact[email]</span>
                                <p>
                                    $contact[message]
                                </p>
                            </article>
                            ";
                        }
                        
                    }else{
                        var_dump($_SESSION['contacts']);
                        echo "
                            <p>
                                Nous n'avons pas reçu de messages!
                            </p>
                        ";
                    }
                ?>
            </div>
        </section>
    </main>
</body>
</html>