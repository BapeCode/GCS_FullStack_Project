<?php


require_once 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "DELETE FROM contact WHERE id = $id";
    $result = $mysqli->query($query);

    if ($result) {
        header('Location: admin.php');
    } else {
        echo "Error: " . $mysqli->error;
    }
}

if (isset($_GET['email']) && isset($_GET['object']) && isset($_GET['message'])) {
    $email = $_GET['email'];
    $objects = $_GET['object'];
    $messages = $_GET['message'];

    $destinataire = $email;
    $sujet = $objects;

    $message = "<html><body>";
    $message .= "<h1>Message from CyberNova</h1>";
    $message .= "<p>$messages</p>";
    $message .= "</body></html>";

    $headers = "From: contact@cybernova.com\r\n";
    $headers .= "Reply-To: contact@cybernova.com\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";

    if (mail($destinataire, $sujet, $message, $headers)) {

        header('Location: admin.php');
        exit();
    } else {
        echo "Email not send!";
    }
}

if (isset($_GET['oldPassword']) && isset($_GET['oldPassword']) && isset($_GET['email'])) {
    $email = $_GET['email'];
    $oldPassword = md5($_GET['oldPassword']);
    $newPassword = md5($_GET['password']);

    $query = "SELECT * FROM login WHERE email = '$email' AND password = '$oldPassword'";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        $query = "UPDATE login SET password = '$newPassword' WHERE email = '$email'";
        $result = $mysqli->query($query);

        if ($result) {
            header('Location: logout.php');
            exit();
        } else {
            echo "Error: " . $mysqli->error;
        }
    } else {
        echo "Old password is incorrect!";
    }
}
