<?php
    include "../connection.php";
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $loggedInUserId = $_SESSION['user_id'];

    $sel = "SELECT first_name FROM sean_user WHERE id = '$loggedInUserId'";
    $query = mysqli_query($conn, $sel);

    if (!$query) {
        die("Query failed: " . mysqli_error($conn));
    }

    $result = mysqli_fetch_assoc($query);
    $loginUsername = $result['first_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carousell Clone</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="./home.css">
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/chevron-down.css' rel='stylesheet'>
</head>

<body>
<header class="phishing-alert">
        <div class="phishing">
            <img src="../../images/phising.PNG" alt="Phishing Image">
            <div class="phishing-text">
                <p><b>Report Phishing Behaviors Now!</b> See Something Suspicious? Help Us Fight Phishing Threats Together!</p>
            </div>
        </div>
    </header>

    <header class="main-header">
        <div class="container">
            <div class="logo">
                <img src="../../images/caroussel2.PNG" alt="Carousell Logo">
            </div>
            <div class="listings">
                <ul>
                    <li>Luxury</li>
                    <li>Fashion</li>
                    <li>Electronics</li>
                    <li>Property</li>
                    <li>Cars</li>
                    <li>Collectibles</li>
                    <li>Categories</li>
                </ul>
            </div>

            
            <div class="buttons">
        <div class="greeting-dropdown">
            <p class="greeting">Hello,</p>
            <div class="dropdown">
                <span>
                    <?php 
                        echo htmlspecialchars($loginUsername);
                    ?>
                </span>
                <i class="gg-chevron-down" onclick="toggleDropdown()" style="cursor: pointer;"></i>
                <div class="dropdown-content" id="dropdownContent">
                    <a href="../logout.php">Logout</a> <!-- Replace "logout.php" with the actual logout URL -->
                </div>
            </div>
        </div>
    <input type="button" value="Sell" class="sell-button" onclick="openModal('sellModal')">
        </div>


    </header>

    <!-- Register Modal -->
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('registerModal')">&times;</span>
            <h2>Register</h2>
            <form>
                <label for="register-first-name">First Name:</label>
                <input type="text" id="register-first-name" name="first-name" required><br><br>

                <label for="register-last-name">Last Name:</label>
                <input type="text" id="register-last-name" name="last-name" required><br><br>

                <label for="register-email">Email:</label>
                <input type="email" id="register-email" name="email" required><br><br>

                <label for="register-password">Password:</label>
                <input type="password" id="register-password" name="password" required><br><br>

                <input type="submit" value="Register">
            </form>
        </div>
    </div>

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('loginModal')">&times;</span>
            <h2>Login</h2>
            <form>
                <label for="login-username">Username:</label>
                <input type="text" id="login-username" name="username"><br><br>
                <label for="login-password">Password:</label>
                <input type="password" id="login-password" name="password"><br><br>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>

    <!-- Sell Modal -->
    <div id="sellModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('sellModal')">&times;</span>
            <h2>Sell</h2>
            <form>
                <label for="sell-item">Item:</label>
                <input type="text" id="sell-item" name="item"><br><br>
                <label for="sell-price">Price:</label>
                <input type="text" id="sell-price" name="price"><br><br>
                <input type="submit" value="Sell">
            </form>
        </div>
    </div>

    <div class="search-container">
        <img src="../../images/search.PNG" alt="Search Image" class="search-image">
        <div class="search-bar-wrapper">
            <input type="text" class="search-bar" placeholder="Search...">
        </div>
    </div>

    <div id="Daily_Pick" class="page active">
    <div class="daily">
        <h1>Daily Pick</h1>
        <a href="list.php"><img src="../../images/list1.png" alt="List 1"></a>
        <img src="../../images/list2.png" alt="List 2">
        <img src="../../images/list3.png" alt="List 3">
        <img src="../../images/list4.png" alt="List 4">
    </div>
</div>

<style>
    .daily {
    justify-content: center; /* Center align the images horizontally */
}

.daily h1 {
    margin-right: auto; /* Push h1 to the left */
    margin-left: 100px; /* Add left margin to the h1 */
    text-align: left; /* Align text of h1 to the left */
}

.daily img {
    width: 290px; /* Set the width of the images */
    height: auto; /* Maintain aspect ratio */
    margin: 0 5px; /* Add margin around the images */
}


    </style>

  



    <div class="carousel-container">
        <div class="carousel">
            <div class="carousel-item">
                <img src="../../images/1.PNG" alt="Image 1">
            </div>
            <div class="carousel-item">
                <img src="../../images/2.PNG" alt="Image 2">
            </div>
            <div class="carousel-item">
                <img src="../../images/3.PNG" alt="Image 3">
            </div>
            <div class="carousel-item">
                <img src="../../images/4.PNG" alt="Image 4">
            </div>
        </div>
        <div class="carousel-controls">
            <button class="left" onclick="scrollCarousel(-1)"></button>
            <button class="right" onclick="scrollCarousel(1)"></button>
        </div>
    </div>

    <div class="Featured_Categories">
    <h1>Featured Categories</h1>
    <div class="ez">
        <a href="https://www.carousell.ph/property-house-and-lot-for-sale/h-924/"><img src="../../images/property.jpg" alt="property"></a>
        <a href="https://www.carousell.ph/used-cars-for-sale/h-2702/"><img src="../../images/auto.PNG" alt="auto"></a>
        <a href="https://www.carousell.ph/categories/mobile-phones-gadgets-840/"><img src="../../images/gadgets.jpg" alt="gadgets"></a>
        <a href="https://www.carousell.ph/categories/womens-fashion-4/"><img src="../../images/womensfashion.jpg" alt="women"></a>
        <a href="https://www.carousell.ph/categories/mens-fashion-3/?addRecent=false&canChangeKeyword=false&includeSuggestions=false&searchId=f4OKka"><img src="../../images/mensfashion.jpg" alt="men"></a>
    </div>
</div>

    <div class="Metro_Manila">
        <h1>Newly listed budget houses in Metro Manila</h1>

        <nav>
            <ul>
                <li><a href="#" onclick="showPage('Manila', event, 'Metro_Manila')">Manila</a></li>
                <li><a href="#" onclick="showPage('Qct', event, 'Metro_Manila')">Quezon City</a></li>
                <li><a href="#" onclick="showPage('Pasig', event, 'Metro_Manila')">Pasig</a></li>
                <li><a href="#" onclick="showPage('Cebu', event, 'Metro_Manila')">Cebu</a></li>
            </ul>
        </nav>

        <div id="Manila" class="page active">
            <div class="manila_content">
                <img src="../../images/manila1.PNG" alt="Manila House 1">
                <img src="../../images/manila2.PNG" alt="Manila House 2">
                <img src="../../images/manila3.PNG" alt="Manila House 3">
                <img src="../../images/manila4.PNG" alt="Manila House 4">
            </div>
        </div>

        <div id="Qct" class="page">
            <div class="qct_content">
                <img src="../../images/qc1.png" alt="Quezon City House 1">
                <img src="../../images/qc2.png" alt="Quezon City House 2">
                <img src="../../images/qc3.png" alt="Quezon City House 3">
                <img src="../../images/qc4.png" alt="Quezon City House 4">
            </div>
        </div>

        <div id="Pasig" class="page">
            <div class="pasig_content">
                <img src="../../images/pasig1.png" alt="Pasig City House 1">
                <img src="../../images/pasig2.png" alt="Pasig City House 2">
                <img src="../../images/pasig3.png" alt="Pasig City House 3">
                <img src="../../images/pasig4.png" alt="Pasig City House 4">
            </div>
        </div>

        <div id="Cebu" class="page">
            <div class="cebu_content">
                <img src="../../images/cebu.png" alt="Cebu House 1">
                <img src="../../images/cebu2.png" alt="Cebu House 2">
                <img src="../../images/cebu3.png" alt="Cebu House 3">
                <img src="../../images/cebu4.png" alt="Cebu House 4">
            </div>
        </div>

    </div>

    <div class="Newly_Listed_Cars">
        <h1>Newly listed cars for sale</h1>

        <nav>
            <ul>
                <li><a href="#" onclick="showPage('Toyota_Vios', event, 'Newly_Listed_Cars')">Toyota Vios</a></li>
                <li><a href="#" onclick="showPage('Toyota_Fortuner', event, 'Newly_Listed_Cars')">Toyota Fortuner</a></li>
                <li><a href="#" onclick="showPage('Honda_Civic', event, 'Newly_Listed_Cars')">Honda Civic</a></li>
                <li><a href="#" onclick="showPage('Honda_City', event, 'Newly_Listed_Cars')">Honda City</a></li>
            </ul>
        </nav>

        <div id="Toyota_Vios" class="page active">
            <div class="cars_content">
                <img src="../../images/vios1.png" alt="Toyota Vios">
                <img src="../../images/vios2.png" alt="Toyota Vios 2">
                <img src="../../images/vios3.png" alt="Toyota Vios 3">
                <img src="../../images/vios4.png" alt="Toyota Vios 4">
            </div>
        </div>
        <div id="Toyota_Fortuner" class="page">
            <div class="cars_content">
                <img src="../../images/fortuner1.png" alt="Toyota Fortuner">
                <img src="../../images/fortuner2.png" alt="Toyota Fortuner 2">
                <img src="../../images/fortuner3.png" alt="Toyota Fortuner 3">
                <img src="../../images/fortuner4.png" alt="Toyota Fortuner 4">
            </div>
        </div>
        <div id="Honda_Civic" class="page">
            <div class="cars_content">
                <img src="../../images/civic1.png" alt="Honda Civic">
                <img src="../../images/civic2.png" alt="Honda Civic 2">
                <img src="../../images/civic3.png" alt="Honda Civic 3">
                <img src="../../images/civic4.png" alt="Honda Civic 4">
            </div>
        </div>
        <div id="Honda_City" class="page">
            <div class="cars_content">
                <img src="../../images/city1.png" alt="Honda City">
                <img src="../../images/city2.png" alt="Honda City 2">
                <img src="../../images/city3.png" alt="Honda City 3">
                <img src="../../images/city4.png" alt="Honda City 4">
            </div>
        </div>
    </div>

    <div class="Popular_Goods">
        <h1>Popular Goods</h1>

        <nav>
            <ul>
                <li><a href="#" onclick="showPage('Mobile_Phones', event,'Popular_Goods')">Mobile Phones</a></li>
                <li><a href="#" onclick="showPage('Computers_Tech', event,'Popular_Goods')">Computers & Tech</a></li>
                <li><a href="#" onclick="showPage('Womens_Fashion', event,'Popular_Goods')">Women's Fashion</a></li>
                <li><a href="#" onclick="showPage('Mens_Fashion', event,'Popular_Goods')">Men's Fashion</a></li>
                <li><a href="#" onclick="showPage('Furniture_Home_Living', event,'Popular_Goods')">Furniture & Home Living</a></li>
                <li><a href="#" onclick="showPage('Footwear', event,'Popular_Goods')">Footwear</a></li>
            </ul>
        </nav>

        <!-- Mobile Phones Images -->
        <div id="Mobile_Phones" class="page active">
            <div class="mobile_images">
                <img src="../../images/mp1.PNG" alt="Mobile 1">
                <img src="../../images/mp2.PNG" alt="Mobile 2">
                <img src="../../images/mp3.PNG" alt="Mobile 3">
                <img src="../../images/mp4.PNG" alt="Mobile 4">
                <img src="../../images/mp5.PNG" alt="Mobile 5">
            </div>
        </div>

        <!-- Computers & Tech Images -->
        <div id="Computers_Tech" class="page">
            <div class="tech_images">
                <img src="../../images/ct1.PNG" alt="Tech 1">
                <img src="../../images/ct2.PNG" alt="Tech 2">
                <img src="../../images/ct3.PNG" alt="Tech 3">
                <img src="../../images/ct4.PNG" alt="Tech 4">
                <img src="../../images/ct5.PNG" alt="Tech 5">
            </div>
        </div>

        <!-- Women's Fashion Images -->
        <div id="Womens_Fashion" class="page">
            <div class="womens_fashion_images">
                <img src="../../images/womensfashion1.jpg" alt="Women's Fashion 1">
                <img src="../../images/womensfashion2.jpg" alt="Women's Fashion 2">
                <img src="../../images/womensfashion3.jpg" alt="Women's Fashion 3">
                <img src="../../images/womensfashion4.jpg" alt="Women's Fashion 4">
                <img src="../../images/womensfashion5.jpg" alt="Women's Fashion 5">
            </div>
        </div>

        <!-- Men's Fashion Images -->
        <div id="Mens_Fashion" class="page">
            <div class="mens_fashion_images">
                <img src="../../images/mensfashion1.jpg" alt="Men's Fashion 1">
                <img src="../../images/mensfashion2.jpg" alt="Men's Fashion 2">
                <img src="../../images/mensfashion3.jpg" alt="Men's Fashion 3">
                <img src="../../images/mensfashion4.jpg" alt="Men's Fashion 4">
                <img src="../../images/mensfashion5.jpg" alt="Men's Fashion 5">
            </div>
        </div>

        <!-- Furniture & Home Living Images -->
        <div id="Furniture_Home_Living" class="page">
            <div class="furniture_images">
                <img src="../../images/fur1.PNG" alt="Furniture 1">
                <img src="../../images/fur2.PNG" alt="Furniture 2">
                <img src="../../images/fur3.PNG" alt="Furniture 3">
                <img src="../../images/fur4.PNG" alt="Furniture 4">
                <img src="../../images/fur5.PNG" alt="Furniture 5">
            </div>
        </div>

        <!-- Footwear Images -->
        <div id="Footwear" class="page">
            <div class="footwear_images">
                <img src="../../images/foot1.PNG" alt="Footwear 1">
                <img src="../../images/foot2.PNG" alt="Footwear 2">
                <img src="../../images/foot3.PNG" alt="Footwear 3">
                <img src="../../images/foot4.PNG" alt="Footwear 4">
                <img src="../../images/foot5.PNG" alt="Footwear 5">
            </div>
        </div>
    </div>

    </div>

    <div class="recommend">
        <h1>Recommended for You</h1>
        <div class="recommend_images">
            <div><img src="../../images/reco1.png" alt=""></div>
            <div><img src="../../images/reco2.png" alt=""></div>
            <div><img src="../../images/reco3.png" alt=""></div>
            <div><img src="../../images/reco4.png" alt=""></div>
            <div><img src="../../images/reco5.png" alt=""></div>
            <div><img src="../../images/reco6.png" alt=""></div>
            <div><img src="../../images/reco7.png" alt=""></div>
            <div><img src="../../images/reco8.png" alt=""></div>
        </div>
    </div>

    <div>
        <hr>
        <p class="footer-text">Sell and buy every kinda thing on Carousell</p>
        <div class = "footer_img">
            <img src="../../images/footer.PNG" alt="">
    </div>

    <div>
    <p class="last-text">Transact with a trusted local community</p>
    <div class ="last_img">
        <img src ="../../images/last.PNG" alt="">
        
    </div>
    
    <div>
        <div class="WIN">
            <img src="../../images/WINS!.PNG" alt="">
    </div>
    

    <footer>
    <hr>
    <h5>Top Searches</h5>
    <p>iphone | dress | ipad | zara | uniqlo | apple watch | digicam | new balance | ralph lauren | laptop | nike | onitsuka | swimsuit | 
    bag | carhartt | lululemon | adidas | lacoste | camera | crocs | samba | kindle | luggage | skirt | coach | birkenstock | backpack | 
    stussy | sonny angel | boots | prada | fujifilm | beyond the vines | airpods | coach bag | wallet | kate spade | dior | love bonito | 
    sofa | owala | nintendo switch | loewe | sandals | macbook | watch | gucci | shoes | aircon | longchamp</p>

    <h5>Popular Houses and Lots for Sale</h5>
    <p>House and Lot for Sale in Quezon • House and Lot for Sale in Makati • House and Lot for Sale in Pasig House and Lot for Sale in Baguio •
    House and Lot for Sale in Cebu • House and Lot for Sale in Bacolod House and Lot for Sale in Caloocan House and Lot for Sale in Davao •
    House and Lot for Sale in Las Pinas House and Lot for Sale in Pasay • House and Lot for Sale in Tagaytay •
    House and Lot for Sale in Paranaque • House and Lot for Sale in Marikina • House and Lot for Sale in San Juan</p>

    <h5>Popular Apartments and Condos for Sale</h5>
    <p>Apartments and Condos for Sale in Manila • Apartments and Condos for Sale in Baguio • Apartments and Condos for Sale in Tagaytay
    Apartments and Condos for Sale in Cebu • Apartments and Condos for Sale in Davao • Apartments and Condos for Sale in Makati
    Apartments and Condos for Sale in Cagayan de Oro • Apartments and Condos for Sale in Cavite • Apartments and Condos for Sale in Bacolod
    Apartments and Condos for Sale in Batangas • Apartments and Condos for Sale in Paranaque • Apartments and Condos for Sale in Taguig
    Apartments and Condos for Sale in Pasig • Apartments and Condos for Sale in Caloocan</p>

    <h5>Popular Used Cars by Model</h5>
    <p>Toyota Hilux Cars for Sale • Toyota Fortuner Cars for Sale • Toyota Vios Cars for Sale
    Toyota Innova Cars for Sale • Mitsubishi Lancer Cars for Sale • Hyundai Accent Cars for Sale
    Hyundai Tucson Cars for Sale • Nissan Almera Cars for Sale • Ford Everest Cars for Sale
    Mitsubishi Pajero Cars for Sale • Honda Civic Cars for Sale • Honda City Cars for Sale
    Kia Picanto Cars for Sale • Audi A4 Cars for Sale </p>

    <h5>Popular Used Cars by Brands</h5>
    <p>BMW Cars for Sale • Honda Cars for Sale • Nissan Cars for Sale
    Audi Cars for Sale • Ford Cars for Sale • Kia Cars for Sale
    Hyundai Cars for Sale • Mercedes Benz Cars for Sale • Volkswagen Cars for Sale
    Chevrolet Cars for Sale • Mitsubishi Cars for Sale • Lexus Cars for Sale
    Mazda Cars for Sale • Toyota Cars for Sale </p>

    <h5>Popular Pages</h5>
    <p>Property for Sale • House and Lot for Sale
    Apartments and Condos for Sale • Townhouse for Sale
    Lot for Sale in Philippines • Apartments and Condos for Rent
    House and Lot for Rent • Commercial Properties for Rent
    Townhouse for Rent • Room Rentals in Philippines
    Lot for Rent • Car Accessories for Sale
    Car Body Parts • Car Engine & Aircon Parts</p>
    
    <div class="follow-us">
        <h5 style="color: black;">Follow Us</h5>
        <a href="https://www.facebook.com" style="color: black; margin-left: 50px; margin-right: 50px;">Facebook</a>
        <a href="https://www.instagram.com" style="color: black; margin-left: 50px; margin-right: 50px;">Instagram</a>
        <a href="https://www.linkedin.com" style="color: black; margin-left: 50px; margin-right: 50px;">Linkedin</a>
        <a href="https://www.blog.com" style="color: black; margin-left: 50px; margin-right: 50px;">Blog</a>
        <a href="https://www.carousellcollege.com" style="color: black; margin-left: 50px; margin-right: 50px;">Carousell College</a>
        <a href="https://www.autosblog.com" style="color: black; margin-left: 50px; margin-right: 50px;">Autos Blog</a>
        <a href="https://www.propertyblog.com" style="color: black; margin-left: 50px; margin-right: 50px;">Property Blog</a>
        <a href="https://www.servicesblog.com" style="color: black; margin-left: 50px; margin-right: 50px;">Services Blog</a>
        <a href="https://www.tiktok.com" style="color: black; margin-left: 50px; margin-right: 50px;">Tiktok</a>
    </div>
</footer>

    <div class="finale">
    <img src ="../../images/finale.png" alt="">
</div>


    <script src="../../main.js"></script>
</body>

</html>