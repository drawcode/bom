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
    public function CountAppUuid(
        $uuid
    ) {      
        return $this->act->CountAppUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountAppCode(
        $code
    ) {      
        return $this->act->CountAppCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountAppTypeId(
        $type_id
    ) {      
        return $this->act->CountAppTypeId(
        $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountAppCodeTypeId(
        $code
        , $type_id
    ) {      
        return $this->act->CountAppCodeTypeId(
        $code
        , $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountAppPlatformTypeId(
        $platform
        , $type_id
    ) {      
        return $this->act->CountAppPlatformTypeId(
        $platform
        , $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountAppPlatform(
        $platform
    ) {      
        return $this->act->CountAppPlatform(
        $platform
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseAppListFilter($filter_obj) {
        return $this->act->BrowseAppListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetAppUuid($set_type, $obj) {
        return $this->act->SetAppUuid($set_type, $obj);
    }
               
    public function SetAppUuidFull($obj) {
        return $this->act->SetAppUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetAppCode($set_type, $obj) {
        return $this->act->SetAppCode($set_type, $obj);
    }
               
    public function SetAppCodeFull($obj) {
        return $this->act->SetAppCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelAppUuid(
        $uuid
    ) {         
        return $this->act->DelAppUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelAppCode(
        $code
    ) {         
        return $this->act->DelAppCode(
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
    public function GetAppListUuid(
        $uuid
        ) {
            return $this->act->GetAppListUuid(
                $uuid
            );
        }
        
    public function GetAppUuid(
        $uuid
    ) {
        foreach($this->act->GetAppListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetAppListUuid(
        $uuid
    ) {
        return $this->CachedGetAppListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetAppListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetAppListUuid";

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
            $objs = $this->GetAppListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetAppListCode(
        $code
        ) {
            return $this->act->GetAppListCode(
                $code
            );
        }
        
    public function GetAppCode(
        $code
    ) {
        foreach($this->act->GetAppListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetAppListCode(
        $code
    ) {
        return $this->CachedGetAppListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetAppListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetAppListCode";

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
            $objs = $this->GetAppListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetAppListTypeId(
        $type_id
        ) {
            return $this->act->GetAppListTypeId(
                $type_id
            );
        }
        
    public function GetAppTypeId(
        $type_id
    ) {
        foreach($this->act->GetAppListTypeId(
        $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetAppListTypeId(
        $type_id
    ) {
        return $this->CachedGetAppListTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $type_id
        );
    }
    */
        
    public function CachedGetAppListTypeId(
        $overrideCache
        , $cacheHours
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetAppListTypeId";

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
            $objs = $this->GetAppListTypeId(
                $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetAppListCodeTypeId(
        $code
        , $type_id
        ) {
            return $this->act->GetAppListCodeTypeId(
                $code
                , $type_id
            );
        }
        
    public function GetAppCodeTypeId(
        $code
        , $type_id
    ) {
        foreach($this->act->GetAppListCodeTypeId(
        $code
        , $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetAppListCodeTypeId(
        $code
        , $type_id
    ) {
        return $this->CachedGetAppListCodeTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $type_id
        );
    }
    */
        
    public function CachedGetAppListCodeTypeId(
        $overrideCache
        , $cacheHours
        , $code
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetAppListCodeTypeId";

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
            $objs = $this->GetAppListCodeTypeId(
                $code
                , $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetAppListPlatformTypeId(
        $platform
        , $type_id
        ) {
            return $this->act->GetAppListPlatformTypeId(
                $platform
                , $type_id
            );
        }
        
    public function GetAppPlatformTypeId(
        $platform
        , $type_id
    ) {
        foreach($this->act->GetAppListPlatformTypeId(
        $platform
        , $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetAppListPlatformTypeId(
        $platform
        , $type_id
    ) {
        return $this->CachedGetAppListPlatformTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $platform
            , $type_id
        );
    }
    */
        
    public function CachedGetAppListPlatformTypeId(
        $overrideCache
        , $cacheHours
        , $platform
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetAppListPlatformTypeId";

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
            $objs = $this->GetAppListPlatformTypeId(
                $platform
                , $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetAppListPlatform(
        $platform
        ) {
            return $this->act->GetAppListPlatform(
                $platform
            );
        }
        
    public function GetAppPlatform(
        $platform
    ) {
        foreach($this->act->GetAppListPlatform(
        $platform
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetAppListPlatform(
        $platform
    ) {
        return $this->CachedGetAppListPlatform(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $platform
        );
    }
    */
        
    public function CachedGetAppListPlatform(
        $overrideCache
        , $cacheHours
        , $platform
    ) {

        $objs = array();

        $method_name = "CachedGetAppListPlatform";

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
            $objs = $this->GetAppListPlatform(
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
    public function CountAppTypeUuid(
        $uuid
    ) {      
        return $this->act->CountAppTypeUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountAppTypeCode(
        $code
    ) {      
        return $this->act->CountAppTypeCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseAppTypeListFilter($filter_obj) {
        return $this->act->BrowseAppTypeListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetAppTypeUuid($set_type, $obj) {
        return $this->act->SetAppTypeUuid($set_type, $obj);
    }
               
    public function SetAppTypeUuidFull($obj) {
        return $this->act->SetAppTypeUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetAppTypeCode($set_type, $obj) {
        return $this->act->SetAppTypeCode($set_type, $obj);
    }
               
    public function SetAppTypeCodeFull($obj) {
        return $this->act->SetAppTypeCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelAppTypeUuid(
        $uuid
    ) {         
        return $this->act->DelAppTypeUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelAppTypeCode(
        $code
    ) {         
        return $this->act->DelAppTypeCode(
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
    public function GetAppTypeListUuid(
        $uuid
        ) {
            return $this->act->GetAppTypeListUuid(
                $uuid
            );
        }
        
    public function GetAppTypeUuid(
        $uuid
    ) {
        foreach($this->act->GetAppTypeListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetAppTypeListUuid(
        $uuid
    ) {
        return $this->CachedGetAppTypeListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetAppTypeListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetAppTypeListUuid";

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
            $objs = $this->GetAppTypeListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetAppTypeListCode(
        $code
        ) {
            return $this->act->GetAppTypeListCode(
                $code
            );
        }
        
    public function GetAppTypeCode(
        $code
    ) {
        foreach($this->act->GetAppTypeListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetAppTypeListCode(
        $code
    ) {
        return $this->CachedGetAppTypeListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetAppTypeListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetAppTypeListCode";

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
            $objs = $this->GetAppTypeListCode(
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
    public function CountSiteUuid(
        $uuid
    ) {      
        return $this->act->CountSiteUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountSiteCode(
        $code
    ) {      
        return $this->act->CountSiteCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountSiteTypeId(
        $type_id
    ) {      
        return $this->act->CountSiteTypeId(
        $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountSiteCodeTypeId(
        $code
        , $type_id
    ) {      
        return $this->act->CountSiteCodeTypeId(
        $code
        , $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountSiteDomainTypeId(
        $domain
        , $type_id
    ) {      
        return $this->act->CountSiteDomainTypeId(
        $domain
        , $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountSiteDomain(
        $domain
    ) {      
        return $this->act->CountSiteDomain(
        $domain
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseSiteListFilter($filter_obj) {
        return $this->act->BrowseSiteListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetSiteUuid($set_type, $obj) {
        return $this->act->SetSiteUuid($set_type, $obj);
    }
               
    public function SetSiteUuidFull($obj) {
        return $this->act->SetSiteUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetSiteCode($set_type, $obj) {
        return $this->act->SetSiteCode($set_type, $obj);
    }
               
    public function SetSiteCodeFull($obj) {
        return $this->act->SetSiteCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelSiteUuid(
        $uuid
    ) {         
        return $this->act->DelSiteUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelSiteCode(
        $code
    ) {         
        return $this->act->DelSiteCode(
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
    public function GetSiteListUuid(
        $uuid
        ) {
            return $this->act->GetSiteListUuid(
                $uuid
            );
        }
        
    public function GetSiteUuid(
        $uuid
    ) {
        foreach($this->act->GetSiteListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteListUuid(
        $uuid
    ) {
        return $this->CachedGetSiteListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetSiteListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetSiteListUuid";

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
            $objs = $this->GetSiteListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetSiteListCode(
        $code
        ) {
            return $this->act->GetSiteListCode(
                $code
            );
        }
        
    public function GetSiteCode(
        $code
    ) {
        foreach($this->act->GetSiteListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteListCode(
        $code
    ) {
        return $this->CachedGetSiteListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetSiteListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetSiteListCode";

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
            $objs = $this->GetSiteListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetSiteListTypeId(
        $type_id
        ) {
            return $this->act->GetSiteListTypeId(
                $type_id
            );
        }
        
    public function GetSiteTypeId(
        $type_id
    ) {
        foreach($this->act->GetSiteListTypeId(
        $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteListTypeId(
        $type_id
    ) {
        return $this->CachedGetSiteListTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $type_id
        );
    }
    */
        
    public function CachedGetSiteListTypeId(
        $overrideCache
        , $cacheHours
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetSiteListTypeId";

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
            $objs = $this->GetSiteListTypeId(
                $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetSiteListCodeTypeId(
        $code
        , $type_id
        ) {
            return $this->act->GetSiteListCodeTypeId(
                $code
                , $type_id
            );
        }
        
    public function GetSiteCodeTypeId(
        $code
        , $type_id
    ) {
        foreach($this->act->GetSiteListCodeTypeId(
        $code
        , $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteListCodeTypeId(
        $code
        , $type_id
    ) {
        return $this->CachedGetSiteListCodeTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $type_id
        );
    }
    */
        
    public function CachedGetSiteListCodeTypeId(
        $overrideCache
        , $cacheHours
        , $code
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetSiteListCodeTypeId";

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
            $objs = $this->GetSiteListCodeTypeId(
                $code
                , $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetSiteListDomainTypeId(
        $domain
        , $type_id
        ) {
            return $this->act->GetSiteListDomainTypeId(
                $domain
                , $type_id
            );
        }
        
    public function GetSiteDomainTypeId(
        $domain
        , $type_id
    ) {
        foreach($this->act->GetSiteListDomainTypeId(
        $domain
        , $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteListDomainTypeId(
        $domain
        , $type_id
    ) {
        return $this->CachedGetSiteListDomainTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $domain
            , $type_id
        );
    }
    */
        
    public function CachedGetSiteListDomainTypeId(
        $overrideCache
        , $cacheHours
        , $domain
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetSiteListDomainTypeId";

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
            $objs = $this->GetSiteListDomainTypeId(
                $domain
                , $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetSiteListDomain(
        $domain
        ) {
            return $this->act->GetSiteListDomain(
                $domain
            );
        }
        
    public function GetSiteDomain(
        $domain
    ) {
        foreach($this->act->GetSiteListDomain(
        $domain
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteListDomain(
        $domain
    ) {
        return $this->CachedGetSiteListDomain(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $domain
        );
    }
    */
        
    public function CachedGetSiteListDomain(
        $overrideCache
        , $cacheHours
        , $domain
    ) {

        $objs = array();

        $method_name = "CachedGetSiteListDomain";

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
            $objs = $this->GetSiteListDomain(
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
    public function CountSiteTypeUuid(
        $uuid
    ) {      
        return $this->act->CountSiteTypeUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountSiteTypeCode(
        $code
    ) {      
        return $this->act->CountSiteTypeCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseSiteTypeListFilter($filter_obj) {
        return $this->act->BrowseSiteTypeListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetSiteTypeUuid($set_type, $obj) {
        return $this->act->SetSiteTypeUuid($set_type, $obj);
    }
               
    public function SetSiteTypeUuidFull($obj) {
        return $this->act->SetSiteTypeUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetSiteTypeCode($set_type, $obj) {
        return $this->act->SetSiteTypeCode($set_type, $obj);
    }
               
    public function SetSiteTypeCodeFull($obj) {
        return $this->act->SetSiteTypeCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelSiteTypeUuid(
        $uuid
    ) {         
        return $this->act->DelSiteTypeUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelSiteTypeCode(
        $code
    ) {         
        return $this->act->DelSiteTypeCode(
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
    public function GetSiteTypeListUuid(
        $uuid
        ) {
            return $this->act->GetSiteTypeListUuid(
                $uuid
            );
        }
        
    public function GetSiteTypeUuid(
        $uuid
    ) {
        foreach($this->act->GetSiteTypeListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteTypeListUuid(
        $uuid
    ) {
        return $this->CachedGetSiteTypeListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetSiteTypeListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetSiteTypeListUuid";

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
            $objs = $this->GetSiteTypeListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetSiteTypeListCode(
        $code
        ) {
            return $this->act->GetSiteTypeListCode(
                $code
            );
        }
        
    public function GetSiteTypeCode(
        $code
    ) {
        foreach($this->act->GetSiteTypeListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteTypeListCode(
        $code
    ) {
        return $this->CachedGetSiteTypeListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetSiteTypeListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetSiteTypeListCode";

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
            $objs = $this->GetSiteTypeListCode(
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
    public function CountOrgUuid(
        $uuid
    ) {      
        return $this->act->CountOrgUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOrgCode(
        $code
    ) {      
        return $this->act->CountOrgCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOrgName(
        $name
    ) {      
        return $this->act->CountOrgName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseOrgListFilter($filter_obj) {
        return $this->act->BrowseOrgListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOrgUuid($set_type, $obj) {
        return $this->act->SetOrgUuid($set_type, $obj);
    }
               
    public function SetOrgUuidFull($obj) {
        return $this->act->SetOrgUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelOrgUuid(
        $uuid
    ) {         
        return $this->act->DelOrgUuid(
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
    public function GetOrgListUuid(
        $uuid
        ) {
            return $this->act->GetOrgListUuid(
                $uuid
            );
        }
        
    public function GetOrgUuid(
        $uuid
    ) {
        foreach($this->act->GetOrgListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOrgListUuid(
        $uuid
    ) {
        return $this->CachedGetOrgListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetOrgListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetOrgListUuid";

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
            $objs = $this->GetOrgListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOrgListCode(
        $code
        ) {
            return $this->act->GetOrgListCode(
                $code
            );
        }
        
    public function GetOrgCode(
        $code
    ) {
        foreach($this->act->GetOrgListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOrgListCode(
        $code
    ) {
        return $this->CachedGetOrgListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetOrgListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetOrgListCode";

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
            $objs = $this->GetOrgListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOrgListName(
        $name
        ) {
            return $this->act->GetOrgListName(
                $name
            );
        }
        
    public function GetOrgName(
        $name
    ) {
        foreach($this->act->GetOrgListName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOrgListName(
        $name
    ) {
        return $this->CachedGetOrgListName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetOrgListName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetOrgListName";

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
            $objs = $this->GetOrgListName(
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
    public function CountOrgTypeUuid(
        $uuid
    ) {      
        return $this->act->CountOrgTypeUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOrgTypeCode(
        $code
    ) {      
        return $this->act->CountOrgTypeCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseOrgTypeListFilter($filter_obj) {
        return $this->act->BrowseOrgTypeListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOrgTypeUuid($set_type, $obj) {
        return $this->act->SetOrgTypeUuid($set_type, $obj);
    }
               
    public function SetOrgTypeUuidFull($obj) {
        return $this->act->SetOrgTypeUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOrgTypeCode($set_type, $obj) {
        return $this->act->SetOrgTypeCode($set_type, $obj);
    }
               
    public function SetOrgTypeCodeFull($obj) {
        return $this->act->SetOrgTypeCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelOrgTypeUuid(
        $uuid
    ) {         
        return $this->act->DelOrgTypeUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelOrgTypeCode(
        $code
    ) {         
        return $this->act->DelOrgTypeCode(
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
    public function GetOrgTypeListUuid(
        $uuid
        ) {
            return $this->act->GetOrgTypeListUuid(
                $uuid
            );
        }
        
    public function GetOrgTypeUuid(
        $uuid
    ) {
        foreach($this->act->GetOrgTypeListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOrgTypeListUuid(
        $uuid
    ) {
        return $this->CachedGetOrgTypeListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetOrgTypeListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetOrgTypeListUuid";

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
            $objs = $this->GetOrgTypeListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOrgTypeListCode(
        $code
        ) {
            return $this->act->GetOrgTypeListCode(
                $code
            );
        }
        
    public function GetOrgTypeCode(
        $code
    ) {
        foreach($this->act->GetOrgTypeListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOrgTypeListCode(
        $code
    ) {
        return $this->CachedGetOrgTypeListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetOrgTypeListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetOrgTypeListCode";

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
            $objs = $this->GetOrgTypeListCode(
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
    public function CountContentItemUuid(
        $uuid
    ) {      
        return $this->act->CountContentItemUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountContentItemCode(
        $code
    ) {      
        return $this->act->CountContentItemCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountContentItemName(
        $name
    ) {      
        return $this->act->CountContentItemName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountContentItemPath(
        $path
    ) {      
        return $this->act->CountContentItemPath(
        $path
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseContentItemListFilter($filter_obj) {
        return $this->act->BrowseContentItemListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetContentItemUuid($set_type, $obj) {
        return $this->act->SetContentItemUuid($set_type, $obj);
    }
               
    public function SetContentItemUuidFull($obj) {
        return $this->act->SetContentItemUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelContentItemUuid(
        $uuid
    ) {         
        return $this->act->DelContentItemUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelContentItemPath(
        $path
    ) {         
        return $this->act->DelContentItemPath(
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
    public function GetContentItemListUuid(
        $uuid
        ) {
            return $this->act->GetContentItemListUuid(
                $uuid
            );
        }
        
    public function GetContentItemUuid(
        $uuid
    ) {
        foreach($this->act->GetContentItemListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentItemListUuid(
        $uuid
    ) {
        return $this->CachedGetContentItemListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetContentItemListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetContentItemListUuid";

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
            $objs = $this->GetContentItemListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetContentItemListCode(
        $code
        ) {
            return $this->act->GetContentItemListCode(
                $code
            );
        }
        
    public function GetContentItemCode(
        $code
    ) {
        foreach($this->act->GetContentItemListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentItemListCode(
        $code
    ) {
        return $this->CachedGetContentItemListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetContentItemListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetContentItemListCode";

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
            $objs = $this->GetContentItemListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetContentItemListName(
        $name
        ) {
            return $this->act->GetContentItemListName(
                $name
            );
        }
        
    public function GetContentItemName(
        $name
    ) {
        foreach($this->act->GetContentItemListName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentItemListName(
        $name
    ) {
        return $this->CachedGetContentItemListName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetContentItemListName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetContentItemListName";

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
            $objs = $this->GetContentItemListName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetContentItemListPath(
        $path
        ) {
            return $this->act->GetContentItemListPath(
                $path
            );
        }
        
    public function GetContentItemPath(
        $path
    ) {
        foreach($this->act->GetContentItemListPath(
        $path
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentItemListPath(
        $path
    ) {
        return $this->CachedGetContentItemListPath(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $path
        );
    }
    */
        
    public function CachedGetContentItemListPath(
        $overrideCache
        , $cacheHours
        , $path
    ) {

        $objs = array();

        $method_name = "CachedGetContentItemListPath";

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
            $objs = $this->GetContentItemListPath(
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
    public function CountContentItemTypeUuid(
        $uuid
    ) {      
        return $this->act->CountContentItemTypeUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountContentItemTypeCode(
        $code
    ) {      
        return $this->act->CountContentItemTypeCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseContentItemTypeListFilter($filter_obj) {
        return $this->act->BrowseContentItemTypeListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetContentItemTypeUuid($set_type, $obj) {
        return $this->act->SetContentItemTypeUuid($set_type, $obj);
    }
               
    public function SetContentItemTypeUuidFull($obj) {
        return $this->act->SetContentItemTypeUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetContentItemTypeCode($set_type, $obj) {
        return $this->act->SetContentItemTypeCode($set_type, $obj);
    }
               
    public function SetContentItemTypeCodeFull($obj) {
        return $this->act->SetContentItemTypeCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelContentItemTypeUuid(
        $uuid
    ) {         
        return $this->act->DelContentItemTypeUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelContentItemTypeCode(
        $code
    ) {         
        return $this->act->DelContentItemTypeCode(
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
    public function GetContentItemTypeListUuid(
        $uuid
        ) {
            return $this->act->GetContentItemTypeListUuid(
                $uuid
            );
        }
        
    public function GetContentItemTypeUuid(
        $uuid
    ) {
        foreach($this->act->GetContentItemTypeListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentItemTypeListUuid(
        $uuid
    ) {
        return $this->CachedGetContentItemTypeListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetContentItemTypeListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetContentItemTypeListUuid";

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
            $objs = $this->GetContentItemTypeListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetContentItemTypeListCode(
        $code
        ) {
            return $this->act->GetContentItemTypeListCode(
                $code
            );
        }
        
    public function GetContentItemTypeCode(
        $code
    ) {
        foreach($this->act->GetContentItemTypeListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentItemTypeListCode(
        $code
    ) {
        return $this->CachedGetContentItemTypeListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetContentItemTypeListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetContentItemTypeListCode";

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
            $objs = $this->GetContentItemTypeListCode(
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
    public function CountContentPageUuid(
        $uuid
    ) {      
        return $this->act->CountContentPageUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountContentPageCode(
        $code
    ) {      
        return $this->act->CountContentPageCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountContentPageName(
        $name
    ) {      
        return $this->act->CountContentPageName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountContentPagePath(
        $path
    ) {      
        return $this->act->CountContentPagePath(
        $path
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseContentPageListFilter($filter_obj) {
        return $this->act->BrowseContentPageListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetContentPageUuid($set_type, $obj) {
        return $this->act->SetContentPageUuid($set_type, $obj);
    }
               
    public function SetContentPageUuidFull($obj) {
        return $this->act->SetContentPageUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelContentPageUuid(
        $uuid
    ) {         
        return $this->act->DelContentPageUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelContentPagePathSiteId(
        $path
        , $site_id
    ) {         
        return $this->act->DelContentPagePathSiteId(
        $path
        , $site_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelContentPagePath(
        $path
    ) {         
        return $this->act->DelContentPagePath(
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
    public function GetContentPageListUuid(
        $uuid
        ) {
            return $this->act->GetContentPageListUuid(
                $uuid
            );
        }
        
    public function GetContentPageUuid(
        $uuid
    ) {
        foreach($this->act->GetContentPageListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentPageListUuid(
        $uuid
    ) {
        return $this->CachedGetContentPageListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetContentPageListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetContentPageListUuid";

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
            $objs = $this->GetContentPageListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetContentPageListCode(
        $code
        ) {
            return $this->act->GetContentPageListCode(
                $code
            );
        }
        
    public function GetContentPageCode(
        $code
    ) {
        foreach($this->act->GetContentPageListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentPageListCode(
        $code
    ) {
        return $this->CachedGetContentPageListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetContentPageListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetContentPageListCode";

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
            $objs = $this->GetContentPageListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetContentPageListName(
        $name
        ) {
            return $this->act->GetContentPageListName(
                $name
            );
        }
        
    public function GetContentPageName(
        $name
    ) {
        foreach($this->act->GetContentPageListName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentPageListName(
        $name
    ) {
        return $this->CachedGetContentPageListName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetContentPageListName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetContentPageListName";

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
            $objs = $this->GetContentPageListName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetContentPageListPath(
        $path
        ) {
            return $this->act->GetContentPageListPath(
                $path
            );
        }
        
    public function GetContentPagePath(
        $path
    ) {
        foreach($this->act->GetContentPageListPath(
        $path
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentPageListPath(
        $path
    ) {
        return $this->CachedGetContentPageListPath(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $path
        );
    }
    */
        
    public function CachedGetContentPageListPath(
        $overrideCache
        , $cacheHours
        , $path
    ) {

        $objs = array();

        $method_name = "CachedGetContentPageListPath";

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
            $objs = $this->GetContentPageListPath(
                $path
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetContentPageListSiteId(
        $site_id
        ) {
            return $this->act->GetContentPageListSiteId(
                $site_id
            );
        }
        
    public function GetContentPageSiteId(
        $site_id
    ) {
        foreach($this->act->GetContentPageListSiteId(
        $site_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentPageListSiteId(
        $site_id
    ) {
        return $this->CachedGetContentPageListSiteId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $site_id
        );
    }
    */
        
    public function CachedGetContentPageListSiteId(
        $overrideCache
        , $cacheHours
        , $site_id
    ) {

        $objs = array();

        $method_name = "CachedGetContentPageListSiteId";

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
            $objs = $this->GetContentPageListSiteId(
                $site_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetContentPageListSiteIdPath(
        $site_id
        , $path
        ) {
            return $this->act->GetContentPageListSiteIdPath(
                $site_id
                , $path
            );
        }
        
    public function GetContentPageSiteIdPath(
        $site_id
        , $path
    ) {
        foreach($this->act->GetContentPageListSiteIdPath(
        $site_id
        , $path
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetContentPageListSiteIdPath(
        $site_id
        , $path
    ) {
        return $this->CachedGetContentPageListSiteIdPath(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $site_id
            , $path
        );
    }
    */
        
    public function CachedGetContentPageListSiteIdPath(
        $overrideCache
        , $cacheHours
        , $site_id
        , $path
    ) {

        $objs = array();

        $method_name = "CachedGetContentPageListSiteIdPath";

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
            $objs = $this->GetContentPageListSiteIdPath(
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
    public function CountMessageUuid(
        $uuid
    ) {      
        return $this->act->CountMessageUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseMessageListFilter($filter_obj) {
        return $this->act->BrowseMessageListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetMessageUuid($set_type, $obj) {
        return $this->act->SetMessageUuid($set_type, $obj);
    }
               
    public function SetMessageUuidFull($obj) {
        return $this->act->SetMessageUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelMessageUuid(
        $uuid
    ) {         
        return $this->act->DelMessageUuid(
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
    public function GetMessageListUuid(
        $uuid
        ) {
            return $this->act->GetMessageListUuid(
                $uuid
            );
        }
        
    public function GetMessageUuid(
        $uuid
    ) {
        foreach($this->act->GetMessageListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetMessageListUuid(
        $uuid
    ) {
        return $this->CachedGetMessageListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetMessageListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetMessageListUuid";

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
            $objs = $this->GetMessageListUuid(
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
    public function CountOfferUuid(
        $uuid
    ) {      
        return $this->act->CountOfferUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCode(
        $code
    ) {      
        return $this->act->CountOfferCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferName(
        $name
    ) {      
        return $this->act->CountOfferName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferOrgId(
        $org_id
    ) {      
        return $this->act->CountOfferOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseOfferListFilter($filter_obj) {
        return $this->act->BrowseOfferListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOfferUuid($set_type, $obj) {
        return $this->act->SetOfferUuid($set_type, $obj);
    }
               
    public function SetOfferUuidFull($obj) {
        return $this->act->SetOfferUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelOfferUuid(
        $uuid
    ) {         
        return $this->act->DelOfferUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelOfferOrgId(
        $org_id
    ) {         
        return $this->act->DelOfferOrgId(
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
    public function GetOfferListUuid(
        $uuid
        ) {
            return $this->act->GetOfferListUuid(
                $uuid
            );
        }
        
    public function GetOfferUuid(
        $uuid
    ) {
        foreach($this->act->GetOfferListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferListUuid(
        $uuid
    ) {
        return $this->CachedGetOfferListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetOfferListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetOfferListUuid";

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
            $objs = $this->GetOfferListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferListCode(
        $code
        ) {
            return $this->act->GetOfferListCode(
                $code
            );
        }
        
    public function GetOfferCode(
        $code
    ) {
        foreach($this->act->GetOfferListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferListCode(
        $code
    ) {
        return $this->CachedGetOfferListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetOfferListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetOfferListCode";

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
            $objs = $this->GetOfferListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferListName(
        $name
        ) {
            return $this->act->GetOfferListName(
                $name
            );
        }
        
    public function GetOfferName(
        $name
    ) {
        foreach($this->act->GetOfferListName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferListName(
        $name
    ) {
        return $this->CachedGetOfferListName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetOfferListName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetOfferListName";

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
            $objs = $this->GetOfferListName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferListOrgId(
        $org_id
        ) {
            return $this->act->GetOfferListOrgId(
                $org_id
            );
        }
        
    public function GetOfferOrgId(
        $org_id
    ) {
        foreach($this->act->GetOfferListOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferListOrgId(
        $org_id
    ) {
        return $this->CachedGetOfferListOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetOfferListOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferListOrgId";

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
            $objs = $this->GetOfferListOrgId(
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
    public function CountOfferTypeUuid(
        $uuid
    ) {      
        return $this->act->CountOfferTypeUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferTypeCode(
        $code
    ) {      
        return $this->act->CountOfferTypeCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferTypeName(
        $name
    ) {      
        return $this->act->CountOfferTypeName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseOfferTypeListFilter($filter_obj) {
        return $this->act->BrowseOfferTypeListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOfferTypeUuid($set_type, $obj) {
        return $this->act->SetOfferTypeUuid($set_type, $obj);
    }
               
    public function SetOfferTypeUuidFull($obj) {
        return $this->act->SetOfferTypeUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelOfferTypeUuid(
        $uuid
    ) {         
        return $this->act->DelOfferTypeUuid(
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
    public function GetOfferTypeListUuid(
        $uuid
        ) {
            return $this->act->GetOfferTypeListUuid(
                $uuid
            );
        }
        
    public function GetOfferTypeUuid(
        $uuid
    ) {
        foreach($this->act->GetOfferTypeListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferTypeListUuid(
        $uuid
    ) {
        return $this->CachedGetOfferTypeListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetOfferTypeListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetOfferTypeListUuid";

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
            $objs = $this->GetOfferTypeListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferTypeListCode(
        $code
        ) {
            return $this->act->GetOfferTypeListCode(
                $code
            );
        }
        
    public function GetOfferTypeCode(
        $code
    ) {
        foreach($this->act->GetOfferTypeListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferTypeListCode(
        $code
    ) {
        return $this->CachedGetOfferTypeListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetOfferTypeListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetOfferTypeListCode";

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
            $objs = $this->GetOfferTypeListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferTypeListName(
        $name
        ) {
            return $this->act->GetOfferTypeListName(
                $name
            );
        }
        
    public function GetOfferTypeName(
        $name
    ) {
        foreach($this->act->GetOfferTypeListName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferTypeListName(
        $name
    ) {
        return $this->CachedGetOfferTypeListName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetOfferTypeListName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetOfferTypeListName";

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
            $objs = $this->GetOfferTypeListName(
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
    public function CountOfferLocationUuid(
        $uuid
    ) {      
        return $this->act->CountOfferLocationUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferLocationOfferId(
        $offer_id
    ) {      
        return $this->act->CountOfferLocationOfferId(
        $offer_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferLocationCity(
        $city
    ) {      
        return $this->act->CountOfferLocationCity(
        $city
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferLocationCountryCode(
        $country_code
    ) {      
        return $this->act->CountOfferLocationCountryCode(
        $country_code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferLocationPostalCode(
        $postal_code
    ) {      
        return $this->act->CountOfferLocationPostalCode(
        $postal_code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseOfferLocationListFilter($filter_obj) {
        return $this->act->BrowseOfferLocationListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOfferLocationUuid($set_type, $obj) {
        return $this->act->SetOfferLocationUuid($set_type, $obj);
    }
               
    public function SetOfferLocationUuidFull($obj) {
        return $this->act->SetOfferLocationUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelOfferLocationUuid(
        $uuid
    ) {         
        return $this->act->DelOfferLocationUuid(
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
    public function GetOfferLocationListUuid(
        $uuid
        ) {
            return $this->act->GetOfferLocationListUuid(
                $uuid
            );
        }
        
    public function GetOfferLocationUuid(
        $uuid
    ) {
        foreach($this->act->GetOfferLocationListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferLocationListUuid(
        $uuid
    ) {
        return $this->CachedGetOfferLocationListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetOfferLocationListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetOfferLocationListUuid";

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
            $objs = $this->GetOfferLocationListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferLocationListOfferId(
        $offer_id
        ) {
            return $this->act->GetOfferLocationListOfferId(
                $offer_id
            );
        }
        
    public function GetOfferLocationOfferId(
        $offer_id
    ) {
        foreach($this->act->GetOfferLocationListOfferId(
        $offer_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferLocationListOfferId(
        $offer_id
    ) {
        return $this->CachedGetOfferLocationListOfferId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $offer_id
        );
    }
    */
        
    public function CachedGetOfferLocationListOfferId(
        $overrideCache
        , $cacheHours
        , $offer_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferLocationListOfferId";

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
            $objs = $this->GetOfferLocationListOfferId(
                $offer_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferLocationListCity(
        $city
        ) {
            return $this->act->GetOfferLocationListCity(
                $city
            );
        }
        
    public function GetOfferLocationCity(
        $city
    ) {
        foreach($this->act->GetOfferLocationListCity(
        $city
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferLocationListCity(
        $city
    ) {
        return $this->CachedGetOfferLocationListCity(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $city
        );
    }
    */
        
    public function CachedGetOfferLocationListCity(
        $overrideCache
        , $cacheHours
        , $city
    ) {

        $objs = array();

        $method_name = "CachedGetOfferLocationListCity";

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
            $objs = $this->GetOfferLocationListCity(
                $city
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferLocationListCountryCode(
        $country_code
        ) {
            return $this->act->GetOfferLocationListCountryCode(
                $country_code
            );
        }
        
    public function GetOfferLocationCountryCode(
        $country_code
    ) {
        foreach($this->act->GetOfferLocationListCountryCode(
        $country_code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferLocationListCountryCode(
        $country_code
    ) {
        return $this->CachedGetOfferLocationListCountryCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $country_code
        );
    }
    */
        
    public function CachedGetOfferLocationListCountryCode(
        $overrideCache
        , $cacheHours
        , $country_code
    ) {

        $objs = array();

        $method_name = "CachedGetOfferLocationListCountryCode";

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
            $objs = $this->GetOfferLocationListCountryCode(
                $country_code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferLocationListPostalCode(
        $postal_code
        ) {
            return $this->act->GetOfferLocationListPostalCode(
                $postal_code
            );
        }
        
    public function GetOfferLocationPostalCode(
        $postal_code
    ) {
        foreach($this->act->GetOfferLocationListPostalCode(
        $postal_code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferLocationListPostalCode(
        $postal_code
    ) {
        return $this->CachedGetOfferLocationListPostalCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $postal_code
        );
    }
    */
        
    public function CachedGetOfferLocationListPostalCode(
        $overrideCache
        , $cacheHours
        , $postal_code
    ) {

        $objs = array();

        $method_name = "CachedGetOfferLocationListPostalCode";

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
            $objs = $this->GetOfferLocationListPostalCode(
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
    public function CountOfferCategoryUuid(
        $uuid
    ) {      
        return $this->act->CountOfferCategoryUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryCode(
        $code
    ) {      
        return $this->act->CountOfferCategoryCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryName(
        $name
    ) {      
        return $this->act->CountOfferCategoryName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryOrgId(
        $org_id
    ) {      
        return $this->act->CountOfferCategoryOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryTypeId(
        $type_id
    ) {      
        return $this->act->CountOfferCategoryTypeId(
        $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryOrgIdTypeId(
        $org_id
        , $type_id
    ) {      
        return $this->act->CountOfferCategoryOrgIdTypeId(
        $org_id
        , $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseOfferCategoryListFilter($filter_obj) {
        return $this->act->BrowseOfferCategoryListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOfferCategoryUuid($set_type, $obj) {
        return $this->act->SetOfferCategoryUuid($set_type, $obj);
    }
               
    public function SetOfferCategoryUuidFull($obj) {
        return $this->act->SetOfferCategoryUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelOfferCategoryUuid(
        $uuid
    ) {         
        return $this->act->DelOfferCategoryUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelOfferCategoryCodeOrgId(
        $code
        , $org_id
    ) {         
        return $this->act->DelOfferCategoryCodeOrgId(
        $code
        , $org_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelOfferCategoryCodeOrgIdTypeId(
        $code
        , $org_id
        , $type_id
    ) {         
        return $this->act->DelOfferCategoryCodeOrgIdTypeId(
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
    public function GetOfferCategoryListUuid(
        $uuid
        ) {
            return $this->act->GetOfferCategoryListUuid(
                $uuid
            );
        }
        
    public function GetOfferCategoryUuid(
        $uuid
    ) {
        foreach($this->act->GetOfferCategoryListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryListUuid(
        $uuid
    ) {
        return $this->CachedGetOfferCategoryListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetOfferCategoryListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryListUuid";

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
            $objs = $this->GetOfferCategoryListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryListCode(
        $code
        ) {
            return $this->act->GetOfferCategoryListCode(
                $code
            );
        }
        
    public function GetOfferCategoryCode(
        $code
    ) {
        foreach($this->act->GetOfferCategoryListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryListCode(
        $code
    ) {
        return $this->CachedGetOfferCategoryListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetOfferCategoryListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryListCode";

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
            $objs = $this->GetOfferCategoryListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryListName(
        $name
        ) {
            return $this->act->GetOfferCategoryListName(
                $name
            );
        }
        
    public function GetOfferCategoryName(
        $name
    ) {
        foreach($this->act->GetOfferCategoryListName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryListName(
        $name
    ) {
        return $this->CachedGetOfferCategoryListName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetOfferCategoryListName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryListName";

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
            $objs = $this->GetOfferCategoryListName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryListOrgId(
        $org_id
        ) {
            return $this->act->GetOfferCategoryListOrgId(
                $org_id
            );
        }
        
    public function GetOfferCategoryOrgId(
        $org_id
    ) {
        foreach($this->act->GetOfferCategoryListOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryListOrgId(
        $org_id
    ) {
        return $this->CachedGetOfferCategoryListOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetOfferCategoryListOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryListOrgId";

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
            $objs = $this->GetOfferCategoryListOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryListTypeId(
        $type_id
        ) {
            return $this->act->GetOfferCategoryListTypeId(
                $type_id
            );
        }
        
    public function GetOfferCategoryTypeId(
        $type_id
    ) {
        foreach($this->act->GetOfferCategoryListTypeId(
        $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryListTypeId(
        $type_id
    ) {
        return $this->CachedGetOfferCategoryListTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $type_id
        );
    }
    */
        
    public function CachedGetOfferCategoryListTypeId(
        $overrideCache
        , $cacheHours
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryListTypeId";

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
            $objs = $this->GetOfferCategoryListTypeId(
                $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryListOrgIdTypeId(
        $org_id
        , $type_id
        ) {
            return $this->act->GetOfferCategoryListOrgIdTypeId(
                $org_id
                , $type_id
            );
        }
        
    public function GetOfferCategoryOrgIdTypeId(
        $org_id
        , $type_id
    ) {
        foreach($this->act->GetOfferCategoryListOrgIdTypeId(
        $org_id
        , $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryListOrgIdTypeId(
        $org_id
        , $type_id
    ) {
        return $this->CachedGetOfferCategoryListOrgIdTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
            , $type_id
        );
    }
    */
        
    public function CachedGetOfferCategoryListOrgIdTypeId(
        $overrideCache
        , $cacheHours
        , $org_id
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryListOrgIdTypeId";

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
            $objs = $this->GetOfferCategoryListOrgIdTypeId(
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
    public function CountOfferCategoryTreeUuid(
        $uuid
    ) {      
        return $this->act->CountOfferCategoryTreeUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryTreeParentId(
        $parent_id
    ) {      
        return $this->act->CountOfferCategoryTreeParentId(
        $parent_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryTreeCategoryId(
        $category_id
    ) {      
        return $this->act->CountOfferCategoryTreeCategoryId(
        $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryTreeParentIdCategoryId(
        $parent_id
        , $category_id
    ) {      
        return $this->act->CountOfferCategoryTreeParentIdCategoryId(
        $parent_id
        , $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseOfferCategoryTreeListFilter($filter_obj) {
        return $this->act->BrowseOfferCategoryTreeListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOfferCategoryTreeUuid($set_type, $obj) {
        return $this->act->SetOfferCategoryTreeUuid($set_type, $obj);
    }
               
    public function SetOfferCategoryTreeUuidFull($obj) {
        return $this->act->SetOfferCategoryTreeUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelOfferCategoryTreeUuid(
        $uuid
    ) {         
        return $this->act->DelOfferCategoryTreeUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelOfferCategoryTreeParentId(
        $parent_id
    ) {         
        return $this->act->DelOfferCategoryTreeParentId(
        $parent_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelOfferCategoryTreeCategoryId(
        $category_id
    ) {         
        return $this->act->DelOfferCategoryTreeCategoryId(
        $category_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelOfferCategoryTreeParentIdCategoryId(
        $parent_id
        , $category_id
    ) {         
        return $this->act->DelOfferCategoryTreeParentIdCategoryId(
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
    public function GetOfferCategoryTreeListUuid(
        $uuid
        ) {
            return $this->act->GetOfferCategoryTreeListUuid(
                $uuid
            );
        }
        
    public function GetOfferCategoryTreeUuid(
        $uuid
    ) {
        foreach($this->act->GetOfferCategoryTreeListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryTreeListUuid(
        $uuid
    ) {
        return $this->CachedGetOfferCategoryTreeListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetOfferCategoryTreeListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryTreeListUuid";

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
            $objs = $this->GetOfferCategoryTreeListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryTreeListParentId(
        $parent_id
        ) {
            return $this->act->GetOfferCategoryTreeListParentId(
                $parent_id
            );
        }
        
    public function GetOfferCategoryTreeParentId(
        $parent_id
    ) {
        foreach($this->act->GetOfferCategoryTreeListParentId(
        $parent_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryTreeListParentId(
        $parent_id
    ) {
        return $this->CachedGetOfferCategoryTreeListParentId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $parent_id
        );
    }
    */
        
    public function CachedGetOfferCategoryTreeListParentId(
        $overrideCache
        , $cacheHours
        , $parent_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryTreeListParentId";

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
            $objs = $this->GetOfferCategoryTreeListParentId(
                $parent_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryTreeListCategoryId(
        $category_id
        ) {
            return $this->act->GetOfferCategoryTreeListCategoryId(
                $category_id
            );
        }
        
    public function GetOfferCategoryTreeCategoryId(
        $category_id
    ) {
        foreach($this->act->GetOfferCategoryTreeListCategoryId(
        $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryTreeListCategoryId(
        $category_id
    ) {
        return $this->CachedGetOfferCategoryTreeListCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $category_id
        );
    }
    */
        
    public function CachedGetOfferCategoryTreeListCategoryId(
        $overrideCache
        , $cacheHours
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryTreeListCategoryId";

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
            $objs = $this->GetOfferCategoryTreeListCategoryId(
                $category_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryTreeListParentIdCategoryId(
        $parent_id
        , $category_id
        ) {
            return $this->act->GetOfferCategoryTreeListParentIdCategoryId(
                $parent_id
                , $category_id
            );
        }
        
    public function GetOfferCategoryTreeParentIdCategoryId(
        $parent_id
        , $category_id
    ) {
        foreach($this->act->GetOfferCategoryTreeListParentIdCategoryId(
        $parent_id
        , $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryTreeListParentIdCategoryId(
        $parent_id
        , $category_id
    ) {
        return $this->CachedGetOfferCategoryTreeListParentIdCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $parent_id
            , $category_id
        );
    }
    */
        
    public function CachedGetOfferCategoryTreeListParentIdCategoryId(
        $overrideCache
        , $cacheHours
        , $parent_id
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryTreeListParentIdCategoryId";

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
            $objs = $this->GetOfferCategoryTreeListParentIdCategoryId(
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
    public function CountOfferCategoryAssocUuid(
        $uuid
    ) {      
        return $this->act->CountOfferCategoryAssocUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryAssocOfferId(
        $offer_id
    ) {      
        return $this->act->CountOfferCategoryAssocOfferId(
        $offer_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryAssocCategoryId(
        $category_id
    ) {      
        return $this->act->CountOfferCategoryAssocCategoryId(
        $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferCategoryAssocOfferIdCategoryId(
        $offer_id
        , $category_id
    ) {      
        return $this->act->CountOfferCategoryAssocOfferIdCategoryId(
        $offer_id
        , $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseOfferCategoryAssocListFilter($filter_obj) {
        return $this->act->BrowseOfferCategoryAssocListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOfferCategoryAssocUuid($set_type, $obj) {
        return $this->act->SetOfferCategoryAssocUuid($set_type, $obj);
    }
               
    public function SetOfferCategoryAssocUuidFull($obj) {
        return $this->act->SetOfferCategoryAssocUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelOfferCategoryAssocUuid(
        $uuid
    ) {         
        return $this->act->DelOfferCategoryAssocUuid(
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
    public function GetOfferCategoryAssocListUuid(
        $uuid
        ) {
            return $this->act->GetOfferCategoryAssocListUuid(
                $uuid
            );
        }
        
    public function GetOfferCategoryAssocUuid(
        $uuid
    ) {
        foreach($this->act->GetOfferCategoryAssocListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryAssocListUuid(
        $uuid
    ) {
        return $this->CachedGetOfferCategoryAssocListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetOfferCategoryAssocListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryAssocListUuid";

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
            $objs = $this->GetOfferCategoryAssocListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryAssocListOfferId(
        $offer_id
        ) {
            return $this->act->GetOfferCategoryAssocListOfferId(
                $offer_id
            );
        }
        
    public function GetOfferCategoryAssocOfferId(
        $offer_id
    ) {
        foreach($this->act->GetOfferCategoryAssocListOfferId(
        $offer_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryAssocListOfferId(
        $offer_id
    ) {
        return $this->CachedGetOfferCategoryAssocListOfferId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $offer_id
        );
    }
    */
        
    public function CachedGetOfferCategoryAssocListOfferId(
        $overrideCache
        , $cacheHours
        , $offer_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryAssocListOfferId";

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
            $objs = $this->GetOfferCategoryAssocListOfferId(
                $offer_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryAssocListCategoryId(
        $category_id
        ) {
            return $this->act->GetOfferCategoryAssocListCategoryId(
                $category_id
            );
        }
        
    public function GetOfferCategoryAssocCategoryId(
        $category_id
    ) {
        foreach($this->act->GetOfferCategoryAssocListCategoryId(
        $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryAssocListCategoryId(
        $category_id
    ) {
        return $this->CachedGetOfferCategoryAssocListCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $category_id
        );
    }
    */
        
    public function CachedGetOfferCategoryAssocListCategoryId(
        $overrideCache
        , $cacheHours
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryAssocListCategoryId";

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
            $objs = $this->GetOfferCategoryAssocListCategoryId(
                $category_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferCategoryAssocListOfferIdCategoryId(
        $offer_id
        , $category_id
        ) {
            return $this->act->GetOfferCategoryAssocListOfferIdCategoryId(
                $offer_id
                , $category_id
            );
        }
        
    public function GetOfferCategoryAssocOfferIdCategoryId(
        $offer_id
        , $category_id
    ) {
        foreach($this->act->GetOfferCategoryAssocListOfferIdCategoryId(
        $offer_id
        , $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferCategoryAssocListOfferIdCategoryId(
        $offer_id
        , $category_id
    ) {
        return $this->CachedGetOfferCategoryAssocListOfferIdCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $offer_id
            , $category_id
        );
    }
    */
        
    public function CachedGetOfferCategoryAssocListOfferIdCategoryId(
        $overrideCache
        , $cacheHours
        , $offer_id
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferCategoryAssocListOfferIdCategoryId";

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
            $objs = $this->GetOfferCategoryAssocListOfferIdCategoryId(
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
    public function CountOfferGameLocationUuid(
        $uuid
    ) {      
        return $this->act->CountOfferGameLocationUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferGameLocationGameLocationId(
        $game_location_id
    ) {      
        return $this->act->CountOfferGameLocationGameLocationId(
        $game_location_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferGameLocationOfferId(
        $offer_id
    ) {      
        return $this->act->CountOfferGameLocationOfferId(
        $offer_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOfferGameLocationOfferIdGameLocationId(
        $offer_id
        , $game_location_id
    ) {      
        return $this->act->CountOfferGameLocationOfferIdGameLocationId(
        $offer_id
        , $game_location_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseOfferGameLocationListFilter($filter_obj) {
        return $this->act->BrowseOfferGameLocationListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOfferGameLocationUuid($set_type, $obj) {
        return $this->act->SetOfferGameLocationUuid($set_type, $obj);
    }
               
    public function SetOfferGameLocationUuidFull($obj) {
        return $this->act->SetOfferGameLocationUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelOfferGameLocationUuid(
        $uuid
    ) {         
        return $this->act->DelOfferGameLocationUuid(
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
    public function GetOfferGameLocationListUuid(
        $uuid
        ) {
            return $this->act->GetOfferGameLocationListUuid(
                $uuid
            );
        }
        
    public function GetOfferGameLocationUuid(
        $uuid
    ) {
        foreach($this->act->GetOfferGameLocationListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferGameLocationListUuid(
        $uuid
    ) {
        return $this->CachedGetOfferGameLocationListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetOfferGameLocationListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetOfferGameLocationListUuid";

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
            $objs = $this->GetOfferGameLocationListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferGameLocationListGameLocationId(
        $game_location_id
        ) {
            return $this->act->GetOfferGameLocationListGameLocationId(
                $game_location_id
            );
        }
        
    public function GetOfferGameLocationGameLocationId(
        $game_location_id
    ) {
        foreach($this->act->GetOfferGameLocationListGameLocationId(
        $game_location_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferGameLocationListGameLocationId(
        $game_location_id
    ) {
        return $this->CachedGetOfferGameLocationListGameLocationId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_location_id
        );
    }
    */
        
    public function CachedGetOfferGameLocationListGameLocationId(
        $overrideCache
        , $cacheHours
        , $game_location_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferGameLocationListGameLocationId";

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
            $objs = $this->GetOfferGameLocationListGameLocationId(
                $game_location_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferGameLocationListOfferId(
        $offer_id
        ) {
            return $this->act->GetOfferGameLocationListOfferId(
                $offer_id
            );
        }
        
    public function GetOfferGameLocationOfferId(
        $offer_id
    ) {
        foreach($this->act->GetOfferGameLocationListOfferId(
        $offer_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferGameLocationListOfferId(
        $offer_id
    ) {
        return $this->CachedGetOfferGameLocationListOfferId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $offer_id
        );
    }
    */
        
    public function CachedGetOfferGameLocationListOfferId(
        $overrideCache
        , $cacheHours
        , $offer_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferGameLocationListOfferId";

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
            $objs = $this->GetOfferGameLocationListOfferId(
                $offer_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOfferGameLocationListOfferIdGameLocationId(
        $offer_id
        , $game_location_id
        ) {
            return $this->act->GetOfferGameLocationListOfferIdGameLocationId(
                $offer_id
                , $game_location_id
            );
        }
        
    public function GetOfferGameLocationOfferIdGameLocationId(
        $offer_id
        , $game_location_id
    ) {
        foreach($this->act->GetOfferGameLocationListOfferIdGameLocationId(
        $offer_id
        , $game_location_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOfferGameLocationListOfferIdGameLocationId(
        $offer_id
        , $game_location_id
    ) {
        return $this->CachedGetOfferGameLocationListOfferIdGameLocationId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $offer_id
            , $game_location_id
        );
    }
    */
        
    public function CachedGetOfferGameLocationListOfferIdGameLocationId(
        $overrideCache
        , $cacheHours
        , $offer_id
        , $game_location_id
    ) {

        $objs = array();

        $method_name = "CachedGetOfferGameLocationListOfferIdGameLocationId";

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
            $objs = $this->GetOfferGameLocationListOfferIdGameLocationId(
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
    public function CountEventInfoUuid(
        $uuid
    ) {      
        return $this->act->CountEventInfoUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventInfoCode(
        $code
    ) {      
        return $this->act->CountEventInfoCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventInfoName(
        $name
    ) {      
        return $this->act->CountEventInfoName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventInfoOrgId(
        $org_id
    ) {      
        return $this->act->CountEventInfoOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseEventInfoListFilter($filter_obj) {
        return $this->act->BrowseEventInfoListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetEventInfoUuid($set_type, $obj) {
        return $this->act->SetEventInfoUuid($set_type, $obj);
    }
               
    public function SetEventInfoUuidFull($obj) {
        return $this->act->SetEventInfoUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelEventInfoUuid(
        $uuid
    ) {         
        return $this->act->DelEventInfoUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelEventInfoOrgId(
        $org_id
    ) {         
        return $this->act->DelEventInfoOrgId(
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
    public function GetEventInfoListUuid(
        $uuid
        ) {
            return $this->act->GetEventInfoListUuid(
                $uuid
            );
        }
        
    public function GetEventInfoUuid(
        $uuid
    ) {
        foreach($this->act->GetEventInfoListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventInfoListUuid(
        $uuid
    ) {
        return $this->CachedGetEventInfoListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetEventInfoListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetEventInfoListUuid";

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
            $objs = $this->GetEventInfoListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventInfoListCode(
        $code
        ) {
            return $this->act->GetEventInfoListCode(
                $code
            );
        }
        
    public function GetEventInfoCode(
        $code
    ) {
        foreach($this->act->GetEventInfoListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventInfoListCode(
        $code
    ) {
        return $this->CachedGetEventInfoListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetEventInfoListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetEventInfoListCode";

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
            $objs = $this->GetEventInfoListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventInfoListName(
        $name
        ) {
            return $this->act->GetEventInfoListName(
                $name
            );
        }
        
    public function GetEventInfoName(
        $name
    ) {
        foreach($this->act->GetEventInfoListName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventInfoListName(
        $name
    ) {
        return $this->CachedGetEventInfoListName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetEventInfoListName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetEventInfoListName";

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
            $objs = $this->GetEventInfoListName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventInfoListOrgId(
        $org_id
        ) {
            return $this->act->GetEventInfoListOrgId(
                $org_id
            );
        }
        
    public function GetEventInfoOrgId(
        $org_id
    ) {
        foreach($this->act->GetEventInfoListOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventInfoListOrgId(
        $org_id
    ) {
        return $this->CachedGetEventInfoListOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetEventInfoListOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetEventInfoListOrgId";

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
            $objs = $this->GetEventInfoListOrgId(
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
    public function CountEventLocationUuid(
        $uuid
    ) {      
        return $this->act->CountEventLocationUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventLocationEventId(
        $event_id
    ) {      
        return $this->act->CountEventLocationEventId(
        $event_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventLocationCity(
        $city
    ) {      
        return $this->act->CountEventLocationCity(
        $city
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventLocationCountryCode(
        $country_code
    ) {      
        return $this->act->CountEventLocationCountryCode(
        $country_code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventLocationPostalCode(
        $postal_code
    ) {      
        return $this->act->CountEventLocationPostalCode(
        $postal_code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseEventLocationListFilter($filter_obj) {
        return $this->act->BrowseEventLocationListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetEventLocationUuid($set_type, $obj) {
        return $this->act->SetEventLocationUuid($set_type, $obj);
    }
               
    public function SetEventLocationUuidFull($obj) {
        return $this->act->SetEventLocationUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelEventLocationUuid(
        $uuid
    ) {         
        return $this->act->DelEventLocationUuid(
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
    public function GetEventLocationListUuid(
        $uuid
        ) {
            return $this->act->GetEventLocationListUuid(
                $uuid
            );
        }
        
    public function GetEventLocationUuid(
        $uuid
    ) {
        foreach($this->act->GetEventLocationListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventLocationListUuid(
        $uuid
    ) {
        return $this->CachedGetEventLocationListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetEventLocationListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetEventLocationListUuid";

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
            $objs = $this->GetEventLocationListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventLocationListEventId(
        $event_id
        ) {
            return $this->act->GetEventLocationListEventId(
                $event_id
            );
        }
        
    public function GetEventLocationEventId(
        $event_id
    ) {
        foreach($this->act->GetEventLocationListEventId(
        $event_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventLocationListEventId(
        $event_id
    ) {
        return $this->CachedGetEventLocationListEventId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $event_id
        );
    }
    */
        
    public function CachedGetEventLocationListEventId(
        $overrideCache
        , $cacheHours
        , $event_id
    ) {

        $objs = array();

        $method_name = "CachedGetEventLocationListEventId";

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
            $objs = $this->GetEventLocationListEventId(
                $event_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventLocationListCity(
        $city
        ) {
            return $this->act->GetEventLocationListCity(
                $city
            );
        }
        
    public function GetEventLocationCity(
        $city
    ) {
        foreach($this->act->GetEventLocationListCity(
        $city
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventLocationListCity(
        $city
    ) {
        return $this->CachedGetEventLocationListCity(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $city
        );
    }
    */
        
    public function CachedGetEventLocationListCity(
        $overrideCache
        , $cacheHours
        , $city
    ) {

        $objs = array();

        $method_name = "CachedGetEventLocationListCity";

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
            $objs = $this->GetEventLocationListCity(
                $city
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventLocationListCountryCode(
        $country_code
        ) {
            return $this->act->GetEventLocationListCountryCode(
                $country_code
            );
        }
        
    public function GetEventLocationCountryCode(
        $country_code
    ) {
        foreach($this->act->GetEventLocationListCountryCode(
        $country_code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventLocationListCountryCode(
        $country_code
    ) {
        return $this->CachedGetEventLocationListCountryCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $country_code
        );
    }
    */
        
    public function CachedGetEventLocationListCountryCode(
        $overrideCache
        , $cacheHours
        , $country_code
    ) {

        $objs = array();

        $method_name = "CachedGetEventLocationListCountryCode";

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
            $objs = $this->GetEventLocationListCountryCode(
                $country_code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventLocationListPostalCode(
        $postal_code
        ) {
            return $this->act->GetEventLocationListPostalCode(
                $postal_code
            );
        }
        
    public function GetEventLocationPostalCode(
        $postal_code
    ) {
        foreach($this->act->GetEventLocationListPostalCode(
        $postal_code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventLocationListPostalCode(
        $postal_code
    ) {
        return $this->CachedGetEventLocationListPostalCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $postal_code
        );
    }
    */
        
    public function CachedGetEventLocationListPostalCode(
        $overrideCache
        , $cacheHours
        , $postal_code
    ) {

        $objs = array();

        $method_name = "CachedGetEventLocationListPostalCode";

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
            $objs = $this->GetEventLocationListPostalCode(
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
    public function CountEventCategoryUuid(
        $uuid
    ) {      
        return $this->act->CountEventCategoryUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryCode(
        $code
    ) {      
        return $this->act->CountEventCategoryCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryName(
        $name
    ) {      
        return $this->act->CountEventCategoryName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryOrgId(
        $org_id
    ) {      
        return $this->act->CountEventCategoryOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryTypeId(
        $type_id
    ) {      
        return $this->act->CountEventCategoryTypeId(
        $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryOrgIdTypeId(
        $org_id
        , $type_id
    ) {      
        return $this->act->CountEventCategoryOrgIdTypeId(
        $org_id
        , $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseEventCategoryListFilter($filter_obj) {
        return $this->act->BrowseEventCategoryListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetEventCategoryUuid($set_type, $obj) {
        return $this->act->SetEventCategoryUuid($set_type, $obj);
    }
               
    public function SetEventCategoryUuidFull($obj) {
        return $this->act->SetEventCategoryUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelEventCategoryUuid(
        $uuid
    ) {         
        return $this->act->DelEventCategoryUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelEventCategoryCodeOrgId(
        $code
        , $org_id
    ) {         
        return $this->act->DelEventCategoryCodeOrgId(
        $code
        , $org_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelEventCategoryCodeOrgIdTypeId(
        $code
        , $org_id
        , $type_id
    ) {         
        return $this->act->DelEventCategoryCodeOrgIdTypeId(
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
    public function GetEventCategoryListUuid(
        $uuid
        ) {
            return $this->act->GetEventCategoryListUuid(
                $uuid
            );
        }
        
    public function GetEventCategoryUuid(
        $uuid
    ) {
        foreach($this->act->GetEventCategoryListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryListUuid(
        $uuid
    ) {
        return $this->CachedGetEventCategoryListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetEventCategoryListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryListUuid";

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
            $objs = $this->GetEventCategoryListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryListCode(
        $code
        ) {
            return $this->act->GetEventCategoryListCode(
                $code
            );
        }
        
    public function GetEventCategoryCode(
        $code
    ) {
        foreach($this->act->GetEventCategoryListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryListCode(
        $code
    ) {
        return $this->CachedGetEventCategoryListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetEventCategoryListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryListCode";

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
            $objs = $this->GetEventCategoryListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryListName(
        $name
        ) {
            return $this->act->GetEventCategoryListName(
                $name
            );
        }
        
    public function GetEventCategoryName(
        $name
    ) {
        foreach($this->act->GetEventCategoryListName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryListName(
        $name
    ) {
        return $this->CachedGetEventCategoryListName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetEventCategoryListName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryListName";

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
            $objs = $this->GetEventCategoryListName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryListOrgId(
        $org_id
        ) {
            return $this->act->GetEventCategoryListOrgId(
                $org_id
            );
        }
        
    public function GetEventCategoryOrgId(
        $org_id
    ) {
        foreach($this->act->GetEventCategoryListOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryListOrgId(
        $org_id
    ) {
        return $this->CachedGetEventCategoryListOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetEventCategoryListOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryListOrgId";

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
            $objs = $this->GetEventCategoryListOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryListTypeId(
        $type_id
        ) {
            return $this->act->GetEventCategoryListTypeId(
                $type_id
            );
        }
        
    public function GetEventCategoryTypeId(
        $type_id
    ) {
        foreach($this->act->GetEventCategoryListTypeId(
        $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryListTypeId(
        $type_id
    ) {
        return $this->CachedGetEventCategoryListTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $type_id
        );
    }
    */
        
    public function CachedGetEventCategoryListTypeId(
        $overrideCache
        , $cacheHours
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryListTypeId";

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
            $objs = $this->GetEventCategoryListTypeId(
                $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryListOrgIdTypeId(
        $org_id
        , $type_id
        ) {
            return $this->act->GetEventCategoryListOrgIdTypeId(
                $org_id
                , $type_id
            );
        }
        
    public function GetEventCategoryOrgIdTypeId(
        $org_id
        , $type_id
    ) {
        foreach($this->act->GetEventCategoryListOrgIdTypeId(
        $org_id
        , $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryListOrgIdTypeId(
        $org_id
        , $type_id
    ) {
        return $this->CachedGetEventCategoryListOrgIdTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
            , $type_id
        );
    }
    */
        
    public function CachedGetEventCategoryListOrgIdTypeId(
        $overrideCache
        , $cacheHours
        , $org_id
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryListOrgIdTypeId";

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
            $objs = $this->GetEventCategoryListOrgIdTypeId(
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
    public function CountEventCategoryTreeUuid(
        $uuid
    ) {      
        return $this->act->CountEventCategoryTreeUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryTreeParentId(
        $parent_id
    ) {      
        return $this->act->CountEventCategoryTreeParentId(
        $parent_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryTreeCategoryId(
        $category_id
    ) {      
        return $this->act->CountEventCategoryTreeCategoryId(
        $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryTreeParentIdCategoryId(
        $parent_id
        , $category_id
    ) {      
        return $this->act->CountEventCategoryTreeParentIdCategoryId(
        $parent_id
        , $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseEventCategoryTreeListFilter($filter_obj) {
        return $this->act->BrowseEventCategoryTreeListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetEventCategoryTreeUuid($set_type, $obj) {
        return $this->act->SetEventCategoryTreeUuid($set_type, $obj);
    }
               
    public function SetEventCategoryTreeUuidFull($obj) {
        return $this->act->SetEventCategoryTreeUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelEventCategoryTreeUuid(
        $uuid
    ) {         
        return $this->act->DelEventCategoryTreeUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelEventCategoryTreeParentId(
        $parent_id
    ) {         
        return $this->act->DelEventCategoryTreeParentId(
        $parent_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelEventCategoryTreeCategoryId(
        $category_id
    ) {         
        return $this->act->DelEventCategoryTreeCategoryId(
        $category_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelEventCategoryTreeParentIdCategoryId(
        $parent_id
        , $category_id
    ) {         
        return $this->act->DelEventCategoryTreeParentIdCategoryId(
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
    public function GetEventCategoryTreeListUuid(
        $uuid
        ) {
            return $this->act->GetEventCategoryTreeListUuid(
                $uuid
            );
        }
        
    public function GetEventCategoryTreeUuid(
        $uuid
    ) {
        foreach($this->act->GetEventCategoryTreeListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryTreeListUuid(
        $uuid
    ) {
        return $this->CachedGetEventCategoryTreeListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetEventCategoryTreeListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryTreeListUuid";

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
            $objs = $this->GetEventCategoryTreeListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryTreeListParentId(
        $parent_id
        ) {
            return $this->act->GetEventCategoryTreeListParentId(
                $parent_id
            );
        }
        
    public function GetEventCategoryTreeParentId(
        $parent_id
    ) {
        foreach($this->act->GetEventCategoryTreeListParentId(
        $parent_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryTreeListParentId(
        $parent_id
    ) {
        return $this->CachedGetEventCategoryTreeListParentId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $parent_id
        );
    }
    */
        
    public function CachedGetEventCategoryTreeListParentId(
        $overrideCache
        , $cacheHours
        , $parent_id
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryTreeListParentId";

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
            $objs = $this->GetEventCategoryTreeListParentId(
                $parent_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryTreeListCategoryId(
        $category_id
        ) {
            return $this->act->GetEventCategoryTreeListCategoryId(
                $category_id
            );
        }
        
    public function GetEventCategoryTreeCategoryId(
        $category_id
    ) {
        foreach($this->act->GetEventCategoryTreeListCategoryId(
        $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryTreeListCategoryId(
        $category_id
    ) {
        return $this->CachedGetEventCategoryTreeListCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $category_id
        );
    }
    */
        
    public function CachedGetEventCategoryTreeListCategoryId(
        $overrideCache
        , $cacheHours
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryTreeListCategoryId";

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
            $objs = $this->GetEventCategoryTreeListCategoryId(
                $category_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryTreeListParentIdCategoryId(
        $parent_id
        , $category_id
        ) {
            return $this->act->GetEventCategoryTreeListParentIdCategoryId(
                $parent_id
                , $category_id
            );
        }
        
    public function GetEventCategoryTreeParentIdCategoryId(
        $parent_id
        , $category_id
    ) {
        foreach($this->act->GetEventCategoryTreeListParentIdCategoryId(
        $parent_id
        , $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryTreeListParentIdCategoryId(
        $parent_id
        , $category_id
    ) {
        return $this->CachedGetEventCategoryTreeListParentIdCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $parent_id
            , $category_id
        );
    }
    */
        
    public function CachedGetEventCategoryTreeListParentIdCategoryId(
        $overrideCache
        , $cacheHours
        , $parent_id
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryTreeListParentIdCategoryId";

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
            $objs = $this->GetEventCategoryTreeListParentIdCategoryId(
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
    public function CountEventCategoryAssocUuid(
        $uuid
    ) {      
        return $this->act->CountEventCategoryAssocUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryAssocEventId(
        $event_id
    ) {      
        return $this->act->CountEventCategoryAssocEventId(
        $event_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryAssocCategoryId(
        $category_id
    ) {      
        return $this->act->CountEventCategoryAssocCategoryId(
        $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountEventCategoryAssocEventIdCategoryId(
        $event_id
        , $category_id
    ) {      
        return $this->act->CountEventCategoryAssocEventIdCategoryId(
        $event_id
        , $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseEventCategoryAssocListFilter($filter_obj) {
        return $this->act->BrowseEventCategoryAssocListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetEventCategoryAssocUuid($set_type, $obj) {
        return $this->act->SetEventCategoryAssocUuid($set_type, $obj);
    }
               
    public function SetEventCategoryAssocUuidFull($obj) {
        return $this->act->SetEventCategoryAssocUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelEventCategoryAssocUuid(
        $uuid
    ) {         
        return $this->act->DelEventCategoryAssocUuid(
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
    public function GetEventCategoryAssocListUuid(
        $uuid
        ) {
            return $this->act->GetEventCategoryAssocListUuid(
                $uuid
            );
        }
        
    public function GetEventCategoryAssocUuid(
        $uuid
    ) {
        foreach($this->act->GetEventCategoryAssocListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryAssocListUuid(
        $uuid
    ) {
        return $this->CachedGetEventCategoryAssocListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetEventCategoryAssocListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryAssocListUuid";

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
            $objs = $this->GetEventCategoryAssocListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryAssocListEventId(
        $event_id
        ) {
            return $this->act->GetEventCategoryAssocListEventId(
                $event_id
            );
        }
        
    public function GetEventCategoryAssocEventId(
        $event_id
    ) {
        foreach($this->act->GetEventCategoryAssocListEventId(
        $event_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryAssocListEventId(
        $event_id
    ) {
        return $this->CachedGetEventCategoryAssocListEventId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $event_id
        );
    }
    */
        
    public function CachedGetEventCategoryAssocListEventId(
        $overrideCache
        , $cacheHours
        , $event_id
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryAssocListEventId";

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
            $objs = $this->GetEventCategoryAssocListEventId(
                $event_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryAssocListCategoryId(
        $category_id
        ) {
            return $this->act->GetEventCategoryAssocListCategoryId(
                $category_id
            );
        }
        
    public function GetEventCategoryAssocCategoryId(
        $category_id
    ) {
        foreach($this->act->GetEventCategoryAssocListCategoryId(
        $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryAssocListCategoryId(
        $category_id
    ) {
        return $this->CachedGetEventCategoryAssocListCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $category_id
        );
    }
    */
        
    public function CachedGetEventCategoryAssocListCategoryId(
        $overrideCache
        , $cacheHours
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryAssocListCategoryId";

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
            $objs = $this->GetEventCategoryAssocListCategoryId(
                $category_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetEventCategoryAssocListEventIdCategoryId(
        $event_id
        , $category_id
        ) {
            return $this->act->GetEventCategoryAssocListEventIdCategoryId(
                $event_id
                , $category_id
            );
        }
        
    public function GetEventCategoryAssocEventIdCategoryId(
        $event_id
        , $category_id
    ) {
        foreach($this->act->GetEventCategoryAssocListEventIdCategoryId(
        $event_id
        , $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetEventCategoryAssocListEventIdCategoryId(
        $event_id
        , $category_id
    ) {
        return $this->CachedGetEventCategoryAssocListEventIdCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $event_id
            , $category_id
        );
    }
    */
        
    public function CachedGetEventCategoryAssocListEventIdCategoryId(
        $overrideCache
        , $cacheHours
        , $event_id
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetEventCategoryAssocListEventIdCategoryId";

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
            $objs = $this->GetEventCategoryAssocListEventIdCategoryId(
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
    public function CountChannelUuid(
        $uuid
    ) {      
        return $this->act->CountChannelUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountChannelCode(
        $code
    ) {      
        return $this->act->CountChannelCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountChannelName(
        $name
    ) {      
        return $this->act->CountChannelName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountChannelOrgId(
        $org_id
    ) {      
        return $this->act->CountChannelOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountChannelTypeId(
        $type_id
    ) {      
        return $this->act->CountChannelTypeId(
        $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountChannelOrgIdTypeId(
        $org_id
        , $type_id
    ) {      
        return $this->act->CountChannelOrgIdTypeId(
        $org_id
        , $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseChannelListFilter($filter_obj) {
        return $this->act->BrowseChannelListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetChannelUuid($set_type, $obj) {
        return $this->act->SetChannelUuid($set_type, $obj);
    }
               
    public function SetChannelUuidFull($obj) {
        return $this->act->SetChannelUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelChannelUuid(
        $uuid
    ) {         
        return $this->act->DelChannelUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelChannelCodeOrgId(
        $code
        , $org_id
    ) {         
        return $this->act->DelChannelCodeOrgId(
        $code
        , $org_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelChannelCodeOrgIdTypeId(
        $code
        , $org_id
        , $type_id
    ) {         
        return $this->act->DelChannelCodeOrgIdTypeId(
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
    public function GetChannelListUuid(
        $uuid
        ) {
            return $this->act->GetChannelListUuid(
                $uuid
            );
        }
        
    public function GetChannelUuid(
        $uuid
    ) {
        foreach($this->act->GetChannelListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetChannelListUuid(
        $uuid
    ) {
        return $this->CachedGetChannelListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetChannelListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetChannelListUuid";

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
            $objs = $this->GetChannelListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetChannelListCode(
        $code
        ) {
            return $this->act->GetChannelListCode(
                $code
            );
        }
        
    public function GetChannelCode(
        $code
    ) {
        foreach($this->act->GetChannelListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetChannelListCode(
        $code
    ) {
        return $this->CachedGetChannelListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetChannelListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetChannelListCode";

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
            $objs = $this->GetChannelListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetChannelListName(
        $name
        ) {
            return $this->act->GetChannelListName(
                $name
            );
        }
        
    public function GetChannelName(
        $name
    ) {
        foreach($this->act->GetChannelListName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetChannelListName(
        $name
    ) {
        return $this->CachedGetChannelListName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetChannelListName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetChannelListName";

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
            $objs = $this->GetChannelListName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetChannelListOrgId(
        $org_id
        ) {
            return $this->act->GetChannelListOrgId(
                $org_id
            );
        }
        
    public function GetChannelOrgId(
        $org_id
    ) {
        foreach($this->act->GetChannelListOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetChannelListOrgId(
        $org_id
    ) {
        return $this->CachedGetChannelListOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetChannelListOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetChannelListOrgId";

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
            $objs = $this->GetChannelListOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetChannelListTypeId(
        $type_id
        ) {
            return $this->act->GetChannelListTypeId(
                $type_id
            );
        }
        
    public function GetChannelTypeId(
        $type_id
    ) {
        foreach($this->act->GetChannelListTypeId(
        $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetChannelListTypeId(
        $type_id
    ) {
        return $this->CachedGetChannelListTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $type_id
        );
    }
    */
        
    public function CachedGetChannelListTypeId(
        $overrideCache
        , $cacheHours
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetChannelListTypeId";

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
            $objs = $this->GetChannelListTypeId(
                $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetChannelListOrgIdTypeId(
        $org_id
        , $type_id
        ) {
            return $this->act->GetChannelListOrgIdTypeId(
                $org_id
                , $type_id
            );
        }
        
    public function GetChannelOrgIdTypeId(
        $org_id
        , $type_id
    ) {
        foreach($this->act->GetChannelListOrgIdTypeId(
        $org_id
        , $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetChannelListOrgIdTypeId(
        $org_id
        , $type_id
    ) {
        return $this->CachedGetChannelListOrgIdTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
            , $type_id
        );
    }
    */
        
    public function CachedGetChannelListOrgIdTypeId(
        $overrideCache
        , $cacheHours
        , $org_id
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetChannelListOrgIdTypeId";

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
            $objs = $this->GetChannelListOrgIdTypeId(
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
    public function CountChannelTypeUuid(
        $uuid
    ) {      
        return $this->act->CountChannelTypeUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountChannelTypeCode(
        $code
    ) {      
        return $this->act->CountChannelTypeCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountChannelTypeName(
        $name
    ) {      
        return $this->act->CountChannelTypeName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseChannelTypeListFilter($filter_obj) {
        return $this->act->BrowseChannelTypeListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetChannelTypeUuid($set_type, $obj) {
        return $this->act->SetChannelTypeUuid($set_type, $obj);
    }
               
    public function SetChannelTypeUuidFull($obj) {
        return $this->act->SetChannelTypeUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelChannelTypeUuid(
        $uuid
    ) {         
        return $this->act->DelChannelTypeUuid(
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
    public function GetChannelTypeListUuid(
        $uuid
        ) {
            return $this->act->GetChannelTypeListUuid(
                $uuid
            );
        }
        
    public function GetChannelTypeUuid(
        $uuid
    ) {
        foreach($this->act->GetChannelTypeListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetChannelTypeListUuid(
        $uuid
    ) {
        return $this->CachedGetChannelTypeListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetChannelTypeListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetChannelTypeListUuid";

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
            $objs = $this->GetChannelTypeListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetChannelTypeListCode(
        $code
        ) {
            return $this->act->GetChannelTypeListCode(
                $code
            );
        }
        
    public function GetChannelTypeCode(
        $code
    ) {
        foreach($this->act->GetChannelTypeListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetChannelTypeListCode(
        $code
    ) {
        return $this->CachedGetChannelTypeListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetChannelTypeListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetChannelTypeListCode";

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
            $objs = $this->GetChannelTypeListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetChannelTypeListName(
        $name
        ) {
            return $this->act->GetChannelTypeListName(
                $name
            );
        }
        
    public function GetChannelTypeName(
        $name
    ) {
        foreach($this->act->GetChannelTypeListName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetChannelTypeListName(
        $name
    ) {
        return $this->CachedGetChannelTypeListName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetChannelTypeListName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetChannelTypeListName";

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
            $objs = $this->GetChannelTypeListName(
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
    public function CountQuestionUuid(
        $uuid
    ) {      
        return $this->act->CountQuestionUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountQuestionCode(
        $code
    ) {      
        return $this->act->CountQuestionCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountQuestionName(
        $name
    ) {      
        return $this->act->CountQuestionName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountQuestionChannelId(
        $channel_id
    ) {      
        return $this->act->CountQuestionChannelId(
        $channel_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountQuestionOrgId(
        $org_id
    ) {      
        return $this->act->CountQuestionOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountQuestionChannelIdOrgId(
        $channel_id
        , $org_id
    ) {      
        return $this->act->CountQuestionChannelIdOrgId(
        $channel_id
        , $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountQuestionChannelIdCode(
        $channel_id
        , $code
    ) {      
        return $this->act->CountQuestionChannelIdCode(
        $channel_id
        , $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseQuestionListFilter($filter_obj) {
        return $this->act->BrowseQuestionListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetQuestionUuid($set_type, $obj) {
        return $this->act->SetQuestionUuid($set_type, $obj);
    }
               
    public function SetQuestionUuidFull($obj) {
        return $this->act->SetQuestionUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetQuestionChannelIdCode($set_type, $obj) {
        return $this->act->SetQuestionChannelIdCode($set_type, $obj);
    }
               
    public function SetQuestionChannelIdCodeFull($obj) {
        return $this->act->SetQuestionChannelIdCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelQuestionUuid(
        $uuid
    ) {         
        return $this->act->DelQuestionUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelQuestionChannelIdOrgId(
        $channel_id
        , $org_id
    ) {         
        return $this->act->DelQuestionChannelIdOrgId(
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
    public function GetQuestionListUuid(
        $uuid
        ) {
            return $this->act->GetQuestionListUuid(
                $uuid
            );
        }
        
    public function GetQuestionUuid(
        $uuid
    ) {
        foreach($this->act->GetQuestionListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetQuestionListUuid(
        $uuid
    ) {
        return $this->CachedGetQuestionListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetQuestionListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetQuestionListUuid";

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
            $objs = $this->GetQuestionListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetQuestionListCode(
        $code
        ) {
            return $this->act->GetQuestionListCode(
                $code
            );
        }
        
    public function GetQuestionCode(
        $code
    ) {
        foreach($this->act->GetQuestionListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetQuestionListCode(
        $code
    ) {
        return $this->CachedGetQuestionListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetQuestionListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetQuestionListCode";

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
            $objs = $this->GetQuestionListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetQuestionListName(
        $name
        ) {
            return $this->act->GetQuestionListName(
                $name
            );
        }
        
    public function GetQuestionName(
        $name
    ) {
        foreach($this->act->GetQuestionListName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetQuestionListName(
        $name
    ) {
        return $this->CachedGetQuestionListName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetQuestionListName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetQuestionListName";

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
            $objs = $this->GetQuestionListName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetQuestionListType(
        $type
        ) {
            return $this->act->GetQuestionListType(
                $type
            );
        }
        
    public function GetQuestionType(
        $type
    ) {
        foreach($this->act->GetQuestionListType(
        $type
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetQuestionListType(
        $type
    ) {
        return $this->CachedGetQuestionListType(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $type
        );
    }
    */
        
    public function CachedGetQuestionListType(
        $overrideCache
        , $cacheHours
        , $type
    ) {

        $objs = array();

        $method_name = "CachedGetQuestionListType";

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
            $objs = $this->GetQuestionListType(
                $type
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetQuestionListChannelId(
        $channel_id
        ) {
            return $this->act->GetQuestionListChannelId(
                $channel_id
            );
        }
        
    public function GetQuestionChannelId(
        $channel_id
    ) {
        foreach($this->act->GetQuestionListChannelId(
        $channel_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetQuestionListChannelId(
        $channel_id
    ) {
        return $this->CachedGetQuestionListChannelId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
        );
    }
    */
        
    public function CachedGetQuestionListChannelId(
        $overrideCache
        , $cacheHours
        , $channel_id
    ) {

        $objs = array();

        $method_name = "CachedGetQuestionListChannelId";

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
            $objs = $this->GetQuestionListChannelId(
                $channel_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetQuestionListOrgId(
        $org_id
        ) {
            return $this->act->GetQuestionListOrgId(
                $org_id
            );
        }
        
    public function GetQuestionOrgId(
        $org_id
    ) {
        foreach($this->act->GetQuestionListOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetQuestionListOrgId(
        $org_id
    ) {
        return $this->CachedGetQuestionListOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetQuestionListOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetQuestionListOrgId";

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
            $objs = $this->GetQuestionListOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetQuestionListChannelIdOrgId(
        $channel_id
        , $org_id
        ) {
            return $this->act->GetQuestionListChannelIdOrgId(
                $channel_id
                , $org_id
            );
        }
        
    public function GetQuestionChannelIdOrgId(
        $channel_id
        , $org_id
    ) {
        foreach($this->act->GetQuestionListChannelIdOrgId(
        $channel_id
        , $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetQuestionListChannelIdOrgId(
        $channel_id
        , $org_id
    ) {
        return $this->CachedGetQuestionListChannelIdOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
            , $org_id
        );
    }
    */
        
    public function CachedGetQuestionListChannelIdOrgId(
        $overrideCache
        , $cacheHours
        , $channel_id
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetQuestionListChannelIdOrgId";

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
            $objs = $this->GetQuestionListChannelIdOrgId(
                $channel_id
                , $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetQuestionListChannelIdCode(
        $channel_id
        , $code
        ) {
            return $this->act->GetQuestionListChannelIdCode(
                $channel_id
                , $code
            );
        }
        
    public function GetQuestionChannelIdCode(
        $channel_id
        , $code
    ) {
        foreach($this->act->GetQuestionListChannelIdCode(
        $channel_id
        , $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetQuestionListChannelIdCode(
        $channel_id
        , $code
    ) {
        return $this->CachedGetQuestionListChannelIdCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
            , $code
        );
    }
    */
        
    public function CachedGetQuestionListChannelIdCode(
        $overrideCache
        , $cacheHours
        , $channel_id
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetQuestionListChannelIdCode";

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
            $objs = $this->GetQuestionListChannelIdCode(
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
    public function CountProfileOfferUuid(
        $uuid
    ) {      
        return $this->act->CountProfileOfferUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileOfferProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileOfferProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileOfferListFilter($filter_obj) {
        return $this->act->BrowseProfileOfferListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileOfferUuid($set_type, $obj) {
        return $this->act->SetProfileOfferUuid($set_type, $obj);
    }
               
    public function SetProfileOfferUuidFull($obj) {
        return $this->act->SetProfileOfferUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileOfferUuid(
        $uuid
    ) {         
        return $this->act->DelProfileOfferUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileOfferProfileId(
        $profile_id
    ) {         
        return $this->act->DelProfileOfferProfileId(
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
    public function GetProfileOfferListUuid(
        $uuid
        ) {
            return $this->act->GetProfileOfferListUuid(
                $uuid
            );
        }
        
    public function GetProfileOfferUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileOfferListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileOfferListUuid(
        $uuid
    ) {
        return $this->CachedGetProfileOfferListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileOfferListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileOfferListUuid";

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
            $objs = $this->GetProfileOfferListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileOfferListProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileOfferListProfileId(
                $profile_id
            );
        }
        
    public function GetProfileOfferProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileOfferListProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileOfferListProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileOfferListProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileOfferListProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileOfferListProfileId";

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
            $objs = $this->GetProfileOfferListProfileId(
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
    public function CountProfileAppUuid(
        $uuid
    ) {      
        return $this->act->CountProfileAppUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileAppProfileIdAppId(
        $profile_id
        , $app_id
    ) {      
        return $this->act->CountProfileAppProfileIdAppId(
        $profile_id
        , $app_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileAppListFilter($filter_obj) {
        return $this->act->BrowseProfileAppListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileAppUuid($set_type, $obj) {
        return $this->act->SetProfileAppUuid($set_type, $obj);
    }
               
    public function SetProfileAppUuidFull($obj) {
        return $this->act->SetProfileAppUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileAppProfileIdAppId($set_type, $obj) {
        return $this->act->SetProfileAppProfileIdAppId($set_type, $obj);
    }
               
    public function SetProfileAppProfileIdAppIdFull($obj) {
        return $this->act->SetProfileAppProfileIdAppId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileAppUuid(
        $uuid
    ) {         
        return $this->act->DelProfileAppUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileAppProfileIdAppId(
        $profile_id
        , $app_id
    ) {         
        return $this->act->DelProfileAppProfileIdAppId(
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
    public function GetProfileAppListUuid(
        $uuid
        ) {
            return $this->act->GetProfileAppListUuid(
                $uuid
            );
        }
        
    public function GetProfileAppUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileAppListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAppListUuid(
        $uuid
    ) {
        return $this->CachedGetProfileAppListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileAppListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAppListUuid";

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
            $objs = $this->GetProfileAppListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAppListAppId(
        $app_id
        ) {
            return $this->act->GetProfileAppListAppId(
                $app_id
            );
        }
        
    public function GetProfileAppAppId(
        $app_id
    ) {
        foreach($this->act->GetProfileAppListAppId(
        $app_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAppListAppId(
        $app_id
    ) {
        return $this->CachedGetProfileAppListAppId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $app_id
        );
    }
    */
        
    public function CachedGetProfileAppListAppId(
        $overrideCache
        , $cacheHours
        , $app_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAppListAppId";

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
            $objs = $this->GetProfileAppListAppId(
                $app_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAppListProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileAppListProfileId(
                $profile_id
            );
        }
        
    public function GetProfileAppProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileAppListProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAppListProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileAppListProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileAppListProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAppListProfileId";

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
            $objs = $this->GetProfileAppListProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAppListProfileIdAppId(
        $profile_id
        , $app_id
        ) {
            return $this->act->GetProfileAppListProfileIdAppId(
                $profile_id
                , $app_id
            );
        }
        
    public function GetProfileAppProfileIdAppId(
        $profile_id
        , $app_id
    ) {
        foreach($this->act->GetProfileAppListProfileIdAppId(
        $profile_id
        , $app_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAppListProfileIdAppId(
        $profile_id
        , $app_id
    ) {
        return $this->CachedGetProfileAppListProfileIdAppId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $app_id
        );
    }
    */
        
    public function CachedGetProfileAppListProfileIdAppId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $app_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAppListProfileIdAppId";

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
            $objs = $this->GetProfileAppListProfileIdAppId(
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
    public function CountProfileOrgUuid(
        $uuid
    ) {      
        return $this->act->CountProfileOrgUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileOrgOrgId(
        $org_id
    ) {      
        return $this->act->CountProfileOrgOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileOrgProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileOrgProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileOrgListFilter($filter_obj) {
        return $this->act->BrowseProfileOrgListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileOrgUuid($set_type, $obj) {
        return $this->act->SetProfileOrgUuid($set_type, $obj);
    }
               
    public function SetProfileOrgUuidFull($obj) {
        return $this->act->SetProfileOrgUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileOrgUuid(
        $uuid
    ) {         
        return $this->act->DelProfileOrgUuid(
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
    public function GetProfileOrgListUuid(
        $uuid
        ) {
            return $this->act->GetProfileOrgListUuid(
                $uuid
            );
        }
        
    public function GetProfileOrgUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileOrgListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileOrgListUuid(
        $uuid
    ) {
        return $this->CachedGetProfileOrgListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileOrgListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileOrgListUuid";

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
            $objs = $this->GetProfileOrgListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileOrgListOrgId(
        $org_id
        ) {
            return $this->act->GetProfileOrgListOrgId(
                $org_id
            );
        }
        
    public function GetProfileOrgOrgId(
        $org_id
    ) {
        foreach($this->act->GetProfileOrgListOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileOrgListOrgId(
        $org_id
    ) {
        return $this->CachedGetProfileOrgListOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetProfileOrgListOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileOrgListOrgId";

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
            $objs = $this->GetProfileOrgListOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileOrgListProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileOrgListProfileId(
                $profile_id
            );
        }
        
    public function GetProfileOrgProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileOrgListProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileOrgListProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileOrgListProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileOrgListProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileOrgListProfileId";

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
            $objs = $this->GetProfileOrgListProfileId(
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
    public function CountProfileQuestionUuid(
        $uuid
    ) {      
        return $this->act->CountProfileQuestionUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileQuestionChannelId(
        $channel_id
    ) {      
        return $this->act->CountProfileQuestionChannelId(
        $channel_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileQuestionOrgId(
        $org_id
    ) {      
        return $this->act->CountProfileQuestionOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileQuestionProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileQuestionProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileQuestionQuestionId(
        $question_id
    ) {      
        return $this->act->CountProfileQuestionQuestionId(
        $question_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileQuestionChannelIdOrgId(
        $channel_id
        , $org_id
    ) {      
        return $this->act->CountProfileQuestionChannelIdOrgId(
        $channel_id
        , $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileQuestionChannelIdProfileId(
        $channel_id
        , $profile_id
    ) {      
        return $this->act->CountProfileQuestionChannelIdProfileId(
        $channel_id
        , $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileQuestionQuestionIdProfileId(
        $question_id
        , $profile_id
    ) {      
        return $this->act->CountProfileQuestionQuestionIdProfileId(
        $question_id
        , $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileQuestionListFilter($filter_obj) {
        return $this->act->BrowseProfileQuestionListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileQuestionUuid($set_type, $obj) {
        return $this->act->SetProfileQuestionUuid($set_type, $obj);
    }
               
    public function SetProfileQuestionUuidFull($obj) {
        return $this->act->SetProfileQuestionUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileQuestionChannelIdProfileId($set_type, $obj) {
        return $this->act->SetProfileQuestionChannelIdProfileId($set_type, $obj);
    }
               
    public function SetProfileQuestionChannelIdProfileIdFull($obj) {
        return $this->act->SetProfileQuestionChannelIdProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileQuestionQuestionIdProfileId($set_type, $obj) {
        return $this->act->SetProfileQuestionQuestionIdProfileId($set_type, $obj);
    }
               
    public function SetProfileQuestionQuestionIdProfileIdFull($obj) {
        return $this->act->SetProfileQuestionQuestionIdProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileQuestionChannelIdQuestionIdProfileId($set_type, $obj) {
        return $this->act->SetProfileQuestionChannelIdQuestionIdProfileId($set_type, $obj);
    }
               
    public function SetProfileQuestionChannelIdQuestionIdProfileIdFull($obj) {
        return $this->act->SetProfileQuestionChannelIdQuestionIdProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileQuestionUuid(
        $uuid
    ) {         
        return $this->act->DelProfileQuestionUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileQuestionChannelIdOrgId(
        $channel_id
        , $org_id
    ) {         
        return $this->act->DelProfileQuestionChannelIdOrgId(
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
    public function GetProfileQuestionListUuid(
        $uuid
        ) {
            return $this->act->GetProfileQuestionListUuid(
                $uuid
            );
        }
        
    public function GetProfileQuestionUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileQuestionListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileQuestionListUuid(
        $uuid
    ) {
        return $this->CachedGetProfileQuestionListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileQuestionListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileQuestionListUuid";

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
            $objs = $this->GetProfileQuestionListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileQuestionListChannelId(
        $channel_id
        ) {
            return $this->act->GetProfileQuestionListChannelId(
                $channel_id
            );
        }
        
    public function GetProfileQuestionChannelId(
        $channel_id
    ) {
        foreach($this->act->GetProfileQuestionListChannelId(
        $channel_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileQuestionListChannelId(
        $channel_id
    ) {
        return $this->CachedGetProfileQuestionListChannelId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
        );
    }
    */
        
    public function CachedGetProfileQuestionListChannelId(
        $overrideCache
        , $cacheHours
        , $channel_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileQuestionListChannelId";

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
            $objs = $this->GetProfileQuestionListChannelId(
                $channel_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileQuestionListOrgId(
        $org_id
        ) {
            return $this->act->GetProfileQuestionListOrgId(
                $org_id
            );
        }
        
    public function GetProfileQuestionOrgId(
        $org_id
    ) {
        foreach($this->act->GetProfileQuestionListOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileQuestionListOrgId(
        $org_id
    ) {
        return $this->CachedGetProfileQuestionListOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetProfileQuestionListOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileQuestionListOrgId";

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
            $objs = $this->GetProfileQuestionListOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileQuestionListProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileQuestionListProfileId(
                $profile_id
            );
        }
        
    public function GetProfileQuestionProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileQuestionListProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileQuestionListProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileQuestionListProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileQuestionListProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileQuestionListProfileId";

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
            $objs = $this->GetProfileQuestionListProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileQuestionListQuestionId(
        $question_id
        ) {
            return $this->act->GetProfileQuestionListQuestionId(
                $question_id
            );
        }
        
    public function GetProfileQuestionQuestionId(
        $question_id
    ) {
        foreach($this->act->GetProfileQuestionListQuestionId(
        $question_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileQuestionListQuestionId(
        $question_id
    ) {
        return $this->CachedGetProfileQuestionListQuestionId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $question_id
        );
    }
    */
        
    public function CachedGetProfileQuestionListQuestionId(
        $overrideCache
        , $cacheHours
        , $question_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileQuestionListQuestionId";

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
            $objs = $this->GetProfileQuestionListQuestionId(
                $question_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileQuestionListChannelIdOrgId(
        $channel_id
        , $org_id
        ) {
            return $this->act->GetProfileQuestionListChannelIdOrgId(
                $channel_id
                , $org_id
            );
        }
        
    public function GetProfileQuestionChannelIdOrgId(
        $channel_id
        , $org_id
    ) {
        foreach($this->act->GetProfileQuestionListChannelIdOrgId(
        $channel_id
        , $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileQuestionListChannelIdOrgId(
        $channel_id
        , $org_id
    ) {
        return $this->CachedGetProfileQuestionListChannelIdOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
            , $org_id
        );
    }
    */
        
    public function CachedGetProfileQuestionListChannelIdOrgId(
        $overrideCache
        , $cacheHours
        , $channel_id
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileQuestionListChannelIdOrgId";

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
            $objs = $this->GetProfileQuestionListChannelIdOrgId(
                $channel_id
                , $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileQuestionListChannelIdProfileId(
        $channel_id
        , $profile_id
        ) {
            return $this->act->GetProfileQuestionListChannelIdProfileId(
                $channel_id
                , $profile_id
            );
        }
        
    public function GetProfileQuestionChannelIdProfileId(
        $channel_id
        , $profile_id
    ) {
        foreach($this->act->GetProfileQuestionListChannelIdProfileId(
        $channel_id
        , $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileQuestionListChannelIdProfileId(
        $channel_id
        , $profile_id
    ) {
        return $this->CachedGetProfileQuestionListChannelIdProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileQuestionListChannelIdProfileId(
        $overrideCache
        , $cacheHours
        , $channel_id
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileQuestionListChannelIdProfileId";

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
            $objs = $this->GetProfileQuestionListChannelIdProfileId(
                $channel_id
                , $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileQuestionListQuestionIdProfileId(
        $question_id
        , $profile_id
        ) {
            return $this->act->GetProfileQuestionListQuestionIdProfileId(
                $question_id
                , $profile_id
            );
        }
        
    public function GetProfileQuestionQuestionIdProfileId(
        $question_id
        , $profile_id
    ) {
        foreach($this->act->GetProfileQuestionListQuestionIdProfileId(
        $question_id
        , $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileQuestionListQuestionIdProfileId(
        $question_id
        , $profile_id
    ) {
        return $this->CachedGetProfileQuestionListQuestionIdProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $question_id
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileQuestionListQuestionIdProfileId(
        $overrideCache
        , $cacheHours
        , $question_id
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileQuestionListQuestionIdProfileId";

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
            $objs = $this->GetProfileQuestionListQuestionIdProfileId(
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
    public function CountProfileChannelUuid(
        $uuid
    ) {      
        return $this->act->CountProfileChannelUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileChannelChannelId(
        $channel_id
    ) {      
        return $this->act->CountProfileChannelChannelId(
        $channel_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileChannelProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileChannelProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileChannelChannelIdProfileId(
        $channel_id
        , $profile_id
    ) {      
        return $this->act->CountProfileChannelChannelIdProfileId(
        $channel_id
        , $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileChannelListFilter($filter_obj) {
        return $this->act->BrowseProfileChannelListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileChannelUuid($set_type, $obj) {
        return $this->act->SetProfileChannelUuid($set_type, $obj);
    }
               
    public function SetProfileChannelUuidFull($obj) {
        return $this->act->SetProfileChannelUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileChannelChannelIdProfileId($set_type, $obj) {
        return $this->act->SetProfileChannelChannelIdProfileId($set_type, $obj);
    }
               
    public function SetProfileChannelChannelIdProfileIdFull($obj) {
        return $this->act->SetProfileChannelChannelIdProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileChannelUuid(
        $uuid
    ) {         
        return $this->act->DelProfileChannelUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileChannelChannelIdProfileId(
        $channel_id
        , $profile_id
    ) {         
        return $this->act->DelProfileChannelChannelIdProfileId(
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
    public function GetProfileChannelListUuid(
        $uuid
        ) {
            return $this->act->GetProfileChannelListUuid(
                $uuid
            );
        }
        
    public function GetProfileChannelUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileChannelListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileChannelListUuid(
        $uuid
    ) {
        return $this->CachedGetProfileChannelListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileChannelListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileChannelListUuid";

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
            $objs = $this->GetProfileChannelListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileChannelListChannelId(
        $channel_id
        ) {
            return $this->act->GetProfileChannelListChannelId(
                $channel_id
            );
        }
        
    public function GetProfileChannelChannelId(
        $channel_id
    ) {
        foreach($this->act->GetProfileChannelListChannelId(
        $channel_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileChannelListChannelId(
        $channel_id
    ) {
        return $this->CachedGetProfileChannelListChannelId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
        );
    }
    */
        
    public function CachedGetProfileChannelListChannelId(
        $overrideCache
        , $cacheHours
        , $channel_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileChannelListChannelId";

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
            $objs = $this->GetProfileChannelListChannelId(
                $channel_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileChannelListProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileChannelListProfileId(
                $profile_id
            );
        }
        
    public function GetProfileChannelProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileChannelListProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileChannelListProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileChannelListProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileChannelListProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileChannelListProfileId";

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
            $objs = $this->GetProfileChannelListProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileChannelListChannelIdProfileId(
        $channel_id
        , $profile_id
        ) {
            return $this->act->GetProfileChannelListChannelIdProfileId(
                $channel_id
                , $profile_id
            );
        }
        
    public function GetProfileChannelChannelIdProfileId(
        $channel_id
        , $profile_id
    ) {
        foreach($this->act->GetProfileChannelListChannelIdProfileId(
        $channel_id
        , $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileChannelListChannelIdProfileId(
        $channel_id
        , $profile_id
    ) {
        return $this->CachedGetProfileChannelListChannelIdProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileChannelListChannelIdProfileId(
        $overrideCache
        , $cacheHours
        , $channel_id
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileChannelListChannelIdProfileId";

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
            $objs = $this->GetProfileChannelListChannelIdProfileId(
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
    public function CountOrgSiteUuid(
        $uuid
    ) {      
        return $this->act->CountOrgSiteUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOrgSiteOrgId(
        $org_id
    ) {      
        return $this->act->CountOrgSiteOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOrgSiteSiteId(
        $site_id
    ) {      
        return $this->act->CountOrgSiteSiteId(
        $site_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountOrgSiteOrgIdSiteId(
        $org_id
        , $site_id
    ) {      
        return $this->act->CountOrgSiteOrgIdSiteId(
        $org_id
        , $site_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseOrgSiteListFilter($filter_obj) {
        return $this->act->BrowseOrgSiteListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOrgSiteUuid($set_type, $obj) {
        return $this->act->SetOrgSiteUuid($set_type, $obj);
    }
               
    public function SetOrgSiteUuidFull($obj) {
        return $this->act->SetOrgSiteUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetOrgSiteOrgIdSiteId($set_type, $obj) {
        return $this->act->SetOrgSiteOrgIdSiteId($set_type, $obj);
    }
               
    public function SetOrgSiteOrgIdSiteIdFull($obj) {
        return $this->act->SetOrgSiteOrgIdSiteId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelOrgSiteUuid(
        $uuid
    ) {         
        return $this->act->DelOrgSiteUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelOrgSiteOrgIdSiteId(
        $org_id
        , $site_id
    ) {         
        return $this->act->DelOrgSiteOrgIdSiteId(
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
    public function GetOrgSiteListUuid(
        $uuid
        ) {
            return $this->act->GetOrgSiteListUuid(
                $uuid
            );
        }
        
    public function GetOrgSiteUuid(
        $uuid
    ) {
        foreach($this->act->GetOrgSiteListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOrgSiteListUuid(
        $uuid
    ) {
        return $this->CachedGetOrgSiteListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetOrgSiteListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetOrgSiteListUuid";

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
            $objs = $this->GetOrgSiteListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOrgSiteListOrgId(
        $org_id
        ) {
            return $this->act->GetOrgSiteListOrgId(
                $org_id
            );
        }
        
    public function GetOrgSiteOrgId(
        $org_id
    ) {
        foreach($this->act->GetOrgSiteListOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOrgSiteListOrgId(
        $org_id
    ) {
        return $this->CachedGetOrgSiteListOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetOrgSiteListOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetOrgSiteListOrgId";

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
            $objs = $this->GetOrgSiteListOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOrgSiteListSiteId(
        $site_id
        ) {
            return $this->act->GetOrgSiteListSiteId(
                $site_id
            );
        }
        
    public function GetOrgSiteSiteId(
        $site_id
    ) {
        foreach($this->act->GetOrgSiteListSiteId(
        $site_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOrgSiteListSiteId(
        $site_id
    ) {
        return $this->CachedGetOrgSiteListSiteId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $site_id
        );
    }
    */
        
    public function CachedGetOrgSiteListSiteId(
        $overrideCache
        , $cacheHours
        , $site_id
    ) {

        $objs = array();

        $method_name = "CachedGetOrgSiteListSiteId";

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
            $objs = $this->GetOrgSiteListSiteId(
                $site_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetOrgSiteListOrgIdSiteId(
        $org_id
        , $site_id
        ) {
            return $this->act->GetOrgSiteListOrgIdSiteId(
                $org_id
                , $site_id
            );
        }
        
    public function GetOrgSiteOrgIdSiteId(
        $org_id
        , $site_id
    ) {
        foreach($this->act->GetOrgSiteListOrgIdSiteId(
        $org_id
        , $site_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetOrgSiteListOrgIdSiteId(
        $org_id
        , $site_id
    ) {
        return $this->CachedGetOrgSiteListOrgIdSiteId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
            , $site_id
        );
    }
    */
        
    public function CachedGetOrgSiteListOrgIdSiteId(
        $overrideCache
        , $cacheHours
        , $org_id
        , $site_id
    ) {

        $objs = array();

        $method_name = "CachedGetOrgSiteListOrgIdSiteId";

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
            $objs = $this->GetOrgSiteListOrgIdSiteId(
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
    public function CountSiteAppUuid(
        $uuid
    ) {      
        return $this->act->CountSiteAppUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountSiteAppAppId(
        $app_id
    ) {      
        return $this->act->CountSiteAppAppId(
        $app_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountSiteAppSiteId(
        $site_id
    ) {      
        return $this->act->CountSiteAppSiteId(
        $site_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountSiteAppAppIdSiteId(
        $app_id
        , $site_id
    ) {      
        return $this->act->CountSiteAppAppIdSiteId(
        $app_id
        , $site_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseSiteAppListFilter($filter_obj) {
        return $this->act->BrowseSiteAppListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetSiteAppUuid($set_type, $obj) {
        return $this->act->SetSiteAppUuid($set_type, $obj);
    }
               
    public function SetSiteAppUuidFull($obj) {
        return $this->act->SetSiteAppUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetSiteAppAppIdSiteId($set_type, $obj) {
        return $this->act->SetSiteAppAppIdSiteId($set_type, $obj);
    }
               
    public function SetSiteAppAppIdSiteIdFull($obj) {
        return $this->act->SetSiteAppAppIdSiteId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelSiteAppUuid(
        $uuid
    ) {         
        return $this->act->DelSiteAppUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelSiteAppAppIdSiteId(
        $app_id
        , $site_id
    ) {         
        return $this->act->DelSiteAppAppIdSiteId(
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
    public function GetSiteAppListUuid(
        $uuid
        ) {
            return $this->act->GetSiteAppListUuid(
                $uuid
            );
        }
        
    public function GetSiteAppUuid(
        $uuid
    ) {
        foreach($this->act->GetSiteAppListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteAppListUuid(
        $uuid
    ) {
        return $this->CachedGetSiteAppListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetSiteAppListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetSiteAppListUuid";

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
            $objs = $this->GetSiteAppListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetSiteAppListAppId(
        $app_id
        ) {
            return $this->act->GetSiteAppListAppId(
                $app_id
            );
        }
        
    public function GetSiteAppAppId(
        $app_id
    ) {
        foreach($this->act->GetSiteAppListAppId(
        $app_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteAppListAppId(
        $app_id
    ) {
        return $this->CachedGetSiteAppListAppId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $app_id
        );
    }
    */
        
    public function CachedGetSiteAppListAppId(
        $overrideCache
        , $cacheHours
        , $app_id
    ) {

        $objs = array();

        $method_name = "CachedGetSiteAppListAppId";

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
            $objs = $this->GetSiteAppListAppId(
                $app_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetSiteAppListSiteId(
        $site_id
        ) {
            return $this->act->GetSiteAppListSiteId(
                $site_id
            );
        }
        
    public function GetSiteAppSiteId(
        $site_id
    ) {
        foreach($this->act->GetSiteAppListSiteId(
        $site_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteAppListSiteId(
        $site_id
    ) {
        return $this->CachedGetSiteAppListSiteId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $site_id
        );
    }
    */
        
    public function CachedGetSiteAppListSiteId(
        $overrideCache
        , $cacheHours
        , $site_id
    ) {

        $objs = array();

        $method_name = "CachedGetSiteAppListSiteId";

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
            $objs = $this->GetSiteAppListSiteId(
                $site_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetSiteAppListAppIdSiteId(
        $app_id
        , $site_id
        ) {
            return $this->act->GetSiteAppListAppIdSiteId(
                $app_id
                , $site_id
            );
        }
        
    public function GetSiteAppAppIdSiteId(
        $app_id
        , $site_id
    ) {
        foreach($this->act->GetSiteAppListAppIdSiteId(
        $app_id
        , $site_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetSiteAppListAppIdSiteId(
        $app_id
        , $site_id
    ) {
        return $this->CachedGetSiteAppListAppIdSiteId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $app_id
            , $site_id
        );
    }
    */
        
    public function CachedGetSiteAppListAppIdSiteId(
        $overrideCache
        , $cacheHours
        , $app_id
        , $site_id
    ) {

        $objs = array();

        $method_name = "CachedGetSiteAppListAppIdSiteId";

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
            $objs = $this->GetSiteAppListAppIdSiteId(
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
    public function CountPhotoUuid(
        $uuid
    ) {      
        return $this->act->CountPhotoUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountPhotoExternalId(
        $external_id
    ) {      
        return $this->act->CountPhotoExternalId(
        $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountPhotoUrl(
        $url
    ) {      
        return $this->act->CountPhotoUrl(
        $url
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountPhotoUrlExternalId(
        $url
        , $external_id
    ) {      
        return $this->act->CountPhotoUrlExternalId(
        $url
        , $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountPhotoUuidExternalId(
        $uuid
        , $external_id
    ) {      
        return $this->act->CountPhotoUuidExternalId(
        $uuid
        , $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowsePhotoListFilter($filter_obj) {
        return $this->act->BrowsePhotoListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetPhotoUuid($set_type, $obj) {
        return $this->act->SetPhotoUuid($set_type, $obj);
    }
               
    public function SetPhotoUuidFull($obj) {
        return $this->act->SetPhotoUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetPhotoExternalId($set_type, $obj) {
        return $this->act->SetPhotoExternalId($set_type, $obj);
    }
               
    public function SetPhotoExternalIdFull($obj) {
        return $this->act->SetPhotoExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetPhotoUrl($set_type, $obj) {
        return $this->act->SetPhotoUrl($set_type, $obj);
    }
               
    public function SetPhotoUrlFull($obj) {
        return $this->act->SetPhotoUrl('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetPhotoUrlExternalId($set_type, $obj) {
        return $this->act->SetPhotoUrlExternalId($set_type, $obj);
    }
               
    public function SetPhotoUrlExternalIdFull($obj) {
        return $this->act->SetPhotoUrlExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetPhotoUuidExternalId($set_type, $obj) {
        return $this->act->SetPhotoUuidExternalId($set_type, $obj);
    }
               
    public function SetPhotoUuidExternalIdFull($obj) {
        return $this->act->SetPhotoUuidExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelPhotoUuid(
        $uuid
    ) {         
        return $this->act->DelPhotoUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelPhotoExternalId(
        $external_id
    ) {         
        return $this->act->DelPhotoExternalId(
        $external_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelPhotoUrl(
        $url
    ) {         
        return $this->act->DelPhotoUrl(
        $url
        );
    }
#------------------------------------------------------------------------------                    
    public function DelPhotoUrlExternalId(
        $url
        , $external_id
    ) {         
        return $this->act->DelPhotoUrlExternalId(
        $url
        , $external_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelPhotoUuidExternalId(
        $uuid
        , $external_id
    ) {         
        return $this->act->DelPhotoUuidExternalId(
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
    public function GetPhotoListUuid(
        $uuid
        ) {
            return $this->act->GetPhotoListUuid(
                $uuid
            );
        }
        
    public function GetPhotoUuid(
        $uuid
    ) {
        foreach($this->act->GetPhotoListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetPhotoListUuid(
        $uuid
    ) {
        return $this->CachedGetPhotoListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetPhotoListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetPhotoListUuid";

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
            $objs = $this->GetPhotoListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetPhotoListExternalId(
        $external_id
        ) {
            return $this->act->GetPhotoListExternalId(
                $external_id
            );
        }
        
    public function GetPhotoExternalId(
        $external_id
    ) {
        foreach($this->act->GetPhotoListExternalId(
        $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetPhotoListExternalId(
        $external_id
    ) {
        return $this->CachedGetPhotoListExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $external_id
        );
    }
    */
        
    public function CachedGetPhotoListExternalId(
        $overrideCache
        , $cacheHours
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetPhotoListExternalId";

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
            $objs = $this->GetPhotoListExternalId(
                $external_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetPhotoListUrl(
        $url
        ) {
            return $this->act->GetPhotoListUrl(
                $url
            );
        }
        
    public function GetPhotoUrl(
        $url
    ) {
        foreach($this->act->GetPhotoListUrl(
        $url
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetPhotoListUrl(
        $url
    ) {
        return $this->CachedGetPhotoListUrl(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
        );
    }
    */
        
    public function CachedGetPhotoListUrl(
        $overrideCache
        , $cacheHours
        , $url
    ) {

        $objs = array();

        $method_name = "CachedGetPhotoListUrl";

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
            $objs = $this->GetPhotoListUrl(
                $url
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetPhotoListUrlExternalId(
        $url
        , $external_id
        ) {
            return $this->act->GetPhotoListUrlExternalId(
                $url
                , $external_id
            );
        }
        
    public function GetPhotoUrlExternalId(
        $url
        , $external_id
    ) {
        foreach($this->act->GetPhotoListUrlExternalId(
        $url
        , $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetPhotoListUrlExternalId(
        $url
        , $external_id
    ) {
        return $this->CachedGetPhotoListUrlExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
            , $external_id
        );
    }
    */
        
    public function CachedGetPhotoListUrlExternalId(
        $overrideCache
        , $cacheHours
        , $url
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetPhotoListUrlExternalId";

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
            $objs = $this->GetPhotoListUrlExternalId(
                $url
                , $external_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetPhotoListUuidExternalId(
        $uuid
        , $external_id
        ) {
            return $this->act->GetPhotoListUuidExternalId(
                $uuid
                , $external_id
            );
        }
        
    public function GetPhotoUuidExternalId(
        $uuid
        , $external_id
    ) {
        foreach($this->act->GetPhotoListUuidExternalId(
        $uuid
        , $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetPhotoListUuidExternalId(
        $uuid
        , $external_id
    ) {
        return $this->CachedGetPhotoListUuidExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
            , $external_id
        );
    }
    */
        
    public function CachedGetPhotoListUuidExternalId(
        $overrideCache
        , $cacheHours
        , $uuid
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetPhotoListUuidExternalId";

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
            $objs = $this->GetPhotoListUuidExternalId(
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
    public function CountVideoUuid(
        $uuid
    ) {      
        return $this->act->CountVideoUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountVideoExternalId(
        $external_id
    ) {      
        return $this->act->CountVideoExternalId(
        $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountVideoUrl(
        $url
    ) {      
        return $this->act->CountVideoUrl(
        $url
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountVideoUrlExternalId(
        $url
        , $external_id
    ) {      
        return $this->act->CountVideoUrlExternalId(
        $url
        , $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountVideoUuidExternalId(
        $uuid
        , $external_id
    ) {      
        return $this->act->CountVideoUuidExternalId(
        $uuid
        , $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseVideoListFilter($filter_obj) {
        return $this->act->BrowseVideoListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetVideoUuid($set_type, $obj) {
        return $this->act->SetVideoUuid($set_type, $obj);
    }
               
    public function SetVideoUuidFull($obj) {
        return $this->act->SetVideoUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetVideoExternalId($set_type, $obj) {
        return $this->act->SetVideoExternalId($set_type, $obj);
    }
               
    public function SetVideoExternalIdFull($obj) {
        return $this->act->SetVideoExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetVideoUrl($set_type, $obj) {
        return $this->act->SetVideoUrl($set_type, $obj);
    }
               
    public function SetVideoUrlFull($obj) {
        return $this->act->SetVideoUrl('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetVideoUrlExternalId($set_type, $obj) {
        return $this->act->SetVideoUrlExternalId($set_type, $obj);
    }
               
    public function SetVideoUrlExternalIdFull($obj) {
        return $this->act->SetVideoUrlExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetVideoUuidExternalId($set_type, $obj) {
        return $this->act->SetVideoUuidExternalId($set_type, $obj);
    }
               
    public function SetVideoUuidExternalIdFull($obj) {
        return $this->act->SetVideoUuidExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelVideoUuid(
        $uuid
    ) {         
        return $this->act->DelVideoUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelVideoExternalId(
        $external_id
    ) {         
        return $this->act->DelVideoExternalId(
        $external_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelVideoUrl(
        $url
    ) {         
        return $this->act->DelVideoUrl(
        $url
        );
    }
#------------------------------------------------------------------------------                    
    public function DelVideoUrlExternalId(
        $url
        , $external_id
    ) {         
        return $this->act->DelVideoUrlExternalId(
        $url
        , $external_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelVideoUuidExternalId(
        $uuid
        , $external_id
    ) {         
        return $this->act->DelVideoUuidExternalId(
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
    public function GetVideoListUuid(
        $uuid
        ) {
            return $this->act->GetVideoListUuid(
                $uuid
            );
        }
        
    public function GetVideoUuid(
        $uuid
    ) {
        foreach($this->act->GetVideoListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetVideoListUuid(
        $uuid
    ) {
        return $this->CachedGetVideoListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetVideoListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetVideoListUuid";

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
            $objs = $this->GetVideoListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetVideoListExternalId(
        $external_id
        ) {
            return $this->act->GetVideoListExternalId(
                $external_id
            );
        }
        
    public function GetVideoExternalId(
        $external_id
    ) {
        foreach($this->act->GetVideoListExternalId(
        $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetVideoListExternalId(
        $external_id
    ) {
        return $this->CachedGetVideoListExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $external_id
        );
    }
    */
        
    public function CachedGetVideoListExternalId(
        $overrideCache
        , $cacheHours
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetVideoListExternalId";

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
            $objs = $this->GetVideoListExternalId(
                $external_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetVideoListUrl(
        $url
        ) {
            return $this->act->GetVideoListUrl(
                $url
            );
        }
        
    public function GetVideoUrl(
        $url
    ) {
        foreach($this->act->GetVideoListUrl(
        $url
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetVideoListUrl(
        $url
    ) {
        return $this->CachedGetVideoListUrl(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
        );
    }
    */
        
    public function CachedGetVideoListUrl(
        $overrideCache
        , $cacheHours
        , $url
    ) {

        $objs = array();

        $method_name = "CachedGetVideoListUrl";

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
            $objs = $this->GetVideoListUrl(
                $url
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetVideoListUrlExternalId(
        $url
        , $external_id
        ) {
            return $this->act->GetVideoListUrlExternalId(
                $url
                , $external_id
            );
        }
        
    public function GetVideoUrlExternalId(
        $url
        , $external_id
    ) {
        foreach($this->act->GetVideoListUrlExternalId(
        $url
        , $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetVideoListUrlExternalId(
        $url
        , $external_id
    ) {
        return $this->CachedGetVideoListUrlExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
            , $external_id
        );
    }
    */
        
    public function CachedGetVideoListUrlExternalId(
        $overrideCache
        , $cacheHours
        , $url
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetVideoListUrlExternalId";

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
            $objs = $this->GetVideoListUrlExternalId(
                $url
                , $external_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetVideoListUuidExternalId(
        $uuid
        , $external_id
        ) {
            return $this->act->GetVideoListUuidExternalId(
                $uuid
                , $external_id
            );
        }
        
    public function GetVideoUuidExternalId(
        $uuid
        , $external_id
    ) {
        foreach($this->act->GetVideoListUuidExternalId(
        $uuid
        , $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetVideoListUuidExternalId(
        $uuid
        , $external_id
    ) {
        return $this->CachedGetVideoListUuidExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
            , $external_id
        );
    }
    */
        
    public function CachedGetVideoListUuidExternalId(
        $overrideCache
        , $cacheHours
        , $uuid
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetVideoListUuidExternalId";

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
            $objs = $this->GetVideoListUuidExternalId(
                $uuid
                , $external_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
    
}

?>
