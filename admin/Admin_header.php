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
            <div class="h-screen flex">


                <!-- Sidebar -->
                <div class="w-1/6 bg-white p-4 flex flex-col">
                    <div class="flex items-center mb-6">
                        <img src="https://via.placeholder.com/50" alt="Logo" class="w-10 h-10 rounded-full">
                        <h2 class="text-2xl font-bold ml-4">Sk.Learning-Admin</h2>
                    </div>

                    <!-- Menu -->
                    <ul class="mb-8">
                        <li class="mb-4">
                            <a href="#" class="flex items-center p-2 bg-gray-200 rounded">
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
                        <h1 class="text-3xl font-semibold">Namasteee, Miguel 👋</h1>
                            <p class="text-gray-500">Welcome to Creators Dashboard</p>
                        </div>
                        <div class="flex gap-5 items-center">
                            <a class="text-2xl" href=""><i class="fa-solid fa-magnifying-glass"></i></a><span class="text-2xl">|</span>
                            <a class="text-2xl" href=""><i class="fa-solid fa-bell"></i></a>

                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>