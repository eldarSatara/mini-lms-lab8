<?php

class EventManager {

    private $observers = [];

    public function subscribe(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function notify($event, $data) {
        foreach ($this->observers as $observer) {
            $observer->update($event, $data);
        }
    }
}