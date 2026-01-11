<?php
require_once 'User.php';
require_once __DIR__ . '/../../Helpers/RandomGenerator.php';

class Employee extends User {
    public string $jobTitle;
    public float $salary;
    public DateTime $startDate;
    public array $awards;

    public function __construct() {
        parent::__construct();
        $data = RandomGenerator::employee();
        $this->jobTitle = $data['jobTitle'];
        $this->salary = $data['salary'];
        $this->startDate = $data['startDate'];
        $this->awards = $data['awards'];
    }

    public static function RandomGenerator(): self {
        return new self();
    }

    public function toHTML(): string {
        return "<li>{$this->jobTitle} - {$this->salary} USD</li>";
    }
}
