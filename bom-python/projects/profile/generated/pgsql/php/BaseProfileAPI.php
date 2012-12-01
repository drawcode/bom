<?php // namespace Profile;

require_once('BaseProfileACT.php');

class SetType {
    const FULL = 'full';
    const INSERT_ONLY = 'insertonly';
    const UPDATE_ONLY = 'updateonly';
}

class BaseProfileAPI {

    public $act;
    public $DEFAULT_CACHE_HOURS = 12;
    public $DEFAULT_SET_TYPE = 'full';

    public function __construct() {
        $this->DEFAULT_CACHE_HOURS = 12;
        $this->DEFAULT_SET_TYPE = SetType::FULL;
        $this->act = new BaseProfileACT();
    }
    
    public function __destruct() {
    
    }
    
    
#------------------------------------------------------------------------------                    
    public function CountProfile(
    ) {      
        return $this->act->CountProfile(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileByUuid(
        $uuid
    ) {      
        return $this->act->CountProfileByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileByUsernameByHash(
        $username
        , $hash
    ) {      
        return $this->act->CountProfileByUsernameByHash(
        $username
        , $hash
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileByUsername(
        $username
    ) {      
        return $this->act->CountProfileByUsername(
        $username
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileListByFilter($filter_obj) {
        return $this->act->BrowseProfileListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileByUuid($set_type, $obj) {
        return $this->act->SetProfileByUuid($set_type, $obj);
    }
               
    public function SetProfileByUuidFull($obj) {
        return $this->act->SetProfileByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileByUsername($set_type, $obj) {
        return $this->act->SetProfileByUsername($set_type, $obj);
    }
               
    public function SetProfileByUsernameFull($obj) {
        return $this->act->SetProfileByUsername('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileByUuid(
        $uuid
    ) {         
        return $this->act->DelProfileByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileByUsername(
        $username
    ) {         
        return $this->act->DelProfileByUsername(
        $username
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileListByUuid(
        $uuid
        ) {
            return $this->act->GetProfileListByUuid(
                $uuid
            );
        }
        
    public function GetProfileByUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileListByUuid(
        $uuid
    ) {
        return $this->CachedGetProfileListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Profile>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileListByUsernameByHash(
        $username
        , $hash
        ) {
            return $this->act->GetProfileListByUsernameByHash(
                $username
                , $hash
            );
        }
        
    public function GetProfileByUsernameByHash(
        $username
        , $hash
    ) {
        foreach($this->act->GetProfileListByUsernameByHash(
        $username
        , $hash
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileListByUsernameByHash(
        $username
        , $hash
    ) {
        return $this->CachedGetProfileListByUsernameByHash(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $username
            , $hash
        );
    }
    */
        
    public function CachedGetProfileListByUsernameByHash(
        $overrideCache
        , $cacheHours
        , $username
        , $hash
    ) {

        $objs = array();

        $method_name = "CachedGetProfileListByUsernameByHash";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$username");
        $sb += "_";
        $sb += $username;
        $sb += "_";
        $sb += strtolower("$hash");
        $sb += "_";
        $sb += $hash;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Profile>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileListByUsernameByHash(
                $username
                , $hash
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileListByUsername(
        $username
        ) {
            return $this->act->GetProfileListByUsername(
                $username
            );
        }
        
    public function GetProfileByUsername(
        $username
    ) {
        foreach($this->act->GetProfileListByUsername(
        $username
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileListByUsername(
        $username
    ) {
        return $this->CachedGetProfileListByUsername(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $username
        );
    }
    */
        
    public function CachedGetProfileListByUsername(
        $overrideCache
        , $cacheHours
        , $username
    ) {

        $objs = array();

        $method_name = "CachedGetProfileListByUsername";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$username");
        $sb += "_";
        $sb += $username;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Profile>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileListByUsername(
                $username
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountProfileType(
    ) {      
        return $this->act->CountProfileType(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileTypeByUuid(
        $uuid
    ) {      
        return $this->act->CountProfileTypeByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileTypeByTypeId(
        $type_id
    ) {      
        return $this->act->CountProfileTypeByTypeId(
        $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileTypeListByFilter($filter_obj) {
        return $this->act->BrowseProfileTypeListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileTypeByUuid($set_type, $obj) {
        return $this->act->SetProfileTypeByUuid($set_type, $obj);
    }
               
    public function SetProfileTypeByUuidFull($obj) {
        return $this->act->SetProfileTypeByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileTypeByUuid(
        $uuid
    ) {         
        return $this->act->DelProfileTypeByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileTypeListByUuid(
        $uuid
        ) {
            return $this->act->GetProfileTypeListByUuid(
                $uuid
            );
        }
        
    public function GetProfileTypeByUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileTypeListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileTypeListByUuid(
        $uuid
    ) {
        return $this->CachedGetProfileTypeListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileTypeListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileTypeListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileTypeListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileTypeListByCode(
        $code
        ) {
            return $this->act->GetProfileTypeListByCode(
                $code
            );
        }
        
    public function GetProfileTypeByCode(
        $code
    ) {
        foreach($this->act->GetProfileTypeListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileTypeListByCode(
        $code
    ) {
        return $this->CachedGetProfileTypeListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetProfileTypeListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetProfileTypeListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileTypeListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileTypeListByTypeId(
        $type_id
        ) {
            return $this->act->GetProfileTypeListByTypeId(
                $type_id
            );
        }
        
    public function GetProfileTypeByTypeId(
        $type_id
    ) {
        foreach($this->act->GetProfileTypeListByTypeId(
        $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileTypeListByTypeId(
        $type_id
    ) {
        return $this->CachedGetProfileTypeListByTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $type_id
        );
    }
    */
        
    public function CachedGetProfileTypeListByTypeId(
        $overrideCache
        , $cacheHours
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileTypeListByTypeId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$type_id");
        $sb += "_";
        $sb += $type_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileType>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileTypeListByTypeId(
                $type_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountProfileAttribute(
    ) {      
        return $this->act->CountProfileAttribute(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileAttributeByUuid(
        $uuid
    ) {      
        return $this->act->CountProfileAttributeByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileAttributeByCode(
        $code
    ) {      
        return $this->act->CountProfileAttributeByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileAttributeByType(
        $type
    ) {      
        return $this->act->CountProfileAttributeByType(
        $type
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileAttributeByGroup(
        $group
    ) {      
        return $this->act->CountProfileAttributeByGroup(
        $group
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileAttributeByCodeByType(
        $code
        , $type
    ) {      
        return $this->act->CountProfileAttributeByCodeByType(
        $code
        , $type
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileAttributeListByFilter($filter_obj) {
        return $this->act->BrowseProfileAttributeListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileAttributeByUuid($set_type, $obj) {
        return $this->act->SetProfileAttributeByUuid($set_type, $obj);
    }
               
    public function SetProfileAttributeByUuidFull($obj) {
        return $this->act->SetProfileAttributeByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileAttributeByCode($set_type, $obj) {
        return $this->act->SetProfileAttributeByCode($set_type, $obj);
    }
               
    public function SetProfileAttributeByCodeFull($obj) {
        return $this->act->SetProfileAttributeByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileAttributeByUuid(
        $uuid
    ) {         
        return $this->act->DelProfileAttributeByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileAttributeByCode(
        $code
    ) {         
        return $this->act->DelProfileAttributeByCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileAttributeListByUuid(
        $uuid
        ) {
            return $this->act->GetProfileAttributeListByUuid(
                $uuid
            );
        }
        
    public function GetProfileAttributeByUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileAttributeListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAttributeListByUuid(
        $uuid
    ) {
        return $this->CachedGetProfileAttributeListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileAttributeListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAttributeListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileAttribute>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileAttributeListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAttributeListByCode(
        $code
        ) {
            return $this->act->GetProfileAttributeListByCode(
                $code
            );
        }
        
    public function GetProfileAttributeByCode(
        $code
    ) {
        foreach($this->act->GetProfileAttributeListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAttributeListByCode(
        $code
    ) {
        return $this->CachedGetProfileAttributeListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetProfileAttributeListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAttributeListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileAttribute>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileAttributeListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAttributeListByType(
        $type
        ) {
            return $this->act->GetProfileAttributeListByType(
                $type
            );
        }
        
    public function GetProfileAttributeByType(
        $type
    ) {
        foreach($this->act->GetProfileAttributeListByType(
        $type
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAttributeListByType(
        $type
    ) {
        return $this->CachedGetProfileAttributeListByType(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $type
        );
    }
    */
        
    public function CachedGetProfileAttributeListByType(
        $overrideCache
        , $cacheHours
        , $type
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAttributeListByType";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$type");
        $sb += "_";
        $sb += $type;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileAttribute>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileAttributeListByType(
                $type
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAttributeListByGroup(
        $group
        ) {
            return $this->act->GetProfileAttributeListByGroup(
                $group
            );
        }
        
    public function GetProfileAttributeByGroup(
        $group
    ) {
        foreach($this->act->GetProfileAttributeListByGroup(
        $group
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAttributeListByGroup(
        $group
    ) {
        return $this->CachedGetProfileAttributeListByGroup(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $group
        );
    }
    */
        
    public function CachedGetProfileAttributeListByGroup(
        $overrideCache
        , $cacheHours
        , $group
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAttributeListByGroup";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$group");
        $sb += "_";
        $sb += $group;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileAttribute>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileAttributeListByGroup(
                $group
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAttributeListByCodeByType(
        $code
        , $type
        ) {
            return $this->act->GetProfileAttributeListByCodeByType(
                $code
                , $type
            );
        }
        
    public function GetProfileAttributeByCodeByType(
        $code
        , $type
    ) {
        foreach($this->act->GetProfileAttributeListByCodeByType(
        $code
        , $type
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAttributeListByCodeByType(
        $code
        , $type
    ) {
        return $this->CachedGetProfileAttributeListByCodeByType(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $type
        );
    }
    */
        
    public function CachedGetProfileAttributeListByCodeByType(
        $overrideCache
        , $cacheHours
        , $code
        , $type
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAttributeListByCodeByType";

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

        //$objs = CacheUtil.Get<List<ProfileAttribute>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileAttributeListByCodeByType(
                $code
                , $type
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountProfileAttributeText(
    ) {      
        return $this->act->CountProfileAttributeText(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileAttributeTextByUuid(
        $uuid
    ) {      
        return $this->act->CountProfileAttributeTextByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileAttributeTextByProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileAttributeTextByProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileAttributeTextByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
    ) {      
        return $this->act->CountProfileAttributeTextByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileAttributeTextListByFilter($filter_obj) {
        return $this->act->BrowseProfileAttributeTextListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileAttributeTextByUuid($set_type, $obj) {
        return $this->act->SetProfileAttributeTextByUuid($set_type, $obj);
    }
               
    public function SetProfileAttributeTextByUuidFull($obj) {
        return $this->act->SetProfileAttributeTextByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileAttributeTextByProfileId($set_type, $obj) {
        return $this->act->SetProfileAttributeTextByProfileId($set_type, $obj);
    }
               
    public function SetProfileAttributeTextByProfileIdFull($obj) {
        return $this->act->SetProfileAttributeTextByProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileAttributeTextByProfileIdByAttributeId($set_type, $obj) {
        return $this->act->SetProfileAttributeTextByProfileIdByAttributeId($set_type, $obj);
    }
               
    public function SetProfileAttributeTextByProfileIdByAttributeIdFull($obj) {
        return $this->act->SetProfileAttributeTextByProfileIdByAttributeId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileAttributeTextByUuid(
        $uuid
    ) {         
        return $this->act->DelProfileAttributeTextByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileAttributeTextByProfileId(
        $profile_id
    ) {         
        return $this->act->DelProfileAttributeTextByProfileId(
        $profile_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileAttributeTextByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
    ) {         
        return $this->act->DelProfileAttributeTextByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileAttributeTextListByUuid(
        $uuid
        ) {
            return $this->act->GetProfileAttributeTextListByUuid(
                $uuid
            );
        }
        
    public function GetProfileAttributeTextByUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileAttributeTextListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAttributeTextListByUuid(
        $uuid
    ) {
        return $this->CachedGetProfileAttributeTextListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileAttributeTextListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAttributeTextListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileAttributeText>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileAttributeTextListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAttributeTextListByProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileAttributeTextListByProfileId(
                $profile_id
            );
        }
        
    public function GetProfileAttributeTextByProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileAttributeTextListByProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAttributeTextListByProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileAttributeTextListByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileAttributeTextListByProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAttributeTextListByProfileId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileAttributeText>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileAttributeTextListByProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAttributeTextListByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
        ) {
            return $this->act->GetProfileAttributeTextListByProfileIdByAttributeId(
                $profile_id
                , $attribute_id
            );
        }
        
    public function GetProfileAttributeTextByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
    ) {
        foreach($this->act->GetProfileAttributeTextListByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAttributeTextListByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
    ) {
        return $this->CachedGetProfileAttributeTextListByProfileIdByAttributeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $attribute_id
        );
    }
    */
        
    public function CachedGetProfileAttributeTextListByProfileIdByAttributeId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $attribute_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAttributeTextListByProfileIdByAttributeId";

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

        //$objs = CacheUtil.Get<List<ProfileAttributeText>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileAttributeTextListByProfileIdByAttributeId(
                $profile_id
                , $attribute_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountProfileAttributeData(
    ) {      
        return $this->act->CountProfileAttributeData(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileAttributeDataByUuid(
        $uuid
    ) {      
        return $this->act->CountProfileAttributeDataByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileAttributeDataByProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileAttributeDataByProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileAttributeDataByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
    ) {      
        return $this->act->CountProfileAttributeDataByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileAttributeDataListByFilter($filter_obj) {
        return $this->act->BrowseProfileAttributeDataListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileAttributeDataByUuid($set_type, $obj) {
        return $this->act->SetProfileAttributeDataByUuid($set_type, $obj);
    }
               
    public function SetProfileAttributeDataByUuidFull($obj) {
        return $this->act->SetProfileAttributeDataByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileAttributeDataByProfileId($set_type, $obj) {
        return $this->act->SetProfileAttributeDataByProfileId($set_type, $obj);
    }
               
    public function SetProfileAttributeDataByProfileIdFull($obj) {
        return $this->act->SetProfileAttributeDataByProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileAttributeDataByProfileIdByAttributeId($set_type, $obj) {
        return $this->act->SetProfileAttributeDataByProfileIdByAttributeId($set_type, $obj);
    }
               
    public function SetProfileAttributeDataByProfileIdByAttributeIdFull($obj) {
        return $this->act->SetProfileAttributeDataByProfileIdByAttributeId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileAttributeDataByUuid(
        $uuid
    ) {         
        return $this->act->DelProfileAttributeDataByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileAttributeDataByProfileId(
        $profile_id
    ) {         
        return $this->act->DelProfileAttributeDataByProfileId(
        $profile_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileAttributeDataByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
    ) {         
        return $this->act->DelProfileAttributeDataByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileAttributeDataListByUuid(
        $uuid
        ) {
            return $this->act->GetProfileAttributeDataListByUuid(
                $uuid
            );
        }
        
    public function GetProfileAttributeDataByUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileAttributeDataListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAttributeDataListByUuid(
        $uuid
    ) {
        return $this->CachedGetProfileAttributeDataListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileAttributeDataListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAttributeDataListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileAttributeData>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileAttributeDataListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAttributeDataListByProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileAttributeDataListByProfileId(
                $profile_id
            );
        }
        
    public function GetProfileAttributeDataByProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileAttributeDataListByProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAttributeDataListByProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileAttributeDataListByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileAttributeDataListByProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAttributeDataListByProfileId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileAttributeData>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileAttributeDataListByProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAttributeDataListByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
        ) {
            return $this->act->GetProfileAttributeDataListByProfileIdByAttributeId(
                $profile_id
                , $attribute_id
            );
        }
        
    public function GetProfileAttributeDataByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
    ) {
        foreach($this->act->GetProfileAttributeDataListByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAttributeDataListByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
    ) {
        return $this->CachedGetProfileAttributeDataListByProfileIdByAttributeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $attribute_id
        );
    }
    */
        
    public function CachedGetProfileAttributeDataListByProfileIdByAttributeId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $attribute_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAttributeDataListByProfileIdByAttributeId";

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

        //$objs = CacheUtil.Get<List<ProfileAttributeData>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileAttributeDataListByProfileIdByAttributeId(
                $profile_id
                , $attribute_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountProfileDevice(
    ) {      
        return $this->act->CountProfileDevice(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileDeviceByUuid(
        $uuid
    ) {      
        return $this->act->CountProfileDeviceByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileDeviceByProfileIdByDeviceId(
        $profile_id
        , $device_id
    ) {      
        return $this->act->CountProfileDeviceByProfileIdByDeviceId(
        $profile_id
        , $device_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileDeviceByProfileIdByToken(
        $profile_id
        , $token
    ) {      
        return $this->act->CountProfileDeviceByProfileIdByToken(
        $profile_id
        , $token
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileDeviceByProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileDeviceByProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileDeviceByDeviceId(
        $device_id
    ) {      
        return $this->act->CountProfileDeviceByDeviceId(
        $device_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileDeviceByToken(
        $token
    ) {      
        return $this->act->CountProfileDeviceByToken(
        $token
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileDeviceListByFilter($filter_obj) {
        return $this->act->BrowseProfileDeviceListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileDeviceByUuid($set_type, $obj) {
        return $this->act->SetProfileDeviceByUuid($set_type, $obj);
    }
               
    public function SetProfileDeviceByUuidFull($obj) {
        return $this->act->SetProfileDeviceByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileDeviceByUuid(
        $uuid
    ) {         
        return $this->act->DelProfileDeviceByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileDeviceByProfileIdByDeviceId(
        $profile_id
        , $device_id
    ) {         
        return $this->act->DelProfileDeviceByProfileIdByDeviceId(
        $profile_id
        , $device_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileDeviceByProfileIdByToken(
        $profile_id
        , $token
    ) {         
        return $this->act->DelProfileDeviceByProfileIdByToken(
        $profile_id
        , $token
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileDeviceByToken(
        $token
    ) {         
        return $this->act->DelProfileDeviceByToken(
        $token
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileDeviceListByUuid(
        $uuid
        ) {
            return $this->act->GetProfileDeviceListByUuid(
                $uuid
            );
        }
        
    public function GetProfileDeviceByUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileDeviceListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileDeviceListByUuid(
        $uuid
    ) {
        return $this->CachedGetProfileDeviceListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileDeviceListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileDeviceListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileDevice>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileDeviceListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileDeviceListByProfileIdByDeviceId(
        $profile_id
        , $device_id
        ) {
            return $this->act->GetProfileDeviceListByProfileIdByDeviceId(
                $profile_id
                , $device_id
            );
        }
        
    public function GetProfileDeviceByProfileIdByDeviceId(
        $profile_id
        , $device_id
    ) {
        foreach($this->act->GetProfileDeviceListByProfileIdByDeviceId(
        $profile_id
        , $device_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileDeviceListByProfileIdByDeviceId(
        $profile_id
        , $device_id
    ) {
        return $this->CachedGetProfileDeviceListByProfileIdByDeviceId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $device_id
        );
    }
    */
        
    public function CachedGetProfileDeviceListByProfileIdByDeviceId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $device_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileDeviceListByProfileIdByDeviceId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$device_id");
        $sb += "_";
        $sb += $device_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileDevice>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileDeviceListByProfileIdByDeviceId(
                $profile_id
                , $device_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileDeviceListByProfileIdByToken(
        $profile_id
        , $token
        ) {
            return $this->act->GetProfileDeviceListByProfileIdByToken(
                $profile_id
                , $token
            );
        }
        
    public function GetProfileDeviceByProfileIdByToken(
        $profile_id
        , $token
    ) {
        foreach($this->act->GetProfileDeviceListByProfileIdByToken(
        $profile_id
        , $token
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileDeviceListByProfileIdByToken(
        $profile_id
        , $token
    ) {
        return $this->CachedGetProfileDeviceListByProfileIdByToken(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $token
        );
    }
    */
        
    public function CachedGetProfileDeviceListByProfileIdByToken(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $token
    ) {

        $objs = array();

        $method_name = "CachedGetProfileDeviceListByProfileIdByToken";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;
        $sb += "_";
        $sb += strtolower("$token");
        $sb += "_";
        $sb += $token;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileDevice>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileDeviceListByProfileIdByToken(
                $profile_id
                , $token
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileDeviceListByProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileDeviceListByProfileId(
                $profile_id
            );
        }
        
    public function GetProfileDeviceByProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileDeviceListByProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileDeviceListByProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileDeviceListByProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileDeviceListByProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileDeviceListByProfileId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$profile_id");
        $sb += "_";
        $sb += $profile_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileDevice>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileDeviceListByProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileDeviceListByDeviceId(
        $device_id
        ) {
            return $this->act->GetProfileDeviceListByDeviceId(
                $device_id
            );
        }
        
    public function GetProfileDeviceByDeviceId(
        $device_id
    ) {
        foreach($this->act->GetProfileDeviceListByDeviceId(
        $device_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileDeviceListByDeviceId(
        $device_id
    ) {
        return $this->CachedGetProfileDeviceListByDeviceId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $device_id
        );
    }
    */
        
    public function CachedGetProfileDeviceListByDeviceId(
        $overrideCache
        , $cacheHours
        , $device_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileDeviceListByDeviceId";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$device_id");
        $sb += "_";
        $sb += $device_id;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileDevice>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileDeviceListByDeviceId(
                $device_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileDeviceListByToken(
        $token
        ) {
            return $this->act->GetProfileDeviceListByToken(
                $token
            );
        }
        
    public function GetProfileDeviceByToken(
        $token
    ) {
        foreach($this->act->GetProfileDeviceListByToken(
        $token
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileDeviceListByToken(
        $token
    ) {
        return $this->CachedGetProfileDeviceListByToken(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $token
        );
    }
    */
        
    public function CachedGetProfileDeviceListByToken(
        $overrideCache
        , $cacheHours
        , $token
    ) {

        $objs = array();

        $method_name = "CachedGetProfileDeviceListByToken";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$token");
        $sb += "_";
        $sb += $token;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<ProfileDevice>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetProfileDeviceListByToken(
                $token
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountCountry(
    ) {      
        return $this->act->CountCountry(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountCountryByUuid(
        $uuid
    ) {      
        return $this->act->CountCountryByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountCountryByCode(
        $code
    ) {      
        return $this->act->CountCountryByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseCountryListByFilter($filter_obj) {
        return $this->act->BrowseCountryListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetCountryByUuid($set_type, $obj) {
        return $this->act->SetCountryByUuid($set_type, $obj);
    }
               
    public function SetCountryByUuidFull($obj) {
        return $this->act->SetCountryByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetCountryByCode($set_type, $obj) {
        return $this->act->SetCountryByCode($set_type, $obj);
    }
               
    public function SetCountryByCodeFull($obj) {
        return $this->act->SetCountryByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelCountryByUuid(
        $uuid
    ) {         
        return $this->act->DelCountryByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelCountryByCode(
        $code
    ) {         
        return $this->act->DelCountryByCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function GetCountryList(
        ) {
            return $this->act->GetCountryList(
            );
        }
        
    public function GetCountry(
    ) {
        foreach($this->act->GetCountryList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetCountryList(
    ) {
        return $this->CachedGetCountryList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetCountryList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetCountryList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Country>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetCountryList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetCountryListByUuid(
        $uuid
        ) {
            return $this->act->GetCountryListByUuid(
                $uuid
            );
        }
        
    public function GetCountryByUuid(
        $uuid
    ) {
        foreach($this->act->GetCountryListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetCountryListByUuid(
        $uuid
    ) {
        return $this->CachedGetCountryListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetCountryListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetCountryListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Country>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetCountryListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetCountryListByCode(
        $code
        ) {
            return $this->act->GetCountryListByCode(
                $code
            );
        }
        
    public function GetCountryByCode(
        $code
    ) {
        foreach($this->act->GetCountryListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetCountryListByCode(
        $code
    ) {
        return $this->CachedGetCountryListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetCountryListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetCountryListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<Country>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetCountryListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountState(
    ) {      
        return $this->act->CountState(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountStateByUuid(
        $uuid
    ) {      
        return $this->act->CountStateByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountStateByCode(
        $code
    ) {      
        return $this->act->CountStateByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseStateListByFilter($filter_obj) {
        return $this->act->BrowseStateListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetStateByUuid($set_type, $obj) {
        return $this->act->SetStateByUuid($set_type, $obj);
    }
               
    public function SetStateByUuidFull($obj) {
        return $this->act->SetStateByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetStateByCode($set_type, $obj) {
        return $this->act->SetStateByCode($set_type, $obj);
    }
               
    public function SetStateByCodeFull($obj) {
        return $this->act->SetStateByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelStateByUuid(
        $uuid
    ) {         
        return $this->act->DelStateByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelStateByCode(
        $code
    ) {         
        return $this->act->DelStateByCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function GetStateList(
        ) {
            return $this->act->GetStateList(
            );
        }
        
    public function GetState(
    ) {
        foreach($this->act->GetStateList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetStateList(
    ) {
        return $this->CachedGetStateList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetStateList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetStateList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<State>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetStateList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetStateListByUuid(
        $uuid
        ) {
            return $this->act->GetStateListByUuid(
                $uuid
            );
        }
        
    public function GetStateByUuid(
        $uuid
    ) {
        foreach($this->act->GetStateListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetStateListByUuid(
        $uuid
    ) {
        return $this->CachedGetStateListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetStateListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetStateListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<State>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetStateListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetStateListByCode(
        $code
        ) {
            return $this->act->GetStateListByCode(
                $code
            );
        }
        
    public function GetStateByCode(
        $code
    ) {
        foreach($this->act->GetStateListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetStateListByCode(
        $code
    ) {
        return $this->CachedGetStateListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetStateListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetStateListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<State>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetStateListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountCity(
    ) {      
        return $this->act->CountCity(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountCityByUuid(
        $uuid
    ) {      
        return $this->act->CountCityByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountCityByCode(
        $code
    ) {      
        return $this->act->CountCityByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseCityListByFilter($filter_obj) {
        return $this->act->BrowseCityListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetCityByUuid($set_type, $obj) {
        return $this->act->SetCityByUuid($set_type, $obj);
    }
               
    public function SetCityByUuidFull($obj) {
        return $this->act->SetCityByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetCityByCode($set_type, $obj) {
        return $this->act->SetCityByCode($set_type, $obj);
    }
               
    public function SetCityByCodeFull($obj) {
        return $this->act->SetCityByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelCityByUuid(
        $uuid
    ) {         
        return $this->act->DelCityByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelCityByCode(
        $code
    ) {         
        return $this->act->DelCityByCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function GetCityList(
        ) {
            return $this->act->GetCityList(
            );
        }
        
    public function GetCity(
    ) {
        foreach($this->act->GetCityList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetCityList(
    ) {
        return $this->CachedGetCityList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetCityList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetCityList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<City>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetCityList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetCityListByUuid(
        $uuid
        ) {
            return $this->act->GetCityListByUuid(
                $uuid
            );
        }
        
    public function GetCityByUuid(
        $uuid
    ) {
        foreach($this->act->GetCityListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetCityListByUuid(
        $uuid
    ) {
        return $this->CachedGetCityListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetCityListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetCityListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<City>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetCityListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetCityListByCode(
        $code
        ) {
            return $this->act->GetCityListByCode(
                $code
            );
        }
        
    public function GetCityByCode(
        $code
    ) {
        foreach($this->act->GetCityListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetCityListByCode(
        $code
    ) {
        return $this->CachedGetCityListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetCityListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetCityListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<City>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetCityListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function CountPostalCode(
    ) {      
        return $this->act->CountPostalCode(
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountPostalCodeByUuid(
        $uuid
    ) {      
        return $this->act->CountPostalCodeByUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountPostalCodeByCode(
        $code
    ) {      
        return $this->act->CountPostalCodeByCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowsePostalCodeListByFilter($filter_obj) {
        return $this->act->BrowsePostalCodeListByFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetPostalCodeByUuid($set_type, $obj) {
        return $this->act->SetPostalCodeByUuid($set_type, $obj);
    }
               
    public function SetPostalCodeByUuidFull($obj) {
        return $this->act->SetPostalCodeByUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetPostalCodeByCode($set_type, $obj) {
        return $this->act->SetPostalCodeByCode($set_type, $obj);
    }
               
    public function SetPostalCodeByCodeFull($obj) {
        return $this->act->SetPostalCodeByCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelPostalCodeByUuid(
        $uuid
    ) {         
        return $this->act->DelPostalCodeByUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelPostalCodeByCode(
        $code
    ) {         
        return $this->act->DelPostalCodeByCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function GetPostalCodeList(
        ) {
            return $this->act->GetPostalCodeList(
            );
        }
        
    public function GetPostalCode(
    ) {
        foreach($this->act->GetPostalCodeList(
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetPostalCodeList(
    ) {
        return $this->CachedGetPostalCodeList(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
        );
    }
    */
        
    public function CachedGetPostalCodeList(
        $overrideCache
        , $cacheHours
    ) {

        $objs = array();

        $method_name = "CachedGetPostalCodeList";

        $sb = "";
        $sb += $method_name;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<PostalCode>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetPostalCodeList(
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetPostalCodeListByUuid(
        $uuid
        ) {
            return $this->act->GetPostalCodeListByUuid(
                $uuid
            );
        }
        
    public function GetPostalCodeByUuid(
        $uuid
    ) {
        foreach($this->act->GetPostalCodeListByUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetPostalCodeListByUuid(
        $uuid
    ) {
        return $this->CachedGetPostalCodeListByUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetPostalCodeListByUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetPostalCodeListByUuid";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$uuid");
        $sb += "_";
        $sb += $uuid;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<PostalCode>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetPostalCodeListByUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetPostalCodeListByCode(
        $code
        ) {
            return $this->act->GetPostalCodeListByCode(
                $code
            );
        }
        
    public function GetPostalCodeByCode(
        $code
    ) {
        foreach($this->act->GetPostalCodeListByCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetPostalCodeListByCode(
        $code
    ) {
        return $this->CachedGetPostalCodeListByCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetPostalCodeListByCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetPostalCodeListByCode";

        $sb = "";
        $sb += $method_name;
        $sb += "_";
        $sb += strtolower("$code");
        $sb += "_";
        $sb += $code;

        $cache_key = $sb;

        //$objs = CacheUtil.Get<List<PostalCode>>(cache_key);

        if ($objs == NULL || $overrideCache) // if object not cached, get and cache
        {
            $objs = $this->GetPostalCodeListByCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
    
}

?>
