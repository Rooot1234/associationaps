<?php 
    try{
        $idreq=new PDO ('mysql:host=localhost;dbname=armand', 'root', '');
        $idreq->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOExeption $z) {
        echo" erreur : ".$z->getmessage();
    }  
    if (isset($_POST['submi'])) {
       $nom= $_POST['nom'];
       $prenom= $_POST['prenom'];
       $tel= $_POST['num'];
       $email=$_POST['mail'];
       
       $sql=("INSERT INTO `armand`(`Nom`, `Prenom`, `Num`, `Mail`) VALUES (:nom,:prenom,:num,:mail)");
       $st=$idreq->prepare($sql);

       $st->bindParam(':nom',$nom);
       $st->bindParam(':prenom',$prenom);
       $st->bindParam(':num',$tel);
       $st->bindParam(':mail',$email);
       $st->execute();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>membre</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
		<span><a href="index.php"><strong>Acceuil &nbsp;&nbsp;</strong>  </a></span>
		<span><a href="Connaissance.php"><strong>Nous connaitre &nbsp; &nbsp;</strong></a></span>
		<span><a href="projets.php"><strong>Nos projets  &nbsp;&nbsp;</strong></a></span>
	    <span><a href="Devenir_membre.php"><strong> Devenir membre  &nbsp;&nbsp; </strong></a></span>
		<span><a href="blog.php"><strong> Blog   &nbsp;&nbsp;</strong></a></span>
		<span><a href="contact.php"><strong> Contact  &nbsp;&nbsp; </strong></a></span>
        <hr>
	</header>
	
    <fieldset class="inmenbre">
        <legend> <h2> Devenir membre </h2></legend>
        <p> Souhaitez-vous devenir membre ? </p>
        <form action="Devenir_membre.php" method="POST" enctype="multipart/form-data" >
            <label for="nom"> <strong>Nom</strong> </label> <br>
            <input type="text" name="nom" id="nom" placeholder="Entrez votre nom svp" size="30" height="30" > <br> <br>
            <label for="prenom"> <strong>Prenom</strong> </label> <br>
            <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prenom svp" size="30" height="30" > <br> <br>
            <label for="number"> <strong>Numéro de mobile </strong> </label> <br>
            <input type="number" name="num" id="num"  size="30" height="40" width="40" > <br> <br>
            <label for="email"> <strong>e-mail </strong> </label> <br>
            <input type="email" name="mail" id="mail"  size="30" height="30" > <br> <br>
            <input value="Envoyez" type="submit" name="submi" id="submit" align="center"> <br> <br>
        </form>
    </fieldset>
    
    
</body>
</html>