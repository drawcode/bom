<?php //namespace Gaming;

require_once('BaseMeta.php');

//include 'GamingACT.php';
//include 'GamingData.php';

//use ent;

class GameLiveRecentQueueResult {

    public $page = 1;
    public $page_size = 10;
    public $total_rows = 0;
    public $total_pages = 1;
    public $data;

    public function __construct() {
        $this->total_pages = ceil($this->total_rows / $this->page_size);
        $this->data = array();
    }

}
class GameLiveRecentQueue extends BaseMeta { 

    private static $instance; 

    public static function Instance() { 
    
        if(!self::$instance) { 
            self::$instance = new self(); 
        } 
        
        return self::$instance; 
    
    }
    
    public $username;
    public $data;
    public $profile_id;
    public $game;
    public $game_id;
    public $type;

    public function __construct() {
        
        $this->reset();
    }
    
    public function reset() {
        parent::reset();
        $this->display_name = "b";
    }
    
    public function __destruct() {
    
    }
        
    public function set_object_vars(array $vars, $clear) {
        $has = get_object_vars($this);
        foreach ($has as $name => $oldValue) {
            if(isset($vars[$name])) {
                $this->$name = $vars[$name];
            }
            else {
                if($clear) {
                    $this->$name = NULL;
                }
            }
        }
    }
    
    public function from_dict(array $vars) {
        $this->set_object_vars($vars, TRUE);
    }
    
    public function from_dict_append_updated(array $vars) {
        $this->set_object_vars($vars, FALSE);
    }
    
    public function to_dict() {
        return get_object_vars($this);
    }
  
}

?> 


