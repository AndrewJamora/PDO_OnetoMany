<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php $GetChefByID = GetChefByID($pdo, $_GET['Chef_ID']); ?>
	<h1>Jummy Bakery chef's employee, Edit Accordingly! </h1>
	<form action="core/handleForms.php?Chef_ID=<?php echo $_GET['Chef_ID'] ?>" method="POST">
		<p>
			<label for="Name">Name: </label> 
			<input type="text" name="Cname" value="<?php echo $GetChefByID['Chef_Name']; ?>">
		</p>

		<p>
			<label for="Specialty">Specialization: </label> 
			<input type="text" name="specialty" value="<?php echo $GetChefByID['Chef_Specialty']; ?>">
			<input type="submit" name="editCHEFbtn" >
		</p>
	</form>
</body>
</html>