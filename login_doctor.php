<?php
// login_doctor.php
include 'connect.php'; // Your database connection file

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM doctors WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $doctor = $result->fetch_assoc();
        if (password_verify($password, $doctor['password'])) {
            $_SESSION['doctor_id'] = $doctor['doctors_id']; // Set session variable
            // Redirect to doctor's dashboard or appointment management page
            header("Location: doctor_dashboard.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No account found with that email.";
    }

    $stmt->close();
}
?>
