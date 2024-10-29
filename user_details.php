<?php
session_start();
include 'connect.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch user details from database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
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
/* User Details Container */
.user-details-container {
    position: relative; /* Enable positioning for the pseudo-elements */
    max-width: 600px;
    margin: 50px auto; /* Spacing for centered alignment */
    padding: 30px; /* Inner spacing */
    border: 1px solid #e0e0e0; /* Lighter border for a softer look */
    border-radius: 10px;
    background-color: #ffffff; /* White background for contrast */
    box-shadow: 0 4px 25px rgba(0, 0, 0, 0.15); /* Slightly more pronounced shadow */
    overflow: hidden; /* Prevent overflow from the pseudo-elements */
}

/* Pseudo-element for RGB Strip Animation */
.user-details-container::before,
.user-details-container::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 10px; /* Match the container's border radius */
    background: linear-gradient(270deg, red, yellow, green, cyan, blue, magenta, red);
    background-size: 300% 300%; /* Larger size for animation */
    z-index: -1; /* Send behind the content */
    animation: rainbowMove 5s linear infinite; /* Animation effect */
}

.user-details-container::before {
    top: 0; /* Position at the top */
    left: 0; /* Start at the left */
}

.user-details-container::after {
    bottom: 0; /* Position at the bottom */
    right: 0; /* Start at the right */
    animation: rainbowMoveReverse 5s linear infinite; /* Reverse animation for the bottom strip */
}

/* Keyframes for moving animations */
@keyframes rainbowMove {
    0% {
        background-position: 0% 50%; /* Start at the left */
    }
    100% {
        background-position: 100% 50%; /* Move to the right */
    }
}

@keyframes rainbowMoveReverse {
    0% {
        background-position: 100% 50%; /* Start at the right */
    }
    100% {
        background-position: 0% 50%; /* Move to the left */
    }
}

.user-details-container:hover {
    box-shadow: 0 8px 40px rgba(0, 0, 0, 0.2); /* Enhanced shadow effect on hover */
    border-color: transparent; /* Hide original border on hover */
}

/* User Details Content */
.user-details {
    text-align: center;
}

.user-details img.profile-pic {
    display: block;
    width: 120px;
    height: 120px;
    border-radius: 50%;
    margin: 0 auto 20px auto; /* Centered image with bottom margin */
    border: 4px solid #007bff; /* Blue border for emphasis */
    transition: border-color 0.3s, transform 0.3s; /* Transition for border color change */
    animation: scaleIn 0.5s forwards; /* Animation for profile picture */
}

@keyframes scaleIn {
    from {
        transform: scale(0); /* Start from 0 size */
    }
    to {
        transform: scale(1); /* End at original size */
    }
}

.user-details img.profile-pic:hover {
    border-color: #0056b3; /* Darker blue on hover */
    transform: scale(1.1); /* Slightly scale up on hover */
}

.user-details h2 {
    font-size: 32px; /* Increased font size for prominence */
    color: #2c3e50; /* Darker text color for better readability */
    margin-bottom: 15px; /* More space below heading */
    font-weight: 600; /* Bold weight for the heading */
    opacity: 0; /* Start with hidden opacity */
    animation: fadeIn 0.6s forwards 0.3s; /* Delay for h2 appearance */
}

@keyframes fadeIn {
    from {
        opacity: 0; /* Start transparent */
        transform: translateY(-10px); /* Start slightly above */
    }
    to {
        opacity: 1; /* Fully visible */
        transform: translateY(0); /* End at original position */
    }
}

.user-details p {
    font-size: 18px; /* Improved readability */
    color: #555; /* Subtle gray for body text */
    margin: 10px 0; /* More consistent vertical spacing */
    line-height: 1.5; /* Improved line height for readability */
    opacity: 0; /* Start with hidden opacity */
    animation: fadeIn 0.6s forwards 0.5s; /* Delay for paragraph appearance */
}

.user-details p:nth-child(2) {
    animation-delay: 0.4s; /* Slightly earlier appearance */
}

/* Button Styling */
.btn {
    display: inline-block;
    padding: 12px 25px; /* Increased padding for better button size */
    font-size: 16px;
    color: #fff;
    background-color: #007bff; /* Primary button color */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    margin: 10px; /* Margin between buttons */
    transition: background-color 0.3s, transform 0.2s; /* Added transition for scaling effect */
    opacity: 0; /* Start with hidden opacity */
    animation: fadeIn 0.6s forwards 0.6s; /* Delay for button appearance */
}

.btn:hover {
    background-color: #0056b3; /* Darker shade on hover */
    transform: scale(1.05); /* Slight scaling on hover for feedback */
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .user-details-container {
        padding: 20px; /* Reduce padding on smaller screens */
    }

    .user-details h2 {
        font-size: 28px; /* Slightly smaller heading */
    }

    .user-details p {
        font-size: 16px; /* Adjust body text size */
    }

    .btn {
        padding: 10px 20px; /* Consistent button size on small screens */
    }
}

    </style>
</head>
<body>
    <header>
        <nav>
            <a href="index.php">Home</a>
            <h3><strong>User Details</strong></h3>
            <a href="logout.php">Logout</a> <!-- Added Logout Link -->
        </nav>
    </header>

    <div class="user-details-container">
        <div class="user-details">
            
            <h2>Welcome, <?php echo htmlspecialchars($user['username']); ?></h2>
            <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
            <p>Age: <?php echo htmlspecialchars($user['age']); ?></p>
            <p>Joined on: <?php echo htmlspecialchars($user['created_at']); ?></p>
        </div>
        
        <!-- Additional buttons for updating profile or logging out -->
        <div class="user-actions">
            <a href="edit_profile.php" class="btn">Edit Profile</a> <!-- Link to Edit Profile -->
            <a href="logout.php" class="btn">Logout</a>
        </div>
    </div>
</body>
</html>
