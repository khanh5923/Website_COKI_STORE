<?php include_once 'header.php'; ?>

<div id="product_detail-content">
    <!-- first block - product block -->
    <div id="product-block">
        <!-- sản phẩm Chi tiết ở đây -->

    </div>
    <!-- end of first block -->

    <!-- second block - overall review -->
    <div id="overview-comment-block" style="text-align: center; ">
        <!-- from our customer -->
        <h2 id="heading2">From our customers</h2>

        <!-- overall rating -->
        <div id="overall-rating">
            <!-- left division of overall rating -->
            <div id="left-div-overall">
                <!-- top sub div -->
                <div style="display: flex; align-items:end;">
                    <?php
                    require_once '../database/fnc.db.php';
                    require_once '../database/connect.php';
                    loadStar($connect, 5, 0);
                    ?>
                    <p style="margin: 0px; margin-left: 5px;">5.00 out of 5</p>
                </div>
                <!-- bottom sub div -->
                <div style="margin: 0px; text-align: left;">
                    Based on 46 reviews
                </div>
            </div>

            <!-- middle vertical line -->
            <div id="vertical-line"></div>

            <!-- right division -->
            <div id="right-div-overall" style="margin-left: 40px;">
                <!-- 5 stars -->
                <div class="quantity-star-rating-div">
                    <?php loadStar($connect, 5, 0) ?>

                    <div class="showing-star-rating"></div>

                    <p class="quantity-review">134</p>
                </div>
                <!-- 4 stars -->
                <div class="quantity-star-rating-div">
                    <?php loadStar($connect, 4, 1) ?>

                    <div class="showing-star-rating" style="background-color: #EFEFEF;"></div>

                    <p class="quantity-review">0</p>
                </div>
                <!-- 3 stars -->
                <div class="quantity-star-rating-div">
                    <?php loadStar($connect, 3, 2) ?>

                    <div class="showing-star-rating" style="background-color: #EFEFEF;"></div>

                    <p class="quantity-review">0</p>
                </div>
                <!-- 2 stars -->
                <div class="quantity-star-rating-div">
                    <?php loadStar($connect, 2, 3) ?>

                    <div class="showing-star-rating" style="background-color: #EFEFEF;"></div>

                    <p class="quantity-review">0</p>
                </div>
                <!-- 1 stars -->
                <div class="quantity-star-rating-div">
                    <?php loadStar($connect, 1, 4) ?>

                    <div class="showing-star-rating" style="background-color: #EFEFEF;"></div>

                    <p class="quantity-review">0</p>
                </div>
                <!-- 0 stars -->
                <div class="quantity-star-rating-div">
                    <?php loadStar($connect, 0, 5) ?>

                    <div class="showing-star-rating" style="background-color: #EFEFEF;"></div>

                    <p class="quantity-review">0</p>
                </div>
            </div>
        </div>
        <hr>
        <div id="double-recognition-img">
            <img src="https://judgeme-public-images.imgix.net/judgeme/medals-v2/auth/diamond.svg?auto=format" alt="" class="recog-img">
            <img src="https://judgeme-public-images.imgix.net/judgeme/medals-v2/tran/gold.svg?auto=format" alt="" class="recog-img">
        </div>
        <hr>
    </div>
    <!-- end of second block -->
    <!-- binh luan -->
    <div id="comment-section" style="text-align: center; margin-bottom: 20px;">
        <h2 style="text-align:center">Bình luận</h2>
        <textarea id="comment" rows="5" placeholder="Nhập bình luận của bạn" style="width: 80%; margin: 0px 10px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; resize: vertical;"></textarea><br>
        <button style="background-color: #F55C85; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;" onclick="addComment()">Gửi</button>
    </div>

    <div id="comments-container" style="margin: 0 60px;"></div>

    <style>
        .comment {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .comment p {
            margin: 0;
        }

        .comment small {
            color: #888;
        }
    </style>
    <!-- <hr> -->

</div>
<script>
    // Mảng lưu trữ các bình luận
    var comments = [];

    // Hàm thêm bình luận mới
    function addComment() {
        var commentInput = document.getElementById("comment").value;
        if (commentInput.trim() !== "") {
            var comment = {
                text: commentInput,
                timestamp: new Date().toLocaleString()
            };
            comments.push(comment);
            displayComments();
            document.getElementById("comment").value = ""; // Xóa nội dung trong ô nhập
        } else {
            alert("Please enter a comment.");
        }
    }

    // Hàm hiển thị các bình luận
    function displayComments() {
        var commentsContainer = document.getElementById("comments-container");
        commentsContainer.innerHTML = ""; // Xóa nội dung cũ
// Code thuần
        // comments.forEach(function(comment) {
        //     var commentElement = document.createElement("div");
        //     commentElement.classList.add("comment");
        //     commentElement.innerHTML = "<p>" + comment.text + "</p><small>Posted at " + comment.timestamp + "</small>";
        //     commentsContainer.appendChild(commentElement);
        // });
// Phòng chống XSS
        comments.forEach(function(comment) {
            var commentElement = document.createElement("div");
            commentElement.classList.add("comment");
            var commentText = document.createElement("p");
            commentText.textContent = comment.text; // Sử dụng textContent để gán nội dung thay vì innerHTML
            var timestamp = document.createElement("small");
            timestamp.textContent = "Posted at " + comment.timestamp;

            commentElement.appendChild(commentText);
            commentElement.appendChild(timestamp);
            commentsContainer.appendChild(commentElement);
        });
    }
</script>

<script src="../assets/js/addsession_myCart.js"></script>
<script>
    // Hàm tự động cập nhập chi tiết sản phẩm
    $(document).ready(function() {
        $("#product-block").empty();
        var name = localStorage.getItem("nameProductDetail")
        $.ajax({
            url: `../database/addDetail.php`,
            type: "GET",
            data: {
                nameDetail: name,
            },
            success: function(respond) {
                $("#product-block").append(respond);
            },
        });
    })
</script>
<?php include_once 'footer.php'; ?>