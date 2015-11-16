<?php //Affiche les amis de l'utilisateur
	$query = $db -> prepare("SELECT user2 FROM friends WHERE user1 = ?");
	$query -> execute(array($_SESSION["id"]));

	echo "<table>"; //On creer une liste pour ordonner le rangement des amis
		echo "<tr>";
			echo "<th>Login</th>";
			echo "<th>Nom</th>";
			echo "<th>Prénom</th>";
			echo "<th>Mail</th>";
		echo "</tr>";
			$sc_query = $db -> prepare("SELECT * FROM users WHERE id = ");
			$sc_query -> execute(array($data["user2"]));
		}
	echo "</table>";
?>
