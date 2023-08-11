<?php
include '../user/config.php';
session_start();
$isLoggedIn = isset($_SESSION['username']);

$product_id = $_GET['id'];
$sql = "SELECT * FROM product WHERE product_id = $product_id";
$result = mysqli_query($conn, $sql);
$product_row = mysqli_fetch_assoc($result);
$product_price = $product_row['price'];

if (isset($_POST['buy'])) {
    if (!$isLoggedIn) {
        $error_msg_auth = "Please log in first!";
    } else {
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($row['balance'] < $product_price) {
            $error_msg_amount = "Insufficient balance.";
        } else {
            $_SESSION['balance'] = $row['balance'] - $product_price;
            $sql = "UPDATE users SET balance = '{$_SESSION['balance']}' WHERE username='{$_SESSION['username']}'";
            mysqli_query($conn, $sql);
            $success_msg = "Product successfully bought!";
        }
    }
}
?>