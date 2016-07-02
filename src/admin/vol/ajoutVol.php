<?php
require_once('../../../Entity/connexion_db.php');
$bdd = connexion_db::getInstance();
session_start();

if($_SESSION['admin'] == true) {
    //echo 'OK';

    if(isset($_POST['prix_vol']) ){
        try {
            $req = $bdd->exec("INSERT INTO vol (prix_vol, date_depart, date_arrivee, nb_places_vol, nb_corresp_vol, id_comp, id_dest, id_aero, id_aero_AEROPORT) VALUES ('" . $_POST['prix_vol'] . "','" . $_POST['date_dep_vol'] . "','" . $_POST['date_arr_vol'] . "','" . $_POST['nbplaces_vol'] . "','" . $_POST['nbcorress_vol'] . "','" . $_POST['compagnie_vol'] . "','" . $_POST['destination_vol'] . "','" . $_POST['aero_dep_vol'] . "','" . $_POST['aero_arr_vol'] . "')");
            echo 'aeroport ajoutée';
        }

        catch(Exception $ex){
            echo 'erreur lors de l\'ajout du vol '.$ex->getMessage().$_POST['aero_dep_vol'].$_POST['aero_arr_vol'];
        }
    }
}

else {
    echo 'KO';
} ?>

<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <ul class="nav navbar-nav">
            <li ><a href="http://localhost/OracleACSIProject/src/admin/admin.php">Home</a></li>
            <li ><a href="http://localhost/OracleACSIProject/src/admin/destination/ajoutDestination.php">Destination</a></li>
            <li><a href="http://localhost/OracleACSIProject/src/admin/compagnie/ajoutCompagnie.php">Compagnie</a></li>
            <li class="active"><a href="http://localhost/OracleACSIProject/src/admin/vol/ajoutVol.php">Vol</a></li>
            <li><a href="http://localhost/OracleACSIProject/src/admin/aeroport/ajoutAeroport.php">Aeroport</a></li>
        </ul>
    </div>
</nav>

<!-- Ajout de vol -->

<form  method="post" action="">
    <h1>Ajouter Vol</h1>
    <input type="number" step="any" class="form-control" placeholder="Prix du vol" name="prix_vol" required><br>
    <input type="datetime-local" class="form-control" placeholder="Date de départ" name="date_dep_vol" required><br>
    <input type="datetime-local" class="form-control" placeholder="Date d'arrivée" name="date_arr_vol" required><br>
    <input type="number" class="form-control" placeholder="Nombre de places" name="nbplaces_vol" required><br>
    <input type="number" class="form-control" placeholder="Nombre de correspondances" name="nbcorress_vol" required><br>
    <select name="destination_vol" id="sel1" class="form-control">
        <?php

        $list = $bdd->query('SELECT * FROM destination');
        while ($data = $list->fetch()) {
            echo "<option value =".$data['id_dest'].">".$data['libelle_dest']."</option>";
        }
        ?>
    </select><br><br>
    <select name="aero_dep_vol" id="sel1" class="form-control">
        <?php

        $list = $bdd->query('SELECT * FROM aeroport');
        while ($data = $list->fetch()) {
            echo "<option value =".$data['id_aero'].">".$data['libelle_aero']."</option>";
        }
        ?>
    </select><br><br>

    <select name="aero_arr_vol" id="sel1" class="form-control">
        <?php

        $list = $bdd->query('SELECT * FROM aeroport');
        while ($data = $list->fetch()) {
            echo "<option value =".$data['id_aero'].">".$data['libelle_aero']."</option>";
        }
        ?>
    </select><br><br>

    <select name="compagnie_vol" id="sel1" class="form-control">
        <?php

        $list = $bdd->query('SELECT * FROM compagnie');
        while ($data = $list->fetch()) {
            echo "<option value =".$data['id_comp'].">".$data['libelle_comp']."</option>";
        }
        ?>
    </select><br><br>

    <button class="btn btn-lg btn-primary btn-block" id="button-login" type="submit">Add</button>
</form>
