<?php // namespace Profile;

require_once('ProfileData.php');
require_once('BaseProfileACT.php');

class ProfileACT extends BaseProfileACT {
    
    public $data;

    public function __construct() {
        parent::__construct();
        $this->data = new ProfileData();
    }
    
    public function __destruct() {
    
    }
    
    // CUSTOM API CODE GOES HERE
    
}

?>    
    