import ent
from ent import *

import BaseProfileACT
from BaseProfileACT import *

def enum(**enums):
    return type('Enum', (), enums)
    
SetType = enum(FULL='full', INSERT_ONLY='insertonly', UPDATE_ONLY='updateonly')

class BaseProfileAPI(object):

    def __init__(self):
        self.DEFAULT_CACHE_HOURS = 12
        self.DEFAULT_SET_TYPE = 'full'
        self.act = BaseProfileACT()
        
        

#------------------------------------------------------------------------------                    
    def CountProfile(self
    ) :         
        return self.act.CountProfile(
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileByUuid(self
        , uuid
    ) :         
        return self.act.CountProfileByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileByUsernameByHash(self
        , username
        , hash
    ) :         
        return self.act.CountProfileByUsernameByHash(
        username
        , hash
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileByUsername(self
        , username
    ) :         
        return self.act.CountProfileByUsername(
        username
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileListByFilter(self, filter_obj) :
        return self.act.BrowseProfileListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileByUuid(self, set_type, obj) :
        return self.act.SetProfileByUuid(set_type, obj)
               
    def SetProfileByUuid(self, set_type, obj) :
        return self.act.SetProfileByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileByUsername(self, set_type, obj) :
        return self.act.SetProfileByUsername(set_type, obj)
               
    def SetProfileByUsername(self, set_type, obj) :
        return self.act.SetProfileByUsername('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileByUuid(self
        , uuid
    ) :          
        return self.act.DelProfileByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileByUsername(self
        , username
    ) :          
        return self.act.DelProfileByUsername(
        username
        )
#------------------------------------------------------------------------------                    
    def GetProfileListByUuid(self
        , uuid
        ) :
            return self.act.GetProfileListByUuid(
                uuid
            )
        
    def GetProfileByUuid(self
        , uuid
    ) :
        for item in self.GetProfileListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileListByUuid(self
        , uuid
    ) :
        return CachedGetProfileListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Profile> objs;

        string method_name = "CachedGetProfileListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Profile>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileListByUsernameByHash(self
        , username
        , hash
        ) :
            return self.act.GetProfileListByUsernameByHash(
                username
                , hash
            )
        
    def GetProfileByUsernameByHash(self
        , username
        , hash
    ) :
        for item in self.GetProfileListByUsernameByHash(
        username
        , hash
        ) :
            return item
        return None
    
    def CachedGetProfileListByUsernameByHash(self
        , username
        , hash
    ) :
        return CachedGetProfileListByUsernameByHash(
            false
            , self.CACHE_DEFAULT_HOURS
            , username
            , hash
        )
        
    def CachedGetProfileListByUsernameByHash(self
        , overrideCache
        , cacheHours
        , username
        , hash
    ) :
        pass
        """
        List<Profile> objs;

        string method_name = "CachedGetProfileListByUsernameByHash";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("username".ToLower());
        sb.Append("_");
        sb.Append(username);
        sb.Append("_");
        sb.Append("hash".ToLower());
        sb.Append("_");
        sb.Append(hash);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Profile>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileListByUsernameByHash(
                username
                , hash
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileListByUsername(self
        , username
        ) :
            return self.act.GetProfileListByUsername(
                username
            )
        
    def GetProfileByUsername(self
        , username
    ) :
        for item in self.GetProfileListByUsername(
        username
        ) :
            return item
        return None
    
    def CachedGetProfileListByUsername(self
        , username
    ) :
        return CachedGetProfileListByUsername(
            false
            , self.CACHE_DEFAULT_HOURS
            , username
        )
        
    def CachedGetProfileListByUsername(self
        , overrideCache
        , cacheHours
        , username
    ) :
        pass
        """
        List<Profile> objs;

        string method_name = "CachedGetProfileListByUsername";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("username".ToLower());
        sb.Append("_");
        sb.Append(username);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Profile>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileListByUsername(
                username
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountProfileType(self
    ) :         
        return self.act.CountProfileType(
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileTypeByUuid(self
        , uuid
    ) :         
        return self.act.CountProfileTypeByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileTypeByTypeId(self
        , type_id
    ) :         
        return self.act.CountProfileTypeByTypeId(
        type_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileTypeListByFilter(self, filter_obj) :
        return self.act.BrowseProfileTypeListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileTypeByUuid(self, set_type, obj) :
        return self.act.SetProfileTypeByUuid(set_type, obj)
               
    def SetProfileTypeByUuid(self, set_type, obj) :
        return self.act.SetProfileTypeByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileTypeByUuid(self
        , uuid
    ) :          
        return self.act.DelProfileTypeByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetProfileTypeListByUuid(self
        , uuid
        ) :
            return self.act.GetProfileTypeListByUuid(
                uuid
            )
        
    def GetProfileTypeByUuid(self
        , uuid
    ) :
        for item in self.GetProfileTypeListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileTypeListByUuid(self
        , uuid
    ) :
        return CachedGetProfileTypeListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileTypeListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileType> objs;

        string method_name = "CachedGetProfileTypeListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileTypeListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileTypeListByCode(self
        , code
        ) :
            return self.act.GetProfileTypeListByCode(
                code
            )
        
    def GetProfileTypeByCode(self
        , code
    ) :
        for item in self.GetProfileTypeListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetProfileTypeListByCode(self
        , code
    ) :
        return CachedGetProfileTypeListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetProfileTypeListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<ProfileType> objs;

        string method_name = "CachedGetProfileTypeListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileTypeListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileTypeListByTypeId(self
        , type_id
        ) :
            return self.act.GetProfileTypeListByTypeId(
                type_id
            )
        
    def GetProfileTypeByTypeId(self
        , type_id
    ) :
        for item in self.GetProfileTypeListByTypeId(
        type_id
        ) :
            return item
        return None
    
    def CachedGetProfileTypeListByTypeId(self
        , type_id
    ) :
        return CachedGetProfileTypeListByTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , type_id
        )
        
    def CachedGetProfileTypeListByTypeId(self
        , overrideCache
        , cacheHours
        , type_id
    ) :
        pass
        """
        List<ProfileType> objs;

        string method_name = "CachedGetProfileTypeListByTypeId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("type_id".ToLower());
        sb.Append("_");
        sb.Append(type_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileTypeListByTypeId(
                type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountProfileAttribute(self
    ) :         
        return self.act.CountProfileAttribute(
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileAttributeByUuid(self
        , uuid
    ) :         
        return self.act.CountProfileAttributeByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileAttributeByCode(self
        , code
    ) :         
        return self.act.CountProfileAttributeByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileAttributeByType(self
        , type
    ) :         
        return self.act.CountProfileAttributeByType(
        type
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileAttributeByGroup(self
        , group
    ) :         
        return self.act.CountProfileAttributeByGroup(
        group
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileAttributeByCodeByType(self
        , code
        , type
    ) :         
        return self.act.CountProfileAttributeByCodeByType(
        code
        , type
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileAttributeListByFilter(self, filter_obj) :
        return self.act.BrowseProfileAttributeListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileAttributeByUuid(self, set_type, obj) :
        return self.act.SetProfileAttributeByUuid(set_type, obj)
               
    def SetProfileAttributeByUuid(self, set_type, obj) :
        return self.act.SetProfileAttributeByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileAttributeByCode(self, set_type, obj) :
        return self.act.SetProfileAttributeByCode(set_type, obj)
               
    def SetProfileAttributeByCode(self, set_type, obj) :
        return self.act.SetProfileAttributeByCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileAttributeByUuid(self
        , uuid
    ) :          
        return self.act.DelProfileAttributeByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileAttributeByCode(self
        , code
    ) :          
        return self.act.DelProfileAttributeByCode(
        code
        )
#------------------------------------------------------------------------------                    
    def GetProfileAttributeListByUuid(self
        , uuid
        ) :
            return self.act.GetProfileAttributeListByUuid(
                uuid
            )
        
    def GetProfileAttributeByUuid(self
        , uuid
    ) :
        for item in self.GetProfileAttributeListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileAttributeListByUuid(self
        , uuid
    ) :
        return CachedGetProfileAttributeListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileAttributeListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileAttribute> objs;

        string method_name = "CachedGetProfileAttributeListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileAttribute>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileAttributeListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAttributeListByCode(self
        , code
        ) :
            return self.act.GetProfileAttributeListByCode(
                code
            )
        
    def GetProfileAttributeByCode(self
        , code
    ) :
        for item in self.GetProfileAttributeListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetProfileAttributeListByCode(self
        , code
    ) :
        return CachedGetProfileAttributeListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetProfileAttributeListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<ProfileAttribute> objs;

        string method_name = "CachedGetProfileAttributeListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileAttribute>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileAttributeListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAttributeListByType(self
        , type
        ) :
            return self.act.GetProfileAttributeListByType(
                type
            )
        
    def GetProfileAttributeByType(self
        , type
    ) :
        for item in self.GetProfileAttributeListByType(
        type
        ) :
            return item
        return None
    
    def CachedGetProfileAttributeListByType(self
        , type
    ) :
        return CachedGetProfileAttributeListByType(
            false
            , self.CACHE_DEFAULT_HOURS
            , type
        )
        
    def CachedGetProfileAttributeListByType(self
        , overrideCache
        , cacheHours
        , type
    ) :
        pass
        """
        List<ProfileAttribute> objs;

        string method_name = "CachedGetProfileAttributeListByType";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("type".ToLower());
        sb.Append("_");
        sb.Append(type);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileAttribute>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileAttributeListByType(
                type
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAttributeListByGroup(self
        , group
        ) :
            return self.act.GetProfileAttributeListByGroup(
                group
            )
        
    def GetProfileAttributeByGroup(self
        , group
    ) :
        for item in self.GetProfileAttributeListByGroup(
        group
        ) :
            return item
        return None
    
    def CachedGetProfileAttributeListByGroup(self
        , group
    ) :
        return CachedGetProfileAttributeListByGroup(
            false
            , self.CACHE_DEFAULT_HOURS
            , group
        )
        
    def CachedGetProfileAttributeListByGroup(self
        , overrideCache
        , cacheHours
        , group
    ) :
        pass
        """
        List<ProfileAttribute> objs;

        string method_name = "CachedGetProfileAttributeListByGroup";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("group".ToLower());
        sb.Append("_");
        sb.Append(group);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileAttribute>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileAttributeListByGroup(
                group
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAttributeListByCodeByType(self
        , code
        , type
        ) :
            return self.act.GetProfileAttributeListByCodeByType(
                code
                , type
            )
        
    def GetProfileAttributeByCodeByType(self
        , code
        , type
    ) :
        for item in self.GetProfileAttributeListByCodeByType(
        code
        , type
        ) :
            return item
        return None
    
    def CachedGetProfileAttributeListByCodeByType(self
        , code
        , type
    ) :
        return CachedGetProfileAttributeListByCodeByType(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , type
        )
        
    def CachedGetProfileAttributeListByCodeByType(self
        , overrideCache
        , cacheHours
        , code
        , type
    ) :
        pass
        """
        List<ProfileAttribute> objs;

        string method_name = "CachedGetProfileAttributeListByCodeByType";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("type".ToLower());
        sb.Append("_");
        sb.Append(type);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileAttribute>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileAttributeListByCodeByType(
                code
                , type
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountProfileAttributeText(self
    ) :         
        return self.act.CountProfileAttributeText(
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileAttributeTextByUuid(self
        , uuid
    ) :         
        return self.act.CountProfileAttributeTextByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileAttributeTextByProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileAttributeTextByProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileAttributeTextByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :         
        return self.act.CountProfileAttributeTextByProfileIdByAttributeId(
        profile_id
        , attribute_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileAttributeTextListByFilter(self, filter_obj) :
        return self.act.BrowseProfileAttributeTextListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileAttributeTextByUuid(self, set_type, obj) :
        return self.act.SetProfileAttributeTextByUuid(set_type, obj)
               
    def SetProfileAttributeTextByUuid(self, set_type, obj) :
        return self.act.SetProfileAttributeTextByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileAttributeTextByProfileId(self, set_type, obj) :
        return self.act.SetProfileAttributeTextByProfileId(set_type, obj)
               
    def SetProfileAttributeTextByProfileId(self, set_type, obj) :
        return self.act.SetProfileAttributeTextByProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileAttributeTextByProfileIdByAttributeId(self, set_type, obj) :
        return self.act.SetProfileAttributeTextByProfileIdByAttributeId(set_type, obj)
               
    def SetProfileAttributeTextByProfileIdByAttributeId(self, set_type, obj) :
        return self.act.SetProfileAttributeTextByProfileIdByAttributeId('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileAttributeTextByUuid(self
        , uuid
    ) :          
        return self.act.DelProfileAttributeTextByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileAttributeTextByProfileId(self
        , profile_id
    ) :          
        return self.act.DelProfileAttributeTextByProfileId(
        profile_id
        )
#------------------------------------------------------------------------------                    
    def DelProfileAttributeTextByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :          
        return self.act.DelProfileAttributeTextByProfileIdByAttributeId(
        profile_id
        , attribute_id
        )
#------------------------------------------------------------------------------                    
    def GetProfileAttributeTextListByUuid(self
        , uuid
        ) :
            return self.act.GetProfileAttributeTextListByUuid(
                uuid
            )
        
    def GetProfileAttributeTextByUuid(self
        , uuid
    ) :
        for item in self.GetProfileAttributeTextListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileAttributeTextListByUuid(self
        , uuid
    ) :
        return CachedGetProfileAttributeTextListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileAttributeTextListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileAttributeText> objs;

        string method_name = "CachedGetProfileAttributeTextListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileAttributeText>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileAttributeTextListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAttributeTextListByProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileAttributeTextListByProfileId(
                profile_id
            )
        
    def GetProfileAttributeTextByProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileAttributeTextListByProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileAttributeTextListByProfileId(self
        , profile_id
    ) :
        return CachedGetProfileAttributeTextListByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileAttributeTextListByProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileAttributeText> objs;

        string method_name = "CachedGetProfileAttributeTextListByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileAttributeText>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileAttributeTextListByProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAttributeTextListByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
        ) :
            return self.act.GetProfileAttributeTextListByProfileIdByAttributeId(
                profile_id
                , attribute_id
            )
        
    def GetProfileAttributeTextByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :
        for item in self.GetProfileAttributeTextListByProfileIdByAttributeId(
        profile_id
        , attribute_id
        ) :
            return item
        return None
    
    def CachedGetProfileAttributeTextListByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :
        return CachedGetProfileAttributeTextListByProfileIdByAttributeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , attribute_id
        )
        
    def CachedGetProfileAttributeTextListByProfileIdByAttributeId(self
        , overrideCache
        , cacheHours
        , profile_id
        , attribute_id
    ) :
        pass
        """
        List<ProfileAttributeText> objs;

        string method_name = "CachedGetProfileAttributeTextListByProfileIdByAttributeId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("attribute_id".ToLower());
        sb.Append("_");
        sb.Append(attribute_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileAttributeText>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileAttributeTextListByProfileIdByAttributeId(
                profile_id
                , attribute_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountProfileAttributeData(self
    ) :         
        return self.act.CountProfileAttributeData(
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileAttributeDataByUuid(self
        , uuid
    ) :         
        return self.act.CountProfileAttributeDataByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileAttributeDataByProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileAttributeDataByProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileAttributeDataByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :         
        return self.act.CountProfileAttributeDataByProfileIdByAttributeId(
        profile_id
        , attribute_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileAttributeDataListByFilter(self, filter_obj) :
        return self.act.BrowseProfileAttributeDataListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileAttributeDataByUuid(self, set_type, obj) :
        return self.act.SetProfileAttributeDataByUuid(set_type, obj)
               
    def SetProfileAttributeDataByUuid(self, set_type, obj) :
        return self.act.SetProfileAttributeDataByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileAttributeDataByProfileId(self, set_type, obj) :
        return self.act.SetProfileAttributeDataByProfileId(set_type, obj)
               
    def SetProfileAttributeDataByProfileId(self, set_type, obj) :
        return self.act.SetProfileAttributeDataByProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileAttributeDataByProfileIdByAttributeId(self, set_type, obj) :
        return self.act.SetProfileAttributeDataByProfileIdByAttributeId(set_type, obj)
               
    def SetProfileAttributeDataByProfileIdByAttributeId(self, set_type, obj) :
        return self.act.SetProfileAttributeDataByProfileIdByAttributeId('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileAttributeDataByUuid(self
        , uuid
    ) :          
        return self.act.DelProfileAttributeDataByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileAttributeDataByProfileId(self
        , profile_id
    ) :          
        return self.act.DelProfileAttributeDataByProfileId(
        profile_id
        )
#------------------------------------------------------------------------------                    
    def DelProfileAttributeDataByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :          
        return self.act.DelProfileAttributeDataByProfileIdByAttributeId(
        profile_id
        , attribute_id
        )
#------------------------------------------------------------------------------                    
    def GetProfileAttributeDataListByUuid(self
        , uuid
        ) :
            return self.act.GetProfileAttributeDataListByUuid(
                uuid
            )
        
    def GetProfileAttributeDataByUuid(self
        , uuid
    ) :
        for item in self.GetProfileAttributeDataListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileAttributeDataListByUuid(self
        , uuid
    ) :
        return CachedGetProfileAttributeDataListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileAttributeDataListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileAttributeData> objs;

        string method_name = "CachedGetProfileAttributeDataListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileAttributeData>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileAttributeDataListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAttributeDataListByProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileAttributeDataListByProfileId(
                profile_id
            )
        
    def GetProfileAttributeDataByProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileAttributeDataListByProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileAttributeDataListByProfileId(self
        , profile_id
    ) :
        return CachedGetProfileAttributeDataListByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileAttributeDataListByProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileAttributeData> objs;

        string method_name = "CachedGetProfileAttributeDataListByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileAttributeData>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileAttributeDataListByProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAttributeDataListByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
        ) :
            return self.act.GetProfileAttributeDataListByProfileIdByAttributeId(
                profile_id
                , attribute_id
            )
        
    def GetProfileAttributeDataByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :
        for item in self.GetProfileAttributeDataListByProfileIdByAttributeId(
        profile_id
        , attribute_id
        ) :
            return item
        return None
    
    def CachedGetProfileAttributeDataListByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :
        return CachedGetProfileAttributeDataListByProfileIdByAttributeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , attribute_id
        )
        
    def CachedGetProfileAttributeDataListByProfileIdByAttributeId(self
        , overrideCache
        , cacheHours
        , profile_id
        , attribute_id
    ) :
        pass
        """
        List<ProfileAttributeData> objs;

        string method_name = "CachedGetProfileAttributeDataListByProfileIdByAttributeId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("attribute_id".ToLower());
        sb.Append("_");
        sb.Append(attribute_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileAttributeData>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileAttributeDataListByProfileIdByAttributeId(
                profile_id
                , attribute_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountProfileDevice(self
    ) :         
        return self.act.CountProfileDevice(
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileDeviceByUuid(self
        , uuid
    ) :         
        return self.act.CountProfileDeviceByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileDeviceByProfileIdByDeviceId(self
        , profile_id
        , device_id
    ) :         
        return self.act.CountProfileDeviceByProfileIdByDeviceId(
        profile_id
        , device_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileDeviceByProfileIdByToken(self
        , profile_id
        , token
    ) :         
        return self.act.CountProfileDeviceByProfileIdByToken(
        profile_id
        , token
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileDeviceByProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileDeviceByProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileDeviceByDeviceId(self
        , device_id
    ) :         
        return self.act.CountProfileDeviceByDeviceId(
        device_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileDeviceByToken(self
        , token
    ) :         
        return self.act.CountProfileDeviceByToken(
        token
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileDeviceListByFilter(self, filter_obj) :
        return self.act.BrowseProfileDeviceListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileDeviceByUuid(self, set_type, obj) :
        return self.act.SetProfileDeviceByUuid(set_type, obj)
               
    def SetProfileDeviceByUuid(self, set_type, obj) :
        return self.act.SetProfileDeviceByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileDeviceByUuid(self
        , uuid
    ) :          
        return self.act.DelProfileDeviceByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileDeviceByProfileIdByDeviceId(self
        , profile_id
        , device_id
    ) :          
        return self.act.DelProfileDeviceByProfileIdByDeviceId(
        profile_id
        , device_id
        )
#------------------------------------------------------------------------------                    
    def DelProfileDeviceByProfileIdByToken(self
        , profile_id
        , token
    ) :          
        return self.act.DelProfileDeviceByProfileIdByToken(
        profile_id
        , token
        )
#------------------------------------------------------------------------------                    
    def DelProfileDeviceByToken(self
        , token
    ) :          
        return self.act.DelProfileDeviceByToken(
        token
        )
#------------------------------------------------------------------------------                    
    def GetProfileDeviceListByUuid(self
        , uuid
        ) :
            return self.act.GetProfileDeviceListByUuid(
                uuid
            )
        
    def GetProfileDeviceByUuid(self
        , uuid
    ) :
        for item in self.GetProfileDeviceListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileDeviceListByUuid(self
        , uuid
    ) :
        return CachedGetProfileDeviceListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileDeviceListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileDevice> objs;

        string method_name = "CachedGetProfileDeviceListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileDevice>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileDeviceListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileDeviceListByProfileIdByDeviceId(self
        , profile_id
        , device_id
        ) :
            return self.act.GetProfileDeviceListByProfileIdByDeviceId(
                profile_id
                , device_id
            )
        
    def GetProfileDeviceByProfileIdByDeviceId(self
        , profile_id
        , device_id
    ) :
        for item in self.GetProfileDeviceListByProfileIdByDeviceId(
        profile_id
        , device_id
        ) :
            return item
        return None
    
    def CachedGetProfileDeviceListByProfileIdByDeviceId(self
        , profile_id
        , device_id
    ) :
        return CachedGetProfileDeviceListByProfileIdByDeviceId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , device_id
        )
        
    def CachedGetProfileDeviceListByProfileIdByDeviceId(self
        , overrideCache
        , cacheHours
        , profile_id
        , device_id
    ) :
        pass
        """
        List<ProfileDevice> objs;

        string method_name = "CachedGetProfileDeviceListByProfileIdByDeviceId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("device_id".ToLower());
        sb.Append("_");
        sb.Append(device_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileDevice>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileDeviceListByProfileIdByDeviceId(
                profile_id
                , device_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileDeviceListByProfileIdByToken(self
        , profile_id
        , token
        ) :
            return self.act.GetProfileDeviceListByProfileIdByToken(
                profile_id
                , token
            )
        
    def GetProfileDeviceByProfileIdByToken(self
        , profile_id
        , token
    ) :
        for item in self.GetProfileDeviceListByProfileIdByToken(
        profile_id
        , token
        ) :
            return item
        return None
    
    def CachedGetProfileDeviceListByProfileIdByToken(self
        , profile_id
        , token
    ) :
        return CachedGetProfileDeviceListByProfileIdByToken(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , token
        )
        
    def CachedGetProfileDeviceListByProfileIdByToken(self
        , overrideCache
        , cacheHours
        , profile_id
        , token
    ) :
        pass
        """
        List<ProfileDevice> objs;

        string method_name = "CachedGetProfileDeviceListByProfileIdByToken";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("token".ToLower());
        sb.Append("_");
        sb.Append(token);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileDevice>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileDeviceListByProfileIdByToken(
                profile_id
                , token
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileDeviceListByProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileDeviceListByProfileId(
                profile_id
            )
        
    def GetProfileDeviceByProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileDeviceListByProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileDeviceListByProfileId(self
        , profile_id
    ) :
        return CachedGetProfileDeviceListByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileDeviceListByProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileDevice> objs;

        string method_name = "CachedGetProfileDeviceListByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileDevice>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileDeviceListByProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileDeviceListByDeviceId(self
        , device_id
        ) :
            return self.act.GetProfileDeviceListByDeviceId(
                device_id
            )
        
    def GetProfileDeviceByDeviceId(self
        , device_id
    ) :
        for item in self.GetProfileDeviceListByDeviceId(
        device_id
        ) :
            return item
        return None
    
    def CachedGetProfileDeviceListByDeviceId(self
        , device_id
    ) :
        return CachedGetProfileDeviceListByDeviceId(
            false
            , self.CACHE_DEFAULT_HOURS
            , device_id
        )
        
    def CachedGetProfileDeviceListByDeviceId(self
        , overrideCache
        , cacheHours
        , device_id
    ) :
        pass
        """
        List<ProfileDevice> objs;

        string method_name = "CachedGetProfileDeviceListByDeviceId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("device_id".ToLower());
        sb.Append("_");
        sb.Append(device_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileDevice>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileDeviceListByDeviceId(
                device_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileDeviceListByToken(self
        , token
        ) :
            return self.act.GetProfileDeviceListByToken(
                token
            )
        
    def GetProfileDeviceByToken(self
        , token
    ) :
        for item in self.GetProfileDeviceListByToken(
        token
        ) :
            return item
        return None
    
    def CachedGetProfileDeviceListByToken(self
        , token
    ) :
        return CachedGetProfileDeviceListByToken(
            false
            , self.CACHE_DEFAULT_HOURS
            , token
        )
        
    def CachedGetProfileDeviceListByToken(self
        , overrideCache
        , cacheHours
        , token
    ) :
        pass
        """
        List<ProfileDevice> objs;

        string method_name = "CachedGetProfileDeviceListByToken";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("token".ToLower());
        sb.Append("_");
        sb.Append(token);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileDevice>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileDeviceListByToken(
                token
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountCountry(self
    ) :         
        return self.act.CountCountry(
        )
        
#------------------------------------------------------------------------------                    
    def CountCountryByUuid(self
        , uuid
    ) :         
        return self.act.CountCountryByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountCountryByCode(self
        , code
    ) :         
        return self.act.CountCountryByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseCountryListByFilter(self, filter_obj) :
        return self.act.BrowseCountryListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetCountryByUuid(self, set_type, obj) :
        return self.act.SetCountryByUuid(set_type, obj)
               
    def SetCountryByUuid(self, set_type, obj) :
        return self.act.SetCountryByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetCountryByCode(self, set_type, obj) :
        return self.act.SetCountryByCode(set_type, obj)
               
    def SetCountryByCode(self, set_type, obj) :
        return self.act.SetCountryByCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelCountryByUuid(self
        , uuid
    ) :          
        return self.act.DelCountryByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelCountryByCode(self
        , code
    ) :          
        return self.act.DelCountryByCode(
        code
        )
#------------------------------------------------------------------------------                    
    def GetCountryList(self
        ) :
            return self.act.GetCountryList(
            )
        
    def GetCountry(self
    ) :
        for item in self.GetCountryList(
        ) :
            return item
        return None
    
    def CachedGetCountryList(self
    ) :
        return CachedGetCountryList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetCountryList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<Country> objs;

        string method_name = "CachedGetCountryList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Country>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetCountryList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetCountryListByUuid(self
        , uuid
        ) :
            return self.act.GetCountryListByUuid(
                uuid
            )
        
    def GetCountryByUuid(self
        , uuid
    ) :
        for item in self.GetCountryListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetCountryListByUuid(self
        , uuid
    ) :
        return CachedGetCountryListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetCountryListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Country> objs;

        string method_name = "CachedGetCountryListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Country>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetCountryListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetCountryListByCode(self
        , code
        ) :
            return self.act.GetCountryListByCode(
                code
            )
        
    def GetCountryByCode(self
        , code
    ) :
        for item in self.GetCountryListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetCountryListByCode(self
        , code
    ) :
        return CachedGetCountryListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetCountryListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<Country> objs;

        string method_name = "CachedGetCountryListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Country>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetCountryListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountState(self
    ) :         
        return self.act.CountState(
        )
        
#------------------------------------------------------------------------------                    
    def CountStateByUuid(self
        , uuid
    ) :         
        return self.act.CountStateByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountStateByCode(self
        , code
    ) :         
        return self.act.CountStateByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseStateListByFilter(self, filter_obj) :
        return self.act.BrowseStateListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetStateByUuid(self, set_type, obj) :
        return self.act.SetStateByUuid(set_type, obj)
               
    def SetStateByUuid(self, set_type, obj) :
        return self.act.SetStateByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetStateByCode(self, set_type, obj) :
        return self.act.SetStateByCode(set_type, obj)
               
    def SetStateByCode(self, set_type, obj) :
        return self.act.SetStateByCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelStateByUuid(self
        , uuid
    ) :          
        return self.act.DelStateByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelStateByCode(self
        , code
    ) :          
        return self.act.DelStateByCode(
        code
        )
#------------------------------------------------------------------------------                    
    def GetStateList(self
        ) :
            return self.act.GetStateList(
            )
        
    def GetState(self
    ) :
        for item in self.GetStateList(
        ) :
            return item
        return None
    
    def CachedGetStateList(self
    ) :
        return CachedGetStateList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetStateList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<State> objs;

        string method_name = "CachedGetStateList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<State>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetStateList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetStateListByUuid(self
        , uuid
        ) :
            return self.act.GetStateListByUuid(
                uuid
            )
        
    def GetStateByUuid(self
        , uuid
    ) :
        for item in self.GetStateListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetStateListByUuid(self
        , uuid
    ) :
        return CachedGetStateListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetStateListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<State> objs;

        string method_name = "CachedGetStateListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<State>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetStateListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetStateListByCode(self
        , code
        ) :
            return self.act.GetStateListByCode(
                code
            )
        
    def GetStateByCode(self
        , code
    ) :
        for item in self.GetStateListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetStateListByCode(self
        , code
    ) :
        return CachedGetStateListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetStateListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<State> objs;

        string method_name = "CachedGetStateListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<State>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetStateListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountCity(self
    ) :         
        return self.act.CountCity(
        )
        
#------------------------------------------------------------------------------                    
    def CountCityByUuid(self
        , uuid
    ) :         
        return self.act.CountCityByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountCityByCode(self
        , code
    ) :         
        return self.act.CountCityByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseCityListByFilter(self, filter_obj) :
        return self.act.BrowseCityListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetCityByUuid(self, set_type, obj) :
        return self.act.SetCityByUuid(set_type, obj)
               
    def SetCityByUuid(self, set_type, obj) :
        return self.act.SetCityByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetCityByCode(self, set_type, obj) :
        return self.act.SetCityByCode(set_type, obj)
               
    def SetCityByCode(self, set_type, obj) :
        return self.act.SetCityByCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelCityByUuid(self
        , uuid
    ) :          
        return self.act.DelCityByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelCityByCode(self
        , code
    ) :          
        return self.act.DelCityByCode(
        code
        )
#------------------------------------------------------------------------------                    
    def GetCityList(self
        ) :
            return self.act.GetCityList(
            )
        
    def GetCity(self
    ) :
        for item in self.GetCityList(
        ) :
            return item
        return None
    
    def CachedGetCityList(self
    ) :
        return CachedGetCityList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetCityList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<City> objs;

        string method_name = "CachedGetCityList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<City>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetCityList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetCityListByUuid(self
        , uuid
        ) :
            return self.act.GetCityListByUuid(
                uuid
            )
        
    def GetCityByUuid(self
        , uuid
    ) :
        for item in self.GetCityListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetCityListByUuid(self
        , uuid
    ) :
        return CachedGetCityListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetCityListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<City> objs;

        string method_name = "CachedGetCityListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<City>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetCityListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetCityListByCode(self
        , code
        ) :
            return self.act.GetCityListByCode(
                code
            )
        
    def GetCityByCode(self
        , code
    ) :
        for item in self.GetCityListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetCityListByCode(self
        , code
    ) :
        return CachedGetCityListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetCityListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<City> objs;

        string method_name = "CachedGetCityListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<City>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetCityListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountPostalCode(self
    ) :         
        return self.act.CountPostalCode(
        )
        
#------------------------------------------------------------------------------                    
    def CountPostalCodeByUuid(self
        , uuid
    ) :         
        return self.act.CountPostalCodeByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountPostalCodeByCode(self
        , code
    ) :         
        return self.act.CountPostalCodeByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def BrowsePostalCodeListByFilter(self, filter_obj) :
        return self.act.BrowsePostalCodeListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetPostalCodeByUuid(self, set_type, obj) :
        return self.act.SetPostalCodeByUuid(set_type, obj)
               
    def SetPostalCodeByUuid(self, set_type, obj) :
        return self.act.SetPostalCodeByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetPostalCodeByCode(self, set_type, obj) :
        return self.act.SetPostalCodeByCode(set_type, obj)
               
    def SetPostalCodeByCode(self, set_type, obj) :
        return self.act.SetPostalCodeByCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelPostalCodeByUuid(self
        , uuid
    ) :          
        return self.act.DelPostalCodeByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelPostalCodeByCode(self
        , code
    ) :          
        return self.act.DelPostalCodeByCode(
        code
        )
#------------------------------------------------------------------------------                    
    def GetPostalCodeList(self
        ) :
            return self.act.GetPostalCodeList(
            )
        
    def GetPostalCode(self
    ) :
        for item in self.GetPostalCodeList(
        ) :
            return item
        return None
    
    def CachedGetPostalCodeList(self
    ) :
        return CachedGetPostalCodeList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetPostalCodeList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<PostalCode> objs;

        string method_name = "CachedGetPostalCodeList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<PostalCode>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetPostalCodeList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetPostalCodeListByUuid(self
        , uuid
        ) :
            return self.act.GetPostalCodeListByUuid(
                uuid
            )
        
    def GetPostalCodeByUuid(self
        , uuid
    ) :
        for item in self.GetPostalCodeListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetPostalCodeListByUuid(self
        , uuid
    ) :
        return CachedGetPostalCodeListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetPostalCodeListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<PostalCode> objs;

        string method_name = "CachedGetPostalCodeListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<PostalCode>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetPostalCodeListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetPostalCodeListByCode(self
        , code
        ) :
            return self.act.GetPostalCodeListByCode(
                code
            )
        
    def GetPostalCodeByCode(self
        , code
    ) :
        for item in self.GetPostalCodeListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetPostalCodeListByCode(self
        , code
    ) :
        return CachedGetPostalCodeListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetPostalCodeListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<PostalCode> objs;

        string method_name = "CachedGetPostalCodeListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<PostalCode>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetPostalCodeListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
        

