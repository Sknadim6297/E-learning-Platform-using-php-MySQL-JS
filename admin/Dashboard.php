<?php
include '../constants/DbConnection.php';
session_start();

if(!isset($_SESSION['is_logged_in'])){
    header('location:Admin_login.php');
    exit;
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-1/6 bg-white p-4 flex flex-col">
            <div class="flex items-center mb-6">
                <img src="https://via.placeholder.com/50" alt="Logo" class="w-10 h-10 rounded-full">
                <h2 class="text-2xl font-bold ml-4">Sk.Learning-Admin</h2>
            </div>

            <!-- Menu -->
            <ul class="mb-8">
                <li class="mb-4">
                    <a href="Dashboard.php" class="flex items-center p-2 bg-gray-200 rounded">
                        <span class="fa fa-home mr-2"></span> Dashboard
                    </a>
                </li>
                <li class="mb-4">
                    <a href="Admin_courses.php" class="flex items-center p-2 hover:bg-gray-100 rounded">
                        <span class="fa fa-store mr-2"></span> Courses
                    </a>
                </li>
                <li class="mb-4">
                    <a href="Student.php" class="flex items-center p-2 hover:bg-gray-100 rounded">
                        <span class="fa fa-box mr-2"></span> Student
                    </a>
                </li>
                <li class="mb-4">
                    <a href="payment_status.php" class="flex items-center p-2 hover:bg-gray-100 rounded">
                        <span class="fa fa-users mr-2"></span> Payment Status
                    </a>
                </li>
                <li class="mb-4">
                    <a href="Feedback.php" class="flex items-center p-2 hover:bg-gray-100 rounded">
                        <span class="fa fa-comment mr-2"></span> Feedback
                    </a>
                </li>
            </ul>

            <!-- Other Links -->
            <div class="mt-auto">
                <ul>
                    <li class="mb-4">
                        <a href="Setting.php" class="flex items-center p-2 hover:bg-gray-100 rounded">
                            <span class="fa fa-cog mr-2"></span> Setting
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="Help_center.php" class="flex items-center p-2 hover:bg-gray-100 rounded">
                            <span class="fa fa-question-circle mr-2"></span> Help Center
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Content -->
        <div class="flex-1 p-6">

            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-3xl font-semibold">Namasteee, Nadim </h1>
                    <p class="text-gray-500">Welcome to Creators Dashboard</p>
                </div>
                <div class="flex gap-5 items-center">
                    <a class="text-2xl" href=""><i class="fa-solid fa-magnifying-glass"></i></a><span class="text-2xl">|</span>
                    <a class="text-2xl" href=""><i class="fa-solid fa-bell"></i></a>

                </div>
            </div>

            <!-- Widgets -->
            <div class="grid grid-cols-3 gap-6 mb-6">
                <!-- Sales Widget -->
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-semibold mb-2">Sales</h2>
                    <p class="text-3xl font-bold">$37,829.21</p>
                    <span class="text-green-500">+2.5k</span>
                </div>
                <!-- Profit Widget -->
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-semibold mb-2">Profit</h2>
                    <p class="text-3xl font-bold">$5,483.83</p>
                    <span class="text-green-500">+1.4k</span>
                </div>
                <!-- Total Sales Cost Widget -->
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-semibold mb-2">Total Sales Cost</h2>
                    <p class="text-3xl font-bold">$2,982.92</p>
                    <span class="text-red-500">-3.2k</span>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-6 mb-6">
                <!-- Product Sale -->
                <div class="bg-white p-4 rounded shadow flex flex-col justify-center">
                    <h2 class="text-xl font-semibold mb-4 text-center">Status</h2>
                    <div class="flex justify-between items-center">
                        <div class="w-1/3 text-center">
                            <div class="text-3xl font-bold">229</div>
                            <p class="text-gray-500"> Total Courses</p>
                        </div>
                        <div class="w-1/3 text-center">
                            <div class="text-3xl font-bold">1,283</div>
                            <p class="text-gray-500">Total Students</p>
                        </div>
                        <div class="w-1/3 text-center">
                            <div class="text-3xl font-bold">622</div>
                            <p class="text-gray-500">Purches</p>
                        </div>
                    </div>
                </div>

                <!-- Profit and Loss -->
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-semibold mb-4">Profit and Loss</h2>
                    <div>
                        <div class="h-32 rounded flex justify-center">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSChc20i8ScDRfKorrO-3OhU1jP0PehiCubgg&s" alt="" class="object-contain h-full">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSChc20i8ScDRfKorrO-3OhU1jP0PehiCubgg&s" alt="" class="object-contain h-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>