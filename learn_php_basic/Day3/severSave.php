<?php
// Nhận biến từ bên ngoài
    $name = $_POST['name'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $grade = $_POST['grade'];
    $myself = $_POST['myself'];
    $image = $_POST['image'];
    
    // kết nối với data base mysql với: 
    // localhost: là địa chỉ mysql, root: là tên đăng nhập, cong: là mật khẩu và member: là database
    $connection = mysqli_connect('localhost','root','cong','member');
    // chuyển kiểu dữ liệu về utf8
    mysqli_set_charset($connection,'utf8');
    
    // truy vấn insert như bình thường
    $sql = "INSERT INTO `membership`(`name`, `age`, `sex`, `grade`, `myself`, `image`)
    VALUES ('$name',$age,$sex,$grade,'$myself','$image')";

    // gửi dữ liệu lên data base
    mysqli_query($connection, $sql);

    // inra lỗi của mysql
    $loi = mysqli_error($connection);
    echo $loi;


    // đóng database
    mysqli_close($connection);

    echo "<h3>đã đẩy dữ liệu thành công<h3>";
    echo "<a href='./form_register.html'>quay lại trang đăng kí</a>";
    echo "<br><a href='./view_all_member.php'>vào trang thành viên</a>";