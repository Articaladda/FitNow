<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Basic email validation
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Send email (example)
        $to = "your-email@example.com"; // Replace with your email
        $subject = "Contact Form Submission from $name";
        $body = "Name: $name\nEmail: $email\nMessage:\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            echo "Thank you for your message, $name!";
        } else {
            echo "Sorry, there was an error sending your message.";
        }
    } else {
        echo "Invalid email format.";
    }
} else {
    echo "Invalid request.";
}
?>