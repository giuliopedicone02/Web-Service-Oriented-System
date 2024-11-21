<!DOCTYPE html>
<html>
	<head>
		<title>Regions</title>
	</head>
	<body>
		<h1>Regions</h1>
		<?php
		require_once("connection.php");
		$selectResult = $connection->query("select id, name from regions");
		if($selectResult->num_rows > 0){
			while($record = $selectResult->fetch_assoc()){
		?>
		Nome: <?=$record["name"];?> 
		<a href="update.php?id=<?=$record["id"];?>">
			<button>Edit</button>
		</a><br><br>
		<?php		
			}
		}
		?>
		<br><br>
		<h2>Costumes count</h2>
		<?php
		$selectResult = $connection->query("select id, name from regions");
		?>
		<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
			<select name="regions">
				<?php
				while($record = $selectResult->fetch_assoc()){
				?>
					<option value="<?php echo $record["id"]?>"><?php echo $record["name"]?></option>
				<?php
				}
				?>
			</select>
			<button type="submit">Show</button>
		</form><br>
		Number of costumes: <?php echo $_GET["count"]?>
		<br><br><a href="../index.html">Home</a>
	</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$regionId = (int)filter_input(INPUT_POST,"regions",FILTER_SANITIZE_NUMBER_INT);
	$statement = $connection->prepare("select count(name) from costumes where region_id=?");
	$statement->bind_param("i", $regionId);
	$statement->execute();
	$count = null;
	$statement->bind_result($count);
	while($statement->fetch()){
		header("Location: list.php?count=$count");
	}
	
}
?>
