<?php
include './constants/DbConnection.php';
session_start();

$sql = "SELECT id, title FROM courses LIMIT 1";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Error executing query: " . mysqli_error($conn));
}
$row = mysqli_fetch_assoc($result);
if (!$row) {
    echo "<script>alert('No courses found.');</script>";
    exit;
}
$course_id = $row['id'];
$course_title = $row['title'];
$user_id = $_SESSION['id'];

// Handling form submission for adding feedback
if (isset($_POST['add-feed'])) {
    $feedback = $_POST['feedback'];

    if (empty($feedback)) {
        echo "<script>alert('Please enter your feedback')</script>";
    } else {
        $feedback_add_sql = "INSERT INTO feedback (course_id, user_id, feedback_text, created_at) 
                             VALUES ('$course_id', '$user_id', '$feedback', NOW())";
        $feedback_add_result = mysqli_query($conn, $feedback_add_sql);
        if (!$feedback_add_result) {
            echo "<script>alert('Failed to add feedback: " . mysqli_error($conn) . "')</script>";
        } else {
            echo "<script>alert('Feedback added successfully')</script>";
        }
    }
}

$fetch_feedback_sql = "SELECT feedback_text, created_at FROM feedback WHERE course_id = '$course_id'";
$fetch_feedback_result = mysqli_query($conn, $fetch_feedback_sql);
if (!$fetch_feedback_result) {
    die("Error executing feedback query: " . mysqli_error($conn));
}

$feedbacks = mysqli_fetch_all($fetch_feedback_result, MYSQLI_ASSOC);
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        #modalfeedback {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 50;
            width: 100%;
            max-width: 500px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        #modalOverlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 40;
        }

        .closeBtn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="w-full flex flex-col items-center mx-auto">
        <h1 class="text-5xl mt-5">Feedbacks for <?php echo $course_title; ?></h1>
        <div class="flex items-center space-x-4 p-4 mt-10">
            <button id="newItemBtn" class="bg-black text-white py-2 px-4 rounded-lg">+ Add Your Feedback</button>
        </div>

        <div id="modalOverlay"></div>

        <form action="" method="post">
            <div class="max-w-md mx-auto p-6 bg-card rounded-lg shadow-lg mt-2" id="modalfeedback">
                <span class="closeBtn">&times;</span>
                <h2 class="text-lg font-semibold text-foreground">Feedback</h2>
                <div class="mt-4">
                    <p class="text-muted-foreground">How would you describe your mood after using our product for the first time?</p>
                    <div class="flex space-x-4 mt-2">
                        <button class="px-4 py-2 rounded-full text-black border border-black"><i class="fa-regular fa-face-smile"></i></button>
                        <button class="px-4 py-2 rounded-full text-black border border-black"><i class="fa-regular fa-face-sad-tear"></i></button>
                        <button class="px-4 py-2 rounded-full text-black border border-black"><i class="fa-regular fa-face-frown"></i></button>
                    </div>
                </div>
                <div class="mt-4">
                    <p class="text-muted-foreground">Your feedback</p>
                    <textarea class="w-full p-2 border border-border rounded-md" name="feedback" rows="4" placeholder="Anything you'd like to add? Your input is valuable to us."></textarea>
                </div>
                <button class="mt-4 w-full bg-black text-white py-1 rounded-lg" name="add-feed">Send Feedback</button>
            </div>
        </form>

        <!-- Display Feedback -->
        <div class="mt-10 p-6 bg-background rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4 text-center">What others think...</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <?php if (empty($feedbacks)): ?>
                    <p class="text-muted">No feedback available for this course.</p>
                <?php else: ?>
                    <?php foreach ($feedbacks as $feedback): ?>
                        <div class="p-4 bg-card rounded-lg shadow">
                            <div class="flex items-center mb-2">
                            <span class="text-yellow-500">★★★★☆</span>
                                <span class="text-muted text-sm ml-2"><?php echo date('d-m-Y', strtotime($feedback['created_at'])); ?></span>
                            </div>
                            <p class="text-muted-foreground"><?php echo htmlspecialchars($feedback['feedback_text']); ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById("modalfeedback");
        const overlay = document.getElementById("modalOverlay");
        const newItemBtn = document.getElementById("newItemBtn");
        const closeBtn = document.querySelector(".closeBtn");

        newItemBtn.addEventListener("click", function() {
            modal.style.display = "block";
            overlay.style.display = "block";
        });

        closeBtn.addEventListener("click", function() {
            modal.style.display = "none";
            overlay.style.display = "none";
        });

        overlay.addEventListener("click", function() {
            modal.style.display = "none";
            overlay.style.display = "none";
        });
    </script>
</body>

</html>