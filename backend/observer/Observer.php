<?php

interface Observer {
    public function update($event, $data);
}