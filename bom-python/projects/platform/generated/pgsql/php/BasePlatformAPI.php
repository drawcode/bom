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
    public function CountGame(
    ) {      
        return $this->act->CountGame(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameByUuid(
        $uuid
    ) {      
        return $this->act->CountGameByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameByCode(
        $code
    ) {      
        return $this->act->CountGameByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameByName(
        $name
    ) {      
        return $this->act->CountGameByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameByOrgId(
        $org_id
    ) {      
        return $this->act->CountGameByOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameByAppId(
        $app_id
    ) {      
        return $this->act->CountGameByAppId(
        $app_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameByOrgIdByAppId(
        $org_id
        , $app_id
    ) {      
        return $this->act->CountGameByOrgIdByAppId(
        $org_id
        , $app_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameListByFilter($filter_obj) {
        return $this->act->BrowseGameListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameByUuid($set_type, $obj) {
        return $this->act->SetGameByUuid($set_type, $obj);
    }
               
    public function SetGameByUuidFull($obj) {
        return $this->act->SetGameByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameByCode($set_type, $obj) {
        return $this->act->SetGameByCode($set_type, $obj);
    }
               
    public function SetGameByCodeFull($obj) {
        return $this->act->SetGameByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameByName($set_type, $obj) {
        return $this->act->SetGameByName($set_type, $obj);
    }
               
    public function SetGameByNameFull($obj) {
        return $this->act->SetGameByName('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameByOrgId($set_type, $obj) {
        return $this->act->SetGameByOrgId($set_type, $obj);
    }
               
    public function SetGameByOrgIdFull($obj) {
        return $this->act->SetGameByOrgId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameByAppId($set_type, $obj) {
        return $this->act->SetGameByAppId($set_type, $obj);
    }
               
    public function SetGameByAppIdFull($obj) {
        return $this->act->SetGameByAppId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameByOrgIdByAppId($set_type, $obj) {
        return $this->act->SetGameByOrgIdByAppId($set_type, $obj);
    }
               
    public function SetGameByOrgIdByAppIdFull($obj) {
        return $this->act->SetGameByOrgIdByAppId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameByUuid(
        $uuid
    ) {         
        return $this->act->DelGameByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameByCode(
        $code
    ) {         
        return $this->act->DelGameByCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameByName(
        $name
    ) {         
        return $this->act->DelGameByName(
        $name
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameByOrgId(
        $org_id
    ) {         
        return $this->act->DelGameByOrgId(
        $org_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameByAppId(
        $app_id
    ) {         
        return $this->act->DelGameByAppId(
        $app_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameByOrgIdByAppId(
        $org_id
        , $app_id
    ) {         
        return $this->act->DelGameByOrgIdByAppId(
        $org_id
        , $app_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameList(
        ) {
            return $this->act->GetGameList(
            );
        }
        
    public function GetGame(
    ) {
        foreach($this->act->GetGameList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameList(
    ) {
        return $this->CachedGetGameList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Game>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameListByUuid(
        $uuid
        ) {
            return $this->act->GetGameListByUuid(
                $uuid
            );
        }
        
    public function GetGameByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Game>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameListByCode(
        $code
        ) {
            return $this->act->GetGameListByCode(
                $code
            );
        }
        
    public function GetGameByCode(
        $code
    ) {
        foreach($this->act->GetGameListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameListByCode(
        $code
    ) {
        return $this->CachedGetGameListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Game>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameListByName(
        $name
        ) {
            return $this->act->GetGameListByName(
                $name
            );
        }
        
    public function GetGameByName(
        $name
    ) {
        foreach($this->act->GetGameListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameListByName(
        $name
    ) {
        return $this->CachedGetGameListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetGameListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetGameListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Game>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameListByOrgId(
        $org_id
        ) {
            return $this->act->GetGameListByOrgId(
                $org_id
            );
        }
        
    public function GetGameByOrgId(
        $org_id
    ) {
        foreach($this->act->GetGameListByOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameListByOrgId(
        $org_id
    ) {
        return $this->CachedGetGameListByOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetGameListByOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameListByOrgId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Game>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameListByOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameListByAppId(
        $app_id
        ) {
            return $this->act->GetGameListByAppId(
                $app_id
            );
        }
        
    public function GetGameByAppId(
        $app_id
    ) {
        foreach($this->act->GetGameListByAppId(
        $app_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameListByAppId(
        $app_id
    ) {
        return $this->CachedGetGameListByAppId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $app_id
        );
    }
    */
        
    public function CachedGetGameListByAppId(
        $overrideCache
        , $cacheHours
        , $app_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameListByAppId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$app_id");
        $sb += "_";
        $sb += $app_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Game>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameListByAppId(
                $app_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameListByOrgIdByAppId(
        $org_id
        , $app_id
        ) {
            return $this->act->GetGameListByOrgIdByAppId(
                $org_id
                , $app_id
            );
        }
        
    public function GetGameByOrgIdByAppId(
        $org_id
        , $app_id
    ) {
        foreach($this->act->GetGameListByOrgIdByAppId(
        $org_id
        , $app_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameListByOrgIdByAppId(
        $org_id
        , $app_id
    ) {
        return $this->CachedGetGameListByOrgIdByAppId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
            , $app_id
        );
    }
    */
        
    public function CachedGetGameListByOrgIdByAppId(
        $overrideCache
        , $cacheHours
        , $org_id
        , $app_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameListByOrgIdByAppId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;
        $sb += "_";
        $sb += strtolower("$app_id");
        $sb += "_";
        $sb += $app_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Game>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameListByOrgIdByAppId(
                $org_id
                , $app_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameCategory(
    ) {      
        return $this->act->CountGameCategory(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryByUuid(
        $uuid
    ) {      
        return $this->act->CountGameCategoryByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryByCode(
        $code
    ) {      
        return $this->act->CountGameCategoryByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryByName(
        $name
    ) {      
        return $this->act->CountGameCategoryByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryByOrgId(
        $org_id
    ) {      
        return $this->act->CountGameCategoryByOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryByTypeId(
        $type_id
    ) {      
        return $this->act->CountGameCategoryByTypeId(
        $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryByOrgIdByTypeId(
        $org_id
        , $type_id
    ) {      
        return $this->act->CountGameCategoryByOrgIdByTypeId(
        $org_id
        , $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameCategoryListByFilter($filter_obj) {
        return $this->act->BrowseGameCategoryListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameCategoryByUuid($set_type, $obj) {
        return $this->act->SetGameCategoryByUuid($set_type, $obj);
    }
               
    public function SetGameCategoryByUuidFull($obj) {
        return $this->act->SetGameCategoryByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameCategoryByUuid(
        $uuid
    ) {         
        return $this->act->DelGameCategoryByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameCategoryByCodeByOrgId(
        $code
        , $org_id
    ) {         
        return $this->act->DelGameCategoryByCodeByOrgId(
        $code
        , $org_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameCategoryByCodeByOrgIdByTypeId(
        $code
        , $org_id
        , $type_id
    ) {         
        return $this->act->DelGameCategoryByCodeByOrgIdByTypeId(
        $code
        , $org_id
        , $type_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameCategoryList(
        ) {
            return $this->act->GetGameCategoryList(
            );
        }
        
    public function GetGameCategory(
    ) {
        foreach($this->act->GetGameCategoryList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryList(
    ) {
        return $this->CachedGetGameCategoryList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameCategoryList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameCategory>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameCategoryList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryListByUuid(
        $uuid
        ) {
            return $this->act->GetGameCategoryListByUuid(
                $uuid
            );
        }
        
    public function GetGameCategoryByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameCategoryListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameCategoryListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameCategoryListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameCategory>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameCategoryListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryListByCode(
        $code
        ) {
            return $this->act->GetGameCategoryListByCode(
                $code
            );
        }
        
    public function GetGameCategoryByCode(
        $code
    ) {
        foreach($this->act->GetGameCategoryListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryListByCode(
        $code
    ) {
        return $this->CachedGetGameCategoryListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameCategoryListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameCategory>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameCategoryListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryListByName(
        $name
        ) {
            return $this->act->GetGameCategoryListByName(
                $name
            );
        }
        
    public function GetGameCategoryByName(
        $name
    ) {
        foreach($this->act->GetGameCategoryListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryListByName(
        $name
    ) {
        return $this->CachedGetGameCategoryListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetGameCategoryListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameCategory>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameCategoryListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryListByOrgId(
        $org_id
        ) {
            return $this->act->GetGameCategoryListByOrgId(
                $org_id
            );
        }
        
    public function GetGameCategoryByOrgId(
        $org_id
    ) {
        foreach($this->act->GetGameCategoryListByOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryListByOrgId(
        $org_id
    ) {
        return $this->CachedGetGameCategoryListByOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetGameCategoryListByOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryListByOrgId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameCategory>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameCategoryListByOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryListByTypeId(
        $type_id
        ) {
            return $this->act->GetGameCategoryListByTypeId(
                $type_id
            );
        }
        
    public function GetGameCategoryByTypeId(
        $type_id
    ) {
        foreach($this->act->GetGameCategoryListByTypeId(
        $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryListByTypeId(
        $type_id
    ) {
        return $this->CachedGetGameCategoryListByTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $type_id
        );
    }
    */
        
    public function CachedGetGameCategoryListByTypeId(
        $overrideCache
        , $cacheHours
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryListByTypeId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$type_id");
        $sb += "_";
        $sb += $type_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameCategory>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameCategoryListByTypeId(
                $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryListByOrgIdByTypeId(
        $org_id
        , $type_id
        ) {
            return $this->act->GetGameCategoryListByOrgIdByTypeId(
                $org_id
                , $type_id
            );
        }
        
    public function GetGameCategoryByOrgIdByTypeId(
        $org_id
        , $type_id
    ) {
        foreach($this->act->GetGameCategoryListByOrgIdByTypeId(
        $org_id
        , $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryListByOrgIdByTypeId(
        $org_id
        , $type_id
    ) {
        return $this->CachedGetGameCategoryListByOrgIdByTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
            , $type_id
        );
    }
    */
        
    public function CachedGetGameCategoryListByOrgIdByTypeId(
        $overrideCache
        , $cacheHours
        , $org_id
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryListByOrgIdByTypeId";

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

        //$objs = CacheUtil.Get<List<GameCategory>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameCategoryListByOrgIdByTypeId(
                $org_id
                , $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameCategoryTree(
    ) {      
        return $this->act->CountGameCategoryTree(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryTreeByUuid(
        $uuid
    ) {      
        return $this->act->CountGameCategoryTreeByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryTreeByParentId(
        $parent_id
    ) {      
        return $this->act->CountGameCategoryTreeByParentId(
        $parent_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryTreeByCategoryId(
        $category_id
    ) {      
        return $this->act->CountGameCategoryTreeByCategoryId(
        $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryTreeByParentIdByCategoryId(
        $parent_id
        , $category_id
    ) {      
        return $this->act->CountGameCategoryTreeByParentIdByCategoryId(
        $parent_id
        , $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameCategoryTreeListByFilter($filter_obj) {
        return $this->act->BrowseGameCategoryTreeListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameCategoryTreeByUuid($set_type, $obj) {
        return $this->act->SetGameCategoryTreeByUuid($set_type, $obj);
    }
               
    public function SetGameCategoryTreeByUuidFull($obj) {
        return $this->act->SetGameCategoryTreeByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameCategoryTreeByUuid(
        $uuid
    ) {         
        return $this->act->DelGameCategoryTreeByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameCategoryTreeByParentId(
        $parent_id
    ) {         
        return $this->act->DelGameCategoryTreeByParentId(
        $parent_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameCategoryTreeByCategoryId(
        $category_id
    ) {         
        return $this->act->DelGameCategoryTreeByCategoryId(
        $category_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameCategoryTreeByParentIdByCategoryId(
        $parent_id
        , $category_id
    ) {         
        return $this->act->DelGameCategoryTreeByParentIdByCategoryId(
        $parent_id
        , $category_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameCategoryTreeList(
        ) {
            return $this->act->GetGameCategoryTreeList(
            );
        }
        
    public function GetGameCategoryTree(
    ) {
        foreach($this->act->GetGameCategoryTreeList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryTreeList(
    ) {
        return $this->CachedGetGameCategoryTreeList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameCategoryTreeList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryTreeList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameCategoryTree>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameCategoryTreeList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryTreeListByUuid(
        $uuid
        ) {
            return $this->act->GetGameCategoryTreeListByUuid(
                $uuid
            );
        }
        
    public function GetGameCategoryTreeByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameCategoryTreeListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryTreeListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameCategoryTreeListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameCategoryTreeListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryTreeListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameCategoryTree>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameCategoryTreeListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryTreeListByParentId(
        $parent_id
        ) {
            return $this->act->GetGameCategoryTreeListByParentId(
                $parent_id
            );
        }
        
    public function GetGameCategoryTreeByParentId(
        $parent_id
    ) {
        foreach($this->act->GetGameCategoryTreeListByParentId(
        $parent_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryTreeListByParentId(
        $parent_id
    ) {
        return $this->CachedGetGameCategoryTreeListByParentId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $parent_id
        );
    }
    */
        
    public function CachedGetGameCategoryTreeListByParentId(
        $overrideCache
        , $cacheHours
        , $parent_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryTreeListByParentId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$parent_id");
        $sb += "_";
        $sb += $parent_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameCategoryTree>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameCategoryTreeListByParentId(
                $parent_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryTreeListByCategoryId(
        $category_id
        ) {
            return $this->act->GetGameCategoryTreeListByCategoryId(
                $category_id
            );
        }
        
    public function GetGameCategoryTreeByCategoryId(
        $category_id
    ) {
        foreach($this->act->GetGameCategoryTreeListByCategoryId(
        $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryTreeListByCategoryId(
        $category_id
    ) {
        return $this->CachedGetGameCategoryTreeListByCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $category_id
        );
    }
    */
        
    public function CachedGetGameCategoryTreeListByCategoryId(
        $overrideCache
        , $cacheHours
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryTreeListByCategoryId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$category_id");
        $sb += "_";
        $sb += $category_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameCategoryTree>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameCategoryTreeListByCategoryId(
                $category_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryTreeListByParentIdByCategoryId(
        $parent_id
        , $category_id
        ) {
            return $this->act->GetGameCategoryTreeListByParentIdByCategoryId(
                $parent_id
                , $category_id
            );
        }
        
    public function GetGameCategoryTreeByParentIdByCategoryId(
        $parent_id
        , $category_id
    ) {
        foreach($this->act->GetGameCategoryTreeListByParentIdByCategoryId(
        $parent_id
        , $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryTreeListByParentIdByCategoryId(
        $parent_id
        , $category_id
    ) {
        return $this->CachedGetGameCategoryTreeListByParentIdByCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $parent_id
            , $category_id
        );
    }
    */
        
    public function CachedGetGameCategoryTreeListByParentIdByCategoryId(
        $overrideCache
        , $cacheHours
        , $parent_id
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryTreeListByParentIdByCategoryId";

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

        //$objs = CacheUtil.Get<List<GameCategoryTree>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameCategoryTreeListByParentIdByCategoryId(
                $parent_id
                , $category_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameCategoryAssoc(
    ) {      
        return $this->act->CountGameCategoryAssoc(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryAssocByUuid(
        $uuid
    ) {      
        return $this->act->CountGameCategoryAssocByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryAssocByGameId(
        $game_id
    ) {      
        return $this->act->CountGameCategoryAssocByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryAssocByCategoryId(
        $category_id
    ) {      
        return $this->act->CountGameCategoryAssocByCategoryId(
        $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryAssocByGameIdByCategoryId(
        $game_id
        , $category_id
    ) {      
        return $this->act->CountGameCategoryAssocByGameIdByCategoryId(
        $game_id
        , $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameCategoryAssocListByFilter($filter_obj) {
        return $this->act->BrowseGameCategoryAssocListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameCategoryAssocByUuid($set_type, $obj) {
        return $this->act->SetGameCategoryAssocByUuid($set_type, $obj);
    }
               
    public function SetGameCategoryAssocByUuidFull($obj) {
        return $this->act->SetGameCategoryAssocByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameCategoryAssocByUuid(
        $uuid
    ) {         
        return $this->act->DelGameCategoryAssocByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameCategoryAssocList(
        ) {
            return $this->act->GetGameCategoryAssocList(
            );
        }
        
    public function GetGameCategoryAssoc(
    ) {
        foreach($this->act->GetGameCategoryAssocList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryAssocList(
    ) {
        return $this->CachedGetGameCategoryAssocList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameCategoryAssocList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryAssocList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameCategoryAssoc>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameCategoryAssocList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryAssocListByUuid(
        $uuid
        ) {
            return $this->act->GetGameCategoryAssocListByUuid(
                $uuid
            );
        }
        
    public function GetGameCategoryAssocByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameCategoryAssocListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryAssocListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameCategoryAssocListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameCategoryAssocListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryAssocListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameCategoryAssoc>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameCategoryAssocListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryAssocListByGameId(
        $game_id
        ) {
            return $this->act->GetGameCategoryAssocListByGameId(
                $game_id
            );
        }
        
    public function GetGameCategoryAssocByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameCategoryAssocListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryAssocListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameCategoryAssocListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameCategoryAssocListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryAssocListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameCategoryAssoc>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameCategoryAssocListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryAssocListByCategoryId(
        $category_id
        ) {
            return $this->act->GetGameCategoryAssocListByCategoryId(
                $category_id
            );
        }
        
    public function GetGameCategoryAssocByCategoryId(
        $category_id
    ) {
        foreach($this->act->GetGameCategoryAssocListByCategoryId(
        $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryAssocListByCategoryId(
        $category_id
    ) {
        return $this->CachedGetGameCategoryAssocListByCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $category_id
        );
    }
    */
        
    public function CachedGetGameCategoryAssocListByCategoryId(
        $overrideCache
        , $cacheHours
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryAssocListByCategoryId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$category_id");
        $sb += "_";
        $sb += $category_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameCategoryAssoc>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameCategoryAssocListByCategoryId(
                $category_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryAssocListByGameIdByCategoryId(
        $game_id
        , $category_id
        ) {
            return $this->act->GetGameCategoryAssocListByGameIdByCategoryId(
                $game_id
                , $category_id
            );
        }
        
    public function GetGameCategoryAssocByGameIdByCategoryId(
        $game_id
        , $category_id
    ) {
        foreach($this->act->GetGameCategoryAssocListByGameIdByCategoryId(
        $game_id
        , $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryAssocListByGameIdByCategoryId(
        $game_id
        , $category_id
    ) {
        return $this->CachedGetGameCategoryAssocListByGameIdByCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $category_id
        );
    }
    */
        
    public function CachedGetGameCategoryAssocListByGameIdByCategoryId(
        $overrideCache
        , $cacheHours
        , $game_id
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryAssocListByGameIdByCategoryId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$category_id");
        $sb += "_";
        $sb += $category_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameCategoryAssoc>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameCategoryAssocListByGameIdByCategoryId(
                $game_id
                , $category_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameType(
    ) {      
        return $this->act->CountGameType(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameTypeByUuid(
        $uuid
    ) {      
        return $this->act->CountGameTypeByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameTypeByCode(
        $code
    ) {      
        return $this->act->CountGameTypeByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameTypeByName(
        $name
    ) {      
        return $this->act->CountGameTypeByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameTypeListByFilter($filter_obj) {
        return $this->act->BrowseGameTypeListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameTypeByUuid($set_type, $obj) {
        return $this->act->SetGameTypeByUuid($set_type, $obj);
    }
               
    public function SetGameTypeByUuidFull($obj) {
        return $this->act->SetGameTypeByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameTypeByUuid(
        $uuid
    ) {         
        return $this->act->DelGameTypeByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameTypeList(
        ) {
            return $this->act->GetGameTypeList(
            );
        }
        
    public function GetGameType(
    ) {
        foreach($this->act->GetGameTypeList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameTypeList(
    ) {
        return $this->CachedGetGameTypeList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameTypeList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameTypeList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameTypeList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameTypeListByUuid(
        $uuid
        ) {
            return $this->act->GetGameTypeListByUuid(
                $uuid
            );
        }
        
    public function GetGameTypeByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameTypeListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameTypeListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameTypeListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameTypeListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameTypeListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameTypeListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameTypeListByCode(
        $code
        ) {
            return $this->act->GetGameTypeListByCode(
                $code
            );
        }
        
    public function GetGameTypeByCode(
        $code
    ) {
        foreach($this->act->GetGameTypeListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameTypeListByCode(
        $code
    ) {
        return $this->CachedGetGameTypeListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameTypeListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameTypeListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameTypeListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameTypeListByName(
        $name
        ) {
            return $this->act->GetGameTypeListByName(
                $name
            );
        }
        
    public function GetGameTypeByName(
        $name
    ) {
        foreach($this->act->GetGameTypeListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameTypeListByName(
        $name
    ) {
        return $this->CachedGetGameTypeListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetGameTypeListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetGameTypeListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameTypeListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountProfileGame(
    ) {      
        return $this->act->CountProfileGame(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameByUuid(
        $uuid
    ) {      
        return $this->act->CountProfileGameByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameByGameId(
        $game_id
    ) {      
        return $this->act->CountProfileGameByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameByProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileGameByProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountProfileGameByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileGameListByFilter($filter_obj) {
        return $this->act->BrowseProfileGameListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileGameByUuid($set_type, $obj) {
        return $this->act->SetProfileGameByUuid($set_type, $obj);
    }
               
    public function SetProfileGameByUuidFull($obj) {
        return $this->act->SetProfileGameByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileGameByUuid(
        $uuid
    ) {         
        return $this->act->DelProfileGameByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileGameList(
        ) {
            return $this->act->GetProfileGameList(
            );
        }
        
    public function GetProfileGame(
    ) {
        foreach($this->act->GetProfileGameList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameList(
    ) {
        return $this->CachedGetProfileGameList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetProfileGameList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileGame>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileGameList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameListByUuid(
        $uuid
        ) {
            return $this->act->GetProfileGameListByUuid(
                $uuid
            );
        }
        
    public function GetProfileGameByUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileGameListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameListByUuid(
        $uuid
    ) {
        return $this->CachedGetProfileGameListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileGameListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileGame>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileGameListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameListByGameId(
        $game_id
        ) {
            return $this->act->GetProfileGameListByGameId(
                $game_id
            );
        }
        
    public function GetProfileGameByGameId(
        $game_id
    ) {
        foreach($this->act->GetProfileGameListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameListByGameId(
        $game_id
    ) {
        return $this->CachedGetProfileGameListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetProfileGameListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileGame>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileGameListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameListByProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileGameListByProfileId(
                $profile_id
            );
        }
        
    public function GetProfileGameByProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileGameListByProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameListByProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileGameListByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileGameListByProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameListByProfileId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileGame>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileGameListByProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetProfileGameListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetProfileGameByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetProfileGameListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetProfileGameListByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetProfileGameListByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameListByProfileIdByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileGame>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileGameListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountProfileGameNetwork(
    ) {      
        return $this->act->CountProfileGameNetwork(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameNetworkByUuid(
        $uuid
    ) {      
        return $this->act->CountProfileGameNetworkByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameNetworkByGameId(
        $game_id
    ) {      
        return $this->act->CountProfileGameNetworkByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameNetworkByProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileGameNetworkByProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameNetworkByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountProfileGameNetworkByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileGameNetworkListByFilter($filter_obj) {
        return $this->act->BrowseProfileGameNetworkListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileGameNetworkByUuid($set_type, $obj) {
        return $this->act->SetProfileGameNetworkByUuid($set_type, $obj);
    }
               
    public function SetProfileGameNetworkByUuidFull($obj) {
        return $this->act->SetProfileGameNetworkByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileGameNetworkByUuid(
        $uuid
    ) {         
        return $this->act->DelProfileGameNetworkByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileGameNetworkList(
        ) {
            return $this->act->GetProfileGameNetworkList(
            );
        }
        
    public function GetProfileGameNetwork(
    ) {
        foreach($this->act->GetProfileGameNetworkList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameNetworkList(
    ) {
        return $this->CachedGetProfileGameNetworkList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetProfileGameNetworkList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameNetworkList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileGameNetwork>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileGameNetworkList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameNetworkListByUuid(
        $uuid
        ) {
            return $this->act->GetProfileGameNetworkListByUuid(
                $uuid
            );
        }
        
    public function GetProfileGameNetworkByUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileGameNetworkListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameNetworkListByUuid(
        $uuid
    ) {
        return $this->CachedGetProfileGameNetworkListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileGameNetworkListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameNetworkListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileGameNetwork>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileGameNetworkListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameNetworkListByGameId(
        $game_id
        ) {
            return $this->act->GetProfileGameNetworkListByGameId(
                $game_id
            );
        }
        
    public function GetProfileGameNetworkByGameId(
        $game_id
    ) {
        foreach($this->act->GetProfileGameNetworkListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameNetworkListByGameId(
        $game_id
    ) {
        return $this->CachedGetProfileGameNetworkListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetProfileGameNetworkListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameNetworkListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileGameNetwork>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileGameNetworkListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameNetworkListByProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileGameNetworkListByProfileId(
                $profile_id
            );
        }
        
    public function GetProfileGameNetworkByProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileGameNetworkListByProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameNetworkListByProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileGameNetworkListByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileGameNetworkListByProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameNetworkListByProfileId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileGameNetwork>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileGameNetworkListByProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameNetworkListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetProfileGameNetworkListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetProfileGameNetworkByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetProfileGameNetworkListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameNetworkListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetProfileGameNetworkListByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetProfileGameNetworkListByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameNetworkListByProfileIdByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileGameNetwork>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileGameNetworkListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountProfileGameDataAttribute(
    ) {      
        return $this->act->CountProfileGameDataAttribute(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameDataAttributeByUuid(
        $uuid
    ) {      
        return $this->act->CountProfileGameDataAttributeByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameDataAttributeByProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileGameDataAttributeByProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameDataAttributeByProfileIdByGameIdByCode(
        $profile_id
        , $game_id
        , $code
    ) {      
        return $this->act->CountProfileGameDataAttributeByProfileIdByGameIdByCode(
        $profile_id
        , $game_id
        , $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileGameDataAttributeListByFilter($filter_obj) {
        return $this->act->BrowseProfileGameDataAttributeListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileGameDataAttributeByUuid($set_type, $obj) {
        return $this->act->SetProfileGameDataAttributeByUuid($set_type, $obj);
    }
               
    public function SetProfileGameDataAttributeByUuidFull($obj) {
        return $this->act->SetProfileGameDataAttributeByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileGameDataAttributeByProfileId($set_type, $obj) {
        return $this->act->SetProfileGameDataAttributeByProfileId($set_type, $obj);
    }
               
    public function SetProfileGameDataAttributeByProfileIdFull($obj) {
        return $this->act->SetProfileGameDataAttributeByProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileGameDataAttributeByProfileIdByGameIdByCode($set_type, $obj) {
        return $this->act->SetProfileGameDataAttributeByProfileIdByGameIdByCode($set_type, $obj);
    }
               
    public function SetProfileGameDataAttributeByProfileIdByGameIdByCodeFull($obj) {
        return $this->act->SetProfileGameDataAttributeByProfileIdByGameIdByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileGameDataAttributeByUuid(
        $uuid
    ) {         
        return $this->act->DelProfileGameDataAttributeByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileGameDataAttributeByProfileId(
        $profile_id
    ) {         
        return $this->act->DelProfileGameDataAttributeByProfileId(
        $profile_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileGameDataAttributeByProfileIdByGameIdByCode(
        $profile_id
        , $game_id
        , $code
    ) {         
        return $this->act->DelProfileGameDataAttributeByProfileIdByGameIdByCode(
        $profile_id
        , $game_id
        , $code
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileGameDataAttributeListByUuid(
        $uuid
        ) {
            return $this->act->GetProfileGameDataAttributeListByUuid(
                $uuid
            );
        }
        
    public function GetProfileGameDataAttributeByUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileGameDataAttributeListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameDataAttributeListByUuid(
        $uuid
    ) {
        return $this->CachedGetProfileGameDataAttributeListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileGameDataAttributeListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameDataAttributeListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileGameDataAttribute>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileGameDataAttributeListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameDataAttributeListByProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileGameDataAttributeListByProfileId(
                $profile_id
            );
        }
        
    public function GetProfileGameDataAttributeByProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileGameDataAttributeListByProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameDataAttributeListByProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileGameDataAttributeListByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileGameDataAttributeListByProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameDataAttributeListByProfileId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileGameDataAttribute>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileGameDataAttributeListByProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameDataAttributeListByProfileIdByGameIdByCode(
        $profile_id
        , $game_id
        , $code
        ) {
            return $this->act->GetProfileGameDataAttributeListByProfileIdByGameIdByCode(
                $profile_id
                , $game_id
                , $code
            );
        }
        
    public function GetProfileGameDataAttributeByProfileIdByGameIdByCode(
        $profile_id
        , $game_id
        , $code
    ) {
        foreach($this->act->GetProfileGameDataAttributeListByProfileIdByGameIdByCode(
        $profile_id
        , $game_id
        , $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameDataAttributeListByProfileIdByGameIdByCode(
        $profile_id
        , $game_id
        , $code
    ) {
        return $this->CachedGetProfileGameDataAttributeListByProfileIdByGameIdByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
            , $code
        );
    }
    */
        
    public function CachedGetProfileGameDataAttributeListByProfileIdByGameIdByCode(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameDataAttributeListByProfileIdByGameIdByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileGameDataAttribute>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileGameDataAttributeListByProfileIdByGameIdByCode(
                $profile_id
                , $game_id
                , $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameSession(
    ) {      
        return $this->act->CountGameSession(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameSessionByUuid(
        $uuid
    ) {      
        return $this->act->CountGameSessionByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameSessionByGameId(
        $game_id
    ) {      
        return $this->act->CountGameSessionByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameSessionByProfileId(
        $profile_id
    ) {      
        return $this->act->CountGameSessionByProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameSessionByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameSessionByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameSessionListByFilter($filter_obj) {
        return $this->act->BrowseGameSessionListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameSessionByUuid($set_type, $obj) {
        return $this->act->SetGameSessionByUuid($set_type, $obj);
    }
               
    public function SetGameSessionByUuidFull($obj) {
        return $this->act->SetGameSessionByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameSessionByUuid(
        $uuid
    ) {         
        return $this->act->DelGameSessionByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameSessionList(
        ) {
            return $this->act->GetGameSessionList(
            );
        }
        
    public function GetGameSession(
    ) {
        foreach($this->act->GetGameSessionList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameSessionList(
    ) {
        return $this->CachedGetGameSessionList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameSessionList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameSessionList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameSession>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameSessionList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameSessionListByUuid(
        $uuid
        ) {
            return $this->act->GetGameSessionListByUuid(
                $uuid
            );
        }
        
    public function GetGameSessionByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameSessionListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameSessionListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameSessionListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameSessionListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameSessionListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameSession>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameSessionListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameSessionListByGameId(
        $game_id
        ) {
            return $this->act->GetGameSessionListByGameId(
                $game_id
            );
        }
        
    public function GetGameSessionByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameSessionListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameSessionListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameSessionListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameSessionListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameSessionListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameSession>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameSessionListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameSessionListByProfileId(
        $profile_id
        ) {
            return $this->act->GetGameSessionListByProfileId(
                $profile_id
            );
        }
        
    public function GetGameSessionByProfileId(
        $profile_id
    ) {
        foreach($this->act->GetGameSessionListByProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameSessionListByProfileId(
        $profile_id
    ) {
        return $this->CachedGetGameSessionListByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetGameSessionListByProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameSessionListByProfileId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameSession>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameSessionListByProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameSessionListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetGameSessionListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetGameSessionByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameSessionListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameSessionListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameSessionListByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameSessionListByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameSessionListByProfileIdByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameSession>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameSessionListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameSessionData(
    ) {      
        return $this->act->CountGameSessionData(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameSessionDataByUuid(
        $uuid
    ) {      
        return $this->act->CountGameSessionDataByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameSessionDataListByFilter($filter_obj) {
        return $this->act->BrowseGameSessionDataListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameSessionDataByUuid($set_type, $obj) {
        return $this->act->SetGameSessionDataByUuid($set_type, $obj);
    }
               
    public function SetGameSessionDataByUuidFull($obj) {
        return $this->act->SetGameSessionDataByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameSessionDataByUuid(
        $uuid
    ) {         
        return $this->act->DelGameSessionDataByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameSessionDataList(
        ) {
            return $this->act->GetGameSessionDataList(
            );
        }
        
    public function GetGameSessionData(
    ) {
        foreach($this->act->GetGameSessionDataList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameSessionDataList(
    ) {
        return $this->CachedGetGameSessionDataList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameSessionDataList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameSessionDataList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameSessionData>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameSessionDataList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameSessionDataListByUuid(
        $uuid
        ) {
            return $this->act->GetGameSessionDataListByUuid(
                $uuid
            );
        }
        
    public function GetGameSessionDataByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameSessionDataListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameSessionDataListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameSessionDataListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameSessionDataListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameSessionDataListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameSessionData>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameSessionDataListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameContent(
    ) {      
        return $this->act->CountGameContent(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameContentByUuid(
        $uuid
    ) {      
        return $this->act->CountGameContentByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameContentByGameId(
        $game_id
    ) {      
        return $this->act->CountGameContentByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameContentByGameIdByPath(
        $game_id
        , $path
    ) {      
        return $this->act->CountGameContentByGameIdByPath(
        $game_id
        , $path
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameContentByGameIdByPathByVersion(
        $game_id
        , $path
        , $version
    ) {      
        return $this->act->CountGameContentByGameIdByPathByVersion(
        $game_id
        , $path
        , $version
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameContentByGameIdByPathByVersionByPlatformByIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
    ) {      
        return $this->act->CountGameContentByGameIdByPathByVersionByPlatformByIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameContentListByFilter($filter_obj) {
        return $this->act->BrowseGameContentListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameContentByUuid($set_type, $obj) {
        return $this->act->SetGameContentByUuid($set_type, $obj);
    }
               
    public function SetGameContentByUuidFull($obj) {
        return $this->act->SetGameContentByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameContentByGameId($set_type, $obj) {
        return $this->act->SetGameContentByGameId($set_type, $obj);
    }
               
    public function SetGameContentByGameIdFull($obj) {
        return $this->act->SetGameContentByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameContentByGameIdByPath($set_type, $obj) {
        return $this->act->SetGameContentByGameIdByPath($set_type, $obj);
    }
               
    public function SetGameContentByGameIdByPathFull($obj) {
        return $this->act->SetGameContentByGameIdByPath('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameContentByGameIdByPathByVersion($set_type, $obj) {
        return $this->act->SetGameContentByGameIdByPathByVersion($set_type, $obj);
    }
               
    public function SetGameContentByGameIdByPathByVersionFull($obj) {
        return $this->act->SetGameContentByGameIdByPathByVersion('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameContentByGameIdByPathByVersionByPlatformByIncrement($set_type, $obj) {
        return $this->act->SetGameContentByGameIdByPathByVersionByPlatformByIncrement($set_type, $obj);
    }
               
    public function SetGameContentByGameIdByPathByVersionByPlatformByIncrementFull($obj) {
        return $this->act->SetGameContentByGameIdByPathByVersionByPlatformByIncrement('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameContentByUuid(
        $uuid
    ) {         
        return $this->act->DelGameContentByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameContentByGameId(
        $game_id
    ) {         
        return $this->act->DelGameContentByGameId(
        $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameContentByGameIdByPath(
        $game_id
        , $path
    ) {         
        return $this->act->DelGameContentByGameIdByPath(
        $game_id
        , $path
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameContentByGameIdByPathByVersion(
        $game_id
        , $path
        , $version
    ) {         
        return $this->act->DelGameContentByGameIdByPathByVersion(
        $game_id
        , $path
        , $version
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameContentByGameIdByPathByVersionByPlatformByIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
    ) {         
        return $this->act->DelGameContentByGameIdByPathByVersionByPlatformByIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameContentList(
        ) {
            return $this->act->GetGameContentList(
            );
        }
        
    public function GetGameContent(
    ) {
        foreach($this->act->GetGameContentList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameContentList(
    ) {
        return $this->CachedGetGameContentList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameContentList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameContentList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameContent>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameContentList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameContentListByUuid(
        $uuid
        ) {
            return $this->act->GetGameContentListByUuid(
                $uuid
            );
        }
        
    public function GetGameContentByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameContentListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameContentListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameContentListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameContentListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameContentListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameContent>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameContentListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameContentListByGameId(
        $game_id
        ) {
            return $this->act->GetGameContentListByGameId(
                $game_id
            );
        }
        
    public function GetGameContentByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameContentListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameContentListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameContentListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameContentListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameContentListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameContent>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameContentListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameContentListByGameIdByPath(
        $game_id
        , $path
        ) {
            return $this->act->GetGameContentListByGameIdByPath(
                $game_id
                , $path
            );
        }
        
    public function GetGameContentByGameIdByPath(
        $game_id
        , $path
    ) {
        foreach($this->act->GetGameContentListByGameIdByPath(
        $game_id
        , $path
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameContentListByGameIdByPath(
        $game_id
        , $path
    ) {
        return $this->CachedGetGameContentListByGameIdByPath(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $path
        );
    }
    */
        
    public function CachedGetGameContentListByGameIdByPath(
        $overrideCache
        , $cacheHours
        , $game_id
        , $path
    ) {

        $objs = array();

        $method_name = "CachedGetGameContentListByGameIdByPath";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$path");
        $sb += "_";
        $sb += $path;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameContent>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameContentListByGameIdByPath(
                $game_id
                , $path
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameContentListByGameIdByPathByVersion(
        $game_id
        , $path
        , $version
        ) {
            return $this->act->GetGameContentListByGameIdByPathByVersion(
                $game_id
                , $path
                , $version
            );
        }
        
    public function GetGameContentByGameIdByPathByVersion(
        $game_id
        , $path
        , $version
    ) {
        foreach($this->act->GetGameContentListByGameIdByPathByVersion(
        $game_id
        , $path
        , $version
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameContentListByGameIdByPathByVersion(
        $game_id
        , $path
        , $version
    ) {
        return $this->CachedGetGameContentListByGameIdByPathByVersion(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $path
            , $version
        );
    }
    */
        
    public function CachedGetGameContentListByGameIdByPathByVersion(
        $overrideCache
        , $cacheHours
        , $game_id
        , $path
        , $version
    ) {

        $objs = array();

        $method_name = "CachedGetGameContentListByGameIdByPathByVersion";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$path");
        $sb += "_";
        $sb += $path;
        $sb += "_";
        $sb += strtolower("$version");
        $sb += "_";
        $sb += $version;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameContent>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameContentListByGameIdByPathByVersion(
                $game_id
                , $path
                , $version
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
        ) {
            return $this->act->GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
                $game_id
                , $path
                , $version
                , $platform
                , $increment
            );
        }
        
    public function GetGameContentByGameIdByPathByVersionByPlatformByIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
    ) {
        foreach($this->act->GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
    ) {
        return $this->CachedGetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $path
            , $version
            , $platform
            , $increment
        );
    }
    */
        
    public function CachedGetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
        $overrideCache
        , $cacheHours
        , $game_id
        , $path
        , $version
        , $platform
        , $increment
    ) {

        $objs = array();

        $method_name = "CachedGetGameContentListByGameIdByPathByVersionByPlatformByIncrement";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$path");
        $sb += "_";
        $sb += $path;
        $sb += "_";
        $sb += strtolower("$version");
        $sb += "_";
        $sb += $version;
        $sb += "_";
        $sb += strtolower("$platform");
        $sb += "_";
        $sb += $platform;
        $sb += "_";
        $sb += strtolower("$increment");
        $sb += "_";
        $sb += $increment;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameContent>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
                $game_id
                , $path
                , $version
                , $platform
                , $increment
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameProfileContent(
    ) {      
        return $this->act->CountGameProfileContent(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileContentByUuid(
        $uuid
    ) {      
        return $this->act->CountGameProfileContentByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileContentByGameIdByProfileId(
        $game_id
        , $profile_id
    ) {      
        return $this->act->CountGameProfileContentByGameIdByProfileId(
        $game_id
        , $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileContentByGameIdByUsername(
        $game_id
        , $username
    ) {      
        return $this->act->CountGameProfileContentByGameIdByUsername(
        $game_id
        , $username
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileContentByUsername(
        $username
    ) {      
        return $this->act->CountGameProfileContentByUsername(
        $username
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileContentByGameIdByProfileIdByPath(
        $game_id
        , $profile_id
        , $path
    ) {      
        return $this->act->CountGameProfileContentByGameIdByProfileIdByPath(
        $game_id
        , $profile_id
        , $path
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileContentByGameIdByProfileIdByPathByVersion(
        $game_id
        , $profile_id
        , $path
        , $version
    ) {      
        return $this->act->CountGameProfileContentByGameIdByProfileIdByPathByVersion(
        $game_id
        , $profile_id
        , $path
        , $version
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
    ) {      
        return $this->act->CountGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileContentByGameIdByUsernameByPath(
        $game_id
        , $username
        , $path
    ) {      
        return $this->act->CountGameProfileContentByGameIdByUsernameByPath(
        $game_id
        , $username
        , $path
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileContentByGameIdByUsernameByPathByVersion(
        $game_id
        , $username
        , $path
        , $version
    ) {      
        return $this->act->CountGameProfileContentByGameIdByUsernameByPathByVersion(
        $game_id
        , $username
        , $path
        , $version
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
    ) {      
        return $this->act->CountGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameProfileContentListByFilter($filter_obj) {
        return $this->act->BrowseGameProfileContentListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileContentByUuid($set_type, $obj) {
        return $this->act->SetGameProfileContentByUuid($set_type, $obj);
    }
               
    public function SetGameProfileContentByUuidFull($obj) {
        return $this->act->SetGameProfileContentByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileContentByGameIdByProfileId($set_type, $obj) {
        return $this->act->SetGameProfileContentByGameIdByProfileId($set_type, $obj);
    }
               
    public function SetGameProfileContentByGameIdByProfileIdFull($obj) {
        return $this->act->SetGameProfileContentByGameIdByProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileContentByGameIdByUsername($set_type, $obj) {
        return $this->act->SetGameProfileContentByGameIdByUsername($set_type, $obj);
    }
               
    public function SetGameProfileContentByGameIdByUsernameFull($obj) {
        return $this->act->SetGameProfileContentByGameIdByUsername('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileContentByUsername($set_type, $obj) {
        return $this->act->SetGameProfileContentByUsername($set_type, $obj);
    }
               
    public function SetGameProfileContentByUsernameFull($obj) {
        return $this->act->SetGameProfileContentByUsername('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileContentByGameIdByProfileIdByPath($set_type, $obj) {
        return $this->act->SetGameProfileContentByGameIdByProfileIdByPath($set_type, $obj);
    }
               
    public function SetGameProfileContentByGameIdByProfileIdByPathFull($obj) {
        return $this->act->SetGameProfileContentByGameIdByProfileIdByPath('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileContentByGameIdByProfileIdByPathByVersion($set_type, $obj) {
        return $this->act->SetGameProfileContentByGameIdByProfileIdByPathByVersion($set_type, $obj);
    }
               
    public function SetGameProfileContentByGameIdByProfileIdByPathByVersionFull($obj) {
        return $this->act->SetGameProfileContentByGameIdByProfileIdByPathByVersion('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement($set_type, $obj) {
        return $this->act->SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement($set_type, $obj);
    }
               
    public function SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrementFull($obj) {
        return $this->act->SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileContentByGameIdByUsernameByPath($set_type, $obj) {
        return $this->act->SetGameProfileContentByGameIdByUsernameByPath($set_type, $obj);
    }
               
    public function SetGameProfileContentByGameIdByUsernameByPathFull($obj) {
        return $this->act->SetGameProfileContentByGameIdByUsernameByPath('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileContentByGameIdByUsernameByPathByVersion($set_type, $obj) {
        return $this->act->SetGameProfileContentByGameIdByUsernameByPathByVersion($set_type, $obj);
    }
               
    public function SetGameProfileContentByGameIdByUsernameByPathByVersionFull($obj) {
        return $this->act->SetGameProfileContentByGameIdByUsernameByPathByVersion('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement($set_type, $obj) {
        return $this->act->SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement($set_type, $obj);
    }
               
    public function SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrementFull($obj) {
        return $this->act->SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileContentByUuid(
        $uuid
    ) {         
        return $this->act->DelGameProfileContentByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileContentByGameIdByProfileId(
        $game_id
        , $profile_id
    ) {         
        return $this->act->DelGameProfileContentByGameIdByProfileId(
        $game_id
        , $profile_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileContentByGameIdByUsername(
        $game_id
        , $username
    ) {         
        return $this->act->DelGameProfileContentByGameIdByUsername(
        $game_id
        , $username
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileContentByUsername(
        $username
    ) {         
        return $this->act->DelGameProfileContentByUsername(
        $username
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileContentByGameIdByProfileIdByPath(
        $game_id
        , $profile_id
        , $path
    ) {         
        return $this->act->DelGameProfileContentByGameIdByProfileIdByPath(
        $game_id
        , $profile_id
        , $path
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileContentByGameIdByProfileIdByPathByVersion(
        $game_id
        , $profile_id
        , $path
        , $version
    ) {         
        return $this->act->DelGameProfileContentByGameIdByProfileIdByPathByVersion(
        $game_id
        , $profile_id
        , $path
        , $version
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
    ) {         
        return $this->act->DelGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileContentByGameIdByUsernameByPath(
        $game_id
        , $username
        , $path
    ) {         
        return $this->act->DelGameProfileContentByGameIdByUsernameByPath(
        $game_id
        , $username
        , $path
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileContentByGameIdByUsernameByPathByVersion(
        $game_id
        , $username
        , $path
        , $version
    ) {         
        return $this->act->DelGameProfileContentByGameIdByUsernameByPathByVersion(
        $game_id
        , $username
        , $path
        , $version
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
    ) {         
        return $this->act->DelGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameProfileContentList(
        ) {
            return $this->act->GetGameProfileContentList(
            );
        }
        
    public function GetGameProfileContent(
    ) {
        foreach($this->act->GetGameProfileContentList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileContentList(
    ) {
        return $this->CachedGetGameProfileContentList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameProfileContentList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileContentList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileContentList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileContentListByUuid(
        $uuid
        ) {
            return $this->act->GetGameProfileContentListByUuid(
                $uuid
            );
        }
        
    public function GetGameProfileContentByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameProfileContentListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileContentListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameProfileContentListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameProfileContentListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileContentListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileContentListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileContentListByGameIdByProfileId(
        $game_id
        , $profile_id
        ) {
            return $this->act->GetGameProfileContentListByGameIdByProfileId(
                $game_id
                , $profile_id
            );
        }
        
    public function GetGameProfileContentByGameIdByProfileId(
        $game_id
        , $profile_id
    ) {
        foreach($this->act->GetGameProfileContentListByGameIdByProfileId(
        $game_id
        , $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileContentListByGameIdByProfileId(
        $game_id
        , $profile_id
    ) {
        return $this->CachedGetGameProfileContentListByGameIdByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $profile_id
        );
    }
    */
        
    public function CachedGetGameProfileContentListByGameIdByProfileId(
        $overrideCache
        , $cacheHours
        , $game_id
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileContentListByGameIdByProfileId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileContentListByGameIdByProfileId(
                $game_id
                , $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileContentListByGameIdByUsername(
        $game_id
        , $username
        ) {
            return $this->act->GetGameProfileContentListByGameIdByUsername(
                $game_id
                , $username
            );
        }
        
    public function GetGameProfileContentByGameIdByUsername(
        $game_id
        , $username
    ) {
        foreach($this->act->GetGameProfileContentListByGameIdByUsername(
        $game_id
        , $username
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileContentListByGameIdByUsername(
        $game_id
        , $username
    ) {
        return $this->CachedGetGameProfileContentListByGameIdByUsername(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $username
        );
    }
    */
        
    public function CachedGetGameProfileContentListByGameIdByUsername(
        $overrideCache
        , $cacheHours
        , $game_id
        , $username
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileContentListByGameIdByUsername";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$username");
        $sb += "_";
        $sb += $username;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileContentListByGameIdByUsername(
                $game_id
                , $username
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileContentListByUsername(
        $username
        ) {
            return $this->act->GetGameProfileContentListByUsername(
                $username
            );
        }
        
    public function GetGameProfileContentByUsername(
        $username
    ) {
        foreach($this->act->GetGameProfileContentListByUsername(
        $username
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileContentListByUsername(
        $username
    ) {
        return $this->CachedGetGameProfileContentListByUsername(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $username
        );
    }
    */
        
    public function CachedGetGameProfileContentListByUsername(
        $overrideCache
        , $cacheHours
        , $username
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileContentListByUsername";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$username");
        $sb += "_";
        $sb += $username;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileContentListByUsername(
                $username
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileContentListByGameIdByProfileIdByPath(
        $game_id
        , $profile_id
        , $path
        ) {
            return $this->act->GetGameProfileContentListByGameIdByProfileIdByPath(
                $game_id
                , $profile_id
                , $path
            );
        }
        
    public function GetGameProfileContentByGameIdByProfileIdByPath(
        $game_id
        , $profile_id
        , $path
    ) {
        foreach($this->act->GetGameProfileContentListByGameIdByProfileIdByPath(
        $game_id
        , $profile_id
        , $path
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileContentListByGameIdByProfileIdByPath(
        $game_id
        , $profile_id
        , $path
    ) {
        return $this->CachedGetGameProfileContentListByGameIdByProfileIdByPath(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $profile_id
            , $path
        );
    }
    */
        
    public function CachedGetGameProfileContentListByGameIdByProfileIdByPath(
        $overrideCache
        , $cacheHours
        , $game_id
        , $profile_id
        , $path
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileContentListByGameIdByProfileIdByPath";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$path");
        $sb += "_";
        $sb += $path;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileContentListByGameIdByProfileIdByPath(
                $game_id
                , $profile_id
                , $path
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileContentListByGameIdByProfileIdByPathByVersion(
        $game_id
        , $profile_id
        , $path
        , $version
        ) {
            return $this->act->GetGameProfileContentListByGameIdByProfileIdByPathByVersion(
                $game_id
                , $profile_id
                , $path
                , $version
            );
        }
        
    public function GetGameProfileContentByGameIdByProfileIdByPathByVersion(
        $game_id
        , $profile_id
        , $path
        , $version
    ) {
        foreach($this->act->GetGameProfileContentListByGameIdByProfileIdByPathByVersion(
        $game_id
        , $profile_id
        , $path
        , $version
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileContentListByGameIdByProfileIdByPathByVersion(
        $game_id
        , $profile_id
        , $path
        , $version
    ) {
        return $this->CachedGetGameProfileContentListByGameIdByProfileIdByPathByVersion(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $profile_id
            , $path
            , $version
        );
    }
    */
        
    public function CachedGetGameProfileContentListByGameIdByProfileIdByPathByVersion(
        $overrideCache
        , $cacheHours
        , $game_id
        , $profile_id
        , $path
        , $version
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileContentListByGameIdByProfileIdByPathByVersion";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$path");
        $sb += "_";
        $sb += $path;
        $sb += "_";
        $sb += strtolower("$version");
        $sb += "_";
        $sb += $version;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileContentListByGameIdByProfileIdByPathByVersion(
                $game_id
                , $profile_id
                , $path
                , $version
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
        ) {
            return $this->act->GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
                $game_id
                , $profile_id
                , $path
                , $version
                , $platform
                , $increment
            );
        }
        
    public function GetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
    ) {
        foreach($this->act->GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
    ) {
        return $this->CachedGetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $profile_id
            , $path
            , $version
            , $platform
            , $increment
        );
    }
    */
        
    public function CachedGetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
        $overrideCache
        , $cacheHours
        , $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$path");
        $sb += "_";
        $sb += $path;
        $sb += "_";
        $sb += strtolower("$version");
        $sb += "_";
        $sb += $version;
        $sb += "_";
        $sb += strtolower("$platform");
        $sb += "_";
        $sb += $platform;
        $sb += "_";
        $sb += strtolower("$increment");
        $sb += "_";
        $sb += $increment;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
                $game_id
                , $profile_id
                , $path
                , $version
                , $platform
                , $increment
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileContentListByGameIdByUsernameByPath(
        $game_id
        , $username
        , $path
        ) {
            return $this->act->GetGameProfileContentListByGameIdByUsernameByPath(
                $game_id
                , $username
                , $path
            );
        }
        
    public function GetGameProfileContentByGameIdByUsernameByPath(
        $game_id
        , $username
        , $path
    ) {
        foreach($this->act->GetGameProfileContentListByGameIdByUsernameByPath(
        $game_id
        , $username
        , $path
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileContentListByGameIdByUsernameByPath(
        $game_id
        , $username
        , $path
    ) {
        return $this->CachedGetGameProfileContentListByGameIdByUsernameByPath(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $username
            , $path
        );
    }
    */
        
    public function CachedGetGameProfileContentListByGameIdByUsernameByPath(
        $overrideCache
        , $cacheHours
        , $game_id
        , $username
        , $path
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileContentListByGameIdByUsernameByPath";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$username");
        $sb += "_";
        $sb += $username;
        $sb += "_";
        $sb += strtolower("$path");
        $sb += "_";
        $sb += $path;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileContentListByGameIdByUsernameByPath(
                $game_id
                , $username
                , $path
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileContentListByGameIdByUsernameByPathByVersion(
        $game_id
        , $username
        , $path
        , $version
        ) {
            return $this->act->GetGameProfileContentListByGameIdByUsernameByPathByVersion(
                $game_id
                , $username
                , $path
                , $version
            );
        }
        
    public function GetGameProfileContentByGameIdByUsernameByPathByVersion(
        $game_id
        , $username
        , $path
        , $version
    ) {
        foreach($this->act->GetGameProfileContentListByGameIdByUsernameByPathByVersion(
        $game_id
        , $username
        , $path
        , $version
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileContentListByGameIdByUsernameByPathByVersion(
        $game_id
        , $username
        , $path
        , $version
    ) {
        return $this->CachedGetGameProfileContentListByGameIdByUsernameByPathByVersion(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $username
            , $path
            , $version
        );
    }
    */
        
    public function CachedGetGameProfileContentListByGameIdByUsernameByPathByVersion(
        $overrideCache
        , $cacheHours
        , $game_id
        , $username
        , $path
        , $version
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileContentListByGameIdByUsernameByPathByVersion";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$username");
        $sb += "_";
        $sb += $username;
        $sb += "_";
        $sb += strtolower("$path");
        $sb += "_";
        $sb += $path;
        $sb += "_";
        $sb += strtolower("$version");
        $sb += "_";
        $sb += $version;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileContentListByGameIdByUsernameByPathByVersion(
                $game_id
                , $username
                , $path
                , $version
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
        ) {
            return $this->act->GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
                $game_id
                , $username
                , $path
                , $version
                , $platform
                , $increment
            );
        }
        
    public function GetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
    ) {
        foreach($this->act->GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
    ) {
        return $this->CachedGetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $username
            , $path
            , $version
            , $platform
            , $increment
        );
    }
    */
        
    public function CachedGetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
        $overrideCache
        , $cacheHours
        , $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$username");
        $sb += "_";
        $sb += $username;
        $sb += "_";
        $sb += strtolower("$path");
        $sb += "_";
        $sb += $path;
        $sb += "_";
        $sb += strtolower("$version");
        $sb += "_";
        $sb += $version;
        $sb += "_";
        $sb += strtolower("$platform");
        $sb += "_";
        $sb += $platform;
        $sb += "_";
        $sb += strtolower("$increment");
        $sb += "_";
        $sb += $increment;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
                $game_id
                , $username
                , $path
                , $version
                , $platform
                , $increment
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameApp(
    ) {      
        return $this->act->CountGameApp(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAppByUuid(
        $uuid
    ) {      
        return $this->act->CountGameAppByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAppByGameId(
        $game_id
    ) {      
        return $this->act->CountGameAppByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAppByAppId(
        $app_id
    ) {      
        return $this->act->CountGameAppByAppId(
        $app_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAppByGameIdByAppId(
        $game_id
        , $app_id
    ) {      
        return $this->act->CountGameAppByGameIdByAppId(
        $game_id
        , $app_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameAppListByFilter($filter_obj) {
        return $this->act->BrowseGameAppListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAppByUuid($set_type, $obj) {
        return $this->act->SetGameAppByUuid($set_type, $obj);
    }
               
    public function SetGameAppByUuidFull($obj) {
        return $this->act->SetGameAppByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameAppByUuid(
        $uuid
    ) {         
        return $this->act->DelGameAppByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameAppList(
        ) {
            return $this->act->GetGameAppList(
            );
        }
        
    public function GetGameApp(
    ) {
        foreach($this->act->GetGameAppList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAppList(
    ) {
        return $this->CachedGetGameAppList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameAppList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameAppList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameApp>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAppList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAppListByUuid(
        $uuid
        ) {
            return $this->act->GetGameAppListByUuid(
                $uuid
            );
        }
        
    public function GetGameAppByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameAppListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAppListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameAppListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameAppListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameAppListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameApp>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAppListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAppListByGameId(
        $game_id
        ) {
            return $this->act->GetGameAppListByGameId(
                $game_id
            );
        }
        
    public function GetGameAppByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameAppListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAppListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameAppListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameAppListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameAppListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameApp>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAppListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAppListByAppId(
        $app_id
        ) {
            return $this->act->GetGameAppListByAppId(
                $app_id
            );
        }
        
    public function GetGameAppByAppId(
        $app_id
    ) {
        foreach($this->act->GetGameAppListByAppId(
        $app_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAppListByAppId(
        $app_id
    ) {
        return $this->CachedGetGameAppListByAppId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $app_id
        );
    }
    */
        
    public function CachedGetGameAppListByAppId(
        $overrideCache
        , $cacheHours
        , $app_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameAppListByAppId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$app_id");
        $sb += "_";
        $sb += $app_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameApp>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAppListByAppId(
                $app_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAppListByGameIdByAppId(
        $game_id
        , $app_id
        ) {
            return $this->act->GetGameAppListByGameIdByAppId(
                $game_id
                , $app_id
            );
        }
        
    public function GetGameAppByGameIdByAppId(
        $game_id
        , $app_id
    ) {
        foreach($this->act->GetGameAppListByGameIdByAppId(
        $game_id
        , $app_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAppListByGameIdByAppId(
        $game_id
        , $app_id
    ) {
        return $this->CachedGetGameAppListByGameIdByAppId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $app_id
        );
    }
    */
        
    public function CachedGetGameAppListByGameIdByAppId(
        $overrideCache
        , $cacheHours
        , $game_id
        , $app_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameAppListByGameIdByAppId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$app_id");
        $sb += "_";
        $sb += $app_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameApp>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAppListByGameIdByAppId(
                $game_id
                , $app_id
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
    public function CountProfileGameLocation(
    ) {      
        return $this->act->CountProfileGameLocation(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameLocationByUuid(
        $uuid
    ) {      
        return $this->act->CountProfileGameLocationByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameLocationByGameLocationId(
        $game_location_id
    ) {      
        return $this->act->CountProfileGameLocationByGameLocationId(
        $game_location_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameLocationByProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileGameLocationByProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameLocationByProfileIdByGameLocationId(
        $profile_id
        , $game_location_id
    ) {      
        return $this->act->CountProfileGameLocationByProfileIdByGameLocationId(
        $profile_id
        , $game_location_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileGameLocationListByFilter($filter_obj) {
        return $this->act->BrowseProfileGameLocationListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileGameLocationByUuid($set_type, $obj) {
        return $this->act->SetProfileGameLocationByUuid($set_type, $obj);
    }
               
    public function SetProfileGameLocationByUuidFull($obj) {
        return $this->act->SetProfileGameLocationByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileGameLocationByUuid(
        $uuid
    ) {         
        return $this->act->DelProfileGameLocationByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileGameLocationList(
        ) {
            return $this->act->GetProfileGameLocationList(
            );
        }
        
    public function GetProfileGameLocation(
    ) {
        foreach($this->act->GetProfileGameLocationList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameLocationList(
    ) {
        return $this->CachedGetProfileGameLocationList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetProfileGameLocationList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameLocationList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileGameLocation>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileGameLocationList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameLocationListByUuid(
        $uuid
        ) {
            return $this->act->GetProfileGameLocationListByUuid(
                $uuid
            );
        }
        
    public function GetProfileGameLocationByUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileGameLocationListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameLocationListByUuid(
        $uuid
    ) {
        return $this->CachedGetProfileGameLocationListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileGameLocationListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameLocationListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileGameLocation>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileGameLocationListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameLocationListByGameLocationId(
        $game_location_id
        ) {
            return $this->act->GetProfileGameLocationListByGameLocationId(
                $game_location_id
            );
        }
        
    public function GetProfileGameLocationByGameLocationId(
        $game_location_id
    ) {
        foreach($this->act->GetProfileGameLocationListByGameLocationId(
        $game_location_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameLocationListByGameLocationId(
        $game_location_id
    ) {
        return $this->CachedGetProfileGameLocationListByGameLocationId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_location_id
        );
    }
    */
        
    public function CachedGetProfileGameLocationListByGameLocationId(
        $overrideCache
        , $cacheHours
        , $game_location_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameLocationListByGameLocationId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_location_id");
        $sb += "_";
        $sb += $game_location_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileGameLocation>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileGameLocationListByGameLocationId(
                $game_location_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameLocationListByProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileGameLocationListByProfileId(
                $profile_id
            );
        }
        
    public function GetProfileGameLocationByProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileGameLocationListByProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameLocationListByProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileGameLocationListByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileGameLocationListByProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameLocationListByProfileId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileGameLocation>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileGameLocationListByProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameLocationListByProfileIdByGameLocationId(
        $profile_id
        , $game_location_id
        ) {
            return $this->act->GetProfileGameLocationListByProfileIdByGameLocationId(
                $profile_id
                , $game_location_id
            );
        }
        
    public function GetProfileGameLocationByProfileIdByGameLocationId(
        $profile_id
        , $game_location_id
    ) {
        foreach($this->act->GetProfileGameLocationListByProfileIdByGameLocationId(
        $profile_id
        , $game_location_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameLocationListByProfileIdByGameLocationId(
        $profile_id
        , $game_location_id
    ) {
        return $this->CachedGetProfileGameLocationListByProfileIdByGameLocationId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_location_id
        );
    }
    */
        
    public function CachedGetProfileGameLocationListByProfileIdByGameLocationId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_location_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameLocationListByProfileIdByGameLocationId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$game_location_id");
        $sb += "_";
        $sb += $game_location_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileGameLocation>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileGameLocationListByProfileIdByGameLocationId(
                $profile_id
                , $game_location_id
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
              
#------------------------------------------------------------------------------                    
    public function CountGameRpgItemWeapon(
    ) {      
        return $this->act->CountGameRpgItemWeapon(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameRpgItemWeaponByUuid(
        $uuid
    ) {      
        return $this->act->CountGameRpgItemWeaponByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameRpgItemWeaponByGameId(
        $game_id
    ) {      
        return $this->act->CountGameRpgItemWeaponByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameRpgItemWeaponByUrl(
        $url
    ) {      
        return $this->act->CountGameRpgItemWeaponByUrl(
        $url
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameRpgItemWeaponByUrlByGameId(
        $url
        , $game_id
    ) {      
        return $this->act->CountGameRpgItemWeaponByUrlByGameId(
        $url
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameRpgItemWeaponByUuidByGameId(
        $uuid
        , $game_id
    ) {      
        return $this->act->CountGameRpgItemWeaponByUuidByGameId(
        $uuid
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameRpgItemWeaponListByFilter($filter_obj) {
        return $this->act->BrowseGameRpgItemWeaponListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameRpgItemWeaponByUuid($set_type, $obj) {
        return $this->act->SetGameRpgItemWeaponByUuid($set_type, $obj);
    }
               
    public function SetGameRpgItemWeaponByUuidFull($obj) {
        return $this->act->SetGameRpgItemWeaponByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameRpgItemWeaponByGameId($set_type, $obj) {
        return $this->act->SetGameRpgItemWeaponByGameId($set_type, $obj);
    }
               
    public function SetGameRpgItemWeaponByGameIdFull($obj) {
        return $this->act->SetGameRpgItemWeaponByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameRpgItemWeaponByUrl($set_type, $obj) {
        return $this->act->SetGameRpgItemWeaponByUrl($set_type, $obj);
    }
               
    public function SetGameRpgItemWeaponByUrlFull($obj) {
        return $this->act->SetGameRpgItemWeaponByUrl('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameRpgItemWeaponByUrlByGameId($set_type, $obj) {
        return $this->act->SetGameRpgItemWeaponByUrlByGameId($set_type, $obj);
    }
               
    public function SetGameRpgItemWeaponByUrlByGameIdFull($obj) {
        return $this->act->SetGameRpgItemWeaponByUrlByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameRpgItemWeaponByUuidByGameId($set_type, $obj) {
        return $this->act->SetGameRpgItemWeaponByUuidByGameId($set_type, $obj);
    }
               
    public function SetGameRpgItemWeaponByUuidByGameIdFull($obj) {
        return $this->act->SetGameRpgItemWeaponByUuidByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameRpgItemWeaponByUuid(
        $uuid
    ) {         
        return $this->act->DelGameRpgItemWeaponByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameRpgItemWeaponByGameId(
        $game_id
    ) {         
        return $this->act->DelGameRpgItemWeaponByGameId(
        $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameRpgItemWeaponByUrl(
        $url
    ) {         
        return $this->act->DelGameRpgItemWeaponByUrl(
        $url
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameRpgItemWeaponByUrlByGameId(
        $url
        , $game_id
    ) {         
        return $this->act->DelGameRpgItemWeaponByUrlByGameId(
        $url
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameRpgItemWeaponByUuidByGameId(
        $uuid
        , $game_id
    ) {         
        return $this->act->DelGameRpgItemWeaponByUuidByGameId(
        $uuid
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameRpgItemWeaponList(
        ) {
            return $this->act->GetGameRpgItemWeaponList(
            );
        }
        
    public function GetGameRpgItemWeapon(
    ) {
        foreach($this->act->GetGameRpgItemWeaponList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameRpgItemWeaponList(
    ) {
        return $this->CachedGetGameRpgItemWeaponList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameRpgItemWeaponList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameRpgItemWeaponList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameRpgItemWeapon>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameRpgItemWeaponList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameRpgItemWeaponListByUuid(
        $uuid
        ) {
            return $this->act->GetGameRpgItemWeaponListByUuid(
                $uuid
            );
        }
        
    public function GetGameRpgItemWeaponByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameRpgItemWeaponListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameRpgItemWeaponListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameRpgItemWeaponListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameRpgItemWeaponListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameRpgItemWeaponListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameRpgItemWeapon>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameRpgItemWeaponListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameRpgItemWeaponListByGameId(
        $game_id
        ) {
            return $this->act->GetGameRpgItemWeaponListByGameId(
                $game_id
            );
        }
        
    public function GetGameRpgItemWeaponByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameRpgItemWeaponListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameRpgItemWeaponListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameRpgItemWeaponListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameRpgItemWeaponListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameRpgItemWeaponListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameRpgItemWeapon>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameRpgItemWeaponListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameRpgItemWeaponListByUrl(
        $url
        ) {
            return $this->act->GetGameRpgItemWeaponListByUrl(
                $url
            );
        }
        
    public function GetGameRpgItemWeaponByUrl(
        $url
    ) {
        foreach($this->act->GetGameRpgItemWeaponListByUrl(
        $url
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameRpgItemWeaponListByUrl(
        $url
    ) {
        return $this->CachedGetGameRpgItemWeaponListByUrl(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
        );
    }
    */
        
    public function CachedGetGameRpgItemWeaponListByUrl(
        $overrideCache
        , $cacheHours
        , $url
    ) {

        $objs = array();

        $method_name = "CachedGetGameRpgItemWeaponListByUrl";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$url");
        $sb += "_";
        $sb += $url;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameRpgItemWeapon>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameRpgItemWeaponListByUrl(
                $url
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameRpgItemWeaponListByUrlByGameId(
        $url
        , $game_id
        ) {
            return $this->act->GetGameRpgItemWeaponListByUrlByGameId(
                $url
                , $game_id
            );
        }
        
    public function GetGameRpgItemWeaponByUrlByGameId(
        $url
        , $game_id
    ) {
        foreach($this->act->GetGameRpgItemWeaponListByUrlByGameId(
        $url
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameRpgItemWeaponListByUrlByGameId(
        $url
        , $game_id
    ) {
        return $this->CachedGetGameRpgItemWeaponListByUrlByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
            , $game_id
        );
    }
    */
        
    public function CachedGetGameRpgItemWeaponListByUrlByGameId(
        $overrideCache
        , $cacheHours
        , $url
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameRpgItemWeaponListByUrlByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$url");
        $sb += "_";
        $sb += $url;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameRpgItemWeapon>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameRpgItemWeaponListByUrlByGameId(
                $url
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameRpgItemWeaponListByUuidByGameId(
        $uuid
        , $game_id
        ) {
            return $this->act->GetGameRpgItemWeaponListByUuidByGameId(
                $uuid
                , $game_id
            );
        }
        
    public function GetGameRpgItemWeaponByUuidByGameId(
        $uuid
        , $game_id
    ) {
        foreach($this->act->GetGameRpgItemWeaponListByUuidByGameId(
        $uuid
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameRpgItemWeaponListByUuidByGameId(
        $uuid
        , $game_id
    ) {
        return $this->CachedGetGameRpgItemWeaponListByUuidByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
            , $game_id
        );
    }
    */
        
    public function CachedGetGameRpgItemWeaponListByUuidByGameId(
        $overrideCache
        , $cacheHours
        , $uuid
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameRpgItemWeaponListByUuidByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameRpgItemWeapon>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameRpgItemWeaponListByUuidByGameId(
                $uuid
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameRpgItemSkill(
    ) {      
        return $this->act->CountGameRpgItemSkill(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameRpgItemSkillByUuid(
        $uuid
    ) {      
        return $this->act->CountGameRpgItemSkillByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameRpgItemSkillByGameId(
        $game_id
    ) {      
        return $this->act->CountGameRpgItemSkillByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameRpgItemSkillByUrl(
        $url
    ) {      
        return $this->act->CountGameRpgItemSkillByUrl(
        $url
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameRpgItemSkillByUrlByGameId(
        $url
        , $game_id
    ) {      
        return $this->act->CountGameRpgItemSkillByUrlByGameId(
        $url
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameRpgItemSkillByUuidByGameId(
        $uuid
        , $game_id
    ) {      
        return $this->act->CountGameRpgItemSkillByUuidByGameId(
        $uuid
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameRpgItemSkillListByFilter($filter_obj) {
        return $this->act->BrowseGameRpgItemSkillListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameRpgItemSkillByUuid($set_type, $obj) {
        return $this->act->SetGameRpgItemSkillByUuid($set_type, $obj);
    }
               
    public function SetGameRpgItemSkillByUuidFull($obj) {
        return $this->act->SetGameRpgItemSkillByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameRpgItemSkillByGameId($set_type, $obj) {
        return $this->act->SetGameRpgItemSkillByGameId($set_type, $obj);
    }
               
    public function SetGameRpgItemSkillByGameIdFull($obj) {
        return $this->act->SetGameRpgItemSkillByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameRpgItemSkillByUrl($set_type, $obj) {
        return $this->act->SetGameRpgItemSkillByUrl($set_type, $obj);
    }
               
    public function SetGameRpgItemSkillByUrlFull($obj) {
        return $this->act->SetGameRpgItemSkillByUrl('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameRpgItemSkillByUrlByGameId($set_type, $obj) {
        return $this->act->SetGameRpgItemSkillByUrlByGameId($set_type, $obj);
    }
               
    public function SetGameRpgItemSkillByUrlByGameIdFull($obj) {
        return $this->act->SetGameRpgItemSkillByUrlByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameRpgItemSkillByUuidByGameId($set_type, $obj) {
        return $this->act->SetGameRpgItemSkillByUuidByGameId($set_type, $obj);
    }
               
    public function SetGameRpgItemSkillByUuidByGameIdFull($obj) {
        return $this->act->SetGameRpgItemSkillByUuidByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameRpgItemSkillByUuid(
        $uuid
    ) {         
        return $this->act->DelGameRpgItemSkillByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameRpgItemSkillByGameId(
        $game_id
    ) {         
        return $this->act->DelGameRpgItemSkillByGameId(
        $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameRpgItemSkillByUrl(
        $url
    ) {         
        return $this->act->DelGameRpgItemSkillByUrl(
        $url
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameRpgItemSkillByUrlByGameId(
        $url
        , $game_id
    ) {         
        return $this->act->DelGameRpgItemSkillByUrlByGameId(
        $url
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameRpgItemSkillByUuidByGameId(
        $uuid
        , $game_id
    ) {         
        return $this->act->DelGameRpgItemSkillByUuidByGameId(
        $uuid
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameRpgItemSkillList(
        ) {
            return $this->act->GetGameRpgItemSkillList(
            );
        }
        
    public function GetGameRpgItemSkill(
    ) {
        foreach($this->act->GetGameRpgItemSkillList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameRpgItemSkillList(
    ) {
        return $this->CachedGetGameRpgItemSkillList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameRpgItemSkillList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameRpgItemSkillList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameRpgItemSkill>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameRpgItemSkillList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameRpgItemSkillListByUuid(
        $uuid
        ) {
            return $this->act->GetGameRpgItemSkillListByUuid(
                $uuid
            );
        }
        
    public function GetGameRpgItemSkillByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameRpgItemSkillListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameRpgItemSkillListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameRpgItemSkillListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameRpgItemSkillListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameRpgItemSkillListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameRpgItemSkill>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameRpgItemSkillListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameRpgItemSkillListByGameId(
        $game_id
        ) {
            return $this->act->GetGameRpgItemSkillListByGameId(
                $game_id
            );
        }
        
    public function GetGameRpgItemSkillByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameRpgItemSkillListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameRpgItemSkillListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameRpgItemSkillListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameRpgItemSkillListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameRpgItemSkillListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameRpgItemSkill>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameRpgItemSkillListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameRpgItemSkillListByUrl(
        $url
        ) {
            return $this->act->GetGameRpgItemSkillListByUrl(
                $url
            );
        }
        
    public function GetGameRpgItemSkillByUrl(
        $url
    ) {
        foreach($this->act->GetGameRpgItemSkillListByUrl(
        $url
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameRpgItemSkillListByUrl(
        $url
    ) {
        return $this->CachedGetGameRpgItemSkillListByUrl(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
        );
    }
    */
        
    public function CachedGetGameRpgItemSkillListByUrl(
        $overrideCache
        , $cacheHours
        , $url
    ) {

        $objs = array();

        $method_name = "CachedGetGameRpgItemSkillListByUrl";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$url");
        $sb += "_";
        $sb += $url;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameRpgItemSkill>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameRpgItemSkillListByUrl(
                $url
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameRpgItemSkillListByUrlByGameId(
        $url
        , $game_id
        ) {
            return $this->act->GetGameRpgItemSkillListByUrlByGameId(
                $url
                , $game_id
            );
        }
        
    public function GetGameRpgItemSkillByUrlByGameId(
        $url
        , $game_id
    ) {
        foreach($this->act->GetGameRpgItemSkillListByUrlByGameId(
        $url
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameRpgItemSkillListByUrlByGameId(
        $url
        , $game_id
    ) {
        return $this->CachedGetGameRpgItemSkillListByUrlByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
            , $game_id
        );
    }
    */
        
    public function CachedGetGameRpgItemSkillListByUrlByGameId(
        $overrideCache
        , $cacheHours
        , $url
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameRpgItemSkillListByUrlByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$url");
        $sb += "_";
        $sb += $url;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameRpgItemSkill>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameRpgItemSkillListByUrlByGameId(
                $url
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameRpgItemSkillListByUuidByGameId(
        $uuid
        , $game_id
        ) {
            return $this->act->GetGameRpgItemSkillListByUuidByGameId(
                $uuid
                , $game_id
            );
        }
        
    public function GetGameRpgItemSkillByUuidByGameId(
        $uuid
        , $game_id
    ) {
        foreach($this->act->GetGameRpgItemSkillListByUuidByGameId(
        $uuid
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameRpgItemSkillListByUuidByGameId(
        $uuid
        , $game_id
    ) {
        return $this->CachedGetGameRpgItemSkillListByUuidByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
            , $game_id
        );
    }
    */
        
    public function CachedGetGameRpgItemSkillListByUuidByGameId(
        $overrideCache
        , $cacheHours
        , $uuid
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameRpgItemSkillListByUuidByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameRpgItemSkill>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameRpgItemSkillListByUuidByGameId(
                $uuid
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameProduct(
    ) {      
        return $this->act->CountGameProduct(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProductByUuid(
        $uuid
    ) {      
        return $this->act->CountGameProductByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProductByGameId(
        $game_id
    ) {      
        return $this->act->CountGameProductByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProductByUrl(
        $url
    ) {      
        return $this->act->CountGameProductByUrl(
        $url
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProductByUrlByGameId(
        $url
        , $game_id
    ) {      
        return $this->act->CountGameProductByUrlByGameId(
        $url
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProductByUuidByGameId(
        $uuid
        , $game_id
    ) {      
        return $this->act->CountGameProductByUuidByGameId(
        $uuid
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameProductListByFilter($filter_obj) {
        return $this->act->BrowseGameProductListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProductByUuid($set_type, $obj) {
        return $this->act->SetGameProductByUuid($set_type, $obj);
    }
               
    public function SetGameProductByUuidFull($obj) {
        return $this->act->SetGameProductByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProductByGameId($set_type, $obj) {
        return $this->act->SetGameProductByGameId($set_type, $obj);
    }
               
    public function SetGameProductByGameIdFull($obj) {
        return $this->act->SetGameProductByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProductByUrl($set_type, $obj) {
        return $this->act->SetGameProductByUrl($set_type, $obj);
    }
               
    public function SetGameProductByUrlFull($obj) {
        return $this->act->SetGameProductByUrl('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProductByUrlByGameId($set_type, $obj) {
        return $this->act->SetGameProductByUrlByGameId($set_type, $obj);
    }
               
    public function SetGameProductByUrlByGameIdFull($obj) {
        return $this->act->SetGameProductByUrlByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProductByUuidByGameId($set_type, $obj) {
        return $this->act->SetGameProductByUuidByGameId($set_type, $obj);
    }
               
    public function SetGameProductByUuidByGameIdFull($obj) {
        return $this->act->SetGameProductByUuidByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameProductByUuid(
        $uuid
    ) {         
        return $this->act->DelGameProductByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProductByGameId(
        $game_id
    ) {         
        return $this->act->DelGameProductByGameId(
        $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProductByUrl(
        $url
    ) {         
        return $this->act->DelGameProductByUrl(
        $url
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProductByUrlByGameId(
        $url
        , $game_id
    ) {         
        return $this->act->DelGameProductByUrlByGameId(
        $url
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProductByUuidByGameId(
        $uuid
        , $game_id
    ) {         
        return $this->act->DelGameProductByUuidByGameId(
        $uuid
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameProductList(
        ) {
            return $this->act->GetGameProductList(
            );
        }
        
    public function GetGameProduct(
    ) {
        foreach($this->act->GetGameProductList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProductList(
    ) {
        return $this->CachedGetGameProductList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameProductList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameProductList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProduct>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProductList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProductListByUuid(
        $uuid
        ) {
            return $this->act->GetGameProductListByUuid(
                $uuid
            );
        }
        
    public function GetGameProductByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameProductListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProductListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameProductListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameProductListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameProductListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProduct>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProductListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProductListByGameId(
        $game_id
        ) {
            return $this->act->GetGameProductListByGameId(
                $game_id
            );
        }
        
    public function GetGameProductByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameProductListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProductListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameProductListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProductListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProductListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProduct>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProductListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProductListByUrl(
        $url
        ) {
            return $this->act->GetGameProductListByUrl(
                $url
            );
        }
        
    public function GetGameProductByUrl(
        $url
    ) {
        foreach($this->act->GetGameProductListByUrl(
        $url
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProductListByUrl(
        $url
    ) {
        return $this->CachedGetGameProductListByUrl(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
        );
    }
    */
        
    public function CachedGetGameProductListByUrl(
        $overrideCache
        , $cacheHours
        , $url
    ) {

        $objs = array();

        $method_name = "CachedGetGameProductListByUrl";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$url");
        $sb += "_";
        $sb += $url;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProduct>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProductListByUrl(
                $url
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProductListByUrlByGameId(
        $url
        , $game_id
        ) {
            return $this->act->GetGameProductListByUrlByGameId(
                $url
                , $game_id
            );
        }
        
    public function GetGameProductByUrlByGameId(
        $url
        , $game_id
    ) {
        foreach($this->act->GetGameProductListByUrlByGameId(
        $url
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProductListByUrlByGameId(
        $url
        , $game_id
    ) {
        return $this->CachedGetGameProductListByUrlByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProductListByUrlByGameId(
        $overrideCache
        , $cacheHours
        , $url
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProductListByUrlByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$url");
        $sb += "_";
        $sb += $url;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProduct>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProductListByUrlByGameId(
                $url
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProductListByUuidByGameId(
        $uuid
        , $game_id
        ) {
            return $this->act->GetGameProductListByUuidByGameId(
                $uuid
                , $game_id
            );
        }
        
    public function GetGameProductByUuidByGameId(
        $uuid
        , $game_id
    ) {
        foreach($this->act->GetGameProductListByUuidByGameId(
        $uuid
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProductListByUuidByGameId(
        $uuid
        , $game_id
    ) {
        return $this->CachedGetGameProductListByUuidByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProductListByUuidByGameId(
        $overrideCache
        , $cacheHours
        , $uuid
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProductListByUuidByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProduct>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProductListByUuidByGameId(
                $uuid
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboard(
    ) {      
        return $this->act->CountGameStatisticLeaderboard(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardByUuid(
        $uuid
    ) {      
        return $this->act->CountGameStatisticLeaderboardByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardByKey(
        $key
    ) {      
        return $this->act->CountGameStatisticLeaderboardByKey(
        $key
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardByGameId(
        $game_id
    ) {      
        return $this->act->CountGameStatisticLeaderboardByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardByKeyByGameId(
        $key
        , $game_id
    ) {      
        return $this->act->CountGameStatisticLeaderboardByKeyByGameId(
        $key
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameStatisticLeaderboardByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameStatisticLeaderboardByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {      
        return $this->act->CountGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameStatisticLeaderboardListByFilter($filter_obj) {
        return $this->act->BrowseGameStatisticLeaderboardListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardByUuid($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardByUuid($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardByUuidFull($obj) {
        return $this->act->SetGameStatisticLeaderboardByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestampFull($obj) {
        return $this->act->SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardByProfileIdByKey($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardByProfileIdByKey($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardByProfileIdByKeyFull($obj) {
        return $this->act->SetGameStatisticLeaderboardByProfileIdByKey('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardByProfileIdByKeyByTimestampFull($obj) {
        return $this->act->SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestampFull($obj) {
        return $this->act->SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardByProfileIdByGameIdByKey($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardByProfileIdByGameIdByKey($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardByProfileIdByGameIdByKeyFull($obj) {
        return $this->act->SetGameStatisticLeaderboardByProfileIdByGameIdByKey('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardByUuid(
        $uuid
    ) {         
        return $this->act->DelGameStatisticLeaderboardByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardByKeyByGameId(
        $key
        , $game_id
    ) {         
        return $this->act->DelGameStatisticLeaderboardByKeyByGameId(
        $key
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameStatisticLeaderboardByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameStatisticLeaderboardByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardList(
        ) {
            return $this->act->GetGameStatisticLeaderboardList(
            );
        }
        
    public function GetGameStatisticLeaderboard(
    ) {
        foreach($this->act->GetGameStatisticLeaderboardList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardList(
    ) {
        return $this->CachedGetGameStatisticLeaderboardList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardListByUuid(
        $uuid
        ) {
            return $this->act->GetGameStatisticLeaderboardListByUuid(
                $uuid
            );
        }
        
    public function GetGameStatisticLeaderboardByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameStatisticLeaderboardListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameStatisticLeaderboardListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardListByKey(
        $key
        ) {
            return $this->act->GetGameStatisticLeaderboardListByKey(
                $key
            );
        }
        
    public function GetGameStatisticLeaderboardByKey(
        $key
    ) {
        foreach($this->act->GetGameStatisticLeaderboardListByKey(
        $key
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardListByKey(
        $key
    ) {
        return $this->CachedGetGameStatisticLeaderboardListByKey(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardListByKey(
        $overrideCache
        , $cacheHours
        , $key
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardListByKey";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardListByKey(
                $key
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardListByGameId(
        $game_id
        ) {
            return $this->act->GetGameStatisticLeaderboardListByGameId(
                $game_id
            );
        }
        
    public function GetGameStatisticLeaderboardByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameStatisticLeaderboardListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameStatisticLeaderboardListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardListByKeyByGameId(
        $key
        , $game_id
        ) {
            return $this->act->GetGameStatisticLeaderboardListByKeyByGameId(
                $key
                , $game_id
            );
        }
        
    public function GetGameStatisticLeaderboardByKeyByGameId(
        $key
        , $game_id
    ) {
        foreach($this->act->GetGameStatisticLeaderboardListByKeyByGameId(
        $key
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardListByKeyByGameId(
        $key
        , $game_id
    ) {
        return $this->CachedGetGameStatisticLeaderboardListByKeyByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardListByKeyByGameId(
        $overrideCache
        , $cacheHours
        , $key
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardListByKeyByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardListByKeyByGameId(
                $key
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetGameStatisticLeaderboardListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetGameStatisticLeaderboardByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameStatisticLeaderboardListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameStatisticLeaderboardListByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardListByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardListByProfileIdByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameStatisticLeaderboardByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$timestamp");
        $sb += "_";
        $sb += $timestamp;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        ) {
            return $this->act->GetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
                $key
                , $profile_id
                , $game_id
            );
        }
        
    public function GetGameStatisticLeaderboardByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $key
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardListByKeyByProfileIdByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
                $key
                , $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
                $key
                , $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$timestamp");
        $sb += "_";
        $sb += $timestamp;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
                $key
                , $profile_id
                , $game_id
                , $timestamp
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameLiveQueue(
    ) {      
        return $this->act->CountGameLiveQueue(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLiveQueueByUuid(
        $uuid
    ) {      
        return $this->act->CountGameLiveQueueByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLiveQueueByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameLiveQueueByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameLiveQueueListByFilter($filter_obj) {
        return $this->act->BrowseGameLiveQueueListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLiveQueueByUuid($set_type, $obj) {
        return $this->act->SetGameLiveQueueByUuid($set_type, $obj);
    }
               
    public function SetGameLiveQueueByUuidFull($obj) {
        return $this->act->SetGameLiveQueueByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLiveQueueByProfileIdByGameId($set_type, $obj) {
        return $this->act->SetGameLiveQueueByProfileIdByGameId($set_type, $obj);
    }
               
    public function SetGameLiveQueueByProfileIdByGameIdFull($obj) {
        return $this->act->SetGameLiveQueueByProfileIdByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameLiveQueueByUuid(
        $uuid
    ) {         
        return $this->act->DelGameLiveQueueByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameLiveQueueByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameLiveQueueByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameLiveQueueList(
        ) {
            return $this->act->GetGameLiveQueueList(
            );
        }
        
    public function GetGameLiveQueue(
    ) {
        foreach($this->act->GetGameLiveQueueList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLiveQueueList(
    ) {
        return $this->CachedGetGameLiveQueueList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameLiveQueueList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameLiveQueueList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLiveQueue>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLiveQueueList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLiveQueueListByUuid(
        $uuid
        ) {
            return $this->act->GetGameLiveQueueListByUuid(
                $uuid
            );
        }
        
    public function GetGameLiveQueueByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameLiveQueueListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLiveQueueListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameLiveQueueListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameLiveQueueListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameLiveQueueListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLiveQueue>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLiveQueueListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLiveQueueListByGameId(
        $game_id
        ) {
            return $this->act->GetGameLiveQueueListByGameId(
                $game_id
            );
        }
        
    public function GetGameLiveQueueByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameLiveQueueListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLiveQueueListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameLiveQueueListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameLiveQueueListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLiveQueueListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLiveQueue>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLiveQueueListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLiveQueueListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetGameLiveQueueListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetGameLiveQueueByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameLiveQueueListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLiveQueueListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameLiveQueueListByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameLiveQueueListByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLiveQueueListByProfileIdByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLiveQueue>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLiveQueueListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameLiveRecentQueue(
    ) {      
        return $this->act->CountGameLiveRecentQueue(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLiveRecentQueueByUuid(
        $uuid
    ) {      
        return $this->act->CountGameLiveRecentQueueByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLiveRecentQueueByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameLiveRecentQueueByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameLiveRecentQueueListByFilter($filter_obj) {
        return $this->act->BrowseGameLiveRecentQueueListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLiveRecentQueueByUuid($set_type, $obj) {
        return $this->act->SetGameLiveRecentQueueByUuid($set_type, $obj);
    }
               
    public function SetGameLiveRecentQueueByUuidFull($obj) {
        return $this->act->SetGameLiveRecentQueueByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLiveRecentQueueByProfileIdByGameId($set_type, $obj) {
        return $this->act->SetGameLiveRecentQueueByProfileIdByGameId($set_type, $obj);
    }
               
    public function SetGameLiveRecentQueueByProfileIdByGameIdFull($obj) {
        return $this->act->SetGameLiveRecentQueueByProfileIdByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameLiveRecentQueueByUuid(
        $uuid
    ) {         
        return $this->act->DelGameLiveRecentQueueByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameLiveRecentQueueByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameLiveRecentQueueByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameLiveRecentQueueList(
        ) {
            return $this->act->GetGameLiveRecentQueueList(
            );
        }
        
    public function GetGameLiveRecentQueue(
    ) {
        foreach($this->act->GetGameLiveRecentQueueList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLiveRecentQueueList(
    ) {
        return $this->CachedGetGameLiveRecentQueueList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameLiveRecentQueueList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameLiveRecentQueueList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLiveRecentQueue>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLiveRecentQueueList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLiveRecentQueueListByUuid(
        $uuid
        ) {
            return $this->act->GetGameLiveRecentQueueListByUuid(
                $uuid
            );
        }
        
    public function GetGameLiveRecentQueueByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameLiveRecentQueueListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLiveRecentQueueListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameLiveRecentQueueListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameLiveRecentQueueListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameLiveRecentQueueListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLiveRecentQueue>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLiveRecentQueueListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLiveRecentQueueListByGameId(
        $game_id
        ) {
            return $this->act->GetGameLiveRecentQueueListByGameId(
                $game_id
            );
        }
        
    public function GetGameLiveRecentQueueByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameLiveRecentQueueListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLiveRecentQueueListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameLiveRecentQueueListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameLiveRecentQueueListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLiveRecentQueueListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLiveRecentQueue>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLiveRecentQueueListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLiveRecentQueueListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetGameLiveRecentQueueListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetGameLiveRecentQueueByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameLiveRecentQueueListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLiveRecentQueueListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameLiveRecentQueueListByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameLiveRecentQueueListByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLiveRecentQueueListByProfileIdByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLiveRecentQueue>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLiveRecentQueueListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameStatistic(
    ) {      
        return $this->act->CountGameStatistic(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticByUuid(
        $uuid
    ) {      
        return $this->act->CountGameStatisticByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticByKey(
        $key
    ) {      
        return $this->act->CountGameStatisticByKey(
        $key
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticByGameId(
        $game_id
    ) {      
        return $this->act->CountGameStatisticByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticByKeyByGameId(
        $key
        , $game_id
    ) {      
        return $this->act->CountGameStatisticByKeyByGameId(
        $key
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameStatisticByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameStatisticByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {      
        return $this->act->CountGameStatisticByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameStatisticListByFilter($filter_obj) {
        return $this->act->BrowseGameStatisticListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticByUuid($set_type, $obj) {
        return $this->act->SetGameStatisticByUuid($set_type, $obj);
    }
               
    public function SetGameStatisticByUuidFull($obj) {
        return $this->act->SetGameStatisticByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticByUuidByProfileIdByGameIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameStatisticByUuidByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameStatisticByUuidByProfileIdByGameIdByTimestampFull($obj) {
        return $this->act->SetGameStatisticByUuidByProfileIdByGameIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticByProfileIdByKey($set_type, $obj) {
        return $this->act->SetGameStatisticByProfileIdByKey($set_type, $obj);
    }
               
    public function SetGameStatisticByProfileIdByKeyFull($obj) {
        return $this->act->SetGameStatisticByProfileIdByKey('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticByProfileIdByKeyByTimestamp($set_type, $obj) {
        return $this->act->SetGameStatisticByProfileIdByKeyByTimestamp($set_type, $obj);
    }
               
    public function SetGameStatisticByProfileIdByKeyByTimestampFull($obj) {
        return $this->act->SetGameStatisticByProfileIdByKeyByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameStatisticByKeyByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameStatisticByKeyByProfileIdByGameIdByTimestampFull($obj) {
        return $this->act->SetGameStatisticByKeyByProfileIdByGameIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticByProfileIdByGameIdByKey($set_type, $obj) {
        return $this->act->SetGameStatisticByProfileIdByGameIdByKey($set_type, $obj);
    }
               
    public function SetGameStatisticByProfileIdByGameIdByKeyFull($obj) {
        return $this->act->SetGameStatisticByProfileIdByGameIdByKey('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticByUuid(
        $uuid
    ) {         
        return $this->act->DelGameStatisticByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticByKeyByGameId(
        $key
        , $game_id
    ) {         
        return $this->act->DelGameStatisticByKeyByGameId(
        $key
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameStatisticByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameStatisticByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameStatisticListByUuid(
        $uuid
        ) {
            return $this->act->GetGameStatisticListByUuid(
                $uuid
            );
        }
        
    public function GetGameStatisticByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameStatisticListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameStatisticListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameStatisticListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatistic>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticListByKey(
        $key
        ) {
            return $this->act->GetGameStatisticListByKey(
                $key
            );
        }
        
    public function GetGameStatisticByKey(
        $key
    ) {
        foreach($this->act->GetGameStatisticListByKey(
        $key
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticListByKey(
        $key
    ) {
        return $this->CachedGetGameStatisticListByKey(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
        );
    }
    */
        
    public function CachedGetGameStatisticListByKey(
        $overrideCache
        , $cacheHours
        , $key
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticListByKey";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatistic>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticListByKey(
                $key
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticListByGameId(
        $game_id
        ) {
            return $this->act->GetGameStatisticListByGameId(
                $game_id
            );
        }
        
    public function GetGameStatisticByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameStatisticListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameStatisticListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatistic>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticListByKeyByGameId(
        $key
        , $game_id
        ) {
            return $this->act->GetGameStatisticListByKeyByGameId(
                $key
                , $game_id
            );
        }
        
    public function GetGameStatisticByKeyByGameId(
        $key
        , $game_id
    ) {
        foreach($this->act->GetGameStatisticListByKeyByGameId(
        $key
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticListByKeyByGameId(
        $key
        , $game_id
    ) {
        return $this->CachedGetGameStatisticListByKeyByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticListByKeyByGameId(
        $overrideCache
        , $cacheHours
        , $key
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticListByKeyByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatistic>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticListByKeyByGameId(
                $key
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetGameStatisticListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetGameStatisticByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameStatisticListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameStatisticListByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticListByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticListByProfileIdByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatistic>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameStatisticListByProfileIdByGameIdByTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameStatisticByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameStatisticListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameStatisticListByProfileIdByGameIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameStatisticListByProfileIdByGameIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticListByProfileIdByGameIdByTimestamp";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$timestamp");
        $sb += "_";
        $sb += $timestamp;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatistic>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticListByProfileIdByGameIdByTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        ) {
            return $this->act->GetGameStatisticListByKeyByProfileIdByGameId(
                $key
                , $profile_id
                , $game_id
            );
        }
        
    public function GetGameStatisticByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameStatisticListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameStatisticListByKeyByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticListByKeyByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $key
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticListByKeyByProfileIdByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatistic>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticListByKeyByProfileIdByGameId(
                $key
                , $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
                $key
                , $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameStatisticByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticListByKeyByProfileIdByGameIdByTimestamp";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$timestamp");
        $sb += "_";
        $sb += $timestamp;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatistic>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
                $key
                , $profile_id
                , $game_id
                , $timestamp
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameStatisticMeta(
    ) {      
        return $this->act->CountGameStatisticMeta(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticMetaByUuid(
        $uuid
    ) {      
        return $this->act->CountGameStatisticMetaByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticMetaByCode(
        $code
    ) {      
        return $this->act->CountGameStatisticMetaByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticMetaByName(
        $name
    ) {      
        return $this->act->CountGameStatisticMetaByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticMetaByKey(
        $key
    ) {      
        return $this->act->CountGameStatisticMetaByKey(
        $key
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticMetaByGameId(
        $game_id
    ) {      
        return $this->act->CountGameStatisticMetaByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticMetaByKeyByGameId(
        $key
        , $game_id
    ) {      
        return $this->act->CountGameStatisticMetaByKeyByGameId(
        $key
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameStatisticMetaListByFilter($filter_obj) {
        return $this->act->BrowseGameStatisticMetaListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticMetaByUuid($set_type, $obj) {
        return $this->act->SetGameStatisticMetaByUuid($set_type, $obj);
    }
               
    public function SetGameStatisticMetaByUuidFull($obj) {
        return $this->act->SetGameStatisticMetaByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticMetaByKeyByGameId($set_type, $obj) {
        return $this->act->SetGameStatisticMetaByKeyByGameId($set_type, $obj);
    }
               
    public function SetGameStatisticMetaByKeyByGameIdFull($obj) {
        return $this->act->SetGameStatisticMetaByKeyByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticMetaByUuid(
        $uuid
    ) {         
        return $this->act->DelGameStatisticMetaByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticMetaByKeyByGameId(
        $key
        , $game_id
    ) {         
        return $this->act->DelGameStatisticMetaByKeyByGameId(
        $key
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameStatisticMetaListByUuid(
        $uuid
        ) {
            return $this->act->GetGameStatisticMetaListByUuid(
                $uuid
            );
        }
        
    public function GetGameStatisticMetaByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameStatisticMetaListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticMetaListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameStatisticMetaListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameStatisticMetaListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticMetaListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticMeta>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticMetaListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticMetaListByCode(
        $code
        ) {
            return $this->act->GetGameStatisticMetaListByCode(
                $code
            );
        }
        
    public function GetGameStatisticMetaByCode(
        $code
    ) {
        foreach($this->act->GetGameStatisticMetaListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticMetaListByCode(
        $code
    ) {
        return $this->CachedGetGameStatisticMetaListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameStatisticMetaListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticMetaListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticMeta>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticMetaListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticMetaListByName(
        $name
        ) {
            return $this->act->GetGameStatisticMetaListByName(
                $name
            );
        }
        
    public function GetGameStatisticMetaByName(
        $name
    ) {
        foreach($this->act->GetGameStatisticMetaListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticMetaListByName(
        $name
    ) {
        return $this->CachedGetGameStatisticMetaListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetGameStatisticMetaListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticMetaListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticMeta>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticMetaListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticMetaListByKey(
        $key
        ) {
            return $this->act->GetGameStatisticMetaListByKey(
                $key
            );
        }
        
    public function GetGameStatisticMetaByKey(
        $key
    ) {
        foreach($this->act->GetGameStatisticMetaListByKey(
        $key
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticMetaListByKey(
        $key
    ) {
        return $this->CachedGetGameStatisticMetaListByKey(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
        );
    }
    */
        
    public function CachedGetGameStatisticMetaListByKey(
        $overrideCache
        , $cacheHours
        , $key
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticMetaListByKey";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticMeta>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticMetaListByKey(
                $key
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticMetaListByGameId(
        $game_id
        ) {
            return $this->act->GetGameStatisticMetaListByGameId(
                $game_id
            );
        }
        
    public function GetGameStatisticMetaByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameStatisticMetaListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticMetaListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameStatisticMetaListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticMetaListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticMetaListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticMeta>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticMetaListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticMetaListByKeyByGameId(
        $key
        , $game_id
        ) {
            return $this->act->GetGameStatisticMetaListByKeyByGameId(
                $key
                , $game_id
            );
        }
        
    public function GetGameStatisticMetaByKeyByGameId(
        $key
        , $game_id
    ) {
        foreach($this->act->GetGameStatisticMetaListByKeyByGameId(
        $key
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticMetaListByKeyByGameId(
        $key
        , $game_id
    ) {
        return $this->CachedGetGameStatisticMetaListByKeyByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticMetaListByKeyByGameId(
        $overrideCache
        , $cacheHours
        , $key
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticMetaListByKeyByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticMeta>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticMetaListByKeyByGameId(
                $key
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameStatisticTimestamp(
    ) {      
        return $this->act->CountGameStatisticTimestamp(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticTimestampByUuid(
        $uuid
    ) {      
        return $this->act->CountGameStatisticTimestampByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {      
        return $this->act->CountGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameStatisticTimestampListByFilter($filter_obj) {
        return $this->act->BrowseGameStatisticTimestampListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticTimestampByUuid($set_type, $obj) {
        return $this->act->SetGameStatisticTimestampByUuid($set_type, $obj);
    }
               
    public function SetGameStatisticTimestampByUuidFull($obj) {
        return $this->act->SetGameStatisticTimestampByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestampFull($obj) {
        return $this->act->SetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticTimestampByUuid(
        $uuid
    ) {         
        return $this->act->DelGameStatisticTimestampByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {         
        return $this->act->DelGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameStatisticTimestampListByUuid(
        $uuid
        ) {
            return $this->act->GetGameStatisticTimestampListByUuid(
                $uuid
            );
        }
        
    public function GetGameStatisticTimestampByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameStatisticTimestampListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticTimestampListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameStatisticTimestampListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameStatisticTimestampListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticTimestampListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticTimestamp>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticTimestampListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
                $key
                , $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$timestamp");
        $sb += "_";
        $sb += $timestamp;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticTimestamp>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
                $key
                , $profile_id
                , $game_id
                , $timestamp
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameKeyMeta(
    ) {      
        return $this->act->CountGameKeyMeta(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameKeyMetaByUuid(
        $uuid
    ) {      
        return $this->act->CountGameKeyMetaByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameKeyMetaByCode(
        $code
    ) {      
        return $this->act->CountGameKeyMetaByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameKeyMetaByName(
        $name
    ) {      
        return $this->act->CountGameKeyMetaByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameKeyMetaByKey(
        $key
    ) {      
        return $this->act->CountGameKeyMetaByKey(
        $key
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameKeyMetaByGameId(
        $game_id
    ) {      
        return $this->act->CountGameKeyMetaByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameKeyMetaByKeyByGameId(
        $key
        , $game_id
    ) {      
        return $this->act->CountGameKeyMetaByKeyByGameId(
        $key
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameKeyMetaListByFilter($filter_obj) {
        return $this->act->BrowseGameKeyMetaListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameKeyMetaByUuid($set_type, $obj) {
        return $this->act->SetGameKeyMetaByUuid($set_type, $obj);
    }
               
    public function SetGameKeyMetaByUuidFull($obj) {
        return $this->act->SetGameKeyMetaByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameKeyMetaByKeyByGameId($set_type, $obj) {
        return $this->act->SetGameKeyMetaByKeyByGameId($set_type, $obj);
    }
               
    public function SetGameKeyMetaByKeyByGameIdFull($obj) {
        return $this->act->SetGameKeyMetaByKeyByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameKeyMetaByKeyByGameIdByLevel($set_type, $obj) {
        return $this->act->SetGameKeyMetaByKeyByGameIdByLevel($set_type, $obj);
    }
               
    public function SetGameKeyMetaByKeyByGameIdByLevelFull($obj) {
        return $this->act->SetGameKeyMetaByKeyByGameIdByLevel('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameKeyMetaByUuid(
        $uuid
    ) {         
        return $this->act->DelGameKeyMetaByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameKeyMetaByKeyByGameId(
        $key
        , $game_id
    ) {         
        return $this->act->DelGameKeyMetaByKeyByGameId(
        $key
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameKeyMetaListByUuid(
        $uuid
        ) {
            return $this->act->GetGameKeyMetaListByUuid(
                $uuid
            );
        }
        
    public function GetGameKeyMetaByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameKeyMetaListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameKeyMetaListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameKeyMetaListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameKeyMetaListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameKeyMetaListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameKeyMeta>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameKeyMetaListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameKeyMetaListByCode(
        $code
        ) {
            return $this->act->GetGameKeyMetaListByCode(
                $code
            );
        }
        
    public function GetGameKeyMetaByCode(
        $code
    ) {
        foreach($this->act->GetGameKeyMetaListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameKeyMetaListByCode(
        $code
    ) {
        return $this->CachedGetGameKeyMetaListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameKeyMetaListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameKeyMetaListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameKeyMeta>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameKeyMetaListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameKeyMetaListByName(
        $name
        ) {
            return $this->act->GetGameKeyMetaListByName(
                $name
            );
        }
        
    public function GetGameKeyMetaByName(
        $name
    ) {
        foreach($this->act->GetGameKeyMetaListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameKeyMetaListByName(
        $name
    ) {
        return $this->CachedGetGameKeyMetaListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetGameKeyMetaListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetGameKeyMetaListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameKeyMeta>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameKeyMetaListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameKeyMetaListByKey(
        $key
        ) {
            return $this->act->GetGameKeyMetaListByKey(
                $key
            );
        }
        
    public function GetGameKeyMetaByKey(
        $key
    ) {
        foreach($this->act->GetGameKeyMetaListByKey(
        $key
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameKeyMetaListByKey(
        $key
    ) {
        return $this->CachedGetGameKeyMetaListByKey(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
        );
    }
    */
        
    public function CachedGetGameKeyMetaListByKey(
        $overrideCache
        , $cacheHours
        , $key
    ) {

        $objs = array();

        $method_name = "CachedGetGameKeyMetaListByKey";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameKeyMeta>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameKeyMetaListByKey(
                $key
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameKeyMetaListByGameId(
        $game_id
        ) {
            return $this->act->GetGameKeyMetaListByGameId(
                $game_id
            );
        }
        
    public function GetGameKeyMetaByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameKeyMetaListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameKeyMetaListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameKeyMetaListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameKeyMetaListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameKeyMetaListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameKeyMeta>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameKeyMetaListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameKeyMetaListByKeyByGameId(
        $key
        , $game_id
        ) {
            return $this->act->GetGameKeyMetaListByKeyByGameId(
                $key
                , $game_id
            );
        }
        
    public function GetGameKeyMetaByKeyByGameId(
        $key
        , $game_id
    ) {
        foreach($this->act->GetGameKeyMetaListByKeyByGameId(
        $key
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameKeyMetaListByKeyByGameId(
        $key
        , $game_id
    ) {
        return $this->CachedGetGameKeyMetaListByKeyByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $game_id
        );
    }
    */
        
    public function CachedGetGameKeyMetaListByKeyByGameId(
        $overrideCache
        , $cacheHours
        , $key
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameKeyMetaListByKeyByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameKeyMeta>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameKeyMetaListByKeyByGameId(
                $key
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameKeyMetaListByCodeByLevel(
        $code
        , $level
        ) {
            return $this->act->GetGameKeyMetaListByCodeByLevel(
                $code
                , $level
            );
        }
        
    public function GetGameKeyMetaByCodeByLevel(
        $code
        , $level
    ) {
        foreach($this->act->GetGameKeyMetaListByCodeByLevel(
        $code
        , $level
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameKeyMetaListByCodeByLevel(
        $code
        , $level
    ) {
        return $this->CachedGetGameKeyMetaListByCodeByLevel(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $level
        );
    }
    */
        
    public function CachedGetGameKeyMetaListByCodeByLevel(
        $overrideCache
        , $cacheHours
        , $code
        , $level
    ) {

        $objs = array();

        $method_name = "CachedGetGameKeyMetaListByCodeByLevel";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;
        $sb += "_";
        $sb += strtolower("$level");
        $sb += "_";
        $sb += $level;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameKeyMeta>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameKeyMetaListByCodeByLevel(
                $code
                , $level
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameLevel(
    ) {      
        return $this->act->CountGameLevel(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLevelByUuid(
        $uuid
    ) {      
        return $this->act->CountGameLevelByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLevelByCode(
        $code
    ) {      
        return $this->act->CountGameLevelByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLevelByName(
        $name
    ) {      
        return $this->act->CountGameLevelByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLevelByKey(
        $key
    ) {      
        return $this->act->CountGameLevelByKey(
        $key
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLevelByGameId(
        $game_id
    ) {      
        return $this->act->CountGameLevelByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLevelByKeyByGameId(
        $key
        , $game_id
    ) {      
        return $this->act->CountGameLevelByKeyByGameId(
        $key
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameLevelListByFilter($filter_obj) {
        return $this->act->BrowseGameLevelListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLevelByUuid($set_type, $obj) {
        return $this->act->SetGameLevelByUuid($set_type, $obj);
    }
               
    public function SetGameLevelByUuidFull($obj) {
        return $this->act->SetGameLevelByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLevelByKeyByGameId($set_type, $obj) {
        return $this->act->SetGameLevelByKeyByGameId($set_type, $obj);
    }
               
    public function SetGameLevelByKeyByGameIdFull($obj) {
        return $this->act->SetGameLevelByKeyByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameLevelByUuid(
        $uuid
    ) {         
        return $this->act->DelGameLevelByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameLevelByKeyByGameId(
        $key
        , $game_id
    ) {         
        return $this->act->DelGameLevelByKeyByGameId(
        $key
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameLevelListByUuid(
        $uuid
        ) {
            return $this->act->GetGameLevelListByUuid(
                $uuid
            );
        }
        
    public function GetGameLevelByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameLevelListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLevelListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameLevelListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameLevelListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameLevelListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLevel>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLevelListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLevelListByCode(
        $code
        ) {
            return $this->act->GetGameLevelListByCode(
                $code
            );
        }
        
    public function GetGameLevelByCode(
        $code
    ) {
        foreach($this->act->GetGameLevelListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLevelListByCode(
        $code
    ) {
        return $this->CachedGetGameLevelListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameLevelListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameLevelListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLevel>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLevelListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLevelListByName(
        $name
        ) {
            return $this->act->GetGameLevelListByName(
                $name
            );
        }
        
    public function GetGameLevelByName(
        $name
    ) {
        foreach($this->act->GetGameLevelListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLevelListByName(
        $name
    ) {
        return $this->CachedGetGameLevelListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetGameLevelListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetGameLevelListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLevel>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLevelListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLevelListByKey(
        $key
        ) {
            return $this->act->GetGameLevelListByKey(
                $key
            );
        }
        
    public function GetGameLevelByKey(
        $key
    ) {
        foreach($this->act->GetGameLevelListByKey(
        $key
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLevelListByKey(
        $key
    ) {
        return $this->CachedGetGameLevelListByKey(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
        );
    }
    */
        
    public function CachedGetGameLevelListByKey(
        $overrideCache
        , $cacheHours
        , $key
    ) {

        $objs = array();

        $method_name = "CachedGetGameLevelListByKey";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLevel>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLevelListByKey(
                $key
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLevelListByGameId(
        $game_id
        ) {
            return $this->act->GetGameLevelListByGameId(
                $game_id
            );
        }
        
    public function GetGameLevelByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameLevelListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLevelListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameLevelListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameLevelListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLevelListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLevel>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLevelListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLevelListByKeyByGameId(
        $key
        , $game_id
        ) {
            return $this->act->GetGameLevelListByKeyByGameId(
                $key
                , $game_id
            );
        }
        
    public function GetGameLevelByKeyByGameId(
        $key
        , $game_id
    ) {
        foreach($this->act->GetGameLevelListByKeyByGameId(
        $key
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLevelListByKeyByGameId(
        $key
        , $game_id
    ) {
        return $this->CachedGetGameLevelListByKeyByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $game_id
        );
    }
    */
        
    public function CachedGetGameLevelListByKeyByGameId(
        $overrideCache
        , $cacheHours
        , $key
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLevelListByKeyByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLevel>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLevelListByKeyByGameId(
                $key
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameAchievement(
    ) {      
        return $this->act->CountGameAchievement(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAchievementByUuid(
        $uuid
    ) {      
        return $this->act->CountGameAchievementByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAchievementByProfileIdByKey(
        $profile_id
        , $key
    ) {      
        return $this->act->CountGameAchievementByProfileIdByKey(
        $profile_id
        , $key
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAchievementByUsername(
        $username
    ) {      
        return $this->act->CountGameAchievementByUsername(
        $username
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAchievementByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameAchievementByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAchievementByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {      
        return $this->act->CountGameAchievementByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameAchievementListByFilter($filter_obj) {
        return $this->act->BrowseGameAchievementListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAchievementByUuid($set_type, $obj) {
        return $this->act->SetGameAchievementByUuid($set_type, $obj);
    }
               
    public function SetGameAchievementByUuidFull($obj) {
        return $this->act->SetGameAchievementByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAchievementByUuidByKey($set_type, $obj) {
        return $this->act->SetGameAchievementByUuidByKey($set_type, $obj);
    }
               
    public function SetGameAchievementByUuidByKeyFull($obj) {
        return $this->act->SetGameAchievementByUuidByKey('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAchievementByProfileIdByKey($set_type, $obj) {
        return $this->act->SetGameAchievementByProfileIdByKey($set_type, $obj);
    }
               
    public function SetGameAchievementByProfileIdByKeyFull($obj) {
        return $this->act->SetGameAchievementByProfileIdByKey('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAchievementByKeyByProfileIdByGameId($set_type, $obj) {
        return $this->act->SetGameAchievementByKeyByProfileIdByGameId($set_type, $obj);
    }
               
    public function SetGameAchievementByKeyByProfileIdByGameIdFull($obj) {
        return $this->act->SetGameAchievementByKeyByProfileIdByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAchievementByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameAchievementByKeyByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameAchievementByKeyByProfileIdByGameIdByTimestampFull($obj) {
        return $this->act->SetGameAchievementByKeyByProfileIdByGameIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameAchievementByUuid(
        $uuid
    ) {         
        return $this->act->DelGameAchievementByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameAchievementByProfileIdByKey(
        $profile_id
        , $key
    ) {         
        return $this->act->DelGameAchievementByProfileIdByKey(
        $profile_id
        , $key
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameAchievementByUuidByKey(
        $uuid
        , $key
    ) {         
        return $this->act->DelGameAchievementByUuidByKey(
        $uuid
        , $key
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameAchievementListByUuid(
        $uuid
        ) {
            return $this->act->GetGameAchievementListByUuid(
                $uuid
            );
        }
        
    public function GetGameAchievementByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameAchievementListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAchievementListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameAchievementListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameAchievementListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameAchievementListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAchievementListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAchievementListByProfileIdByKey(
        $profile_id
        , $key
        ) {
            return $this->act->GetGameAchievementListByProfileIdByKey(
                $profile_id
                , $key
            );
        }
        
    public function GetGameAchievementByProfileIdByKey(
        $profile_id
        , $key
    ) {
        foreach($this->act->GetGameAchievementListByProfileIdByKey(
        $profile_id
        , $key
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAchievementListByProfileIdByKey(
        $profile_id
        , $key
    ) {
        return $this->CachedGetGameAchievementListByProfileIdByKey(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $key
        );
    }
    */
        
    public function CachedGetGameAchievementListByProfileIdByKey(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $key
    ) {

        $objs = array();

        $method_name = "CachedGetGameAchievementListByProfileIdByKey";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAchievementListByProfileIdByKey(
                $profile_id
                , $key
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAchievementListByUsername(
        $username
        ) {
            return $this->act->GetGameAchievementListByUsername(
                $username
            );
        }
        
    public function GetGameAchievementByUsername(
        $username
    ) {
        foreach($this->act->GetGameAchievementListByUsername(
        $username
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAchievementListByUsername(
        $username
    ) {
        return $this->CachedGetGameAchievementListByUsername(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $username
        );
    }
    */
        
    public function CachedGetGameAchievementListByUsername(
        $overrideCache
        , $cacheHours
        , $username
    ) {

        $objs = array();

        $method_name = "CachedGetGameAchievementListByUsername";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$username");
        $sb += "_";
        $sb += $username;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAchievementListByUsername(
                $username
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAchievementListByKey(
        $key
        ) {
            return $this->act->GetGameAchievementListByKey(
                $key
            );
        }
        
    public function GetGameAchievementByKey(
        $key
    ) {
        foreach($this->act->GetGameAchievementListByKey(
        $key
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAchievementListByKey(
        $key
    ) {
        return $this->CachedGetGameAchievementListByKey(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
        );
    }
    */
        
    public function CachedGetGameAchievementListByKey(
        $overrideCache
        , $cacheHours
        , $key
    ) {

        $objs = array();

        $method_name = "CachedGetGameAchievementListByKey";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAchievementListByKey(
                $key
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAchievementListByGameId(
        $game_id
        ) {
            return $this->act->GetGameAchievementListByGameId(
                $game_id
            );
        }
        
    public function GetGameAchievementByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameAchievementListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAchievementListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameAchievementListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameAchievementListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameAchievementListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAchievementListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAchievementListByKeyByGameId(
        $key
        , $game_id
        ) {
            return $this->act->GetGameAchievementListByKeyByGameId(
                $key
                , $game_id
            );
        }
        
    public function GetGameAchievementByKeyByGameId(
        $key
        , $game_id
    ) {
        foreach($this->act->GetGameAchievementListByKeyByGameId(
        $key
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAchievementListByKeyByGameId(
        $key
        , $game_id
    ) {
        return $this->CachedGetGameAchievementListByKeyByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $game_id
        );
    }
    */
        
    public function CachedGetGameAchievementListByKeyByGameId(
        $overrideCache
        , $cacheHours
        , $key
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameAchievementListByKeyByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAchievementListByKeyByGameId(
                $key
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAchievementListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetGameAchievementListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetGameAchievementByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameAchievementListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAchievementListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameAchievementListByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameAchievementListByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameAchievementListByProfileIdByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAchievementListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAchievementListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameAchievementListByProfileIdByGameIdByTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameAchievementByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameAchievementListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAchievementListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameAchievementListByProfileIdByGameIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameAchievementListByProfileIdByGameIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameAchievementListByProfileIdByGameIdByTimestamp";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$timestamp");
        $sb += "_";
        $sb += $timestamp;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAchievementListByProfileIdByGameIdByTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAchievementListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        ) {
            return $this->act->GetGameAchievementListByKeyByProfileIdByGameId(
                $key
                , $profile_id
                , $game_id
            );
        }
        
    public function GetGameAchievementByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameAchievementListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAchievementListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameAchievementListByKeyByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameAchievementListByKeyByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $key
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameAchievementListByKeyByProfileIdByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAchievementListByKeyByProfileIdByGameId(
                $key
                , $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
                $key
                , $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameAchievementByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameAchievementListByKeyByProfileIdByGameIdByTimestamp";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$timestamp");
        $sb += "_";
        $sb += $timestamp;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
                $key
                , $profile_id
                , $game_id
                , $timestamp
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameAchievementMeta(
    ) {      
        return $this->act->CountGameAchievementMeta(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAchievementMetaByUuid(
        $uuid
    ) {      
        return $this->act->CountGameAchievementMetaByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAchievementMetaByCode(
        $code
    ) {      
        return $this->act->CountGameAchievementMetaByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAchievementMetaByName(
        $name
    ) {      
        return $this->act->CountGameAchievementMetaByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAchievementMetaByKey(
        $key
    ) {      
        return $this->act->CountGameAchievementMetaByKey(
        $key
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAchievementMetaByGameId(
        $game_id
    ) {      
        return $this->act->CountGameAchievementMetaByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAchievementMetaByKeyByGameId(
        $key
        , $game_id
    ) {      
        return $this->act->CountGameAchievementMetaByKeyByGameId(
        $key
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameAchievementMetaListByFilter($filter_obj) {
        return $this->act->BrowseGameAchievementMetaListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAchievementMetaByUuid($set_type, $obj) {
        return $this->act->SetGameAchievementMetaByUuid($set_type, $obj);
    }
               
    public function SetGameAchievementMetaByUuidFull($obj) {
        return $this->act->SetGameAchievementMetaByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAchievementMetaByKeyByGameId($set_type, $obj) {
        return $this->act->SetGameAchievementMetaByKeyByGameId($set_type, $obj);
    }
               
    public function SetGameAchievementMetaByKeyByGameIdFull($obj) {
        return $this->act->SetGameAchievementMetaByKeyByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameAchievementMetaByUuid(
        $uuid
    ) {         
        return $this->act->DelGameAchievementMetaByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameAchievementMetaByKeyByGameId(
        $key
        , $game_id
    ) {         
        return $this->act->DelGameAchievementMetaByKeyByGameId(
        $key
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameAchievementMetaListByUuid(
        $uuid
        ) {
            return $this->act->GetGameAchievementMetaListByUuid(
                $uuid
            );
        }
        
    public function GetGameAchievementMetaByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameAchievementMetaListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAchievementMetaListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameAchievementMetaListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameAchievementMetaListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameAchievementMetaListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAchievementMeta>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAchievementMetaListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAchievementMetaListByCode(
        $code
        ) {
            return $this->act->GetGameAchievementMetaListByCode(
                $code
            );
        }
        
    public function GetGameAchievementMetaByCode(
        $code
    ) {
        foreach($this->act->GetGameAchievementMetaListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAchievementMetaListByCode(
        $code
    ) {
        return $this->CachedGetGameAchievementMetaListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameAchievementMetaListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameAchievementMetaListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAchievementMeta>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAchievementMetaListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAchievementMetaListByName(
        $name
        ) {
            return $this->act->GetGameAchievementMetaListByName(
                $name
            );
        }
        
    public function GetGameAchievementMetaByName(
        $name
    ) {
        foreach($this->act->GetGameAchievementMetaListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAchievementMetaListByName(
        $name
    ) {
        return $this->CachedGetGameAchievementMetaListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetGameAchievementMetaListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetGameAchievementMetaListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAchievementMeta>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAchievementMetaListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAchievementMetaListByKey(
        $key
        ) {
            return $this->act->GetGameAchievementMetaListByKey(
                $key
            );
        }
        
    public function GetGameAchievementMetaByKey(
        $key
    ) {
        foreach($this->act->GetGameAchievementMetaListByKey(
        $key
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAchievementMetaListByKey(
        $key
    ) {
        return $this->CachedGetGameAchievementMetaListByKey(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
        );
    }
    */
        
    public function CachedGetGameAchievementMetaListByKey(
        $overrideCache
        , $cacheHours
        , $key
    ) {

        $objs = array();

        $method_name = "CachedGetGameAchievementMetaListByKey";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAchievementMeta>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAchievementMetaListByKey(
                $key
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAchievementMetaListByGameId(
        $game_id
        ) {
            return $this->act->GetGameAchievementMetaListByGameId(
                $game_id
            );
        }
        
    public function GetGameAchievementMetaByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameAchievementMetaListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAchievementMetaListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameAchievementMetaListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameAchievementMetaListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameAchievementMetaListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAchievementMeta>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAchievementMetaListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAchievementMetaListByKeyByGameId(
        $key
        , $game_id
        ) {
            return $this->act->GetGameAchievementMetaListByKeyByGameId(
                $key
                , $game_id
            );
        }
        
    public function GetGameAchievementMetaByKeyByGameId(
        $key
        , $game_id
    ) {
        foreach($this->act->GetGameAchievementMetaListByKeyByGameId(
        $key
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAchievementMetaListByKeyByGameId(
        $key
        , $game_id
    ) {
        return $this->CachedGetGameAchievementMetaListByKeyByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $game_id
        );
    }
    */
        
    public function CachedGetGameAchievementMetaListByKeyByGameId(
        $overrideCache
        , $cacheHours
        , $key
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameAchievementMetaListByKeyByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAchievementMeta>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAchievementMetaListByKeyByGameId(
                $key
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
    
}

?>
