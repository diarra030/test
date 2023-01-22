<?php 
// connexion a la base de données
$con = new PDO('mysql:host=localhost;dbname=emargement','root','');

// afficher
    $req = $con->prepare("SELECT * FROM participant");
        $req->execute();
        $sol = $req->fetchAll();

 ?>
<!DOCTYPE html>
<html>
<head>
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
		LISTE D'EMARGEMENT.
	</div>

	<table border="" class="table table-dark" >
	<tr style="color: yellow; font-weight: 600; font-family: arial; text-align: center;">
		<td>Nom</td>
		<td>Prenom</td>
		<td>Numero de telephone</td>
		<td>Email</td>
	</tr>
	<?php if(!empty($sol)){ foreach ($sol as $key => $value) { 
			
		 ?>



   <tr>
   	
   	<td><?php echo $value['nom']; ?></td>
   	<td><?php echo $value['prenom']; ?></td>
   	<td><?php echo $value['telephone']; ?></td>
   	<td><?php echo $value['email']; ?></td>
   </tr>
  

		<?php } } ?>
</table>
</div>


<footer>
	<div class="text-center bg-black p-4" style=" color: #ffff; margin-top: 15rem">
    Developpé par Diarra Aboubacar 

  </div>
</footer>
</body>
</html>