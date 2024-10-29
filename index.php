<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mental Health Support</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <nav>
        <ul>
        <div class="header">
                <h1><span class="highlight" href="index.php">F</span>ee! <span class="highlight">F</span>ree</h1>
        </div>

            <li><a href="ContactUs.php">Contact Us</a></li>
            
            
            <!-- More button dropdown added in the same <ul> -->
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">More</a>
                <ul class="dropdown-content">
                    <li><a href="healthtest.php">Health Tests</a></li>
                    <li><a href="playlist.php">Video Playlist</a></li>
                    <li><a href="http://192.168.21.80:5000">AI Assistance</a></li>
                    <li><a href="community.php">Peer Support</a></li>
                    <li><a href="games.php">Games</a></li>
                </ul>
            </li>
        </ul>

        <!-- Authentication Links -->
        <div class="auth-links">
            <?php if (isset($_SESSION['username'])): ?>
                <span class="welcome-message">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                <a href="logout.php" class="logout-link">Logout</a>
                <a href="user_details.php">User Details</a>
            <?php else: ?>
                <!-- Updated button structure with nested button-border span -->
                <div class="button">
                    <span class="button-border"></span>
                    <a href="login.php" class="auth-button">Login</a>
                    <a href="register.php" class="auth-button">Register</a>
                </div>
            <?php endif; ?>
        </div>
    </nav>
</header>
<main>
    <section class="welcome-container">
        <div class="logo">
            <img src="logo.jpg" alt="Logo"> <!-- Use your actual logo image file path -->
        </div>
        <div class="info-content">
            <h2>Mental Health Support</h2>
            <p>Welcome to Mental Health Support</p>
            <p>Our mission is to provide a safe and supportive community for young people to prioritize their mental well-being.</p>
            <p>We aim to provide a safe, nurturing environment for young people to explore mental health issues, find resources, and connect with others who share similar experiences. Our platform offers various tools, including assessments, community support, and AI-driven chat assistance, all designed to promote well-being and resilience.</p>
        </div>
    </section>
    </s>

    <section id="community">
        <h2>Resources</h2>
        <ul>
            <li><a href="https://en.wikipedia.org/wiki/Mental_health">Mental Health Articles</a></li>
            <li><a href="https://www.helpguide.org/mental-health/wellbeing/self-care-tips-to-prioritize-your-mental-health">Self-Care Tips</a></li>
            <li><a href="https://www.who.int/news-room/fact-sheets/detail/mental-health-strengthening-our-response">More Details about Mental Health</a></li>
        </ul>
    </section>

    <section id="community">
        <h2>Assistance</h2>
        <p>Get personalized support and real-time insights with our AI-driven mental health assistance.</p>
        <?php if (isset($_SESSION['username'])): ?>
            <button id="chat-btn" onclick="window.location.href='http://192.168.21.80:5000';">Start Chat</button>
        <?php else: ?>
            <p><strong>Please <a href="login.php">login</a> to access the chat support.</strong></p>
        <?php endif; ?>
    </section>

    <section id="community">
        <h2>Mental Health Test</h2>
        <p>An interactive assessment tool that evaluates depression, anxiety, ADHD, and Stress, providing instant results in a circular chart for enhanced self-awareness.</p>
        <?php if (isset($_SESSION['username'])): ?>
            <button id="track-btn" onclick="window.location.href='healthtest.php';">Take Test</button>
        <?php else: ?>
            <p><strong>Please <a href="login.php">login</a> to access the Emotional Health Tracker.</strong></p>
        <?php endif; ?>
    </section>

    <section id="community">
        <h2>Peer Support Communities</h2>
        <p>A safe, moderated space where users can share their experiences, ask for advice, and support each other in an encouraging environment.</p>
        <?php if (isset($_SESSION['username'])): ?>
            <button id="peer-btn" onclick="window.location.href='community.php';">Join Peer Support</button>
        <?php else: ?>
            <p><strong>Please <a href="login.php">login</a> to access the Peer Support Communities.</strong></p>
        <?php endif; ?>
    </section>
</main>
<footer class="footer">
    <div class="footer-content">
        <div class="footer-section about">
            <h2>Feel Free</h2>
            <p>Your mental wellness is our priority. Join us for a supportive, understanding community and access helpful resources for managing stress, anxiety, and more.</p>
        </div>

        <div class="footer-section links">
            <h2>Quick Links</h2>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="ContactUs.php">Contact Us</a></li>
                <li><a href="services.html">Services</a></li>
                
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2024 Feel Free | All Rights Reserved</p>
    </div>
</footer>
</body>
</html>
