<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

require_once "factory/CourseFactory.php";

$data = json_decode(file_get_contents("data.json"), true);

if (isset($_GET['action']) && $_GET['action'] === 'courses') {
    $courses = [];

    foreach ($data as $courseData) {
        $courseObj = CourseFactory::createCourse($courseData);

        $courses[] = [
            "title" => $courseObj->getTitle(),
            "structure" => $courseObj->display()
        ];
    }

    echo json_encode($courses);
}

if (isset($_GET['action']) && $_GET['action'] === 'enroll') {
    $course = $_POST['course'];
    echo json_encode(["message" => "Enrolled in " . $course]);
}