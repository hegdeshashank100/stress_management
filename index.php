<?php
session_start();
include 'connect.php'; // Ensure the path is correct
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mental Health Support</title>
    <link rel="stylesheet" href="styles.css">
    <style> 
#rating {
    margin-top: 30px;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
}

.rating-section {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 300px;
    background-color: #f9f9f9;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    padding: 20px;
    z-index: 1000;
}

/* Heading styles */
.rating-section h2,
.rating-section h3 {
    font-size: 1.2em;
    margin-bottom: 10px;
    color: #333;
}

/* Ratings display styles */
.ratings-display {
    margin-bottom: 20px; /* Consolidated margin bottom */
}

.average-rating {
    font-size: 1.5em;
    font-weight: bold;
    color: #ffbc00;
    display: flex;
    align-items: center;
}

.stars {
    margin-left: 8px;
    color: #ffbc00;
}

#commentsList {
    list-style-type: none;
    padding-left: 0;
    margin-top: 10px;
    color: #555;
}

/* Rating form styles */
.rating-form {
    margin-top: 15px;
}

.star-rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
    gap: 5px;
}

.star-rating input[type="radio"] {
    display: none; /* Hide radio buttons */
}

.star-rating label {
    font-size: 1.5em;
    color: #ccc;
    cursor: pointer;
    transition: color 0.2s;
}

.star-rating input[type="radio"]:checked ~ label,
.star-rating label:hover,
.star-rating label:hover ~ label {
    color: #ffbc00; /* Highlight color for selected or hovered stars */
}

.rating-form textarea {
    width: 100%;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ddd;
    resize: none;
    margin-top: 5px;
}

/* Button styles */
.rating-form button,
button[type="submit"] {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
    transition: background-color 0.2s;
}

.rating-form button:hover,
button[type="submit"]:hover {
    background-color: #0056b3; /* Darker shade for hover effect */
}

/* Additional styles for forms */
form {
    margin-top: 10px;
}

label {
    display: block;
    margin-top: 10px;
    font-weight: bold;
}

select, textarea {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
}
.accordion-container .subheading {
    position: relative;
    padding-left: 20px; /* Adjust as needed */
}

.accordion-container .subheading::before {
    content: '•'; /* You can change this to any other symbol or text */
    position: absolute;
    left: 0; /* Adjust as needed */
    color: #4CAF50; /* Change to desired color */
    font-size: 1.2em; /* Adjust size as needed */
}

    </style>
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
    <section id="community">
    <div class="accordion-container">
        <h1>Mental Health Disorders</h1>

        <!-- Mood Disorders -->
        <h2 class="accordion-heading">Mood Disorders</h2>
        <div class="panel">
            <h3 class="subheading">Major Depressive Disorder (MDD)</h3>
            <p>Characterized by persistent sadness, hopelessness, and lack of interest in activities. Symptoms include fatigue, guilt, and in severe cases, suicidal ideation.</p>

            <h3 class="subheading">Bipolar Disorder</h3>
            <p>Involves mood swings between extreme highs (mania) and lows (depression). Manic episodes may include impulsive behavior, high energy, and reduced need for sleep, while depressive episodes mirror symptoms of MDD.</p>

            <h3 class="subheading">Cyclothymic Disorder</h3>
            <p>A milder form of bipolar disorder, with hypomanic and depressive symptoms that don’t meet the criteria for a full manic or depressive episode but still cause significant emotional disturbance.</p>

            <h3 class="subheading">Seasonal Affective Disorder (SAD)</h3>
            <p>A type of depression linked to seasonal changes, often occurring during winter months due to reduced sunlight exposure.</p>
        </div>

        <!-- Anxiety Disorders -->
        <h2 class="accordion-heading">Anxiety Disorders</h2>
        <div class="panel">
            <h3 class="subheading">Generalized Anxiety Disorder (GAD)</h3>
            <p>Persistent and excessive worry about various aspects of life, such as work, health, or social interactions. Symptoms may include restlessness, irritability, and muscle tension.</p>

            <h3 class="subheading">Panic Disorder</h3>
            <p>Characterized by sudden panic attacks involving intense fear, sweating, chest pain, and palpitations. Often accompanied by fear of future attacks.</p>

            <h3 class="subheading">Social Anxiety Disorder</h3>
            <p>Extreme fear of social situations due to concerns about being judged or humiliated, leading to avoidance of social interactions.</p>

            <h3 class="subheading">Phobias</h3>
            <p>Intense, irrational fear of specific objects or situations (e.g., heights, flying, or animals) that leads to avoidance and severe distress.</p>
        </div>

        <!-- Obsessive-Compulsive and Related Disorders -->
        <h2 class="accordion-heading">Obsessive-Compulsive and Related Disorders</h2>
        <div class="panel">
            <h3 class="subheading">Obsessive-Compulsive Disorder (OCD)</h3>
            <p>Involves intrusive, unwanted thoughts (obsessions) and repetitive behaviors (compulsions) performed to alleviate the distress from obsessions.</p>

            <h3 class="subheading">Body Dysmorphic Disorder</h3>
            <p>Preoccupation with perceived defects or flaws in appearance, often leading to repetitive behaviors like mirror checking.</p>

            <h3 class="subheading">Hoarding Disorder</h3>
            <p>Persistent difficulty in discarding possessions, regardless of their actual value, leading to clutter and distress.</p>

            <h3 class="subheading">Trichotillomania and Excoriation Disorder</h3>
            <p>Compulsively pulling out hair or picking at skin, often to relieve stress or anxiety.</p>
        </div>

        <!-- Trauma- and Stressor-Related Disorders -->
        <h2 class="accordion-heading">Trauma- and Stressor-Related Disorders</h2>
        <div class="panel">
            <h3 class="subheading">Post-Traumatic Stress Disorder (PTSD)</h3>
            <p>Develops after exposure to a traumatic event. Symptoms include flashbacks, nightmares, hypervigilance, and avoidance of reminders of the trauma.</p>

            <h3 class="subheading">Acute Stress Disorder</h3>
            <p>Similar to PTSD but occurs immediately after a traumatic event and typically resolves within a month.</p>

            <h3 class="subheading">Adjustment Disorders</h3>
            <p>Emotional or behavioral symptoms in response to a specific stressor, causing significant distress and impairment, but usually temporary.</p>
        </div>

        <!-- Personality Disorders -->
        <h2 class="accordion-heading">Personality Disorders</h2>
        <div class="panel">
            <h3 class="subheading">Borderline Personality Disorder (BPD)</h3>
            <p>Instability in relationships, self-image, and emotions, with impulsive behaviors, fear of abandonment, and intense mood swings.</p>

            <h3 class="subheading">Antisocial Personality Disorder (ASPD)</h3>
            <p>Disregard for others’ rights, lack of empathy, manipulative behavior, and often criminal actions.</p>

            <h3 class="subheading">Narcissistic Personality Disorder</h3>
            <p>Grandiosity, need for admiration, and lack of empathy. Individuals often feel superior and are highly sensitive to criticism.</p>

            <h3 class="subheading">Obsessive-Compulsive Personality Disorder (OCPD)</h3>
            <p>Preoccupation with orderliness, perfectionism, and control, leading to rigidity in routines and interpersonal relationships.</p>
        </div>

        <!-- Psychotic Disorders -->
        <h2 class="accordion-heading">Psychotic Disorders</h2>
        <div class="panel">
            <h3 class="subheading">Schizophrenia</h3>
            <p>Characterized by delusions, hallucinations, disorganized speech and behavior, and impaired cognitive function. Symptoms are classified as “positive” or “negative”.</p>

            <h3 class="subheading">Schizoaffective Disorder</h3>
            <p>Combines symptoms of schizophrenia (delusions, hallucinations) with mood disorder symptoms, like depression or mania.</p>

            <h3 class="subheading">Brief Psychotic Disorder</h3>
            <p>A short-term condition with sudden onset of psychotic symptoms, usually triggered by a stressful event.</p>
        </div>

        <!-- Eating Disorders -->
        <h2 class="accordion-heading">Eating Disorders</h2>
        <div class="panel">
            <h3 class="subheading">Anorexia Nervosa</h3>
            <p>Characterized by restricted food intake, intense fear of gaining weight, and a distorted body image, often leading to dangerously low body weight.</p>

            <h3 class="subheading">Bulimia Nervosa</h3>
            <p>Involves episodes of binge eating followed by compensatory behaviors like vomiting or excessive exercise to prevent weight gain.</p>

            <h3 class="subheading">Binge-Eating Disorder</h3>
            <p>Recurrent episodes of consuming large quantities of food, often quickly and to the point of discomfort, without compensatory behaviors.</p>
        </div>

        <!-- Neurodevelopmental Disorders -->
        <h2 class="accordion-heading">Neurodevelopmental Disorders</h2>
        <div class="panel">
            <h3 class="subheading">Attention-Deficit/Hyperactivity Disorder (ADHD)</h3>
            <p>Marked by inattention, impulsivity, and hyperactivity, impacting academic or occupational functioning.</p>

            <h3 class="subheading">Autism Spectrum Disorder (ASD)</h3>
            <p>Characterized by difficulties in social interaction and communication, along with restricted, repetitive behaviors and interests.</p>

            <h3 class="subheading">Intellectual Disability</h3>
            <p>Limitations in intellectual functioning and adaptive behavior, affecting everyday social and practical skills.</p>
        </div>

        <!-- Neurocognitive Disorders -->
        <h2 class="accordion-heading">Neurocognitive Disorders</h2>
        <div class="panel">
            <h3 class="subheading">Alzheimer’s Disease</h3>
            <p>Progressive neurodegenerative disease causing memory loss, confusion, and changes in personality and behavior.</p>

            <h3 class="subheading">Frontotemporal Dementia</h3>
            <p>Involves degeneration of the frontal and temporal lobes, leading to changes in behavior, personality, and language abilities.</p>

            <h3 class="subheading">Delirium</h3>
            <p>A rapid onset of confusion, often temporary and linked to factors like infections or medication side effects, typically affecting attention and cognition.</p>
        </div>

        <!-- Somatic Symptom and Related Disorders -->
        <h2 class="accordion-heading">Somatic Symptom and Related Disorders</h2>
        <div class="panel">
            <h3 class="subheading">Somatic Symptom Disorder</h3>
            <p>Excessive focus on physical symptoms like pain or fatigue, with high levels of distress or anxiety over health.</p>

            <h3 class="subheading">Illness Anxiety Disorder</h3>
            <p>Preoccupation with having a serious illness despite minimal or no symptoms, leading to frequent medical consultations.</p>

            <h3 class="subheading">Conversion Disorder</h3>
            <p>Neurological symptoms (e.g., paralysis, seizures) that cannot be explained by medical conditions, often linked to psychological stress.</p>
        </div>

    </div>
</section>




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
    <section id="rating">
    <link rel="stylesheet" href="rating.css">

    <h2>User Ratings</h2>
    
    <!-- Display Existing Ratings -->
    <div class="ratings-display">
        <!-- Sample rating - this will eventually be dynamic -->
        <div class="rating">
            <p><strong>Username:</strong> User123</p>
            <p><strong>Rating:</strong> ⭐⭐⭐⭐⭐</p>
            <p><strong>Comment:</strong> "Amazing platform for mental health support!"</p>
        </div>
    </div>
    <!-- Display Existing Ratings -->
<div class="ratings-display">
    <?php
    $result = $conn->query("SELECT * FROM user_ratings ORDER BY created_at DESC");
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='rating'>";
            echo "<p><strong>Username:</strong> " . htmlspecialchars($row['username']) . "</p>";
            echo "<p><strong>Rating:</strong> " . str_repeat("⭐", $row['rating']) . "</p>";
            echo "<p><strong>Comment:</strong> \"" . htmlspecialchars($row['comment']) . "\"</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No ratings yet. Be the first to rate!</p>";
    }
    ?>
</div>


    <!-- Rating Form -->
    <?php if (isset($_SESSION['username'])): ?>
        <h3>Rate Our Website</h3>
        <form action="submit_rating.php" method="POST">
            <label for="rating">Star Rating:</label>
            <select id="rating" name="rating" required>
                <option value="5">⭐⭐⭐⭐⭐</option>
                <option value="4">⭐⭐⭐⭐</option>
                <option value="3">⭐⭐⭐</option>
                <option value="2">⭐⭐</option>
                <option value="1">⭐</option>
            </select>
            

            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" rows="4" placeholder="Share your experience..." required></textarea>

            <button type="submit">Submit Rating</button>
        </form>
    <?php else: ?>
        <p><strong>Please <a href="login.php">login</a> to rate our website.</strong></p>
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
    const buttons = document.querySelectorAll(".accordion-button");

    buttons.forEach(button => {
        button.addEventListener("click", () => {
            button.classList.toggle("active");
            const panel = button.nextElementSibling;
            panel.style.display = panel.style.display === "block" ? "none" : "block";
        });
    });
</script>
</body>
</html>
