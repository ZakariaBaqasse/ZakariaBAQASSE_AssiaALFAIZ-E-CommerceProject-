<?php
include_once('../includes/connectDatabase.php');
$gender = htmlspecialchars($_GET['gender']);
if(empty($gender)){
    echo 'Please select a gender';
}
$query = 'SELECT * from `categories` WHERE gender_id = ?';
$stmt = $db->prepare($query);
$stmt->execute(array($gender));
$results = $stmt->fetchAll();
$data = [];
foreach ($results as $result) {
    array_push($data, array($result['categorie_id'],$result['categorie_title']));
}
echo json_encode($data);
?>