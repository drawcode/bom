<?php // namespace Platform;

require_once('BasePlatformACT.php');

class SetType {
    const FULL = 'full';
    const INSERT_ONLY = 'insertonly';
    const UPDATE_ONLY = 'updateonly';
}

class BasePlatformAPI {

    public $act;
    public $DEFAULT_CACHE_HOURS = 12;
    public $DEFAULT_SET_TYPE = 'full';

    public function __construct() {
        $this->DEFAULT_CACHE_HOURS = 12;
        $this->DEFAULT_SET_TYPE = SetType::FULL;
        $this->act = new BasePlatformACT();
    }
    
    public function __destruct() {
    
    }
    
    
#------------------------------------------------------------------------------                    
    public function CountApp(
    ) {      
        return $this->act->CountApp(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountAppByUuid(
        $uuid
    ) {      
        return $this->act->CountAppByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountAppByCode(
        $code
    ) {      
        return $this->act->CountAppByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountAppByTypeId(
        $type_id
    ) {      
        return $this->act->CountAppByTypeId(
        $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountAppByCodeByTypeId(
        $code
        , $type_id
    ) {      
        return $this->act->CountAppByCodeByTypeId(
        $code
        , $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountAppByPlatformByTypeId(
        $platform
        , $type_id
    ) {      
        return $this->act->CountAppByPlatformByTypeId(
        $platform
        , $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountAppByPlatform(
        $platform
    ) {      
        return $this->act->CountAppByPlatform(
        $platform
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseAppListByFilter($filter_obj) {
        return $this->act->BrowseAppListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetAppByUuid($set_type, $obj) {
        return $this->act->SetAppByUuid($set_type, $obj);
    }
               
    public function SetAppByUuidFull($obj) {
        return $this->act->SetAppByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetAppByCode($set_type, $obj) {
        return $this->act->SetAppByCode($set_type, $obj);
    }
               
    public function SetAppByCodeFull($obj) {
        return $this->act->SetAppByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelAppByUuid(
        $uuid
    ) {         
        return $this->act->DelAppByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelAppByCode(
        $code
    ) {         
        return $this->act->DelAppByCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function GetAppList(
        ) {
            return $this->act->GetAppList(
            );
        }
        
    public function GetApp(
    ) {
        foreach($this->act->GetAppList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetAppList(
    ) {
        return $this->CachedGetAppList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetAppList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetAppList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<App>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetAppList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetAppListByUuid(
        $uuid
        ) {
            return $this->act->GetAppListByUuid(
                $uuid
            );
        }
        
    public function GetAppByUuid(
        $uuid
    ) {
        foreach($this->act->GetAppListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetAppListByUuid(
        $uuid
    ) {
        return $this->CachedGetAppListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetAppListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetAppListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<App>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetAppListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetAppListByCode(
        $code
        ) {
            return $this->act->GetAppListByCode(
                $code
            );
        }
        
    public function GetAppByCode(
        $code
    ) {
        foreach($this->act->GetAppListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetAppListByCode(
        $code
    ) {
        return $this->CachedGetAppListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetAppListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetAppListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<App>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetAppListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetAppListByTypeId(
        $type_id
        ) {
            return $this->act->GetAppListByTypeId(
                $type_id
            );
        }
        
    public function GetAppByTypeId(
        $type_id
    ) {
        foreach($this->act->GetAppListByTypeId(
        $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetAppListByTypeId(
        $type_id
    ) {
        return $this->CachedGetAppListByTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $type_id
        );
    }
    */
        
    public function CachedGetAppListByTypeId(
        $overrideCache
        , $cacheHours
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetAppListByTypeId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$type_id");
        $sb += "_";
        $sb += $type_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<App>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetAppListByTypeId(
                $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetAppListByCodeByTypeId(
        $code
        , $type_id
        ) {
            return $this->act->GetAppListByCodeByTypeId(
                $code
                , $type_id
            );
        }
        
    public function GetAppByCodeByTypeId(
        $code
        , $type_id
    ) {
        foreach($this->act->GetAppListByCodeByTypeId(
        $code
        , $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetAppListByCodeByTypeId(
        $code
        , $type_id
    ) {
        return $this->CachedGetAppListByCodeByTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $type_id
        );
    }
    */
        
    public function CachedGetAppListByCodeByTypeId(
        $overrideCache
        , $cacheHours
        , $code
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetAppListByCodeByTypeId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;
        $sb += "_";
        $sb += strtolower("$type_id");
        $sb += "_";
        $sb += $type_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<App>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetAppListByCodeByTypeId(
                $code
                , $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetAppListByPlatformByTypeId(
        $platform
        , $type_id
        ) {
            return $this->act->GetAppListByPlatformByTypeId(
                $platform
                , $type_id
            );
        }
        
    public function GetAppByPlatformByTypeId(
        $platform
        , $type_id
    ) {
        foreach($this->act->GetAppListByPlatformByTypeId(
        $platform
        , $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetAppListByPlatformByTypeId(
        $platform
        , $type_id
    ) {
        return $this->CachedGetAppListByPlatformByTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $platform
            , $type_id
        );
    }
    */
        
    public function CachedGetAppListByPlatformByTypeId(
        $overrideCache
        , $cacheHours
        , $platform
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetAppListByPlatformByTypeId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$platform");
        $sb += "_";
        $sb += $platform;
        $sb += "_";
        $sb += strtolower("$type_id");
        $sb += "_";
        $sb += $type_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<App>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetAppListByPlatformByTypeId(
                $platform
                , $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetAppListByPlatform(
        $platform
        ) {
            return $this->act->GetAppListByPlatform(
                $platform
            );
        }
        
    public function GetAppByPlatform(
        $platform
    ) {
        foreach($this->act->GetAppListByPlatform(
        $platform
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetAppListByPlatform(
        $platform
    ) {
        return $this->CachedGetAppListByPlatform(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $platform
        );
    }
    */
        
    public function CachedGetAppListByPlatform(
        $overrideCache
        , $cacheHours
        , $platform
    ) {

        $objs = array();

        $method_name = "CachedGetAppListByPlatform";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$platform");
        $sb += "_";
        $sb += $platform;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<App>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetAppListByPlatform(
                $platform
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountAppType(
    ) {      
        return $this->act->CountAppType(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountAppTypeByUuid(
        $uuid
    ) {      
        return $this->act->CountAppTypeByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountAppTypeByCode(
        $code
    ) {      
        return $this->act->CountAppTypeByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseAppTypeListByFilter($filter_obj) {
        return $this->act->BrowseAppTypeListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetAppTypeByUuid($set_type, $obj) {
        return $this->act->SetAppTypeByUuid($set_type, $obj);
    }
               
    public function SetAppTypeByUuidFull($obj) {
        return $this->act->SetAppTypeByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetAppTypeByCode($set_type, $obj) {
        return $this->act->SetAppTypeByCode($set_type, $obj);
    }
               
    public function SetAppTypeByCodeFull($obj) {
        return $this->act->SetAppTypeByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelAppTypeByUuid(
        $uuid
    ) {         
        return $this->act->DelAppTypeByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelAppTypeByCode(
        $code
    ) {         
        return $this->act->DelAppTypeByCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function GetAppTypeList(
        ) {
            return $this->act->GetAppTypeList(
            );
        }
        
    public function GetAppType(
    ) {
        foreach($this->act->GetAppTypeList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetAppTypeList(
    ) {
        return $this->CachedGetAppTypeList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetAppTypeList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetAppTypeList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<AppType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetAppTypeList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetAppTypeListByUuid(
        $uuid
        ) {
            return $this->act->GetAppTypeListByUuid(
                $uuid
            );
        }
        
    public function GetAppTypeByUuid(
        $uuid
    ) {
        foreach($this->act->GetAppTypeListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetAppTypeListByUuid(
        $uuid
    ) {
        return $this->CachedGetAppTypeListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetAppTypeListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetAppTypeListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<AppType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetAppTypeListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetAppTypeListByCode(
        $code
        ) {
            return $this->act->GetAppTypeListByCode(
                $code
            );
        }
        
    public function GetAppTypeByCode(
        $code
    ) {
        foreach($this->act->GetAppTypeListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetAppTypeListByCode(
        $code
    ) {
        return $this->CachedGetAppTypeListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetAppTypeListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetAppTypeListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<AppType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetAppTypeListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountSite(
    ) {      
        return $this->act->CountSite(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountSiteByUuid(
        $uuid
    ) {      
        return $this->act->CountSiteByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountSiteByCode(
        $code
    ) {      
        return $this->act->CountSiteByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountSiteByTypeId(
        $type_id
    ) {      
        return $this->act->CountSiteByTypeId(
        $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountSiteByCodeByTypeId(
        $code
        , $type_id
    ) {      
        return $this->act->CountSiteByCodeByTypeId(
        $code
        , $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountSiteByDomainByTypeId(
        $domain
        , $type_id
    ) {      
        return $this->act->CountSiteByDomainByTypeId(
        $domain
        , $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountSiteByDomain(
        $domain
    ) {      
        return $this->act->CountSiteByDomain(
        $domain
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseSiteListByFilter($filter_obj) {
        return $this->act->BrowseSiteListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetSiteByUuid($set_type, $obj) {
        return $this->act->SetSiteByUuid($set_type, $obj);
    }
               
    public function SetSiteByUuidFull($obj) {
        return $this->act->SetSiteByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetSiteByCode($set_type, $obj) {
        return $this->act->SetSiteByCode($set_type, $obj);
    }
               
    public function SetSiteByCodeFull($obj) {
        return $this->act->SetSiteByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelSiteByUuid(
        $uuid
    ) {         
        return $this->act->DelSiteByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelSiteByCode(
        $code
    ) {         
        return $this->act->DelSiteByCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function GetSiteList(
        ) {
            return $this->act->GetSiteList(
            );
        }
        
    public function GetSite(
    ) {
        foreach($this->act->GetSiteList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteList(
    ) {
        return $this->CachedGetSiteList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetSiteList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetSiteList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Site>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetSiteList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetSiteListByUuid(
        $uuid
        ) {
            return $this->act->GetSiteListByUuid(
                $uuid
            );
        }
        
    public function GetSiteByUuid(
        $uuid
    ) {
        foreach($this->act->GetSiteListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteListByUuid(
        $uuid
    ) {
        return $this->CachedGetSiteListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetSiteListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetSiteListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Site>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetSiteListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetSiteListByCode(
        $code
        ) {
            return $this->act->GetSiteListByCode(
                $code
            );
        }
        
    public function GetSiteByCode(
        $code
    ) {
        foreach($this->act->GetSiteListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteListByCode(
        $code
    ) {
        return $this->CachedGetSiteListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetSiteListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetSiteListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Site>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetSiteListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetSiteListByTypeId(
        $type_id
        ) {
            return $this->act->GetSiteListByTypeId(
                $type_id
            );
        }
        
    public function GetSiteByTypeId(
        $type_id
    ) {
        foreach($this->act->GetSiteListByTypeId(
        $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteListByTypeId(
        $type_id
    ) {
        return $this->CachedGetSiteListByTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $type_id
        );
    }
    */
        
    public function CachedGetSiteListByTypeId(
        $overrideCache
        , $cacheHours
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetSiteListByTypeId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$type_id");
        $sb += "_";
        $sb += $type_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Site>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetSiteListByTypeId(
                $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetSiteListByCodeByTypeId(
        $code
        , $type_id
        ) {
            return $this->act->GetSiteListByCodeByTypeId(
                $code
                , $type_id
            );
        }
        
    public function GetSiteByCodeByTypeId(
        $code
        , $type_id
    ) {
        foreach($this->act->GetSiteListByCodeByTypeId(
        $code
        , $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteListByCodeByTypeId(
        $code
        , $type_id
    ) {
        return $this->CachedGetSiteListByCodeByTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $type_id
        );
    }
    */
        
    public function CachedGetSiteListByCodeByTypeId(
        $overrideCache
        , $cacheHours
        , $code
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetSiteListByCodeByTypeId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;
        $sb += "_";
        $sb += strtolower("$type_id");
        $sb += "_";
        $sb += $type_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Site>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetSiteListByCodeByTypeId(
                $code
                , $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetSiteListByDomainByTypeId(
        $domain
        , $type_id
        ) {
            return $this->act->GetSiteListByDomainByTypeId(
                $domain
                , $type_id
            );
        }
        
    public function GetSiteByDomainByTypeId(
        $domain
        , $type_id
    ) {
        foreach($this->act->GetSiteListByDomainByTypeId(
        $domain
        , $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteListByDomainByTypeId(
        $domain
        , $type_id
    ) {
        return $this->CachedGetSiteListByDomainByTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $domain
            , $type_id
        );
    }
    */
        
    public function CachedGetSiteListByDomainByTypeId(
        $overrideCache
        , $cacheHours
        , $domain
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetSiteListByDomainByTypeId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$domain");
        $sb += "_";
        $sb += $domain;
        $sb += "_";
        $sb += strtolower("$type_id");
        $sb += "_";
        $sb += $type_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Site>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetSiteListByDomainByTypeId(
                $domain
                , $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetSiteListByDomain(
        $domain
        ) {
            return $this->act->GetSiteListByDomain(
                $domain
            );
        }
        
    public function GetSiteByDomain(
        $domain
    ) {
        foreach($this->act->GetSiteListByDomain(
        $domain
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteListByDomain(
        $domain
    ) {
        return $this->CachedGetSiteListByDomain(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $domain
        );
    }
    */
        
    public function CachedGetSiteListByDomain(
        $overrideCache
        , $cacheHours
        , $domain
    ) {

        $objs = array();

        $method_name = "CachedGetSiteListByDomain";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$domain");
        $sb += "_";
        $sb += $domain;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Site>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetSiteListByDomain(
                $domain
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountSiteType(
    ) {      
        return $this->act->CountSiteType(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountSiteTypeByUuid(
        $uuid
    ) {      
        return $this->act->CountSiteTypeByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountSiteTypeByCode(
        $code
    ) {      
        return $this->act->CountSiteTypeByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseSiteTypeListByFilter($filter_obj) {
        return $this->act->BrowseSiteTypeListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetSiteTypeByUuid($set_type, $obj) {
        return $this->act->SetSiteTypeByUuid($set_type, $obj);
    }
               
    public function SetSiteTypeByUuidFull($obj) {
        return $this->act->SetSiteTypeByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetSiteTypeByCode($set_type, $obj) {
        return $this->act->SetSiteTypeByCode($set_type, $obj);
    }
               
    public function SetSiteTypeByCodeFull($obj) {
        return $this->act->SetSiteTypeByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelSiteTypeByUuid(
        $uuid
    ) {         
        return $this->act->DelSiteTypeByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelSiteTypeByCode(
        $code
    ) {         
        return $this->act->DelSiteTypeByCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function GetSiteTypeList(
        ) {
            return $this->act->GetSiteTypeList(
            );
        }
        
    public function GetSiteType(
    ) {
        foreach($this->act->GetSiteTypeList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteTypeList(
    ) {
        return $this->CachedGetSiteTypeList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetSiteTypeList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetSiteTypeList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<SiteType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetSiteTypeList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetSiteTypeListByUuid(
        $uuid
        ) {
            return $this->act->GetSiteTypeListByUuid(
                $uuid
            );
        }
        
    public function GetSiteTypeByUuid(
        $uuid
    ) {
        foreach($this->act->GetSiteTypeListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteTypeListByUuid(
        $uuid
    ) {
        return $this->CachedGetSiteTypeListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetSiteTypeListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetSiteTypeListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<SiteType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetSiteTypeListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetSiteTypeListByCode(
        $code
        ) {
            return $this->act->GetSiteTypeListByCode(
                $code
            );
        }
        
    public function GetSiteTypeByCode(
        $code
    ) {
        foreach($this->act->GetSiteTypeListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteTypeListByCode(
        $code
    ) {
        return $this->CachedGetSiteTypeListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetSiteTypeListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetSiteTypeListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<SiteType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetSiteTypeListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountOrg(
    ) {      
        return $this->act->CountOrg(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOrgByUuid(
        $uuid
    ) {      
        return $this->act->CountOrgByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOrgByCode(
        $code
    ) {      
        return $this->act->CountOrgByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOrgByName(
        $name
    ) {      
        return $this->act->CountOrgByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseOrgListByFilter($filter_obj) {
        return $this->act->BrowseOrgListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOrgByUuid($set_type, $obj) {
        return $this->act->SetOrgByUuid($set_type, $obj);
    }
               
    public function SetOrgByUuidFull($obj) {
        return $this->act->SetOrgByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelOrgByUuid(
        $uuid
    ) {         
        return $this->act->DelOrgByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetOrgList(
        ) {
            return $this->act->GetOrgList(
            );
        }
        
    public function GetOrg(
    ) {
        foreach($this->act->GetOrgList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOrgList(
    ) {
        return $this->CachedGetOrgList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetOrgList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetOrgList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Org>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOrgList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOrgListByUuid(
        $uuid
        ) {
            return $this->act->GetOrgListByUuid(
                $uuid
            );
        }
        
    public function GetOrgByUuid(
        $uuid
    ) {
        foreach($this->act->GetOrgListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOrgListByUuid(
        $uuid
    ) {
        return $this->CachedGetOrgListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetOrgListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetOrgListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Org>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOrgListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOrgListByCode(
        $code
        ) {
            return $this->act->GetOrgListByCode(
                $code
            );
        }
        
    public function GetOrgByCode(
        $code
    ) {
        foreach($this->act->GetOrgListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOrgListByCode(
        $code
    ) {
        return $this->CachedGetOrgListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetOrgListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetOrgListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Org>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOrgListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOrgListByName(
        $name
        ) {
            return $this->act->GetOrgListByName(
                $name
            );
        }
        
    public function GetOrgByName(
        $name
    ) {
        foreach($this->act->GetOrgListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOrgListByName(
        $name
    ) {
        return $this->CachedGetOrgListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetOrgListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetOrgListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Org>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOrgListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountOrgType(
    ) {      
        return $this->act->CountOrgType(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOrgTypeByUuid(
        $uuid
    ) {      
        return $this->act->CountOrgTypeByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOrgTypeByCode(
        $code
    ) {      
        return $this->act->CountOrgTypeByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseOrgTypeListByFilter($filter_obj) {
        return $this->act->BrowseOrgTypeListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOrgTypeByUuid($set_type, $obj) {
        return $this->act->SetOrgTypeByUuid($set_type, $obj);
    }
               
    public function SetOrgTypeByUuidFull($obj) {
        return $this->act->SetOrgTypeByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOrgTypeByCode($set_type, $obj) {
        return $this->act->SetOrgTypeByCode($set_type, $obj);
    }
               
    public function SetOrgTypeByCodeFull($obj) {
        return $this->act->SetOrgTypeByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelOrgTypeByUuid(
        $uuid
    ) {         
        return $this->act->DelOrgTypeByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelOrgTypeByCode(
        $code
    ) {         
        return $this->act->DelOrgTypeByCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function GetOrgTypeList(
        ) {
            return $this->act->GetOrgTypeList(
            );
        }
        
    public function GetOrgType(
    ) {
        foreach($this->act->GetOrgTypeList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOrgTypeList(
    ) {
        return $this->CachedGetOrgTypeList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetOrgTypeList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetOrgTypeList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OrgType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOrgTypeList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOrgTypeListByUuid(
        $uuid
        ) {
            return $this->act->GetOrgTypeListByUuid(
                $uuid
            );
        }
        
    public function GetOrgTypeByUuid(
        $uuid
    ) {
        foreach($this->act->GetOrgTypeListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOrgTypeListByUuid(
        $uuid
    ) {
        return $this->CachedGetOrgTypeListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetOrgTypeListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetOrgTypeListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OrgType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOrgTypeListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOrgTypeListByCode(
        $code
        ) {
            return $this->act->GetOrgTypeListByCode(
                $code
            );
        }
        
    public function GetOrgTypeByCode(
        $code
    ) {
        foreach($this->act->GetOrgTypeListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOrgTypeListByCode(
        $code
    ) {
        return $this->CachedGetOrgTypeListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetOrgTypeListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetOrgTypeListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OrgType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOrgTypeListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountContentItem(
    ) {      
        return $this->act->CountContentItem(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountContentItemByUuid(
        $uuid
    ) {      
        return $this->act->CountContentItemByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountContentItemByCode(
        $code
    ) {      
        return $this->act->CountContentItemByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountContentItemByName(
        $name
    ) {      
        return $this->act->CountContentItemByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountContentItemByPath(
        $path
    ) {      
        return $this->act->CountContentItemByPath(
        $path
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseContentItemListByFilter($filter_obj) {
        return $this->act->BrowseContentItemListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetContentItemByUuid($set_type, $obj) {
        return $this->act->SetContentItemByUuid($set_type, $obj);
    }
               
    public function SetContentItemByUuidFull($obj) {
        return $this->act->SetContentItemByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelContentItemByUuid(
        $uuid
    ) {         
        return $this->act->DelContentItemByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelContentItemByPath(
        $path
    ) {         
        return $this->act->DelContentItemByPath(
        $path
        );
    }
#------------------------------------------------------------------------------                    
    public function GetContentItemList(
        ) {
            return $this->act->GetContentItemList(
            );
        }
        
    public function GetContentItem(
    ) {
        foreach($this->act->GetContentItemList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentItemList(
    ) {
        return $this->CachedGetContentItemList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetContentItemList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetContentItemList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ContentItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetContentItemList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetContentItemListByUuid(
        $uuid
        ) {
            return $this->act->GetContentItemListByUuid(
                $uuid
            );
        }
        
    public function GetContentItemByUuid(
        $uuid
    ) {
        foreach($this->act->GetContentItemListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentItemListByUuid(
        $uuid
    ) {
        return $this->CachedGetContentItemListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetContentItemListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetContentItemListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ContentItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetContentItemListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetContentItemListByCode(
        $code
        ) {
            return $this->act->GetContentItemListByCode(
                $code
            );
        }
        
    public function GetContentItemByCode(
        $code
    ) {
        foreach($this->act->GetContentItemListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentItemListByCode(
        $code
    ) {
        return $this->CachedGetContentItemListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetContentItemListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetContentItemListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ContentItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetContentItemListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetContentItemListByName(
        $name
        ) {
            return $this->act->GetContentItemListByName(
                $name
            );
        }
        
    public function GetContentItemByName(
        $name
    ) {
        foreach($this->act->GetContentItemListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentItemListByName(
        $name
    ) {
        return $this->CachedGetContentItemListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetContentItemListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetContentItemListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ContentItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetContentItemListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetContentItemListByPath(
        $path
        ) {
            return $this->act->GetContentItemListByPath(
                $path
            );
        }
        
    public function GetContentItemByPath(
        $path
    ) {
        foreach($this->act->GetContentItemListByPath(
        $path
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentItemListByPath(
        $path
    ) {
        return $this->CachedGetContentItemListByPath(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $path
        );
    }
    */
        
    public function CachedGetContentItemListByPath(
        $overrideCache
        , $cacheHours
        , $path
    ) {

        $objs = array();

        $method_name = "CachedGetContentItemListByPath";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$path");
        $sb += "_";
        $sb += $path;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ContentItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetContentItemListByPath(
                $path
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountContentItemType(
    ) {      
        return $this->act->CountContentItemType(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountContentItemTypeByUuid(
        $uuid
    ) {      
        return $this->act->CountContentItemTypeByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountContentItemTypeByCode(
        $code
    ) {      
        return $this->act->CountContentItemTypeByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseContentItemTypeListByFilter($filter_obj) {
        return $this->act->BrowseContentItemTypeListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetContentItemTypeByUuid($set_type, $obj) {
        return $this->act->SetContentItemTypeByUuid($set_type, $obj);
    }
               
    public function SetContentItemTypeByUuidFull($obj) {
        return $this->act->SetContentItemTypeByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetContentItemTypeByCode($set_type, $obj) {
        return $this->act->SetContentItemTypeByCode($set_type, $obj);
    }
               
    public function SetContentItemTypeByCodeFull($obj) {
        return $this->act->SetContentItemTypeByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelContentItemTypeByUuid(
        $uuid
    ) {         
        return $this->act->DelContentItemTypeByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelContentItemTypeByCode(
        $code
    ) {         
        return $this->act->DelContentItemTypeByCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function GetContentItemTypeList(
        ) {
            return $this->act->GetContentItemTypeList(
            );
        }
        
    public function GetContentItemType(
    ) {
        foreach($this->act->GetContentItemTypeList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentItemTypeList(
    ) {
        return $this->CachedGetContentItemTypeList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetContentItemTypeList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetContentItemTypeList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ContentItemType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetContentItemTypeList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetContentItemTypeListByUuid(
        $uuid
        ) {
            return $this->act->GetContentItemTypeListByUuid(
                $uuid
            );
        }
        
    public function GetContentItemTypeByUuid(
        $uuid
    ) {
        foreach($this->act->GetContentItemTypeListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentItemTypeListByUuid(
        $uuid
    ) {
        return $this->CachedGetContentItemTypeListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetContentItemTypeListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetContentItemTypeListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ContentItemType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetContentItemTypeListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetContentItemTypeListByCode(
        $code
        ) {
            return $this->act->GetContentItemTypeListByCode(
                $code
            );
        }
        
    public function GetContentItemTypeByCode(
        $code
    ) {
        foreach($this->act->GetContentItemTypeListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentItemTypeListByCode(
        $code
    ) {
        return $this->CachedGetContentItemTypeListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetContentItemTypeListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetContentItemTypeListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ContentItemType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetContentItemTypeListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountContentPage(
    ) {      
        return $this->act->CountContentPage(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountContentPageByUuid(
        $uuid
    ) {      
        return $this->act->CountContentPageByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountContentPageByCode(
        $code
    ) {      
        return $this->act->CountContentPageByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountContentPageByName(
        $name
    ) {      
        return $this->act->CountContentPageByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountContentPageByPath(
        $path
    ) {      
        return $this->act->CountContentPageByPath(
        $path
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseContentPageListByFilter($filter_obj) {
        return $this->act->BrowseContentPageListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetContentPageByUuid($set_type, $obj) {
        return $this->act->SetContentPageByUuid($set_type, $obj);
    }
               
    public function SetContentPageByUuidFull($obj) {
        return $this->act->SetContentPageByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelContentPageByUuid(
        $uuid
    ) {         
        return $this->act->DelContentPageByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelContentPageByPathBySiteId(
        $path
        , $site_id
    ) {         
        return $this->act->DelContentPageByPathBySiteId(
        $path
        , $site_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelContentPageByPath(
        $path
    ) {         
        return $this->act->DelContentPageByPath(
        $path
        );
    }
#------------------------------------------------------------------------------                    
    public function GetContentPageList(
        ) {
            return $this->act->GetContentPageList(
            );
        }
        
    public function GetContentPage(
    ) {
        foreach($this->act->GetContentPageList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentPageList(
    ) {
        return $this->CachedGetContentPageList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetContentPageList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetContentPageList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ContentPage>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetContentPageList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetContentPageListByUuid(
        $uuid
        ) {
            return $this->act->GetContentPageListByUuid(
                $uuid
            );
        }
        
    public function GetContentPageByUuid(
        $uuid
    ) {
        foreach($this->act->GetContentPageListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentPageListByUuid(
        $uuid
    ) {
        return $this->CachedGetContentPageListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetContentPageListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetContentPageListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ContentPage>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetContentPageListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetContentPageListByCode(
        $code
        ) {
            return $this->act->GetContentPageListByCode(
                $code
            );
        }
        
    public function GetContentPageByCode(
        $code
    ) {
        foreach($this->act->GetContentPageListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentPageListByCode(
        $code
    ) {
        return $this->CachedGetContentPageListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetContentPageListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetContentPageListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ContentPage>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetContentPageListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetContentPageListByName(
        $name
        ) {
            return $this->act->GetContentPageListByName(
                $name
            );
        }
        
    public function GetContentPageByName(
        $name
    ) {
        foreach($this->act->GetContentPageListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentPageListByName(
        $name
    ) {
        return $this->CachedGetContentPageListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetContentPageListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetContentPageListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ContentPage>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetContentPageListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetContentPageListByPath(
        $path
        ) {
            return $this->act->GetContentPageListByPath(
                $path
            );
        }
        
    public function GetContentPageByPath(
        $path
    ) {
        foreach($this->act->GetContentPageListByPath(
        $path
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentPageListByPath(
        $path
    ) {
        return $this->CachedGetContentPageListByPath(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $path
        );
    }
    */
        
    public function CachedGetContentPageListByPath(
        $overrideCache
        , $cacheHours
        , $path
    ) {

        $objs = array();

        $method_name = "CachedGetContentPageListByPath";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$path");
        $sb += "_";
        $sb += $path;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ContentPage>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetContentPageListByPath(
                $path
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetContentPageListBySiteId(
        $site_id
        ) {
            return $this->act->GetContentPageListBySiteId(
                $site_id
            );
        }
        
    public function GetContentPageBySiteId(
        $site_id
    ) {
        foreach($this->act->GetContentPageListBySiteId(
        $site_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentPageListBySiteId(
        $site_id
    ) {
        return $this->CachedGetContentPageListBySiteId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $site_id
        );
    }
    */
        
    public function CachedGetContentPageListBySiteId(
        $overrideCache
        , $cacheHours
        , $site_id
    ) {

        $objs = array();

        $method_name = "CachedGetContentPageListBySiteId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$site_id");
        $sb += "_";
        $sb += $site_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ContentPage>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetContentPageListBySiteId(
                $site_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetContentPageListBySiteIdByPath(
        $site_id
        , $path
        ) {
            return $this->act->GetContentPageListBySiteIdByPath(
                $site_id
                , $path
            );
        }
        
    public function GetContentPageBySiteIdByPath(
        $site_id
        , $path
    ) {
        foreach($this->act->GetContentPageListBySiteIdByPath(
        $site_id
        , $path
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentPageListBySiteIdByPath(
        $site_id
        , $path
    ) {
        return $this->CachedGetContentPageListBySiteIdByPath(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $site_id
            , $path
        );
    }
    */
        
    public function CachedGetContentPageListBySiteIdByPath(
        $overrideCache
        , $cacheHours
        , $site_id
        , $path
    ) {

        $objs = array();

        $method_name = "CachedGetContentPageListBySiteIdByPath";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$site_id");
        $sb += "_";
        $sb += $site_id;
        $sb += "_";
        $sb += strtolower("$path");
        $sb += "_";
        $sb += $path;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ContentPage>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetContentPageListBySiteIdByPath(
                $site_id
                , $path
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountMessage(
    ) {      
        return $this->act->CountMessage(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountMessageByUuid(
        $uuid
    ) {      
        return $this->act->CountMessageByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseMessageListByFilter($filter_obj) {
        return $this->act->BrowseMessageListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetMessageByUuid($set_type, $obj) {
        return $this->act->SetMessageByUuid($set_type, $obj);
    }
               
    public function SetMessageByUuidFull($obj) {
        return $this->act->SetMessageByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelMessageByUuid(
        $uuid
    ) {         
        return $this->act->DelMessageByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetMessageList(
        ) {
            return $this->act->GetMessageList(
            );
        }
        
    public function GetMessage(
    ) {
        foreach($this->act->GetMessageList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetMessageList(
    ) {
        return $this->CachedGetMessageList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetMessageList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetMessageList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Message>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetMessageList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetMessageListByUuid(
        $uuid
        ) {
            return $this->act->GetMessageListByUuid(
                $uuid
            );
        }
        
    public function GetMessageByUuid(
        $uuid
    ) {
        foreach($this->act->GetMessageListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetMessageListByUuid(
        $uuid
    ) {
        return $this->CachedGetMessageListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetMessageListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetMessageListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Message>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetMessageListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountOffer(
    ) {      
        return $this->act->CountOffer(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferByUuid(
        $uuid
    ) {      
        return $this->act->CountOfferByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferByCode(
        $code
    ) {      
        return $this->act->CountOfferByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferByName(
        $name
    ) {      
        return $this->act->CountOfferByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferByOrgId(
        $org_id
    ) {      
        return $this->act->CountOfferByOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseOfferListByFilter($filter_obj) {
        return $this->act->BrowseOfferListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOfferByUuid($set_type, $obj) {
        return $this->act->SetOfferByUuid($set_type, $obj);
    }
               
    public function SetOfferByUuidFull($obj) {
        return $this->act->SetOfferByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelOfferByUuid(
        $uuid
    ) {         
        return $this->act->DelOfferByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelOfferByOrgId(
        $org_id
    ) {         
        return $this->act->DelOfferByOrgId(
        $org_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetOfferList(
        ) {
            return $this->act->GetOfferList(
            );
        }
        
    public function GetOffer(
    ) {
        foreach($this->act->GetOfferList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferList(
    ) {
        return $this->CachedGetOfferList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetOfferList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetOfferList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Offer>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferListByUuid(
        $uuid
        ) {
            return $this->act->GetOfferListByUuid(
                $uuid
            );
        }
        
    public function GetOfferByUuid(
        $uuid
    ) {
        foreach($this->act->GetOfferListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferListByUuid(
        $uuid
    ) {
        return $this->CachedGetOfferListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetOfferListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetOfferListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Offer>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferListByCode(
        $code
        ) {
            return $this->act->GetOfferListByCode(
                $code
            );
        }
        
    public function GetOfferByCode(
        $code
    ) {
        foreach($this->act->GetOfferListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferListByCode(
        $code
    ) {
        return $this->CachedGetOfferListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetOfferListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetOfferListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Offer>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferListByName(
        $name
        ) {
            return $this->act->GetOfferListByName(
                $name
            );
        }
        
    public function GetOfferByName(
        $name
    ) {
        foreach($this->act->GetOfferListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferListByName(
        $name
    ) {
        return $this->CachedGetOfferListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetOfferListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetOfferListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Offer>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferListByOrgId(
        $org_id
        ) {
            return $this->act->GetOfferListByOrgId(
                $org_id
            );
        }
        
    public function GetOfferByOrgId(
        $org_id
    ) {
        foreach($this->act->GetOfferListByOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferListByOrgId(
        $org_id
    ) {
        return $this->CachedGetOfferListByOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetOfferListByOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferListByOrgId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Offer>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferListByOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountOfferType(
    ) {      
        return $this->act->CountOfferType(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferTypeByUuid(
        $uuid
    ) {      
        return $this->act->CountOfferTypeByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferTypeByCode(
        $code
    ) {      
        return $this->act->CountOfferTypeByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferTypeByName(
        $name
    ) {      
        return $this->act->CountOfferTypeByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseOfferTypeListByFilter($filter_obj) {
        return $this->act->BrowseOfferTypeListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOfferTypeByUuid($set_type, $obj) {
        return $this->act->SetOfferTypeByUuid($set_type, $obj);
    }
               
    public function SetOfferTypeByUuidFull($obj) {
        return $this->act->SetOfferTypeByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelOfferTypeByUuid(
        $uuid
    ) {         
        return $this->act->DelOfferTypeByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetOfferTypeList(
        ) {
            return $this->act->GetOfferTypeList(
            );
        }
        
    public function GetOfferType(
    ) {
        foreach($this->act->GetOfferTypeList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferTypeList(
    ) {
        return $this->CachedGetOfferTypeList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetOfferTypeList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetOfferTypeList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferTypeList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferTypeListByUuid(
        $uuid
        ) {
            return $this->act->GetOfferTypeListByUuid(
                $uuid
            );
        }
        
    public function GetOfferTypeByUuid(
        $uuid
    ) {
        foreach($this->act->GetOfferTypeListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferTypeListByUuid(
        $uuid
    ) {
        return $this->CachedGetOfferTypeListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetOfferTypeListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetOfferTypeListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferTypeListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferTypeListByCode(
        $code
        ) {
            return $this->act->GetOfferTypeListByCode(
                $code
            );
        }
        
    public function GetOfferTypeByCode(
        $code
    ) {
        foreach($this->act->GetOfferTypeListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferTypeListByCode(
        $code
    ) {
        return $this->CachedGetOfferTypeListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetOfferTypeListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetOfferTypeListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferTypeListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferTypeListByName(
        $name
        ) {
            return $this->act->GetOfferTypeListByName(
                $name
            );
        }
        
    public function GetOfferTypeByName(
        $name
    ) {
        foreach($this->act->GetOfferTypeListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferTypeListByName(
        $name
    ) {
        return $this->CachedGetOfferTypeListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetOfferTypeListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetOfferTypeListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferTypeListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountOfferLocation(
    ) {      
        return $this->act->CountOfferLocation(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferLocationByUuid(
        $uuid
    ) {      
        return $this->act->CountOfferLocationByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferLocationByOfferId(
        $offer_id
    ) {      
        return $this->act->CountOfferLocationByOfferId(
        $offer_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferLocationByCity(
        $city
    ) {      
        return $this->act->CountOfferLocationByCity(
        $city
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferLocationByCountryCode(
        $country_code
    ) {      
        return $this->act->CountOfferLocationByCountryCode(
        $country_code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferLocationByPostalCode(
        $postal_code
    ) {      
        return $this->act->CountOfferLocationByPostalCode(
        $postal_code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseOfferLocationListByFilter($filter_obj) {
        return $this->act->BrowseOfferLocationListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOfferLocationByUuid($set_type, $obj) {
        return $this->act->SetOfferLocationByUuid($set_type, $obj);
    }
               
    public function SetOfferLocationByUuidFull($obj) {
        return $this->act->SetOfferLocationByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelOfferLocationByUuid(
        $uuid
    ) {         
        return $this->act->DelOfferLocationByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetOfferLocationList(
        ) {
            return $this->act->GetOfferLocationList(
            );
        }
        
    public function GetOfferLocation(
    ) {
        foreach($this->act->GetOfferLocationList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferLocationList(
    ) {
        return $this->CachedGetOfferLocationList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetOfferLocationList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetOfferLocationList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferLocation>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferLocationList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferLocationListByUuid(
        $uuid
        ) {
            return $this->act->GetOfferLocationListByUuid(
                $uuid
            );
        }
        
    public function GetOfferLocationByUuid(
        $uuid
    ) {
        foreach($this->act->GetOfferLocationListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferLocationListByUuid(
        $uuid
    ) {
        return $this->CachedGetOfferLocationListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetOfferLocationListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetOfferLocationListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferLocation>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferLocationListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferLocationListByOfferId(
        $offer_id
        ) {
            return $this->act->GetOfferLocationListByOfferId(
                $offer_id
            );
        }
        
    public function GetOfferLocationByOfferId(
        $offer_id
    ) {
        foreach($this->act->GetOfferLocationListByOfferId(
        $offer_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferLocationListByOfferId(
        $offer_id
    ) {
        return $this->CachedGetOfferLocationListByOfferId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $offer_id
        );
    }
    */
        
    public function CachedGetOfferLocationListByOfferId(
        $overrideCache
        , $cacheHours
        , $offer_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferLocationListByOfferId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$offer_id");
        $sb += "_";
        $sb += $offer_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferLocation>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferLocationListByOfferId(
                $offer_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferLocationListByCity(
        $city
        ) {
            return $this->act->GetOfferLocationListByCity(
                $city
            );
        }
        
    public function GetOfferLocationByCity(
        $city
    ) {
        foreach($this->act->GetOfferLocationListByCity(
        $city
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferLocationListByCity(
        $city
    ) {
        return $this->CachedGetOfferLocationListByCity(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $city
        );
    }
    */
        
    public function CachedGetOfferLocationListByCity(
        $overrideCache
        , $cacheHours
        , $city
    ) {

        $objs = array();

        $method_name = "CachedGetOfferLocationListByCity";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$city");
        $sb += "_";
        $sb += $city;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferLocation>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferLocationListByCity(
                $city
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferLocationListByCountryCode(
        $country_code
        ) {
            return $this->act->GetOfferLocationListByCountryCode(
                $country_code
            );
        }
        
    public function GetOfferLocationByCountryCode(
        $country_code
    ) {
        foreach($this->act->GetOfferLocationListByCountryCode(
        $country_code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferLocationListByCountryCode(
        $country_code
    ) {
        return $this->CachedGetOfferLocationListByCountryCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $country_code
        );
    }
    */
        
    public function CachedGetOfferLocationListByCountryCode(
        $overrideCache
        , $cacheHours
        , $country_code
    ) {

        $objs = array();

        $method_name = "CachedGetOfferLocationListByCountryCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$country_code");
        $sb += "_";
        $sb += $country_code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferLocation>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferLocationListByCountryCode(
                $country_code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferLocationListByPostalCode(
        $postal_code
        ) {
            return $this->act->GetOfferLocationListByPostalCode(
                $postal_code
            );
        }
        
    public function GetOfferLocationByPostalCode(
        $postal_code
    ) {
        foreach($this->act->GetOfferLocationListByPostalCode(
        $postal_code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferLocationListByPostalCode(
        $postal_code
    ) {
        return $this->CachedGetOfferLocationListByPostalCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $postal_code
        );
    }
    */
        
    public function CachedGetOfferLocationListByPostalCode(
        $overrideCache
        , $cacheHours
        , $postal_code
    ) {

        $objs = array();

        $method_name = "CachedGetOfferLocationListByPostalCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$postal_code");
        $sb += "_";
        $sb += $postal_code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferLocation>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferLocationListByPostalCode(
                $postal_code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountOfferCategory(
    ) {      
        return $this->act->CountOfferCategory(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryByUuid(
        $uuid
    ) {      
        return $this->act->CountOfferCategoryByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryByCode(
        $code
    ) {      
        return $this->act->CountOfferCategoryByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryByName(
        $name
    ) {      
        return $this->act->CountOfferCategoryByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryByOrgId(
        $org_id
    ) {      
        return $this->act->CountOfferCategoryByOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryByTypeId(
        $type_id
    ) {      
        return $this->act->CountOfferCategoryByTypeId(
        $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryByOrgIdByTypeId(
        $org_id
        , $type_id
    ) {      
        return $this->act->CountOfferCategoryByOrgIdByTypeId(
        $org_id
        , $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseOfferCategoryListByFilter($filter_obj) {
        return $this->act->BrowseOfferCategoryListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOfferCategoryByUuid($set_type, $obj) {
        return $this->act->SetOfferCategoryByUuid($set_type, $obj);
    }
               
    public function SetOfferCategoryByUuidFull($obj) {
        return $this->act->SetOfferCategoryByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelOfferCategoryByUuid(
        $uuid
    ) {         
        return $this->act->DelOfferCategoryByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelOfferCategoryByCodeByOrgId(
        $code
        , $org_id
    ) {         
        return $this->act->DelOfferCategoryByCodeByOrgId(
        $code
        , $org_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelOfferCategoryByCodeByOrgIdByTypeId(
        $code
        , $org_id
        , $type_id
    ) {         
        return $this->act->DelOfferCategoryByCodeByOrgIdByTypeId(
        $code
        , $org_id
        , $type_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryList(
        ) {
            return $this->act->GetOfferCategoryList(
            );
        }
        
    public function GetOfferCategory(
    ) {
        foreach($this->act->GetOfferCategoryList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryList(
    ) {
        return $this->CachedGetOfferCategoryList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetOfferCategoryList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferCategory>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferCategoryList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryListByUuid(
        $uuid
        ) {
            return $this->act->GetOfferCategoryListByUuid(
                $uuid
            );
        }
        
    public function GetOfferCategoryByUuid(
        $uuid
    ) {
        foreach($this->act->GetOfferCategoryListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryListByUuid(
        $uuid
    ) {
        return $this->CachedGetOfferCategoryListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetOfferCategoryListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferCategory>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferCategoryListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryListByCode(
        $code
        ) {
            return $this->act->GetOfferCategoryListByCode(
                $code
            );
        }
        
    public function GetOfferCategoryByCode(
        $code
    ) {
        foreach($this->act->GetOfferCategoryListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryListByCode(
        $code
    ) {
        return $this->CachedGetOfferCategoryListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetOfferCategoryListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferCategory>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferCategoryListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryListByName(
        $name
        ) {
            return $this->act->GetOfferCategoryListByName(
                $name
            );
        }
        
    public function GetOfferCategoryByName(
        $name
    ) {
        foreach($this->act->GetOfferCategoryListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryListByName(
        $name
    ) {
        return $this->CachedGetOfferCategoryListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetOfferCategoryListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferCategory>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferCategoryListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryListByOrgId(
        $org_id
        ) {
            return $this->act->GetOfferCategoryListByOrgId(
                $org_id
            );
        }
        
    public function GetOfferCategoryByOrgId(
        $org_id
    ) {
        foreach($this->act->GetOfferCategoryListByOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryListByOrgId(
        $org_id
    ) {
        return $this->CachedGetOfferCategoryListByOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetOfferCategoryListByOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryListByOrgId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferCategory>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferCategoryListByOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryListByTypeId(
        $type_id
        ) {
            return $this->act->GetOfferCategoryListByTypeId(
                $type_id
            );
        }
        
    public function GetOfferCategoryByTypeId(
        $type_id
    ) {
        foreach($this->act->GetOfferCategoryListByTypeId(
        $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryListByTypeId(
        $type_id
    ) {
        return $this->CachedGetOfferCategoryListByTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $type_id
        );
    }
    */
        
    public function CachedGetOfferCategoryListByTypeId(
        $overrideCache
        , $cacheHours
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryListByTypeId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$type_id");
        $sb += "_";
        $sb += $type_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferCategory>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferCategoryListByTypeId(
                $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryListByOrgIdByTypeId(
        $org_id
        , $type_id
        ) {
            return $this->act->GetOfferCategoryListByOrgIdByTypeId(
                $org_id
                , $type_id
            );
        }
        
    public function GetOfferCategoryByOrgIdByTypeId(
        $org_id
        , $type_id
    ) {
        foreach($this->act->GetOfferCategoryListByOrgIdByTypeId(
        $org_id
        , $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryListByOrgIdByTypeId(
        $org_id
        , $type_id
    ) {
        return $this->CachedGetOfferCategoryListByOrgIdByTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
            , $type_id
        );
    }
    */
        
    public function CachedGetOfferCategoryListByOrgIdByTypeId(
        $overrideCache
        , $cacheHours
        , $org_id
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryListByOrgIdByTypeId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;
        $sb += "_";
        $sb += strtolower("$type_id");
        $sb += "_";
        $sb += $type_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferCategory>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferCategoryListByOrgIdByTypeId(
                $org_id
                , $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryTree(
    ) {      
        return $this->act->CountOfferCategoryTree(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryTreeByUuid(
        $uuid
    ) {      
        return $this->act->CountOfferCategoryTreeByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryTreeByParentId(
        $parent_id
    ) {      
        return $this->act->CountOfferCategoryTreeByParentId(
        $parent_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryTreeByCategoryId(
        $category_id
    ) {      
        return $this->act->CountOfferCategoryTreeByCategoryId(
        $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryTreeByParentIdByCategoryId(
        $parent_id
        , $category_id
    ) {      
        return $this->act->CountOfferCategoryTreeByParentIdByCategoryId(
        $parent_id
        , $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseOfferCategoryTreeListByFilter($filter_obj) {
        return $this->act->BrowseOfferCategoryTreeListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOfferCategoryTreeByUuid($set_type, $obj) {
        return $this->act->SetOfferCategoryTreeByUuid($set_type, $obj);
    }
               
    public function SetOfferCategoryTreeByUuidFull($obj) {
        return $this->act->SetOfferCategoryTreeByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelOfferCategoryTreeByUuid(
        $uuid
    ) {         
        return $this->act->DelOfferCategoryTreeByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelOfferCategoryTreeByParentId(
        $parent_id
    ) {         
        return $this->act->DelOfferCategoryTreeByParentId(
        $parent_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelOfferCategoryTreeByCategoryId(
        $category_id
    ) {         
        return $this->act->DelOfferCategoryTreeByCategoryId(
        $category_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelOfferCategoryTreeByParentIdByCategoryId(
        $parent_id
        , $category_id
    ) {         
        return $this->act->DelOfferCategoryTreeByParentIdByCategoryId(
        $parent_id
        , $category_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryTreeList(
        ) {
            return $this->act->GetOfferCategoryTreeList(
            );
        }
        
    public function GetOfferCategoryTree(
    ) {
        foreach($this->act->GetOfferCategoryTreeList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryTreeList(
    ) {
        return $this->CachedGetOfferCategoryTreeList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetOfferCategoryTreeList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryTreeList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferCategoryTree>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferCategoryTreeList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryTreeListByUuid(
        $uuid
        ) {
            return $this->act->GetOfferCategoryTreeListByUuid(
                $uuid
            );
        }
        
    public function GetOfferCategoryTreeByUuid(
        $uuid
    ) {
        foreach($this->act->GetOfferCategoryTreeListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryTreeListByUuid(
        $uuid
    ) {
        return $this->CachedGetOfferCategoryTreeListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetOfferCategoryTreeListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryTreeListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferCategoryTree>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferCategoryTreeListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryTreeListByParentId(
        $parent_id
        ) {
            return $this->act->GetOfferCategoryTreeListByParentId(
                $parent_id
            );
        }
        
    public function GetOfferCategoryTreeByParentId(
        $parent_id
    ) {
        foreach($this->act->GetOfferCategoryTreeListByParentId(
        $parent_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryTreeListByParentId(
        $parent_id
    ) {
        return $this->CachedGetOfferCategoryTreeListByParentId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $parent_id
        );
    }
    */
        
    public function CachedGetOfferCategoryTreeListByParentId(
        $overrideCache
        , $cacheHours
        , $parent_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryTreeListByParentId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$parent_id");
        $sb += "_";
        $sb += $parent_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferCategoryTree>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferCategoryTreeListByParentId(
                $parent_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryTreeListByCategoryId(
        $category_id
        ) {
            return $this->act->GetOfferCategoryTreeListByCategoryId(
                $category_id
            );
        }
        
    public function GetOfferCategoryTreeByCategoryId(
        $category_id
    ) {
        foreach($this->act->GetOfferCategoryTreeListByCategoryId(
        $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryTreeListByCategoryId(
        $category_id
    ) {
        return $this->CachedGetOfferCategoryTreeListByCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $category_id
        );
    }
    */
        
    public function CachedGetOfferCategoryTreeListByCategoryId(
        $overrideCache
        , $cacheHours
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryTreeListByCategoryId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$category_id");
        $sb += "_";
        $sb += $category_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferCategoryTree>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferCategoryTreeListByCategoryId(
                $category_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryTreeListByParentIdByCategoryId(
        $parent_id
        , $category_id
        ) {
            return $this->act->GetOfferCategoryTreeListByParentIdByCategoryId(
                $parent_id
                , $category_id
            );
        }
        
    public function GetOfferCategoryTreeByParentIdByCategoryId(
        $parent_id
        , $category_id
    ) {
        foreach($this->act->GetOfferCategoryTreeListByParentIdByCategoryId(
        $parent_id
        , $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryTreeListByParentIdByCategoryId(
        $parent_id
        , $category_id
    ) {
        return $this->CachedGetOfferCategoryTreeListByParentIdByCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $parent_id
            , $category_id
        );
    }
    */
        
    public function CachedGetOfferCategoryTreeListByParentIdByCategoryId(
        $overrideCache
        , $cacheHours
        , $parent_id
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryTreeListByParentIdByCategoryId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$parent_id");
        $sb += "_";
        $sb += $parent_id;
        $sb += "_";
        $sb += strtolower("$category_id");
        $sb += "_";
        $sb += $category_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferCategoryTree>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferCategoryTreeListByParentIdByCategoryId(
                $parent_id
                , $category_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryAssoc(
    ) {      
        return $this->act->CountOfferCategoryAssoc(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryAssocByUuid(
        $uuid
    ) {      
        return $this->act->CountOfferCategoryAssocByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryAssocByOfferId(
        $offer_id
    ) {      
        return $this->act->CountOfferCategoryAssocByOfferId(
        $offer_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryAssocByCategoryId(
        $category_id
    ) {      
        return $this->act->CountOfferCategoryAssocByCategoryId(
        $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryAssocByOfferIdByCategoryId(
        $offer_id
        , $category_id
    ) {      
        return $this->act->CountOfferCategoryAssocByOfferIdByCategoryId(
        $offer_id
        , $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseOfferCategoryAssocListByFilter($filter_obj) {
        return $this->act->BrowseOfferCategoryAssocListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOfferCategoryAssocByUuid($set_type, $obj) {
        return $this->act->SetOfferCategoryAssocByUuid($set_type, $obj);
    }
               
    public function SetOfferCategoryAssocByUuidFull($obj) {
        return $this->act->SetOfferCategoryAssocByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelOfferCategoryAssocByUuid(
        $uuid
    ) {         
        return $this->act->DelOfferCategoryAssocByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryAssocList(
        ) {
            return $this->act->GetOfferCategoryAssocList(
            );
        }
        
    public function GetOfferCategoryAssoc(
    ) {
        foreach($this->act->GetOfferCategoryAssocList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryAssocList(
    ) {
        return $this->CachedGetOfferCategoryAssocList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetOfferCategoryAssocList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryAssocList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferCategoryAssoc>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferCategoryAssocList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryAssocListByUuid(
        $uuid
        ) {
            return $this->act->GetOfferCategoryAssocListByUuid(
                $uuid
            );
        }
        
    public function GetOfferCategoryAssocByUuid(
        $uuid
    ) {
        foreach($this->act->GetOfferCategoryAssocListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryAssocListByUuid(
        $uuid
    ) {
        return $this->CachedGetOfferCategoryAssocListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetOfferCategoryAssocListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryAssocListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferCategoryAssoc>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferCategoryAssocListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryAssocListByOfferId(
        $offer_id
        ) {
            return $this->act->GetOfferCategoryAssocListByOfferId(
                $offer_id
            );
        }
        
    public function GetOfferCategoryAssocByOfferId(
        $offer_id
    ) {
        foreach($this->act->GetOfferCategoryAssocListByOfferId(
        $offer_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryAssocListByOfferId(
        $offer_id
    ) {
        return $this->CachedGetOfferCategoryAssocListByOfferId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $offer_id
        );
    }
    */
        
    public function CachedGetOfferCategoryAssocListByOfferId(
        $overrideCache
        , $cacheHours
        , $offer_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryAssocListByOfferId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$offer_id");
        $sb += "_";
        $sb += $offer_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferCategoryAssoc>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferCategoryAssocListByOfferId(
                $offer_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryAssocListByCategoryId(
        $category_id
        ) {
            return $this->act->GetOfferCategoryAssocListByCategoryId(
                $category_id
            );
        }
        
    public function GetOfferCategoryAssocByCategoryId(
        $category_id
    ) {
        foreach($this->act->GetOfferCategoryAssocListByCategoryId(
        $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryAssocListByCategoryId(
        $category_id
    ) {
        return $this->CachedGetOfferCategoryAssocListByCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $category_id
        );
    }
    */
        
    public function CachedGetOfferCategoryAssocListByCategoryId(
        $overrideCache
        , $cacheHours
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryAssocListByCategoryId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$category_id");
        $sb += "_";
        $sb += $category_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferCategoryAssoc>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferCategoryAssocListByCategoryId(
                $category_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryAssocListByOfferIdByCategoryId(
        $offer_id
        , $category_id
        ) {
            return $this->act->GetOfferCategoryAssocListByOfferIdByCategoryId(
                $offer_id
                , $category_id
            );
        }
        
    public function GetOfferCategoryAssocByOfferIdByCategoryId(
        $offer_id
        , $category_id
    ) {
        foreach($this->act->GetOfferCategoryAssocListByOfferIdByCategoryId(
        $offer_id
        , $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryAssocListByOfferIdByCategoryId(
        $offer_id
        , $category_id
    ) {
        return $this->CachedGetOfferCategoryAssocListByOfferIdByCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $offer_id
            , $category_id
        );
    }
    */
        
    public function CachedGetOfferCategoryAssocListByOfferIdByCategoryId(
        $overrideCache
        , $cacheHours
        , $offer_id
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryAssocListByOfferIdByCategoryId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$offer_id");
        $sb += "_";
        $sb += $offer_id;
        $sb += "_";
        $sb += strtolower("$category_id");
        $sb += "_";
        $sb += $category_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferCategoryAssoc>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferCategoryAssocListByOfferIdByCategoryId(
                $offer_id
                , $category_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountOfferGameLocation(
    ) {      
        return $this->act->CountOfferGameLocation(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferGameLocationByUuid(
        $uuid
    ) {      
        return $this->act->CountOfferGameLocationByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferGameLocationByGameLocationId(
        $game_location_id
    ) {      
        return $this->act->CountOfferGameLocationByGameLocationId(
        $game_location_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferGameLocationByOfferId(
        $offer_id
    ) {      
        return $this->act->CountOfferGameLocationByOfferId(
        $offer_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferGameLocationByOfferIdByGameLocationId(
        $offer_id
        , $game_location_id
    ) {      
        return $this->act->CountOfferGameLocationByOfferIdByGameLocationId(
        $offer_id
        , $game_location_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseOfferGameLocationListByFilter($filter_obj) {
        return $this->act->BrowseOfferGameLocationListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOfferGameLocationByUuid($set_type, $obj) {
        return $this->act->SetOfferGameLocationByUuid($set_type, $obj);
    }
               
    public function SetOfferGameLocationByUuidFull($obj) {
        return $this->act->SetOfferGameLocationByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelOfferGameLocationByUuid(
        $uuid
    ) {         
        return $this->act->DelOfferGameLocationByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetOfferGameLocationList(
        ) {
            return $this->act->GetOfferGameLocationList(
            );
        }
        
    public function GetOfferGameLocation(
    ) {
        foreach($this->act->GetOfferGameLocationList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferGameLocationList(
    ) {
        return $this->CachedGetOfferGameLocationList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetOfferGameLocationList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetOfferGameLocationList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferGameLocation>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferGameLocationList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferGameLocationListByUuid(
        $uuid
        ) {
            return $this->act->GetOfferGameLocationListByUuid(
                $uuid
            );
        }
        
    public function GetOfferGameLocationByUuid(
        $uuid
    ) {
        foreach($this->act->GetOfferGameLocationListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferGameLocationListByUuid(
        $uuid
    ) {
        return $this->CachedGetOfferGameLocationListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetOfferGameLocationListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetOfferGameLocationListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferGameLocation>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferGameLocationListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferGameLocationListByGameLocationId(
        $game_location_id
        ) {
            return $this->act->GetOfferGameLocationListByGameLocationId(
                $game_location_id
            );
        }
        
    public function GetOfferGameLocationByGameLocationId(
        $game_location_id
    ) {
        foreach($this->act->GetOfferGameLocationListByGameLocationId(
        $game_location_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferGameLocationListByGameLocationId(
        $game_location_id
    ) {
        return $this->CachedGetOfferGameLocationListByGameLocationId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_location_id
        );
    }
    */
        
    public function CachedGetOfferGameLocationListByGameLocationId(
        $overrideCache
        , $cacheHours
        , $game_location_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferGameLocationListByGameLocationId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_location_id");
        $sb += "_";
        $sb += $game_location_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferGameLocation>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferGameLocationListByGameLocationId(
                $game_location_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferGameLocationListByOfferId(
        $offer_id
        ) {
            return $this->act->GetOfferGameLocationListByOfferId(
                $offer_id
            );
        }
        
    public function GetOfferGameLocationByOfferId(
        $offer_id
    ) {
        foreach($this->act->GetOfferGameLocationListByOfferId(
        $offer_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferGameLocationListByOfferId(
        $offer_id
    ) {
        return $this->CachedGetOfferGameLocationListByOfferId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $offer_id
        );
    }
    */
        
    public function CachedGetOfferGameLocationListByOfferId(
        $overrideCache
        , $cacheHours
        , $offer_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferGameLocationListByOfferId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$offer_id");
        $sb += "_";
        $sb += $offer_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferGameLocation>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferGameLocationListByOfferId(
                $offer_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferGameLocationListByOfferIdByGameLocationId(
        $offer_id
        , $game_location_id
        ) {
            return $this->act->GetOfferGameLocationListByOfferIdByGameLocationId(
                $offer_id
                , $game_location_id
            );
        }
        
    public function GetOfferGameLocationByOfferIdByGameLocationId(
        $offer_id
        , $game_location_id
    ) {
        foreach($this->act->GetOfferGameLocationListByOfferIdByGameLocationId(
        $offer_id
        , $game_location_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferGameLocationListByOfferIdByGameLocationId(
        $offer_id
        , $game_location_id
    ) {
        return $this->CachedGetOfferGameLocationListByOfferIdByGameLocationId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $offer_id
            , $game_location_id
        );
    }
    */
        
    public function CachedGetOfferGameLocationListByOfferIdByGameLocationId(
        $overrideCache
        , $cacheHours
        , $offer_id
        , $game_location_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferGameLocationListByOfferIdByGameLocationId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$offer_id");
        $sb += "_";
        $sb += $offer_id;
        $sb += "_";
        $sb += strtolower("$game_location_id");
        $sb += "_";
        $sb += $game_location_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OfferGameLocation>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOfferGameLocationListByOfferIdByGameLocationId(
                $offer_id
                , $game_location_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountEventInfo(
    ) {      
        return $this->act->CountEventInfo(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventInfoByUuid(
        $uuid
    ) {      
        return $this->act->CountEventInfoByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventInfoByCode(
        $code
    ) {      
        return $this->act->CountEventInfoByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventInfoByName(
        $name
    ) {      
        return $this->act->CountEventInfoByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventInfoByOrgId(
        $org_id
    ) {      
        return $this->act->CountEventInfoByOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseEventInfoListByFilter($filter_obj) {
        return $this->act->BrowseEventInfoListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetEventInfoByUuid($set_type, $obj) {
        return $this->act->SetEventInfoByUuid($set_type, $obj);
    }
               
    public function SetEventInfoByUuidFull($obj) {
        return $this->act->SetEventInfoByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelEventInfoByUuid(
        $uuid
    ) {         
        return $this->act->DelEventInfoByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelEventInfoByOrgId(
        $org_id
    ) {         
        return $this->act->DelEventInfoByOrgId(
        $org_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetEventInfoList(
        ) {
            return $this->act->GetEventInfoList(
            );
        }
        
    public function GetEventInfo(
    ) {
        foreach($this->act->GetEventInfoList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventInfoList(
    ) {
        return $this->CachedGetEventInfoList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetEventInfoList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetEventInfoList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventInfo>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventInfoList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventInfoListByUuid(
        $uuid
        ) {
            return $this->act->GetEventInfoListByUuid(
                $uuid
            );
        }
        
    public function GetEventInfoByUuid(
        $uuid
    ) {
        foreach($this->act->GetEventInfoListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventInfoListByUuid(
        $uuid
    ) {
        return $this->CachedGetEventInfoListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetEventInfoListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetEventInfoListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventInfo>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventInfoListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventInfoListByCode(
        $code
        ) {
            return $this->act->GetEventInfoListByCode(
                $code
            );
        }
        
    public function GetEventInfoByCode(
        $code
    ) {
        foreach($this->act->GetEventInfoListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventInfoListByCode(
        $code
    ) {
        return $this->CachedGetEventInfoListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetEventInfoListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetEventInfoListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventInfo>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventInfoListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventInfoListByName(
        $name
        ) {
            return $this->act->GetEventInfoListByName(
                $name
            );
        }
        
    public function GetEventInfoByName(
        $name
    ) {
        foreach($this->act->GetEventInfoListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventInfoListByName(
        $name
    ) {
        return $this->CachedGetEventInfoListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetEventInfoListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetEventInfoListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventInfo>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventInfoListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventInfoListByOrgId(
        $org_id
        ) {
            return $this->act->GetEventInfoListByOrgId(
                $org_id
            );
        }
        
    public function GetEventInfoByOrgId(
        $org_id
    ) {
        foreach($this->act->GetEventInfoListByOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventInfoListByOrgId(
        $org_id
    ) {
        return $this->CachedGetEventInfoListByOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetEventInfoListByOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetEventInfoListByOrgId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventInfo>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventInfoListByOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountEventLocation(
    ) {      
        return $this->act->CountEventLocation(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventLocationByUuid(
        $uuid
    ) {      
        return $this->act->CountEventLocationByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventLocationByEventId(
        $event_id
    ) {      
        return $this->act->CountEventLocationByEventId(
        $event_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventLocationByCity(
        $city
    ) {      
        return $this->act->CountEventLocationByCity(
        $city
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventLocationByCountryCode(
        $country_code
    ) {      
        return $this->act->CountEventLocationByCountryCode(
        $country_code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventLocationByPostalCode(
        $postal_code
    ) {      
        return $this->act->CountEventLocationByPostalCode(
        $postal_code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseEventLocationListByFilter($filter_obj) {
        return $this->act->BrowseEventLocationListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetEventLocationByUuid($set_type, $obj) {
        return $this->act->SetEventLocationByUuid($set_type, $obj);
    }
               
    public function SetEventLocationByUuidFull($obj) {
        return $this->act->SetEventLocationByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelEventLocationByUuid(
        $uuid
    ) {         
        return $this->act->DelEventLocationByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetEventLocationList(
        ) {
            return $this->act->GetEventLocationList(
            );
        }
        
    public function GetEventLocation(
    ) {
        foreach($this->act->GetEventLocationList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventLocationList(
    ) {
        return $this->CachedGetEventLocationList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetEventLocationList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetEventLocationList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventLocation>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventLocationList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventLocationListByUuid(
        $uuid
        ) {
            return $this->act->GetEventLocationListByUuid(
                $uuid
            );
        }
        
    public function GetEventLocationByUuid(
        $uuid
    ) {
        foreach($this->act->GetEventLocationListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventLocationListByUuid(
        $uuid
    ) {
        return $this->CachedGetEventLocationListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetEventLocationListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetEventLocationListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventLocation>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventLocationListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventLocationListByEventId(
        $event_id
        ) {
            return $this->act->GetEventLocationListByEventId(
                $event_id
            );
        }
        
    public function GetEventLocationByEventId(
        $event_id
    ) {
        foreach($this->act->GetEventLocationListByEventId(
        $event_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventLocationListByEventId(
        $event_id
    ) {
        return $this->CachedGetEventLocationListByEventId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $event_id
        );
    }
    */
        
    public function CachedGetEventLocationListByEventId(
        $overrideCache
        , $cacheHours
        , $event_id
    ) {

        $objs = array();

        $method_name = "CachedGetEventLocationListByEventId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$event_id");
        $sb += "_";
        $sb += $event_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventLocation>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventLocationListByEventId(
                $event_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventLocationListByCity(
        $city
        ) {
            return $this->act->GetEventLocationListByCity(
                $city
            );
        }
        
    public function GetEventLocationByCity(
        $city
    ) {
        foreach($this->act->GetEventLocationListByCity(
        $city
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventLocationListByCity(
        $city
    ) {
        return $this->CachedGetEventLocationListByCity(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $city
        );
    }
    */
        
    public function CachedGetEventLocationListByCity(
        $overrideCache
        , $cacheHours
        , $city
    ) {

        $objs = array();

        $method_name = "CachedGetEventLocationListByCity";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$city");
        $sb += "_";
        $sb += $city;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventLocation>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventLocationListByCity(
                $city
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventLocationListByCountryCode(
        $country_code
        ) {
            return $this->act->GetEventLocationListByCountryCode(
                $country_code
            );
        }
        
    public function GetEventLocationByCountryCode(
        $country_code
    ) {
        foreach($this->act->GetEventLocationListByCountryCode(
        $country_code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventLocationListByCountryCode(
        $country_code
    ) {
        return $this->CachedGetEventLocationListByCountryCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $country_code
        );
    }
    */
        
    public function CachedGetEventLocationListByCountryCode(
        $overrideCache
        , $cacheHours
        , $country_code
    ) {

        $objs = array();

        $method_name = "CachedGetEventLocationListByCountryCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$country_code");
        $sb += "_";
        $sb += $country_code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventLocation>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventLocationListByCountryCode(
                $country_code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventLocationListByPostalCode(
        $postal_code
        ) {
            return $this->act->GetEventLocationListByPostalCode(
                $postal_code
            );
        }
        
    public function GetEventLocationByPostalCode(
        $postal_code
    ) {
        foreach($this->act->GetEventLocationListByPostalCode(
        $postal_code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventLocationListByPostalCode(
        $postal_code
    ) {
        return $this->CachedGetEventLocationListByPostalCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $postal_code
        );
    }
    */
        
    public function CachedGetEventLocationListByPostalCode(
        $overrideCache
        , $cacheHours
        , $postal_code
    ) {

        $objs = array();

        $method_name = "CachedGetEventLocationListByPostalCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$postal_code");
        $sb += "_";
        $sb += $postal_code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventLocation>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventLocationListByPostalCode(
                $postal_code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountEventCategory(
    ) {      
        return $this->act->CountEventCategory(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryByUuid(
        $uuid
    ) {      
        return $this->act->CountEventCategoryByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryByCode(
        $code
    ) {      
        return $this->act->CountEventCategoryByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryByName(
        $name
    ) {      
        return $this->act->CountEventCategoryByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryByOrgId(
        $org_id
    ) {      
        return $this->act->CountEventCategoryByOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryByTypeId(
        $type_id
    ) {      
        return $this->act->CountEventCategoryByTypeId(
        $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryByOrgIdByTypeId(
        $org_id
        , $type_id
    ) {      
        return $this->act->CountEventCategoryByOrgIdByTypeId(
        $org_id
        , $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseEventCategoryListByFilter($filter_obj) {
        return $this->act->BrowseEventCategoryListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetEventCategoryByUuid($set_type, $obj) {
        return $this->act->SetEventCategoryByUuid($set_type, $obj);
    }
               
    public function SetEventCategoryByUuidFull($obj) {
        return $this->act->SetEventCategoryByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelEventCategoryByUuid(
        $uuid
    ) {         
        return $this->act->DelEventCategoryByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelEventCategoryByCodeByOrgId(
        $code
        , $org_id
    ) {         
        return $this->act->DelEventCategoryByCodeByOrgId(
        $code
        , $org_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelEventCategoryByCodeByOrgIdByTypeId(
        $code
        , $org_id
        , $type_id
    ) {         
        return $this->act->DelEventCategoryByCodeByOrgIdByTypeId(
        $code
        , $org_id
        , $type_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetEventCategoryList(
        ) {
            return $this->act->GetEventCategoryList(
            );
        }
        
    public function GetEventCategory(
    ) {
        foreach($this->act->GetEventCategoryList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryList(
    ) {
        return $this->CachedGetEventCategoryList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetEventCategoryList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventCategory>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventCategoryList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryListByUuid(
        $uuid
        ) {
            return $this->act->GetEventCategoryListByUuid(
                $uuid
            );
        }
        
    public function GetEventCategoryByUuid(
        $uuid
    ) {
        foreach($this->act->GetEventCategoryListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryListByUuid(
        $uuid
    ) {
        return $this->CachedGetEventCategoryListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetEventCategoryListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventCategory>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventCategoryListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryListByCode(
        $code
        ) {
            return $this->act->GetEventCategoryListByCode(
                $code
            );
        }
        
    public function GetEventCategoryByCode(
        $code
    ) {
        foreach($this->act->GetEventCategoryListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryListByCode(
        $code
    ) {
        return $this->CachedGetEventCategoryListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetEventCategoryListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventCategory>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventCategoryListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryListByName(
        $name
        ) {
            return $this->act->GetEventCategoryListByName(
                $name
            );
        }
        
    public function GetEventCategoryByName(
        $name
    ) {
        foreach($this->act->GetEventCategoryListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryListByName(
        $name
    ) {
        return $this->CachedGetEventCategoryListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetEventCategoryListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventCategory>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventCategoryListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryListByOrgId(
        $org_id
        ) {
            return $this->act->GetEventCategoryListByOrgId(
                $org_id
            );
        }
        
    public function GetEventCategoryByOrgId(
        $org_id
    ) {
        foreach($this->act->GetEventCategoryListByOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryListByOrgId(
        $org_id
    ) {
        return $this->CachedGetEventCategoryListByOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetEventCategoryListByOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryListByOrgId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventCategory>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventCategoryListByOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryListByTypeId(
        $type_id
        ) {
            return $this->act->GetEventCategoryListByTypeId(
                $type_id
            );
        }
        
    public function GetEventCategoryByTypeId(
        $type_id
    ) {
        foreach($this->act->GetEventCategoryListByTypeId(
        $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryListByTypeId(
        $type_id
    ) {
        return $this->CachedGetEventCategoryListByTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $type_id
        );
    }
    */
        
    public function CachedGetEventCategoryListByTypeId(
        $overrideCache
        , $cacheHours
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryListByTypeId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$type_id");
        $sb += "_";
        $sb += $type_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventCategory>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventCategoryListByTypeId(
                $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryListByOrgIdByTypeId(
        $org_id
        , $type_id
        ) {
            return $this->act->GetEventCategoryListByOrgIdByTypeId(
                $org_id
                , $type_id
            );
        }
        
    public function GetEventCategoryByOrgIdByTypeId(
        $org_id
        , $type_id
    ) {
        foreach($this->act->GetEventCategoryListByOrgIdByTypeId(
        $org_id
        , $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryListByOrgIdByTypeId(
        $org_id
        , $type_id
    ) {
        return $this->CachedGetEventCategoryListByOrgIdByTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
            , $type_id
        );
    }
    */
        
    public function CachedGetEventCategoryListByOrgIdByTypeId(
        $overrideCache
        , $cacheHours
        , $org_id
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryListByOrgIdByTypeId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;
        $sb += "_";
        $sb += strtolower("$type_id");
        $sb += "_";
        $sb += $type_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventCategory>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventCategoryListByOrgIdByTypeId(
                $org_id
                , $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountEventCategoryTree(
    ) {      
        return $this->act->CountEventCategoryTree(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryTreeByUuid(
        $uuid
    ) {      
        return $this->act->CountEventCategoryTreeByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryTreeByParentId(
        $parent_id
    ) {      
        return $this->act->CountEventCategoryTreeByParentId(
        $parent_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryTreeByCategoryId(
        $category_id
    ) {      
        return $this->act->CountEventCategoryTreeByCategoryId(
        $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryTreeByParentIdByCategoryId(
        $parent_id
        , $category_id
    ) {      
        return $this->act->CountEventCategoryTreeByParentIdByCategoryId(
        $parent_id
        , $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseEventCategoryTreeListByFilter($filter_obj) {
        return $this->act->BrowseEventCategoryTreeListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetEventCategoryTreeByUuid($set_type, $obj) {
        return $this->act->SetEventCategoryTreeByUuid($set_type, $obj);
    }
               
    public function SetEventCategoryTreeByUuidFull($obj) {
        return $this->act->SetEventCategoryTreeByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelEventCategoryTreeByUuid(
        $uuid
    ) {         
        return $this->act->DelEventCategoryTreeByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelEventCategoryTreeByParentId(
        $parent_id
    ) {         
        return $this->act->DelEventCategoryTreeByParentId(
        $parent_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelEventCategoryTreeByCategoryId(
        $category_id
    ) {         
        return $this->act->DelEventCategoryTreeByCategoryId(
        $category_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelEventCategoryTreeByParentIdByCategoryId(
        $parent_id
        , $category_id
    ) {         
        return $this->act->DelEventCategoryTreeByParentIdByCategoryId(
        $parent_id
        , $category_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetEventCategoryTreeList(
        ) {
            return $this->act->GetEventCategoryTreeList(
            );
        }
        
    public function GetEventCategoryTree(
    ) {
        foreach($this->act->GetEventCategoryTreeList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryTreeList(
    ) {
        return $this->CachedGetEventCategoryTreeList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetEventCategoryTreeList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryTreeList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventCategoryTree>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventCategoryTreeList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryTreeListByUuid(
        $uuid
        ) {
            return $this->act->GetEventCategoryTreeListByUuid(
                $uuid
            );
        }
        
    public function GetEventCategoryTreeByUuid(
        $uuid
    ) {
        foreach($this->act->GetEventCategoryTreeListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryTreeListByUuid(
        $uuid
    ) {
        return $this->CachedGetEventCategoryTreeListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetEventCategoryTreeListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryTreeListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventCategoryTree>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventCategoryTreeListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryTreeListByParentId(
        $parent_id
        ) {
            return $this->act->GetEventCategoryTreeListByParentId(
                $parent_id
            );
        }
        
    public function GetEventCategoryTreeByParentId(
        $parent_id
    ) {
        foreach($this->act->GetEventCategoryTreeListByParentId(
        $parent_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryTreeListByParentId(
        $parent_id
    ) {
        return $this->CachedGetEventCategoryTreeListByParentId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $parent_id
        );
    }
    */
        
    public function CachedGetEventCategoryTreeListByParentId(
        $overrideCache
        , $cacheHours
        , $parent_id
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryTreeListByParentId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$parent_id");
        $sb += "_";
        $sb += $parent_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventCategoryTree>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventCategoryTreeListByParentId(
                $parent_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryTreeListByCategoryId(
        $category_id
        ) {
            return $this->act->GetEventCategoryTreeListByCategoryId(
                $category_id
            );
        }
        
    public function GetEventCategoryTreeByCategoryId(
        $category_id
    ) {
        foreach($this->act->GetEventCategoryTreeListByCategoryId(
        $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryTreeListByCategoryId(
        $category_id
    ) {
        return $this->CachedGetEventCategoryTreeListByCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $category_id
        );
    }
    */
        
    public function CachedGetEventCategoryTreeListByCategoryId(
        $overrideCache
        , $cacheHours
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryTreeListByCategoryId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$category_id");
        $sb += "_";
        $sb += $category_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventCategoryTree>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventCategoryTreeListByCategoryId(
                $category_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryTreeListByParentIdByCategoryId(
        $parent_id
        , $category_id
        ) {
            return $this->act->GetEventCategoryTreeListByParentIdByCategoryId(
                $parent_id
                , $category_id
            );
        }
        
    public function GetEventCategoryTreeByParentIdByCategoryId(
        $parent_id
        , $category_id
    ) {
        foreach($this->act->GetEventCategoryTreeListByParentIdByCategoryId(
        $parent_id
        , $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryTreeListByParentIdByCategoryId(
        $parent_id
        , $category_id
    ) {
        return $this->CachedGetEventCategoryTreeListByParentIdByCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $parent_id
            , $category_id
        );
    }
    */
        
    public function CachedGetEventCategoryTreeListByParentIdByCategoryId(
        $overrideCache
        , $cacheHours
        , $parent_id
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryTreeListByParentIdByCategoryId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$parent_id");
        $sb += "_";
        $sb += $parent_id;
        $sb += "_";
        $sb += strtolower("$category_id");
        $sb += "_";
        $sb += $category_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventCategoryTree>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventCategoryTreeListByParentIdByCategoryId(
                $parent_id
                , $category_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountEventCategoryAssoc(
    ) {      
        return $this->act->CountEventCategoryAssoc(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryAssocByUuid(
        $uuid
    ) {      
        return $this->act->CountEventCategoryAssocByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryAssocByEventId(
        $event_id
    ) {      
        return $this->act->CountEventCategoryAssocByEventId(
        $event_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryAssocByCategoryId(
        $category_id
    ) {      
        return $this->act->CountEventCategoryAssocByCategoryId(
        $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryAssocByEventIdByCategoryId(
        $event_id
        , $category_id
    ) {      
        return $this->act->CountEventCategoryAssocByEventIdByCategoryId(
        $event_id
        , $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseEventCategoryAssocListByFilter($filter_obj) {
        return $this->act->BrowseEventCategoryAssocListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetEventCategoryAssocByUuid($set_type, $obj) {
        return $this->act->SetEventCategoryAssocByUuid($set_type, $obj);
    }
               
    public function SetEventCategoryAssocByUuidFull($obj) {
        return $this->act->SetEventCategoryAssocByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelEventCategoryAssocByUuid(
        $uuid
    ) {         
        return $this->act->DelEventCategoryAssocByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetEventCategoryAssocList(
        ) {
            return $this->act->GetEventCategoryAssocList(
            );
        }
        
    public function GetEventCategoryAssoc(
    ) {
        foreach($this->act->GetEventCategoryAssocList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryAssocList(
    ) {
        return $this->CachedGetEventCategoryAssocList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetEventCategoryAssocList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryAssocList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventCategoryAssoc>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventCategoryAssocList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryAssocListByUuid(
        $uuid
        ) {
            return $this->act->GetEventCategoryAssocListByUuid(
                $uuid
            );
        }
        
    public function GetEventCategoryAssocByUuid(
        $uuid
    ) {
        foreach($this->act->GetEventCategoryAssocListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryAssocListByUuid(
        $uuid
    ) {
        return $this->CachedGetEventCategoryAssocListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetEventCategoryAssocListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryAssocListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventCategoryAssoc>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventCategoryAssocListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryAssocListByEventId(
        $event_id
        ) {
            return $this->act->GetEventCategoryAssocListByEventId(
                $event_id
            );
        }
        
    public function GetEventCategoryAssocByEventId(
        $event_id
    ) {
        foreach($this->act->GetEventCategoryAssocListByEventId(
        $event_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryAssocListByEventId(
        $event_id
    ) {
        return $this->CachedGetEventCategoryAssocListByEventId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $event_id
        );
    }
    */
        
    public function CachedGetEventCategoryAssocListByEventId(
        $overrideCache
        , $cacheHours
        , $event_id
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryAssocListByEventId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$event_id");
        $sb += "_";
        $sb += $event_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventCategoryAssoc>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventCategoryAssocListByEventId(
                $event_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryAssocListByCategoryId(
        $category_id
        ) {
            return $this->act->GetEventCategoryAssocListByCategoryId(
                $category_id
            );
        }
        
    public function GetEventCategoryAssocByCategoryId(
        $category_id
    ) {
        foreach($this->act->GetEventCategoryAssocListByCategoryId(
        $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryAssocListByCategoryId(
        $category_id
    ) {
        return $this->CachedGetEventCategoryAssocListByCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $category_id
        );
    }
    */
        
    public function CachedGetEventCategoryAssocListByCategoryId(
        $overrideCache
        , $cacheHours
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryAssocListByCategoryId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$category_id");
        $sb += "_";
        $sb += $category_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventCategoryAssoc>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventCategoryAssocListByCategoryId(
                $category_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryAssocListByEventIdByCategoryId(
        $event_id
        , $category_id
        ) {
            return $this->act->GetEventCategoryAssocListByEventIdByCategoryId(
                $event_id
                , $category_id
            );
        }
        
    public function GetEventCategoryAssocByEventIdByCategoryId(
        $event_id
        , $category_id
    ) {
        foreach($this->act->GetEventCategoryAssocListByEventIdByCategoryId(
        $event_id
        , $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryAssocListByEventIdByCategoryId(
        $event_id
        , $category_id
    ) {
        return $this->CachedGetEventCategoryAssocListByEventIdByCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $event_id
            , $category_id
        );
    }
    */
        
    public function CachedGetEventCategoryAssocListByEventIdByCategoryId(
        $overrideCache
        , $cacheHours
        , $event_id
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryAssocListByEventIdByCategoryId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$event_id");
        $sb += "_";
        $sb += $event_id;
        $sb += "_";
        $sb += strtolower("$category_id");
        $sb += "_";
        $sb += $category_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<EventCategoryAssoc>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetEventCategoryAssocListByEventIdByCategoryId(
                $event_id
                , $category_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountChannel(
    ) {      
        return $this->act->CountChannel(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountChannelByUuid(
        $uuid
    ) {      
        return $this->act->CountChannelByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountChannelByCode(
        $code
    ) {      
        return $this->act->CountChannelByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountChannelByName(
        $name
    ) {      
        return $this->act->CountChannelByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountChannelByOrgId(
        $org_id
    ) {      
        return $this->act->CountChannelByOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountChannelByTypeId(
        $type_id
    ) {      
        return $this->act->CountChannelByTypeId(
        $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountChannelByOrgIdByTypeId(
        $org_id
        , $type_id
    ) {      
        return $this->act->CountChannelByOrgIdByTypeId(
        $org_id
        , $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseChannelListByFilter($filter_obj) {
        return $this->act->BrowseChannelListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetChannelByUuid($set_type, $obj) {
        return $this->act->SetChannelByUuid($set_type, $obj);
    }
               
    public function SetChannelByUuidFull($obj) {
        return $this->act->SetChannelByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelChannelByUuid(
        $uuid
    ) {         
        return $this->act->DelChannelByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelChannelByCodeByOrgId(
        $code
        , $org_id
    ) {         
        return $this->act->DelChannelByCodeByOrgId(
        $code
        , $org_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelChannelByCodeByOrgIdByTypeId(
        $code
        , $org_id
        , $type_id
    ) {         
        return $this->act->DelChannelByCodeByOrgIdByTypeId(
        $code
        , $org_id
        , $type_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetChannelList(
        ) {
            return $this->act->GetChannelList(
            );
        }
        
    public function GetChannel(
    ) {
        foreach($this->act->GetChannelList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetChannelList(
    ) {
        return $this->CachedGetChannelList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetChannelList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetChannelList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Channel>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetChannelList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetChannelListByUuid(
        $uuid
        ) {
            return $this->act->GetChannelListByUuid(
                $uuid
            );
        }
        
    public function GetChannelByUuid(
        $uuid
    ) {
        foreach($this->act->GetChannelListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetChannelListByUuid(
        $uuid
    ) {
        return $this->CachedGetChannelListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetChannelListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetChannelListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Channel>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetChannelListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetChannelListByCode(
        $code
        ) {
            return $this->act->GetChannelListByCode(
                $code
            );
        }
        
    public function GetChannelByCode(
        $code
    ) {
        foreach($this->act->GetChannelListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetChannelListByCode(
        $code
    ) {
        return $this->CachedGetChannelListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetChannelListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetChannelListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Channel>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetChannelListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetChannelListByName(
        $name
        ) {
            return $this->act->GetChannelListByName(
                $name
            );
        }
        
    public function GetChannelByName(
        $name
    ) {
        foreach($this->act->GetChannelListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetChannelListByName(
        $name
    ) {
        return $this->CachedGetChannelListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetChannelListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetChannelListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Channel>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetChannelListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetChannelListByOrgId(
        $org_id
        ) {
            return $this->act->GetChannelListByOrgId(
                $org_id
            );
        }
        
    public function GetChannelByOrgId(
        $org_id
    ) {
        foreach($this->act->GetChannelListByOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetChannelListByOrgId(
        $org_id
    ) {
        return $this->CachedGetChannelListByOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetChannelListByOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetChannelListByOrgId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Channel>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetChannelListByOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetChannelListByTypeId(
        $type_id
        ) {
            return $this->act->GetChannelListByTypeId(
                $type_id
            );
        }
        
    public function GetChannelByTypeId(
        $type_id
    ) {
        foreach($this->act->GetChannelListByTypeId(
        $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetChannelListByTypeId(
        $type_id
    ) {
        return $this->CachedGetChannelListByTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $type_id
        );
    }
    */
        
    public function CachedGetChannelListByTypeId(
        $overrideCache
        , $cacheHours
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetChannelListByTypeId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$type_id");
        $sb += "_";
        $sb += $type_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Channel>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetChannelListByTypeId(
                $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetChannelListByOrgIdByTypeId(
        $org_id
        , $type_id
        ) {
            return $this->act->GetChannelListByOrgIdByTypeId(
                $org_id
                , $type_id
            );
        }
        
    public function GetChannelByOrgIdByTypeId(
        $org_id
        , $type_id
    ) {
        foreach($this->act->GetChannelListByOrgIdByTypeId(
        $org_id
        , $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetChannelListByOrgIdByTypeId(
        $org_id
        , $type_id
    ) {
        return $this->CachedGetChannelListByOrgIdByTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
            , $type_id
        );
    }
    */
        
    public function CachedGetChannelListByOrgIdByTypeId(
        $overrideCache
        , $cacheHours
        , $org_id
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetChannelListByOrgIdByTypeId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;
        $sb += "_";
        $sb += strtolower("$type_id");
        $sb += "_";
        $sb += $type_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Channel>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetChannelListByOrgIdByTypeId(
                $org_id
                , $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountChannelType(
    ) {      
        return $this->act->CountChannelType(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountChannelTypeByUuid(
        $uuid
    ) {      
        return $this->act->CountChannelTypeByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountChannelTypeByCode(
        $code
    ) {      
        return $this->act->CountChannelTypeByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountChannelTypeByName(
        $name
    ) {      
        return $this->act->CountChannelTypeByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseChannelTypeListByFilter($filter_obj) {
        return $this->act->BrowseChannelTypeListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetChannelTypeByUuid($set_type, $obj) {
        return $this->act->SetChannelTypeByUuid($set_type, $obj);
    }
               
    public function SetChannelTypeByUuidFull($obj) {
        return $this->act->SetChannelTypeByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelChannelTypeByUuid(
        $uuid
    ) {         
        return $this->act->DelChannelTypeByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetChannelTypeList(
        ) {
            return $this->act->GetChannelTypeList(
            );
        }
        
    public function GetChannelType(
    ) {
        foreach($this->act->GetChannelTypeList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetChannelTypeList(
    ) {
        return $this->CachedGetChannelTypeList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetChannelTypeList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetChannelTypeList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ChannelType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetChannelTypeList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetChannelTypeListByUuid(
        $uuid
        ) {
            return $this->act->GetChannelTypeListByUuid(
                $uuid
            );
        }
        
    public function GetChannelTypeByUuid(
        $uuid
    ) {
        foreach($this->act->GetChannelTypeListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetChannelTypeListByUuid(
        $uuid
    ) {
        return $this->CachedGetChannelTypeListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetChannelTypeListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetChannelTypeListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ChannelType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetChannelTypeListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetChannelTypeListByCode(
        $code
        ) {
            return $this->act->GetChannelTypeListByCode(
                $code
            );
        }
        
    public function GetChannelTypeByCode(
        $code
    ) {
        foreach($this->act->GetChannelTypeListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetChannelTypeListByCode(
        $code
    ) {
        return $this->CachedGetChannelTypeListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetChannelTypeListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetChannelTypeListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ChannelType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetChannelTypeListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetChannelTypeListByName(
        $name
        ) {
            return $this->act->GetChannelTypeListByName(
                $name
            );
        }
        
    public function GetChannelTypeByName(
        $name
    ) {
        foreach($this->act->GetChannelTypeListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetChannelTypeListByName(
        $name
    ) {
        return $this->CachedGetChannelTypeListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetChannelTypeListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetChannelTypeListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ChannelType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetChannelTypeListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountQuestion(
    ) {      
        return $this->act->CountQuestion(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountQuestionByUuid(
        $uuid
    ) {      
        return $this->act->CountQuestionByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountQuestionByCode(
        $code
    ) {      
        return $this->act->CountQuestionByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountQuestionByName(
        $name
    ) {      
        return $this->act->CountQuestionByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountQuestionByChannelId(
        $channel_id
    ) {      
        return $this->act->CountQuestionByChannelId(
        $channel_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountQuestionByOrgId(
        $org_id
    ) {      
        return $this->act->CountQuestionByOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountQuestionByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {      
        return $this->act->CountQuestionByChannelIdByOrgId(
        $channel_id
        , $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountQuestionByChannelIdByCode(
        $channel_id
        , $code
    ) {      
        return $this->act->CountQuestionByChannelIdByCode(
        $channel_id
        , $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseQuestionListByFilter($filter_obj) {
        return $this->act->BrowseQuestionListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetQuestionByUuid($set_type, $obj) {
        return $this->act->SetQuestionByUuid($set_type, $obj);
    }
               
    public function SetQuestionByUuidFull($obj) {
        return $this->act->SetQuestionByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetQuestionByChannelIdByCode($set_type, $obj) {
        return $this->act->SetQuestionByChannelIdByCode($set_type, $obj);
    }
               
    public function SetQuestionByChannelIdByCodeFull($obj) {
        return $this->act->SetQuestionByChannelIdByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelQuestionByUuid(
        $uuid
    ) {         
        return $this->act->DelQuestionByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelQuestionByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {         
        return $this->act->DelQuestionByChannelIdByOrgId(
        $channel_id
        , $org_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetQuestionList(
        ) {
            return $this->act->GetQuestionList(
            );
        }
        
    public function GetQuestion(
    ) {
        foreach($this->act->GetQuestionList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetQuestionList(
    ) {
        return $this->CachedGetQuestionList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetQuestionList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetQuestionList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Question>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetQuestionList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetQuestionListByUuid(
        $uuid
        ) {
            return $this->act->GetQuestionListByUuid(
                $uuid
            );
        }
        
    public function GetQuestionByUuid(
        $uuid
    ) {
        foreach($this->act->GetQuestionListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetQuestionListByUuid(
        $uuid
    ) {
        return $this->CachedGetQuestionListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetQuestionListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetQuestionListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Question>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetQuestionListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetQuestionListByCode(
        $code
        ) {
            return $this->act->GetQuestionListByCode(
                $code
            );
        }
        
    public function GetQuestionByCode(
        $code
    ) {
        foreach($this->act->GetQuestionListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetQuestionListByCode(
        $code
    ) {
        return $this->CachedGetQuestionListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetQuestionListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetQuestionListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Question>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetQuestionListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetQuestionListByName(
        $name
        ) {
            return $this->act->GetQuestionListByName(
                $name
            );
        }
        
    public function GetQuestionByName(
        $name
    ) {
        foreach($this->act->GetQuestionListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetQuestionListByName(
        $name
    ) {
        return $this->CachedGetQuestionListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetQuestionListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetQuestionListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Question>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetQuestionListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetQuestionListByType(
        $type
        ) {
            return $this->act->GetQuestionListByType(
                $type
            );
        }
        
    public function GetQuestionByType(
        $type
    ) {
        foreach($this->act->GetQuestionListByType(
        $type
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetQuestionListByType(
        $type
    ) {
        return $this->CachedGetQuestionListByType(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $type
        );
    }
    */
        
    public function CachedGetQuestionListByType(
        $overrideCache
        , $cacheHours
        , $type
    ) {

        $objs = array();

        $method_name = "CachedGetQuestionListByType";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$type");
        $sb += "_";
        $sb += $type;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Question>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetQuestionListByType(
                $type
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetQuestionListByChannelId(
        $channel_id
        ) {
            return $this->act->GetQuestionListByChannelId(
                $channel_id
            );
        }
        
    public function GetQuestionByChannelId(
        $channel_id
    ) {
        foreach($this->act->GetQuestionListByChannelId(
        $channel_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetQuestionListByChannelId(
        $channel_id
    ) {
        return $this->CachedGetQuestionListByChannelId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
        );
    }
    */
        
    public function CachedGetQuestionListByChannelId(
        $overrideCache
        , $cacheHours
        , $channel_id
    ) {

        $objs = array();

        $method_name = "CachedGetQuestionListByChannelId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$channel_id");
        $sb += "_";
        $sb += $channel_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Question>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetQuestionListByChannelId(
                $channel_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetQuestionListByOrgId(
        $org_id
        ) {
            return $this->act->GetQuestionListByOrgId(
                $org_id
            );
        }
        
    public function GetQuestionByOrgId(
        $org_id
    ) {
        foreach($this->act->GetQuestionListByOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetQuestionListByOrgId(
        $org_id
    ) {
        return $this->CachedGetQuestionListByOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetQuestionListByOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetQuestionListByOrgId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Question>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetQuestionListByOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetQuestionListByChannelIdByOrgId(
        $channel_id
        , $org_id
        ) {
            return $this->act->GetQuestionListByChannelIdByOrgId(
                $channel_id
                , $org_id
            );
        }
        
    public function GetQuestionByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {
        foreach($this->act->GetQuestionListByChannelIdByOrgId(
        $channel_id
        , $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetQuestionListByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {
        return $this->CachedGetQuestionListByChannelIdByOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
            , $org_id
        );
    }
    */
        
    public function CachedGetQuestionListByChannelIdByOrgId(
        $overrideCache
        , $cacheHours
        , $channel_id
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetQuestionListByChannelIdByOrgId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$channel_id");
        $sb += "_";
        $sb += $channel_id;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Question>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetQuestionListByChannelIdByOrgId(
                $channel_id
                , $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetQuestionListByChannelIdByCode(
        $channel_id
        , $code
        ) {
            return $this->act->GetQuestionListByChannelIdByCode(
                $channel_id
                , $code
            );
        }
        
    public function GetQuestionByChannelIdByCode(
        $channel_id
        , $code
    ) {
        foreach($this->act->GetQuestionListByChannelIdByCode(
        $channel_id
        , $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetQuestionListByChannelIdByCode(
        $channel_id
        , $code
    ) {
        return $this->CachedGetQuestionListByChannelIdByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
            , $code
        );
    }
    */
        
    public function CachedGetQuestionListByChannelIdByCode(
        $overrideCache
        , $cacheHours
        , $channel_id
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetQuestionListByChannelIdByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$channel_id");
        $sb += "_";
        $sb += $channel_id;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Question>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetQuestionListByChannelIdByCode(
                $channel_id
                , $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountProfileOffer(
    ) {      
        return $this->act->CountProfileOffer(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileOfferByUuid(
        $uuid
    ) {      
        return $this->act->CountProfileOfferByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileOfferByProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileOfferByProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileOfferListByFilter($filter_obj) {
        return $this->act->BrowseProfileOfferListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileOfferByUuid($set_type, $obj) {
        return $this->act->SetProfileOfferByUuid($set_type, $obj);
    }
               
    public function SetProfileOfferByUuidFull($obj) {
        return $this->act->SetProfileOfferByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileOfferByUuid(
        $uuid
    ) {         
        return $this->act->DelProfileOfferByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileOfferByProfileId(
        $profile_id
    ) {         
        return $this->act->DelProfileOfferByProfileId(
        $profile_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileOfferList(
        ) {
            return $this->act->GetProfileOfferList(
            );
        }
        
    public function GetProfileOffer(
    ) {
        foreach($this->act->GetProfileOfferList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileOfferList(
    ) {
        return $this->CachedGetProfileOfferList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetProfileOfferList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetProfileOfferList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileOffer>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileOfferList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileOfferListByUuid(
        $uuid
        ) {
            return $this->act->GetProfileOfferListByUuid(
                $uuid
            );
        }
        
    public function GetProfileOfferByUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileOfferListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileOfferListByUuid(
        $uuid
    ) {
        return $this->CachedGetProfileOfferListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileOfferListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileOfferListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileOffer>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileOfferListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileOfferListByProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileOfferListByProfileId(
                $profile_id
            );
        }
        
    public function GetProfileOfferByProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileOfferListByProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileOfferListByProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileOfferListByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileOfferListByProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileOfferListByProfileId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileOffer>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileOfferListByProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountProfileApp(
    ) {      
        return $this->act->CountProfileApp(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileAppByUuid(
        $uuid
    ) {      
        return $this->act->CountProfileAppByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileAppByProfileIdByAppId(
        $profile_id
        , $app_id
    ) {      
        return $this->act->CountProfileAppByProfileIdByAppId(
        $profile_id
        , $app_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileAppListByFilter($filter_obj) {
        return $this->act->BrowseProfileAppListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileAppByUuid($set_type, $obj) {
        return $this->act->SetProfileAppByUuid($set_type, $obj);
    }
               
    public function SetProfileAppByUuidFull($obj) {
        return $this->act->SetProfileAppByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileAppByProfileIdByAppId($set_type, $obj) {
        return $this->act->SetProfileAppByProfileIdByAppId($set_type, $obj);
    }
               
    public function SetProfileAppByProfileIdByAppIdFull($obj) {
        return $this->act->SetProfileAppByProfileIdByAppId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileAppByUuid(
        $uuid
    ) {         
        return $this->act->DelProfileAppByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileAppByProfileIdByAppId(
        $profile_id
        , $app_id
    ) {         
        return $this->act->DelProfileAppByProfileIdByAppId(
        $profile_id
        , $app_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileAppList(
        ) {
            return $this->act->GetProfileAppList(
            );
        }
        
    public function GetProfileApp(
    ) {
        foreach($this->act->GetProfileAppList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAppList(
    ) {
        return $this->CachedGetProfileAppList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetProfileAppList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAppList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileApp>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileAppList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAppListByUuid(
        $uuid
        ) {
            return $this->act->GetProfileAppListByUuid(
                $uuid
            );
        }
        
    public function GetProfileAppByUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileAppListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAppListByUuid(
        $uuid
    ) {
        return $this->CachedGetProfileAppListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileAppListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAppListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileApp>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileAppListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAppListByAppId(
        $app_id
        ) {
            return $this->act->GetProfileAppListByAppId(
                $app_id
            );
        }
        
    public function GetProfileAppByAppId(
        $app_id
    ) {
        foreach($this->act->GetProfileAppListByAppId(
        $app_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAppListByAppId(
        $app_id
    ) {
        return $this->CachedGetProfileAppListByAppId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $app_id
        );
    }
    */
        
    public function CachedGetProfileAppListByAppId(
        $overrideCache
        , $cacheHours
        , $app_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAppListByAppId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$app_id");
        $sb += "_";
        $sb += $app_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileApp>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileAppListByAppId(
                $app_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAppListByProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileAppListByProfileId(
                $profile_id
            );
        }
        
    public function GetProfileAppByProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileAppListByProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAppListByProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileAppListByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileAppListByProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAppListByProfileId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileApp>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileAppListByProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAppListByProfileIdByAppId(
        $profile_id
        , $app_id
        ) {
            return $this->act->GetProfileAppListByProfileIdByAppId(
                $profile_id
                , $app_id
            );
        }
        
    public function GetProfileAppByProfileIdByAppId(
        $profile_id
        , $app_id
    ) {
        foreach($this->act->GetProfileAppListByProfileIdByAppId(
        $profile_id
        , $app_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAppListByProfileIdByAppId(
        $profile_id
        , $app_id
    ) {
        return $this->CachedGetProfileAppListByProfileIdByAppId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $app_id
        );
    }
    */
        
    public function CachedGetProfileAppListByProfileIdByAppId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $app_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAppListByProfileIdByAppId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$app_id");
        $sb += "_";
        $sb += $app_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileApp>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileAppListByProfileIdByAppId(
                $profile_id
                , $app_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountProfileOrg(
    ) {      
        return $this->act->CountProfileOrg(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileOrgByUuid(
        $uuid
    ) {      
        return $this->act->CountProfileOrgByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileOrgByOrgId(
        $org_id
    ) {      
        return $this->act->CountProfileOrgByOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileOrgByProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileOrgByProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileOrgListByFilter($filter_obj) {
        return $this->act->BrowseProfileOrgListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileOrgByUuid($set_type, $obj) {
        return $this->act->SetProfileOrgByUuid($set_type, $obj);
    }
               
    public function SetProfileOrgByUuidFull($obj) {
        return $this->act->SetProfileOrgByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileOrgByUuid(
        $uuid
    ) {         
        return $this->act->DelProfileOrgByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileOrgList(
        ) {
            return $this->act->GetProfileOrgList(
            );
        }
        
    public function GetProfileOrg(
    ) {
        foreach($this->act->GetProfileOrgList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileOrgList(
    ) {
        return $this->CachedGetProfileOrgList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetProfileOrgList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetProfileOrgList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileOrg>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileOrgList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileOrgListByUuid(
        $uuid
        ) {
            return $this->act->GetProfileOrgListByUuid(
                $uuid
            );
        }
        
    public function GetProfileOrgByUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileOrgListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileOrgListByUuid(
        $uuid
    ) {
        return $this->CachedGetProfileOrgListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileOrgListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileOrgListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileOrg>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileOrgListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileOrgListByOrgId(
        $org_id
        ) {
            return $this->act->GetProfileOrgListByOrgId(
                $org_id
            );
        }
        
    public function GetProfileOrgByOrgId(
        $org_id
    ) {
        foreach($this->act->GetProfileOrgListByOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileOrgListByOrgId(
        $org_id
    ) {
        return $this->CachedGetProfileOrgListByOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetProfileOrgListByOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileOrgListByOrgId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileOrg>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileOrgListByOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileOrgListByProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileOrgListByProfileId(
                $profile_id
            );
        }
        
    public function GetProfileOrgByProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileOrgListByProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileOrgListByProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileOrgListByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileOrgListByProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileOrgListByProfileId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileOrg>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileOrgListByProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountProfileQuestion(
    ) {      
        return $this->act->CountProfileQuestion(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileQuestionByUuid(
        $uuid
    ) {      
        return $this->act->CountProfileQuestionByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileQuestionByChannelId(
        $channel_id
    ) {      
        return $this->act->CountProfileQuestionByChannelId(
        $channel_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileQuestionByOrgId(
        $org_id
    ) {      
        return $this->act->CountProfileQuestionByOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileQuestionByProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileQuestionByProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileQuestionByQuestionId(
        $question_id
    ) {      
        return $this->act->CountProfileQuestionByQuestionId(
        $question_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileQuestionByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {      
        return $this->act->CountProfileQuestionByChannelIdByOrgId(
        $channel_id
        , $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileQuestionByChannelIdByProfileId(
        $channel_id
        , $profile_id
    ) {      
        return $this->act->CountProfileQuestionByChannelIdByProfileId(
        $channel_id
        , $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileQuestionByQuestionIdByProfileId(
        $question_id
        , $profile_id
    ) {      
        return $this->act->CountProfileQuestionByQuestionIdByProfileId(
        $question_id
        , $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileQuestionListByFilter($filter_obj) {
        return $this->act->BrowseProfileQuestionListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileQuestionByUuid($set_type, $obj) {
        return $this->act->SetProfileQuestionByUuid($set_type, $obj);
    }
               
    public function SetProfileQuestionByUuidFull($obj) {
        return $this->act->SetProfileQuestionByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileQuestionByChannelIdByProfileId($set_type, $obj) {
        return $this->act->SetProfileQuestionByChannelIdByProfileId($set_type, $obj);
    }
               
    public function SetProfileQuestionByChannelIdByProfileIdFull($obj) {
        return $this->act->SetProfileQuestionByChannelIdByProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileQuestionByQuestionIdByProfileId($set_type, $obj) {
        return $this->act->SetProfileQuestionByQuestionIdByProfileId($set_type, $obj);
    }
               
    public function SetProfileQuestionByQuestionIdByProfileIdFull($obj) {
        return $this->act->SetProfileQuestionByQuestionIdByProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileQuestionByChannelIdByQuestionIdByProfileId($set_type, $obj) {
        return $this->act->SetProfileQuestionByChannelIdByQuestionIdByProfileId($set_type, $obj);
    }
               
    public function SetProfileQuestionByChannelIdByQuestionIdByProfileIdFull($obj) {
        return $this->act->SetProfileQuestionByChannelIdByQuestionIdByProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileQuestionByUuid(
        $uuid
    ) {         
        return $this->act->DelProfileQuestionByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileQuestionByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {         
        return $this->act->DelProfileQuestionByChannelIdByOrgId(
        $channel_id
        , $org_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileQuestionList(
        ) {
            return $this->act->GetProfileQuestionList(
            );
        }
        
    public function GetProfileQuestion(
    ) {
        foreach($this->act->GetProfileQuestionList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileQuestionList(
    ) {
        return $this->CachedGetProfileQuestionList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetProfileQuestionList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetProfileQuestionList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileQuestion>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileQuestionList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileQuestionListByUuid(
        $uuid
        ) {
            return $this->act->GetProfileQuestionListByUuid(
                $uuid
            );
        }
        
    public function GetProfileQuestionByUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileQuestionListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileQuestionListByUuid(
        $uuid
    ) {
        return $this->CachedGetProfileQuestionListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileQuestionListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileQuestionListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileQuestion>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileQuestionListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileQuestionListByChannelId(
        $channel_id
        ) {
            return $this->act->GetProfileQuestionListByChannelId(
                $channel_id
            );
        }
        
    public function GetProfileQuestionByChannelId(
        $channel_id
    ) {
        foreach($this->act->GetProfileQuestionListByChannelId(
        $channel_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileQuestionListByChannelId(
        $channel_id
    ) {
        return $this->CachedGetProfileQuestionListByChannelId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
        );
    }
    */
        
    public function CachedGetProfileQuestionListByChannelId(
        $overrideCache
        , $cacheHours
        , $channel_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileQuestionListByChannelId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$channel_id");
        $sb += "_";
        $sb += $channel_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileQuestion>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileQuestionListByChannelId(
                $channel_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileQuestionListByOrgId(
        $org_id
        ) {
            return $this->act->GetProfileQuestionListByOrgId(
                $org_id
            );
        }
        
    public function GetProfileQuestionByOrgId(
        $org_id
    ) {
        foreach($this->act->GetProfileQuestionListByOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileQuestionListByOrgId(
        $org_id
    ) {
        return $this->CachedGetProfileQuestionListByOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetProfileQuestionListByOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileQuestionListByOrgId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileQuestion>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileQuestionListByOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileQuestionListByProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileQuestionListByProfileId(
                $profile_id
            );
        }
        
    public function GetProfileQuestionByProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileQuestionListByProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileQuestionListByProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileQuestionListByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileQuestionListByProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileQuestionListByProfileId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileQuestion>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileQuestionListByProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileQuestionListByQuestionId(
        $question_id
        ) {
            return $this->act->GetProfileQuestionListByQuestionId(
                $question_id
            );
        }
        
    public function GetProfileQuestionByQuestionId(
        $question_id
    ) {
        foreach($this->act->GetProfileQuestionListByQuestionId(
        $question_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileQuestionListByQuestionId(
        $question_id
    ) {
        return $this->CachedGetProfileQuestionListByQuestionId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $question_id
        );
    }
    */
        
    public function CachedGetProfileQuestionListByQuestionId(
        $overrideCache
        , $cacheHours
        , $question_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileQuestionListByQuestionId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$question_id");
        $sb += "_";
        $sb += $question_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileQuestion>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileQuestionListByQuestionId(
                $question_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileQuestionListByChannelIdByOrgId(
        $channel_id
        , $org_id
        ) {
            return $this->act->GetProfileQuestionListByChannelIdByOrgId(
                $channel_id
                , $org_id
            );
        }
        
    public function GetProfileQuestionByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {
        foreach($this->act->GetProfileQuestionListByChannelIdByOrgId(
        $channel_id
        , $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileQuestionListByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {
        return $this->CachedGetProfileQuestionListByChannelIdByOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
            , $org_id
        );
    }
    */
        
    public function CachedGetProfileQuestionListByChannelIdByOrgId(
        $overrideCache
        , $cacheHours
        , $channel_id
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileQuestionListByChannelIdByOrgId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$channel_id");
        $sb += "_";
        $sb += $channel_id;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileQuestion>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileQuestionListByChannelIdByOrgId(
                $channel_id
                , $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileQuestionListByChannelIdByProfileId(
        $channel_id
        , $profile_id
        ) {
            return $this->act->GetProfileQuestionListByChannelIdByProfileId(
                $channel_id
                , $profile_id
            );
        }
        
    public function GetProfileQuestionByChannelIdByProfileId(
        $channel_id
        , $profile_id
    ) {
        foreach($this->act->GetProfileQuestionListByChannelIdByProfileId(
        $channel_id
        , $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileQuestionListByChannelIdByProfileId(
        $channel_id
        , $profile_id
    ) {
        return $this->CachedGetProfileQuestionListByChannelIdByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileQuestionListByChannelIdByProfileId(
        $overrideCache
        , $cacheHours
        , $channel_id
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileQuestionListByChannelIdByProfileId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$channel_id");
        $sb += "_";
        $sb += $channel_id;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileQuestion>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileQuestionListByChannelIdByProfileId(
                $channel_id
                , $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileQuestionListByQuestionIdByProfileId(
        $question_id
        , $profile_id
        ) {
            return $this->act->GetProfileQuestionListByQuestionIdByProfileId(
                $question_id
                , $profile_id
            );
        }
        
    public function GetProfileQuestionByQuestionIdByProfileId(
        $question_id
        , $profile_id
    ) {
        foreach($this->act->GetProfileQuestionListByQuestionIdByProfileId(
        $question_id
        , $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileQuestionListByQuestionIdByProfileId(
        $question_id
        , $profile_id
    ) {
        return $this->CachedGetProfileQuestionListByQuestionIdByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $question_id
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileQuestionListByQuestionIdByProfileId(
        $overrideCache
        , $cacheHours
        , $question_id
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileQuestionListByQuestionIdByProfileId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$question_id");
        $sb += "_";
        $sb += $question_id;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileQuestion>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileQuestionListByQuestionIdByProfileId(
                $question_id
                , $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountProfileChannel(
    ) {      
        return $this->act->CountProfileChannel(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileChannelByUuid(
        $uuid
    ) {      
        return $this->act->CountProfileChannelByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileChannelByChannelId(
        $channel_id
    ) {      
        return $this->act->CountProfileChannelByChannelId(
        $channel_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileChannelByProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileChannelByProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileChannelByChannelIdByProfileId(
        $channel_id
        , $profile_id
    ) {      
        return $this->act->CountProfileChannelByChannelIdByProfileId(
        $channel_id
        , $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileChannelListByFilter($filter_obj) {
        return $this->act->BrowseProfileChannelListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileChannelByUuid($set_type, $obj) {
        return $this->act->SetProfileChannelByUuid($set_type, $obj);
    }
               
    public function SetProfileChannelByUuidFull($obj) {
        return $this->act->SetProfileChannelByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileChannelByChannelIdByProfileId($set_type, $obj) {
        return $this->act->SetProfileChannelByChannelIdByProfileId($set_type, $obj);
    }
               
    public function SetProfileChannelByChannelIdByProfileIdFull($obj) {
        return $this->act->SetProfileChannelByChannelIdByProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileChannelByUuid(
        $uuid
    ) {         
        return $this->act->DelProfileChannelByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileChannelByChannelIdByProfileId(
        $channel_id
        , $profile_id
    ) {         
        return $this->act->DelProfileChannelByChannelIdByProfileId(
        $channel_id
        , $profile_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileChannelList(
        ) {
            return $this->act->GetProfileChannelList(
            );
        }
        
    public function GetProfileChannel(
    ) {
        foreach($this->act->GetProfileChannelList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileChannelList(
    ) {
        return $this->CachedGetProfileChannelList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetProfileChannelList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetProfileChannelList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileChannel>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileChannelList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileChannelListByUuid(
        $uuid
        ) {
            return $this->act->GetProfileChannelListByUuid(
                $uuid
            );
        }
        
    public function GetProfileChannelByUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileChannelListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileChannelListByUuid(
        $uuid
    ) {
        return $this->CachedGetProfileChannelListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileChannelListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileChannelListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileChannel>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileChannelListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileChannelListByChannelId(
        $channel_id
        ) {
            return $this->act->GetProfileChannelListByChannelId(
                $channel_id
            );
        }
        
    public function GetProfileChannelByChannelId(
        $channel_id
    ) {
        foreach($this->act->GetProfileChannelListByChannelId(
        $channel_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileChannelListByChannelId(
        $channel_id
    ) {
        return $this->CachedGetProfileChannelListByChannelId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
        );
    }
    */
        
    public function CachedGetProfileChannelListByChannelId(
        $overrideCache
        , $cacheHours
        , $channel_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileChannelListByChannelId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$channel_id");
        $sb += "_";
        $sb += $channel_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileChannel>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileChannelListByChannelId(
                $channel_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileChannelListByProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileChannelListByProfileId(
                $profile_id
            );
        }
        
    public function GetProfileChannelByProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileChannelListByProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileChannelListByProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileChannelListByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileChannelListByProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileChannelListByProfileId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileChannel>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileChannelListByProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileChannelListByChannelIdByProfileId(
        $channel_id
        , $profile_id
        ) {
            return $this->act->GetProfileChannelListByChannelIdByProfileId(
                $channel_id
                , $profile_id
            );
        }
        
    public function GetProfileChannelByChannelIdByProfileId(
        $channel_id
        , $profile_id
    ) {
        foreach($this->act->GetProfileChannelListByChannelIdByProfileId(
        $channel_id
        , $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileChannelListByChannelIdByProfileId(
        $channel_id
        , $profile_id
    ) {
        return $this->CachedGetProfileChannelListByChannelIdByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileChannelListByChannelIdByProfileId(
        $overrideCache
        , $cacheHours
        , $channel_id
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileChannelListByChannelIdByProfileId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$channel_id");
        $sb += "_";
        $sb += $channel_id;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileChannel>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileChannelListByChannelIdByProfileId(
                $channel_id
                , $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountOrgSite(
    ) {      
        return $this->act->CountOrgSite(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOrgSiteByUuid(
        $uuid
    ) {      
        return $this->act->CountOrgSiteByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOrgSiteByOrgId(
        $org_id
    ) {      
        return $this->act->CountOrgSiteByOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOrgSiteBySiteId(
        $site_id
    ) {      
        return $this->act->CountOrgSiteBySiteId(
        $site_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOrgSiteByOrgIdBySiteId(
        $org_id
        , $site_id
    ) {      
        return $this->act->CountOrgSiteByOrgIdBySiteId(
        $org_id
        , $site_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseOrgSiteListByFilter($filter_obj) {
        return $this->act->BrowseOrgSiteListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOrgSiteByUuid($set_type, $obj) {
        return $this->act->SetOrgSiteByUuid($set_type, $obj);
    }
               
    public function SetOrgSiteByUuidFull($obj) {
        return $this->act->SetOrgSiteByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOrgSiteByOrgIdBySiteId($set_type, $obj) {
        return $this->act->SetOrgSiteByOrgIdBySiteId($set_type, $obj);
    }
               
    public function SetOrgSiteByOrgIdBySiteIdFull($obj) {
        return $this->act->SetOrgSiteByOrgIdBySiteId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelOrgSiteByUuid(
        $uuid
    ) {         
        return $this->act->DelOrgSiteByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelOrgSiteByOrgIdBySiteId(
        $org_id
        , $site_id
    ) {         
        return $this->act->DelOrgSiteByOrgIdBySiteId(
        $org_id
        , $site_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetOrgSiteList(
        ) {
            return $this->act->GetOrgSiteList(
            );
        }
        
    public function GetOrgSite(
    ) {
        foreach($this->act->GetOrgSiteList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOrgSiteList(
    ) {
        return $this->CachedGetOrgSiteList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetOrgSiteList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetOrgSiteList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OrgSite>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOrgSiteList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOrgSiteListByUuid(
        $uuid
        ) {
            return $this->act->GetOrgSiteListByUuid(
                $uuid
            );
        }
        
    public function GetOrgSiteByUuid(
        $uuid
    ) {
        foreach($this->act->GetOrgSiteListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOrgSiteListByUuid(
        $uuid
    ) {
        return $this->CachedGetOrgSiteListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetOrgSiteListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetOrgSiteListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OrgSite>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOrgSiteListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOrgSiteListByOrgId(
        $org_id
        ) {
            return $this->act->GetOrgSiteListByOrgId(
                $org_id
            );
        }
        
    public function GetOrgSiteByOrgId(
        $org_id
    ) {
        foreach($this->act->GetOrgSiteListByOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOrgSiteListByOrgId(
        $org_id
    ) {
        return $this->CachedGetOrgSiteListByOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetOrgSiteListByOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetOrgSiteListByOrgId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OrgSite>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOrgSiteListByOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOrgSiteListBySiteId(
        $site_id
        ) {
            return $this->act->GetOrgSiteListBySiteId(
                $site_id
            );
        }
        
    public function GetOrgSiteBySiteId(
        $site_id
    ) {
        foreach($this->act->GetOrgSiteListBySiteId(
        $site_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOrgSiteListBySiteId(
        $site_id
    ) {
        return $this->CachedGetOrgSiteListBySiteId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $site_id
        );
    }
    */
        
    public function CachedGetOrgSiteListBySiteId(
        $overrideCache
        , $cacheHours
        , $site_id
    ) {

        $objs = array();

        $method_name = "CachedGetOrgSiteListBySiteId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$site_id");
        $sb += "_";
        $sb += $site_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OrgSite>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOrgSiteListBySiteId(
                $site_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOrgSiteListByOrgIdBySiteId(
        $org_id
        , $site_id
        ) {
            return $this->act->GetOrgSiteListByOrgIdBySiteId(
                $org_id
                , $site_id
            );
        }
        
    public function GetOrgSiteByOrgIdBySiteId(
        $org_id
        , $site_id
    ) {
        foreach($this->act->GetOrgSiteListByOrgIdBySiteId(
        $org_id
        , $site_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOrgSiteListByOrgIdBySiteId(
        $org_id
        , $site_id
    ) {
        return $this->CachedGetOrgSiteListByOrgIdBySiteId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
            , $site_id
        );
    }
    */
        
    public function CachedGetOrgSiteListByOrgIdBySiteId(
        $overrideCache
        , $cacheHours
        , $org_id
        , $site_id
    ) {

        $objs = array();

        $method_name = "CachedGetOrgSiteListByOrgIdBySiteId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;
        $sb += "_";
        $sb += strtolower("$site_id");
        $sb += "_";
        $sb += $site_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<OrgSite>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetOrgSiteListByOrgIdBySiteId(
                $org_id
                , $site_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountSiteApp(
    ) {      
        return $this->act->CountSiteApp(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountSiteAppByUuid(
        $uuid
    ) {      
        return $this->act->CountSiteAppByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountSiteAppByAppId(
        $app_id
    ) {      
        return $this->act->CountSiteAppByAppId(
        $app_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountSiteAppBySiteId(
        $site_id
    ) {      
        return $this->act->CountSiteAppBySiteId(
        $site_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountSiteAppByAppIdBySiteId(
        $app_id
        , $site_id
    ) {      
        return $this->act->CountSiteAppByAppIdBySiteId(
        $app_id
        , $site_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseSiteAppListByFilter($filter_obj) {
        return $this->act->BrowseSiteAppListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetSiteAppByUuid($set_type, $obj) {
        return $this->act->SetSiteAppByUuid($set_type, $obj);
    }
               
    public function SetSiteAppByUuidFull($obj) {
        return $this->act->SetSiteAppByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetSiteAppByAppIdBySiteId($set_type, $obj) {
        return $this->act->SetSiteAppByAppIdBySiteId($set_type, $obj);
    }
               
    public function SetSiteAppByAppIdBySiteIdFull($obj) {
        return $this->act->SetSiteAppByAppIdBySiteId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelSiteAppByUuid(
        $uuid
    ) {         
        return $this->act->DelSiteAppByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelSiteAppByAppIdBySiteId(
        $app_id
        , $site_id
    ) {         
        return $this->act->DelSiteAppByAppIdBySiteId(
        $app_id
        , $site_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetSiteAppList(
        ) {
            return $this->act->GetSiteAppList(
            );
        }
        
    public function GetSiteApp(
    ) {
        foreach($this->act->GetSiteAppList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteAppList(
    ) {
        return $this->CachedGetSiteAppList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetSiteAppList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetSiteAppList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<SiteApp>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetSiteAppList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetSiteAppListByUuid(
        $uuid
        ) {
            return $this->act->GetSiteAppListByUuid(
                $uuid
            );
        }
        
    public function GetSiteAppByUuid(
        $uuid
    ) {
        foreach($this->act->GetSiteAppListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteAppListByUuid(
        $uuid
    ) {
        return $this->CachedGetSiteAppListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetSiteAppListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetSiteAppListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<SiteApp>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetSiteAppListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetSiteAppListByAppId(
        $app_id
        ) {
            return $this->act->GetSiteAppListByAppId(
                $app_id
            );
        }
        
    public function GetSiteAppByAppId(
        $app_id
    ) {
        foreach($this->act->GetSiteAppListByAppId(
        $app_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteAppListByAppId(
        $app_id
    ) {
        return $this->CachedGetSiteAppListByAppId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $app_id
        );
    }
    */
        
    public function CachedGetSiteAppListByAppId(
        $overrideCache
        , $cacheHours
        , $app_id
    ) {

        $objs = array();

        $method_name = "CachedGetSiteAppListByAppId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$app_id");
        $sb += "_";
        $sb += $app_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<SiteApp>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetSiteAppListByAppId(
                $app_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetSiteAppListBySiteId(
        $site_id
        ) {
            return $this->act->GetSiteAppListBySiteId(
                $site_id
            );
        }
        
    public function GetSiteAppBySiteId(
        $site_id
    ) {
        foreach($this->act->GetSiteAppListBySiteId(
        $site_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteAppListBySiteId(
        $site_id
    ) {
        return $this->CachedGetSiteAppListBySiteId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $site_id
        );
    }
    */
        
    public function CachedGetSiteAppListBySiteId(
        $overrideCache
        , $cacheHours
        , $site_id
    ) {

        $objs = array();

        $method_name = "CachedGetSiteAppListBySiteId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$site_id");
        $sb += "_";
        $sb += $site_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<SiteApp>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetSiteAppListBySiteId(
                $site_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetSiteAppListByAppIdBySiteId(
        $app_id
        , $site_id
        ) {
            return $this->act->GetSiteAppListByAppIdBySiteId(
                $app_id
                , $site_id
            );
        }
        
    public function GetSiteAppByAppIdBySiteId(
        $app_id
        , $site_id
    ) {
        foreach($this->act->GetSiteAppListByAppIdBySiteId(
        $app_id
        , $site_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteAppListByAppIdBySiteId(
        $app_id
        , $site_id
    ) {
        return $this->CachedGetSiteAppListByAppIdBySiteId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $app_id
            , $site_id
        );
    }
    */
        
    public function CachedGetSiteAppListByAppIdBySiteId(
        $overrideCache
        , $cacheHours
        , $app_id
        , $site_id
    ) {

        $objs = array();

        $method_name = "CachedGetSiteAppListByAppIdBySiteId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$app_id");
        $sb += "_";
        $sb += $app_id;
        $sb += "_";
        $sb += strtolower("$site_id");
        $sb += "_";
        $sb += $site_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<SiteApp>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetSiteAppListByAppIdBySiteId(
                $app_id
                , $site_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountPhoto(
    ) {      
        return $this->act->CountPhoto(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountPhotoByUuid(
        $uuid
    ) {      
        return $this->act->CountPhotoByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountPhotoByExternalId(
        $external_id
    ) {      
        return $this->act->CountPhotoByExternalId(
        $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountPhotoByUrl(
        $url
    ) {      
        return $this->act->CountPhotoByUrl(
        $url
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountPhotoByUrlByExternalId(
        $url
        , $external_id
    ) {      
        return $this->act->CountPhotoByUrlByExternalId(
        $url
        , $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountPhotoByUuidByExternalId(
        $uuid
        , $external_id
    ) {      
        return $this->act->CountPhotoByUuidByExternalId(
        $uuid
        , $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowsePhotoListByFilter($filter_obj) {
        return $this->act->BrowsePhotoListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetPhotoByUuid($set_type, $obj) {
        return $this->act->SetPhotoByUuid($set_type, $obj);
    }
               
    public function SetPhotoByUuidFull($obj) {
        return $this->act->SetPhotoByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetPhotoByExternalId($set_type, $obj) {
        return $this->act->SetPhotoByExternalId($set_type, $obj);
    }
               
    public function SetPhotoByExternalIdFull($obj) {
        return $this->act->SetPhotoByExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetPhotoByUrl($set_type, $obj) {
        return $this->act->SetPhotoByUrl($set_type, $obj);
    }
               
    public function SetPhotoByUrlFull($obj) {
        return $this->act->SetPhotoByUrl('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetPhotoByUrlByExternalId($set_type, $obj) {
        return $this->act->SetPhotoByUrlByExternalId($set_type, $obj);
    }
               
    public function SetPhotoByUrlByExternalIdFull($obj) {
        return $this->act->SetPhotoByUrlByExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetPhotoByUuidByExternalId($set_type, $obj) {
        return $this->act->SetPhotoByUuidByExternalId($set_type, $obj);
    }
               
    public function SetPhotoByUuidByExternalIdFull($obj) {
        return $this->act->SetPhotoByUuidByExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelPhotoByUuid(
        $uuid
    ) {         
        return $this->act->DelPhotoByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelPhotoByExternalId(
        $external_id
    ) {         
        return $this->act->DelPhotoByExternalId(
        $external_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelPhotoByUrl(
        $url
    ) {         
        return $this->act->DelPhotoByUrl(
        $url
        );
    }
#------------------------------------------------------------------------------                    
    public function DelPhotoByUrlByExternalId(
        $url
        , $external_id
    ) {         
        return $this->act->DelPhotoByUrlByExternalId(
        $url
        , $external_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelPhotoByUuidByExternalId(
        $uuid
        , $external_id
    ) {         
        return $this->act->DelPhotoByUuidByExternalId(
        $uuid
        , $external_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetPhotoList(
        ) {
            return $this->act->GetPhotoList(
            );
        }
        
    public function GetPhoto(
    ) {
        foreach($this->act->GetPhotoList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetPhotoList(
    ) {
        return $this->CachedGetPhotoList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetPhotoList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetPhotoList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Photo>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetPhotoList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetPhotoListByUuid(
        $uuid
        ) {
            return $this->act->GetPhotoListByUuid(
                $uuid
            );
        }
        
    public function GetPhotoByUuid(
        $uuid
    ) {
        foreach($this->act->GetPhotoListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetPhotoListByUuid(
        $uuid
    ) {
        return $this->CachedGetPhotoListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetPhotoListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetPhotoListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Photo>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetPhotoListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetPhotoListByExternalId(
        $external_id
        ) {
            return $this->act->GetPhotoListByExternalId(
                $external_id
            );
        }
        
    public function GetPhotoByExternalId(
        $external_id
    ) {
        foreach($this->act->GetPhotoListByExternalId(
        $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetPhotoListByExternalId(
        $external_id
    ) {
        return $this->CachedGetPhotoListByExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $external_id
        );
    }
    */
        
    public function CachedGetPhotoListByExternalId(
        $overrideCache
        , $cacheHours
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetPhotoListByExternalId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$external_id");
        $sb += "_";
        $sb += $external_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Photo>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetPhotoListByExternalId(
                $external_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetPhotoListByUrl(
        $url
        ) {
            return $this->act->GetPhotoListByUrl(
                $url
            );
        }
        
    public function GetPhotoByUrl(
        $url
    ) {
        foreach($this->act->GetPhotoListByUrl(
        $url
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetPhotoListByUrl(
        $url
    ) {
        return $this->CachedGetPhotoListByUrl(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
        );
    }
    */
        
    public function CachedGetPhotoListByUrl(
        $overrideCache
        , $cacheHours
        , $url
    ) {

        $objs = array();

        $method_name = "CachedGetPhotoListByUrl";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$url");
        $sb += "_";
        $sb += $url;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Photo>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetPhotoListByUrl(
                $url
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetPhotoListByUrlByExternalId(
        $url
        , $external_id
        ) {
            return $this->act->GetPhotoListByUrlByExternalId(
                $url
                , $external_id
            );
        }
        
    public function GetPhotoByUrlByExternalId(
        $url
        , $external_id
    ) {
        foreach($this->act->GetPhotoListByUrlByExternalId(
        $url
        , $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetPhotoListByUrlByExternalId(
        $url
        , $external_id
    ) {
        return $this->CachedGetPhotoListByUrlByExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
            , $external_id
        );
    }
    */
        
    public function CachedGetPhotoListByUrlByExternalId(
        $overrideCache
        , $cacheHours
        , $url
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetPhotoListByUrlByExternalId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$url");
        $sb += "_";
        $sb += $url;
        $sb += "_";
        $sb += strtolower("$external_id");
        $sb += "_";
        $sb += $external_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Photo>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetPhotoListByUrlByExternalId(
                $url
                , $external_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetPhotoListByUuidByExternalId(
        $uuid
        , $external_id
        ) {
            return $this->act->GetPhotoListByUuidByExternalId(
                $uuid
                , $external_id
            );
        }
        
    public function GetPhotoByUuidByExternalId(
        $uuid
        , $external_id
    ) {
        foreach($this->act->GetPhotoListByUuidByExternalId(
        $uuid
        , $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetPhotoListByUuidByExternalId(
        $uuid
        , $external_id
    ) {
        return $this->CachedGetPhotoListByUuidByExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
            , $external_id
        );
    }
    */
        
    public function CachedGetPhotoListByUuidByExternalId(
        $overrideCache
        , $cacheHours
        , $uuid
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetPhotoListByUuidByExternalId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;
        $sb += "_";
        $sb += strtolower("$external_id");
        $sb += "_";
        $sb += $external_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Photo>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetPhotoListByUuidByExternalId(
                $uuid
                , $external_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountVideo(
    ) {      
        return $this->act->CountVideo(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountVideoByUuid(
        $uuid
    ) {      
        return $this->act->CountVideoByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountVideoByExternalId(
        $external_id
    ) {      
        return $this->act->CountVideoByExternalId(
        $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountVideoByUrl(
        $url
    ) {      
        return $this->act->CountVideoByUrl(
        $url
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountVideoByUrlByExternalId(
        $url
        , $external_id
    ) {      
        return $this->act->CountVideoByUrlByExternalId(
        $url
        , $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountVideoByUuidByExternalId(
        $uuid
        , $external_id
    ) {      
        return $this->act->CountVideoByUuidByExternalId(
        $uuid
        , $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseVideoListByFilter($filter_obj) {
        return $this->act->BrowseVideoListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetVideoByUuid($set_type, $obj) {
        return $this->act->SetVideoByUuid($set_type, $obj);
    }
               
    public function SetVideoByUuidFull($obj) {
        return $this->act->SetVideoByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetVideoByExternalId($set_type, $obj) {
        return $this->act->SetVideoByExternalId($set_type, $obj);
    }
               
    public function SetVideoByExternalIdFull($obj) {
        return $this->act->SetVideoByExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetVideoByUrl($set_type, $obj) {
        return $this->act->SetVideoByUrl($set_type, $obj);
    }
               
    public function SetVideoByUrlFull($obj) {
        return $this->act->SetVideoByUrl('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetVideoByUrlByExternalId($set_type, $obj) {
        return $this->act->SetVideoByUrlByExternalId($set_type, $obj);
    }
               
    public function SetVideoByUrlByExternalIdFull($obj) {
        return $this->act->SetVideoByUrlByExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetVideoByUuidByExternalId($set_type, $obj) {
        return $this->act->SetVideoByUuidByExternalId($set_type, $obj);
    }
               
    public function SetVideoByUuidByExternalIdFull($obj) {
        return $this->act->SetVideoByUuidByExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelVideoByUuid(
        $uuid
    ) {         
        return $this->act->DelVideoByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelVideoByExternalId(
        $external_id
    ) {         
        return $this->act->DelVideoByExternalId(
        $external_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelVideoByUrl(
        $url
    ) {         
        return $this->act->DelVideoByUrl(
        $url
        );
    }
#------------------------------------------------------------------------------                    
    public function DelVideoByUrlByExternalId(
        $url
        , $external_id
    ) {         
        return $this->act->DelVideoByUrlByExternalId(
        $url
        , $external_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelVideoByUuidByExternalId(
        $uuid
        , $external_id
    ) {         
        return $this->act->DelVideoByUuidByExternalId(
        $uuid
        , $external_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetVideoList(
        ) {
            return $this->act->GetVideoList(
            );
        }
        
    public function GetVideo(
    ) {
        foreach($this->act->GetVideoList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetVideoList(
    ) {
        return $this->CachedGetVideoList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetVideoList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetVideoList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Video>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetVideoList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetVideoListByUuid(
        $uuid
        ) {
            return $this->act->GetVideoListByUuid(
                $uuid
            );
        }
        
    public function GetVideoByUuid(
        $uuid
    ) {
        foreach($this->act->GetVideoListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetVideoListByUuid(
        $uuid
    ) {
        return $this->CachedGetVideoListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetVideoListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetVideoListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Video>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetVideoListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetVideoListByExternalId(
        $external_id
        ) {
            return $this->act->GetVideoListByExternalId(
                $external_id
            );
        }
        
    public function GetVideoByExternalId(
        $external_id
    ) {
        foreach($this->act->GetVideoListByExternalId(
        $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetVideoListByExternalId(
        $external_id
    ) {
        return $this->CachedGetVideoListByExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $external_id
        );
    }
    */
        
    public function CachedGetVideoListByExternalId(
        $overrideCache
        , $cacheHours
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetVideoListByExternalId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$external_id");
        $sb += "_";
        $sb += $external_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Video>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetVideoListByExternalId(
                $external_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetVideoListByUrl(
        $url
        ) {
            return $this->act->GetVideoListByUrl(
                $url
            );
        }
        
    public function GetVideoByUrl(
        $url
    ) {
        foreach($this->act->GetVideoListByUrl(
        $url
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetVideoListByUrl(
        $url
    ) {
        return $this->CachedGetVideoListByUrl(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
        );
    }
    */
        
    public function CachedGetVideoListByUrl(
        $overrideCache
        , $cacheHours
        , $url
    ) {

        $objs = array();

        $method_name = "CachedGetVideoListByUrl";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$url");
        $sb += "_";
        $sb += $url;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Video>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetVideoListByUrl(
                $url
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetVideoListByUrlByExternalId(
        $url
        , $external_id
        ) {
            return $this->act->GetVideoListByUrlByExternalId(
                $url
                , $external_id
            );
        }
        
    public function GetVideoByUrlByExternalId(
        $url
        , $external_id
    ) {
        foreach($this->act->GetVideoListByUrlByExternalId(
        $url
        , $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetVideoListByUrlByExternalId(
        $url
        , $external_id
    ) {
        return $this->CachedGetVideoListByUrlByExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
            , $external_id
        );
    }
    */
        
    public function CachedGetVideoListByUrlByExternalId(
        $overrideCache
        , $cacheHours
        , $url
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetVideoListByUrlByExternalId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$url");
        $sb += "_";
        $sb += $url;
        $sb += "_";
        $sb += strtolower("$external_id");
        $sb += "_";
        $sb += $external_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Video>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetVideoListByUrlByExternalId(
                $url
                , $external_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetVideoListByUuidByExternalId(
        $uuid
        , $external_id
        ) {
            return $this->act->GetVideoListByUuidByExternalId(
                $uuid
                , $external_id
            );
        }
        
    public function GetVideoByUuidByExternalId(
        $uuid
        , $external_id
    ) {
        foreach($this->act->GetVideoListByUuidByExternalId(
        $uuid
        , $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetVideoListByUuidByExternalId(
        $uuid
        , $external_id
    ) {
        return $this->CachedGetVideoListByUuidByExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
            , $external_id
        );
    }
    */
        
    public function CachedGetVideoListByUuidByExternalId(
        $overrideCache
        , $cacheHours
        , $uuid
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetVideoListByUuidByExternalId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;
        $sb += "_";
        $sb += strtolower("$external_id");
        $sb += "_";
        $sb += $external_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Video>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetVideoListByUuidByExternalId(
                $uuid
                , $external_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
    
}

?>
