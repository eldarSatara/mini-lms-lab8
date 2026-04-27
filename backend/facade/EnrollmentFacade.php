<?php

require_once __DIR__ . "/../observer/EventManager.php";
require_once __DIR__ . "/../observer/EnrollmentLogger.php";
require_once __DIR__ . "/../observer/ProgressTracker.php";

class EnrollmentFacade {

    private $eventManager;
    private $progressTracker;

    public function __construct() {
        $this->eventManager = new EventManager();

        $this->progressTracker = new ProgressTracker();

        // attach observers
        $this->eventManager->subscribe(new EnrollmentLogger());
        $this->eventManager->subscribe($this->progressTracker);
    }

    public function enroll($courseName) {

        // simulate persistence (you already started this earlier)
        $this->eventManager->notify("enrolled", [
            "course" => $courseName
        ]);

        return [
            "message" => "Enrolled in " . $courseName,
            "progress" => "initialized"
        ];
    }

    public function getProgress() {
        return $this->progressTracker->getProgress();
    }
}