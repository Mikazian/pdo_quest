<?php
require_once '_connec.php';
$pdo = new \PDO(DSN, USER, PASS);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO</title>
</head>
<body>

    <section class="friends-list">
        <h1>Liste des Friends</h1>
        <!-- récupération dans la BDD -->
        <?php
            $query = "SELECT * FROM friend";
            $statement = $pdo->query($query);
            $friendsArray = $statement->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($friendsArray);
        ?>

        <!-- boucle -->
        <?php foreach($friendsArray as $friend): ?>
        <!-- liste -->
        <ul>
            <li><?= $friend['firstname'] . ' ' . $friend['lastname']; ?></li>
        </ul>
        <?php endforeach ?>
    </section>
    
    <section class="form-container">
        <h1>Ajouter un Friend</h1>

        <!-- formulaire -->
        <form action="success.php" method="post">
            <div class="form-content">
                <label for="firstname">Firstname</label>
                <input type="text" id="firstname" name="firstname" required>
                <label for="lastname">Lastname</label>
             <input type="text" id="lastname" name="lastname" required>
            </div>
            
            <div class="form-btn">
                <input type="submit" value="Envoyer">
            </div>
        </form>
    </section>
    
</body>
</html>