<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mental Health Playlist</title>
    <link rel="stylesheet" href="styles.css">
    <style>
                /* Header Styling */
header {
    background-color: rgba(74, 144, 226, 0.8); /* Semi-transparent header */
    color: white;
    padding: 15px 20px;
    text-align: center;
    position: sticky;
    top: 0;
    z-index: 1000;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
}

/* Header Title */
header h1 {
    font-size: 2em;
    margin: 0;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Navigation Styling */
header nav {
    margin-top: 10px;
}

header nav a {
    color: #ffffff;
    text-decoration: none;
    margin: 0 15px;
    font-size: 1.1em;
    font-weight: 500;
    position: relative;
    padding: 5px 0;
    transition: color 0.3s ease;
}

/* Hover effect with underline */
header nav a:hover {
    color: #ffd700; /* Golden color on hover */
}

header nav a::after {
    content: '';
    display: block;
    width: 0;
    height: 2px;
    background: #ffd700;
    transition: width 0.3s;
    position: absolute;
    bottom: 0;
    left: 0;
}

header nav a:hover::after {
    width: 100%; /* Expands underline on hover */
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    header h1 {
        font-size: 1.8em;
    }
    header nav a {
        font-size: 1em;
        margin: 0 10px;
    }
}
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
            <div class="auth-links">
                <!-- Display the username if logged in -->
                <?php if (isset($_SESSION['username'])): ?>
                    <span class="welcome-message">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                    <a href="logout.php" class="logout-link">Logout</a>
                <?php else: ?>
                    <a href="login.php" class="auth-button">Login</a>
                    <a href="register.php" class="auth-button">Register</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    <main>
        

        <section id="community">
            <h2>Stress</h2>
            <p>A calming and Guidance collection of videos designed to help relieve stress and promote relaxation</p>
            <!-- Lock "Start Chat" button until user logs in -->
            <?php if (isset($_SESSION['username'])): ?>
                <button id="stress-btn">Watch Now</button>
            <?php else: ?>
                <p><strong>Please <a href="login.php">login</a> to access the chat support.</strong></p>
            <?php endif; ?>
        </section>
        <section id="community">
            <h2>Depression</h2>
            <p>A soothing playlist to help uplift your mood and ease the burden of depression.</p>
            <!-- Lock "Start Chat" button until user logs in -->
            <?php if (isset($_SESSION['username'])): ?>
                <button id="dep-btn">Watch Now</button>
            <?php else: ?>
                <p><strong>Please <a href="login.php">login</a> to access the chat support.</strong></p>
            <?php endif; ?>
        </section>
        <section id="community">
            <h2>Anxiety</h2>
            <p>A calming playlist to help reduce anxiety and bring peace of mind.</p>
            <!-- Lock "Start Chat" button until user logs in -->
            <?php if (isset($_SESSION['username'])): ?>
                <button id="anx-btn">Watch Now</button>
            <?php else: ?>
                <p><strong>Please <a href="login.php">login</a> to access the chat support.</strong></p>
            <?php endif; ?>
        </section>
        <section id="community">
            <h2>ADHD</h2>
            <p>An energizing playlist designed to improve focus and manage ADHD symptoms.</p>
            <!-- Lock "Start Chat" button until user logs in -->
            <?php if (isset($_SESSION['username'])): ?>
                <button id="adhd-btn">Watch Now</button>
            <?php else: ?>
                <p><strong>Please <a href="login.php">login</a> to access the chat support.</strong></p>
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

    <script>
        // Redirect button is clicked
        document.getElementById("stress-btn").onclick = function() {
            window.location.href = "videos/stress/stress.html";
        };
        document.getElementById("dep-btn").onclick = function() {
            window.location.href = "videos/depression/depression.html";
        };
        document.getElementById("anx-btn").onclick = function() {
            window.location.href = "videos/anxiety/anxiety.html";
        };
        document.getElementById("adhd-btn").onclick = function() {
            window.location.href = "videos/adhd/ADHD.html";
        };
    </script>
</body>
</html>
