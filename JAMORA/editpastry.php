<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="viewpastry.php?Chef_ID=<?php echo $_GET['Chef_ID']; ?>">
	View The Pastries</a>
	<h1>Pastry Under editing</h1>
	<?php $getPastryByID = getPastryByID($pdo, $_GET['Pastry_ID']); ?>
	<form action="core/handleForms.php?Pastry_ID=<?php echo $_GET['Pastry_ID']; ?>
	&Chef_ID=<?php echo $_GET['Chef_ID']; ?>" method="POST">
		<p>
			<label for="firstName">Pastry Category</label> 
			<input type="text" name="Pastry_Category" 
			value="<?php echo $getPastryByID['Pastry_Category']; ?>">
		</p>
		<p>
			<label for="firstName">Pastry Price</label> 
			<input type="text" name="Pastry_Price" 
			value="<?php echo $getPastryByID['Pastry_Price']; ?>">
			<input type="submit" name="editPASTRYbtn">
		</p>
	</form>
</body>
</html>