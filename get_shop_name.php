<?php
require 'db_connect.php';
include 'config_session.php';
//make sure user is logged in
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

$query = "SELECT shopname FROM shop_name WHERE shopname = :shopname";
$stmt = $pdo->prepare($query);
$stmt->execute(['shopname' => $_GET['shopname']]);

$shopname = $stmt->fetchColumn();

return $shopname;

} else {
 echo "User is not logged in.";
}

?>
