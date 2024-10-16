<?php

function insertChef($pdo, $Cname, $Specialty) {

	$sql = "INSERT INTO chefs (Chef_Name, Chef_Specialty) VALUES(?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$Cname, $Specialty]);

	if ($executeQuery) {
		return true;
	}
}

function GetAllChef($pdo) {
	$sql = "SELECT * FROM chefs";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function GetChefByID($pdo, $Chef_ID) {
	$sql = "SELECT * FROM chefs WHERE Chef_ID = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$Chef_ID]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateChef($pdo, $Cname, $Specialty, $Chef_ID) {

	$sql = "UPDATE chefs
				SET Chef_Name = ?,
					Chef_Specialty = ?
				WHERE Chef_ID = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$Cname, $Specialty, $Chef_ID]);
	
	if ($executeQuery) {
		return true;
	}

}

function delChef($pdo, $Chef_ID) {
	$delChefPastry = "DELETE FROM pastry WHERE Chef_ID = ?";
	$deleteStmt = $pdo->prepare($delChefPastry);
	$executeDeleteQuery = $deleteStmt->execute([$Chef_ID]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM chefs WHERE Chef_ID = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$Chef_ID]);

		if ($executeQuery) {
			return true;
		}

	}
	
}

function GetPastryByChefID($pdo, $Chef_ID) {
	
	$sql = "SELECT 
				pastry.Pastry_ID AS Pastry_ID,
				pastry.Pastry_Category AS Pastry_Category,
				pastry.Pastry_Price AS Pastry_Price,
				pastry.Date_addedd AS date_added,
				chefs.Chef_Name AS Pastry_Chef
				
			FROM pastry
			JOIN chefs ON pastry.Chef_ID = chefs.Chef_ID
			WHERE pastry.Chef_ID = ? 
			GROUP BY pastry.Pastry_Category;
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$Chef_ID]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}


function insertPastry($pdo, $pastry_Cat, $pastry_price, $Chef_ID) {
	$sql = "INSERT INTO pastry (Pastry_Category, Pastry_Price, Chef_ID) VALUES (?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$pastry_Cat, $pastry_price, $Chef_ID]);
	if ($executeQuery) {
		return true;
	}

}

function getPastryByID($pdo, $Pastry_ID) {
	$sql = "SELECT 
				pastry.Pastry_ID AS Pastry_ID,
				pastry.Pastry_Category AS Pastry_Category,
				pastry.Pastry_Price AS Pastry_Price,
				pastry.Date_addedd AS date_added,
				chefs.Chef_Name AS Pastry_Chef
			FROM pastry
			JOIN chefs ON pastry.Chef_ID = chefs.Chef_ID
			WHERE pastry.Pastry_ID  = ? 
			GROUP BY pastry.Pastry_Category";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$Pastry_ID]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}
 
function updatePastry($pdo, $Pastry_Category, $Pastry_Price, $Pastry_ID) {
	$sql = "UPDATE pastry
			SET Pastry_Category = ?,
				Pastry_Price = ?
			WHERE Pastry_ID = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$Pastry_Category, $Pastry_Price, $Pastry_ID]);

	if ($executeQuery) {
		return true;
	}
}

function deletePastry($pdo, $Pastry_ID) {
	$sql = "DELETE FROM pastry WHERE Pastry_ID = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$Pastry_ID]);
	if ($executeQuery) {
		return true;
	}
}

?>