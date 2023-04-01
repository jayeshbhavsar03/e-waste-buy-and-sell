<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">


    <style>
    .image {
        display: flex;
        background: var(--white);
        justify-content: center;
        width: 80%;
        MARGIN: auto;
    }

    .products .box-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, 30rem);
        align-items: flex-start;
        gap: 1.5rem;
        justify-content: center;
    }

    .category {}

    .name {
        font-size: 3rem;
        padding: 1rem;
        text-align: center;
        color: var(--red);
    }

    .cat-btn {
        background: var(--red);
        color: var(--white);
        padding: 1rem;
        font-size: 1.3rem;
        margin: 4.5rem;
    }
    </style>
</head>

<body>

    <?php include 'header.php'; ?>

    <section class="products">

        <h1 class="title">Category OF Recycle Products</h1>

        <div class="box-container">

            <div style="margin:2rem;    height: 30rem;background: var(--white);
    padding: 2rem;    box-shadow: var(--box-shadow);">
                <img class="image" src="images/cat1.png" alt="">
                <div class="category">
                    <div class="name">AC</div>
                    <a href="cat1.php" class="cat-btn">view all products</a>
                </div>
            </div>

            <div style="margin:2rem;    height: 30rem;background: var(--white);
    padding: 2rem;    box-shadow: var(--box-shadow);">
                <img class="image" src="images/cat2.png" alt="">
                <div class="category">
                    <div class="name">CPU</div>
                    <a href="cat2.php" class="cat-btn">view all products</a>
                </div>
            </div>

            <div style="margin:2rem;    height: 30rem;background: var(--white);
    padding: 2rem;    box-shadow: var(--box-shadow);">
                <img class="image" src="images/cat3.png" alt="">
                <div class="category">
                    <div class="name">DESKTOP</div>
                    <a href="cat3.php" class="cat-btn">view all products</a>
                </div>
            </div>

            <div style="margin:2rem;    height: 30rem;background: var(--white);
    padding: 2rem;    box-shadow: var(--box-shadow);">
                <img class="image" src="images/cat4.png" alt="">
                <div class="category">
                    <div class="name">LAPTOP</div>
                    <a href="cat4.php" class="cat-btn">view all products</a>
                </div>
            </div>

            <div style="margin:2rem;    height: 30rem;background: var(--white);
    padding: 2rem;    box-shadow: var(--box-shadow);">
                <img class="image" src="images/cat5.png" alt="">
                <div class="category">
                    <div class="name">PCB</div>
                    <a href="cat5.php" class="cat-btn">view all products</a>
                </div>
            </div>

            <div style="margin:2rem;    height: 30rem;background: var(--white);
    padding: 2rem;    box-shadow: var(--box-shadow);">
                <img class="image" src="images/cat6.png" alt="">
                <div class="category">
                    <div class="name">TV</div>
                    <a href="cat6.php" class="cat-btn">view all products</a>
                </div>
            </div>

        </div>

    </section>








    <?php include 'footer.php'; ?>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>