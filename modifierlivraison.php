<?php
    include_once 'C:/xampp/htdocs/stylistic-master/Model/livraison.php';
    include_once 'C:/xampp/htdocs/stylistic-master/Controller/livraisonC.php';

    $error = "";

    // create det
    $det = null;


    // create an instance of the controller
    $livraisonC = new livraisonC();
    if (
        isset($_POST['firstName']) &&
		isset($_POST['lastName']) &&		
		isset($_POST["country"]) && 
        isset($_POST["adresse"]) && 
         isset($_POST["zip"])&& 
         isset($_POST["phone"]) && 
         isset($_POST["id"])
        

    ) {
        if (
    !empty($_POST["firstName"]) &&
    !empty($_POST["lastName"]) &&		
    !empty($_POST["country"]) && 
    !empty($_POST["adresse"]) && 
    !empty($_POST["zip"])&& 
    !empty($_POST["phone"]) && 
    !empty($_POST["id"])

            

        ) {
            $det = new det(
                ($_POST["firstName"]) ,
                ($_POST["lastName"]) ,		
                ($_POST["country"]) , 
                ($_POST["adresse"]) , 
                ($_POST["zip"]),
                ($_POST["phone"]) , 
                ($_POST["id"])
            );
            $livraisonC->modifierlivraison($det, $_POST["id"]);
            header('Location:about.php');
        }
        else
            $error = "Missing information";
    }    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Stylistic - Free Bootstrap 4 Template by Colorlib</title>
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
              <h1 class="mb-4"><a href="index.html" class="logo">Stylistic<br><span>Model Agency</span></a></h1>
              <ul>
                <li><a href="index.html"><span>Home</span></a></li>
                <li class="active"><a href="about.html"><span>About</span></a></li>
                <li><a href="model.html"><span>Models</span></a></li>
                <li><a href="blog.html"><span>Blog</span></a></li>
                <li><a href="contact.html"><span>Contact</span></a></li>
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
	          <a class="colorlib-logo" href="index.html">Stylistic<br><span>Model Agency</span></a>
	        </div>
	        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        </div>
      </header>
			
			<section class="hero-wrap" style="background-image: url(images/bg_1.jpg);">
      	<div class="overlay"></div>
	      <div class="container">
	        <div class="row no-gutters text align-items-end justify-content-center" data-scrollax-parent="true">
	          <div class="col-md-8 ftco-animate text-center">
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>About</span></p>
	            <h1 class="mb-5 bread">About Us</h1>
	          </div>
	        </div>
	      </div>
      </section>

      
      <section class="ftco-section ftco-no-pt ftco-no-pb ftco-about-section">
      	<div class="container-fluid px-0">
      		<div class="row d-md-flex text-wrapper">
						<div class="one-half img" style="background-image: url('images/bg_5.jpg');"></div>
						<div class="one-half half-text d-flex justify-content-end align-items-center">
							<div class="text-inner pl-md-5">
								<span class="subheading">Hello!</span>
                               
                            </div> 
                             <div id="error">
            <?php echo $error; ?>
        </div>
            
        <?php
            if (isset($_POST['id'])){
                $det = $livraisonC->recupererlivraison($_POST['id']);
                ?>
               
                            
                           <form action="" method="POST">

                             
                                
                               
                           
                            

                            <div class="mb-3">
                                    <label for="text" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName"value="<?php echo $det['firstName']; ?>">
                            </div>
                            <div class="mb-3">
                                    <label for="text" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName"value="<?php echo $det['lastName']; ?>" >
                            </div>
                            <div class="mb-3">
                                    <label for="text" class="form-label">country</label>
                                    <input type="text" class="form-control" id="country" name="country" value="<?php echo $det['country']; ?>" >
                            </div>


                            <div class="mb-3">
                                    <label for="text" class="form-label">Adresse</label>
                                    <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo $det['adresse']; ?>" >
                            </div>
                           
                             <div class="mb-3">
                                    <label for="text" class="form-label">zip</label>
                                    <input type="text" class="form-control" id="zip" name="zip"value="<?php echo $det['zip']; ?>" >
                            </div>

                            <div class="mb-3">
                                    <label for="PersonID" class="form-label">Phone</label>
                                    <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $det['phone']; ?>" > 
                            </div>
                            <div class="mb-3">
                                    <label for="text" class="form-label">id</label>
                                    <input type="text" class="form-control" id="id" name="id" value="<?php echo $det['id']; ?>" >
                            </div>
                            
                            <div>
                                <button type="submit" class="btn btn-primary">Modifier  </button>
                            </div>
                           
                            </form>
                        </div>
                    </div>
                </div>
            </div>
      
            <!-- form End -->


            <!-- Footer Start -->
           
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
      <?php
        }
        ?>

</html>