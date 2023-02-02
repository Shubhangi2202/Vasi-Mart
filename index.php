<?php
session_start();
include("config.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">

<head>
	<!-- Begin Linking CSS and Scripts -->
	<?php include('linking.php');  ?>
	<!-- End Linking CSS and Scripts -->
</head>

<body>
	<!-- Begin Wrapper -->
	<div id="wrapper">
		<!-- Begin L -->
		<?php include('header.php');  ?>
		<!-- End Header -->
		<!-- Begin Navigation -->
		<?php include('navbar.php');  ?>
		<!-- End Navigation -->
		<!-- Begin Slider -->
		<?php include('slider.php');  ?>
		<!-- End Slider -->
		<!-- Begin Main -->
		<div id="main" class="shell">
			<!-- Begin Content -->
			<div id="content">
				<div class="post">
					<h2>Welcome to Vasi Mart!</h2>
					<img src="images/logo1.png" alt="Post Image" height="100" width="260" />
					The internet and the subsequent e-commerce boom opened up a whole new world for organisations and people to garner a wider reach. To expand the availability of tribal products across the entire country and the world and to get greater benefits for the tribal people, TRIFED went online with its portal www.vasumart.com
					This website is being utilised in such a way that in just a single click, the handcrafted, tribal products find a larger audience - not just in India but also abroad.
					A wide range of thoughtful and handcrafted products that carry an indelible mark of their rich ancient cultural heritage are procured, marketed and made available to buyers.
					The purpose of these e-commerce arrangements is to facilitate artefacts lovers to ease their shopping experience by buying products made by various tribes of India while sitting at their homes. Besides, ensuring genuine and authentic tribal products for artefacts lovers at their door steps, the online portals also promote Tribes India as a brand for tribal products... <a href="#" class="more" title="Read More">Read More</a></p>
					<div class="cl">&nbsp;</div>
				</div>
			</div>
			<!-- End Content -->
			<!-- Begin Sidebar -->
			<div id="sidebar">
				<ul>
					<li class="widget">
						<h2>TOP Warehouse</h2>
						<div class="brands">
							<ul>
								<li><a href="warehouse_1.php" title="Brand 1"><img src="images/jj.png" width="103" height="51" alt="Brand 1" /></a></li>
								<li><a href="warehouse_2.php" title="Brand 2"><img src="images/nn.png" width="103" height="51" alt="Brand 2" /></a></li>
								<li><a href="warehouse_3.php" title="Brand 3"><img src="images/pp.png" width="103" height="51" alt="Brand 3" /></a></li>
								<li><a href="warehouse_4.php" title="Brand 4"><img src="images/dd.png" width="103" height="51" alt="Brand 4" /></a></li>
							</ul>
							<div class="cl">&nbsp;</div>
						</div>
						<a href="products.php" class="more" title="More Brands">All Products</a>
					</li>
				</ul>
			</div>
			<!-- End Sidebar -->
			<div class="cl">&nbsp;</div>
			<!-- Begin Products -->
			<div id="products">
				<h2>Featured Products</h2>

				<div class="section group">

					<?php
					//current URL of the Page. cart_update.php redirects back to this URL
					$current_url = base64_encode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

					$results = $mysqli->query("SELECT * FROM product ORDER BY Product_ID ASC");
					if ($results) {

						//fetch results set as object and output HTML
						while ($obj = $results->fetch_object()) {
							echo '<div class="grid_1_of_4 images_1_of_4">';
							echo '<form method="post" action="cart_update.php">';
							echo '<div class="product-thumb"><img src="images/' . $obj->Picture . '"></div>';
							echo '<div class="product-content"><h2><b>' . $obj->productName . '</b> </h2>';
							echo '<div class="product-desc">' . $obj->Description . '</div>';
							echo '<div class="product-info">';
							echo '<p><span class="price"> Price:  ₹  <big style="color:green">' . $obj->Price . '</big></span></p>';
							echo 'Qty <input type="text" name="product_qty" value="1" size="3" />';
							echo '<div class="button"><span><img src="images/cart.jpg" alt="" /><button class="cart-button"  class="add_to_cart">Add to Cart</button></span> </div>';
							echo '</div></div>';
							echo '<input type="hidden" name="Product_ID" value="' . $obj->Product_ID . '" />';
							echo '<input type="hidden" name="type" value="add" />';
							echo '<input type="hidden" name="return_url" value="' . $current_url . '" />';
							echo '</form>';
							echo '</div>';
						}
					}
					?>
				</div>
				<div class="cl">&nbsp;</div>
			</div>
			<!-- End Products -->


			<!-- Begin Products Slider -->
			<div id="product-slider">
				<h2>Best Products</h2>
				<ul>

					<?php
					$result = mysqli_query($mysqli, "select * from product") or die(mysqli_error());
					while ($row = mysqli_fetch_array($result)) {
					?>
						<li>
							<a href="products.php" title="Product Link"><img src="images/<?php echo $row['Picture'] ?>" alt="IMAGES" /></a>
							<div class="info">
								<h4><b><?php echo $row['productName'] ?></b></h4>
								<span class="number"><span>Price: ₹ <big style="color:green"><?php echo $row['Price'] ?></big></span></span>

								<div class="cl">&nbsp;</div>

							</div>
						</li>
					<?php } ?>
				</ul>
				<div class="cl">&nbsp;</div>
			</div>
			<!-- End Products Slider -->

		</div>
		<!-- End Main -->
		<!-- Begin Footer -->
		<?php include('footer.php');  ?>
		<!-- End Footer -->


	</div>
	<!-- End Wrapper -->

</body>

</html>