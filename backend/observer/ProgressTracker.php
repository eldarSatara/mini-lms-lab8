<?php
require_once "Observer.php";

class ProgressTracker implements Observer {

    private static $progress = [];

    public function update($event, $data) {
        if ($event === "enrolled") {
            self::$progress[] = [
                "course" => $data['course'],
                "progress" => 0
            ];
        }
    }

    public function getProgress() {
        return self::$progress;
    }
}