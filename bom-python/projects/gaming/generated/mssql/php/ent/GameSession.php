<?php //namespace Gaming;

require_once('BaseMeta.php');

//include 'GamingACT.php';
//include 'GamingData.php';

//use ent;

class GameSessionResult {

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
class GameSession extends BaseMeta { 

    private static $instance; 

    public static function Instance() { 
    
        if(!self::$instance) { 
            self::$instance = new self(); 
        } 
        
        return self::$instance; 
    
    }
    
    public $network_uuid;
    public $profile_id;
    public $game_area;
    public $profile_network;
    public $profile_device;
    public $game_level;
    public $network_external_port;
    public $game_players_connected;
    public $game_state;
    public $hash;
    public $network_external_ip;
    public $profile_username;
    public $game_id;
    public $game_code;
    public $game_player_z;
    public $game_player_x;
    public $game_player_y;
    public $network_port;
    public $game_players_allowed;
    public $game_type;
    public $network_ip;
    public $network_use_nat;

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


