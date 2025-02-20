<?php
$metaDescription = isset($article['meta_description']) && $article['meta_description']
    ? $article['meta_description']
    : "Welcome to FitZen.ro, your source for fitness and health insights.";
?>
<meta name="description" content="<?= htmlspecialchars($metaDescription) ?>">

<!DOCTYPE HTML>
<html>
<head>
    <title>fitzen.ro</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
</head>
<body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Header -->
        <header id="header">
        <h1>
    <a href="index.php" style="text-decoration: none;">
        <span style="color: #1E90FF; font-weight: bold; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); display: inline;">Fit</span><span style="color: #FFD700; font-weight: bold; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); display: inline;">Zen</span><span style="color: #FF4500; font-weight: bold; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); display: inline;">.ro</span>
    </a>
</h1>


            <nav class="links">
                <ul>
                <li><a href="index.php">Home</a></li>                
                <li><a href="tutoriale.php">Tutoriale</a></li>
                <li><a href="sport.php">Sport</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="sanatate.php">Sănătate</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="about.php">About</a></li>
                </ul>
            </nav>
            <nav class="main">
                <ul>
                    <li class="search">
                        <a class="fa-search" href="#search">Search</a>
                        <form id="search" method="get" action="#">
                            <input type="text" name="query" placeholder="Search" />
                        </form>
                    </li>
                    <li class="menu">
                        <a class="fa-bars" href="#menu">Menu</a>
                    </li>
                </ul>
            </nav>
        </header>

        <!-- Menu -->
        <section id="menu">
            <!-- Search -->
            <section>
                <form class="search" method="get" action="#">
                    <input type="text" name="query" placeholder="Search" />
                </form>
            </section>
            <!-- Links -->
<section>
    <ul class="links">
        <li>
            <a href="index.php">
                <h3><span style="color: #1E90FF; font-weight: bold; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); display: inline;">Fit</span><span style="color: #FFD700; font-weight: bold; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); display: inline;">Zen</span><span style="color: #FF4500; font-weight: bold; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); display: inline;">.ro</span></h3>
            </a>
        </li>
        <li>
        <a href="blog.php">
                <h3>Blog</h3>
            </a>
        </li>
        <li>
            <a href="sanatate.php">
                <h3>Sanatate</h3>
            </a>
        </li>
        <li>
            <a href="tutoriale.php">
                <h3>Tutoriale</h3>
            </a>
        </li>
        <li>
            <a href="sport.php">
                <h3>Sport</h3>
            </a>
        </li>
        <li>
        <a href="contact.php">
             <h3>Contact</h3>
            </a>
            </a>
        </li>
        <li>
        <a href="about.php">
        <h3>Despre Noi</h3>
            </a>
        </li>
    </ul>
</section>

            <!-- Actions -->
            <section>
                <ul class="actions stacked">
                  <!--  <li><a href="#" class="button large fit">Log In</a></li>   -->
                </ul>
            </section>
        </section>
