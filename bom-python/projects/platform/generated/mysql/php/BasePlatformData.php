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
    public function CountAppUuid(
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
    public function CountAppCode(
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
    public function CountAppTypeId(
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
    public function CountAppCodeTypeId(
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
    public function CountAppPlatformTypeId(
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
    public function CountAppPlatform(
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
    public function BrowseAppListFilter($filter_obj) {
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

    public function SetAppUuid($set_type, $obj) {
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
    
    public function SetAppCode($set_type, $obj) {
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
    
    public function DelAppUuid(
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
    public function DelAppCode(
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
    public function GetAppListUuid(
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
    public function GetAppListCode(
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
    public function GetAppListTypeId(
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
    public function GetAppListCodeTypeId(
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
    public function GetAppListPlatformTypeId(
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
    public function GetAppListPlatform(
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
    public function CountAppTypeUuid(
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
    public function CountAppTypeCode(
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
    public function BrowseAppTypeListFilter($filter_obj) {
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

    public function SetAppTypeUuid($set_type, $obj) {
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
    
    public function SetAppTypeCode($set_type, $obj) {
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
    
    public function DelAppTypeUuid(
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
    public function DelAppTypeCode(
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
    public function GetAppTypeListUuid(
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
    public function GetAppTypeListCode(
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
    public function CountSiteUuid(
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
    public function CountSiteCode(
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
    public function CountSiteTypeId(
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
    public function CountSiteCodeTypeId(
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
    public function CountSiteDomainTypeId(
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
    public function CountSiteDomain(
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
    public function BrowseSiteListFilter($filter_obj) {
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

    public function SetSiteUuid($set_type, $obj) {
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
    
    public function SetSiteCode($set_type, $obj) {
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
    
    public function DelSiteUuid(
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
    public function DelSiteCode(
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
    public function GetSiteListUuid(
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
    public function GetSiteListCode(
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
    public function GetSiteListTypeId(
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
    public function GetSiteListCodeTypeId(
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
    public function GetSiteListDomainTypeId(
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
    public function GetSiteListDomain(
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
    public function CountSiteTypeUuid(
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
    public function CountSiteTypeCode(
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
    public function BrowseSiteTypeListFilter($filter_obj) {
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

    public function SetSiteTypeUuid($set_type, $obj) {
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
    
    public function SetSiteTypeCode($set_type, $obj) {
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
    
    public function DelSiteTypeUuid(
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
    public function DelSiteTypeCode(
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
    public function GetSiteTypeListUuid(
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
    public function GetSiteTypeListCode(
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
    public function CountOrgUuid(
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
    public function CountOrgCode(
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
    public function CountOrgName(
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
    public function BrowseOrgListFilter($filter_obj) {
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

    public function SetOrgUuid($set_type, $obj) {
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
    
    public function DelOrgUuid(
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
    public function GetOrgListUuid(
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
    public function GetOrgListCode(
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
    public function GetOrgListName(
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
    public function CountOrgTypeUuid(
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
    public function CountOrgTypeCode(
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
    public function BrowseOrgTypeListFilter($filter_obj) {
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

    public function SetOrgTypeUuid($set_type, $obj) {
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
    
    public function SetOrgTypeCode($set_type, $obj) {
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
    
    public function DelOrgTypeUuid(
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
    public function DelOrgTypeCode(
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
    public function GetOrgTypeListUuid(
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
    public function GetOrgTypeListCode(
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
    public function CountContentItemUuid(
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
    public function CountContentItemCode(
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
    public function CountContentItemName(
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
    public function CountContentItemPath(
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
    public function BrowseContentItemListFilter($filter_obj) {
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

    public function SetContentItemUuid($set_type, $obj) {
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
    
    public function DelContentItemUuid(
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
    public function DelContentItemPath(
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
    public function GetContentItemListUuid(
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
    public function GetContentItemListCode(
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
    public function GetContentItemListName(
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
    public function GetContentItemListPath(
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
    public function CountContentItemTypeUuid(
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
    public function CountContentItemTypeCode(
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
    public function BrowseContentItemTypeListFilter($filter_obj) {
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

    public function SetContentItemTypeUuid($set_type, $obj) {
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
    
    public function SetContentItemTypeCode($set_type, $obj) {
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
    
    public function DelContentItemTypeUuid(
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
    public function DelContentItemTypeCode(
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
    public function GetContentItemTypeListUuid(
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
    public function GetContentItemTypeListCode(
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
    public function CountContentPageUuid(
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
    public function CountContentPageCode(
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
    public function CountContentPageName(
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
    public function CountContentPagePath(
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
    public function BrowseContentPageListFilter($filter_obj) {
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

    public function SetContentPageUuid($set_type, $obj) {
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
    
    public function DelContentPageUuid(
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
    public function DelContentPagePathSiteId(
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
    public function DelContentPagePath(
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
    public function GetContentPageListUuid(
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
    public function GetContentPageListCode(
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
    public function GetContentPageListName(
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
    public function GetContentPageListPath(
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
    public function GetContentPageListSiteId(
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
    public function GetContentPageListSiteIdPath(
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
    public function CountMessageUuid(
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
    public function BrowseMessageListFilter($filter_obj) {
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

    public function SetMessageUuid($set_type, $obj) {
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
    
    public function DelMessageUuid(
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
    public function GetMessageListUuid(
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
    public function CountOfferUuid(
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
    public function CountOfferCode(
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
    public function CountOfferName(
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
    public function CountOfferOrgId(
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
    public function BrowseOfferListFilter($filter_obj) {
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

    public function SetOfferUuid($set_type, $obj) {
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
    
    public function DelOfferUuid(
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
    public function DelOfferOrgId(
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
    public function GetOfferListUuid(
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
    public function GetOfferListCode(
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
    public function GetOfferListName(
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
    public function GetOfferListOrgId(
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
    public function CountOfferTypeUuid(
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
    public function CountOfferTypeCode(
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
    public function CountOfferTypeName(
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
    public function BrowseOfferTypeListFilter($filter_obj) {
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

    public function SetOfferTypeUuid($set_type, $obj) {
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
    
    public function DelOfferTypeUuid(
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
    public function GetOfferTypeListUuid(
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
    public function GetOfferTypeListCode(
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
    public function GetOfferTypeListName(
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
    public function CountOfferLocationUuid(
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
    public function CountOfferLocationOfferId(
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
    public function CountOfferLocationCity(
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
    public function CountOfferLocationCountryCode(
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
    public function CountOfferLocationPostalCode(
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
    public function BrowseOfferLocationListFilter($filter_obj) {
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

    public function SetOfferLocationUuid($set_type, $obj) {
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
    
    public function DelOfferLocationUuid(
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
    public function GetOfferLocationListUuid(
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
    public function GetOfferLocationListOfferId(
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
    public function GetOfferLocationListCity(
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
    public function GetOfferLocationListCountryCode(
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
    public function GetOfferLocationListPostalCode(
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
    public function CountOfferCategoryUuid(
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
    public function CountOfferCategoryCode(
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
    public function CountOfferCategoryName(
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
    public function CountOfferCategoryOrgId(
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
    public function CountOfferCategoryTypeId(
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
    public function CountOfferCategoryOrgIdTypeId(
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
    public function BrowseOfferCategoryListFilter($filter_obj) {
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

    public function SetOfferCategoryUuid($set_type, $obj) {
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
    
    public function DelOfferCategoryUuid(
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
    public function DelOfferCategoryCodeOrgId(
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
    public function DelOfferCategoryCodeOrgIdTypeId(
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
    public function GetOfferCategoryListUuid(
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
    public function GetOfferCategoryListCode(
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
    public function GetOfferCategoryListName(
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
    public function GetOfferCategoryListOrgId(
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
    public function GetOfferCategoryListTypeId(
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
    public function GetOfferCategoryListOrgIdTypeId(
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
    public function CountOfferCategoryTreeUuid(
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
    public function CountOfferCategoryTreeParentId(
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
    public function CountOfferCategoryTreeCategoryId(
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
    public function CountOfferCategoryTreeParentIdCategoryId(
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
    public function BrowseOfferCategoryTreeListFilter($filter_obj) {
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

    public function SetOfferCategoryTreeUuid($set_type, $obj) {
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
    
    public function DelOfferCategoryTreeUuid(
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
    public function DelOfferCategoryTreeParentId(
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
    public function DelOfferCategoryTreeCategoryId(
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
    public function DelOfferCategoryTreeParentIdCategoryId(
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
    public function GetOfferCategoryTreeListUuid(
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
    public function GetOfferCategoryTreeListParentId(
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
    public function GetOfferCategoryTreeListCategoryId(
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
    public function GetOfferCategoryTreeListParentIdCategoryId(
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
    public function CountOfferCategoryAssocUuid(
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
    public function CountOfferCategoryAssocOfferId(
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
    public function CountOfferCategoryAssocCategoryId(
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
    public function CountOfferCategoryAssocOfferIdCategoryId(
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
    public function BrowseOfferCategoryAssocListFilter($filter_obj) {
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

    public function SetOfferCategoryAssocUuid($set_type, $obj) {
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
    
    public function DelOfferCategoryAssocUuid(
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
    public function GetOfferCategoryAssocListUuid(
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
    public function GetOfferCategoryAssocListOfferId(
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
    public function GetOfferCategoryAssocListCategoryId(
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
    public function GetOfferCategoryAssocListOfferIdCategoryId(
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
    public function CountOfferGameLocationUuid(
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
    public function CountOfferGameLocationGameLocationId(
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
    public function CountOfferGameLocationOfferId(
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
    public function CountOfferGameLocationOfferIdGameLocationId(
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
    public function BrowseOfferGameLocationListFilter($filter_obj) {
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

    public function SetOfferGameLocationUuid($set_type, $obj) {
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
    
    public function DelOfferGameLocationUuid(
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
    public function GetOfferGameLocationListUuid(
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
    public function GetOfferGameLocationListGameLocationId(
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
    public function GetOfferGameLocationListOfferId(
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
    public function GetOfferGameLocationListOfferIdGameLocationId(
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
    public function CountEventInfoUuid(
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
    public function CountEventInfoCode(
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
    public function CountEventInfoName(
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
    public function CountEventInfoOrgId(
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
    public function BrowseEventInfoListFilter($filter_obj) {
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

    public function SetEventInfoUuid($set_type, $obj) {
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
    
    public function DelEventInfoUuid(
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
    public function DelEventInfoOrgId(
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
    public function GetEventInfoListUuid(
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
    public function GetEventInfoListCode(
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
    public function GetEventInfoListName(
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
    public function GetEventInfoListOrgId(
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
    public function CountEventLocationUuid(
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
    public function CountEventLocationEventId(
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
    public function CountEventLocationCity(
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
    public function CountEventLocationCountryCode(
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
    public function CountEventLocationPostalCode(
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
    public function BrowseEventLocationListFilter($filter_obj) {
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

    public function SetEventLocationUuid($set_type, $obj) {
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
    
    public function DelEventLocationUuid(
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
    public function GetEventLocationListUuid(
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
    public function GetEventLocationListEventId(
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
    public function GetEventLocationListCity(
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
    public function GetEventLocationListCountryCode(
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
    public function GetEventLocationListPostalCode(
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
    public function CountEventCategoryUuid(
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
    public function CountEventCategoryCode(
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
    public function CountEventCategoryName(
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
    public function CountEventCategoryOrgId(
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
    public function CountEventCategoryTypeId(
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
    public function CountEventCategoryOrgIdTypeId(
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
    public function BrowseEventCategoryListFilter($filter_obj) {
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

    public function SetEventCategoryUuid($set_type, $obj) {
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
    
    public function DelEventCategoryUuid(
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
    public function DelEventCategoryCodeOrgId(
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
    public function DelEventCategoryCodeOrgIdTypeId(
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
    public function GetEventCategoryListUuid(
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
    public function GetEventCategoryListCode(
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
    public function GetEventCategoryListName(
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
    public function GetEventCategoryListOrgId(
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
    public function GetEventCategoryListTypeId(
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
    public function GetEventCategoryListOrgIdTypeId(
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
    public function CountEventCategoryTreeUuid(
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
    public function CountEventCategoryTreeParentId(
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
    public function CountEventCategoryTreeCategoryId(
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
    public function CountEventCategoryTreeParentIdCategoryId(
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
    public function BrowseEventCategoryTreeListFilter($filter_obj) {
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

    public function SetEventCategoryTreeUuid($set_type, $obj) {
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
    
    public function DelEventCategoryTreeUuid(
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
    public function DelEventCategoryTreeParentId(
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
    public function DelEventCategoryTreeCategoryId(
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
    public function DelEventCategoryTreeParentIdCategoryId(
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
    public function GetEventCategoryTreeListUuid(
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
    public function GetEventCategoryTreeListParentId(
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
    public function GetEventCategoryTreeListCategoryId(
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
    public function GetEventCategoryTreeListParentIdCategoryId(
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
    public function CountEventCategoryAssocUuid(
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
    public function CountEventCategoryAssocEventId(
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
    public function CountEventCategoryAssocCategoryId(
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
    public function CountEventCategoryAssocEventIdCategoryId(
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
    public function BrowseEventCategoryAssocListFilter($filter_obj) {
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

    public function SetEventCategoryAssocUuid($set_type, $obj) {
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
    
    public function DelEventCategoryAssocUuid(
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
    public function GetEventCategoryAssocListUuid(
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
    public function GetEventCategoryAssocListEventId(
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
    public function GetEventCategoryAssocListCategoryId(
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
    public function GetEventCategoryAssocListEventIdCategoryId(
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
    public function CountChannelUuid(
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
    public function CountChannelCode(
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
    public function CountChannelName(
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
    public function CountChannelOrgId(
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
    public function CountChannelTypeId(
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
    public function CountChannelOrgIdTypeId(
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
    public function BrowseChannelListFilter($filter_obj) {
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

    public function SetChannelUuid($set_type, $obj) {
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
    
    public function DelChannelUuid(
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
    public function DelChannelCodeOrgId(
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
    public function DelChannelCodeOrgIdTypeId(
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
    public function GetChannelListUuid(
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
    public function GetChannelListCode(
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
    public function GetChannelListName(
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
    public function GetChannelListOrgId(
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
    public function GetChannelListTypeId(
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
    public function GetChannelListOrgIdTypeId(
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
    public function CountChannelTypeUuid(
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
    public function CountChannelTypeCode(
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
    public function CountChannelTypeName(
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
    public function BrowseChannelTypeListFilter($filter_obj) {
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

    public function SetChannelTypeUuid($set_type, $obj) {
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
    
    public function DelChannelTypeUuid(
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
    public function GetChannelTypeListUuid(
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
    public function GetChannelTypeListCode(
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
    public function GetChannelTypeListName(
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
    public function CountQuestionUuid(
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
    public function CountQuestionCode(
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
    public function CountQuestionName(
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
    public function CountQuestionChannelId(
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
    public function CountQuestionOrgId(
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
    public function CountQuestionChannelIdOrgId(
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
    public function CountQuestionChannelIdCode(
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
    public function BrowseQuestionListFilter($filter_obj) {
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

    public function SetQuestionUuid($set_type, $obj) {
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
    
    public function SetQuestionChannelIdCode($set_type, $obj) {
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
    
    public function DelQuestionUuid(
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
    public function DelQuestionChannelIdOrgId(
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
    public function GetQuestionListUuid(
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
    public function GetQuestionListCode(
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
    public function GetQuestionListName(
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
    public function GetQuestionListType(
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
    public function GetQuestionListChannelId(
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
    public function GetQuestionListOrgId(
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
    public function GetQuestionListChannelIdOrgId(
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
    public function GetQuestionListChannelIdCode(
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
    public function CountProfileOfferUuid(
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
    public function CountProfileOfferProfileId(
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
    public function BrowseProfileOfferListFilter($filter_obj) {
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

    public function SetProfileOfferUuid($set_type, $obj) {
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
    
    public function DelProfileOfferUuid(
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
    public function DelProfileOfferProfileId(
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
    public function GetProfileOfferListUuid(
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
    public function GetProfileOfferListProfileId(
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
    public function CountProfileAppUuid(
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
    public function CountProfileAppProfileIdAppId(
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
    public function BrowseProfileAppListFilter($filter_obj) {
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

    public function SetProfileAppUuid($set_type, $obj) {
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
    
    public function SetProfileAppProfileIdAppId($set_type, $obj) {
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
    
    public function DelProfileAppUuid(
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
    public function DelProfileAppProfileIdAppId(
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
    public function GetProfileAppListUuid(
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
    public function GetProfileAppListAppId(
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
    public function GetProfileAppListProfileId(
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
    public function GetProfileAppListProfileIdAppId(
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
    public function CountProfileOrgUuid(
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
    public function CountProfileOrgOrgId(
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
    public function CountProfileOrgProfileId(
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
    public function BrowseProfileOrgListFilter($filter_obj) {
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

    public function SetProfileOrgUuid($set_type, $obj) {
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
    
    public function DelProfileOrgUuid(
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
    public function GetProfileOrgListUuid(
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
    public function GetProfileOrgListOrgId(
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
    public function GetProfileOrgListProfileId(
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
    public function CountProfileQuestionUuid(
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
    public function CountProfileQuestionChannelId(
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
    public function CountProfileQuestionOrgId(
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
    public function CountProfileQuestionProfileId(
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
    public function CountProfileQuestionQuestionId(
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
    public function CountProfileQuestionChannelIdOrgId(
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
    public function CountProfileQuestionChannelIdProfileId(
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
    public function CountProfileQuestionQuestionIdProfileId(
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
    public function BrowseProfileQuestionListFilter($filter_obj) {
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

    public function SetProfileQuestionUuid($set_type, $obj) {
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
    
    public function SetProfileQuestionChannelIdProfileId($set_type, $obj) {
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
    
    public function SetProfileQuestionQuestionIdProfileId($set_type, $obj) {
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
    
    public function SetProfileQuestionChannelIdQuestionIdProfileId($set_type, $obj) {
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
    
    public function DelProfileQuestionUuid(
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
    public function DelProfileQuestionChannelIdOrgId(
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
    public function GetProfileQuestionListUuid(
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
    public function GetProfileQuestionListChannelId(
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
    public function GetProfileQuestionListOrgId(
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
    public function GetProfileQuestionListProfileId(
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
    public function GetProfileQuestionListQuestionId(
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
    public function GetProfileQuestionListChannelIdOrgId(
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
    public function GetProfileQuestionListChannelIdProfileId(
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
    public function GetProfileQuestionListQuestionIdProfileId(
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
    public function CountProfileChannelUuid(
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
    public function CountProfileChannelChannelId(
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
    public function CountProfileChannelProfileId(
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
    public function CountProfileChannelChannelIdProfileId(
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
    public function BrowseProfileChannelListFilter($filter_obj) {
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

    public function SetProfileChannelUuid($set_type, $obj) {
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
    
    public function SetProfileChannelChannelIdProfileId($set_type, $obj) {
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
    
    public function DelProfileChannelUuid(
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
    public function DelProfileChannelChannelIdProfileId(
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
    public function GetProfileChannelListUuid(
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
    public function GetProfileChannelListChannelId(
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
    public function GetProfileChannelListProfileId(
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
    public function GetProfileChannelListChannelIdProfileId(
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
    public function CountOrgSiteUuid(
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
    public function CountOrgSiteOrgId(
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
    public function CountOrgSiteSiteId(
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
    public function CountOrgSiteOrgIdSiteId(
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
    public function BrowseOrgSiteListFilter($filter_obj) {
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

    public function SetOrgSiteUuid($set_type, $obj) {
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
    
    public function SetOrgSiteOrgIdSiteId($set_type, $obj) {
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
    
    public function DelOrgSiteUuid(
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
    public function DelOrgSiteOrgIdSiteId(
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
    public function GetOrgSiteListUuid(
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
    public function GetOrgSiteListOrgId(
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
    public function GetOrgSiteListSiteId(
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
    public function GetOrgSiteListOrgIdSiteId(
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
    public function CountSiteAppUuid(
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
    public function CountSiteAppAppId(
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
    public function CountSiteAppSiteId(
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
    public function CountSiteAppAppIdSiteId(
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
    public function BrowseSiteAppListFilter($filter_obj) {
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

    public function SetSiteAppUuid($set_type, $obj) {
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
    
    public function SetSiteAppAppIdSiteId($set_type, $obj) {
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
    
    public function DelSiteAppUuid(
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
    public function DelSiteAppAppIdSiteId(
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
    public function GetSiteAppListUuid(
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
    public function GetSiteAppListAppId(
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
    public function GetSiteAppListSiteId(
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
    public function GetSiteAppListAppIdSiteId(
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
    public function CountPhotoUuid(
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
    public function CountPhotoExternalId(
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
    public function CountPhotoUrl(
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
    public function CountPhotoUrlExternalId(
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
    public function CountPhotoUuidExternalId(
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
    public function BrowsePhotoListFilter($filter_obj) {
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

    public function SetPhotoUuid($set_type, $obj) {
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
    
    public function SetPhotoExternalId($set_type, $obj) {
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
    
    public function SetPhotoUrl($set_type, $obj) {
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
    
    public function SetPhotoUrlExternalId($set_type, $obj) {
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
    
    public function SetPhotoUuidExternalId($set_type, $obj) {
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
    
    public function DelPhotoUuid(
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
    public function DelPhotoExternalId(
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
    public function DelPhotoUrl(
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
    public function DelPhotoUrlExternalId(
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
    public function DelPhotoUuidExternalId(
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
    public function GetPhotoListUuid(
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
    public function GetPhotoListExternalId(
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
    public function GetPhotoListUrl(
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
    public function GetPhotoListUrlExternalId(
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
    public function GetPhotoListUuidExternalId(
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
    public function CountVideoUuid(
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
    public function CountVideoExternalId(
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
    public function CountVideoUrl(
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
    public function CountVideoUrlExternalId(
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
    public function CountVideoUuidExternalId(
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
    public function BrowseVideoListFilter($filter_obj) {
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

    public function SetVideoUuid($set_type, $obj) {
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
    
    public function SetVideoExternalId($set_type, $obj) {
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
    
    public function SetVideoUrl($set_type, $obj) {
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
    
    public function SetVideoUrlExternalId($set_type, $obj) {
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
    
    public function SetVideoUuidExternalId($set_type, $obj) {
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
    
    public function DelVideoUuid(
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
    public function DelVideoExternalId(
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
    public function DelVideoUrl(
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
    public function DelVideoUrlExternalId(
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
    public function DelVideoUuidExternalId(
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
    public function GetVideoListUuid(
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
    public function GetVideoListExternalId(
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
    public function GetVideoListUrl(
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
    public function GetVideoListUrlExternalId(
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
    public function GetVideoListUuidExternalId(
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

}


?>
