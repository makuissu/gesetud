<?php
// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=etablissement;charset=utf8;', 'root', '');

// Recherche des demandes
$requeteEtudiants = $bdd->query('SELECT * FROM etudiant ORDER BY id DESC');
$etudiants = $requeteEtudiants->fetchAll();

if (isset($_GET['action']) && $_GET['action'] === 'supprimer' && isset($_GET['id'])) {
    $idUtilisateur = $_GET['id'];

    // Supprimer l'utilisateur de la base de données
    $requeteSuppression = $bdd->prepare("DELETE FROM etudiant WHERE id = :id");
    $requeteSuppression->bindParam(':id', $idUtilisateur);
    $requeteSuppression->execute();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>LISTE DES ETUDIANTS</title>

	<style>
		.table {
			border-collapse: collapse;
			width: 11%;
		}

		.table th,
		.table td {
			border: 1px solid #ddd;
			padding: 8px;
		}

		.table tr:nth-child(even) {
			background-color: pink;
		}

		.table th {
			background-color: #ffff;
			color: white;
		}

		.table tr:hover {
			background-color: #dddd;
		}
	</style>
</head>
<body>
	<table class="table">
		<thead>
			<tr>
				<th>Matricule</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Date de naissance</th>
				<th>Lieu</th>
				<th>Telephone</th>
				<th>Action</th>
				
			</tr>
		</thead>
		<tbody>
			<?php
			if (!empty($etudiants)) {
				foreach ($etudiants as $etudiant) {
					?>
					<tr>
						<td><?= $etudiant['matricule']; ?></td>
						<td><?= $etudiant['nom']; ?></td>
						<td><?= $etudiant['prenom']; ?></td>
						<td><?= $etudiant['date_naissance']; ?></td>
						<td><?= $etudiant['lieu']; ?></td>
						<td><?= $etudiant['telephone']; ?></td>
						<td>
							<div style="background-color: black;">
<a href="?action=supprimer&id=<?= $etudiant['id']; ?>" style="color: white;"
   onclick="return confirm('Etes-vous sur de vouloir supprimer cet etudiant ?')">Supprimer</a>
                        </div>
						</td>
						
					</tr>
					<?php
				}
			} else {
				echo "<tr><td colspan='8'>Aucune demande trouvee.</td></tr>";
			}
			?>
		</tbody>
	</table>
</body>
</html>
