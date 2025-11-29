<?php
session_start();
require 'functions.php';
global $pdo;

$isAdmin = true;
if (!$isAdmin) {
    header('Location: index.php');
    exit;
}

$action = $_GET['action'] ?? '';
$id     = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Thêm
if ($action === 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $image = $_POST['image'] ?? '';
    $stmt = $pdo->prepare("INSERT INTO flowers (name, description, image) VALUES (?, ?, ?)");
    $stmt->execute([$name, $description, $image]);
}

// Sửa
if ($action === 'edit' && $id > 0 && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $image = $_POST['image'] ?? '';
    $stmt = $pdo->prepare("UPDATE flowers SET name = ?, description = ?, image = ? WHERE id = ?");
    $stmt->execute([$name, $description, $image, $id]);
}

// Xóa
if ($action === 'delete' && $id > 0) {
    $stmt = $pdo->prepare("DELETE FROM flowers WHERE id = ?");
    $stmt->execute([$id]);
}

$flowers = getAllFlowers();
$editingFlower = ($action === 'edit' && $id > 0) ? getFlowerById($id) : null;
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản trị hoa (PDO)</title>
</head>

<body>
    <h1>Quản trị danh sách hoa (PDO)</h1>
    <p><a href="index.php">Về trang khách</a></p>

    <h2><?php echo $editingFlower ? 'Sửa hoa' : 'Thêm hoa mới'; ?></h2>
    <form method="post" action="admin.php?action=<?php echo $editingFlower ? 'edit&id=' . $editingFlower['id'] : 'add'; ?>">
        <p>Tên hoa: <input type="text" name="name" value="<?php echo $editingFlower['name'] ?? ''; ?>" required></p>
        <p>Mô tả: <br>
            <textarea name="description" rows="3" cols="60" required><?php echo $editingFlower['description'] ?? ''; ?></textarea>
        </p>
        <p>Tên file ảnh (trong images/):
            <input type="text" name="image" value="<?php echo $editingFlower['image'] ?? ''; ?>" required>
        </p>
        <p><button type="submit"><?php echo $editingFlower ? 'Cập nhật' : 'Thêm'; ?></button></p>
    </form>

    <h2>Danh sách hoa</h2>
    <?php renderFlowersForAdmin($flowers); ?>
</body>

</html>