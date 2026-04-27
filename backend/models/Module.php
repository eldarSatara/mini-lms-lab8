<?php
require_once "CourseComponent.php";

class Module implements CourseComponent {
    private $title;
    private $lessons = [];

    public function __construct($title) {
        $this->title = $title;
    }

    public function add(CourseComponent $component) {
        $this->lessons[] = $component;
    }

    public function getTitle() {
        return $this->title;
    }

    public function display($indent = 0) {
        $output = str_repeat("-", $indent) . $this->title . "\n";
        foreach ($this->lessons as $lesson) {
            $output .= $lesson->display($indent + 2) . "\n";
        }
        return $output;
    }
}

?>
