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
        
    def set_connection_string(self, connection_string):
        self.act.data.data_provider.connection_string = connection_string
        self.act.data.connection_string = connection_string        

#------------------------------------------------------------------------------                    
    def CountProfile(self
    ) :         
        return self.act.CountProfile(
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileUuid(self
        , uuid
    ) :         
        return self.act.CountProfileUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileUsernameHash(self
        , username
        , hash
    ) :         
        return self.act.CountProfileUsernameHash(
        username
        , hash
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileUsername(self
        , username
    ) :         
        return self.act.CountProfileUsername(
        username
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileListFilter(self, filter_obj) :
        return self.act.BrowseProfileListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileUuidType(self, set_type, obj) :
        return self.act.SetProfileUuid(set_type, obj)
               
    def SetProfileUuid(self, obj) :
        return self.act.SetProfileUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileUsernameType(self, set_type, obj) :
        return self.act.SetProfileUsername(set_type, obj)
               
    def SetProfileUsername(self, obj) :
        return self.act.SetProfileUsername('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileUuid(self
        , uuid
    ) :          
        return self.act.DelProfileUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileUsername(self
        , username
    ) :          
        return self.act.DelProfileUsername(
        username
        )
#------------------------------------------------------------------------------                    
    def GetProfileListUuid(self
        , uuid
        ) :
            return self.act.GetProfileListUuid(
                uuid
            )
        
    def GetProfileUuid(self
        , uuid
    ) :
        for item in self.GetProfileListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileListUuid(self
        , uuid
    ) :
        return CachedGetProfileListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Profile> objs;

        string method_name = "CachedGetProfileListUuid";

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
            objs = GetProfileListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileListUsernameHash(self
        , username
        , hash
        ) :
            return self.act.GetProfileListUsernameHash(
                username
                , hash
            )
        
    def GetProfileUsernameHash(self
        , username
        , hash
    ) :
        for item in self.GetProfileListUsernameHash(
        username
        , hash
        ) :
            return item
        return None
    
    def CachedGetProfileListUsernameHash(self
        , username
        , hash
    ) :
        return CachedGetProfileListUsernameHash(
            false
            , self.CACHE_DEFAULT_HOURS
            , username
            , hash
        )
        
    def CachedGetProfileListUsernameHash(self
        , overrideCache
        , cacheHours
        , username
        , hash
    ) :
        pass
        """
        List<Profile> objs;

        string method_name = "CachedGetProfileListUsernameHash";

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
            objs = GetProfileListUsernameHash(
                username
                , hash
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileListUsername(self
        , username
        ) :
            return self.act.GetProfileListUsername(
                username
            )
        
    def GetProfileUsername(self
        , username
    ) :
        for item in self.GetProfileListUsername(
        username
        ) :
            return item
        return None
    
    def CachedGetProfileListUsername(self
        , username
    ) :
        return CachedGetProfileListUsername(
            false
            , self.CACHE_DEFAULT_HOURS
            , username
        )
        
    def CachedGetProfileListUsername(self
        , overrideCache
        , cacheHours
        , username
    ) :
        pass
        """
        List<Profile> objs;

        string method_name = "CachedGetProfileListUsername";

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
            objs = GetProfileListUsername(
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
    def CountProfileTypeUuid(self
        , uuid
    ) :         
        return self.act.CountProfileTypeUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileTypeTypeId(self
        , type_id
    ) :         
        return self.act.CountProfileTypeTypeId(
        type_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileTypeListFilter(self, filter_obj) :
        return self.act.BrowseProfileTypeListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileTypeUuidType(self, set_type, obj) :
        return self.act.SetProfileTypeUuid(set_type, obj)
               
    def SetProfileTypeUuid(self, obj) :
        return self.act.SetProfileTypeUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileTypeUuid(self
        , uuid
    ) :          
        return self.act.DelProfileTypeUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetProfileTypeListUuid(self
        , uuid
        ) :
            return self.act.GetProfileTypeListUuid(
                uuid
            )
        
    def GetProfileTypeUuid(self
        , uuid
    ) :
        for item in self.GetProfileTypeListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileTypeListUuid(self
        , uuid
    ) :
        return CachedGetProfileTypeListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileTypeListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileType> objs;

        string method_name = "CachedGetProfileTypeListUuid";

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
            objs = GetProfileTypeListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileTypeListCode(self
        , code
        ) :
            return self.act.GetProfileTypeListCode(
                code
            )
        
    def GetProfileTypeCode(self
        , code
    ) :
        for item in self.GetProfileTypeListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetProfileTypeListCode(self
        , code
    ) :
        return CachedGetProfileTypeListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetProfileTypeListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<ProfileType> objs;

        string method_name = "CachedGetProfileTypeListCode";

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
            objs = GetProfileTypeListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileTypeListTypeId(self
        , type_id
        ) :
            return self.act.GetProfileTypeListTypeId(
                type_id
            )
        
    def GetProfileTypeTypeId(self
        , type_id
    ) :
        for item in self.GetProfileTypeListTypeId(
        type_id
        ) :
            return item
        return None
    
    def CachedGetProfileTypeListTypeId(self
        , type_id
    ) :
        return CachedGetProfileTypeListTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , type_id
        )
        
    def CachedGetProfileTypeListTypeId(self
        , overrideCache
        , cacheHours
        , type_id
    ) :
        pass
        """
        List<ProfileType> objs;

        string method_name = "CachedGetProfileTypeListTypeId";

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
            objs = GetProfileTypeListTypeId(
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
    def CountProfileAttributeUuid(self
        , uuid
    ) :         
        return self.act.CountProfileAttributeUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileAttributeCode(self
        , code
    ) :         
        return self.act.CountProfileAttributeCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileAttributeType(self
        , type
    ) :         
        return self.act.CountProfileAttributeType(
        type
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileAttributeGroup(self
        , group
    ) :         
        return self.act.CountProfileAttributeGroup(
        group
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileAttributeCodeType(self
        , code
        , type
    ) :         
        return self.act.CountProfileAttributeCodeType(
        code
        , type
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileAttributeListFilter(self, filter_obj) :
        return self.act.BrowseProfileAttributeListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileAttributeUuidType(self, set_type, obj) :
        return self.act.SetProfileAttributeUuid(set_type, obj)
               
    def SetProfileAttributeUuid(self, obj) :
        return self.act.SetProfileAttributeUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileAttributeCodeType(self, set_type, obj) :
        return self.act.SetProfileAttributeCode(set_type, obj)
               
    def SetProfileAttributeCode(self, obj) :
        return self.act.SetProfileAttributeCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileAttributeUuid(self
        , uuid
    ) :          
        return self.act.DelProfileAttributeUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileAttributeCode(self
        , code
    ) :          
        return self.act.DelProfileAttributeCode(
        code
        )
#------------------------------------------------------------------------------                    
    def GetProfileAttributeListUuid(self
        , uuid
        ) :
            return self.act.GetProfileAttributeListUuid(
                uuid
            )
        
    def GetProfileAttributeUuid(self
        , uuid
    ) :
        for item in self.GetProfileAttributeListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileAttributeListUuid(self
        , uuid
    ) :
        return CachedGetProfileAttributeListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileAttributeListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileAttribute> objs;

        string method_name = "CachedGetProfileAttributeListUuid";

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
            objs = GetProfileAttributeListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAttributeListCode(self
        , code
        ) :
            return self.act.GetProfileAttributeListCode(
                code
            )
        
    def GetProfileAttributeCode(self
        , code
    ) :
        for item in self.GetProfileAttributeListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetProfileAttributeListCode(self
        , code
    ) :
        return CachedGetProfileAttributeListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetProfileAttributeListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<ProfileAttribute> objs;

        string method_name = "CachedGetProfileAttributeListCode";

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
            objs = GetProfileAttributeListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAttributeListType(self
        , type
        ) :
            return self.act.GetProfileAttributeListType(
                type
            )
        
    def GetProfileAttributeType(self
        , type
    ) :
        for item in self.GetProfileAttributeListType(
        type
        ) :
            return item
        return None
    
    def CachedGetProfileAttributeListType(self
        , type
    ) :
        return CachedGetProfileAttributeListType(
            false
            , self.CACHE_DEFAULT_HOURS
            , type
        )
        
    def CachedGetProfileAttributeListType(self
        , overrideCache
        , cacheHours
        , type
    ) :
        pass
        """
        List<ProfileAttribute> objs;

        string method_name = "CachedGetProfileAttributeListType";

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
            objs = GetProfileAttributeListType(
                type
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAttributeListGroup(self
        , group
        ) :
            return self.act.GetProfileAttributeListGroup(
                group
            )
        
    def GetProfileAttributeGroup(self
        , group
    ) :
        for item in self.GetProfileAttributeListGroup(
        group
        ) :
            return item
        return None
    
    def CachedGetProfileAttributeListGroup(self
        , group
    ) :
        return CachedGetProfileAttributeListGroup(
            false
            , self.CACHE_DEFAULT_HOURS
            , group
        )
        
    def CachedGetProfileAttributeListGroup(self
        , overrideCache
        , cacheHours
        , group
    ) :
        pass
        """
        List<ProfileAttribute> objs;

        string method_name = "CachedGetProfileAttributeListGroup";

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
            objs = GetProfileAttributeListGroup(
                group
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAttributeListCodeType(self
        , code
        , type
        ) :
            return self.act.GetProfileAttributeListCodeType(
                code
                , type
            )
        
    def GetProfileAttributeCodeType(self
        , code
        , type
    ) :
        for item in self.GetProfileAttributeListCodeType(
        code
        , type
        ) :
            return item
        return None
    
    def CachedGetProfileAttributeListCodeType(self
        , code
        , type
    ) :
        return CachedGetProfileAttributeListCodeType(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , type
        )
        
    def CachedGetProfileAttributeListCodeType(self
        , overrideCache
        , cacheHours
        , code
        , type
    ) :
        pass
        """
        List<ProfileAttribute> objs;

        string method_name = "CachedGetProfileAttributeListCodeType";

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
            objs = GetProfileAttributeListCodeType(
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
    def CountProfileAttributeTextUuid(self
        , uuid
    ) :         
        return self.act.CountProfileAttributeTextUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileAttributeTextProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileAttributeTextProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileAttributeTextProfileIdAttributeId(self
        , profile_id
        , attribute_id
    ) :         
        return self.act.CountProfileAttributeTextProfileIdAttributeId(
        profile_id
        , attribute_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileAttributeTextListFilter(self, filter_obj) :
        return self.act.BrowseProfileAttributeTextListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileAttributeTextUuidType(self, set_type, obj) :
        return self.act.SetProfileAttributeTextUuid(set_type, obj)
               
    def SetProfileAttributeTextUuid(self, obj) :
        return self.act.SetProfileAttributeTextUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileAttributeTextProfileIdType(self, set_type, obj) :
        return self.act.SetProfileAttributeTextProfileId(set_type, obj)
               
    def SetProfileAttributeTextProfileId(self, obj) :
        return self.act.SetProfileAttributeTextProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileAttributeTextProfileIdAttributeIdType(self, set_type, obj) :
        return self.act.SetProfileAttributeTextProfileIdAttributeId(set_type, obj)
               
    def SetProfileAttributeTextProfileIdAttributeId(self, obj) :
        return self.act.SetProfileAttributeTextProfileIdAttributeId('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileAttributeTextUuid(self
        , uuid
    ) :          
        return self.act.DelProfileAttributeTextUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileAttributeTextProfileId(self
        , profile_id
    ) :          
        return self.act.DelProfileAttributeTextProfileId(
        profile_id
        )
#------------------------------------------------------------------------------                    
    def DelProfileAttributeTextProfileIdAttributeId(self
        , profile_id
        , attribute_id
    ) :          
        return self.act.DelProfileAttributeTextProfileIdAttributeId(
        profile_id
        , attribute_id
        )
#------------------------------------------------------------------------------                    
    def GetProfileAttributeTextListUuid(self
        , uuid
        ) :
            return self.act.GetProfileAttributeTextListUuid(
                uuid
            )
        
    def GetProfileAttributeTextUuid(self
        , uuid
    ) :
        for item in self.GetProfileAttributeTextListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileAttributeTextListUuid(self
        , uuid
    ) :
        return CachedGetProfileAttributeTextListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileAttributeTextListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileAttributeText> objs;

        string method_name = "CachedGetProfileAttributeTextListUuid";

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
            objs = GetProfileAttributeTextListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAttributeTextListProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileAttributeTextListProfileId(
                profile_id
            )
        
    def GetProfileAttributeTextProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileAttributeTextListProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileAttributeTextListProfileId(self
        , profile_id
    ) :
        return CachedGetProfileAttributeTextListProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileAttributeTextListProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileAttributeText> objs;

        string method_name = "CachedGetProfileAttributeTextListProfileId";

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
            objs = GetProfileAttributeTextListProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAttributeTextListProfileIdAttributeId(self
        , profile_id
        , attribute_id
        ) :
            return self.act.GetProfileAttributeTextListProfileIdAttributeId(
                profile_id
                , attribute_id
            )
        
    def GetProfileAttributeTextProfileIdAttributeId(self
        , profile_id
        , attribute_id
    ) :
        for item in self.GetProfileAttributeTextListProfileIdAttributeId(
        profile_id
        , attribute_id
        ) :
            return item
        return None
    
    def CachedGetProfileAttributeTextListProfileIdAttributeId(self
        , profile_id
        , attribute_id
    ) :
        return CachedGetProfileAttributeTextListProfileIdAttributeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , attribute_id
        )
        
    def CachedGetProfileAttributeTextListProfileIdAttributeId(self
        , overrideCache
        , cacheHours
        , profile_id
        , attribute_id
    ) :
        pass
        """
        List<ProfileAttributeText> objs;

        string method_name = "CachedGetProfileAttributeTextListProfileIdAttributeId";

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
            objs = GetProfileAttributeTextListProfileIdAttributeId(
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
    def CountProfileAttributeDataUuid(self
        , uuid
    ) :         
        return self.act.CountProfileAttributeDataUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileAttributeDataProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileAttributeDataProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileAttributeDataProfileIdAttributeId(self
        , profile_id
        , attribute_id
    ) :         
        return self.act.CountProfileAttributeDataProfileIdAttributeId(
        profile_id
        , attribute_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileAttributeDataListFilter(self, filter_obj) :
        return self.act.BrowseProfileAttributeDataListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileAttributeDataUuidType(self, set_type, obj) :
        return self.act.SetProfileAttributeDataUuid(set_type, obj)
               
    def SetProfileAttributeDataUuid(self, obj) :
        return self.act.SetProfileAttributeDataUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileAttributeDataProfileIdType(self, set_type, obj) :
        return self.act.SetProfileAttributeDataProfileId(set_type, obj)
               
    def SetProfileAttributeDataProfileId(self, obj) :
        return self.act.SetProfileAttributeDataProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileAttributeDataProfileIdAttributeIdType(self, set_type, obj) :
        return self.act.SetProfileAttributeDataProfileIdAttributeId(set_type, obj)
               
    def SetProfileAttributeDataProfileIdAttributeId(self, obj) :
        return self.act.SetProfileAttributeDataProfileIdAttributeId('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileAttributeDataUuid(self
        , uuid
    ) :          
        return self.act.DelProfileAttributeDataUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileAttributeDataProfileId(self
        , profile_id
    ) :          
        return self.act.DelProfileAttributeDataProfileId(
        profile_id
        )
#------------------------------------------------------------------------------                    
    def DelProfileAttributeDataProfileIdAttributeId(self
        , profile_id
        , attribute_id
    ) :          
        return self.act.DelProfileAttributeDataProfileIdAttributeId(
        profile_id
        , attribute_id
        )
#------------------------------------------------------------------------------                    
    def GetProfileAttributeDataListUuid(self
        , uuid
        ) :
            return self.act.GetProfileAttributeDataListUuid(
                uuid
            )
        
    def GetProfileAttributeDataUuid(self
        , uuid
    ) :
        for item in self.GetProfileAttributeDataListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileAttributeDataListUuid(self
        , uuid
    ) :
        return CachedGetProfileAttributeDataListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileAttributeDataListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileAttributeData> objs;

        string method_name = "CachedGetProfileAttributeDataListUuid";

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
            objs = GetProfileAttributeDataListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAttributeDataListProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileAttributeDataListProfileId(
                profile_id
            )
        
    def GetProfileAttributeDataProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileAttributeDataListProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileAttributeDataListProfileId(self
        , profile_id
    ) :
        return CachedGetProfileAttributeDataListProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileAttributeDataListProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileAttributeData> objs;

        string method_name = "CachedGetProfileAttributeDataListProfileId";

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
            objs = GetProfileAttributeDataListProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAttributeDataListProfileIdAttributeId(self
        , profile_id
        , attribute_id
        ) :
            return self.act.GetProfileAttributeDataListProfileIdAttributeId(
                profile_id
                , attribute_id
            )
        
    def GetProfileAttributeDataProfileIdAttributeId(self
        , profile_id
        , attribute_id
    ) :
        for item in self.GetProfileAttributeDataListProfileIdAttributeId(
        profile_id
        , attribute_id
        ) :
            return item
        return None
    
    def CachedGetProfileAttributeDataListProfileIdAttributeId(self
        , profile_id
        , attribute_id
    ) :
        return CachedGetProfileAttributeDataListProfileIdAttributeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , attribute_id
        )
        
    def CachedGetProfileAttributeDataListProfileIdAttributeId(self
        , overrideCache
        , cacheHours
        , profile_id
        , attribute_id
    ) :
        pass
        """
        List<ProfileAttributeData> objs;

        string method_name = "CachedGetProfileAttributeDataListProfileIdAttributeId";

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
            objs = GetProfileAttributeDataListProfileIdAttributeId(
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
    def CountProfileDeviceUuid(self
        , uuid
    ) :         
        return self.act.CountProfileDeviceUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileDeviceProfileIdDeviceId(self
        , profile_id
        , device_id
    ) :         
        return self.act.CountProfileDeviceProfileIdDeviceId(
        profile_id
        , device_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileDeviceProfileIdToken(self
        , profile_id
        , token
    ) :         
        return self.act.CountProfileDeviceProfileIdToken(
        profile_id
        , token
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileDeviceProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileDeviceProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileDeviceDeviceId(self
        , device_id
    ) :         
        return self.act.CountProfileDeviceDeviceId(
        device_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileDeviceToken(self
        , token
    ) :         
        return self.act.CountProfileDeviceToken(
        token
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileDeviceListFilter(self, filter_obj) :
        return self.act.BrowseProfileDeviceListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileDeviceUuidType(self, set_type, obj) :
        return self.act.SetProfileDeviceUuid(set_type, obj)
               
    def SetProfileDeviceUuid(self, obj) :
        return self.act.SetProfileDeviceUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileDeviceUuid(self
        , uuid
    ) :          
        return self.act.DelProfileDeviceUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileDeviceProfileIdDeviceId(self
        , profile_id
        , device_id
    ) :          
        return self.act.DelProfileDeviceProfileIdDeviceId(
        profile_id
        , device_id
        )
#------------------------------------------------------------------------------                    
    def DelProfileDeviceProfileIdToken(self
        , profile_id
        , token
    ) :          
        return self.act.DelProfileDeviceProfileIdToken(
        profile_id
        , token
        )
#------------------------------------------------------------------------------                    
    def DelProfileDeviceToken(self
        , token
    ) :          
        return self.act.DelProfileDeviceToken(
        token
        )
#------------------------------------------------------------------------------                    
    def GetProfileDeviceListUuid(self
        , uuid
        ) :
            return self.act.GetProfileDeviceListUuid(
                uuid
            )
        
    def GetProfileDeviceUuid(self
        , uuid
    ) :
        for item in self.GetProfileDeviceListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileDeviceListUuid(self
        , uuid
    ) :
        return CachedGetProfileDeviceListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileDeviceListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileDevice> objs;

        string method_name = "CachedGetProfileDeviceListUuid";

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
            objs = GetProfileDeviceListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileDeviceListProfileIdDeviceId(self
        , profile_id
        , device_id
        ) :
            return self.act.GetProfileDeviceListProfileIdDeviceId(
                profile_id
                , device_id
            )
        
    def GetProfileDeviceProfileIdDeviceId(self
        , profile_id
        , device_id
    ) :
        for item in self.GetProfileDeviceListProfileIdDeviceId(
        profile_id
        , device_id
        ) :
            return item
        return None
    
    def CachedGetProfileDeviceListProfileIdDeviceId(self
        , profile_id
        , device_id
    ) :
        return CachedGetProfileDeviceListProfileIdDeviceId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , device_id
        )
        
    def CachedGetProfileDeviceListProfileIdDeviceId(self
        , overrideCache
        , cacheHours
        , profile_id
        , device_id
    ) :
        pass
        """
        List<ProfileDevice> objs;

        string method_name = "CachedGetProfileDeviceListProfileIdDeviceId";

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
            objs = GetProfileDeviceListProfileIdDeviceId(
                profile_id
                , device_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileDeviceListProfileIdToken(self
        , profile_id
        , token
        ) :
            return self.act.GetProfileDeviceListProfileIdToken(
                profile_id
                , token
            )
        
    def GetProfileDeviceProfileIdToken(self
        , profile_id
        , token
    ) :
        for item in self.GetProfileDeviceListProfileIdToken(
        profile_id
        , token
        ) :
            return item
        return None
    
    def CachedGetProfileDeviceListProfileIdToken(self
        , profile_id
        , token
    ) :
        return CachedGetProfileDeviceListProfileIdToken(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , token
        )
        
    def CachedGetProfileDeviceListProfileIdToken(self
        , overrideCache
        , cacheHours
        , profile_id
        , token
    ) :
        pass
        """
        List<ProfileDevice> objs;

        string method_name = "CachedGetProfileDeviceListProfileIdToken";

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
            objs = GetProfileDeviceListProfileIdToken(
                profile_id
                , token
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileDeviceListProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileDeviceListProfileId(
                profile_id
            )
        
    def GetProfileDeviceProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileDeviceListProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileDeviceListProfileId(self
        , profile_id
    ) :
        return CachedGetProfileDeviceListProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileDeviceListProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileDevice> objs;

        string method_name = "CachedGetProfileDeviceListProfileId";

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
            objs = GetProfileDeviceListProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileDeviceListDeviceId(self
        , device_id
        ) :
            return self.act.GetProfileDeviceListDeviceId(
                device_id
            )
        
    def GetProfileDeviceDeviceId(self
        , device_id
    ) :
        for item in self.GetProfileDeviceListDeviceId(
        device_id
        ) :
            return item
        return None
    
    def CachedGetProfileDeviceListDeviceId(self
        , device_id
    ) :
        return CachedGetProfileDeviceListDeviceId(
            false
            , self.CACHE_DEFAULT_HOURS
            , device_id
        )
        
    def CachedGetProfileDeviceListDeviceId(self
        , overrideCache
        , cacheHours
        , device_id
    ) :
        pass
        """
        List<ProfileDevice> objs;

        string method_name = "CachedGetProfileDeviceListDeviceId";

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
            objs = GetProfileDeviceListDeviceId(
                device_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileDeviceListToken(self
        , token
        ) :
            return self.act.GetProfileDeviceListToken(
                token
            )
        
    def GetProfileDeviceToken(self
        , token
    ) :
        for item in self.GetProfileDeviceListToken(
        token
        ) :
            return item
        return None
    
    def CachedGetProfileDeviceListToken(self
        , token
    ) :
        return CachedGetProfileDeviceListToken(
            false
            , self.CACHE_DEFAULT_HOURS
            , token
        )
        
    def CachedGetProfileDeviceListToken(self
        , overrideCache
        , cacheHours
        , token
    ) :
        pass
        """
        List<ProfileDevice> objs;

        string method_name = "CachedGetProfileDeviceListToken";

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
            objs = GetProfileDeviceListToken(
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
    def CountCountryUuid(self
        , uuid
    ) :         
        return self.act.CountCountryUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountCountryCode(self
        , code
    ) :         
        return self.act.CountCountryCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseCountryListFilter(self, filter_obj) :
        return self.act.BrowseCountryListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetCountryUuidType(self, set_type, obj) :
        return self.act.SetCountryUuid(set_type, obj)
               
    def SetCountryUuid(self, obj) :
        return self.act.SetCountryUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetCountryCodeType(self, set_type, obj) :
        return self.act.SetCountryCode(set_type, obj)
               
    def SetCountryCode(self, obj) :
        return self.act.SetCountryCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelCountryUuid(self
        , uuid
    ) :          
        return self.act.DelCountryUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelCountryCode(self
        , code
    ) :          
        return self.act.DelCountryCode(
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
    def GetCountryListUuid(self
        , uuid
        ) :
            return self.act.GetCountryListUuid(
                uuid
            )
        
    def GetCountryUuid(self
        , uuid
    ) :
        for item in self.GetCountryListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetCountryListUuid(self
        , uuid
    ) :
        return CachedGetCountryListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetCountryListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Country> objs;

        string method_name = "CachedGetCountryListUuid";

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
            objs = GetCountryListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetCountryListCode(self
        , code
        ) :
            return self.act.GetCountryListCode(
                code
            )
        
    def GetCountryCode(self
        , code
    ) :
        for item in self.GetCountryListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetCountryListCode(self
        , code
    ) :
        return CachedGetCountryListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetCountryListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<Country> objs;

        string method_name = "CachedGetCountryListCode";

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
            objs = GetCountryListCode(
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
    def CountStateUuid(self
        , uuid
    ) :         
        return self.act.CountStateUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountStateCode(self
        , code
    ) :         
        return self.act.CountStateCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseStateListFilter(self, filter_obj) :
        return self.act.BrowseStateListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetStateUuidType(self, set_type, obj) :
        return self.act.SetStateUuid(set_type, obj)
               
    def SetStateUuid(self, obj) :
        return self.act.SetStateUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetStateCodeType(self, set_type, obj) :
        return self.act.SetStateCode(set_type, obj)
               
    def SetStateCode(self, obj) :
        return self.act.SetStateCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelStateUuid(self
        , uuid
    ) :          
        return self.act.DelStateUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelStateCode(self
        , code
    ) :          
        return self.act.DelStateCode(
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
    def GetStateListUuid(self
        , uuid
        ) :
            return self.act.GetStateListUuid(
                uuid
            )
        
    def GetStateUuid(self
        , uuid
    ) :
        for item in self.GetStateListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetStateListUuid(self
        , uuid
    ) :
        return CachedGetStateListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetStateListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<State> objs;

        string method_name = "CachedGetStateListUuid";

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
            objs = GetStateListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetStateListCode(self
        , code
        ) :
            return self.act.GetStateListCode(
                code
            )
        
    def GetStateCode(self
        , code
    ) :
        for item in self.GetStateListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetStateListCode(self
        , code
    ) :
        return CachedGetStateListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetStateListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<State> objs;

        string method_name = "CachedGetStateListCode";

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
            objs = GetStateListCode(
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
    def CountCityUuid(self
        , uuid
    ) :         
        return self.act.CountCityUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountCityCode(self
        , code
    ) :         
        return self.act.CountCityCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseCityListFilter(self, filter_obj) :
        return self.act.BrowseCityListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetCityUuidType(self, set_type, obj) :
        return self.act.SetCityUuid(set_type, obj)
               
    def SetCityUuid(self, obj) :
        return self.act.SetCityUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetCityCodeType(self, set_type, obj) :
        return self.act.SetCityCode(set_type, obj)
               
    def SetCityCode(self, obj) :
        return self.act.SetCityCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelCityUuid(self
        , uuid
    ) :          
        return self.act.DelCityUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelCityCode(self
        , code
    ) :          
        return self.act.DelCityCode(
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
    def GetCityListUuid(self
        , uuid
        ) :
            return self.act.GetCityListUuid(
                uuid
            )
        
    def GetCityUuid(self
        , uuid
    ) :
        for item in self.GetCityListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetCityListUuid(self
        , uuid
    ) :
        return CachedGetCityListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetCityListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<City> objs;

        string method_name = "CachedGetCityListUuid";

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
            objs = GetCityListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetCityListCode(self
        , code
        ) :
            return self.act.GetCityListCode(
                code
            )
        
    def GetCityCode(self
        , code
    ) :
        for item in self.GetCityListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetCityListCode(self
        , code
    ) :
        return CachedGetCityListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetCityListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<City> objs;

        string method_name = "CachedGetCityListCode";

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
            objs = GetCityListCode(
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
    def CountPostalCodeUuid(self
        , uuid
    ) :         
        return self.act.CountPostalCodeUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountPostalCodeCode(self
        , code
    ) :         
        return self.act.CountPostalCodeCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def BrowsePostalCodeListFilter(self, filter_obj) :
        return self.act.BrowsePostalCodeListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetPostalCodeUuidType(self, set_type, obj) :
        return self.act.SetPostalCodeUuid(set_type, obj)
               
    def SetPostalCodeUuid(self, obj) :
        return self.act.SetPostalCodeUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetPostalCodeCodeType(self, set_type, obj) :
        return self.act.SetPostalCodeCode(set_type, obj)
               
    def SetPostalCodeCode(self, obj) :
        return self.act.SetPostalCodeCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelPostalCodeUuid(self
        , uuid
    ) :          
        return self.act.DelPostalCodeUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelPostalCodeCode(self
        , code
    ) :          
        return self.act.DelPostalCodeCode(
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
    def GetPostalCodeListUuid(self
        , uuid
        ) :
            return self.act.GetPostalCodeListUuid(
                uuid
            )
        
    def GetPostalCodeUuid(self
        , uuid
    ) :
        for item in self.GetPostalCodeListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetPostalCodeListUuid(self
        , uuid
    ) :
        return CachedGetPostalCodeListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetPostalCodeListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<PostalCode> objs;

        string method_name = "CachedGetPostalCodeListUuid";

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
            objs = GetPostalCodeListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetPostalCodeListCode(self
        , code
        ) :
            return self.act.GetPostalCodeListCode(
                code
            )
        
    def GetPostalCodeCode(self
        , code
    ) :
        for item in self.GetPostalCodeListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetPostalCodeListCode(self
        , code
    ) :
        return CachedGetPostalCodeListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetPostalCodeListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<PostalCode> objs;

        string method_name = "CachedGetPostalCodeListCode";

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
            objs = GetPostalCodeListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
        

