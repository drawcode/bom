<?php //namespace Platform;

require_once('BaseMeta.php');

//include 'PlatformACT.php';
//include 'PlatformData.php';

//use ent;

class VideoResult {

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
class Video extends BaseMeta { 

    private static $instance; 

    public static function Instance() { 
    
        if(!self::$instance) { 
            self::$instance = new self(); 
        } 
        
        return self::$instance; 
    
    }
    
    public $third_party_oembed;
    public $url;
    public $third_party_data;
    public $third_party_url;
    public $third_party_id;
    public $content_type;
    public $external_id;

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


