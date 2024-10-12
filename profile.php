<?php
session_start();
include 'constants/DbConnection.php';

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $sql = "SELECT name, email, profile_pic FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        $user = null; // If no user is found, set $user to null
    }
} else {
    header("Location: Home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="max-w-md mx-auto bg-card rounded-lg p-6 flex flex-col gap-5">
        <h1 class="text-5xl text-center">My Profile</h1>
        <?php if ($user): ?>
            <div class="flex items-center mb-4 mt-10">
                <?php if (!empty($user['profile_pic'])): ?>
                    <img src="images/<?php echo htmlspecialchars($user['profile_pic']); ?>" alt="Profile Picture" class="rounded-full mr-4 w-20 h-20" />
                <?php else: ?>
                    <img src="https://openui.fly.dev/openui/24x24.svg?text=👤" alt="Default Profile Picture" class="rounded-full mr-4 w-20 h-20" />
                <?php endif; ?>
                <div>
                    <h2 class="text-2xl text-black font-semibold"><?php echo htmlspecialchars($user['name']); ?></h2>
                    <p class="text-md text-black font-semibold"><?php echo htmlspecialchars($user['email']); ?></p>
                </div>
            </div>
        <?php else: ?>
            <p>User details not found.</p>
        <?php endif; ?>
        
        <button class="bg-black text-white rounded-lg px-4 py-2 mb-4"><a href="edit-profile.php">Edit Profile</a></button>
        <ul class="space-y-2 text-xl cursor-pointer">
            <li class="flex items-center">
                <span class="text-2xl"><i class="fa-solid fa-heart"></i></span>
                <span class="ml-2">Favourites</span>
            </li>
            <li class="flex items-center">
                <span class="text-2xl"><i class="fa-solid fa-language"></i></span>
                <span class="ml-2">Language</span>
            </li>
            <li class="flex items-center">
                <span class="text-2xl"><i class="fa-solid fa-location-dot"></i></span>
                <span class="ml-2">Location</span>
            </li>
            <li class="flex items-center">
                <span class="text-2xl"><i class="fa-solid fa-comment"></i></span>
                <span class="ml-2">Feedback</span>
            </li>
            <li class="flex items-center">
                <span class="text-2xl"><i class="fa-solid fa-cart-shopping"></i></span>
                <span class="ml-2">Purchases</span>
            </li>
            <a href="logout.php">
                <li class="flex items-center">
                    <span class="material-icons"><i class="fa-solid fa-power-off"></i></span>
                    <span class="ml-2 text-red-500">Log Out</span>
                </li>
            </a>
        </ul>
    </div>
</body>

</html>
