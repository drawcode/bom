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
    public function CountGameByUuid(
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
    public function CountGameByCode(
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
    public function CountGameByName(
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
    public function CountGameByOrgId(
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
    public function CountGameByAppId(
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
    public function CountGameByOrgIdByAppId(
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
    public function BrowseGameListByFilter($filter_obj) {
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

    public function SetGameByUuid($set_type, $obj) {
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
    
    public function SetGameByCode($set_type, $obj) {
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
    
    public function SetGameByName($set_type, $obj) {
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
    
    public function SetGameByOrgId($set_type, $obj) {
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
    
    public function SetGameByAppId($set_type, $obj) {
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
    
    public function SetGameByOrgIdByAppId($set_type, $obj) {
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
    
    public function DelGameByUuid(
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
    public function DelGameByCode(
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
    public function DelGameByName(
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
    public function DelGameByOrgId(
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
    public function DelGameByAppId(
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
    public function DelGameByOrgIdByAppId(
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
    public function GetGameListByUuid(
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
    public function GetGameListByCode(
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
    public function GetGameListByName(
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
    public function GetGameListByOrgId(
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
    public function GetGameListByAppId(
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
    public function GetGameListByOrgIdByAppId(
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
    public function CountGameCategoryByUuid(
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
    public function CountGameCategoryByCode(
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
    public function CountGameCategoryByName(
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
    public function CountGameCategoryByOrgId(
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
    public function CountGameCategoryByTypeId(
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
    public function CountGameCategoryByOrgIdByTypeId(
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
    public function BrowseGameCategoryListByFilter($filter_obj) {
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

    public function SetGameCategoryByUuid($set_type, $obj) {
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
    
    public function DelGameCategoryByUuid(
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
    public function DelGameCategoryByCodeByOrgId(
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
    public function DelGameCategoryByCodeByOrgIdByTypeId(
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
    public function GetGameCategoryListByUuid(
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
    public function GetGameCategoryListByCode(
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
    public function GetGameCategoryListByName(
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
    public function GetGameCategoryListByOrgId(
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
    public function GetGameCategoryListByTypeId(
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
    public function GetGameCategoryListByOrgIdByTypeId(
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
    public function CountGameCategoryTreeByUuid(
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
    public function CountGameCategoryTreeByParentId(
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
    public function CountGameCategoryTreeByCategoryId(
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
    public function CountGameCategoryTreeByParentIdByCategoryId(
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
    public function BrowseGameCategoryTreeListByFilter($filter_obj) {
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

    public function SetGameCategoryTreeByUuid($set_type, $obj) {
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
    
    public function DelGameCategoryTreeByUuid(
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
    public function DelGameCategoryTreeByParentId(
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
    public function DelGameCategoryTreeByCategoryId(
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
    public function DelGameCategoryTreeByParentIdByCategoryId(
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
    public function GetGameCategoryTreeListByUuid(
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
    public function GetGameCategoryTreeListByParentId(
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
    public function GetGameCategoryTreeListByCategoryId(
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
    public function GetGameCategoryTreeListByParentIdByCategoryId(
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
    public function CountGameCategoryAssocByUuid(
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
    public function CountGameCategoryAssocByGameId(
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
    public function CountGameCategoryAssocByCategoryId(
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
    public function CountGameCategoryAssocByGameIdByCategoryId(
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
    public function BrowseGameCategoryAssocListByFilter($filter_obj) {
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

    public function SetGameCategoryAssocByUuid($set_type, $obj) {
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
    
    public function DelGameCategoryAssocByUuid(
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
    public function GetGameCategoryAssocListByUuid(
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
    public function GetGameCategoryAssocListByGameId(
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
    public function GetGameCategoryAssocListByCategoryId(
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
    public function GetGameCategoryAssocListByGameIdByCategoryId(
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
    public function CountGameTypeByUuid(
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
    public function CountGameTypeByCode(
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
    public function CountGameTypeByName(
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
    public function BrowseGameTypeListByFilter($filter_obj) {
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

    public function SetGameTypeByUuid($set_type, $obj) {
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
    
    public function DelGameTypeByUuid(
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
    public function GetGameTypeListByUuid(
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
    public function GetGameTypeListByCode(
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
    public function GetGameTypeListByName(
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
    public function CountProfileGameByUuid(
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
    public function CountProfileGameByGameId(
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
    public function CountProfileGameByProfileId(
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
    public function CountProfileGameByProfileIdByGameId(
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
    public function BrowseProfileGameListByFilter($filter_obj) {
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

    public function SetProfileGameByUuid($set_type, $obj) {
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
    
    public function DelProfileGameByUuid(
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
    public function GetProfileGameListByUuid(
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
    public function GetProfileGameListByGameId(
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
    public function GetProfileGameListByProfileId(
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
    public function GetProfileGameListByProfileIdByGameId(
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
    public function CountGameNetworkByUuid(
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
    public function CountGameNetworkByCode(
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
    public function CountGameNetworkByUuidByType(
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
    public function BrowseGameNetworkListByFilter($filter_obj) {
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

    public function SetGameNetworkByUuid($set_type, $obj) {
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
    
    public function SetGameNetworkByCode($set_type, $obj) {
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
    
    public function DelGameNetworkByUuid(
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
    public function GetGameNetworkListByUuid(
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
    public function GetGameNetworkListByCode(
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
    public function GetGameNetworkListByUuidByType(
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
    public function CountGameNetworkAuthByUuid(
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
    public function CountGameNetworkAuthByGameIdByGameNetworkId(
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
    public function BrowseGameNetworkAuthListByFilter($filter_obj) {
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

    public function SetGameNetworkAuthByUuid($set_type, $obj) {
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
    
    public function SetGameNetworkAuthByGameIdByGameNetworkId($set_type, $obj) {
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
    
    public function DelGameNetworkAuthByUuid(
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
    public function GetGameNetworkAuthListByUuid(
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
    public function GetGameNetworkAuthListByGameIdByGameNetworkId(
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
    public function CountProfileGameNetworkByUuid(
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
    public function CountProfileGameNetworkByGameId(
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
    public function CountProfileGameNetworkByProfileId(
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
    public function CountProfileGameNetworkByProfileIdByGameId(
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
    public function CountProfileGameNetworkByProfileIdByGameId(
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
    public function CountProfileGameNetworkByProfileIdByGameIdByGameNetworkId(
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
    public function CountProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(
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
    public function BrowseProfileGameNetworkListByFilter($filter_obj) {
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

    public function SetProfileGameNetworkByUuid($set_type, $obj) {
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
    
    public function SetProfileGameNetworkByProfileIdByGameId($set_type, $obj) {
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
    
    public function SetProfileGameNetworkByProfileIdByGameIdByGameNetworkId($set_type, $obj) {
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
    
    public function SetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId($set_type, $obj) {
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
    
    public function DelProfileGameNetworkByUuid(
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
    public function DelProfileGameNetworkByProfileIdByGameId(
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
    public function DelProfileGameNetworkByProfileIdByGameIdByGameNetworkId(
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
    public function DelProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(
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
    public function GetProfileGameNetworkListByUuid(
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
    public function GetProfileGameNetworkListByGameId(
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
    public function GetProfileGameNetworkListByProfileId(
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
    public function GetProfileGameNetworkListByProfileIdByGameId(
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
    public function GetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
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
    public function GetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
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
    public function CountProfileGameDataAttributeByUuid(
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
    public function CountProfileGameDataAttributeByProfileId(
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
    public function CountProfileGameDataAttributeByProfileIdByGameIdByCode(
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
    public function BrowseProfileGameDataAttributeListByFilter($filter_obj) {
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

    public function SetProfileGameDataAttributeByUuid($set_type, $obj) {
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
    
    public function SetProfileGameDataAttributeByProfileId($set_type, $obj) {
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
    
    public function SetProfileGameDataAttributeByProfileIdByGameIdByCode($set_type, $obj) {
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
    
    public function DelProfileGameDataAttributeByUuid(
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
    public function DelProfileGameDataAttributeByProfileId(
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
    public function DelProfileGameDataAttributeByProfileIdByGameIdByCode(
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
    public function GetProfileGameDataAttributeListByUuid(
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
    public function GetProfileGameDataAttributeListByProfileId(
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
    public function GetProfileGameDataAttributeListByProfileIdByGameIdByCode(
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
    public function CountGameSessionByUuid(
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
    public function CountGameSessionByGameId(
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
    public function CountGameSessionByProfileId(
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
    public function CountGameSessionByProfileIdByGameId(
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
    public function BrowseGameSessionListByFilter($filter_obj) {
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

    public function SetGameSessionByUuid($set_type, $obj) {
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
    
    public function DelGameSessionByUuid(
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
    public function GetGameSessionListByUuid(
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
    public function GetGameSessionListByGameId(
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
    public function GetGameSessionListByProfileId(
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
    public function GetGameSessionListByProfileIdByGameId(
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
    public function CountGameSessionDataByUuid(
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
    public function BrowseGameSessionDataListByFilter($filter_obj) {
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

    public function SetGameSessionDataByUuid($set_type, $obj) {
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
    
    public function DelGameSessionDataByUuid(
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
    public function GetGameSessionDataListByUuid(
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
    public function CountGameContentByUuid(
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
    public function CountGameContentByGameId(
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
    public function CountGameContentByGameIdByPath(
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
    public function CountGameContentByGameIdByPathByVersion(
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
    public function CountGameContentByGameIdByPathByVersionByPlatformByIncrement(
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
    public function BrowseGameContentListByFilter($filter_obj) {
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

    public function SetGameContentByUuid($set_type, $obj) {
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
    
    public function SetGameContentByGameId($set_type, $obj) {
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
    
    public function SetGameContentByGameIdByPath($set_type, $obj) {
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
    
    public function SetGameContentByGameIdByPathByVersion($set_type, $obj) {
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
    
    public function SetGameContentByGameIdByPathByVersionByPlatformByIncrement($set_type, $obj) {
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
    
    public function DelGameContentByUuid(
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
    public function DelGameContentByGameId(
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
    public function DelGameContentByGameIdByPath(
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
    public function DelGameContentByGameIdByPathByVersion(
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
    public function DelGameContentByGameIdByPathByVersionByPlatformByIncrement(
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
    public function GetGameContentListByUuid(
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
    public function GetGameContentListByGameId(
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
    public function GetGameContentListByGameIdByPath(
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
    public function GetGameContentListByGameIdByPathByVersion(
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
    public function GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
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
    public function CountGameProfileContentByUuid(
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
    public function CountGameProfileContentByGameIdByProfileId(
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
    public function CountGameProfileContentByGameIdByUsername(
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
    public function CountGameProfileContentByUsername(
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
    public function CountGameProfileContentByGameIdByProfileIdByPath(
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
    public function CountGameProfileContentByGameIdByProfileIdByPathByVersion(
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
    public function CountGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
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
    public function CountGameProfileContentByGameIdByUsernameByPath(
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
    public function CountGameProfileContentByGameIdByUsernameByPathByVersion(
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
    public function CountGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
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
    public function BrowseGameProfileContentListByFilter($filter_obj) {
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

    public function SetGameProfileContentByUuid($set_type, $obj) {
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
    
    public function SetGameProfileContentByGameIdByProfileId($set_type, $obj) {
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
    
    public function SetGameProfileContentByGameIdByUsername($set_type, $obj) {
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
    
    public function SetGameProfileContentByUsername($set_type, $obj) {
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
    
    public function SetGameProfileContentByGameIdByProfileIdByPath($set_type, $obj) {
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
    
    public function SetGameProfileContentByGameIdByProfileIdByPathByVersion($set_type, $obj) {
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
    
    public function SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement($set_type, $obj) {
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
    
    public function SetGameProfileContentByGameIdByUsernameByPath($set_type, $obj) {
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
    
    public function SetGameProfileContentByGameIdByUsernameByPathByVersion($set_type, $obj) {
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
    
    public function SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement($set_type, $obj) {
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
    
    public function DelGameProfileContentByUuid(
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
    public function DelGameProfileContentByGameIdByProfileId(
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
    public function DelGameProfileContentByGameIdByUsername(
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
    public function DelGameProfileContentByUsername(
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
    public function DelGameProfileContentByGameIdByProfileIdByPath(
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
    public function DelGameProfileContentByGameIdByProfileIdByPathByVersion(
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
    public function DelGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
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
    public function DelGameProfileContentByGameIdByUsernameByPath(
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
    public function DelGameProfileContentByGameIdByUsernameByPathByVersion(
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
    public function DelGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
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
    public function GetGameProfileContentListByUuid(
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
    public function GetGameProfileContentListByGameIdByProfileId(
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
    public function GetGameProfileContentListByGameIdByUsername(
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
    public function GetGameProfileContentListByUsername(
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
    public function GetGameProfileContentListByGameIdByProfileIdByPath(
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
    public function GetGameProfileContentListByGameIdByProfileIdByPathByVersion(
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
    public function GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
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
    public function GetGameProfileContentListByGameIdByUsernameByPath(
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
    public function GetGameProfileContentListByGameIdByUsernameByPathByVersion(
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
    public function GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
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
    public function CountGameAppByUuid(
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
    public function CountGameAppByGameId(
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
    public function CountGameAppByAppId(
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
    public function CountGameAppByGameIdByAppId(
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
    public function BrowseGameAppListByFilter($filter_obj) {
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

    public function SetGameAppByUuid($set_type, $obj) {
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
    
    public function DelGameAppByUuid(
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
    public function GetGameAppListByUuid(
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
    public function GetGameAppListByGameId(
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
    public function GetGameAppListByAppId(
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
    public function GetGameAppListByGameIdByAppId(
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
    public function CountProfileGameLocationByUuid(
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
    public function CountProfileGameLocationByGameLocationId(
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
    public function CountProfileGameLocationByProfileId(
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
    public function CountProfileGameLocationByProfileIdByGameLocationId(
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
    public function BrowseProfileGameLocationListByFilter($filter_obj) {
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

    public function SetProfileGameLocationByUuid($set_type, $obj) {
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
    
    public function DelProfileGameLocationByUuid(
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
    public function GetProfileGameLocationListByUuid(
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
    public function GetProfileGameLocationListByGameLocationId(
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
    public function GetProfileGameLocationListByProfileId(
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
    public function GetProfileGameLocationListByProfileIdByGameLocationId(
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
    public function CountGamePhotoByUuid(
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
    public function CountGamePhotoByExternalId(
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
    public function CountGamePhotoByUrl(
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
    public function CountGamePhotoByUrlByExternalId(
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
    public function CountGamePhotoByUuidByExternalId(
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
    public function BrowseGamePhotoListByFilter($filter_obj) {
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

    public function SetGamePhotoByUuid($set_type, $obj) {
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
    
    public function SetGamePhotoByExternalId($set_type, $obj) {
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
    
    public function SetGamePhotoByUrl($set_type, $obj) {
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
    
    public function SetGamePhotoByUrlByExternalId($set_type, $obj) {
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
    
    public function SetGamePhotoByUuidByExternalId($set_type, $obj) {
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
    
    public function DelGamePhotoByUuid(
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
    public function DelGamePhotoByExternalId(
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
    public function DelGamePhotoByUrl(
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
    public function DelGamePhotoByUrlByExternalId(
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
    public function DelGamePhotoByUuidByExternalId(
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
    public function GetGamePhotoListByUuid(
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
    public function GetGamePhotoListByExternalId(
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
    public function GetGamePhotoListByUrl(
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
    public function GetGamePhotoListByUrlByExternalId(
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
    public function GetGamePhotoListByUuidByExternalId(
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
    public function CountGameVideoByUuid(
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
    public function CountGameVideoByExternalId(
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
    public function CountGameVideoByUrl(
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
    public function CountGameVideoByUrlByExternalId(
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
    public function CountGameVideoByUuidByExternalId(
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
    public function BrowseGameVideoListByFilter($filter_obj) {
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

    public function SetGameVideoByUuid($set_type, $obj) {
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
    
    public function SetGameVideoByExternalId($set_type, $obj) {
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
    
    public function SetGameVideoByUrl($set_type, $obj) {
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
    
    public function SetGameVideoByUrlByExternalId($set_type, $obj) {
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
    
    public function SetGameVideoByUuidByExternalId($set_type, $obj) {
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
    
    public function DelGameVideoByUuid(
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
    public function DelGameVideoByExternalId(
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
    public function DelGameVideoByUrl(
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
    public function DelGameVideoByUrlByExternalId(
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
    public function DelGameVideoByUuidByExternalId(
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
    public function GetGameVideoListByUuid(
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
    public function GetGameVideoListByExternalId(
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
    public function GetGameVideoListByUrl(
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
    public function GetGameVideoListByUrlByExternalId(
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
    public function GetGameVideoListByUuidByExternalId(
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
    public function CountGameRpgItemWeaponByUuid(
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
    public function CountGameRpgItemWeaponByGameId(
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
    public function CountGameRpgItemWeaponByUrl(
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
    public function CountGameRpgItemWeaponByUrlByGameId(
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
    public function CountGameRpgItemWeaponByUuidByGameId(
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
    public function BrowseGameRpgItemWeaponListByFilter($filter_obj) {
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

    public function SetGameRpgItemWeaponByUuid($set_type, $obj) {
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
    
    public function SetGameRpgItemWeaponByGameId($set_type, $obj) {
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
    
    public function SetGameRpgItemWeaponByUrl($set_type, $obj) {
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
    
    public function SetGameRpgItemWeaponByUrlByGameId($set_type, $obj) {
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
    
    public function SetGameRpgItemWeaponByUuidByGameId($set_type, $obj) {
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
    
    public function DelGameRpgItemWeaponByUuid(
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
    public function DelGameRpgItemWeaponByGameId(
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
    public function DelGameRpgItemWeaponByUrl(
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
    public function DelGameRpgItemWeaponByUrlByGameId(
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
    public function DelGameRpgItemWeaponByUuidByGameId(
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
    public function GetGameRpgItemWeaponListByUuid(
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
    public function GetGameRpgItemWeaponListByGameId(
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
    public function GetGameRpgItemWeaponListByUrl(
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
    public function GetGameRpgItemWeaponListByUrlByGameId(
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
    public function GetGameRpgItemWeaponListByUuidByGameId(
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
    public function CountGameRpgItemSkillByUuid(
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
    public function CountGameRpgItemSkillByGameId(
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
    public function CountGameRpgItemSkillByUrl(
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
    public function CountGameRpgItemSkillByUrlByGameId(
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
    public function CountGameRpgItemSkillByUuidByGameId(
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
    public function BrowseGameRpgItemSkillListByFilter($filter_obj) {
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

    public function SetGameRpgItemSkillByUuid($set_type, $obj) {
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
    
    public function SetGameRpgItemSkillByGameId($set_type, $obj) {
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
    
    public function SetGameRpgItemSkillByUrl($set_type, $obj) {
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
    
    public function SetGameRpgItemSkillByUrlByGameId($set_type, $obj) {
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
    
    public function SetGameRpgItemSkillByUuidByGameId($set_type, $obj) {
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
    
    public function DelGameRpgItemSkillByUuid(
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
    public function DelGameRpgItemSkillByGameId(
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
    public function DelGameRpgItemSkillByUrl(
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
    public function DelGameRpgItemSkillByUrlByGameId(
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
    public function DelGameRpgItemSkillByUuidByGameId(
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
    public function GetGameRpgItemSkillListByUuid(
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
    public function GetGameRpgItemSkillListByGameId(
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
    public function GetGameRpgItemSkillListByUrl(
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
    public function GetGameRpgItemSkillListByUrlByGameId(
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
    public function GetGameRpgItemSkillListByUuidByGameId(
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
    public function CountGameProductByUuid(
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
    public function CountGameProductByGameId(
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
    public function CountGameProductByUrl(
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
    public function CountGameProductByUrlByGameId(
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
    public function CountGameProductByUuidByGameId(
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
    public function BrowseGameProductListByFilter($filter_obj) {
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

    public function SetGameProductByUuid($set_type, $obj) {
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
    
    public function SetGameProductByGameId($set_type, $obj) {
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
    
    public function SetGameProductByUrl($set_type, $obj) {
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
    
    public function SetGameProductByUrlByGameId($set_type, $obj) {
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
    
    public function SetGameProductByUuidByGameId($set_type, $obj) {
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
    
    public function DelGameProductByUuid(
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
    public function DelGameProductByGameId(
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
    public function DelGameProductByUrl(
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
    public function DelGameProductByUrlByGameId(
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
    public function DelGameProductByUuidByGameId(
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
    public function GetGameProductListByUuid(
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
    public function GetGameProductListByGameId(
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
    public function GetGameProductListByUrl(
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
    public function GetGameProductListByUrlByGameId(
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
    public function GetGameProductListByUuidByGameId(
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
    public function CountGameLeaderboard(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameLeaderboardByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_count_uuid(".
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
    public function CountGameLeaderboardByGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_count_game_id(".
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
    public function CountGameLeaderboardByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_count_code(".
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
    public function CountGameLeaderboardByCodeByGameId(
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
                , "CALL usp_game_leaderboard_count_code_game_id(".
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
    public function CountGameLeaderboardByCodeByGameIdByProfileId(
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
                , "CALL usp_game_leaderboard_count_code_game_id_profile_id(".
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
    public function CountGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(
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
                , "CALL usp_game_leaderboard_count_code_game_id_profile_id_timestamp(".
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
    public function CountGameLeaderboardByProfileIdByGameId(
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
                , "CALL usp_game_leaderboard_count_profile_id_game_id(".
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
    public function BrowseGameLeaderboardListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameLeaderboardByUuid($set_type, $obj) {
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
                    , "CALL usp_game_leaderboard_set_uuid(".
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
    
    public function SetGameLeaderboardByUuidByProfileIdByGameIdByTimestamp($set_type, $obj) {
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
                    , "CALL usp_game_leaderboard_set_uuid_profile_id_game_id_timestamp(".
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
    
    public function SetGameLeaderboardByCode($set_type, $obj) {
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
                    , "CALL usp_game_leaderboard_set_code(".
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
    
    public function SetGameLeaderboardByCodeByGameId($set_type, $obj) {
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
                    , "CALL usp_game_leaderboard_set_code_game_id(".
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
    
    public function SetGameLeaderboardByCodeByGameIdByProfileId($set_type, $obj) {
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
                    , "CALL usp_game_leaderboard_set_code_game_id_profile_id(".
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
    
    public function SetGameLeaderboardByCodeByGameIdByProfileIdByTimestamp($set_type, $obj) {
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
                    , "CALL usp_game_leaderboard_set_code_game_id_profile_id_timestamp(".
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
    
    public function DelGameLeaderboardByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_del_uuid(".
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
    public function DelGameLeaderboardByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_del_code(".
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
    public function DelGameLeaderboardByCodeByGameId(
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
                , "CALL usp_game_leaderboard_del_code_game_id(".
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
    public function DelGameLeaderboardByCodeByGameIdByProfileId(
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
                , "CALL usp_game_leaderboard_del_code_game_id_profile_id(".
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
    public function DelGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(
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
                , "CALL usp_game_leaderboard_del_code_game_id_profile_id_timestamp(".
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
    public function DelGameLeaderboardByProfileIdByGameId(
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
                , "CALL usp_game_leaderboard_del_profile_id_game_id(".
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
    public function GetGameLeaderboardList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameLeaderboardListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_get_uuid(".
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
    public function GetGameLeaderboardListByGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_get_game_id(".
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
    public function GetGameLeaderboardListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_get_code(".
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
    public function GetGameLeaderboardListByCodeByGameId(
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
                , "CALL usp_game_leaderboard_get_code_game_id(".
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
    public function GetGameLeaderboardListByCodeByGameIdByProfileId(
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
                , "CALL usp_game_leaderboard_get_code_game_id_profile_id(".
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
    public function GetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
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
                , "CALL usp_game_leaderboard_get_code_game_id_profile_id_timestamp(".
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
    public function GetGameLeaderboardListByProfileIdByGameId(
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
                , "CALL usp_game_leaderboard_get_profile_id_game_id(".
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
    public function GetGameLeaderboardListByProfileIdByGameIdByTimestamp(
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
                , "CALL usp_game_leaderboard_get_profile_id_game_id_timestamp(".
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
    public function CountGameLeaderboardItem(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_item_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameLeaderboardItemByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_item_count_uuid(".
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
    public function CountGameLeaderboardItemByGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_item_count_game_id(".
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
    public function CountGameLeaderboardItemByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_item_count_code(".
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
    public function CountGameLeaderboardItemByCodeByGameId(
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
                , "CALL usp_game_leaderboard_item_count_code_game_id(".
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
    public function CountGameLeaderboardItemByCodeByGameIdByProfileId(
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
                , "CALL usp_game_leaderboard_item_count_code_game_id_profile_id(".
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
    public function CountGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(
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
                , "CALL usp_game_leaderboard_item_count_code_game_id_profile_id_timesta(".
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
    public function CountGameLeaderboardItemByProfileIdByGameId(
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
                , "CALL usp_game_leaderboard_item_count_profile_id_game_id(".
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
    public function BrowseGameLeaderboardItemListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_item_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameLeaderboardItemByUuid($set_type, $obj) {
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
                    , "CALL usp_game_leaderboard_item_set_uuid(".
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
    
    public function SetGameLeaderboardItemByUuidByProfileIdByGameIdByTimestamp($set_type, $obj) {
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
                    , "CALL usp_game_leaderboard_item_set_uuid_profile_id_game_id_timestamp(".
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
    
    public function SetGameLeaderboardItemByCode($set_type, $obj) {
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
                    , "CALL usp_game_leaderboard_item_set_code(".
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
    
    public function SetGameLeaderboardItemByCodeByGameId($set_type, $obj) {
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
                    , "CALL usp_game_leaderboard_item_set_code_game_id(".
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
    
    public function SetGameLeaderboardItemByCodeByGameIdByProfileId($set_type, $obj) {
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
                    , "CALL usp_game_leaderboard_item_set_code_game_id_profile_id(".
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
    
    public function SetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp($set_type, $obj) {
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
                    , "CALL usp_game_leaderboard_item_set_code_game_id_profile_id_timestamp(".
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
    
    public function DelGameLeaderboardItemByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_item_del_uuid(".
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
    public function DelGameLeaderboardItemByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_item_del_code(".
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
    public function DelGameLeaderboardItemByCodeByGameId(
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
                , "CALL usp_game_leaderboard_item_del_code_game_id(".
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
    public function DelGameLeaderboardItemByCodeByGameIdByProfileId(
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
                , "CALL usp_game_leaderboard_item_del_code_game_id_profile_id(".
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
    public function DelGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(
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
                , "CALL usp_game_leaderboard_item_del_code_game_id_profile_id_timestamp(".
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
    public function DelGameLeaderboardItemByProfileIdByGameId(
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
                , "CALL usp_game_leaderboard_item_del_profile_id_game_id(".
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
    public function GetGameLeaderboardItemList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_item_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameLeaderboardItemListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_item_get_uuid(".
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
    public function GetGameLeaderboardItemListByGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_item_get_game_id(".
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
    public function GetGameLeaderboardItemListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_item_get_code(".
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
    public function GetGameLeaderboardItemListByCodeByGameId(
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
                , "CALL usp_game_leaderboard_item_get_code_game_id(".
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
    public function GetGameLeaderboardItemListByCodeByGameIdByProfileId(
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
                , "CALL usp_game_leaderboard_item_get_code_game_id_profile_id(".
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
    public function GetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(
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
                , "CALL usp_game_leaderboard_item_get_code_game_id_profile_id_timestamp(".
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
    public function GetGameLeaderboardItemListByProfileIdByGameId(
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
                , "CALL usp_game_leaderboard_item_get_profile_id_game_id(".
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
    public function GetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
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
                , "CALL usp_game_leaderboard_item_get_profile_id_game_id_timestamp(".
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
    public function CountGameLeaderboardRollup(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_rollup_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameLeaderboardRollupByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_rollup_count_uuid(".
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
    public function CountGameLeaderboardRollupByGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_rollup_count_game_id(".
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
    public function CountGameLeaderboardRollupByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_rollup_count_code(".
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
    public function CountGameLeaderboardRollupByCodeByGameId(
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
                , "CALL usp_game_leaderboard_rollup_count_code_game_id(".
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
    public function CountGameLeaderboardRollupByCodeByGameIdByProfileId(
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
                , "CALL usp_game_leaderboard_rollup_count_code_game_id_profile_id(".
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
    public function CountGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
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
                , "CALL usp_game_leaderboard_rollup_count_code_game_id_profile_id_times(".
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
    public function CountGameLeaderboardRollupByProfileIdByGameId(
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
                , "CALL usp_game_leaderboard_rollup_count_profile_id_game_id(".
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
    public function BrowseGameLeaderboardRollupListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_rollup_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameLeaderboardRollupByUuid($set_type, $obj) {
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
                    , "CALL usp_game_leaderboard_rollup_set_uuid(".
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
    
    public function SetGameLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp($set_type, $obj) {
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
                    , "CALL usp_game_leaderboard_rollup_set_uuid_profile_id_game_id_timesta(".
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
    
    public function SetGameLeaderboardRollupByCode($set_type, $obj) {
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
                    , "CALL usp_game_leaderboard_rollup_set_code(".
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
    
    public function SetGameLeaderboardRollupByCodeByGameId($set_type, $obj) {
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
                    , "CALL usp_game_leaderboard_rollup_set_code_game_id(".
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
    
    public function SetGameLeaderboardRollupByCodeByGameIdByProfileId($set_type, $obj) {
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
                    , "CALL usp_game_leaderboard_rollup_set_code_game_id_profile_id(".
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
    
    public function SetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp($set_type, $obj) {
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
                    , "CALL usp_game_leaderboard_rollup_set_code_game_id_profile_id_timesta(".
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
    
    public function DelGameLeaderboardRollupByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_rollup_del_uuid(".
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
    public function DelGameLeaderboardRollupByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_rollup_del_code(".
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
    public function DelGameLeaderboardRollupByCodeByGameId(
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
                , "CALL usp_game_leaderboard_rollup_del_code_game_id(".
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
    public function DelGameLeaderboardRollupByCodeByGameIdByProfileId(
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
                , "CALL usp_game_leaderboard_rollup_del_code_game_id_profile_id(".
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
    public function DelGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
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
                , "CALL usp_game_leaderboard_rollup_del_code_game_id_profile_id_timesta(".
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
    public function DelGameLeaderboardRollupByProfileIdByGameId(
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
                , "CALL usp_game_leaderboard_rollup_del_profile_id_game_id(".
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
    public function GetGameLeaderboardRollupList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_rollup_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetGameLeaderboardRollupListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_rollup_get_uuid(".
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
    public function GetGameLeaderboardRollupListByGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_rollup_get_game_id(".
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
    public function GetGameLeaderboardRollupListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_leaderboard_rollup_get_code(".
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
    public function GetGameLeaderboardRollupListByCodeByGameId(
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
                , "CALL usp_game_leaderboard_rollup_get_code_game_id(".
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
    public function GetGameLeaderboardRollupListByCodeByGameIdByProfileId(
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
                , "CALL usp_game_leaderboard_rollup_get_code_game_id_profile_id(".
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
    public function GetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
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
                , "CALL usp_game_leaderboard_rollup_get_code_game_id_profile_id_timesta(".
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
    public function GetGameLeaderboardRollupListByProfileIdByGameId(
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
                , "CALL usp_game_leaderboard_rollup_get_profile_id_game_id(".
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
    public function GetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
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
                , "CALL usp_game_leaderboard_rollup_get_profile_id_game_id_timestamp(".
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
    public function CountGameLiveQueueByUuid(
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
    public function CountGameLiveQueueByProfileIdByGameId(
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
    public function BrowseGameLiveQueueListByFilter($filter_obj) {
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

    public function SetGameLiveQueueByUuid($set_type, $obj) {
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
    
    public function SetGameLiveQueueByProfileIdByGameId($set_type, $obj) {
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
    
    public function DelGameLiveQueueByUuid(
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
    public function DelGameLiveQueueByProfileIdByGameId(
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
    public function GetGameLiveQueueListByUuid(
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
    public function GetGameLiveQueueListByGameId(
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
    public function GetGameLiveQueueListByProfileIdByGameId(
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
    public function CountGameLiveRecentQueueByUuid(
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
    public function CountGameLiveRecentQueueByProfileIdByGameId(
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
    public function BrowseGameLiveRecentQueueListByFilter($filter_obj) {
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

    public function SetGameLiveRecentQueueByUuid($set_type, $obj) {
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
    
    public function SetGameLiveRecentQueueByProfileIdByGameId($set_type, $obj) {
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
    
    public function DelGameLiveRecentQueueByUuid(
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
    public function DelGameLiveRecentQueueByProfileIdByGameId(
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
    public function GetGameLiveRecentQueueListByUuid(
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
    public function GetGameLiveRecentQueueListByGameId(
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
    public function GetGameLiveRecentQueueListByProfileIdByGameId(
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
    public function CountGameProfileStatisticByUuid(
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
    public function CountGameProfileStatisticByCode(
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
    public function CountGameProfileStatisticByGameId(
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
    public function CountGameProfileStatisticByCodeByGameId(
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
    public function CountGameProfileStatisticByProfileIdByGameId(
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
    public function CountGameProfileStatisticByCodeByProfileIdByGameId(
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
    public function CountGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(
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
    public function BrowseGameProfileStatisticListByFilter($filter_obj) {
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

    public function SetGameProfileStatisticByUuid($set_type, $obj) {
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
    
    public function SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp($set_type, $obj) {
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
    
    public function SetGameProfileStatisticByProfileIdByCode($set_type, $obj) {
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
    
    public function SetGameProfileStatisticByProfileIdByCodeByTimestamp($set_type, $obj) {
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
    
    public function SetGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp($set_type, $obj) {
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
    
    public function SetGameProfileStatisticByCodeByProfileIdByGameId($set_type, $obj) {
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
    
    public function DelGameProfileStatisticByUuid(
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
    public function DelGameProfileStatisticByCodeByGameId(
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
    public function DelGameProfileStatisticByProfileIdByGameId(
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
    public function DelGameProfileStatisticByCodeByProfileIdByGameId(
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
    public function GetGameProfileStatisticListByUuid(
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
    public function GetGameProfileStatisticListByCode(
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
    public function GetGameProfileStatisticListByGameId(
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
    public function GetGameProfileStatisticListByCodeByGameId(
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
    public function GetGameProfileStatisticListByProfileIdByGameId(
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
    public function GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
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
    public function GetGameProfileStatisticListByCodeByProfileIdByGameId(
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
    public function GetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(
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
    public function CountGameStatisticMetaByUuid(
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
    public function CountGameStatisticMetaByCode(
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
    public function CountGameStatisticMetaByCodeByGameId(
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
    public function CountGameStatisticMetaByName(
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
    public function CountGameStatisticMetaByGameId(
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
    public function BrowseGameStatisticMetaListByFilter($filter_obj) {
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

    public function SetGameStatisticMetaByUuid($set_type, $obj) {
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
    
    public function SetGameStatisticMetaByCodeByGameId($set_type, $obj) {
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
    
    public function DelGameStatisticMetaByUuid(
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
    public function DelGameStatisticMetaByCodeByGameId(
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
    public function GetGameStatisticMetaListByUuid(
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
    public function GetGameStatisticMetaListByCode(
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
    public function GetGameStatisticMetaListByName(
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
    public function GetGameStatisticMetaListByGameId(
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
    public function GetGameStatisticMetaListByCodeByGameId(
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
    public function CountGameProfileStatisticItem(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_item_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameProfileStatisticItemByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_item_count_uuid(".
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
    public function CountGameProfileStatisticItemByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_item_count_code(".
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
    public function CountGameProfileStatisticItemByGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_item_count_game_id(".
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
    public function CountGameProfileStatisticItemByCodeByGameId(
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
                , "CALL usp_game_profile_statistic_item_count_code_game_id(".
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
    public function CountGameProfileStatisticItemByProfileIdByGameId(
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
                , "CALL usp_game_profile_statistic_item_count_profile_id_game_id(".
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
    public function CountGameProfileStatisticItemByCodeByProfileIdByGameId(
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
                , "CALL usp_game_profile_statistic_item_count_code_profile_id_game_id(".
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
    public function CountGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(
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
                , "CALL usp_game_profile_statistic_item_count_code_profile_id_game_id_t(".
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
    public function BrowseGameProfileStatisticItemListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_item_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameProfileStatisticItemByUuid($set_type, $obj) {
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
                    , "CALL usp_game_profile_statistic_item_set_uuid(".
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
    
    public function SetGameProfileStatisticItemByUuidByProfileIdByGameIdByTimestamp($set_type, $obj) {
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
                    , "CALL usp_game_profile_statistic_item_set_uuid_profile_id_game_id_tim(".
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
    
    public function SetGameProfileStatisticItemByProfileIdByCode($set_type, $obj) {
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
                    , "CALL usp_game_profile_statistic_item_set_profile_id_code(".
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
    
    public function SetGameProfileStatisticItemByProfileIdByCodeByTimestamp($set_type, $obj) {
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
                    , "CALL usp_game_profile_statistic_item_set_profile_id_code_timestamp(".
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
    
    public function SetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp($set_type, $obj) {
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
                    , "CALL usp_game_profile_statistic_item_set_code_profile_id_game_id_tim(".
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
    
    public function SetGameProfileStatisticItemByCodeByProfileIdByGameId($set_type, $obj) {
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
                    , "CALL usp_game_profile_statistic_item_set_code_profile_id_game_id(".
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
    
    public function DelGameProfileStatisticItemByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_item_del_uuid(".
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
    public function DelGameProfileStatisticItemByCodeByGameId(
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
                , "CALL usp_game_profile_statistic_item_del_code_game_id(".
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
    public function DelGameProfileStatisticItemByProfileIdByGameId(
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
                , "CALL usp_game_profile_statistic_item_del_profile_id_game_id(".
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
    public function DelGameProfileStatisticItemByCodeByProfileIdByGameId(
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
                , "CALL usp_game_profile_statistic_item_del_code_profile_id_game_id(".
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
    public function GetGameProfileStatisticItemListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_item_get_uuid(".
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
    public function GetGameProfileStatisticItemListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_item_get_code(".
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
    public function GetGameProfileStatisticItemListByGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_item_get_game_id(".
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
    public function GetGameProfileStatisticItemListByCodeByGameId(
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
                , "CALL usp_game_profile_statistic_item_get_code_game_id(".
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
    public function GetGameProfileStatisticItemListByProfileIdByGameId(
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
                , "CALL usp_game_profile_statistic_item_get_profile_id_game_id(".
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
    public function GetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
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
                , "CALL usp_game_profile_statistic_item_get_profile_id_game_id_timestam(".
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
    public function GetGameProfileStatisticItemListByCodeByProfileIdByGameId(
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
                , "CALL usp_game_profile_statistic_item_get_code_profile_id_game_id(".
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
    public function GetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(
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
                , "CALL usp_game_profile_statistic_item_get_code_profile_id_game_id_tim(".
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
    public function CountGameKeyMetaByUuid(
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
    public function CountGameKeyMetaByCode(
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
    public function CountGameKeyMetaByCodeByGameId(
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
    public function CountGameKeyMetaByName(
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
    public function CountGameKeyMetaByKey(
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
    public function CountGameKeyMetaByGameId(
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
    public function CountGameKeyMetaByKeyByGameId(
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
    public function BrowseGameKeyMetaListByFilter($filter_obj) {
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

    public function SetGameKeyMetaByUuid($set_type, $obj) {
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
    
    public function SetGameKeyMetaByCodeByGameId($set_type, $obj) {
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
    
    public function SetGameKeyMetaByKeyByGameId($set_type, $obj) {
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
    
    public function SetGameKeyMetaByKeyByGameIdByLevel($set_type, $obj) {
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
    
    public function DelGameKeyMetaByUuid(
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
    public function DelGameKeyMetaByCodeByGameId(
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
    public function DelGameKeyMetaByKeyByGameId(
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
    public function GetGameKeyMetaListByUuid(
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
    public function GetGameKeyMetaListByCode(
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
    public function GetGameKeyMetaListByCodeByGameId(
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
    public function GetGameKeyMetaListByName(
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
    public function GetGameKeyMetaListByKey(
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
    public function GetGameKeyMetaListByGameId(
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
    public function GetGameKeyMetaListByKeyByGameId(
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
    public function GetGameKeyMetaListByCodeByLevel(
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
    public function CountGameLevelByUuid(
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
    public function CountGameLevelByCode(
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
    public function CountGameLevelByCodeByGameId(
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
    public function CountGameLevelByName(
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
    public function CountGameLevelByGameId(
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
    public function BrowseGameLevelListByFilter($filter_obj) {
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

    public function SetGameLevelByUuid($set_type, $obj) {
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
    
    public function SetGameLevelByCodeByGameId($set_type, $obj) {
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
    
    public function DelGameLevelByUuid(
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
    public function DelGameLevelByCodeByGameId(
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
    public function GetGameLevelListByUuid(
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
    public function GetGameLevelListByCode(
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
    public function GetGameLevelListByCodeByGameId(
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
    public function GetGameLevelListByName(
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
    public function GetGameLevelListByGameId(
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
    public function CountGameProfileAchievementByUuid(
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
    public function CountGameProfileAchievementByProfileIdByCode(
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
    public function CountGameProfileAchievementByUsername(
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
    public function CountGameProfileAchievementByCodeByProfileIdByGameId(
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
    public function CountGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(
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
    public function BrowseGameProfileAchievementListByFilter($filter_obj) {
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

    public function SetGameProfileAchievementByUuid($set_type, $obj) {
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
    
    public function SetGameProfileAchievementByUuidByCode($set_type, $obj) {
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
    
    public function SetGameProfileAchievementByProfileIdByCode($set_type, $obj) {
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
    
    public function SetGameProfileAchievementByCodeByProfileIdByGameId($set_type, $obj) {
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
    
    public function SetGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp($set_type, $obj) {
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
    
    public function DelGameProfileAchievementByUuid(
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
    public function DelGameProfileAchievementByProfileIdByCode(
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
    public function DelGameProfileAchievementByUuidByCode(
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
    public function GetGameProfileAchievementListByUuid(
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
    public function GetGameProfileAchievementListByProfileIdByCode(
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
    public function GetGameProfileAchievementListByUsername(
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
    public function GetGameProfileAchievementListByCode(
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
    public function GetGameProfileAchievementListByGameId(
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
    public function GetGameProfileAchievementListByCodeByGameId(
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
    public function GetGameProfileAchievementListByProfileIdByGameId(
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
    public function GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
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
    public function GetGameProfileAchievementListByCodeByProfileIdByGameId(
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
    public function GetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(
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
    public function CountGameAchievementMetaByUuid(
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
    public function CountGameAchievementMetaByCode(
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
    public function CountGameAchievementMetaByCodeByGameId(
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
    public function CountGameAchievementMetaByName(
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
    public function CountGameAchievementMetaByGameId(
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
    public function BrowseGameAchievementMetaListByFilter($filter_obj) {
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

    public function SetGameAchievementMetaByUuid($set_type, $obj) {
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
    
    public function SetGameAchievementMetaByCodeByGameId($set_type, $obj) {
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
    
    public function DelGameAchievementMetaByUuid(
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
    public function DelGameAchievementMetaByCodeByGameId(
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
    public function GetGameAchievementMetaListByUuid(
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
    public function GetGameAchievementMetaListByCode(
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
    public function GetGameAchievementMetaListByCodeByGameId(
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
    public function GetGameAchievementMetaListByName(
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
    public function GetGameAchievementMetaListByGameId(
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
    public function CountProfileReward(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileRewardByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_count_uuid(".
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
    public function CountProfileRewardByProfileId(
        $profile_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_count_profile_id(".
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
    public function CountProfileRewardByRewardId(
        $reward_id
    ) {
        $parameters = array();
        $parameters['in_reward_id'] = $reward_id; // #"in_reward_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_count_reward_id(".
                    "in_reward_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileRewardByProfileIdByRewardId(
        $profile_id
        , $reward_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_reward_id'] = $reward_id; // #"in_reward_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_count_profile_id_reward_id(".
                    "in_profile_id".
                    ", in_reward_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileRewardByProfileIdByChannelId(
        $profile_id
        , $channel_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_count_profile_id_channel_id(".
                    "in_profile_id".
                    ", in_channel_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileRewardByProfileIdByChannelIdByRewardId(
        $profile_id
        , $channel_id
        , $reward_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
        $parameters['in_reward_id'] = $reward_id; // #"in_reward_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_count_profile_id_channel_id_reward_id(".
                    "in_profile_id".
                    ", in_channel_id".
                    ", in_reward_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseProfileRewardListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetProfileRewardByUuid($set_type, $obj) {
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
            if($obj->viewed != NULL)
                $parameters['in_viewed'] = $obj->viewed; // #"in_viewed"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->downloaded != NULL)
                $parameters['in_downloaded'] = $obj->downloaded; // #"in_downloaded"
            if($obj->channel_id != NULL)
                $parameters['in_channel_id'] = $obj->channel_id; // #"in_channel_id"
            if($obj->reward_id != NULL)
                $parameters['in_reward_id'] = $obj->reward_id; // #"in_reward_id"
            if($obj->usage_count != NULL)
                $parameters['in_usage_count'] = $obj->usage_count; // #"in_usage_count"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->blurb != NULL)
                $parameters['in_blurb'] = $obj->blurb; // #"in_blurb"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_profile_reward_set_uuid(".
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
    
    public function SetProfileRewardByProfileIdByChannelIdByRewardId($set_type, $obj) {
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
            if($obj->viewed != NULL)
                $parameters['in_viewed'] = $obj->viewed; // #"in_viewed"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->downloaded != NULL)
                $parameters['in_downloaded'] = $obj->downloaded; // #"in_downloaded"
            if($obj->channel_id != NULL)
                $parameters['in_channel_id'] = $obj->channel_id; // #"in_channel_id"
            if($obj->reward_id != NULL)
                $parameters['in_reward_id'] = $obj->reward_id; // #"in_reward_id"
            if($obj->usage_count != NULL)
                $parameters['in_usage_count'] = $obj->usage_count; // #"in_usage_count"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->blurb != NULL)
                $parameters['in_blurb'] = $obj->blurb; // #"in_blurb"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_profile_reward_set_profile_id_channel_id_reward_id(".
                        "in_profile_id".
                        ", in_channel_id".
                        ", in_reward_id".
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
    
    public function DelProfileRewardByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_del_uuid(".
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
    public function DelProfileRewardByProfileIdByRewardId(
        $profile_id
        , $reward_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_reward_id'] = $reward_id; // #"in_reward_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_del_profile_id_reward_id(".
                    "in_profile_id".
                    ", in_reward_id".
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
    public function GetProfileRewardListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_get_uuid(".
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
    public function GetProfileRewardListByProfileId(
        $profile_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_get_profile_id(".
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
    public function GetProfileRewardListByRewardId(
        $reward_id
    ) {
            
        $parameters = array();
        $parameters['in_reward_id'] =  $reward_id; //#"in_reward_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_get_reward_id(".
                    "in_reward_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileRewardListByProfileIdByRewardId(
        $profile_id
        , $reward_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_reward_id'] =  $reward_id; //#"in_reward_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_get_profile_id_reward_id(".
                    "in_profile_id".
                    ", in_reward_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileRewardListByProfileIdByChannelId(
        $profile_id
        , $channel_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_channel_id'] =  $channel_id; //#"in_channel_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_get_profile_id_channel_id(".
                    "in_profile_id".
                    ", in_channel_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileRewardListByProfileIdByChannelIdByRewardId(
        $profile_id
        , $channel_id
        , $reward_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_channel_id'] =  $channel_id; //#"in_channel_id"
        $parameters['in_reward_id'] =  $reward_id; //#"in_reward_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_get_profile_id_channel_id_reward_id(".
                    "in_profile_id".
                    ", in_channel_id".
                    ", in_reward_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountCoupon(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_coupon_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountCouponByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_coupon_count_uuid(".
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
    public function CountCouponByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_coupon_count_code(".
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
    public function CountCouponByName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_coupon_count_name(".
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
    public function CountCouponByOrgId(
        $org_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_coupon_count_org_id(".
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
    public function BrowseCouponListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_coupon_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetCouponByUuid($set_type, $obj) {
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
            if($obj->org_id != NULL)
                $parameters['in_org_id'] = $obj->org_id; // #"in_org_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->usage_count != NULL)
                $parameters['in_usage_count'] = $obj->usage_count; // #"in_usage_count"
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
                    , "CALL usp_coupon_set_uuid(".
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
    
    public function DelCouponByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_coupon_del_uuid(".
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
    public function DelCouponByOrgId(
        $org_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_coupon_del_org_id(".
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
    public function GetCouponListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_coupon_get_uuid(".
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
    public function GetCouponListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_coupon_get_code(".
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
    public function GetCouponListByName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_coupon_get_name(".
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
    public function GetCouponListByOrgId(
        $org_id
    ) {
            
        $parameters = array();
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_coupon_get_org_id(".
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
    public function CountProfileCoupon(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_coupon_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileCouponByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_coupon_count_uuid(".
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
    public function CountProfileCouponByProfileId(
        $profile_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_coupon_count_profile_id(".
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
    public function BrowseProfileCouponListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_coupon_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetProfileCouponByUuid($set_type, $obj) {
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
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
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
                    , "CALL usp_profile_coupon_set_uuid(".
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
    
    public function DelProfileCouponByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_coupon_del_uuid(".
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
    public function DelProfileCouponByProfileId(
        $profile_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_coupon_del_profile_id(".
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
    public function GetProfileCouponListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_coupon_get_uuid(".
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
    public function GetProfileCouponListByProfileId(
        $profile_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_coupon_get_profile_id(".
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
    public function CountOrg(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountOrgByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_count_uuid(".
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
    public function CountOrgByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_count_code(".
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
    public function CountOrgByName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_count_name(".
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
    public function BrowseOrgListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetOrgByUuid($set_type, $obj) {
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
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
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
                    , "CALL usp_org_set_uuid(".
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
    
    public function DelOrgByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_del_uuid(".
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
    public function GetOrgListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_get_uuid(".
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
    public function GetOrgListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_get_code(".
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
    public function GetOrgListByName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_get_name(".
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
    public function CountChannel(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountChannelByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_count_uuid(".
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
    public function CountChannelByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_count_code(".
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
    public function CountChannelByName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_count_name(".
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
    public function CountChannelByOrgId(
        $org_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_count_org_id(".
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
    public function CountChannelByTypeId(
        $type_id
    ) {
        $parameters = array();
        $parameters['in_type_id'] = $type_id; // #"in_type_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_count_type_id(".
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
    public function CountChannelByOrgIdByTypeId(
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
                , "CALL usp_channel_count_org_id_type_id(".
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
    public function BrowseChannelListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetChannelByUuid($set_type, $obj) {
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
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
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
                    , "CALL usp_channel_set_uuid(".
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
    
    public function DelChannelByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_del_uuid(".
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
    public function DelChannelByCodeByOrgId(
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
                , "CALL usp_channel_del_code_org_id(".
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
    public function DelChannelByCodeByOrgIdByTypeId(
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
                , "CALL usp_channel_del_code_org_id_type_id(".
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
    public function GetChannelListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_get_uuid(".
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
    public function GetChannelListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_get_code(".
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
    public function GetChannelListByName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_get_name(".
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
    public function GetChannelListByOrgId(
        $org_id
    ) {
            
        $parameters = array();
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_get_org_id(".
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
    public function GetChannelListByTypeId(
        $type_id
    ) {
            
        $parameters = array();
        $parameters['in_type_id'] =  $type_id; //#"in_type_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_get_type_id(".
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
    public function GetChannelListByOrgIdByTypeId(
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
                , "CALL usp_channel_get_org_id_type_id(".
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
    public function CountChannelType(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_type_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountChannelTypeByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_type_count_uuid(".
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
    public function CountChannelTypeByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_type_count_code(".
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
    public function CountChannelTypeByName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_type_count_name(".
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
    public function BrowseChannelTypeListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_type_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetChannelTypeByUuid($set_type, $obj) {
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
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
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
                    , "CALL usp_channel_type_set_uuid(".
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
    
    public function DelChannelTypeByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_type_del_uuid(".
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
    public function GetChannelTypeListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_type_get_uuid(".
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
    public function GetChannelTypeListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_type_get_code(".
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
    public function GetChannelTypeListByName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_type_get_name(".
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
    public function CountReward(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountRewardByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_count_uuid(".
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
    public function CountRewardByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_count_code(".
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
    public function CountRewardByName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_count_name(".
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
    public function CountRewardByOrgId(
        $org_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_count_org_id(".
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
    public function CountRewardByChannelId(
        $channel_id
    ) {
        $parameters = array();
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_count_channel_id(".
                    "in_channel_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountRewardByOrgIdByChannelId(
        $org_id
        , $channel_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_count_org_id_channel_id(".
                    "in_org_id".
                    ", in_channel_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseRewardListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetRewardByUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->type_url != NULL)
                $parameters['in_type_url'] = $obj->type_url; // #"in_type_url"
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
            if($obj->org_id != NULL)
                $parameters['in_org_id'] = $obj->org_id; // #"in_org_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->channel_id != NULL)
                $parameters['in_channel_id'] = $obj->channel_id; // #"in_channel_id"
            if($obj->usage_count != NULL)
                $parameters['in_usage_count'] = $obj->usage_count; // #"in_usage_count"
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
                    , "CALL usp_reward_set_uuid(".
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
    
    public function DelRewardByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_del_uuid(".
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
    public function DelRewardByOrgIdByChannelId(
        $org_id
        , $channel_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_del_org_id_channel_id(".
                    "in_org_id".
                    ", in_channel_id".
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
    public function GetRewardListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_get_uuid(".
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
    public function GetRewardListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_get_code(".
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
    public function GetRewardListByName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_get_name(".
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
    public function GetRewardListByOrgId(
        $org_id
    ) {
            
        $parameters = array();
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_get_org_id(".
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
    public function GetRewardListByChannelId(
        $channel_id
    ) {
            
        $parameters = array();
        $parameters['in_channel_id'] =  $channel_id; //#"in_channel_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_get_channel_id(".
                    "in_channel_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetRewardListByOrgIdByChannelId(
        $org_id
        , $channel_id
    ) {
            
        $parameters = array();
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
        $parameters['in_channel_id'] =  $channel_id; //#"in_channel_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_get_org_id_channel_id(".
                    "in_org_id".
                    ", in_channel_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountRewardType(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_type_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountRewardTypeByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_type_count_uuid(".
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
    public function CountRewardTypeByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_type_count_code(".
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
    public function CountRewardTypeByName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_type_count_name(".
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
    public function CountRewardTypeByType(
        $type
    ) {
        $parameters = array();
        $parameters['in_type'] = $type; // #"in_type"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_type_count_type(".
                    "in_type".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseRewardTypeListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_type_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetRewardTypeByUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->type_url != NULL)
                $parameters['in_type_url'] = $obj->type_url; // #"in_type_url"
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
                    , "CALL usp_reward_type_set_uuid(".
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
    
    public function DelRewardTypeByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_type_del_uuid(".
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
    public function GetRewardTypeListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_type_get_uuid(".
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
    public function GetRewardTypeListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_type_get_code(".
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
    public function GetRewardTypeListByName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_type_get_name(".
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
    public function GetRewardTypeListByType(
        $type
    ) {
            
        $parameters = array();
        $parameters['in_type'] =  $type; //#"in_type"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_type_get_type(".
                    "in_type".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountRewardCondition(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountRewardConditionByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_count_uuid(".
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
    public function CountRewardConditionByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_count_code(".
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
    public function CountRewardConditionByName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_count_name(".
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
    public function CountRewardConditionByOrgId(
        $org_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_count_org_id(".
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
    public function CountRewardConditionByChannelId(
        $channel_id
    ) {
        $parameters = array();
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_count_channel_id(".
                    "in_channel_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountRewardConditionByOrgIdByChannelId(
        $org_id
        , $channel_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_count_org_id_channel_id(".
                    "in_org_id".
                    ", in_channel_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountRewardConditionByOrgIdByChannelIdByRewardId(
        $org_id
        , $channel_id
        , $reward_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
        $parameters['in_reward_id'] = $reward_id; // #"in_reward_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_count_org_id_channel_id_reward_id(".
                    "in_org_id".
                    ", in_channel_id".
                    ", in_reward_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountRewardConditionByRewardId(
        $reward_id
    ) {
        $parameters = array();
        $parameters['in_reward_id'] = $reward_id; // #"in_reward_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_count_reward_id(".
                    "in_reward_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseRewardConditionListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetRewardConditionByUuid($set_type, $obj) {
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
            if($obj->end_date != NULL)
                $parameters['in_end_date'] = $obj->end_date; // #"in_end_date"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->org_id != NULL)
                $parameters['in_org_id'] = $obj->org_id; // #"in_org_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->channel_id != NULL)
                $parameters['in_channel_id'] = $obj->channel_id; // #"in_channel_id"
            if($obj->amount != NULL)
                $parameters['in_amount'] = $obj->amount; // #"in_amount"
            if($obj->global_reward != NULL)
                $parameters['in_global_reward'] = $obj->global_reward; // #"in_global_reward"
            if($obj->condition != NULL)
                $parameters['in_condition'] = $obj->condition; // #"in_condition"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->start_date != NULL)
                $parameters['in_start_date'] = $obj->start_date; // #"in_start_date"
            if($obj->reward_id != NULL)
                $parameters['in_reward_id'] = $obj->reward_id; // #"in_reward_id"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_reward_condition_set_uuid(".
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
    
    public function DelRewardConditionByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_del_uuid(".
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
    public function DelRewardConditionByOrgIdByChannelIdByRewardId(
        $org_id
        , $channel_id
        , $reward_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
        $parameters['in_reward_id'] = $reward_id; // #"in_reward_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_del_org_id_channel_id_reward_id(".
                    "in_org_id".
                    ", in_channel_id".
                    ", in_reward_id".
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
    public function GetRewardConditionListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_get_uuid(".
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
    public function GetRewardConditionListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_get_code(".
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
    public function GetRewardConditionListByName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_get_name(".
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
    public function GetRewardConditionListByOrgId(
        $org_id
    ) {
            
        $parameters = array();
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_get_org_id(".
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
    public function GetRewardConditionListByChannelId(
        $channel_id
    ) {
            
        $parameters = array();
        $parameters['in_channel_id'] =  $channel_id; //#"in_channel_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_get_channel_id(".
                    "in_channel_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetRewardConditionListByOrgIdByChannelId(
        $org_id
        , $channel_id
    ) {
            
        $parameters = array();
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
        $parameters['in_channel_id'] =  $channel_id; //#"in_channel_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_get_org_id_channel_id(".
                    "in_org_id".
                    ", in_channel_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetRewardConditionListByOrgIdByChannelIdByRewardId(
        $org_id
        , $channel_id
        , $reward_id
    ) {
            
        $parameters = array();
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
        $parameters['in_channel_id'] =  $channel_id; //#"in_channel_id"
        $parameters['in_reward_id'] =  $reward_id; //#"in_reward_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_get_org_id_channel_id_reward_id(".
                    "in_org_id".
                    ", in_channel_id".
                    ", in_reward_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetRewardConditionListByRewardId(
        $reward_id
    ) {
            
        $parameters = array();
        $parameters['in_reward_id'] =  $reward_id; //#"in_reward_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_get_reward_id(".
                    "in_reward_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountRewardConditionType(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_type_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountRewardConditionTypeByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_type_count_uuid(".
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
    public function CountRewardConditionTypeByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_type_count_code(".
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
    public function CountRewardConditionTypeByName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_type_count_name(".
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
    public function CountRewardConditionTypeByType(
        $type
    ) {
        $parameters = array();
        $parameters['in_type'] = $type; // #"in_type"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_type_count_type(".
                    "in_type".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseRewardConditionTypeListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_type_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetRewardConditionTypeByUuid($set_type, $obj) {
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
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
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
                    , "CALL usp_reward_condition_type_set_uuid(".
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
    
    public function DelRewardConditionTypeByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_type_del_uuid(".
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
    public function GetRewardConditionTypeListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_type_get_uuid(".
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
    public function GetRewardConditionTypeListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_type_get_code(".
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
    public function GetRewardConditionTypeListByName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_type_get_name(".
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
    public function GetRewardConditionTypeListByType(
        $type
    ) {
            
        $parameters = array();
        $parameters['in_type'] =  $type; //#"in_type"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_condition_type_get_type(".
                    "in_type".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountQuestion(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_question_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountQuestionByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_question_count_uuid(".
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
    public function CountQuestionByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_question_count_code(".
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
    public function CountQuestionByName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_question_count_name(".
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
    public function CountQuestionByChannelId(
        $channel_id
    ) {
        $parameters = array();
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_question_count_channel_id(".
                    "in_channel_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountQuestionByOrgId(
        $org_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_question_count_org_id(".
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
    public function CountQuestionByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {
        $parameters = array();
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_question_count_channel_id_org_id(".
                    "in_channel_id".
                    ", in_org_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountQuestionByChannelIdByCode(
        $channel_id
        , $code
    ) {
        $parameters = array();
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_question_count_channel_id_code(".
                    "in_channel_id".
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
    public function BrowseQuestionListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_question_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetQuestionByUuid($set_type, $obj) {
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
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->org_id != NULL)
                $parameters['in_org_id'] = $obj->org_id; // #"in_org_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->choices != NULL)
                $parameters['in_choices'] = $obj->choices; // #"in_choices"
            if($obj->channel_id != NULL)
                $parameters['in_channel_id'] = $obj->channel_id; // #"in_channel_id"
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
                    , "CALL usp_question_set_uuid(".
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
    
    public function SetQuestionByChannelIdByCode($set_type, $obj) {
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
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->org_id != NULL)
                $parameters['in_org_id'] = $obj->org_id; // #"in_org_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->choices != NULL)
                $parameters['in_choices'] = $obj->choices; // #"in_choices"
            if($obj->channel_id != NULL)
                $parameters['in_channel_id'] = $obj->channel_id; // #"in_channel_id"
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
                    , "CALL usp_question_set_channel_id_code(".
                        "in_channel_id".
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
    
    public function DelQuestionByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_question_del_uuid(".
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
    public function DelQuestionByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {
        $parameters = array();
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_question_del_channel_id_org_id(".
                    "in_channel_id".
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
    public function GetQuestionListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_question_get_uuid(".
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
    public function GetQuestionListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_question_get_code(".
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
    public function GetQuestionListByName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_question_get_name(".
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
    public function GetQuestionListByType(
        $type
    ) {
            
        $parameters = array();
        $parameters['in_type'] =  $type; //#"in_type"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_question_get_type(".
                    "in_type".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetQuestionListByChannelId(
        $channel_id
    ) {
            
        $parameters = array();
        $parameters['in_channel_id'] =  $channel_id; //#"in_channel_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_question_get_channel_id(".
                    "in_channel_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetQuestionListByOrgId(
        $org_id
    ) {
            
        $parameters = array();
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_question_get_org_id(".
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
    public function GetQuestionListByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {
            
        $parameters = array();
        $parameters['in_channel_id'] =  $channel_id; //#"in_channel_id"
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_question_get_channel_id_org_id(".
                    "in_channel_id".
                    ", in_org_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetQuestionListByChannelIdByCode(
        $channel_id
        , $code
    ) {
            
        $parameters = array();
        $parameters['in_channel_id'] =  $channel_id; //#"in_channel_id"
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_question_get_channel_id_code(".
                    "in_channel_id".
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
    public function CountProfileQuestion(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_question_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileQuestionByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_question_count_uuid(".
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
    public function CountProfileQuestionByChannelId(
        $channel_id
    ) {
        $parameters = array();
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_question_count_channel_id(".
                    "in_channel_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileQuestionByOrgId(
        $org_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_question_count_org_id(".
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
    public function CountProfileQuestionByProfileId(
        $profile_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_question_count_profile_id(".
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
    public function CountProfileQuestionByQuestionId(
        $question_id
    ) {
        $parameters = array();
        $parameters['in_question_id'] = $question_id; // #"in_question_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_question_count_question_id(".
                    "in_question_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileQuestionByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {
        $parameters = array();
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_question_count_channel_id_org_id(".
                    "in_channel_id".
                    ", in_org_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileQuestionByChannelIdByProfileId(
        $channel_id
        , $profile_id
    ) {
        $parameters = array();
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_question_count_channel_id_profile_id(".
                    "in_channel_id".
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
    public function CountProfileQuestionByQuestionIdByProfileId(
        $question_id
        , $profile_id
    ) {
        $parameters = array();
        $parameters['in_question_id'] = $question_id; // #"in_question_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_question_count_question_id_profile_id(".
                    "in_question_id".
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
    public function BrowseProfileQuestionListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_question_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetProfileQuestionByUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->org_id != NULL)
                $parameters['in_org_id'] = $obj->org_id; // #"in_org_id"
            if($obj->channel_id != NULL)
                $parameters['in_channel_id'] = $obj->channel_id; // #"in_channel_id"
            if($obj->answer != NULL)
                $parameters['in_answer'] = $obj->answer; // #"in_answer"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->question_id != NULL)
                $parameters['in_question_id'] = $obj->question_id; // #"in_question_id"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_profile_question_set_uuid(".
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
    
    public function SetProfileQuestionByChannelIdByProfileId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->org_id != NULL)
                $parameters['in_org_id'] = $obj->org_id; // #"in_org_id"
            if($obj->channel_id != NULL)
                $parameters['in_channel_id'] = $obj->channel_id; // #"in_channel_id"
            if($obj->answer != NULL)
                $parameters['in_answer'] = $obj->answer; // #"in_answer"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->question_id != NULL)
                $parameters['in_question_id'] = $obj->question_id; // #"in_question_id"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_profile_question_set_channel_id_profile_id(".
                        "in_channel_id".
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
    
    public function SetProfileQuestionByQuestionIdByProfileId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->org_id != NULL)
                $parameters['in_org_id'] = $obj->org_id; // #"in_org_id"
            if($obj->channel_id != NULL)
                $parameters['in_channel_id'] = $obj->channel_id; // #"in_channel_id"
            if($obj->answer != NULL)
                $parameters['in_answer'] = $obj->answer; // #"in_answer"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->question_id != NULL)
                $parameters['in_question_id'] = $obj->question_id; // #"in_question_id"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_profile_question_set_question_id_profile_id(".
                        "in_question_id".
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
    
    public function SetProfileQuestionByChannelIdByQuestionIdByProfileId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->org_id != NULL)
                $parameters['in_org_id'] = $obj->org_id; // #"in_org_id"
            if($obj->channel_id != NULL)
                $parameters['in_channel_id'] = $obj->channel_id; // #"in_channel_id"
            if($obj->answer != NULL)
                $parameters['in_answer'] = $obj->answer; // #"in_answer"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->question_id != NULL)
                $parameters['in_question_id'] = $obj->question_id; // #"in_question_id"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_profile_question_set_channel_id_question_id_profile_id(".
                        "in_channel_id".
                        ", in_question_id".
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
    
    public function DelProfileQuestionByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_question_del_uuid(".
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
    public function DelProfileQuestionByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {
        $parameters = array();
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_question_del_channel_id_org_id(".
                    "in_channel_id".
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
    public function GetProfileQuestionListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_question_get_uuid(".
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
    public function GetProfileQuestionListByChannelId(
        $channel_id
    ) {
            
        $parameters = array();
        $parameters['in_channel_id'] =  $channel_id; //#"in_channel_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_question_get_channel_id(".
                    "in_channel_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileQuestionListByOrgId(
        $org_id
    ) {
            
        $parameters = array();
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_question_get_org_id(".
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
    public function GetProfileQuestionListByProfileId(
        $profile_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_question_get_profile_id(".
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
    public function GetProfileQuestionListByQuestionId(
        $question_id
    ) {
            
        $parameters = array();
        $parameters['in_question_id'] =  $question_id; //#"in_question_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_question_get_question_id(".
                    "in_question_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileQuestionListByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {
            
        $parameters = array();
        $parameters['in_channel_id'] =  $channel_id; //#"in_channel_id"
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_question_get_channel_id_org_id(".
                    "in_channel_id".
                    ", in_org_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileQuestionListByChannelIdByProfileId(
        $channel_id
        , $profile_id
    ) {
            
        $parameters = array();
        $parameters['in_channel_id'] =  $channel_id; //#"in_channel_id"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_question_get_channel_id_profile_id(".
                    "in_channel_id".
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
    public function GetProfileQuestionListByQuestionIdByProfileId(
        $question_id
        , $profile_id
    ) {
            
        $parameters = array();
        $parameters['in_question_id'] =  $question_id; //#"in_question_id"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_question_get_question_id_profile_id(".
                    "in_question_id".
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
    public function CountProfileChannel(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_channel_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileChannelByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_channel_count_uuid(".
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
    public function CountProfileChannelByChannelId(
        $channel_id
    ) {
        $parameters = array();
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_channel_count_channel_id(".
                    "in_channel_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileChannelByProfileId(
        $profile_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_channel_count_profile_id(".
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
    public function CountProfileChannelByChannelIdByProfileId(
        $channel_id
        , $profile_id
    ) {
        $parameters = array();
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_channel_count_channel_id_profile_id(".
                    "in_channel_id".
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
    public function BrowseProfileChannelListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_channel_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetProfileChannelByUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->channel_id != NULL)
                $parameters['in_channel_id'] = $obj->channel_id; // #"in_channel_id"
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
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_profile_channel_set_uuid(".
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
    
    public function SetProfileChannelByChannelIdByProfileId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->channel_id != NULL)
                $parameters['in_channel_id'] = $obj->channel_id; // #"in_channel_id"
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
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_profile_channel_set_channel_id_profile_id(".
                        "in_channel_id".
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
    
    public function DelProfileChannelByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_channel_del_uuid(".
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
    public function DelProfileChannelByChannelIdByProfileId(
        $channel_id
        , $profile_id
    ) {
        $parameters = array();
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_channel_del_channel_id_profile_id(".
                    "in_channel_id".
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
    public function GetProfileChannelListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_channel_get_uuid(".
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
    public function GetProfileChannelListByChannelId(
        $channel_id
    ) {
            
        $parameters = array();
        $parameters['in_channel_id'] =  $channel_id; //#"in_channel_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_channel_get_channel_id(".
                    "in_channel_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileChannelListByProfileId(
        $profile_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_channel_get_profile_id(".
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
    public function GetProfileChannelListByChannelIdByProfileId(
        $channel_id
        , $profile_id
    ) {
            
        $parameters = array();
        $parameters['in_channel_id'] =  $channel_id; //#"in_channel_id"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_channel_get_channel_id_profile_id(".
                    "in_channel_id".
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
    public function CountProfileRewardPoints(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_points_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileRewardPointsByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_points_count_uuid(".
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
    public function CountProfileRewardPointsByChannelId(
        $channel_id
    ) {
        $parameters = array();
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_points_count_channel_id(".
                    "in_channel_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileRewardPointsByOrgId(
        $org_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_points_count_org_id(".
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
    public function CountProfileRewardPointsByProfileId(
        $profile_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_points_count_profile_id(".
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
    public function CountProfileRewardPointsByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {
        $parameters = array();
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_points_count_channel_id_org_id(".
                    "in_channel_id".
                    ", in_org_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileRewardPointsByChannelIdByProfileId(
        $channel_id
        , $profile_id
    ) {
        $parameters = array();
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_points_count_channel_id_profile_id(".
                    "in_channel_id".
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
    public function BrowseProfileRewardPointsListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_points_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetProfileRewardPointsByUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->org_id != NULL)
                $parameters['in_org_id'] = $obj->org_id; // #"in_org_id"
            if($obj->channel_id != NULL)
                $parameters['in_channel_id'] = $obj->channel_id; // #"in_channel_id"
            if($obj->points != NULL)
                $parameters['in_points'] = $obj->points; // #"in_points"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_profile_reward_points_set_uuid(".
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
    
    public function DelProfileRewardPointsByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_points_del_uuid(".
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
    public function DelProfileRewardPointsByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {
        $parameters = array();
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_points_del_channel_id_org_id(".
                    "in_channel_id".
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
    public function GetProfileRewardPointsListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_points_get_uuid(".
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
    public function GetProfileRewardPointsListByChannelId(
        $channel_id
    ) {
            
        $parameters = array();
        $parameters['in_channel_id'] =  $channel_id; //#"in_channel_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_points_get_channel_id(".
                    "in_channel_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileRewardPointsListByOrgId(
        $org_id
    ) {
            
        $parameters = array();
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_points_get_org_id(".
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
    public function GetProfileRewardPointsListByProfileId(
        $profile_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_points_get_profile_id(".
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
    public function GetProfileRewardPointsListByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {
            
        $parameters = array();
        $parameters['in_channel_id'] =  $channel_id; //#"in_channel_id"
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_points_get_channel_id_org_id(".
                    "in_channel_id".
                    ", in_org_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileRewardPointsListByChannelIdByProfileId(
        $channel_id
        , $profile_id
    ) {
            
        $parameters = array();
        $parameters['in_channel_id'] =  $channel_id; //#"in_channel_id"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_reward_points_get_channel_id_profile_id(".
                    "in_channel_id".
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
    public function CountRewardCompetitionByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_competition_count_uuid(".
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
    public function CountRewardCompetitionByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_competition_count_code(".
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
    public function CountRewardCompetitionByName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_competition_count_name(".
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
    public function CountRewardCompetitionByPath(
        $path
    ) {
        $parameters = array();
        $parameters['in_path'] = $path; // #"in_path"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_competition_count_path(".
                    "in_path".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountRewardCompetitionByChannelId(
        $channel_id
    ) {
        $parameters = array();
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_competition_count_channel_id(".
                    "in_channel_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountRewardCompetitionByChannelIdByCompleted(
        $channel_id
        , $completed
    ) {
        $parameters = array();
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
        $parameters['in_completed'] = $completed; // #"in_completed"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_competition_count_channel_id_completed(".
                    "in_channel_id".
                    ", in_completed".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseRewardCompetitionListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_competition_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetRewardCompetitionByUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->sort != NULL)
                $parameters['in_sort'] = $obj->sort; // #"in_sort"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->date_end != NULL)
                $parameters['in_date_end'] = $obj->date_end; // #"in_date_end"
            if($obj->results != NULL)
                $parameters['in_results'] = $obj->results; // #"in_results"
            if($obj->visible != NULL)
                $parameters['in_visible'] = $obj->visible; // #"in_visible"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_start != NULL)
                $parameters['in_date_start'] = $obj->date_start; // #"in_date_start"
            if($obj->winners != NULL)
                $parameters['in_winners'] = $obj->winners; // #"in_winners"
            if($obj->template != NULL)
                $parameters['in_template'] = $obj->template; // #"in_template"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->trigger_data != NULL)
                $parameters['in_trigger_data'] = $obj->trigger_data; // #"in_trigger_data"
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->completed != NULL)
                $parameters['in_completed'] = $obj->completed; // #"in_completed"
            if($obj->template_url != NULL)
                $parameters['in_template_url'] = $obj->template_url; // #"in_template_url"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->path != NULL)
                $parameters['in_path'] = $obj->path; // #"in_path"
            if($obj->data != NULL)
                $parameters['in_data'] = $obj->data; // #"in_data"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->fulfilled != NULL)
                $parameters['in_fulfilled'] = $obj->fulfilled; // #"in_fulfilled"
            if($obj->channel_id != NULL)
                $parameters['in_channel_id'] = $obj->channel_id; // #"in_channel_id"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_reward_competition_set_uuid(".
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
    
    public function DelRewardCompetitionByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_competition_del_uuid(".
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
    public function DelRewardCompetitionByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_competition_del_code(".
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
    public function DelRewardCompetitionByPathByChannelId(
        $path
        , $channel_id
    ) {
        $parameters = array();
        $parameters['in_path'] = $path; // #"in_path"
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_competition_del_path_channel_id(".
                    "in_path".
                    ", in_channel_id".
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
    public function DelRewardCompetitionByPath(
        $path
    ) {
        $parameters = array();
        $parameters['in_path'] = $path; // #"in_path"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_competition_del_path(".
                    "in_path".
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
    public function DelRewardCompetitionByChannelIdByPath(
        $channel_id
        , $path
    ) {
        $parameters = array();
        $parameters['in_channel_id'] = $channel_id; // #"in_channel_id"
        $parameters['in_path'] = $path; // #"in_path"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_competition_del_channel_id_path(".
                    "in_channel_id".
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
    public function GetRewardCompetitionListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_competition_get_uuid(".
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
    public function GetRewardCompetitionListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_competition_get_code(".
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
    public function GetRewardCompetitionListByName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_competition_get_name(".
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
    public function GetRewardCompetitionListByPath(
        $path
    ) {
            
        $parameters = array();
        $parameters['in_path'] =  $path; //#"in_path"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_competition_get_path(".
                    "in_path".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetRewardCompetitionListByChannelId(
        $channel_id
    ) {
            
        $parameters = array();
        $parameters['in_channel_id'] =  $channel_id; //#"in_channel_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_competition_get_channel_id(".
                    "in_channel_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetRewardCompetitionListByChannelIdByCompleted(
        $channel_id
        , $completed
    ) {
            
        $parameters = array();
        $parameters['in_channel_id'] =  $channel_id; //#"in_channel_id"
        $parameters['in_completed'] =  $completed; //#"in_completed"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_competition_get_channel_id_completed(".
                    "in_channel_id".
                    ", in_completed".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetRewardCompetitionListByChannelIdByPath(
        $channel_id
        , $path
    ) {
            
        $parameters = array();
        $parameters['in_channel_id'] =  $channel_id; //#"in_channel_id"
        $parameters['in_path'] =  $path; //#"in_path"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_reward_competition_get_channel_id_path(".
                    "in_channel_id".
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

}


?>
