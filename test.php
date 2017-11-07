<?php 
    if(isset($_GET['id_c'])){
        $id_c=(int)$_GET['id_c'];
        /////requete
    }
    if(isset($_POST['submit']))
    {
        extract($_POST);
        
        if(!preg_match("#[a-z0-9_.-]+@[a-z0-9_.-]+\.[a-z]{2,6}#",$email))
        {
            echo "Email erronée (Pas de majuscules)<br>";
            
        }
        if(!preg_match("#[0-9]{5}|2A|2B#",$CP))
        {
            echo "Code Postal erroné<br>";
            
        }
        if(!preg_match("#(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}#",$dateNaiss))
        {
            echo "Date de naissance erronée (jj/mm/aaaa)<br>";
            
        }
        if(!preg_match("#0[1-9]([. -]?[0-9]{2}){4}#",$numTel))
        {
            echo "Numéro de téléphone erroné<br>";
            
        }
        if(!preg_match("#(http://)?www\.[a-z0-9]+\.[a-z]{2,6}#",$url))
        {
            echo "URL erronée (http://www.xxxxxxxx.xx)<br>";
            
        }
        if(!preg_match("#[A-ZÀÁÂÃÄÅÆÒÓÔÕÖØÈÉÊËÇÌÍÎÏÙÚÛÜÑ -]+#",$nom))
        {
            echo "Nom erroné (Tout en majuscule)<br>";
            
        }
        if(!preg_match("#[a-àáâãäåòóôõöøèéêëçìíîïùúûüÿñ-]+#",$prenom))
        {
            echo "Prénom errone (Tout en minuscule)<br>";
            
        }
        
        if ($id=""){
            $requete=$bdd->prepare("INSERT INTO user(nom, prenom, email) VALUES(:nom,:prenom,:email)");
            
            $requete->bindValue(':nom',$nom,PDO::PARAM_STR);
            $requete->bindValue(':prenom',$prenom,PDO::PARAM_STR);
            $requete->bindValue(':email',$email,PDO::PARAM_STR);
            
            $requete->execute();
            
            ?>
            
            <div class='alert'>
                <?= "bonjour".$nom ?>
            </div>
            <?php
        }
    }
?>
<link rel="stylesheet" href="/jquery-ui.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script type="text/javascript">
$.datepicker.setDefaults(
    {
        altField: "#datepicker",
        closeText: 'Fermer',
        prevText: 'Précédent',
        nextText: 'Suivant',
        currentText: 'Aujourd\'hui',
        monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
        monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
        dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
        dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
        dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
        weekHeader: 'Sem.',
        dateFormat: 'dd-mm-yy'
    }
);
 
 
</script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

<form action="" method="post">
    Nom: <input type="text" name="nom" pattern="[A-ZÀÁÂÃÄÅÆÒÓÔÕÖØÈÉÊËÇÌÍÎÏÙÚÛÜÑ -]+"><br>
    Prenom: <input type="text" name="prenom" pattern="[a-zàáâãäåòóôõöøèéêëçìíîïùúûüÿñ]+"><br>
    Email: <input type="email" name="email" pattern="[a-z0-9_.-]+@[a-z0-9_.-]+\.[a-z]{2,6}"><br>
    Code Postal: <input type="text" name="CP" pattern="[0-9]{5}|2A|2B"><br>
    Nate de Naissance (jj/mm/aaaa): <input type="text" name="dateNaiss" id="datepicker" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}"><br>
    Numéro de Tel: <input type="text" name="numTel" pattern="0[1-9]([. -]?[0-9]{2}){4}"><br>
    URL de votre site: <input type="text" name="url" pattern="(http://)?www\.[a-z0-9]+\.[a-z]{2,6}"><br>
    <input type="hidden" name="id" value="">
    <input type="submit" name="submit"><br>
</form>