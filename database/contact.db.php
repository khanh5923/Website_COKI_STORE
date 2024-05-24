<?php
include '../database/connect.php';
include '../database/fnc.db.php';

$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$email = $_POST['email'];
$message = htmlspecialchars($_POST['mess'], ENT_QUOTES, 'UTF-8');
$phone = $_POST['phone'];

$name = filter_input_data($name);
$phone = filter_input_data($phone);
$message = filter_input_data($message);
$email = filter_input_data($email);

if(!invalidEmail($email)){
    if (!checkSensitiveKeywords($name) && !checkSensitiveKeywords($email) && !checkSensitiveKeywords($phone) && !checkSensitiveKeywords($message)) {
        if (!invalidPhone($phone)) {
            // echo '<script>alert("OK")</script>';
            echo '<script>alert("Nhập đúng số điện thoại")</script>';
        } else {
            $sql = "INSERT INTO contact (fullname, email, phone_number, note) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($connect, $sql);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $phone, $message);
                $result = mysqli_stmt_execute($stmt);

                if ($result) {
                    $response = true;
                } else {
                    $response = false;
                }
                mysqli_stmt_close($stmt);
            }
            // echo 'Cảm ơn đã liên hệ chúng tôi';
            echo '<script>alert("Cảm ơn đã liên hệ chúng tôi"); setTimeout(function(){window.location.href="../include/product.php";},1000)</script>';
        }
    } else {
            echo '<script>alert("Không được có các ký tự đặc biệt")</script>';
    }
}else{
    echo '<script>alert("Phải nhập đúng Email")</script>';
}


// mysqli_close($connect);
// header('Location: ../include/contact.php');
// exit();
