<?php
include 'constants/DbConnection.php';

if (isset($_POST['register'])) {
  $name = $_POST['name'];
  $name = filter_var($name, FILTER_SANITIZE_STRING);
  $email = $_POST['email'];
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  $pass = $_POST['password'];
  $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
  $phone = $_POST['phone'];
  $phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);

  $sql = "SELECT * FROM `users` WHERE email='$email'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Admin Already Exists')</script>";
  } else {

    $insert_user = "INSERT INTO `users`(`name`, `email`, `password`, `phone`,`role`) VALUES ('$name','$email','$hashed_pass','$phone', 'user')";

    if (mysqli_query($conn, $insert_user)) {
      echo "<script>alert('User Registration Successful')
              window.location.href='Login.php'
      </script>";

    } else {
      echo "<script>alert('Somthing went wrong')</script>";
    }
  }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="min-h-screen flex">
    <div class="flex justify-center items-center w-full px-8 py-10 bg-white">
      <div class="max-w-md w-full">
        <h2 class="text-4xl font-bold mb-6 text-center">Register</h2>

        <form action="" method="post">
          <div class="mb-4">
            <label class="block text-gray-700 text-sm mb-2" for="fullname">Full Name</label>
            <input class="w-full px-4 py-2 border rounded-lg" name="name" type="text" id="fullname" placeholder="Enter your full name">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm mb-2" for="fullname">Email</label>
            <input class="w-full px-4 py-2 border rounded-lg " type="email" id="email" name="email" placeholder="Enter your email">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm mb-2" for="fullname">Phone</label>
            <input class="w-full px-4 py-2 border rounded-lg " type="number" id="phone" name="phone" placeholder="Enter your phone number">
          </div>

          <div class="mb-4 relative">
            <label class="block text-gray-700 text-sm mb-2" for="password">Password</label>
            <input class="w-full px-4 py-2 border rounded-lg " type="password" name="password" id="password" placeholder="Enter your password">
            <span class="absolute right-4 top-9 cursor-pointer">
              <i class="fa-solid fa-eye"></i>
            </span>
          </div>
          <!-- Register Button -->
          <button class="w-full bg-black text-white py-2 rounded-lg font-bold" type="submit" name="register">Register</button>
        </form>

        <!-- Social Login Options -->
        <div class="flex flex-col justify-between items-center mt-6">
          <span class="block text-sm text-gray-500 mb-4">Register with</span>
          <div class="flex space-x-4 ">
            <button class="w-12 h-12 flex justify-center items-center bg-gray-100 rounded-full hover:bg-gray-200">
              <i class="fa-brands fa-google text-xl text-gray-700"></i>
            </button>
            <button class="w-12 h-12 flex justify-center items-center bg-gray-100 rounded-full hover:bg-gray-200">
              <i class="fa-brands fa-facebook-f text-xl text-gray-700"></i>
            </button>
          </div>
        </div>

        <!-- Already Have an Account? -->
        <p class="text-center mt-6 text-sm text-gray-500">
          Already have an account?
          <a href="./Login.php" class="text-blue-500 hover:text-blue-700 font-semibold">Log in</a>
        </p>
      </div>
    </div>
  </div>

</body>

</html>