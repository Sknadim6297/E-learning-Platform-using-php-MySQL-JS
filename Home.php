<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Sk.Learning - Master in-demand IT skills and accelerate your career growth through innovative education.">
  <meta name="keywords" content="education, online courses, IT skills, learning platform">

  <title>Sk.Learning</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <div class="flex flex-col min-h-screen">
    <nav class="flex items-center justify-between py-3 m-5 px-4 bg-black text-white rounded-full md:px-20">
      <h1 class="text-3xl font-bold">Sk.Learning</h1>

      <div class="md:hidden flex items-center">
        <button id="menu-button" class="text-white hover:text-gray-300">
          <i class="fa-solid fa-bars fa-lg"></i>
        </button>
      </div>

      <ul class="hidden md:flex gap-4 md:gap-8">
        <li><a href="./Home.php" class="hover:text-gray-300">Home</a></li>
        <li><a href="#about" class="hover:text-gray-300">About Us</a></li>
        <li><a href="./courses.php" class="hover:text-gray-300">Courses</a></li>
        <li><a href="#contact" class="hover:text-gray-300">Contact</a></li>
        <li><a href="#creators" class="hover:text-gray-300">Creators</a></li>

        <?php
        session_start();

        if (isset($_SESSION['name'])) {
          echo "
                    <a href='profile.php'><li class='relative'>
                        <i class='fa-solid fa-user cursor-pointer' id='profileIcon'></i>
                        <span class='p-2 cursor-pointer' id='profileName'>{$_SESSION['name']}</span>
                    </li></a>
                ";
        } else {
          echo "
                    <li><a href='./Register.php' class='bg-white text-black px-4 py-2 rounded-lg hover:text-gray-300'>Register</a></li>
                ";
        }
        ?>
      </ul>
    </nav>

    <div id="mobile-menu" class="fixed inset-0 bg-black  z-50 transform -translate-x-full transition-transform duration-300 ease-in-out">
      <div class="flex justify-between p-4">
        <h2 class="text-lg font-bold text-white mt-10 ">All Menu</h2>
        <button id="close-button" class="text-white hover:text-gray-300">
          <i class="fa-solid fa-times fa-lg"></i>
        </button>
      </div>
      <ul class="flex flex-col p-4">
        <li class="py-2"><a href="./Home.php" class="text-white hover:text-gray-300">Home</a></li>
        <li class="py-2"><a href="./courses.php" class="text-white hover:text-gray-300">Courses</a></li>
        <li class="py-2"><a href="#" class="text-white hover:text-gray-300">Contact</a></li>
        <li class="py-2"><a href="#" class="text-white hover:text-gray-300">Creators</a></li>

        <?php
        session_start();

        if (isset($_SESSION['name'])) {
          echo "
                    <a href='profile.php'><li class='relative b-0 text-white'>
                        <i class='fa-solid fa-user cursor-pointer' id='profileIcon'></i>
                        <span class='p-2 cursor-pointer' id='profileName'>{$_SESSION['name']}</span>
                    </li></a>
                ";
        } else {
          echo "
                    <li><a href='./Register.php' class='bg-white text-black px-4 py-2 rounded-lg hover:text-gray-300'>Register</a></li>
                ";
        }
        ?>
      </ul>
    </div>

    <div class="flex-1 flex flex-col items-center justify-center bg-gray-100 text-gray-800 px-4 m-3 rounded-3xl">
      <div class="text-center">
        <h1 class="text-4xl sm:text-5xl lg:text-7xl mb-6 w-50 lg:px-20">Master In-Demand IT Skills and Accelerate Your Career Growth!</h1>
        <h1 class="text-md sm:text-lg mb-10">Dive into the art assets, where innovative blockchain technology meets financial expertise.</h1>
        <div class="mt-4 flex items-center justify-center gap-4 flex-wrap">
          <button class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800"><a href="./admin/Dashboard.php">For Creators</a></button>
          <button class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800"><a href="./courses.php">Our Courses</a></button>
        </div>
      </div>
    </div>
  </div>

  <section id="about">
    <div class="flex flex-col md:flex-row p-6 md:p-20 bg-background rounded-lg lg:mt-20 justify-center items-center">
      <div class="md:w-1/2 p-4 flex flex-col">
        <h2 class="text-4xl md:text-5xl font-bold mb-2">How It Started</h2>
        <h3 class="text-xl md:text-2xl font-semibold mb-4">Our Dream is Global Learning Transformation</h3>
        <p class="text-sm md:text-base mb-6">
          Kaunui was founded by Robert Anderson, a passionate lifelong learner, and Maria Sanchez, an advisory educator. Their shared dream was to create a digital home of innovative education. United by their belief in the transformational power of education, they embarked on a journey to build Kaunui. With relentless dedication, they gathered a team of experts and launched this innovative platform, creating a global community of eager learners, all connected by the desire to explore, learn, and grow.
        </p>

        <div class="mb-6 flex gap-4">
          <a href="#" class="text-3xl text-blue-600 hover:text-blue-800"><i class="fa-brands fa-facebook"></i></a>
          <a href="#" class="text-3xl text-blue-500 hover:text-blue-700"><i class="fa-brands fa-linkedin"></i></a>
          <a href="#" class="text-3xl text-blue-400 hover:text-blue-600"><i class="fa-brands fa-twitter"></i></a>
          <a href="#" class="text-3xl text-red-600 hover:text-red-800"><i class="fa-brands fa-youtube"></i></a>
        </div>
      </div>

      <div class="md:w-1/2 p-4 flex flex-col justify-center items-center">
        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="About Image" class="w-full h-auto rounded-lg mb-6">

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
          <div class="bg-card p-4 rounded-lg text-center">
            <h4 class="text-3xl font-bold">3.5</h4>
            <p class="text-muted-foreground">Years Experience</p>
          </div>
          <div class="bg-card p-4 rounded-lg text-center">
            <h4 class="text-3xl font-bold">23</h4>
            <p class="text-muted-foreground">Project Challenges</p>
          </div>
          <div class="bg-card p-4 rounded-lg text-center">
            <h4 class="text-3xl font-bold">830+</h4>
            <p class="text-muted-foreground">Positive Reviews</p>
          </div>
          <div class="bg-card p-4 rounded-lg text-center">
            <h4 class="text-3xl font-bold">100K</h4>
            <p class="text-muted-foreground">Trusted Students</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="creators">
    <div class="p-6 md:p-10 bg-background mx-4 md:mx-20 mt-10 rounded-lg">
      <h2 class="text-4xl md:text-6xl font-bold text-foreground mb-4 text-center">Meet our team of creators, designers, and problem solvers</h2>
      <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-10 mt-20">
        <div class="text-center">
          <img class="rounded-lg w-full h-auto mx-auto" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fHByb2ZpbGV8ZW58MHx8MHx8fDI%3D" alt="Phoenix Baker" />
          <h3 class="mt-2 font-semibold text-foreground">Phoenix Baker</h3>
          <p class="text-muted-foreground">Founder & CEO</p>
        </div>
        <div class="text-center">
          <img class="rounded-lg w-full h-auto mx-auto" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fHByb2ZpbGV8ZW58MHx8MHx8fDI%3D" alt="Phoenix Baker" />
          <h3 class="mt-2 font-semibold text-foreground">Phoenix Baker</h3>
          <p class="text-muted-foreground">Founder & CEO</p>
        </div>
        <div class="text-center">
          <img class="rounded-lg w-full h-auto mx-auto" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fHByb2ZpbGV8ZW58MHx8MHx8fDI%3D" alt="Phoenix Baker" />
          <h3 class="mt-2 font-semibold text-foreground">Phoenix Baker</h3>
          <p class="text-muted-foreground">Founder & CEO</p>
        </div>
        <div class="text-center">
          <img class="rounded-lg w-full h-auto mx-auto" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fHByb2ZpbGV8ZW58MHx8MHx8fDI%3D" alt="Phoenix Baker" />
          <h3 class="mt-2 font-semibold text-foreground">Phoenix Baker</h3>
          <p class="text-muted-foreground">Founder & CEO</p>
        </div>
      </div>
    </div>
  </section>

  <section class="py-20 bg-gray-50" id="contact">
    <div class="container mx-auto text-center">
      <h2 class="text-4xl font-bold mb-4">Get in touch</h2>
      <p class="text-lg mb-10">Ready to help your company scale faster? Let's chat about how we can help.</p>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-16 p-10">
        <div class="bg-white p-6 rounded-lg shadow-md">
          <i class="fa-solid fa-comments text-4xl text-blue-600 mb-4"></i>
          <h4 class="text-lg font-semibold mb-2">Chat to sales</h4>
          <p class="text-sm text-gray-600">Speak to our friendly team.</p>
          <button class="mt-4 bg-black text-white py-2 px-4 rounded-lg">Chat to sales</button>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
          <i class="fa-solid fa-headset text-4xl text-purple-600 mb-4"></i>
          <h4 class="text-lg font-semibold mb-2">Chat to support</h4>
          <p class="text-sm text-gray-600">We’re here to help.</p>
          <button class="mt-4 bg-black text-white py-2 px-4 rounded-lg">Chat to support</button>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
          <i class="fa-solid fa-map-marker-alt text-4xl text-green-600 mb-4"></i>
          <h4 class="text-lg font-semibold mb-2">Visit us</h4>
          <p class="text-sm text-gray-600">Visit our office HQ.</p>
          <button class="mt-4 bg-black text-white py-2 px-4 rounded-lg">Get directions</button>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
          <i class="fa-solid fa-phone text-4xl text-red-600 mb-4"></i>
          <h4 class="text-lg font-semibold mb-2">Call us</h4>
          <p class="text-sm text-gray-600">Mon-Fri from 8am to 5pm.</p>
          <button class="mt-4 bg-black text-white py-2 px-4 rounded-lg">Call our team</button>
        </div>
      </div>

      <!-- Message Form -->
      <h3 class="text-3xl font-bold mb-4">Message us</h3>
      <p class="text-sm mb-8">We’ll get back to you within 24 hours.</p>

      <form class="bg-white p-8 rounded-lg shadow-lg max-w-2xl mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
          <input type="text" placeholder="First name" class="border border-gray-300 p-3 rounded-lg w-full">
          <input type="text" placeholder="Last name" class="border border-gray-300 p-3 rounded-lg w-full">
        </div>
        <div class="mb-4">
          <input type="email" placeholder="Email" class="border border-gray-300 p-3 rounded-lg w-full">
        </div>
        <div class="mb-4">
          <input type="tel" placeholder="Phone number" class="border border-gray-300 p-3 rounded-lg w-full">
        </div>
        <div class="mb-4">
          <textarea placeholder="Message" class="border border-gray-300 p-3 rounded-lg w-full"></textarea>
        </div>

        <button class="bg-black text-white py-3 px-6 rounded-lg w-full hover:bg-gray-500">Send message</button>
      </form>
    </div>
  </section>
  <footer class="bg-white pt-7 border-t border-gray-200 px-4 md:px-10">
    <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-8">
      <div class="lg:col-span-2">
        <h2 class="font-bold text-2xl mb-2">Sk Learning</h2>
        <p class="text-sm text-gray-500 mb-4">Design amazing digital experiences that create more happy in the world.</p>
      </div>

      <!-- Product Links -->
      <div>
        <h4 class="font-semibold text-sm text-gray-700 mb-2">Product</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="text-gray-500 hover:text-black">Overview</a></li>
          <li><a href="#" class="text-gray-500 hover:text-black">Features</a></li>
          <li><a href="#" class="text-gray-500 hover:text-black">Solutions</a></li>
          <li><a href="#" class="text-gray-500 hover:text-black">Tutorials</a></li>
          <li><a href="#" class="text-gray-500 hover:text-black">Pricing</a></li>
          <li><a href="#" class="text-gray-500 hover:text-black">Releases</a></li>
        </ul>
      </div>

      <!-- Resources Links -->
      <div>
        <h4 class="font-semibold text-sm text-gray-700 mb-2">Resources</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="text-gray-500 hover:text-black">Blog</a></li>
          <li><a href="#" class="text-gray-500 hover:text-black">Newsletter</a></li>
          <li><a href="#" class="text-gray-500 hover:text-black">Events</a></li>
          <li><a href="#" class="text-gray-500 hover:text-black">Help centre</a></li>
          <li><a href="#" class="text-gray-500 hover:text-black">Tutorials</a></li>
          <li><a href="#" class="text-gray-500 hover:text-black">Support</a></li>
        </ul>
      </div>

      <!-- Social Links -->
      <div>
        <h4 class="font-semibold text-sm text-gray-700 mb-2">Social</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="text-gray-500 hover:text-black">Twitter</a></li>
          <li><a href="#" class="text-gray-500 hover:text-black">LinkedIn</a></li>
          <li><a href="#" class="text-gray-500 hover:text-black">Facebook</a></li>
          <li><a href="#" class="text-gray-500 hover:text-black">GitHub</a></li>
          <li><a href="#" class="text-gray-500 hover:text-black">AngelList</a></li>
          <li><a href="#" class="text-gray-500 hover:text-black">Dribbble</a></li>
        </ul>
      </div>

      <!-- Legal Links -->
      <div>
        <h4 class="font-semibold text-sm text-gray-700 mb-2">Legal</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="text-gray-500 hover:text-black">Terms</a></li>
          <li><a href="#" class="text-gray-500 hover:text-black">Privacy</a></li>
          <li><a href="#" class="text-gray-500 hover:text-black">Cookies</a></li>
          <li><a href="#" class="text-gray-500 hover:text-black">Licenses</a></li>
          <li><a href="#" class="text-gray-500 hover:text-black">Settings</a></li>
          <li><a href="#" class="text-gray-500 hover:text-black">Contact</a></li>
        </ul>
      </div>
    </div>

    <div class="mt-8 text-center">
      <a href="#" class="text-gray-500 hover:text-black mx-2">
        <i class="fa-brands fa-twitter"></i>
      </a>
      <a href="#" class="text-gray-500 hover:text-black mx-2">
        <i class="fa-brands fa-github"></i>
      </a>
      <a href="#" class="text-gray-500 hover:text-black mx-2">
        <i class="fa-brands fa-dribbble"></i>
      </a>
      <p class="text-xs text-gray-400 mb-2">© 2024 Sk Learning. All rights reserved.</p>
    </div>
  </footer>







  </div>
  </div>

  <script src='./js/script.js'></script>
</body>

</html>