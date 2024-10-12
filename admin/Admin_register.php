<?php
session_start();
include '../constants/DbConnection.php';

if (isset($_POST['admin_register'])) {

    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);


    $profile_pic = '';
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
        $profile_pic = basename($_FILES['profile_pic']['name']);
        $profile_pic_temp = $_FILES['profile_pic']['tmp_name'];
        $upload_dir = "images/";

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        if (move_uploaded_file($profile_pic_temp, $upload_dir . $profile_pic)) {
            echo "profile pic uploaded";
        } else {
            echo "<script>alert('Error uploading profile picture.');</script>";
        }
    }

    $sql = "SELECT * FROM creators WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Admin already exists.');
        window.location.href='Admin_register.php';
        </script>";
        exit;
    }
    $insert_query = "INSERT INTO creators (name, email, phone, password, profile_pic, role) 
                     VALUES ('$name', '$email', '$phone', '$password', '$profile_pic', 'admin')";

    if (mysqli_query($conn, $insert_query)) {
        header('Location: Admin_login.php');
    } else {
        echo "<script>alert('Error in registration. Please try again.');</script>";
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
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="min-h-screen flex">
        <div class="flex justify-center items-center w-full px-8 py-10 bg-white">
            <div class="max-w-md w-full">
                <h2 class="text-4xl font-bold mb-6 text-center">Creators Register</h2>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-4">
                        <div class="flex flex-col items-center justify-center mb-10">
                            <img id="avatar" class="w-16 h-16 rounded-full mr-4 cursor-pointer" src="https://openui.fly.dev/openui/24x24.svg?text=👤" alt="User Avatar" />
                            <p>Edit profile picture</p>
                            <input type="file" id="fileInput" class="hidden" name="profile_pic" accept="image/*">
                        </div>
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
                    <button class="w-full bg-black text-white py-2 rounded-lg font-bold" type="submit" name="admin_register">Register</button>
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

                <p class="text-center mt-6 text-sm text-gray-500">
                    Already have an account?
                    <a href="../admin/Admin_login.php" class="text-blue-500 hover:text-blue-700 font-semibold">Log in</a>
                </p>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('avatar').addEventListener('click', function() {
            document.getElementById('fileInput').click();
        });

        document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('avatar').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>