<?php // namespace Gaming;

require_once('GamingACT.php');
require_once('BaseGamingAPI.php');

class GamingAPI extends BaseGamingAPI {
    
    public $act;

    public function __construct() {
        parent::__construct();
        $this->act = new GamingACT();
    }
    
    public function __destruct() {
    
    }
    
    // CUSTOM API CODE GOES HERE
    
}

?>    
    