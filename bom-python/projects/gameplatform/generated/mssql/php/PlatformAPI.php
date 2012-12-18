<?php // namespace Platform;

require_once('PlatformACT.php');
require_once('BasePlatformAPI.php');

class PlatformAPI extends BasePlatformAPI {
    
    public $act;

    public function __construct() {
        parent::__construct();
        $this->act = new PlatformACT();
    }
    
    public function __destruct() {
    
    }
    
    // CUSTOM API CODE GOES HERE
    
}

?>    
    