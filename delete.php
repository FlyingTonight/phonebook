<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['DELETE'])) {
    $contact_id = $_POST['contact_id'];
    $statement = $pdo->prepare("DELETE FROM contacts WHERE id = ?");
    $statement->execute([$contact_id]);
}
$_SESSION['contact-deleted'] = 'Kонтакт успешно удалено ';
header("location:index.php");
?>