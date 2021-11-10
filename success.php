
<?php
	// Redirect in 3 seconds after successful payment
	header('refresh: 3; url=products.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Account</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/successStyle.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                        <h2 style="font-size: 25px;" class="form-title">ShockWaveGamez</h2>
						<br>
						<h2 class="form-title">Thank You For Your Purchase!</h2>
                    <p class="loginhere">
                        This page will redirect in a few seconds or click here: <a href="products.php" class="loginhere-link">View More Products</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>