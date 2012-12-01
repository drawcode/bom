<?php // namespace Platform;

require_once('PlatformData.php');
require_once('BasePlatformACT.php');

class PlatformACT extends BasePlatformACT {
    
    public $data;

    public function __construct() {
        parent::__construct();
        $this->data = new PlatformData();
    }
    
    public function __destruct() {
    
    }
    
    // CUSTOM API CODE GOES HERE
    
}

?>    
    