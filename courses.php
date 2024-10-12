<?php
include './constants/DbConnection.php';

// Fetch the courses that are published
$sql = "SELECT * FROM courses WHERE status = 'published'";
$result = mysqli_query($conn, $sql);
$courses = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-5xl mb-6 text-center">Our Courses</h1>
        <div class="mt-14">
            <?php if (empty($courses)): ?>
                <div class="text-center p-6">
                    <h2 class="text-2xl font-semibold">No Courses Found</h2>
                    <p class="text-gray-600">You haven't added any courses yet.</p>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($courses as $course): ?>
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                            <div class="relative">
                                <img class="rounded-t-lg h-48 w-full object-cover" src="<?php echo htmlspecialchars($course['thumbnail_url']); ?>" alt="<?php echo htmlspecialchars($course['title']); ?> thumbnail">
                                
                            </div>

                            <div class="p-4">
                                <h3 class="text-2xl font-bold">$<?php echo number_format($course['price'], 2); ?></h3>

    
                                <?php
                                    $creator_id = $course['creator_id'];
                                    $creator_sql = "SELECT name FROM creators WHERE id = $creator_id";
                                    $creator_result = mysqli_query($conn, $creator_sql);
                                    $creator = mysqli_fetch_assoc($creator_result);

                                    $creator_name = $creator ? $creator['name'] : 'Unknown Creator';
                                ?>
                                <p class="mt-2 text-gray-600">Created by: <?php echo htmlspecialchars($creator_name); ?></p>

                                <div class="mt-4 flex justify-bttween gap-4 items-center">
                                    <button class="bg-black text-white py-2 px-4 rounded-md hover:bg-gray-800 transition">Buy this course</button>
                                    <a href="./login_feedback.php" class="text-blue-500 border border-blue-600 py-2 px-4">Feedbacks</a>
                                    <a href="" class="text-blue-500 border border-blue-600 py-2 px-4">More</a>
                                </div>

                                <ul class="mt-4 space-y-2 text-gray-600">
                                    <li class="flex items-center">
                                        <span class="w-6"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-2-7V9a1 1 0 012-2h2a1 1 0 012 2v2a1 1 0 11-2 2H9a1 1 0 01-1-1zm2 2a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                        </svg></span>
                                        English
                                    </li>
                                    <li class="flex items-center">
                                        <span class="w-6"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M4.75 3A2.75 2.75 0 002 5.75v8.5A2.75 2.75 0 004.75 17h10.5A2.75 2.75 0 0018 14.25v-8.5A2.75 2.75 0 0015.25 3H4.75zM4 12h5v1.25a.75.75 0 01-1.5 0V12H4v-1.25h3.5V7.75a.75.75 0 111.5 0v1.25H10V7.75a2.25 2.25 0 00-4.5 0v1.25H4v1.25h3.5V12H4V11.25z" />
                                        </svg></span>
                                        Spanish and English subtitles
                                    </li>
                                    <li class="flex items-center">
                                        <span class="w-6"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12m0-5a5 5 0 000 10m0-10a5 5 0 000 10M9.75 14.75l4.5-4.5M9 11l1.5 1.5" />
                                        </svg></span>
                                        30.5 total video lectures
                                    </li>
                                    <li class="flex items-center">
                                        <span class="w-6"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-2-7V9a1 1 0 012-2h2a1 1 0 012 2v2a1 1 0 11-2 2H9a1 1 0 01-1-1zm2 2a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                        </svg></span>
                                        Certificate after completion
                                    </li>
                                    <li class="flex items-center">
                                        <span class="w-6"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 20 20" stroke="currentColor">
                                            <path d="M3.22 12.75L10 5.97a.75.75 0 011.5 0l2.22 2.22a.75.75 0 01-1.06 1.06l-1.97-1.97v8.94h2.44a.75.75 0 010 1.5h-3.5a.75.75 0 010-1.5h1.53V7.28L5.53 12.75a.75.75 0 01-1.06-1.06z" />
                                        </svg></span>
                                        Self-paced
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>
