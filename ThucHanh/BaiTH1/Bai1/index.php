<?php
require 'functions.php';
$flowers = getAllFlowers();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách các loài hoa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 0 auto;
        }

        .flower-item {
            margin-bottom: 30px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;
        }

        .flower-item img {
            display: block;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <h1>Loài hoa tuyệt đẹp dịp xuân hè</h1>
    <?php renderFlowersForGuest($flowers); ?>
    <p><a href="admin.php">Trang quản trị</a></p>
</body>

</html>