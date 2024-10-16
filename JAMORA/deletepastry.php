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
	<?php $getPastryByID = getPastryByID($pdo, $_GET['Pastry_ID']); ?>
	<h1>Removing the pastry?</h1>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Pastry Category: <?php echo $getPastryByID['Pastry_Category'] ?></h2>
		<h2>Pastry Price: <?php echo $getPastryByID['Pastry_Price'] ?></h2>
		<h2>Pastry Chef: <?php echo $getPastryByID['Pastry_Chef'] ?></h2>
		<h2>Date Added: <?php echo $getPastryByID['date_added'] ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">

			<form action="core/handleForms.php?Pastry_ID=<?php echo $_GET['Pastry_ID']; ?>&Chef_ID=<?php echo $_GET['Chef_ID']; ?>" method="POST">
				<input type="submit" name="deletePASTRYBtn" value="Delete">
			</form>			
			
		</div>	

	</div>
</body>
</html>