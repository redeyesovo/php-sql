<?php 
include_once("inc.php");
$article_name=NULL;
$article_name=(string)$_GET['article_name'];
if (!$article_name)
	$sql="SELECT * FROM `article_list`";
else
	$sql="SELECT * FROM `article_list` as f where f.name like '%$article_name%'";
$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="zh">
<head>
<title>文章</title>
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
			<div class="logo"><a href="#">文章</a></div>
			
			<div class="header_content ml-auto">
				<div class="search header_search">
					<form action="categories.php" method="GET">

						<input type="search" name="article_name" class="search_input" required="required">
						
						<button type="submit" id="search_button" class="search_button"><img src="images/magnifying-glass.svg" alt=""></button>
					</form>
				</div>
				<div class="shopping">
				
					
				</div>
			</div>
			<input type="button" onclick="window.location.href='../index_aftlogin.html'" value="返回">
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
							<div class="sidebar_title">关于青木原与生命</div>
							<div class="sidebar_section_content">
								<ul>
									<li><a href="#">生命可贵</a></li>
									<li><a href="#">结束请三思</a></li>
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
						<div class="product">
							<div class="product_image">
								<img src="../back/<?php echo $row['img'] ?>" height="300" width="400">

							</div>
							<div class="product_content clearfix">
								<div class="product_info">
									<div class="product_name"><a href="introduction.php?article_test_id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></div>
								</div>
								<div class="product_options">
									<div class="product_fav product_option">+</div>
								</div>
							</div>
						</div>
						<?php
								}
							}
						mysqli_close($conn);
						?>
					</div>
							
				</div>	
			</div>
				


			<div class="row page_num_container">
				<div class="col text-right">
					<ul class="page_nums">
						<li class="active"><a href="#">01</a></li>
						<li><a href="#">02</a></li>
						<li><a href="#">03</a></li>
						<li><a href="#">04</a></li>
						<li><a href="#">05</a></li>
					</ul>
				</div>
			</div>

		</div>


	</div>

	
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/malihu-custom-scrollbar/jquery.mCustomScrollbar.js"></script>
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="js/categories_custom.js"></script>
</body>
</html>