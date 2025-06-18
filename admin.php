<?php
// Проверка авторизации
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

// Запрос к базе данных
$results = $conn->query("SELECT * FROM rsvp_responses ORDER BY response_date DESC");
?>
<table>
    <tr><th>Гость</th><th>Статус</th><th>Дата ответа</th></tr>
    <?php while ($row = $results->fetch_assoc()): ?>
    <tr>
        <td><?= $row['guest_id'] ?></td>
        <td><?= $row['attending'] ?></td>
        <td><?= $row['response_date'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>