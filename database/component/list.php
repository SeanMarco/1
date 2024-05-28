<?php
    include "../connection.php";
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sel = "SELECT * FROM sean_user";
    $query = mysqli_query($conn, $sel);

    if (!$query) {
        die("Query failed: " . mysqli_error($conn));
    }

    $result = mysqli_fetch_assoc($query);
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
                <span><?php echo htmlspecialchars($_SESSION['first_name']);?></span>  <!-- mao ni ako giilisan -->
                <i class="gg-chevron-down" onclick="toggleDropdown()" style="cursor: pointer;"></i>
                <div class="dropdown-content" id="dropdownContent">
                    <a href="../logout.php">Logout</a> <!-- Replace "logout.php" with the actual logout URL -->
                </div>
            </div>
        </div>
    <input type="button" value="Sell" class="sell-button" onclick="openModal('sellModal')">
        </div>
    </header>


    <div class="wow">
    <h4>Property  >  For Sale  > Apartments & Condos</h4>
    </div>

    <div id="listing-container">
    <button id="prevBtn">&lt;</button>
    <div id="listing">
        <div class="list">
            <img src="../../images/a.jpg" alt="Image 1">
        </div>
        <div class="list">
            <img src="../../images/b.jpg" alt="Image 2">
        </div>
        <div class="list">
            <img src="../../images/c.jpg" alt="Image 3">
        </div>
        <div class="list">
            <img src="../../images/d.jpg" alt="Image 4">
        </div>
        <div class="list">
            <img src="../../images/e.jpg" alt="Image 5">
        </div>
        <div class="list">
            <img src="../../images/f.jpg" alt="Image 6">
        </div>
        <div class="list">
            <img src="../../images/g.jpg" alt="Image 7">
        </div>
    </div>
    <button id="nextBtn">&gt;</button>
    
    </div>

    <div class="deets">
        <div class="property-details">
            <h1>AVIDA TOWERS INTIMA CONDOMINIUM, Studio Paco, Manila</h1>
            <h2>PHP 5,900,000</h2>
            <div class="property-info">
                <span>1 Bedroom</span>
                <span>•</span>
                <span>1 Bathroom</span>
                <span class="location">Paco - Barangay 678 • Manila City</span>
                <span>•</span>
                <span>22.04 sqm</span>
            </div>
            <div class="unit-details">
                <h3>Unit details</h3>
                <p>Floor Area:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCondition:  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspParking Space:</p>  
                <p> 22.04 sqm&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPre-Owned    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp1</p> 
                <br>
                <p>Pet Friendly:  No  </p>
            </div>
            <div class="description">
                <h3>Description</h3>
                <p>
                AVIDA TOWERS INTIMA CONDOMINIUM, Paco, Manila
                <br>
                <br>
                Avida Towers Intima – AYALALAND
                <br>
                <br>
                Unit Size: 22.04 sqm
                Parking: 12.5 sqm
                Total: 37.54 sqm
                <br>
                <br>
                Price: P5.9M
                <br>
                <br>
                <p>Edmund Tario </p>
                <p>09063012418</p>
                </p>
            </div>
        </div>
        
        <div class="agentz">
    <div class="profiler">
        <img src="../../images/muhaha!.jpg" alt="Profile Picture">
        <h3>Edmundo Tario</h3>
        <p>@edmund_tario</p>
    </div>
    <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNo ratings yet</p>
    <button class="button-red">Chat</button> <!-- Added class "button-red" -->
    <button class="whatsapp-button">WhatsApp</button>
    <div class="number">
        <span>.... 418</span>
        <a href="tel:....418">Show number</a>
    </div>
    
    <div class="price-offer">
        <?php
            include '../offer_operations.php';
        ?>
        <form method = "post">
            <input type="text" class="price" placeholder="PHP 5900000" name = "price">
            <button type = "submit" class="offer-button" name = "offer">Make Offer</button>
        </form>
    </div>

</div>

    <style>

    body {
        overflow-x: hidden;
    }

    #listing-container {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        flex-direction: column; /* Align children vertically */
    }

    #listing {
        display: flex;
        justify-content: center; /* Center horizontally */
        align-items: center; /* Center vertically */
        overflow-x: auto; /* Enable horizontal scrolling */
        -webkit-overflow-scrolling: touch; /* Enable smooth scrolling on iOS */
        padding-top: 20px; /* Adjust padding to align with buttons */
        gap: 5px;
    }

    .list {
        flex: 0 0 auto; /* Prevent flex items from growing */
        position: relative;
        text-align: center; /* Center the text horizontally */
    }

    .wow {
        width: 100%;
    margin-top:50px;
        margin-left:160px;
    }

    #prevBtn, #nextBtn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
        border: none;
        width: 40px; /* Set a fixed width */
        height: 40px; /* Set a fixed height */
        border-radius: 50%; /* Make the button round */
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 10; /* Ensure buttons are above the images */
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    #prevBtn {
        left: 0;
        margin-left: 175px;
    }

    #nextBtn {
        right: 0;
        margin-right: 175px;
    }

    #prevBtn:hover, #nextBtn:hover {
        transform: translateY(-50%) scale(1.2);
        background-color: rgba(255, 255, 255, 1); /* Fully opaque background on hover */
    }

    .list img {
        width: 400px; /* Set the width of the images */
        height: 400px; /* Maintain aspect ratio */
        justify-self: center;
    }

    h4 {
        margin: 0; /* Remove default margins */
        padding: 0; /* Remove default padding */
    }


    .deets {
        display: flex;
        justify-content: space-between;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        /* width: 5000px; */
    }

    .property-details {
        width: 65%;
    }

    .property-details h1 {
        font-size: 24px;
        margin-bottom: 10px;
        margin-left:120px;
    }

    .property-details h2 {
        font-size: 20px;
        margin-bottom: 20px;
        margin-left:120px;
    }

    .property-info {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        font-size: 16px;
        color: #555;
        margin-bottom: 20px;
        margin-left:120px;
    }

    .property-info span {
        margin-right: 10px;
    }

    .property-info .location {
        font-weight: bold;
        margin-left:120px;
    } 

    .unit-details h3, .description h3 {
        font-size: 18px;
        margin-bottom: 10px;
        margin-left:120px;
    }

    .unit-details p, .description p {
        font-size: 16px;
        margin-bottom: 10px;
        margin-left:120px;
    }

    .agentz {
    width: 300px;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 20px;
    margin-right: 120px;
    max-height: 350px;
}

.agentz img{
    width: 50px;
}

.profiler {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.profiler img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 10px;
}

.profiler h3 {
    margin: 0;
}

.profiler p {
    margin: 0;
    color: #888;
}

button {
    display: block;
    width: 100%;
    padding: 10px;
    color: #fff; /* changed to white */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-bottom: 10px;
}

.button-red {
    background-color: #f05050; /* Red background */
}

.whatsapp-button {
    background-color: #finfo_buffer; /* Light green background */
    color: #000; /* Black font */
}

.number {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.number span {
    margin-right: 10px;
}

.number a {
    color: #4CAF50;
    text-decoration: none;
}

.price-offer {
    /*display: flex;*/
    flex-direction: ro;
    align-items: center;
    justify-content: flex-start;
    gap: 10px;
}

.price {
    flex: 1;
    padding: 10px;
}

.offer-button {
    padding: 10px 20px;
    background-color: #f05050;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.number{
    justify-content:center;
}





    </style>



    <script>

        const listing = document.getElementById('listing');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');

            let currentIndex = 0;
            const displayCount = 3;
            const images = Array.from(listing.querySelectorAll('.list'));

            function showImages(startIndex) {
                for (let i = 0; i < images.length; i++) {
                    if (i >= startIndex && i < startIndex + displayCount) {
                        images[i].style.display = 'block';
                    } else {
                        images[i].style.display = 'none';
                    }
                }
            }

            function updateButtons() {
                prevBtn.disabled = currentIndex === 0;
                nextBtn.disabled = currentIndex >= images.length - displayCount;
            }

            prevBtn.addEventListener('click', () => {
                if (currentIndex > 0) {
                    currentIndex--;
                    showImages(currentIndex);
                    updateButtons();
                }
            });

            nextBtn.addEventListener('click', () => {
                if (currentIndex < images.length - displayCount) {
                    currentIndex++;
                    showImages(currentIndex);
                    updateButtons();
                }
            });

            showImages(currentIndex);
            updateButtons();

    </script>







    <!-- <footer>
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
</div> -->


    <script src="../../main.js"></script>
</body>

</html>