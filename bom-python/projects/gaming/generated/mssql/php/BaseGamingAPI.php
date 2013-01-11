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
    public function CountGameAttribute(
    ) {      
        return $this->act->CountGameAttribute(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAttributeByUuid(
        $uuid
    ) {      
        return $this->act->CountGameAttributeByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAttributeByCode(
        $code
    ) {      
        return $this->act->CountGameAttributeByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAttributeByType(
        $type
    ) {      
        return $this->act->CountGameAttributeByType(
        $type
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAttributeByGroup(
        $group
    ) {      
        return $this->act->CountGameAttributeByGroup(
        $group
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAttributeByCodeByType(
        $code
        , $type
    ) {      
        return $this->act->CountGameAttributeByCodeByType(
        $code
        , $type
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAttributeByGameId(
        $game_id
    ) {      
        return $this->act->CountGameAttributeByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAttributeByGameIdByCode(
        $game_id
        , $code
    ) {      
        return $this->act->CountGameAttributeByGameIdByCode(
        $game_id
        , $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameAttributeListByFilter($filter_obj) {
        return $this->act->BrowseGameAttributeListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAttributeByUuid($set_type, $obj) {
        return $this->act->SetGameAttributeByUuid($set_type, $obj);
    }
               
    public function SetGameAttributeByUuidFull($obj) {
        return $this->act->SetGameAttributeByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAttributeByCode($set_type, $obj) {
        return $this->act->SetGameAttributeByCode($set_type, $obj);
    }
               
    public function SetGameAttributeByCodeFull($obj) {
        return $this->act->SetGameAttributeByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAttributeByGameId($set_type, $obj) {
        return $this->act->SetGameAttributeByGameId($set_type, $obj);
    }
               
    public function SetGameAttributeByGameIdFull($obj) {
        return $this->act->SetGameAttributeByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAttributeByGameIdByCode($set_type, $obj) {
        return $this->act->SetGameAttributeByGameIdByCode($set_type, $obj);
    }
               
    public function SetGameAttributeByGameIdByCodeFull($obj) {
        return $this->act->SetGameAttributeByGameIdByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameAttributeByUuid(
        $uuid
    ) {         
        return $this->act->DelGameAttributeByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameAttributeByCode(
        $code
    ) {         
        return $this->act->DelGameAttributeByCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameAttributeByCodeByType(
        $code
        , $type
    ) {         
        return $this->act->DelGameAttributeByCodeByType(
        $code
        , $type
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameAttributeByGameId(
        $game_id
    ) {         
        return $this->act->DelGameAttributeByGameId(
        $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameAttributeByGameIdByCode(
        $game_id
        , $code
    ) {         
        return $this->act->DelGameAttributeByGameIdByCode(
        $game_id
        , $code
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameAttributeList(
        ) {
            return $this->act->GetGameAttributeList(
            );
        }
        
    public function GetGameAttribute(
    ) {
        foreach($this->act->GetGameAttributeList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAttributeList(
    ) {
        return $this->CachedGetGameAttributeList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameAttributeList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameAttributeList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAttribute>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAttributeList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAttributeListByUuid(
        $uuid
        ) {
            return $this->act->GetGameAttributeListByUuid(
                $uuid
            );
        }
        
    public function GetGameAttributeByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameAttributeListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAttributeListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameAttributeListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameAttributeListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameAttributeListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAttribute>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAttributeListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAttributeListByCode(
        $code
        ) {
            return $this->act->GetGameAttributeListByCode(
                $code
            );
        }
        
    public function GetGameAttributeByCode(
        $code
    ) {
        foreach($this->act->GetGameAttributeListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAttributeListByCode(
        $code
    ) {
        return $this->CachedGetGameAttributeListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameAttributeListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameAttributeListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAttribute>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAttributeListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAttributeListByType(
        $type
        ) {
            return $this->act->GetGameAttributeListByType(
                $type
            );
        }
        
    public function GetGameAttributeByType(
        $type
    ) {
        foreach($this->act->GetGameAttributeListByType(
        $type
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAttributeListByType(
        $type
    ) {
        return $this->CachedGetGameAttributeListByType(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $type
        );
    }
    */
        
    public function CachedGetGameAttributeListByType(
        $overrideCache
        , $cacheHours
        , $type
    ) {

        $objs = array();

        $method_name = "CachedGetGameAttributeListByType";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$type");
        $sb += "_";
        $sb += $type;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAttribute>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAttributeListByType(
                $type
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAttributeListByGroup(
        $group
        ) {
            return $this->act->GetGameAttributeListByGroup(
                $group
            );
        }
        
    public function GetGameAttributeByGroup(
        $group
    ) {
        foreach($this->act->GetGameAttributeListByGroup(
        $group
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAttributeListByGroup(
        $group
    ) {
        return $this->CachedGetGameAttributeListByGroup(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $group
        );
    }
    */
        
    public function CachedGetGameAttributeListByGroup(
        $overrideCache
        , $cacheHours
        , $group
    ) {

        $objs = array();

        $method_name = "CachedGetGameAttributeListByGroup";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$group");
        $sb += "_";
        $sb += $group;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAttribute>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAttributeListByGroup(
                $group
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAttributeListByCodeByType(
        $code
        , $type
        ) {
            return $this->act->GetGameAttributeListByCodeByType(
                $code
                , $type
            );
        }
        
    public function GetGameAttributeByCodeByType(
        $code
        , $type
    ) {
        foreach($this->act->GetGameAttributeListByCodeByType(
        $code
        , $type
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAttributeListByCodeByType(
        $code
        , $type
    ) {
        return $this->CachedGetGameAttributeListByCodeByType(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $type
        );
    }
    */
        
    public function CachedGetGameAttributeListByCodeByType(
        $overrideCache
        , $cacheHours
        , $code
        , $type
    ) {

        $objs = array();

        $method_name = "CachedGetGameAttributeListByCodeByType";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;
        $sb += "_";
        $sb += strtolower("$type");
        $sb += "_";
        $sb += $type;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAttribute>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAttributeListByCodeByType(
                $code
                , $type
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAttributeListByGameIdByCode(
        $game_id
        , $code
        ) {
            return $this->act->GetGameAttributeListByGameIdByCode(
                $game_id
                , $code
            );
        }
        
    public function GetGameAttributeByGameIdByCode(
        $game_id
        , $code
    ) {
        foreach($this->act->GetGameAttributeListByGameIdByCode(
        $game_id
        , $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAttributeListByGameIdByCode(
        $game_id
        , $code
    ) {
        return $this->CachedGetGameAttributeListByGameIdByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $code
        );
    }
    */
        
    public function CachedGetGameAttributeListByGameIdByCode(
        $overrideCache
        , $cacheHours
        , $game_id
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameAttributeListByGameIdByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAttribute>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAttributeListByGameIdByCode(
                $game_id
                , $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameAttributeText(
    ) {      
        return $this->act->CountGameAttributeText(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAttributeTextByUuid(
        $uuid
    ) {      
        return $this->act->CountGameAttributeTextByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAttributeTextByGameId(
        $game_id
    ) {      
        return $this->act->CountGameAttributeTextByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAttributeTextByAttributeId(
        $attribute_id
    ) {      
        return $this->act->CountGameAttributeTextByAttributeId(
        $attribute_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAttributeTextByGameIdByAttributeId(
        $game_id
        , $attribute_id
    ) {      
        return $this->act->CountGameAttributeTextByGameIdByAttributeId(
        $game_id
        , $attribute_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameAttributeTextListByFilter($filter_obj) {
        return $this->act->BrowseGameAttributeTextListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAttributeText($set_type, $obj) {
        return $this->act->SetGameAttributeText($set_type, $obj);
    }
               
    public function SetGameAttributeTextFull($obj) {
        return $this->act->SetGameAttributeText('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAttributeTextByUuid($set_type, $obj) {
        return $this->act->SetGameAttributeTextByUuid($set_type, $obj);
    }
               
    public function SetGameAttributeTextByUuidFull($obj) {
        return $this->act->SetGameAttributeTextByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAttributeTextByGameId($set_type, $obj) {
        return $this->act->SetGameAttributeTextByGameId($set_type, $obj);
    }
               
    public function SetGameAttributeTextByGameIdFull($obj) {
        return $this->act->SetGameAttributeTextByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAttributeTextByAttributeId($set_type, $obj) {
        return $this->act->SetGameAttributeTextByAttributeId($set_type, $obj);
    }
               
    public function SetGameAttributeTextByAttributeIdFull($obj) {
        return $this->act->SetGameAttributeTextByAttributeId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAttributeTextByGameIdByAttributeId($set_type, $obj) {
        return $this->act->SetGameAttributeTextByGameIdByAttributeId($set_type, $obj);
    }
               
    public function SetGameAttributeTextByGameIdByAttributeIdFull($obj) {
        return $this->act->SetGameAttributeTextByGameIdByAttributeId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameAttributeText(
    ) {         
        return $this->act->DelGameAttributeText(
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameAttributeTextByUuid(
        $uuid
    ) {         
        return $this->act->DelGameAttributeTextByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameAttributeTextByGameId(
        $game_id
    ) {         
        return $this->act->DelGameAttributeTextByGameId(
        $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameAttributeTextByAttributeId(
        $attribute_id
    ) {         
        return $this->act->DelGameAttributeTextByAttributeId(
        $attribute_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameAttributeTextByGameIdByAttributeId(
        $game_id
        , $attribute_id
    ) {         
        return $this->act->DelGameAttributeTextByGameIdByAttributeId(
        $game_id
        , $attribute_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameAttributeTextList(
        ) {
            return $this->act->GetGameAttributeTextList(
            );
        }
        
    public function GetGameAttributeText(
    ) {
        foreach($this->act->GetGameAttributeTextList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAttributeTextList(
    ) {
        return $this->CachedGetGameAttributeTextList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameAttributeTextList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameAttributeTextList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAttributeText>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAttributeTextList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAttributeTextListByUuid(
        $uuid
        ) {
            return $this->act->GetGameAttributeTextListByUuid(
                $uuid
            );
        }
        
    public function GetGameAttributeTextByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameAttributeTextListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAttributeTextListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameAttributeTextListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameAttributeTextListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameAttributeTextListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAttributeText>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAttributeTextListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAttributeTextListByGameId(
        $game_id
        ) {
            return $this->act->GetGameAttributeTextListByGameId(
                $game_id
            );
        }
        
    public function GetGameAttributeTextByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameAttributeTextListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAttributeTextListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameAttributeTextListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameAttributeTextListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameAttributeTextListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAttributeText>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAttributeTextListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAttributeTextListByAttributeId(
        $attribute_id
        ) {
            return $this->act->GetGameAttributeTextListByAttributeId(
                $attribute_id
            );
        }
        
    public function GetGameAttributeTextByAttributeId(
        $attribute_id
    ) {
        foreach($this->act->GetGameAttributeTextListByAttributeId(
        $attribute_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAttributeTextListByAttributeId(
        $attribute_id
    ) {
        return $this->CachedGetGameAttributeTextListByAttributeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $attribute_id
        );
    }
    */
        
    public function CachedGetGameAttributeTextListByAttributeId(
        $overrideCache
        , $cacheHours
        , $attribute_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameAttributeTextListByAttributeId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$attribute_id");
        $sb += "_";
        $sb += $attribute_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAttributeText>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAttributeTextListByAttributeId(
                $attribute_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAttributeTextListByGameIdByAttributeId(
        $game_id
        , $attribute_id
        ) {
            return $this->act->GetGameAttributeTextListByGameIdByAttributeId(
                $game_id
                , $attribute_id
            );
        }
        
    public function GetGameAttributeTextByGameIdByAttributeId(
        $game_id
        , $attribute_id
    ) {
        foreach($this->act->GetGameAttributeTextListByGameIdByAttributeId(
        $game_id
        , $attribute_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAttributeTextListByGameIdByAttributeId(
        $game_id
        , $attribute_id
    ) {
        return $this->CachedGetGameAttributeTextListByGameIdByAttributeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $attribute_id
        );
    }
    */
        
    public function CachedGetGameAttributeTextListByGameIdByAttributeId(
        $overrideCache
        , $cacheHours
        , $game_id
        , $attribute_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameAttributeTextListByGameIdByAttributeId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$attribute_id");
        $sb += "_";
        $sb += $attribute_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAttributeText>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAttributeTextListByGameIdByAttributeId(
                $game_id
                , $attribute_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameAttributeData(
    ) {      
        return $this->act->CountGameAttributeData(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAttributeDataByUuid(
        $uuid
    ) {      
        return $this->act->CountGameAttributeDataByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAttributeDataByGameId(
        $game_id
    ) {      
        return $this->act->CountGameAttributeDataByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameAttributeDataByGameIdByAttributeId(
        $game_id
        , $attribute_id
    ) {      
        return $this->act->CountGameAttributeDataByGameIdByAttributeId(
        $game_id
        , $attribute_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameAttributeDataListByFilter($filter_obj) {
        return $this->act->BrowseGameAttributeDataListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAttributeDataByUuid($set_type, $obj) {
        return $this->act->SetGameAttributeDataByUuid($set_type, $obj);
    }
               
    public function SetGameAttributeDataByUuidFull($obj) {
        return $this->act->SetGameAttributeDataByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameAttributeDataByGameIdByAttributeId($set_type, $obj) {
        return $this->act->SetGameAttributeDataByGameIdByAttributeId($set_type, $obj);
    }
               
    public function SetGameAttributeDataByGameIdByAttributeIdFull($obj) {
        return $this->act->SetGameAttributeDataByGameIdByAttributeId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameAttributeData(
    ) {         
        return $this->act->DelGameAttributeData(
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameAttributeDataByUuid(
        $uuid
    ) {         
        return $this->act->DelGameAttributeDataByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameAttributeDataByGameId(
        $game_id
    ) {         
        return $this->act->DelGameAttributeDataByGameId(
        $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameAttributeDataByGameId(
        $game_id
    ) {         
        return $this->act->DelGameAttributeDataByGameId(
        $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameAttributeDataList(
        ) {
            return $this->act->GetGameAttributeDataList(
            );
        }
        
    public function GetGameAttributeData(
    ) {
        foreach($this->act->GetGameAttributeDataList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAttributeDataList(
    ) {
        return $this->CachedGetGameAttributeDataList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameAttributeDataList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameAttributeDataList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAttributeData>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAttributeDataList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAttributeDataListByUuid(
        $uuid
        ) {
            return $this->act->GetGameAttributeDataListByUuid(
                $uuid
            );
        }
        
    public function GetGameAttributeDataByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameAttributeDataListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAttributeDataListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameAttributeDataListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameAttributeDataListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameAttributeDataListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAttributeData>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAttributeDataListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAttributeDataListByGameId(
        $game_id
        ) {
            return $this->act->GetGameAttributeDataListByGameId(
                $game_id
            );
        }
        
    public function GetGameAttributeDataByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameAttributeDataListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAttributeDataListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameAttributeDataListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameAttributeDataListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameAttributeDataListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAttributeData>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAttributeDataListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameAttributeDataListByGameIdByAttributeId(
        $game_id
        , $attribute_id
        ) {
            return $this->act->GetGameAttributeDataListByGameIdByAttributeId(
                $game_id
                , $attribute_id
            );
        }
        
    public function GetGameAttributeDataByGameIdByAttributeId(
        $game_id
        , $attribute_id
    ) {
        foreach($this->act->GetGameAttributeDataListByGameIdByAttributeId(
        $game_id
        , $attribute_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameAttributeDataListByGameIdByAttributeId(
        $game_id
        , $attribute_id
    ) {
        return $this->CachedGetGameAttributeDataListByGameIdByAttributeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $attribute_id
        );
    }
    */
        
    public function CachedGetGameAttributeDataListByGameIdByAttributeId(
        $overrideCache
        , $cacheHours
        , $game_id
        , $attribute_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameAttributeDataListByGameIdByAttributeId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$attribute_id");
        $sb += "_";
        $sb += $attribute_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameAttributeData>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameAttributeDataListByGameIdByAttributeId(
                $game_id
                , $attribute_id
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
    public function SetProfileGameByGameId($set_type, $obj) {
        return $this->act->SetProfileGameByGameId($set_type, $obj);
    }
               
    public function SetProfileGameByGameIdFull($obj) {
        return $this->act->SetProfileGameByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileGameByProfileId($set_type, $obj) {
        return $this->act->SetProfileGameByProfileId($set_type, $obj);
    }
               
    public function SetProfileGameByProfileIdFull($obj) {
        return $this->act->SetProfileGameByProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileGameByProfileIdByGameId($set_type, $obj) {
        return $this->act->SetProfileGameByProfileIdByGameId($set_type, $obj);
    }
               
    public function SetProfileGameByProfileIdByGameIdFull($obj) {
        return $this->act->SetProfileGameByProfileIdByGameId('full', $obj);
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
    public function DelProfileGameByGameId(
        $game_id
    ) {         
        return $this->act->DelProfileGameByGameId(
        $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileGameByProfileId(
        $profile_id
    ) {         
        return $this->act->DelProfileGameByProfileId(
        $profile_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileGameByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {         
        return $this->act->DelProfileGameByProfileIdByGameId(
        $profile_id
        , $game_id
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
    public function CountGameProfileAttribute(
    ) {      
        return $this->act->CountGameProfileAttribute(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAttributeByUuid(
        $uuid
    ) {      
        return $this->act->CountGameProfileAttributeByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAttributeByCode(
        $code
    ) {      
        return $this->act->CountGameProfileAttributeByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAttributeByType(
        $type
    ) {      
        return $this->act->CountGameProfileAttributeByType(
        $type
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAttributeByGroup(
        $group
    ) {      
        return $this->act->CountGameProfileAttributeByGroup(
        $group
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAttributeByCodeByType(
        $code
        , $type
    ) {      
        return $this->act->CountGameProfileAttributeByCodeByType(
        $code
        , $type
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAttributeByGameId(
        $game_id
    ) {      
        return $this->act->CountGameProfileAttributeByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAttributeByGameIdByCode(
        $game_id
        , $code
    ) {      
        return $this->act->CountGameProfileAttributeByGameIdByCode(
        $game_id
        , $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameProfileAttributeListByFilter($filter_obj) {
        return $this->act->BrowseGameProfileAttributeListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAttributeByUuid($set_type, $obj) {
        return $this->act->SetGameProfileAttributeByUuid($set_type, $obj);
    }
               
    public function SetGameProfileAttributeByUuidFull($obj) {
        return $this->act->SetGameProfileAttributeByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAttributeByCode($set_type, $obj) {
        return $this->act->SetGameProfileAttributeByCode($set_type, $obj);
    }
               
    public function SetGameProfileAttributeByCodeFull($obj) {
        return $this->act->SetGameProfileAttributeByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAttributeByGameId($set_type, $obj) {
        return $this->act->SetGameProfileAttributeByGameId($set_type, $obj);
    }
               
    public function SetGameProfileAttributeByGameIdFull($obj) {
        return $this->act->SetGameProfileAttributeByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAttributeByGameIdByCode($set_type, $obj) {
        return $this->act->SetGameProfileAttributeByGameIdByCode($set_type, $obj);
    }
               
    public function SetGameProfileAttributeByGameIdByCodeFull($obj) {
        return $this->act->SetGameProfileAttributeByGameIdByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileAttributeByUuid(
        $uuid
    ) {         
        return $this->act->DelGameProfileAttributeByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileAttributeByCode(
        $code
    ) {         
        return $this->act->DelGameProfileAttributeByCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileAttributeByCodeByType(
        $code
        , $type
    ) {         
        return $this->act->DelGameProfileAttributeByCodeByType(
        $code
        , $type
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileAttributeByGameId(
        $game_id
    ) {         
        return $this->act->DelGameProfileAttributeByGameId(
        $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileAttributeByGameIdByCode(
        $game_id
        , $code
    ) {         
        return $this->act->DelGameProfileAttributeByGameIdByCode(
        $game_id
        , $code
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameProfileAttributeList(
        ) {
            return $this->act->GetGameProfileAttributeList(
            );
        }
        
    public function GetGameProfileAttribute(
    ) {
        foreach($this->act->GetGameProfileAttributeList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAttributeList(
    ) {
        return $this->CachedGetGameProfileAttributeList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameProfileAttributeList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAttributeList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileAttribute>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAttributeList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAttributeListByUuid(
        $uuid
        ) {
            return $this->act->GetGameProfileAttributeListByUuid(
                $uuid
            );
        }
        
    public function GetGameProfileAttributeByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameProfileAttributeListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAttributeListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameProfileAttributeListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameProfileAttributeListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAttributeListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileAttribute>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAttributeListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAttributeListByCode(
        $code
        ) {
            return $this->act->GetGameProfileAttributeListByCode(
                $code
            );
        }
        
    public function GetGameProfileAttributeByCode(
        $code
    ) {
        foreach($this->act->GetGameProfileAttributeListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAttributeListByCode(
        $code
    ) {
        return $this->CachedGetGameProfileAttributeListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameProfileAttributeListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAttributeListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileAttribute>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAttributeListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAttributeListByType(
        $type
        ) {
            return $this->act->GetGameProfileAttributeListByType(
                $type
            );
        }
        
    public function GetGameProfileAttributeByType(
        $type
    ) {
        foreach($this->act->GetGameProfileAttributeListByType(
        $type
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAttributeListByType(
        $type
    ) {
        return $this->CachedGetGameProfileAttributeListByType(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $type
        );
    }
    */
        
    public function CachedGetGameProfileAttributeListByType(
        $overrideCache
        , $cacheHours
        , $type
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAttributeListByType";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$type");
        $sb += "_";
        $sb += $type;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileAttribute>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAttributeListByType(
                $type
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAttributeListByGroup(
        $group
        ) {
            return $this->act->GetGameProfileAttributeListByGroup(
                $group
            );
        }
        
    public function GetGameProfileAttributeByGroup(
        $group
    ) {
        foreach($this->act->GetGameProfileAttributeListByGroup(
        $group
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAttributeListByGroup(
        $group
    ) {
        return $this->CachedGetGameProfileAttributeListByGroup(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $group
        );
    }
    */
        
    public function CachedGetGameProfileAttributeListByGroup(
        $overrideCache
        , $cacheHours
        , $group
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAttributeListByGroup";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$group");
        $sb += "_";
        $sb += $group;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileAttribute>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAttributeListByGroup(
                $group
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAttributeListByCodeByType(
        $code
        , $type
        ) {
            return $this->act->GetGameProfileAttributeListByCodeByType(
                $code
                , $type
            );
        }
        
    public function GetGameProfileAttributeByCodeByType(
        $code
        , $type
    ) {
        foreach($this->act->GetGameProfileAttributeListByCodeByType(
        $code
        , $type
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAttributeListByCodeByType(
        $code
        , $type
    ) {
        return $this->CachedGetGameProfileAttributeListByCodeByType(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $type
        );
    }
    */
        
    public function CachedGetGameProfileAttributeListByCodeByType(
        $overrideCache
        , $cacheHours
        , $code
        , $type
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAttributeListByCodeByType";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;
        $sb += "_";
        $sb += strtolower("$type");
        $sb += "_";
        $sb += $type;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileAttribute>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAttributeListByCodeByType(
                $code
                , $type
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAttributeListByGameIdByCode(
        $game_id
        , $code
        ) {
            return $this->act->GetGameProfileAttributeListByGameIdByCode(
                $game_id
                , $code
            );
        }
        
    public function GetGameProfileAttributeByGameIdByCode(
        $game_id
        , $code
    ) {
        foreach($this->act->GetGameProfileAttributeListByGameIdByCode(
        $game_id
        , $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAttributeListByGameIdByCode(
        $game_id
        , $code
    ) {
        return $this->CachedGetGameProfileAttributeListByGameIdByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $code
        );
    }
    */
        
    public function CachedGetGameProfileAttributeListByGameIdByCode(
        $overrideCache
        , $cacheHours
        , $game_id
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAttributeListByGameIdByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileAttribute>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAttributeListByGameIdByCode(
                $game_id
                , $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameProfileAttributeText(
    ) {      
        return $this->act->CountGameProfileAttributeText(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAttributeTextByUuid(
        $uuid
    ) {      
        return $this->act->CountGameProfileAttributeTextByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAttributeTextByProfileId(
        $profile_id
    ) {      
        return $this->act->CountGameProfileAttributeTextByProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAttributeTextByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
    ) {      
        return $this->act->CountGameProfileAttributeTextByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAttributeTextByGameIdByProfileId(
        $game_id
        , $profile_id
    ) {      
        return $this->act->CountGameProfileAttributeTextByGameIdByProfileId(
        $game_id
        , $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAttributeTextByGameIdByProfileIdByAttributeId(
        $game_id
        , $profile_id
        , $attribute_id
    ) {      
        return $this->act->CountGameProfileAttributeTextByGameIdByProfileIdByAttributeId(
        $game_id
        , $profile_id
        , $attribute_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameProfileAttributeTextListByFilter($filter_obj) {
        return $this->act->BrowseGameProfileAttributeTextListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAttributeTextByUuid($set_type, $obj) {
        return $this->act->SetGameProfileAttributeTextByUuid($set_type, $obj);
    }
               
    public function SetGameProfileAttributeTextByUuidFull($obj) {
        return $this->act->SetGameProfileAttributeTextByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAttributeTextByProfileId($set_type, $obj) {
        return $this->act->SetGameProfileAttributeTextByProfileId($set_type, $obj);
    }
               
    public function SetGameProfileAttributeTextByProfileIdFull($obj) {
        return $this->act->SetGameProfileAttributeTextByProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAttributeTextByProfileIdByAttributeId($set_type, $obj) {
        return $this->act->SetGameProfileAttributeTextByProfileIdByAttributeId($set_type, $obj);
    }
               
    public function SetGameProfileAttributeTextByProfileIdByAttributeIdFull($obj) {
        return $this->act->SetGameProfileAttributeTextByProfileIdByAttributeId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAttributeTextByGameIdByProfileId($set_type, $obj) {
        return $this->act->SetGameProfileAttributeTextByGameIdByProfileId($set_type, $obj);
    }
               
    public function SetGameProfileAttributeTextByGameIdByProfileIdFull($obj) {
        return $this->act->SetGameProfileAttributeTextByGameIdByProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAttributeTextByGameIdByProfileIdByAttributeId($set_type, $obj) {
        return $this->act->SetGameProfileAttributeTextByGameIdByProfileIdByAttributeId($set_type, $obj);
    }
               
    public function SetGameProfileAttributeTextByGameIdByProfileIdByAttributeIdFull($obj) {
        return $this->act->SetGameProfileAttributeTextByGameIdByProfileIdByAttributeId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileAttributeTextByUuid(
        $uuid
    ) {         
        return $this->act->DelGameProfileAttributeTextByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileAttributeTextByProfileId(
        $profile_id
    ) {         
        return $this->act->DelGameProfileAttributeTextByProfileId(
        $profile_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileAttributeTextByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
    ) {         
        return $this->act->DelGameProfileAttributeTextByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileAttributeTextByGameIdByProfileId(
        $game_id
        , $profile_id
    ) {         
        return $this->act->DelGameProfileAttributeTextByGameIdByProfileId(
        $game_id
        , $profile_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileAttributeTextByGameIdByProfileIdByAttributeId(
        $game_id
        , $profile_id
        , $attribute_id
    ) {         
        return $this->act->DelGameProfileAttributeTextByGameIdByProfileIdByAttributeId(
        $game_id
        , $profile_id
        , $attribute_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameProfileAttributeTextListByUuid(
        $uuid
        ) {
            return $this->act->GetGameProfileAttributeTextListByUuid(
                $uuid
            );
        }
        
    public function GetGameProfileAttributeTextByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameProfileAttributeTextListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAttributeTextListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameProfileAttributeTextListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameProfileAttributeTextListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAttributeTextListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileAttributeText>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAttributeTextListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAttributeTextListByProfileId(
        $profile_id
        ) {
            return $this->act->GetGameProfileAttributeTextListByProfileId(
                $profile_id
            );
        }
        
    public function GetGameProfileAttributeTextByProfileId(
        $profile_id
    ) {
        foreach($this->act->GetGameProfileAttributeTextListByProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAttributeTextListByProfileId(
        $profile_id
    ) {
        return $this->CachedGetGameProfileAttributeTextListByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetGameProfileAttributeTextListByProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAttributeTextListByProfileId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileAttributeText>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAttributeTextListByProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAttributeTextListByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
        ) {
            return $this->act->GetGameProfileAttributeTextListByProfileIdByAttributeId(
                $profile_id
                , $attribute_id
            );
        }
        
    public function GetGameProfileAttributeTextByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
    ) {
        foreach($this->act->GetGameProfileAttributeTextListByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAttributeTextListByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
    ) {
        return $this->CachedGetGameProfileAttributeTextListByProfileIdByAttributeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $attribute_id
        );
    }
    */
        
    public function CachedGetGameProfileAttributeTextListByProfileIdByAttributeId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $attribute_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAttributeTextListByProfileIdByAttributeId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$attribute_id");
        $sb += "_";
        $sb += $attribute_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileAttributeText>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAttributeTextListByProfileIdByAttributeId(
                $profile_id
                , $attribute_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAttributeTextListByGameIdByProfileId(
        $game_id
        , $profile_id
        ) {
            return $this->act->GetGameProfileAttributeTextListByGameIdByProfileId(
                $game_id
                , $profile_id
            );
        }
        
    public function GetGameProfileAttributeTextByGameIdByProfileId(
        $game_id
        , $profile_id
    ) {
        foreach($this->act->GetGameProfileAttributeTextListByGameIdByProfileId(
        $game_id
        , $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAttributeTextListByGameIdByProfileId(
        $game_id
        , $profile_id
    ) {
        return $this->CachedGetGameProfileAttributeTextListByGameIdByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $profile_id
        );
    }
    */
        
    public function CachedGetGameProfileAttributeTextListByGameIdByProfileId(
        $overrideCache
        , $cacheHours
        , $game_id
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAttributeTextListByGameIdByProfileId";

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

        //$objs = CacheUtil.Get<List<GameProfileAttributeText>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAttributeTextListByGameIdByProfileId(
                $game_id
                , $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAttributeTextListByGameIdByProfileIdByAttributeId(
        $game_id
        , $profile_id
        , $attribute_id
        ) {
            return $this->act->GetGameProfileAttributeTextListByGameIdByProfileIdByAttributeId(
                $game_id
                , $profile_id
                , $attribute_id
            );
        }
        
    public function GetGameProfileAttributeTextByGameIdByProfileIdByAttributeId(
        $game_id
        , $profile_id
        , $attribute_id
    ) {
        foreach($this->act->GetGameProfileAttributeTextListByGameIdByProfileIdByAttributeId(
        $game_id
        , $profile_id
        , $attribute_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAttributeTextListByGameIdByProfileIdByAttributeId(
        $game_id
        , $profile_id
        , $attribute_id
    ) {
        return $this->CachedGetGameProfileAttributeTextListByGameIdByProfileIdByAttributeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $profile_id
            , $attribute_id
        );
    }
    */
        
    public function CachedGetGameProfileAttributeTextListByGameIdByProfileIdByAttributeId(
        $overrideCache
        , $cacheHours
        , $game_id
        , $profile_id
        , $attribute_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAttributeTextListByGameIdByProfileIdByAttributeId";

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
        $sb += strtolower("$attribute_id");
        $sb += "_";
        $sb += $attribute_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileAttributeText>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAttributeTextListByGameIdByProfileIdByAttributeId(
                $game_id
                , $profile_id
                , $attribute_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameProfileAttributeData(
    ) {      
        return $this->act->CountGameProfileAttributeData(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAttributeDataByUuid(
        $uuid
    ) {      
        return $this->act->CountGameProfileAttributeDataByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAttributeDataByProfileId(
        $profile_id
    ) {      
        return $this->act->CountGameProfileAttributeDataByProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAttributeDataByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
    ) {      
        return $this->act->CountGameProfileAttributeDataByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAttributeDataByGameIdByProfileId(
        $game_id
        , $profile_id
    ) {      
        return $this->act->CountGameProfileAttributeDataByGameIdByProfileId(
        $game_id
        , $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAttributeDataByGameIdByProfileIdByAttributeId(
        $game_id
        , $profile_id
        , $attribute_id
    ) {      
        return $this->act->CountGameProfileAttributeDataByGameIdByProfileIdByAttributeId(
        $game_id
        , $profile_id
        , $attribute_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameProfileAttributeDataListByFilter($filter_obj) {
        return $this->act->BrowseGameProfileAttributeDataListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAttributeDataByUuid($set_type, $obj) {
        return $this->act->SetGameProfileAttributeDataByUuid($set_type, $obj);
    }
               
    public function SetGameProfileAttributeDataByUuidFull($obj) {
        return $this->act->SetGameProfileAttributeDataByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAttributeDataByProfileIdByAttributeId($set_type, $obj) {
        return $this->act->SetGameProfileAttributeDataByProfileIdByAttributeId($set_type, $obj);
    }
               
    public function SetGameProfileAttributeDataByProfileIdByAttributeIdFull($obj) {
        return $this->act->SetGameProfileAttributeDataByProfileIdByAttributeId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAttributeDataByGameIdByProfileId($set_type, $obj) {
        return $this->act->SetGameProfileAttributeDataByGameIdByProfileId($set_type, $obj);
    }
               
    public function SetGameProfileAttributeDataByGameIdByProfileIdFull($obj) {
        return $this->act->SetGameProfileAttributeDataByGameIdByProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAttributeDataByGameIdByProfileIdByAttributeId($set_type, $obj) {
        return $this->act->SetGameProfileAttributeDataByGameIdByProfileIdByAttributeId($set_type, $obj);
    }
               
    public function SetGameProfileAttributeDataByGameIdByProfileIdByAttributeIdFull($obj) {
        return $this->act->SetGameProfileAttributeDataByGameIdByProfileIdByAttributeId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileAttributeDataByUuid(
        $uuid
    ) {         
        return $this->act->DelGameProfileAttributeDataByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileAttributeDataByProfileId(
        $profile_id
    ) {         
        return $this->act->DelGameProfileAttributeDataByProfileId(
        $profile_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileAttributeDataByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
    ) {         
        return $this->act->DelGameProfileAttributeDataByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileAttributeDataByGameIdByProfileId(
        $game_id
        , $profile_id
    ) {         
        return $this->act->DelGameProfileAttributeDataByGameIdByProfileId(
        $game_id
        , $profile_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileAttributeDataByGameIdByProfileIdByAttributeId(
        $game_id
        , $profile_id
        , $attribute_id
    ) {         
        return $this->act->DelGameProfileAttributeDataByGameIdByProfileIdByAttributeId(
        $game_id
        , $profile_id
        , $attribute_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameProfileAttributeDataList(
        ) {
            return $this->act->GetGameProfileAttributeDataList(
            );
        }
        
    public function GetGameProfileAttributeData(
    ) {
        foreach($this->act->GetGameProfileAttributeDataList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAttributeDataList(
    ) {
        return $this->CachedGetGameProfileAttributeDataList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameProfileAttributeDataList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAttributeDataList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileAttributeData>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAttributeDataList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAttributeDataListByUuid(
        $uuid
        ) {
            return $this->act->GetGameProfileAttributeDataListByUuid(
                $uuid
            );
        }
        
    public function GetGameProfileAttributeDataByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameProfileAttributeDataListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAttributeDataListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameProfileAttributeDataListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameProfileAttributeDataListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAttributeDataListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileAttributeData>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAttributeDataListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAttributeDataListByProfileId(
        $profile_id
        ) {
            return $this->act->GetGameProfileAttributeDataListByProfileId(
                $profile_id
            );
        }
        
    public function GetGameProfileAttributeDataByProfileId(
        $profile_id
    ) {
        foreach($this->act->GetGameProfileAttributeDataListByProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAttributeDataListByProfileId(
        $profile_id
    ) {
        return $this->CachedGetGameProfileAttributeDataListByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetGameProfileAttributeDataListByProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAttributeDataListByProfileId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileAttributeData>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAttributeDataListByProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAttributeDataListByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
        ) {
            return $this->act->GetGameProfileAttributeDataListByProfileIdByAttributeId(
                $profile_id
                , $attribute_id
            );
        }
        
    public function GetGameProfileAttributeDataByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
    ) {
        foreach($this->act->GetGameProfileAttributeDataListByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAttributeDataListByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
    ) {
        return $this->CachedGetGameProfileAttributeDataListByProfileIdByAttributeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $attribute_id
        );
    }
    */
        
    public function CachedGetGameProfileAttributeDataListByProfileIdByAttributeId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $attribute_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAttributeDataListByProfileIdByAttributeId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$attribute_id");
        $sb += "_";
        $sb += $attribute_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileAttributeData>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAttributeDataListByProfileIdByAttributeId(
                $profile_id
                , $attribute_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAttributeDataListByGameIdByProfileId(
        $game_id
        , $profile_id
        ) {
            return $this->act->GetGameProfileAttributeDataListByGameIdByProfileId(
                $game_id
                , $profile_id
            );
        }
        
    public function GetGameProfileAttributeDataByGameIdByProfileId(
        $game_id
        , $profile_id
    ) {
        foreach($this->act->GetGameProfileAttributeDataListByGameIdByProfileId(
        $game_id
        , $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAttributeDataListByGameIdByProfileId(
        $game_id
        , $profile_id
    ) {
        return $this->CachedGetGameProfileAttributeDataListByGameIdByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $profile_id
        );
    }
    */
        
    public function CachedGetGameProfileAttributeDataListByGameIdByProfileId(
        $overrideCache
        , $cacheHours
        , $game_id
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAttributeDataListByGameIdByProfileId";

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

        //$objs = CacheUtil.Get<List<GameProfileAttributeData>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAttributeDataListByGameIdByProfileId(
                $game_id
                , $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAttributeDataListByGameIdByProfileIdByAttributeId(
        $game_id
        , $profile_id
        , $attribute_id
        ) {
            return $this->act->GetGameProfileAttributeDataListByGameIdByProfileIdByAttributeId(
                $game_id
                , $profile_id
                , $attribute_id
            );
        }
        
    public function GetGameProfileAttributeDataByGameIdByProfileIdByAttributeId(
        $game_id
        , $profile_id
        , $attribute_id
    ) {
        foreach($this->act->GetGameProfileAttributeDataListByGameIdByProfileIdByAttributeId(
        $game_id
        , $profile_id
        , $attribute_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAttributeDataListByGameIdByProfileIdByAttributeId(
        $game_id
        , $profile_id
        , $attribute_id
    ) {
        return $this->CachedGetGameProfileAttributeDataListByGameIdByProfileIdByAttributeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
            , $profile_id
            , $attribute_id
        );
    }
    */
        
    public function CachedGetGameProfileAttributeDataListByGameIdByProfileIdByAttributeId(
        $overrideCache
        , $cacheHours
        , $game_id
        , $profile_id
        , $attribute_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAttributeDataListByGameIdByProfileIdByAttributeId";

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
        $sb += strtolower("$attribute_id");
        $sb += "_";
        $sb += $attribute_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameProfileAttributeData>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameProfileAttributeDataListByGameIdByProfileIdByAttributeId(
                $game_id
                , $profile_id
                , $attribute_id
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
    public function CountProfileGameNetworkByProfileIdByGameIdByGameNetworkId(
        $profile_id
        , $game_id
        , $game_network_id
    ) {      
        return $this->act->CountProfileGameNetworkByProfileIdByGameIdByGameNetworkId(
        $profile_id
        , $game_id
        , $game_network_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(
        $network_username
        , $game_id
        , $game_network_id
    ) {      
        return $this->act->CountProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(
        $network_username
        , $game_id
        , $game_network_id
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
    public function SetProfileGameNetworkByProfileIdByGameId($set_type, $obj) {
        return $this->act->SetProfileGameNetworkByProfileIdByGameId($set_type, $obj);
    }
               
    public function SetProfileGameNetworkByProfileIdByGameIdFull($obj) {
        return $this->act->SetProfileGameNetworkByProfileIdByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileGameNetworkByProfileIdByGameIdByGameNetworkId($set_type, $obj) {
        return $this->act->SetProfileGameNetworkByProfileIdByGameIdByGameNetworkId($set_type, $obj);
    }
               
    public function SetProfileGameNetworkByProfileIdByGameIdByGameNetworkIdFull($obj) {
        return $this->act->SetProfileGameNetworkByProfileIdByGameIdByGameNetworkId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId($set_type, $obj) {
        return $this->act->SetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId($set_type, $obj);
    }
               
    public function SetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkIdFull($obj) {
        return $this->act->SetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId('full', $obj);
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
    public function DelProfileGameNetworkByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {         
        return $this->act->DelProfileGameNetworkByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileGameNetworkByProfileIdByGameIdByGameNetworkId(
        $profile_id
        , $game_id
        , $game_network_id
    ) {         
        return $this->act->DelProfileGameNetworkByProfileIdByGameIdByGameNetworkId(
        $profile_id
        , $game_id
        , $game_network_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(
        $network_username
        , $game_id
        , $game_network_id
    ) {         
        return $this->act->DelProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(
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
    public function GetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
        $profile_id
        , $game_id
        , $game_network_id
        ) {
            return $this->act->GetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
                $profile_id
                , $game_id
                , $game_network_id
            );
        }
        
    public function GetProfileGameNetworkByProfileIdByGameIdByGameNetworkId(
        $profile_id
        , $game_id
        , $game_network_id
    ) {
        foreach($this->act->GetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
        $profile_id
        , $game_id
        , $game_network_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
        $profile_id
        , $game_id
        , $game_network_id
    ) {
        return $this->CachedGetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
            , $game_network_id
        );
    }
    */
        
    public function CachedGetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
        , $game_network_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId";

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
            $objs = $this->GetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
                $profile_id
                , $game_id
                , $game_network_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
        $network_username
        , $game_id
        , $game_network_id
        ) {
            return $this->act->GetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
                $network_username
                , $game_id
                , $game_network_id
            );
        }
        
    public function GetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(
        $network_username
        , $game_id
        , $game_network_id
    ) {
        foreach($this->act->GetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
        $network_username
        , $game_id
        , $game_network_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
        $network_username
        , $game_id
        , $game_network_id
    ) {
        return $this->CachedGetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $network_username
            , $game_id
            , $game_network_id
        );
    }
    */
        
    public function CachedGetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
        $overrideCache
        , $cacheHours
        , $network_username
        , $game_id
        , $game_network_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId";

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
            $objs = $this->GetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
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
    public function CountGameLeaderboard(
    ) {      
        return $this->act->CountGameLeaderboard(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardByUuid(
        $uuid
    ) {      
        return $this->act->CountGameLeaderboardByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardByGameId(
        $game_id
    ) {      
        return $this->act->CountGameLeaderboardByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardByCode(
        $code
    ) {      
        return $this->act->CountGameLeaderboardByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardByCodeByGameId(
        $code
        , $game_id
    ) {      
        return $this->act->CountGameLeaderboardByCodeByGameId(
        $code
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
    ) {      
        return $this->act->CountGameLeaderboardByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {      
        return $this->act->CountGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameLeaderboardByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameLeaderboardListByFilter($filter_obj) {
        return $this->act->BrowseGameLeaderboardListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLeaderboardByUuid($set_type, $obj) {
        return $this->act->SetGameLeaderboardByUuid($set_type, $obj);
    }
               
    public function SetGameLeaderboardByUuidFull($obj) {
        return $this->act->SetGameLeaderboardByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLeaderboardByUuidByProfileIdByGameIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameLeaderboardByUuidByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameLeaderboardByUuidByProfileIdByGameIdByTimestampFull($obj) {
        return $this->act->SetGameLeaderboardByUuidByProfileIdByGameIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLeaderboardByCode($set_type, $obj) {
        return $this->act->SetGameLeaderboardByCode($set_type, $obj);
    }
               
    public function SetGameLeaderboardByCodeFull($obj) {
        return $this->act->SetGameLeaderboardByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLeaderboardByCodeByGameId($set_type, $obj) {
        return $this->act->SetGameLeaderboardByCodeByGameId($set_type, $obj);
    }
               
    public function SetGameLeaderboardByCodeByGameIdFull($obj) {
        return $this->act->SetGameLeaderboardByCodeByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLeaderboardByCodeByGameIdByProfileId($set_type, $obj) {
        return $this->act->SetGameLeaderboardByCodeByGameIdByProfileId($set_type, $obj);
    }
               
    public function SetGameLeaderboardByCodeByGameIdByProfileIdFull($obj) {
        return $this->act->SetGameLeaderboardByCodeByGameIdByProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLeaderboardByCodeByGameIdByProfileIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameLeaderboardByCodeByGameIdByProfileIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameLeaderboardByCodeByGameIdByProfileIdByTimestampFull($obj) {
        return $this->act->SetGameLeaderboardByCodeByGameIdByProfileIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameLeaderboardByUuid(
        $uuid
    ) {         
        return $this->act->DelGameLeaderboardByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameLeaderboardByCode(
        $code
    ) {         
        return $this->act->DelGameLeaderboardByCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameLeaderboardByCodeByGameId(
        $code
        , $game_id
    ) {         
        return $this->act->DelGameLeaderboardByCodeByGameId(
        $code
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameLeaderboardByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
    ) {         
        return $this->act->DelGameLeaderboardByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {         
        return $this->act->DelGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameLeaderboardByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameLeaderboardByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardList(
        ) {
            return $this->act->GetGameLeaderboardList(
            );
        }
        
    public function GetGameLeaderboard(
    ) {
        foreach($this->act->GetGameLeaderboardList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardList(
    ) {
        return $this->CachedGetGameLeaderboardList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameLeaderboardList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardListByUuid(
        $uuid
        ) {
            return $this->act->GetGameLeaderboardListByUuid(
                $uuid
            );
        }
        
    public function GetGameLeaderboardByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameLeaderboardListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameLeaderboardListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameLeaderboardListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardListByGameId(
        $game_id
        ) {
            return $this->act->GetGameLeaderboardListByGameId(
                $game_id
            );
        }
        
    public function GetGameLeaderboardByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameLeaderboardListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameLeaderboardListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameLeaderboardListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardListByCode(
        $code
        ) {
            return $this->act->GetGameLeaderboardListByCode(
                $code
            );
        }
        
    public function GetGameLeaderboardByCode(
        $code
    ) {
        foreach($this->act->GetGameLeaderboardListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardListByCode(
        $code
    ) {
        return $this->CachedGetGameLeaderboardListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameLeaderboardListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardListByCodeByGameId(
        $code
        , $game_id
        ) {
            return $this->act->GetGameLeaderboardListByCodeByGameId(
                $code
                , $game_id
            );
        }
        
    public function GetGameLeaderboardByCodeByGameId(
        $code
        , $game_id
    ) {
        foreach($this->act->GetGameLeaderboardListByCodeByGameId(
        $code
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardListByCodeByGameId(
        $code
        , $game_id
    ) {
        return $this->CachedGetGameLeaderboardListByCodeByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
        );
    }
    */
        
    public function CachedGetGameLeaderboardListByCodeByGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardListByCodeByGameId";

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

        //$objs = CacheUtil.Get<List<GameLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardListByCodeByGameId(
                $code
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardListByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
        ) {
            return $this->act->GetGameLeaderboardListByCodeByGameIdByProfileId(
                $code
                , $game_id
                , $profile_id
            );
        }
        
    public function GetGameLeaderboardByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
        foreach($this->act->GetGameLeaderboardListByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardListByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
        return $this->CachedGetGameLeaderboardListByCodeByGameIdByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
            , $profile_id
        );
    }
    */
        
    public function CachedGetGameLeaderboardListByCodeByGameIdByProfileId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardListByCodeByGameIdByProfileId";

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

        //$objs = CacheUtil.Get<List<GameLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardListByCodeByGameIdByProfileId(
                $code
                , $game_id
                , $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
        ) {
            return $this->act->GetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
                $code
                , $game_id
                , $profile_id
                , $timestamp
            );
        }
        
    public function GetGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
        foreach($this->act->GetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
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
    public function CachedGetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
        return $this->CachedGetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
            , $profile_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp";

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

        //$objs = CacheUtil.Get<List<GameLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
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
    public function GetGameLeaderboardListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetGameLeaderboardListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetGameLeaderboardByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameLeaderboardListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameLeaderboardListByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameLeaderboardListByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardListByProfileIdByGameId";

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

        //$objs = CacheUtil.Get<List<GameLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameLeaderboardListByProfileIdByGameIdByTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameLeaderboardByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameLeaderboardListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameLeaderboardListByProfileIdByGameIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameLeaderboardListByProfileIdByGameIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardListByProfileIdByGameIdByTimestamp";

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

        //$objs = CacheUtil.Get<List<GameLeaderboard>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardListByProfileIdByGameIdByTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardItem(
    ) {      
        return $this->act->CountGameLeaderboardItem(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardItemByUuid(
        $uuid
    ) {      
        return $this->act->CountGameLeaderboardItemByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardItemByGameId(
        $game_id
    ) {      
        return $this->act->CountGameLeaderboardItemByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardItemByCode(
        $code
    ) {      
        return $this->act->CountGameLeaderboardItemByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardItemByCodeByGameId(
        $code
        , $game_id
    ) {      
        return $this->act->CountGameLeaderboardItemByCodeByGameId(
        $code
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardItemByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
    ) {      
        return $this->act->CountGameLeaderboardItemByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {      
        return $this->act->CountGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardItemByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameLeaderboardItemByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameLeaderboardItemListByFilter($filter_obj) {
        return $this->act->BrowseGameLeaderboardItemListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLeaderboardItemByUuid($set_type, $obj) {
        return $this->act->SetGameLeaderboardItemByUuid($set_type, $obj);
    }
               
    public function SetGameLeaderboardItemByUuidFull($obj) {
        return $this->act->SetGameLeaderboardItemByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLeaderboardItemByUuidByProfileIdByGameIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameLeaderboardItemByUuidByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameLeaderboardItemByUuidByProfileIdByGameIdByTimestampFull($obj) {
        return $this->act->SetGameLeaderboardItemByUuidByProfileIdByGameIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLeaderboardItemByCode($set_type, $obj) {
        return $this->act->SetGameLeaderboardItemByCode($set_type, $obj);
    }
               
    public function SetGameLeaderboardItemByCodeFull($obj) {
        return $this->act->SetGameLeaderboardItemByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLeaderboardItemByCodeByGameId($set_type, $obj) {
        return $this->act->SetGameLeaderboardItemByCodeByGameId($set_type, $obj);
    }
               
    public function SetGameLeaderboardItemByCodeByGameIdFull($obj) {
        return $this->act->SetGameLeaderboardItemByCodeByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLeaderboardItemByCodeByGameIdByProfileId($set_type, $obj) {
        return $this->act->SetGameLeaderboardItemByCodeByGameIdByProfileId($set_type, $obj);
    }
               
    public function SetGameLeaderboardItemByCodeByGameIdByProfileIdFull($obj) {
        return $this->act->SetGameLeaderboardItemByCodeByGameIdByProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestampFull($obj) {
        return $this->act->SetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameLeaderboardItemByUuid(
        $uuid
    ) {         
        return $this->act->DelGameLeaderboardItemByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameLeaderboardItemByCode(
        $code
    ) {         
        return $this->act->DelGameLeaderboardItemByCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameLeaderboardItemByCodeByGameId(
        $code
        , $game_id
    ) {         
        return $this->act->DelGameLeaderboardItemByCodeByGameId(
        $code
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameLeaderboardItemByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
    ) {         
        return $this->act->DelGameLeaderboardItemByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {         
        return $this->act->DelGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameLeaderboardItemByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameLeaderboardItemByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardItemList(
        ) {
            return $this->act->GetGameLeaderboardItemList(
            );
        }
        
    public function GetGameLeaderboardItem(
    ) {
        foreach($this->act->GetGameLeaderboardItemList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardItemList(
    ) {
        return $this->CachedGetGameLeaderboardItemList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameLeaderboardItemList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardItemList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLeaderboardItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardItemList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardItemListByUuid(
        $uuid
        ) {
            return $this->act->GetGameLeaderboardItemListByUuid(
                $uuid
            );
        }
        
    public function GetGameLeaderboardItemByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameLeaderboardItemListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardItemListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameLeaderboardItemListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameLeaderboardItemListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardItemListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLeaderboardItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardItemListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardItemListByGameId(
        $game_id
        ) {
            return $this->act->GetGameLeaderboardItemListByGameId(
                $game_id
            );
        }
        
    public function GetGameLeaderboardItemByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameLeaderboardItemListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardItemListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameLeaderboardItemListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameLeaderboardItemListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardItemListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLeaderboardItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardItemListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardItemListByCode(
        $code
        ) {
            return $this->act->GetGameLeaderboardItemListByCode(
                $code
            );
        }
        
    public function GetGameLeaderboardItemByCode(
        $code
    ) {
        foreach($this->act->GetGameLeaderboardItemListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardItemListByCode(
        $code
    ) {
        return $this->CachedGetGameLeaderboardItemListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameLeaderboardItemListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardItemListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLeaderboardItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardItemListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardItemListByCodeByGameId(
        $code
        , $game_id
        ) {
            return $this->act->GetGameLeaderboardItemListByCodeByGameId(
                $code
                , $game_id
            );
        }
        
    public function GetGameLeaderboardItemByCodeByGameId(
        $code
        , $game_id
    ) {
        foreach($this->act->GetGameLeaderboardItemListByCodeByGameId(
        $code
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardItemListByCodeByGameId(
        $code
        , $game_id
    ) {
        return $this->CachedGetGameLeaderboardItemListByCodeByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
        );
    }
    */
        
    public function CachedGetGameLeaderboardItemListByCodeByGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardItemListByCodeByGameId";

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

        //$objs = CacheUtil.Get<List<GameLeaderboardItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardItemListByCodeByGameId(
                $code
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardItemListByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
        ) {
            return $this->act->GetGameLeaderboardItemListByCodeByGameIdByProfileId(
                $code
                , $game_id
                , $profile_id
            );
        }
        
    public function GetGameLeaderboardItemByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
        foreach($this->act->GetGameLeaderboardItemListByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardItemListByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
        return $this->CachedGetGameLeaderboardItemListByCodeByGameIdByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
            , $profile_id
        );
    }
    */
        
    public function CachedGetGameLeaderboardItemListByCodeByGameIdByProfileId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardItemListByCodeByGameIdByProfileId";

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

        //$objs = CacheUtil.Get<List<GameLeaderboardItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardItemListByCodeByGameIdByProfileId(
                $code
                , $game_id
                , $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
        ) {
            return $this->act->GetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(
                $code
                , $game_id
                , $profile_id
                , $timestamp
            );
        }
        
    public function GetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
        foreach($this->act->GetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(
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
    public function CachedGetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
        return $this->CachedGetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
            , $profile_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp";

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

        //$objs = CacheUtil.Get<List<GameLeaderboardItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(
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
    public function GetGameLeaderboardItemListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetGameLeaderboardItemListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetGameLeaderboardItemByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameLeaderboardItemListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardItemListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameLeaderboardItemListByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameLeaderboardItemListByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardItemListByProfileIdByGameId";

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

        //$objs = CacheUtil.Get<List<GameLeaderboardItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardItemListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameLeaderboardItemByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardItemListByProfileIdByGameIdByTimestamp";

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

        //$objs = CacheUtil.Get<List<GameLeaderboardItem>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardRollup(
    ) {      
        return $this->act->CountGameLeaderboardRollup(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardRollupByUuid(
        $uuid
    ) {      
        return $this->act->CountGameLeaderboardRollupByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardRollupByGameId(
        $game_id
    ) {      
        return $this->act->CountGameLeaderboardRollupByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardRollupByCode(
        $code
    ) {      
        return $this->act->CountGameLeaderboardRollupByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardRollupByCodeByGameId(
        $code
        , $game_id
    ) {      
        return $this->act->CountGameLeaderboardRollupByCodeByGameId(
        $code
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardRollupByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
    ) {      
        return $this->act->CountGameLeaderboardRollupByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {      
        return $this->act->CountGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameLeaderboardRollupByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameLeaderboardRollupByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameLeaderboardRollupListByFilter($filter_obj) {
        return $this->act->BrowseGameLeaderboardRollupListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLeaderboardRollupByUuid($set_type, $obj) {
        return $this->act->SetGameLeaderboardRollupByUuid($set_type, $obj);
    }
               
    public function SetGameLeaderboardRollupByUuidFull($obj) {
        return $this->act->SetGameLeaderboardRollupByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameLeaderboardRollupByUuidByProfileIdByGameIdByTimestampFull($obj) {
        return $this->act->SetGameLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLeaderboardRollupByCode($set_type, $obj) {
        return $this->act->SetGameLeaderboardRollupByCode($set_type, $obj);
    }
               
    public function SetGameLeaderboardRollupByCodeFull($obj) {
        return $this->act->SetGameLeaderboardRollupByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLeaderboardRollupByCodeByGameId($set_type, $obj) {
        return $this->act->SetGameLeaderboardRollupByCodeByGameId($set_type, $obj);
    }
               
    public function SetGameLeaderboardRollupByCodeByGameIdFull($obj) {
        return $this->act->SetGameLeaderboardRollupByCodeByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLeaderboardRollupByCodeByGameIdByProfileId($set_type, $obj) {
        return $this->act->SetGameLeaderboardRollupByCodeByGameIdByProfileId($set_type, $obj);
    }
               
    public function SetGameLeaderboardRollupByCodeByGameIdByProfileIdFull($obj) {
        return $this->act->SetGameLeaderboardRollupByCodeByGameIdByProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestampFull($obj) {
        return $this->act->SetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameLeaderboardRollupByUuid(
        $uuid
    ) {         
        return $this->act->DelGameLeaderboardRollupByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameLeaderboardRollupByCode(
        $code
    ) {         
        return $this->act->DelGameLeaderboardRollupByCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameLeaderboardRollupByCodeByGameId(
        $code
        , $game_id
    ) {         
        return $this->act->DelGameLeaderboardRollupByCodeByGameId(
        $code
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameLeaderboardRollupByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
    ) {         
        return $this->act->DelGameLeaderboardRollupByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {         
        return $this->act->DelGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameLeaderboardRollupByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameLeaderboardRollupByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardRollupList(
        ) {
            return $this->act->GetGameLeaderboardRollupList(
            );
        }
        
    public function GetGameLeaderboardRollup(
    ) {
        foreach($this->act->GetGameLeaderboardRollupList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardRollupList(
    ) {
        return $this->CachedGetGameLeaderboardRollupList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetGameLeaderboardRollupList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardRollupList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardRollupList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardRollupListByUuid(
        $uuid
        ) {
            return $this->act->GetGameLeaderboardRollupListByUuid(
                $uuid
            );
        }
        
    public function GetGameLeaderboardRollupByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameLeaderboardRollupListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardRollupListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameLeaderboardRollupListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameLeaderboardRollupListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardRollupListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardRollupListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardRollupListByGameId(
        $game_id
        ) {
            return $this->act->GetGameLeaderboardRollupListByGameId(
                $game_id
            );
        }
        
    public function GetGameLeaderboardRollupByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameLeaderboardRollupListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardRollupListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameLeaderboardRollupListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameLeaderboardRollupListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardRollupListByGameId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$game_id");
        $sb += "_";
        $sb += $game_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardRollupListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardRollupListByCode(
        $code
        ) {
            return $this->act->GetGameLeaderboardRollupListByCode(
                $code
            );
        }
        
    public function GetGameLeaderboardRollupByCode(
        $code
    ) {
        foreach($this->act->GetGameLeaderboardRollupListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardRollupListByCode(
        $code
    ) {
        return $this->CachedGetGameLeaderboardRollupListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameLeaderboardRollupListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardRollupListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<GameLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardRollupListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardRollupListByCodeByGameId(
        $code
        , $game_id
        ) {
            return $this->act->GetGameLeaderboardRollupListByCodeByGameId(
                $code
                , $game_id
            );
        }
        
    public function GetGameLeaderboardRollupByCodeByGameId(
        $code
        , $game_id
    ) {
        foreach($this->act->GetGameLeaderboardRollupListByCodeByGameId(
        $code
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardRollupListByCodeByGameId(
        $code
        , $game_id
    ) {
        return $this->CachedGetGameLeaderboardRollupListByCodeByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
        );
    }
    */
        
    public function CachedGetGameLeaderboardRollupListByCodeByGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardRollupListByCodeByGameId";

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

        //$objs = CacheUtil.Get<List<GameLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardRollupListByCodeByGameId(
                $code
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardRollupListByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
        ) {
            return $this->act->GetGameLeaderboardRollupListByCodeByGameIdByProfileId(
                $code
                , $game_id
                , $profile_id
            );
        }
        
    public function GetGameLeaderboardRollupByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
        foreach($this->act->GetGameLeaderboardRollupListByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardRollupListByCodeByGameIdByProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
        return $this->CachedGetGameLeaderboardRollupListByCodeByGameIdByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
            , $profile_id
        );
    }
    */
        
    public function CachedGetGameLeaderboardRollupListByCodeByGameIdByProfileId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardRollupListByCodeByGameIdByProfileId";

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

        //$objs = CacheUtil.Get<List<GameLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardRollupListByCodeByGameIdByProfileId(
                $code
                , $game_id
                , $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
        ) {
            return $this->act->GetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
                $code
                , $game_id
                , $profile_id
                , $timestamp
            );
        }
        
    public function GetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
        foreach($this->act->GetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
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
    public function CachedGetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
        return $this->CachedGetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
            , $profile_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp";

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

        //$objs = CacheUtil.Get<List<GameLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
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
    public function GetGameLeaderboardRollupListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetGameLeaderboardRollupListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetGameLeaderboardRollupByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameLeaderboardRollupListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardRollupListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameLeaderboardRollupListByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameLeaderboardRollupListByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardRollupListByProfileIdByGameId";

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

        //$objs = CacheUtil.Get<List<GameLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardRollupListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameLeaderboardRollupByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp";

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

        //$objs = CacheUtil.Get<List<GameLeaderboardRollup>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
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
    public function CountGameProfileStatisticByCode(
        $code
    ) {      
        return $this->act->CountGameProfileStatisticByCode(
        $code
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
    public function CountGameProfileStatisticByCodeByGameId(
        $code
        , $game_id
    ) {      
        return $this->act->CountGameProfileStatisticByCodeByGameId(
        $code
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
    public function CountGameProfileStatisticByCodeByProfileIdByGameId(
        $code
        , $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameProfileStatisticByCodeByProfileIdByGameId(
        $code
        , $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {      
        return $this->act->CountGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(
        $code
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
    public function SetGameProfileStatisticByProfileIdByCode($set_type, $obj) {
        return $this->act->SetGameProfileStatisticByProfileIdByCode($set_type, $obj);
    }
               
    public function SetGameProfileStatisticByProfileIdByCodeFull($obj) {
        return $this->act->SetGameProfileStatisticByProfileIdByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticByProfileIdByCodeByTimestamp($set_type, $obj) {
        return $this->act->SetGameProfileStatisticByProfileIdByCodeByTimestamp($set_type, $obj);
    }
               
    public function SetGameProfileStatisticByProfileIdByCodeByTimestampFull($obj) {
        return $this->act->SetGameProfileStatisticByProfileIdByCodeByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameProfileStatisticByCodeByProfileIdByGameIdByTimestampFull($obj) {
        return $this->act->SetGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticByCodeByProfileIdByGameId($set_type, $obj) {
        return $this->act->SetGameProfileStatisticByCodeByProfileIdByGameId($set_type, $obj);
    }
               
    public function SetGameProfileStatisticByCodeByProfileIdByGameIdFull($obj) {
        return $this->act->SetGameProfileStatisticByCodeByProfileIdByGameId('full', $obj);
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
    public function DelGameProfileStatisticByCodeByGameId(
        $code
        , $game_id
    ) {         
        return $this->act->DelGameProfileStatisticByCodeByGameId(
        $code
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
    public function DelGameProfileStatisticByCodeByProfileIdByGameId(
        $code
        , $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameProfileStatisticByCodeByProfileIdByGameId(
        $code
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
    public function GetGameProfileStatisticListByCode(
        $code
        ) {
            return $this->act->GetGameProfileStatisticListByCode(
                $code
            );
        }
        
    public function GetGameProfileStatisticByCode(
        $code
    ) {
        foreach($this->act->GetGameProfileStatisticListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticListByCode(
        $code
    ) {
        return $this->CachedGetGameProfileStatisticListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameProfileStatisticListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticListByCode";

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
            $objs = $this->GetGameProfileStatisticListByCode(
                $code
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
    public function GetGameProfileStatisticListByCodeByGameId(
        $code
        , $game_id
        ) {
            return $this->act->GetGameProfileStatisticListByCodeByGameId(
                $code
                , $game_id
            );
        }
        
    public function GetGameProfileStatisticByCodeByGameId(
        $code
        , $game_id
    ) {
        foreach($this->act->GetGameProfileStatisticListByCodeByGameId(
        $code
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticListByCodeByGameId(
        $code
        , $game_id
    ) {
        return $this->CachedGetGameProfileStatisticListByCodeByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileStatisticListByCodeByGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticListByCodeByGameId";

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
            $objs = $this->GetGameProfileStatisticListByCodeByGameId(
                $code
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
    public function GetGameProfileStatisticListByCodeByProfileIdByGameId(
        $code
        , $profile_id
        , $game_id
        ) {
            return $this->act->GetGameProfileStatisticListByCodeByProfileIdByGameId(
                $code
                , $profile_id
                , $game_id
            );
        }
        
    public function GetGameProfileStatisticByCodeByProfileIdByGameId(
        $code
        , $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameProfileStatisticListByCodeByProfileIdByGameId(
        $code
        , $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticListByCodeByProfileIdByGameId(
        $code
        , $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameProfileStatisticListByCodeByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileStatisticListByCodeByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticListByCodeByProfileIdByGameId";

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
            $objs = $this->GetGameProfileStatisticListByCodeByProfileIdByGameId(
                $code
                , $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(
                $code
                , $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(
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
    public function CachedGetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp";

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
            $objs = $this->GetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(
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
    public function CountGameStatisticMetaByGameId(
        $game_id
    ) {      
        return $this->act->CountGameStatisticMetaByGameId(
        $game_id
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
    public function CountGameProfileStatisticItem(
    ) {      
        return $this->act->CountGameProfileStatisticItem(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticItemByUuid(
        $uuid
    ) {      
        return $this->act->CountGameProfileStatisticItemByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticItemByCode(
        $code
    ) {      
        return $this->act->CountGameProfileStatisticItemByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticItemByGameId(
        $game_id
    ) {      
        return $this->act->CountGameProfileStatisticItemByGameId(
        $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticItemByCodeByGameId(
        $code
        , $game_id
    ) {      
        return $this->act->CountGameProfileStatisticItemByCodeByGameId(
        $code
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticItemByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameProfileStatisticItemByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticItemByCodeByProfileIdByGameId(
        $code
        , $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameProfileStatisticItemByCodeByProfileIdByGameId(
        $code
        , $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {      
        return $this->act->CountGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseGameProfileStatisticItemListByFilter($filter_obj) {
        return $this->act->BrowseGameProfileStatisticItemListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticItemByUuid($set_type, $obj) {
        return $this->act->SetGameProfileStatisticItemByUuid($set_type, $obj);
    }
               
    public function SetGameProfileStatisticItemByUuidFull($obj) {
        return $this->act->SetGameProfileStatisticItemByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticItemByUuidByProfileIdByGameIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameProfileStatisticItemByUuidByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameProfileStatisticItemByUuidByProfileIdByGameIdByTimestampFull($obj) {
        return $this->act->SetGameProfileStatisticItemByUuidByProfileIdByGameIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticItemByProfileIdByCode($set_type, $obj) {
        return $this->act->SetGameProfileStatisticItemByProfileIdByCode($set_type, $obj);
    }
               
    public function SetGameProfileStatisticItemByProfileIdByCodeFull($obj) {
        return $this->act->SetGameProfileStatisticItemByProfileIdByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticItemByProfileIdByCodeByTimestamp($set_type, $obj) {
        return $this->act->SetGameProfileStatisticItemByProfileIdByCodeByTimestamp($set_type, $obj);
    }
               
    public function SetGameProfileStatisticItemByProfileIdByCodeByTimestampFull($obj) {
        return $this->act->SetGameProfileStatisticItemByProfileIdByCodeByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestampFull($obj) {
        return $this->act->SetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileStatisticItemByCodeByProfileIdByGameId($set_type, $obj) {
        return $this->act->SetGameProfileStatisticItemByCodeByProfileIdByGameId($set_type, $obj);
    }
               
    public function SetGameProfileStatisticItemByCodeByProfileIdByGameIdFull($obj) {
        return $this->act->SetGameProfileStatisticItemByCodeByProfileIdByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileStatisticItemByUuid(
        $uuid
    ) {         
        return $this->act->DelGameProfileStatisticItemByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileStatisticItemByCodeByGameId(
        $code
        , $game_id
    ) {         
        return $this->act->DelGameProfileStatisticItemByCodeByGameId(
        $code
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileStatisticItemByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameProfileStatisticItemByProfileIdByGameId(
        $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileStatisticItemByCodeByProfileIdByGameId(
        $code
        , $profile_id
        , $game_id
    ) {         
        return $this->act->DelGameProfileStatisticItemByCodeByProfileIdByGameId(
        $code
        , $profile_id
        , $game_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticItemListByUuid(
        $uuid
        ) {
            return $this->act->GetGameProfileStatisticItemListByUuid(
                $uuid
            );
        }
        
    public function GetGameProfileStatisticItemByUuid(
        $uuid
    ) {
        foreach($this->act->GetGameProfileStatisticItemListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticItemListByUuid(
        $uuid
    ) {
        return $this->CachedGetGameProfileStatisticItemListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetGameProfileStatisticItemListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticItemListByUuid";

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
            $objs = $this->GetGameProfileStatisticItemListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticItemListByCode(
        $code
        ) {
            return $this->act->GetGameProfileStatisticItemListByCode(
                $code
            );
        }
        
    public function GetGameProfileStatisticItemByCode(
        $code
    ) {
        foreach($this->act->GetGameProfileStatisticItemListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticItemListByCode(
        $code
    ) {
        return $this->CachedGetGameProfileStatisticItemListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameProfileStatisticItemListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticItemListByCode";

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
            $objs = $this->GetGameProfileStatisticItemListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticItemListByGameId(
        $game_id
        ) {
            return $this->act->GetGameProfileStatisticItemListByGameId(
                $game_id
            );
        }
        
    public function GetGameProfileStatisticItemByGameId(
        $game_id
    ) {
        foreach($this->act->GetGameProfileStatisticItemListByGameId(
        $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticItemListByGameId(
        $game_id
    ) {
        return $this->CachedGetGameProfileStatisticItemListByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileStatisticItemListByGameId(
        $overrideCache
        , $cacheHours
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticItemListByGameId";

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
            $objs = $this->GetGameProfileStatisticItemListByGameId(
                $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticItemListByCodeByGameId(
        $code
        , $game_id
        ) {
            return $this->act->GetGameProfileStatisticItemListByCodeByGameId(
                $code
                , $game_id
            );
        }
        
    public function GetGameProfileStatisticItemByCodeByGameId(
        $code
        , $game_id
    ) {
        foreach($this->act->GetGameProfileStatisticItemListByCodeByGameId(
        $code
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticItemListByCodeByGameId(
        $code
        , $game_id
    ) {
        return $this->CachedGetGameProfileStatisticItemListByCodeByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileStatisticItemListByCodeByGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticItemListByCodeByGameId";

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
            $objs = $this->GetGameProfileStatisticItemListByCodeByGameId(
                $code
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticItemListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) {
            return $this->act->GetGameProfileStatisticItemListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
        }
        
    public function GetGameProfileStatisticItemByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameProfileStatisticItemListByProfileIdByGameId(
        $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticItemListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameProfileStatisticItemListByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileStatisticItemListByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticItemListByProfileIdByGameId";

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
            $objs = $this->GetGameProfileStatisticItemListByProfileIdByGameId(
                $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameProfileStatisticItemByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp";

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
            $objs = $this->GetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
                $profile_id
                , $game_id
                , $timestamp
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticItemListByCodeByProfileIdByGameId(
        $code
        , $profile_id
        , $game_id
        ) {
            return $this->act->GetGameProfileStatisticItemListByCodeByProfileIdByGameId(
                $code
                , $profile_id
                , $game_id
            );
        }
        
    public function GetGameProfileStatisticItemByCodeByProfileIdByGameId(
        $code
        , $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameProfileStatisticItemListByCodeByProfileIdByGameId(
        $code
        , $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileStatisticItemListByCodeByProfileIdByGameId(
        $code
        , $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameProfileStatisticItemListByCodeByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileStatisticItemListByCodeByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticItemListByCodeByProfileIdByGameId";

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
            $objs = $this->GetGameProfileStatisticItemListByCodeByProfileIdByGameId(
                $code
                , $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(
                $code
                , $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(
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
    public function CachedGetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp";

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
            $objs = $this->GetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(
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
    public function CountGameLevelByGameId(
        $game_id
    ) {      
        return $this->act->CountGameLevelByGameId(
        $game_id
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
    public function CountGameProfileAchievementByProfileIdByCode(
        $profile_id
        , $code
    ) {      
        return $this->act->CountGameProfileAchievementByProfileIdByCode(
        $profile_id
        , $code
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
    public function CountGameProfileAchievementByCodeByProfileIdByGameId(
        $code
        , $profile_id
        , $game_id
    ) {      
        return $this->act->CountGameProfileAchievementByCodeByProfileIdByGameId(
        $code
        , $profile_id
        , $game_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {      
        return $this->act->CountGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(
        $code
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
    public function SetGameProfileAchievementByUuidByCode($set_type, $obj) {
        return $this->act->SetGameProfileAchievementByUuidByCode($set_type, $obj);
    }
               
    public function SetGameProfileAchievementByUuidByCodeFull($obj) {
        return $this->act->SetGameProfileAchievementByUuidByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAchievementByProfileIdByCode($set_type, $obj) {
        return $this->act->SetGameProfileAchievementByProfileIdByCode($set_type, $obj);
    }
               
    public function SetGameProfileAchievementByProfileIdByCodeFull($obj) {
        return $this->act->SetGameProfileAchievementByProfileIdByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAchievementByCodeByProfileIdByGameId($set_type, $obj) {
        return $this->act->SetGameProfileAchievementByCodeByProfileIdByGameId($set_type, $obj);
    }
               
    public function SetGameProfileAchievementByCodeByProfileIdByGameIdFull($obj) {
        return $this->act->SetGameProfileAchievementByCodeByProfileIdByGameId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp($set_type, $obj) {
        return $this->act->SetGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
               
    public function SetGameProfileAchievementByCodeByProfileIdByGameIdByTimestampFull($obj) {
        return $this->act->SetGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp('full', $obj);
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
    public function DelGameProfileAchievementByProfileIdByCode(
        $profile_id
        , $code
    ) {         
        return $this->act->DelGameProfileAchievementByProfileIdByCode(
        $profile_id
        , $code
        );
    }
#------------------------------------------------------------------------------                    
    public function DelGameProfileAchievementByUuidByCode(
        $uuid
        , $code
    ) {         
        return $this->act->DelGameProfileAchievementByUuidByCode(
        $uuid
        , $code
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
    public function GetGameProfileAchievementListByProfileIdByCode(
        $profile_id
        , $code
        ) {
            return $this->act->GetGameProfileAchievementListByProfileIdByCode(
                $profile_id
                , $code
            );
        }
        
    public function GetGameProfileAchievementByProfileIdByCode(
        $profile_id
        , $code
    ) {
        foreach($this->act->GetGameProfileAchievementListByProfileIdByCode(
        $profile_id
        , $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListByProfileIdByCode(
        $profile_id
        , $code
    ) {
        return $this->CachedGetGameProfileAchievementListByProfileIdByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $code
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListByProfileIdByCode(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListByProfileIdByCode";

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
            $objs = $this->GetGameProfileAchievementListByProfileIdByCode(
                $profile_id
                , $code
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
    public function GetGameProfileAchievementListByCode(
        $code
        ) {
            return $this->act->GetGameProfileAchievementListByCode(
                $code
            );
        }
        
    public function GetGameProfileAchievementByCode(
        $code
    ) {
        foreach($this->act->GetGameProfileAchievementListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListByCode(
        $code
    ) {
        return $this->CachedGetGameProfileAchievementListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListByCode";

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
            $objs = $this->GetGameProfileAchievementListByCode(
                $code
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
    public function GetGameProfileAchievementListByCodeByGameId(
        $code
        , $game_id
        ) {
            return $this->act->GetGameProfileAchievementListByCodeByGameId(
                $code
                , $game_id
            );
        }
        
    public function GetGameProfileAchievementByCodeByGameId(
        $code
        , $game_id
    ) {
        foreach($this->act->GetGameProfileAchievementListByCodeByGameId(
        $code
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListByCodeByGameId(
        $code
        , $game_id
    ) {
        return $this->CachedGetGameProfileAchievementListByCodeByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListByCodeByGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListByCodeByGameId";

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
            $objs = $this->GetGameProfileAchievementListByCodeByGameId(
                $code
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
    public function GetGameProfileAchievementListByCodeByProfileIdByGameId(
        $code
        , $profile_id
        , $game_id
        ) {
            return $this->act->GetGameProfileAchievementListByCodeByProfileIdByGameId(
                $code
                , $profile_id
                , $game_id
            );
        }
        
    public function GetGameProfileAchievementByCodeByProfileIdByGameId(
        $code
        , $profile_id
        , $game_id
    ) {
        foreach($this->act->GetGameProfileAchievementListByCodeByProfileIdByGameId(
        $code
        , $profile_id
        , $game_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetGameProfileAchievementListByCodeByProfileIdByGameId(
        $code
        , $profile_id
        , $game_id
    ) {
        return $this->CachedGetGameProfileAchievementListByCodeByProfileIdByGameId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $profile_id
            , $game_id
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListByCodeByProfileIdByGameId(
        $overrideCache
        , $cacheHours
        , $code
        , $profile_id
        , $game_id
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListByCodeByProfileIdByGameId";

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
            $objs = $this->GetGameProfileAchievementListByCodeByProfileIdByGameId(
                $code
                , $profile_id
                , $game_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
        ) {
            return $this->act->GetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(
                $code
                , $profile_id
                , $game_id
                , $timestamp
            );
        }
        
    public function GetGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        foreach($this->act->GetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(
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
    public function CachedGetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->CachedGetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
    */
        
    public function CachedGetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(
        $overrideCache
        , $cacheHours
        , $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $objs = array();

        $method_name = "CachedGetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp";

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
            $objs = $this->GetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(
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
    public function CountGameAchievementMetaByGameId(
        $game_id
    ) {      
        return $this->act->CountGameAchievementMetaByGameId(
        $game_id
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
    public function CountProfileReward(
    ) {      
        return $this->act->CountProfileReward(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileRewardByUuid(
        $uuid
    ) {      
        return $this->act->CountProfileRewardByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileRewardByProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileRewardByProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileRewardByRewardId(
        $reward_id
    ) {      
        return $this->act->CountProfileRewardByRewardId(
        $reward_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileRewardByProfileIdByRewardId(
        $profile_id
        , $reward_id
    ) {      
        return $this->act->CountProfileRewardByProfileIdByRewardId(
        $profile_id
        , $reward_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileRewardByProfileIdByChannelId(
        $profile_id
        , $channel_id
    ) {      
        return $this->act->CountProfileRewardByProfileIdByChannelId(
        $profile_id
        , $channel_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileRewardByProfileIdByChannelIdByRewardId(
        $profile_id
        , $channel_id
        , $reward_id
    ) {      
        return $this->act->CountProfileRewardByProfileIdByChannelIdByRewardId(
        $profile_id
        , $channel_id
        , $reward_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileRewardListByFilter($filter_obj) {
        return $this->act->BrowseProfileRewardListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileRewardByUuid($set_type, $obj) {
        return $this->act->SetProfileRewardByUuid($set_type, $obj);
    }
               
    public function SetProfileRewardByUuidFull($obj) {
        return $this->act->SetProfileRewardByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileRewardByProfileIdByChannelIdByRewardId($set_type, $obj) {
        return $this->act->SetProfileRewardByProfileIdByChannelIdByRewardId($set_type, $obj);
    }
               
    public function SetProfileRewardByProfileIdByChannelIdByRewardIdFull($obj) {
        return $this->act->SetProfileRewardByProfileIdByChannelIdByRewardId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileRewardByUuid(
        $uuid
    ) {         
        return $this->act->DelProfileRewardByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileRewardByProfileIdByRewardId(
        $profile_id
        , $reward_id
    ) {         
        return $this->act->DelProfileRewardByProfileIdByRewardId(
        $profile_id
        , $reward_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileRewardListByUuid(
        $uuid
        ) {
            return $this->act->GetProfileRewardListByUuid(
                $uuid
            );
        }
        
    public function GetProfileRewardByUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileRewardListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileRewardListByUuid(
        $uuid
    ) {
        return $this->CachedGetProfileRewardListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileRewardListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileRewardListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileReward>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileRewardListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileRewardListByProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileRewardListByProfileId(
                $profile_id
            );
        }
        
    public function GetProfileRewardByProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileRewardListByProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileRewardListByProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileRewardListByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileRewardListByProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileRewardListByProfileId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileReward>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileRewardListByProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileRewardListByRewardId(
        $reward_id
        ) {
            return $this->act->GetProfileRewardListByRewardId(
                $reward_id
            );
        }
        
    public function GetProfileRewardByRewardId(
        $reward_id
    ) {
        foreach($this->act->GetProfileRewardListByRewardId(
        $reward_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileRewardListByRewardId(
        $reward_id
    ) {
        return $this->CachedGetProfileRewardListByRewardId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $reward_id
        );
    }
    */
        
    public function CachedGetProfileRewardListByRewardId(
        $overrideCache
        , $cacheHours
        , $reward_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileRewardListByRewardId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$reward_id");
        $sb += "_";
        $sb += $reward_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileReward>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileRewardListByRewardId(
                $reward_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileRewardListByProfileIdByRewardId(
        $profile_id
        , $reward_id
        ) {
            return $this->act->GetProfileRewardListByProfileIdByRewardId(
                $profile_id
                , $reward_id
            );
        }
        
    public function GetProfileRewardByProfileIdByRewardId(
        $profile_id
        , $reward_id
    ) {
        foreach($this->act->GetProfileRewardListByProfileIdByRewardId(
        $profile_id
        , $reward_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileRewardListByProfileIdByRewardId(
        $profile_id
        , $reward_id
    ) {
        return $this->CachedGetProfileRewardListByProfileIdByRewardId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $reward_id
        );
    }
    */
        
    public function CachedGetProfileRewardListByProfileIdByRewardId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $reward_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileRewardListByProfileIdByRewardId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$reward_id");
        $sb += "_";
        $sb += $reward_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileReward>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileRewardListByProfileIdByRewardId(
                $profile_id
                , $reward_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileRewardListByProfileIdByChannelId(
        $profile_id
        , $channel_id
        ) {
            return $this->act->GetProfileRewardListByProfileIdByChannelId(
                $profile_id
                , $channel_id
            );
        }
        
    public function GetProfileRewardByProfileIdByChannelId(
        $profile_id
        , $channel_id
    ) {
        foreach($this->act->GetProfileRewardListByProfileIdByChannelId(
        $profile_id
        , $channel_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileRewardListByProfileIdByChannelId(
        $profile_id
        , $channel_id
    ) {
        return $this->CachedGetProfileRewardListByProfileIdByChannelId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $channel_id
        );
    }
    */
        
    public function CachedGetProfileRewardListByProfileIdByChannelId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $channel_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileRewardListByProfileIdByChannelId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$channel_id");
        $sb += "_";
        $sb += $channel_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileReward>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileRewardListByProfileIdByChannelId(
                $profile_id
                , $channel_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileRewardListByProfileIdByChannelIdByRewardId(
        $profile_id
        , $channel_id
        , $reward_id
        ) {
            return $this->act->GetProfileRewardListByProfileIdByChannelIdByRewardId(
                $profile_id
                , $channel_id
                , $reward_id
            );
        }
        
    public function GetProfileRewardByProfileIdByChannelIdByRewardId(
        $profile_id
        , $channel_id
        , $reward_id
    ) {
        foreach($this->act->GetProfileRewardListByProfileIdByChannelIdByRewardId(
        $profile_id
        , $channel_id
        , $reward_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileRewardListByProfileIdByChannelIdByRewardId(
        $profile_id
        , $channel_id
        , $reward_id
    ) {
        return $this->CachedGetProfileRewardListByProfileIdByChannelIdByRewardId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $channel_id
            , $reward_id
        );
    }
    */
        
    public function CachedGetProfileRewardListByProfileIdByChannelIdByRewardId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $channel_id
        , $reward_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileRewardListByProfileIdByChannelIdByRewardId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$channel_id");
        $sb += "_";
        $sb += $channel_id;
        $sb += "_";
        $sb += strtolower("$reward_id");
        $sb += "_";
        $sb += $reward_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileReward>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileRewardListByProfileIdByChannelIdByRewardId(
                $profile_id
                , $channel_id
                , $reward_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountCoupon(
    ) {      
        return $this->act->CountCoupon(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountCouponByUuid(
        $uuid
    ) {      
        return $this->act->CountCouponByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountCouponByCode(
        $code
    ) {      
        return $this->act->CountCouponByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountCouponByName(
        $name
    ) {      
        return $this->act->CountCouponByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountCouponByOrgId(
        $org_id
    ) {      
        return $this->act->CountCouponByOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseCouponListByFilter($filter_obj) {
        return $this->act->BrowseCouponListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetCouponByUuid($set_type, $obj) {
        return $this->act->SetCouponByUuid($set_type, $obj);
    }
               
    public function SetCouponByUuidFull($obj) {
        return $this->act->SetCouponByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelCouponByUuid(
        $uuid
    ) {         
        return $this->act->DelCouponByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelCouponByOrgId(
        $org_id
    ) {         
        return $this->act->DelCouponByOrgId(
        $org_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetCouponListByUuid(
        $uuid
        ) {
            return $this->act->GetCouponListByUuid(
                $uuid
            );
        }
        
    public function GetCouponByUuid(
        $uuid
    ) {
        foreach($this->act->GetCouponListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetCouponListByUuid(
        $uuid
    ) {
        return $this->CachedGetCouponListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetCouponListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetCouponListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Coupon>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetCouponListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetCouponListByCode(
        $code
        ) {
            return $this->act->GetCouponListByCode(
                $code
            );
        }
        
    public function GetCouponByCode(
        $code
    ) {
        foreach($this->act->GetCouponListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetCouponListByCode(
        $code
    ) {
        return $this->CachedGetCouponListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetCouponListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetCouponListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Coupon>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetCouponListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetCouponListByName(
        $name
        ) {
            return $this->act->GetCouponListByName(
                $name
            );
        }
        
    public function GetCouponByName(
        $name
    ) {
        foreach($this->act->GetCouponListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetCouponListByName(
        $name
    ) {
        return $this->CachedGetCouponListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetCouponListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetCouponListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Coupon>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetCouponListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetCouponListByOrgId(
        $org_id
        ) {
            return $this->act->GetCouponListByOrgId(
                $org_id
            );
        }
        
    public function GetCouponByOrgId(
        $org_id
    ) {
        foreach($this->act->GetCouponListByOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetCouponListByOrgId(
        $org_id
    ) {
        return $this->CachedGetCouponListByOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetCouponListByOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetCouponListByOrgId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Coupon>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetCouponListByOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountProfileCoupon(
    ) {      
        return $this->act->CountProfileCoupon(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileCouponByUuid(
        $uuid
    ) {      
        return $this->act->CountProfileCouponByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileCouponByProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileCouponByProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileCouponListByFilter($filter_obj) {
        return $this->act->BrowseProfileCouponListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileCouponByUuid($set_type, $obj) {
        return $this->act->SetProfileCouponByUuid($set_type, $obj);
    }
               
    public function SetProfileCouponByUuidFull($obj) {
        return $this->act->SetProfileCouponByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileCouponByUuid(
        $uuid
    ) {         
        return $this->act->DelProfileCouponByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileCouponByProfileId(
        $profile_id
    ) {         
        return $this->act->DelProfileCouponByProfileId(
        $profile_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileCouponListByUuid(
        $uuid
        ) {
            return $this->act->GetProfileCouponListByUuid(
                $uuid
            );
        }
        
    public function GetProfileCouponByUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileCouponListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileCouponListByUuid(
        $uuid
    ) {
        return $this->CachedGetProfileCouponListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileCouponListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileCouponListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileCoupon>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileCouponListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileCouponListByProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileCouponListByProfileId(
                $profile_id
            );
        }
        
    public function GetProfileCouponByProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileCouponListByProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileCouponListByProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileCouponListByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileCouponListByProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileCouponListByProfileId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileCoupon>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileCouponListByProfileId(
                $profile_id
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
    public function CountReward(
    ) {      
        return $this->act->CountReward(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardByUuid(
        $uuid
    ) {      
        return $this->act->CountRewardByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardByCode(
        $code
    ) {      
        return $this->act->CountRewardByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardByName(
        $name
    ) {      
        return $this->act->CountRewardByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardByOrgId(
        $org_id
    ) {      
        return $this->act->CountRewardByOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardByChannelId(
        $channel_id
    ) {      
        return $this->act->CountRewardByChannelId(
        $channel_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardByOrgIdByChannelId(
        $org_id
        , $channel_id
    ) {      
        return $this->act->CountRewardByOrgIdByChannelId(
        $org_id
        , $channel_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseRewardListByFilter($filter_obj) {
        return $this->act->BrowseRewardListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetRewardByUuid($set_type, $obj) {
        return $this->act->SetRewardByUuid($set_type, $obj);
    }
               
    public function SetRewardByUuidFull($obj) {
        return $this->act->SetRewardByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelRewardByUuid(
        $uuid
    ) {         
        return $this->act->DelRewardByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelRewardByOrgIdByChannelId(
        $org_id
        , $channel_id
    ) {         
        return $this->act->DelRewardByOrgIdByChannelId(
        $org_id
        , $channel_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetRewardListByUuid(
        $uuid
        ) {
            return $this->act->GetRewardListByUuid(
                $uuid
            );
        }
        
    public function GetRewardByUuid(
        $uuid
    ) {
        foreach($this->act->GetRewardListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardListByUuid(
        $uuid
    ) {
        return $this->CachedGetRewardListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetRewardListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetRewardListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Reward>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardListByCode(
        $code
        ) {
            return $this->act->GetRewardListByCode(
                $code
            );
        }
        
    public function GetRewardByCode(
        $code
    ) {
        foreach($this->act->GetRewardListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardListByCode(
        $code
    ) {
        return $this->CachedGetRewardListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetRewardListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetRewardListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Reward>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardListByName(
        $name
        ) {
            return $this->act->GetRewardListByName(
                $name
            );
        }
        
    public function GetRewardByName(
        $name
    ) {
        foreach($this->act->GetRewardListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardListByName(
        $name
    ) {
        return $this->CachedGetRewardListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetRewardListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetRewardListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Reward>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardListByOrgId(
        $org_id
        ) {
            return $this->act->GetRewardListByOrgId(
                $org_id
            );
        }
        
    public function GetRewardByOrgId(
        $org_id
    ) {
        foreach($this->act->GetRewardListByOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardListByOrgId(
        $org_id
    ) {
        return $this->CachedGetRewardListByOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetRewardListByOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetRewardListByOrgId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Reward>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardListByOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardListByChannelId(
        $channel_id
        ) {
            return $this->act->GetRewardListByChannelId(
                $channel_id
            );
        }
        
    public function GetRewardByChannelId(
        $channel_id
    ) {
        foreach($this->act->GetRewardListByChannelId(
        $channel_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardListByChannelId(
        $channel_id
    ) {
        return $this->CachedGetRewardListByChannelId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
        );
    }
    */
        
    public function CachedGetRewardListByChannelId(
        $overrideCache
        , $cacheHours
        , $channel_id
    ) {

        $objs = array();

        $method_name = "CachedGetRewardListByChannelId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$channel_id");
        $sb += "_";
        $sb += $channel_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Reward>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardListByChannelId(
                $channel_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardListByOrgIdByChannelId(
        $org_id
        , $channel_id
        ) {
            return $this->act->GetRewardListByOrgIdByChannelId(
                $org_id
                , $channel_id
            );
        }
        
    public function GetRewardByOrgIdByChannelId(
        $org_id
        , $channel_id
    ) {
        foreach($this->act->GetRewardListByOrgIdByChannelId(
        $org_id
        , $channel_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardListByOrgIdByChannelId(
        $org_id
        , $channel_id
    ) {
        return $this->CachedGetRewardListByOrgIdByChannelId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
            , $channel_id
        );
    }
    */
        
    public function CachedGetRewardListByOrgIdByChannelId(
        $overrideCache
        , $cacheHours
        , $org_id
        , $channel_id
    ) {

        $objs = array();

        $method_name = "CachedGetRewardListByOrgIdByChannelId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;
        $sb += "_";
        $sb += strtolower("$channel_id");
        $sb += "_";
        $sb += $channel_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Reward>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardListByOrgIdByChannelId(
                $org_id
                , $channel_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountRewardType(
    ) {      
        return $this->act->CountRewardType(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardTypeByUuid(
        $uuid
    ) {      
        return $this->act->CountRewardTypeByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardTypeByCode(
        $code
    ) {      
        return $this->act->CountRewardTypeByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardTypeByName(
        $name
    ) {      
        return $this->act->CountRewardTypeByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardTypeByType(
        $type
    ) {      
        return $this->act->CountRewardTypeByType(
        $type
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseRewardTypeListByFilter($filter_obj) {
        return $this->act->BrowseRewardTypeListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetRewardTypeByUuid($set_type, $obj) {
        return $this->act->SetRewardTypeByUuid($set_type, $obj);
    }
               
    public function SetRewardTypeByUuidFull($obj) {
        return $this->act->SetRewardTypeByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelRewardTypeByUuid(
        $uuid
    ) {         
        return $this->act->DelRewardTypeByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetRewardTypeListByUuid(
        $uuid
        ) {
            return $this->act->GetRewardTypeListByUuid(
                $uuid
            );
        }
        
    public function GetRewardTypeByUuid(
        $uuid
    ) {
        foreach($this->act->GetRewardTypeListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardTypeListByUuid(
        $uuid
    ) {
        return $this->CachedGetRewardTypeListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetRewardTypeListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetRewardTypeListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardTypeListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardTypeListByCode(
        $code
        ) {
            return $this->act->GetRewardTypeListByCode(
                $code
            );
        }
        
    public function GetRewardTypeByCode(
        $code
    ) {
        foreach($this->act->GetRewardTypeListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardTypeListByCode(
        $code
    ) {
        return $this->CachedGetRewardTypeListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetRewardTypeListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetRewardTypeListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardTypeListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardTypeListByName(
        $name
        ) {
            return $this->act->GetRewardTypeListByName(
                $name
            );
        }
        
    public function GetRewardTypeByName(
        $name
    ) {
        foreach($this->act->GetRewardTypeListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardTypeListByName(
        $name
    ) {
        return $this->CachedGetRewardTypeListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetRewardTypeListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetRewardTypeListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardTypeListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardTypeListByType(
        $type
        ) {
            return $this->act->GetRewardTypeListByType(
                $type
            );
        }
        
    public function GetRewardTypeByType(
        $type
    ) {
        foreach($this->act->GetRewardTypeListByType(
        $type
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardTypeListByType(
        $type
    ) {
        return $this->CachedGetRewardTypeListByType(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $type
        );
    }
    */
        
    public function CachedGetRewardTypeListByType(
        $overrideCache
        , $cacheHours
        , $type
    ) {

        $objs = array();

        $method_name = "CachedGetRewardTypeListByType";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$type");
        $sb += "_";
        $sb += $type;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardTypeListByType(
                $type
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountRewardCondition(
    ) {      
        return $this->act->CountRewardCondition(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardConditionByUuid(
        $uuid
    ) {      
        return $this->act->CountRewardConditionByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardConditionByCode(
        $code
    ) {      
        return $this->act->CountRewardConditionByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardConditionByName(
        $name
    ) {      
        return $this->act->CountRewardConditionByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardConditionByOrgId(
        $org_id
    ) {      
        return $this->act->CountRewardConditionByOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardConditionByChannelId(
        $channel_id
    ) {      
        return $this->act->CountRewardConditionByChannelId(
        $channel_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardConditionByOrgIdByChannelId(
        $org_id
        , $channel_id
    ) {      
        return $this->act->CountRewardConditionByOrgIdByChannelId(
        $org_id
        , $channel_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardConditionByOrgIdByChannelIdByRewardId(
        $org_id
        , $channel_id
        , $reward_id
    ) {      
        return $this->act->CountRewardConditionByOrgIdByChannelIdByRewardId(
        $org_id
        , $channel_id
        , $reward_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardConditionByRewardId(
        $reward_id
    ) {      
        return $this->act->CountRewardConditionByRewardId(
        $reward_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseRewardConditionListByFilter($filter_obj) {
        return $this->act->BrowseRewardConditionListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetRewardConditionByUuid($set_type, $obj) {
        return $this->act->SetRewardConditionByUuid($set_type, $obj);
    }
               
    public function SetRewardConditionByUuidFull($obj) {
        return $this->act->SetRewardConditionByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelRewardConditionByUuid(
        $uuid
    ) {         
        return $this->act->DelRewardConditionByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelRewardConditionByOrgIdByChannelIdByRewardId(
        $org_id
        , $channel_id
        , $reward_id
    ) {         
        return $this->act->DelRewardConditionByOrgIdByChannelIdByRewardId(
        $org_id
        , $channel_id
        , $reward_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetRewardConditionListByUuid(
        $uuid
        ) {
            return $this->act->GetRewardConditionListByUuid(
                $uuid
            );
        }
        
    public function GetRewardConditionByUuid(
        $uuid
    ) {
        foreach($this->act->GetRewardConditionListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardConditionListByUuid(
        $uuid
    ) {
        return $this->CachedGetRewardConditionListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetRewardConditionListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetRewardConditionListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardCondition>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardConditionListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardConditionListByCode(
        $code
        ) {
            return $this->act->GetRewardConditionListByCode(
                $code
            );
        }
        
    public function GetRewardConditionByCode(
        $code
    ) {
        foreach($this->act->GetRewardConditionListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardConditionListByCode(
        $code
    ) {
        return $this->CachedGetRewardConditionListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetRewardConditionListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetRewardConditionListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardCondition>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardConditionListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardConditionListByName(
        $name
        ) {
            return $this->act->GetRewardConditionListByName(
                $name
            );
        }
        
    public function GetRewardConditionByName(
        $name
    ) {
        foreach($this->act->GetRewardConditionListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardConditionListByName(
        $name
    ) {
        return $this->CachedGetRewardConditionListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetRewardConditionListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetRewardConditionListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardCondition>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardConditionListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardConditionListByOrgId(
        $org_id
        ) {
            return $this->act->GetRewardConditionListByOrgId(
                $org_id
            );
        }
        
    public function GetRewardConditionByOrgId(
        $org_id
    ) {
        foreach($this->act->GetRewardConditionListByOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardConditionListByOrgId(
        $org_id
    ) {
        return $this->CachedGetRewardConditionListByOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetRewardConditionListByOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetRewardConditionListByOrgId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardCondition>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardConditionListByOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardConditionListByChannelId(
        $channel_id
        ) {
            return $this->act->GetRewardConditionListByChannelId(
                $channel_id
            );
        }
        
    public function GetRewardConditionByChannelId(
        $channel_id
    ) {
        foreach($this->act->GetRewardConditionListByChannelId(
        $channel_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardConditionListByChannelId(
        $channel_id
    ) {
        return $this->CachedGetRewardConditionListByChannelId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
        );
    }
    */
        
    public function CachedGetRewardConditionListByChannelId(
        $overrideCache
        , $cacheHours
        , $channel_id
    ) {

        $objs = array();

        $method_name = "CachedGetRewardConditionListByChannelId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$channel_id");
        $sb += "_";
        $sb += $channel_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardCondition>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardConditionListByChannelId(
                $channel_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardConditionListByOrgIdByChannelId(
        $org_id
        , $channel_id
        ) {
            return $this->act->GetRewardConditionListByOrgIdByChannelId(
                $org_id
                , $channel_id
            );
        }
        
    public function GetRewardConditionByOrgIdByChannelId(
        $org_id
        , $channel_id
    ) {
        foreach($this->act->GetRewardConditionListByOrgIdByChannelId(
        $org_id
        , $channel_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardConditionListByOrgIdByChannelId(
        $org_id
        , $channel_id
    ) {
        return $this->CachedGetRewardConditionListByOrgIdByChannelId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
            , $channel_id
        );
    }
    */
        
    public function CachedGetRewardConditionListByOrgIdByChannelId(
        $overrideCache
        , $cacheHours
        , $org_id
        , $channel_id
    ) {

        $objs = array();

        $method_name = "CachedGetRewardConditionListByOrgIdByChannelId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;
        $sb += "_";
        $sb += strtolower("$channel_id");
        $sb += "_";
        $sb += $channel_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardCondition>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardConditionListByOrgIdByChannelId(
                $org_id
                , $channel_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardConditionListByOrgIdByChannelIdByRewardId(
        $org_id
        , $channel_id
        , $reward_id
        ) {
            return $this->act->GetRewardConditionListByOrgIdByChannelIdByRewardId(
                $org_id
                , $channel_id
                , $reward_id
            );
        }
        
    public function GetRewardConditionByOrgIdByChannelIdByRewardId(
        $org_id
        , $channel_id
        , $reward_id
    ) {
        foreach($this->act->GetRewardConditionListByOrgIdByChannelIdByRewardId(
        $org_id
        , $channel_id
        , $reward_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardConditionListByOrgIdByChannelIdByRewardId(
        $org_id
        , $channel_id
        , $reward_id
    ) {
        return $this->CachedGetRewardConditionListByOrgIdByChannelIdByRewardId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
            , $channel_id
            , $reward_id
        );
    }
    */
        
    public function CachedGetRewardConditionListByOrgIdByChannelIdByRewardId(
        $overrideCache
        , $cacheHours
        , $org_id
        , $channel_id
        , $reward_id
    ) {

        $objs = array();

        $method_name = "CachedGetRewardConditionListByOrgIdByChannelIdByRewardId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;
        $sb += "_";
        $sb += strtolower("$channel_id");
        $sb += "_";
        $sb += $channel_id;
        $sb += "_";
        $sb += strtolower("$reward_id");
        $sb += "_";
        $sb += $reward_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardCondition>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardConditionListByOrgIdByChannelIdByRewardId(
                $org_id
                , $channel_id
                , $reward_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardConditionListByRewardId(
        $reward_id
        ) {
            return $this->act->GetRewardConditionListByRewardId(
                $reward_id
            );
        }
        
    public function GetRewardConditionByRewardId(
        $reward_id
    ) {
        foreach($this->act->GetRewardConditionListByRewardId(
        $reward_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardConditionListByRewardId(
        $reward_id
    ) {
        return $this->CachedGetRewardConditionListByRewardId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $reward_id
        );
    }
    */
        
    public function CachedGetRewardConditionListByRewardId(
        $overrideCache
        , $cacheHours
        , $reward_id
    ) {

        $objs = array();

        $method_name = "CachedGetRewardConditionListByRewardId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$reward_id");
        $sb += "_";
        $sb += $reward_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardCondition>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardConditionListByRewardId(
                $reward_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountRewardConditionType(
    ) {      
        return $this->act->CountRewardConditionType(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardConditionTypeByUuid(
        $uuid
    ) {      
        return $this->act->CountRewardConditionTypeByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardConditionTypeByCode(
        $code
    ) {      
        return $this->act->CountRewardConditionTypeByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardConditionTypeByName(
        $name
    ) {      
        return $this->act->CountRewardConditionTypeByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardConditionTypeByType(
        $type
    ) {      
        return $this->act->CountRewardConditionTypeByType(
        $type
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseRewardConditionTypeListByFilter($filter_obj) {
        return $this->act->BrowseRewardConditionTypeListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetRewardConditionTypeByUuid($set_type, $obj) {
        return $this->act->SetRewardConditionTypeByUuid($set_type, $obj);
    }
               
    public function SetRewardConditionTypeByUuidFull($obj) {
        return $this->act->SetRewardConditionTypeByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelRewardConditionTypeByUuid(
        $uuid
    ) {         
        return $this->act->DelRewardConditionTypeByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetRewardConditionTypeListByUuid(
        $uuid
        ) {
            return $this->act->GetRewardConditionTypeListByUuid(
                $uuid
            );
        }
        
    public function GetRewardConditionTypeByUuid(
        $uuid
    ) {
        foreach($this->act->GetRewardConditionTypeListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardConditionTypeListByUuid(
        $uuid
    ) {
        return $this->CachedGetRewardConditionTypeListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetRewardConditionTypeListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetRewardConditionTypeListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardConditionType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardConditionTypeListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardConditionTypeListByCode(
        $code
        ) {
            return $this->act->GetRewardConditionTypeListByCode(
                $code
            );
        }
        
    public function GetRewardConditionTypeByCode(
        $code
    ) {
        foreach($this->act->GetRewardConditionTypeListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardConditionTypeListByCode(
        $code
    ) {
        return $this->CachedGetRewardConditionTypeListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetRewardConditionTypeListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetRewardConditionTypeListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardConditionType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardConditionTypeListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardConditionTypeListByName(
        $name
        ) {
            return $this->act->GetRewardConditionTypeListByName(
                $name
            );
        }
        
    public function GetRewardConditionTypeByName(
        $name
    ) {
        foreach($this->act->GetRewardConditionTypeListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardConditionTypeListByName(
        $name
    ) {
        return $this->CachedGetRewardConditionTypeListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetRewardConditionTypeListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetRewardConditionTypeListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardConditionType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardConditionTypeListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardConditionTypeListByType(
        $type
        ) {
            return $this->act->GetRewardConditionTypeListByType(
                $type
            );
        }
        
    public function GetRewardConditionTypeByType(
        $type
    ) {
        foreach($this->act->GetRewardConditionTypeListByType(
        $type
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardConditionTypeListByType(
        $type
    ) {
        return $this->CachedGetRewardConditionTypeListByType(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $type
        );
    }
    */
        
    public function CachedGetRewardConditionTypeListByType(
        $overrideCache
        , $cacheHours
        , $type
    ) {

        $objs = array();

        $method_name = "CachedGetRewardConditionTypeListByType";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$type");
        $sb += "_";
        $sb += $type;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardConditionType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardConditionTypeListByType(
                $type
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
    public function CountProfileRewardPoints(
    ) {      
        return $this->act->CountProfileRewardPoints(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileRewardPointsByUuid(
        $uuid
    ) {      
        return $this->act->CountProfileRewardPointsByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileRewardPointsByChannelId(
        $channel_id
    ) {      
        return $this->act->CountProfileRewardPointsByChannelId(
        $channel_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileRewardPointsByOrgId(
        $org_id
    ) {      
        return $this->act->CountProfileRewardPointsByOrgId(
        $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileRewardPointsByProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileRewardPointsByProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileRewardPointsByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {      
        return $this->act->CountProfileRewardPointsByChannelIdByOrgId(
        $channel_id
        , $org_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileRewardPointsByChannelIdByProfileId(
        $channel_id
        , $profile_id
    ) {      
        return $this->act->CountProfileRewardPointsByChannelIdByProfileId(
        $channel_id
        , $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileRewardPointsListByFilter($filter_obj) {
        return $this->act->BrowseProfileRewardPointsListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileRewardPointsByUuid($set_type, $obj) {
        return $this->act->SetProfileRewardPointsByUuid($set_type, $obj);
    }
               
    public function SetProfileRewardPointsByUuidFull($obj) {
        return $this->act->SetProfileRewardPointsByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileRewardPointsByUuid(
        $uuid
    ) {         
        return $this->act->DelProfileRewardPointsByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileRewardPointsByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {         
        return $this->act->DelProfileRewardPointsByChannelIdByOrgId(
        $channel_id
        , $org_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileRewardPointsListByUuid(
        $uuid
        ) {
            return $this->act->GetProfileRewardPointsListByUuid(
                $uuid
            );
        }
        
    public function GetProfileRewardPointsByUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileRewardPointsListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileRewardPointsListByUuid(
        $uuid
    ) {
        return $this->CachedGetProfileRewardPointsListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileRewardPointsListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileRewardPointsListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileRewardPoints>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileRewardPointsListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileRewardPointsListByChannelId(
        $channel_id
        ) {
            return $this->act->GetProfileRewardPointsListByChannelId(
                $channel_id
            );
        }
        
    public function GetProfileRewardPointsByChannelId(
        $channel_id
    ) {
        foreach($this->act->GetProfileRewardPointsListByChannelId(
        $channel_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileRewardPointsListByChannelId(
        $channel_id
    ) {
        return $this->CachedGetProfileRewardPointsListByChannelId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
        );
    }
    */
        
    public function CachedGetProfileRewardPointsListByChannelId(
        $overrideCache
        , $cacheHours
        , $channel_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileRewardPointsListByChannelId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$channel_id");
        $sb += "_";
        $sb += $channel_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileRewardPoints>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileRewardPointsListByChannelId(
                $channel_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileRewardPointsListByOrgId(
        $org_id
        ) {
            return $this->act->GetProfileRewardPointsListByOrgId(
                $org_id
            );
        }
        
    public function GetProfileRewardPointsByOrgId(
        $org_id
    ) {
        foreach($this->act->GetProfileRewardPointsListByOrgId(
        $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileRewardPointsListByOrgId(
        $org_id
    ) {
        return $this->CachedGetProfileRewardPointsListByOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $org_id
        );
    }
    */
        
    public function CachedGetProfileRewardPointsListByOrgId(
        $overrideCache
        , $cacheHours
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileRewardPointsListByOrgId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$org_id");
        $sb += "_";
        $sb += $org_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileRewardPoints>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileRewardPointsListByOrgId(
                $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileRewardPointsListByProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileRewardPointsListByProfileId(
                $profile_id
            );
        }
        
    public function GetProfileRewardPointsByProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileRewardPointsListByProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileRewardPointsListByProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileRewardPointsListByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileRewardPointsListByProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileRewardPointsListByProfileId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileRewardPoints>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileRewardPointsListByProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileRewardPointsListByChannelIdByOrgId(
        $channel_id
        , $org_id
        ) {
            return $this->act->GetProfileRewardPointsListByChannelIdByOrgId(
                $channel_id
                , $org_id
            );
        }
        
    public function GetProfileRewardPointsByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {
        foreach($this->act->GetProfileRewardPointsListByChannelIdByOrgId(
        $channel_id
        , $org_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileRewardPointsListByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {
        return $this->CachedGetProfileRewardPointsListByChannelIdByOrgId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
            , $org_id
        );
    }
    */
        
    public function CachedGetProfileRewardPointsListByChannelIdByOrgId(
        $overrideCache
        , $cacheHours
        , $channel_id
        , $org_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileRewardPointsListByChannelIdByOrgId";

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

        //$objs = CacheUtil.Get<List<ProfileRewardPoints>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileRewardPointsListByChannelIdByOrgId(
                $channel_id
                , $org_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileRewardPointsListByChannelIdByProfileId(
        $channel_id
        , $profile_id
        ) {
            return $this->act->GetProfileRewardPointsListByChannelIdByProfileId(
                $channel_id
                , $profile_id
            );
        }
        
    public function GetProfileRewardPointsByChannelIdByProfileId(
        $channel_id
        , $profile_id
    ) {
        foreach($this->act->GetProfileRewardPointsListByChannelIdByProfileId(
        $channel_id
        , $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileRewardPointsListByChannelIdByProfileId(
        $channel_id
        , $profile_id
    ) {
        return $this->CachedGetProfileRewardPointsListByChannelIdByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileRewardPointsListByChannelIdByProfileId(
        $overrideCache
        , $cacheHours
        , $channel_id
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileRewardPointsListByChannelIdByProfileId";

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

        //$objs = CacheUtil.Get<List<ProfileRewardPoints>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileRewardPointsListByChannelIdByProfileId(
                $channel_id
                , $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountRewardCompetitionByUuid(
        $uuid
    ) {      
        return $this->act->CountRewardCompetitionByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardCompetitionByCode(
        $code
    ) {      
        return $this->act->CountRewardCompetitionByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardCompetitionByName(
        $name
    ) {      
        return $this->act->CountRewardCompetitionByName(
        $name
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardCompetitionByPath(
        $path
    ) {      
        return $this->act->CountRewardCompetitionByPath(
        $path
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardCompetitionByChannelId(
        $channel_id
    ) {      
        return $this->act->CountRewardCompetitionByChannelId(
        $channel_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountRewardCompetitionByChannelIdByCompleted(
        $channel_id
        , $completed
    ) {      
        return $this->act->CountRewardCompetitionByChannelIdByCompleted(
        $channel_id
        , $completed
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseRewardCompetitionListByFilter($filter_obj) {
        return $this->act->BrowseRewardCompetitionListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetRewardCompetitionByUuid($set_type, $obj) {
        return $this->act->SetRewardCompetitionByUuid($set_type, $obj);
    }
               
    public function SetRewardCompetitionByUuidFull($obj) {
        return $this->act->SetRewardCompetitionByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelRewardCompetitionByUuid(
        $uuid
    ) {         
        return $this->act->DelRewardCompetitionByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelRewardCompetitionByCode(
        $code
    ) {         
        return $this->act->DelRewardCompetitionByCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function DelRewardCompetitionByPathByChannelId(
        $path
        , $channel_id
    ) {         
        return $this->act->DelRewardCompetitionByPathByChannelId(
        $path
        , $channel_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelRewardCompetitionByPath(
        $path
    ) {         
        return $this->act->DelRewardCompetitionByPath(
        $path
        );
    }
#------------------------------------------------------------------------------                    
    public function DelRewardCompetitionByChannelIdByPath(
        $channel_id
        , $path
    ) {         
        return $this->act->DelRewardCompetitionByChannelIdByPath(
        $channel_id
        , $path
        );
    }
#------------------------------------------------------------------------------                    
    public function GetRewardCompetitionListByUuid(
        $uuid
        ) {
            return $this->act->GetRewardCompetitionListByUuid(
                $uuid
            );
        }
        
    public function GetRewardCompetitionByUuid(
        $uuid
    ) {
        foreach($this->act->GetRewardCompetitionListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardCompetitionListByUuid(
        $uuid
    ) {
        return $this->CachedGetRewardCompetitionListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetRewardCompetitionListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetRewardCompetitionListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardCompetition>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardCompetitionListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardCompetitionListByCode(
        $code
        ) {
            return $this->act->GetRewardCompetitionListByCode(
                $code
            );
        }
        
    public function GetRewardCompetitionByCode(
        $code
    ) {
        foreach($this->act->GetRewardCompetitionListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardCompetitionListByCode(
        $code
    ) {
        return $this->CachedGetRewardCompetitionListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetRewardCompetitionListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetRewardCompetitionListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardCompetition>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardCompetitionListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardCompetitionListByName(
        $name
        ) {
            return $this->act->GetRewardCompetitionListByName(
                $name
            );
        }
        
    public function GetRewardCompetitionByName(
        $name
    ) {
        foreach($this->act->GetRewardCompetitionListByName(
        $name
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardCompetitionListByName(
        $name
    ) {
        return $this->CachedGetRewardCompetitionListByName(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $name
        );
    }
    */
        
    public function CachedGetRewardCompetitionListByName(
        $overrideCache
        , $cacheHours
        , $name
    ) {

        $objs = array();

        $method_name = "CachedGetRewardCompetitionListByName";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$name");
        $sb += "_";
        $sb += $name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardCompetition>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardCompetitionListByName(
                $name
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardCompetitionListByPath(
        $path
        ) {
            return $this->act->GetRewardCompetitionListByPath(
                $path
            );
        }
        
    public function GetRewardCompetitionByPath(
        $path
    ) {
        foreach($this->act->GetRewardCompetitionListByPath(
        $path
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardCompetitionListByPath(
        $path
    ) {
        return $this->CachedGetRewardCompetitionListByPath(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $path
        );
    }
    */
        
    public function CachedGetRewardCompetitionListByPath(
        $overrideCache
        , $cacheHours
        , $path
    ) {

        $objs = array();

        $method_name = "CachedGetRewardCompetitionListByPath";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$path");
        $sb += "_";
        $sb += $path;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardCompetition>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardCompetitionListByPath(
                $path
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardCompetitionListByChannelId(
        $channel_id
        ) {
            return $this->act->GetRewardCompetitionListByChannelId(
                $channel_id
            );
        }
        
    public function GetRewardCompetitionByChannelId(
        $channel_id
    ) {
        foreach($this->act->GetRewardCompetitionListByChannelId(
        $channel_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardCompetitionListByChannelId(
        $channel_id
    ) {
        return $this->CachedGetRewardCompetitionListByChannelId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
        );
    }
    */
        
    public function CachedGetRewardCompetitionListByChannelId(
        $overrideCache
        , $cacheHours
        , $channel_id
    ) {

        $objs = array();

        $method_name = "CachedGetRewardCompetitionListByChannelId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$channel_id");
        $sb += "_";
        $sb += $channel_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardCompetition>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardCompetitionListByChannelId(
                $channel_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardCompetitionListByChannelIdByCompleted(
        $channel_id
        , $completed
        ) {
            return $this->act->GetRewardCompetitionListByChannelIdByCompleted(
                $channel_id
                , $completed
            );
        }
        
    public function GetRewardCompetitionByChannelIdByCompleted(
        $channel_id
        , $completed
    ) {
        foreach($this->act->GetRewardCompetitionListByChannelIdByCompleted(
        $channel_id
        , $completed
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardCompetitionListByChannelIdByCompleted(
        $channel_id
        , $completed
    ) {
        return $this->CachedGetRewardCompetitionListByChannelIdByCompleted(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
            , $completed
        );
    }
    */
        
    public function CachedGetRewardCompetitionListByChannelIdByCompleted(
        $overrideCache
        , $cacheHours
        , $channel_id
        , $completed
    ) {

        $objs = array();

        $method_name = "CachedGetRewardCompetitionListByChannelIdByCompleted";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$channel_id");
        $sb += "_";
        $sb += $channel_id;
        $sb += "_";
        $sb += strtolower("$completed");
        $sb += "_";
        $sb += $completed;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardCompetition>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardCompetitionListByChannelIdByCompleted(
                $channel_id
                , $completed
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetRewardCompetitionListByChannelIdByPath(
        $channel_id
        , $path
        ) {
            return $this->act->GetRewardCompetitionListByChannelIdByPath(
                $channel_id
                , $path
            );
        }
        
    public function GetRewardCompetitionByChannelIdByPath(
        $channel_id
        , $path
    ) {
        foreach($this->act->GetRewardCompetitionListByChannelIdByPath(
        $channel_id
        , $path
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetRewardCompetitionListByChannelIdByPath(
        $channel_id
        , $path
    ) {
        return $this->CachedGetRewardCompetitionListByChannelIdByPath(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $channel_id
            , $path
        );
    }
    */
        
    public function CachedGetRewardCompetitionListByChannelIdByPath(
        $overrideCache
        , $cacheHours
        , $channel_id
        , $path
    ) {

        $objs = array();

        $method_name = "CachedGetRewardCompetitionListByChannelIdByPath";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$channel_id");
        $sb += "_";
        $sb += $channel_id;
        $sb += "_";
        $sb += strtolower("$path");
        $sb += "_";
        $sb += $path;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<RewardCompetition>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetRewardCompetitionListByChannelIdByPath(
                $channel_id
                , $path
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
    
}

?>
