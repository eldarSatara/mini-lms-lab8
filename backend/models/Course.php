<?php
require_once __DIR__ . "/CourseComponent.php";

class Course implements CourseComponent {
    private $title;
    private $modules = [];

    public function __construct($title) {
        $this->title = $title;
    }

    public function add(CourseComponent $component) {
        $this->modules[] = $component;
    }

    public function getTitle() {
        return $this->title;
    }

    public function display($indent = 0) {
        $output = $this->title . "\n";
        foreach ($this->modules as $module) {
            $output .= $module->display(2) . "\n";
        }
        return $output;
    }
}