<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

require_once "factory/CourseFactory.php";
require_once "facade/EnrollmentFacade.php";

$data = json_decode(file_get_contents(__DIR__ . "/data.json"), true);

if ($data === null) {
    echo json_encode([
        "error" => "Failed to load JSON",
        "json_error" => json_last_error_msg()
    ]);
    exit;
}

$enrollment = new EnrollmentFacade();

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
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'enroll') {

    $course = $_POST['course'];

    $result = $enrollment->enroll($course);

    echo json_encode($result);
}

if (isset($_GET['action']) && $_GET['action'] === 'progress') {

    echo json_encode($enrollment->getProgress());
}