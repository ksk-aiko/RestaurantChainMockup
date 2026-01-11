<?php
require_once 'Employee.php';
require_once __DIR__ . '/../../Helpers/RandomGenerator.php';

class RestaurantLocation implements FileConvertible {
    public string $name;
    public string $address;
    public string $city;
    public string $state;
    public string $zipCode;
    public array $employees;
    public bool $isOpen;

    public function __construct() {
        $data = RandomGenerator::restaurantLocation();
        $this->name = $data['name'];
        $this->address = $data['address'];
        $this->city = $data['city'];
        $this->state = $data['state'];
        $this->zipCode = $data['zipCode'];
        $this->isOpen = $data['isOpen'];
        
        // ランダムな従業員数（2〜5人）を生成
        $employeeCount = rand(2, 5);
        $this->employees = [];
        for ($i = 0; $i < $employeeCount; $i++) {
            $this->employees[] = new Employee();
        }
    }

    public function toHTML(): string {
        $html = "<h3>{$this->name}</h3><ul>";
        foreach ($this->employees as $e) {
            $html .= $e->toHTML();
        }
        return $html . "</ul>";
    }

    public function toString(): string { return $this->name; }
    public function toMarkdown(): string { return "## {$this->name}"; }
    public function toArray(): array { return get_object_vars($this); }
}
