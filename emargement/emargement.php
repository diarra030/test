<?php
// connexion a la base de données
$con = new PDO('mysql:host=localhost;dbname=emargement','root','');

$mgs="";
$erreur="";

if(isset($_POST['btn_emarge']))// si je clique sur le bouton ajouter
{

	$var=$_POST['sai_telephone'];
	
//verifictation de numero existant dans la BD
$requet= $con->prepare("SELECT telephone FROM participant WHERE telephone=:telephone");
$requet->bindParam(':telephone',$_POST['sai_telephone']);
$requet->execute();
$solution= $requet->fetchAll();
if(!empty($solution) and $var ==$solution[0]['telephone']){
	$erreur="Ce Numéro existe deja";
}else{
	//insertion des données dans la BD
$req = $con->prepare("INSERT INTO  participant VALUES(null,:nom,:prenom,:telephone,:email)");
$req->bindParam(':nom',$_POST['sai_nom']);
$req->bindParam(':prenom',$_POST['sai_prenom']);
$req->bindParam(':telephone',$_POST['sai_telephone']);
$req->bindParam(':email',$_POST['sai_email']);
$req->execute();
	$mgs= "Emargement effectuer avec sucess";
	
}

}


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">

    <script src="js/bootstrap.js"></script>
</head>
<body style="background: yellow">
	<nav class="navbar navbar-expand-lg   " style="background-color: #000;">
  <div class="container">
    <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation" style="background: #ffff;">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.html"><img src="images/simplon1.png" class="img-fluid" width="85"></a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link fs-6 " aria-current="page" href="index.html" style="color:yellow ;font-weight: bold; padding-top: 20px">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-6" href="http://localhost/emargement/emargement.php" style="color: #ffff;font-weight: bold;"><button class="btn btn-info" style="width: 100px; font-weight: 600; color: #000;background: yellow">Emarger</button></a>
        </li>
      </ul>

    </div>
  </div>
</nav>

<div class="container">
	<div class="text-center" style="color:black;font-weight: bold; font-size: 50px; margin-top:0px;">
		EMARGEMENT.
	</div>
	<div class="text-center" style="background: green; color: white; font-weight: 600;"><?php echo $mgs; ?></div>
	<div class="text-center" style="background: red; color: white; font-weight: 600;"><?php echo $erreur; ?></div>
	<div class="">
		<form class="" method="POST" action="" enctype="">
			<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label" style="color:black;font-weight: bold; font-size: 30px;">Nom du participant</label>
  <input type="text" name="sai_nom" class="form-control" id="exampleFormControlInput1" placeholder="" style="background: #000;color: yellow" required="">
  <label for="exampleFormControlInput1" class="form-label" style="color:black;font-weight: bold; font-size: 30px;">Prénom du participant</label>
  <input type="text" name="sai_prenom" class="form-control" id="exampleFormControlInput1" placeholder="" style="background: #000;color: yellow" required="">
<label for="exampleFormControlInput1" class="form-label" style="color:black;font-weight: bold; font-size: 30px;">Numéro de téléphone</label>
  <input type="text" maxlength="10"  name="sai_telephone" class="form-control" id="exampleFormControlInput1" placeholder="" style="background: #000;color: yellow" required="">
<label for="exampleFormControlInput1" class="form-label" style="color:black;font-weight: bold; font-size: 30px;">Adresse email</label>
  <input type="email" name="sai_email" class="form-control" id="exampleFormControlInput1" placeholder="" style="background: #000;color: yellow" required="">
  <center><button name="btn_emarge" class="btn btn-info" style="margin-top: 3rem;width: 20rem;color:yellow;font-weight: bold; background: #000 ; border-top-right-radius: 80px;border-bottom-left-radius: 80px;"> Emargé</button></center>
  	

</div>
		</form>

	</div>
</div>
 <div class="text-center bg-black p-4" style=" color: #ffff;">
    Developpé par Diarra Aboubacar 

  </div>
</body>
</html>