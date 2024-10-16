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
	<h1>Jummy Bakery chef's employee, Update Accordingly! </h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="Name">Name: </label> 
			<input type="text" name="Cname">
		</p>

		<p>
			<label for="Specialty">Specialization: </label> 
			<input type="text" name="specialty">
			<input type="submit" name="insertCHEFbtn">
		</p>
	</form>

	<?php $GetAllChef = GetAllChef($pdo); ?>
	<?php foreach ($GetAllChef as $row) { ?>
	<div class="container" style="border-style: solid;  margin-left: -1px; ">

		<h3>Chef's name: <?php echo $row['Chef_Name']; ?></h3>
		<h3>Specialty: <?php echo $row['Chef_Specialty']; ?></h3>
		<h3>Date Added: <?php echo $row['Date_added']; ?></h3>

		<div class="editAndDelete">
		<a href="viewpastry.php?Chef_ID=<?php echo $row['Chef_ID']; ?>">View Projects</a>
			<a href="editchefs.php?Chef_ID=<?php echo $row['Chef_ID']; ?>">Edit</a>
			<a href="deletechefs.php?Chef_ID=<?php echo $row['Chef_ID']; ?>">Delete</a>
		<?php } ?>

</body>
</html>