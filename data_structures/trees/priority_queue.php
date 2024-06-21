<?php

class Task
{
    public $name;
    public $priority;

    public function __construct($name, $priority) {
        $this->name = $name;
        $this->priority = $priority;
    }
}

$taskQueue = new SplPriorityQueue();

$taskQueue->insert(new Task("Send report", 3), 3);
$taskQueue->insert(new Task("Reply to emails", 2), 2);
$taskQueue->insert(new Task("Urgent meeting", 5), 5);
$taskQueue->insert(new Task("Update website", 1), 1);

while (!$taskQueue->isEmpty()) {
    $task = $taskQueue->extract();
    echo "- " . $task->name . " (Priority: " . $task->priority . ")\n";
}