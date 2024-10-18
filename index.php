<?php 
declare(strict_types=1);
$title = "LRS Learn the Right Skills";
$h1 = "Welcome to our Website!";
$description = "Your gateway to the latest in computer technology.";
require "./include/header.inc.php";
?>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasSidebarLabel">Menu</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <h3>Menu</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="#" class="nav-link text-white">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">Courses</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">Achievements <span class="badge bg-warning text-dark">3</span></a></li>
            </ul>

            <h3 class="mt-4">Category</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="#" class="nav-link text-white">Cyber Security</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">Robotics</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">Artificial Intelligence</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">Machine Learning</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">+ More</a></li>
            </ul>

            <h3 class="mt-4">Quiz</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="#" class="nav-link text-white">Python</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">JavaScript</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">Linux Bash</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">+ More</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <main class="main-content flex-grow-1 p-4">
        <h1><?php echo $h1; ?></h1>
        <p>Our platform brings you news and articles about cutting-edge technological trends, with easily navigable categories such as cybersecurity, IoT, AI, quantum computing, and much more!</p>
        <div class="buttons mt-3">
            <a href="log-in.php" class="btn btn-warning me-2">Log In</a>
            <a href="sign-up.php" class="btn btn-warning">Sign Up</a>
        </div>
    </main>
</div>


<?php require "./include/footer.inc.php"; ?>
