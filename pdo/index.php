<?php

require_once 'connec.php';


if (isset($_POST['firstname']) && $_POST['firstname'] != " " && isset($_POST['lastname']) && $_POST['lastname'] != " ") {
$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']); 


$query = "INSERT INTO friend (firstname, lastname) VALUES (:firstname,  :lastname)";
$statement = $pdo->prepare($query);

$statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
$statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);

$statement->execute();

$friends = $statement->fetchAll();
}


$query = "SELECT * FROM friend";
$statement = $pdo ->query($query);
$friends = $statement->fetchAll();

foreach ($friends as $perso)
        {
            echo '<li>' . $perso['firstname']. ' ' . $perso['lastname']. '</li>';
        }
?>

<!doctype html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>Document</title>
    </head>
    <body>
        <form method="post" >
            <fieldset>
                <input type="text" name="firstname" placeholder="firstname" maxlength="45">
                <input type="text" name="lastname" placeholder="lastname" maxlength="45">
                <input type="submit">
            </fieldset>
        </form>
    </body>
</html>
