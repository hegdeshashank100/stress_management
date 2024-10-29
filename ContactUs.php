<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contactus.css"> <!-- Link to your CSS file -->
</head>
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
<body>
    <main>
        <section class="contact-container">
            <h1>Contact Us</h1>
            <p>If you have any questions or need support, please fill out the form below, and we will get back to you as soon as possible.</p>

            <?php
            // Display success or error message
            if (isset($_SESSION['success_message'])) {
                echo "<div class='success-message'>" . $_SESSION['success_message'] . "</div>";
                unset($_SESSION['success_message']); // Clear the message after displaying
            }
            if (isset($_SESSION['error_message'])) {
                echo "<div class='error-message'>" . $_SESSION['error_message'] . "</div>";
                unset($_SESSION['error_message']); // Clear the message after displaying
            }
            ?>

            <form id="contact-form" action="contact_submit.php" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit">Send Message</button>
            </form>
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
                    <li><a href="../../index.php">Home</a></li>
                    <li><a href="../../ContactUs.php">Contact Us</a></li>
                    <li><a href="../../services.html">Services</a></li>
                    
                </ul>
            </div>
        </div>
    
        <div class="footer-bottom">
            <p>&copy; 2024 Feel Free | All Rights Reserved</p>
        </div>
    </footer>
</body>
</html>
