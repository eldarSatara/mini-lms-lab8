<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$data = json_decode(file_get_contents("data.json"), true);

if ($_GET['action'] === 'courses') {
    echo json_encode($data);
}

if ($_GET['action'] === 'enroll') {
    $course = $_POST['course'];
    echo json_encode(["message" => "Enrolled in " . $course]);
}