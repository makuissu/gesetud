<?php 
$bdd = new PDO('mysql:host=localhost;dbname=etablissement;charset=utf8;', 'root', '');
if (isset($_POST['submit'])) {
  if (!empty($_POST['matricule']) && !empty($_POST['nom']) && !empty($_POST['prenom']) 
    && !empty($_POST['date']) && !empty($_POST['lieu']) && !empty($_POST['tel'])) {

    $matricule = htmlspecialchars($_POST['matricule']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $date_naissance = htmlspecialchars($_POST['date']);
    $lieu = htmlspecialchars($_POST['lieu']);
    $telephone = htmlspecialchars($_POST['tel']);
	
	$insertuser = $bdd->prepare('INSERT INTO etudiant(matricule,nom,prenom,date_naissance,lieu,telephone) VALUES(?,?,?,?,?,?)');
    $insertuser->execute(array($matricule, $nom, $prenom, $date_naissance, $lieu, $telephone));
	
	}
	 
}

// Rechercher des demandes
$requeteEtudiants = $bdd->query('SELECT * FROM etudiant ORDER BY id DESC');
$etudiants = $requeteEtudiants->fetchAll();

if (isset($_GET['action']) && $_GET['action'] === 'supprimer' && isset($_GET['id'])) {
    $idUtilisateur = $_GET['id'];

    // Supprimer un utilisateur de la base de données
    $requeteSuppression = $bdd->prepare("DELETE FROM etudiant WHERE id = :id");
    $requeteSuppression->bindParam(':id', $idUtilisateur);
    $requeteSuppression->execute();
}
?>

    




<!DOCTYPE html>
<html lang="en">
<head>

	<title>FORMULAIRES</title>

</head>
<body>
<style>

.table {
			border-collapse: collapse;
			width: 100%;
		}

		.table th,
		.table td {
			border: 1px solid #ddd;
			padding: 8px;
		}

		.table tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		.table th {
			background-color: lightblue;
			color: black;
		}

		.table tr:hover {
			background-color: #ddd;
		}

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Montserrat', sans-serif;
}
body{
  background: white;
  padding: 0 10px;
}
.wrapper{
  max-width: 500px;
  width: 100%;
  background:lightblue;
  margin: 20px auto;
  box-shadow: 1px 2px 2px rgba(0,0,0,0.125);
  padding: 30px;
  border-radius: 100px;
}

.wrapper .title{
  font-size: 240px;
  font-weight: 70;
  margin-bottom: 25px;
  color: green;
  text-transform: uppercase;
  text-align: center;
}

.wrapper .form{
  width: 100%;
}

.wrapper .form .inputfield{
  margin-bottom: 150px;
  display: flex;
  align-items: center;
}

.wrapper .form .inputfield label{
   width: 200px;
   color: black;
   margin-right: 10px;
  font-size: 14px;
}

.wrapper .form .inputfield .input,
.wrapper .form .inputfield .textarea{
  width: 100%;
  outline: none;
  border: 1px solid #d5dbd9;
  font-size: 15px;
  padding: 8px 10px;
  border-radius: 3px;
  transition: all 0.3s ease;
}

.wrapper .form .inputfield .textarea{
  width: 100%;
  height: 125px;
  resize: none;
}

.wrapper .form .inputfield .custom_select{
  position: relative;
  width: 100%;
  height: 37px;
}

.wrapper .form .inputfield .custom_select:before{
  content: "";
  position: absolute;
  top: 12px;
  right: 10px;
  border: 8px solid;
  border-color: #d5dbd9 transparent transparent transparent;
  pointer-events: none;
}

.wrapper .form .inputfield .custom_select select{
  -webkit-appearance: none;
  -moz-appearance:   none;
  appearance:        none;
  outline: none;
  width: 100%;
  height: 100%;
  border: 0px;
  padding: 8px 10px;
  font-size: 15px;
  border: 1px solid #d5dbd9;
  border-radius: 3px;
}









@media (max-width:420px) {
  .wrapper .form .inputfield{
    flex-direction: column;
    align-items: flex-start;
  }
  .wrapper .form .inputfield label{
    margin-bottom: 5px;
  }
  .wrapper .form .inputfield.terms{
    flex-direction: row;
  }
}



  /* Media queries pour différentes largeurs d'écran */
    @media (max-width: 375px) {
    
	   font-size: 12px;
    }

    @media (max-width: 414px) {
      
	   font-size: 14px;
    }

    @media (max-width: 390px) {
      font-size: 14px;
    }

    @media (max-width: 430px) {
       font-size: 14px;
    }

    @media (max-width: 412px) {
    font-size: 14px;
    }

    @media (max-width: 768px) {
     font-size: 15px;
    }

    .green-button {
  background-color: white;
  color: black;
  border: 1px solid green;
}

.green-button:hover {
  background-color: green;
  color: white;
}

 .custom-link {
        display: inline-block;
        margin-left: 680px;
        padding: 10px;
        background-color: #337ab7;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }

    .custom-link:hover {
        background-color: #23527c;
    }
</style>

<div class="wrapper" >
    <div class="title" style="color:black;">
     <div width="100px" style="background-color:white">GESTION DES ETUDIANTS</div>
	 <br><hr style="background-color:black; height:4px;">
    </div>
	
    <form class="form" method="post" action="" enctype="multipart/form-data">
       <div class="inputfield">
          <label><b>Matricule</b></label>
          <input type="text" class="input" placeholder="Matricule" required name="matricule" autocomplete="on">
       </div>  
        <div class="inputfield">
          <label><b>Nom</b></label>
          <input type="text" class="input" placeholder="Nom" required name="nom" autocomplete="on">
       </div>  
	    <div class="inputfield">
          <label><b>Prenom</b></label>
          <input type="text" class="input" placeholder="Prenom" required name="prenom" autocomplete="on">
       </div>
	   <div class="inputfield">
          <label><b>Date de naissance</b></label>
          <input type="date" class="input" placeholder="Date de naissance" required name="date">
       </div>  
        
      <div class="inputfield">
          <label><b>lieu</b></label>
          <input type="text" class="input" placeholder="Lieu" required name="lieu" autocomplete="on">
       </div>
        
         <div class="inputfield">
          <label><b>Telephone</b></label>
          <input type="tel" class="input" placeholder="Telephone" required name="tel" autocomplete="on">
       </div>		
	    <div class="inputfield">
<input type="submit" value="VALIDER" class="green-button" style="margin-left:60px; height:30px; width:70px;" name="submit">
<input type="button" value="ANNULER" class="green-button" style="margin-left:200px; height:30px; width:70px;" name="submit">
      </div>
    </form>
</div>	

<a class="custom-link" aria-current="page" href="./tableau.php">VOIR LA LISTE</a>

	</body>
	</html>
