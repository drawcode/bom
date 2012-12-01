<?php // namespace Platform;

require_once('core/data/mysql/DataProvider.php');


class BasePlatformData {

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
            
    public function CountApp(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountAppByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_count_uuid(".
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
    public function CountAppByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_count_code(".
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
    public function CountAppByTypeId(
        $type_id
    ) {
        $parameters = array();
        $parameters['in_type_id'] = $type_id; // #"in_type_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_count_type_id(".
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
    public function CountAppByCodeByTypeId(
        $code
        , $type_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_type_id'] = $type_id; // #"in_type_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_count_code_type_id(".
                    "in_code".
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
    public function CountAppByPlatformByTypeId(
        $platform
        , $type_id
    ) {
        $parameters = array();
        $parameters['in_platform'] = $platform; // #"in_platform"
        $parameters['in_type_id'] = $type_id; // #"in_type_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_count_platform_type_id(".
                    "in_platform".
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
    public function CountAppByPlatform(
        $platform
    ) {
        $parameters = array();
        $parameters['in_platform'] = $platform; // #"in_platform"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_count_platform(".
                    "in_platform".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseAppListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetAppByUuid($set_type, $obj) {
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
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->platform != NULL)
                $parameters['in_platform'] = $obj->platform; // #"in_platform"
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
                    , "CALL usp_app_set_uuid(".
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
    
    public function SetAppByCode($set_type, $obj) {
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
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->platform != NULL)
                $parameters['in_platform'] = $obj->platform; // #"in_platform"
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
                    , "CALL usp_app_set_code(".
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
    
    public function DelAppByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_del_uuid(".
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
    public function DelAppByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_del_code(".
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
    public function GetAppList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetAppListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_get_uuid(".
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
    public function GetAppListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_get_code(".
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
    public function GetAppListByTypeId(
        $type_id
    ) {
            
        $parameters = array();
        $parameters['in_type_id'] =  $type_id; //#"in_type_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_get_type_id(".
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
    public function GetAppListByCodeByTypeId(
        $code
        , $type_id
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_type_id'] =  $type_id; //#"in_type_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_get_code_type_id(".
                    "in_code".
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
    public function GetAppListByPlatformByTypeId(
        $platform
        , $type_id
    ) {
            
        $parameters = array();
        $parameters['in_platform'] =  $platform; //#"in_platform"
        $parameters['in_type_id'] =  $type_id; //#"in_type_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_get_platform_type_id(".
                    "in_platform".
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
    public function GetAppListByPlatform(
        $platform
    ) {
            
        $parameters = array();
        $parameters['in_platform'] =  $platform; //#"in_platform"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_get_platform(".
                    "in_platform".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountAppType(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_type_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountAppTypeByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_type_count_uuid(".
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
    public function CountAppTypeByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_type_count_code(".
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
    public function BrowseAppTypeListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_type_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetAppTypeByUuid($set_type, $obj) {
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
                    , "CALL usp_app_type_set_uuid(".
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
    
    public function SetAppTypeByCode($set_type, $obj) {
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
                    , "CALL usp_app_type_set_code(".
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
    
    public function DelAppTypeByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_type_del_uuid(".
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
    public function DelAppTypeByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_type_del_code(".
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
    public function GetAppTypeList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_type_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetAppTypeListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_type_get_uuid(".
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
    public function GetAppTypeListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_app_type_get_code(".
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
    public function CountSite(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountSiteByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_count_uuid(".
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
    public function CountSiteByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_count_code(".
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
    public function CountSiteByTypeId(
        $type_id
    ) {
        $parameters = array();
        $parameters['in_type_id'] = $type_id; // #"in_type_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_count_type_id(".
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
    public function CountSiteByCodeByTypeId(
        $code
        , $type_id
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
        $parameters['in_type_id'] = $type_id; // #"in_type_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_count_code_type_id(".
                    "in_code".
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
    public function CountSiteByDomainByTypeId(
        $domain
        , $type_id
    ) {
        $parameters = array();
        $parameters['in_domain'] = $domain; // #"in_domain"
        $parameters['in_type_id'] = $type_id; // #"in_type_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_count_domain_type_id(".
                    "in_domain".
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
    public function CountSiteByDomain(
        $domain
    ) {
        $parameters = array();
        $parameters['in_domain'] = $domain; // #"in_domain"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_count_domain(".
                    "in_domain".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseSiteListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetSiteByUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->domain != NULL)
                $parameters['in_domain'] = $obj->domain; // #"in_domain"
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
                    , "CALL usp_site_set_uuid(".
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
    
    public function SetSiteByCode($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->domain != NULL)
                $parameters['in_domain'] = $obj->domain; // #"in_domain"
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
                    , "CALL usp_site_set_code(".
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
    
    public function DelSiteByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_del_uuid(".
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
    public function DelSiteByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_del_code(".
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
    public function GetSiteList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetSiteListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_get_uuid(".
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
    public function GetSiteListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_get_code(".
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
    public function GetSiteListByTypeId(
        $type_id
    ) {
            
        $parameters = array();
        $parameters['in_type_id'] =  $type_id; //#"in_type_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_get_type_id(".
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
    public function GetSiteListByCodeByTypeId(
        $code
        , $type_id
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
        $parameters['in_type_id'] =  $type_id; //#"in_type_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_get_code_type_id(".
                    "in_code".
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
    public function GetSiteListByDomainByTypeId(
        $domain
        , $type_id
    ) {
            
        $parameters = array();
        $parameters['in_domain'] =  $domain; //#"in_domain"
        $parameters['in_type_id'] =  $type_id; //#"in_type_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_get_domain_type_id(".
                    "in_domain".
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
    public function GetSiteListByDomain(
        $domain
    ) {
            
        $parameters = array();
        $parameters['in_domain'] =  $domain; //#"in_domain"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_get_domain(".
                    "in_domain".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountSiteType(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_type_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountSiteTypeByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_type_count_uuid(".
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
    public function CountSiteTypeByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_type_count_code(".
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
    public function BrowseSiteTypeListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_type_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetSiteTypeByUuid($set_type, $obj) {
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
                    , "CALL usp_site_type_set_uuid(".
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
    
    public function SetSiteTypeByCode($set_type, $obj) {
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
                    , "CALL usp_site_type_set_code(".
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
    
    public function DelSiteTypeByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_type_del_uuid(".
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
    public function DelSiteTypeByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_type_del_code(".
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
    public function GetSiteTypeList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_type_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetSiteTypeListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_type_get_uuid(".
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
    public function GetSiteTypeListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_type_get_code(".
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
            if($obj->type_id != NULL)
                $parameters['in_type_id'] = $obj->type_id; // #"in_type_id"
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
    public function GetOrgList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
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
    public function CountOrgType(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_type_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountOrgTypeByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_type_count_uuid(".
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
    public function CountOrgTypeByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_type_count_code(".
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
    public function BrowseOrgTypeListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_type_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetOrgTypeByUuid($set_type, $obj) {
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
                    , "CALL usp_org_type_set_uuid(".
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
    
    public function SetOrgTypeByCode($set_type, $obj) {
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
                    , "CALL usp_org_type_set_code(".
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
    
    public function DelOrgTypeByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_type_del_uuid(".
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
    public function DelOrgTypeByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_type_del_code(".
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
    public function GetOrgTypeList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_type_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetOrgTypeListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_type_get_uuid(".
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
    public function GetOrgTypeListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_type_get_code(".
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
    public function CountContentItem(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_item_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountContentItemByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_item_count_uuid(".
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
    public function CountContentItemByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_item_count_code(".
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
    public function CountContentItemByName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_item_count_name(".
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
    public function CountContentItemByPath(
        $path
    ) {
        $parameters = array();
        $parameters['in_path'] = $path; // #"in_path"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_item_count_path(".
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
    public function BrowseContentItemListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_item_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetContentItemByUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->type_id != NULL)
                $parameters['in_type_id'] = $obj->type_id; // #"in_type_id"
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
            if($obj->date_end != NULL)
                $parameters['in_date_end'] = $obj->date_end; // #"in_date_end"
            if($obj->date_start != NULL)
                $parameters['in_date_start'] = $obj->date_start; // #"in_date_start"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->path != NULL)
                $parameters['in_path'] = $obj->path; // #"in_path"
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
                    , "CALL usp_content_item_set_uuid(".
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
    
    public function DelContentItemByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_item_del_uuid(".
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
    public function DelContentItemByPath(
        $path
    ) {
        $parameters = array();
        $parameters['in_path'] = $path; // #"in_path"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_item_del_path(".
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
    public function GetContentItemList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_item_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetContentItemListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_item_get_uuid(".
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
    public function GetContentItemListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_item_get_code(".
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
    public function GetContentItemListByName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_item_get_name(".
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
    public function GetContentItemListByPath(
        $path
    ) {
            
        $parameters = array();
        $parameters['in_path'] =  $path; //#"in_path"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_item_get_path(".
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
    public function CountContentItemType(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_item_type_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountContentItemTypeByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_item_type_count_uuid(".
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
    public function CountContentItemTypeByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_item_type_count_code(".
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
    public function BrowseContentItemTypeListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_item_type_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetContentItemTypeByUuid($set_type, $obj) {
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
                    , "CALL usp_content_item_type_set_uuid(".
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
    
    public function SetContentItemTypeByCode($set_type, $obj) {
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
                    , "CALL usp_content_item_type_set_code(".
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
    
    public function DelContentItemTypeByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_item_type_del_uuid(".
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
    public function DelContentItemTypeByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_item_type_del_code(".
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
    public function GetContentItemTypeList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_item_type_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetContentItemTypeListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_item_type_get_uuid(".
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
    public function GetContentItemTypeListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_item_type_get_code(".
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
    public function CountContentPage(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_page_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountContentPageByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_page_count_uuid(".
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
    public function CountContentPageByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_page_count_code(".
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
    public function CountContentPageByName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_page_count_name(".
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
    public function CountContentPageByPath(
        $path
    ) {
        $parameters = array();
        $parameters['in_path'] = $path; // #"in_path"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_page_count_path(".
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
    public function BrowseContentPageListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_page_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetContentPageByUuid($set_type, $obj) {
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
            if($obj->date_end != NULL)
                $parameters['in_date_end'] = $obj->date_end; // #"in_date_end"
            if($obj->date_start != NULL)
                $parameters['in_date_start'] = $obj->date_start; // #"in_date_start"
            if($obj->site_id != NULL)
                $parameters['in_site_id'] = $obj->site_id; // #"in_site_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->template != NULL)
                $parameters['in_template'] = $obj->template; // #"in_template"
            if($obj->path != NULL)
                $parameters['in_path'] = $obj->path; // #"in_path"
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
                    , "CALL usp_content_page_set_uuid(".
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
    
    public function DelContentPageByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_page_del_uuid(".
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
    public function DelContentPageByPathBySiteId(
        $path
        , $site_id
    ) {
        $parameters = array();
        $parameters['in_path'] = $path; // #"in_path"
        $parameters['in_site_id'] = $site_id; // #"in_site_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_page_del_path_site_id(".
                    "in_path".
                    ", in_site_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function DelContentPageByPath(
        $path
    ) {
        $parameters = array();
        $parameters['in_path'] = $path; // #"in_path"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_page_del_path(".
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
    public function GetContentPageList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_page_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetContentPageListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_page_get_uuid(".
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
    public function GetContentPageListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_page_get_code(".
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
    public function GetContentPageListByName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_page_get_name(".
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
    public function GetContentPageListByPath(
        $path
    ) {
            
        $parameters = array();
        $parameters['in_path'] =  $path; //#"in_path"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_page_get_path(".
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
    public function GetContentPageListBySiteId(
        $site_id
    ) {
            
        $parameters = array();
        $parameters['in_site_id'] =  $site_id; //#"in_site_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_page_get_site_id(".
                    "in_site_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetContentPageListBySiteIdByPath(
        $site_id
        , $path
    ) {
            
        $parameters = array();
        $parameters['in_site_id'] =  $site_id; //#"in_site_id"
        $parameters['in_path'] =  $path; //#"in_path"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_content_page_get_site_id_path(".
                    "in_site_id".
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
    public function CountMessage(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_message_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountMessageByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_message_count_uuid(".
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
    public function BrowseMessageListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_message_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetMessageByUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->profile_from_name != NULL)
                $parameters['in_profile_from_name'] = $obj->profile_from_name; // #"in_profile_from_name"
            if($obj->read != NULL)
                $parameters['in_read'] = $obj->read; // #"in_read"
            if($obj->profile_from_id != NULL)
                $parameters['in_profile_from_id'] = $obj->profile_from_id; // #"in_profile_from_id"
            if($obj->profile_to_token != NULL)
                $parameters['in_profile_to_token'] = $obj->profile_to_token; // #"in_profile_to_token"
            if($obj->app_id != NULL)
                $parameters['in_app_id'] = $obj->app_id; // #"in_app_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->subject != NULL)
                $parameters['in_subject'] = $obj->subject; // #"in_subject"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->profile_to_id != NULL)
                $parameters['in_profile_to_id'] = $obj->profile_to_id; // #"in_profile_to_id"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->profile_to_name != NULL)
                $parameters['in_profile_to_name'] = $obj->profile_to_name; // #"in_profile_to_name"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->sent != NULL)
                $parameters['in_sent'] = $obj->sent; // #"in_sent"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_message_set_uuid(".
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
    
    public function DelMessageByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_message_del_uuid(".
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
    public function GetMessageList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_message_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetMessageListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_message_get_uuid(".
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
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->network_uuid != NULL)
                $parameters['in_network_uuid'] = $obj->network_uuid; // #"in_network_uuid"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->game_area != NULL)
                $parameters['in_game_area'] = $obj->game_area; // #"in_game_area"
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
            if($obj->game_level != NULL)
                $parameters['in_game_level'] = $obj->game_level; // #"in_game_level"
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
    public function CountOffer(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountOfferByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_count_uuid(".
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
    public function CountOfferByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_count_code(".
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
    public function CountOfferByName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_count_name(".
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
    public function CountOfferByOrgId(
        $org_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_count_org_id(".
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
    public function BrowseOfferListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetOfferByUuid($set_type, $obj) {
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
            if($obj->type_id != NULL)
                $parameters['in_type_id'] = $obj->type_id; // #"in_type_id"
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
                    , "CALL usp_offer_set_uuid(".
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
    
    public function DelOfferByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_del_uuid(".
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
    public function DelOfferByOrgId(
        $org_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_del_org_id(".
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
    public function GetOfferList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetOfferListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_get_uuid(".
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
    public function GetOfferListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_get_code(".
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
    public function GetOfferListByName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_get_name(".
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
    public function GetOfferListByOrgId(
        $org_id
    ) {
            
        $parameters = array();
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_get_org_id(".
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
    public function CountOfferType(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_type_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountOfferTypeByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_type_count_uuid(".
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
    public function CountOfferTypeByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_type_count_code(".
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
    public function CountOfferTypeByName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_type_count_name(".
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
    public function BrowseOfferTypeListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_type_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetOfferTypeByUuid($set_type, $obj) {
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
                    , "CALL usp_offer_type_set_uuid(".
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
    
    public function DelOfferTypeByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_type_del_uuid(".
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
    public function GetOfferTypeList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_type_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetOfferTypeListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_type_get_uuid(".
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
    public function GetOfferTypeListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_type_get_code(".
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
    public function GetOfferTypeListByName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_type_get_name(".
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
    public function CountOfferLocation(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_location_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountOfferLocationByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_location_count_uuid(".
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
    public function CountOfferLocationByOfferId(
        $offer_id
    ) {
        $parameters = array();
        $parameters['in_offer_id'] = $offer_id; // #"in_offer_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_location_count_offer_id(".
                    "in_offer_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountOfferLocationByCity(
        $city
    ) {
        $parameters = array();
        $parameters['in_city'] = $city; // #"in_city"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_location_count_city(".
                    "in_city".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountOfferLocationByCountryCode(
        $country_code
    ) {
        $parameters = array();
        $parameters['in_country_code'] = $country_code; // #"in_country_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_location_count_country_code(".
                    "in_country_code".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountOfferLocationByPostalCode(
        $postal_code
    ) {
        $parameters = array();
        $parameters['in_postal_code'] = $postal_code; // #"in_postal_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_location_count_postal_code(".
                    "in_postal_code".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseOfferLocationListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_location_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetOfferLocationByUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->fax != NULL)
                $parameters['in_fax'] = $obj->fax; // #"in_fax"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->address1 != NULL)
                $parameters['in_address1'] = $obj->address1; // #"in_address1"
            if($obj->twitter != NULL)
                $parameters['in_twitter'] = $obj->twitter; // #"in_twitter"
            if($obj->phone != NULL)
                $parameters['in_phone'] = $obj->phone; // #"in_phone"
            if($obj->postal_code != NULL)
                $parameters['in_postal_code'] = $obj->postal_code; // #"in_postal_code"
            if($obj->offer_id != NULL)
                $parameters['in_offer_id'] = $obj->offer_id; // #"in_offer_id"
            if($obj->country_code != NULL)
                $parameters['in_country_code'] = $obj->country_code; // #"in_country_code"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->state_province != NULL)
                $parameters['in_state_province'] = $obj->state_province; // #"in_state_province"
            if($obj->city != NULL)
                $parameters['in_city'] = $obj->city; // #"in_city"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->dob != NULL)
                $parameters['in_dob'] = $obj->dob; // #"in_dob"
            if($obj->date_start != NULL)
                $parameters['in_date_start'] = $obj->date_start; // #"in_date_start"
            if($obj->longitude != NULL)
                $parameters['in_longitude'] = $obj->longitude; // #"in_longitude"
            if($obj->email != NULL)
                $parameters['in_email'] = $obj->email; // #"in_email"
            if($obj->date_end != NULL)
                $parameters['in_date_end'] = $obj->date_end; // #"in_date_end"
            if($obj->latitude != NULL)
                $parameters['in_latitude'] = $obj->latitude; // #"in_latitude"
            if($obj->facebook != NULL)
                $parameters['in_facebook'] = $obj->facebook; // #"in_facebook"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->address2 != NULL)
                $parameters['in_address2'] = $obj->address2; // #"in_address2"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_offer_location_set_uuid(".
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
    
    public function DelOfferLocationByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_location_del_uuid(".
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
    public function GetOfferLocationList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_location_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetOfferLocationListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_location_get_uuid(".
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
    public function GetOfferLocationListByOfferId(
        $offer_id
    ) {
            
        $parameters = array();
        $parameters['in_offer_id'] =  $offer_id; //#"in_offer_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_location_get_offer_id(".
                    "in_offer_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetOfferLocationListByCity(
        $city
    ) {
            
        $parameters = array();
        $parameters['in_city'] =  $city; //#"in_city"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_location_get_city(".
                    "in_city".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetOfferLocationListByCountryCode(
        $country_code
    ) {
            
        $parameters = array();
        $parameters['in_country_code'] =  $country_code; //#"in_country_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_location_get_country_code(".
                    "in_country_code".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetOfferLocationListByPostalCode(
        $postal_code
    ) {
            
        $parameters = array();
        $parameters['in_postal_code'] =  $postal_code; //#"in_postal_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_location_get_postal_code(".
                    "in_postal_code".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountOfferCategory(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountOfferCategoryByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_count_uuid(".
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
    public function CountOfferCategoryByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_count_code(".
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
    public function CountOfferCategoryByName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_count_name(".
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
    public function CountOfferCategoryByOrgId(
        $org_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_count_org_id(".
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
    public function CountOfferCategoryByTypeId(
        $type_id
    ) {
        $parameters = array();
        $parameters['in_type_id'] = $type_id; // #"in_type_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_count_type_id(".
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
    public function CountOfferCategoryByOrgIdByTypeId(
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
                , "CALL usp_offer_category_count_org_id_type_id(".
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
    public function BrowseOfferCategoryListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetOfferCategoryByUuid($set_type, $obj) {
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
                    , "CALL usp_offer_category_set_uuid(".
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
    
    public function DelOfferCategoryByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_del_uuid(".
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
    public function DelOfferCategoryByCodeByOrgId(
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
                , "CALL usp_offer_category_del_code_org_id(".
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
    public function DelOfferCategoryByCodeByOrgIdByTypeId(
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
                , "CALL usp_offer_category_del_code_org_id_type_id(".
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
    public function GetOfferCategoryList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetOfferCategoryListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_get_uuid(".
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
    public function GetOfferCategoryListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_get_code(".
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
    public function GetOfferCategoryListByName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_get_name(".
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
    public function GetOfferCategoryListByOrgId(
        $org_id
    ) {
            
        $parameters = array();
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_get_org_id(".
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
    public function GetOfferCategoryListByTypeId(
        $type_id
    ) {
            
        $parameters = array();
        $parameters['in_type_id'] =  $type_id; //#"in_type_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_get_type_id(".
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
    public function GetOfferCategoryListByOrgIdByTypeId(
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
                , "CALL usp_offer_category_get_org_id_type_id(".
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
    public function CountOfferCategoryTree(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_tree_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountOfferCategoryTreeByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_tree_count_uuid(".
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
    public function CountOfferCategoryTreeByParentId(
        $parent_id
    ) {
        $parameters = array();
        $parameters['in_parent_id'] = $parent_id; // #"in_parent_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_tree_count_parent_id(".
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
    public function CountOfferCategoryTreeByCategoryId(
        $category_id
    ) {
        $parameters = array();
        $parameters['in_category_id'] = $category_id; // #"in_category_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_tree_count_category_id(".
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
    public function CountOfferCategoryTreeByParentIdByCategoryId(
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
                , "CALL usp_offer_category_tree_count_parent_id_category_id(".
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
    public function BrowseOfferCategoryTreeListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_tree_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetOfferCategoryTreeByUuid($set_type, $obj) {
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
                    , "CALL usp_offer_category_tree_set_uuid(".
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
    
    public function DelOfferCategoryTreeByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_tree_del_uuid(".
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
    public function DelOfferCategoryTreeByParentId(
        $parent_id
    ) {
        $parameters = array();
        $parameters['in_parent_id'] = $parent_id; // #"in_parent_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_tree_del_parent_id(".
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
    public function DelOfferCategoryTreeByCategoryId(
        $category_id
    ) {
        $parameters = array();
        $parameters['in_category_id'] = $category_id; // #"in_category_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_tree_del_category_id(".
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
    public function DelOfferCategoryTreeByParentIdByCategoryId(
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
                , "CALL usp_offer_category_tree_del_parent_id_category_id(".
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
    public function GetOfferCategoryTreeList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_tree_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetOfferCategoryTreeListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_tree_get_uuid(".
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
    public function GetOfferCategoryTreeListByParentId(
        $parent_id
    ) {
            
        $parameters = array();
        $parameters['in_parent_id'] =  $parent_id; //#"in_parent_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_tree_get_parent_id(".
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
    public function GetOfferCategoryTreeListByCategoryId(
        $category_id
    ) {
            
        $parameters = array();
        $parameters['in_category_id'] =  $category_id; //#"in_category_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_tree_get_category_id(".
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
    public function GetOfferCategoryTreeListByParentIdByCategoryId(
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
                , "CALL usp_offer_category_tree_get_parent_id_category_id(".
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
    public function CountOfferCategoryAssoc(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_assoc_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountOfferCategoryAssocByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_assoc_count_uuid(".
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
    public function CountOfferCategoryAssocByOfferId(
        $offer_id
    ) {
        $parameters = array();
        $parameters['in_offer_id'] = $offer_id; // #"in_offer_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_assoc_count_offer_id(".
                    "in_offer_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountOfferCategoryAssocByCategoryId(
        $category_id
    ) {
        $parameters = array();
        $parameters['in_category_id'] = $category_id; // #"in_category_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_assoc_count_category_id(".
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
    public function CountOfferCategoryAssocByOfferIdByCategoryId(
        $offer_id
        , $category_id
    ) {
        $parameters = array();
        $parameters['in_offer_id'] = $offer_id; // #"in_offer_id"
        $parameters['in_category_id'] = $category_id; // #"in_category_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_assoc_count_offer_id_category_id(".
                    "in_offer_id".
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
    public function BrowseOfferCategoryAssocListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_assoc_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetOfferCategoryAssocByUuid($set_type, $obj) {
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
            if($obj->offer_id != NULL)
                $parameters['in_offer_id'] = $obj->offer_id; // #"in_offer_id"
            if($obj->category_id != NULL)
                $parameters['in_category_id'] = $obj->category_id; // #"in_category_id"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_offer_category_assoc_set_uuid(".
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
    
    public function DelOfferCategoryAssocByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_assoc_del_uuid(".
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
    public function GetOfferCategoryAssocList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_assoc_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetOfferCategoryAssocListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_assoc_get_uuid(".
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
    public function GetOfferCategoryAssocListByOfferId(
        $offer_id
    ) {
            
        $parameters = array();
        $parameters['in_offer_id'] =  $offer_id; //#"in_offer_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_assoc_get_offer_id(".
                    "in_offer_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetOfferCategoryAssocListByCategoryId(
        $category_id
    ) {
            
        $parameters = array();
        $parameters['in_category_id'] =  $category_id; //#"in_category_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_assoc_get_category_id(".
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
    public function GetOfferCategoryAssocListByOfferIdByCategoryId(
        $offer_id
        , $category_id
    ) {
            
        $parameters = array();
        $parameters['in_offer_id'] =  $offer_id; //#"in_offer_id"
        $parameters['in_category_id'] =  $category_id; //#"in_category_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_category_assoc_get_offer_id_category_id(".
                    "in_offer_id".
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
    public function CountOfferGameLocation(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_game_location_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountOfferGameLocationByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_game_location_count_uuid(".
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
    public function CountOfferGameLocationByGameLocationId(
        $game_location_id
    ) {
        $parameters = array();
        $parameters['in_game_location_id'] = $game_location_id; // #"in_game_location_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_game_location_count_game_location_id(".
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
    public function CountOfferGameLocationByOfferId(
        $offer_id
    ) {
        $parameters = array();
        $parameters['in_offer_id'] = $offer_id; // #"in_offer_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_game_location_count_offer_id(".
                    "in_offer_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountOfferGameLocationByOfferIdByGameLocationId(
        $offer_id
        , $game_location_id
    ) {
        $parameters = array();
        $parameters['in_offer_id'] = $offer_id; // #"in_offer_id"
        $parameters['in_game_location_id'] = $game_location_id; // #"in_game_location_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_game_location_count_offer_id_game_location_id(".
                    "in_offer_id".
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
    public function BrowseOfferGameLocationListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_game_location_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetOfferGameLocationByUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->game_location_id != NULL)
                $parameters['in_game_location_id'] = $obj->game_location_id; // #"in_game_location_id"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->offer_id != NULL)
                $parameters['in_offer_id'] = $obj->offer_id; // #"in_offer_id"
            if($obj->type_id != NULL)
                $parameters['in_type_id'] = $obj->type_id; // #"in_type_id"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_offer_game_location_set_uuid(".
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
    
    public function DelOfferGameLocationByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_game_location_del_uuid(".
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
    public function GetOfferGameLocationList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_game_location_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetOfferGameLocationListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_game_location_get_uuid(".
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
    public function GetOfferGameLocationListByGameLocationId(
        $game_location_id
    ) {
            
        $parameters = array();
        $parameters['in_game_location_id'] =  $game_location_id; //#"in_game_location_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_game_location_get_game_location_id(".
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
    public function GetOfferGameLocationListByOfferId(
        $offer_id
    ) {
            
        $parameters = array();
        $parameters['in_offer_id'] =  $offer_id; //#"in_offer_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_game_location_get_offer_id(".
                    "in_offer_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetOfferGameLocationListByOfferIdByGameLocationId(
        $offer_id
        , $game_location_id
    ) {
            
        $parameters = array();
        $parameters['in_offer_id'] =  $offer_id; //#"in_offer_id"
        $parameters['in_game_location_id'] =  $game_location_id; //#"in_game_location_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_offer_game_location_get_offer_id_game_location_id(".
                    "in_offer_id".
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
    public function CountEventInfo(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_info_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountEventInfoByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_info_count_uuid(".
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
    public function CountEventInfoByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_info_count_code(".
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
    public function CountEventInfoByName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_info_count_name(".
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
    public function CountEventInfoByOrgId(
        $org_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_info_count_org_id(".
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
    public function BrowseEventInfoListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_info_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetEventInfoByUuid($set_type, $obj) {
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
                    , "CALL usp_event_info_set_uuid(".
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
    
    public function DelEventInfoByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_info_del_uuid(".
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
    public function DelEventInfoByOrgId(
        $org_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_info_del_org_id(".
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
    public function GetEventInfoList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_info_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetEventInfoListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_info_get_uuid(".
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
    public function GetEventInfoListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_info_get_code(".
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
    public function GetEventInfoListByName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_info_get_name(".
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
    public function GetEventInfoListByOrgId(
        $org_id
    ) {
            
        $parameters = array();
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_info_get_org_id(".
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
    public function CountEventLocation(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_location_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountEventLocationByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_location_count_uuid(".
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
    public function CountEventLocationByEventId(
        $event_id
    ) {
        $parameters = array();
        $parameters['in_event_id'] = $event_id; // #"in_event_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_location_count_event_id(".
                    "in_event_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountEventLocationByCity(
        $city
    ) {
        $parameters = array();
        $parameters['in_city'] = $city; // #"in_city"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_location_count_city(".
                    "in_city".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountEventLocationByCountryCode(
        $country_code
    ) {
        $parameters = array();
        $parameters['in_country_code'] = $country_code; // #"in_country_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_location_count_country_code(".
                    "in_country_code".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountEventLocationByPostalCode(
        $postal_code
    ) {
        $parameters = array();
        $parameters['in_postal_code'] = $postal_code; // #"in_postal_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_location_count_postal_code(".
                    "in_postal_code".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseEventLocationListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_location_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetEventLocationByUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->fax != NULL)
                $parameters['in_fax'] = $obj->fax; // #"in_fax"
            if($obj->code != NULL)
                $parameters['in_code'] = $obj->code; // #"in_code"
            if($obj->description != NULL)
                $parameters['in_description'] = $obj->description; // #"in_description"
            if($obj->address1 != NULL)
                $parameters['in_address1'] = $obj->address1; // #"in_address1"
            if($obj->twitter != NULL)
                $parameters['in_twitter'] = $obj->twitter; // #"in_twitter"
            if($obj->phone != NULL)
                $parameters['in_phone'] = $obj->phone; // #"in_phone"
            if($obj->postal_code != NULL)
                $parameters['in_postal_code'] = $obj->postal_code; // #"in_postal_code"
            if($obj->country_code != NULL)
                $parameters['in_country_code'] = $obj->country_code; // #"in_country_code"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->state_province != NULL)
                $parameters['in_state_province'] = $obj->state_province; // #"in_state_province"
            if($obj->city != NULL)
                $parameters['in_city'] = $obj->city; // #"in_city"
            if($obj->display_name != NULL)
                $parameters['in_display_name'] = $obj->display_name; // #"in_display_name"
            if($obj->name != NULL)
                $parameters['in_name'] = $obj->name; // #"in_name"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->dob != NULL)
                $parameters['in_dob'] = $obj->dob; // #"in_dob"
            if($obj->date_start != NULL)
                $parameters['in_date_start'] = $obj->date_start; // #"in_date_start"
            if($obj->longitude != NULL)
                $parameters['in_longitude'] = $obj->longitude; // #"in_longitude"
            if($obj->email != NULL)
                $parameters['in_email'] = $obj->email; // #"in_email"
            if($obj->event_id != NULL)
                $parameters['in_event_id'] = $obj->event_id; // #"in_event_id"
            if($obj->date_end != NULL)
                $parameters['in_date_end'] = $obj->date_end; // #"in_date_end"
            if($obj->latitude != NULL)
                $parameters['in_latitude'] = $obj->latitude; // #"in_latitude"
            if($obj->facebook != NULL)
                $parameters['in_facebook'] = $obj->facebook; // #"in_facebook"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->address2 != NULL)
                $parameters['in_address2'] = $obj->address2; // #"in_address2"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_event_location_set_uuid(".
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
    
    public function DelEventLocationByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_location_del_uuid(".
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
    public function GetEventLocationList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_location_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetEventLocationListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_location_get_uuid(".
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
    public function GetEventLocationListByEventId(
        $event_id
    ) {
            
        $parameters = array();
        $parameters['in_event_id'] =  $event_id; //#"in_event_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_location_get_event_id(".
                    "in_event_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetEventLocationListByCity(
        $city
    ) {
            
        $parameters = array();
        $parameters['in_city'] =  $city; //#"in_city"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_location_get_city(".
                    "in_city".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetEventLocationListByCountryCode(
        $country_code
    ) {
            
        $parameters = array();
        $parameters['in_country_code'] =  $country_code; //#"in_country_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_location_get_country_code(".
                    "in_country_code".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetEventLocationListByPostalCode(
        $postal_code
    ) {
            
        $parameters = array();
        $parameters['in_postal_code'] =  $postal_code; //#"in_postal_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_location_get_postal_code(".
                    "in_postal_code".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountEventCategory(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountEventCategoryByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_count_uuid(".
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
    public function CountEventCategoryByCode(
        $code
    ) {
        $parameters = array();
        $parameters['in_code'] = $code; // #"in_code"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_count_code(".
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
    public function CountEventCategoryByName(
        $name
    ) {
        $parameters = array();
        $parameters['in_name'] = $name; // #"in_name"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_count_name(".
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
    public function CountEventCategoryByOrgId(
        $org_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_count_org_id(".
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
    public function CountEventCategoryByTypeId(
        $type_id
    ) {
        $parameters = array();
        $parameters['in_type_id'] = $type_id; // #"in_type_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_count_type_id(".
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
    public function CountEventCategoryByOrgIdByTypeId(
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
                , "CALL usp_event_category_count_org_id_type_id(".
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
    public function BrowseEventCategoryListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetEventCategoryByUuid($set_type, $obj) {
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
                    , "CALL usp_event_category_set_uuid(".
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
    
    public function DelEventCategoryByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_del_uuid(".
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
    public function DelEventCategoryByCodeByOrgId(
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
                , "CALL usp_event_category_del_code_org_id(".
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
    public function DelEventCategoryByCodeByOrgIdByTypeId(
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
                , "CALL usp_event_category_del_code_org_id_type_id(".
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
    public function GetEventCategoryList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetEventCategoryListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_get_uuid(".
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
    public function GetEventCategoryListByCode(
        $code
    ) {
            
        $parameters = array();
        $parameters['in_code'] =  $code; //#"in_code"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_get_code(".
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
    public function GetEventCategoryListByName(
        $name
    ) {
            
        $parameters = array();
        $parameters['in_name'] =  $name; //#"in_name"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_get_name(".
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
    public function GetEventCategoryListByOrgId(
        $org_id
    ) {
            
        $parameters = array();
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_get_org_id(".
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
    public function GetEventCategoryListByTypeId(
        $type_id
    ) {
            
        $parameters = array();
        $parameters['in_type_id'] =  $type_id; //#"in_type_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_get_type_id(".
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
    public function GetEventCategoryListByOrgIdByTypeId(
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
                , "CALL usp_event_category_get_org_id_type_id(".
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
    public function CountEventCategoryTree(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_tree_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountEventCategoryTreeByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_tree_count_uuid(".
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
    public function CountEventCategoryTreeByParentId(
        $parent_id
    ) {
        $parameters = array();
        $parameters['in_parent_id'] = $parent_id; // #"in_parent_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_tree_count_parent_id(".
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
    public function CountEventCategoryTreeByCategoryId(
        $category_id
    ) {
        $parameters = array();
        $parameters['in_category_id'] = $category_id; // #"in_category_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_tree_count_category_id(".
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
    public function CountEventCategoryTreeByParentIdByCategoryId(
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
                , "CALL usp_event_category_tree_count_parent_id_category_id(".
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
    public function BrowseEventCategoryTreeListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_tree_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetEventCategoryTreeByUuid($set_type, $obj) {
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
                    , "CALL usp_event_category_tree_set_uuid(".
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
    
    public function DelEventCategoryTreeByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_tree_del_uuid(".
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
    public function DelEventCategoryTreeByParentId(
        $parent_id
    ) {
        $parameters = array();
        $parameters['in_parent_id'] = $parent_id; // #"in_parent_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_tree_del_parent_id(".
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
    public function DelEventCategoryTreeByCategoryId(
        $category_id
    ) {
        $parameters = array();
        $parameters['in_category_id'] = $category_id; // #"in_category_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_tree_del_category_id(".
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
    public function DelEventCategoryTreeByParentIdByCategoryId(
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
                , "CALL usp_event_category_tree_del_parent_id_category_id(".
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
    public function GetEventCategoryTreeList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_tree_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetEventCategoryTreeListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_tree_get_uuid(".
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
    public function GetEventCategoryTreeListByParentId(
        $parent_id
    ) {
            
        $parameters = array();
        $parameters['in_parent_id'] =  $parent_id; //#"in_parent_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_tree_get_parent_id(".
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
    public function GetEventCategoryTreeListByCategoryId(
        $category_id
    ) {
            
        $parameters = array();
        $parameters['in_category_id'] =  $category_id; //#"in_category_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_tree_get_category_id(".
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
    public function GetEventCategoryTreeListByParentIdByCategoryId(
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
                , "CALL usp_event_category_tree_get_parent_id_category_id(".
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
    public function CountEventCategoryAssoc(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_assoc_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountEventCategoryAssocByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_assoc_count_uuid(".
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
    public function CountEventCategoryAssocByEventId(
        $event_id
    ) {
        $parameters = array();
        $parameters['in_event_id'] = $event_id; // #"in_event_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_assoc_count_event_id(".
                    "in_event_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountEventCategoryAssocByCategoryId(
        $category_id
    ) {
        $parameters = array();
        $parameters['in_category_id'] = $category_id; // #"in_category_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_assoc_count_category_id(".
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
    public function CountEventCategoryAssocByEventIdByCategoryId(
        $event_id
        , $category_id
    ) {
        $parameters = array();
        $parameters['in_event_id'] = $event_id; // #"in_event_id"
        $parameters['in_category_id'] = $category_id; // #"in_category_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_assoc_count_event_id_category_id(".
                    "in_event_id".
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
    public function BrowseEventCategoryAssocListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_assoc_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetEventCategoryAssocByUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->event_id != NULL)
                $parameters['in_event_id'] = $obj->event_id; // #"in_event_id"
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
                    , "CALL usp_event_category_assoc_set_uuid(".
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
    
    public function DelEventCategoryAssocByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_assoc_del_uuid(".
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
    public function GetEventCategoryAssocList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_assoc_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetEventCategoryAssocListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_assoc_get_uuid(".
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
    public function GetEventCategoryAssocListByEventId(
        $event_id
    ) {
            
        $parameters = array();
        $parameters['in_event_id'] =  $event_id; //#"in_event_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_assoc_get_event_id(".
                    "in_event_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetEventCategoryAssocListByCategoryId(
        $category_id
    ) {
            
        $parameters = array();
        $parameters['in_category_id'] =  $category_id; //#"in_category_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_assoc_get_category_id(".
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
    public function GetEventCategoryAssocListByEventIdByCategoryId(
        $event_id
        , $category_id
    ) {
            
        $parameters = array();
        $parameters['in_event_id'] =  $event_id; //#"in_event_id"
        $parameters['in_category_id'] =  $category_id; //#"in_category_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_event_category_assoc_get_event_id_category_id(".
                    "in_event_id".
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
    public function GetChannelList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
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
    public function GetChannelTypeList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_channel_type_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
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
    public function GetQuestionList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_question_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
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
    public function CountProfileOffer(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_offer_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileOfferByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_offer_count_uuid(".
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
    public function CountProfileOfferByProfileId(
        $profile_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_offer_count_profile_id(".
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
    public function BrowseProfileOfferListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_offer_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetProfileOfferByUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
            if($obj->redeem_code != NULL)
                $parameters['in_redeem_code'] = $obj->redeem_code; // #"in_redeem_code"
            if($obj->offer_id != NULL)
                $parameters['in_offer_id'] = $obj->offer_id; // #"in_offer_id"
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->active != NULL)
                $parameters['in_active'] = $obj->active; // #"in_active"
            if($obj->uuid != NULL)
                $parameters['in_uuid'] = $obj->uuid; // #"in_uuid"
            if($obj->redeemed != NULL)
                $parameters['in_redeemed'] = $obj->redeemed; // #"in_redeemed"
            if($obj->url != NULL)
                $parameters['in_url'] = $obj->url; // #"in_url"
            if($obj->date_modified != NULL)
                $parameters['in_date_modified'] = $obj->date_modified; // #"in_date_modified"
            if($obj->date_created != NULL)
                $parameters['in_date_created'] = $obj->date_created; // #"in_date_created"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_profile_offer_set_uuid(".
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
    
    public function DelProfileOfferByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_offer_del_uuid(".
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
    public function DelProfileOfferByProfileId(
        $profile_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_offer_del_profile_id(".
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
    public function GetProfileOfferList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_offer_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileOfferListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_offer_get_uuid(".
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
    public function GetProfileOfferListByProfileId(
        $profile_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_offer_get_profile_id(".
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
    public function CountProfileApp(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_app_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileAppByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_app_count_uuid(".
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
    public function CountProfileAppByProfileIdByAppId(
        $profile_id
        , $app_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_app_id'] = $app_id; // #"in_app_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_app_count_profile_id_app_id(".
                    "in_profile_id".
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
    public function BrowseProfileAppListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_app_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetProfileAppByUuid($set_type, $obj) {
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
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->app_id != NULL)
                $parameters['in_app_id'] = $obj->app_id; // #"in_app_id"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_profile_app_set_uuid(".
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
    
    public function SetProfileAppByProfileIdByAppId($set_type, $obj) {
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
            if($obj->profile_id != NULL)
                $parameters['in_profile_id'] = $obj->profile_id; // #"in_profile_id"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->app_id != NULL)
                $parameters['in_app_id'] = $obj->app_id; // #"in_app_id"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_profile_app_set_profile_id_app_id(".
                        "in_profile_id".
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
    
    public function DelProfileAppByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_app_del_uuid(".
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
    public function DelProfileAppByProfileIdByAppId(
        $profile_id
        , $app_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
        $parameters['in_app_id'] = $app_id; // #"in_app_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_app_del_profile_id_app_id(".
                    "in_profile_id".
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
    public function GetProfileAppList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_app_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileAppListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_app_get_uuid(".
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
    public function GetProfileAppListByAppId(
        $app_id
    ) {
            
        $parameters = array();
        $parameters['in_app_id'] =  $app_id; //#"in_app_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_app_get_app_id(".
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
    public function GetProfileAppListByProfileId(
        $profile_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_app_get_profile_id(".
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
    public function GetProfileAppListByProfileIdByAppId(
        $profile_id
        , $app_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
        $parameters['in_app_id'] =  $app_id; //#"in_app_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_app_get_profile_id_app_id(".
                    "in_profile_id".
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
    public function CountProfileOrg(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_org_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountProfileOrgByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_org_count_uuid(".
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
    public function CountProfileOrgByOrgId(
        $org_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_org_count_org_id(".
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
    public function CountProfileOrgByProfileId(
        $profile_id
    ) {
        $parameters = array();
        $parameters['in_profile_id'] = $profile_id; // #"in_profile_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_org_count_profile_id(".
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
    public function BrowseProfileOrgListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_org_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetProfileOrgByUuid($set_type, $obj) {
        $parameters = array();
        $parameters['in_set_type'] = $set_type;
        if($obj != NULL) {
            if($obj->status != NULL)
                $parameters['in_status'] = $obj->status; // #"in_status"
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
            if($obj->org_id != NULL)
                $parameters['in_org_id'] = $obj->org_id; // #"in_org_id"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_profile_org_set_uuid(".
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
    
    public function DelProfileOrgByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_org_del_uuid(".
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
    public function GetProfileOrgList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_org_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetProfileOrgListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_org_get_uuid(".
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
    public function GetProfileOrgListByOrgId(
        $org_id
    ) {
            
        $parameters = array();
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_org_get_org_id(".
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
    public function GetProfileOrgListByProfileId(
        $profile_id
    ) {
            
        $parameters = array();
        $parameters['in_profile_id'] =  $profile_id; //#"in_profile_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_org_get_profile_id(".
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
    public function GetProfileQuestionList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_question_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
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
    public function GetProfileChannelList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_profile_channel_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
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
    public function CountOrgSite(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_site_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountOrgSiteByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_site_count_uuid(".
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
    public function CountOrgSiteByOrgId(
        $org_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_site_count_org_id(".
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
    public function CountOrgSiteBySiteId(
        $site_id
    ) {
        $parameters = array();
        $parameters['in_site_id'] = $site_id; // #"in_site_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_site_count_site_id(".
                    "in_site_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountOrgSiteByOrgIdBySiteId(
        $org_id
        , $site_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
        $parameters['in_site_id'] = $site_id; // #"in_site_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_site_count_org_id_site_id(".
                    "in_org_id".
                    ", in_site_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseOrgSiteListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_site_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetOrgSiteByUuid($set_type, $obj) {
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
            if($obj->site_id != NULL)
                $parameters['in_site_id'] = $obj->site_id; // #"in_site_id"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->org_id != NULL)
                $parameters['in_org_id'] = $obj->org_id; // #"in_org_id"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_org_site_set_uuid(".
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
    
    public function SetOrgSiteByOrgIdBySiteId($set_type, $obj) {
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
            if($obj->site_id != NULL)
                $parameters['in_site_id'] = $obj->site_id; // #"in_site_id"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->org_id != NULL)
                $parameters['in_org_id'] = $obj->org_id; // #"in_org_id"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_org_site_set_org_id_site_id(".
                        "in_org_id".
                        ", in_site_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelOrgSiteByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_site_del_uuid(".
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
    public function DelOrgSiteByOrgIdBySiteId(
        $org_id
        , $site_id
    ) {
        $parameters = array();
        $parameters['in_org_id'] = $org_id; // #"in_org_id"
        $parameters['in_site_id'] = $site_id; // #"in_site_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_site_del_org_id_site_id(".
                    "in_org_id".
                    ", in_site_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetOrgSiteList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_site_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetOrgSiteListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_site_get_uuid(".
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
    public function GetOrgSiteListByOrgId(
        $org_id
    ) {
            
        $parameters = array();
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_site_get_org_id(".
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
    public function GetOrgSiteListBySiteId(
        $site_id
    ) {
            
        $parameters = array();
        $parameters['in_site_id'] =  $site_id; //#"in_site_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_site_get_site_id(".
                    "in_site_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetOrgSiteListByOrgIdBySiteId(
        $org_id
        , $site_id
    ) {
            
        $parameters = array();
        $parameters['in_org_id'] =  $org_id; //#"in_org_id"
        $parameters['in_site_id'] =  $site_id; //#"in_site_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_org_site_get_org_id_site_id(".
                    "in_org_id".
                    ", in_site_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountSiteApp(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_app_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountSiteAppByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_app_count_uuid(".
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
    public function CountSiteAppByAppId(
        $app_id
    ) {
        $parameters = array();
        $parameters['in_app_id'] = $app_id; // #"in_app_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_app_count_app_id(".
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
    public function CountSiteAppBySiteId(
        $site_id
    ) {
        $parameters = array();
        $parameters['in_site_id'] = $site_id; // #"in_site_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_app_count_site_id(".
                    "in_site_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountSiteAppByAppIdBySiteId(
        $app_id
        , $site_id
    ) {
        $parameters = array();
        $parameters['in_app_id'] = $app_id; // #"in_app_id"
        $parameters['in_site_id'] = $site_id; // #"in_site_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_app_count_app_id_site_id(".
                    "in_app_id".
                    ", in_site_id".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function BrowseSiteAppListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_app_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetSiteAppByUuid($set_type, $obj) {
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
            if($obj->site_id != NULL)
                $parameters['in_site_id'] = $obj->site_id; // #"in_site_id"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->app_id != NULL)
                $parameters['in_app_id'] = $obj->app_id; // #"in_app_id"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_site_app_set_uuid(".
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
    
    public function SetSiteAppByAppIdBySiteId($set_type, $obj) {
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
            if($obj->site_id != NULL)
                $parameters['in_site_id'] = $obj->site_id; // #"in_site_id"
            if($obj->type != NULL)
                $parameters['in_type'] = $obj->type; // #"in_type"
            if($obj->app_id != NULL)
                $parameters['in_app_id'] = $obj->app_id; // #"in_app_id"

            try {
                return $this->data_provider->execute_scalar(
                    $this->connection_string
                    , CommandType::StoredProcedure
                    , "CALL usp_site_app_set_app_id_site_id(".
                        "in_app_id".
                        ", in_site_id".
                    ")"
                    , $parameters
                );       
            }
            catch (Exception $e) {
                echo "<!-- ERROR".$e."-->";
            }
        }
                
        return FALSE;
    }
    
    public function DelSiteAppByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_app_del_uuid(".
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
    public function DelSiteAppByAppIdBySiteId(
        $app_id
        , $site_id
    ) {
        $parameters = array();
        $parameters['in_app_id'] = $app_id; // #"in_app_id"
        $parameters['in_site_id'] = $site_id; // #"in_site_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_app_del_app_id_site_id(".
                    "in_app_id".
                    ", in_site_id".
                    ")"
                , $parameters
            );
            return TRUE;       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return FALSE;
    }
    public function GetSiteAppList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_app_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetSiteAppListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_app_get_uuid(".
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
    public function GetSiteAppListByAppId(
        $app_id
    ) {
            
        $parameters = array();
        $parameters['in_app_id'] =  $app_id; //#"in_app_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_app_get_app_id(".
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
    public function GetSiteAppListBySiteId(
        $site_id
    ) {
            
        $parameters = array();
        $parameters['in_site_id'] =  $site_id; //#"in_site_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_app_get_site_id(".
                    "in_site_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetSiteAppListByAppIdBySiteId(
        $app_id
        , $site_id
    ) {
            
        $parameters = array();
        $parameters['in_app_id'] =  $app_id; //#"in_app_id"
        $parameters['in_site_id'] =  $site_id; //#"in_site_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_site_app_get_app_id_site_id(".
                    "in_app_id".
                    ", in_site_id".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function CountPhoto(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_photo_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountPhotoByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_photo_count_uuid(".
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
    public function CountPhotoByExternalId(
        $external_id
    ) {
        $parameters = array();
        $parameters['in_external_id'] = $external_id; // #"in_external_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_photo_count_external_id(".
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
    public function CountPhotoByUrl(
        $url
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_photo_count_url(".
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
    public function CountPhotoByUrlByExternalId(
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
                , "CALL usp_photo_count_url_external_id(".
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
    public function CountPhotoByUuidByExternalId(
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
                , "CALL usp_photo_count_uuid_external_id(".
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
    public function BrowsePhotoListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_photo_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetPhotoByUuid($set_type, $obj) {
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
                    , "CALL usp_photo_set_uuid(".
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
    
    public function SetPhotoByExternalId($set_type, $obj) {
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
                    , "CALL usp_photo_set_external_id(".
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
    
    public function SetPhotoByUrl($set_type, $obj) {
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
                    , "CALL usp_photo_set_url(".
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
    
    public function SetPhotoByUrlByExternalId($set_type, $obj) {
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
                    , "CALL usp_photo_set_url_external_id(".
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
    
    public function SetPhotoByUuidByExternalId($set_type, $obj) {
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
                    , "CALL usp_photo_set_uuid_external_id(".
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
    
    public function DelPhotoByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_photo_del_uuid(".
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
    public function DelPhotoByExternalId(
        $external_id
    ) {
        $parameters = array();
        $parameters['in_external_id'] = $external_id; // #"in_external_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_photo_del_external_id(".
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
    public function DelPhotoByUrl(
        $url
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_photo_del_url(".
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
    public function DelPhotoByUrlByExternalId(
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
                , "CALL usp_photo_del_url_external_id(".
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
    public function DelPhotoByUuidByExternalId(
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
                , "CALL usp_photo_del_uuid_external_id(".
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
    public function GetPhotoList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_photo_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetPhotoListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_photo_get_uuid(".
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
    public function GetPhotoListByExternalId(
        $external_id
    ) {
            
        $parameters = array();
        $parameters['in_external_id'] =  $external_id; //#"in_external_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_photo_get_external_id(".
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
    public function GetPhotoListByUrl(
        $url
    ) {
            
        $parameters = array();
        $parameters['in_url'] =  $url; //#"in_url"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_photo_get_url(".
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
    public function GetPhotoListByUrlByExternalId(
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
                , "CALL usp_photo_get_url_external_id(".
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
    public function GetPhotoListByUuidByExternalId(
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
                , "CALL usp_photo_get_uuid_external_id(".
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
    public function CountVideo(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_video_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountVideoByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_video_count_uuid(".
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
    public function CountVideoByExternalId(
        $external_id
    ) {
        $parameters = array();
        $parameters['in_external_id'] = $external_id; // #"in_external_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_video_count_external_id(".
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
    public function CountVideoByUrl(
        $url
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_video_count_url(".
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
    public function CountVideoByUrlByExternalId(
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
                , "CALL usp_video_count_url_external_id(".
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
    public function CountVideoByUuidByExternalId(
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
                , "CALL usp_video_count_uuid_external_id(".
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
    public function BrowseVideoListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_video_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetVideoByUuid($set_type, $obj) {
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
                    , "CALL usp_video_set_uuid(".
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
    
    public function SetVideoByExternalId($set_type, $obj) {
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
                    , "CALL usp_video_set_external_id(".
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
    
    public function SetVideoByUrl($set_type, $obj) {
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
                    , "CALL usp_video_set_url(".
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
    
    public function SetVideoByUrlByExternalId($set_type, $obj) {
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
                    , "CALL usp_video_set_url_external_id(".
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
    
    public function SetVideoByUuidByExternalId($set_type, $obj) {
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
                    , "CALL usp_video_set_uuid_external_id(".
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
    
    public function DelVideoByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_video_del_uuid(".
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
    public function DelVideoByExternalId(
        $external_id
    ) {
        $parameters = array();
        $parameters['in_external_id'] = $external_id; // #"in_external_id"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_video_del_external_id(".
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
    public function DelVideoByUrl(
        $url
    ) {
        $parameters = array();
        $parameters['in_url'] = $url; // #"in_url"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_video_del_url(".
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
    public function DelVideoByUrlByExternalId(
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
                , "CALL usp_video_del_url_external_id(".
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
    public function DelVideoByUuidByExternalId(
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
                , "CALL usp_video_del_uuid_external_id(".
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
    public function GetVideoList(
    ) {
            
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_video_get(".
                    ")"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
                
        return NULL;
    }
    public function GetVideoListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_video_get_uuid(".
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
    public function GetVideoListByExternalId(
        $external_id
    ) {
            
        $parameters = array();
        $parameters['in_external_id'] =  $external_id; //#"in_external_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_video_get_external_id(".
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
    public function GetVideoListByUrl(
        $url
    ) {
            
        $parameters = array();
        $parameters['in_url'] =  $url; //#"in_url"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_video_get_url(".
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
    public function GetVideoListByUrlByExternalId(
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
                , "CALL usp_video_get_url_external_id(".
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
    public function GetVideoListByUuidByExternalId(
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
                , "CALL usp_video_get_uuid_external_id(".
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
    public function CountGameStatistic(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_count_uuid(".
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
    public function CountGameStatisticByKey(
        $key
    ) {
        $parameters = array();
        $parameters['in_key'] = $key; // #"in_key"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_count_key(".
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
    public function CountGameStatisticByGameId(
        $game_id
    ) {
        $parameters = array();
        $parameters['in_game_id'] = $game_id; // #"in_game_id"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_count_game_id(".
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
    public function CountGameStatisticByKeyByGameId(
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
                , "CALL usp_game_statistic_count_key_game_id(".
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
    public function CountGameStatisticByProfileIdByGameId(
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
                , "CALL usp_game_statistic_count_profile_id_game_id(".
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
    public function CountGameStatisticByKeyByProfileIdByGameId(
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
                , "CALL usp_game_statistic_count_key_profile_id_game_id(".
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
    public function CountGameStatisticByKeyByProfileIdByGameIdByTimestamp(
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
                , "CALL usp_game_statistic_count_key_profile_id_game_id_timestamp(".
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
    public function BrowseGameStatisticListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameStatisticByUuid($set_type, $obj) {
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
                    , "CALL usp_game_statistic_set_uuid(".
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
    
    public function SetGameStatisticByUuidByProfileIdByGameIdByTimestamp($set_type, $obj) {
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
                    , "CALL usp_game_statistic_set_uuid_profile_id_game_id_timestamp(".
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
    
    public function SetGameStatisticByProfileIdByKey($set_type, $obj) {
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
                    , "CALL usp_game_statistic_set_profile_id_key(".
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
    
    public function SetGameStatisticByProfileIdByKeyByTimestamp($set_type, $obj) {
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
                    , "CALL usp_game_statistic_set_profile_id_key_timestamp(".
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
    
    public function SetGameStatisticByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {
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
                    , "CALL usp_game_statistic_set_key_profile_id_game_id_timestamp(".
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
    
    public function SetGameStatisticByProfileIdByGameIdByKey($set_type, $obj) {
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
                    , "CALL usp_game_statistic_set_profile_id_game_id_key(".
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
    
    public function DelGameStatisticByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_del_uuid(".
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
    public function DelGameStatisticByKeyByGameId(
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
                , "CALL usp_game_statistic_del_key_game_id(".
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
    public function DelGameStatisticByProfileIdByGameId(
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
                , "CALL usp_game_statistic_del_profile_id_game_id(".
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
    public function DelGameStatisticByKeyByProfileIdByGameId(
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
                , "CALL usp_game_statistic_del_key_profile_id_game_id(".
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
    public function GetGameStatisticListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_get_uuid(".
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
    public function GetGameStatisticListByKey(
        $key
    ) {
            
        $parameters = array();
        $parameters['in_key'] =  $key; //#"in_key"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_get_key(".
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
    public function GetGameStatisticListByGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_get_game_id(".
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
    public function GetGameStatisticListByKeyByGameId(
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
                , "CALL usp_game_statistic_get_key_game_id(".
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
    public function GetGameStatisticListByProfileIdByGameId(
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
                , "CALL usp_game_statistic_get_profile_id_game_id(".
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
    public function GetGameStatisticListByProfileIdByGameIdByTimestamp(
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
                , "CALL usp_game_statistic_get_profile_id_game_id_timestamp(".
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
    public function GetGameStatisticListByKeyByProfileIdByGameId(
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
                , "CALL usp_game_statistic_get_key_profile_id_game_id(".
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
    public function GetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
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
                , "CALL usp_game_statistic_get_key_profile_id_game_id_timestamp(".
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
    public function CountGameStatisticTimestamp(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_timestamp_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameStatisticTimestampByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_timestamp_count_uuid(".
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
    public function CountGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
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
                , "CALL usp_game_statistic_timestamp_count_key_profile_id_game_id_times(".
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
    public function BrowseGameStatisticTimestampListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_timestamp_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameStatisticTimestampByUuid($set_type, $obj) {
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
                    , "CALL usp_game_statistic_timestamp_set_uuid(".
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
    
    public function SetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {
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
                    , "CALL usp_game_statistic_timestamp_set_key_profile_id_game_id_timesta(".
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
    
    public function DelGameStatisticTimestampByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_timestamp_del_uuid(".
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
    public function DelGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
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
                , "CALL usp_game_statistic_timestamp_del_key_profile_id_game_id_timesta(".
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
    public function GetGameStatisticTimestampListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_statistic_timestamp_get_uuid(".
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
    public function GetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
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
                , "CALL usp_game_statistic_timestamp_get_key_profile_id_game_id_timesta(".
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
    public function CountGameAchievement(
    ) {
        $parameters = array();
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_count(".
                    ")"
                , $parameters
            );       
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
        
        return 0;
    }
    public function CountGameAchievementByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_count_uuid(".
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
    public function CountGameAchievementByProfileIdByKey(
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
                , "CALL usp_game_achievement_count_profile_id_key(".
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
    public function CountGameAchievementByUsername(
        $username
    ) {
        $parameters = array();
        $parameters['in_username'] = $username; // #"in_username"
                        
        try {
            return $this->data_provider->execute_scalar(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_count_username(".
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
    public function CountGameAchievementByKeyByProfileIdByGameId(
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
                , "CALL usp_game_achievement_count_key_profile_id_game_id(".
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
    public function CountGameAchievementByKeyByProfileIdByGameIdByTimestamp(
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
                , "CALL usp_game_achievement_count_key_profile_id_game_id_timestamp(".
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
    public function BrowseGameAchievementListByFilter($filter_obj) {
        $parameters = array();
            
        $parameters['in_page'] = $filter_obj->page; //"in_page"
        $parameters['in_page_size'] = $filter_obj->page_size; //"in_page_size"
        $parameters['in_sort'] = $filter_obj->sort; //"in_sort"
        $parameters['in_filter'] = $filter_obj->filter; //"in_filter"
                                    
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_browse_filter(in_page, in_page_size, in_sort, in_filter)"
                , $parameters
            );
        }
        catch (Exception $e) {
            echo "<!-- ERROR".$e."-->";
        }
    }

    public function SetGameAchievementByUuid($set_type, $obj) {
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
                    , "CALL usp_game_achievement_set_uuid(".
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
    
    public function SetGameAchievementByUuidByKey($set_type, $obj) {
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
                    , "CALL usp_game_achievement_set_uuid_key(".
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
    
    public function SetGameAchievementByProfileIdByKey($set_type, $obj) {
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
                    , "CALL usp_game_achievement_set_profile_id_key(".
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
    
    public function SetGameAchievementByKeyByProfileIdByGameId($set_type, $obj) {
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
                    , "CALL usp_game_achievement_set_key_profile_id_game_id(".
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
    
    public function SetGameAchievementByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {
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
                    , "CALL usp_game_achievement_set_key_profile_id_game_id_timestamp(".
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
    
    public function DelGameAchievementByUuid(
        $uuid
    ) {
        $parameters = array();
        $parameters['in_uuid'] = $uuid; // #"in_uuid"
                        
        try {
            $this->data_provider->execute_no_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_del_uuid(".
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
    public function DelGameAchievementByProfileIdByKey(
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
                , "CALL usp_game_achievement_del_profile_id_key(".
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
    public function DelGameAchievementByUuidByKey(
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
                , "CALL usp_game_achievement_del_uuid_key(".
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
    public function GetGameAchievementListByUuid(
        $uuid
    ) {
            
        $parameters = array();
        $parameters['in_uuid'] =  $uuid; //#"in_uuid"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_get_uuid(".
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
    public function GetGameAchievementListByProfileIdByKey(
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
                , "CALL usp_game_achievement_get_profile_id_key(".
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
    public function GetGameAchievementListByUsername(
        $username
    ) {
            
        $parameters = array();
        $parameters['in_username'] =  $username; //#"in_username"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_get_username(".
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
    public function GetGameAchievementListByKey(
        $key
    ) {
            
        $parameters = array();
        $parameters['in_key'] =  $key; //#"in_key"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_get_key(".
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
    public function GetGameAchievementListByGameId(
        $game_id
    ) {
            
        $parameters = array();
        $parameters['in_game_id'] =  $game_id; //#"in_game_id"
                        
        try {
            return $this->data_provider->execute_results(
                $this->connection_string
                , CommandType::StoredProcedure
                , "CALL usp_game_achievement_get_game_id(".
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
    public function GetGameAchievementListByKeyByGameId(
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
                , "CALL usp_game_achievement_get_key_game_id(".
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
    public function GetGameAchievementListByProfileIdByGameId(
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
                , "CALL usp_game_achievement_get_profile_id_game_id(".
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
    public function GetGameAchievementListByProfileIdByGameIdByTimestamp(
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
                , "CALL usp_game_achievement_get_profile_id_game_id_timestamp(".
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
    public function GetGameAchievementListByKeyByProfileIdByGameId(
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
                , "CALL usp_game_achievement_get_key_profile_id_game_id(".
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
    public function GetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
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
                , "CALL usp_game_achievement_get_key_profile_id_game_id_timestamp(".
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
