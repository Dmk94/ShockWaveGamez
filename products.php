

<?php 
// Include Paypal configuration file  
include_once 'config.php';  
  
// Include database connection file  
include_once 'dbConnect.php'; 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>View Our Products</title>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!"><img class="logo" src="assets/img/ShockWaveGamez Logo.png"/></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
					<!--
                        <button style="width: auto;" class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span style="background-color: black;color: white;" class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
					-->
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div style="background-color: rgba(0,0,0,0.5); padding-bottom: 1.25%;" class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 style="color: white;" class="display-4 fw-bolder">Show Who's Boss</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Get your head in the game and shock the competition!</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    
					<?php 
						// Fetch products from the database 
						$results = $db->query("SELECT * FROM products"); 
						while($row = $results->fetch_assoc()){ 
					?>
	
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="<?php echo $row['image']; ?>" alt="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $row['name']; ?></h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">Price: $<?php echo $row['price']; ?></span>
                                </div>
                            </div>
							<form target="_self" action="<?php echo PAYPAL_URL; ?>" method="post">
								<!-- Identify business (Info@ShockWaveGamez.com in config.php) so that you can collect the payments. -->
								<input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
			
								<!-- PayPal Shopping Cart Add to Cart button. -->
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="add" value="1">
			
								<!-- Details about the item that buyers will purchase. -->
								<input type="hidden" name="item_name" value="<?php echo $row['name']; ?>">
								<input type="hidden" name="item_number" value="<?php echo $row['id']; ?>">
								<input type="hidden" name="amount" value="<?php echo $row['price']; ?>">
								<input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">
			
								<!-- Add URLs -->
								<input type="hidden" name="shopping_url" value="<?php echo CONTINUE_SHOPPING_URL; ?>">
								<input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
								<input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
								<input type="hidden" name="notify_url" value="<?php echo PAYPAL_NOTIFY_URL; ?>">
        
								<!-- Product actions-->
								<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
									<!-- Display the payment/add to cart button. -->
									<div class="text-center"><input class="btn btn-outline-dark mt-auto" type="submit" value="Add To Cart" name="submit" alt="Add To Cart"></div>
								</div>
							</form>
                        </div>
                    </div>
					<?php } ?>
                    
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer style="background-color: white;" class="py-5 bg-dark">
            <div class="container"><p style="color: black;" class="m-0 text-center text-white">Copyright &copy; ShockWaveGamez 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
