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
    public function CountProfileUuid(
        $uuid
    ) {      
        return $this->act->CountProfileUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileUsernameHash(
        $username
        , $hash
    ) {      
        return $this->act->CountProfileUsernameHash(
        $username
        , $hash
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileUsername(
        $username
    ) {      
        return $this->act->CountProfileUsername(
        $username
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileListFilter($filter_obj) {
        return $this->act->BrowseProfileListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileUuid($set_type, $obj) {
        return $this->act->SetProfileUuid($set_type, $obj);
    }
               
    public function SetProfileUuidFull($obj) {
        return $this->act->SetProfileUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileUsername($set_type, $obj) {
        return $this->act->SetProfileUsername($set_type, $obj);
    }
               
    public function SetProfileUsernameFull($obj) {
        return $this->act->SetProfileUsername('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileUuid(
        $uuid
    ) {         
        return $this->act->DelProfileUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileUsername(
        $username
    ) {         
        return $this->act->DelProfileUsername(
        $username
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileListUuid(
        $uuid
        ) {
            return $this->act->GetProfileListUuid(
                $uuid
            );
        }
        
    public function GetProfileUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileListUuid(
        $uuid
    ) {
        return $this->CachedGetProfileListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileListUuid";

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
            $objs = $this->GetProfileListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileListUsernameHash(
        $username
        , $hash
        ) {
            return $this->act->GetProfileListUsernameHash(
                $username
                , $hash
            );
        }
        
    public function GetProfileUsernameHash(
        $username
        , $hash
    ) {
        foreach($this->act->GetProfileListUsernameHash(
        $username
        , $hash
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileListUsernameHash(
        $username
        , $hash
    ) {
        return $this->CachedGetProfileListUsernameHash(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $username
            , $hash
        );
    }
    */
        
    public function CachedGetProfileListUsernameHash(
        $overrideCache
        , $cacheHours
        , $username
        , $hash
    ) {

        $objs = array();

        $method_name = "CachedGetProfileListUsernameHash";

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
            $objs = $this->GetProfileListUsernameHash(
                $username
                , $hash
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileListUsername(
        $username
        ) {
            return $this->act->GetProfileListUsername(
                $username
            );
        }
        
    public function GetProfileUsername(
        $username
    ) {
        foreach($this->act->GetProfileListUsername(
        $username
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileListUsername(
        $username
    ) {
        return $this->CachedGetProfileListUsername(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $username
        );
    }
    */
        
    public function CachedGetProfileListUsername(
        $overrideCache
        , $cacheHours
        , $username
    ) {

        $objs = array();

        $method_name = "CachedGetProfileListUsername";

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
            $objs = $this->GetProfileListUsername(
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
    public function CountProfileTypeUuid(
        $uuid
    ) {      
        return $this->act->CountProfileTypeUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileTypeTypeId(
        $type_id
    ) {      
        return $this->act->CountProfileTypeTypeId(
        $type_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileTypeListFilter($filter_obj) {
        return $this->act->BrowseProfileTypeListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileTypeUuid($set_type, $obj) {
        return $this->act->SetProfileTypeUuid($set_type, $obj);
    }
               
    public function SetProfileTypeUuidFull($obj) {
        return $this->act->SetProfileTypeUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileTypeUuid(
        $uuid
    ) {         
        return $this->act->DelProfileTypeUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileTypeListUuid(
        $uuid
        ) {
            return $this->act->GetProfileTypeListUuid(
                $uuid
            );
        }
        
    public function GetProfileTypeUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileTypeListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileTypeListUuid(
        $uuid
    ) {
        return $this->CachedGetProfileTypeListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileTypeListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileTypeListUuid";

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
            $objs = $this->GetProfileTypeListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileTypeListCode(
        $code
        ) {
            return $this->act->GetProfileTypeListCode(
                $code
            );
        }
        
    public function GetProfileTypeCode(
        $code
    ) {
        foreach($this->act->GetProfileTypeListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileTypeListCode(
        $code
    ) {
        return $this->CachedGetProfileTypeListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetProfileTypeListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetProfileTypeListCode";

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
            $objs = $this->GetProfileTypeListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileTypeListTypeId(
        $type_id
        ) {
            return $this->act->GetProfileTypeListTypeId(
                $type_id
            );
        }
        
    public function GetProfileTypeTypeId(
        $type_id
    ) {
        foreach($this->act->GetProfileTypeListTypeId(
        $type_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileTypeListTypeId(
        $type_id
    ) {
        return $this->CachedGetProfileTypeListTypeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $type_id
        );
    }
    */
        
    public function CachedGetProfileTypeListTypeId(
        $overrideCache
        , $cacheHours
        , $type_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileTypeListTypeId";

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
            $objs = $this->GetProfileTypeListTypeId(
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
    public function CountProfileAttributeUuid(
        $uuid
    ) {      
        return $this->act->CountProfileAttributeUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileAttributeCode(
        $code
    ) {      
        return $this->act->CountProfileAttributeCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileAttributeType(
        $type
    ) {      
        return $this->act->CountProfileAttributeType(
        $type
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileAttributeGroup(
        $group
    ) {      
        return $this->act->CountProfileAttributeGroup(
        $group
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileAttributeCodeType(
        $code
        , $type
    ) {      
        return $this->act->CountProfileAttributeCodeType(
        $code
        , $type
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileAttributeListFilter($filter_obj) {
        return $this->act->BrowseProfileAttributeListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileAttributeUuid($set_type, $obj) {
        return $this->act->SetProfileAttributeUuid($set_type, $obj);
    }
               
    public function SetProfileAttributeUuidFull($obj) {
        return $this->act->SetProfileAttributeUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileAttributeCode($set_type, $obj) {
        return $this->act->SetProfileAttributeCode($set_type, $obj);
    }
               
    public function SetProfileAttributeCodeFull($obj) {
        return $this->act->SetProfileAttributeCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileAttributeUuid(
        $uuid
    ) {         
        return $this->act->DelProfileAttributeUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileAttributeCode(
        $code
    ) {         
        return $this->act->DelProfileAttributeCode(
        $code
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileAttributeListUuid(
        $uuid
        ) {
            return $this->act->GetProfileAttributeListUuid(
                $uuid
            );
        }
        
    public function GetProfileAttributeUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileAttributeListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAttributeListUuid(
        $uuid
    ) {
        return $this->CachedGetProfileAttributeListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileAttributeListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAttributeListUuid";

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
            $objs = $this->GetProfileAttributeListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAttributeListCode(
        $code
        ) {
            return $this->act->GetProfileAttributeListCode(
                $code
            );
        }
        
    public function GetProfileAttributeCode(
        $code
    ) {
        foreach($this->act->GetProfileAttributeListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAttributeListCode(
        $code
    ) {
        return $this->CachedGetProfileAttributeListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetProfileAttributeListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAttributeListCode";

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
            $objs = $this->GetProfileAttributeListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAttributeListType(
        $type
        ) {
            return $this->act->GetProfileAttributeListType(
                $type
            );
        }
        
    public function GetProfileAttributeType(
        $type
    ) {
        foreach($this->act->GetProfileAttributeListType(
        $type
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAttributeListType(
        $type
    ) {
        return $this->CachedGetProfileAttributeListType(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $type
        );
    }
    */
        
    public function CachedGetProfileAttributeListType(
        $overrideCache
        , $cacheHours
        , $type
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAttributeListType";

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
            $objs = $this->GetProfileAttributeListType(
                $type
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAttributeListGroup(
        $group
        ) {
            return $this->act->GetProfileAttributeListGroup(
                $group
            );
        }
        
    public function GetProfileAttributeGroup(
        $group
    ) {
        foreach($this->act->GetProfileAttributeListGroup(
        $group
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAttributeListGroup(
        $group
    ) {
        return $this->CachedGetProfileAttributeListGroup(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $group
        );
    }
    */
        
    public function CachedGetProfileAttributeListGroup(
        $overrideCache
        , $cacheHours
        , $group
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAttributeListGroup";

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
            $objs = $this->GetProfileAttributeListGroup(
                $group
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAttributeListCodeType(
        $code
        , $type
        ) {
            return $this->act->GetProfileAttributeListCodeType(
                $code
                , $type
            );
        }
        
    public function GetProfileAttributeCodeType(
        $code
        , $type
    ) {
        foreach($this->act->GetProfileAttributeListCodeType(
        $code
        , $type
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAttributeListCodeType(
        $code
        , $type
    ) {
        return $this->CachedGetProfileAttributeListCodeType(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
            , $type
        );
    }
    */
        
    public function CachedGetProfileAttributeListCodeType(
        $overrideCache
        , $cacheHours
        , $code
        , $type
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAttributeListCodeType";

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
            $objs = $this->GetProfileAttributeListCodeType(
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
    public function CountProfileAttributeTextUuid(
        $uuid
    ) {      
        return $this->act->CountProfileAttributeTextUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileAttributeTextProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileAttributeTextProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileAttributeTextProfileIdAttributeId(
        $profile_id
        , $attribute_id
    ) {      
        return $this->act->CountProfileAttributeTextProfileIdAttributeId(
        $profile_id
        , $attribute_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileAttributeTextListFilter($filter_obj) {
        return $this->act->BrowseProfileAttributeTextListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileAttributeTextUuid($set_type, $obj) {
        return $this->act->SetProfileAttributeTextUuid($set_type, $obj);
    }
               
    public function SetProfileAttributeTextUuidFull($obj) {
        return $this->act->SetProfileAttributeTextUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileAttributeTextProfileId($set_type, $obj) {
        return $this->act->SetProfileAttributeTextProfileId($set_type, $obj);
    }
               
    public function SetProfileAttributeTextProfileIdFull($obj) {
        return $this->act->SetProfileAttributeTextProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileAttributeTextProfileIdAttributeId($set_type, $obj) {
        return $this->act->SetProfileAttributeTextProfileIdAttributeId($set_type, $obj);
    }
               
    public function SetProfileAttributeTextProfileIdAttributeIdFull($obj) {
        return $this->act->SetProfileAttributeTextProfileIdAttributeId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileAttributeTextUuid(
        $uuid
    ) {         
        return $this->act->DelProfileAttributeTextUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileAttributeTextProfileId(
        $profile_id
    ) {         
        return $this->act->DelProfileAttributeTextProfileId(
        $profile_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileAttributeTextProfileIdAttributeId(
        $profile_id
        , $attribute_id
    ) {         
        return $this->act->DelProfileAttributeTextProfileIdAttributeId(
        $profile_id
        , $attribute_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileAttributeTextListUuid(
        $uuid
        ) {
            return $this->act->GetProfileAttributeTextListUuid(
                $uuid
            );
        }
        
    public function GetProfileAttributeTextUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileAttributeTextListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAttributeTextListUuid(
        $uuid
    ) {
        return $this->CachedGetProfileAttributeTextListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileAttributeTextListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAttributeTextListUuid";

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
            $objs = $this->GetProfileAttributeTextListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAttributeTextListProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileAttributeTextListProfileId(
                $profile_id
            );
        }
        
    public function GetProfileAttributeTextProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileAttributeTextListProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAttributeTextListProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileAttributeTextListProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileAttributeTextListProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAttributeTextListProfileId";

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
            $objs = $this->GetProfileAttributeTextListProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAttributeTextListProfileIdAttributeId(
        $profile_id
        , $attribute_id
        ) {
            return $this->act->GetProfileAttributeTextListProfileIdAttributeId(
                $profile_id
                , $attribute_id
            );
        }
        
    public function GetProfileAttributeTextProfileIdAttributeId(
        $profile_id
        , $attribute_id
    ) {
        foreach($this->act->GetProfileAttributeTextListProfileIdAttributeId(
        $profile_id
        , $attribute_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAttributeTextListProfileIdAttributeId(
        $profile_id
        , $attribute_id
    ) {
        return $this->CachedGetProfileAttributeTextListProfileIdAttributeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $attribute_id
        );
    }
    */
        
    public function CachedGetProfileAttributeTextListProfileIdAttributeId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $attribute_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAttributeTextListProfileIdAttributeId";

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
            $objs = $this->GetProfileAttributeTextListProfileIdAttributeId(
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
    public function CountProfileAttributeDataUuid(
        $uuid
    ) {      
        return $this->act->CountProfileAttributeDataUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileAttributeDataProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileAttributeDataProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileAttributeDataProfileIdAttributeId(
        $profile_id
        , $attribute_id
    ) {      
        return $this->act->CountProfileAttributeDataProfileIdAttributeId(
        $profile_id
        , $attribute_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileAttributeDataListFilter($filter_obj) {
        return $this->act->BrowseProfileAttributeDataListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileAttributeDataUuid($set_type, $obj) {
        return $this->act->SetProfileAttributeDataUuid($set_type, $obj);
    }
               
    public function SetProfileAttributeDataUuidFull($obj) {
        return $this->act->SetProfileAttributeDataUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileAttributeDataProfileId($set_type, $obj) {
        return $this->act->SetProfileAttributeDataProfileId($set_type, $obj);
    }
               
    public function SetProfileAttributeDataProfileIdFull($obj) {
        return $this->act->SetProfileAttributeDataProfileId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileAttributeDataProfileIdAttributeId($set_type, $obj) {
        return $this->act->SetProfileAttributeDataProfileIdAttributeId($set_type, $obj);
    }
               
    public function SetProfileAttributeDataProfileIdAttributeIdFull($obj) {
        return $this->act->SetProfileAttributeDataProfileIdAttributeId('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileAttributeDataUuid(
        $uuid
    ) {         
        return $this->act->DelProfileAttributeDataUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileAttributeDataProfileId(
        $profile_id
    ) {         
        return $this->act->DelProfileAttributeDataProfileId(
        $profile_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileAttributeDataProfileIdAttributeId(
        $profile_id
        , $attribute_id
    ) {         
        return $this->act->DelProfileAttributeDataProfileIdAttributeId(
        $profile_id
        , $attribute_id
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileAttributeDataListUuid(
        $uuid
        ) {
            return $this->act->GetProfileAttributeDataListUuid(
                $uuid
            );
        }
        
    public function GetProfileAttributeDataUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileAttributeDataListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAttributeDataListUuid(
        $uuid
    ) {
        return $this->CachedGetProfileAttributeDataListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileAttributeDataListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAttributeDataListUuid";

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
            $objs = $this->GetProfileAttributeDataListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAttributeDataListProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileAttributeDataListProfileId(
                $profile_id
            );
        }
        
    public function GetProfileAttributeDataProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileAttributeDataListProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAttributeDataListProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileAttributeDataListProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileAttributeDataListProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAttributeDataListProfileId";

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
            $objs = $this->GetProfileAttributeDataListProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileAttributeDataListProfileIdAttributeId(
        $profile_id
        , $attribute_id
        ) {
            return $this->act->GetProfileAttributeDataListProfileIdAttributeId(
                $profile_id
                , $attribute_id
            );
        }
        
    public function GetProfileAttributeDataProfileIdAttributeId(
        $profile_id
        , $attribute_id
    ) {
        foreach($this->act->GetProfileAttributeDataListProfileIdAttributeId(
        $profile_id
        , $attribute_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileAttributeDataListProfileIdAttributeId(
        $profile_id
        , $attribute_id
    ) {
        return $this->CachedGetProfileAttributeDataListProfileIdAttributeId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $attribute_id
        );
    }
    */
        
    public function CachedGetProfileAttributeDataListProfileIdAttributeId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $attribute_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileAttributeDataListProfileIdAttributeId";

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
            $objs = $this->GetProfileAttributeDataListProfileIdAttributeId(
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
    public function CountProfileDeviceUuid(
        $uuid
    ) {      
        return $this->act->CountProfileDeviceUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileDeviceProfileIdDeviceId(
        $profile_id
        , $device_id
    ) {      
        return $this->act->CountProfileDeviceProfileIdDeviceId(
        $profile_id
        , $device_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileDeviceProfileIdToken(
        $profile_id
        , $token
    ) {      
        return $this->act->CountProfileDeviceProfileIdToken(
        $profile_id
        , $token
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileDeviceProfileId(
        $profile_id
    ) {      
        return $this->act->CountProfileDeviceProfileId(
        $profile_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileDeviceDeviceId(
        $device_id
    ) {      
        return $this->act->CountProfileDeviceDeviceId(
        $device_id
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountProfileDeviceToken(
        $token
    ) {      
        return $this->act->CountProfileDeviceToken(
        $token
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseProfileDeviceListFilter($filter_obj) {
        return $this->act->BrowseProfileDeviceListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetProfileDeviceUuid($set_type, $obj) {
        return $this->act->SetProfileDeviceUuid($set_type, $obj);
    }
               
    public function SetProfileDeviceUuidFull($obj) {
        return $this->act->SetProfileDeviceUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelProfileDeviceUuid(
        $uuid
    ) {         
        return $this->act->DelProfileDeviceUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileDeviceProfileIdDeviceId(
        $profile_id
        , $device_id
    ) {         
        return $this->act->DelProfileDeviceProfileIdDeviceId(
        $profile_id
        , $device_id
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileDeviceProfileIdToken(
        $profile_id
        , $token
    ) {         
        return $this->act->DelProfileDeviceProfileIdToken(
        $profile_id
        , $token
        );
    }
#------------------------------------------------------------------------------                    
    public function DelProfileDeviceToken(
        $token
    ) {         
        return $this->act->DelProfileDeviceToken(
        $token
        );
    }
#------------------------------------------------------------------------------                    
    public function GetProfileDeviceListUuid(
        $uuid
        ) {
            return $this->act->GetProfileDeviceListUuid(
                $uuid
            );
        }
        
    public function GetProfileDeviceUuid(
        $uuid
    ) {
        foreach($this->act->GetProfileDeviceListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileDeviceListUuid(
        $uuid
    ) {
        return $this->CachedGetProfileDeviceListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetProfileDeviceListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetProfileDeviceListUuid";

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
            $objs = $this->GetProfileDeviceListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileDeviceListProfileIdDeviceId(
        $profile_id
        , $device_id
        ) {
            return $this->act->GetProfileDeviceListProfileIdDeviceId(
                $profile_id
                , $device_id
            );
        }
        
    public function GetProfileDeviceProfileIdDeviceId(
        $profile_id
        , $device_id
    ) {
        foreach($this->act->GetProfileDeviceListProfileIdDeviceId(
        $profile_id
        , $device_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileDeviceListProfileIdDeviceId(
        $profile_id
        , $device_id
    ) {
        return $this->CachedGetProfileDeviceListProfileIdDeviceId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $device_id
        );
    }
    */
        
    public function CachedGetProfileDeviceListProfileIdDeviceId(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $device_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileDeviceListProfileIdDeviceId";

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
            $objs = $this->GetProfileDeviceListProfileIdDeviceId(
                $profile_id
                , $device_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileDeviceListProfileIdToken(
        $profile_id
        , $token
        ) {
            return $this->act->GetProfileDeviceListProfileIdToken(
                $profile_id
                , $token
            );
        }
        
    public function GetProfileDeviceProfileIdToken(
        $profile_id
        , $token
    ) {
        foreach($this->act->GetProfileDeviceListProfileIdToken(
        $profile_id
        , $token
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileDeviceListProfileIdToken(
        $profile_id
        , $token
    ) {
        return $this->CachedGetProfileDeviceListProfileIdToken(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
            , $token
        );
    }
    */
        
    public function CachedGetProfileDeviceListProfileIdToken(
        $overrideCache
        , $cacheHours
        , $profile_id
        , $token
    ) {

        $objs = array();

        $method_name = "CachedGetProfileDeviceListProfileIdToken";

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
            $objs = $this->GetProfileDeviceListProfileIdToken(
                $profile_id
                , $token
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileDeviceListProfileId(
        $profile_id
        ) {
            return $this->act->GetProfileDeviceListProfileId(
                $profile_id
            );
        }
        
    public function GetProfileDeviceProfileId(
        $profile_id
    ) {
        foreach($this->act->GetProfileDeviceListProfileId(
        $profile_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileDeviceListProfileId(
        $profile_id
    ) {
        return $this->CachedGetProfileDeviceListProfileId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $profile_id
        );
    }
    */
        
    public function CachedGetProfileDeviceListProfileId(
        $overrideCache
        , $cacheHours
        , $profile_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileDeviceListProfileId";

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
            $objs = $this->GetProfileDeviceListProfileId(
                $profile_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileDeviceListDeviceId(
        $device_id
        ) {
            return $this->act->GetProfileDeviceListDeviceId(
                $device_id
            );
        }
        
    public function GetProfileDeviceDeviceId(
        $device_id
    ) {
        foreach($this->act->GetProfileDeviceListDeviceId(
        $device_id
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileDeviceListDeviceId(
        $device_id
    ) {
        return $this->CachedGetProfileDeviceListDeviceId(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $device_id
        );
    }
    */
        
    public function CachedGetProfileDeviceListDeviceId(
        $overrideCache
        , $cacheHours
        , $device_id
    ) {

        $objs = array();

        $method_name = "CachedGetProfileDeviceListDeviceId";

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
            $objs = $this->GetProfileDeviceListDeviceId(
                $device_id
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetProfileDeviceListToken(
        $token
        ) {
            return $this->act->GetProfileDeviceListToken(
                $token
            );
        }
        
    public function GetProfileDeviceToken(
        $token
    ) {
        foreach($this->act->GetProfileDeviceListToken(
        $token
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetProfileDeviceListToken(
        $token
    ) {
        return $this->CachedGetProfileDeviceListToken(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $token
        );
    }
    */
        
    public function CachedGetProfileDeviceListToken(
        $overrideCache
        , $cacheHours
        , $token
    ) {

        $objs = array();

        $method_name = "CachedGetProfileDeviceListToken";

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
            $objs = $this->GetProfileDeviceListToken(
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
    public function CountCountryUuid(
        $uuid
    ) {      
        return $this->act->CountCountryUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountCountryCode(
        $code
    ) {      
        return $this->act->CountCountryCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseCountryListFilter($filter_obj) {
        return $this->act->BrowseCountryListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetCountryUuid($set_type, $obj) {
        return $this->act->SetCountryUuid($set_type, $obj);
    }
               
    public function SetCountryUuidFull($obj) {
        return $this->act->SetCountryUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetCountryCode($set_type, $obj) {
        return $this->act->SetCountryCode($set_type, $obj);
    }
               
    public function SetCountryCodeFull($obj) {
        return $this->act->SetCountryCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelCountryUuid(
        $uuid
    ) {         
        return $this->act->DelCountryUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelCountryCode(
        $code
    ) {         
        return $this->act->DelCountryCode(
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
    public function GetCountryListUuid(
        $uuid
        ) {
            return $this->act->GetCountryListUuid(
                $uuid
            );
        }
        
    public function GetCountryUuid(
        $uuid
    ) {
        foreach($this->act->GetCountryListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetCountryListUuid(
        $uuid
    ) {
        return $this->CachedGetCountryListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetCountryListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetCountryListUuid";

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
            $objs = $this->GetCountryListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetCountryListCode(
        $code
        ) {
            return $this->act->GetCountryListCode(
                $code
            );
        }
        
    public function GetCountryCode(
        $code
    ) {
        foreach($this->act->GetCountryListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetCountryListCode(
        $code
    ) {
        return $this->CachedGetCountryListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetCountryListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetCountryListCode";

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
            $objs = $this->GetCountryListCode(
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
    public function CountStateUuid(
        $uuid
    ) {      
        return $this->act->CountStateUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountStateCode(
        $code
    ) {      
        return $this->act->CountStateCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseStateListFilter($filter_obj) {
        return $this->act->BrowseStateListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetStateUuid($set_type, $obj) {
        return $this->act->SetStateUuid($set_type, $obj);
    }
               
    public function SetStateUuidFull($obj) {
        return $this->act->SetStateUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetStateCode($set_type, $obj) {
        return $this->act->SetStateCode($set_type, $obj);
    }
               
    public function SetStateCodeFull($obj) {
        return $this->act->SetStateCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelStateUuid(
        $uuid
    ) {         
        return $this->act->DelStateUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelStateCode(
        $code
    ) {         
        return $this->act->DelStateCode(
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
    public function GetStateListUuid(
        $uuid
        ) {
            return $this->act->GetStateListUuid(
                $uuid
            );
        }
        
    public function GetStateUuid(
        $uuid
    ) {
        foreach($this->act->GetStateListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetStateListUuid(
        $uuid
    ) {
        return $this->CachedGetStateListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetStateListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetStateListUuid";

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
            $objs = $this->GetStateListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetStateListCode(
        $code
        ) {
            return $this->act->GetStateListCode(
                $code
            );
        }
        
    public function GetStateCode(
        $code
    ) {
        foreach($this->act->GetStateListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetStateListCode(
        $code
    ) {
        return $this->CachedGetStateListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetStateListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetStateListCode";

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
            $objs = $this->GetStateListCode(
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
    public function CountCityUuid(
        $uuid
    ) {      
        return $this->act->CountCityUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountCityCode(
        $code
    ) {      
        return $this->act->CountCityCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowseCityListFilter($filter_obj) {
        return $this->act->BrowseCityListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetCityUuid($set_type, $obj) {
        return $this->act->SetCityUuid($set_type, $obj);
    }
               
    public function SetCityUuidFull($obj) {
        return $this->act->SetCityUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetCityCode($set_type, $obj) {
        return $this->act->SetCityCode($set_type, $obj);
    }
               
    public function SetCityCodeFull($obj) {
        return $this->act->SetCityCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelCityUuid(
        $uuid
    ) {         
        return $this->act->DelCityUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelCityCode(
        $code
    ) {         
        return $this->act->DelCityCode(
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
    public function GetCityListUuid(
        $uuid
        ) {
            return $this->act->GetCityListUuid(
                $uuid
            );
        }
        
    public function GetCityUuid(
        $uuid
    ) {
        foreach($this->act->GetCityListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetCityListUuid(
        $uuid
    ) {
        return $this->CachedGetCityListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetCityListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetCityListUuid";

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
            $objs = $this->GetCityListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetCityListCode(
        $code
        ) {
            return $this->act->GetCityListCode(
                $code
            );
        }
        
    public function GetCityCode(
        $code
    ) {
        foreach($this->act->GetCityListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetCityListCode(
        $code
    ) {
        return $this->CachedGetCityListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetCityListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetCityListCode";

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
            $objs = $this->GetCityListCode(
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
    public function CountPostalCodeUuid(
        $uuid
    ) {      
        return $this->act->CountPostalCodeUuid(
        $uuid
        );
    }
        
#------------------------------------------------------------------------------                    
    public function CountPostalCodeCode(
        $code
    ) {      
        return $this->act->CountPostalCodeCode(
        $code
        );
    }
        
#------------------------------------------------------------------------------                    
    public function BrowsePostalCodeListFilter($filter_obj) {
        return $this->act->BrowsePostalCodeListFilter($filter_obj);
    }
#------------------------------------------------------------------------------                    
    public function SetPostalCodeUuid($set_type, $obj) {
        return $this->act->SetPostalCodeUuid($set_type, $obj);
    }
               
    public function SetPostalCodeUuidFull($obj) {
        return $this->act->SetPostalCodeUuid('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function SetPostalCodeCode($set_type, $obj) {
        return $this->act->SetPostalCodeCode($set_type, $obj);
    }
               
    public function SetPostalCodeCodeFull($obj) {
        return $this->act->SetPostalCodeCode('full', $obj);
    }
#------------------------------------------------------------------------------                    
    public function DelPostalCodeUuid(
        $uuid
    ) {         
        return $this->act->DelPostalCodeUuid(
        $uuid
        );
    }
#------------------------------------------------------------------------------                    
    public function DelPostalCodeCode(
        $code
    ) {         
        return $this->act->DelPostalCodeCode(
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
    public function GetPostalCodeListUuid(
        $uuid
        ) {
            return $this->act->GetPostalCodeListUuid(
                $uuid
            );
        }
        
    public function GetPostalCodeUuid(
        $uuid
    ) {
        foreach($this->act->GetPostalCodeListUuid(
        $uuid
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetPostalCodeListUuid(
        $uuid
    ) {
        return $this->CachedGetPostalCodeListUuid(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $uuid
        );
    }
    */
        
    public function CachedGetPostalCodeListUuid(
        $overrideCache
        , $cacheHours
        , $uuid
    ) {

        $objs = array();

        $method_name = "CachedGetPostalCodeListUuid";

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
            $objs = $this->GetPostalCodeListUuid(
                $uuid
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
#------------------------------------------------------------------------------                    
    public function GetPostalCodeListCode(
        $code
        ) {
            return $this->act->GetPostalCodeListCode(
                $code
            );
        }
        
    public function GetPostalCodeCode(
        $code
    ) {
        foreach($this->act->GetPostalCodeListCode(
        $code
        ) as $item) {
            return $item;
        }
        return NULL;
    }
    
    /*
    public function CachedGetPostalCodeListCode(
        $code
    ) {
        return $this->CachedGetPostalCodeListCode(
            FALSE
            , $this->CACHE_DEFAULT_HOURS
            , $code
        );
    }
    */
        
    public function CachedGetPostalCodeListCode(
        $overrideCache
        , $cacheHours
        , $code
    ) {

        $objs = array();

        $method_name = "CachedGetPostalCodeListCode";

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
            $objs = $this->GetPostalCodeListCode(
                $code
            );
            //CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return $objs;
    }
              
    
}

?>
