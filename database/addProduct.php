<?php 
    include "../database/connect.php";
?>

<?php 
    // Hàm hiện danh sách sản phẩm
    function showCategories($connect){
        $query_cate = "SELECT * FROM category";
        $result = mysqli_query($connect, $query_cate);
        while($row = mysqli_fetch_array($result)){
            
            echo "
                <li class='head_cate'>
                    <a style='cursor:pointer'>
                        <img src='../assets/img/$row[2]' width='40px' height='auto'>
                        <p id_cate='$row[0]'>$row[1]</p>
                    </a>
                </li>
            ";
        }
    }
    
    // Hàm hiện sản phẩm theo danh mục
    function showProduct($connect){
        $Id_cate = $_POST['category'];
        $query_product = "SELECT * FROM product WHERE category_id =$Id_cate";
        $result = mysqli_query($connect, $query_product);
        while($row = mysqli_fetch_array($result)){
            echo "
                <div class='product-item'>
                    <a>
                        <img src='../assets/img/$row[5]' alt=''>
                        <div class='product-detail'>
                            <p class='product-name'>$row[2]</p>
                            <p class='product-price'>$row[4]<del style='color:#8C8B8B; margin-left: 6px;'>$row[3] đ</del>
                            </p>
                        </div>
                    </a>
                    <input type='button' class='product-btn-add-to-cart' value='Add to Cart' id='btnATC'>
                    <input type='number' style='width:80px; height:28px' value='1' id='productQnt'>
                    <input type='hidden' id='productID' value='$row[0]'>
                    <input type='hidden' id='productName' value='$row[2]'>
                </div>
            ";
        }
    }

    // Hàm hiện tất cả sản phẩm
    function showAllP($connect){
        if((isset($_POST['start'])) || $_POST['start'] > 0){
            $start = mysqli_real_escape_string($connect, $_POST['start']);
            $query_Allproduct = "SELECT DISTINCT * FROM product LIMIT $start, 6";
            $result = mysqli_query($connect, $query_Allproduct);
            while($row = mysqli_fetch_array($result)){
                echo "
                    <div class='product-item'>
                        <a href='../include/product_detail.php?id=$row[0]'>
                            <img src='../assets/img/$row[5]' alt=''>
                            <div class='product-detail'>
                                <p class='product-name'>$row[2]</p>
                                <p class='product-price'>$row[4]<del style='color:#8C8B8B; margin-left: 6px;'>$row[3] đ</del>
                                </p>
                            </div>
                        </a>
                        <input type='button' class='product-btn-add-to-cart' value='Add to Cart' id='btnATC'>
                        <input type='number' style='width:80px; height:28px' value='1' id='productQnt'>
                        <input type='hidden' id='productID' value='$row[0]'>
                        <input type='hidden' id='productName' value='$row[2]'>
                    </div>
                ";
            }
        }
    }

// Hàm tìm kiếm sản phẩm theo từ khóa
    // Hàm kiểm tra đầu ra
    function MaHoaDauRa($string){
        $string = str_replace("&", "&amp;", $string);
        $string = str_replace("<", "&lt;", $string);
        $string = str_replace(">", "&gt;", $string);
        $string = str_replace('"', "&quot;", $string);
        $string = str_replace("'", "&#039;", $string);
        return $string;
    }
    function search($connect){
        $keyword = $_POST['value'];
        //$keyword = htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8'); // chống XSS Cách 1
        $keyword = MaHoaDauRa($keyword); // Chống XSS Cách 2
        $query_key = "SELECT * FROM product WHERE title LIKE '%$keyword%'";
        $result = mysqli_query($connect, $query_key);
        if(mysqli_num_rows($result) >0 ){
            while($row = mysqli_fetch_array($result)){
                echo "
                <div class='product-item'>
                    <a>
                        <img src='../assets/img/$row[5]' alt=''>
                        <div class='product-detail'>
                            <p class='product-name'>$row[2]</p>
                            <p class='product-price'>$row[4]<del style='color:#8C8B8B; margin-left: 6px;'>$row[3] đ</del>
                            </p>
                        </div>
                    </a>
                    <input type='button' class='product-btn-add-to-cart' value='Add to Cart' id='btnATC'>
                    <input type='number' style='width:80px; height:28px' value='1' id='productQnt'>
                    <input type='hidden' id='productID' value='$row[0]'>
                    <input type='hidden' id='productName' value='$row[2]'>
                </div>
            ";
            }
            
        }
        else echo "Không thấy kết quả cho ".$keyword;
    }
?>

<?php 
    if(isset($_POST['action'])){
        $action = $_POST['action'];
        if($action == 'showCate') showCategories($connect);
        elseif ($action == 'showP') showProduct($connect);
        else if ($action == 'showAllP') showAllP($connect);
        else if ($action == 'search') search($connect);
        
    }
?>