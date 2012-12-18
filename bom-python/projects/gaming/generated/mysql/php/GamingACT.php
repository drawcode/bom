<?php // namespace Gaming;

require_once('GamingData.php');
require_once('BaseGamingACT.php');

class GamingACT extends BaseGamingACT {
    
    public $data;

    public function __construct() {
        parent::__construct();
        $this->data = new GamingData();
    }
    
    public function __destruct() {
    
    }
    
    // CUSTOM API CODE GOES HERE
    
}

?>    
    