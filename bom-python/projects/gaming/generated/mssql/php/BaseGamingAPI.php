<?php // namespace Gaming;

require_once('BaseGamingACT.php');

class SetType {
    const FULL = 'full';
    const INSERT_ONLY = 'insertonly';
    const UPDATE_ONLY = 'updateonly';
}

class BaseGamingAPI {

    public $act;
    public $DEFAULT_CACHE_HOURS = 12;
    public $DEFAULT_SET_TYPE = 'full';

    public function __construct() {
        $this->DEFAULT_CACHE_HOURS = 12;
        $this->DEFAULT_SET_TYPE = SetType::FULL;
        $this->act = new BaseGamingACT();
    }
    
    public function __destruct() {
    
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
    public function CountGameNetwork(
    ) {      
        return $this->act->CountGameNetwork(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameNetworkByUuid(
        $uuid
    ) {      
        return $this->act->CountGameNetworkByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameNetworkByCode(
        $code
    ) {      
        return $this->act->CountGameNetworkByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameNetworkByUuidByType(
        $uuid
        , $type
    ) {      
        return $this->act->CountGameNetworkByUuidByType(
        $uuid
        , $type
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameNetworkListByFilter($filter_obj) {
        return $this->act->BrowseGameNetworkListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameNetworkByUuid($set_type, $obj) {
        return $this->act->SetGameNetworkByUuid($set_type, $obj);
    }
               
    public function SetGameNetworkByUuidFull($obj) {
        return $this->act->SetGameNetworkByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameNetworkByCode($set_type, $obj) {
        return $this->act->SetGameNetworkByCode($set_type, $obj);
    }
               
    public function SetGameNetworkByCodeFull($obj) {
        return $this->act->SetGameNetworkByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameNetworkByUuid(
        $uuid
    ) {         
        return $this->act->DelGameNetworkByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameNetworkList(
        ) {
            return $this->act->GetGameNetworkList(
            );
        }
        
    public function GetGameNetwork(
    ) {
        foreach($this->act->GetGameNetworkList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameNetworkList(
    ) {
        return $this->CachedGetGameNetworkList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameNetworkList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameNetworkList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameNetwork>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameNetworkList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameNetworkListByUuid(
        $uuid
        ) {
            return $this->act->GetGameNetworkListByUuid(
                $uuid
            );
        }
        
    public function GetGameNetworkByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameNetworkListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameNetworkListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameNetworkListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameNetworkListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameNetworkListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameNetwork>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameNetworkListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameNetworkListByCode(
        $code
        ) {
            return $this->act->GetGameNetworkListByCode(
                $code
            );
        }
        
    public function GetGameNetworkByCode(
        $code
    ) {
        foreach($this->act->GetGameNetworkListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameNetworkListByCode(
        $code
    ) {
        return $this->CachedGetGameNetworkListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameNetworkListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameNetworkListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameNetwork>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameNetworkListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameNetworkListByUuidByType(
        $uuid
        , $type
        ) {
            return $this->act->GetGameNetworkListByUuidByType(
                $uuid
                , $type
            );
        }
        
    public function GetGameNetworkByUuidByType(
        $uuid
        , $type
    ) {
        foreach($this->act->GetGameNetworkListByUuidByType(
        $uuid
        , $type
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameNetworkListByUuidByType(
        $uuid
        , $type
    ) {
        return $this->CachedGetGameNetworkListByUuidByType(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
            , $type
        );
    }
    */
        
    public function CachedGetGameNetworkListByUuidByType(
        $overrideCache
        , $cacheHours
        , $uuid
        , $type
    ) {

        $objs = array();

        $method_name = "CachedGetGameNetworkListByUuidByType";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;
        $sb += "_";
        $sb += strtolower("$type");
        $sb += "_";
        $sb += $type;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameNetwork>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameNetworkListByUuidByType(
                $uuid
                , $type
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameNetworkAuth(
    ) {      
        return $this->act->CountGameNetworkAuth(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameNetworkAuthByUuid(
        $uuid
    ) {      
        return $this->act->CountGameNetworkAuthByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameNetworkAuthByGameIdByGameNetworkId(
        $game_id
        , $game_network_id
    ) {      
        return $this->act->CountGameNetworkAuthByGameIdByGameNetworkId(
        $game_id
        , $game_network_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameNetworkAuthListByFilter($filter_obj) {
        return $this->act->BrowseGameNetworkAuthListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameNetworkAuthByUuid($set_type, $obj) {
        return $this->act->SetGameNetworkAuthByUuid($set_type, $obj);
    }
               
    public function SetGameNetworkAuthByUuidFull($obj) {
        return $this->act->SetGameNetworkAuthByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameNetworkAuthByGameIdByGameNetworkId($set_type, $obj) {
        return $this->act->SetGameNetworkAuthByGameIdByGameNetworkId($set_type, $obj);
    }
               
    public function SetGameNetworkAuthByGameIdByGameNetworkIdFull($obj) {
        return $this->act->SetGameNetworkAuthByGameIdByGameNetworkId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameNetworkAuthByUuid(
        $uuid
    ) {         
        return $this->act->DelGameNetworkAuthByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameNetworkAuthList(
        ) {
            return $this->act->GetGameNetworkAuthList(
            );
        }
        
    public function GetGameNetworkAuth(
    ) {
        foreach($this->act->GetGameNetworkAuthList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameNetworkAuthList(
    ) {
        return $this->CachedGetGameNetworkAuthList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameNetworkAuthList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameNetworkAuthList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameNetworkAuth>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameNetworkAuthList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameNetworkAuthListByUuid(
        $uuid
        ) {
            return $this->act->GetGameNetworkAuthListByUuid(
                $uuid
            );
        }
        
    public function GetGameNetworkAuthByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameNetworkAuthListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameNetworkAuthListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameNetworkAuthListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameNetworkAuthListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameNetworkAuthListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameNetworkAuth>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameNetworkAuthListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameNetworkAuthListByGameIdByGameNetworkId(
        $game_id
        , $game_network_id
        ) {
            return $this->act->GetGameNetworkAuthListByGameIdByGameNetworkId(
                $game_id
                , $game_network_id
            );
        }
        
    public function GetGameNetworkAuthByGameIdByGameNetworkId(
        $game_id
        , $game_network_id
    ) {
        foreach($this->act->GetGameNetworkAuthListByGameIdByGameNetworkId(
        $game_id
        , $game_network_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameNetworkAuthListByGameIdByGameNetworkId(
        $game_id
        , $game_network_id
    ) {
        return $this->CachedGetGameNetworkAuthListByGameIdByGameNetworkId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $game_network_id
        );
    }
    */
        
    public function CachedGetGameNetworkAuthListByGameIdByGameNetworkId(
        $overrideCache
        , $cacheHours
        , $game_id
        , $game_network_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameNetworkAuthListByGameIdByGameNetworkId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$game_network_id");
        $sb += "_";
        $sb += $game_network_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameNetworkAuth>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameNetworkAuthListByGameIdByGameNetworkId(
                $game_id
                , $game_network_id
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
    public function CountGamePhoto(
    ) {      
        return $this->act->CountGamePhoto(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGamePhotoByUuid(
        $uuid
    ) {      
        return $this->act->CountGamePhotoByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGamePhotoByExternalId(
        $external_id
    ) {      
        return $this->act->CountGamePhotoByExternalId(
        $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGamePhotoByUrl(
        $url
    ) {      
        return $this->act->CountGamePhotoByUrl(
        $url
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGamePhotoByUrlByExternalId(
        $url
        , $external_id
    ) {      
        return $this->act->CountGamePhotoByUrlByExternalId(
        $url
        , $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGamePhotoByUuidByExternalId(
        $uuid
        , $external_id
    ) {      
        return $this->act->CountGamePhotoByUuidByExternalId(
        $uuid
        , $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGamePhotoListByFilter($filter_obj) {
        return $this->act->BrowseGamePhotoListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGamePhotoByUuid($set_type, $obj) {
        return $this->act->SetGamePhotoByUuid($set_type, $obj);
    }
               
    public function SetGamePhotoByUuidFull($obj) {
        return $this->act->SetGamePhotoByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGamePhotoByExternalId($set_type, $obj) {
        return $this->act->SetGamePhotoByExternalId($set_type, $obj);
    }
               
    public function SetGamePhotoByExternalIdFull($obj) {
        return $this->act->SetGamePhotoByExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGamePhotoByUrl($set_type, $obj) {
        return $this->act->SetGamePhotoByUrl($set_type, $obj);
    }
               
    public function SetGamePhotoByUrlFull($obj) {
        return $this->act->SetGamePhotoByUrl('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGamePhotoByUrlByExternalId($set_type, $obj) {
        return $this->act->SetGamePhotoByUrlByExternalId($set_type, $obj);
    }
               
    public function SetGamePhotoByUrlByExternalIdFull($obj) {
        return $this->act->SetGamePhotoByUrlByExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGamePhotoByUuidByExternalId($set_type, $obj) {
        return $this->act->SetGamePhotoByUuidByExternalId($set_type, $obj);
    }
               
    public function SetGamePhotoByUuidByExternalIdFull($obj) {
        return $this->act->SetGamePhotoByUuidByExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGamePhotoByUuid(
        $uuid
    ) {         
        return $this->act->DelGamePhotoByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGamePhotoByExternalId(
        $external_id
    ) {         
        return $this->act->DelGamePhotoByExternalId(
        $external_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGamePhotoByUrl(
        $url
    ) {         
        return $this->act->DelGamePhotoByUrl(
        $url
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGamePhotoByUrlByExternalId(
        $url
        , $external_id
    ) {         
        return $this->act->DelGamePhotoByUrlByExternalId(
        $url
        , $external_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGamePhotoByUuidByExternalId(
        $uuid
        , $external_id
    ) {         
        return $this->act->DelGamePhotoByUuidByExternalId(
        $uuid
        , $external_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGamePhotoList(
        ) {
            return $this->act->GetGamePhotoList(
            );
        }
        
    public function GetGamePhoto(
    ) {
        foreach($this->act->GetGamePhotoList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGamePhotoList(
    ) {
        return $this->CachedGetGamePhotoList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGamePhotoList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGamePhotoList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GamePhoto>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGamePhotoList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGamePhotoListByUuid(
        $uuid
        ) {
            return $this->act->GetGamePhotoListByUuid(
                $uuid
            );
        }
        
    public function GetGamePhotoByUuid(
        $uuid
    ) {
        foreach($this->act->GetGamePhotoListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGamePhotoListByUuid(
        $uuid
    ) {
        return $this->CachedGetGamePhotoListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGamePhotoListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGamePhotoListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GamePhoto>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGamePhotoListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGamePhotoListByExternalId(
        $external_id
        ) {
            return $this->act->GetGamePhotoListByExternalId(
                $external_id
            );
        }
        
    public function GetGamePhotoByExternalId(
        $external_id
    ) {
        foreach($this->act->GetGamePhotoListByExternalId(
        $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGamePhotoListByExternalId(
        $external_id
    ) {
        return $this->CachedGetGamePhotoListByExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $external_id
        );
    }
    */
        
    public function CachedGetGamePhotoListByExternalId(
        $overrideCache
        , $cacheHours
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetGamePhotoListByExternalId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$external_id");
        $sb += "_";
        $sb += $external_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GamePhoto>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGamePhotoListByExternalId(
                $external_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGamePhotoListByUrl(
        $url
        ) {
            return $this->act->GetGamePhotoListByUrl(
                $url
            );
        }
        
    public function GetGamePhotoByUrl(
        $url
    ) {
        foreach($this->act->GetGamePhotoListByUrl(
        $url
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGamePhotoListByUrl(
        $url
    ) {
        return $this->CachedGetGamePhotoListByUrl(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
        );
    }
    */
        
    public function CachedGetGamePhotoListByUrl(
        $overrideCache
        , $cacheHours
        , $url
    ) {

        $objs = array();

        $method_name = "CachedGetGamePhotoListByUrl";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$url");
        $sb += "_";
        $sb += $url;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GamePhoto>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGamePhotoListByUrl(
                $url
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGamePhotoListByUrlByExternalId(
        $url
        , $external_id
        ) {
            return $this->act->GetGamePhotoListByUrlByExternalId(
                $url
                , $external_id
            );
        }
        
    public function GetGamePhotoByUrlByExternalId(
        $url
        , $external_id
    ) {
        foreach($this->act->GetGamePhotoListByUrlByExternalId(
        $url
        , $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGamePhotoListByUrlByExternalId(
        $url
        , $external_id
    ) {
        return $this->CachedGetGamePhotoListByUrlByExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
            , $external_id
        );
    }
    */
        
    public function CachedGetGamePhotoListByUrlByExternalId(
        $overrideCache
        , $cacheHours
        , $url
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetGamePhotoListByUrlByExternalId";

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

        //$objs = CacheUtil.Get<List<GamePhoto>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGamePhotoListByUrlByExternalId(
                $url
                , $external_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGamePhotoListByUuidByExternalId(
        $uuid
        , $external_id
        ) {
            return $this->act->GetGamePhotoListByUuidByExternalId(
                $uuid
                , $external_id
            );
        }
        
    public function GetGamePhotoByUuidByExternalId(
        $uuid
        , $external_id
    ) {
        foreach($this->act->GetGamePhotoListByUuidByExternalId(
        $uuid
        , $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGamePhotoListByUuidByExternalId(
        $uuid
        , $external_id
    ) {
        return $this->CachedGetGamePhotoListByUuidByExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
            , $external_id
        );
    }
    */
        
    public function CachedGetGamePhotoListByUuidByExternalId(
        $overrideCache
        , $cacheHours
        , $uuid
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetGamePhotoListByUuidByExternalId";

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

        //$objs = CacheUtil.Get<List<GamePhoto>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGamePhotoListByUuidByExternalId(
                $uuid
                , $external_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameVideo(
    ) {      
        return $this->act->CountGameVideo(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameVideoByUuid(
        $uuid
    ) {      
        return $this->act->CountGameVideoByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameVideoByExternalId(
        $external_id
    ) {      
        return $this->act->CountGameVideoByExternalId(
        $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameVideoByUrl(
        $url
    ) {      
        return $this->act->CountGameVideoByUrl(
        $url
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameVideoByUrlByExternalId(
        $url
        , $external_id
    ) {      
        return $this->act->CountGameVideoByUrlByExternalId(
        $url
        , $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameVideoByUuidByExternalId(
        $uuid
        , $external_id
    ) {      
        return $this->act->CountGameVideoByUuidByExternalId(
        $uuid
        , $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameVideoListByFilter($filter_obj) {
        return $this->act->BrowseGameVideoListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameVideoByUuid($set_type, $obj) {
        return $this->act->SetGameVideoByUuid($set_type, $obj);
    }
               
    public function SetGameVideoByUuidFull($obj) {
        return $this->act->SetGameVideoByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameVideoByExternalId($set_type, $obj) {
        return $this->act->SetGameVideoByExternalId($set_type, $obj);
    }
               
    public function SetGameVideoByExternalIdFull($obj) {
        return $this->act->SetGameVideoByExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameVideoByUrl($set_type, $obj) {
        return $this->act->SetGameVideoByUrl($set_type, $obj);
    }
               
    public function SetGameVideoByUrlFull($obj) {
        return $this->act->SetGameVideoByUrl('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameVideoByUrlByExternalId($set_type, $obj) {
        return $this->act->SetGameVideoByUrlByExternalId($set_type, $obj);
    }
               
    public function SetGameVideoByUrlByExternalIdFull($obj) {
        return $this->act->SetGameVideoByUrlByExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameVideoByUuidByExternalId($set_type, $obj) {
        return $this->act->SetGameVideoByUuidByExternalId($set_type, $obj);
    }
               
    public function SetGameVideoByUuidByExternalIdFull($obj) {
        return $this->act->SetGameVideoByUuidByExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameVideoByUuid(
        $uuid
    ) {         
        return $this->act->DelGameVideoByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameVideoByExternalId(
        $external_id
    ) {         
        return $this->act->DelGameVideoByExternalId(
        $external_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameVideoByUrl(
        $url
    ) {         
        return $this->act->DelGameVideoByUrl(
        $url
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameVideoByUrlByExternalId(
        $url
        , $external_id
    ) {         
        return $this->act->DelGameVideoByUrlByExternalId(
        $url
        , $external_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameVideoByUuidByExternalId(
        $uuid
        , $external_id
    ) {         
        return $this->act->DelGameVideoByUuidByExternalId(
        $uuid
        , $external_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameVideoList(
        ) {
            return $this->act->GetGameVideoList(
            );
        }
        
    public function GetGameVideo(
    ) {
        foreach($this->act->GetGameVideoList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameVideoList(
    ) {
        return $this->CachedGetGameVideoList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameVideoList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameVideoList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameVideo>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameVideoList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameVideoListByUuid(
        $uuid
        ) {
            return $this->act->GetGameVideoListByUuid(
                $uuid
            );
        }
        
    public function GetGameVideoByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameVideoListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameVideoListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameVideoListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameVideoListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameVideoListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameVideo>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameVideoListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameVideoListByExternalId(
        $external_id
        ) {
            return $this->act->GetGameVideoListByExternalId(
                $external_id
            );
        }
        
    public function GetGameVideoByExternalId(
        $external_id
    ) {
        foreach($this->act->GetGameVideoListByExternalId(
        $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameVideoListByExternalId(
        $external_id
    ) {
        return $this->CachedGetGameVideoListByExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $external_id
        );
    }
    */
        
    public function CachedGetGameVideoListByExternalId(
        $overrideCache
        , $cacheHours
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameVideoListByExternalId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$external_id");
        $sb += "_";
        $sb += $external_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameVideo>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameVideoListByExternalId(
                $external_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameVideoListByUrl(
        $url
        ) {
            return $this->act->GetGameVideoListByUrl(
                $url
            );
        }
        
    public function GetGameVideoByUrl(
        $url
    ) {
        foreach($this->act->GetGameVideoListByUrl(
        $url
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameVideoListByUrl(
        $url
    ) {
        return $this->CachedGetGameVideoListByUrl(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
        );
    }
    */
        
    public function CachedGetGameVideoListByUrl(
        $overrideCache
        , $cacheHours
        , $url
    ) {

        $objs = array();

        $method_name = "CachedGetGameVideoListByUrl";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$url");
        $sb += "_";
        $sb += $url;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameVideo>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameVideoListByUrl(
                $url
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameVideoListByUrlByExternalId(
        $url
        , $external_id
        ) {
            return $this->act->GetGameVideoListByUrlByExternalId(
                $url
                , $external_id
            );
        }
        
    public function GetGameVideoByUrlByExternalId(
        $url
        , $external_id
    ) {
        foreach($this->act->GetGameVideoListByUrlByExternalId(
        $url
        , $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameVideoListByUrlByExternalId(
        $url
        , $external_id
    ) {
        return $this->CachedGetGameVideoListByUrlByExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
            , $external_id
        );
    }
    */
        
    public function CachedGetGameVideoListByUrlByExternalId(
        $overrideCache
        , $cacheHours
        , $url
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameVideoListByUrlByExternalId";

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

        //$objs = CacheUtil.Get<List<GameVideo>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameVideoListByUrlByExternalId(
                $url
                , $external_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameVideoListByUuidByExternalId(
        $uuid
        , $external_id
        ) {
            return $this->act->GetGameVideoListByUuidByExternalId(
                $uuid
                , $external_id
            );
        }
        
    public function GetGameVideoByUuidByExternalId(
        $uuid
        , $external_id
    ) {
        foreach($this->act->GetGameVideoListByUuidByExternalId(
        $uuid
        , $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameVideoListByUuidByExternalId(
        $uuid
        , $external_id
    ) {
        return $this->CachedGetGameVideoListByUuidByExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
            , $external_id
        );
    }
    */
        
    public function CachedGetGameVideoListByUuidByExternalId(
        $overrideCache
        , $cacheHours
        , $uuid
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameVideoListByUuidByExternalId";

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

        //$objs = CacheUtil.Get<List<GameVideo>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameVideoListByUuidByExternalId(
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
    public function SetGameStatisticLeaderboardByKeyByProfileId($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardByKeyByProfileId($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardByKeyByProfileIdFull($obj) {
        return $this->act->SetGameStatisticLeaderboardByKeyByProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardByKeyByProfileIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardByKeyByProfileIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardByKeyByProfileIdByTimestampFull($obj) {
        return $this->act->SetGameStatisticLeaderboardByKeyByProfileIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestampFull($obj) {
        return $this->act->SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardByKeyByProfileIdByGameId($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardByKeyByProfileIdByGameId($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardByKeyByProfileIdByGameIdFull($obj) {
        return $this->act->SetGameStatisticLeaderboardByKeyByProfileIdByGameId('full', $obj);
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
    public function GetGameStatisticLeaderboardListByKeyByGameIdByNetwork(
        $key
        , $game_id
        , $network
        ) {
            return $this->act->GetGameStatisticLeaderboardListByKeyByGameIdByNetwork(
                $key
                , $game_id
                , $network
            );
        }
        
    public function GetGameStatisticLeaderboardByKeyByGameIdByNetwork(
        $key
        , $game_id
        , $network
    ) {
        foreach($this->act->GetGameStatisticLeaderboardListByKeyByGameIdByNetwork(
        $key
        , $game_id
        , $network
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardListByKeyByGameIdByNetwork(
        $key
        , $game_id
        , $network
    ) {
        return $this->CachedGetGameStatisticLeaderboardListByKeyByGameIdByNetwork(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $game_id
            , $network
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardListByKeyByGameIdByNetwork(
        $overrideCache
        , $cacheHours
        , $key
        , $game_id
        , $network
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardListByKeyByGameIdByNetwork";

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
        $sb += "_";
        $sb += strtolower("$network");
        $sb += "_";
        $sb += $network;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardListByKeyByGameIdByNetwork(
                $key
                , $game_id
                , $network
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
    public function CountGameStatisticLeaderboardRollup(
    ) {      
        return $this->act->CountGameStatisticLeaderboardRollup(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardRollupByUuid(
        $uuid
    ) {      
        return $this->act->CountGameStatisticLeaderboardRollupByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardRollupByKey(
        $key
    ) {      
        return $this->act->CountGameStatisticLeaderboardRollupByKey(
        $key
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardRollupByGameId(
        $game_id
    ) {      
        return $this->act->CountGameStatisticLeaderboardRollupByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardRollupByKeyByGameId(
        $key
        , $game_id
    ) {      
        return $this->act->CountGameStatisticLeaderboardRollupByKeyByGameId(
        $key
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardRollupByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameStatisticLeaderboardRollupByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardRollupByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {      
        return $this->act->CountGameStatisticLeaderboardRollupByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardRollupByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameStatisticLeaderboardRollupByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameStatisticLeaderboardRollupListByFilter($filter_obj) {
        return $this->act->BrowseGameStatisticLeaderboardRollupListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardRollupByUuid($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardRollupByUuid($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardRollupByUuidFull($obj) {
        return $this->act->SetGameStatisticLeaderboardRollupByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardRollupByUuidByProfileIdByGameIdByTimestampFull($obj) {
        return $this->act->SetGameStatisticLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardRollupByKeyByProfileId($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardRollupByKeyByProfileId($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardRollupByKeyByProfileIdFull($obj) {
        return $this->act->SetGameStatisticLeaderboardRollupByKeyByProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardRollupByKeyByProfileIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardRollupByKeyByProfileIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardRollupByKeyByProfileIdByTimestampFull($obj) {
        return $this->act->SetGameStatisticLeaderboardRollupByKeyByProfileIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardRollupByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardRollupByKeyByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardRollupByKeyByProfileIdByGameIdByTimestampFull($obj) {
        return $this->act->SetGameStatisticLeaderboardRollupByKeyByProfileIdByGameIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardRollupByKeyByProfileIdByGameId($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardRollupByKeyByProfileIdByGameId($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardRollupByKeyByProfileIdByGameIdFull($obj) {
        return $this->act->SetGameStatisticLeaderboardRollupByKeyByProfileIdByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardRollupByUuid(
        $uuid
    ) {         
        return $this->act->DelGameStatisticLeaderboardRollupByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardRollupByKeyByGameId(
        $key
        , $game_id
    ) {         
        return $this->act->DelGameStatisticLeaderboardRollupByKeyByGameId(
        $key
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardRollupByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameStatisticLeaderboardRollupByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardRollupByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameStatisticLeaderboardRollupByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardRollupList(
        ) {
            return $this->act->GetGameStatisticLeaderboardRollupList(
            );
        }
        
    public function GetGameStatisticLeaderboardRollup(
    ) {
        foreach($this->act->GetGameStatisticLeaderboardRollupList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardRollupList(
    ) {
        return $this->CachedGetGameStatisticLeaderboardRollupList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardRollupList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardRollupList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardRollupList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardRollupListByUuid(
        $uuid
        ) {
            return $this->act->GetGameStatisticLeaderboardRollupListByUuid(
                $uuid
            );
        }
        
    public function GetGameStatisticLeaderboardRollupByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameStatisticLeaderboardRollupListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardRollupListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameStatisticLeaderboardRollupListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardRollupListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardRollupListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardRollupListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardRollupListByKey(
        $key
        ) {
            return $this->act->GetGameStatisticLeaderboardRollupListByKey(
                $key
            );
        }
        
    public function GetGameStatisticLeaderboardRollupByKey(
        $key
    ) {
        foreach($this->act->GetGameStatisticLeaderboardRollupListByKey(
        $key
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardRollupListByKey(
        $key
    ) {
        return $this->CachedGetGameStatisticLeaderboardRollupListByKey(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardRollupListByKey(
        $overrideCache
        , $cacheHours
        , $key
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardRollupListByKey";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardRollupListByKey(
                $key
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardRollupListByGameId(
        $game_id
        ) {
            return $this->act->GetGameStatisticLeaderboardRollupListByGameId(
                $game_id
            );
        }
        
    public function GetGameStatisticLeaderboardRollupByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameStatisticLeaderboardRollupListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardRollupListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameStatisticLeaderboardRollupListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardRollupListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardRollupListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardRollupListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardRollupListByKeyByGameId(
        $key
        , $game_id
        ) {
            return $this->act->GetGameStatisticLeaderboardRollupListByKeyByGameId(
                $key
                , $game_id
            );
        }
        
    public function GetGameStatisticLeaderboardRollupByKeyByGameId(
        $key
        , $game_id
    ) {
        foreach($this->act->GetGameStatisticLeaderboardRollupListByKeyByGameId(
        $key
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardRollupListByKeyByGameId(
        $key
        , $game_id
    ) {
        return $this->CachedGetGameStatisticLeaderboardRollupListByKeyByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardRollupListByKeyByGameId(
        $overrideCache
        , $cacheHours
        , $key
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardRollupListByKeyByGameId";

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

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardRollupListByKeyByGameId(
                $key
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardRollupListByKeyByGameIdByNetwork(
        $key
        , $game_id
        , $network
        ) {
            return $this->act->GetGameStatisticLeaderboardRollupListByKeyByGameIdByNetwork(
                $key
                , $game_id
                , $network
            );
        }
        
    public function GetGameStatisticLeaderboardRollupByKeyByGameIdByNetwork(
        $key
        , $game_id
        , $network
    ) {
        foreach($this->act->GetGameStatisticLeaderboardRollupListByKeyByGameIdByNetwork(
        $key
        , $game_id
        , $network
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardRollupListByKeyByGameIdByNetwork(
        $key
        , $game_id
        , $network
    ) {
        return $this->CachedGetGameStatisticLeaderboardRollupListByKeyByGameIdByNetwork(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $game_id
            , $network
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardRollupListByKeyByGameIdByNetwork(
        $overrideCache
        , $cacheHours
        , $key
        , $game_id
        , $network
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardRollupListByKeyByGameIdByNetwork";

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
        $sb += "_";
        $sb += strtolower("$network");
        $sb += "_";
        $sb += $network;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardRollupListByKeyByGameIdByNetwork(
                $key
                , $game_id
                , $network
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardRollupListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        ) {
            return $this->act->GetGameStatisticLeaderboardRollupListByKeyByProfileIdByGameId(
                $key
                , $profile_id
                , $game_id
            );
        }
        
    public function GetGameStatisticLeaderboardRollupByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameStatisticLeaderboardRollupListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardRollupListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameStatisticLeaderboardRollupListByKeyByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardRollupListByKeyByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $key
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardRollupListByKeyByProfileIdByGameId";

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

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardRollupListByKeyByProfileIdByGameId(
                $key
                , $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardRollupListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameStatisticLeaderboardRollupListByKeyByProfileIdByGameIdByTimestamp(
                $key
                , $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameStatisticLeaderboardRollupByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameStatisticLeaderboardRollupListByKeyByProfileIdByGameIdByTimestamp(
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
    public function CachedGetGameStatisticLeaderboardRollupListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameStatisticLeaderboardRollupListByKeyByProfileIdByGameIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardRollupListByKeyByProfileIdByGameIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardRollupListByKeyByProfileIdByGameIdByTimestamp";

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

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardRollupListByKeyByProfileIdByGameIdByTimestamp(
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
    public function GetGameStatisticLeaderboardRollupListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetGameStatisticLeaderboardRollupListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetGameStatisticLeaderboardRollupByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameStatisticLeaderboardRollupListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardRollupListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameStatisticLeaderboardRollupListByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardRollupListByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardRollupListByProfileIdByGameId";

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

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardRollupListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameStatisticLeaderboardRollupByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp";

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

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
                $profile_id
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
    public function CountGameProfileStatistic(
    ) {      
        return $this->act->CountGameProfileStatistic(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticByUuid(
        $uuid
    ) {      
        return $this->act->CountGameProfileStatisticByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticByKey(
        $key
    ) {      
        return $this->act->CountGameProfileStatisticByKey(
        $key
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticByGameId(
        $game_id
    ) {      
        return $this->act->CountGameProfileStatisticByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticByKeyByGameId(
        $key
        , $game_id
    ) {      
        return $this->act->CountGameProfileStatisticByKeyByGameId(
        $key
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameProfileStatisticByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameProfileStatisticByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {      
        return $this->act->CountGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameProfileStatisticListByFilter($filter_obj) {
        return $this->act->BrowseGameProfileStatisticListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticByUuid($set_type, $obj) {
        return $this->act->SetGameProfileStatisticByUuid($set_type, $obj);
    }
               
    public function SetGameProfileStatisticByUuidFull($obj) {
        return $this->act->SetGameProfileStatisticByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestampFull($obj) {
        return $this->act->SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticByProfileIdByKey($set_type, $obj) {
        return $this->act->SetGameProfileStatisticByProfileIdByKey($set_type, $obj);
    }
               
    public function SetGameProfileStatisticByProfileIdByKeyFull($obj) {
        return $this->act->SetGameProfileStatisticByProfileIdByKey('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticByProfileIdByKeyByTimestamp($set_type, $obj) {
        return $this->act->SetGameProfileStatisticByProfileIdByKeyByTimestamp($set_type, $obj);
    }
               
    public function SetGameProfileStatisticByProfileIdByKeyByTimestampFull($obj) {
        return $this->act->SetGameProfileStatisticByProfileIdByKeyByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameProfileStatisticByKeyByProfileIdByGameIdByTimestampFull($obj) {
        return $this->act->SetGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticByProfileIdByGameIdByKey($set_type, $obj) {
        return $this->act->SetGameProfileStatisticByProfileIdByGameIdByKey($set_type, $obj);
    }
               
    public function SetGameProfileStatisticByProfileIdByGameIdByKeyFull($obj) {
        return $this->act->SetGameProfileStatisticByProfileIdByGameIdByKey('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileStatisticByUuid(
        $uuid
    ) {         
        return $this->act->DelGameProfileStatisticByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileStatisticByKeyByGameId(
        $key
        , $game_id
    ) {         
        return $this->act->DelGameProfileStatisticByKeyByGameId(
        $key
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileStatisticByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameProfileStatisticByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileStatisticByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameProfileStatisticByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticListByUuid(
        $uuid
        ) {
            return $this->act->GetGameProfileStatisticListByUuid(
                $uuid
            );
        }
        
    public function GetGameProfileStatisticByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameProfileStatisticListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameProfileStatisticListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameProfileStatisticListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileStatistic>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileStatisticListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticListByKey(
        $key
        ) {
            return $this->act->GetGameProfileStatisticListByKey(
                $key
            );
        }
        
    public function GetGameProfileStatisticByKey(
        $key
    ) {
        foreach($this->act->GetGameProfileStatisticListByKey(
        $key
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticListByKey(
        $key
    ) {
        return $this->CachedGetGameProfileStatisticListByKey(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
        );
    }
    */
        
    public function CachedGetGameProfileStatisticListByKey(
        $overrideCache
        , $cacheHours
        , $key
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticListByKey";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileStatistic>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileStatisticListByKey(
                $key
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticListByGameId(
        $game_id
        ) {
            return $this->act->GetGameProfileStatisticListByGameId(
                $game_id
            );
        }
        
    public function GetGameProfileStatisticByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameProfileStatisticListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameProfileStatisticListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileStatisticListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileStatistic>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileStatisticListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticListByKeyByGameId(
        $key
        , $game_id
        ) {
            return $this->act->GetGameProfileStatisticListByKeyByGameId(
                $key
                , $game_id
            );
        }
        
    public function GetGameProfileStatisticByKeyByGameId(
        $key
        , $game_id
    ) {
        foreach($this->act->GetGameProfileStatisticListByKeyByGameId(
        $key
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticListByKeyByGameId(
        $key
        , $game_id
    ) {
        return $this->CachedGetGameProfileStatisticListByKeyByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileStatisticListByKeyByGameId(
        $overrideCache
        , $cacheHours
        , $key
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticListByKeyByGameId";

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

        //$objs = CacheUtil.Get<List<GameProfileStatistic>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileStatisticListByKeyByGameId(
                $key
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetGameProfileStatisticListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetGameProfileStatisticByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameProfileStatisticListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameProfileStatisticListByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileStatisticListByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticListByProfileIdByGameId";

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

        //$objs = CacheUtil.Get<List<GameProfileStatistic>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileStatisticListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameProfileStatisticByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticListByProfileIdByGameIdByTimestamp";

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

        //$objs = CacheUtil.Get<List<GameProfileStatistic>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        ) {
            return $this->act->GetGameProfileStatisticListByKeyByProfileIdByGameId(
                $key
                , $profile_id
                , $game_id
            );
        }
        
    public function GetGameProfileStatisticByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameProfileStatisticListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameProfileStatisticListByKeyByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileStatisticListByKeyByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $key
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticListByKeyByProfileIdByGameId";

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

        //$objs = CacheUtil.Get<List<GameProfileStatistic>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileStatisticListByKeyByProfileIdByGameId(
                $key
                , $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameProfileStatisticListByKeyByProfileIdByGameIdByTimestamp(
                $key
                , $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameProfileStatisticListByKeyByProfileIdByGameIdByTimestamp(
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
    public function CachedGetGameProfileStatisticListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameProfileStatisticListByKeyByProfileIdByGameIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameProfileStatisticListByKeyByProfileIdByGameIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticListByKeyByProfileIdByGameIdByTimestamp";

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

        //$objs = CacheUtil.Get<List<GameProfileStatistic>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileStatisticListByKeyByProfileIdByGameIdByTimestamp(
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
    public function CountGameStatisticMetaByCodeByGameId(
        $code
        , $game_id
    ) {      
        return $this->act->CountGameStatisticMetaByCodeByGameId(
        $code
        , $game_id
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
    public function SetGameStatisticMetaByCodeByGameId($set_type, $obj) {
        return $this->act->SetGameStatisticMetaByCodeByGameId($set_type, $obj);
    }
               
    public function SetGameStatisticMetaByCodeByGameIdFull($obj) {
        return $this->act->SetGameStatisticMetaByCodeByGameId('full', $obj);
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
    public function DelGameStatisticMetaByCodeByGameId(
        $code
        , $game_id
    ) {         
        return $this->act->DelGameStatisticMetaByCodeByGameId(
        $code
        , $game_id
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
    public function GetGameStatisticMetaListByCodeByGameId(
        $code
        , $game_id
        ) {
            return $this->act->GetGameStatisticMetaListByCodeByGameId(
                $code
                , $game_id
            );
        }
        
    public function GetGameStatisticMetaByCodeByGameId(
        $code
        , $game_id
    ) {
        foreach($this->act->GetGameStatisticMetaListByCodeByGameId(
        $code
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticMetaListByCodeByGameId(
        $code
        , $game_id
    ) {
        return $this->CachedGetGameStatisticMetaListByCodeByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticMetaListByCodeByGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticMetaListByCodeByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticMeta>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticMetaListByCodeByGameId(
                $code
                , $game_id
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
    public function CountGameProfileStatisticTimestamp(
    ) {      
        return $this->act->CountGameProfileStatisticTimestamp(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticTimestampByUuid(
        $uuid
    ) {      
        return $this->act->CountGameProfileStatisticTimestampByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticTimestampByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameProfileStatisticTimestampByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {      
        return $this->act->CountGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameProfileStatisticTimestampListByFilter($filter_obj) {
        return $this->act->BrowseGameProfileStatisticTimestampListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticTimestampByUuid($set_type, $obj) {
        return $this->act->SetGameProfileStatisticTimestampByUuid($set_type, $obj);
    }
               
    public function SetGameProfileStatisticTimestampByUuidFull($obj) {
        return $this->act->SetGameProfileStatisticTimestampByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticTimestampByKeyByProfileIdByGameId($set_type, $obj) {
        return $this->act->SetGameProfileStatisticTimestampByKeyByProfileIdByGameId($set_type, $obj);
    }
               
    public function SetGameProfileStatisticTimestampByKeyByProfileIdByGameIdFull($obj) {
        return $this->act->SetGameProfileStatisticTimestampByKeyByProfileIdByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestampFull($obj) {
        return $this->act->SetGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileStatisticTimestampByUuid(
        $uuid
    ) {         
        return $this->act->DelGameProfileStatisticTimestampByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileStatisticTimestampByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameProfileStatisticTimestampByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {         
        return $this->act->DelGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticTimestampListByUuid(
        $uuid
        ) {
            return $this->act->GetGameProfileStatisticTimestampListByUuid(
                $uuid
            );
        }
        
    public function GetGameProfileStatisticTimestampByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameProfileStatisticTimestampListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticTimestampListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameProfileStatisticTimestampListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameProfileStatisticTimestampListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticTimestampListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileStatisticTimestamp>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileStatisticTimestampListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticTimestampListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        ) {
            return $this->act->GetGameProfileStatisticTimestampListByKeyByProfileIdByGameId(
                $key
                , $profile_id
                , $game_id
            );
        }
        
    public function GetGameProfileStatisticTimestampByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameProfileStatisticTimestampListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticTimestampListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameProfileStatisticTimestampListByKeyByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileStatisticTimestampListByKeyByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $key
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticTimestampListByKeyByProfileIdByGameId";

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

        //$objs = CacheUtil.Get<List<GameProfileStatisticTimestamp>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileStatisticTimestampListByKeyByProfileIdByGameId(
                $key
                , $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameProfileStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
                $key
                , $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameProfileStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
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
    public function CachedGetGameProfileStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameProfileStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameProfileStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp";

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

        //$objs = CacheUtil.Get<List<GameProfileStatisticTimestamp>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
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
    public function CountGameKeyMetaByCodeByGameId(
        $code
        , $game_id
    ) {      
        return $this->act->CountGameKeyMetaByCodeByGameId(
        $code
        , $game_id
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
    public function SetGameKeyMetaByCodeByGameId($set_type, $obj) {
        return $this->act->SetGameKeyMetaByCodeByGameId($set_type, $obj);
    }
               
    public function SetGameKeyMetaByCodeByGameIdFull($obj) {
        return $this->act->SetGameKeyMetaByCodeByGameId('full', $obj);
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
    public function DelGameKeyMetaByCodeByGameId(
        $code
        , $game_id
    ) {         
        return $this->act->DelGameKeyMetaByCodeByGameId(
        $code
        , $game_id
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
    public function GetGameKeyMetaListByCodeByGameId(
        $code
        , $game_id
        ) {
            return $this->act->GetGameKeyMetaListByCodeByGameId(
                $code
                , $game_id
            );
        }
        
    public function GetGameKeyMetaByCodeByGameId(
        $code
        , $game_id
    ) {
        foreach($this->act->GetGameKeyMetaListByCodeByGameId(
        $code
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameKeyMetaListByCodeByGameId(
        $code
        , $game_id
    ) {
        return $this->CachedGetGameKeyMetaListByCodeByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
        );
    }
    */
        
    public function CachedGetGameKeyMetaListByCodeByGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameKeyMetaListByCodeByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameKeyMeta>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameKeyMetaListByCodeByGameId(
                $code
                , $game_id
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
    public function CountGameLevelByCodeByGameId(
        $code
        , $game_id
    ) {      
        return $this->act->CountGameLevelByCodeByGameId(
        $code
        , $game_id
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
    public function SetGameLevelByCodeByGameId($set_type, $obj) {
        return $this->act->SetGameLevelByCodeByGameId($set_type, $obj);
    }
               
    public function SetGameLevelByCodeByGameIdFull($obj) {
        return $this->act->SetGameLevelByCodeByGameId('full', $obj);
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
    public function DelGameLevelByCodeByGameId(
        $code
        , $game_id
    ) {         
        return $this->act->DelGameLevelByCodeByGameId(
        $code
        , $game_id
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
    public function GetGameLevelListByCodeByGameId(
        $code
        , $game_id
        ) {
            return $this->act->GetGameLevelListByCodeByGameId(
                $code
                , $game_id
            );
        }
        
    public function GetGameLevelByCodeByGameId(
        $code
        , $game_id
    ) {
        foreach($this->act->GetGameLevelListByCodeByGameId(
        $code
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLevelListByCodeByGameId(
        $code
        , $game_id
    ) {
        return $this->CachedGetGameLevelListByCodeByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
        );
    }
    */
        
    public function CachedGetGameLevelListByCodeByGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLevelListByCodeByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLevel>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLevelListByCodeByGameId(
                $code
                , $game_id
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
    public function CountGameProfileAchievement(
    ) {      
        return $this->act->CountGameProfileAchievement(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAchievementByUuid(
        $uuid
    ) {      
        return $this->act->CountGameProfileAchievementByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAchievementByProfileIdByKey(
        $profile_id
        , $key
    ) {      
        return $this->act->CountGameProfileAchievementByProfileIdByKey(
        $profile_id
        , $key
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAchievementByUsername(
        $username
    ) {      
        return $this->act->CountGameProfileAchievementByUsername(
        $username
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAchievementByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameProfileAchievementByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {      
        return $this->act->CountGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameProfileAchievementListByFilter($filter_obj) {
        return $this->act->BrowseGameProfileAchievementListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAchievementByUuid($set_type, $obj) {
        return $this->act->SetGameProfileAchievementByUuid($set_type, $obj);
    }
               
    public function SetGameProfileAchievementByUuidFull($obj) {
        return $this->act->SetGameProfileAchievementByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAchievementByUuidByKey($set_type, $obj) {
        return $this->act->SetGameProfileAchievementByUuidByKey($set_type, $obj);
    }
               
    public function SetGameProfileAchievementByUuidByKeyFull($obj) {
        return $this->act->SetGameProfileAchievementByUuidByKey('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAchievementByProfileIdByKey($set_type, $obj) {
        return $this->act->SetGameProfileAchievementByProfileIdByKey($set_type, $obj);
    }
               
    public function SetGameProfileAchievementByProfileIdByKeyFull($obj) {
        return $this->act->SetGameProfileAchievementByProfileIdByKey('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAchievementByKeyByProfileIdByGameId($set_type, $obj) {
        return $this->act->SetGameProfileAchievementByKeyByProfileIdByGameId($set_type, $obj);
    }
               
    public function SetGameProfileAchievementByKeyByProfileIdByGameIdFull($obj) {
        return $this->act->SetGameProfileAchievementByKeyByProfileIdByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameProfileAchievementByKeyByProfileIdByGameIdByTimestampFull($obj) {
        return $this->act->SetGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileAchievementByUuid(
        $uuid
    ) {         
        return $this->act->DelGameProfileAchievementByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileAchievementByProfileIdByKey(
        $profile_id
        , $key
    ) {         
        return $this->act->DelGameProfileAchievementByProfileIdByKey(
        $profile_id
        , $key
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileAchievementByUuidByKey(
        $uuid
        , $key
    ) {         
        return $this->act->DelGameProfileAchievementByUuidByKey(
        $uuid
        , $key
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameProfileAchievementListByUuid(
        $uuid
        ) {
            return $this->act->GetGameProfileAchievementListByUuid(
                $uuid
            );
        }
        
    public function GetGameProfileAchievementByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameProfileAchievementListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameProfileAchievementListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAchievementListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAchievementListByProfileIdByKey(
        $profile_id
        , $key
        ) {
            return $this->act->GetGameProfileAchievementListByProfileIdByKey(
                $profile_id
                , $key
            );
        }
        
    public function GetGameProfileAchievementByProfileIdByKey(
        $profile_id
        , $key
    ) {
        foreach($this->act->GetGameProfileAchievementListByProfileIdByKey(
        $profile_id
        , $key
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListByProfileIdByKey(
        $profile_id
        , $key
    ) {
        return $this->CachedGetGameProfileAchievementListByProfileIdByKey(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $key
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListByProfileIdByKey(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $key
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListByProfileIdByKey";

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

        //$objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAchievementListByProfileIdByKey(
                $profile_id
                , $key
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAchievementListByUsername(
        $username
        ) {
            return $this->act->GetGameProfileAchievementListByUsername(
                $username
            );
        }
        
    public function GetGameProfileAchievementByUsername(
        $username
    ) {
        foreach($this->act->GetGameProfileAchievementListByUsername(
        $username
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListByUsername(
        $username
    ) {
        return $this->CachedGetGameProfileAchievementListByUsername(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $username
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListByUsername(
        $overrideCache
        , $cacheHours
        , $username
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListByUsername";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$username");
        $sb += "_";
        $sb += $username;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAchievementListByUsername(
                $username
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAchievementListByKey(
        $key
        ) {
            return $this->act->GetGameProfileAchievementListByKey(
                $key
            );
        }
        
    public function GetGameProfileAchievementByKey(
        $key
    ) {
        foreach($this->act->GetGameProfileAchievementListByKey(
        $key
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListByKey(
        $key
    ) {
        return $this->CachedGetGameProfileAchievementListByKey(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListByKey(
        $overrideCache
        , $cacheHours
        , $key
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListByKey";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$key");
        $sb += "_";
        $sb += $key;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAchievementListByKey(
                $key
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAchievementListByGameId(
        $game_id
        ) {
            return $this->act->GetGameProfileAchievementListByGameId(
                $game_id
            );
        }
        
    public function GetGameProfileAchievementByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameProfileAchievementListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameProfileAchievementListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAchievementListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAchievementListByKeyByGameId(
        $key
        , $game_id
        ) {
            return $this->act->GetGameProfileAchievementListByKeyByGameId(
                $key
                , $game_id
            );
        }
        
    public function GetGameProfileAchievementByKeyByGameId(
        $key
        , $game_id
    ) {
        foreach($this->act->GetGameProfileAchievementListByKeyByGameId(
        $key
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListByKeyByGameId(
        $key
        , $game_id
    ) {
        return $this->CachedGetGameProfileAchievementListByKeyByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListByKeyByGameId(
        $overrideCache
        , $cacheHours
        , $key
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListByKeyByGameId";

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

        //$objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAchievementListByKeyByGameId(
                $key
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAchievementListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetGameProfileAchievementListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetGameProfileAchievementByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameProfileAchievementListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameProfileAchievementListByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListByProfileIdByGameId";

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

        //$objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAchievementListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameProfileAchievementByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListByProfileIdByGameIdByTimestamp";

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

        //$objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAchievementListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        ) {
            return $this->act->GetGameProfileAchievementListByKeyByProfileIdByGameId(
                $key
                , $profile_id
                , $game_id
            );
        }
        
    public function GetGameProfileAchievementByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameProfileAchievementListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameProfileAchievementListByKeyByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListByKeyByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $key
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListByKeyByProfileIdByGameId";

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

        //$objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAchievementListByKeyByProfileIdByGameId(
                $key
                , $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAchievementListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameProfileAchievementListByKeyByProfileIdByGameIdByTimestamp(
                $key
                , $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameProfileAchievementListByKeyByProfileIdByGameIdByTimestamp(
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
    public function CachedGetGameProfileAchievementListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameProfileAchievementListByKeyByProfileIdByGameIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListByKeyByProfileIdByGameIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListByKeyByProfileIdByGameIdByTimestamp";

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

        //$objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAchievementListByKeyByProfileIdByGameIdByTimestamp(
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
    public function CountGameAchievementMetaByCodeByGameId(
        $code
        , $game_id
    ) {      
        return $this->act->CountGameAchievementMetaByCodeByGameId(
        $code
        , $game_id
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
    public function SetGameAchievementMetaByCodeByGameId($set_type, $obj) {
        return $this->act->SetGameAchievementMetaByCodeByGameId($set_type, $obj);
    }
               
    public function SetGameAchievementMetaByCodeByGameIdFull($obj) {
        return $this->act->SetGameAchievementMetaByCodeByGameId('full', $obj);
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
    public function DelGameAchievementMetaByCodeByGameId(
        $code
        , $game_id
    ) {         
        return $this->act->DelGameAchievementMetaByCodeByGameId(
        $code
        , $game_id
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
    public function GetGameAchievementMetaListByCodeByGameId(
        $code
        , $game_id
        ) {
            return $this->act->GetGameAchievementMetaListByCodeByGameId(
                $code
                , $game_id
            );
        }
        
    public function GetGameAchievementMetaByCodeByGameId(
        $code
        , $game_id
    ) {
        foreach($this->act->GetGameAchievementMetaListByCodeByGameId(
        $code
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAchievementMetaListByCodeByGameId(
        $code
        , $game_id
    ) {
        return $this->CachedGetGameAchievementMetaListByCodeByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
        );
    }
    */
        
    public function CachedGetGameAchievementMetaListByCodeByGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameAchievementMetaListByCodeByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAchievementMeta>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAchievementMetaListByCodeByGameId(
                $code
                , $game_id
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
