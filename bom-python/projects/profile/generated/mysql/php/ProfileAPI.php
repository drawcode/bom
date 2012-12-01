<?php // namespace Profile;

require_once('ProfileACT.php');
require_once('BaseProfileAPI.php');

class ProfileAPI extends BaseProfileAPI {
    
    public $act;

    public function __construct() {
        parent::__construct();
        $this->act = new ProfileACT();
    }
    
    public function __destruct() {
    
    }
    
    // CUSTOM API CODE GOES HERE
    
}

?>    
    