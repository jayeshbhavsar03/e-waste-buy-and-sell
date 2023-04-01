<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $address = $_POST['address'];
   $material_description = mysqli_real_escape_string($conn, $_POST['material_description']);

   $select_message = mysqli_query($conn, "SELECT * FROM `donate_us` WHERE name = '$name' AND email = '$email'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'you already fill the form!';
   }else{
      mysqli_query($conn, "INSERT INTO `donate_us`(user_id, name, email, number, address, material_description) VALUES('$user_id', '$name', '$email', '$number', '$address', '$material_description')") or die('query failed');
      $message[] = 'request sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Donate E-waste</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="contact">

   <form action="" method="post">
      <h3>Donate E-waste Form</h3>
      <input type="text" name="name" required placeholder="enter your name" class="box">
      <input type="email" name="email" required placeholder="enter your email" class="box">
      <input type="number" name="number" required placeholder="enter your number" class="box">
      <input type="text" name="address" required placeholder="enter pickup address" class="box">
      <textarea name="material_description" class="box" placeholder="enter material discription" id="" cols="30" rows="10"></textarea>
      <input type="submit" value="Donate" name="send" class="btn">
   </form>

</section>








<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>