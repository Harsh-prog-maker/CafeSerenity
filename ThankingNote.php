<?php
// Retrieve the name from the URL query parameter
$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f4f4f4;
        }
        .thank-you-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        h1 {
            color: #4CAF50;
            font-size: 2.5rem;
        }
        p {
            font-size: 1.2rem;
            color: #555;
        }
        .back-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
        }
        .back-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="thank-you-container">
    <h1>Thank You, <?php echo $name; ?>!</h1>
    <p>We have received your message, and we will get back to you shortly.</p>
    <a href="Contact.html" class="back-button">Back to Contact Page</a>
</div>

</body>
</html>
