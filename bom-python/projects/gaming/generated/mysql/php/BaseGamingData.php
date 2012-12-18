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
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->secret != NULL)
                $parameters['in_secret'] = $obj->secret; // #"in_secret"
            if($obj->token != NULL)
                $parameters['in_token'] = $obj->token; // #"in_token"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

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
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->val != NULL)
                $parameters['in_val'] = $obj->val; // #"in_val"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->otype != NULL)
                $parameters['in_otype'] = $obj->otype; // #"in_otype"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"

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
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->val != NULL)
                $parameters['in_val'] = $obj->val; // #"in_val"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->otype != NULL)
                $parameters['in_otype'] = $obj->otype; // #"in_otype"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"

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
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->val != NULL)
                $parameters['in_val'] = $obj->val; // #"in_val"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->otype != NULL)
                $parameters['in_otype'] = $obj->otype; // #"in_otype"
            if($obj->game_id != NULL)
                $parameters['in_game_id'] = $obj->game_id; // #"in_game_id"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"

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
    public function CountGameStatisticLeaderboardByUuid(
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
    public function CountGameStatisticLeaderboardByKey(
        $key
    ) {
        $parameters = array();
        $parameters['in_key'] = $key; // #"in_key"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_count_key(".
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
    public function CountGameStatisticLeaderboardByGameId(
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
    public function CountGameStatisticLeaderboardByKeyByGameId(
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
                , "CALL usp_game_statistic_leaderboard_count_key_game_id(".
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
    public function CountGameStatisticLeaderboardByProfileIdByGameId(
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
    public function CountGameStatisticLeaderboardByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_key'] = $key; // #"in_key"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_count_key_profile_id_game_id(".
                    "in_key".
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
    public function CountGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        $parameters = array();
        $parameters['in_key'] = $key; // #"in_key"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_timestamp'] = $timestamp; // #"in_timestamp"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_count_key_profile_id_game_id_tim(".
                    "in_key".
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
    public function BrowseGameStatisticLeaderboardListByFilter($filter_obj) {
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

    public function SetGameStatisticLeaderboardByUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
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
    
    public function SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
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
    
    public function SetGameStatisticLeaderboardByProfileIdByKey($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
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
                    , "CALL usp_game_statistic_leaderboard_set_profile_id_key(".
                        "in_profile_id".
                        ", in_key".
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
    
    public function SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
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
                    , "CALL usp_game_statistic_leaderboard_set_profile_id_key_timestamp(".
                        "in_profile_id".
                        ", in_key".
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
    
    public function SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
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
                    , "CALL usp_game_statistic_leaderboard_set_key_profile_id_game_id_times(".
                        "in_key".
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
    
    public function SetGameStatisticLeaderboardByProfileIdByGameIdByKey($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
            if($obj->stat_value_formatted != NULL)
                $parameters['in_stat_value_formatted'] = $obj->stat_value_formatted; // #"in_stat_value_formatted"
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
                    , "CALL usp_game_statistic_leaderboard_set_profile_id_game_id_key(".
                        "in_profile_id".
                        ", in_game_id".
                        ", in_key".
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
    
    public function DelGameStatisticLeaderboardByUuid(
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
    public function DelGameStatisticLeaderboardByKeyByGameId(
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
                , "CALL usp_game_statistic_leaderboard_del_key_game_id(".
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
    public function DelGameStatisticLeaderboardByProfileIdByGameId(
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
    public function DelGameStatisticLeaderboardByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_key'] = $key; // #"in_key"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_del_key_profile_id_game_id(".
                    "in_key".
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
    public function GetGameStatisticLeaderboardListByUuid(
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
    public function GetGameStatisticLeaderboardListByKey(
        $key
    ) {
            
        $parameters = array();
        $parameters['in_key'] =  $key; //#"in_key"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_get_key(".
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
    public function GetGameStatisticLeaderboardListByGameId(
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
    public function GetGameStatisticLeaderboardListByKeyByGameId(
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
                , "CALL usp_game_statistic_leaderboard_get_key_game_id(".
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
    public function GetGameStatisticLeaderboardListByProfileIdByGameId(
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
    public function GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
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
    public function GetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_key'] =  $key; //#"in_key"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_get_key_profile_id_game_id(".
                    "in_key".
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
    public function GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
            
        $parameters = array();
        $parameters['in_key'] =  $key; //#"in_key"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_timestamp'] =  $timestamp; //#"in_timestamp"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_leaderboard_get_key_profile_id_game_id_times(".
                    "in_key".
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
    public function CountGameProfileStatisticByKey(
        $key
    ) {
        $parameters = array();
        $parameters['in_key'] = $key; // #"in_key"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_count_key(".
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
    public function CountGameProfileStatisticByKeyByGameId(
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
                , "CALL usp_game_profile_statistic_count_key_game_id(".
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
    public function CountGameProfileStatisticByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_key'] = $key; // #"in_key"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_count_key_profile_id_game_id(".
                    "in_key".
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
    public function CountGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        $parameters = array();
        $parameters['in_key'] = $key; // #"in_key"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_timestamp'] = $timestamp; // #"in_timestamp"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_count_key_profile_id_game_id_timesta(".
                    "in_key".
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
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
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
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
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
    
    public function SetGameProfileStatisticByProfileIdByKey($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
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
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_statistic_set_profile_id_key(".
                        "in_profile_id".
                        ", in_key".
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
    
    public function SetGameProfileStatisticByProfileIdByKeyByTimestamp($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
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
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_statistic_set_profile_id_key_timestamp(".
                        "in_profile_id".
                        ", in_key".
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
    
    public function SetGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
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
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_statistic_set_key_profile_id_game_id_timestamp(".
                        "in_key".
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
    
    public function SetGameProfileStatisticByProfileIdByGameIdByKey($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
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
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_profile_statistic_set_profile_id_game_id_key(".
                        "in_profile_id".
                        ", in_game_id".
                        ", in_key".
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
    public function DelGameProfileStatisticByKeyByGameId(
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
                , "CALL usp_game_profile_statistic_del_key_game_id(".
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
    public function DelGameProfileStatisticByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_key'] = $key; // #"in_key"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_del_key_profile_id_game_id(".
                    "in_key".
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
    public function GetGameProfileStatisticListByKey(
        $key
    ) {
            
        $parameters = array();
        $parameters['in_key'] =  $key; //#"in_key"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_get_key(".
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
    public function GetGameProfileStatisticListByKeyByGameId(
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
                , "CALL usp_game_profile_statistic_get_key_game_id(".
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
    public function GetGameProfileStatisticListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_key'] =  $key; //#"in_key"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_get_key_profile_id_game_id(".
                    "in_key".
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
    public function GetGameProfileStatisticListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
            
        $parameters = array();
        $parameters['in_key'] =  $key; //#"in_key"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_timestamp'] =  $timestamp; //#"in_timestamp"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_get_key_profile_id_game_id_timestamp(".
                    "in_key".
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
    public function CountGameStatisticMetaByKey(
        $key
    ) {
        $parameters = array();
        $parameters['in_key'] = $key; // #"in_key"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_meta_count_key(".
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
    public function CountGameStatisticMetaByKeyByGameId(
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
                , "CALL usp_game_statistic_meta_count_key_game_id(".
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
    
    public function SetGameStatisticMetaByKeyByGameId($set_type, $obj) {
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
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_statistic_meta_set_key_game_id(".
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
    public function DelGameStatisticMetaByKeyByGameId(
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
                , "CALL usp_game_statistic_meta_del_key_game_id(".
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
    public function GetGameStatisticMetaListByKey(
        $key
    ) {
            
        $parameters = array();
        $parameters['in_key'] =  $key; //#"in_key"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_meta_get_key(".
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
    public function GetGameStatisticMetaListByKeyByGameId(
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
                , "CALL usp_game_statistic_meta_get_key_game_id(".
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
    public function CountGameProfileStatisticTimestampByUuid(
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
    public function CountGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        $parameters = array();
        $parameters['in_key'] = $key; // #"in_key"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_timestamp'] = $timestamp; // #"in_timestamp"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_timestamp_count_key_profile_id_game_(".
                    "in_key".
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
    public function BrowseGameProfileStatisticTimestampListByFilter($filter_obj) {
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

    public function SetGameProfileStatisticTimestampByUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
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
    
    public function SetGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
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
                    , "CALL usp_game_profile_statistic_timestamp_set_key_profile_id_game_id(".
                        "in_key".
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
    
    public function DelGameProfileStatisticTimestampByUuid(
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
    public function DelGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        $parameters = array();
        $parameters['in_key'] = $key; // #"in_key"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_timestamp'] = $timestamp; // #"in_timestamp"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_timestamp_del_key_profile_id_game_id(".
                    "in_key".
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
    public function GetGameProfileStatisticTimestampListByUuid(
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
    public function GetGameProfileStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
            
        $parameters = array();
        $parameters['in_key'] =  $key; //#"in_key"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_timestamp'] =  $timestamp; //#"in_timestamp"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_statistic_timestamp_get_key_profile_id_game_id(".
                    "in_key".
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
    public function CountGameLevelByKey(
        $key
    ) {
        $parameters = array();
        $parameters['in_key'] = $key; // #"in_key"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_level_count_key(".
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
    public function CountGameLevelByKeyByGameId(
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
                , "CALL usp_game_level_count_key_game_id(".
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
    
    public function SetGameLevelByKeyByGameId($set_type, $obj) {
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
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_level_set_key_game_id(".
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
    public function DelGameLevelByKeyByGameId(
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
                , "CALL usp_game_level_del_key_game_id(".
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
    public function GetGameLevelListByKey(
        $key
    ) {
            
        $parameters = array();
        $parameters['in_key'] =  $key; //#"in_key"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_level_get_key(".
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
    public function GetGameLevelListByKeyByGameId(
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
                , "CALL usp_game_level_get_key_game_id(".
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
    public function CountGameProfileAchievementByProfileIdByKey(
        $profile_id
        , $key
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_key'] = $key; // #"in_key"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_count_profile_id_key(".
                    "in_profile_id".
                    ", in_key".
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
    public function CountGameProfileAchievementByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        $parameters = array();
        $parameters['in_key'] = $key; // #"in_key"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_count_key_profile_id_game_id(".
                    "in_key".
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
    public function CountGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        $parameters = array();
        $parameters['in_key'] = $key; // #"in_key"
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
        $parameters['in_timestamp'] = $timestamp; // #"in_timestamp"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_count_key_profile_id_game_id_times(".
                    "in_key".
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
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->completed != NULL)
                $parameters['in_completed'] = $obj->completed; // #"in_completed"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
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
    
    public function SetGameProfileAchievementByUuidByKey($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->completed != NULL)
                $parameters['in_completed'] = $obj->completed; // #"in_completed"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
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
                    , "CALL usp_game_profile_achievement_set_uuid_key(".
                        "in_uuid".
                        ", in_key".
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
    
    public function SetGameProfileAchievementByProfileIdByKey($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->completed != NULL)
                $parameters['in_completed'] = $obj->completed; // #"in_completed"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
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
                    , "CALL usp_game_profile_achievement_set_profile_id_key(".
                        "in_profile_id".
                        ", in_key".
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
    
    public function SetGameProfileAchievementByKeyByProfileIdByGameId($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->completed != NULL)
                $parameters['in_completed'] = $obj->completed; // #"in_completed"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
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
                    , "CALL usp_game_profile_achievement_set_key_profile_id_game_id(".
                        "in_key".
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
    
    public function SetGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->username != NULL)
                $parameters['in_username'] = $obj->username; // #"in_username"
            if($obj->timestamp != NULL)
                $parameters['in_timestamp'] = $obj->timestamp; // #"in_timestamp"
            if($obj->completed != NULL)
                $parameters['in_completed'] = $obj->completed; // #"in_completed"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->key != NULL)
                $parameters['in_key'] = $obj->key; // #"in_key"
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
                    , "CALL usp_game_profile_achievement_set_key_profile_id_game_id_timesta(".
                        "in_key".
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
    public function DelGameProfileAchievementByProfileIdByKey(
        $profile_id
        , $key
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_key'] = $key; // #"in_key"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_del_profile_id_key(".
                    "in_profile_id".
                    ", in_key".
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
    public function DelGameProfileAchievementByUuidByKey(
        $uuid
        , $key
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
        $parameters['in_key'] = $key; // #"in_key"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_del_uuid_key(".
                    "in_uuid".
                    ", in_key".
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
    public function GetGameProfileAchievementListByProfileIdByKey(
        $profile_id
        , $key
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_key'] =  $key; //#"in_key"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_get_profile_id_key(".
                    "in_profile_id".
                    ", in_key".
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
    public function GetGameProfileAchievementListByKey(
        $key
    ) {
            
        $parameters = array();
        $parameters['in_key'] =  $key; //#"in_key"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_get_key(".
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
    public function GetGameProfileAchievementListByKeyByGameId(
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
                , "CALL usp_game_profile_achievement_get_key_game_id(".
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
    public function GetGameProfileAchievementListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
            
        $parameters = array();
        $parameters['in_key'] =  $key; //#"in_key"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_get_key_profile_id_game_id(".
                    "in_key".
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
    public function GetGameProfileAchievementListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
            
        $parameters = array();
        $parameters['in_key'] =  $key; //#"in_key"
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
        $parameters['in_timestamp'] =  $timestamp; //#"in_timestamp"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_profile_achievement_get_key_profile_id_game_id_timesta(".
                    "in_key".
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
    public function CountGameAchievementMetaByKey(
        $key
    ) {
        $parameters = array();
        $parameters['in_key'] = $key; // #"in_key"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_meta_count_key(".
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
    public function CountGameAchievementMetaByKeyByGameId(
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
                , "CALL usp_game_achievement_meta_count_key_game_id(".
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
    
    public function SetGameAchievementMetaByKeyByGameId($set_type, $obj) {
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
            if($obj->leaderboard != NULL)
                $parameters['in_leaderboard'] = $obj->leaderboard; // #"in_leaderboard"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_game_achievement_meta_set_key_game_id(".
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
    public function DelGameAchievementMetaByKeyByGameId(
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
                , "CALL usp_game_achievement_meta_del_key_game_id(".
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
    public function GetGameAchievementMetaListByKey(
        $key
    ) {
            
        $parameters = array();
        $parameters['in_key'] =  $key; //#"in_key"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_meta_get_key(".
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
    public function GetGameAchievementMetaListByKeyByGameId(
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
                , "CALL usp_game_achievement_meta_get_key_game_id(".
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

}


?>
