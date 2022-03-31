<?php
    echo("<h1>Thông Tin Thành Viên Đăng kí</h1>");
    $name = $_POST['name'];
    $date = $_POST['age'];
    $sex = $_POST['sex'];
    $grade = $_POST['grade'];
    $reasons = $_POST['reason'];
    echo("<ul>");
    echo("<li>Tên sinh viên: $name</li>");
    echo("<li>Ngày Sinh: $date</li>");
    if ($sex == 0){
        echo("<li>Giới Tính: Nữ</li>");
    }else if ($sex == 1){
        echo("<li>Giới Tính: Nam</li>");
    }else{
        echo("<li>Giới tính: không muốn tiết lộ</li>");
    }
    echo("<li>Sinh viên khóa: K$grade</li>");
    echo("<li>lý do vào clb: $reasons</li>");
    echo("</ul>");