<?php 
    $serveur = "localhost";
    $dbname = "aws_form";
    $user = "phpmyadmin";
    $pass = "M00delP4ssword./";
    
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //On insère les données reçues
        $sth = $dbco->prepare("SELECT * FROM participant");
        $sth->execute();
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Participants</title>
        <link rel="stylesheet" href="css/css2.css">
    </head>
    <body>
        <div class="container">
        <div>
            <h4>Listes des participants</h4>
        </div>
        <div class="button">
            <button><a href="form.html" style="text-decoration: none;">Ajouter des participants</a></button>
        </div>
        <div>
            <table class="responsive-table">
                <thead class="table-header">
                    <tr>
                        <th>N°</th>
                        <th>Nom</th>
                        <th>Prénoms</th>
                        <th>Numéro de téléphone</th>
                        <th>Adresse E-mail</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <?php while($row = $sth->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr class="table-row">
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['pname']); ?></td>
                        <td><?php echo htmlspecialchars($row['nb']); ?></td>
                        <td><?php echo htmlspecialchars($row['mail']); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        </div>
    </body>
</html>