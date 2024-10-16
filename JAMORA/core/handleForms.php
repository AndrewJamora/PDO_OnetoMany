<?php
require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertCHEFbtn'])) {

	$query = insertChef($pdo, $_POST['Cname'], $_POST['specialty']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}

if (isset($_POST['editCHEFbtn'])) {
	$query = updateChef($pdo, $_POST['Cname'], $_POST['specialty'], $_GET['Chef_ID']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Edit failed";;
	}

}

if (isset($_POST['delCHEFbtn'])) {
	$query = delChef($pdo, $_GET['Chef_ID']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}

if (isset($_POST['insertPASTRYbtn'])) {
	$query = insertPastry($pdo, $_POST['pastryCat'], $_POST['pastryPri'], $_GET['Chef_ID']);

	if ($query) {
		header("Location: ../viewpastry.php?Chef_ID=" .$_GET['Chef_ID']);
	}
	else {
		echo "Insertion failed";
	}
}


if (isset($_POST['editPASTRYbtn'])) {
	$query = updatePastry($pdo, $_POST['Pastry_Category'], $_POST['Pastry_Price'], $_GET['Pastry_ID']);

	if ($query) {
		header("Location: ../viewpastry.php?Chef_ID=" .$_GET['Chef_ID']);
	}
	else {
		echo "Update failed";

	}

}

if (isset($_POST['deletePASTRYBtn'])) {
	$query = deletePastry($pdo, $_GET['Pastry_ID']);

	if ($query) {
		header("Location: ../viewpastry.php?Chef_ID=" .$_GET['Chef_ID']);
	}
	else {
		echo "Deletion failed";
	}
}

?>