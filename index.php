<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "e_beauty");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_namee'		=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
        
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			    'item_id'			=>	$_GET["id"],
				'item_namee'		=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
        
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="index.php"</script>';
			}
		}
	}
}
$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;

?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>E-Beauty</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Vidaloka" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <div class="page">
    <nav id="colorlib-main-nav" role="navigation">
      <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle active"><i></i></a>
      <div class="js-fullheight colorlib-table">
        <div class="img" style="background-image: url(images/image_4.jpg);"></div>
        <div class="colorlib-table-cell js-fullheight">
          <div class="row no-gutters">
            <div class="col-md-12 text-center">
              <h1 class="mb-4"><a href="index.php" class="logo">E-Beauty<br><span>Model Agency</span></a></h1>
              <ul>
                <li class="active"><a href="index.php"><span>Home</span></a></li>
                <li><a href="about.php"><span>About</span></a></li>
                <li><a href="model.php"><span>Models</span></a></li>
                <li><a href="blog.php"><span>Blog</span></a></li>
                <li><a href="contact.php"><span>Contact</span></a></li>
				<li><a href="shop-cart.php"><span>Shopping bag</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
    
    <div id="colorlib-page">
      <header>
      	<div class="container">
	        <div class="colorlib-navbar-brand">
	          <a class="colorlib-logo" href="index.php">E-Beauty<br><span>Model Agency</span></a>
	        </div>
	        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        </div>
      </header>
			
			<section id="home" class="video-hero js-fullheight" style="height: 700px; background-image: url(images/bg_1.jpg);  background-size:cover; background-position: center center;background-attachment:fixed;">
				<div class="overlay"></div>
				<a class="player" data-property="{videoURL:'https://www.youtube.com/watch?v=ITUid-bDsl8',containment:'#home', showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}"></a>
				<div class="container">
					<div class="row js-fullheight justify-content-center d-flex align-items-center">
						<div class="col-md-8">
							<div class="text text-center">
								<span class="subheading">Welcome to</span>
								<h2>E-Beauty</h2>
								<h3 class="mb-4">For Your Beautiful Soul</h3>
								<p><a href="#" class="btn btn-primary py-3 px-4">Become A Model</a></p>
							</div>
						</div>
					</div>
				</div>
			</section>

			

      



	    <section class="ftco-section ftco-no-pt ftco-no-pb">
	    	<div class="container-fluid px-4">
	    		<div class="row d-flex">
	    			<div class="col-md-6 col-lg-3 d-flex align-items-center ftco-animate">
	    				<div class="heading-section text-center">
		    				<h2 class="">Our SERVICES</h2>
	              <p>Far far away, behind the word mountains, far from the countries Vokalia </p>
              </div>
	    			</div>
					<?php
				$query = "SELECT * FROM products ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
        <div style="background-image" >
		<br>
						<img src="images/<?php echo $row["img"]; ?>"  class="model-img" style="background-image"; >
						

						<h4 class="d-flex models-info"><?php echo $row["namee"]; ?></h4>
						

						<h4 class="box">$ <?php echo $row["price"]; ?></h4>

						<input type="text" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="hidden_name" value="<?php echo $row["namee"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
						<br>
						

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-primary py-3 px-4" value="Add to Cart" />
						
					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
     
					......
	    			<div class="col-md-6 col-lg-3 ftco-animate">
	    				<div class="model-entry">
			    			<div class="model-img" style="background-image: url(images/image_1.jpg);">
							
			    				<div class="name text-center">
			    					<h3><a href="model-single.php">NEW</a></h3>
			    				</div>
			    				<div class="text text-center">
			    					<h3><a href="model-single.php">Black<br><span> vernis pants</span></a></h3>
			    					<div class="d-flex models-info">
			    						<div class="box">
		                		<p>Height</p>
		                		<span>185</span>
		                	</div>
		                	<div class="box">
		                		<p>Bust</p>
		                		<span>79</span>
		                	</div>
		                	<div class="box">
		                		<p>Waist</p>
		                		<span>40</span>
		                	</div>
		                	<div class="box">
		                		<p>Hips</p>
		                		<span>87</span>
		                	</div>
		                	<div class="box">
		                		<p>Shoe</p>
		                		<span>40</span>
		                	</div>
			    					</div>
			    				</div>
			    			</div>
		    			</div>
		    		</div>
		    		<div class="col-md-6 col-lg-3 ftco-animate">
		    			<div class="model-entry">
			    			<div class="model-img" style="background-image: url(images/image_2.jpg);">
			    				<div class="name text-center">
			    					<h3><a href="model-single.php">products</a></h3>
			    				</div>
			    				<div class="text text-center">
			    					<h3><a href="model-single.php">products<br><span>management</span></a></h3>
			    					<div class="d-flex models-info">
			    						<div class="box">
		                		<p>Height</p>
		                		<span>185</span>
		                	</div>
		                	<div class="box">
		                		<p>Bust</p>
		                		<span>79</span>
		                	</div>
		                	<div class="box">
		                		<p>Waist</p>
		                		<span>40</span>
		                	</div>
		                	<div class="box">
		                		<p>Hips</p>
		                		<span>87</span>
		                	</div>
		                	<div class="box">
		                		<p>Shoe</p>
		                		<span>40</span>
		                	</div>
			    					</div>
			    				</div>
			    			</div>
			    		</div>
	    			</div>
	    			<div class="col-md-6 col-lg-3 ftco-animate">
	    				<div class="model-entry">
			    			<div class="model-img" style="background-image: url(images/image_3.jpg);">
			    				<div class="name text-center">
			    					<h3><a href="model-single.php">orders</a></h3>
			    				</div>
			    				<div class="text text-center">
			    					<h3><a href="model-single.php">make<br><span>an order</span></a></h3>
			    					<div class="d-flex models-info">
			    						<div class="box">
		                		<p>Height</p>
		                		<span>185</span>
		                	</div>
		                	<div class="box">
		                		<p>Bust</p>
		                		<span>79</span>
		                	</div>
		                	<div class="box">
		                		<p>Waist</p>
		                		<span>40</span>
		                	</div>
		                	<div class="box">
		                		<p>Hips</p>
		                		<span>87</span>
		                	</div>
		                	<div class="box">
		                		<p>Shoe</p>
		                		<span>40</span>
		                	</div>
			    					</div>
			    				</div>
			    			</div>
			    		</div>
	    			</div>
	    			
	    			<div class="col-md-6 col-lg-3 ftco-animate">
	    				<div class="model-entry">
			    			<div class="model-img" style="background-image: url(images/image_5.jpg);">
			    				<div class="name text-center">
			    					<h3><a href="model-single.php">videos</a></h3>
			    				</div>
			    				<div class="text text-center">
			    					<h3><a href="model-single.php">tuto<br><span>videos</span></a></h3>
			    					<div class="d-flex models-info">
			    						<div class="box">
		                		<p>Height</p>
		                		<span>185</span>
		                	</div>
		                	<div class="box">
		                		<p>Bust</p>
		                		<span>79</span>
		                	</div>
		                	<div class="box">
		                		<p>Waist</p>
		                		<span>40</span>
		                	</div>
		                	<div class="box">
		                		<p>Hips</p>
		                		<span>87</span>
		                	</div>
		                	<div class="box">
		                		<p>Shoe</p>
		                		<span>40</span>
		                	</div>
			    					</div>
			    				</div>
			    			</div>
			    		</div>
	    			</div>
	    			<div class="col-md-6 col-lg-3 ftco-animate">
	    				<div class="model-entry">
			    			<div class="model-img" style="background-image: url(images/image_6.jpg);">
			    				<div class="name text-center">
			    					<h3><a href="model-single.php">blogs</a></h3>
			    				</div>
			    				<div class="text text-center">
			    					<h3><a href="model-single.php">visit<br><span>our blogs</span></a></h3>
			    					<div class="d-flex models-info">
			    						<div class="box">
		                		<p>Height</p>
		                		<span>185</span>
		                	</div>
		                	<div class="box">
		                		<p>Bust</p>
		                		<span>79</span>
		                	</div>
		                	<div class="box">
		                		<p>Waist</p>
		                		<span>40</span>
		                	</div>
		                	<div class="box">
		                		<p>Hips</p>
		                		<span>87</span>
		                	</div>
		                	<div class="box">
		                		<p>Shoe</p>
		                		<span>40</span>
		                	</div>
			    					</div>
			    				</div>
			    			</div>
			    		</div>
	    			</div>
	    			<div class="col-md-6 col-lg-3 ftco-animate">
	    				<div class="model-entry">
			    			<div class="model-img" style="background-image: url(images/image_7.jpg);">
			    				<div class="name text-center">
			    					<h3><a href="model-single.php">treatements</a></h3>
			    				</div>
			    				<div class="text text-center">
			    					<h3><a href="model-single.php">get<br><span>yours</span></a></h3>
			    					<div class="d-flex models-info">
			    						<div class="box">
		                		<p>Height</p>
		                		<span>185</span>
		                	</div>
		                	<div class="box">
		                		<p>Bust</p>
		                		<span>79</span>
		                	</div>
		                	<div class="box">
		                		<p>Waist</p>
		                		<span>40</span>
		                	</div>
		                	<div class="box">
		                		<p>Hips</p>
		                		<span>87</span>
		                	</div>
		                	<div class="box">
		                		<p>Shoe</p>
		                		<span>40</span>
		                	</div>
			    					</div>
			    				</div>
			    			</div>
			    		</div>
	    			</div>
	    			 
	    			<div class="col-md-6 col-lg-3 d-flex justify-content-center align-items-center ftco-animate">
		    			<div class="btn-view">
		    				<p><a href="model.php" class="btn btn-white py-3 px-5">View more</a></p>
		    			</div>
	    			</div>
	    		</div>
	    	</div>
	    </section>

	    <section class="ftco-section">
	      <div class="container">
	      	<div class="row justify-content-center">
	      		<div class="col-md-8 mb-5 heading-section text-center ftco-animate">
	      			<span class="subheading">Blog</span>
	            <h2 class="mb-4">Recent Blog</h2>
	            <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia </p>
	          </div>
	      	</div>
	        <div class="row d-flex">
	          <div class="col-md-4 d-flex ftco-animate">
	          	<div class="blog-entry bg-dark align-self-stretch">
	              <a href="blog-single.php" class="block-20" style="background-image: url('images/image_1.jpg');">
	              </a>
	              <div class="text p-4 d-block">
	              	<div class="meta mb-3">
	                  <div><a href="#">May 17, 2019</a></div>
	                  <div><a href="#">Admin</a></div>
	                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
	                </div>
	                <h3 class="heading mt-3"><a href="#">Asia's Next Top Model</a></h3>
	              </div>
	            </div>
	          </div>
	          <div class="col-md-4 d-flex ftco-animate">
	          	<div class="blog-entry bg-dark align-self-stretch">
	              <a href="blog-single.php" class="block-20" style="background-image: url('images/image_2.jpg');">
	              </a>
	              <div class="text p-4 d-block">
	              	<div class="meta mb-3">
	                  <div><a href="#">May 17, 2019</a></div>
	                  <div><a href="#">Admin</a></div>
	                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
	                </div>
	                <h3 class="heading mt-3"><a href="#">Asia's Next Top Model</a></h3>
	              </div>
	            </div>
	          </div>
	          <div class="col-md-4 d-flex ftco-animate">
	          	<div class="blog-entry bg-dark align-self-stretch">
	              <a href="blog-single.php" class="block-20" style="background-image: url('images/image_3.jpg');">
	              </a>
	              <div class="text p-4 d-block">
	              	<div class="meta mb-3">
	                  <div><a href="#">May 17, 2019</a></div>
	                  <div><a href="#">Admin</a></div>
	                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
	                </div>
	                <h3 class="heading mt-3"><a href="#">Asia's Next Top Model</a></h3>
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>

	    <section class="ftco-section testimony-section img" style="background-image: url(images/bg_2.jpg);">
	    	<div class="overlay"></div>
	      <div class="container">
	        <div class="row d-md-flex justify-content-center">
	        	<div class="col-md-8 ftco-animate">
	            <div class="carousel-testimony owl-carousel">
	              <div class="item">
	                <div class="testimony-wrap text-center">
	                  <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
	                    <span class="quote d-flex align-items-center justify-content-center">
	                      <i class="icon-quote-left"></i>
	                    </span>
	                  </div>
	                  <div class="text">
	                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
	                    <p class="name">Mike Lewis</p>
	                    <span class="position">Architect</span>
	                  </div>
	                </div>
	              </div>
	              <div class="item">
	                <div class="testimony-wrap text-center">
	                  <div class="user-img mb-5" style="background-image: url(images/person_2.jpg)">
	                    <span class="quote d-flex align-items-center justify-content-center">
	                      <i class="icon-quote-left"></i>
	                    </span>
	                  </div>
	                  <div class="text">
	                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
	                    <p class="name">Dennis Green</p>
	                    <span class="position">Architect</span>
	                  </div>
	                </div>
	              </div>
	              <div class="item">
	                <div class="testimony-wrap text-center">
	                  <div class="user-img mb-5" style="background-image: url(images/person_3.jpg)">
	                    <span class="quote d-flex align-items-center justify-content-center">
	                      <i class="icon-quote-left"></i>
	                    </span>
	                  </div>
	                  <div class="text">
	                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
	                    <p class="name">Dennis Green</p>
	                    <span class="position">Architect</span>
	                  </div>
	                </div>
	              </div>
	              <div class="item">
	                <div class="testimony-wrap text-center">
	                  <div class="user-img mb-5" style="background-image: url(images/person_3.jpg)">
	                    <span class="quote d-flex align-items-center justify-content-center">
	                      <i class="icon-quote-left"></i>
	                    </span>
	                  </div>
	                  <div class="text">
	                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
	                    <p class="name">Dennis Green</p>
	                    <span class="position">Customer</span>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>

	    <section class="ftco-appointment ftco-section">
				<div class="overlay"></div>
				<div class="container">
					<div class="row justify-content-center">
	      		<div class="col-md-8 mb-5 heading-section text-center ftco-animate">
	      			<span class="subheading">Stylistic</span>
	            <h2 class="mb-4">Contact Us</h2>
	            <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia </p>
	          </div>
	      	</div>
					<div class="row">
						<div class="col-md-4">
							<div class="row">
		            <div class="col-md-12 mb-3">
		              <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
		            </div>
		            <div class="col-md-12 mb-3">
		              <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
		            </div>
		            <div class="col-md-12 mb-3">
		              <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
		            </div>
		            <div class="col-md-12 mb-3">
		              <p><span>Website:</span> <a href="#">yoursite.com</a></p>
		            </div>
							</div>
						</div>
						<div class="col-md-8 appointment ftco-animate">
		    			<form action="#" class="appointment-form">
		    				<div class="row">
		    					<div class="col-md-6">
		    						<div class="d-md-flex">
					    				<div class="form-group">
					    					<input type="text" class="form-control" placeholder="First Name">
					    				</div>
				    				</div>
		    					</div>
		    					<div class="col-md-6">
		    						<div class="d-me-flex">
				    					<div class="form-group">
					    					<input type="text" class="form-control" placeholder="Last Name">
					    				</div>
				    				</div>
		    					</div>
		    					<div class="col-md-6">
		    						<div class="d-me-flex">
				    					<div class="form-group">
					    					<input type="text" class="form-control" placeholder="Email Address">
					    				</div>
				    				</div>
		    					</div>
		    					<div class="col-md-6">
		    						<div class="d-me-flex">
				    					<div class="form-group">
					    					<input type="text" class="form-control" placeholder="Your City">
					    				</div>
				    				</div>
		    					</div>
		    					<div class="col-md-12">
		    						<div class="form-group">
				              <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Message"></textarea>
				            </div>
		    					</div>
		    					<div class="col-md-12">
		    						<div class="form-group">
				              <input type="submit" value="Send A Message" class="btn btn-primary py-3 px-4">
				            </div>
		    					</div>
		    				</div>
		    			</form>
		    		</div>
					</div>
				</div>
	    </section>
	    <section class="ftco-section ftco-no-pt ftco-no-pb">
	    	<div class="container-fluid px-0">
	    		<div class="row no-gutters d-md-flex align-items-center">
	    			<div class="col-md-12 d-flex align-self-stretch">
	    				<div id="map"></div>
	    			</div>
	    		</div>
	    	</div>
	    </section>

	    <section class="ftco-quote ftco-section ftco-animate">
	    	<div class="container">
	    		<div class="row d-flex">
	    			<div class="col-md-6 req-quote py-5 text-center align-items-center img" style="background-image: url(images/bg_2.jpg);">
		    			<h3 class="ml-md-3">Become A Model?</h3>
		    			<span class="ml-md-3"><a href="#">Call us now to know how!</a></span>
	    			</div>
	    			<div class="col-md-6 req-quote py-5 text-center align-items-center img" style="background-image: url(images/bg_1.jpg);">
		    			<h3 class="ml-md-3">Model Courses</h3>
		    			<span class="ml-md-3"><a href="#">Know more</a></span>
	    			</div>
	    		</div>
	    	</div>
	    </section>
      
      <footer class="ftco-footer ftco-section img">
	    	<div class="overlay"></div>
	      <div class="container">
	        <div class="row mb-5">
	          <div class="col-md-3">
	            <div class="ftco-footer-widget mb-4">
	              <h2 class="ftco-heading-2 logo"><a href="index.php">Stylistic</a></h2>
	              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
	              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
	                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
	                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
	                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
	              </ul>
	            </div>
	          </div>
	          <div class="col-md-4">
	            <div class="ftco-footer-widget mb-4">
	              <h2 class="ftco-heading-2">Recent Blog</h2>
	              <div class="block-21 mb-4 d-flex">
	                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
	                <div class="text">
	                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
	                  <div class="meta">
	                    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
	                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
	                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
	                  </div>
	                </div>
	              </div>
	              <div class="block-21 mb-4 d-flex">
	                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
	                <div class="text">
	                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
	                  <div class="meta">
	                    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
	                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
	                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
	          <div class="col-md-2">
	             <div class="ftco-footer-widget mb-4 ml-md-4">
	              <h2 class="ftco-heading-2">Site Links</h2>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">Home</a></li>
	                <li><a href="#" class="py-2 d-block">About</a></li>
	                <li><a href="#" class="py-2 d-block">Model</a></li>
	                <li><a href="#" class="py-2 d-block">Services</a></li>
	                <li><a href="#" class="py-2 d-block">Blog</a></li>
	              </ul>
	            </div>
	          </div>
	          <div class="col-md-3">
	            <div class="ftco-footer-widget mb-4">
	            	<h2 class="ftco-heading-2">Have a Questions?</h2>
	            	<div class="block-23 mb-3">
		              <ul>
		                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
		                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
		                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
		              </ul>
		            </div>
	            </div>
	          </div>
	        </div>
	        <div class="row">
	          <div class="col-md-12 text-center">

	            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
	  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
	  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	          </div>
	        </div>
	      </div>
	    </footer>

      <!-- loader -->
      <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

      </div>

	    <!-- Modal -->
	    <div class="modal fade" id="modalRequest" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
	      <div class="modal-dialog" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h5 class="modal-title" id="modalRequestLabel">Request a Quote</h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
	          </div>
	          <div class="modal-body">
	            <form action="#">
	              <div class="form-group">
	                <label for="appointment_name" class="text-black">Full Name</label>
	                <input type="text" class="form-control" id="appointment_name">
	              </div>
	              <div class="form-group">
	                <label for="appointment_email" class="text-black">Email</label>
	                <input type="text" class="form-control" id="appointment_email">
	              </div>
	              <div class="row">
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="appointment_date" class="text-black">Date</label>
	                    <input type="text" class="form-control" id="appointment_date">
	                  </div>    
	                </div>
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="appointment_time" class="text-black">Time</label>
	                    <input type="text" class="form-control" id="appointment_time">
	                  </div>
	                </div>
	              </div>
	              

	              <div class="form-group">
	                <label for="appointment_message" class="text-black">Message</label>
	                <textarea name="" id="appointment_message" class="form-control" cols="30" rows="10"></textarea>
	              </div>
	              <div class="form-group">
	                <input type="submit" value="Send Message" class="btn btn-primary">
	              </div>
	            </form>
	          </div>
	          
	        </div>
	      </div>
	    </div>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="js/jquery.mb.YTPlayer.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
    
  </body>
</html>