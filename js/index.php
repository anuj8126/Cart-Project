<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Add to Cart</title>
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" href="mycss.css">
	</head>
	
	<body>
	
		<div class="header">
			<span class="logo">Shop Here</span>
			<div class="header-right">
				<a href="javascript:void(0)"><i class="fa fa-sign-in"></i> <br>Login</a>
				<a href="javascript:void(0)"><i class="fa fa-bell"></i> <br>Notification</a>
				<a href="javascript:void(0)" onClick="showCart()" ondrop="dropCart(event)" ondragover="allowDrop(event)" style="position:relative"><i class="fa fa-shopping-cart"></i> <br>Cart <span id="cart_items" class="cart-badge">0</span></a>
			</div>
		</div>

		<div class="wd1">
			<div class="heading">Products</div>
			<div id="products" class="data-area">
				
			</div>
		</div>
		
		<div class="wd2">
			<div class="heading">Details</div>
			<div id="details" ondrop="drop(event)" ondragover="allowDrop(event)" class="data-area">
				Drop Product Here !!
			</div>
		</div>
		
		
		<script>
			function allowDrop(ev) {
				ev.preventDefault();
			}

			function showCart(){
				var cart = sessionStorage.getItem('cart');
				if(cart==null || cart=="")
					alert("No Items in Cart");
				else
					alert("Product Ids: "+cart);
			}
			
			function drag(ev){
				ev.dataTransfer.setData("text", ev.target.id);
			}

			function drop(ev){
				$("#details").html("<i class='fa fa-spinner fa-spin'></i>");
				ev.preventDefault();
				var data = ev.dataTransfer.getData("text");
				var id = +data.substring(8);
				var cart = sessionStorage.getItem('cart');
				if(cart==null || cart=="")
					cart="";
			
				$.post("get_detail.php",{id:id.toString(),cart:sessionStorage.getItem('cart')},function(data){
					$("#details").html(data);
				});
			
			}
			
			function dropCart(ev) {
				ev.preventDefault();
				var data = ev.dataTransfer.getData("text");
				var id = +data.substring(8);
				if(!Number.isNaN(id))
				{	
					var cart = sessionStorage.getItem('cart');
					if(cart==null || cart=="")
						cart="";
					if(cart.length>0)
					{
						var arr = cart.split(",");
						if(arr.length>0)
						{
							var f=0;
							arr.forEach(function(val){
								if(val==id)
								{	f=1;
									alert("Already Added in Cart !!");
								}
							});
							
							if(f==0)
								arr.push(id);
							
							cart = arr.join(",");
							sessionStorage.setItem('cart',cart.toString());
							$("#cart_items").html(arr.length);
						}
					}
					else
					{
						sessionStorage.setItem('cart',id.toString());
						$("#cart_items").html(1);
					}
				}
			}		
		
			$(document).ready(function(){
				var cart = sessionStorage.getItem('cart');
				if(cart==null || cart=="")
					cart="";
				
				if(cart.length>0)
				{	
					var arr = cart.split(",");
					$("#cart_items").html(arr.length);
				}
				else
					$("#cart_items").html(0);
				
				$.post("get_all_records.php",function(data){
					$("#products").html(data);
				});
			});
		</script>
	</body>
</html>
	