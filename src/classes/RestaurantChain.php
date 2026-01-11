<?php
require_once 'Company.php';
require_once 'RestaurantLocation.php';
require_once __DIR__ . '/../../Helpers/RandomGenerator.php';

class RestaurantChain extends Company {
    public int $chainId;
    public array $restaurantLocations;
    public string $cuisineType;
    public int $numberOfLocations;
    public bool $hasDriveThru;
    public int $yearFounded;
    public string $parentCompany;

    public function __construct() {
        parent::__construct();
        $data = RandomGenerator::restaurantChain();
        $this->chainId = $data['chainId'];
        $this->cuisineType = $data['cuisineType'];
        $this->numberOfLocations = $data['numberOfLocations'];
        $this->hasDriveThru = $data['hasDriveThru'];
        $this->yearFounded = $data['yearFounded'];
        $this->parentCompany = $data['parentCompany'];
        
        // ランダムな店舗数（2〜5店舗）を生成
        $locationCount = rand(2, 5);
        $this->restaurantLocations = [];
        for ($i = 0; $i < $locationCount; $i++) {
            $this->restaurantLocations[] = new RestaurantLocation();
        }
    }

    public function toHTML(): string {
        $html = parent::toHTML();
        foreach ($this->restaurantLocations as $loc) {
            $html .= $loc->toHTML();
        }
        return $html;
    }
}
