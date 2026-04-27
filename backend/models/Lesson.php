<?php
require_once "CourseComponent.php";

class Lesson implements CourseComponent {
    private $title;

    public function __construct($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    public function display($indent = 0) {
        return str_repeat("-", $indent) . $this->title;
    }
}

?>