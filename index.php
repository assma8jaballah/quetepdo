
<?php

require_once 'connec.php';

$pdo = new PDO(DSN, USER, PASS);

$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QUETE PDO FRIENDS</title>
</head>
<body>
    <ul>

<?php
foreach ($friends as $key => $friend) {
  
    ?>
        <li>
        <?php echo $friend['firstname'] . ' ' . $friend['lastname'] ?>
        </li>

<?php
}

?>
    </ul>
    <br>
    <form action="#" method="post">
        <label for="firstname">Firstname : </label>
        <input type="text" id="firstname" name="firstname" required>
        <br>
        <label for="lastname">Lastname : </label>
        <input type="text" id="lastname" name="lastname" required>
        <br>
        <button type="submit">Soumettre</button>
    </form>

    <?php

  
$firstname = trim($_POST['firstname']); 
$lastname = trim($_POST['lastname']);

$query = 'INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)';
$statement = $pdo->prepare($query);

$statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
$statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);

$statement->execute();


    ?>
</body>
</html>