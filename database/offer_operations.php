<?php
    if(isset($_POST['offer'])){
        if(empty($_POST['price'])) return;
        $price = $_POST['price'];
        $user_id = $_SESSION['user_id'];
        $statement = "INSERT INTO offer(`id`,`price`) VALUES('$user_id','$price')";
        $query = mysqli_query($conn,$statement);
        echo "<script>window.location.href = './offer.php';</script>";
    }
    if(isset($_POST['deleteOffer'])){
        $offer_id = $_POST['offerID'];
        $statement = "DELETE FROM offer WHERE `offer_id` = '$offer_id'";
        $query = mysqli_query($conn,$statement);
        echo '<script>alert("Deleted successfully!");</script>';
    }
?>

