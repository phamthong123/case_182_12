<?php 
	session_start();
	ob_start();
	if(!$_SESSION['username']){
		header("location:login.php");
	}
?>
<?php 
	if (isset($_GET["p"]))
		$p = $_GET["p"];
	else 
		$p = "";
?>
<html lang="en" class="no-js">
	<head>
		<style type="text/css">
		body { background: #221; }
			#slidy-container { 
			  	width: 70%; overflow: hidden; margin: 0 auto;
			}
		</style>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta name="description" content="Blueprint: Horizontal Slide Out Menu" />
		<meta name="keywords" content="horizontal, slide out, menu, navigation, responsive, javascript, images, grid" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../product/favicon.ico">
		<link rel="stylesheet" type="text/css" href="../product/header/css/default.css" />
		<link rel="stylesheet" type="text/css" href="../product/header/css/component.css" />
		<script src="../product/header/js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<header class="clearfix">
				<a href="index.php"><h1>Quản lý hệ thống FaceShop</h1></a>
				<nav>
					<a href="logout.php" class="bp-icon bp-icon-next" data-info="Đăng xuất"><span>Log out</span></a>
				</nav>
				<nav>
					<a href="http://tympanus.net/codrops/category/blueprints/" class="bp-icon bp-icon-archive" data-info="Về trang chủ"><span>Go to the home page</span></a>
				</nav>
			</header>	
			<div class="main" style="z-index:10;position: relative" >
				<nav class="cbp-hsmenu-wrapper" id="cbp-hsmenu-wrapper">
					<div class="cbp-hsinner">
						<ul class="cbp-hsmenu" style="z-index: 2">
							<li>
								<a href="#">Quản lý sản phẩm</a>
								<ul class="cbp-hssubmenu">
									<li><a href="index.php?p=top&idLoai=1&title=Top"><img src="../product/header/images/top.jpg" alt="img01"/><span>Top</span></a></li>
									<li><a href="index.php?p=bot&idLoai=2&title=Bot"><img src="../product/header/images/bot.jpg" alt="img02"/><span>Bot</span></a></li>
									<li><a href="index.php?p=acces&idLoai=3&title=Accessory"><img src="../product/header/images/access.jpg" alt="img03"/><span>Accessory</span></a></li>
									<li><a href="index.php?p=hat&idLoai=4&title=Hat"><img src="../product/header/images/hat.jpg" alt="img04"/><span>Hat</span></a></li>
									<li><a href="index.php?p=bag&idLoai=5&title=Bag"><img src="../product/header/images/bag.jpg" alt="img05"/><span>Bag</span></a></li>
									<li><a href="index.php?p=shoe&idLoai=6&title=Shoe"><img src="../product/header/images/shoe.jpg" alt="img06"/><span>Shoe</span></a></li>
								</ul>
							</li>
							<li>
								<a href="#">Quản lý người dùng</a>
							</li>
							<li>
								<a href="#">Quản lý giỏ hàng</a>
							</li>
							<li><a href="#">Quản lý đơn hàng</a></li>
						</ul>
					</div>
				</nav>
			</div>
			<div id="content" style="width: 100%; height: 100%;">
				<?php
					switch($p){
						case "top" : require("product.php");
									 require("trangchu.php");
							break;
						case "bot" : require("product.php");
									require("trangchu.php");
							break;
						case "acces" : require("product.php");
										require("trangchu.php");
							break;
						case "hat" : require("product.php");
									require("trangchu.php");
							break;
						case "bag" : require("product.php");
									require("trangchu.php");
							break;
						case "shoe" : require("product.php");
									require("trangchu.php");
							break;
						case "xemchitiet" : require("xemchitiet.php");
							break;
						default: require("trangchu.php");
					}
				?>
			</div>
		</div>
		<script src="../product/header/js/cbpHorizontalSlideOutMenu.min.js"></script>
		<script>
			var menu = new cbpHorizontalSlideOutMenu( document.getElementById( 'cbp-hsmenu-wrapper' ) );
		</script>
	</body>
</html>
