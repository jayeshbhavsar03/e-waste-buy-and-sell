<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">

</head>

<body>

    <?php include 'header.php'; ?>


    <section class="about">

        <div class="flex">

            <div class="image">
                <img src="images/recycle.png" alt="">
            </div>

            <div class="content">
                <h3>why choose us?</h3>
                <p> Are you searching for an” e scrap buyers near you ” then E-Services is the best e waste website sell
                    and e-waste buy website in Aurangabad
<br>
<br>
                    E-Services Disposals is SEZ Authorised Vendor that specializes in the E-Waste sell and buying
                    website, in strict compliance with the latest provisions of the ‘e-Waste Handling and Disposal
                    Rules, 2016’.
<br>
<br>
                    Our team of experienced, well-trained professionals brings a high level of technical expertise in
                    e-Waste management. Capitalizing on our team and proven process, we are strongly positioned to meet
                    the complex e-Waste challenges in your business.</p>
            </div>

        </div>

    </section>

    <?php include 'footer.php'; ?>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>