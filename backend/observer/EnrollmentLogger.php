<?php
require_once "Observer.php";

class EnrollmentLogger implements Observer {

    public function update($event, $data) {
        if ($event === "enrolled") {
            error_log("LOG: User enrolled in " . $data['course']);
        }
    }
}