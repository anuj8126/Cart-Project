<?php
try
{
	if(isset($_POST['id']))
	{
		$id = (int)$_POST['id']; 
		
		$cart = array();
		if($_POST['cart']==null)
			$cart = json_decode($_POST['cart']);
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "shop";

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
		}
		
		$sql = "select * from products where id=$id";
		
		$result = $conn->query($sql);
 	
		if($result->num_rows>0){
			while($row = $result->fetch_assoc())
			{
				?>
				<div class="wd1">
					<img style="width:100px; padding:8px" src="<?php echo "images/".$row['picture']?>">
				</div>
				
				<div class="wd2">
					<h2><?php echo $row['name']?></h2>
					
					<p> M.R.P:  <span style="color:red"><?php echo number_format((float)$row['mrp'], 2, '.', ',') ?></span>
						&nbsp;&nbsp;&nbsp;&nbsp;
						Price:  <span style="color:red"><?php echo number_format((float)$row['mrp'], 2, '.', ',') ?></span> 
					</p>
					
					<p><?php echo $row['delivery']?>.
						&nbsp;&nbsp;&nbsp;&nbsp;
						You Save: <span style="color:red"><?php echo number_format((float)$row['save'], 2, '.', ',') ?></span>
					</p>
					<p><?php echo $row['detail_line']?></p>
				</div>
				<?php
			}
			/*
			$f=0;
			foreach($cart as $c)
			{
				if($c==$id)
				{
					$f=1;
					break;
				}
			}
			
			if($f==1)
			{	?>
				<button style="margin:auto">Add to Cart</button>
				<?php
			}
			
			*/
		}

		$conn->close();
	}
}
catch(Exception $ex){
	echo $ex;
}
?>
