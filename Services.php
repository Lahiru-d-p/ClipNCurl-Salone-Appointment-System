<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--css files-->
		<link rel="stylesheet" href="styles/services.css">
		
    	<title>Clip & Curl Salon-Services</title>
        <script src="scripts/services.js"></script>
    </head>
    <body>
        <!--Navigate bar-->
		<?php
		$active = "services";
		include 'header.php';
		?>

        <div class="child-navbar">
            <a href="#hair-cut" class="child-nav">
                Hair Cut
            </a>
            <a href="#hair-color" class="child-nav">
              Hair Color
            </a>
            <a href="#rebonding" class="child-nav">
                Rebonding
            </a>
            <a href="#hair-treatment" class="child-nav">
                Hair Treatment
            </a>
            <a href="#threading" class="child-nav">
                Threading
            </a>
            <a href="#waxing" class="child-nav">
                Waxing
            </a>
            <a href="#dressing" class="child-nav">
                Dressing
            </a>
        </div>
        <span id="hair-cut"></span>
        <div class="box1">
            <div class="category-box">
                <div class="head-box">
                    <h1>Hair Cut</h1> 
                </div>
                <div class="services-box">
                    <h2>Ladies Hair Cut</h2>
                    <p>Rs. 2500 - 1h</p>
                </div>
                <div class="services-box">
                    <h2>Gents Hair Cut</h2>
                    <p>Rs.1500 - 30min</p>
                </div>
                <div class="services-box">
                    <h2>Child Hair Cut</h2>
                    <p>Rs.1500 - 30min</p>
                </div>
                <div class="services-box-last" id="hair-color">
                    <h2>Hair Trim</h2>
                    <p>Rs.1500 - 1h</p>
                </div>
            </div>
            <div class="image-box">
                <img src="images/services-images/hair_cutting.jpg" class="image"></image>
            </div>
        </div>

        <span>space</span>
        <div class="box1">
            <div class="image-box">
                <img src="images/services-images/hair-color.png" class="image"></image>
            </div>
            <div class="category-box">
                <div class="head-box">
                    <h1>Hair Color</h1>  
                </div>
                <div class="services-box">
                    <h2>Global Hair Color</h2>
                    <p>Rs.9000 - 1h 30min</p>
                </div>
                <div class="services-box">
                    <h2>Highlights</h2>
                    <p>Rs.4500 - 1h 30min</p>
                </div>
                <div class="services-box">
                    <h2>Fashion Color (Base)</h2>
                    <p>Rs.3500 - 1h</p>
                </div>
                <div class="services-box-last" id="rebonding">
                    <h2>Hair Color Tint -Full Hair (Black)</h2>
                    <p>Rs.3500 - 1h 30min</p>
                </div>
            </div>
        </div>
        
        <span>space</span>
        <div class="box1">
            <div class="category-box">
                <div class="head-box">
                    <h1>Rebonding</h1>  
                </div>
                <div class="services-box">
                    <h2>Re-bonding</h2>
                    <p>Rs.15000 - 3h</p>
                </div>
                <div class="services-box">
                    <h2>Perming</h2>
                    <p>Rs.8000 - 3h</p>
                </div>
                <div class="services-box">
                    <h2>Keratin</h2>
                    <p>Rs.25000 - 3h</p>
                </div>
                <div class="services-box-last"  id="hair-treatment">
                    <h2>Relaxing - french</h2>
                    <p>Rs.4500 - 1h 30min</p>
                </div>
            </div>
            <div class="image-box">
                <img src="images/services-images/rebonding.jpg" class="image"></image>
            </div>
        </div>

        <span>space</span>
        <div class="box1">
            <div class="image-box">
                <img src="images/services-images/hair-treatment.jpg" class="image"></image>
            </div>
            <div class="category-box">
                <div class="head-box">
                    <h1>Hair Treatments</h1>  
                </div>
                <div class="services-box">
                    <h2>Drandruff Treatment</h2>
                    <p>Rs.4000 - 1h</p>
                </div>
                <div class="services-box">
                    <h2>Hair Spa</h2>
                    <p>Rs.3000 - 1h</p>
                </div>
                <div class="services-box-last" id="threading">
                    <h2>Oil treatment</h2>
                    <p>Rs.2000 - 1h</p>
                </div> 
            </div>
        </div>

        <span >space</span>
        <div class="box1">
            <div class="category-box">
                <div class="head-box">
                    <h1>Threading</h1>  
                </div>
                <div class="services-box">
                    <h2>Eye Brows</h2>
                    <p>Rs.500 - 30min</p>
                </div>
                <div class="services-box">
                    <h2>Upper lip</h2>
                    <p>Rs.300 - 30min</p>
                </div>
                <div class="services-box">
                    <h2>Eye brows & upper lips</h2>
                    <p>Rs.800 - 30min</p>
                </div> 
                <div class="services-box-last" id="waxing">
                    <h2>Upper Lip & Chine</h2>
                    <p>Rs.800 - 30min</p>
                </div>
            </div>
            <div class="image-box">
                <img src="images/services-images/threading.jpg" class="image" style="max-height: 550px;max-width:400px;"></image>
            </div>
        </div>

        <span >space</span>
        <div class="box1">
            <div class="image-box">
                <img src="images/services-images/waxing.png" class="image"></image>
            </div>
            <div class="category-box">
                <div class="head-box">
                    <h1>Waxing</h1>  
                </div>
                <div class="services-box">
                    <h2>Waxing - Chin</h2>
                    <p>Rs.800 - 30min</p>
                </div>
                <div class="services-box">
                    <h2>Waxing - Face Side</h2>
                    <p>Rs.1000 - 30min</p>
                </div>
                <div class="services-box">
                    <h2>Waxing - Upper Lips</h2>
                    <p>Rs.800 - 30min</p>
                </div> 
                <div class="services-box-last" id="dressing">
                    <h2>Waxing - Eye Brow</h2>
                    <p>Rs.800 - 30min</p>
                </div>
            </div>
            </div>
        </div>

        <span>space</span>
        <div class="box1">
            <div class="category-box">
                <div class="head-box">
                    <h1>Dressing</h1>  
                </div>
                <div class="services-box">
                    <h2>Full Dressing</h2>
                    <p>Rs.6000 - 1h</p>
                </div>
                <div class="services-box">
                    <h2>Makeup</h2>
                    <p>Rs.2500 - 30min</p>
                </div>
                <div class="services-box">
                    <h2>Hair Style</h2>
                    <p>Rs.800 - 30min</p>
                </div> 
                <div class="services-box-last">
                    <h2>Hair and Saree Drapping</h2>
                    <p>Rs.4000 - 30min</p>
                </div>
            </div>
            <div class="image-box">
                <img src="images/services-images/dressing.jpg" class="image"></image>
            </div>
        </div>
		
		<!--footer-->
		<?php
		include 'footer.html';
		?>
    </body>

</html>