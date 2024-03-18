<?php
    $conn = new mysqli('sql305.epizy.com', 'epiz_31926538', 'm4uJ5Vo3y3Oo', 'epiz_31926538_regform');
    
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        $name = $_REQUEST["fullname"];
        $email = $_REQUEST['email'];
        $message = $_REQUEST['message'];

        $stmt = $conn->prepare("INSERT INTO tdata (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            echo "Message sent";
        } else {
            echo "Error: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    }
?>
