<?php 
include_once("inc.php");
$tree_name=NULL;
$tree_name=(string)$_GET['tree_name'];
$tree_id = (int)$_GET['tree_test_id'];
$sql="SELECT * FROM `tree_list` where id = $tree_id";


$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="zh">
<head>
<title>树木种类</title>
<style type="text/css">
#div1{
  width: 300px;
  height: 400px;
  border: #000 solid 0px;
  margin: 50px auto;
  /* overflow: hidden; */
}
#div1 img{
  cursor: pointer;
  transition: all 0.6s;
}
#div1 img:hover{
  transform: scale(1.4);
}
</style>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Wish shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="plugins/malihu-custom-scrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/categories.css">
<link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
</head>
<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header">
		<div class="header_inner d-flex flex-row align-items-center justify-content-start">
			<div class="logo"><a href="#">Trees</a></div>
			<div class="header_content ml-auto">
				<div class="search header_search">
					<form action="categories.php" method="GET">

						<input type="text" name="tree_name" class="search_input">
						
						<button type="submit" id="search_button" class="search_button"><img src="images/magnifying-glass.svg" alt=""></button>
					</form>
				</div>
				<div class="shopping"></div>
			</div>
			<input type="button" onclick="window.location.href='../index_aftlogin.html'" value="back">
		</div>
	</header>

	<!-- Menu -->

	<div>
		<a href="../index_aftlogin.html"></a>
		<div class="menu_close_container"><a href="../index_aftlogin.html"></a><div class=""><div></div><div></div></div></div>
	</div>


	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col-12">
					
					<!-- Sidebar Left -->

					<div class="sidebar_left clearfix">

						<!-- Categories -->
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<div class="sidebar_section_content">
								<ul>
									<li><a href="#">观赏树</a></li>
									<li><a href="#">用途树</a></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="current_page"></div>
				</div>
				<div class="col-12">
					<div class="product_sorting clearfix">
						<div class="view">
							<div class="view_box box_view"><i class="fa fa-th-large" aria-hidden="true"></i></div>
							<div class="view_box detail_view"><i class="fa fa-bars" aria-hidden="true"></i></div>
						</div>
						<div class="sorting">
							<ul class="item_sorting">
								<li>
									<span class="sorting_text">Show all</span>
									<i class="fa fa-caret-down" aria-hidden="true"></i>
									<ul>
										<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Show All</span></li>
										<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
										<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "stars" }'><span>Stars</span></li>
									</ul>
								</li>
								<li>
									<span class="sorting_text">Show</span>
									<span class="num_sorting_text">12</span>
									<i class="fa fa-caret-down" aria-hidden="true"></i>
									<ul>
										<li class="num_sorting_btn"><span>3</span></li>
										<li class="num_sorting_btn"><span>6</span></li>
										<li class="num_sorting_btn"><span>12</span></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>


			<div class="row products_container">
				<div class="col">
					
					<!-- Products -->
							
					<div class="product_grid">
<?php
						  if($num=mysqli_num_rows($result))
							  {
							    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
							    {
							  ?>
						<!-- Product -->
						<h2><?php echo $row['name'] ?></h2>
						<p><?php echo $row['cha'] ?></p>
						<p><?php echo $row['worth'] ?></p>
						<div id="div1"><div class="product_image">
								<img src="../back/<?php echo $row['img'] ?>" height="300" width="400">

							</div></div>
						<?php
								}
							}
						mysqli_close($conn);
						?>
					</div>
							
				</div>	
			</div>

		</div>

	</div>

	
</div>


</body>
</html>