<?php
session_start();
include 'constants/DbConnection.php';

// Redirect if not logged in
if (!isset($_SESSION['email'])) {
    header("Location: Home.php");
    exit();
}

$email = $_SESSION['email'];


$name = '';
$editEmail = '';
$phone = '';
$gender = '';
$profile_pic = '';

$query = "SELECT name, email, phone, gender, profile_pic FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if ($result) {
    $user = mysqli_fetch_assoc($result);
    $name = $user['name'];
    $editEmail = $user['email'];
    $phone = $user['phone'];
    $gender = $user['gender'];
    $profile_pic = $user['profile_pic'];
}


if (isset($_POST['update'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $editEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
    $gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);

    // Handle profile picture upload
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
        $profile_pic = $_FILES['profile_pic']['name'];
        $profile_pic_temp = $_FILES['profile_pic']['tmp_name'];
        $upload_dir = "images/";

        if (move_uploaded_file($profile_pic_temp, $upload_dir . $profile_pic)) {
            $update_query = "UPDATE users SET name = '$name', email = '$editEmail', phone = '$phone', gender = '$gender', profile_pic = '$profile_pic' WHERE email = '$email'";
            mysqli_query($conn, $update_query);
        } else {
            echo "<script>alert('Error uploading profile picture.');</script>";
        }
    } else {
        $update_query = "UPDATE users SET name = '$name', email = '$editEmail', phone = '$phone', gender = '$gender' WHERE email = '$email'";
        mysqli_query($conn, $update_query);
    }
    echo "<script>alert('Profile updated successfully.')
    window.location.href='profile.php';
    </script>";
    
   
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account Details</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="h-screen flex justify-center items-center">
        <div class="max-w-md w-full p-4 bg-card rounded-lg shadow-md">
            <h2 class="text-4xl font-semibold mb-4 text-center">Account Details</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="flex flex-col items-center justify-center mb-10">
                    <?php if ($profile_pic): ?>
                        <img id="avatar" class="w-16 h-16 rounded-full mr-4 cursor-pointer" src="images/<?php echo $profile_pic; ?>" alt="User Avatar" />
                    <?php else: ?>
                        <img id="avatar" class="w-16 h-16 rounded-full mr-4 cursor-pointer" src="https://openui.fly.dev/openui/24x24.svg?text=👤" alt="User Avatar" />
                    <?php endif; ?>
                    <p>Edit profile picture</p>
                    <input type="file" id="fileInput" class="hidden" name="profile_pic" accept="image/*">
                </div>
                <div class="mb-4">
                    <label class="block text-sm text-muted-foreground" for="name">Name</label>
                    <input class="w-full p-2 border border-border rounded-md" type="text" name="name" placeholder="Enter your name" value="<?php echo $name; ?>" required />
                </div>
                <div class="mb-4">
                    <label class="block text-sm text-muted-foreground" for="email">Email</label>
                    <input class="w-full p-2 border border-border rounded-md" type="email" name="email" placeholder="Enter your email" value="<?php echo $editEmail; ?>" required />
                </div>
                <div class="mb-4">
                    <label class="block text-sm" for="phone">Phone number</label>
                    <input class="w-full p-2 border border-border rounded-md" type="tel" name="phone" placeholder="Enter your phone number" value="<?php echo $phone; ?>" required />
                </div>
                <div class="mb-4">
                    <label class="block text-sm text-muted-foreground" for="gender">Select your gender</label>
                    <select class="w-full p-2 border border-border rounded-md" id="gender" name="gender" required>
                        <option value="" <?php echo $gender == '' ? 'selected' : ''; ?>>Choose an option</option>
                        <option value="male" <?php echo $gender == 'male' ? 'selected' : ''; ?>>Male</option>
                        <option value="female" <?php echo $gender == 'female' ? 'selected' : ''; ?>>Female</option>
                        <option value="other" <?php echo $gender == 'other' ? 'selected' : ''; ?>>Other</option>
                    </select>
                </div>
                <button class="w-full bg-black text-white p-2 rounded-md hover:bg-primary/80" name="update" type="submit">Update</button>
            </form>
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