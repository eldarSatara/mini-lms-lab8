<?php
require_once __DIR__ . "/../models/Course.php";
require_once __DIR__ . "/../models/Module.php";
require_once __DIR__ . "/../models/Lesson.php";

class CourseFactory {

    public static function createCourse($data) {
        $course = new Course($data['title']);

        foreach ($data['modules'] as $moduleData) {
            $module = new Module($moduleData['title']);

            foreach ($moduleData['lessons'] as $lessonData) {
                $lesson = new Lesson($lessonData['title']);
                $module->add($lesson);
            }

            $course->add($module);
        }

        return $course;
    }
}