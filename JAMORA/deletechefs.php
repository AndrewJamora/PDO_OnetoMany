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
	<h1>Firing the chef?</h1>
	<?php $GetChefByID = GetChefByID($pdo, $_GET['Chef_ID']); ?>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Chef's name: <?php echo $GetChefByID['Chef_Name']; ?></h2>
		<h2>Specialization: <?php echo $GetChefByID['Chef_Specialty']; ?></h2>
		<h2>Date Added: <?php echo $GetChefByID['Date_added']; ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?Chef_ID=<?php echo $_GET['Chef_ID']; ?>" method="POST">
				<input type="submit" name="delCHEFbtn" value="Delete">
			</form>			
		</div>	

	</div>
</body>
</html>