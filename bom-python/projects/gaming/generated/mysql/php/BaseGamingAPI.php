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
    public function CountGameUuid(
        $uuid
    ) {      
        return $this->act->CountGameUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCode(
        $code
    ) {      
        return $this->act->CountGameCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameName(
        $name
    ) {      
        return $this->act->CountGameName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameOrgId(
        $org_id
    ) {      
        return $this->act->CountGameOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAppId(
        $app_id
    ) {      
        return $this->act->CountGameAppId(
        $app_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameOrgIdAppId(
        $org_id
        , $app_id
    ) {      
        return $this->act->CountGameOrgIdAppId(
        $org_id
        , $app_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameListFilter($filter_obj) {
        return $this->act->BrowseGameListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameUuid($set_type, $obj) {
        return $this->act->SetGameUuid($set_type, $obj);
    }
               
    public function SetGameUuidFull($obj) {
        return $this->act->SetGameUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameCode($set_type, $obj) {
        return $this->act->SetGameCode($set_type, $obj);
    }
               
    public function SetGameCodeFull($obj) {
        return $this->act->SetGameCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameName($set_type, $obj) {
        return $this->act->SetGameName($set_type, $obj);
    }
               
    public function SetGameNameFull($obj) {
        return $this->act->SetGameName('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameOrgId($set_type, $obj) {
        return $this->act->SetGameOrgId($set_type, $obj);
    }
               
    public function SetGameOrgIdFull($obj) {
        return $this->act->SetGameOrgId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAppId($set_type, $obj) {
        return $this->act->SetGameAppId($set_type, $obj);
    }
               
    public function SetGameAppIdFull($obj) {
        return $this->act->SetGameAppId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameOrgIdAppId($set_type, $obj) {
        return $this->act->SetGameOrgIdAppId($set_type, $obj);
    }
               
    public function SetGameOrgIdAppIdFull($obj) {
        return $this->act->SetGameOrgIdAppId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameUuid(
        $uuid
    ) {         
        return $this->act->DelGameUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameCode(
        $code
    ) {         
        return $this->act->DelGameCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameName(
        $name
    ) {         
        return $this->act->DelGameName(
        $name
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameOrgId(
        $org_id
    ) {         
        return $this->act->DelGameOrgId(
        $org_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameAppId(
        $app_id
    ) {         
        return $this->act->DelGameAppId(
        $app_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameOrgIdAppId(
        $org_id
        , $app_id
    ) {         
        return $this->act->DelGameOrgIdAppId(
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
    public function GetGameListUuid(
        $uuid
        ) {
            return $this->act->GetGameListUuid(
                $uuid
            );
        }
        
    public function GetGameUuid(
        $uuid
    ) {
        foreach($this->act->GetGameListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameListUuid(
        $uuid
    ) {
        return $this->CachedGetGameListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameListUuid";

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
            $objs = $this->GetGameListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameListCode(
        $code
        ) {
            return $this->act->GetGameListCode(
                $code
            );
        }
        
    public function GetGameCode(
        $code
    ) {
        foreach($this->act->GetGameListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameListCode(
        $code
    ) {
        return $this->CachedGetGameListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameListCode";

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
            $objs = $this->GetGameListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameListName(
        $name
        ) {
            return $this->act->GetGameListName(
                $name
            );
        }
        
    public function GetGameName(
        $name
    ) {
        foreach($this->act->GetGameListName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameListName(
        $name
    ) {
        return $this->CachedGetGameListName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetGameListName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetGameListName";

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
            $objs = $this->GetGameListName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameListOrgId(
        $org_id
        ) {
            return $this->act->GetGameListOrgId(
                $org_id
            );
        }
        
    public function GetGameOrgId(
        $org_id
    ) {
        foreach($this->act->GetGameListOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameListOrgId(
        $org_id
    ) {
        return $this->CachedGetGameListOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetGameListOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameListOrgId";

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
            $objs = $this->GetGameListOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameListAppId(
        $app_id
        ) {
            return $this->act->GetGameListAppId(
                $app_id
            );
        }
        
    public function GetGameAppId(
        $app_id
    ) {
        foreach($this->act->GetGameListAppId(
        $app_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameListAppId(
        $app_id
    ) {
        return $this->CachedGetGameListAppId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $app_id
        );
    }
    */
        
    public function CachedGetGameListAppId(
        $overrideCache
        , $cacheHours
        , $app_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameListAppId";

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
            $objs = $this->GetGameListAppId(
                $app_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameListOrgIdAppId(
        $org_id
        , $app_id
        ) {
            return $this->act->GetGameListOrgIdAppId(
                $org_id
                , $app_id
            );
        }
        
    public function GetGameOrgIdAppId(
        $org_id
        , $app_id
    ) {
        foreach($this->act->GetGameListOrgIdAppId(
        $org_id
        , $app_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameListOrgIdAppId(
        $org_id
        , $app_id
    ) {
        return $this->CachedGetGameListOrgIdAppId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
            , $app_id
        );
    }
    */
        
    public function CachedGetGameListOrgIdAppId(
        $overrideCache
        , $cacheHours
        , $org_id
        , $app_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameListOrgIdAppId";

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
            $objs = $this->GetGameListOrgIdAppId(
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
    public function CountGameCategoryUuid(
        $uuid
    ) {      
        return $this->act->CountGameCategoryUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryCode(
        $code
    ) {      
        return $this->act->CountGameCategoryCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryName(
        $name
    ) {      
        return $this->act->CountGameCategoryName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryOrgId(
        $org_id
    ) {      
        return $this->act->CountGameCategoryOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryTypeId(
        $type_id
    ) {      
        return $this->act->CountGameCategoryTypeId(
        $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryOrgIdTypeId(
        $org_id
        , $type_id
    ) {      
        return $this->act->CountGameCategoryOrgIdTypeId(
        $org_id
        , $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameCategoryListFilter($filter_obj) {
        return $this->act->BrowseGameCategoryListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameCategoryUuid($set_type, $obj) {
        return $this->act->SetGameCategoryUuid($set_type, $obj);
    }
               
    public function SetGameCategoryUuidFull($obj) {
        return $this->act->SetGameCategoryUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameCategoryUuid(
        $uuid
    ) {         
        return $this->act->DelGameCategoryUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameCategoryCodeOrgId(
        $code
        , $org_id
    ) {         
        return $this->act->DelGameCategoryCodeOrgId(
        $code
        , $org_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameCategoryCodeOrgIdTypeId(
        $code
        , $org_id
        , $type_id
    ) {         
        return $this->act->DelGameCategoryCodeOrgIdTypeId(
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
    public function GetGameCategoryListUuid(
        $uuid
        ) {
            return $this->act->GetGameCategoryListUuid(
                $uuid
            );
        }
        
    public function GetGameCategoryUuid(
        $uuid
    ) {
        foreach($this->act->GetGameCategoryListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryListUuid(
        $uuid
    ) {
        return $this->CachedGetGameCategoryListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameCategoryListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryListUuid";

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
            $objs = $this->GetGameCategoryListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryListCode(
        $code
        ) {
            return $this->act->GetGameCategoryListCode(
                $code
            );
        }
        
    public function GetGameCategoryCode(
        $code
    ) {
        foreach($this->act->GetGameCategoryListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryListCode(
        $code
    ) {
        return $this->CachedGetGameCategoryListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameCategoryListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryListCode";

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
            $objs = $this->GetGameCategoryListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryListName(
        $name
        ) {
            return $this->act->GetGameCategoryListName(
                $name
            );
        }
        
    public function GetGameCategoryName(
        $name
    ) {
        foreach($this->act->GetGameCategoryListName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryListName(
        $name
    ) {
        return $this->CachedGetGameCategoryListName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetGameCategoryListName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryListName";

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
            $objs = $this->GetGameCategoryListName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryListOrgId(
        $org_id
        ) {
            return $this->act->GetGameCategoryListOrgId(
                $org_id
            );
        }
        
    public function GetGameCategoryOrgId(
        $org_id
    ) {
        foreach($this->act->GetGameCategoryListOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryListOrgId(
        $org_id
    ) {
        return $this->CachedGetGameCategoryListOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetGameCategoryListOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryListOrgId";

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
            $objs = $this->GetGameCategoryListOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryListTypeId(
        $type_id
        ) {
            return $this->act->GetGameCategoryListTypeId(
                $type_id
            );
        }
        
    public function GetGameCategoryTypeId(
        $type_id
    ) {
        foreach($this->act->GetGameCategoryListTypeId(
        $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryListTypeId(
        $type_id
    ) {
        return $this->CachedGetGameCategoryListTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $type_id
        );
    }
    */
        
    public function CachedGetGameCategoryListTypeId(
        $overrideCache
        , $cacheHours
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryListTypeId";

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
            $objs = $this->GetGameCategoryListTypeId(
                $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryListOrgIdTypeId(
        $org_id
        , $type_id
        ) {
            return $this->act->GetGameCategoryListOrgIdTypeId(
                $org_id
                , $type_id
            );
        }
        
    public function GetGameCategoryOrgIdTypeId(
        $org_id
        , $type_id
    ) {
        foreach($this->act->GetGameCategoryListOrgIdTypeId(
        $org_id
        , $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryListOrgIdTypeId(
        $org_id
        , $type_id
    ) {
        return $this->CachedGetGameCategoryListOrgIdTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
            , $type_id
        );
    }
    */
        
    public function CachedGetGameCategoryListOrgIdTypeId(
        $overrideCache
        , $cacheHours
        , $org_id
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryListOrgIdTypeId";

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
            $objs = $this->GetGameCategoryListOrgIdTypeId(
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
    public function CountGameCategoryTreeUuid(
        $uuid
    ) {      
        return $this->act->CountGameCategoryTreeUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryTreeParentId(
        $parent_id
    ) {      
        return $this->act->CountGameCategoryTreeParentId(
        $parent_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryTreeCategoryId(
        $category_id
    ) {      
        return $this->act->CountGameCategoryTreeCategoryId(
        $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryTreeParentIdCategoryId(
        $parent_id
        , $category_id
    ) {      
        return $this->act->CountGameCategoryTreeParentIdCategoryId(
        $parent_id
        , $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameCategoryTreeListFilter($filter_obj) {
        return $this->act->BrowseGameCategoryTreeListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameCategoryTreeUuid($set_type, $obj) {
        return $this->act->SetGameCategoryTreeUuid($set_type, $obj);
    }
               
    public function SetGameCategoryTreeUuidFull($obj) {
        return $this->act->SetGameCategoryTreeUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameCategoryTreeUuid(
        $uuid
    ) {         
        return $this->act->DelGameCategoryTreeUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameCategoryTreeParentId(
        $parent_id
    ) {         
        return $this->act->DelGameCategoryTreeParentId(
        $parent_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameCategoryTreeCategoryId(
        $category_id
    ) {         
        return $this->act->DelGameCategoryTreeCategoryId(
        $category_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameCategoryTreeParentIdCategoryId(
        $parent_id
        , $category_id
    ) {         
        return $this->act->DelGameCategoryTreeParentIdCategoryId(
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
    public function GetGameCategoryTreeListUuid(
        $uuid
        ) {
            return $this->act->GetGameCategoryTreeListUuid(
                $uuid
            );
        }
        
    public function GetGameCategoryTreeUuid(
        $uuid
    ) {
        foreach($this->act->GetGameCategoryTreeListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryTreeListUuid(
        $uuid
    ) {
        return $this->CachedGetGameCategoryTreeListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameCategoryTreeListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryTreeListUuid";

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
            $objs = $this->GetGameCategoryTreeListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryTreeListParentId(
        $parent_id
        ) {
            return $this->act->GetGameCategoryTreeListParentId(
                $parent_id
            );
        }
        
    public function GetGameCategoryTreeParentId(
        $parent_id
    ) {
        foreach($this->act->GetGameCategoryTreeListParentId(
        $parent_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryTreeListParentId(
        $parent_id
    ) {
        return $this->CachedGetGameCategoryTreeListParentId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $parent_id
        );
    }
    */
        
    public function CachedGetGameCategoryTreeListParentId(
        $overrideCache
        , $cacheHours
        , $parent_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryTreeListParentId";

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
            $objs = $this->GetGameCategoryTreeListParentId(
                $parent_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryTreeListCategoryId(
        $category_id
        ) {
            return $this->act->GetGameCategoryTreeListCategoryId(
                $category_id
            );
        }
        
    public function GetGameCategoryTreeCategoryId(
        $category_id
    ) {
        foreach($this->act->GetGameCategoryTreeListCategoryId(
        $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryTreeListCategoryId(
        $category_id
    ) {
        return $this->CachedGetGameCategoryTreeListCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $category_id
        );
    }
    */
        
    public function CachedGetGameCategoryTreeListCategoryId(
        $overrideCache
        , $cacheHours
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryTreeListCategoryId";

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
            $objs = $this->GetGameCategoryTreeListCategoryId(
                $category_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryTreeListParentIdCategoryId(
        $parent_id
        , $category_id
        ) {
            return $this->act->GetGameCategoryTreeListParentIdCategoryId(
                $parent_id
                , $category_id
            );
        }
        
    public function GetGameCategoryTreeParentIdCategoryId(
        $parent_id
        , $category_id
    ) {
        foreach($this->act->GetGameCategoryTreeListParentIdCategoryId(
        $parent_id
        , $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryTreeListParentIdCategoryId(
        $parent_id
        , $category_id
    ) {
        return $this->CachedGetGameCategoryTreeListParentIdCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $parent_id
            , $category_id
        );
    }
    */
        
    public function CachedGetGameCategoryTreeListParentIdCategoryId(
        $overrideCache
        , $cacheHours
        , $parent_id
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryTreeListParentIdCategoryId";

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
            $objs = $this->GetGameCategoryTreeListParentIdCategoryId(
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
    public function CountGameCategoryAssocUuid(
        $uuid
    ) {      
        return $this->act->CountGameCategoryAssocUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryAssocGameId(
        $game_id
    ) {      
        return $this->act->CountGameCategoryAssocGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryAssocCategoryId(
        $category_id
    ) {      
        return $this->act->CountGameCategoryAssocCategoryId(
        $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameCategoryAssocGameIdCategoryId(
        $game_id
        , $category_id
    ) {      
        return $this->act->CountGameCategoryAssocGameIdCategoryId(
        $game_id
        , $category_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameCategoryAssocListFilter($filter_obj) {
        return $this->act->BrowseGameCategoryAssocListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameCategoryAssocUuid($set_type, $obj) {
        return $this->act->SetGameCategoryAssocUuid($set_type, $obj);
    }
               
    public function SetGameCategoryAssocUuidFull($obj) {
        return $this->act->SetGameCategoryAssocUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameCategoryAssocUuid(
        $uuid
    ) {         
        return $this->act->DelGameCategoryAssocUuid(
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
    public function GetGameCategoryAssocListUuid(
        $uuid
        ) {
            return $this->act->GetGameCategoryAssocListUuid(
                $uuid
            );
        }
        
    public function GetGameCategoryAssocUuid(
        $uuid
    ) {
        foreach($this->act->GetGameCategoryAssocListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryAssocListUuid(
        $uuid
    ) {
        return $this->CachedGetGameCategoryAssocListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameCategoryAssocListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryAssocListUuid";

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
            $objs = $this->GetGameCategoryAssocListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryAssocListGameId(
        $game_id
        ) {
            return $this->act->GetGameCategoryAssocListGameId(
                $game_id
            );
        }
        
    public function GetGameCategoryAssocGameId(
        $game_id
    ) {
        foreach($this->act->GetGameCategoryAssocListGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryAssocListGameId(
        $game_id
    ) {
        return $this->CachedGetGameCategoryAssocListGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameCategoryAssocListGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryAssocListGameId";

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
            $objs = $this->GetGameCategoryAssocListGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryAssocListCategoryId(
        $category_id
        ) {
            return $this->act->GetGameCategoryAssocListCategoryId(
                $category_id
            );
        }
        
    public function GetGameCategoryAssocCategoryId(
        $category_id
    ) {
        foreach($this->act->GetGameCategoryAssocListCategoryId(
        $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryAssocListCategoryId(
        $category_id
    ) {
        return $this->CachedGetGameCategoryAssocListCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $category_id
        );
    }
    */
        
    public function CachedGetGameCategoryAssocListCategoryId(
        $overrideCache
        , $cacheHours
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryAssocListCategoryId";

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
            $objs = $this->GetGameCategoryAssocListCategoryId(
                $category_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameCategoryAssocListGameIdCategoryId(
        $game_id
        , $category_id
        ) {
            return $this->act->GetGameCategoryAssocListGameIdCategoryId(
                $game_id
                , $category_id
            );
        }
        
    public function GetGameCategoryAssocGameIdCategoryId(
        $game_id
        , $category_id
    ) {
        foreach($this->act->GetGameCategoryAssocListGameIdCategoryId(
        $game_id
        , $category_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameCategoryAssocListGameIdCategoryId(
        $game_id
        , $category_id
    ) {
        return $this->CachedGetGameCategoryAssocListGameIdCategoryId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $category_id
        );
    }
    */
        
    public function CachedGetGameCategoryAssocListGameIdCategoryId(
        $overrideCache
        , $cacheHours
        , $game_id
        , $category_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameCategoryAssocListGameIdCategoryId";

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
            $objs = $this->GetGameCategoryAssocListGameIdCategoryId(
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
    public function CountGameTypeUuid(
        $uuid
    ) {      
        return $this->act->CountGameTypeUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameTypeCode(
        $code
    ) {      
        return $this->act->CountGameTypeCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameTypeName(
        $name
    ) {      
        return $this->act->CountGameTypeName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameTypeListFilter($filter_obj) {
        return $this->act->BrowseGameTypeListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameTypeUuid($set_type, $obj) {
        return $this->act->SetGameTypeUuid($set_type, $obj);
    }
               
    public function SetGameTypeUuidFull($obj) {
        return $this->act->SetGameTypeUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameTypeUuid(
        $uuid
    ) {         
        return $this->act->DelGameTypeUuid(
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
    public function GetGameTypeListUuid(
        $uuid
        ) {
            return $this->act->GetGameTypeListUuid(
                $uuid
            );
        }
        
    public function GetGameTypeUuid(
        $uuid
    ) {
        foreach($this->act->GetGameTypeListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameTypeListUuid(
        $uuid
    ) {
        return $this->CachedGetGameTypeListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameTypeListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameTypeListUuid";

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
            $objs = $this->GetGameTypeListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameTypeListCode(
        $code
        ) {
            return $this->act->GetGameTypeListCode(
                $code
            );
        }
        
    public function GetGameTypeCode(
        $code
    ) {
        foreach($this->act->GetGameTypeListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameTypeListCode(
        $code
    ) {
        return $this->CachedGetGameTypeListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameTypeListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameTypeListCode";

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
            $objs = $this->GetGameTypeListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameTypeListName(
        $name
        ) {
            return $this->act->GetGameTypeListName(
                $name
            );
        }
        
    public function GetGameTypeName(
        $name
    ) {
        foreach($this->act->GetGameTypeListName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameTypeListName(
        $name
    ) {
        return $this->CachedGetGameTypeListName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetGameTypeListName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetGameTypeListName";

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
            $objs = $this->GetGameTypeListName(
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
    public function CountProfileGameUuid(
        $uuid
    ) {      
        return $this->act->CountProfileGameUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameGameId(
        $game_id
    ) {      
        return $this->act->CountProfileGameGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileGameProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameProfileIdGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountProfileGameProfileIdGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileGameListFilter($filter_obj) {
        return $this->act->BrowseProfileGameListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileGameUuid($set_type, $obj) {
        return $this->act->SetProfileGameUuid($set_type, $obj);
    }
               
    public function SetProfileGameUuidFull($obj) {
        return $this->act->SetProfileGameUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileGameUuid(
        $uuid
    ) {         
        return $this->act->DelProfileGameUuid(
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
    public function GetProfileGameListUuid(
        $uuid
        ) {
            return $this->act->GetProfileGameListUuid(
                $uuid
            );
        }
        
    public function GetProfileGameUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileGameListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameListUuid(
        $uuid
    ) {
        return $this->CachedGetProfileGameListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileGameListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameListUuid";

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
            $objs = $this->GetProfileGameListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameListGameId(
        $game_id
        ) {
            return $this->act->GetProfileGameListGameId(
                $game_id
            );
        }
        
    public function GetProfileGameGameId(
        $game_id
    ) {
        foreach($this->act->GetProfileGameListGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameListGameId(
        $game_id
    ) {
        return $this->CachedGetProfileGameListGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetProfileGameListGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameListGameId";

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
            $objs = $this->GetProfileGameListGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameListProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileGameListProfileId(
                $profile_id
            );
        }
        
    public function GetProfileGameProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileGameListProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameListProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileGameListProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileGameListProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameListProfileId";

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
            $objs = $this->GetProfileGameListProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameListProfileIdGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetProfileGameListProfileIdGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetProfileGameProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetProfileGameListProfileIdGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameListProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetProfileGameListProfileIdGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetProfileGameListProfileIdGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameListProfileIdGameId";

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
            $objs = $this->GetProfileGameListProfileIdGameId(
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
    public function CountGameNetworkUuid(
        $uuid
    ) {      
        return $this->act->CountGameNetworkUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameNetworkCode(
        $code
    ) {      
        return $this->act->CountGameNetworkCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameNetworkUuidType(
        $uuid
        , $type
    ) {      
        return $this->act->CountGameNetworkUuidType(
        $uuid
        , $type
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameNetworkListFilter($filter_obj) {
        return $this->act->BrowseGameNetworkListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameNetworkUuid($set_type, $obj) {
        return $this->act->SetGameNetworkUuid($set_type, $obj);
    }
               
    public function SetGameNetworkUuidFull($obj) {
        return $this->act->SetGameNetworkUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameNetworkCode($set_type, $obj) {
        return $this->act->SetGameNetworkCode($set_type, $obj);
    }
               
    public function SetGameNetworkCodeFull($obj) {
        return $this->act->SetGameNetworkCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameNetworkUuid(
        $uuid
    ) {         
        return $this->act->DelGameNetworkUuid(
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
    public function GetGameNetworkListUuid(
        $uuid
        ) {
            return $this->act->GetGameNetworkListUuid(
                $uuid
            );
        }
        
    public function GetGameNetworkUuid(
        $uuid
    ) {
        foreach($this->act->GetGameNetworkListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameNetworkListUuid(
        $uuid
    ) {
        return $this->CachedGetGameNetworkListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameNetworkListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameNetworkListUuid";

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
            $objs = $this->GetGameNetworkListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameNetworkListCode(
        $code
        ) {
            return $this->act->GetGameNetworkListCode(
                $code
            );
        }
        
    public function GetGameNetworkCode(
        $code
    ) {
        foreach($this->act->GetGameNetworkListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameNetworkListCode(
        $code
    ) {
        return $this->CachedGetGameNetworkListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameNetworkListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameNetworkListCode";

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
            $objs = $this->GetGameNetworkListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameNetworkListUuidType(
        $uuid
        , $type
        ) {
            return $this->act->GetGameNetworkListUuidType(
                $uuid
                , $type
            );
        }
        
    public function GetGameNetworkUuidType(
        $uuid
        , $type
    ) {
        foreach($this->act->GetGameNetworkListUuidType(
        $uuid
        , $type
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameNetworkListUuidType(
        $uuid
        , $type
    ) {
        return $this->CachedGetGameNetworkListUuidType(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
            , $type
        );
    }
    */
        
    public function CachedGetGameNetworkListUuidType(
        $overrideCache
        , $cacheHours
        , $uuid
        , $type
    ) {

        $objs = array();

        $method_name = "CachedGetGameNetworkListUuidType";

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
            $objs = $this->GetGameNetworkListUuidType(
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
    public function CountGameNetworkAuthUuid(
        $uuid
    ) {      
        return $this->act->CountGameNetworkAuthUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameNetworkAuthGameIdGameNetworkId(
        $game_id
        , $game_network_id
    ) {      
        return $this->act->CountGameNetworkAuthGameIdGameNetworkId(
        $game_id
        , $game_network_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameNetworkAuthListFilter($filter_obj) {
        return $this->act->BrowseGameNetworkAuthListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameNetworkAuthUuid($set_type, $obj) {
        return $this->act->SetGameNetworkAuthUuid($set_type, $obj);
    }
               
    public function SetGameNetworkAuthUuidFull($obj) {
        return $this->act->SetGameNetworkAuthUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameNetworkAuthGameIdGameNetworkId($set_type, $obj) {
        return $this->act->SetGameNetworkAuthGameIdGameNetworkId($set_type, $obj);
    }
               
    public function SetGameNetworkAuthGameIdGameNetworkIdFull($obj) {
        return $this->act->SetGameNetworkAuthGameIdGameNetworkId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameNetworkAuthUuid(
        $uuid
    ) {         
        return $this->act->DelGameNetworkAuthUuid(
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
    public function GetGameNetworkAuthListUuid(
        $uuid
        ) {
            return $this->act->GetGameNetworkAuthListUuid(
                $uuid
            );
        }
        
    public function GetGameNetworkAuthUuid(
        $uuid
    ) {
        foreach($this->act->GetGameNetworkAuthListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameNetworkAuthListUuid(
        $uuid
    ) {
        return $this->CachedGetGameNetworkAuthListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameNetworkAuthListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameNetworkAuthListUuid";

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
            $objs = $this->GetGameNetworkAuthListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameNetworkAuthListGameIdGameNetworkId(
        $game_id
        , $game_network_id
        ) {
            return $this->act->GetGameNetworkAuthListGameIdGameNetworkId(
                $game_id
                , $game_network_id
            );
        }
        
    public function GetGameNetworkAuthGameIdGameNetworkId(
        $game_id
        , $game_network_id
    ) {
        foreach($this->act->GetGameNetworkAuthListGameIdGameNetworkId(
        $game_id
        , $game_network_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameNetworkAuthListGameIdGameNetworkId(
        $game_id
        , $game_network_id
    ) {
        return $this->CachedGetGameNetworkAuthListGameIdGameNetworkId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $game_network_id
        );
    }
    */
        
    public function CachedGetGameNetworkAuthListGameIdGameNetworkId(
        $overrideCache
        , $cacheHours
        , $game_id
        , $game_network_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameNetworkAuthListGameIdGameNetworkId";

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
            $objs = $this->GetGameNetworkAuthListGameIdGameNetworkId(
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
    public function CountProfileGameNetworkUuid(
        $uuid
    ) {      
        return $this->act->CountProfileGameNetworkUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameNetworkGameId(
        $game_id
    ) {      
        return $this->act->CountProfileGameNetworkGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameNetworkProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileGameNetworkProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameNetworkProfileIdGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountProfileGameNetworkProfileIdGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameNetworkProfileIdGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountProfileGameNetworkProfileIdGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameNetworkProfileIdGameIdGameNetworkId(
        $profile_id
        , $game_id
        , $game_network_id
    ) {      
        return $this->act->CountProfileGameNetworkProfileIdGameIdGameNetworkId(
        $profile_id
        , $game_id
        , $game_network_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
        $network_username
        , $game_id
        , $game_network_id
    ) {      
        return $this->act->CountProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
        $network_username
        , $game_id
        , $game_network_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileGameNetworkListFilter($filter_obj) {
        return $this->act->BrowseProfileGameNetworkListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileGameNetworkUuid($set_type, $obj) {
        return $this->act->SetProfileGameNetworkUuid($set_type, $obj);
    }
               
    public function SetProfileGameNetworkUuidFull($obj) {
        return $this->act->SetProfileGameNetworkUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileGameNetworkProfileIdGameId($set_type, $obj) {
        return $this->act->SetProfileGameNetworkProfileIdGameId($set_type, $obj);
    }
               
    public function SetProfileGameNetworkProfileIdGameIdFull($obj) {
        return $this->act->SetProfileGameNetworkProfileIdGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileGameNetworkProfileIdGameIdGameNetworkId($set_type, $obj) {
        return $this->act->SetProfileGameNetworkProfileIdGameIdGameNetworkId($set_type, $obj);
    }
               
    public function SetProfileGameNetworkProfileIdGameIdGameNetworkIdFull($obj) {
        return $this->act->SetProfileGameNetworkProfileIdGameIdGameNetworkId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileGameNetworkNetworkUsernameGameIdGameNetworkId($set_type, $obj) {
        return $this->act->SetProfileGameNetworkNetworkUsernameGameIdGameNetworkId($set_type, $obj);
    }
               
    public function SetProfileGameNetworkNetworkUsernameGameIdGameNetworkIdFull($obj) {
        return $this->act->SetProfileGameNetworkNetworkUsernameGameIdGameNetworkId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileGameNetworkUuid(
        $uuid
    ) {         
        return $this->act->DelProfileGameNetworkUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileGameNetworkProfileIdGameId(
        $profile_id
        , $game_id
    ) {         
        return $this->act->DelProfileGameNetworkProfileIdGameId(
        $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileGameNetworkProfileIdGameIdGameNetworkId(
        $profile_id
        , $game_id
        , $game_network_id
    ) {         
        return $this->act->DelProfileGameNetworkProfileIdGameIdGameNetworkId(
        $profile_id
        , $game_id
        , $game_network_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
        $network_username
        , $game_id
        , $game_network_id
    ) {         
        return $this->act->DelProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
        $network_username
        , $game_id
        , $game_network_id
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
    public function GetProfileGameNetworkListUuid(
        $uuid
        ) {
            return $this->act->GetProfileGameNetworkListUuid(
                $uuid
            );
        }
        
    public function GetProfileGameNetworkUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileGameNetworkListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameNetworkListUuid(
        $uuid
    ) {
        return $this->CachedGetProfileGameNetworkListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileGameNetworkListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameNetworkListUuid";

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
            $objs = $this->GetProfileGameNetworkListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameNetworkListGameId(
        $game_id
        ) {
            return $this->act->GetProfileGameNetworkListGameId(
                $game_id
            );
        }
        
    public function GetProfileGameNetworkGameId(
        $game_id
    ) {
        foreach($this->act->GetProfileGameNetworkListGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameNetworkListGameId(
        $game_id
    ) {
        return $this->CachedGetProfileGameNetworkListGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetProfileGameNetworkListGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameNetworkListGameId";

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
            $objs = $this->GetProfileGameNetworkListGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameNetworkListProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileGameNetworkListProfileId(
                $profile_id
            );
        }
        
    public function GetProfileGameNetworkProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileGameNetworkListProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameNetworkListProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileGameNetworkListProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileGameNetworkListProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameNetworkListProfileId";

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
            $objs = $this->GetProfileGameNetworkListProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameNetworkListProfileIdGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetProfileGameNetworkListProfileIdGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetProfileGameNetworkProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetProfileGameNetworkListProfileIdGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameNetworkListProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetProfileGameNetworkListProfileIdGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetProfileGameNetworkListProfileIdGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameNetworkListProfileIdGameId";

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
            $objs = $this->GetProfileGameNetworkListProfileIdGameId(
                $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameNetworkListProfileIdGameIdGameNetworkId(
        $profile_id
        , $game_id
        , $game_network_id
        ) {
            return $this->act->GetProfileGameNetworkListProfileIdGameIdGameNetworkId(
                $profile_id
                , $game_id
                , $game_network_id
            );
        }
        
    public function GetProfileGameNetworkProfileIdGameIdGameNetworkId(
        $profile_id
        , $game_id
        , $game_network_id
    ) {
        foreach($this->act->GetProfileGameNetworkListProfileIdGameIdGameNetworkId(
        $profile_id
        , $game_id
        , $game_network_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameNetworkListProfileIdGameIdGameNetworkId(
        $profile_id
        , $game_id
        , $game_network_id
    ) {
        return $this->CachedGetProfileGameNetworkListProfileIdGameIdGameNetworkId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
            , $game_network_id
        );
    }
    */
        
    public function CachedGetProfileGameNetworkListProfileIdGameIdGameNetworkId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
        , $game_network_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameNetworkListProfileIdGameIdGameNetworkId";

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
        $sb += strtolower("$game_network_id");
        $sb += "_";
        $sb += $game_network_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileGameNetwork>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileGameNetworkListProfileIdGameIdGameNetworkId(
                $profile_id
                , $game_id
                , $game_network_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
        $network_username
        , $game_id
        , $game_network_id
        ) {
            return $this->act->GetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
                $network_username
                , $game_id
                , $game_network_id
            );
        }
        
    public function GetProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
        $network_username
        , $game_id
        , $game_network_id
    ) {
        foreach($this->act->GetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
        $network_username
        , $game_id
        , $game_network_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
        $network_username
        , $game_id
        , $game_network_id
    ) {
        return $this->CachedGetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $network_username
            , $game_id
            , $game_network_id
        );
    }
    */
        
    public function CachedGetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
        $overrideCache
        , $cacheHours
        , $network_username
        , $game_id
        , $game_network_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$network_username");
        $sb += "_";
        $sb += $network_username;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$game_network_id");
        $sb += "_";
        $sb += $game_network_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileGameNetwork>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
                $network_username
                , $game_id
                , $game_network_id
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
    public function CountProfileGameDataAttributeUuid(
        $uuid
    ) {      
        return $this->act->CountProfileGameDataAttributeUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameDataAttributeProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileGameDataAttributeProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameDataAttributeProfileIdGameIdCode(
        $profile_id
        , $game_id
        , $code
    ) {      
        return $this->act->CountProfileGameDataAttributeProfileIdGameIdCode(
        $profile_id
        , $game_id
        , $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileGameDataAttributeListFilter($filter_obj) {
        return $this->act->BrowseProfileGameDataAttributeListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileGameDataAttributeUuid($set_type, $obj) {
        return $this->act->SetProfileGameDataAttributeUuid($set_type, $obj);
    }
               
    public function SetProfileGameDataAttributeUuidFull($obj) {
        return $this->act->SetProfileGameDataAttributeUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileGameDataAttributeProfileId($set_type, $obj) {
        return $this->act->SetProfileGameDataAttributeProfileId($set_type, $obj);
    }
               
    public function SetProfileGameDataAttributeProfileIdFull($obj) {
        return $this->act->SetProfileGameDataAttributeProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileGameDataAttributeProfileIdGameIdCode($set_type, $obj) {
        return $this->act->SetProfileGameDataAttributeProfileIdGameIdCode($set_type, $obj);
    }
               
    public function SetProfileGameDataAttributeProfileIdGameIdCodeFull($obj) {
        return $this->act->SetProfileGameDataAttributeProfileIdGameIdCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileGameDataAttributeUuid(
        $uuid
    ) {         
        return $this->act->DelProfileGameDataAttributeUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileGameDataAttributeProfileId(
        $profile_id
    ) {         
        return $this->act->DelProfileGameDataAttributeProfileId(
        $profile_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileGameDataAttributeProfileIdGameIdCode(
        $profile_id
        , $game_id
        , $code
    ) {         
        return $this->act->DelProfileGameDataAttributeProfileIdGameIdCode(
        $profile_id
        , $game_id
        , $code
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileGameDataAttributeListUuid(
        $uuid
        ) {
            return $this->act->GetProfileGameDataAttributeListUuid(
                $uuid
            );
        }
        
    public function GetProfileGameDataAttributeUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileGameDataAttributeListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameDataAttributeListUuid(
        $uuid
    ) {
        return $this->CachedGetProfileGameDataAttributeListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileGameDataAttributeListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameDataAttributeListUuid";

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
            $objs = $this->GetProfileGameDataAttributeListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameDataAttributeListProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileGameDataAttributeListProfileId(
                $profile_id
            );
        }
        
    public function GetProfileGameDataAttributeProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileGameDataAttributeListProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameDataAttributeListProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileGameDataAttributeListProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileGameDataAttributeListProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameDataAttributeListProfileId";

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
            $objs = $this->GetProfileGameDataAttributeListProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameDataAttributeListProfileIdGameIdCode(
        $profile_id
        , $game_id
        , $code
        ) {
            return $this->act->GetProfileGameDataAttributeListProfileIdGameIdCode(
                $profile_id
                , $game_id
                , $code
            );
        }
        
    public function GetProfileGameDataAttributeProfileIdGameIdCode(
        $profile_id
        , $game_id
        , $code
    ) {
        foreach($this->act->GetProfileGameDataAttributeListProfileIdGameIdCode(
        $profile_id
        , $game_id
        , $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameDataAttributeListProfileIdGameIdCode(
        $profile_id
        , $game_id
        , $code
    ) {
        return $this->CachedGetProfileGameDataAttributeListProfileIdGameIdCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
            , $code
        );
    }
    */
        
    public function CachedGetProfileGameDataAttributeListProfileIdGameIdCode(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameDataAttributeListProfileIdGameIdCode";

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
            $objs = $this->GetProfileGameDataAttributeListProfileIdGameIdCode(
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
    public function CountGameSessionUuid(
        $uuid
    ) {      
        return $this->act->CountGameSessionUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameSessionGameId(
        $game_id
    ) {      
        return $this->act->CountGameSessionGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameSessionProfileId(
        $profile_id
    ) {      
        return $this->act->CountGameSessionProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameSessionProfileIdGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameSessionProfileIdGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameSessionListFilter($filter_obj) {
        return $this->act->BrowseGameSessionListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameSessionUuid($set_type, $obj) {
        return $this->act->SetGameSessionUuid($set_type, $obj);
    }
               
    public function SetGameSessionUuidFull($obj) {
        return $this->act->SetGameSessionUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameSessionUuid(
        $uuid
    ) {         
        return $this->act->DelGameSessionUuid(
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
    public function GetGameSessionListUuid(
        $uuid
        ) {
            return $this->act->GetGameSessionListUuid(
                $uuid
            );
        }
        
    public function GetGameSessionUuid(
        $uuid
    ) {
        foreach($this->act->GetGameSessionListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameSessionListUuid(
        $uuid
    ) {
        return $this->CachedGetGameSessionListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameSessionListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameSessionListUuid";

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
            $objs = $this->GetGameSessionListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameSessionListGameId(
        $game_id
        ) {
            return $this->act->GetGameSessionListGameId(
                $game_id
            );
        }
        
    public function GetGameSessionGameId(
        $game_id
    ) {
        foreach($this->act->GetGameSessionListGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameSessionListGameId(
        $game_id
    ) {
        return $this->CachedGetGameSessionListGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameSessionListGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameSessionListGameId";

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
            $objs = $this->GetGameSessionListGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameSessionListProfileId(
        $profile_id
        ) {
            return $this->act->GetGameSessionListProfileId(
                $profile_id
            );
        }
        
    public function GetGameSessionProfileId(
        $profile_id
    ) {
        foreach($this->act->GetGameSessionListProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameSessionListProfileId(
        $profile_id
    ) {
        return $this->CachedGetGameSessionListProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetGameSessionListProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameSessionListProfileId";

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
            $objs = $this->GetGameSessionListProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameSessionListProfileIdGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetGameSessionListProfileIdGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetGameSessionProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameSessionListProfileIdGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameSessionListProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameSessionListProfileIdGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameSessionListProfileIdGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameSessionListProfileIdGameId";

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
            $objs = $this->GetGameSessionListProfileIdGameId(
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
    public function CountGameSessionDataUuid(
        $uuid
    ) {      
        return $this->act->CountGameSessionDataUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameSessionDataListFilter($filter_obj) {
        return $this->act->BrowseGameSessionDataListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameSessionDataUuid($set_type, $obj) {
        return $this->act->SetGameSessionDataUuid($set_type, $obj);
    }
               
    public function SetGameSessionDataUuidFull($obj) {
        return $this->act->SetGameSessionDataUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameSessionDataUuid(
        $uuid
    ) {         
        return $this->act->DelGameSessionDataUuid(
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
    public function GetGameSessionDataListUuid(
        $uuid
        ) {
            return $this->act->GetGameSessionDataListUuid(
                $uuid
            );
        }
        
    public function GetGameSessionDataUuid(
        $uuid
    ) {
        foreach($this->act->GetGameSessionDataListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameSessionDataListUuid(
        $uuid
    ) {
        return $this->CachedGetGameSessionDataListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameSessionDataListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameSessionDataListUuid";

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
            $objs = $this->GetGameSessionDataListUuid(
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
    public function CountGameContentUuid(
        $uuid
    ) {      
        return $this->act->CountGameContentUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameContentGameId(
        $game_id
    ) {      
        return $this->act->CountGameContentGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameContentGameIdPath(
        $game_id
        , $path
    ) {      
        return $this->act->CountGameContentGameIdPath(
        $game_id
        , $path
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameContentGameIdPathVersion(
        $game_id
        , $path
        , $version
    ) {      
        return $this->act->CountGameContentGameIdPathVersion(
        $game_id
        , $path
        , $version
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameContentGameIdPathVersionPlatformIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
    ) {      
        return $this->act->CountGameContentGameIdPathVersionPlatformIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameContentListFilter($filter_obj) {
        return $this->act->BrowseGameContentListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameContentUuid($set_type, $obj) {
        return $this->act->SetGameContentUuid($set_type, $obj);
    }
               
    public function SetGameContentUuidFull($obj) {
        return $this->act->SetGameContentUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameContentGameId($set_type, $obj) {
        return $this->act->SetGameContentGameId($set_type, $obj);
    }
               
    public function SetGameContentGameIdFull($obj) {
        return $this->act->SetGameContentGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameContentGameIdPath($set_type, $obj) {
        return $this->act->SetGameContentGameIdPath($set_type, $obj);
    }
               
    public function SetGameContentGameIdPathFull($obj) {
        return $this->act->SetGameContentGameIdPath('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameContentGameIdPathVersion($set_type, $obj) {
        return $this->act->SetGameContentGameIdPathVersion($set_type, $obj);
    }
               
    public function SetGameContentGameIdPathVersionFull($obj) {
        return $this->act->SetGameContentGameIdPathVersion('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameContentGameIdPathVersionPlatformIncrement($set_type, $obj) {
        return $this->act->SetGameContentGameIdPathVersionPlatformIncrement($set_type, $obj);
    }
               
    public function SetGameContentGameIdPathVersionPlatformIncrementFull($obj) {
        return $this->act->SetGameContentGameIdPathVersionPlatformIncrement('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameContentUuid(
        $uuid
    ) {         
        return $this->act->DelGameContentUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameContentGameId(
        $game_id
    ) {         
        return $this->act->DelGameContentGameId(
        $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameContentGameIdPath(
        $game_id
        , $path
    ) {         
        return $this->act->DelGameContentGameIdPath(
        $game_id
        , $path
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameContentGameIdPathVersion(
        $game_id
        , $path
        , $version
    ) {         
        return $this->act->DelGameContentGameIdPathVersion(
        $game_id
        , $path
        , $version
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameContentGameIdPathVersionPlatformIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
    ) {         
        return $this->act->DelGameContentGameIdPathVersionPlatformIncrement(
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
    public function GetGameContentListUuid(
        $uuid
        ) {
            return $this->act->GetGameContentListUuid(
                $uuid
            );
        }
        
    public function GetGameContentUuid(
        $uuid
    ) {
        foreach($this->act->GetGameContentListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameContentListUuid(
        $uuid
    ) {
        return $this->CachedGetGameContentListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameContentListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameContentListUuid";

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
            $objs = $this->GetGameContentListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameContentListGameId(
        $game_id
        ) {
            return $this->act->GetGameContentListGameId(
                $game_id
            );
        }
        
    public function GetGameContentGameId(
        $game_id
    ) {
        foreach($this->act->GetGameContentListGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameContentListGameId(
        $game_id
    ) {
        return $this->CachedGetGameContentListGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameContentListGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameContentListGameId";

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
            $objs = $this->GetGameContentListGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameContentListGameIdPath(
        $game_id
        , $path
        ) {
            return $this->act->GetGameContentListGameIdPath(
                $game_id
                , $path
            );
        }
        
    public function GetGameContentGameIdPath(
        $game_id
        , $path
    ) {
        foreach($this->act->GetGameContentListGameIdPath(
        $game_id
        , $path
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameContentListGameIdPath(
        $game_id
        , $path
    ) {
        return $this->CachedGetGameContentListGameIdPath(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $path
        );
    }
    */
        
    public function CachedGetGameContentListGameIdPath(
        $overrideCache
        , $cacheHours
        , $game_id
        , $path
    ) {

        $objs = array();

        $method_name = "CachedGetGameContentListGameIdPath";

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
            $objs = $this->GetGameContentListGameIdPath(
                $game_id
                , $path
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameContentListGameIdPathVersion(
        $game_id
        , $path
        , $version
        ) {
            return $this->act->GetGameContentListGameIdPathVersion(
                $game_id
                , $path
                , $version
            );
        }
        
    public function GetGameContentGameIdPathVersion(
        $game_id
        , $path
        , $version
    ) {
        foreach($this->act->GetGameContentListGameIdPathVersion(
        $game_id
        , $path
        , $version
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameContentListGameIdPathVersion(
        $game_id
        , $path
        , $version
    ) {
        return $this->CachedGetGameContentListGameIdPathVersion(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $path
            , $version
        );
    }
    */
        
    public function CachedGetGameContentListGameIdPathVersion(
        $overrideCache
        , $cacheHours
        , $game_id
        , $path
        , $version
    ) {

        $objs = array();

        $method_name = "CachedGetGameContentListGameIdPathVersion";

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
            $objs = $this->GetGameContentListGameIdPathVersion(
                $game_id
                , $path
                , $version
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameContentListGameIdPathVersionPlatformIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
        ) {
            return $this->act->GetGameContentListGameIdPathVersionPlatformIncrement(
                $game_id
                , $path
                , $version
                , $platform
                , $increment
            );
        }
        
    public function GetGameContentGameIdPathVersionPlatformIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
    ) {
        foreach($this->act->GetGameContentListGameIdPathVersionPlatformIncrement(
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
    public function CachedGetGameContentListGameIdPathVersionPlatformIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
    ) {
        return $this->CachedGetGameContentListGameIdPathVersionPlatformIncrement(
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
        
    public function CachedGetGameContentListGameIdPathVersionPlatformIncrement(
        $overrideCache
        , $cacheHours
        , $game_id
        , $path
        , $version
        , $platform
        , $increment
    ) {

        $objs = array();

        $method_name = "CachedGetGameContentListGameIdPathVersionPlatformIncrement";

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
            $objs = $this->GetGameContentListGameIdPathVersionPlatformIncrement(
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
    public function CountGameProfileContentUuid(
        $uuid
    ) {      
        return $this->act->CountGameProfileContentUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileContentGameIdProfileId(
        $game_id
        , $profile_id
    ) {      
        return $this->act->CountGameProfileContentGameIdProfileId(
        $game_id
        , $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileContentGameIdUsername(
        $game_id
        , $username
    ) {      
        return $this->act->CountGameProfileContentGameIdUsername(
        $game_id
        , $username
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileContentUsername(
        $username
    ) {      
        return $this->act->CountGameProfileContentUsername(
        $username
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileContentGameIdProfileIdPath(
        $game_id
        , $profile_id
        , $path
    ) {      
        return $this->act->CountGameProfileContentGameIdProfileIdPath(
        $game_id
        , $profile_id
        , $path
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileContentGameIdProfileIdPathVersion(
        $game_id
        , $profile_id
        , $path
        , $version
    ) {      
        return $this->act->CountGameProfileContentGameIdProfileIdPathVersion(
        $game_id
        , $profile_id
        , $path
        , $version
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
    ) {      
        return $this->act->CountGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileContentGameIdUsernamePath(
        $game_id
        , $username
        , $path
    ) {      
        return $this->act->CountGameProfileContentGameIdUsernamePath(
        $game_id
        , $username
        , $path
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileContentGameIdUsernamePathVersion(
        $game_id
        , $username
        , $path
        , $version
    ) {      
        return $this->act->CountGameProfileContentGameIdUsernamePathVersion(
        $game_id
        , $username
        , $path
        , $version
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
    ) {      
        return $this->act->CountGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameProfileContentListFilter($filter_obj) {
        return $this->act->BrowseGameProfileContentListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileContentUuid($set_type, $obj) {
        return $this->act->SetGameProfileContentUuid($set_type, $obj);
    }
               
    public function SetGameProfileContentUuidFull($obj) {
        return $this->act->SetGameProfileContentUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileContentGameIdProfileId($set_type, $obj) {
        return $this->act->SetGameProfileContentGameIdProfileId($set_type, $obj);
    }
               
    public function SetGameProfileContentGameIdProfileIdFull($obj) {
        return $this->act->SetGameProfileContentGameIdProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileContentGameIdUsername($set_type, $obj) {
        return $this->act->SetGameProfileContentGameIdUsername($set_type, $obj);
    }
               
    public function SetGameProfileContentGameIdUsernameFull($obj) {
        return $this->act->SetGameProfileContentGameIdUsername('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileContentUsername($set_type, $obj) {
        return $this->act->SetGameProfileContentUsername($set_type, $obj);
    }
               
    public function SetGameProfileContentUsernameFull($obj) {
        return $this->act->SetGameProfileContentUsername('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileContentGameIdProfileIdPath($set_type, $obj) {
        return $this->act->SetGameProfileContentGameIdProfileIdPath($set_type, $obj);
    }
               
    public function SetGameProfileContentGameIdProfileIdPathFull($obj) {
        return $this->act->SetGameProfileContentGameIdProfileIdPath('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileContentGameIdProfileIdPathVersion($set_type, $obj) {
        return $this->act->SetGameProfileContentGameIdProfileIdPathVersion($set_type, $obj);
    }
               
    public function SetGameProfileContentGameIdProfileIdPathVersionFull($obj) {
        return $this->act->SetGameProfileContentGameIdProfileIdPathVersion('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement($set_type, $obj) {
        return $this->act->SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement($set_type, $obj);
    }
               
    public function SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrementFull($obj) {
        return $this->act->SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileContentGameIdUsernamePath($set_type, $obj) {
        return $this->act->SetGameProfileContentGameIdUsernamePath($set_type, $obj);
    }
               
    public function SetGameProfileContentGameIdUsernamePathFull($obj) {
        return $this->act->SetGameProfileContentGameIdUsernamePath('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileContentGameIdUsernamePathVersion($set_type, $obj) {
        return $this->act->SetGameProfileContentGameIdUsernamePathVersion($set_type, $obj);
    }
               
    public function SetGameProfileContentGameIdUsernamePathVersionFull($obj) {
        return $this->act->SetGameProfileContentGameIdUsernamePathVersion('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileContentGameIdUsernamePathVersionPlatformIncrement($set_type, $obj) {
        return $this->act->SetGameProfileContentGameIdUsernamePathVersionPlatformIncrement($set_type, $obj);
    }
               
    public function SetGameProfileContentGameIdUsernamePathVersionPlatformIncrementFull($obj) {
        return $this->act->SetGameProfileContentGameIdUsernamePathVersionPlatformIncrement('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileContentUuid(
        $uuid
    ) {         
        return $this->act->DelGameProfileContentUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileContentGameIdProfileId(
        $game_id
        , $profile_id
    ) {         
        return $this->act->DelGameProfileContentGameIdProfileId(
        $game_id
        , $profile_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileContentGameIdUsername(
        $game_id
        , $username
    ) {         
        return $this->act->DelGameProfileContentGameIdUsername(
        $game_id
        , $username
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileContentUsername(
        $username
    ) {         
        return $this->act->DelGameProfileContentUsername(
        $username
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileContentGameIdProfileIdPath(
        $game_id
        , $profile_id
        , $path
    ) {         
        return $this->act->DelGameProfileContentGameIdProfileIdPath(
        $game_id
        , $profile_id
        , $path
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileContentGameIdProfileIdPathVersion(
        $game_id
        , $profile_id
        , $path
        , $version
    ) {         
        return $this->act->DelGameProfileContentGameIdProfileIdPathVersion(
        $game_id
        , $profile_id
        , $path
        , $version
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
    ) {         
        return $this->act->DelGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileContentGameIdUsernamePath(
        $game_id
        , $username
        , $path
    ) {         
        return $this->act->DelGameProfileContentGameIdUsernamePath(
        $game_id
        , $username
        , $path
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileContentGameIdUsernamePathVersion(
        $game_id
        , $username
        , $path
        , $version
    ) {         
        return $this->act->DelGameProfileContentGameIdUsernamePathVersion(
        $game_id
        , $username
        , $path
        , $version
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
    ) {         
        return $this->act->DelGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
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
    public function GetGameProfileContentListUuid(
        $uuid
        ) {
            return $this->act->GetGameProfileContentListUuid(
                $uuid
            );
        }
        
    public function GetGameProfileContentUuid(
        $uuid
    ) {
        foreach($this->act->GetGameProfileContentListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileContentListUuid(
        $uuid
    ) {
        return $this->CachedGetGameProfileContentListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameProfileContentListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileContentListUuid";

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
            $objs = $this->GetGameProfileContentListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileContentListGameIdProfileId(
        $game_id
        , $profile_id
        ) {
            return $this->act->GetGameProfileContentListGameIdProfileId(
                $game_id
                , $profile_id
            );
        }
        
    public function GetGameProfileContentGameIdProfileId(
        $game_id
        , $profile_id
    ) {
        foreach($this->act->GetGameProfileContentListGameIdProfileId(
        $game_id
        , $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileContentListGameIdProfileId(
        $game_id
        , $profile_id
    ) {
        return $this->CachedGetGameProfileContentListGameIdProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $profile_id
        );
    }
    */
        
    public function CachedGetGameProfileContentListGameIdProfileId(
        $overrideCache
        , $cacheHours
        , $game_id
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileContentListGameIdProfileId";

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
            $objs = $this->GetGameProfileContentListGameIdProfileId(
                $game_id
                , $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileContentListGameIdUsername(
        $game_id
        , $username
        ) {
            return $this->act->GetGameProfileContentListGameIdUsername(
                $game_id
                , $username
            );
        }
        
    public function GetGameProfileContentGameIdUsername(
        $game_id
        , $username
    ) {
        foreach($this->act->GetGameProfileContentListGameIdUsername(
        $game_id
        , $username
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileContentListGameIdUsername(
        $game_id
        , $username
    ) {
        return $this->CachedGetGameProfileContentListGameIdUsername(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $username
        );
    }
    */
        
    public function CachedGetGameProfileContentListGameIdUsername(
        $overrideCache
        , $cacheHours
        , $game_id
        , $username
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileContentListGameIdUsername";

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
            $objs = $this->GetGameProfileContentListGameIdUsername(
                $game_id
                , $username
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileContentListUsername(
        $username
        ) {
            return $this->act->GetGameProfileContentListUsername(
                $username
            );
        }
        
    public function GetGameProfileContentUsername(
        $username
    ) {
        foreach($this->act->GetGameProfileContentListUsername(
        $username
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileContentListUsername(
        $username
    ) {
        return $this->CachedGetGameProfileContentListUsername(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $username
        );
    }
    */
        
    public function CachedGetGameProfileContentListUsername(
        $overrideCache
        , $cacheHours
        , $username
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileContentListUsername";

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
            $objs = $this->GetGameProfileContentListUsername(
                $username
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileContentListGameIdProfileIdPath(
        $game_id
        , $profile_id
        , $path
        ) {
            return $this->act->GetGameProfileContentListGameIdProfileIdPath(
                $game_id
                , $profile_id
                , $path
            );
        }
        
    public function GetGameProfileContentGameIdProfileIdPath(
        $game_id
        , $profile_id
        , $path
    ) {
        foreach($this->act->GetGameProfileContentListGameIdProfileIdPath(
        $game_id
        , $profile_id
        , $path
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileContentListGameIdProfileIdPath(
        $game_id
        , $profile_id
        , $path
    ) {
        return $this->CachedGetGameProfileContentListGameIdProfileIdPath(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $profile_id
            , $path
        );
    }
    */
        
    public function CachedGetGameProfileContentListGameIdProfileIdPath(
        $overrideCache
        , $cacheHours
        , $game_id
        , $profile_id
        , $path
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileContentListGameIdProfileIdPath";

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
            $objs = $this->GetGameProfileContentListGameIdProfileIdPath(
                $game_id
                , $profile_id
                , $path
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileContentListGameIdProfileIdPathVersion(
        $game_id
        , $profile_id
        , $path
        , $version
        ) {
            return $this->act->GetGameProfileContentListGameIdProfileIdPathVersion(
                $game_id
                , $profile_id
                , $path
                , $version
            );
        }
        
    public function GetGameProfileContentGameIdProfileIdPathVersion(
        $game_id
        , $profile_id
        , $path
        , $version
    ) {
        foreach($this->act->GetGameProfileContentListGameIdProfileIdPathVersion(
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
    public function CachedGetGameProfileContentListGameIdProfileIdPathVersion(
        $game_id
        , $profile_id
        , $path
        , $version
    ) {
        return $this->CachedGetGameProfileContentListGameIdProfileIdPathVersion(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $profile_id
            , $path
            , $version
        );
    }
    */
        
    public function CachedGetGameProfileContentListGameIdProfileIdPathVersion(
        $overrideCache
        , $cacheHours
        , $game_id
        , $profile_id
        , $path
        , $version
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileContentListGameIdProfileIdPathVersion";

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
            $objs = $this->GetGameProfileContentListGameIdProfileIdPathVersion(
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
    public function GetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
        ) {
            return $this->act->GetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
                $game_id
                , $profile_id
                , $path
                , $version
                , $platform
                , $increment
            );
        }
        
    public function GetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
    ) {
        foreach($this->act->GetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
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
    public function CachedGetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
    ) {
        return $this->CachedGetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
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
        
    public function CachedGetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
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

        $method_name = "CachedGetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement";

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
            $objs = $this->GetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
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
    public function GetGameProfileContentListGameIdUsernamePath(
        $game_id
        , $username
        , $path
        ) {
            return $this->act->GetGameProfileContentListGameIdUsernamePath(
                $game_id
                , $username
                , $path
            );
        }
        
    public function GetGameProfileContentGameIdUsernamePath(
        $game_id
        , $username
        , $path
    ) {
        foreach($this->act->GetGameProfileContentListGameIdUsernamePath(
        $game_id
        , $username
        , $path
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileContentListGameIdUsernamePath(
        $game_id
        , $username
        , $path
    ) {
        return $this->CachedGetGameProfileContentListGameIdUsernamePath(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $username
            , $path
        );
    }
    */
        
    public function CachedGetGameProfileContentListGameIdUsernamePath(
        $overrideCache
        , $cacheHours
        , $game_id
        , $username
        , $path
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileContentListGameIdUsernamePath";

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
            $objs = $this->GetGameProfileContentListGameIdUsernamePath(
                $game_id
                , $username
                , $path
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileContentListGameIdUsernamePathVersion(
        $game_id
        , $username
        , $path
        , $version
        ) {
            return $this->act->GetGameProfileContentListGameIdUsernamePathVersion(
                $game_id
                , $username
                , $path
                , $version
            );
        }
        
    public function GetGameProfileContentGameIdUsernamePathVersion(
        $game_id
        , $username
        , $path
        , $version
    ) {
        foreach($this->act->GetGameProfileContentListGameIdUsernamePathVersion(
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
    public function CachedGetGameProfileContentListGameIdUsernamePathVersion(
        $game_id
        , $username
        , $path
        , $version
    ) {
        return $this->CachedGetGameProfileContentListGameIdUsernamePathVersion(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $username
            , $path
            , $version
        );
    }
    */
        
    public function CachedGetGameProfileContentListGameIdUsernamePathVersion(
        $overrideCache
        , $cacheHours
        , $game_id
        , $username
        , $path
        , $version
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileContentListGameIdUsernamePathVersion";

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
            $objs = $this->GetGameProfileContentListGameIdUsernamePathVersion(
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
    public function GetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
        ) {
            return $this->act->GetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
                $game_id
                , $username
                , $path
                , $version
                , $platform
                , $increment
            );
        }
        
    public function GetGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
    ) {
        foreach($this->act->GetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
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
    public function CachedGetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
    ) {
        return $this->CachedGetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
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
        
    public function CachedGetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
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

        $method_name = "CachedGetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement";

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
            $objs = $this->GetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
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
    public function CountGameAppUuid(
        $uuid
    ) {      
        return $this->act->CountGameAppUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAppGameId(
        $game_id
    ) {      
        return $this->act->CountGameAppGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAppAppId(
        $app_id
    ) {      
        return $this->act->CountGameAppAppId(
        $app_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAppGameIdAppId(
        $game_id
        , $app_id
    ) {      
        return $this->act->CountGameAppGameIdAppId(
        $game_id
        , $app_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameAppListFilter($filter_obj) {
        return $this->act->BrowseGameAppListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAppUuid($set_type, $obj) {
        return $this->act->SetGameAppUuid($set_type, $obj);
    }
               
    public function SetGameAppUuidFull($obj) {
        return $this->act->SetGameAppUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameAppUuid(
        $uuid
    ) {         
        return $this->act->DelGameAppUuid(
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
    public function GetGameAppListUuid(
        $uuid
        ) {
            return $this->act->GetGameAppListUuid(
                $uuid
            );
        }
        
    public function GetGameAppUuid(
        $uuid
    ) {
        foreach($this->act->GetGameAppListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAppListUuid(
        $uuid
    ) {
        return $this->CachedGetGameAppListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameAppListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameAppListUuid";

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
            $objs = $this->GetGameAppListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAppListGameId(
        $game_id
        ) {
            return $this->act->GetGameAppListGameId(
                $game_id
            );
        }
        
    public function GetGameAppGameId(
        $game_id
    ) {
        foreach($this->act->GetGameAppListGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAppListGameId(
        $game_id
    ) {
        return $this->CachedGetGameAppListGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameAppListGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameAppListGameId";

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
            $objs = $this->GetGameAppListGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAppListAppId(
        $app_id
        ) {
            return $this->act->GetGameAppListAppId(
                $app_id
            );
        }
        
    public function GetGameAppAppId(
        $app_id
    ) {
        foreach($this->act->GetGameAppListAppId(
        $app_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAppListAppId(
        $app_id
    ) {
        return $this->CachedGetGameAppListAppId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $app_id
        );
    }
    */
        
    public function CachedGetGameAppListAppId(
        $overrideCache
        , $cacheHours
        , $app_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameAppListAppId";

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
            $objs = $this->GetGameAppListAppId(
                $app_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAppListGameIdAppId(
        $game_id
        , $app_id
        ) {
            return $this->act->GetGameAppListGameIdAppId(
                $game_id
                , $app_id
            );
        }
        
    public function GetGameAppGameIdAppId(
        $game_id
        , $app_id
    ) {
        foreach($this->act->GetGameAppListGameIdAppId(
        $game_id
        , $app_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAppListGameIdAppId(
        $game_id
        , $app_id
    ) {
        return $this->CachedGetGameAppListGameIdAppId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $app_id
        );
    }
    */
        
    public function CachedGetGameAppListGameIdAppId(
        $overrideCache
        , $cacheHours
        , $game_id
        , $app_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameAppListGameIdAppId";

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
            $objs = $this->GetGameAppListGameIdAppId(
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
    public function CountProfileGameLocationUuid(
        $uuid
    ) {      
        return $this->act->CountProfileGameLocationUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameLocationGameLocationId(
        $game_location_id
    ) {      
        return $this->act->CountProfileGameLocationGameLocationId(
        $game_location_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameLocationProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileGameLocationProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameLocationProfileIdGameLocationId(
        $profile_id
        , $game_location_id
    ) {      
        return $this->act->CountProfileGameLocationProfileIdGameLocationId(
        $profile_id
        , $game_location_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileGameLocationListFilter($filter_obj) {
        return $this->act->BrowseProfileGameLocationListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileGameLocationUuid($set_type, $obj) {
        return $this->act->SetProfileGameLocationUuid($set_type, $obj);
    }
               
    public function SetProfileGameLocationUuidFull($obj) {
        return $this->act->SetProfileGameLocationUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileGameLocationUuid(
        $uuid
    ) {         
        return $this->act->DelProfileGameLocationUuid(
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
    public function GetProfileGameLocationListUuid(
        $uuid
        ) {
            return $this->act->GetProfileGameLocationListUuid(
                $uuid
            );
        }
        
    public function GetProfileGameLocationUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileGameLocationListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameLocationListUuid(
        $uuid
    ) {
        return $this->CachedGetProfileGameLocationListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileGameLocationListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameLocationListUuid";

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
            $objs = $this->GetProfileGameLocationListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameLocationListGameLocationId(
        $game_location_id
        ) {
            return $this->act->GetProfileGameLocationListGameLocationId(
                $game_location_id
            );
        }
        
    public function GetProfileGameLocationGameLocationId(
        $game_location_id
    ) {
        foreach($this->act->GetProfileGameLocationListGameLocationId(
        $game_location_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameLocationListGameLocationId(
        $game_location_id
    ) {
        return $this->CachedGetProfileGameLocationListGameLocationId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_location_id
        );
    }
    */
        
    public function CachedGetProfileGameLocationListGameLocationId(
        $overrideCache
        , $cacheHours
        , $game_location_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameLocationListGameLocationId";

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
            $objs = $this->GetProfileGameLocationListGameLocationId(
                $game_location_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameLocationListProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileGameLocationListProfileId(
                $profile_id
            );
        }
        
    public function GetProfileGameLocationProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileGameLocationListProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameLocationListProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileGameLocationListProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileGameLocationListProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameLocationListProfileId";

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
            $objs = $this->GetProfileGameLocationListProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameLocationListProfileIdGameLocationId(
        $profile_id
        , $game_location_id
        ) {
            return $this->act->GetProfileGameLocationListProfileIdGameLocationId(
                $profile_id
                , $game_location_id
            );
        }
        
    public function GetProfileGameLocationProfileIdGameLocationId(
        $profile_id
        , $game_location_id
    ) {
        foreach($this->act->GetProfileGameLocationListProfileIdGameLocationId(
        $profile_id
        , $game_location_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameLocationListProfileIdGameLocationId(
        $profile_id
        , $game_location_id
    ) {
        return $this->CachedGetProfileGameLocationListProfileIdGameLocationId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_location_id
        );
    }
    */
        
    public function CachedGetProfileGameLocationListProfileIdGameLocationId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_location_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameLocationListProfileIdGameLocationId";

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
            $objs = $this->GetProfileGameLocationListProfileIdGameLocationId(
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
    public function CountGamePhotoUuid(
        $uuid
    ) {      
        return $this->act->CountGamePhotoUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGamePhotoExternalId(
        $external_id
    ) {      
        return $this->act->CountGamePhotoExternalId(
        $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGamePhotoUrl(
        $url
    ) {      
        return $this->act->CountGamePhotoUrl(
        $url
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGamePhotoUrlExternalId(
        $url
        , $external_id
    ) {      
        return $this->act->CountGamePhotoUrlExternalId(
        $url
        , $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGamePhotoUuidExternalId(
        $uuid
        , $external_id
    ) {      
        return $this->act->CountGamePhotoUuidExternalId(
        $uuid
        , $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGamePhotoListFilter($filter_obj) {
        return $this->act->BrowseGamePhotoListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGamePhotoUuid($set_type, $obj) {
        return $this->act->SetGamePhotoUuid($set_type, $obj);
    }
               
    public function SetGamePhotoUuidFull($obj) {
        return $this->act->SetGamePhotoUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGamePhotoExternalId($set_type, $obj) {
        return $this->act->SetGamePhotoExternalId($set_type, $obj);
    }
               
    public function SetGamePhotoExternalIdFull($obj) {
        return $this->act->SetGamePhotoExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGamePhotoUrl($set_type, $obj) {
        return $this->act->SetGamePhotoUrl($set_type, $obj);
    }
               
    public function SetGamePhotoUrlFull($obj) {
        return $this->act->SetGamePhotoUrl('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGamePhotoUrlExternalId($set_type, $obj) {
        return $this->act->SetGamePhotoUrlExternalId($set_type, $obj);
    }
               
    public function SetGamePhotoUrlExternalIdFull($obj) {
        return $this->act->SetGamePhotoUrlExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGamePhotoUuidExternalId($set_type, $obj) {
        return $this->act->SetGamePhotoUuidExternalId($set_type, $obj);
    }
               
    public function SetGamePhotoUuidExternalIdFull($obj) {
        return $this->act->SetGamePhotoUuidExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGamePhotoUuid(
        $uuid
    ) {         
        return $this->act->DelGamePhotoUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGamePhotoExternalId(
        $external_id
    ) {         
        return $this->act->DelGamePhotoExternalId(
        $external_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGamePhotoUrl(
        $url
    ) {         
        return $this->act->DelGamePhotoUrl(
        $url
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGamePhotoUrlExternalId(
        $url
        , $external_id
    ) {         
        return $this->act->DelGamePhotoUrlExternalId(
        $url
        , $external_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGamePhotoUuidExternalId(
        $uuid
        , $external_id
    ) {         
        return $this->act->DelGamePhotoUuidExternalId(
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
    public function GetGamePhotoListUuid(
        $uuid
        ) {
            return $this->act->GetGamePhotoListUuid(
                $uuid
            );
        }
        
    public function GetGamePhotoUuid(
        $uuid
    ) {
        foreach($this->act->GetGamePhotoListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGamePhotoListUuid(
        $uuid
    ) {
        return $this->CachedGetGamePhotoListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGamePhotoListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGamePhotoListUuid";

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
            $objs = $this->GetGamePhotoListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGamePhotoListExternalId(
        $external_id
        ) {
            return $this->act->GetGamePhotoListExternalId(
                $external_id
            );
        }
        
    public function GetGamePhotoExternalId(
        $external_id
    ) {
        foreach($this->act->GetGamePhotoListExternalId(
        $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGamePhotoListExternalId(
        $external_id
    ) {
        return $this->CachedGetGamePhotoListExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $external_id
        );
    }
    */
        
    public function CachedGetGamePhotoListExternalId(
        $overrideCache
        , $cacheHours
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetGamePhotoListExternalId";

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
            $objs = $this->GetGamePhotoListExternalId(
                $external_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGamePhotoListUrl(
        $url
        ) {
            return $this->act->GetGamePhotoListUrl(
                $url
            );
        }
        
    public function GetGamePhotoUrl(
        $url
    ) {
        foreach($this->act->GetGamePhotoListUrl(
        $url
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGamePhotoListUrl(
        $url
    ) {
        return $this->CachedGetGamePhotoListUrl(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
        );
    }
    */
        
    public function CachedGetGamePhotoListUrl(
        $overrideCache
        , $cacheHours
        , $url
    ) {

        $objs = array();

        $method_name = "CachedGetGamePhotoListUrl";

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
            $objs = $this->GetGamePhotoListUrl(
                $url
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGamePhotoListUrlExternalId(
        $url
        , $external_id
        ) {
            return $this->act->GetGamePhotoListUrlExternalId(
                $url
                , $external_id
            );
        }
        
    public function GetGamePhotoUrlExternalId(
        $url
        , $external_id
    ) {
        foreach($this->act->GetGamePhotoListUrlExternalId(
        $url
        , $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGamePhotoListUrlExternalId(
        $url
        , $external_id
    ) {
        return $this->CachedGetGamePhotoListUrlExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
            , $external_id
        );
    }
    */
        
    public function CachedGetGamePhotoListUrlExternalId(
        $overrideCache
        , $cacheHours
        , $url
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetGamePhotoListUrlExternalId";

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
            $objs = $this->GetGamePhotoListUrlExternalId(
                $url
                , $external_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGamePhotoListUuidExternalId(
        $uuid
        , $external_id
        ) {
            return $this->act->GetGamePhotoListUuidExternalId(
                $uuid
                , $external_id
            );
        }
        
    public function GetGamePhotoUuidExternalId(
        $uuid
        , $external_id
    ) {
        foreach($this->act->GetGamePhotoListUuidExternalId(
        $uuid
        , $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGamePhotoListUuidExternalId(
        $uuid
        , $external_id
    ) {
        return $this->CachedGetGamePhotoListUuidExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
            , $external_id
        );
    }
    */
        
    public function CachedGetGamePhotoListUuidExternalId(
        $overrideCache
        , $cacheHours
        , $uuid
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetGamePhotoListUuidExternalId";

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
            $objs = $this->GetGamePhotoListUuidExternalId(
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
    public function CountGameVideoUuid(
        $uuid
    ) {      
        return $this->act->CountGameVideoUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameVideoExternalId(
        $external_id
    ) {      
        return $this->act->CountGameVideoExternalId(
        $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameVideoUrl(
        $url
    ) {      
        return $this->act->CountGameVideoUrl(
        $url
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameVideoUrlExternalId(
        $url
        , $external_id
    ) {      
        return $this->act->CountGameVideoUrlExternalId(
        $url
        , $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameVideoUuidExternalId(
        $uuid
        , $external_id
    ) {      
        return $this->act->CountGameVideoUuidExternalId(
        $uuid
        , $external_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameVideoListFilter($filter_obj) {
        return $this->act->BrowseGameVideoListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameVideoUuid($set_type, $obj) {
        return $this->act->SetGameVideoUuid($set_type, $obj);
    }
               
    public function SetGameVideoUuidFull($obj) {
        return $this->act->SetGameVideoUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameVideoExternalId($set_type, $obj) {
        return $this->act->SetGameVideoExternalId($set_type, $obj);
    }
               
    public function SetGameVideoExternalIdFull($obj) {
        return $this->act->SetGameVideoExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameVideoUrl($set_type, $obj) {
        return $this->act->SetGameVideoUrl($set_type, $obj);
    }
               
    public function SetGameVideoUrlFull($obj) {
        return $this->act->SetGameVideoUrl('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameVideoUrlExternalId($set_type, $obj) {
        return $this->act->SetGameVideoUrlExternalId($set_type, $obj);
    }
               
    public function SetGameVideoUrlExternalIdFull($obj) {
        return $this->act->SetGameVideoUrlExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameVideoUuidExternalId($set_type, $obj) {
        return $this->act->SetGameVideoUuidExternalId($set_type, $obj);
    }
               
    public function SetGameVideoUuidExternalIdFull($obj) {
        return $this->act->SetGameVideoUuidExternalId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameVideoUuid(
        $uuid
    ) {         
        return $this->act->DelGameVideoUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameVideoExternalId(
        $external_id
    ) {         
        return $this->act->DelGameVideoExternalId(
        $external_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameVideoUrl(
        $url
    ) {         
        return $this->act->DelGameVideoUrl(
        $url
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameVideoUrlExternalId(
        $url
        , $external_id
    ) {         
        return $this->act->DelGameVideoUrlExternalId(
        $url
        , $external_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameVideoUuidExternalId(
        $uuid
        , $external_id
    ) {         
        return $this->act->DelGameVideoUuidExternalId(
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
    public function GetGameVideoListUuid(
        $uuid
        ) {
            return $this->act->GetGameVideoListUuid(
                $uuid
            );
        }
        
    public function GetGameVideoUuid(
        $uuid
    ) {
        foreach($this->act->GetGameVideoListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameVideoListUuid(
        $uuid
    ) {
        return $this->CachedGetGameVideoListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameVideoListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameVideoListUuid";

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
            $objs = $this->GetGameVideoListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameVideoListExternalId(
        $external_id
        ) {
            return $this->act->GetGameVideoListExternalId(
                $external_id
            );
        }
        
    public function GetGameVideoExternalId(
        $external_id
    ) {
        foreach($this->act->GetGameVideoListExternalId(
        $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameVideoListExternalId(
        $external_id
    ) {
        return $this->CachedGetGameVideoListExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $external_id
        );
    }
    */
        
    public function CachedGetGameVideoListExternalId(
        $overrideCache
        , $cacheHours
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameVideoListExternalId";

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
            $objs = $this->GetGameVideoListExternalId(
                $external_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameVideoListUrl(
        $url
        ) {
            return $this->act->GetGameVideoListUrl(
                $url
            );
        }
        
    public function GetGameVideoUrl(
        $url
    ) {
        foreach($this->act->GetGameVideoListUrl(
        $url
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameVideoListUrl(
        $url
    ) {
        return $this->CachedGetGameVideoListUrl(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
        );
    }
    */
        
    public function CachedGetGameVideoListUrl(
        $overrideCache
        , $cacheHours
        , $url
    ) {

        $objs = array();

        $method_name = "CachedGetGameVideoListUrl";

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
            $objs = $this->GetGameVideoListUrl(
                $url
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameVideoListUrlExternalId(
        $url
        , $external_id
        ) {
            return $this->act->GetGameVideoListUrlExternalId(
                $url
                , $external_id
            );
        }
        
    public function GetGameVideoUrlExternalId(
        $url
        , $external_id
    ) {
        foreach($this->act->GetGameVideoListUrlExternalId(
        $url
        , $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameVideoListUrlExternalId(
        $url
        , $external_id
    ) {
        return $this->CachedGetGameVideoListUrlExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
            , $external_id
        );
    }
    */
        
    public function CachedGetGameVideoListUrlExternalId(
        $overrideCache
        , $cacheHours
        , $url
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameVideoListUrlExternalId";

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
            $objs = $this->GetGameVideoListUrlExternalId(
                $url
                , $external_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameVideoListUuidExternalId(
        $uuid
        , $external_id
        ) {
            return $this->act->GetGameVideoListUuidExternalId(
                $uuid
                , $external_id
            );
        }
        
    public function GetGameVideoUuidExternalId(
        $uuid
        , $external_id
    ) {
        foreach($this->act->GetGameVideoListUuidExternalId(
        $uuid
        , $external_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameVideoListUuidExternalId(
        $uuid
        , $external_id
    ) {
        return $this->CachedGetGameVideoListUuidExternalId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
            , $external_id
        );
    }
    */
        
    public function CachedGetGameVideoListUuidExternalId(
        $overrideCache
        , $cacheHours
        , $uuid
        , $external_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameVideoListUuidExternalId";

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
            $objs = $this->GetGameVideoListUuidExternalId(
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
    public function CountGameRpgItemWeaponUuid(
        $uuid
    ) {      
        return $this->act->CountGameRpgItemWeaponUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameRpgItemWeaponGameId(
        $game_id
    ) {      
        return $this->act->CountGameRpgItemWeaponGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameRpgItemWeaponUrl(
        $url
    ) {      
        return $this->act->CountGameRpgItemWeaponUrl(
        $url
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameRpgItemWeaponUrlGameId(
        $url
        , $game_id
    ) {      
        return $this->act->CountGameRpgItemWeaponUrlGameId(
        $url
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameRpgItemWeaponUuidGameId(
        $uuid
        , $game_id
    ) {      
        return $this->act->CountGameRpgItemWeaponUuidGameId(
        $uuid
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameRpgItemWeaponListFilter($filter_obj) {
        return $this->act->BrowseGameRpgItemWeaponListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameRpgItemWeaponUuid($set_type, $obj) {
        return $this->act->SetGameRpgItemWeaponUuid($set_type, $obj);
    }
               
    public function SetGameRpgItemWeaponUuidFull($obj) {
        return $this->act->SetGameRpgItemWeaponUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameRpgItemWeaponGameId($set_type, $obj) {
        return $this->act->SetGameRpgItemWeaponGameId($set_type, $obj);
    }
               
    public function SetGameRpgItemWeaponGameIdFull($obj) {
        return $this->act->SetGameRpgItemWeaponGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameRpgItemWeaponUrl($set_type, $obj) {
        return $this->act->SetGameRpgItemWeaponUrl($set_type, $obj);
    }
               
    public function SetGameRpgItemWeaponUrlFull($obj) {
        return $this->act->SetGameRpgItemWeaponUrl('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameRpgItemWeaponUrlGameId($set_type, $obj) {
        return $this->act->SetGameRpgItemWeaponUrlGameId($set_type, $obj);
    }
               
    public function SetGameRpgItemWeaponUrlGameIdFull($obj) {
        return $this->act->SetGameRpgItemWeaponUrlGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameRpgItemWeaponUuidGameId($set_type, $obj) {
        return $this->act->SetGameRpgItemWeaponUuidGameId($set_type, $obj);
    }
               
    public function SetGameRpgItemWeaponUuidGameIdFull($obj) {
        return $this->act->SetGameRpgItemWeaponUuidGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameRpgItemWeaponUuid(
        $uuid
    ) {         
        return $this->act->DelGameRpgItemWeaponUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameRpgItemWeaponGameId(
        $game_id
    ) {         
        return $this->act->DelGameRpgItemWeaponGameId(
        $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameRpgItemWeaponUrl(
        $url
    ) {         
        return $this->act->DelGameRpgItemWeaponUrl(
        $url
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameRpgItemWeaponUrlGameId(
        $url
        , $game_id
    ) {         
        return $this->act->DelGameRpgItemWeaponUrlGameId(
        $url
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameRpgItemWeaponUuidGameId(
        $uuid
        , $game_id
    ) {         
        return $this->act->DelGameRpgItemWeaponUuidGameId(
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
    public function GetGameRpgItemWeaponListUuid(
        $uuid
        ) {
            return $this->act->GetGameRpgItemWeaponListUuid(
                $uuid
            );
        }
        
    public function GetGameRpgItemWeaponUuid(
        $uuid
    ) {
        foreach($this->act->GetGameRpgItemWeaponListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameRpgItemWeaponListUuid(
        $uuid
    ) {
        return $this->CachedGetGameRpgItemWeaponListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameRpgItemWeaponListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameRpgItemWeaponListUuid";

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
            $objs = $this->GetGameRpgItemWeaponListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameRpgItemWeaponListGameId(
        $game_id
        ) {
            return $this->act->GetGameRpgItemWeaponListGameId(
                $game_id
            );
        }
        
    public function GetGameRpgItemWeaponGameId(
        $game_id
    ) {
        foreach($this->act->GetGameRpgItemWeaponListGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameRpgItemWeaponListGameId(
        $game_id
    ) {
        return $this->CachedGetGameRpgItemWeaponListGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameRpgItemWeaponListGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameRpgItemWeaponListGameId";

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
            $objs = $this->GetGameRpgItemWeaponListGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameRpgItemWeaponListUrl(
        $url
        ) {
            return $this->act->GetGameRpgItemWeaponListUrl(
                $url
            );
        }
        
    public function GetGameRpgItemWeaponUrl(
        $url
    ) {
        foreach($this->act->GetGameRpgItemWeaponListUrl(
        $url
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameRpgItemWeaponListUrl(
        $url
    ) {
        return $this->CachedGetGameRpgItemWeaponListUrl(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
        );
    }
    */
        
    public function CachedGetGameRpgItemWeaponListUrl(
        $overrideCache
        , $cacheHours
        , $url
    ) {

        $objs = array();

        $method_name = "CachedGetGameRpgItemWeaponListUrl";

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
            $objs = $this->GetGameRpgItemWeaponListUrl(
                $url
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameRpgItemWeaponListUrlGameId(
        $url
        , $game_id
        ) {
            return $this->act->GetGameRpgItemWeaponListUrlGameId(
                $url
                , $game_id
            );
        }
        
    public function GetGameRpgItemWeaponUrlGameId(
        $url
        , $game_id
    ) {
        foreach($this->act->GetGameRpgItemWeaponListUrlGameId(
        $url
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameRpgItemWeaponListUrlGameId(
        $url
        , $game_id
    ) {
        return $this->CachedGetGameRpgItemWeaponListUrlGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
            , $game_id
        );
    }
    */
        
    public function CachedGetGameRpgItemWeaponListUrlGameId(
        $overrideCache
        , $cacheHours
        , $url
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameRpgItemWeaponListUrlGameId";

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
            $objs = $this->GetGameRpgItemWeaponListUrlGameId(
                $url
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameRpgItemWeaponListUuidGameId(
        $uuid
        , $game_id
        ) {
            return $this->act->GetGameRpgItemWeaponListUuidGameId(
                $uuid
                , $game_id
            );
        }
        
    public function GetGameRpgItemWeaponUuidGameId(
        $uuid
        , $game_id
    ) {
        foreach($this->act->GetGameRpgItemWeaponListUuidGameId(
        $uuid
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameRpgItemWeaponListUuidGameId(
        $uuid
        , $game_id
    ) {
        return $this->CachedGetGameRpgItemWeaponListUuidGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
            , $game_id
        );
    }
    */
        
    public function CachedGetGameRpgItemWeaponListUuidGameId(
        $overrideCache
        , $cacheHours
        , $uuid
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameRpgItemWeaponListUuidGameId";

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
            $objs = $this->GetGameRpgItemWeaponListUuidGameId(
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
    public function CountGameRpgItemSkillUuid(
        $uuid
    ) {      
        return $this->act->CountGameRpgItemSkillUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameRpgItemSkillGameId(
        $game_id
    ) {      
        return $this->act->CountGameRpgItemSkillGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameRpgItemSkillUrl(
        $url
    ) {      
        return $this->act->CountGameRpgItemSkillUrl(
        $url
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameRpgItemSkillUrlGameId(
        $url
        , $game_id
    ) {      
        return $this->act->CountGameRpgItemSkillUrlGameId(
        $url
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameRpgItemSkillUuidGameId(
        $uuid
        , $game_id
    ) {      
        return $this->act->CountGameRpgItemSkillUuidGameId(
        $uuid
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameRpgItemSkillListFilter($filter_obj) {
        return $this->act->BrowseGameRpgItemSkillListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameRpgItemSkillUuid($set_type, $obj) {
        return $this->act->SetGameRpgItemSkillUuid($set_type, $obj);
    }
               
    public function SetGameRpgItemSkillUuidFull($obj) {
        return $this->act->SetGameRpgItemSkillUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameRpgItemSkillGameId($set_type, $obj) {
        return $this->act->SetGameRpgItemSkillGameId($set_type, $obj);
    }
               
    public function SetGameRpgItemSkillGameIdFull($obj) {
        return $this->act->SetGameRpgItemSkillGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameRpgItemSkillUrl($set_type, $obj) {
        return $this->act->SetGameRpgItemSkillUrl($set_type, $obj);
    }
               
    public function SetGameRpgItemSkillUrlFull($obj) {
        return $this->act->SetGameRpgItemSkillUrl('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameRpgItemSkillUrlGameId($set_type, $obj) {
        return $this->act->SetGameRpgItemSkillUrlGameId($set_type, $obj);
    }
               
    public function SetGameRpgItemSkillUrlGameIdFull($obj) {
        return $this->act->SetGameRpgItemSkillUrlGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameRpgItemSkillUuidGameId($set_type, $obj) {
        return $this->act->SetGameRpgItemSkillUuidGameId($set_type, $obj);
    }
               
    public function SetGameRpgItemSkillUuidGameIdFull($obj) {
        return $this->act->SetGameRpgItemSkillUuidGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameRpgItemSkillUuid(
        $uuid
    ) {         
        return $this->act->DelGameRpgItemSkillUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameRpgItemSkillGameId(
        $game_id
    ) {         
        return $this->act->DelGameRpgItemSkillGameId(
        $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameRpgItemSkillUrl(
        $url
    ) {         
        return $this->act->DelGameRpgItemSkillUrl(
        $url
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameRpgItemSkillUrlGameId(
        $url
        , $game_id
    ) {         
        return $this->act->DelGameRpgItemSkillUrlGameId(
        $url
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameRpgItemSkillUuidGameId(
        $uuid
        , $game_id
    ) {         
        return $this->act->DelGameRpgItemSkillUuidGameId(
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
    public function GetGameRpgItemSkillListUuid(
        $uuid
        ) {
            return $this->act->GetGameRpgItemSkillListUuid(
                $uuid
            );
        }
        
    public function GetGameRpgItemSkillUuid(
        $uuid
    ) {
        foreach($this->act->GetGameRpgItemSkillListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameRpgItemSkillListUuid(
        $uuid
    ) {
        return $this->CachedGetGameRpgItemSkillListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameRpgItemSkillListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameRpgItemSkillListUuid";

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
            $objs = $this->GetGameRpgItemSkillListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameRpgItemSkillListGameId(
        $game_id
        ) {
            return $this->act->GetGameRpgItemSkillListGameId(
                $game_id
            );
        }
        
    public function GetGameRpgItemSkillGameId(
        $game_id
    ) {
        foreach($this->act->GetGameRpgItemSkillListGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameRpgItemSkillListGameId(
        $game_id
    ) {
        return $this->CachedGetGameRpgItemSkillListGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameRpgItemSkillListGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameRpgItemSkillListGameId";

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
            $objs = $this->GetGameRpgItemSkillListGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameRpgItemSkillListUrl(
        $url
        ) {
            return $this->act->GetGameRpgItemSkillListUrl(
                $url
            );
        }
        
    public function GetGameRpgItemSkillUrl(
        $url
    ) {
        foreach($this->act->GetGameRpgItemSkillListUrl(
        $url
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameRpgItemSkillListUrl(
        $url
    ) {
        return $this->CachedGetGameRpgItemSkillListUrl(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
        );
    }
    */
        
    public function CachedGetGameRpgItemSkillListUrl(
        $overrideCache
        , $cacheHours
        , $url
    ) {

        $objs = array();

        $method_name = "CachedGetGameRpgItemSkillListUrl";

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
            $objs = $this->GetGameRpgItemSkillListUrl(
                $url
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameRpgItemSkillListUrlGameId(
        $url
        , $game_id
        ) {
            return $this->act->GetGameRpgItemSkillListUrlGameId(
                $url
                , $game_id
            );
        }
        
    public function GetGameRpgItemSkillUrlGameId(
        $url
        , $game_id
    ) {
        foreach($this->act->GetGameRpgItemSkillListUrlGameId(
        $url
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameRpgItemSkillListUrlGameId(
        $url
        , $game_id
    ) {
        return $this->CachedGetGameRpgItemSkillListUrlGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
            , $game_id
        );
    }
    */
        
    public function CachedGetGameRpgItemSkillListUrlGameId(
        $overrideCache
        , $cacheHours
        , $url
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameRpgItemSkillListUrlGameId";

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
            $objs = $this->GetGameRpgItemSkillListUrlGameId(
                $url
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameRpgItemSkillListUuidGameId(
        $uuid
        , $game_id
        ) {
            return $this->act->GetGameRpgItemSkillListUuidGameId(
                $uuid
                , $game_id
            );
        }
        
    public function GetGameRpgItemSkillUuidGameId(
        $uuid
        , $game_id
    ) {
        foreach($this->act->GetGameRpgItemSkillListUuidGameId(
        $uuid
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameRpgItemSkillListUuidGameId(
        $uuid
        , $game_id
    ) {
        return $this->CachedGetGameRpgItemSkillListUuidGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
            , $game_id
        );
    }
    */
        
    public function CachedGetGameRpgItemSkillListUuidGameId(
        $overrideCache
        , $cacheHours
        , $uuid
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameRpgItemSkillListUuidGameId";

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
            $objs = $this->GetGameRpgItemSkillListUuidGameId(
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
    public function CountGameProductUuid(
        $uuid
    ) {      
        return $this->act->CountGameProductUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProductGameId(
        $game_id
    ) {      
        return $this->act->CountGameProductGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProductUrl(
        $url
    ) {      
        return $this->act->CountGameProductUrl(
        $url
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProductUrlGameId(
        $url
        , $game_id
    ) {      
        return $this->act->CountGameProductUrlGameId(
        $url
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProductUuidGameId(
        $uuid
        , $game_id
    ) {      
        return $this->act->CountGameProductUuidGameId(
        $uuid
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameProductListFilter($filter_obj) {
        return $this->act->BrowseGameProductListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProductUuid($set_type, $obj) {
        return $this->act->SetGameProductUuid($set_type, $obj);
    }
               
    public function SetGameProductUuidFull($obj) {
        return $this->act->SetGameProductUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProductGameId($set_type, $obj) {
        return $this->act->SetGameProductGameId($set_type, $obj);
    }
               
    public function SetGameProductGameIdFull($obj) {
        return $this->act->SetGameProductGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProductUrl($set_type, $obj) {
        return $this->act->SetGameProductUrl($set_type, $obj);
    }
               
    public function SetGameProductUrlFull($obj) {
        return $this->act->SetGameProductUrl('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProductUrlGameId($set_type, $obj) {
        return $this->act->SetGameProductUrlGameId($set_type, $obj);
    }
               
    public function SetGameProductUrlGameIdFull($obj) {
        return $this->act->SetGameProductUrlGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProductUuidGameId($set_type, $obj) {
        return $this->act->SetGameProductUuidGameId($set_type, $obj);
    }
               
    public function SetGameProductUuidGameIdFull($obj) {
        return $this->act->SetGameProductUuidGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameProductUuid(
        $uuid
    ) {         
        return $this->act->DelGameProductUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProductGameId(
        $game_id
    ) {         
        return $this->act->DelGameProductGameId(
        $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProductUrl(
        $url
    ) {         
        return $this->act->DelGameProductUrl(
        $url
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProductUrlGameId(
        $url
        , $game_id
    ) {         
        return $this->act->DelGameProductUrlGameId(
        $url
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProductUuidGameId(
        $uuid
        , $game_id
    ) {         
        return $this->act->DelGameProductUuidGameId(
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
    public function GetGameProductListUuid(
        $uuid
        ) {
            return $this->act->GetGameProductListUuid(
                $uuid
            );
        }
        
    public function GetGameProductUuid(
        $uuid
    ) {
        foreach($this->act->GetGameProductListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProductListUuid(
        $uuid
    ) {
        return $this->CachedGetGameProductListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameProductListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameProductListUuid";

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
            $objs = $this->GetGameProductListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProductListGameId(
        $game_id
        ) {
            return $this->act->GetGameProductListGameId(
                $game_id
            );
        }
        
    public function GetGameProductGameId(
        $game_id
    ) {
        foreach($this->act->GetGameProductListGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProductListGameId(
        $game_id
    ) {
        return $this->CachedGetGameProductListGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProductListGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProductListGameId";

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
            $objs = $this->GetGameProductListGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProductListUrl(
        $url
        ) {
            return $this->act->GetGameProductListUrl(
                $url
            );
        }
        
    public function GetGameProductUrl(
        $url
    ) {
        foreach($this->act->GetGameProductListUrl(
        $url
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProductListUrl(
        $url
    ) {
        return $this->CachedGetGameProductListUrl(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
        );
    }
    */
        
    public function CachedGetGameProductListUrl(
        $overrideCache
        , $cacheHours
        , $url
    ) {

        $objs = array();

        $method_name = "CachedGetGameProductListUrl";

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
            $objs = $this->GetGameProductListUrl(
                $url
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProductListUrlGameId(
        $url
        , $game_id
        ) {
            return $this->act->GetGameProductListUrlGameId(
                $url
                , $game_id
            );
        }
        
    public function GetGameProductUrlGameId(
        $url
        , $game_id
    ) {
        foreach($this->act->GetGameProductListUrlGameId(
        $url
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProductListUrlGameId(
        $url
        , $game_id
    ) {
        return $this->CachedGetGameProductListUrlGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $url
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProductListUrlGameId(
        $overrideCache
        , $cacheHours
        , $url
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProductListUrlGameId";

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
            $objs = $this->GetGameProductListUrlGameId(
                $url
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProductListUuidGameId(
        $uuid
        , $game_id
        ) {
            return $this->act->GetGameProductListUuidGameId(
                $uuid
                , $game_id
            );
        }
        
    public function GetGameProductUuidGameId(
        $uuid
        , $game_id
    ) {
        foreach($this->act->GetGameProductListUuidGameId(
        $uuid
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProductListUuidGameId(
        $uuid
        , $game_id
    ) {
        return $this->CachedGetGameProductListUuidGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProductListUuidGameId(
        $overrideCache
        , $cacheHours
        , $uuid
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProductListUuidGameId";

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
            $objs = $this->GetGameProductListUuidGameId(
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
    public function CountGameStatisticLeaderboardUuid(
        $uuid
    ) {      
        return $this->act->CountGameStatisticLeaderboardUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardGameId(
        $game_id
    ) {      
        return $this->act->CountGameStatisticLeaderboardGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardCode(
        $code
    ) {      
        return $this->act->CountGameStatisticLeaderboardCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardCodeGameId(
        $code
        , $game_id
    ) {      
        return $this->act->CountGameStatisticLeaderboardCodeGameId(
        $code
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {      
        return $this->act->CountGameStatisticLeaderboardCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {      
        return $this->act->CountGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardProfileIdGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameStatisticLeaderboardProfileIdGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameStatisticLeaderboardListFilter($filter_obj) {
        return $this->act->BrowseGameStatisticLeaderboardListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardUuid($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardUuid($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardUuidFull($obj) {
        return $this->act->SetGameStatisticLeaderboardUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardUuidProfileIdGameIdTimestamp($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardUuidProfileIdGameIdTimestamp($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardUuidProfileIdGameIdTimestampFull($obj) {
        return $this->act->SetGameStatisticLeaderboardUuidProfileIdGameIdTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardCode($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardCode($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardCodeFull($obj) {
        return $this->act->SetGameStatisticLeaderboardCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardCodeGameId($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardCodeGameId($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardCodeGameIdFull($obj) {
        return $this->act->SetGameStatisticLeaderboardCodeGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardCodeGameIdProfileId($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardCodeGameIdProfileId($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardCodeGameIdProfileIdFull($obj) {
        return $this->act->SetGameStatisticLeaderboardCodeGameIdProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardCodeGameIdProfileIdTimestampFull($obj) {
        return $this->act->SetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardUuid(
        $uuid
    ) {         
        return $this->act->DelGameStatisticLeaderboardUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardCode(
        $code
    ) {         
        return $this->act->DelGameStatisticLeaderboardCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardCodeGameId(
        $code
        , $game_id
    ) {         
        return $this->act->DelGameStatisticLeaderboardCodeGameId(
        $code
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {         
        return $this->act->DelGameStatisticLeaderboardCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {         
        return $this->act->DelGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardProfileIdGameId(
        $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameStatisticLeaderboardProfileIdGameId(
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
    public function GetGameStatisticLeaderboardListUuid(
        $uuid
        ) {
            return $this->act->GetGameStatisticLeaderboardListUuid(
                $uuid
            );
        }
        
    public function GetGameStatisticLeaderboardUuid(
        $uuid
    ) {
        foreach($this->act->GetGameStatisticLeaderboardListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardListUuid(
        $uuid
    ) {
        return $this->CachedGetGameStatisticLeaderboardListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardListUuid";

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
            $objs = $this->GetGameStatisticLeaderboardListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardListGameId(
        $game_id
        ) {
            return $this->act->GetGameStatisticLeaderboardListGameId(
                $game_id
            );
        }
        
    public function GetGameStatisticLeaderboardGameId(
        $game_id
    ) {
        foreach($this->act->GetGameStatisticLeaderboardListGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardListGameId(
        $game_id
    ) {
        return $this->CachedGetGameStatisticLeaderboardListGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardListGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardListGameId";

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
            $objs = $this->GetGameStatisticLeaderboardListGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardListCode(
        $code
        ) {
            return $this->act->GetGameStatisticLeaderboardListCode(
                $code
            );
        }
        
    public function GetGameStatisticLeaderboardCode(
        $code
    ) {
        foreach($this->act->GetGameStatisticLeaderboardListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardListCode(
        $code
    ) {
        return $this->CachedGetGameStatisticLeaderboardListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardListCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardListCodeGameId(
        $code
        , $game_id
        ) {
            return $this->act->GetGameStatisticLeaderboardListCodeGameId(
                $code
                , $game_id
            );
        }
        
    public function GetGameStatisticLeaderboardCodeGameId(
        $code
        , $game_id
    ) {
        foreach($this->act->GetGameStatisticLeaderboardListCodeGameId(
        $code
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardListCodeGameId(
        $code
        , $game_id
    ) {
        return $this->CachedGetGameStatisticLeaderboardListCodeGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardListCodeGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardListCodeGameId";

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

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardListCodeGameId(
                $code
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardListCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
        ) {
            return $this->act->GetGameStatisticLeaderboardListCodeGameIdProfileId(
                $code
                , $game_id
                , $profile_id
            );
        }
        
    public function GetGameStatisticLeaderboardCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
        foreach($this->act->GetGameStatisticLeaderboardListCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardListCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
        return $this->CachedGetGameStatisticLeaderboardListCodeGameIdProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
            , $profile_id
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardListCodeGameIdProfileId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardListCodeGameIdProfileId";

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
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardListCodeGameIdProfileId(
                $code
                , $game_id
                , $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
        ) {
            return $this->act->GetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
                $code
                , $game_id
                , $profile_id
                , $timestamp
            );
        }
        
    public function GetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
        foreach($this->act->GetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
        return $this->CachedGetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
            , $profile_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp";

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
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$timestamp");
        $sb += "_";
        $sb += $timestamp;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
                $code
                , $game_id
                , $profile_id
                , $timestamp
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardListProfileIdGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetGameStatisticLeaderboardListProfileIdGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetGameStatisticLeaderboardProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameStatisticLeaderboardListProfileIdGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardListProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameStatisticLeaderboardListProfileIdGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardListProfileIdGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardListProfileIdGameId";

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
            $objs = $this->GetGameStatisticLeaderboardListProfileIdGameId(
                $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameStatisticLeaderboardProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardListProfileIdGameIdTimestamp";

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
            $objs = $this->GetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardItem(
    ) {      
        return $this->act->CountGameStatisticLeaderboardItem(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardItemUuid(
        $uuid
    ) {      
        return $this->act->CountGameStatisticLeaderboardItemUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardItemGameId(
        $game_id
    ) {      
        return $this->act->CountGameStatisticLeaderboardItemGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardItemCode(
        $code
    ) {      
        return $this->act->CountGameStatisticLeaderboardItemCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardItemCodeGameId(
        $code
        , $game_id
    ) {      
        return $this->act->CountGameStatisticLeaderboardItemCodeGameId(
        $code
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardItemCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {      
        return $this->act->CountGameStatisticLeaderboardItemCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {      
        return $this->act->CountGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardItemProfileIdGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameStatisticLeaderboardItemProfileIdGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameStatisticLeaderboardItemListFilter($filter_obj) {
        return $this->act->BrowseGameStatisticLeaderboardItemListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardItemUuid($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardItemUuid($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardItemUuidFull($obj) {
        return $this->act->SetGameStatisticLeaderboardItemUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestamp($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestamp($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestampFull($obj) {
        return $this->act->SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardItemCode($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardItemCode($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardItemCodeFull($obj) {
        return $this->act->SetGameStatisticLeaderboardItemCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardItemCodeGameId($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardItemCodeGameId($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardItemCodeGameIdFull($obj) {
        return $this->act->SetGameStatisticLeaderboardItemCodeGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardItemCodeGameIdProfileId($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardItemCodeGameIdProfileId($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardItemCodeGameIdProfileIdFull($obj) {
        return $this->act->SetGameStatisticLeaderboardItemCodeGameIdProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestampFull($obj) {
        return $this->act->SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardItemUuid(
        $uuid
    ) {         
        return $this->act->DelGameStatisticLeaderboardItemUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardItemCode(
        $code
    ) {         
        return $this->act->DelGameStatisticLeaderboardItemCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardItemCodeGameId(
        $code
        , $game_id
    ) {         
        return $this->act->DelGameStatisticLeaderboardItemCodeGameId(
        $code
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardItemCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {         
        return $this->act->DelGameStatisticLeaderboardItemCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {         
        return $this->act->DelGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardItemProfileIdGameId(
        $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameStatisticLeaderboardItemProfileIdGameId(
        $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardItemList(
        ) {
            return $this->act->GetGameStatisticLeaderboardItemList(
            );
        }
        
    public function GetGameStatisticLeaderboardItem(
    ) {
        foreach($this->act->GetGameStatisticLeaderboardItemList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardItemList(
    ) {
        return $this->CachedGetGameStatisticLeaderboardItemList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardItemList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardItemList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardItemList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardItemListUuid(
        $uuid
        ) {
            return $this->act->GetGameStatisticLeaderboardItemListUuid(
                $uuid
            );
        }
        
    public function GetGameStatisticLeaderboardItemUuid(
        $uuid
    ) {
        foreach($this->act->GetGameStatisticLeaderboardItemListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardItemListUuid(
        $uuid
    ) {
        return $this->CachedGetGameStatisticLeaderboardItemListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardItemListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardItemListUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardItemListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardItemListGameId(
        $game_id
        ) {
            return $this->act->GetGameStatisticLeaderboardItemListGameId(
                $game_id
            );
        }
        
    public function GetGameStatisticLeaderboardItemGameId(
        $game_id
    ) {
        foreach($this->act->GetGameStatisticLeaderboardItemListGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardItemListGameId(
        $game_id
    ) {
        return $this->CachedGetGameStatisticLeaderboardItemListGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardItemListGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardItemListGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardItemListGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardItemListCode(
        $code
        ) {
            return $this->act->GetGameStatisticLeaderboardItemListCode(
                $code
            );
        }
        
    public function GetGameStatisticLeaderboardItemCode(
        $code
    ) {
        foreach($this->act->GetGameStatisticLeaderboardItemListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardItemListCode(
        $code
    ) {
        return $this->CachedGetGameStatisticLeaderboardItemListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardItemListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardItemListCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardItemListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardItemListCodeGameId(
        $code
        , $game_id
        ) {
            return $this->act->GetGameStatisticLeaderboardItemListCodeGameId(
                $code
                , $game_id
            );
        }
        
    public function GetGameStatisticLeaderboardItemCodeGameId(
        $code
        , $game_id
    ) {
        foreach($this->act->GetGameStatisticLeaderboardItemListCodeGameId(
        $code
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardItemListCodeGameId(
        $code
        , $game_id
    ) {
        return $this->CachedGetGameStatisticLeaderboardItemListCodeGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardItemListCodeGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardItemListCodeGameId";

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

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardItemListCodeGameId(
                $code
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardItemListCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
        ) {
            return $this->act->GetGameStatisticLeaderboardItemListCodeGameIdProfileId(
                $code
                , $game_id
                , $profile_id
            );
        }
        
    public function GetGameStatisticLeaderboardItemCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
        foreach($this->act->GetGameStatisticLeaderboardItemListCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardItemListCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
        return $this->CachedGetGameStatisticLeaderboardItemListCodeGameIdProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
            , $profile_id
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardItemListCodeGameIdProfileId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardItemListCodeGameIdProfileId";

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
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardItemListCodeGameIdProfileId(
                $code
                , $game_id
                , $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
        ) {
            return $this->act->GetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
                $code
                , $game_id
                , $profile_id
                , $timestamp
            );
        }
        
    public function GetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
        foreach($this->act->GetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
        return $this->CachedGetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
            , $profile_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp";

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
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$timestamp");
        $sb += "_";
        $sb += $timestamp;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
                $code
                , $game_id
                , $profile_id
                , $timestamp
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardItemListProfileIdGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetGameStatisticLeaderboardItemListProfileIdGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetGameStatisticLeaderboardItemProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameStatisticLeaderboardItemListProfileIdGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardItemListProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameStatisticLeaderboardItemListProfileIdGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardItemListProfileIdGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardItemListProfileIdGameId";

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

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardItemListProfileIdGameId(
                $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameStatisticLeaderboardItemProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp";

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

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
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
    public function CountGameStatisticLeaderboardRollupUuid(
        $uuid
    ) {      
        return $this->act->CountGameStatisticLeaderboardRollupUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardRollupGameId(
        $game_id
    ) {      
        return $this->act->CountGameStatisticLeaderboardRollupGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardRollupCode(
        $code
    ) {      
        return $this->act->CountGameStatisticLeaderboardRollupCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardRollupCodeGameId(
        $code
        , $game_id
    ) {      
        return $this->act->CountGameStatisticLeaderboardRollupCodeGameId(
        $code
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardRollupCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {      
        return $this->act->CountGameStatisticLeaderboardRollupCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {      
        return $this->act->CountGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticLeaderboardRollupProfileIdGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameStatisticLeaderboardRollupProfileIdGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameStatisticLeaderboardRollupListFilter($filter_obj) {
        return $this->act->BrowseGameStatisticLeaderboardRollupListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardRollupUuid($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardRollupUuid($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardRollupUuidFull($obj) {
        return $this->act->SetGameStatisticLeaderboardRollupUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestamp($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestamp($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestampFull($obj) {
        return $this->act->SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardRollupCode($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardRollupCode($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardRollupCodeFull($obj) {
        return $this->act->SetGameStatisticLeaderboardRollupCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardRollupCodeGameId($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardRollupCodeGameId($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardRollupCodeGameIdFull($obj) {
        return $this->act->SetGameStatisticLeaderboardRollupCodeGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardRollupCodeGameIdProfileId($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardRollupCodeGameIdProfileId($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardRollupCodeGameIdProfileIdFull($obj) {
        return $this->act->SetGameStatisticLeaderboardRollupCodeGameIdProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp($set_type, $obj) {
        return $this->act->SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp($set_type, $obj);
    }
               
    public function SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestampFull($obj) {
        return $this->act->SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardRollupUuid(
        $uuid
    ) {         
        return $this->act->DelGameStatisticLeaderboardRollupUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardRollupCode(
        $code
    ) {         
        return $this->act->DelGameStatisticLeaderboardRollupCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardRollupCodeGameId(
        $code
        , $game_id
    ) {         
        return $this->act->DelGameStatisticLeaderboardRollupCodeGameId(
        $code
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardRollupCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {         
        return $this->act->DelGameStatisticLeaderboardRollupCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {         
        return $this->act->DelGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticLeaderboardRollupProfileIdGameId(
        $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameStatisticLeaderboardRollupProfileIdGameId(
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
    public function GetGameStatisticLeaderboardRollupListUuid(
        $uuid
        ) {
            return $this->act->GetGameStatisticLeaderboardRollupListUuid(
                $uuid
            );
        }
        
    public function GetGameStatisticLeaderboardRollupUuid(
        $uuid
    ) {
        foreach($this->act->GetGameStatisticLeaderboardRollupListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardRollupListUuid(
        $uuid
    ) {
        return $this->CachedGetGameStatisticLeaderboardRollupListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardRollupListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardRollupListUuid";

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
            $objs = $this->GetGameStatisticLeaderboardRollupListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardRollupListGameId(
        $game_id
        ) {
            return $this->act->GetGameStatisticLeaderboardRollupListGameId(
                $game_id
            );
        }
        
    public function GetGameStatisticLeaderboardRollupGameId(
        $game_id
    ) {
        foreach($this->act->GetGameStatisticLeaderboardRollupListGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardRollupListGameId(
        $game_id
    ) {
        return $this->CachedGetGameStatisticLeaderboardRollupListGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardRollupListGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardRollupListGameId";

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
            $objs = $this->GetGameStatisticLeaderboardRollupListGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardRollupListCode(
        $code
        ) {
            return $this->act->GetGameStatisticLeaderboardRollupListCode(
                $code
            );
        }
        
    public function GetGameStatisticLeaderboardRollupCode(
        $code
    ) {
        foreach($this->act->GetGameStatisticLeaderboardRollupListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardRollupListCode(
        $code
    ) {
        return $this->CachedGetGameStatisticLeaderboardRollupListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardRollupListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardRollupListCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardRollupListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardRollupListCodeGameId(
        $code
        , $game_id
        ) {
            return $this->act->GetGameStatisticLeaderboardRollupListCodeGameId(
                $code
                , $game_id
            );
        }
        
    public function GetGameStatisticLeaderboardRollupCodeGameId(
        $code
        , $game_id
    ) {
        foreach($this->act->GetGameStatisticLeaderboardRollupListCodeGameId(
        $code
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardRollupListCodeGameId(
        $code
        , $game_id
    ) {
        return $this->CachedGetGameStatisticLeaderboardRollupListCodeGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardRollupListCodeGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardRollupListCodeGameId";

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

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardRollupListCodeGameId(
                $code
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
        ) {
            return $this->act->GetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
                $code
                , $game_id
                , $profile_id
            );
        }
        
    public function GetGameStatisticLeaderboardRollupCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
        foreach($this->act->GetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
        return $this->CachedGetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
            , $profile_id
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardRollupListCodeGameIdProfileId";

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
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
                $code
                , $game_id
                , $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
        ) {
            return $this->act->GetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
                $code
                , $game_id
                , $profile_id
                , $timestamp
            );
        }
        
    public function GetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
        foreach($this->act->GetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
        return $this->CachedGetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
            , $profile_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp";

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
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$timestamp");
        $sb += "_";
        $sb += $timestamp;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
                $code
                , $game_id
                , $profile_id
                , $timestamp
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardRollupListProfileIdGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetGameStatisticLeaderboardRollupListProfileIdGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetGameStatisticLeaderboardRollupProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameStatisticLeaderboardRollupListProfileIdGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardRollupListProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameStatisticLeaderboardRollupListProfileIdGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardRollupListProfileIdGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardRollupListProfileIdGameId";

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
            $objs = $this->GetGameStatisticLeaderboardRollupListProfileIdGameId(
                $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameStatisticLeaderboardRollupProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp";

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
            $objs = $this->GetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
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
    public function CountGameLiveQueueUuid(
        $uuid
    ) {      
        return $this->act->CountGameLiveQueueUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLiveQueueProfileIdGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameLiveQueueProfileIdGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameLiveQueueListFilter($filter_obj) {
        return $this->act->BrowseGameLiveQueueListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLiveQueueUuid($set_type, $obj) {
        return $this->act->SetGameLiveQueueUuid($set_type, $obj);
    }
               
    public function SetGameLiveQueueUuidFull($obj) {
        return $this->act->SetGameLiveQueueUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLiveQueueProfileIdGameId($set_type, $obj) {
        return $this->act->SetGameLiveQueueProfileIdGameId($set_type, $obj);
    }
               
    public function SetGameLiveQueueProfileIdGameIdFull($obj) {
        return $this->act->SetGameLiveQueueProfileIdGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameLiveQueueUuid(
        $uuid
    ) {         
        return $this->act->DelGameLiveQueueUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameLiveQueueProfileIdGameId(
        $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameLiveQueueProfileIdGameId(
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
    public function GetGameLiveQueueListUuid(
        $uuid
        ) {
            return $this->act->GetGameLiveQueueListUuid(
                $uuid
            );
        }
        
    public function GetGameLiveQueueUuid(
        $uuid
    ) {
        foreach($this->act->GetGameLiveQueueListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLiveQueueListUuid(
        $uuid
    ) {
        return $this->CachedGetGameLiveQueueListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameLiveQueueListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameLiveQueueListUuid";

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
            $objs = $this->GetGameLiveQueueListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLiveQueueListGameId(
        $game_id
        ) {
            return $this->act->GetGameLiveQueueListGameId(
                $game_id
            );
        }
        
    public function GetGameLiveQueueGameId(
        $game_id
    ) {
        foreach($this->act->GetGameLiveQueueListGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLiveQueueListGameId(
        $game_id
    ) {
        return $this->CachedGetGameLiveQueueListGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameLiveQueueListGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLiveQueueListGameId";

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
            $objs = $this->GetGameLiveQueueListGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLiveQueueListProfileIdGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetGameLiveQueueListProfileIdGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetGameLiveQueueProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameLiveQueueListProfileIdGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLiveQueueListProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameLiveQueueListProfileIdGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameLiveQueueListProfileIdGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLiveQueueListProfileIdGameId";

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
            $objs = $this->GetGameLiveQueueListProfileIdGameId(
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
    public function CountGameLiveRecentQueueUuid(
        $uuid
    ) {      
        return $this->act->CountGameLiveRecentQueueUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLiveRecentQueueProfileIdGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameLiveRecentQueueProfileIdGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameLiveRecentQueueListFilter($filter_obj) {
        return $this->act->BrowseGameLiveRecentQueueListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLiveRecentQueueUuid($set_type, $obj) {
        return $this->act->SetGameLiveRecentQueueUuid($set_type, $obj);
    }
               
    public function SetGameLiveRecentQueueUuidFull($obj) {
        return $this->act->SetGameLiveRecentQueueUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLiveRecentQueueProfileIdGameId($set_type, $obj) {
        return $this->act->SetGameLiveRecentQueueProfileIdGameId($set_type, $obj);
    }
               
    public function SetGameLiveRecentQueueProfileIdGameIdFull($obj) {
        return $this->act->SetGameLiveRecentQueueProfileIdGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameLiveRecentQueueUuid(
        $uuid
    ) {         
        return $this->act->DelGameLiveRecentQueueUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameLiveRecentQueueProfileIdGameId(
        $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameLiveRecentQueueProfileIdGameId(
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
    public function GetGameLiveRecentQueueListUuid(
        $uuid
        ) {
            return $this->act->GetGameLiveRecentQueueListUuid(
                $uuid
            );
        }
        
    public function GetGameLiveRecentQueueUuid(
        $uuid
    ) {
        foreach($this->act->GetGameLiveRecentQueueListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLiveRecentQueueListUuid(
        $uuid
    ) {
        return $this->CachedGetGameLiveRecentQueueListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameLiveRecentQueueListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameLiveRecentQueueListUuid";

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
            $objs = $this->GetGameLiveRecentQueueListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLiveRecentQueueListGameId(
        $game_id
        ) {
            return $this->act->GetGameLiveRecentQueueListGameId(
                $game_id
            );
        }
        
    public function GetGameLiveRecentQueueGameId(
        $game_id
    ) {
        foreach($this->act->GetGameLiveRecentQueueListGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLiveRecentQueueListGameId(
        $game_id
    ) {
        return $this->CachedGetGameLiveRecentQueueListGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameLiveRecentQueueListGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLiveRecentQueueListGameId";

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
            $objs = $this->GetGameLiveRecentQueueListGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLiveRecentQueueListProfileIdGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetGameLiveRecentQueueListProfileIdGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetGameLiveRecentQueueProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameLiveRecentQueueListProfileIdGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLiveRecentQueueListProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameLiveRecentQueueListProfileIdGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameLiveRecentQueueListProfileIdGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLiveRecentQueueListProfileIdGameId";

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
            $objs = $this->GetGameLiveRecentQueueListProfileIdGameId(
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
    public function CountGameProfileStatisticUuid(
        $uuid
    ) {      
        return $this->act->CountGameProfileStatisticUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticCode(
        $code
    ) {      
        return $this->act->CountGameProfileStatisticCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticGameId(
        $game_id
    ) {      
        return $this->act->CountGameProfileStatisticGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticCodeGameId(
        $code
        , $game_id
    ) {      
        return $this->act->CountGameProfileStatisticCodeGameId(
        $code
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticProfileIdGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameProfileStatisticProfileIdGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameProfileStatisticCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {      
        return $this->act->CountGameProfileStatisticCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameProfileStatisticListFilter($filter_obj) {
        return $this->act->BrowseGameProfileStatisticListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticUuid($set_type, $obj) {
        return $this->act->SetGameProfileStatisticUuid($set_type, $obj);
    }
               
    public function SetGameProfileStatisticUuidFull($obj) {
        return $this->act->SetGameProfileStatisticUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticUuidProfileIdGameIdTimestamp($set_type, $obj) {
        return $this->act->SetGameProfileStatisticUuidProfileIdGameIdTimestamp($set_type, $obj);
    }
               
    public function SetGameProfileStatisticUuidProfileIdGameIdTimestampFull($obj) {
        return $this->act->SetGameProfileStatisticUuidProfileIdGameIdTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticProfileIdCode($set_type, $obj) {
        return $this->act->SetGameProfileStatisticProfileIdCode($set_type, $obj);
    }
               
    public function SetGameProfileStatisticProfileIdCodeFull($obj) {
        return $this->act->SetGameProfileStatisticProfileIdCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticProfileIdCodeTimestamp($set_type, $obj) {
        return $this->act->SetGameProfileStatisticProfileIdCodeTimestamp($set_type, $obj);
    }
               
    public function SetGameProfileStatisticProfileIdCodeTimestampFull($obj) {
        return $this->act->SetGameProfileStatisticProfileIdCodeTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticCodeProfileIdGameIdTimestamp($set_type, $obj) {
        return $this->act->SetGameProfileStatisticCodeProfileIdGameIdTimestamp($set_type, $obj);
    }
               
    public function SetGameProfileStatisticCodeProfileIdGameIdTimestampFull($obj) {
        return $this->act->SetGameProfileStatisticCodeProfileIdGameIdTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticCodeProfileIdGameId($set_type, $obj) {
        return $this->act->SetGameProfileStatisticCodeProfileIdGameId($set_type, $obj);
    }
               
    public function SetGameProfileStatisticCodeProfileIdGameIdFull($obj) {
        return $this->act->SetGameProfileStatisticCodeProfileIdGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileStatisticUuid(
        $uuid
    ) {         
        return $this->act->DelGameProfileStatisticUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileStatisticCodeGameId(
        $code
        , $game_id
    ) {         
        return $this->act->DelGameProfileStatisticCodeGameId(
        $code
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileStatisticProfileIdGameId(
        $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameProfileStatisticProfileIdGameId(
        $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileStatisticCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameProfileStatisticCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticListUuid(
        $uuid
        ) {
            return $this->act->GetGameProfileStatisticListUuid(
                $uuid
            );
        }
        
    public function GetGameProfileStatisticUuid(
        $uuid
    ) {
        foreach($this->act->GetGameProfileStatisticListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticListUuid(
        $uuid
    ) {
        return $this->CachedGetGameProfileStatisticListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameProfileStatisticListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticListUuid";

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
            $objs = $this->GetGameProfileStatisticListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticListCode(
        $code
        ) {
            return $this->act->GetGameProfileStatisticListCode(
                $code
            );
        }
        
    public function GetGameProfileStatisticCode(
        $code
    ) {
        foreach($this->act->GetGameProfileStatisticListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticListCode(
        $code
    ) {
        return $this->CachedGetGameProfileStatisticListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameProfileStatisticListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticListCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileStatistic>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileStatisticListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticListGameId(
        $game_id
        ) {
            return $this->act->GetGameProfileStatisticListGameId(
                $game_id
            );
        }
        
    public function GetGameProfileStatisticGameId(
        $game_id
    ) {
        foreach($this->act->GetGameProfileStatisticListGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticListGameId(
        $game_id
    ) {
        return $this->CachedGetGameProfileStatisticListGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileStatisticListGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticListGameId";

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
            $objs = $this->GetGameProfileStatisticListGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticListCodeGameId(
        $code
        , $game_id
        ) {
            return $this->act->GetGameProfileStatisticListCodeGameId(
                $code
                , $game_id
            );
        }
        
    public function GetGameProfileStatisticCodeGameId(
        $code
        , $game_id
    ) {
        foreach($this->act->GetGameProfileStatisticListCodeGameId(
        $code
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticListCodeGameId(
        $code
        , $game_id
    ) {
        return $this->CachedGetGameProfileStatisticListCodeGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileStatisticListCodeGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticListCodeGameId";

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

        //$objs = CacheUtil.Get<List<GameProfileStatistic>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileStatisticListCodeGameId(
                $code
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticListProfileIdGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetGameProfileStatisticListProfileIdGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetGameProfileStatisticProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameProfileStatisticListProfileIdGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticListProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameProfileStatisticListProfileIdGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileStatisticListProfileIdGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticListProfileIdGameId";

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
            $objs = $this->GetGameProfileStatisticListProfileIdGameId(
                $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameProfileStatisticListProfileIdGameIdTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameProfileStatisticProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameProfileStatisticListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameProfileStatisticListProfileIdGameIdTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameProfileStatisticListProfileIdGameIdTimestamp(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticListProfileIdGameIdTimestamp";

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
            $objs = $this->GetGameProfileStatisticListProfileIdGameIdTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticListCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
        ) {
            return $this->act->GetGameProfileStatisticListCodeProfileIdGameId(
                $code
                , $profile_id
                , $game_id
            );
        }
        
    public function GetGameProfileStatisticCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameProfileStatisticListCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticListCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameProfileStatisticListCodeProfileIdGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileStatisticListCodeProfileIdGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticListCodeProfileIdGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;
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
            $objs = $this->GetGameProfileStatisticListCodeProfileIdGameId(
                $code
                , $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
                $code
                , $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameProfileStatisticCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
        $overrideCache
        , $cacheHours
        , $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticListCodeProfileIdGameIdTimestamp";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;
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
            $objs = $this->GetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
                $code
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
    public function CountGameStatisticMetaUuid(
        $uuid
    ) {      
        return $this->act->CountGameStatisticMetaUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticMetaCode(
        $code
    ) {      
        return $this->act->CountGameStatisticMetaCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticMetaCodeGameId(
        $code
        , $game_id
    ) {      
        return $this->act->CountGameStatisticMetaCodeGameId(
        $code
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticMetaName(
        $name
    ) {      
        return $this->act->CountGameStatisticMetaName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameStatisticMetaGameId(
        $game_id
    ) {      
        return $this->act->CountGameStatisticMetaGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameStatisticMetaListFilter($filter_obj) {
        return $this->act->BrowseGameStatisticMetaListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticMetaUuid($set_type, $obj) {
        return $this->act->SetGameStatisticMetaUuid($set_type, $obj);
    }
               
    public function SetGameStatisticMetaUuidFull($obj) {
        return $this->act->SetGameStatisticMetaUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameStatisticMetaCodeGameId($set_type, $obj) {
        return $this->act->SetGameStatisticMetaCodeGameId($set_type, $obj);
    }
               
    public function SetGameStatisticMetaCodeGameIdFull($obj) {
        return $this->act->SetGameStatisticMetaCodeGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticMetaUuid(
        $uuid
    ) {         
        return $this->act->DelGameStatisticMetaUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameStatisticMetaCodeGameId(
        $code
        , $game_id
    ) {         
        return $this->act->DelGameStatisticMetaCodeGameId(
        $code
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameStatisticMetaListUuid(
        $uuid
        ) {
            return $this->act->GetGameStatisticMetaListUuid(
                $uuid
            );
        }
        
    public function GetGameStatisticMetaUuid(
        $uuid
    ) {
        foreach($this->act->GetGameStatisticMetaListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticMetaListUuid(
        $uuid
    ) {
        return $this->CachedGetGameStatisticMetaListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameStatisticMetaListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticMetaListUuid";

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
            $objs = $this->GetGameStatisticMetaListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticMetaListCode(
        $code
        ) {
            return $this->act->GetGameStatisticMetaListCode(
                $code
            );
        }
        
    public function GetGameStatisticMetaCode(
        $code
    ) {
        foreach($this->act->GetGameStatisticMetaListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticMetaListCode(
        $code
    ) {
        return $this->CachedGetGameStatisticMetaListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameStatisticMetaListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticMetaListCode";

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
            $objs = $this->GetGameStatisticMetaListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticMetaListName(
        $name
        ) {
            return $this->act->GetGameStatisticMetaListName(
                $name
            );
        }
        
    public function GetGameStatisticMetaName(
        $name
    ) {
        foreach($this->act->GetGameStatisticMetaListName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticMetaListName(
        $name
    ) {
        return $this->CachedGetGameStatisticMetaListName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetGameStatisticMetaListName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticMetaListName";

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
            $objs = $this->GetGameStatisticMetaListName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticMetaListGameId(
        $game_id
        ) {
            return $this->act->GetGameStatisticMetaListGameId(
                $game_id
            );
        }
        
    public function GetGameStatisticMetaGameId(
        $game_id
    ) {
        foreach($this->act->GetGameStatisticMetaListGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticMetaListGameId(
        $game_id
    ) {
        return $this->CachedGetGameStatisticMetaListGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticMetaListGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticMetaListGameId";

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
            $objs = $this->GetGameStatisticMetaListGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameStatisticMetaListCodeGameId(
        $code
        , $game_id
        ) {
            return $this->act->GetGameStatisticMetaListCodeGameId(
                $code
                , $game_id
            );
        }
        
    public function GetGameStatisticMetaCodeGameId(
        $code
        , $game_id
    ) {
        foreach($this->act->GetGameStatisticMetaListCodeGameId(
        $code
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameStatisticMetaListCodeGameId(
        $code
        , $game_id
    ) {
        return $this->CachedGetGameStatisticMetaListCodeGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
        );
    }
    */
        
    public function CachedGetGameStatisticMetaListCodeGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameStatisticMetaListCodeGameId";

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
            $objs = $this->GetGameStatisticMetaListCodeGameId(
                $code
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticItem(
    ) {      
        return $this->act->CountGameProfileStatisticItem(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticItemUuid(
        $uuid
    ) {      
        return $this->act->CountGameProfileStatisticItemUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticItemCode(
        $code
    ) {      
        return $this->act->CountGameProfileStatisticItemCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticItemGameId(
        $game_id
    ) {      
        return $this->act->CountGameProfileStatisticItemGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticItemCodeGameId(
        $code
        , $game_id
    ) {      
        return $this->act->CountGameProfileStatisticItemCodeGameId(
        $code
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticItemProfileIdGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameProfileStatisticItemProfileIdGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticItemCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameProfileStatisticItemCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticItemCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {      
        return $this->act->CountGameProfileStatisticItemCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameProfileStatisticItemListFilter($filter_obj) {
        return $this->act->BrowseGameProfileStatisticItemListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticItemUuid($set_type, $obj) {
        return $this->act->SetGameProfileStatisticItemUuid($set_type, $obj);
    }
               
    public function SetGameProfileStatisticItemUuidFull($obj) {
        return $this->act->SetGameProfileStatisticItemUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticItemUuidProfileIdGameIdTimestamp($set_type, $obj) {
        return $this->act->SetGameProfileStatisticItemUuidProfileIdGameIdTimestamp($set_type, $obj);
    }
               
    public function SetGameProfileStatisticItemUuidProfileIdGameIdTimestampFull($obj) {
        return $this->act->SetGameProfileStatisticItemUuidProfileIdGameIdTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticItemProfileIdCode($set_type, $obj) {
        return $this->act->SetGameProfileStatisticItemProfileIdCode($set_type, $obj);
    }
               
    public function SetGameProfileStatisticItemProfileIdCodeFull($obj) {
        return $this->act->SetGameProfileStatisticItemProfileIdCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticItemProfileIdCodeTimestamp($set_type, $obj) {
        return $this->act->SetGameProfileStatisticItemProfileIdCodeTimestamp($set_type, $obj);
    }
               
    public function SetGameProfileStatisticItemProfileIdCodeTimestampFull($obj) {
        return $this->act->SetGameProfileStatisticItemProfileIdCodeTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticItemCodeProfileIdGameIdTimestamp($set_type, $obj) {
        return $this->act->SetGameProfileStatisticItemCodeProfileIdGameIdTimestamp($set_type, $obj);
    }
               
    public function SetGameProfileStatisticItemCodeProfileIdGameIdTimestampFull($obj) {
        return $this->act->SetGameProfileStatisticItemCodeProfileIdGameIdTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticItemCodeProfileIdGameId($set_type, $obj) {
        return $this->act->SetGameProfileStatisticItemCodeProfileIdGameId($set_type, $obj);
    }
               
    public function SetGameProfileStatisticItemCodeProfileIdGameIdFull($obj) {
        return $this->act->SetGameProfileStatisticItemCodeProfileIdGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileStatisticItemUuid(
        $uuid
    ) {         
        return $this->act->DelGameProfileStatisticItemUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileStatisticItemCodeGameId(
        $code
        , $game_id
    ) {         
        return $this->act->DelGameProfileStatisticItemCodeGameId(
        $code
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileStatisticItemProfileIdGameId(
        $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameProfileStatisticItemProfileIdGameId(
        $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileStatisticItemCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameProfileStatisticItemCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticItemListUuid(
        $uuid
        ) {
            return $this->act->GetGameProfileStatisticItemListUuid(
                $uuid
            );
        }
        
    public function GetGameProfileStatisticItemUuid(
        $uuid
    ) {
        foreach($this->act->GetGameProfileStatisticItemListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticItemListUuid(
        $uuid
    ) {
        return $this->CachedGetGameProfileStatisticItemListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameProfileStatisticItemListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticItemListUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileStatisticItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileStatisticItemListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticItemListCode(
        $code
        ) {
            return $this->act->GetGameProfileStatisticItemListCode(
                $code
            );
        }
        
    public function GetGameProfileStatisticItemCode(
        $code
    ) {
        foreach($this->act->GetGameProfileStatisticItemListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticItemListCode(
        $code
    ) {
        return $this->CachedGetGameProfileStatisticItemListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameProfileStatisticItemListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticItemListCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileStatisticItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileStatisticItemListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticItemListGameId(
        $game_id
        ) {
            return $this->act->GetGameProfileStatisticItemListGameId(
                $game_id
            );
        }
        
    public function GetGameProfileStatisticItemGameId(
        $game_id
    ) {
        foreach($this->act->GetGameProfileStatisticItemListGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticItemListGameId(
        $game_id
    ) {
        return $this->CachedGetGameProfileStatisticItemListGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileStatisticItemListGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticItemListGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileStatisticItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileStatisticItemListGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticItemListCodeGameId(
        $code
        , $game_id
        ) {
            return $this->act->GetGameProfileStatisticItemListCodeGameId(
                $code
                , $game_id
            );
        }
        
    public function GetGameProfileStatisticItemCodeGameId(
        $code
        , $game_id
    ) {
        foreach($this->act->GetGameProfileStatisticItemListCodeGameId(
        $code
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticItemListCodeGameId(
        $code
        , $game_id
    ) {
        return $this->CachedGetGameProfileStatisticItemListCodeGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileStatisticItemListCodeGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticItemListCodeGameId";

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

        //$objs = CacheUtil.Get<List<GameProfileStatisticItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileStatisticItemListCodeGameId(
                $code
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticItemListProfileIdGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetGameProfileStatisticItemListProfileIdGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetGameProfileStatisticItemProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameProfileStatisticItemListProfileIdGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticItemListProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameProfileStatisticItemListProfileIdGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileStatisticItemListProfileIdGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticItemListProfileIdGameId";

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

        //$objs = CacheUtil.Get<List<GameProfileStatisticItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileStatisticItemListProfileIdGameId(
                $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticItemListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameProfileStatisticItemListProfileIdGameIdTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameProfileStatisticItemProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameProfileStatisticItemListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticItemListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameProfileStatisticItemListProfileIdGameIdTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameProfileStatisticItemListProfileIdGameIdTimestamp(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticItemListProfileIdGameIdTimestamp";

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

        //$objs = CacheUtil.Get<List<GameProfileStatisticItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileStatisticItemListProfileIdGameIdTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticItemListCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
        ) {
            return $this->act->GetGameProfileStatisticItemListCodeProfileIdGameId(
                $code
                , $profile_id
                , $game_id
            );
        }
        
    public function GetGameProfileStatisticItemCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameProfileStatisticItemListCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticItemListCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameProfileStatisticItemListCodeProfileIdGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileStatisticItemListCodeProfileIdGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticItemListCodeProfileIdGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileStatisticItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileStatisticItemListCodeProfileIdGameId(
                $code
                , $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp(
                $code
                , $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameProfileStatisticItemCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp(
        $overrideCache
        , $cacheHours
        , $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;
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

        //$objs = CacheUtil.Get<List<GameProfileStatisticItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp(
                $code
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
    public function CountGameKeyMetaUuid(
        $uuid
    ) {      
        return $this->act->CountGameKeyMetaUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameKeyMetaCode(
        $code
    ) {      
        return $this->act->CountGameKeyMetaCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameKeyMetaCodeGameId(
        $code
        , $game_id
    ) {      
        return $this->act->CountGameKeyMetaCodeGameId(
        $code
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameKeyMetaName(
        $name
    ) {      
        return $this->act->CountGameKeyMetaName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameKeyMetaKey(
        $key
    ) {      
        return $this->act->CountGameKeyMetaKey(
        $key
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameKeyMetaGameId(
        $game_id
    ) {      
        return $this->act->CountGameKeyMetaGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameKeyMetaKeyGameId(
        $key
        , $game_id
    ) {      
        return $this->act->CountGameKeyMetaKeyGameId(
        $key
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameKeyMetaListFilter($filter_obj) {
        return $this->act->BrowseGameKeyMetaListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameKeyMetaUuid($set_type, $obj) {
        return $this->act->SetGameKeyMetaUuid($set_type, $obj);
    }
               
    public function SetGameKeyMetaUuidFull($obj) {
        return $this->act->SetGameKeyMetaUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameKeyMetaCodeGameId($set_type, $obj) {
        return $this->act->SetGameKeyMetaCodeGameId($set_type, $obj);
    }
               
    public function SetGameKeyMetaCodeGameIdFull($obj) {
        return $this->act->SetGameKeyMetaCodeGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameKeyMetaKeyGameId($set_type, $obj) {
        return $this->act->SetGameKeyMetaKeyGameId($set_type, $obj);
    }
               
    public function SetGameKeyMetaKeyGameIdFull($obj) {
        return $this->act->SetGameKeyMetaKeyGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameKeyMetaKeyGameIdLevel($set_type, $obj) {
        return $this->act->SetGameKeyMetaKeyGameIdLevel($set_type, $obj);
    }
               
    public function SetGameKeyMetaKeyGameIdLevelFull($obj) {
        return $this->act->SetGameKeyMetaKeyGameIdLevel('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameKeyMetaUuid(
        $uuid
    ) {         
        return $this->act->DelGameKeyMetaUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameKeyMetaCodeGameId(
        $code
        , $game_id
    ) {         
        return $this->act->DelGameKeyMetaCodeGameId(
        $code
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameKeyMetaKeyGameId(
        $key
        , $game_id
    ) {         
        return $this->act->DelGameKeyMetaKeyGameId(
        $key
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameKeyMetaListUuid(
        $uuid
        ) {
            return $this->act->GetGameKeyMetaListUuid(
                $uuid
            );
        }
        
    public function GetGameKeyMetaUuid(
        $uuid
    ) {
        foreach($this->act->GetGameKeyMetaListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameKeyMetaListUuid(
        $uuid
    ) {
        return $this->CachedGetGameKeyMetaListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameKeyMetaListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameKeyMetaListUuid";

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
            $objs = $this->GetGameKeyMetaListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameKeyMetaListCode(
        $code
        ) {
            return $this->act->GetGameKeyMetaListCode(
                $code
            );
        }
        
    public function GetGameKeyMetaCode(
        $code
    ) {
        foreach($this->act->GetGameKeyMetaListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameKeyMetaListCode(
        $code
    ) {
        return $this->CachedGetGameKeyMetaListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameKeyMetaListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameKeyMetaListCode";

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
            $objs = $this->GetGameKeyMetaListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameKeyMetaListCodeGameId(
        $code
        , $game_id
        ) {
            return $this->act->GetGameKeyMetaListCodeGameId(
                $code
                , $game_id
            );
        }
        
    public function GetGameKeyMetaCodeGameId(
        $code
        , $game_id
    ) {
        foreach($this->act->GetGameKeyMetaListCodeGameId(
        $code
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameKeyMetaListCodeGameId(
        $code
        , $game_id
    ) {
        return $this->CachedGetGameKeyMetaListCodeGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
        );
    }
    */
        
    public function CachedGetGameKeyMetaListCodeGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameKeyMetaListCodeGameId";

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
            $objs = $this->GetGameKeyMetaListCodeGameId(
                $code
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameKeyMetaListName(
        $name
        ) {
            return $this->act->GetGameKeyMetaListName(
                $name
            );
        }
        
    public function GetGameKeyMetaName(
        $name
    ) {
        foreach($this->act->GetGameKeyMetaListName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameKeyMetaListName(
        $name
    ) {
        return $this->CachedGetGameKeyMetaListName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetGameKeyMetaListName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetGameKeyMetaListName";

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
            $objs = $this->GetGameKeyMetaListName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameKeyMetaListKey(
        $key
        ) {
            return $this->act->GetGameKeyMetaListKey(
                $key
            );
        }
        
    public function GetGameKeyMetaKey(
        $key
    ) {
        foreach($this->act->GetGameKeyMetaListKey(
        $key
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameKeyMetaListKey(
        $key
    ) {
        return $this->CachedGetGameKeyMetaListKey(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
        );
    }
    */
        
    public function CachedGetGameKeyMetaListKey(
        $overrideCache
        , $cacheHours
        , $key
    ) {

        $objs = array();

        $method_name = "CachedGetGameKeyMetaListKey";

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
            $objs = $this->GetGameKeyMetaListKey(
                $key
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameKeyMetaListGameId(
        $game_id
        ) {
            return $this->act->GetGameKeyMetaListGameId(
                $game_id
            );
        }
        
    public function GetGameKeyMetaGameId(
        $game_id
    ) {
        foreach($this->act->GetGameKeyMetaListGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameKeyMetaListGameId(
        $game_id
    ) {
        return $this->CachedGetGameKeyMetaListGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameKeyMetaListGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameKeyMetaListGameId";

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
            $objs = $this->GetGameKeyMetaListGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameKeyMetaListKeyGameId(
        $key
        , $game_id
        ) {
            return $this->act->GetGameKeyMetaListKeyGameId(
                $key
                , $game_id
            );
        }
        
    public function GetGameKeyMetaKeyGameId(
        $key
        , $game_id
    ) {
        foreach($this->act->GetGameKeyMetaListKeyGameId(
        $key
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameKeyMetaListKeyGameId(
        $key
        , $game_id
    ) {
        return $this->CachedGetGameKeyMetaListKeyGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $key
            , $game_id
        );
    }
    */
        
    public function CachedGetGameKeyMetaListKeyGameId(
        $overrideCache
        , $cacheHours
        , $key
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameKeyMetaListKeyGameId";

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
            $objs = $this->GetGameKeyMetaListKeyGameId(
                $key
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameKeyMetaListCodeLevel(
        $code
        , $level
        ) {
            return $this->act->GetGameKeyMetaListCodeLevel(
                $code
                , $level
            );
        }
        
    public function GetGameKeyMetaCodeLevel(
        $code
        , $level
    ) {
        foreach($this->act->GetGameKeyMetaListCodeLevel(
        $code
        , $level
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameKeyMetaListCodeLevel(
        $code
        , $level
    ) {
        return $this->CachedGetGameKeyMetaListCodeLevel(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $level
        );
    }
    */
        
    public function CachedGetGameKeyMetaListCodeLevel(
        $overrideCache
        , $cacheHours
        , $code
        , $level
    ) {

        $objs = array();

        $method_name = "CachedGetGameKeyMetaListCodeLevel";

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
            $objs = $this->GetGameKeyMetaListCodeLevel(
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
    public function CountGameLevelUuid(
        $uuid
    ) {      
        return $this->act->CountGameLevelUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLevelCode(
        $code
    ) {      
        return $this->act->CountGameLevelCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLevelCodeGameId(
        $code
        , $game_id
    ) {      
        return $this->act->CountGameLevelCodeGameId(
        $code
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLevelName(
        $name
    ) {      
        return $this->act->CountGameLevelName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLevelGameId(
        $game_id
    ) {      
        return $this->act->CountGameLevelGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameLevelListFilter($filter_obj) {
        return $this->act->BrowseGameLevelListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLevelUuid($set_type, $obj) {
        return $this->act->SetGameLevelUuid($set_type, $obj);
    }
               
    public function SetGameLevelUuidFull($obj) {
        return $this->act->SetGameLevelUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLevelCodeGameId($set_type, $obj) {
        return $this->act->SetGameLevelCodeGameId($set_type, $obj);
    }
               
    public function SetGameLevelCodeGameIdFull($obj) {
        return $this->act->SetGameLevelCodeGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameLevelUuid(
        $uuid
    ) {         
        return $this->act->DelGameLevelUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameLevelCodeGameId(
        $code
        , $game_id
    ) {         
        return $this->act->DelGameLevelCodeGameId(
        $code
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameLevelListUuid(
        $uuid
        ) {
            return $this->act->GetGameLevelListUuid(
                $uuid
            );
        }
        
    public function GetGameLevelUuid(
        $uuid
    ) {
        foreach($this->act->GetGameLevelListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLevelListUuid(
        $uuid
    ) {
        return $this->CachedGetGameLevelListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameLevelListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameLevelListUuid";

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
            $objs = $this->GetGameLevelListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLevelListCode(
        $code
        ) {
            return $this->act->GetGameLevelListCode(
                $code
            );
        }
        
    public function GetGameLevelCode(
        $code
    ) {
        foreach($this->act->GetGameLevelListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLevelListCode(
        $code
    ) {
        return $this->CachedGetGameLevelListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameLevelListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameLevelListCode";

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
            $objs = $this->GetGameLevelListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLevelListCodeGameId(
        $code
        , $game_id
        ) {
            return $this->act->GetGameLevelListCodeGameId(
                $code
                , $game_id
            );
        }
        
    public function GetGameLevelCodeGameId(
        $code
        , $game_id
    ) {
        foreach($this->act->GetGameLevelListCodeGameId(
        $code
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLevelListCodeGameId(
        $code
        , $game_id
    ) {
        return $this->CachedGetGameLevelListCodeGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
        );
    }
    */
        
    public function CachedGetGameLevelListCodeGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLevelListCodeGameId";

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
            $objs = $this->GetGameLevelListCodeGameId(
                $code
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLevelListName(
        $name
        ) {
            return $this->act->GetGameLevelListName(
                $name
            );
        }
        
    public function GetGameLevelName(
        $name
    ) {
        foreach($this->act->GetGameLevelListName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLevelListName(
        $name
    ) {
        return $this->CachedGetGameLevelListName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetGameLevelListName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetGameLevelListName";

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
            $objs = $this->GetGameLevelListName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLevelListGameId(
        $game_id
        ) {
            return $this->act->GetGameLevelListGameId(
                $game_id
            );
        }
        
    public function GetGameLevelGameId(
        $game_id
    ) {
        foreach($this->act->GetGameLevelListGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLevelListGameId(
        $game_id
    ) {
        return $this->CachedGetGameLevelListGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameLevelListGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLevelListGameId";

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
            $objs = $this->GetGameLevelListGameId(
                $game_id
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
    public function CountGameProfileAchievementUuid(
        $uuid
    ) {      
        return $this->act->CountGameProfileAchievementUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAchievementProfileIdCode(
        $profile_id
        , $code
    ) {      
        return $this->act->CountGameProfileAchievementProfileIdCode(
        $profile_id
        , $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAchievementUsername(
        $username
    ) {      
        return $this->act->CountGameProfileAchievementUsername(
        $username
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAchievementCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameProfileAchievementCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAchievementCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {      
        return $this->act->CountGameProfileAchievementCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameProfileAchievementListFilter($filter_obj) {
        return $this->act->BrowseGameProfileAchievementListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAchievementUuid($set_type, $obj) {
        return $this->act->SetGameProfileAchievementUuid($set_type, $obj);
    }
               
    public function SetGameProfileAchievementUuidFull($obj) {
        return $this->act->SetGameProfileAchievementUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAchievementUuidCode($set_type, $obj) {
        return $this->act->SetGameProfileAchievementUuidCode($set_type, $obj);
    }
               
    public function SetGameProfileAchievementUuidCodeFull($obj) {
        return $this->act->SetGameProfileAchievementUuidCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAchievementProfileIdCode($set_type, $obj) {
        return $this->act->SetGameProfileAchievementProfileIdCode($set_type, $obj);
    }
               
    public function SetGameProfileAchievementProfileIdCodeFull($obj) {
        return $this->act->SetGameProfileAchievementProfileIdCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAchievementCodeProfileIdGameId($set_type, $obj) {
        return $this->act->SetGameProfileAchievementCodeProfileIdGameId($set_type, $obj);
    }
               
    public function SetGameProfileAchievementCodeProfileIdGameIdFull($obj) {
        return $this->act->SetGameProfileAchievementCodeProfileIdGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAchievementCodeProfileIdGameIdTimestamp($set_type, $obj) {
        return $this->act->SetGameProfileAchievementCodeProfileIdGameIdTimestamp($set_type, $obj);
    }
               
    public function SetGameProfileAchievementCodeProfileIdGameIdTimestampFull($obj) {
        return $this->act->SetGameProfileAchievementCodeProfileIdGameIdTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileAchievementUuid(
        $uuid
    ) {         
        return $this->act->DelGameProfileAchievementUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileAchievementProfileIdCode(
        $profile_id
        , $code
    ) {         
        return $this->act->DelGameProfileAchievementProfileIdCode(
        $profile_id
        , $code
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileAchievementUuidCode(
        $uuid
        , $code
    ) {         
        return $this->act->DelGameProfileAchievementUuidCode(
        $uuid
        , $code
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameProfileAchievementListUuid(
        $uuid
        ) {
            return $this->act->GetGameProfileAchievementListUuid(
                $uuid
            );
        }
        
    public function GetGameProfileAchievementUuid(
        $uuid
    ) {
        foreach($this->act->GetGameProfileAchievementListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListUuid(
        $uuid
    ) {
        return $this->CachedGetGameProfileAchievementListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListUuid";

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
            $objs = $this->GetGameProfileAchievementListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAchievementListProfileIdCode(
        $profile_id
        , $code
        ) {
            return $this->act->GetGameProfileAchievementListProfileIdCode(
                $profile_id
                , $code
            );
        }
        
    public function GetGameProfileAchievementProfileIdCode(
        $profile_id
        , $code
    ) {
        foreach($this->act->GetGameProfileAchievementListProfileIdCode(
        $profile_id
        , $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListProfileIdCode(
        $profile_id
        , $code
    ) {
        return $this->CachedGetGameProfileAchievementListProfileIdCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $code
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListProfileIdCode(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListProfileIdCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAchievementListProfileIdCode(
                $profile_id
                , $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAchievementListUsername(
        $username
        ) {
            return $this->act->GetGameProfileAchievementListUsername(
                $username
            );
        }
        
    public function GetGameProfileAchievementUsername(
        $username
    ) {
        foreach($this->act->GetGameProfileAchievementListUsername(
        $username
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListUsername(
        $username
    ) {
        return $this->CachedGetGameProfileAchievementListUsername(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $username
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListUsername(
        $overrideCache
        , $cacheHours
        , $username
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListUsername";

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
            $objs = $this->GetGameProfileAchievementListUsername(
                $username
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAchievementListCode(
        $code
        ) {
            return $this->act->GetGameProfileAchievementListCode(
                $code
            );
        }
        
    public function GetGameProfileAchievementCode(
        $code
    ) {
        foreach($this->act->GetGameProfileAchievementListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListCode(
        $code
    ) {
        return $this->CachedGetGameProfileAchievementListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAchievementListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAchievementListGameId(
        $game_id
        ) {
            return $this->act->GetGameProfileAchievementListGameId(
                $game_id
            );
        }
        
    public function GetGameProfileAchievementGameId(
        $game_id
    ) {
        foreach($this->act->GetGameProfileAchievementListGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListGameId(
        $game_id
    ) {
        return $this->CachedGetGameProfileAchievementListGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListGameId";

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
            $objs = $this->GetGameProfileAchievementListGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAchievementListCodeGameId(
        $code
        , $game_id
        ) {
            return $this->act->GetGameProfileAchievementListCodeGameId(
                $code
                , $game_id
            );
        }
        
    public function GetGameProfileAchievementCodeGameId(
        $code
        , $game_id
    ) {
        foreach($this->act->GetGameProfileAchievementListCodeGameId(
        $code
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListCodeGameId(
        $code
        , $game_id
    ) {
        return $this->CachedGetGameProfileAchievementListCodeGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListCodeGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListCodeGameId";

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

        //$objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAchievementListCodeGameId(
                $code
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAchievementListProfileIdGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetGameProfileAchievementListProfileIdGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetGameProfileAchievementProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameProfileAchievementListProfileIdGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameProfileAchievementListProfileIdGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListProfileIdGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListProfileIdGameId";

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
            $objs = $this->GetGameProfileAchievementListProfileIdGameId(
                $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAchievementListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameProfileAchievementListProfileIdGameIdTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameProfileAchievementProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameProfileAchievementListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameProfileAchievementListProfileIdGameIdTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListProfileIdGameIdTimestamp(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListProfileIdGameIdTimestamp";

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
            $objs = $this->GetGameProfileAchievementListProfileIdGameIdTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAchievementListCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
        ) {
            return $this->act->GetGameProfileAchievementListCodeProfileIdGameId(
                $code
                , $profile_id
                , $game_id
            );
        }
        
    public function GetGameProfileAchievementCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameProfileAchievementListCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameProfileAchievementListCodeProfileIdGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListCodeProfileIdGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListCodeProfileIdGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;
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
            $objs = $this->GetGameProfileAchievementListCodeProfileIdGameId(
                $code
                , $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
                $code
                , $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameProfileAchievementCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
        $overrideCache
        , $cacheHours
        , $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListCodeProfileIdGameIdTimestamp";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;
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
            $objs = $this->GetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
                $code
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
    public function CountGameAchievementMetaUuid(
        $uuid
    ) {      
        return $this->act->CountGameAchievementMetaUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAchievementMetaCode(
        $code
    ) {      
        return $this->act->CountGameAchievementMetaCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAchievementMetaCodeGameId(
        $code
        , $game_id
    ) {      
        return $this->act->CountGameAchievementMetaCodeGameId(
        $code
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAchievementMetaName(
        $name
    ) {      
        return $this->act->CountGameAchievementMetaName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAchievementMetaGameId(
        $game_id
    ) {      
        return $this->act->CountGameAchievementMetaGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameAchievementMetaListFilter($filter_obj) {
        return $this->act->BrowseGameAchievementMetaListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAchievementMetaUuid($set_type, $obj) {
        return $this->act->SetGameAchievementMetaUuid($set_type, $obj);
    }
               
    public function SetGameAchievementMetaUuidFull($obj) {
        return $this->act->SetGameAchievementMetaUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAchievementMetaCodeGameId($set_type, $obj) {
        return $this->act->SetGameAchievementMetaCodeGameId($set_type, $obj);
    }
               
    public function SetGameAchievementMetaCodeGameIdFull($obj) {
        return $this->act->SetGameAchievementMetaCodeGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameAchievementMetaUuid(
        $uuid
    ) {         
        return $this->act->DelGameAchievementMetaUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameAchievementMetaCodeGameId(
        $code
        , $game_id
    ) {         
        return $this->act->DelGameAchievementMetaCodeGameId(
        $code
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameAchievementMetaListUuid(
        $uuid
        ) {
            return $this->act->GetGameAchievementMetaListUuid(
                $uuid
            );
        }
        
    public function GetGameAchievementMetaUuid(
        $uuid
    ) {
        foreach($this->act->GetGameAchievementMetaListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAchievementMetaListUuid(
        $uuid
    ) {
        return $this->CachedGetGameAchievementMetaListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameAchievementMetaListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameAchievementMetaListUuid";

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
            $objs = $this->GetGameAchievementMetaListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAchievementMetaListCode(
        $code
        ) {
            return $this->act->GetGameAchievementMetaListCode(
                $code
            );
        }
        
    public function GetGameAchievementMetaCode(
        $code
    ) {
        foreach($this->act->GetGameAchievementMetaListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAchievementMetaListCode(
        $code
    ) {
        return $this->CachedGetGameAchievementMetaListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameAchievementMetaListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameAchievementMetaListCode";

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
            $objs = $this->GetGameAchievementMetaListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAchievementMetaListCodeGameId(
        $code
        , $game_id
        ) {
            return $this->act->GetGameAchievementMetaListCodeGameId(
                $code
                , $game_id
            );
        }
        
    public function GetGameAchievementMetaCodeGameId(
        $code
        , $game_id
    ) {
        foreach($this->act->GetGameAchievementMetaListCodeGameId(
        $code
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAchievementMetaListCodeGameId(
        $code
        , $game_id
    ) {
        return $this->CachedGetGameAchievementMetaListCodeGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
        );
    }
    */
        
    public function CachedGetGameAchievementMetaListCodeGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameAchievementMetaListCodeGameId";

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
            $objs = $this->GetGameAchievementMetaListCodeGameId(
                $code
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAchievementMetaListName(
        $name
        ) {
            return $this->act->GetGameAchievementMetaListName(
                $name
            );
        }
        
    public function GetGameAchievementMetaName(
        $name
    ) {
        foreach($this->act->GetGameAchievementMetaListName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAchievementMetaListName(
        $name
    ) {
        return $this->CachedGetGameAchievementMetaListName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetGameAchievementMetaListName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetGameAchievementMetaListName";

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
            $objs = $this->GetGameAchievementMetaListName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAchievementMetaListGameId(
        $game_id
        ) {
            return $this->act->GetGameAchievementMetaListGameId(
                $game_id
            );
        }
        
    public function GetGameAchievementMetaGameId(
        $game_id
    ) {
        foreach($this->act->GetGameAchievementMetaListGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAchievementMetaListGameId(
        $game_id
    ) {
        return $this->CachedGetGameAchievementMetaListGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameAchievementMetaListGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameAchievementMetaListGameId";

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
            $objs = $this->GetGameAchievementMetaListGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
    
}

?>
