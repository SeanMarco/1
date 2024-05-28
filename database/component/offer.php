<?php
    include "../connection.php";
    if (!$conn) die("Connection failed: " . mysqli_connect_error());
    

    /*$sel = "SELECT * FROM sean_user";
    $query = mysqli_query($conn, $sel);

    if (!$query) {
        die("Query failed: " . mysqli_error($conn));
    }

    $result = mysqli_fetch_assoc($query); */
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

</head>
<body>
    <div class="box">
        <div class="inbox">
            <h2>Inbox</h2>
            <img src="../../images/a.jpg" alt="Carousell Logo">
            <?php
                include '../offer_operations.php';
                $userID = $_SESSION['user_id'];
                $statement = "SELECT * FROM offer WHERE id = '$userID'";
                $query = mysqli_query($conn,$statement);
                while($row = mysqli_fetch_assoc($query)){
                    echo '<div class = "offer">'.'<h4>AVIDA TOWERS INTIMA CONDOMINIUM, Studio Paco, Manila</h4>' . $row['date_id'] . '<br>' . 'You offered PHP ' . $row['price'] .
                    '<br>'. '<form method = "post"><input type = "hidden" name = "offerID" value = ' .$row['offer_id'] .'>
                    '. '</div>';
                }
            ?>
            
        </div>
        <div class="chat">
            <h2>Chat</h2>
            <div class="chat-messages">
                <!-- Chat messages will be displayed here -->
                <?php
                include '../offer_operations.php';
                    $userID = $_SESSION['user_id'];
                    $statement = "SELECT * FROM offer WHERE id = '$userID'";
                    $query = mysqli_query($conn,$statement);
                    while($row = mysqli_fetch_assoc($query)){
                        echo '<div class = "offer">' . $row['date_id'] . '<br>' . 'Offer Created<br>Price: ' . $row['price'] .
                        '<br>'. '<form method = "post"><input type = "hidden" name = "offerID" value = ' .$row['offer_id'] .'>
                        <button type = "submit" name = "deleteOffer">Cancel offer</button></form>'. '</div>';
                    }
                ?>
            </div>
            <input type="text" placeholder="Type your message...">
            <button>Send</button>
        </div>
    </div>
    <style>
       
       .inbox img{
        width: 200px;
        height: 200px;
        justify-content: center;
       }

        .box {
            display: flex;
            margin: 20px;
            background-color:#fff;
            justify-content:center;
            
        }

        .inbox, .chat {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            width: 50%;
            background-color:#fff;
            justify-content:center;
        }

        .inbox h2, .chat h2 {
            margin-top: 0;
            text-align:center;

        }

        .chat-messages {
            height: 300px;
            overflow-y: scroll;
        }

        .chat input[type="text"] {
            width: calc(100% - 70px);
            padding: 8px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .chat button {
            width: 100px;
            padding: 8px;
            margin-top: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .chat button:hover {
            background-color: #0056b3;
        }
    </style>


</body>
</html>