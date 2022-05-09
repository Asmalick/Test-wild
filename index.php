<?php
require_once('cnx.php');

$select_sql = "SELECT * FROM membre";
$rs_select = $cnx->prepare($select_sql);
$rs_select->execute();


$message = '';

if (isset($_POST['name'])) {
    if(empty($_POST['name'])) {
        $message ='<p class="msg-1">Remplissez ce champ svp! </p>';
    } else {
        $sql = "INSERT INTO membre (nom) VALUES (?)";
        $rs_insert = $cnx->prepare($sql);
        $var_nom    = $_POST['name'];
        $rs_insert->bindValue(1,$var_nom,PDO::PARAM_STR);

        $rs_insert->execute();
        $message = '<p class="msg-2">Bienvenue! </p>';
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Header section -->
<header>
  <h1>
    <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
    Les Argonautes
  </h1>
</header>


<!-- Main section -->
<main>
  
  <!-- New member form -->

  <h2>Ajouter un(e) Argonaute</h2>
  <form class="new-member-form" method="POST" action="">
  
    <label for="name">Nom de l&apos;Argonaute</label>
    <input id="name" name="name" type="text" placeholder="Charalampos" />
    <button type="submit">Envoyer</button>
  </form>
  
  <!-- Member list -->
  <h2>Membres de l'équipage</h2>
  <!--<section class="member-list">
    <div class="member-item">Eleftheria</div>
    <div class="member-item">Gennadios</div>
    <div class="member-item">Lysimachos</div>
  </section>-->
  <?php
  
?>

<?php 
$donnees = $rs_select->fetchAll(PDO::FETCH_ASSOC);
$lists = array_chunk($donnees, 3,true);

foreach ($lists as $list) {
    echo '<ul class="member">';
        foreach ($list as $values => $Nom) {
            echo '<li>'.$Nom['Nom'].'</li>';
        }
    echo '</ul>';
}
?>  

</main>

<?=  $message; ?>
<footer>
  <p>Réalisé par Jason en Anthestérion de l'an 515 avant JC</p>
</footer>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script> 
</body>
</html>
