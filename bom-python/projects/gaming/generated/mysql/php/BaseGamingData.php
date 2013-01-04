<?php // namespace Gaming;

require_once('core/data/mysql/DataProvider.php');


class BaseGamingData {

    public $data_provider;
    public $connection_string;
    
    public function __construct() {
        $this->data_provider = new DataProvider();
    }
    
    public function __destruct() {
        
    }
    
    public function log_util($key, $val) {
        echo "\r\n<!--";
        echo "\r\n";
        echo $key;
        echo "\r\n ";
        echo $val;
        echo "\r\n-->\r\n";
    }    
            
    public function CountGame(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_count_code(".
                    "in_code".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_count_name(".
                    "in_name".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameOrgId(
        $org_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_count_org_id(".
                    "in_org_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameAppId(
        $app_id
    ) {
        $parameters = array();
        $parameters['in_app_id'] = $app_id; // #"in_app_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_count_app_id(".
                    "in_app_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameOrgIdAppId(
        $org_id
        , $app_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
        $parameters['in_app_id'] = $app_id; // #"in_app_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_count_org_id_app_id(".
                    "in_org_id".
                    ", in_app_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->org_id != NULL)
                $parameters['in_org_id'] = $obj->org_id; // #"in_org_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->app_id != NULL)
                $parameters['in_app_id'] = $obj->app_id; // #"in_app_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameCode($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->org_id != NULL)
                $parameters['in_org_id'] = $obj->org_id; // #"in_org_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->app_id != NULL)
                $parameters['in_app_id'] = $obj->app_id; // #"in_app_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_set_code(".
                        "in_code".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameName($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->org_id != NULL)
                $parameters['in_org_id'] = $obj->org_id; // #"in_org_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->app_id != NULL)
                $parameters['in_app_id'] = $obj->app_id; // #"in_app_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_set_name(".
                        "in_name".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameOrgId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->org_id != NULL)
                $parameters['in_org_id'] = $obj->org_id; // #"in_org_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->app_id != NULL)
                $parameters['in_app_id'] = $obj->app_id; // #"in_app_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_set_org_id(".
                        "in_org_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameAppId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->org_id != NULL)
                $parameters['in_org_id'] = $obj->org_id; // #"in_org_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->app_id != NULL)
                $parameters['in_app_id'] = $obj->app_id; // #"in_app_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_set_app_id(".
                        "in_app_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameOrgIdAppId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->org_id != NULL)
                $parameters['in_org_id'] = $obj->org_id; // #"in_org_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->app_id != NULL)
                $parameters['in_app_id'] = $obj->app_id; // #"in_app_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_set_org_id_app_id(".
                        "in_org_id".
                        ", in_app_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_del_code(".
                    "in_code".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_del_name(".
                    "in_name".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameOrgId(
        $org_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_del_org_id(".
                    "in_org_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameAppId(
        $app_id
    ) {
        $parameters = array();
        $parameters['in_app_id'] = $app_id; // #"in_app_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_del_app_id(".
                    "in_app_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameOrgIdAppId(
        $org_id
        , $app_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
        $parameters['in_app_id'] = $app_id; // #"in_app_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_del_org_id_app_id(".
                    "in_org_id".
                    ", in_app_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameListCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_get_code(".
                    "in_code".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameListName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_get_name(".
                    "in_name".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameListOrgId(
        $org_id
    ) {
            
        $parameters = array();
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_get_org_id(".
                    "in_org_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameListAppId(
        $app_id
    ) {
            
        $parameters = array();
        $parameters['in_app_id'] =  $app_id; //#"in_app_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_get_app_id(".
                    "in_app_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameListOrgIdAppId(
        $org_id
        , $app_id
    ) {
            
        $parameters = array();
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
        $parameters['in_app_id'] =  $app_id; //#"in_app_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_get_org_id_app_id(".
                    "in_org_id".
                    ", in_app_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameCategory(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameCategoryUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameCategoryCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_count_code(".
                    "in_code".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameCategoryName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_count_name(".
                    "in_name".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameCategoryOrgId(
        $org_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_count_org_id(".
                    "in_org_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameCategoryTypeId(
        $type_id
    ) {
        $parameters = array();
        $parameters['in_type_id'] = $type_id; // #"in_type_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_count_type_id(".
                    "in_type_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameCategoryOrgIdTypeId(
        $org_id
        , $type_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
        $parameters['in_type_id'] = $type_id; // #"in_type_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_count_org_id_type_id(".
                    "in_org_id".
                    ", in_type_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameCategoryListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameCategoryUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->type_id != NULL)
                $parameters['in_type_id'] = $obj->type_id; // #"in_type_id"
            if($obj->org_id != NULL)
                $parameters['in_org_id'] = $obj->org_id; // #"in_org_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_category_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameCategoryUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameCategoryCodeOrgId(
        $code
        , $org_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_del_code_org_id(".
                    "in_code".
                    ", in_org_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameCategoryCodeOrgIdTypeId(
        $code
        , $org_id
        , $type_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
        $parameters['in_type_id'] = $type_id; // #"in_type_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_del_code_org_id_type_id(".
                    "in_code".
                    ", in_org_id".
                    ", in_type_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameCategoryList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameCategoryListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameCategoryListCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_get_code(".
                    "in_code".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameCategoryListName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_get_name(".
                    "in_name".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameCategoryListOrgId(
        $org_id
    ) {
            
        $parameters = array();
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_get_org_id(".
                    "in_org_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameCategoryListTypeId(
        $type_id
    ) {
            
        $parameters = array();
        $parameters['in_type_id'] =  $type_id; //#"in_type_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_get_type_id(".
                    "in_type_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameCategoryListOrgIdTypeId(
        $org_id
        , $type_id
    ) {
            
        $parameters = array();
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
        $parameters['in_type_id'] =  $type_id; //#"in_type_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_get_org_id_type_id(".
                    "in_org_id".
                    ", in_type_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameCategoryTree(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_tree_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameCategoryTreeUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_tree_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameCategoryTreeParentId(
        $parent_id
    ) {
        $parameters = array();
        $parameters['in_parent_id'] = $parent_id; // #"in_parent_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_tree_count_parent_id(".
                    "in_parent_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameCategoryTreeCategoryId(
        $category_id
    ) {
        $parameters = array();
        $parameters['in_category_id'] = $category_id; // #"in_category_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_tree_count_category_id(".
                    "in_category_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameCategoryTreeParentIdCategoryId(
        $parent_id
        , $category_id
    ) {
        $parameters = array();
        $parameters['in_parent_id'] = $parent_id; // #"in_parent_id"
        $parameters['in_category_id'] = $category_id; // #"in_category_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_tree_count_parent_id_category_id(".
                    "in_parent_id".
                    ", in_category_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameCategoryTreeListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_tree_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameCategoryTreeUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->parent_id != NULL)
                $parameters['in_parent_id'] = $obj->parent_id; // #"in_parent_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->category_id != NULL)
                $parameters['in_category_id'] = $obj->category_id; // #"in_category_id"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_category_tree_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameCategoryTreeUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_tree_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameCategoryTreeParentId(
        $parent_id
    ) {
        $parameters = array();
        $parameters['in_parent_id'] = $parent_id; // #"in_parent_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_tree_del_parent_id(".
                    "in_parent_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameCategoryTreeCategoryId(
        $category_id
    ) {
        $parameters = array();
        $parameters['in_category_id'] = $category_id; // #"in_category_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_tree_del_category_id(".
                    "in_category_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameCategoryTreeParentIdCategoryId(
        $parent_id
        , $category_id
    ) {
        $parameters = array();
        $parameters['in_parent_id'] = $parent_id; // #"in_parent_id"
        $parameters['in_category_id'] = $category_id; // #"in_category_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_tree_del_parent_id_category_id(".
                    "in_parent_id".
                    ", in_category_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameCategoryTreeList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_tree_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameCategoryTreeListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_tree_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameCategoryTreeListParentId(
        $parent_id
    ) {
            
        $parameters = array();
        $parameters['in_parent_id'] =  $parent_id; //#"in_parent_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_tree_get_parent_id(".
                    "in_parent_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameCategoryTreeListCategoryId(
        $category_id
    ) {
            
        $parameters = array();
        $parameters['in_category_id'] =  $category_id; //#"in_category_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_tree_get_category_id(".
                    "in_category_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameCategoryTreeListParentIdCategoryId(
        $parent_id
        , $category_id
    ) {
            
        $parameters = array();
        $parameters['in_parent_id'] =  $parent_id; //#"in_parent_id"
        $parameters['in_category_id'] =  $category_id; //#"in_category_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_tree_get_parent_id_category_id(".
                    "in_parent_id".
                    ", in_category_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameCategoryAssoc(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_assoc_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameCategoryAssocUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_assoc_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameCategoryAssocGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_assoc_count_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameCategoryAssocCategoryId(
        $category_id
    ) {
        $parameters = array();
        $parameters['in_category_id'] = $category_id; // #"in_category_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_assoc_count_category_id(".
                    "in_category_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameCategoryAssocGameIdCategoryId(
        $game_id
        , $category_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_category_id'] = $category_id; // #"in_category_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_assoc_count_game_id_category_id(".
                    "in_game_id".
                    ", in_category_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameCategoryAssocListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_assoc_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameCategoryAssocUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->category_id != NULL)
                $parameters['in_category_id'] = $obj->category_id; // #"in_category_id"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_category_assoc_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameCategoryAssocUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_assoc_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameCategoryAssocList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_assoc_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameCategoryAssocListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_assoc_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameCategoryAssocListGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_assoc_get_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameCategoryAssocListCategoryId(
        $category_id
    ) {
            
        $parameters = array();
        $parameters['in_category_id'] =  $category_id; //#"in_category_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_assoc_get_category_id(".
                    "in_category_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameCategoryAssocListGameIdCategoryId(
        $game_id
        , $category_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_category_id'] =  $category_id; //#"in_category_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_category_assoc_get_game_id_category_id(".
                    "in_game_id".
                    ", in_category_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameType(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_type_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameTypeUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_type_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameTypeCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_type_count_code(".
                    "in_code".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameTypeName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_type_count_name(".
                    "in_name".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameTypeListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_type_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameTypeUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_type_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameTypeUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_type_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameTypeList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_type_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameTypeListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_type_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameTypeListCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_type_get_code(".
                    "in_code".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameTypeListName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_type_get_name(".
                    "in_name".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountProfileGame(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileGameUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileGameGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_count_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileGameProfileId(
        $profile_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_count_profile_id(".
                    "in_profile_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileGameProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_count_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseProfileGameListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetProfileGameUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->type_id != NULL)
                $parameters['in_type_id'] = $obj->type_id; // #"in_type_id"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->game_profile != NULL)
                $parameters['in_game_profile'] = $obj->game_profile; // #"in_game_profile"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->profile_version != NULL)
                $parameters['in_profile_version'] = $obj->profile_version; // #"in_profile_version"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_profile_game_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelProfileGameUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetProfileGameList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileGameListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileGameListGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_get_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileGameListProfileId(
        $profile_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_get_profile_id(".
                    "in_profile_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileGameListProfileIdGameId(
        $profile_id
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_get_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameNetwork(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_network_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameNetworkUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_network_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameNetworkCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_network_count_code(".
                    "in_code".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameNetworkUuidType(
        $uuid
        , $type
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
        $parameters['in_type'] = $type; // #"in_type"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_network_count_uuid_type(".
                    "in_uuid".
                    ", in_type".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameNetworkListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_network_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameNetworkUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->secret != NULL)
                $parameters['in_secret'] = $obj->secret; // #"in_secret"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_network_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameNetworkCode($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->secret != NULL)
                $parameters['in_secret'] = $obj->secret; // #"in_secret"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_network_set_code(".
                        "in_code".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameNetworkUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_network_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameNetworkList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_network_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameNetworkListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_network_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameNetworkListCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_network_get_code(".
                    "in_code".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameNetworkListUuidType(
        $uuid
        , $type
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
        $parameters['in_type'] =  $type; //#"in_type"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_network_get_uuid_type(".
                    "in_uuid".
                    ", in_type".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameNetworkAuth(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_network_auth_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameNetworkAuthUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_network_auth_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameNetworkAuthGameIdGameNetworkId(
        $game_id
        , $game_network_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_game_network_id'] = $game_network_id; // #"in_game_network_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_network_auth_count_game_id_game_network_id(".
                    "in_game_id".
                    ", in_game_network_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameNetworkAuthListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_network_auth_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameNetworkAuthUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->app_id != NULL)
                $parameters['in_app_id'] = $obj->app_id; // #"in_app_id"
            if($obj->game_network_id != NULL)
                $parameters['in_game_network_id'] = $obj->game_network_id; // #"in_game_network_id"
            if($obj->secret != NULL)
                $parameters['in_secret'] = $obj->secret; // #"in_secret"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_network_auth_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameNetworkAuthGameIdGameNetworkId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->app_id != NULL)
                $parameters['in_app_id'] = $obj->app_id; // #"in_app_id"
            if($obj->game_network_id != NULL)
                $parameters['in_game_network_id'] = $obj->game_network_id; // #"in_game_network_id"
            if($obj->secret != NULL)
                $parameters['in_secret'] = $obj->secret; // #"in_secret"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_network_auth_set_game_id_game_network_id(".
                        "in_game_id".
                        ", in_game_network_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameNetworkAuthUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_network_auth_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameNetworkAuthList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_network_auth_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameNetworkAuthListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_network_auth_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameNetworkAuthListGameIdGameNetworkId(
        $game_id
        , $game_network_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_game_network_id'] =  $game_network_id; //#"in_game_network_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_network_auth_get_game_id_game_network_id(".
                    "in_game_id".
                    ", in_game_network_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountProfileGameNetwork(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_network_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileGameNetworkUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_network_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileGameNetworkGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_network_count_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileGameNetworkProfileId(
        $profile_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_network_count_profile_id(".
                    "in_profile_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileGameNetworkProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_network_count_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileGameNetworkProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_network_count_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileGameNetworkProfileIdGameIdGameNetworkId(
        $profile_id
        , $game_id
        , $game_network_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_game_network_id'] = $game_network_id; // #"in_game_network_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_network_count_profile_id_game_id_game_network_(".
                    "in_profile_id".
                    ", in_game_id".
                    ", in_game_network_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
        $network_username
        , $game_id
        , $game_network_id
    ) {
        $parameters = array();
        $parameters['in_network_username'] = $network_username; // #"in_network_username"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_game_network_id'] = $game_network_id; // #"in_game_network_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_network_count_network_username_game_id_game_ne(".
                    "in_network_username".
                    ", in_game_id".
                    ", in_game_network_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseProfileGameNetworkListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_network_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetProfileGameNetworkUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->hash != NULL)
                $parameters['in_hash'] = $obj->hash; // #"in_hash"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->game_network_id != NULL)
                $parameters['in_game_network_id'] = $obj->game_network_id; // #"in_game_network_id"
            if($obj->network_username != NULL)
                $parameters['in_network_username'] = $obj->network_username; // #"in_network_username"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->network_fullname != NULL)
                $parameters['in_network_fullname'] = $obj->network_fullname; // #"in_network_fullname"
            if($obj->secret != NULL)
                $parameters['in_secret'] = $obj->secret; // #"in_secret"
            if($obj->token != NULL)
                $parameters['in_token'] = $obj->token; // #"in_token"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->network_auth != NULL)
                $parameters['in_network_auth'] = $obj->network_auth; // #"in_network_auth"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->network_user_id != NULL)
                $parameters['in_network_user_id'] = $obj->network_user_id; // #"in_network_user_id"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_profile_game_network_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetProfileGameNetworkProfileIdGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->hash != NULL)
                $parameters['in_hash'] = $obj->hash; // #"in_hash"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->game_network_id != NULL)
                $parameters['in_game_network_id'] = $obj->game_network_id; // #"in_game_network_id"
            if($obj->network_username != NULL)
                $parameters['in_network_username'] = $obj->network_username; // #"in_network_username"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->network_fullname != NULL)
                $parameters['in_network_fullname'] = $obj->network_fullname; // #"in_network_fullname"
            if($obj->secret != NULL)
                $parameters['in_secret'] = $obj->secret; // #"in_secret"
            if($obj->token != NULL)
                $parameters['in_token'] = $obj->token; // #"in_token"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->network_auth != NULL)
                $parameters['in_network_auth'] = $obj->network_auth; // #"in_network_auth"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->network_user_id != NULL)
                $parameters['in_network_user_id'] = $obj->network_user_id; // #"in_network_user_id"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_profile_game_network_set_profile_id_game_id(".
                        "in_profile_id".
                        ", in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetProfileGameNetworkProfileIdGameIdGameNetworkId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->hash != NULL)
                $parameters['in_hash'] = $obj->hash; // #"in_hash"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->game_network_id != NULL)
                $parameters['in_game_network_id'] = $obj->game_network_id; // #"in_game_network_id"
            if($obj->network_username != NULL)
                $parameters['in_network_username'] = $obj->network_username; // #"in_network_username"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->network_fullname != NULL)
                $parameters['in_network_fullname'] = $obj->network_fullname; // #"in_network_fullname"
            if($obj->secret != NULL)
                $parameters['in_secret'] = $obj->secret; // #"in_secret"
            if($obj->token != NULL)
                $parameters['in_token'] = $obj->token; // #"in_token"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->network_auth != NULL)
                $parameters['in_network_auth'] = $obj->network_auth; // #"in_network_auth"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->network_user_id != NULL)
                $parameters['in_network_user_id'] = $obj->network_user_id; // #"in_network_user_id"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_profile_game_network_set_profile_id_game_id_game_network_id(".
                        "in_profile_id".
                        ", in_game_id".
                        ", in_game_network_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetProfileGameNetworkNetworkUsernameGameIdGameNetworkId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->hash != NULL)
                $parameters['in_hash'] = $obj->hash; // #"in_hash"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->game_network_id != NULL)
                $parameters['in_game_network_id'] = $obj->game_network_id; // #"in_game_network_id"
            if($obj->network_username != NULL)
                $parameters['in_network_username'] = $obj->network_username; // #"in_network_username"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->network_fullname != NULL)
                $parameters['in_network_fullname'] = $obj->network_fullname; // #"in_network_fullname"
            if($obj->secret != NULL)
                $parameters['in_secret'] = $obj->secret; // #"in_secret"
            if($obj->token != NULL)
                $parameters['in_token'] = $obj->token; // #"in_token"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->network_auth != NULL)
                $parameters['in_network_auth'] = $obj->network_auth; // #"in_network_auth"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->network_user_id != NULL)
                $parameters['in_network_user_id'] = $obj->network_user_id; // #"in_network_user_id"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_profile_game_network_set_network_username_game_id_game_netw(".
                        "in_network_username".
                        ", in_game_id".
                        ", in_game_network_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelProfileGameNetworkUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_network_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelProfileGameNetworkProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_network_del_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelProfileGameNetworkProfileIdGameIdGameNetworkId(
        $profile_id
        , $game_id
        , $game_network_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_game_network_id'] = $game_network_id; // #"in_game_network_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_network_del_profile_id_game_id_game_network_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ", in_game_network_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
        $network_username
        , $game_id
        , $game_network_id
    ) {
        $parameters = array();
        $parameters['in_network_username'] = $network_username; // #"in_network_username"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_game_network_id'] = $game_network_id; // #"in_game_network_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_network_del_network_username_game_id_game_netw(".
                    "in_network_username".
                    ", in_game_id".
                    ", in_game_network_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetProfileGameNetworkList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_network_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileGameNetworkListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_network_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileGameNetworkListGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_network_get_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileGameNetworkListProfileId(
        $profile_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_network_get_profile_id(".
                    "in_profile_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileGameNetworkListProfileIdGameId(
        $profile_id
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_network_get_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileGameNetworkListProfileIdGameIdGameNetworkId(
        $profile_id
        , $game_id
        , $game_network_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_game_network_id'] =  $game_network_id; //#"in_game_network_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_network_get_profile_id_game_id_game_network_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ", in_game_network_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
        $network_username
        , $game_id
        , $game_network_id
    ) {
            
        $parameters = array();
        $parameters['in_network_username'] =  $network_username; //#"in_network_username"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_game_network_id'] =  $game_network_id; //#"in_game_network_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_network_get_network_username_game_id_game_netw(".
                    "in_network_username".
                    ", in_game_id".
                    ", in_game_network_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountProfileGameDataAttribute(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_data_attribute_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileGameDataAttributeUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_data_attribute_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileGameDataAttributeProfileId(
        $profile_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_data_attribute_count_profile_id(".
                    "in_profile_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileGameDataAttributeProfileIdGameIdCode(
        $profile_id
        , $game_id
        , $code
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_data_attribute_count_profile_id_game_id_code(".
                    "in_profile_id".
                    ", in_game_id".
                    ", in_code".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseProfileGameDataAttributeListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_data_attribute_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetProfileGameDataAttributeUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->val != NULL)
                $parameters['in_val'] = $obj->val; // #"in_val"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->otype != NULL)
                $parameters['in_otype'] = $obj->otype; // #"in_otype"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_profile_game_data_attribute_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetProfileGameDataAttributeProfileId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->val != NULL)
                $parameters['in_val'] = $obj->val; // #"in_val"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->otype != NULL)
                $parameters['in_otype'] = $obj->otype; // #"in_otype"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_profile_game_data_attribute_set_profile_id(".
                        "in_profile_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetProfileGameDataAttributeProfileIdGameIdCode($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->val != NULL)
                $parameters['in_val'] = $obj->val; // #"in_val"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->otype != NULL)
                $parameters['in_otype'] = $obj->otype; // #"in_otype"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_profile_game_data_attribute_set_profile_id_game_id_code(".
                        "in_profile_id".
                        ", in_game_id".
                        ", in_code".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelProfileGameDataAttributeUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_data_attribute_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelProfileGameDataAttributeProfileId(
        $profile_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_data_attribute_del_profile_id(".
                    "in_profile_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelProfileGameDataAttributeProfileIdGameIdCode(
        $profile_id
        , $game_id
        , $code
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_data_attribute_del_profile_id_game_id_code(".
                    "in_profile_id".
                    ", in_game_id".
                    ", in_code".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetProfileGameDataAttributeListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_data_attribute_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileGameDataAttributeListProfileId(
        $profile_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_data_attribute_get_profile_id(".
                    "in_profile_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileGameDataAttributeListProfileIdGameIdCode(
        $profile_id
        , $game_id
        , $code
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_data_attribute_get_profile_id_game_id_code(".
                    "in_profile_id".
                    ", in_game_id".
                    ", in_code".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameSession(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_session_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameSessionUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_session_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameSessionGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_session_count_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameSessionProfileId(
        $profile_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_session_count_profile_id(".
                    "in_profile_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameSessionProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_session_count_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameSessionListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_session_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameSessionUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->game_area != NULL)
                $parameters['in_game_area'] = $obj->game_area; // #"in_game_area"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->network_uuid != NULL)
                $parameters['in_network_uuid'] = $obj->network_uuid; // #"in_network_uuid"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->game_level != NULL)
                $parameters['in_game_level'] = $obj->game_level; // #"in_game_level"
            if($obj->profile_network != NULL)
                $parameters['in_profile_network'] = $obj->profile_network; // #"in_profile_network"
            if($obj->profile_device != NULL)
                $parameters['in_profile_device'] = $obj->profile_device; // #"in_profile_device"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->network_external_port != NULL)
                $parameters['in_network_external_port'] = $obj->network_external_port; // #"in_network_external_port"
            if($obj->game_players_connected != NULL)
                $parameters['in_game_players_connected'] = $obj->game_players_connected; // #"in_game_players_connected"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->game_state != NULL)
                $parameters['in_game_state'] = $obj->game_state; // #"in_game_state"
            if($obj->hash != NULL)
                $parameters['in_hash'] = $obj->hash; // #"in_hash"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->network_external_ip != NULL)
                $parameters['in_network_external_ip'] = $obj->network_external_ip; // #"in_network_external_ip"
            if($obj->profile_username != NULL)
                $parameters['in_profile_username'] = $obj->profile_username; // #"in_profile_username"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->game_code != NULL)
                $parameters['in_game_code'] = $obj->game_code; // #"in_game_code"
            if($obj->game_player_z != NULL)
                $parameters['in_game_player_z'] = $obj->game_player_z; // #"in_game_player_z"
            if($obj->game_player_x != NULL)
                $parameters['in_game_player_x'] = $obj->game_player_x; // #"in_game_player_x"
            if($obj->game_player_y != NULL)
                $parameters['in_game_player_y'] = $obj->game_player_y; // #"in_game_player_y"
            if($obj->network_port != NULL)
                $parameters['in_network_port'] = $obj->network_port; // #"in_network_port"
            if($obj->game_players_allowed != NULL)
                $parameters['in_game_players_allowed'] = $obj->game_players_allowed; // #"in_game_players_allowed"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->game_type != NULL)
                $parameters['in_game_type'] = $obj->game_type; // #"in_game_type"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->network_ip != NULL)
                $parameters['in_network_ip'] = $obj->network_ip; // #"in_network_ip"
            if($obj->network_use_nat != NULL)
                $parameters['in_network_use_nat'] = $obj->network_use_nat; // #"in_network_use_nat"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_session_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameSessionUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_session_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameSessionList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_session_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameSessionListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_session_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameSessionListGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_session_get_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameSessionListProfileId(
        $profile_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_session_get_profile_id(".
                    "in_profile_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameSessionListProfileIdGameId(
        $profile_id
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_session_get_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameSessionData(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_session_data_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameSessionDataUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_session_data_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameSessionDataListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_session_data_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameSessionDataUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->data_results != NULL)
                $parameters['in_data_results'] = $obj->data_results; // #"in_data_results"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->data_layer_projectile != NULL)
                $parameters['in_data_layer_projectile'] = $obj->data_layer_projectile; // #"in_data_layer_projectile"
            if($obj->data_layer_actors != NULL)
                $parameters['in_data_layer_actors'] = $obj->data_layer_actors; // #"in_data_layer_actors"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->data_layer_enemy != NULL)
                $parameters['in_data_layer_enemy'] = $obj->data_layer_enemy; // #"in_data_layer_enemy"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_session_data_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameSessionDataUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_session_data_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameSessionDataList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_session_data_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameSessionDataListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_session_data_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameContent(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_content_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameContentUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_content_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameContentGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_content_count_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameContentGameIdPath(
        $game_id
        , $path
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_path'] = $path; // #"in_path"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_content_count_game_id_path(".
                    "in_game_id".
                    ", in_path".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameContentGameIdPathVersion(
        $game_id
        , $path
        , $version
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_path'] = $path; // #"in_path"
        $parameters['in_version'] = $version; // #"in_version"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_content_count_game_id_path_version(".
                    "in_game_id".
                    ", in_path".
                    ", in_version".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameContentGameIdPathVersionPlatformIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_path'] = $path; // #"in_path"
        $parameters['in_version'] = $version; // #"in_version"
        $parameters['in_platform'] = $platform; // #"in_platform"
        $parameters['in_increment'] = $increment; // #"in_increment"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_content_count_game_id_path_version_platform_increment(".
                    "in_game_id".
                    ", in_path".
                    ", in_version".
                    ", in_platform".
                    ", in_increment".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameContentListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_content_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameContentUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->extension != NULL)
                $parameters['in_extension'] = $obj->extension; // #"in_extension"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->filename != NULL)
                $parameters['in_filename'] = $obj->filename; // #"in_filename"
            if($obj->source != NULL)
                $parameters['in_source'] = $obj->source; // #"in_source"
            if($obj->version != NULL)
                $parameters['in_version'] = $obj->version; // #"in_version"
            if($obj->platform != NULL)
                $parameters['in_platform'] = $obj->platform; // #"in_platform"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->path != NULL)
                $parameters['in_path'] = $obj->path; // #"in_path"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->increment != NULL)
                $parameters['in_increment'] = $obj->increment; // #"in_increment"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->hash != NULL)
                $parameters['in_hash'] = $obj->hash; // #"in_hash"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_content_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameContentGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->extension != NULL)
                $parameters['in_extension'] = $obj->extension; // #"in_extension"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->filename != NULL)
                $parameters['in_filename'] = $obj->filename; // #"in_filename"
            if($obj->source != NULL)
                $parameters['in_source'] = $obj->source; // #"in_source"
            if($obj->version != NULL)
                $parameters['in_version'] = $obj->version; // #"in_version"
            if($obj->platform != NULL)
                $parameters['in_platform'] = $obj->platform; // #"in_platform"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->path != NULL)
                $parameters['in_path'] = $obj->path; // #"in_path"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->increment != NULL)
                $parameters['in_increment'] = $obj->increment; // #"in_increment"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->hash != NULL)
                $parameters['in_hash'] = $obj->hash; // #"in_hash"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_content_set_game_id(".
                        "in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameContentGameIdPath($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->extension != NULL)
                $parameters['in_extension'] = $obj->extension; // #"in_extension"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->filename != NULL)
                $parameters['in_filename'] = $obj->filename; // #"in_filename"
            if($obj->source != NULL)
                $parameters['in_source'] = $obj->source; // #"in_source"
            if($obj->version != NULL)
                $parameters['in_version'] = $obj->version; // #"in_version"
            if($obj->platform != NULL)
                $parameters['in_platform'] = $obj->platform; // #"in_platform"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->path != NULL)
                $parameters['in_path'] = $obj->path; // #"in_path"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->increment != NULL)
                $parameters['in_increment'] = $obj->increment; // #"in_increment"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->hash != NULL)
                $parameters['in_hash'] = $obj->hash; // #"in_hash"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_content_set_game_id_path(".
                        "in_game_id".
                        ", in_path".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameContentGameIdPathVersion($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->extension != NULL)
                $parameters['in_extension'] = $obj->extension; // #"in_extension"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->filename != NULL)
                $parameters['in_filename'] = $obj->filename; // #"in_filename"
            if($obj->source != NULL)
                $parameters['in_source'] = $obj->source; // #"in_source"
            if($obj->version != NULL)
                $parameters['in_version'] = $obj->version; // #"in_version"
            if($obj->platform != NULL)
                $parameters['in_platform'] = $obj->platform; // #"in_platform"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->path != NULL)
                $parameters['in_path'] = $obj->path; // #"in_path"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->increment != NULL)
                $parameters['in_increment'] = $obj->increment; // #"in_increment"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->hash != NULL)
                $parameters['in_hash'] = $obj->hash; // #"in_hash"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_content_set_game_id_path_version(".
                        "in_game_id".
                        ", in_path".
                        ", in_version".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameContentGameIdPathVersionPlatformIncrement($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->extension != NULL)
                $parameters['in_extension'] = $obj->extension; // #"in_extension"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->filename != NULL)
                $parameters['in_filename'] = $obj->filename; // #"in_filename"
            if($obj->source != NULL)
                $parameters['in_source'] = $obj->source; // #"in_source"
            if($obj->version != NULL)
                $parameters['in_version'] = $obj->version; // #"in_version"
            if($obj->platform != NULL)
                $parameters['in_platform'] = $obj->platform; // #"in_platform"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->path != NULL)
                $parameters['in_path'] = $obj->path; // #"in_path"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->increment != NULL)
                $parameters['in_increment'] = $obj->increment; // #"in_increment"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->hash != NULL)
                $parameters['in_hash'] = $obj->hash; // #"in_hash"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_content_set_game_id_path_version_platform_increment(".
                        "in_game_id".
                        ", in_path".
                        ", in_version".
                        ", in_platform".
                        ", in_increment".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameContentUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_content_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameContentGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_content_del_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameContentGameIdPath(
        $game_id
        , $path
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_path'] = $path; // #"in_path"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_content_del_game_id_path(".
                    "in_game_id".
                    ", in_path".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameContentGameIdPathVersion(
        $game_id
        , $path
        , $version
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_path'] = $path; // #"in_path"
        $parameters['in_version'] = $version; // #"in_version"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_content_del_game_id_path_version(".
                    "in_game_id".
                    ", in_path".
                    ", in_version".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameContentGameIdPathVersionPlatformIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_path'] = $path; // #"in_path"
        $parameters['in_version'] = $version; // #"in_version"
        $parameters['in_platform'] = $platform; // #"in_platform"
        $parameters['in_increment'] = $increment; // #"in_increment"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_content_del_game_id_path_version_platform_increment(".
                    "in_game_id".
                    ", in_path".
                    ", in_version".
                    ", in_platform".
                    ", in_increment".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameContentList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_content_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameContentListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_content_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameContentListGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_content_get_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameContentListGameIdPath(
        $game_id
        , $path
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_path'] =  $path; //#"in_path"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_content_get_game_id_path(".
                    "in_game_id".
                    ", in_path".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameContentListGameIdPathVersion(
        $game_id
        , $path
        , $version
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_path'] =  $path; //#"in_path"
        $parameters['in_version'] =  $version; //#"in_version"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_content_get_game_id_path_version(".
                    "in_game_id".
                    ", in_path".
                    ", in_version".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameContentListGameIdPathVersionPlatformIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_path'] =  $path; //#"in_path"
        $parameters['in_version'] =  $version; //#"in_version"
        $parameters['in_platform'] =  $platform; //#"in_platform"
        $parameters['in_increment'] =  $increment; //#"in_increment"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_content_get_game_id_path_version_platform_increment(".
                    "in_game_id".
                    ", in_path".
                    ", in_version".
                    ", in_platform".
                    ", in_increment".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameProfileContent(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileContentUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileContentGameIdProfileId(
        $game_id
        , $profile_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_count_game_id_profile_id(".
                    "in_game_id".
                    ", in_profile_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileContentGameIdUsername(
        $game_id
        , $username
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_username'] = $username; // #"in_username"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_count_game_id_username(".
                    "in_game_id".
                    ", in_username".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileContentUsername(
        $username
    ) {
        $parameters = array();
        $parameters['in_username'] = $username; // #"in_username"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_count_username(".
                    "in_username".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileContentGameIdProfileIdPath(
        $game_id
        , $profile_id
        , $path
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_path'] = $path; // #"in_path"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_count_game_id_profile_id_path(".
                    "in_game_id".
                    ", in_profile_id".
                    ", in_path".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileContentGameIdProfileIdPathVersion(
        $game_id
        , $profile_id
        , $path
        , $version
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_path'] = $path; // #"in_path"
        $parameters['in_version'] = $version; // #"in_version"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_count_game_id_profile_id_path_version(".
                    "in_game_id".
                    ", in_profile_id".
                    ", in_path".
                    ", in_version".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_path'] = $path; // #"in_path"
        $parameters['in_version'] = $version; // #"in_version"
        $parameters['in_platform'] = $platform; // #"in_platform"
        $parameters['in_increment'] = $increment; // #"in_increment"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_count_game_id_profile_id_path_version_(".
                    "in_game_id".
                    ", in_profile_id".
                    ", in_path".
                    ", in_version".
                    ", in_platform".
                    ", in_increment".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileContentGameIdUsernamePath(
        $game_id
        , $username
        , $path
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_username'] = $username; // #"in_username"
        $parameters['in_path'] = $path; // #"in_path"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_count_game_id_username_path(".
                    "in_game_id".
                    ", in_username".
                    ", in_path".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileContentGameIdUsernamePathVersion(
        $game_id
        , $username
        , $path
        , $version
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_username'] = $username; // #"in_username"
        $parameters['in_path'] = $path; // #"in_path"
        $parameters['in_version'] = $version; // #"in_version"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_count_game_id_username_path_version(".
                    "in_game_id".
                    ", in_username".
                    ", in_path".
                    ", in_version".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_username'] = $username; // #"in_username"
        $parameters['in_path'] = $path; // #"in_path"
        $parameters['in_version'] = $version; // #"in_version"
        $parameters['in_platform'] = $platform; // #"in_platform"
        $parameters['in_increment'] = $increment; // #"in_increment"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_count_game_id_username_path_version_pl(".
                    "in_game_id".
                    ", in_username".
                    ", in_path".
                    ", in_version".
                    ", in_platform".
                    ", in_increment".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameProfileContentListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameProfileContentUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->increment != NULL)
                $parameters['in_increment'] = $obj->increment; // #"in_increment"
            if($obj->path != NULL)
                $parameters['in_path'] = $obj->path; // #"in_path"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->platform != NULL)
                $parameters['in_platform'] = $obj->platform; // #"in_platform"
            if($obj->filename != NULL)
                $parameters['in_filename'] = $obj->filename; // #"in_filename"
            if($obj->source != NULL)
                $parameters['in_source'] = $obj->source; // #"in_source"
            if($obj->version != NULL)
                $parameters['in_version'] = $obj->version; // #"in_version"
            if($obj->game_network != NULL)
                $parameters['in_game_network'] = $obj->game_network; // #"in_game_network"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->hash != NULL)
                $parameters['in_hash'] = $obj->hash; // #"in_hash"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->extension != NULL)
                $parameters['in_extension'] = $obj->extension; // #"in_extension"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_content_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProfileContentGameIdProfileId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->increment != NULL)
                $parameters['in_increment'] = $obj->increment; // #"in_increment"
            if($obj->path != NULL)
                $parameters['in_path'] = $obj->path; // #"in_path"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->platform != NULL)
                $parameters['in_platform'] = $obj->platform; // #"in_platform"
            if($obj->filename != NULL)
                $parameters['in_filename'] = $obj->filename; // #"in_filename"
            if($obj->source != NULL)
                $parameters['in_source'] = $obj->source; // #"in_source"
            if($obj->version != NULL)
                $parameters['in_version'] = $obj->version; // #"in_version"
            if($obj->game_network != NULL)
                $parameters['in_game_network'] = $obj->game_network; // #"in_game_network"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->hash != NULL)
                $parameters['in_hash'] = $obj->hash; // #"in_hash"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->extension != NULL)
                $parameters['in_extension'] = $obj->extension; // #"in_extension"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_content_set_game_id_profile_id(".
                        "in_game_id".
                        ", in_profile_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProfileContentGameIdUsername($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->increment != NULL)
                $parameters['in_increment'] = $obj->increment; // #"in_increment"
            if($obj->path != NULL)
                $parameters['in_path'] = $obj->path; // #"in_path"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->platform != NULL)
                $parameters['in_platform'] = $obj->platform; // #"in_platform"
            if($obj->filename != NULL)
                $parameters['in_filename'] = $obj->filename; // #"in_filename"
            if($obj->source != NULL)
                $parameters['in_source'] = $obj->source; // #"in_source"
            if($obj->version != NULL)
                $parameters['in_version'] = $obj->version; // #"in_version"
            if($obj->game_network != NULL)
                $parameters['in_game_network'] = $obj->game_network; // #"in_game_network"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->hash != NULL)
                $parameters['in_hash'] = $obj->hash; // #"in_hash"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->extension != NULL)
                $parameters['in_extension'] = $obj->extension; // #"in_extension"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_content_set_game_id_username(".
                        "in_game_id".
                        ", in_username".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProfileContentUsername($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->increment != NULL)
                $parameters['in_increment'] = $obj->increment; // #"in_increment"
            if($obj->path != NULL)
                $parameters['in_path'] = $obj->path; // #"in_path"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->platform != NULL)
                $parameters['in_platform'] = $obj->platform; // #"in_platform"
            if($obj->filename != NULL)
                $parameters['in_filename'] = $obj->filename; // #"in_filename"
            if($obj->source != NULL)
                $parameters['in_source'] = $obj->source; // #"in_source"
            if($obj->version != NULL)
                $parameters['in_version'] = $obj->version; // #"in_version"
            if($obj->game_network != NULL)
                $parameters['in_game_network'] = $obj->game_network; // #"in_game_network"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->hash != NULL)
                $parameters['in_hash'] = $obj->hash; // #"in_hash"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->extension != NULL)
                $parameters['in_extension'] = $obj->extension; // #"in_extension"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_content_set_username(".
                        "in_username".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProfileContentGameIdProfileIdPath($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->increment != NULL)
                $parameters['in_increment'] = $obj->increment; // #"in_increment"
            if($obj->path != NULL)
                $parameters['in_path'] = $obj->path; // #"in_path"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->platform != NULL)
                $parameters['in_platform'] = $obj->platform; // #"in_platform"
            if($obj->filename != NULL)
                $parameters['in_filename'] = $obj->filename; // #"in_filename"
            if($obj->source != NULL)
                $parameters['in_source'] = $obj->source; // #"in_source"
            if($obj->version != NULL)
                $parameters['in_version'] = $obj->version; // #"in_version"
            if($obj->game_network != NULL)
                $parameters['in_game_network'] = $obj->game_network; // #"in_game_network"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->hash != NULL)
                $parameters['in_hash'] = $obj->hash; // #"in_hash"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->extension != NULL)
                $parameters['in_extension'] = $obj->extension; // #"in_extension"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_content_set_game_id_profile_id_path(".
                        "in_game_id".
                        ", in_profile_id".
                        ", in_path".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProfileContentGameIdProfileIdPathVersion($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->increment != NULL)
                $parameters['in_increment'] = $obj->increment; // #"in_increment"
            if($obj->path != NULL)
                $parameters['in_path'] = $obj->path; // #"in_path"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->platform != NULL)
                $parameters['in_platform'] = $obj->platform; // #"in_platform"
            if($obj->filename != NULL)
                $parameters['in_filename'] = $obj->filename; // #"in_filename"
            if($obj->source != NULL)
                $parameters['in_source'] = $obj->source; // #"in_source"
            if($obj->version != NULL)
                $parameters['in_version'] = $obj->version; // #"in_version"
            if($obj->game_network != NULL)
                $parameters['in_game_network'] = $obj->game_network; // #"in_game_network"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->hash != NULL)
                $parameters['in_hash'] = $obj->hash; // #"in_hash"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->extension != NULL)
                $parameters['in_extension'] = $obj->extension; // #"in_extension"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_content_set_game_id_profile_id_path_version(".
                        "in_game_id".
                        ", in_profile_id".
                        ", in_path".
                        ", in_version".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->increment != NULL)
                $parameters['in_increment'] = $obj->increment; // #"in_increment"
            if($obj->path != NULL)
                $parameters['in_path'] = $obj->path; // #"in_path"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->platform != NULL)
                $parameters['in_platform'] = $obj->platform; // #"in_platform"
            if($obj->filename != NULL)
                $parameters['in_filename'] = $obj->filename; // #"in_filename"
            if($obj->source != NULL)
                $parameters['in_source'] = $obj->source; // #"in_source"
            if($obj->version != NULL)
                $parameters['in_version'] = $obj->version; // #"in_version"
            if($obj->game_network != NULL)
                $parameters['in_game_network'] = $obj->game_network; // #"in_game_network"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->hash != NULL)
                $parameters['in_hash'] = $obj->hash; // #"in_hash"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->extension != NULL)
                $parameters['in_extension'] = $obj->extension; // #"in_extension"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_content_set_game_id_profile_id_path_version_pl(".
                        "in_game_id".
                        ", in_profile_id".
                        ", in_path".
                        ", in_version".
                        ", in_platform".
                        ", in_increment".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProfileContentGameIdUsernamePath($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->increment != NULL)
                $parameters['in_increment'] = $obj->increment; // #"in_increment"
            if($obj->path != NULL)
                $parameters['in_path'] = $obj->path; // #"in_path"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->platform != NULL)
                $parameters['in_platform'] = $obj->platform; // #"in_platform"
            if($obj->filename != NULL)
                $parameters['in_filename'] = $obj->filename; // #"in_filename"
            if($obj->source != NULL)
                $parameters['in_source'] = $obj->source; // #"in_source"
            if($obj->version != NULL)
                $parameters['in_version'] = $obj->version; // #"in_version"
            if($obj->game_network != NULL)
                $parameters['in_game_network'] = $obj->game_network; // #"in_game_network"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->hash != NULL)
                $parameters['in_hash'] = $obj->hash; // #"in_hash"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->extension != NULL)
                $parameters['in_extension'] = $obj->extension; // #"in_extension"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_content_set_game_id_username_path(".
                        "in_game_id".
                        ", in_username".
                        ", in_path".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProfileContentGameIdUsernamePathVersion($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->increment != NULL)
                $parameters['in_increment'] = $obj->increment; // #"in_increment"
            if($obj->path != NULL)
                $parameters['in_path'] = $obj->path; // #"in_path"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->platform != NULL)
                $parameters['in_platform'] = $obj->platform; // #"in_platform"
            if($obj->filename != NULL)
                $parameters['in_filename'] = $obj->filename; // #"in_filename"
            if($obj->source != NULL)
                $parameters['in_source'] = $obj->source; // #"in_source"
            if($obj->version != NULL)
                $parameters['in_version'] = $obj->version; // #"in_version"
            if($obj->game_network != NULL)
                $parameters['in_game_network'] = $obj->game_network; // #"in_game_network"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->hash != NULL)
                $parameters['in_hash'] = $obj->hash; // #"in_hash"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->extension != NULL)
                $parameters['in_extension'] = $obj->extension; // #"in_extension"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_content_set_game_id_username_path_version(".
                        "in_game_id".
                        ", in_username".
                        ", in_path".
                        ", in_version".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProfileContentGameIdUsernamePathVersionPlatformIncrement($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->increment != NULL)
                $parameters['in_increment'] = $obj->increment; // #"in_increment"
            if($obj->path != NULL)
                $parameters['in_path'] = $obj->path; // #"in_path"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->platform != NULL)
                $parameters['in_platform'] = $obj->platform; // #"in_platform"
            if($obj->filename != NULL)
                $parameters['in_filename'] = $obj->filename; // #"in_filename"
            if($obj->source != NULL)
                $parameters['in_source'] = $obj->source; // #"in_source"
            if($obj->version != NULL)
                $parameters['in_version'] = $obj->version; // #"in_version"
            if($obj->game_network != NULL)
                $parameters['in_game_network'] = $obj->game_network; // #"in_game_network"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->hash != NULL)
                $parameters['in_hash'] = $obj->hash; // #"in_hash"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->extension != NULL)
                $parameters['in_extension'] = $obj->extension; // #"in_extension"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_content_set_game_id_username_path_version_plat(".
                        "in_game_id".
                        ", in_username".
                        ", in_path".
                        ", in_version".
                        ", in_platform".
                        ", in_increment".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameProfileContentUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameProfileContentGameIdProfileId(
        $game_id
        , $profile_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_del_game_id_profile_id(".
                    "in_game_id".
                    ", in_profile_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameProfileContentGameIdUsername(
        $game_id
        , $username
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_username'] = $username; // #"in_username"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_del_game_id_username(".
                    "in_game_id".
                    ", in_username".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameProfileContentUsername(
        $username
    ) {
        $parameters = array();
        $parameters['in_username'] = $username; // #"in_username"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_del_username(".
                    "in_username".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameProfileContentGameIdProfileIdPath(
        $game_id
        , $profile_id
        , $path
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_path'] = $path; // #"in_path"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_del_game_id_profile_id_path(".
                    "in_game_id".
                    ", in_profile_id".
                    ", in_path".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameProfileContentGameIdProfileIdPathVersion(
        $game_id
        , $profile_id
        , $path
        , $version
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_path'] = $path; // #"in_path"
        $parameters['in_version'] = $version; // #"in_version"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_del_game_id_profile_id_path_version(".
                    "in_game_id".
                    ", in_profile_id".
                    ", in_path".
                    ", in_version".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_path'] = $path; // #"in_path"
        $parameters['in_version'] = $version; // #"in_version"
        $parameters['in_platform'] = $platform; // #"in_platform"
        $parameters['in_increment'] = $increment; // #"in_increment"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_del_game_id_profile_id_path_version_pl(".
                    "in_game_id".
                    ", in_profile_id".
                    ", in_path".
                    ", in_version".
                    ", in_platform".
                    ", in_increment".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameProfileContentGameIdUsernamePath(
        $game_id
        , $username
        , $path
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_username'] = $username; // #"in_username"
        $parameters['in_path'] = $path; // #"in_path"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_del_game_id_username_path(".
                    "in_game_id".
                    ", in_username".
                    ", in_path".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameProfileContentGameIdUsernamePathVersion(
        $game_id
        , $username
        , $path
        , $version
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_username'] = $username; // #"in_username"
        $parameters['in_path'] = $path; // #"in_path"
        $parameters['in_version'] = $version; // #"in_version"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_del_game_id_username_path_version(".
                    "in_game_id".
                    ", in_username".
                    ", in_path".
                    ", in_version".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_username'] = $username; // #"in_username"
        $parameters['in_path'] = $path; // #"in_path"
        $parameters['in_version'] = $version; // #"in_version"
        $parameters['in_platform'] = $platform; // #"in_platform"
        $parameters['in_increment'] = $increment; // #"in_increment"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_del_game_id_username_path_version_plat(".
                    "in_game_id".
                    ", in_username".
                    ", in_path".
                    ", in_version".
                    ", in_platform".
                    ", in_increment".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameProfileContentList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileContentListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileContentListGameIdProfileId(
        $game_id
        , $profile_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_get_game_id_profile_id(".
                    "in_game_id".
                    ", in_profile_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileContentListGameIdUsername(
        $game_id
        , $username
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_username'] =  $username; //#"in_username"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_get_game_id_username(".
                    "in_game_id".
                    ", in_username".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileContentListUsername(
        $username
    ) {
            
        $parameters = array();
        $parameters['in_username'] =  $username; //#"in_username"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_get_username(".
                    "in_username".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileContentListGameIdProfileIdPath(
        $game_id
        , $profile_id
        , $path
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_path'] =  $path; //#"in_path"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_get_game_id_profile_id_path(".
                    "in_game_id".
                    ", in_profile_id".
                    ", in_path".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileContentListGameIdProfileIdPathVersion(
        $game_id
        , $profile_id
        , $path
        , $version
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_path'] =  $path; //#"in_path"
        $parameters['in_version'] =  $version; //#"in_version"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_get_game_id_profile_id_path_version(".
                    "in_game_id".
                    ", in_profile_id".
                    ", in_path".
                    ", in_version".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_path'] =  $path; //#"in_path"
        $parameters['in_version'] =  $version; //#"in_version"
        $parameters['in_platform'] =  $platform; //#"in_platform"
        $parameters['in_increment'] =  $increment; //#"in_increment"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_get_game_id_profile_id_path_version_pl(".
                    "in_game_id".
                    ", in_profile_id".
                    ", in_path".
                    ", in_version".
                    ", in_platform".
                    ", in_increment".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileContentListGameIdUsernamePath(
        $game_id
        , $username
        , $path
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_username'] =  $username; //#"in_username"
        $parameters['in_path'] =  $path; //#"in_path"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_get_game_id_username_path(".
                    "in_game_id".
                    ", in_username".
                    ", in_path".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileContentListGameIdUsernamePathVersion(
        $game_id
        , $username
        , $path
        , $version
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_username'] =  $username; //#"in_username"
        $parameters['in_path'] =  $path; //#"in_path"
        $parameters['in_version'] =  $version; //#"in_version"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_get_game_id_username_path_version(".
                    "in_game_id".
                    ", in_username".
                    ", in_path".
                    ", in_version".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_username'] =  $username; //#"in_username"
        $parameters['in_path'] =  $path; //#"in_path"
        $parameters['in_version'] =  $version; //#"in_version"
        $parameters['in_platform'] =  $platform; //#"in_platform"
        $parameters['in_increment'] =  $increment; //#"in_increment"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_content_get_game_id_username_path_version_plat(".
                    "in_game_id".
                    ", in_username".
                    ", in_path".
                    ", in_version".
                    ", in_platform".
                    ", in_increment".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameApp(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_app_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameAppUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_app_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameAppGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_app_count_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameAppAppId(
        $app_id
    ) {
        $parameters = array();
        $parameters['in_app_id'] = $app_id; // #"in_app_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_app_count_app_id(".
                    "in_app_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameAppGameIdAppId(
        $game_id
        , $app_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_app_id'] = $app_id; // #"in_app_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_app_count_game_id_app_id(".
                    "in_game_id".
                    ", in_app_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameAppListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_app_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameAppUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->app_id != NULL)
                $parameters['in_app_id'] = $obj->app_id; // #"in_app_id"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_app_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameAppUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_app_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameAppList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_app_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameAppListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_app_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameAppListGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_app_get_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameAppListAppId(
        $app_id
    ) {
            
        $parameters = array();
        $parameters['in_app_id'] =  $app_id; //#"in_app_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_app_get_app_id(".
                    "in_app_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameAppListGameIdAppId(
        $game_id
        , $app_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_app_id'] =  $app_id; //#"in_app_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_app_get_game_id_app_id(".
                    "in_game_id".
                    ", in_app_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountProfileGameLocation(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_location_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileGameLocationUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_location_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileGameLocationGameLocationId(
        $game_location_id
    ) {
        $parameters = array();
        $parameters['in_game_location_id'] = $game_location_id; // #"in_game_location_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_location_count_game_location_id(".
                    "in_game_location_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileGameLocationProfileId(
        $profile_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_location_count_profile_id(".
                    "in_profile_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileGameLocationProfileIdGameLocationId(
        $profile_id
        , $game_location_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_location_id'] = $game_location_id; // #"in_game_location_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_location_count_profile_id_game_location_id(".
                    "in_profile_id".
                    ", in_game_location_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseProfileGameLocationListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_location_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetProfileGameLocationUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->game_location_id != NULL)
                $parameters['in_game_location_id'] = $obj->game_location_id; // #"in_game_location_id"
            if($obj->type_id != NULL)
                $parameters['in_type_id'] = $obj->type_id; // #"in_type_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_profile_game_location_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelProfileGameLocationUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_location_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetProfileGameLocationList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_location_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileGameLocationListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_location_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileGameLocationListGameLocationId(
        $game_location_id
    ) {
            
        $parameters = array();
        $parameters['in_game_location_id'] =  $game_location_id; //#"in_game_location_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_location_get_game_location_id(".
                    "in_game_location_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileGameLocationListProfileId(
        $profile_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_location_get_profile_id(".
                    "in_profile_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileGameLocationListProfileIdGameLocationId(
        $profile_id
        , $game_location_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_location_id'] =  $game_location_id; //#"in_game_location_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_game_location_get_profile_id_game_location_id(".
                    "in_profile_id".
                    ", in_game_location_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGamePhoto(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_photo_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGamePhotoUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_photo_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGamePhotoExternalId(
        $external_id
    ) {
        $parameters = array();
        $parameters['in_external_id'] = $external_id; // #"in_external_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_photo_count_external_id(".
                    "in_external_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGamePhotoUrl(
        $url
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_photo_count_url(".
                    "in_url".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGamePhotoUrlExternalId(
        $url
        , $external_id
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
        $parameters['in_external_id'] = $external_id; // #"in_external_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_photo_count_url_external_id(".
                    "in_url".
                    ", in_external_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGamePhotoUuidExternalId(
        $uuid
        , $external_id
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
        $parameters['in_external_id'] = $external_id; // #"in_external_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_photo_count_uuid_external_id(".
                    "in_uuid".
                    ", in_external_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGamePhotoListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_photo_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGamePhotoUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->third_party_oembed != NULL)
                $parameters['in_third_party_oembed'] = $obj->third_party_oembed; // #"in_third_party_oembed"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->third_party_data != NULL)
                $parameters['in_third_party_data'] = $obj->third_party_data; // #"in_third_party_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->third_party_url != NULL)
                $parameters['in_third_party_url'] = $obj->third_party_url; // #"in_third_party_url"
            if($obj->third_party_id != NULL)
                $parameters['in_third_party_id'] = $obj->third_party_id; // #"in_third_party_id"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->external_id != NULL)
                $parameters['in_external_id'] = $obj->external_id; // #"in_external_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_photo_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGamePhotoExternalId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->third_party_oembed != NULL)
                $parameters['in_third_party_oembed'] = $obj->third_party_oembed; // #"in_third_party_oembed"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->third_party_data != NULL)
                $parameters['in_third_party_data'] = $obj->third_party_data; // #"in_third_party_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->third_party_url != NULL)
                $parameters['in_third_party_url'] = $obj->third_party_url; // #"in_third_party_url"
            if($obj->third_party_id != NULL)
                $parameters['in_third_party_id'] = $obj->third_party_id; // #"in_third_party_id"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->external_id != NULL)
                $parameters['in_external_id'] = $obj->external_id; // #"in_external_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_photo_set_external_id(".
                        "in_external_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGamePhotoUrl($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->third_party_oembed != NULL)
                $parameters['in_third_party_oembed'] = $obj->third_party_oembed; // #"in_third_party_oembed"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->third_party_data != NULL)
                $parameters['in_third_party_data'] = $obj->third_party_data; // #"in_third_party_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->third_party_url != NULL)
                $parameters['in_third_party_url'] = $obj->third_party_url; // #"in_third_party_url"
            if($obj->third_party_id != NULL)
                $parameters['in_third_party_id'] = $obj->third_party_id; // #"in_third_party_id"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->external_id != NULL)
                $parameters['in_external_id'] = $obj->external_id; // #"in_external_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_photo_set_url(".
                        "in_url".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGamePhotoUrlExternalId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->third_party_oembed != NULL)
                $parameters['in_third_party_oembed'] = $obj->third_party_oembed; // #"in_third_party_oembed"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->third_party_data != NULL)
                $parameters['in_third_party_data'] = $obj->third_party_data; // #"in_third_party_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->third_party_url != NULL)
                $parameters['in_third_party_url'] = $obj->third_party_url; // #"in_third_party_url"
            if($obj->third_party_id != NULL)
                $parameters['in_third_party_id'] = $obj->third_party_id; // #"in_third_party_id"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->external_id != NULL)
                $parameters['in_external_id'] = $obj->external_id; // #"in_external_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_photo_set_url_external_id(".
                        "in_url".
                        ", in_external_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGamePhotoUuidExternalId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->third_party_oembed != NULL)
                $parameters['in_third_party_oembed'] = $obj->third_party_oembed; // #"in_third_party_oembed"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->third_party_data != NULL)
                $parameters['in_third_party_data'] = $obj->third_party_data; // #"in_third_party_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->third_party_url != NULL)
                $parameters['in_third_party_url'] = $obj->third_party_url; // #"in_third_party_url"
            if($obj->third_party_id != NULL)
                $parameters['in_third_party_id'] = $obj->third_party_id; // #"in_third_party_id"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->external_id != NULL)
                $parameters['in_external_id'] = $obj->external_id; // #"in_external_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_photo_set_uuid_external_id(".
                        "in_uuid".
                        ", in_external_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGamePhotoUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_photo_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGamePhotoExternalId(
        $external_id
    ) {
        $parameters = array();
        $parameters['in_external_id'] = $external_id; // #"in_external_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_photo_del_external_id(".
                    "in_external_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGamePhotoUrl(
        $url
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_photo_del_url(".
                    "in_url".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGamePhotoUrlExternalId(
        $url
        , $external_id
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
        $parameters['in_external_id'] = $external_id; // #"in_external_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_photo_del_url_external_id(".
                    "in_url".
                    ", in_external_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGamePhotoUuidExternalId(
        $uuid
        , $external_id
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
        $parameters['in_external_id'] = $external_id; // #"in_external_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_photo_del_uuid_external_id(".
                    "in_uuid".
                    ", in_external_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGamePhotoList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_photo_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGamePhotoListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_photo_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGamePhotoListExternalId(
        $external_id
    ) {
            
        $parameters = array();
        $parameters['in_external_id'] =  $external_id; //#"in_external_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_photo_get_external_id(".
                    "in_external_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGamePhotoListUrl(
        $url
    ) {
            
        $parameters = array();
        $parameters['in_url'] =  $url; //#"in_url"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_photo_get_url(".
                    "in_url".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGamePhotoListUrlExternalId(
        $url
        , $external_id
    ) {
            
        $parameters = array();
        $parameters['in_url'] =  $url; //#"in_url"
        $parameters['in_external_id'] =  $external_id; //#"in_external_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_photo_get_url_external_id(".
                    "in_url".
                    ", in_external_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGamePhotoListUuidExternalId(
        $uuid
        , $external_id
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
        $parameters['in_external_id'] =  $external_id; //#"in_external_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_photo_get_uuid_external_id(".
                    "in_uuid".
                    ", in_external_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameVideo(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_video_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameVideoUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_video_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameVideoExternalId(
        $external_id
    ) {
        $parameters = array();
        $parameters['in_external_id'] = $external_id; // #"in_external_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_video_count_external_id(".
                    "in_external_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameVideoUrl(
        $url
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_video_count_url(".
                    "in_url".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameVideoUrlExternalId(
        $url
        , $external_id
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
        $parameters['in_external_id'] = $external_id; // #"in_external_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_video_count_url_external_id(".
                    "in_url".
                    ", in_external_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameVideoUuidExternalId(
        $uuid
        , $external_id
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
        $parameters['in_external_id'] = $external_id; // #"in_external_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_video_count_uuid_external_id(".
                    "in_uuid".
                    ", in_external_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameVideoListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_video_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameVideoUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->third_party_oembed != NULL)
                $parameters['in_third_party_oembed'] = $obj->third_party_oembed; // #"in_third_party_oembed"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->third_party_data != NULL)
                $parameters['in_third_party_data'] = $obj->third_party_data; // #"in_third_party_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->third_party_url != NULL)
                $parameters['in_third_party_url'] = $obj->third_party_url; // #"in_third_party_url"
            if($obj->third_party_id != NULL)
                $parameters['in_third_party_id'] = $obj->third_party_id; // #"in_third_party_id"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->external_id != NULL)
                $parameters['in_external_id'] = $obj->external_id; // #"in_external_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_video_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameVideoExternalId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->third_party_oembed != NULL)
                $parameters['in_third_party_oembed'] = $obj->third_party_oembed; // #"in_third_party_oembed"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->third_party_data != NULL)
                $parameters['in_third_party_data'] = $obj->third_party_data; // #"in_third_party_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->third_party_url != NULL)
                $parameters['in_third_party_url'] = $obj->third_party_url; // #"in_third_party_url"
            if($obj->third_party_id != NULL)
                $parameters['in_third_party_id'] = $obj->third_party_id; // #"in_third_party_id"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->external_id != NULL)
                $parameters['in_external_id'] = $obj->external_id; // #"in_external_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_video_set_external_id(".
                        "in_external_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameVideoUrl($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->third_party_oembed != NULL)
                $parameters['in_third_party_oembed'] = $obj->third_party_oembed; // #"in_third_party_oembed"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->third_party_data != NULL)
                $parameters['in_third_party_data'] = $obj->third_party_data; // #"in_third_party_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->third_party_url != NULL)
                $parameters['in_third_party_url'] = $obj->third_party_url; // #"in_third_party_url"
            if($obj->third_party_id != NULL)
                $parameters['in_third_party_id'] = $obj->third_party_id; // #"in_third_party_id"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->external_id != NULL)
                $parameters['in_external_id'] = $obj->external_id; // #"in_external_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_video_set_url(".
                        "in_url".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameVideoUrlExternalId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->third_party_oembed != NULL)
                $parameters['in_third_party_oembed'] = $obj->third_party_oembed; // #"in_third_party_oembed"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->third_party_data != NULL)
                $parameters['in_third_party_data'] = $obj->third_party_data; // #"in_third_party_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->third_party_url != NULL)
                $parameters['in_third_party_url'] = $obj->third_party_url; // #"in_third_party_url"
            if($obj->third_party_id != NULL)
                $parameters['in_third_party_id'] = $obj->third_party_id; // #"in_third_party_id"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->external_id != NULL)
                $parameters['in_external_id'] = $obj->external_id; // #"in_external_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_video_set_url_external_id(".
                        "in_url".
                        ", in_external_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameVideoUuidExternalId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->third_party_oembed != NULL)
                $parameters['in_third_party_oembed'] = $obj->third_party_oembed; // #"in_third_party_oembed"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->third_party_data != NULL)
                $parameters['in_third_party_data'] = $obj->third_party_data; // #"in_third_party_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->third_party_url != NULL)
                $parameters['in_third_party_url'] = $obj->third_party_url; // #"in_third_party_url"
            if($obj->third_party_id != NULL)
                $parameters['in_third_party_id'] = $obj->third_party_id; // #"in_third_party_id"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->external_id != NULL)
                $parameters['in_external_id'] = $obj->external_id; // #"in_external_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_video_set_uuid_external_id(".
                        "in_uuid".
                        ", in_external_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameVideoUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_video_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameVideoExternalId(
        $external_id
    ) {
        $parameters = array();
        $parameters['in_external_id'] = $external_id; // #"in_external_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_video_del_external_id(".
                    "in_external_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameVideoUrl(
        $url
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_video_del_url(".
                    "in_url".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameVideoUrlExternalId(
        $url
        , $external_id
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
        $parameters['in_external_id'] = $external_id; // #"in_external_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_video_del_url_external_id(".
                    "in_url".
                    ", in_external_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameVideoUuidExternalId(
        $uuid
        , $external_id
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
        $parameters['in_external_id'] = $external_id; // #"in_external_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_video_del_uuid_external_id(".
                    "in_uuid".
                    ", in_external_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameVideoList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_video_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameVideoListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_video_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameVideoListExternalId(
        $external_id
    ) {
            
        $parameters = array();
        $parameters['in_external_id'] =  $external_id; //#"in_external_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_video_get_external_id(".
                    "in_external_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameVideoListUrl(
        $url
    ) {
            
        $parameters = array();
        $parameters['in_url'] =  $url; //#"in_url"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_video_get_url(".
                    "in_url".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameVideoListUrlExternalId(
        $url
        , $external_id
    ) {
            
        $parameters = array();
        $parameters['in_url'] =  $url; //#"in_url"
        $parameters['in_external_id'] =  $external_id; //#"in_external_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_video_get_url_external_id(".
                    "in_url".
                    ", in_external_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameVideoListUuidExternalId(
        $uuid
        , $external_id
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
        $parameters['in_external_id'] =  $external_id; //#"in_external_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_video_get_uuid_external_id(".
                    "in_uuid".
                    ", in_external_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameRpgItemWeapon(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_weapon_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameRpgItemWeaponUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_weapon_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameRpgItemWeaponGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_weapon_count_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameRpgItemWeaponUrl(
        $url
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_weapon_count_url(".
                    "in_url".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameRpgItemWeaponUrlGameId(
        $url
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_weapon_count_url_game_id(".
                    "in_url".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameRpgItemWeaponUuidGameId(
        $uuid
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_weapon_count_uuid_game_id(".
                    "in_uuid".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameRpgItemWeaponListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_weapon_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameRpgItemWeaponUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->third_party_oembed != NULL)
                $parameters['in_third_party_oembed'] = $obj->third_party_oembed; // #"in_third_party_oembed"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->game_defense != NULL)
                $parameters['in_game_defense'] = $obj->game_defense; // #"in_game_defense"
            if($obj->third_party_url != NULL)
                $parameters['in_third_party_url'] = $obj->third_party_url; // #"in_third_party_url"
            if($obj->third_party_id != NULL)
                $parameters['in_third_party_id'] = $obj->third_party_id; // #"in_third_party_id"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->game_attack != NULL)
                $parameters['in_game_attack'] = $obj->game_attack; // #"in_game_attack"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->third_party_data != NULL)
                $parameters['in_third_party_data'] = $obj->third_party_data; // #"in_third_party_data"
            if($obj->game_price != NULL)
                $parameters['in_game_price'] = $obj->game_price; // #"in_game_price"
            if($obj->game_type != NULL)
                $parameters['in_game_type'] = $obj->game_type; // #"in_game_type"
            if($obj->game_skill != NULL)
                $parameters['in_game_skill'] = $obj->game_skill; // #"in_game_skill"
            if($obj->game_health != NULL)
                $parameters['in_game_health'] = $obj->game_health; // #"in_game_health"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->game_energy != NULL)
                $parameters['in_game_energy'] = $obj->game_energy; // #"in_game_energy"
            if($obj->game_data != NULL)
                $parameters['in_game_data'] = $obj->game_data; // #"in_game_data"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_rpg_item_weapon_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameRpgItemWeaponGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->third_party_oembed != NULL)
                $parameters['in_third_party_oembed'] = $obj->third_party_oembed; // #"in_third_party_oembed"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->game_defense != NULL)
                $parameters['in_game_defense'] = $obj->game_defense; // #"in_game_defense"
            if($obj->third_party_url != NULL)
                $parameters['in_third_party_url'] = $obj->third_party_url; // #"in_third_party_url"
            if($obj->third_party_id != NULL)
                $parameters['in_third_party_id'] = $obj->third_party_id; // #"in_third_party_id"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->game_attack != NULL)
                $parameters['in_game_attack'] = $obj->game_attack; // #"in_game_attack"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->third_party_data != NULL)
                $parameters['in_third_party_data'] = $obj->third_party_data; // #"in_third_party_data"
            if($obj->game_price != NULL)
                $parameters['in_game_price'] = $obj->game_price; // #"in_game_price"
            if($obj->game_type != NULL)
                $parameters['in_game_type'] = $obj->game_type; // #"in_game_type"
            if($obj->game_skill != NULL)
                $parameters['in_game_skill'] = $obj->game_skill; // #"in_game_skill"
            if($obj->game_health != NULL)
                $parameters['in_game_health'] = $obj->game_health; // #"in_game_health"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->game_energy != NULL)
                $parameters['in_game_energy'] = $obj->game_energy; // #"in_game_energy"
            if($obj->game_data != NULL)
                $parameters['in_game_data'] = $obj->game_data; // #"in_game_data"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_rpg_item_weapon_set_game_id(".
                        "in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameRpgItemWeaponUrl($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->third_party_oembed != NULL)
                $parameters['in_third_party_oembed'] = $obj->third_party_oembed; // #"in_third_party_oembed"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->game_defense != NULL)
                $parameters['in_game_defense'] = $obj->game_defense; // #"in_game_defense"
            if($obj->third_party_url != NULL)
                $parameters['in_third_party_url'] = $obj->third_party_url; // #"in_third_party_url"
            if($obj->third_party_id != NULL)
                $parameters['in_third_party_id'] = $obj->third_party_id; // #"in_third_party_id"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->game_attack != NULL)
                $parameters['in_game_attack'] = $obj->game_attack; // #"in_game_attack"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->third_party_data != NULL)
                $parameters['in_third_party_data'] = $obj->third_party_data; // #"in_third_party_data"
            if($obj->game_price != NULL)
                $parameters['in_game_price'] = $obj->game_price; // #"in_game_price"
            if($obj->game_type != NULL)
                $parameters['in_game_type'] = $obj->game_type; // #"in_game_type"
            if($obj->game_skill != NULL)
                $parameters['in_game_skill'] = $obj->game_skill; // #"in_game_skill"
            if($obj->game_health != NULL)
                $parameters['in_game_health'] = $obj->game_health; // #"in_game_health"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->game_energy != NULL)
                $parameters['in_game_energy'] = $obj->game_energy; // #"in_game_energy"
            if($obj->game_data != NULL)
                $parameters['in_game_data'] = $obj->game_data; // #"in_game_data"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_rpg_item_weapon_set_url(".
                        "in_url".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameRpgItemWeaponUrlGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->third_party_oembed != NULL)
                $parameters['in_third_party_oembed'] = $obj->third_party_oembed; // #"in_third_party_oembed"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->game_defense != NULL)
                $parameters['in_game_defense'] = $obj->game_defense; // #"in_game_defense"
            if($obj->third_party_url != NULL)
                $parameters['in_third_party_url'] = $obj->third_party_url; // #"in_third_party_url"
            if($obj->third_party_id != NULL)
                $parameters['in_third_party_id'] = $obj->third_party_id; // #"in_third_party_id"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->game_attack != NULL)
                $parameters['in_game_attack'] = $obj->game_attack; // #"in_game_attack"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->third_party_data != NULL)
                $parameters['in_third_party_data'] = $obj->third_party_data; // #"in_third_party_data"
            if($obj->game_price != NULL)
                $parameters['in_game_price'] = $obj->game_price; // #"in_game_price"
            if($obj->game_type != NULL)
                $parameters['in_game_type'] = $obj->game_type; // #"in_game_type"
            if($obj->game_skill != NULL)
                $parameters['in_game_skill'] = $obj->game_skill; // #"in_game_skill"
            if($obj->game_health != NULL)
                $parameters['in_game_health'] = $obj->game_health; // #"in_game_health"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->game_energy != NULL)
                $parameters['in_game_energy'] = $obj->game_energy; // #"in_game_energy"
            if($obj->game_data != NULL)
                $parameters['in_game_data'] = $obj->game_data; // #"in_game_data"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_rpg_item_weapon_set_url_game_id(".
                        "in_url".
                        ", in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameRpgItemWeaponUuidGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->third_party_oembed != NULL)
                $parameters['in_third_party_oembed'] = $obj->third_party_oembed; // #"in_third_party_oembed"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->game_defense != NULL)
                $parameters['in_game_defense'] = $obj->game_defense; // #"in_game_defense"
            if($obj->third_party_url != NULL)
                $parameters['in_third_party_url'] = $obj->third_party_url; // #"in_third_party_url"
            if($obj->third_party_id != NULL)
                $parameters['in_third_party_id'] = $obj->third_party_id; // #"in_third_party_id"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->game_attack != NULL)
                $parameters['in_game_attack'] = $obj->game_attack; // #"in_game_attack"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->third_party_data != NULL)
                $parameters['in_third_party_data'] = $obj->third_party_data; // #"in_third_party_data"
            if($obj->game_price != NULL)
                $parameters['in_game_price'] = $obj->game_price; // #"in_game_price"
            if($obj->game_type != NULL)
                $parameters['in_game_type'] = $obj->game_type; // #"in_game_type"
            if($obj->game_skill != NULL)
                $parameters['in_game_skill'] = $obj->game_skill; // #"in_game_skill"
            if($obj->game_health != NULL)
                $parameters['in_game_health'] = $obj->game_health; // #"in_game_health"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->game_energy != NULL)
                $parameters['in_game_energy'] = $obj->game_energy; // #"in_game_energy"
            if($obj->game_data != NULL)
                $parameters['in_game_data'] = $obj->game_data; // #"in_game_data"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_rpg_item_weapon_set_uuid_game_id(".
                        "in_uuid".
                        ", in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameRpgItemWeaponUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_weapon_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameRpgItemWeaponGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_weapon_del_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameRpgItemWeaponUrl(
        $url
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_weapon_del_url(".
                    "in_url".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameRpgItemWeaponUrlGameId(
        $url
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_weapon_del_url_game_id(".
                    "in_url".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameRpgItemWeaponUuidGameId(
        $uuid
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_weapon_del_uuid_game_id(".
                    "in_uuid".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameRpgItemWeaponList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_weapon_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameRpgItemWeaponListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_weapon_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameRpgItemWeaponListGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_weapon_get_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameRpgItemWeaponListUrl(
        $url
    ) {
            
        $parameters = array();
        $parameters['in_url'] =  $url; //#"in_url"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_weapon_get_url(".
                    "in_url".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameRpgItemWeaponListUrlGameId(
        $url
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_url'] =  $url; //#"in_url"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_weapon_get_url_game_id(".
                    "in_url".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameRpgItemWeaponListUuidGameId(
        $uuid
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_weapon_get_uuid_game_id(".
                    "in_uuid".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameRpgItemSkill(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_skill_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameRpgItemSkillUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_skill_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameRpgItemSkillGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_skill_count_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameRpgItemSkillUrl(
        $url
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_skill_count_url(".
                    "in_url".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameRpgItemSkillUrlGameId(
        $url
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_skill_count_url_game_id(".
                    "in_url".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameRpgItemSkillUuidGameId(
        $uuid
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_skill_count_uuid_game_id(".
                    "in_uuid".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameRpgItemSkillListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_skill_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameRpgItemSkillUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->third_party_oembed != NULL)
                $parameters['in_third_party_oembed'] = $obj->third_party_oembed; // #"in_third_party_oembed"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->game_defense != NULL)
                $parameters['in_game_defense'] = $obj->game_defense; // #"in_game_defense"
            if($obj->third_party_url != NULL)
                $parameters['in_third_party_url'] = $obj->third_party_url; // #"in_third_party_url"
            if($obj->third_party_id != NULL)
                $parameters['in_third_party_id'] = $obj->third_party_id; // #"in_third_party_id"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->game_attack != NULL)
                $parameters['in_game_attack'] = $obj->game_attack; // #"in_game_attack"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->third_party_data != NULL)
                $parameters['in_third_party_data'] = $obj->third_party_data; // #"in_third_party_data"
            if($obj->game_price != NULL)
                $parameters['in_game_price'] = $obj->game_price; // #"in_game_price"
            if($obj->game_type != NULL)
                $parameters['in_game_type'] = $obj->game_type; // #"in_game_type"
            if($obj->game_skill != NULL)
                $parameters['in_game_skill'] = $obj->game_skill; // #"in_game_skill"
            if($obj->game_health != NULL)
                $parameters['in_game_health'] = $obj->game_health; // #"in_game_health"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->game_energy != NULL)
                $parameters['in_game_energy'] = $obj->game_energy; // #"in_game_energy"
            if($obj->game_data != NULL)
                $parameters['in_game_data'] = $obj->game_data; // #"in_game_data"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_rpg_item_skill_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameRpgItemSkillGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->third_party_oembed != NULL)
                $parameters['in_third_party_oembed'] = $obj->third_party_oembed; // #"in_third_party_oembed"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->game_defense != NULL)
                $parameters['in_game_defense'] = $obj->game_defense; // #"in_game_defense"
            if($obj->third_party_url != NULL)
                $parameters['in_third_party_url'] = $obj->third_party_url; // #"in_third_party_url"
            if($obj->third_party_id != NULL)
                $parameters['in_third_party_id'] = $obj->third_party_id; // #"in_third_party_id"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->game_attack != NULL)
                $parameters['in_game_attack'] = $obj->game_attack; // #"in_game_attack"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->third_party_data != NULL)
                $parameters['in_third_party_data'] = $obj->third_party_data; // #"in_third_party_data"
            if($obj->game_price != NULL)
                $parameters['in_game_price'] = $obj->game_price; // #"in_game_price"
            if($obj->game_type != NULL)
                $parameters['in_game_type'] = $obj->game_type; // #"in_game_type"
            if($obj->game_skill != NULL)
                $parameters['in_game_skill'] = $obj->game_skill; // #"in_game_skill"
            if($obj->game_health != NULL)
                $parameters['in_game_health'] = $obj->game_health; // #"in_game_health"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->game_energy != NULL)
                $parameters['in_game_energy'] = $obj->game_energy; // #"in_game_energy"
            if($obj->game_data != NULL)
                $parameters['in_game_data'] = $obj->game_data; // #"in_game_data"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_rpg_item_skill_set_game_id(".
                        "in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameRpgItemSkillUrl($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->third_party_oembed != NULL)
                $parameters['in_third_party_oembed'] = $obj->third_party_oembed; // #"in_third_party_oembed"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->game_defense != NULL)
                $parameters['in_game_defense'] = $obj->game_defense; // #"in_game_defense"
            if($obj->third_party_url != NULL)
                $parameters['in_third_party_url'] = $obj->third_party_url; // #"in_third_party_url"
            if($obj->third_party_id != NULL)
                $parameters['in_third_party_id'] = $obj->third_party_id; // #"in_third_party_id"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->game_attack != NULL)
                $parameters['in_game_attack'] = $obj->game_attack; // #"in_game_attack"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->third_party_data != NULL)
                $parameters['in_third_party_data'] = $obj->third_party_data; // #"in_third_party_data"
            if($obj->game_price != NULL)
                $parameters['in_game_price'] = $obj->game_price; // #"in_game_price"
            if($obj->game_type != NULL)
                $parameters['in_game_type'] = $obj->game_type; // #"in_game_type"
            if($obj->game_skill != NULL)
                $parameters['in_game_skill'] = $obj->game_skill; // #"in_game_skill"
            if($obj->game_health != NULL)
                $parameters['in_game_health'] = $obj->game_health; // #"in_game_health"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->game_energy != NULL)
                $parameters['in_game_energy'] = $obj->game_energy; // #"in_game_energy"
            if($obj->game_data != NULL)
                $parameters['in_game_data'] = $obj->game_data; // #"in_game_data"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_rpg_item_skill_set_url(".
                        "in_url".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameRpgItemSkillUrlGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->third_party_oembed != NULL)
                $parameters['in_third_party_oembed'] = $obj->third_party_oembed; // #"in_third_party_oembed"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->game_defense != NULL)
                $parameters['in_game_defense'] = $obj->game_defense; // #"in_game_defense"
            if($obj->third_party_url != NULL)
                $parameters['in_third_party_url'] = $obj->third_party_url; // #"in_third_party_url"
            if($obj->third_party_id != NULL)
                $parameters['in_third_party_id'] = $obj->third_party_id; // #"in_third_party_id"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->game_attack != NULL)
                $parameters['in_game_attack'] = $obj->game_attack; // #"in_game_attack"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->third_party_data != NULL)
                $parameters['in_third_party_data'] = $obj->third_party_data; // #"in_third_party_data"
            if($obj->game_price != NULL)
                $parameters['in_game_price'] = $obj->game_price; // #"in_game_price"
            if($obj->game_type != NULL)
                $parameters['in_game_type'] = $obj->game_type; // #"in_game_type"
            if($obj->game_skill != NULL)
                $parameters['in_game_skill'] = $obj->game_skill; // #"in_game_skill"
            if($obj->game_health != NULL)
                $parameters['in_game_health'] = $obj->game_health; // #"in_game_health"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->game_energy != NULL)
                $parameters['in_game_energy'] = $obj->game_energy; // #"in_game_energy"
            if($obj->game_data != NULL)
                $parameters['in_game_data'] = $obj->game_data; // #"in_game_data"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_rpg_item_skill_set_url_game_id(".
                        "in_url".
                        ", in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameRpgItemSkillUuidGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->third_party_oembed != NULL)
                $parameters['in_third_party_oembed'] = $obj->third_party_oembed; // #"in_third_party_oembed"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->game_defense != NULL)
                $parameters['in_game_defense'] = $obj->game_defense; // #"in_game_defense"
            if($obj->third_party_url != NULL)
                $parameters['in_third_party_url'] = $obj->third_party_url; // #"in_third_party_url"
            if($obj->third_party_id != NULL)
                $parameters['in_third_party_id'] = $obj->third_party_id; // #"in_third_party_id"
            if($obj->content_type != NULL)
                $parameters['in_content_type'] = $obj->content_type; // #"in_content_type"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->game_attack != NULL)
                $parameters['in_game_attack'] = $obj->game_attack; // #"in_game_attack"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->third_party_data != NULL)
                $parameters['in_third_party_data'] = $obj->third_party_data; // #"in_third_party_data"
            if($obj->game_price != NULL)
                $parameters['in_game_price'] = $obj->game_price; // #"in_game_price"
            if($obj->game_type != NULL)
                $parameters['in_game_type'] = $obj->game_type; // #"in_game_type"
            if($obj->game_skill != NULL)
                $parameters['in_game_skill'] = $obj->game_skill; // #"in_game_skill"
            if($obj->game_health != NULL)
                $parameters['in_game_health'] = $obj->game_health; // #"in_game_health"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->game_energy != NULL)
                $parameters['in_game_energy'] = $obj->game_energy; // #"in_game_energy"
            if($obj->game_data != NULL)
                $parameters['in_game_data'] = $obj->game_data; // #"in_game_data"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_rpg_item_skill_set_uuid_game_id(".
                        "in_uuid".
                        ", in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameRpgItemSkillUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_skill_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameRpgItemSkillGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_skill_del_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameRpgItemSkillUrl(
        $url
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_skill_del_url(".
                    "in_url".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameRpgItemSkillUrlGameId(
        $url
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_skill_del_url_game_id(".
                    "in_url".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameRpgItemSkillUuidGameId(
        $uuid
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_skill_del_uuid_game_id(".
                    "in_uuid".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameRpgItemSkillList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_skill_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameRpgItemSkillListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_skill_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameRpgItemSkillListGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_skill_get_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameRpgItemSkillListUrl(
        $url
    ) {
            
        $parameters = array();
        $parameters['in_url'] =  $url; //#"in_url"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_skill_get_url(".
                    "in_url".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameRpgItemSkillListUrlGameId(
        $url
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_url'] =  $url; //#"in_url"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_skill_get_url_game_id(".
                    "in_url".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameRpgItemSkillListUuidGameId(
        $uuid
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_rpg_item_skill_get_uuid_game_id(".
                    "in_uuid".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameProduct(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_product_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProductUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_product_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProductGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_product_count_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProductUrl(
        $url
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_product_count_url(".
                    "in_url".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProductUrlGameId(
        $url
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_product_count_url_game_id(".
                    "in_url".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProductUuidGameId(
        $uuid
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_product_count_uuid_game_id(".
                    "in_uuid".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameProductListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_product_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameProductUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_product_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProductGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_product_set_game_id(".
                        "in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProductUrl($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_product_set_url(".
                        "in_url".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProductUrlGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_product_set_url_game_id(".
                        "in_url".
                        ", in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProductUuidGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_product_set_uuid_game_id(".
                        "in_uuid".
                        ", in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameProductUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_product_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameProductGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_product_del_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameProductUrl(
        $url
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_product_del_url(".
                    "in_url".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameProductUrlGameId(
        $url
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_product_del_url_game_id(".
                    "in_url".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameProductUuidGameId(
        $uuid
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_product_del_uuid_game_id(".
                    "in_uuid".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameProductList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_product_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProductListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_product_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProductListGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_product_get_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProductListUrl(
        $url
    ) {
            
        $parameters = array();
        $parameters['in_url'] =  $url; //#"in_url"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_product_get_url(".
                    "in_url".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProductListUrlGameId(
        $url
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_url'] =  $url; //#"in_url"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_product_get_url_game_id(".
                    "in_url".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProductListUuidGameId(
        $uuid
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_product_get_uuid_game_id(".
                    "in_uuid".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameStatisticLeaderboard(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticLeaderboardUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticLeaderboardGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_count_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticLeaderboardCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_count_code(".
                    "in_code".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticLeaderboardCodeGameId(
        $code
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_count_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticLeaderboardCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_count_code_game_id_profile_id(".
                    "in_code".
                    ", in_game_id".
                    ", in_profile_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_timestamp'] = $timestamp; // #"in_timestamp"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_count_code_game_id_profile_id_ti(".
                    "in_code".
                    ", in_game_id".
                    ", in_profile_id".
                    ", in_timestamp".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticLeaderboardProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_count_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameStatisticLeaderboardListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameStatisticLeaderboardUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->rank != NULL)
                $parameters['in_rank'] = $obj->rank; // #"in_rank"
            if($obj->rank_change != NULL)
                $parameters['in_rank_change'] = $obj->rank_change; // #"in_rank_change"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->rank_total_count != NULL)
                $parameters['in_rank_total_count'] = $obj->rank_total_count; // #"in_rank_total_count"
            if($obj->absolute_value != NULL)
                $parameters['in_absolute_value'] = $obj->absolute_value; // #"in_absolute_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->network != NULL)
                $parameters['in_network'] = $obj->network; // #"in_network"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_statistic_leaderboard_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameStatisticLeaderboardUuidProfileIdGameIdTimestamp($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->rank != NULL)
                $parameters['in_rank'] = $obj->rank; // #"in_rank"
            if($obj->rank_change != NULL)
                $parameters['in_rank_change'] = $obj->rank_change; // #"in_rank_change"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->rank_total_count != NULL)
                $parameters['in_rank_total_count'] = $obj->rank_total_count; // #"in_rank_total_count"
            if($obj->absolute_value != NULL)
                $parameters['in_absolute_value'] = $obj->absolute_value; // #"in_absolute_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->network != NULL)
                $parameters['in_network'] = $obj->network; // #"in_network"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_statistic_leaderboard_set_uuid_profile_id_game_id_time(".
                        "in_uuid".
                        ", in_profile_id".
                        ", in_game_id".
                        ", in_timestamp".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameStatisticLeaderboardCode($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->rank != NULL)
                $parameters['in_rank'] = $obj->rank; // #"in_rank"
            if($obj->rank_change != NULL)
                $parameters['in_rank_change'] = $obj->rank_change; // #"in_rank_change"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->rank_total_count != NULL)
                $parameters['in_rank_total_count'] = $obj->rank_total_count; // #"in_rank_total_count"
            if($obj->absolute_value != NULL)
                $parameters['in_absolute_value'] = $obj->absolute_value; // #"in_absolute_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->network != NULL)
                $parameters['in_network'] = $obj->network; // #"in_network"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_statistic_leaderboard_set_code(".
                        "in_code".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameStatisticLeaderboardCodeGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->rank != NULL)
                $parameters['in_rank'] = $obj->rank; // #"in_rank"
            if($obj->rank_change != NULL)
                $parameters['in_rank_change'] = $obj->rank_change; // #"in_rank_change"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->rank_total_count != NULL)
                $parameters['in_rank_total_count'] = $obj->rank_total_count; // #"in_rank_total_count"
            if($obj->absolute_value != NULL)
                $parameters['in_absolute_value'] = $obj->absolute_value; // #"in_absolute_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->network != NULL)
                $parameters['in_network'] = $obj->network; // #"in_network"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_statistic_leaderboard_set_code_game_id(".
                        "in_code".
                        ", in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameStatisticLeaderboardCodeGameIdProfileId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->rank != NULL)
                $parameters['in_rank'] = $obj->rank; // #"in_rank"
            if($obj->rank_change != NULL)
                $parameters['in_rank_change'] = $obj->rank_change; // #"in_rank_change"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->rank_total_count != NULL)
                $parameters['in_rank_total_count'] = $obj->rank_total_count; // #"in_rank_total_count"
            if($obj->absolute_value != NULL)
                $parameters['in_absolute_value'] = $obj->absolute_value; // #"in_absolute_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->network != NULL)
                $parameters['in_network'] = $obj->network; // #"in_network"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_statistic_leaderboard_set_code_game_id_profile_id(".
                        "in_code".
                        ", in_game_id".
                        ", in_profile_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->rank != NULL)
                $parameters['in_rank'] = $obj->rank; // #"in_rank"
            if($obj->rank_change != NULL)
                $parameters['in_rank_change'] = $obj->rank_change; // #"in_rank_change"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->rank_total_count != NULL)
                $parameters['in_rank_total_count'] = $obj->rank_total_count; // #"in_rank_total_count"
            if($obj->absolute_value != NULL)
                $parameters['in_absolute_value'] = $obj->absolute_value; // #"in_absolute_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->network != NULL)
                $parameters['in_network'] = $obj->network; // #"in_network"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_statistic_leaderboard_set_code_game_id_profile_id_time(".
                        "in_code".
                        ", in_game_id".
                        ", in_profile_id".
                        ", in_timestamp".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameStatisticLeaderboardUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameStatisticLeaderboardCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_del_code(".
                    "in_code".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameStatisticLeaderboardCodeGameId(
        $code
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_del_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameStatisticLeaderboardCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_del_code_game_id_profile_id(".
                    "in_code".
                    ", in_game_id".
                    ", in_profile_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_timestamp'] = $timestamp; // #"in_timestamp"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_del_code_game_id_profile_id_time(".
                    "in_code".
                    ", in_game_id".
                    ", in_profile_id".
                    ", in_timestamp".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameStatisticLeaderboardProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_del_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameStatisticLeaderboardList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardListGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_get_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardListCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_get_code(".
                    "in_code".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardListCodeGameId(
        $code
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_get_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardListCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_get_code_game_id_profile_id(".
                    "in_code".
                    ", in_game_id".
                    ", in_profile_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_timestamp'] =  $timestamp; //#"in_timestamp"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_get_code_game_id_profile_id_time(".
                    "in_code".
                    ", in_game_id".
                    ", in_profile_id".
                    ", in_timestamp".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardListProfileIdGameId(
        $profile_id
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_get_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_timestamp'] =  $timestamp; //#"in_timestamp"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_get_profile_id_game_id_timestamp(".
                    "in_profile_id".
                    ", in_game_id".
                    ", in_timestamp".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameStatisticLeaderboardItem(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticLeaderboardItemUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticLeaderboardItemGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_count_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticLeaderboardItemCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_count_code(".
                    "in_code".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticLeaderboardItemCodeGameId(
        $code
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_count_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticLeaderboardItemCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_count_code_game_id_profile_(".
                    "in_code".
                    ", in_game_id".
                    ", in_profile_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_timestamp'] = $timestamp; // #"in_timestamp"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_count_code_game_id_profile_(".
                    "in_code".
                    ", in_game_id".
                    ", in_profile_id".
                    ", in_timestamp".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticLeaderboardItemProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_count_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameStatisticLeaderboardItemListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameStatisticLeaderboardItemUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->rank != NULL)
                $parameters['in_rank'] = $obj->rank; // #"in_rank"
            if($obj->rank_change != NULL)
                $parameters['in_rank_change'] = $obj->rank_change; // #"in_rank_change"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->rank_total_count != NULL)
                $parameters['in_rank_total_count'] = $obj->rank_total_count; // #"in_rank_total_count"
            if($obj->absolute_value != NULL)
                $parameters['in_absolute_value'] = $obj->absolute_value; // #"in_absolute_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->network != NULL)
                $parameters['in_network'] = $obj->network; // #"in_network"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_statistic_leaderboard_item_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestamp($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->rank != NULL)
                $parameters['in_rank'] = $obj->rank; // #"in_rank"
            if($obj->rank_change != NULL)
                $parameters['in_rank_change'] = $obj->rank_change; // #"in_rank_change"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->rank_total_count != NULL)
                $parameters['in_rank_total_count'] = $obj->rank_total_count; // #"in_rank_total_count"
            if($obj->absolute_value != NULL)
                $parameters['in_absolute_value'] = $obj->absolute_value; // #"in_absolute_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->network != NULL)
                $parameters['in_network'] = $obj->network; // #"in_network"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_statistic_leaderboard_item_set_uuid_profile_id_game_id(".
                        "in_uuid".
                        ", in_profile_id".
                        ", in_game_id".
                        ", in_timestamp".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameStatisticLeaderboardItemCode($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->rank != NULL)
                $parameters['in_rank'] = $obj->rank; // #"in_rank"
            if($obj->rank_change != NULL)
                $parameters['in_rank_change'] = $obj->rank_change; // #"in_rank_change"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->rank_total_count != NULL)
                $parameters['in_rank_total_count'] = $obj->rank_total_count; // #"in_rank_total_count"
            if($obj->absolute_value != NULL)
                $parameters['in_absolute_value'] = $obj->absolute_value; // #"in_absolute_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->network != NULL)
                $parameters['in_network'] = $obj->network; // #"in_network"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_statistic_leaderboard_item_set_code(".
                        "in_code".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameStatisticLeaderboardItemCodeGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->rank != NULL)
                $parameters['in_rank'] = $obj->rank; // #"in_rank"
            if($obj->rank_change != NULL)
                $parameters['in_rank_change'] = $obj->rank_change; // #"in_rank_change"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->rank_total_count != NULL)
                $parameters['in_rank_total_count'] = $obj->rank_total_count; // #"in_rank_total_count"
            if($obj->absolute_value != NULL)
                $parameters['in_absolute_value'] = $obj->absolute_value; // #"in_absolute_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->network != NULL)
                $parameters['in_network'] = $obj->network; // #"in_network"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_statistic_leaderboard_item_set_code_game_id(".
                        "in_code".
                        ", in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameStatisticLeaderboardItemCodeGameIdProfileId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->rank != NULL)
                $parameters['in_rank'] = $obj->rank; // #"in_rank"
            if($obj->rank_change != NULL)
                $parameters['in_rank_change'] = $obj->rank_change; // #"in_rank_change"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->rank_total_count != NULL)
                $parameters['in_rank_total_count'] = $obj->rank_total_count; // #"in_rank_total_count"
            if($obj->absolute_value != NULL)
                $parameters['in_absolute_value'] = $obj->absolute_value; // #"in_absolute_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->network != NULL)
                $parameters['in_network'] = $obj->network; // #"in_network"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_statistic_leaderboard_item_set_code_game_id_profile_id(".
                        "in_code".
                        ", in_game_id".
                        ", in_profile_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->rank != NULL)
                $parameters['in_rank'] = $obj->rank; // #"in_rank"
            if($obj->rank_change != NULL)
                $parameters['in_rank_change'] = $obj->rank_change; // #"in_rank_change"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->rank_total_count != NULL)
                $parameters['in_rank_total_count'] = $obj->rank_total_count; // #"in_rank_total_count"
            if($obj->absolute_value != NULL)
                $parameters['in_absolute_value'] = $obj->absolute_value; // #"in_absolute_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->network != NULL)
                $parameters['in_network'] = $obj->network; // #"in_network"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_statistic_leaderboard_item_set_code_game_id_profile_id(".
                        "in_code".
                        ", in_game_id".
                        ", in_profile_id".
                        ", in_timestamp".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameStatisticLeaderboardItemUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameStatisticLeaderboardItemCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_del_code(".
                    "in_code".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameStatisticLeaderboardItemCodeGameId(
        $code
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_del_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameStatisticLeaderboardItemCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_del_code_game_id_profile_id(".
                    "in_code".
                    ", in_game_id".
                    ", in_profile_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_timestamp'] = $timestamp; // #"in_timestamp"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_del_code_game_id_profile_id(".
                    "in_code".
                    ", in_game_id".
                    ", in_profile_id".
                    ", in_timestamp".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameStatisticLeaderboardItemProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_del_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameStatisticLeaderboardItemList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardItemListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardItemListGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_get_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardItemListCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_get_code(".
                    "in_code".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardItemListCodeGameId(
        $code
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_get_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardItemListCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_get_code_game_id_profile_id(".
                    "in_code".
                    ", in_game_id".
                    ", in_profile_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_timestamp'] =  $timestamp; //#"in_timestamp"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_get_code_game_id_profile_id(".
                    "in_code".
                    ", in_game_id".
                    ", in_profile_id".
                    ", in_timestamp".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardItemListProfileIdGameId(
        $profile_id
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_get_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_timestamp'] =  $timestamp; //#"in_timestamp"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_item_get_profile_id_game_id_time(".
                    "in_profile_id".
                    ", in_game_id".
                    ", in_timestamp".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameStatisticLeaderboardRollup(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticLeaderboardRollupUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticLeaderboardRollupGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_count_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticLeaderboardRollupCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_count_code(".
                    "in_code".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticLeaderboardRollupCodeGameId(
        $code
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_count_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticLeaderboardRollupCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_count_code_game_id_profil(".
                    "in_code".
                    ", in_game_id".
                    ", in_profile_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_timestamp'] = $timestamp; // #"in_timestamp"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_count_code_game_id_profil(".
                    "in_code".
                    ", in_game_id".
                    ", in_profile_id".
                    ", in_timestamp".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticLeaderboardRollupProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_count_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameStatisticLeaderboardRollupListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameStatisticLeaderboardRollupUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->rank != NULL)
                $parameters['in_rank'] = $obj->rank; // #"in_rank"
            if($obj->rank_change != NULL)
                $parameters['in_rank_change'] = $obj->rank_change; // #"in_rank_change"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->rank_total_count != NULL)
                $parameters['in_rank_total_count'] = $obj->rank_total_count; // #"in_rank_total_count"
            if($obj->absolute_value != NULL)
                $parameters['in_absolute_value'] = $obj->absolute_value; // #"in_absolute_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->network != NULL)
                $parameters['in_network'] = $obj->network; // #"in_network"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_statistic_leaderboard_rollup_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestamp($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->rank != NULL)
                $parameters['in_rank'] = $obj->rank; // #"in_rank"
            if($obj->rank_change != NULL)
                $parameters['in_rank_change'] = $obj->rank_change; // #"in_rank_change"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->rank_total_count != NULL)
                $parameters['in_rank_total_count'] = $obj->rank_total_count; // #"in_rank_total_count"
            if($obj->absolute_value != NULL)
                $parameters['in_absolute_value'] = $obj->absolute_value; // #"in_absolute_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->network != NULL)
                $parameters['in_network'] = $obj->network; // #"in_network"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_statistic_leaderboard_rollup_set_uuid_profile_id_game_(".
                        "in_uuid".
                        ", in_profile_id".
                        ", in_game_id".
                        ", in_timestamp".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameStatisticLeaderboardRollupCode($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->rank != NULL)
                $parameters['in_rank'] = $obj->rank; // #"in_rank"
            if($obj->rank_change != NULL)
                $parameters['in_rank_change'] = $obj->rank_change; // #"in_rank_change"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->rank_total_count != NULL)
                $parameters['in_rank_total_count'] = $obj->rank_total_count; // #"in_rank_total_count"
            if($obj->absolute_value != NULL)
                $parameters['in_absolute_value'] = $obj->absolute_value; // #"in_absolute_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->network != NULL)
                $parameters['in_network'] = $obj->network; // #"in_network"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_statistic_leaderboard_rollup_set_code(".
                        "in_code".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameStatisticLeaderboardRollupCodeGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->rank != NULL)
                $parameters['in_rank'] = $obj->rank; // #"in_rank"
            if($obj->rank_change != NULL)
                $parameters['in_rank_change'] = $obj->rank_change; // #"in_rank_change"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->rank_total_count != NULL)
                $parameters['in_rank_total_count'] = $obj->rank_total_count; // #"in_rank_total_count"
            if($obj->absolute_value != NULL)
                $parameters['in_absolute_value'] = $obj->absolute_value; // #"in_absolute_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->network != NULL)
                $parameters['in_network'] = $obj->network; // #"in_network"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_statistic_leaderboard_rollup_set_code_game_id(".
                        "in_code".
                        ", in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameStatisticLeaderboardRollupCodeGameIdProfileId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->rank != NULL)
                $parameters['in_rank'] = $obj->rank; // #"in_rank"
            if($obj->rank_change != NULL)
                $parameters['in_rank_change'] = $obj->rank_change; // #"in_rank_change"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->rank_total_count != NULL)
                $parameters['in_rank_total_count'] = $obj->rank_total_count; // #"in_rank_total_count"
            if($obj->absolute_value != NULL)
                $parameters['in_absolute_value'] = $obj->absolute_value; // #"in_absolute_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->network != NULL)
                $parameters['in_network'] = $obj->network; // #"in_network"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_statistic_leaderboard_rollup_set_code_game_id_profile_(".
                        "in_code".
                        ", in_game_id".
                        ", in_profile_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->rank != NULL)
                $parameters['in_rank'] = $obj->rank; // #"in_rank"
            if($obj->rank_change != NULL)
                $parameters['in_rank_change'] = $obj->rank_change; // #"in_rank_change"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->rank_total_count != NULL)
                $parameters['in_rank_total_count'] = $obj->rank_total_count; // #"in_rank_total_count"
            if($obj->absolute_value != NULL)
                $parameters['in_absolute_value'] = $obj->absolute_value; // #"in_absolute_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->network != NULL)
                $parameters['in_network'] = $obj->network; // #"in_network"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_statistic_leaderboard_rollup_set_code_game_id_profile_(".
                        "in_code".
                        ", in_game_id".
                        ", in_profile_id".
                        ", in_timestamp".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameStatisticLeaderboardRollupUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameStatisticLeaderboardRollupCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_del_code(".
                    "in_code".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameStatisticLeaderboardRollupCodeGameId(
        $code
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_del_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameStatisticLeaderboardRollupCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_del_code_game_id_profile_(".
                    "in_code".
                    ", in_game_id".
                    ", in_profile_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_timestamp'] = $timestamp; // #"in_timestamp"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_del_code_game_id_profile_(".
                    "in_code".
                    ", in_game_id".
                    ", in_profile_id".
                    ", in_timestamp".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameStatisticLeaderboardRollupProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_del_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameStatisticLeaderboardRollupList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardRollupListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardRollupListGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_get_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardRollupListCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_get_code(".
                    "in_code".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardRollupListCodeGameId(
        $code
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_get_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_get_code_game_id_profile_(".
                    "in_code".
                    ", in_game_id".
                    ", in_profile_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_timestamp'] =  $timestamp; //#"in_timestamp"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_get_code_game_id_profile_(".
                    "in_code".
                    ", in_game_id".
                    ", in_profile_id".
                    ", in_timestamp".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardRollupListProfileIdGameId(
        $profile_id
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_get_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_timestamp'] =  $timestamp; //#"in_timestamp"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_rollup_get_profile_id_game_id_ti(".
                    "in_profile_id".
                    ", in_game_id".
                    ", in_timestamp".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameLiveQueue(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_live_queue_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameLiveQueueUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_live_queue_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameLiveQueueProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_live_queue_count_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameLiveQueueListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_live_queue_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameLiveQueueUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->data_stat != NULL)
                $parameters['in_data_stat'] = $obj->data_stat; // #"in_data_stat"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->data_ad != NULL)
                $parameters['in_data_ad'] = $obj->data_ad; // #"in_data_ad"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_live_queue_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameLiveQueueProfileIdGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->data_stat != NULL)
                $parameters['in_data_stat'] = $obj->data_stat; // #"in_data_stat"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->data_ad != NULL)
                $parameters['in_data_ad'] = $obj->data_ad; // #"in_data_ad"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_live_queue_set_profile_id_game_id(".
                        "in_profile_id".
                        ", in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameLiveQueueUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_live_queue_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameLiveQueueProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_live_queue_del_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameLiveQueueList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_live_queue_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameLiveQueueListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_live_queue_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameLiveQueueListGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_live_queue_get_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameLiveQueueListProfileIdGameId(
        $profile_id
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_live_queue_get_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameLiveRecentQueue(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_live_recent_queue_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameLiveRecentQueueUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_live_recent_queue_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameLiveRecentQueueProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_live_recent_queue_count_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameLiveRecentQueueListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_live_recent_queue_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameLiveRecentQueueUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->game != NULL)
                $parameters['in_game'] = $obj->game; // #"in_game"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_live_recent_queue_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameLiveRecentQueueProfileIdGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->game != NULL)
                $parameters['in_game'] = $obj->game; // #"in_game"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_live_recent_queue_set_profile_id_game_id(".
                        "in_profile_id".
                        ", in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameLiveRecentQueueUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_live_recent_queue_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameLiveRecentQueueProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_live_recent_queue_del_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameLiveRecentQueueList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_live_recent_queue_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameLiveRecentQueueListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_live_recent_queue_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameLiveRecentQueueListGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_live_recent_queue_get_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameLiveRecentQueueListProfileIdGameId(
        $profile_id
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_live_recent_queue_get_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameProfileStatistic(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileStatisticUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileStatisticCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_count_code(".
                    "in_code".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileStatisticGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_count_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileStatisticCodeGameId(
        $code
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_count_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileStatisticProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_count_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileStatisticCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_count_code_profile_id_game_id(".
                    "in_code".
                    ", in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileStatisticCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_timestamp'] = $timestamp; // #"in_timestamp"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_count_code_profile_id_game_id_timest(".
                    "in_code".
                    ", in_profile_id".
                    ", in_game_id".
                    ", in_timestamp".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameProfileStatisticListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameProfileStatisticUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->points != NULL)
                $parameters['in_points'] = $obj->points; // #"in_points"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_statistic_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProfileStatisticUuidProfileIdGameIdTimestamp($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->points != NULL)
                $parameters['in_points'] = $obj->points; // #"in_points"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_statistic_set_uuid_profile_id_game_id_timestam(".
                        "in_uuid".
                        ", in_profile_id".
                        ", in_game_id".
                        ", in_timestamp".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProfileStatisticProfileIdCode($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->points != NULL)
                $parameters['in_points'] = $obj->points; // #"in_points"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_statistic_set_profile_id_code(".
                        "in_profile_id".
                        ", in_code".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProfileStatisticProfileIdCodeTimestamp($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->points != NULL)
                $parameters['in_points'] = $obj->points; // #"in_points"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_statistic_set_profile_id_code_timestamp(".
                        "in_profile_id".
                        ", in_code".
                        ", in_timestamp".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProfileStatisticCodeProfileIdGameIdTimestamp($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->points != NULL)
                $parameters['in_points'] = $obj->points; // #"in_points"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_statistic_set_code_profile_id_game_id_timestam(".
                        "in_code".
                        ", in_profile_id".
                        ", in_game_id".
                        ", in_timestamp".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProfileStatisticCodeProfileIdGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->stat_value != NULL)
                $parameters['in_stat_value'] = $obj->stat_value; // #"in_stat_value"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->points != NULL)
                $parameters['in_points'] = $obj->points; // #"in_points"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_statistic_set_code_profile_id_game_id(".
                        "in_code".
                        ", in_profile_id".
                        ", in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameProfileStatisticUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameProfileStatisticCodeGameId(
        $code
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_del_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameProfileStatisticProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_del_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameProfileStatisticCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_del_code_profile_id_game_id(".
                    "in_code".
                    ", in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameProfileStatisticListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileStatisticListCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_get_code(".
                    "in_code".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileStatisticListGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_get_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileStatisticListCodeGameId(
        $code
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_get_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileStatisticListProfileIdGameId(
        $profile_id
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_get_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileStatisticListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_timestamp'] =  $timestamp; //#"in_timestamp"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_get_profile_id_game_id_timestamp(".
                    "in_profile_id".
                    ", in_game_id".
                    ", in_timestamp".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileStatisticListCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_get_code_profile_id_game_id(".
                    "in_code".
                    ", in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_timestamp'] =  $timestamp; //#"in_timestamp"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_get_code_profile_id_game_id_timestam(".
                    "in_code".
                    ", in_profile_id".
                    ", in_game_id".
                    ", in_timestamp".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameStatisticMeta(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_meta_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticMetaUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_meta_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticMetaCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_meta_count_code(".
                    "in_code".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticMetaCodeGameId(
        $code
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_meta_count_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticMetaName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_meta_count_name(".
                    "in_name".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticMetaGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_meta_count_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameStatisticMetaListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_meta_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameStatisticMetaUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->sort != NULL)
                $parameters['in_sort'] = $obj->sort; // #"in_sort"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->points != NULL)
                $parameters['in_points'] = $obj->points; // #"in_points"
            if($obj->store_count != NULL)
                $parameters['in_store_count'] = $obj->store_count; // #"in_store_count"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->order != NULL)
                $parameters['in_order'] = $obj->order; // #"in_order"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_statistic_meta_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameStatisticMetaCodeGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->sort != NULL)
                $parameters['in_sort'] = $obj->sort; // #"in_sort"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->points != NULL)
                $parameters['in_points'] = $obj->points; // #"in_points"
            if($obj->store_count != NULL)
                $parameters['in_store_count'] = $obj->store_count; // #"in_store_count"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->order != NULL)
                $parameters['in_order'] = $obj->order; // #"in_order"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_statistic_meta_set_code_game_id(".
                        "in_code".
                        ", in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameStatisticMetaUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_meta_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameStatisticMetaCodeGameId(
        $code
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_meta_del_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameStatisticMetaListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_meta_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticMetaListCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_meta_get_code(".
                    "in_code".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticMetaListName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_meta_get_name(".
                    "in_name".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticMetaListGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_meta_get_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameStatisticMetaListCodeGameId(
        $code
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_meta_get_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameProfileStatisticTimestamp(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_timestamp_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileStatisticTimestampUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_timestamp_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileStatisticTimestampCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_timestamp_count_code_profile_id_game(".
                    "in_code".
                    ", in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileStatisticTimestampCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_timestamp'] = $timestamp; // #"in_timestamp"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_timestamp_count_code_profile_id_game(".
                    "in_code".
                    ", in_profile_id".
                    ", in_game_id".
                    ", in_timestamp".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameProfileStatisticTimestampListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_timestamp_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameProfileStatisticTimestampUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_statistic_timestamp_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProfileStatisticTimestampCodeProfileIdGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_statistic_timestamp_set_code_profile_id_game_i(".
                        "in_code".
                        ", in_profile_id".
                        ", in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProfileStatisticTimestampCodeProfileIdGameIdTimestamp($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_statistic_timestamp_set_code_profile_id_game_i(".
                        "in_code".
                        ", in_profile_id".
                        ", in_game_id".
                        ", in_timestamp".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameProfileStatisticTimestampUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_timestamp_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameProfileStatisticTimestampCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_timestamp_del_code_profile_id_game_i(".
                    "in_code".
                    ", in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameProfileStatisticTimestampCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_timestamp'] = $timestamp; // #"in_timestamp"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_timestamp_del_code_profile_id_game_i(".
                    "in_code".
                    ", in_profile_id".
                    ", in_game_id".
                    ", in_timestamp".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameProfileStatisticTimestampListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_timestamp_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileStatisticTimestampListCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_timestamp_get_code_profile_id_game_i(".
                    "in_code".
                    ", in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileStatisticTimestampListCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_timestamp'] =  $timestamp; //#"in_timestamp"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_timestamp_get_code_profile_id_game_i(".
                    "in_code".
                    ", in_profile_id".
                    ", in_game_id".
                    ", in_timestamp".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameKeyMeta(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_key_meta_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameKeyMetaUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_key_meta_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameKeyMetaCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_key_meta_count_code(".
                    "in_code".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameKeyMetaCodeGameId(
        $code
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_key_meta_count_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameKeyMetaName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_key_meta_count_name(".
                    "in_name".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameKeyMetaKey(
        $key
    ) {
        $parameters = array();
        $parameters['in_key'] = $key; // #"in_key"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_key_meta_count_key(".
                    "in_key".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameKeyMetaGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_key_meta_count_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameKeyMetaKeyGameId(
        $key
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_key'] = $key; // #"in_key"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_key_meta_count_key_game_id(".
                    "in_key".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameKeyMetaListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_key_meta_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameKeyMetaUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->sort != NULL)
                $parameters['in_sort'] = $obj->sort; // #"in_sort"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->key_level != NULL)
                $parameters['in_key_level'] = $obj->key_level; // #"in_key_level"
            if($obj->store_count != NULL)
                $parameters['in_store_count'] = $obj->store_count; // #"in_store_count"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->order != NULL)
                $parameters['in_order'] = $obj->order; // #"in_order"
            if($obj->key_stat != NULL)
                $parameters['in_key_stat'] = $obj->key_stat; // #"in_key_stat"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_key_meta_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameKeyMetaCodeGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->sort != NULL)
                $parameters['in_sort'] = $obj->sort; // #"in_sort"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->key_level != NULL)
                $parameters['in_key_level'] = $obj->key_level; // #"in_key_level"
            if($obj->store_count != NULL)
                $parameters['in_store_count'] = $obj->store_count; // #"in_store_count"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->order != NULL)
                $parameters['in_order'] = $obj->order; // #"in_order"
            if($obj->key_stat != NULL)
                $parameters['in_key_stat'] = $obj->key_stat; // #"in_key_stat"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_key_meta_set_code_game_id(".
                        "in_code".
                        ", in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameKeyMetaKeyGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->sort != NULL)
                $parameters['in_sort'] = $obj->sort; // #"in_sort"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->key_level != NULL)
                $parameters['in_key_level'] = $obj->key_level; // #"in_key_level"
            if($obj->store_count != NULL)
                $parameters['in_store_count'] = $obj->store_count; // #"in_store_count"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->order != NULL)
                $parameters['in_order'] = $obj->order; // #"in_order"
            if($obj->key_stat != NULL)
                $parameters['in_key_stat'] = $obj->key_stat; // #"in_key_stat"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_key_meta_set_key_game_id(".
                        "in_key".
                        ", in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameKeyMetaKeyGameIdLevel($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->sort != NULL)
                $parameters['in_sort'] = $obj->sort; // #"in_sort"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->key_level != NULL)
                $parameters['in_key_level'] = $obj->key_level; // #"in_key_level"
            if($obj->store_count != NULL)
                $parameters['in_store_count'] = $obj->store_count; // #"in_store_count"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->order != NULL)
                $parameters['in_order'] = $obj->order; // #"in_order"
            if($obj->key_stat != NULL)
                $parameters['in_key_stat'] = $obj->key_stat; // #"in_key_stat"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_key_meta_set_key_game_id_level(".
                        "in_key".
                        ", in_game_id".
                        ", in_level".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameKeyMetaUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_key_meta_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameKeyMetaCodeGameId(
        $code
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_key_meta_del_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameKeyMetaKeyGameId(
        $key
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_key'] = $key; // #"in_key"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_key_meta_del_key_game_id(".
                    "in_key".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameKeyMetaListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_key_meta_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameKeyMetaListCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_key_meta_get_code(".
                    "in_code".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameKeyMetaListCodeGameId(
        $code
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_key_meta_get_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameKeyMetaListName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_key_meta_get_name(".
                    "in_name".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameKeyMetaListKey(
        $key
    ) {
            
        $parameters = array();
        $parameters['in_key'] =  $key; //#"in_key"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_key_meta_get_key(".
                    "in_key".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameKeyMetaListGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_key_meta_get_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameKeyMetaListKeyGameId(
        $key
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_key'] =  $key; //#"in_key"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_key_meta_get_key_game_id(".
                    "in_key".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameKeyMetaListCodeLevel(
        $code
        , $level
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_level'] =  $level; //#"in_level"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_key_meta_get_code_level(".
                    "in_code".
                    ", in_level".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameLevel(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_level_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameLevelUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_level_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameLevelCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_level_count_code(".
                    "in_code".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameLevelCodeGameId(
        $code
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_level_count_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameLevelName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_level_count_name(".
                    "in_name".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameLevelGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_level_count_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameLevelListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_level_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameLevelUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->sort != NULL)
                $parameters['in_sort'] = $obj->sort; // #"in_sort"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->order != NULL)
                $parameters['in_order'] = $obj->order; // #"in_order"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_level_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameLevelCodeGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->sort != NULL)
                $parameters['in_sort'] = $obj->sort; // #"in_sort"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->order != NULL)
                $parameters['in_order'] = $obj->order; // #"in_order"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_level_set_code_game_id(".
                        "in_code".
                        ", in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameLevelUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_level_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameLevelCodeGameId(
        $code
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_level_del_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameLevelListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_level_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameLevelListCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_level_get_code(".
                    "in_code".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameLevelListCodeGameId(
        $code
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_level_get_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameLevelListName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_level_get_name(".
                    "in_name".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameLevelListGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_level_get_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameProfileAchievement(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileAchievementUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileAchievementProfileIdCode(
        $profile_id
        , $code
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_count_profile_id_code(".
                    "in_profile_id".
                    ", in_code".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileAchievementUsername(
        $username
    ) {
        $parameters = array();
        $parameters['in_username'] = $username; // #"in_username"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_count_username(".
                    "in_username".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileAchievementCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_count_code_profile_id_game_id(".
                    "in_code".
                    ", in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileAchievementCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_timestamp'] = $timestamp; // #"in_timestamp"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_count_code_profile_id_game_id_time(".
                    "in_code".
                    ", in_profile_id".
                    ", in_game_id".
                    ", in_timestamp".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameProfileAchievementListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameProfileAchievementUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->completed != NULL)
                $parameters['in_completed'] = $obj->completed; // #"in_completed"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->achievement_value != NULL)
                $parameters['in_achievement_value'] = $obj->achievement_value; // #"in_achievement_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_achievement_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProfileAchievementUuidCode($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->completed != NULL)
                $parameters['in_completed'] = $obj->completed; // #"in_completed"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->achievement_value != NULL)
                $parameters['in_achievement_value'] = $obj->achievement_value; // #"in_achievement_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_achievement_set_uuid_code(".
                        "in_uuid".
                        ", in_code".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProfileAchievementProfileIdCode($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->completed != NULL)
                $parameters['in_completed'] = $obj->completed; // #"in_completed"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->achievement_value != NULL)
                $parameters['in_achievement_value'] = $obj->achievement_value; // #"in_achievement_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_achievement_set_profile_id_code(".
                        "in_profile_id".
                        ", in_code".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProfileAchievementCodeProfileIdGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->completed != NULL)
                $parameters['in_completed'] = $obj->completed; // #"in_completed"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->achievement_value != NULL)
                $parameters['in_achievement_value'] = $obj->achievement_value; // #"in_achievement_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_achievement_set_code_profile_id_game_id(".
                        "in_code".
                        ", in_profile_id".
                        ", in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameProfileAchievementCodeProfileIdGameIdTimestamp($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->completed != NULL)
                $parameters['in_completed'] = $obj->completed; // #"in_completed"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->achievement_value != NULL)
                $parameters['in_achievement_value'] = $obj->achievement_value; // #"in_achievement_value"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_achievement_set_code_profile_id_game_id_timest(".
                        "in_code".
                        ", in_profile_id".
                        ", in_game_id".
                        ", in_timestamp".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameProfileAchievementUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameProfileAchievementProfileIdCode(
        $profile_id
        , $code
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_del_profile_id_code(".
                    "in_profile_id".
                    ", in_code".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameProfileAchievementUuidCode(
        $uuid
        , $code
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_del_uuid_code(".
                    "in_uuid".
                    ", in_code".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameProfileAchievementListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileAchievementListProfileIdCode(
        $profile_id
        , $code
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_get_profile_id_code(".
                    "in_profile_id".
                    ", in_code".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileAchievementListUsername(
        $username
    ) {
            
        $parameters = array();
        $parameters['in_username'] =  $username; //#"in_username"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_get_username(".
                    "in_username".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileAchievementListCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_get_code(".
                    "in_code".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileAchievementListGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_get_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileAchievementListCodeGameId(
        $code
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_get_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileAchievementListProfileIdGameId(
        $profile_id
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_get_profile_id_game_id(".
                    "in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileAchievementListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_timestamp'] =  $timestamp; //#"in_timestamp"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_get_profile_id_game_id_timestamp(".
                    "in_profile_id".
                    ", in_game_id".
                    ", in_timestamp".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileAchievementListCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_get_code_profile_id_game_id(".
                    "in_code".
                    ", in_profile_id".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_timestamp'] =  $timestamp; //#"in_timestamp"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_get_code_profile_id_game_id_timest(".
                    "in_code".
                    ", in_profile_id".
                    ", in_game_id".
                    ", in_timestamp".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountGameAchievementMeta(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_meta_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameAchievementMetaUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_meta_count_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameAchievementMetaCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_meta_count_code(".
                    "in_code".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameAchievementMetaCodeGameId(
        $code
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_meta_count_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameAchievementMetaName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_meta_count_name(".
                    "in_name".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameAchievementMetaGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_meta_count_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseGameAchievementMetaListFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_meta_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameAchievementMetaUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->sort != NULL)
                $parameters['in_sort'] = $obj->sort; // #"in_sort"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->game_stat != NULL)
                $parameters['in_game_stat'] = $obj->game_stat; // #"in_game_stat"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->points != NULL)
                $parameters['in_points'] = $obj->points; // #"in_points"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->modifier != NULL)
                $parameters['in_modifier'] = $obj->modifier; // #"in_modifier"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->leaderboard != NULL)
                $parameters['in_leaderboard'] = $obj->leaderboard; // #"in_leaderboard"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_achievement_meta_set_uuid(".
                        "in_uuid".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function SetGameAchievementMetaCodeGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->sort != NULL)
                $parameters['in_sort'] = $obj->sort; // #"in_sort"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->game_stat != NULL)
                $parameters['in_game_stat'] = $obj->game_stat; // #"in_game_stat"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->level != NULL)
                $parameters['in_level'] = $obj->level; // #"in_level"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->points != NULL)
                $parameters['in_points'] = $obj->points; // #"in_points"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->modifier != NULL)
                $parameters['in_modifier'] = $obj->modifier; // #"in_modifier"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->leaderboard != NULL)
                $parameters['in_leaderboard'] = $obj->leaderboard; // #"in_leaderboard"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_achievement_meta_set_code_game_id(".
                        "in_code".
                        ", in_game_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelGameAchievementMetaUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_meta_del_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelGameAchievementMetaCodeGameId(
        $code
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_meta_del_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetGameAchievementMetaListUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_meta_get_uuid(".
                    "in_uuid".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameAchievementMetaListCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_meta_get_code(".
                    "in_code".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameAchievementMetaListCodeGameId(
        $code
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_meta_get_code_game_id(".
                    "in_code".
                    ", in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameAchievementMetaListName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_meta_get_name(".
                    "in_name".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameAchievementMetaListGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_meta_get_game_id(".
                    "in_game_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }

}


?>
