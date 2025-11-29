<?php
require 'connect.php';

function getAllFlowers()
{
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM flowers ORDER BY id ASC");
    return $stmt->fetchAll();
}

function getFlowerById($id)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM flowers WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function renderFlowersForGuest($flowers)
{
    echo '<div class="flowers-list">';
    foreach ($flowers as $flower) {
        echo '<article class="flower-item">';
        echo '<h2>' . htmlspecialchars($flower['name']) . '</h2>';
        echo '<img src="images/' . htmlspecialchars($flower['image']) . '" alt="' . htmlspecialchars($flower['name']) . '" style="max-width:300px;">';
        echo '<p>' . htmlspecialchars($flower['description']) . '</p>';
        echo '</article>';
    }
    echo '</div>';
}

function renderFlowersForAdmin($flowers)
{
    echo '<table border="1" cellpadding="8" cellspacing="0">';
    echo '<tr>
            <th>ID</th>
            <th>Tên hoa</th>
            <th>Mô tả</th>
            <th>Ảnh</th>
            <th>Hành động</th>
          </tr>';
    foreach ($flowers as $flower) {
        echo '<tr>';
        echo '<td>' . $flower['id'] . '</td>';
        echo '<td>' . htmlspecialchars($flower['name']) . '</td>';
        echo '<td>' . htmlspecialchars($flower['description']) . '</td>';
        echo '<td><img src="images/' . htmlspecialchars($flower['image']) . '" alt="' . htmlspecialchars($flower['name']) . '" style="max-width:120px;"></td>';
        echo '<td>
                <a href="admin.php?action=edit&id=' . $flower['id'] . '">Sửa</a> |
                <a href="admin.php?action=delete&id=' . $flower['id'] . '">Xóa</a>
              </td>';
        echo '</tr>';
    }
    echo '</table>';
}
