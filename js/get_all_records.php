<?php
try
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "shop";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "select * from products";
	$result = $conn->query($sql);

	if($result->num_rows>0){
		while($row = $result->fetch_assoc())
		{
			?>
			<div style="margin:8px auto">
				<img id="<?php echo "product_".$row['id']?>" draggable="true" ondragstart="drag(event)" style="width:200px; border-bottom:1px solid lightgray; cursor: -webkit-grab; cursor: grab;" src="images/<?php echo $row['picture']?>">
			</div>
			<?php
		}
	}

	$conn->close();
}
catch(Exception $ex){
	echo $ex;
}
?>
