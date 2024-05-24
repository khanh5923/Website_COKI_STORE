<?php include_once 'header.php';
require_once '../database/connect.php'; ?>

<form method="post">
    <div class="restore_container">

        <div class="restore-contact-header">
            <h5>Login Staff</h5>
        </div>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Your email" required>
        <label for="email">Code staff</label>
        <input type="text" name="code" placeholder="Enter the code we sent" required>
        <label for="email">Password</label>
        <input type="text" name="pass" placeholder="Enter password" required>
        <div class="text-container" align="center">
            <button class="restore_submit-btn" type="submit" name="submit">Submit</button>
            <span>or <a href="login.php">Cancel</a></span>
        </div>
    </div>
</form>
<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $code = $_POST['code'];
    $pass = $_POST['pass'];
    
    $sql = "SELECT * FROM admin WHERE ad_email = '$email' and ad_password = '$pass' and codeAdmin = '$code'";
    $result = mysqli_query($connect, $sql);
    if (!$result) {
        echo '<p style="color:red;text-align:center;font-size:22px">Email do not match!</p>';
    } else {
        $row = mysqli_fetch_array($result);
        if ($code !== $row['codeAdmin']) {
            echo '<p style="color:red;text-align:center;font-size:22px"> Wrong code!</p>';
        } else {
            $newCode = substr(md5(uniqid()), 0, 5);
            // $pwdHash = password_hash($pwd, PASSWORD_DEFAULT);
            $updateQuery = "UPDATE `admin` SET `codeAdmin`='$newCode' WHERE ad_email = '$email'";
            mysqli_query($connect, $updateQuery);
            // header("Location: http://localhost:8080/myProject/Coki_1155/Coki_1812/Coki/admin/dashboard.php");
            echo "<script>window.location.href='http://localhost:8080/myProject/Coki_1155/Coki_1812/Coki/admin/dashboard.php';</script>";
            exit();
        }
    }
}

?>