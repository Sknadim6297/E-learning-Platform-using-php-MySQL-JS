<?php
include '../constants/DbConnection.php';
session_start();

if (!isset($_SESSION['is_logged_in'])) {
  header('location:Admin_login.php');
  exit;
}

if (isset($_POST['addCourse'])) {
  $courseTitle = $_POST['courseTitle'];
  $courseDescription = $_POST['courseDescription'];
  $coursePrice = $_POST['coursePrice'];
  $thumbnailUrl = $_POST['thumbnailUrl'];
  $category = $_POST['category'];

  $creator_id = $_SESSION['creator_id'];
  $sql = "INSERT INTO `courses`(`title`, `description`, `price`, `thumbnail_url`, `category`, `creator_id`) VALUES ('$courseTitle', '$courseDescription', '$coursePrice', '$thumbnailUrl', '$category', $creator_id)";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo "<script>alert('Course added successfully')</script>";
  } else {
    echo "<script>alert('Failed to add course: " . mysqli_error($conn) . "')</script>"; 
  }
}


$creator_id = $_SESSION['creator_id']; 
$fetch_courses = "SELECT * FROM `courses` WHERE creator_id = $creator_id"; 
$result = mysqli_query($conn, $fetch_courses);

if ($result) {
    $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "<script>alert('Failed to fetch courses: " . mysqli_error($conn) . "')</script>"; 
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
          <h1 class="text-3xl font-semibold">Namasteee, Miguel 👋</h1>
          <p class="text-gray-500">Welcome to Creators Dashboard</p>
        </div>
        <div class="flex gap-5 items-center">
          <a class="text-2xl" href=""><i class="fa-solid fa-magnifying-glass"></i></a><span class="text-2xl">|</span>
          <a class="text-2xl" href=""><i class="fa-solid fa-bell"></i></a>

        </div>
      </div>
      <div class="flex items-center space-x-4 p-4">
        <div class="relative flex-1">
          <input type="text" placeholder="Search Items" class="border border-zinc-300 rounded-lg py-2 px-4 w-full focus:outline-none focus:ring-2 focus:ring-primary" />
        </div>
        <button id="newItemBtn" class="bg-blue-500 text-white py-2 px-4 rounded-lg">+ New Course</button>
        <div class="flex space-x-2">
          <button class="border border-zinc-300 rounded-lg py-2 px-4 hover:bg-zinc-100">Filter</button>
          <select class="border border-zinc-300 rounded-lg py-2 px-4">
            <option>Category</option>
            <option>Latest</option>
            <option>Old</option>
          </select>
        </div>
      </div>
      <div id="newCourseModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 w-1/3">
          <h2 class="text-xl font-semibold mb-4">Add New Course</h2>
          <form action="" method="post">
            <div class="mb-4">
              <label for="courseTitle" class="block text-sm font-medium text-gray-700">Course Title</label>
              <input type="text" name="courseTitle" class="border border-zinc-300 rounded-lg py-2 px-4 w-full focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Enter the Course tittle" required />
            </div>
            <div class="mb-4">
              <label for="courseDescription" class="block text-sm font-medium text-gray-700">Description</label>
              <textarea name="courseDescription" class="border border-zinc-300 rounded-lg py-2 px-4 w-full focus:outline-none focus:ring-2 focus:ring-primary" required placeholder="Enter the course description"></textarea>
            </div>
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700">Price</label>
              <input type="number" name="coursePrice" class="border border-zinc-300 rounded-lg py-2 px-4 w-full focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Enter the Course price" required />
            </div>
            <div class="mb-4">
              <label for="courseTitle" class="block text-sm font-medium text-gray-700">Thumbnail Url</label>
              <input type="text" name="thumbnailUrl" class="border border-zinc-300 rounded-lg py-2 px-4 w-full focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Enter the Thumbnail Url " required />
            </div>
            <select class="border border-zinc-300 rounded-lg py-2 px-4 w-full focus:outline-none focus:ring-2 focus:ring-primary mb-10" name="category">
              <option>Select the Category</option>
              <option>IT </option>
              <option>Agriculture</option>
              <option>Buissness</option>
            </select>
            <div class="flex justify-end space-x-4">
              <button type="button" id="closeModalBtn" class="bg-red-500 text-white py-2 px-4 rounded-lg">Cancel</button>
              <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg" name="addCourse">Add</button>
            </div>
          </form>
        </div>
      </div>
      <div class="bg-gray-100 flex justify-center items-center min-h-screen" id="uiofCourses">
    <?php if (empty($courses)): ?>
        <div class="text-center p-6">
            <h2 class="text-2xl font-semibold">No Courses Found</h2>
            <p class="text-gray-600">You haven't added any courses yet.</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <?php foreach ($courses as $course): ?>
                <div class="bg-white shadow-lg rounded-lg max-w-sm overflow-hidden">
                    <!-- Course Image -->
                    <div class="relative">
                        <img class="rounded-t-lg w-full h-48 object-cover" src="<?php echo htmlspecialchars($course['thumbnail_url']); ?>" alt="<?php echo htmlspecialchars($course['title']); ?> thumbnail">
                    </div>

                    <!-- Price and Button -->
                    <div class="p-4">
                        <h3 class="text-2xl font-bold">$<?php echo number_format($course['price'], 2); ?></h3>
                        <div class="mt-4 flex justify-between items-center">
                            <button class="bg-black text-white py-2 px-4 rounded-md hover:bg-gray-800 transition">Edit course</button>
                            <a href="#" class="text-blue-500 border border-blue-600 py-2 px-4"><?php echo ($course['status']); ?></a>
                        </div>

                        <!-- Course Info -->
                        <ul class="mt-4 space-y-2 text-gray-600">
                            <li class="flex items-center">
                                <span class="w-6"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-2-7V9a1 1 0 012-2h2a1 1 0 012 2v2a1 1 0 11-2 2H9a1 1 0 01-1-1zm2 2a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" /></svg></span>
                                English
                            </li>
                            <li class="flex items-center">
                                <span class="w-6"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor"><path d="M4.75 3A2.75 2.75 0 002 5.75v8.5A2.75 2.75 0 004.75 17h10.5A2.75 2.75 0 0018 14.25v-8.5A2.75 2.75 0 0015.25 3H4.75zM4 12h5v1.25a.75.75 0 01-1.5 0V12H4v-1.25h3.5V7.75a.75.75 0 111.5 0v1.25H10V7.75a2.25 2.25 0 00-4.5 0v1.25H4v1.25h3.5V12H4V11.25z" /></svg></span>
                                Spanish and English subtitles
                            </li>
                            <li class="flex items-center">
                                <span class="w-6"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12m0-5a5 5 0 000 10m0-10a5 5 0 000 10M9.75 14.75l4.5-4.5M9 11l1.5 1.5" /></svg></span>
                                30.5 total video lectures
                            </li>
                            <li class="flex items-center">
                                <span class="w-6"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 24 24" fill="currentColor"><path d="M3.22 12.75L10 5.97a.75.75 0 011.5 0l2.22 2.22a.75.75 0 01-1.06 1.06l-1.97-1.97v8.94h2.44a.75.75 0 010 1.5h-3.5a.75.75 0 010-1.5h.03v-8.93l-4.56 4.56a.75.75 0 01-1.06-1.06z" /></svg></span>
                                Certificate after completion
                            </li>
                            <li class="flex items-center">
                                <span class="w-6"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor"><path d="M5.5 1.75A1.75 1.75 0 003.75 3.5V16.5A1.75 1.75 0 005.5 18.25h9A1.75 1.75 0 0016.25 16.5V3.5A1.75 1.75 0 0014.5 1.75h-9z" /></svg></span>
                                Access on TV and mobile
                            </li>
                            <li class="flex items-center">
                                <span class="w-6"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-2 1.25a1.5 1.5 0 012-2h3a1.5 1.5 0 010 3H9a1.5 1.5 0 01-1.5-1.5z" clip-rule="evenodd" /></svg></span>
                                Full lifetime access
                            </li>
                            <li class="flex items-center">
                                <span class="w-6"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7l7 7-7 7" /></svg></span>
                                30-day money-back guarantee
                            </li>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>



    </div>
  </div>
  </div>
  <script>
    document.getElementById('newItemBtn').addEventListener('click', function() {
      document.getElementById('newCourseModal').classList.remove('hidden');
    });

    document.getElementById('closeModalBtn').addEventListener('click', function() {
      document.getElementById('newCourseModal').classList.add('hidden');
    });

    // Optional: Handle form submission
    document.getElementById('addCourseForm').addEventListener('submit', function(e) {
      e.preventDefault();
      // You can handle the form submission here, e.g., via an AJAX call to your backend

      // Close the modal after submission
      document.getElementById('newCourseModal').classList.add('hidden');
    });
  </script>
</body>

</html>