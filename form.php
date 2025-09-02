<?php
$firstname = $lastname = $email = $message = "";
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize all inputs first
    $firstname = isset($_POST["fname"]) ? htmlspecialchars($_POST["fname"]) : "";
    $lastname = isset($_POST["lname"]) ? htmlspecialchars($_POST["lname"]) : "";
    $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "";
    $message = isset($_POST["msg"]) ? htmlspecialchars($_POST["msg"]) : "";

    // Validation checks
    if (!preg_match("/^[a-zA-Z-' ]*$/", $firstname)) {
        $errors[] = "Invalid first name.";
    }

    if (!preg_match("/^[a-zA-Z-' ]*$/", $lastname)) {
        $errors[] = "Invalid last name.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    // Check if there are any errors
    if (empty($errors)) {
        // Process the form data (e.g., save to database, send email, etc.)
        echo "Form submitted successfully!";
    } else {
        // Display errors to the user
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
} else {
    // Handle cases where the form was not submitted via POST
    $errors[] = "Invalid request method.";
    // You could redirect or display a message here
    echo "<p>Invalid request.</p>";
}
//TODO:Database connection
?>
