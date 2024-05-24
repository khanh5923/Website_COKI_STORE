<?php
error_reporting(0);
ini_set('display_errors', 0);
?>
<?php 
    include "../database/connect.php";

    session_start();
    function showProduct($connection){
        $total_Last = 0;
        $total_Qnt = 0;
        if($_SESSION['myCart'] > 0){
            foreach($_SESSION['myCart'] as $key=>$val){
                $total_Qnt += $val['productQnt'];
            }
        }
        echo '
            <div class="payment_body-cart">
                <div class="payment_body-cart-header">Shopping Cart</div>
                <div class="payment_body-cart-qnt">'.$total_Qnt.'</div>
            </div>
            ';
        echo '<div class="payment_body-item">';

        if(isset($_SESSION['myCart']) && is_array($_SESSION['myCart']) && count($_SESSION['myCart']) > 0){
            foreach($_SESSION['myCart'] as $key=>$val){
                $query = $connection->query("SELECT * FROM product WHERE product_id='$key'")->fetch_array();
                $total = $query['discount']*$val['productQnt'];
                $total_Last += $total;
                echo '
                <div class="payment_body-item__detail">
                    <div class="payment__detail-text">
                        '.$query['title'].'<br> <span>'.$query['discount'].' x '.$val['productQnt'].'</span>
                    </div>
                    <div class="payment__detail-money">
                        '.$total.' đ
                    </div>
                </div>
                ';
            }
            echo '</div>';
            echo '
            <div class="payment_body-item__detail payment__total" style="border: none">
                <div class="payment__detail-text total">Subtotal</div>
                <div class="payment__detail-total">'.$total_Last.'</div>
            </div>
            ';

            echo '
            <div class="payment_body_sales">
                <input type="text" placeholder="Discount code or gift card">
                <input type="button" value="Apply" id="btn_payment-sale">
            </div>';
        }
    }

    function validate_input($input){
        // Kiểm tra xem dữ liệu đầu vào có tồn tại không
        if ($input <> '') {
            // Kiểm tra xem dữ liệu có chứa ký tự đặc biệt hay không
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $input)) { // Nếu dữ liệu chứa ký tự đặc biệt, trả về false
                return 1;
            } else { // Nếu dữ liệu hợp lệ, trả về true
                return 2;
            }
        } else { // Nếu dữ liệu không tồn tại, trả về false
            return 0;
        }
    }
    function addProduct($connection){
        // $i = define('FILTER_SANITIZE_STRING', 513);// test
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('H:i d/m/Y');

        $name = $_POST['namekh'];
        $email = $_POST['emailkh'];
        $phone = $_POST['sdtkh'];
        $address = $_POST['addresskh'];
        //$address = htmlspecialchars($address, ENT_QUOTES, 'UTF-8'); // chống XSS 
        $note = $_POST['notekh'];
        $note = htmlspecialchars($note, ENT_QUOTES, 'UTF-8'); // chống XSS
    // $input_value = filter_input(INPUT_GET, 'note', FILTER_SANITIZE_STRING); test
    // $note = filter_var($note, FILTER_SANITIZE_STRING);
        //$note = mysqli_real_escape_string($connection, $note); // Chống SQL injection
        $qntP = $_POST['qntP'];
        $money = $_POST['totalMoneyP'];
// fixed
        if(isset($_POST['methodkh'])) $method = $_POST['methodkh'];
        else $method = 'Cash';
// test
        // if($note <> ''){
        //     echo '<script>alert("'.$note.'");</script>';
        // }else echo '<script>alert("NO");</script>';
//
        if (validate_input($address) == 2){
            $query = $connection->query("INSERT INTO orders(fullname,email,phone_number,address,order_date,quantity,price,note,payment_method) VALUES('$name','$email','$phone','$address','$date','$qntP','$money','$note','$method')");
            // if($query == true) echo '<script>showPaymentSuccess();</script>';
            if($query == true) echo '<script>alert("Bạn đã đặt hàng thành công"); setTimeout(function(){window.location.href="../include/product.php";},3000)</script>';
            else echo "<p style='color:red'>Thất bại !!!!!</p>";

            $order_id = mysqli_insert_id($connection);//lấy id vừa nhập

            if(isset($_SESSION['myCart']) > 0){
                foreach($_SESSION['myCart'] as $key=>$val){
                    $row = $connection->query("SELECT * FROM product WHERE product_id='$key'")->fetch_array();
                    $productQnt = $val['productQnt'];
                    $price = $productQnt * $row['price'];
                    $namesp = $row['title'];

                    $connection->query("INSERT INTO giaodich(order_id,title, price, quantity,date_giaodich,order_status,product_id) VALUES ('$order_id','$namesp','$price','$productQnt','$date','2','$key')");
                }
            }
            unset($_SESSION['myCart']);
            // echo '<script>alert("OK");</script>';
        } elseif(validate_input($address) == 1) {
            echo '<script>alert("Địa chỉ không được chứa kí hiệu đặc biệt <, >, $,..");</script>';
        } else{
            echo '<script>alert("Vui lòng điền địa chỉ");</script>';
        }
    }
?>

<?php 
    if(isset($_POST['action'])){
        $action = $_POST['action'];
        if($action == 'showProduct') showProduct($connect);
        elseif($action == 'addProduct') addProduct($connect);
    }

?>