<?php
include '../constants/DbConnection.php';

session_start();

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  $pass = $_POST['password'];

  $sql = "SELECT * FROM `creators` WHERE email='$email' AND role='admin'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    if (password_verify($pass, $row['password'])) {
      $_SESSION['creator_id'] = $row['id'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['is_logged_in'] = true;
      
      echo "<script>alert('Creators login Successfull')
      window.location.href='Dashboard.php';
      </script>";
      exit;
    } else {
      echo "<script>alert('Password did not match')</script>";
    }
  } else {
    echo "<script>alert('No admin found with this email')</script>";
  }
}

?>













<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Creators Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="min-h-screen flex">
    <div class="flex justify-center items-center w-full px-8 py-10 bg-white">
      <div class="max-w-md w-full">
        <h2 class="text-4xl font-bold mb-6 text-center">Creators Login</h2>

        <form action="" method="post">
          <div class="mb-4">
            <label class="block text-gray-700 text-sm mb-2" for="fullname">Email</label>
            <input class="w-full px-4 py-2 border rounded-lg " type="email" name="email" id="email" placeholder="Enter your email">
          </div>
          <div class="mb-4 relative">
            <label class="block text-gray-700 text-sm mb-2" for="password">Password</label>
            <input class="w-full px-4 py-2 border rounded-lg " type="password" name="password" id="password" placeholder="Enter your password">
            <span class="absolute right-4 top-9 cursor-pointer">
              <i class="fa-solid fa-eye"></i>
            </span>
          </div>


          <button class="w-full bg-black text-white py-2 rounded-lg font-bold" name="login" type="submit">Login</button>
        </form>

        <div class="flex flex-col justify-between items-center mt-6">
          <span class="block text-sm text-gray-500 mb-4">Login with</span>
          <div class="flex space-x-4 ">
            <button class="w-12 h-12 flex justify-center items-center bg-gray-100 rounded-full hover:bg-gray-200">
              <i class="fa-brands fa-google text-xl text-gray-700"></i>
            </button>
            <button class="w-12 h-12 flex justify-center items-center bg-gray-100 rounded-full hover:bg-gray-200">
              <i class="fa-brands fa-facebook-f text-xl text-gray-700"></i>
            </button>
          </div>
        </div>
        <p class="text-center mt-6 text-sm text-gray-500">
          Don't have an account?
          <a href="../admin/Admin_register.php" class="text-blue-500 hover:text-blue-700 font-semibold">Register</a>
        </p>
      </div>
    </div>
  </div>

</body>

</html>