import ent
from ent import *

import BaseGamingACT
from BaseGamingACT import *

def enum(**enums):
    return type('Enum', (), enums)
    
SetType = enum(FULL='full', INSERT_ONLY='insertonly', UPDATE_ONLY='updateonly')

class BaseGamingAPI(object):

    def __init__(self):
        self.DEFAULT_CACHE_HOURS = 12
        self.DEFAULT_SET_TYPE = 'full'
        self.act = BaseGamingACT()
        
    def set_connection_string(self, connection_string):
        self.act.data.data_provider.connection_string = connection_string
        self.act.data.connection_string = connection_string        

#------------------------------------------------------------------------------                    
    def CountGame(self
    ) :         
        return self.act.CountGame(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameByUuid(self
        , uuid
    ) :         
        return self.act.CountGameByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameByCode(self
        , code
    ) :         
        return self.act.CountGameByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameByName(self
        , name
    ) :         
        return self.act.CountGameByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountGameByOrgId(self
        , org_id
    ) :         
        return self.act.CountGameByOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameByAppId(self
        , app_id
    ) :         
        return self.act.CountGameByAppId(
        app_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameByOrgIdByAppId(self
        , org_id
        , app_id
    ) :         
        return self.act.CountGameByOrgIdByAppId(
        org_id
        , app_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameListByFilter(self, filter_obj) :
        return self.act.BrowseGameListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameByUuidType(self, set_type, obj) :
        return self.act.SetGameByUuid(set_type, obj)
               
    def SetGameByUuid(self, obj) :
        return self.act.SetGameByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameByCodeType(self, set_type, obj) :
        return self.act.SetGameByCode(set_type, obj)
               
    def SetGameByCode(self, obj) :
        return self.act.SetGameByCode('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameByNameType(self, set_type, obj) :
        return self.act.SetGameByName(set_type, obj)
               
    def SetGameByName(self, obj) :
        return self.act.SetGameByName('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameByOrgIdType(self, set_type, obj) :
        return self.act.SetGameByOrgId(set_type, obj)
               
    def SetGameByOrgId(self, obj) :
        return self.act.SetGameByOrgId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameByAppIdType(self, set_type, obj) :
        return self.act.SetGameByAppId(set_type, obj)
               
    def SetGameByAppId(self, obj) :
        return self.act.SetGameByAppId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameByOrgIdByAppIdType(self, set_type, obj) :
        return self.act.SetGameByOrgIdByAppId(set_type, obj)
               
    def SetGameByOrgIdByAppId(self, obj) :
        return self.act.SetGameByOrgIdByAppId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameByUuid(self
        , uuid
    ) :          
        return self.act.DelGameByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameByCode(self
        , code
    ) :          
        return self.act.DelGameByCode(
        code
        )
#------------------------------------------------------------------------------                    
    def DelGameByName(self
        , name
    ) :          
        return self.act.DelGameByName(
        name
        )
#------------------------------------------------------------------------------                    
    def DelGameByOrgId(self
        , org_id
    ) :          
        return self.act.DelGameByOrgId(
        org_id
        )
#------------------------------------------------------------------------------                    
    def DelGameByAppId(self
        , app_id
    ) :          
        return self.act.DelGameByAppId(
        app_id
        )
#------------------------------------------------------------------------------                    
    def DelGameByOrgIdByAppId(self
        , org_id
        , app_id
    ) :          
        return self.act.DelGameByOrgIdByAppId(
        org_id
        , app_id
        )
#------------------------------------------------------------------------------                    
    def GetGameList(self
        ) :
            return self.act.GetGameList(
            )
        
    def GetGame(self
    ) :
        for item in self.GetGameList(
        ) :
            return item
        return None
    
    def CachedGetGameList(self
    ) :
        return CachedGetGameList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<Game> objs;

        string method_name = "CachedGetGameList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Game>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameListByUuid(self
        , uuid
        ) :
            return self.act.GetGameListByUuid(
                uuid
            )
        
    def GetGameByUuid(self
        , uuid
    ) :
        for item in self.GetGameListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameListByUuid(self
        , uuid
    ) :
        return CachedGetGameListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Game> objs;

        string method_name = "CachedGetGameListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Game>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameListByCode(self
        , code
        ) :
            return self.act.GetGameListByCode(
                code
            )
        
    def GetGameByCode(self
        , code
    ) :
        for item in self.GetGameListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameListByCode(self
        , code
    ) :
        return CachedGetGameListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<Game> objs;

        string method_name = "CachedGetGameListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Game>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameListByName(self
        , name
        ) :
            return self.act.GetGameListByName(
                name
            )
        
    def GetGameByName(self
        , name
    ) :
        for item in self.GetGameListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetGameListByName(self
        , name
    ) :
        return CachedGetGameListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetGameListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<Game> objs;

        string method_name = "CachedGetGameListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Game>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameListByOrgId(self
        , org_id
        ) :
            return self.act.GetGameListByOrgId(
                org_id
            )
        
    def GetGameByOrgId(self
        , org_id
    ) :
        for item in self.GetGameListByOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetGameListByOrgId(self
        , org_id
    ) :
        return CachedGetGameListByOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetGameListByOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<Game> objs;

        string method_name = "CachedGetGameListByOrgId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Game>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameListByOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameListByAppId(self
        , app_id
        ) :
            return self.act.GetGameListByAppId(
                app_id
            )
        
    def GetGameByAppId(self
        , app_id
    ) :
        for item in self.GetGameListByAppId(
        app_id
        ) :
            return item
        return None
    
    def CachedGetGameListByAppId(self
        , app_id
    ) :
        return CachedGetGameListByAppId(
            false
            , self.CACHE_DEFAULT_HOURS
            , app_id
        )
        
    def CachedGetGameListByAppId(self
        , overrideCache
        , cacheHours
        , app_id
    ) :
        pass
        """
        List<Game> objs;

        string method_name = "CachedGetGameListByAppId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("app_id".ToLower());
        sb.Append("_");
        sb.Append(app_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Game>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameListByAppId(
                app_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameListByOrgIdByAppId(self
        , org_id
        , app_id
        ) :
            return self.act.GetGameListByOrgIdByAppId(
                org_id
                , app_id
            )
        
    def GetGameByOrgIdByAppId(self
        , org_id
        , app_id
    ) :
        for item in self.GetGameListByOrgIdByAppId(
        org_id
        , app_id
        ) :
            return item
        return None
    
    def CachedGetGameListByOrgIdByAppId(self
        , org_id
        , app_id
    ) :
        return CachedGetGameListByOrgIdByAppId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
            , app_id
        )
        
    def CachedGetGameListByOrgIdByAppId(self
        , overrideCache
        , cacheHours
        , org_id
        , app_id
    ) :
        pass
        """
        List<Game> objs;

        string method_name = "CachedGetGameListByOrgIdByAppId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);
        sb.Append("_");
        sb.Append("app_id".ToLower());
        sb.Append("_");
        sb.Append(app_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Game>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameListByOrgIdByAppId(
                org_id
                , app_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameAttribute(self
    ) :         
        return self.act.CountGameAttribute(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAttributeByUuid(self
        , uuid
    ) :         
        return self.act.CountGameAttributeByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAttributeByCode(self
        , code
    ) :         
        return self.act.CountGameAttributeByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAttributeByType(self
        , type
    ) :         
        return self.act.CountGameAttributeByType(
        type
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAttributeByGroup(self
        , group
    ) :         
        return self.act.CountGameAttributeByGroup(
        group
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAttributeByCodeByType(self
        , code
        , type
    ) :         
        return self.act.CountGameAttributeByCodeByType(
        code
        , type
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAttributeByGameId(self
        , game_id
    ) :         
        return self.act.CountGameAttributeByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAttributeByGameIdByCode(self
        , game_id
        , code
    ) :         
        return self.act.CountGameAttributeByGameIdByCode(
        game_id
        , code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameAttributeListByFilter(self, filter_obj) :
        return self.act.BrowseGameAttributeListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameAttributeByUuidType(self, set_type, obj) :
        return self.act.SetGameAttributeByUuid(set_type, obj)
               
    def SetGameAttributeByUuid(self, obj) :
        return self.act.SetGameAttributeByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameAttributeByCodeType(self, set_type, obj) :
        return self.act.SetGameAttributeByCode(set_type, obj)
               
    def SetGameAttributeByCode(self, obj) :
        return self.act.SetGameAttributeByCode('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameAttributeByGameIdType(self, set_type, obj) :
        return self.act.SetGameAttributeByGameId(set_type, obj)
               
    def SetGameAttributeByGameId(self, obj) :
        return self.act.SetGameAttributeByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameAttributeByGameIdByCodeType(self, set_type, obj) :
        return self.act.SetGameAttributeByGameIdByCode(set_type, obj)
               
    def SetGameAttributeByGameIdByCode(self, obj) :
        return self.act.SetGameAttributeByGameIdByCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameAttributeByUuid(self
        , uuid
    ) :          
        return self.act.DelGameAttributeByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameAttributeByCode(self
        , code
    ) :          
        return self.act.DelGameAttributeByCode(
        code
        )
#------------------------------------------------------------------------------                    
    def DelGameAttributeByCodeByType(self
        , code
        , type
    ) :          
        return self.act.DelGameAttributeByCodeByType(
        code
        , type
        )
#------------------------------------------------------------------------------                    
    def DelGameAttributeByGameId(self
        , game_id
    ) :          
        return self.act.DelGameAttributeByGameId(
        game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameAttributeByGameIdByCode(self
        , game_id
        , code
    ) :          
        return self.act.DelGameAttributeByGameIdByCode(
        game_id
        , code
        )
#------------------------------------------------------------------------------                    
    def GetGameAttributeList(self
        ) :
            return self.act.GetGameAttributeList(
            )
        
    def GetGameAttribute(self
    ) :
        for item in self.GetGameAttributeList(
        ) :
            return item
        return None
    
    def CachedGetGameAttributeList(self
    ) :
        return CachedGetGameAttributeList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameAttributeList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameAttribute> objs;

        string method_name = "CachedGetGameAttributeList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAttribute>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAttributeList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAttributeListByUuid(self
        , uuid
        ) :
            return self.act.GetGameAttributeListByUuid(
                uuid
            )
        
    def GetGameAttributeByUuid(self
        , uuid
    ) :
        for item in self.GetGameAttributeListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameAttributeListByUuid(self
        , uuid
    ) :
        return CachedGetGameAttributeListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameAttributeListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameAttribute> objs;

        string method_name = "CachedGetGameAttributeListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAttribute>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAttributeListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAttributeListByCode(self
        , code
        ) :
            return self.act.GetGameAttributeListByCode(
                code
            )
        
    def GetGameAttributeByCode(self
        , code
    ) :
        for item in self.GetGameAttributeListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameAttributeListByCode(self
        , code
    ) :
        return CachedGetGameAttributeListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameAttributeListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameAttribute> objs;

        string method_name = "CachedGetGameAttributeListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAttribute>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAttributeListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAttributeListByType(self
        , type
        ) :
            return self.act.GetGameAttributeListByType(
                type
            )
        
    def GetGameAttributeByType(self
        , type
    ) :
        for item in self.GetGameAttributeListByType(
        type
        ) :
            return item
        return None
    
    def CachedGetGameAttributeListByType(self
        , type
    ) :
        return CachedGetGameAttributeListByType(
            false
            , self.CACHE_DEFAULT_HOURS
            , type
        )
        
    def CachedGetGameAttributeListByType(self
        , overrideCache
        , cacheHours
        , type
    ) :
        pass
        """
        List<GameAttribute> objs;

        string method_name = "CachedGetGameAttributeListByType";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("type".ToLower());
        sb.Append("_");
        sb.Append(type);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAttribute>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAttributeListByType(
                type
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAttributeListByGroup(self
        , group
        ) :
            return self.act.GetGameAttributeListByGroup(
                group
            )
        
    def GetGameAttributeByGroup(self
        , group
    ) :
        for item in self.GetGameAttributeListByGroup(
        group
        ) :
            return item
        return None
    
    def CachedGetGameAttributeListByGroup(self
        , group
    ) :
        return CachedGetGameAttributeListByGroup(
            false
            , self.CACHE_DEFAULT_HOURS
            , group
        )
        
    def CachedGetGameAttributeListByGroup(self
        , overrideCache
        , cacheHours
        , group
    ) :
        pass
        """
        List<GameAttribute> objs;

        string method_name = "CachedGetGameAttributeListByGroup";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("group".ToLower());
        sb.Append("_");
        sb.Append(group);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAttribute>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAttributeListByGroup(
                group
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAttributeListByCodeByType(self
        , code
        , type
        ) :
            return self.act.GetGameAttributeListByCodeByType(
                code
                , type
            )
        
    def GetGameAttributeByCodeByType(self
        , code
        , type
    ) :
        for item in self.GetGameAttributeListByCodeByType(
        code
        , type
        ) :
            return item
        return None
    
    def CachedGetGameAttributeListByCodeByType(self
        , code
        , type
    ) :
        return CachedGetGameAttributeListByCodeByType(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , type
        )
        
    def CachedGetGameAttributeListByCodeByType(self
        , overrideCache
        , cacheHours
        , code
        , type
    ) :
        pass
        """
        List<GameAttribute> objs;

        string method_name = "CachedGetGameAttributeListByCodeByType";

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

        objs = CacheUtil.Get<List<GameAttribute>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAttributeListByCodeByType(
                code
                , type
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAttributeListByGameIdByCode(self
        , game_id
        , code
        ) :
            return self.act.GetGameAttributeListByGameIdByCode(
                game_id
                , code
            )
        
    def GetGameAttributeByGameIdByCode(self
        , game_id
        , code
    ) :
        for item in self.GetGameAttributeListByGameIdByCode(
        game_id
        , code
        ) :
            return item
        return None
    
    def CachedGetGameAttributeListByGameIdByCode(self
        , game_id
        , code
    ) :
        return CachedGetGameAttributeListByGameIdByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , code
        )
        
    def CachedGetGameAttributeListByGameIdByCode(self
        , overrideCache
        , cacheHours
        , game_id
        , code
    ) :
        pass
        """
        List<GameAttribute> objs;

        string method_name = "CachedGetGameAttributeListByGameIdByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAttribute>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAttributeListByGameIdByCode(
                game_id
                , code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameAttributeText(self
    ) :         
        return self.act.CountGameAttributeText(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAttributeTextByUuid(self
        , uuid
    ) :         
        return self.act.CountGameAttributeTextByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAttributeTextByGameId(self
        , game_id
    ) :         
        return self.act.CountGameAttributeTextByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAttributeTextByAttributeId(self
        , attribute_id
    ) :         
        return self.act.CountGameAttributeTextByAttributeId(
        attribute_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAttributeTextByGameIdByAttributeId(self
        , game_id
        , attribute_id
    ) :         
        return self.act.CountGameAttributeTextByGameIdByAttributeId(
        game_id
        , attribute_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameAttributeTextListByFilter(self, filter_obj) :
        return self.act.BrowseGameAttributeTextListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameAttributeTextType(self, set_type, obj) :
        return self.act.SetGameAttributeText(set_type, obj)
               
    def SetGameAttributeText(self, obj) :
        return self.act.SetGameAttributeText('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameAttributeTextByUuidType(self, set_type, obj) :
        return self.act.SetGameAttributeTextByUuid(set_type, obj)
               
    def SetGameAttributeTextByUuid(self, obj) :
        return self.act.SetGameAttributeTextByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameAttributeTextByGameIdType(self, set_type, obj) :
        return self.act.SetGameAttributeTextByGameId(set_type, obj)
               
    def SetGameAttributeTextByGameId(self, obj) :
        return self.act.SetGameAttributeTextByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameAttributeTextByAttributeIdType(self, set_type, obj) :
        return self.act.SetGameAttributeTextByAttributeId(set_type, obj)
               
    def SetGameAttributeTextByAttributeId(self, obj) :
        return self.act.SetGameAttributeTextByAttributeId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameAttributeTextByGameIdByAttributeIdType(self, set_type, obj) :
        return self.act.SetGameAttributeTextByGameIdByAttributeId(set_type, obj)
               
    def SetGameAttributeTextByGameIdByAttributeId(self, obj) :
        return self.act.SetGameAttributeTextByGameIdByAttributeId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameAttributeText(self
    ) :          
        return self.act.DelGameAttributeText(
        )
#------------------------------------------------------------------------------                    
    def DelGameAttributeTextByUuid(self
        , uuid
    ) :          
        return self.act.DelGameAttributeTextByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameAttributeTextByGameId(self
        , game_id
    ) :          
        return self.act.DelGameAttributeTextByGameId(
        game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameAttributeTextByAttributeId(self
        , attribute_id
    ) :          
        return self.act.DelGameAttributeTextByAttributeId(
        attribute_id
        )
#------------------------------------------------------------------------------                    
    def DelGameAttributeTextByGameIdByAttributeId(self
        , game_id
        , attribute_id
    ) :          
        return self.act.DelGameAttributeTextByGameIdByAttributeId(
        game_id
        , attribute_id
        )
#------------------------------------------------------------------------------                    
    def GetGameAttributeTextList(self
        ) :
            return self.act.GetGameAttributeTextList(
            )
        
    def GetGameAttributeText(self
    ) :
        for item in self.GetGameAttributeTextList(
        ) :
            return item
        return None
    
    def CachedGetGameAttributeTextList(self
    ) :
        return CachedGetGameAttributeTextList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameAttributeTextList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameAttributeText> objs;

        string method_name = "CachedGetGameAttributeTextList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAttributeText>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAttributeTextList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAttributeTextListByUuid(self
        , uuid
        ) :
            return self.act.GetGameAttributeTextListByUuid(
                uuid
            )
        
    def GetGameAttributeTextByUuid(self
        , uuid
    ) :
        for item in self.GetGameAttributeTextListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameAttributeTextListByUuid(self
        , uuid
    ) :
        return CachedGetGameAttributeTextListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameAttributeTextListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameAttributeText> objs;

        string method_name = "CachedGetGameAttributeTextListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAttributeText>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAttributeTextListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAttributeTextListByGameId(self
        , game_id
        ) :
            return self.act.GetGameAttributeTextListByGameId(
                game_id
            )
        
    def GetGameAttributeTextByGameId(self
        , game_id
    ) :
        for item in self.GetGameAttributeTextListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameAttributeTextListByGameId(self
        , game_id
    ) :
        return CachedGetGameAttributeTextListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameAttributeTextListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameAttributeText> objs;

        string method_name = "CachedGetGameAttributeTextListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAttributeText>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAttributeTextListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAttributeTextListByAttributeId(self
        , attribute_id
        ) :
            return self.act.GetGameAttributeTextListByAttributeId(
                attribute_id
            )
        
    def GetGameAttributeTextByAttributeId(self
        , attribute_id
    ) :
        for item in self.GetGameAttributeTextListByAttributeId(
        attribute_id
        ) :
            return item
        return None
    
    def CachedGetGameAttributeTextListByAttributeId(self
        , attribute_id
    ) :
        return CachedGetGameAttributeTextListByAttributeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , attribute_id
        )
        
    def CachedGetGameAttributeTextListByAttributeId(self
        , overrideCache
        , cacheHours
        , attribute_id
    ) :
        pass
        """
        List<GameAttributeText> objs;

        string method_name = "CachedGetGameAttributeTextListByAttributeId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("attribute_id".ToLower());
        sb.Append("_");
        sb.Append(attribute_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAttributeText>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAttributeTextListByAttributeId(
                attribute_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAttributeTextListByGameIdByAttributeId(self
        , game_id
        , attribute_id
        ) :
            return self.act.GetGameAttributeTextListByGameIdByAttributeId(
                game_id
                , attribute_id
            )
        
    def GetGameAttributeTextByGameIdByAttributeId(self
        , game_id
        , attribute_id
    ) :
        for item in self.GetGameAttributeTextListByGameIdByAttributeId(
        game_id
        , attribute_id
        ) :
            return item
        return None
    
    def CachedGetGameAttributeTextListByGameIdByAttributeId(self
        , game_id
        , attribute_id
    ) :
        return CachedGetGameAttributeTextListByGameIdByAttributeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , attribute_id
        )
        
    def CachedGetGameAttributeTextListByGameIdByAttributeId(self
        , overrideCache
        , cacheHours
        , game_id
        , attribute_id
    ) :
        pass
        """
        List<GameAttributeText> objs;

        string method_name = "CachedGetGameAttributeTextListByGameIdByAttributeId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("attribute_id".ToLower());
        sb.Append("_");
        sb.Append(attribute_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAttributeText>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAttributeTextListByGameIdByAttributeId(
                game_id
                , attribute_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameAttributeData(self
    ) :         
        return self.act.CountGameAttributeData(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAttributeDataByUuid(self
        , uuid
    ) :         
        return self.act.CountGameAttributeDataByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAttributeDataByGameId(self
        , game_id
    ) :         
        return self.act.CountGameAttributeDataByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAttributeDataByGameIdByAttributeId(self
        , game_id
        , attribute_id
    ) :         
        return self.act.CountGameAttributeDataByGameIdByAttributeId(
        game_id
        , attribute_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameAttributeDataListByFilter(self, filter_obj) :
        return self.act.BrowseGameAttributeDataListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameAttributeDataByUuidType(self, set_type, obj) :
        return self.act.SetGameAttributeDataByUuid(set_type, obj)
               
    def SetGameAttributeDataByUuid(self, obj) :
        return self.act.SetGameAttributeDataByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameAttributeDataByGameIdByAttributeIdType(self, set_type, obj) :
        return self.act.SetGameAttributeDataByGameIdByAttributeId(set_type, obj)
               
    def SetGameAttributeDataByGameIdByAttributeId(self, obj) :
        return self.act.SetGameAttributeDataByGameIdByAttributeId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameAttributeData(self
    ) :          
        return self.act.DelGameAttributeData(
        )
#------------------------------------------------------------------------------                    
    def DelGameAttributeDataByUuid(self
        , uuid
    ) :          
        return self.act.DelGameAttributeDataByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameAttributeDataByGameId(self
        , game_id
    ) :          
        return self.act.DelGameAttributeDataByGameId(
        game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameAttributeDataByGameId(self
        , game_id
    ) :          
        return self.act.DelGameAttributeDataByGameId(
        game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameAttributeDataList(self
        ) :
            return self.act.GetGameAttributeDataList(
            )
        
    def GetGameAttributeData(self
    ) :
        for item in self.GetGameAttributeDataList(
        ) :
            return item
        return None
    
    def CachedGetGameAttributeDataList(self
    ) :
        return CachedGetGameAttributeDataList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameAttributeDataList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameAttributeData> objs;

        string method_name = "CachedGetGameAttributeDataList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAttributeData>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAttributeDataList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAttributeDataListByUuid(self
        , uuid
        ) :
            return self.act.GetGameAttributeDataListByUuid(
                uuid
            )
        
    def GetGameAttributeDataByUuid(self
        , uuid
    ) :
        for item in self.GetGameAttributeDataListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameAttributeDataListByUuid(self
        , uuid
    ) :
        return CachedGetGameAttributeDataListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameAttributeDataListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameAttributeData> objs;

        string method_name = "CachedGetGameAttributeDataListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAttributeData>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAttributeDataListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAttributeDataListByGameId(self
        , game_id
        ) :
            return self.act.GetGameAttributeDataListByGameId(
                game_id
            )
        
    def GetGameAttributeDataByGameId(self
        , game_id
    ) :
        for item in self.GetGameAttributeDataListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameAttributeDataListByGameId(self
        , game_id
    ) :
        return CachedGetGameAttributeDataListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameAttributeDataListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameAttributeData> objs;

        string method_name = "CachedGetGameAttributeDataListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAttributeData>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAttributeDataListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAttributeDataListByGameIdByAttributeId(self
        , game_id
        , attribute_id
        ) :
            return self.act.GetGameAttributeDataListByGameIdByAttributeId(
                game_id
                , attribute_id
            )
        
    def GetGameAttributeDataByGameIdByAttributeId(self
        , game_id
        , attribute_id
    ) :
        for item in self.GetGameAttributeDataListByGameIdByAttributeId(
        game_id
        , attribute_id
        ) :
            return item
        return None
    
    def CachedGetGameAttributeDataListByGameIdByAttributeId(self
        , game_id
        , attribute_id
    ) :
        return CachedGetGameAttributeDataListByGameIdByAttributeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , attribute_id
        )
        
    def CachedGetGameAttributeDataListByGameIdByAttributeId(self
        , overrideCache
        , cacheHours
        , game_id
        , attribute_id
    ) :
        pass
        """
        List<GameAttributeData> objs;

        string method_name = "CachedGetGameAttributeDataListByGameIdByAttributeId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("attribute_id".ToLower());
        sb.Append("_");
        sb.Append(attribute_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAttributeData>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAttributeDataListByGameIdByAttributeId(
                game_id
                , attribute_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameCategory(self
    ) :         
        return self.act.CountGameCategory(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryByUuid(self
        , uuid
    ) :         
        return self.act.CountGameCategoryByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryByCode(self
        , code
    ) :         
        return self.act.CountGameCategoryByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryByName(self
        , name
    ) :         
        return self.act.CountGameCategoryByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryByOrgId(self
        , org_id
    ) :         
        return self.act.CountGameCategoryByOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryByTypeId(self
        , type_id
    ) :         
        return self.act.CountGameCategoryByTypeId(
        type_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryByOrgIdByTypeId(self
        , org_id
        , type_id
    ) :         
        return self.act.CountGameCategoryByOrgIdByTypeId(
        org_id
        , type_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameCategoryListByFilter(self, filter_obj) :
        return self.act.BrowseGameCategoryListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameCategoryByUuidType(self, set_type, obj) :
        return self.act.SetGameCategoryByUuid(set_type, obj)
               
    def SetGameCategoryByUuid(self, obj) :
        return self.act.SetGameCategoryByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameCategoryByUuid(self
        , uuid
    ) :          
        return self.act.DelGameCategoryByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameCategoryByCodeByOrgId(self
        , code
        , org_id
    ) :          
        return self.act.DelGameCategoryByCodeByOrgId(
        code
        , org_id
        )
#------------------------------------------------------------------------------                    
    def DelGameCategoryByCodeByOrgIdByTypeId(self
        , code
        , org_id
        , type_id
    ) :          
        return self.act.DelGameCategoryByCodeByOrgIdByTypeId(
        code
        , org_id
        , type_id
        )
#------------------------------------------------------------------------------                    
    def GetGameCategoryList(self
        ) :
            return self.act.GetGameCategoryList(
            )
        
    def GetGameCategory(self
    ) :
        for item in self.GetGameCategoryList(
        ) :
            return item
        return None
    
    def CachedGetGameCategoryList(self
    ) :
        return CachedGetGameCategoryList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameCategoryList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameCategory> objs;

        string method_name = "CachedGetGameCategoryList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameCategory>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameCategoryList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryListByUuid(self
        , uuid
        ) :
            return self.act.GetGameCategoryListByUuid(
                uuid
            )
        
    def GetGameCategoryByUuid(self
        , uuid
    ) :
        for item in self.GetGameCategoryListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameCategoryListByUuid(self
        , uuid
    ) :
        return CachedGetGameCategoryListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameCategoryListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameCategory> objs;

        string method_name = "CachedGetGameCategoryListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameCategory>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameCategoryListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryListByCode(self
        , code
        ) :
            return self.act.GetGameCategoryListByCode(
                code
            )
        
    def GetGameCategoryByCode(self
        , code
    ) :
        for item in self.GetGameCategoryListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameCategoryListByCode(self
        , code
    ) :
        return CachedGetGameCategoryListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameCategoryListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameCategory> objs;

        string method_name = "CachedGetGameCategoryListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameCategory>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameCategoryListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryListByName(self
        , name
        ) :
            return self.act.GetGameCategoryListByName(
                name
            )
        
    def GetGameCategoryByName(self
        , name
    ) :
        for item in self.GetGameCategoryListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetGameCategoryListByName(self
        , name
    ) :
        return CachedGetGameCategoryListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetGameCategoryListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<GameCategory> objs;

        string method_name = "CachedGetGameCategoryListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameCategory>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameCategoryListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryListByOrgId(self
        , org_id
        ) :
            return self.act.GetGameCategoryListByOrgId(
                org_id
            )
        
    def GetGameCategoryByOrgId(self
        , org_id
    ) :
        for item in self.GetGameCategoryListByOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetGameCategoryListByOrgId(self
        , org_id
    ) :
        return CachedGetGameCategoryListByOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetGameCategoryListByOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<GameCategory> objs;

        string method_name = "CachedGetGameCategoryListByOrgId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameCategory>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameCategoryListByOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryListByTypeId(self
        , type_id
        ) :
            return self.act.GetGameCategoryListByTypeId(
                type_id
            )
        
    def GetGameCategoryByTypeId(self
        , type_id
    ) :
        for item in self.GetGameCategoryListByTypeId(
        type_id
        ) :
            return item
        return None
    
    def CachedGetGameCategoryListByTypeId(self
        , type_id
    ) :
        return CachedGetGameCategoryListByTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , type_id
        )
        
    def CachedGetGameCategoryListByTypeId(self
        , overrideCache
        , cacheHours
        , type_id
    ) :
        pass
        """
        List<GameCategory> objs;

        string method_name = "CachedGetGameCategoryListByTypeId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("type_id".ToLower());
        sb.Append("_");
        sb.Append(type_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameCategory>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameCategoryListByTypeId(
                type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryListByOrgIdByTypeId(self
        , org_id
        , type_id
        ) :
            return self.act.GetGameCategoryListByOrgIdByTypeId(
                org_id
                , type_id
            )
        
    def GetGameCategoryByOrgIdByTypeId(self
        , org_id
        , type_id
    ) :
        for item in self.GetGameCategoryListByOrgIdByTypeId(
        org_id
        , type_id
        ) :
            return item
        return None
    
    def CachedGetGameCategoryListByOrgIdByTypeId(self
        , org_id
        , type_id
    ) :
        return CachedGetGameCategoryListByOrgIdByTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
            , type_id
        )
        
    def CachedGetGameCategoryListByOrgIdByTypeId(self
        , overrideCache
        , cacheHours
        , org_id
        , type_id
    ) :
        pass
        """
        List<GameCategory> objs;

        string method_name = "CachedGetGameCategoryListByOrgIdByTypeId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);
        sb.Append("_");
        sb.Append("type_id".ToLower());
        sb.Append("_");
        sb.Append(type_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameCategory>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameCategoryListByOrgIdByTypeId(
                org_id
                , type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameCategoryTree(self
    ) :         
        return self.act.CountGameCategoryTree(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryTreeByUuid(self
        , uuid
    ) :         
        return self.act.CountGameCategoryTreeByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryTreeByParentId(self
        , parent_id
    ) :         
        return self.act.CountGameCategoryTreeByParentId(
        parent_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryTreeByCategoryId(self
        , category_id
    ) :         
        return self.act.CountGameCategoryTreeByCategoryId(
        category_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryTreeByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :         
        return self.act.CountGameCategoryTreeByParentIdByCategoryId(
        parent_id
        , category_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameCategoryTreeListByFilter(self, filter_obj) :
        return self.act.BrowseGameCategoryTreeListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameCategoryTreeByUuidType(self, set_type, obj) :
        return self.act.SetGameCategoryTreeByUuid(set_type, obj)
               
    def SetGameCategoryTreeByUuid(self, obj) :
        return self.act.SetGameCategoryTreeByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameCategoryTreeByUuid(self
        , uuid
    ) :          
        return self.act.DelGameCategoryTreeByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameCategoryTreeByParentId(self
        , parent_id
    ) :          
        return self.act.DelGameCategoryTreeByParentId(
        parent_id
        )
#------------------------------------------------------------------------------                    
    def DelGameCategoryTreeByCategoryId(self
        , category_id
    ) :          
        return self.act.DelGameCategoryTreeByCategoryId(
        category_id
        )
#------------------------------------------------------------------------------                    
    def DelGameCategoryTreeByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :          
        return self.act.DelGameCategoryTreeByParentIdByCategoryId(
        parent_id
        , category_id
        )
#------------------------------------------------------------------------------                    
    def GetGameCategoryTreeList(self
        ) :
            return self.act.GetGameCategoryTreeList(
            )
        
    def GetGameCategoryTree(self
    ) :
        for item in self.GetGameCategoryTreeList(
        ) :
            return item
        return None
    
    def CachedGetGameCategoryTreeList(self
    ) :
        return CachedGetGameCategoryTreeList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameCategoryTreeList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameCategoryTree> objs;

        string method_name = "CachedGetGameCategoryTreeList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameCategoryTree>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameCategoryTreeList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryTreeListByUuid(self
        , uuid
        ) :
            return self.act.GetGameCategoryTreeListByUuid(
                uuid
            )
        
    def GetGameCategoryTreeByUuid(self
        , uuid
    ) :
        for item in self.GetGameCategoryTreeListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameCategoryTreeListByUuid(self
        , uuid
    ) :
        return CachedGetGameCategoryTreeListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameCategoryTreeListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameCategoryTree> objs;

        string method_name = "CachedGetGameCategoryTreeListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameCategoryTree>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameCategoryTreeListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryTreeListByParentId(self
        , parent_id
        ) :
            return self.act.GetGameCategoryTreeListByParentId(
                parent_id
            )
        
    def GetGameCategoryTreeByParentId(self
        , parent_id
    ) :
        for item in self.GetGameCategoryTreeListByParentId(
        parent_id
        ) :
            return item
        return None
    
    def CachedGetGameCategoryTreeListByParentId(self
        , parent_id
    ) :
        return CachedGetGameCategoryTreeListByParentId(
            false
            , self.CACHE_DEFAULT_HOURS
            , parent_id
        )
        
    def CachedGetGameCategoryTreeListByParentId(self
        , overrideCache
        , cacheHours
        , parent_id
    ) :
        pass
        """
        List<GameCategoryTree> objs;

        string method_name = "CachedGetGameCategoryTreeListByParentId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("parent_id".ToLower());
        sb.Append("_");
        sb.Append(parent_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameCategoryTree>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameCategoryTreeListByParentId(
                parent_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryTreeListByCategoryId(self
        , category_id
        ) :
            return self.act.GetGameCategoryTreeListByCategoryId(
                category_id
            )
        
    def GetGameCategoryTreeByCategoryId(self
        , category_id
    ) :
        for item in self.GetGameCategoryTreeListByCategoryId(
        category_id
        ) :
            return item
        return None
    
    def CachedGetGameCategoryTreeListByCategoryId(self
        , category_id
    ) :
        return CachedGetGameCategoryTreeListByCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , category_id
        )
        
    def CachedGetGameCategoryTreeListByCategoryId(self
        , overrideCache
        , cacheHours
        , category_id
    ) :
        pass
        """
        List<GameCategoryTree> objs;

        string method_name = "CachedGetGameCategoryTreeListByCategoryId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("category_id".ToLower());
        sb.Append("_");
        sb.Append(category_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameCategoryTree>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameCategoryTreeListByCategoryId(
                category_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryTreeListByParentIdByCategoryId(self
        , parent_id
        , category_id
        ) :
            return self.act.GetGameCategoryTreeListByParentIdByCategoryId(
                parent_id
                , category_id
            )
        
    def GetGameCategoryTreeByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :
        for item in self.GetGameCategoryTreeListByParentIdByCategoryId(
        parent_id
        , category_id
        ) :
            return item
        return None
    
    def CachedGetGameCategoryTreeListByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :
        return CachedGetGameCategoryTreeListByParentIdByCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , parent_id
            , category_id
        )
        
    def CachedGetGameCategoryTreeListByParentIdByCategoryId(self
        , overrideCache
        , cacheHours
        , parent_id
        , category_id
    ) :
        pass
        """
        List<GameCategoryTree> objs;

        string method_name = "CachedGetGameCategoryTreeListByParentIdByCategoryId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("parent_id".ToLower());
        sb.Append("_");
        sb.Append(parent_id);
        sb.Append("_");
        sb.Append("category_id".ToLower());
        sb.Append("_");
        sb.Append(category_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameCategoryTree>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameCategoryTreeListByParentIdByCategoryId(
                parent_id
                , category_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameCategoryAssoc(self
    ) :         
        return self.act.CountGameCategoryAssoc(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryAssocByUuid(self
        , uuid
    ) :         
        return self.act.CountGameCategoryAssocByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryAssocByGameId(self
        , game_id
    ) :         
        return self.act.CountGameCategoryAssocByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryAssocByCategoryId(self
        , category_id
    ) :         
        return self.act.CountGameCategoryAssocByCategoryId(
        category_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryAssocByGameIdByCategoryId(self
        , game_id
        , category_id
    ) :         
        return self.act.CountGameCategoryAssocByGameIdByCategoryId(
        game_id
        , category_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameCategoryAssocListByFilter(self, filter_obj) :
        return self.act.BrowseGameCategoryAssocListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameCategoryAssocByUuidType(self, set_type, obj) :
        return self.act.SetGameCategoryAssocByUuid(set_type, obj)
               
    def SetGameCategoryAssocByUuid(self, obj) :
        return self.act.SetGameCategoryAssocByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameCategoryAssocByUuid(self
        , uuid
    ) :          
        return self.act.DelGameCategoryAssocByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetGameCategoryAssocList(self
        ) :
            return self.act.GetGameCategoryAssocList(
            )
        
    def GetGameCategoryAssoc(self
    ) :
        for item in self.GetGameCategoryAssocList(
        ) :
            return item
        return None
    
    def CachedGetGameCategoryAssocList(self
    ) :
        return CachedGetGameCategoryAssocList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameCategoryAssocList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameCategoryAssoc> objs;

        string method_name = "CachedGetGameCategoryAssocList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameCategoryAssoc>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameCategoryAssocList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryAssocListByUuid(self
        , uuid
        ) :
            return self.act.GetGameCategoryAssocListByUuid(
                uuid
            )
        
    def GetGameCategoryAssocByUuid(self
        , uuid
    ) :
        for item in self.GetGameCategoryAssocListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameCategoryAssocListByUuid(self
        , uuid
    ) :
        return CachedGetGameCategoryAssocListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameCategoryAssocListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameCategoryAssoc> objs;

        string method_name = "CachedGetGameCategoryAssocListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameCategoryAssoc>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameCategoryAssocListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryAssocListByGameId(self
        , game_id
        ) :
            return self.act.GetGameCategoryAssocListByGameId(
                game_id
            )
        
    def GetGameCategoryAssocByGameId(self
        , game_id
    ) :
        for item in self.GetGameCategoryAssocListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameCategoryAssocListByGameId(self
        , game_id
    ) :
        return CachedGetGameCategoryAssocListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameCategoryAssocListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameCategoryAssoc> objs;

        string method_name = "CachedGetGameCategoryAssocListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameCategoryAssoc>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameCategoryAssocListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryAssocListByCategoryId(self
        , category_id
        ) :
            return self.act.GetGameCategoryAssocListByCategoryId(
                category_id
            )
        
    def GetGameCategoryAssocByCategoryId(self
        , category_id
    ) :
        for item in self.GetGameCategoryAssocListByCategoryId(
        category_id
        ) :
            return item
        return None
    
    def CachedGetGameCategoryAssocListByCategoryId(self
        , category_id
    ) :
        return CachedGetGameCategoryAssocListByCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , category_id
        )
        
    def CachedGetGameCategoryAssocListByCategoryId(self
        , overrideCache
        , cacheHours
        , category_id
    ) :
        pass
        """
        List<GameCategoryAssoc> objs;

        string method_name = "CachedGetGameCategoryAssocListByCategoryId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("category_id".ToLower());
        sb.Append("_");
        sb.Append(category_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameCategoryAssoc>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameCategoryAssocListByCategoryId(
                category_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryAssocListByGameIdByCategoryId(self
        , game_id
        , category_id
        ) :
            return self.act.GetGameCategoryAssocListByGameIdByCategoryId(
                game_id
                , category_id
            )
        
    def GetGameCategoryAssocByGameIdByCategoryId(self
        , game_id
        , category_id
    ) :
        for item in self.GetGameCategoryAssocListByGameIdByCategoryId(
        game_id
        , category_id
        ) :
            return item
        return None
    
    def CachedGetGameCategoryAssocListByGameIdByCategoryId(self
        , game_id
        , category_id
    ) :
        return CachedGetGameCategoryAssocListByGameIdByCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , category_id
        )
        
    def CachedGetGameCategoryAssocListByGameIdByCategoryId(self
        , overrideCache
        , cacheHours
        , game_id
        , category_id
    ) :
        pass
        """
        List<GameCategoryAssoc> objs;

        string method_name = "CachedGetGameCategoryAssocListByGameIdByCategoryId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("category_id".ToLower());
        sb.Append("_");
        sb.Append(category_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameCategoryAssoc>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameCategoryAssocListByGameIdByCategoryId(
                game_id
                , category_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameType(self
    ) :         
        return self.act.CountGameType(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameTypeByUuid(self
        , uuid
    ) :         
        return self.act.CountGameTypeByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameTypeByCode(self
        , code
    ) :         
        return self.act.CountGameTypeByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameTypeByName(self
        , name
    ) :         
        return self.act.CountGameTypeByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameTypeListByFilter(self, filter_obj) :
        return self.act.BrowseGameTypeListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameTypeByUuidType(self, set_type, obj) :
        return self.act.SetGameTypeByUuid(set_type, obj)
               
    def SetGameTypeByUuid(self, obj) :
        return self.act.SetGameTypeByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameTypeByUuid(self
        , uuid
    ) :          
        return self.act.DelGameTypeByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetGameTypeList(self
        ) :
            return self.act.GetGameTypeList(
            )
        
    def GetGameType(self
    ) :
        for item in self.GetGameTypeList(
        ) :
            return item
        return None
    
    def CachedGetGameTypeList(self
    ) :
        return CachedGetGameTypeList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameTypeList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameType> objs;

        string method_name = "CachedGetGameTypeList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameTypeList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameTypeListByUuid(self
        , uuid
        ) :
            return self.act.GetGameTypeListByUuid(
                uuid
            )
        
    def GetGameTypeByUuid(self
        , uuid
    ) :
        for item in self.GetGameTypeListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameTypeListByUuid(self
        , uuid
    ) :
        return CachedGetGameTypeListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameTypeListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameType> objs;

        string method_name = "CachedGetGameTypeListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameTypeListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameTypeListByCode(self
        , code
        ) :
            return self.act.GetGameTypeListByCode(
                code
            )
        
    def GetGameTypeByCode(self
        , code
    ) :
        for item in self.GetGameTypeListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameTypeListByCode(self
        , code
    ) :
        return CachedGetGameTypeListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameTypeListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameType> objs;

        string method_name = "CachedGetGameTypeListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameTypeListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameTypeListByName(self
        , name
        ) :
            return self.act.GetGameTypeListByName(
                name
            )
        
    def GetGameTypeByName(self
        , name
    ) :
        for item in self.GetGameTypeListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetGameTypeListByName(self
        , name
    ) :
        return CachedGetGameTypeListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetGameTypeListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<GameType> objs;

        string method_name = "CachedGetGameTypeListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameTypeListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountProfileGame(self
    ) :         
        return self.act.CountProfileGame(
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameByUuid(self
        , uuid
    ) :         
        return self.act.CountProfileGameByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameByGameId(self
        , game_id
    ) :         
        return self.act.CountProfileGameByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameByProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileGameByProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountProfileGameByProfileIdByGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileGameListByFilter(self, filter_obj) :
        return self.act.BrowseProfileGameListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameByUuidType(self, set_type, obj) :
        return self.act.SetProfileGameByUuid(set_type, obj)
               
    def SetProfileGameByUuid(self, obj) :
        return self.act.SetProfileGameByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameByGameIdType(self, set_type, obj) :
        return self.act.SetProfileGameByGameId(set_type, obj)
               
    def SetProfileGameByGameId(self, obj) :
        return self.act.SetProfileGameByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameByProfileIdType(self, set_type, obj) :
        return self.act.SetProfileGameByProfileId(set_type, obj)
               
    def SetProfileGameByProfileId(self, obj) :
        return self.act.SetProfileGameByProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameByProfileIdByGameIdType(self, set_type, obj) :
        return self.act.SetProfileGameByProfileIdByGameId(set_type, obj)
               
    def SetProfileGameByProfileIdByGameId(self, obj) :
        return self.act.SetProfileGameByProfileIdByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileGameByUuid(self
        , uuid
    ) :          
        return self.act.DelProfileGameByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileGameByGameId(self
        , game_id
    ) :          
        return self.act.DelProfileGameByGameId(
        game_id
        )
#------------------------------------------------------------------------------                    
    def DelProfileGameByProfileId(self
        , profile_id
    ) :          
        return self.act.DelProfileGameByProfileId(
        profile_id
        )
#------------------------------------------------------------------------------                    
    def DelProfileGameByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :          
        return self.act.DelProfileGameByProfileIdByGameId(
        profile_id
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetProfileGameList(self
        ) :
            return self.act.GetProfileGameList(
            )
        
    def GetProfileGame(self
    ) :
        for item in self.GetProfileGameList(
        ) :
            return item
        return None
    
    def CachedGetProfileGameList(self
    ) :
        return CachedGetProfileGameList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetProfileGameList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<ProfileGame> objs;

        string method_name = "CachedGetProfileGameList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileGame>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileGameList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameListByUuid(self
        , uuid
        ) :
            return self.act.GetProfileGameListByUuid(
                uuid
            )
        
    def GetProfileGameByUuid(self
        , uuid
    ) :
        for item in self.GetProfileGameListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileGameListByUuid(self
        , uuid
    ) :
        return CachedGetProfileGameListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileGameListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileGame> objs;

        string method_name = "CachedGetProfileGameListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileGame>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileGameListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameListByGameId(self
        , game_id
        ) :
            return self.act.GetProfileGameListByGameId(
                game_id
            )
        
    def GetProfileGameByGameId(self
        , game_id
    ) :
        for item in self.GetProfileGameListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameListByGameId(self
        , game_id
    ) :
        return CachedGetProfileGameListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetProfileGameListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<ProfileGame> objs;

        string method_name = "CachedGetProfileGameListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileGame>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileGameListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameListByProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileGameListByProfileId(
                profile_id
            )
        
    def GetProfileGameByProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileGameListByProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameListByProfileId(self
        , profile_id
    ) :
        return CachedGetProfileGameListByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileGameListByProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileGame> objs;

        string method_name = "CachedGetProfileGameListByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileGame>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileGameListByProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameListByProfileIdByGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetProfileGameListByProfileIdByGameId(
                profile_id
                , game_id
            )
        
    def GetProfileGameByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetProfileGameListByProfileIdByGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetProfileGameListByProfileIdByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetProfileGameListByProfileIdByGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<ProfileGame> objs;

        string method_name = "CachedGetProfileGameListByProfileIdByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileGame>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileGameListByProfileIdByGameId(
                profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameProfileAttribute(self
    ) :         
        return self.act.CountGameProfileAttribute(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAttributeByUuid(self
        , uuid
    ) :         
        return self.act.CountGameProfileAttributeByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAttributeByCode(self
        , code
    ) :         
        return self.act.CountGameProfileAttributeByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAttributeByType(self
        , type
    ) :         
        return self.act.CountGameProfileAttributeByType(
        type
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAttributeByGroup(self
        , group
    ) :         
        return self.act.CountGameProfileAttributeByGroup(
        group
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAttributeByCodeByType(self
        , code
        , type
    ) :         
        return self.act.CountGameProfileAttributeByCodeByType(
        code
        , type
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAttributeByGameId(self
        , game_id
    ) :         
        return self.act.CountGameProfileAttributeByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAttributeByGameIdByCode(self
        , game_id
        , code
    ) :         
        return self.act.CountGameProfileAttributeByGameIdByCode(
        game_id
        , code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameProfileAttributeListByFilter(self, filter_obj) :
        return self.act.BrowseGameProfileAttributeListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAttributeByUuidType(self, set_type, obj) :
        return self.act.SetGameProfileAttributeByUuid(set_type, obj)
               
    def SetGameProfileAttributeByUuid(self, obj) :
        return self.act.SetGameProfileAttributeByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAttributeByCodeType(self, set_type, obj) :
        return self.act.SetGameProfileAttributeByCode(set_type, obj)
               
    def SetGameProfileAttributeByCode(self, obj) :
        return self.act.SetGameProfileAttributeByCode('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAttributeByGameIdType(self, set_type, obj) :
        return self.act.SetGameProfileAttributeByGameId(set_type, obj)
               
    def SetGameProfileAttributeByGameId(self, obj) :
        return self.act.SetGameProfileAttributeByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAttributeByGameIdByCodeType(self, set_type, obj) :
        return self.act.SetGameProfileAttributeByGameIdByCode(set_type, obj)
               
    def SetGameProfileAttributeByGameIdByCode(self, obj) :
        return self.act.SetGameProfileAttributeByGameIdByCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameProfileAttributeByUuid(self
        , uuid
    ) :          
        return self.act.DelGameProfileAttributeByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileAttributeByCode(self
        , code
    ) :          
        return self.act.DelGameProfileAttributeByCode(
        code
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileAttributeByCodeByType(self
        , code
        , type
    ) :          
        return self.act.DelGameProfileAttributeByCodeByType(
        code
        , type
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileAttributeByGameId(self
        , game_id
    ) :          
        return self.act.DelGameProfileAttributeByGameId(
        game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileAttributeByGameIdByCode(self
        , game_id
        , code
    ) :          
        return self.act.DelGameProfileAttributeByGameIdByCode(
        game_id
        , code
        )
#------------------------------------------------------------------------------                    
    def GetGameProfileAttributeList(self
        ) :
            return self.act.GetGameProfileAttributeList(
            )
        
    def GetGameProfileAttribute(self
    ) :
        for item in self.GetGameProfileAttributeList(
        ) :
            return item
        return None
    
    def CachedGetGameProfileAttributeList(self
    ) :
        return CachedGetGameProfileAttributeList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameProfileAttributeList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameProfileAttribute> objs;

        string method_name = "CachedGetGameProfileAttributeList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAttribute>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAttributeList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAttributeListByUuid(self
        , uuid
        ) :
            return self.act.GetGameProfileAttributeListByUuid(
                uuid
            )
        
    def GetGameProfileAttributeByUuid(self
        , uuid
    ) :
        for item in self.GetGameProfileAttributeListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameProfileAttributeListByUuid(self
        , uuid
    ) :
        return CachedGetGameProfileAttributeListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameProfileAttributeListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameProfileAttribute> objs;

        string method_name = "CachedGetGameProfileAttributeListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAttribute>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAttributeListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAttributeListByCode(self
        , code
        ) :
            return self.act.GetGameProfileAttributeListByCode(
                code
            )
        
    def GetGameProfileAttributeByCode(self
        , code
    ) :
        for item in self.GetGameProfileAttributeListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameProfileAttributeListByCode(self
        , code
    ) :
        return CachedGetGameProfileAttributeListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameProfileAttributeListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameProfileAttribute> objs;

        string method_name = "CachedGetGameProfileAttributeListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAttribute>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAttributeListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAttributeListByType(self
        , type
        ) :
            return self.act.GetGameProfileAttributeListByType(
                type
            )
        
    def GetGameProfileAttributeByType(self
        , type
    ) :
        for item in self.GetGameProfileAttributeListByType(
        type
        ) :
            return item
        return None
    
    def CachedGetGameProfileAttributeListByType(self
        , type
    ) :
        return CachedGetGameProfileAttributeListByType(
            false
            , self.CACHE_DEFAULT_HOURS
            , type
        )
        
    def CachedGetGameProfileAttributeListByType(self
        , overrideCache
        , cacheHours
        , type
    ) :
        pass
        """
        List<GameProfileAttribute> objs;

        string method_name = "CachedGetGameProfileAttributeListByType";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("type".ToLower());
        sb.Append("_");
        sb.Append(type);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAttribute>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAttributeListByType(
                type
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAttributeListByGroup(self
        , group
        ) :
            return self.act.GetGameProfileAttributeListByGroup(
                group
            )
        
    def GetGameProfileAttributeByGroup(self
        , group
    ) :
        for item in self.GetGameProfileAttributeListByGroup(
        group
        ) :
            return item
        return None
    
    def CachedGetGameProfileAttributeListByGroup(self
        , group
    ) :
        return CachedGetGameProfileAttributeListByGroup(
            false
            , self.CACHE_DEFAULT_HOURS
            , group
        )
        
    def CachedGetGameProfileAttributeListByGroup(self
        , overrideCache
        , cacheHours
        , group
    ) :
        pass
        """
        List<GameProfileAttribute> objs;

        string method_name = "CachedGetGameProfileAttributeListByGroup";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("group".ToLower());
        sb.Append("_");
        sb.Append(group);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAttribute>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAttributeListByGroup(
                group
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAttributeListByCodeByType(self
        , code
        , type
        ) :
            return self.act.GetGameProfileAttributeListByCodeByType(
                code
                , type
            )
        
    def GetGameProfileAttributeByCodeByType(self
        , code
        , type
    ) :
        for item in self.GetGameProfileAttributeListByCodeByType(
        code
        , type
        ) :
            return item
        return None
    
    def CachedGetGameProfileAttributeListByCodeByType(self
        , code
        , type
    ) :
        return CachedGetGameProfileAttributeListByCodeByType(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , type
        )
        
    def CachedGetGameProfileAttributeListByCodeByType(self
        , overrideCache
        , cacheHours
        , code
        , type
    ) :
        pass
        """
        List<GameProfileAttribute> objs;

        string method_name = "CachedGetGameProfileAttributeListByCodeByType";

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

        objs = CacheUtil.Get<List<GameProfileAttribute>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAttributeListByCodeByType(
                code
                , type
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAttributeListByGameIdByCode(self
        , game_id
        , code
        ) :
            return self.act.GetGameProfileAttributeListByGameIdByCode(
                game_id
                , code
            )
        
    def GetGameProfileAttributeByGameIdByCode(self
        , game_id
        , code
    ) :
        for item in self.GetGameProfileAttributeListByGameIdByCode(
        game_id
        , code
        ) :
            return item
        return None
    
    def CachedGetGameProfileAttributeListByGameIdByCode(self
        , game_id
        , code
    ) :
        return CachedGetGameProfileAttributeListByGameIdByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , code
        )
        
    def CachedGetGameProfileAttributeListByGameIdByCode(self
        , overrideCache
        , cacheHours
        , game_id
        , code
    ) :
        pass
        """
        List<GameProfileAttribute> objs;

        string method_name = "CachedGetGameProfileAttributeListByGameIdByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAttribute>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAttributeListByGameIdByCode(
                game_id
                , code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameProfileAttributeText(self
    ) :         
        return self.act.CountGameProfileAttributeText(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAttributeTextByUuid(self
        , uuid
    ) :         
        return self.act.CountGameProfileAttributeTextByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAttributeTextByProfileId(self
        , profile_id
    ) :         
        return self.act.CountGameProfileAttributeTextByProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAttributeTextByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :         
        return self.act.CountGameProfileAttributeTextByProfileIdByAttributeId(
        profile_id
        , attribute_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAttributeTextByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :         
        return self.act.CountGameProfileAttributeTextByGameIdByProfileId(
        game_id
        , profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAttributeTextByGameIdByProfileIdByAttributeId(self
        , game_id
        , profile_id
        , attribute_id
    ) :         
        return self.act.CountGameProfileAttributeTextByGameIdByProfileIdByAttributeId(
        game_id
        , profile_id
        , attribute_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameProfileAttributeTextListByFilter(self, filter_obj) :
        return self.act.BrowseGameProfileAttributeTextListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAttributeTextByUuidType(self, set_type, obj) :
        return self.act.SetGameProfileAttributeTextByUuid(set_type, obj)
               
    def SetGameProfileAttributeTextByUuid(self, obj) :
        return self.act.SetGameProfileAttributeTextByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAttributeTextByProfileIdType(self, set_type, obj) :
        return self.act.SetGameProfileAttributeTextByProfileId(set_type, obj)
               
    def SetGameProfileAttributeTextByProfileId(self, obj) :
        return self.act.SetGameProfileAttributeTextByProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAttributeTextByProfileIdByAttributeIdType(self, set_type, obj) :
        return self.act.SetGameProfileAttributeTextByProfileIdByAttributeId(set_type, obj)
               
    def SetGameProfileAttributeTextByProfileIdByAttributeId(self, obj) :
        return self.act.SetGameProfileAttributeTextByProfileIdByAttributeId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAttributeTextByGameIdByProfileIdType(self, set_type, obj) :
        return self.act.SetGameProfileAttributeTextByGameIdByProfileId(set_type, obj)
               
    def SetGameProfileAttributeTextByGameIdByProfileId(self, obj) :
        return self.act.SetGameProfileAttributeTextByGameIdByProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAttributeTextByGameIdByProfileIdByAttributeIdType(self, set_type, obj) :
        return self.act.SetGameProfileAttributeTextByGameIdByProfileIdByAttributeId(set_type, obj)
               
    def SetGameProfileAttributeTextByGameIdByProfileIdByAttributeId(self, obj) :
        return self.act.SetGameProfileAttributeTextByGameIdByProfileIdByAttributeId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameProfileAttributeTextByUuid(self
        , uuid
    ) :          
        return self.act.DelGameProfileAttributeTextByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileAttributeTextByProfileId(self
        , profile_id
    ) :          
        return self.act.DelGameProfileAttributeTextByProfileId(
        profile_id
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileAttributeTextByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :          
        return self.act.DelGameProfileAttributeTextByProfileIdByAttributeId(
        profile_id
        , attribute_id
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileAttributeTextByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :          
        return self.act.DelGameProfileAttributeTextByGameIdByProfileId(
        game_id
        , profile_id
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileAttributeTextByGameIdByProfileIdByAttributeId(self
        , game_id
        , profile_id
        , attribute_id
    ) :          
        return self.act.DelGameProfileAttributeTextByGameIdByProfileIdByAttributeId(
        game_id
        , profile_id
        , attribute_id
        )
#------------------------------------------------------------------------------                    
    def GetGameProfileAttributeTextListByUuid(self
        , uuid
        ) :
            return self.act.GetGameProfileAttributeTextListByUuid(
                uuid
            )
        
    def GetGameProfileAttributeTextByUuid(self
        , uuid
    ) :
        for item in self.GetGameProfileAttributeTextListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameProfileAttributeTextListByUuid(self
        , uuid
    ) :
        return CachedGetGameProfileAttributeTextListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameProfileAttributeTextListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameProfileAttributeText> objs;

        string method_name = "CachedGetGameProfileAttributeTextListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAttributeText>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAttributeTextListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAttributeTextListByProfileId(self
        , profile_id
        ) :
            return self.act.GetGameProfileAttributeTextListByProfileId(
                profile_id
            )
        
    def GetGameProfileAttributeTextByProfileId(self
        , profile_id
    ) :
        for item in self.GetGameProfileAttributeTextListByProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileAttributeTextListByProfileId(self
        , profile_id
    ) :
        return CachedGetGameProfileAttributeTextListByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetGameProfileAttributeTextListByProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<GameProfileAttributeText> objs;

        string method_name = "CachedGetGameProfileAttributeTextListByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAttributeText>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAttributeTextListByProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAttributeTextListByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
        ) :
            return self.act.GetGameProfileAttributeTextListByProfileIdByAttributeId(
                profile_id
                , attribute_id
            )
        
    def GetGameProfileAttributeTextByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :
        for item in self.GetGameProfileAttributeTextListByProfileIdByAttributeId(
        profile_id
        , attribute_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileAttributeTextListByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :
        return CachedGetGameProfileAttributeTextListByProfileIdByAttributeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , attribute_id
        )
        
    def CachedGetGameProfileAttributeTextListByProfileIdByAttributeId(self
        , overrideCache
        , cacheHours
        , profile_id
        , attribute_id
    ) :
        pass
        """
        List<GameProfileAttributeText> objs;

        string method_name = "CachedGetGameProfileAttributeTextListByProfileIdByAttributeId";

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

        objs = CacheUtil.Get<List<GameProfileAttributeText>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAttributeTextListByProfileIdByAttributeId(
                profile_id
                , attribute_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAttributeTextListByGameIdByProfileId(self
        , game_id
        , profile_id
        ) :
            return self.act.GetGameProfileAttributeTextListByGameIdByProfileId(
                game_id
                , profile_id
            )
        
    def GetGameProfileAttributeTextByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :
        for item in self.GetGameProfileAttributeTextListByGameIdByProfileId(
        game_id
        , profile_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileAttributeTextListByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :
        return CachedGetGameProfileAttributeTextListByGameIdByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , profile_id
        )
        
    def CachedGetGameProfileAttributeTextListByGameIdByProfileId(self
        , overrideCache
        , cacheHours
        , game_id
        , profile_id
    ) :
        pass
        """
        List<GameProfileAttributeText> objs;

        string method_name = "CachedGetGameProfileAttributeTextListByGameIdByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAttributeText>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAttributeTextListByGameIdByProfileId(
                game_id
                , profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAttributeTextListByGameIdByProfileIdByAttributeId(self
        , game_id
        , profile_id
        , attribute_id
        ) :
            return self.act.GetGameProfileAttributeTextListByGameIdByProfileIdByAttributeId(
                game_id
                , profile_id
                , attribute_id
            )
        
    def GetGameProfileAttributeTextByGameIdByProfileIdByAttributeId(self
        , game_id
        , profile_id
        , attribute_id
    ) :
        for item in self.GetGameProfileAttributeTextListByGameIdByProfileIdByAttributeId(
        game_id
        , profile_id
        , attribute_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileAttributeTextListByGameIdByProfileIdByAttributeId(self
        , game_id
        , profile_id
        , attribute_id
    ) :
        return CachedGetGameProfileAttributeTextListByGameIdByProfileIdByAttributeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , profile_id
            , attribute_id
        )
        
    def CachedGetGameProfileAttributeTextListByGameIdByProfileIdByAttributeId(self
        , overrideCache
        , cacheHours
        , game_id
        , profile_id
        , attribute_id
    ) :
        pass
        """
        List<GameProfileAttributeText> objs;

        string method_name = "CachedGetGameProfileAttributeTextListByGameIdByProfileIdByAttributeId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("attribute_id".ToLower());
        sb.Append("_");
        sb.Append(attribute_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAttributeText>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAttributeTextListByGameIdByProfileIdByAttributeId(
                game_id
                , profile_id
                , attribute_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameProfileAttributeData(self
    ) :         
        return self.act.CountGameProfileAttributeData(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAttributeDataByUuid(self
        , uuid
    ) :         
        return self.act.CountGameProfileAttributeDataByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAttributeDataByProfileId(self
        , profile_id
    ) :         
        return self.act.CountGameProfileAttributeDataByProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAttributeDataByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :         
        return self.act.CountGameProfileAttributeDataByProfileIdByAttributeId(
        profile_id
        , attribute_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAttributeDataByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :         
        return self.act.CountGameProfileAttributeDataByGameIdByProfileId(
        game_id
        , profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAttributeDataByGameIdByProfileIdByAttributeId(self
        , game_id
        , profile_id
        , attribute_id
    ) :         
        return self.act.CountGameProfileAttributeDataByGameIdByProfileIdByAttributeId(
        game_id
        , profile_id
        , attribute_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameProfileAttributeDataListByFilter(self, filter_obj) :
        return self.act.BrowseGameProfileAttributeDataListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAttributeDataByUuidType(self, set_type, obj) :
        return self.act.SetGameProfileAttributeDataByUuid(set_type, obj)
               
    def SetGameProfileAttributeDataByUuid(self, obj) :
        return self.act.SetGameProfileAttributeDataByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAttributeDataByProfileIdByAttributeIdType(self, set_type, obj) :
        return self.act.SetGameProfileAttributeDataByProfileIdByAttributeId(set_type, obj)
               
    def SetGameProfileAttributeDataByProfileIdByAttributeId(self, obj) :
        return self.act.SetGameProfileAttributeDataByProfileIdByAttributeId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAttributeDataByGameIdByProfileIdType(self, set_type, obj) :
        return self.act.SetGameProfileAttributeDataByGameIdByProfileId(set_type, obj)
               
    def SetGameProfileAttributeDataByGameIdByProfileId(self, obj) :
        return self.act.SetGameProfileAttributeDataByGameIdByProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAttributeDataByGameIdByProfileIdByAttributeIdType(self, set_type, obj) :
        return self.act.SetGameProfileAttributeDataByGameIdByProfileIdByAttributeId(set_type, obj)
               
    def SetGameProfileAttributeDataByGameIdByProfileIdByAttributeId(self, obj) :
        return self.act.SetGameProfileAttributeDataByGameIdByProfileIdByAttributeId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameProfileAttributeDataByUuid(self
        , uuid
    ) :          
        return self.act.DelGameProfileAttributeDataByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileAttributeDataByProfileId(self
        , profile_id
    ) :          
        return self.act.DelGameProfileAttributeDataByProfileId(
        profile_id
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileAttributeDataByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :          
        return self.act.DelGameProfileAttributeDataByProfileIdByAttributeId(
        profile_id
        , attribute_id
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileAttributeDataByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :          
        return self.act.DelGameProfileAttributeDataByGameIdByProfileId(
        game_id
        , profile_id
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileAttributeDataByGameIdByProfileIdByAttributeId(self
        , game_id
        , profile_id
        , attribute_id
    ) :          
        return self.act.DelGameProfileAttributeDataByGameIdByProfileIdByAttributeId(
        game_id
        , profile_id
        , attribute_id
        )
#------------------------------------------------------------------------------                    
    def GetGameProfileAttributeDataList(self
        ) :
            return self.act.GetGameProfileAttributeDataList(
            )
        
    def GetGameProfileAttributeData(self
    ) :
        for item in self.GetGameProfileAttributeDataList(
        ) :
            return item
        return None
    
    def CachedGetGameProfileAttributeDataList(self
    ) :
        return CachedGetGameProfileAttributeDataList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameProfileAttributeDataList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameProfileAttributeData> objs;

        string method_name = "CachedGetGameProfileAttributeDataList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAttributeData>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAttributeDataList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAttributeDataListByUuid(self
        , uuid
        ) :
            return self.act.GetGameProfileAttributeDataListByUuid(
                uuid
            )
        
    def GetGameProfileAttributeDataByUuid(self
        , uuid
    ) :
        for item in self.GetGameProfileAttributeDataListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameProfileAttributeDataListByUuid(self
        , uuid
    ) :
        return CachedGetGameProfileAttributeDataListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameProfileAttributeDataListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameProfileAttributeData> objs;

        string method_name = "CachedGetGameProfileAttributeDataListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAttributeData>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAttributeDataListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAttributeDataListByProfileId(self
        , profile_id
        ) :
            return self.act.GetGameProfileAttributeDataListByProfileId(
                profile_id
            )
        
    def GetGameProfileAttributeDataByProfileId(self
        , profile_id
    ) :
        for item in self.GetGameProfileAttributeDataListByProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileAttributeDataListByProfileId(self
        , profile_id
    ) :
        return CachedGetGameProfileAttributeDataListByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetGameProfileAttributeDataListByProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<GameProfileAttributeData> objs;

        string method_name = "CachedGetGameProfileAttributeDataListByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAttributeData>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAttributeDataListByProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAttributeDataListByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
        ) :
            return self.act.GetGameProfileAttributeDataListByProfileIdByAttributeId(
                profile_id
                , attribute_id
            )
        
    def GetGameProfileAttributeDataByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :
        for item in self.GetGameProfileAttributeDataListByProfileIdByAttributeId(
        profile_id
        , attribute_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileAttributeDataListByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :
        return CachedGetGameProfileAttributeDataListByProfileIdByAttributeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , attribute_id
        )
        
    def CachedGetGameProfileAttributeDataListByProfileIdByAttributeId(self
        , overrideCache
        , cacheHours
        , profile_id
        , attribute_id
    ) :
        pass
        """
        List<GameProfileAttributeData> objs;

        string method_name = "CachedGetGameProfileAttributeDataListByProfileIdByAttributeId";

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

        objs = CacheUtil.Get<List<GameProfileAttributeData>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAttributeDataListByProfileIdByAttributeId(
                profile_id
                , attribute_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAttributeDataListByGameIdByProfileId(self
        , game_id
        , profile_id
        ) :
            return self.act.GetGameProfileAttributeDataListByGameIdByProfileId(
                game_id
                , profile_id
            )
        
    def GetGameProfileAttributeDataByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :
        for item in self.GetGameProfileAttributeDataListByGameIdByProfileId(
        game_id
        , profile_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileAttributeDataListByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :
        return CachedGetGameProfileAttributeDataListByGameIdByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , profile_id
        )
        
    def CachedGetGameProfileAttributeDataListByGameIdByProfileId(self
        , overrideCache
        , cacheHours
        , game_id
        , profile_id
    ) :
        pass
        """
        List<GameProfileAttributeData> objs;

        string method_name = "CachedGetGameProfileAttributeDataListByGameIdByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAttributeData>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAttributeDataListByGameIdByProfileId(
                game_id
                , profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAttributeDataListByGameIdByProfileIdByAttributeId(self
        , game_id
        , profile_id
        , attribute_id
        ) :
            return self.act.GetGameProfileAttributeDataListByGameIdByProfileIdByAttributeId(
                game_id
                , profile_id
                , attribute_id
            )
        
    def GetGameProfileAttributeDataByGameIdByProfileIdByAttributeId(self
        , game_id
        , profile_id
        , attribute_id
    ) :
        for item in self.GetGameProfileAttributeDataListByGameIdByProfileIdByAttributeId(
        game_id
        , profile_id
        , attribute_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileAttributeDataListByGameIdByProfileIdByAttributeId(self
        , game_id
        , profile_id
        , attribute_id
    ) :
        return CachedGetGameProfileAttributeDataListByGameIdByProfileIdByAttributeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , profile_id
            , attribute_id
        )
        
    def CachedGetGameProfileAttributeDataListByGameIdByProfileIdByAttributeId(self
        , overrideCache
        , cacheHours
        , game_id
        , profile_id
        , attribute_id
    ) :
        pass
        """
        List<GameProfileAttributeData> objs;

        string method_name = "CachedGetGameProfileAttributeDataListByGameIdByProfileIdByAttributeId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("attribute_id".ToLower());
        sb.Append("_");
        sb.Append(attribute_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAttributeData>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAttributeDataListByGameIdByProfileIdByAttributeId(
                game_id
                , profile_id
                , attribute_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameNetwork(self
    ) :         
        return self.act.CountGameNetwork(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameNetworkByUuid(self
        , uuid
    ) :         
        return self.act.CountGameNetworkByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameNetworkByCode(self
        , code
    ) :         
        return self.act.CountGameNetworkByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameNetworkByUuidByType(self
        , uuid
        , type
    ) :         
        return self.act.CountGameNetworkByUuidByType(
        uuid
        , type
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameNetworkListByFilter(self, filter_obj) :
        return self.act.BrowseGameNetworkListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameNetworkByUuidType(self, set_type, obj) :
        return self.act.SetGameNetworkByUuid(set_type, obj)
               
    def SetGameNetworkByUuid(self, obj) :
        return self.act.SetGameNetworkByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameNetworkByCodeType(self, set_type, obj) :
        return self.act.SetGameNetworkByCode(set_type, obj)
               
    def SetGameNetworkByCode(self, obj) :
        return self.act.SetGameNetworkByCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameNetworkByUuid(self
        , uuid
    ) :          
        return self.act.DelGameNetworkByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetGameNetworkList(self
        ) :
            return self.act.GetGameNetworkList(
            )
        
    def GetGameNetwork(self
    ) :
        for item in self.GetGameNetworkList(
        ) :
            return item
        return None
    
    def CachedGetGameNetworkList(self
    ) :
        return CachedGetGameNetworkList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameNetworkList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameNetwork> objs;

        string method_name = "CachedGetGameNetworkList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameNetwork>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameNetworkList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameNetworkListByUuid(self
        , uuid
        ) :
            return self.act.GetGameNetworkListByUuid(
                uuid
            )
        
    def GetGameNetworkByUuid(self
        , uuid
    ) :
        for item in self.GetGameNetworkListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameNetworkListByUuid(self
        , uuid
    ) :
        return CachedGetGameNetworkListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameNetworkListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameNetwork> objs;

        string method_name = "CachedGetGameNetworkListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameNetwork>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameNetworkListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameNetworkListByCode(self
        , code
        ) :
            return self.act.GetGameNetworkListByCode(
                code
            )
        
    def GetGameNetworkByCode(self
        , code
    ) :
        for item in self.GetGameNetworkListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameNetworkListByCode(self
        , code
    ) :
        return CachedGetGameNetworkListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameNetworkListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameNetwork> objs;

        string method_name = "CachedGetGameNetworkListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameNetwork>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameNetworkListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameNetworkListByUuidByType(self
        , uuid
        , type
        ) :
            return self.act.GetGameNetworkListByUuidByType(
                uuid
                , type
            )
        
    def GetGameNetworkByUuidByType(self
        , uuid
        , type
    ) :
        for item in self.GetGameNetworkListByUuidByType(
        uuid
        , type
        ) :
            return item
        return None
    
    def CachedGetGameNetworkListByUuidByType(self
        , uuid
        , type
    ) :
        return CachedGetGameNetworkListByUuidByType(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
            , type
        )
        
    def CachedGetGameNetworkListByUuidByType(self
        , overrideCache
        , cacheHours
        , uuid
        , type
    ) :
        pass
        """
        List<GameNetwork> objs;

        string method_name = "CachedGetGameNetworkListByUuidByType";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);
        sb.Append("_");
        sb.Append("type".ToLower());
        sb.Append("_");
        sb.Append(type);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameNetwork>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameNetworkListByUuidByType(
                uuid
                , type
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameNetworkAuth(self
    ) :         
        return self.act.CountGameNetworkAuth(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameNetworkAuthByUuid(self
        , uuid
    ) :         
        return self.act.CountGameNetworkAuthByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameNetworkAuthByGameIdByGameNetworkId(self
        , game_id
        , game_network_id
    ) :         
        return self.act.CountGameNetworkAuthByGameIdByGameNetworkId(
        game_id
        , game_network_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameNetworkAuthListByFilter(self, filter_obj) :
        return self.act.BrowseGameNetworkAuthListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameNetworkAuthByUuidType(self, set_type, obj) :
        return self.act.SetGameNetworkAuthByUuid(set_type, obj)
               
    def SetGameNetworkAuthByUuid(self, obj) :
        return self.act.SetGameNetworkAuthByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameNetworkAuthByGameIdByGameNetworkIdType(self, set_type, obj) :
        return self.act.SetGameNetworkAuthByGameIdByGameNetworkId(set_type, obj)
               
    def SetGameNetworkAuthByGameIdByGameNetworkId(self, obj) :
        return self.act.SetGameNetworkAuthByGameIdByGameNetworkId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameNetworkAuthByUuid(self
        , uuid
    ) :          
        return self.act.DelGameNetworkAuthByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetGameNetworkAuthList(self
        ) :
            return self.act.GetGameNetworkAuthList(
            )
        
    def GetGameNetworkAuth(self
    ) :
        for item in self.GetGameNetworkAuthList(
        ) :
            return item
        return None
    
    def CachedGetGameNetworkAuthList(self
    ) :
        return CachedGetGameNetworkAuthList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameNetworkAuthList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameNetworkAuth> objs;

        string method_name = "CachedGetGameNetworkAuthList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameNetworkAuth>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameNetworkAuthList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameNetworkAuthListByUuid(self
        , uuid
        ) :
            return self.act.GetGameNetworkAuthListByUuid(
                uuid
            )
        
    def GetGameNetworkAuthByUuid(self
        , uuid
    ) :
        for item in self.GetGameNetworkAuthListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameNetworkAuthListByUuid(self
        , uuid
    ) :
        return CachedGetGameNetworkAuthListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameNetworkAuthListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameNetworkAuth> objs;

        string method_name = "CachedGetGameNetworkAuthListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameNetworkAuth>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameNetworkAuthListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameNetworkAuthListByGameIdByGameNetworkId(self
        , game_id
        , game_network_id
        ) :
            return self.act.GetGameNetworkAuthListByGameIdByGameNetworkId(
                game_id
                , game_network_id
            )
        
    def GetGameNetworkAuthByGameIdByGameNetworkId(self
        , game_id
        , game_network_id
    ) :
        for item in self.GetGameNetworkAuthListByGameIdByGameNetworkId(
        game_id
        , game_network_id
        ) :
            return item
        return None
    
    def CachedGetGameNetworkAuthListByGameIdByGameNetworkId(self
        , game_id
        , game_network_id
    ) :
        return CachedGetGameNetworkAuthListByGameIdByGameNetworkId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , game_network_id
        )
        
    def CachedGetGameNetworkAuthListByGameIdByGameNetworkId(self
        , overrideCache
        , cacheHours
        , game_id
        , game_network_id
    ) :
        pass
        """
        List<GameNetworkAuth> objs;

        string method_name = "CachedGetGameNetworkAuthListByGameIdByGameNetworkId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("game_network_id".ToLower());
        sb.Append("_");
        sb.Append(game_network_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameNetworkAuth>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameNetworkAuthListByGameIdByGameNetworkId(
                game_id
                , game_network_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountProfileGameNetwork(self
    ) :         
        return self.act.CountProfileGameNetwork(
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameNetworkByUuid(self
        , uuid
    ) :         
        return self.act.CountProfileGameNetworkByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameNetworkByGameId(self
        , game_id
    ) :         
        return self.act.CountProfileGameNetworkByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameNetworkByProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileGameNetworkByProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameNetworkByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountProfileGameNetworkByProfileIdByGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameNetworkByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountProfileGameNetworkByProfileIdByGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameNetworkByProfileIdByGameIdByGameNetworkId(self
        , profile_id
        , game_id
        , game_network_id
    ) :         
        return self.act.CountProfileGameNetworkByProfileIdByGameIdByGameNetworkId(
        profile_id
        , game_id
        , game_network_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(self
        , network_username
        , game_id
        , game_network_id
    ) :         
        return self.act.CountProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(
        network_username
        , game_id
        , game_network_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileGameNetworkListByFilter(self, filter_obj) :
        return self.act.BrowseProfileGameNetworkListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameNetworkByUuidType(self, set_type, obj) :
        return self.act.SetProfileGameNetworkByUuid(set_type, obj)
               
    def SetProfileGameNetworkByUuid(self, obj) :
        return self.act.SetProfileGameNetworkByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameNetworkByProfileIdByGameIdType(self, set_type, obj) :
        return self.act.SetProfileGameNetworkByProfileIdByGameId(set_type, obj)
               
    def SetProfileGameNetworkByProfileIdByGameId(self, obj) :
        return self.act.SetProfileGameNetworkByProfileIdByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameNetworkByProfileIdByGameIdByGameNetworkIdType(self, set_type, obj) :
        return self.act.SetProfileGameNetworkByProfileIdByGameIdByGameNetworkId(set_type, obj)
               
    def SetProfileGameNetworkByProfileIdByGameIdByGameNetworkId(self, obj) :
        return self.act.SetProfileGameNetworkByProfileIdByGameIdByGameNetworkId('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkIdType(self, set_type, obj) :
        return self.act.SetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(set_type, obj)
               
    def SetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(self, obj) :
        return self.act.SetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileGameNetworkByUuid(self
        , uuid
    ) :          
        return self.act.DelProfileGameNetworkByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileGameNetworkByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :          
        return self.act.DelProfileGameNetworkByProfileIdByGameId(
        profile_id
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelProfileGameNetworkByProfileIdByGameIdByGameNetworkId(self
        , profile_id
        , game_id
        , game_network_id
    ) :          
        return self.act.DelProfileGameNetworkByProfileIdByGameIdByGameNetworkId(
        profile_id
        , game_id
        , game_network_id
        )
#------------------------------------------------------------------------------                    
    def DelProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(self
        , network_username
        , game_id
        , game_network_id
    ) :          
        return self.act.DelProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(
        network_username
        , game_id
        , game_network_id
        )
#------------------------------------------------------------------------------                    
    def GetProfileGameNetworkList(self
        ) :
            return self.act.GetProfileGameNetworkList(
            )
        
    def GetProfileGameNetwork(self
    ) :
        for item in self.GetProfileGameNetworkList(
        ) :
            return item
        return None
    
    def CachedGetProfileGameNetworkList(self
    ) :
        return CachedGetProfileGameNetworkList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetProfileGameNetworkList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<ProfileGameNetwork> objs;

        string method_name = "CachedGetProfileGameNetworkList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileGameNetwork>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileGameNetworkList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameNetworkListByUuid(self
        , uuid
        ) :
            return self.act.GetProfileGameNetworkListByUuid(
                uuid
            )
        
    def GetProfileGameNetworkByUuid(self
        , uuid
    ) :
        for item in self.GetProfileGameNetworkListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileGameNetworkListByUuid(self
        , uuid
    ) :
        return CachedGetProfileGameNetworkListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileGameNetworkListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileGameNetwork> objs;

        string method_name = "CachedGetProfileGameNetworkListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileGameNetwork>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileGameNetworkListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameNetworkListByGameId(self
        , game_id
        ) :
            return self.act.GetProfileGameNetworkListByGameId(
                game_id
            )
        
    def GetProfileGameNetworkByGameId(self
        , game_id
    ) :
        for item in self.GetProfileGameNetworkListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameNetworkListByGameId(self
        , game_id
    ) :
        return CachedGetProfileGameNetworkListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetProfileGameNetworkListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<ProfileGameNetwork> objs;

        string method_name = "CachedGetProfileGameNetworkListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileGameNetwork>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileGameNetworkListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameNetworkListByProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileGameNetworkListByProfileId(
                profile_id
            )
        
    def GetProfileGameNetworkByProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileGameNetworkListByProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameNetworkListByProfileId(self
        , profile_id
    ) :
        return CachedGetProfileGameNetworkListByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileGameNetworkListByProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileGameNetwork> objs;

        string method_name = "CachedGetProfileGameNetworkListByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileGameNetwork>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileGameNetworkListByProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameNetworkListByProfileIdByGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetProfileGameNetworkListByProfileIdByGameId(
                profile_id
                , game_id
            )
        
    def GetProfileGameNetworkByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetProfileGameNetworkListByProfileIdByGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameNetworkListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetProfileGameNetworkListByProfileIdByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetProfileGameNetworkListByProfileIdByGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<ProfileGameNetwork> objs;

        string method_name = "CachedGetProfileGameNetworkListByProfileIdByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileGameNetwork>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileGameNetworkListByProfileIdByGameId(
                profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(self
        , profile_id
        , game_id
        , game_network_id
        ) :
            return self.act.GetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
                profile_id
                , game_id
                , game_network_id
            )
        
    def GetProfileGameNetworkByProfileIdByGameIdByGameNetworkId(self
        , profile_id
        , game_id
        , game_network_id
    ) :
        for item in self.GetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
        profile_id
        , game_id
        , game_network_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(self
        , profile_id
        , game_id
        , game_network_id
    ) :
        return CachedGetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
            , game_network_id
        )
        
    def CachedGetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
        , game_network_id
    ) :
        pass
        """
        List<ProfileGameNetwork> objs;

        string method_name = "CachedGetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("game_network_id".ToLower());
        sb.Append("_");
        sb.Append(game_network_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileGameNetwork>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
                profile_id
                , game_id
                , game_network_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(self
        , network_username
        , game_id
        , game_network_id
        ) :
            return self.act.GetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
                network_username
                , game_id
                , game_network_id
            )
        
    def GetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(self
        , network_username
        , game_id
        , game_network_id
    ) :
        for item in self.GetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
        network_username
        , game_id
        , game_network_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(self
        , network_username
        , game_id
        , game_network_id
    ) :
        return CachedGetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
            false
            , self.CACHE_DEFAULT_HOURS
            , network_username
            , game_id
            , game_network_id
        )
        
    def CachedGetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(self
        , overrideCache
        , cacheHours
        , network_username
        , game_id
        , game_network_id
    ) :
        pass
        """
        List<ProfileGameNetwork> objs;

        string method_name = "CachedGetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("network_username".ToLower());
        sb.Append("_");
        sb.Append(network_username);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("game_network_id".ToLower());
        sb.Append("_");
        sb.Append(game_network_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileGameNetwork>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
                network_username
                , game_id
                , game_network_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountProfileGameDataAttribute(self
    ) :         
        return self.act.CountProfileGameDataAttribute(
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameDataAttributeByUuid(self
        , uuid
    ) :         
        return self.act.CountProfileGameDataAttributeByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameDataAttributeByProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileGameDataAttributeByProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameDataAttributeByProfileIdByGameIdByCode(self
        , profile_id
        , game_id
        , code
    ) :         
        return self.act.CountProfileGameDataAttributeByProfileIdByGameIdByCode(
        profile_id
        , game_id
        , code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileGameDataAttributeListByFilter(self, filter_obj) :
        return self.act.BrowseProfileGameDataAttributeListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameDataAttributeByUuidType(self, set_type, obj) :
        return self.act.SetProfileGameDataAttributeByUuid(set_type, obj)
               
    def SetProfileGameDataAttributeByUuid(self, obj) :
        return self.act.SetProfileGameDataAttributeByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameDataAttributeByProfileIdType(self, set_type, obj) :
        return self.act.SetProfileGameDataAttributeByProfileId(set_type, obj)
               
    def SetProfileGameDataAttributeByProfileId(self, obj) :
        return self.act.SetProfileGameDataAttributeByProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameDataAttributeByProfileIdByGameIdByCodeType(self, set_type, obj) :
        return self.act.SetProfileGameDataAttributeByProfileIdByGameIdByCode(set_type, obj)
               
    def SetProfileGameDataAttributeByProfileIdByGameIdByCode(self, obj) :
        return self.act.SetProfileGameDataAttributeByProfileIdByGameIdByCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileGameDataAttributeByUuid(self
        , uuid
    ) :          
        return self.act.DelProfileGameDataAttributeByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileGameDataAttributeByProfileId(self
        , profile_id
    ) :          
        return self.act.DelProfileGameDataAttributeByProfileId(
        profile_id
        )
#------------------------------------------------------------------------------                    
    def DelProfileGameDataAttributeByProfileIdByGameIdByCode(self
        , profile_id
        , game_id
        , code
    ) :          
        return self.act.DelProfileGameDataAttributeByProfileIdByGameIdByCode(
        profile_id
        , game_id
        , code
        )
#------------------------------------------------------------------------------                    
    def GetProfileGameDataAttributeListByUuid(self
        , uuid
        ) :
            return self.act.GetProfileGameDataAttributeListByUuid(
                uuid
            )
        
    def GetProfileGameDataAttributeByUuid(self
        , uuid
    ) :
        for item in self.GetProfileGameDataAttributeListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileGameDataAttributeListByUuid(self
        , uuid
    ) :
        return CachedGetProfileGameDataAttributeListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileGameDataAttributeListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileGameDataAttribute> objs;

        string method_name = "CachedGetProfileGameDataAttributeListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileGameDataAttribute>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileGameDataAttributeListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameDataAttributeListByProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileGameDataAttributeListByProfileId(
                profile_id
            )
        
    def GetProfileGameDataAttributeByProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileGameDataAttributeListByProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameDataAttributeListByProfileId(self
        , profile_id
    ) :
        return CachedGetProfileGameDataAttributeListByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileGameDataAttributeListByProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileGameDataAttribute> objs;

        string method_name = "CachedGetProfileGameDataAttributeListByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileGameDataAttribute>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileGameDataAttributeListByProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameDataAttributeListByProfileIdByGameIdByCode(self
        , profile_id
        , game_id
        , code
        ) :
            return self.act.GetProfileGameDataAttributeListByProfileIdByGameIdByCode(
                profile_id
                , game_id
                , code
            )
        
    def GetProfileGameDataAttributeByProfileIdByGameIdByCode(self
        , profile_id
        , game_id
        , code
    ) :
        for item in self.GetProfileGameDataAttributeListByProfileIdByGameIdByCode(
        profile_id
        , game_id
        , code
        ) :
            return item
        return None
    
    def CachedGetProfileGameDataAttributeListByProfileIdByGameIdByCode(self
        , profile_id
        , game_id
        , code
    ) :
        return CachedGetProfileGameDataAttributeListByProfileIdByGameIdByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
            , code
        )
        
    def CachedGetProfileGameDataAttributeListByProfileIdByGameIdByCode(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
        , code
    ) :
        pass
        """
        List<ProfileGameDataAttribute> objs;

        string method_name = "CachedGetProfileGameDataAttributeListByProfileIdByGameIdByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileGameDataAttribute>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileGameDataAttributeListByProfileIdByGameIdByCode(
                profile_id
                , game_id
                , code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameSession(self
    ) :         
        return self.act.CountGameSession(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameSessionByUuid(self
        , uuid
    ) :         
        return self.act.CountGameSessionByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameSessionByGameId(self
        , game_id
    ) :         
        return self.act.CountGameSessionByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameSessionByProfileId(self
        , profile_id
    ) :         
        return self.act.CountGameSessionByProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameSessionByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameSessionByProfileIdByGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameSessionListByFilter(self, filter_obj) :
        return self.act.BrowseGameSessionListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameSessionByUuidType(self, set_type, obj) :
        return self.act.SetGameSessionByUuid(set_type, obj)
               
    def SetGameSessionByUuid(self, obj) :
        return self.act.SetGameSessionByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameSessionByUuid(self
        , uuid
    ) :          
        return self.act.DelGameSessionByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetGameSessionList(self
        ) :
            return self.act.GetGameSessionList(
            )
        
    def GetGameSession(self
    ) :
        for item in self.GetGameSessionList(
        ) :
            return item
        return None
    
    def CachedGetGameSessionList(self
    ) :
        return CachedGetGameSessionList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameSessionList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameSession> objs;

        string method_name = "CachedGetGameSessionList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameSession>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameSessionList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameSessionListByUuid(self
        , uuid
        ) :
            return self.act.GetGameSessionListByUuid(
                uuid
            )
        
    def GetGameSessionByUuid(self
        , uuid
    ) :
        for item in self.GetGameSessionListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameSessionListByUuid(self
        , uuid
    ) :
        return CachedGetGameSessionListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameSessionListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameSession> objs;

        string method_name = "CachedGetGameSessionListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameSession>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameSessionListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameSessionListByGameId(self
        , game_id
        ) :
            return self.act.GetGameSessionListByGameId(
                game_id
            )
        
    def GetGameSessionByGameId(self
        , game_id
    ) :
        for item in self.GetGameSessionListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameSessionListByGameId(self
        , game_id
    ) :
        return CachedGetGameSessionListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameSessionListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameSession> objs;

        string method_name = "CachedGetGameSessionListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameSession>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameSessionListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameSessionListByProfileId(self
        , profile_id
        ) :
            return self.act.GetGameSessionListByProfileId(
                profile_id
            )
        
    def GetGameSessionByProfileId(self
        , profile_id
    ) :
        for item in self.GetGameSessionListByProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetGameSessionListByProfileId(self
        , profile_id
    ) :
        return CachedGetGameSessionListByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetGameSessionListByProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<GameSession> objs;

        string method_name = "CachedGetGameSessionListByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameSession>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameSessionListByProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameSessionListByProfileIdByGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetGameSessionListByProfileIdByGameId(
                profile_id
                , game_id
            )
        
    def GetGameSessionByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetGameSessionListByProfileIdByGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameSessionListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetGameSessionListByProfileIdByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetGameSessionListByProfileIdByGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameSession> objs;

        string method_name = "CachedGetGameSessionListByProfileIdByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameSession>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameSessionListByProfileIdByGameId(
                profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameSessionData(self
    ) :         
        return self.act.CountGameSessionData(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameSessionDataByUuid(self
        , uuid
    ) :         
        return self.act.CountGameSessionDataByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameSessionDataListByFilter(self, filter_obj) :
        return self.act.BrowseGameSessionDataListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameSessionDataByUuidType(self, set_type, obj) :
        return self.act.SetGameSessionDataByUuid(set_type, obj)
               
    def SetGameSessionDataByUuid(self, obj) :
        return self.act.SetGameSessionDataByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameSessionDataByUuid(self
        , uuid
    ) :          
        return self.act.DelGameSessionDataByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetGameSessionDataList(self
        ) :
            return self.act.GetGameSessionDataList(
            )
        
    def GetGameSessionData(self
    ) :
        for item in self.GetGameSessionDataList(
        ) :
            return item
        return None
    
    def CachedGetGameSessionDataList(self
    ) :
        return CachedGetGameSessionDataList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameSessionDataList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameSessionData> objs;

        string method_name = "CachedGetGameSessionDataList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameSessionData>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameSessionDataList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameSessionDataListByUuid(self
        , uuid
        ) :
            return self.act.GetGameSessionDataListByUuid(
                uuid
            )
        
    def GetGameSessionDataByUuid(self
        , uuid
    ) :
        for item in self.GetGameSessionDataListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameSessionDataListByUuid(self
        , uuid
    ) :
        return CachedGetGameSessionDataListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameSessionDataListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameSessionData> objs;

        string method_name = "CachedGetGameSessionDataListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameSessionData>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameSessionDataListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameContent(self
    ) :         
        return self.act.CountGameContent(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameContentByUuid(self
        , uuid
    ) :         
        return self.act.CountGameContentByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameContentByGameId(self
        , game_id
    ) :         
        return self.act.CountGameContentByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameContentByGameIdByPath(self
        , game_id
        , path
    ) :         
        return self.act.CountGameContentByGameIdByPath(
        game_id
        , path
        )
        
#------------------------------------------------------------------------------                    
    def CountGameContentByGameIdByPathByVersion(self
        , game_id
        , path
        , version
    ) :         
        return self.act.CountGameContentByGameIdByPathByVersion(
        game_id
        , path
        , version
        )
        
#------------------------------------------------------------------------------                    
    def CountGameContentByGameIdByPathByVersionByPlatformByIncrement(self
        , game_id
        , path
        , version
        , platform
        , increment
    ) :         
        return self.act.CountGameContentByGameIdByPathByVersionByPlatformByIncrement(
        game_id
        , path
        , version
        , platform
        , increment
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameContentListByFilter(self, filter_obj) :
        return self.act.BrowseGameContentListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameContentByUuidType(self, set_type, obj) :
        return self.act.SetGameContentByUuid(set_type, obj)
               
    def SetGameContentByUuid(self, obj) :
        return self.act.SetGameContentByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameContentByGameIdType(self, set_type, obj) :
        return self.act.SetGameContentByGameId(set_type, obj)
               
    def SetGameContentByGameId(self, obj) :
        return self.act.SetGameContentByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameContentByGameIdByPathType(self, set_type, obj) :
        return self.act.SetGameContentByGameIdByPath(set_type, obj)
               
    def SetGameContentByGameIdByPath(self, obj) :
        return self.act.SetGameContentByGameIdByPath('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameContentByGameIdByPathByVersionType(self, set_type, obj) :
        return self.act.SetGameContentByGameIdByPathByVersion(set_type, obj)
               
    def SetGameContentByGameIdByPathByVersion(self, obj) :
        return self.act.SetGameContentByGameIdByPathByVersion('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameContentByGameIdByPathByVersionByPlatformByIncrementType(self, set_type, obj) :
        return self.act.SetGameContentByGameIdByPathByVersionByPlatformByIncrement(set_type, obj)
               
    def SetGameContentByGameIdByPathByVersionByPlatformByIncrement(self, obj) :
        return self.act.SetGameContentByGameIdByPathByVersionByPlatformByIncrement('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameContentByUuid(self
        , uuid
    ) :          
        return self.act.DelGameContentByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameContentByGameId(self
        , game_id
    ) :          
        return self.act.DelGameContentByGameId(
        game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameContentByGameIdByPath(self
        , game_id
        , path
    ) :          
        return self.act.DelGameContentByGameIdByPath(
        game_id
        , path
        )
#------------------------------------------------------------------------------                    
    def DelGameContentByGameIdByPathByVersion(self
        , game_id
        , path
        , version
    ) :          
        return self.act.DelGameContentByGameIdByPathByVersion(
        game_id
        , path
        , version
        )
#------------------------------------------------------------------------------                    
    def DelGameContentByGameIdByPathByVersionByPlatformByIncrement(self
        , game_id
        , path
        , version
        , platform
        , increment
    ) :          
        return self.act.DelGameContentByGameIdByPathByVersionByPlatformByIncrement(
        game_id
        , path
        , version
        , platform
        , increment
        )
#------------------------------------------------------------------------------                    
    def GetGameContentList(self
        ) :
            return self.act.GetGameContentList(
            )
        
    def GetGameContent(self
    ) :
        for item in self.GetGameContentList(
        ) :
            return item
        return None
    
    def CachedGetGameContentList(self
    ) :
        return CachedGetGameContentList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameContentList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameContent> objs;

        string method_name = "CachedGetGameContentList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameContent>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameContentList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameContentListByUuid(self
        , uuid
        ) :
            return self.act.GetGameContentListByUuid(
                uuid
            )
        
    def GetGameContentByUuid(self
        , uuid
    ) :
        for item in self.GetGameContentListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameContentListByUuid(self
        , uuid
    ) :
        return CachedGetGameContentListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameContentListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameContent> objs;

        string method_name = "CachedGetGameContentListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameContent>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameContentListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameContentListByGameId(self
        , game_id
        ) :
            return self.act.GetGameContentListByGameId(
                game_id
            )
        
    def GetGameContentByGameId(self
        , game_id
    ) :
        for item in self.GetGameContentListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameContentListByGameId(self
        , game_id
    ) :
        return CachedGetGameContentListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameContentListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameContent> objs;

        string method_name = "CachedGetGameContentListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameContent>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameContentListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameContentListByGameIdByPath(self
        , game_id
        , path
        ) :
            return self.act.GetGameContentListByGameIdByPath(
                game_id
                , path
            )
        
    def GetGameContentByGameIdByPath(self
        , game_id
        , path
    ) :
        for item in self.GetGameContentListByGameIdByPath(
        game_id
        , path
        ) :
            return item
        return None
    
    def CachedGetGameContentListByGameIdByPath(self
        , game_id
        , path
    ) :
        return CachedGetGameContentListByGameIdByPath(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , path
        )
        
    def CachedGetGameContentListByGameIdByPath(self
        , overrideCache
        , cacheHours
        , game_id
        , path
    ) :
        pass
        """
        List<GameContent> objs;

        string method_name = "CachedGetGameContentListByGameIdByPath";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("path".ToLower());
        sb.Append("_");
        sb.Append(path);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameContent>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameContentListByGameIdByPath(
                game_id
                , path
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameContentListByGameIdByPathByVersion(self
        , game_id
        , path
        , version
        ) :
            return self.act.GetGameContentListByGameIdByPathByVersion(
                game_id
                , path
                , version
            )
        
    def GetGameContentByGameIdByPathByVersion(self
        , game_id
        , path
        , version
    ) :
        for item in self.GetGameContentListByGameIdByPathByVersion(
        game_id
        , path
        , version
        ) :
            return item
        return None
    
    def CachedGetGameContentListByGameIdByPathByVersion(self
        , game_id
        , path
        , version
    ) :
        return CachedGetGameContentListByGameIdByPathByVersion(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , path
            , version
        )
        
    def CachedGetGameContentListByGameIdByPathByVersion(self
        , overrideCache
        , cacheHours
        , game_id
        , path
        , version
    ) :
        pass
        """
        List<GameContent> objs;

        string method_name = "CachedGetGameContentListByGameIdByPathByVersion";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("path".ToLower());
        sb.Append("_");
        sb.Append(path);
        sb.Append("_");
        sb.Append("version".ToLower());
        sb.Append("_");
        sb.Append(version);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameContent>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameContentListByGameIdByPathByVersion(
                game_id
                , path
                , version
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(self
        , game_id
        , path
        , version
        , platform
        , increment
        ) :
            return self.act.GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
                game_id
                , path
                , version
                , platform
                , increment
            )
        
    def GetGameContentByGameIdByPathByVersionByPlatformByIncrement(self
        , game_id
        , path
        , version
        , platform
        , increment
    ) :
        for item in self.GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
        game_id
        , path
        , version
        , platform
        , increment
        ) :
            return item
        return None
    
    def CachedGetGameContentListByGameIdByPathByVersionByPlatformByIncrement(self
        , game_id
        , path
        , version
        , platform
        , increment
    ) :
        return CachedGetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , path
            , version
            , platform
            , increment
        )
        
    def CachedGetGameContentListByGameIdByPathByVersionByPlatformByIncrement(self
        , overrideCache
        , cacheHours
        , game_id
        , path
        , version
        , platform
        , increment
    ) :
        pass
        """
        List<GameContent> objs;

        string method_name = "CachedGetGameContentListByGameIdByPathByVersionByPlatformByIncrement";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("path".ToLower());
        sb.Append("_");
        sb.Append(path);
        sb.Append("_");
        sb.Append("version".ToLower());
        sb.Append("_");
        sb.Append(version);
        sb.Append("_");
        sb.Append("platform".ToLower());
        sb.Append("_");
        sb.Append(platform);
        sb.Append("_");
        sb.Append("increment".ToLower());
        sb.Append("_");
        sb.Append(increment);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameContent>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
                game_id
                , path
                , version
                , platform
                , increment
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameProfileContent(self
    ) :         
        return self.act.CountGameProfileContent(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileContentByUuid(self
        , uuid
    ) :         
        return self.act.CountGameProfileContentByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileContentByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :         
        return self.act.CountGameProfileContentByGameIdByProfileId(
        game_id
        , profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileContentByGameIdByUsername(self
        , game_id
        , username
    ) :         
        return self.act.CountGameProfileContentByGameIdByUsername(
        game_id
        , username
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileContentByUsername(self
        , username
    ) :         
        return self.act.CountGameProfileContentByUsername(
        username
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileContentByGameIdByProfileIdByPath(self
        , game_id
        , profile_id
        , path
    ) :         
        return self.act.CountGameProfileContentByGameIdByProfileIdByPath(
        game_id
        , profile_id
        , path
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileContentByGameIdByProfileIdByPathByVersion(self
        , game_id
        , profile_id
        , path
        , version
    ) :         
        return self.act.CountGameProfileContentByGameIdByProfileIdByPathByVersion(
        game_id
        , profile_id
        , path
        , version
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(self
        , game_id
        , profile_id
        , path
        , version
        , platform
        , increment
    ) :         
        return self.act.CountGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
        game_id
        , profile_id
        , path
        , version
        , platform
        , increment
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileContentByGameIdByUsernameByPath(self
        , game_id
        , username
        , path
    ) :         
        return self.act.CountGameProfileContentByGameIdByUsernameByPath(
        game_id
        , username
        , path
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileContentByGameIdByUsernameByPathByVersion(self
        , game_id
        , username
        , path
        , version
    ) :         
        return self.act.CountGameProfileContentByGameIdByUsernameByPathByVersion(
        game_id
        , username
        , path
        , version
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(self
        , game_id
        , username
        , path
        , version
        , platform
        , increment
    ) :         
        return self.act.CountGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
        game_id
        , username
        , path
        , version
        , platform
        , increment
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameProfileContentListByFilter(self, filter_obj) :
        return self.act.BrowseGameProfileContentListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentByUuidType(self, set_type, obj) :
        return self.act.SetGameProfileContentByUuid(set_type, obj)
               
    def SetGameProfileContentByUuid(self, obj) :
        return self.act.SetGameProfileContentByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentByGameIdByProfileIdType(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByProfileId(set_type, obj)
               
    def SetGameProfileContentByGameIdByProfileId(self, obj) :
        return self.act.SetGameProfileContentByGameIdByProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentByGameIdByUsernameType(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByUsername(set_type, obj)
               
    def SetGameProfileContentByGameIdByUsername(self, obj) :
        return self.act.SetGameProfileContentByGameIdByUsername('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentByUsernameType(self, set_type, obj) :
        return self.act.SetGameProfileContentByUsername(set_type, obj)
               
    def SetGameProfileContentByUsername(self, obj) :
        return self.act.SetGameProfileContentByUsername('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentByGameIdByProfileIdByPathType(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByProfileIdByPath(set_type, obj)
               
    def SetGameProfileContentByGameIdByProfileIdByPath(self, obj) :
        return self.act.SetGameProfileContentByGameIdByProfileIdByPath('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentByGameIdByProfileIdByPathByVersionType(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByProfileIdByPathByVersion(set_type, obj)
               
    def SetGameProfileContentByGameIdByProfileIdByPathByVersion(self, obj) :
        return self.act.SetGameProfileContentByGameIdByProfileIdByPathByVersion('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrementType(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(set_type, obj)
               
    def SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(self, obj) :
        return self.act.SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentByGameIdByUsernameByPathType(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByUsernameByPath(set_type, obj)
               
    def SetGameProfileContentByGameIdByUsernameByPath(self, obj) :
        return self.act.SetGameProfileContentByGameIdByUsernameByPath('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentByGameIdByUsernameByPathByVersionType(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByUsernameByPathByVersion(set_type, obj)
               
    def SetGameProfileContentByGameIdByUsernameByPathByVersion(self, obj) :
        return self.act.SetGameProfileContentByGameIdByUsernameByPathByVersion('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrementType(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(set_type, obj)
               
    def SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(self, obj) :
        return self.act.SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameProfileContentByUuid(self
        , uuid
    ) :          
        return self.act.DelGameProfileContentByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileContentByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :          
        return self.act.DelGameProfileContentByGameIdByProfileId(
        game_id
        , profile_id
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileContentByGameIdByUsername(self
        , game_id
        , username
    ) :          
        return self.act.DelGameProfileContentByGameIdByUsername(
        game_id
        , username
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileContentByUsername(self
        , username
    ) :          
        return self.act.DelGameProfileContentByUsername(
        username
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileContentByGameIdByProfileIdByPath(self
        , game_id
        , profile_id
        , path
    ) :          
        return self.act.DelGameProfileContentByGameIdByProfileIdByPath(
        game_id
        , profile_id
        , path
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileContentByGameIdByProfileIdByPathByVersion(self
        , game_id
        , profile_id
        , path
        , version
    ) :          
        return self.act.DelGameProfileContentByGameIdByProfileIdByPathByVersion(
        game_id
        , profile_id
        , path
        , version
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(self
        , game_id
        , profile_id
        , path
        , version
        , platform
        , increment
    ) :          
        return self.act.DelGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
        game_id
        , profile_id
        , path
        , version
        , platform
        , increment
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileContentByGameIdByUsernameByPath(self
        , game_id
        , username
        , path
    ) :          
        return self.act.DelGameProfileContentByGameIdByUsernameByPath(
        game_id
        , username
        , path
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileContentByGameIdByUsernameByPathByVersion(self
        , game_id
        , username
        , path
        , version
    ) :          
        return self.act.DelGameProfileContentByGameIdByUsernameByPathByVersion(
        game_id
        , username
        , path
        , version
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(self
        , game_id
        , username
        , path
        , version
        , platform
        , increment
    ) :          
        return self.act.DelGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
        game_id
        , username
        , path
        , version
        , platform
        , increment
        )
#------------------------------------------------------------------------------                    
    def GetGameProfileContentList(self
        ) :
            return self.act.GetGameProfileContentList(
            )
        
    def GetGameProfileContent(self
    ) :
        for item in self.GetGameProfileContentList(
        ) :
            return item
        return None
    
    def CachedGetGameProfileContentList(self
    ) :
        return CachedGetGameProfileContentList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameProfileContentList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameProfileContent> objs;

        string method_name = "CachedGetGameProfileContentList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileContentList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileContentListByUuid(self
        , uuid
        ) :
            return self.act.GetGameProfileContentListByUuid(
                uuid
            )
        
    def GetGameProfileContentByUuid(self
        , uuid
    ) :
        for item in self.GetGameProfileContentListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameProfileContentListByUuid(self
        , uuid
    ) :
        return CachedGetGameProfileContentListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameProfileContentListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameProfileContent> objs;

        string method_name = "CachedGetGameProfileContentListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileContentListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileContentListByGameIdByProfileId(self
        , game_id
        , profile_id
        ) :
            return self.act.GetGameProfileContentListByGameIdByProfileId(
                game_id
                , profile_id
            )
        
    def GetGameProfileContentByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :
        for item in self.GetGameProfileContentListByGameIdByProfileId(
        game_id
        , profile_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileContentListByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :
        return CachedGetGameProfileContentListByGameIdByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , profile_id
        )
        
    def CachedGetGameProfileContentListByGameIdByProfileId(self
        , overrideCache
        , cacheHours
        , game_id
        , profile_id
    ) :
        pass
        """
        List<GameProfileContent> objs;

        string method_name = "CachedGetGameProfileContentListByGameIdByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileContentListByGameIdByProfileId(
                game_id
                , profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileContentListByGameIdByUsername(self
        , game_id
        , username
        ) :
            return self.act.GetGameProfileContentListByGameIdByUsername(
                game_id
                , username
            )
        
    def GetGameProfileContentByGameIdByUsername(self
        , game_id
        , username
    ) :
        for item in self.GetGameProfileContentListByGameIdByUsername(
        game_id
        , username
        ) :
            return item
        return None
    
    def CachedGetGameProfileContentListByGameIdByUsername(self
        , game_id
        , username
    ) :
        return CachedGetGameProfileContentListByGameIdByUsername(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , username
        )
        
    def CachedGetGameProfileContentListByGameIdByUsername(self
        , overrideCache
        , cacheHours
        , game_id
        , username
    ) :
        pass
        """
        List<GameProfileContent> objs;

        string method_name = "CachedGetGameProfileContentListByGameIdByUsername";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("username".ToLower());
        sb.Append("_");
        sb.Append(username);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileContentListByGameIdByUsername(
                game_id
                , username
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileContentListByUsername(self
        , username
        ) :
            return self.act.GetGameProfileContentListByUsername(
                username
            )
        
    def GetGameProfileContentByUsername(self
        , username
    ) :
        for item in self.GetGameProfileContentListByUsername(
        username
        ) :
            return item
        return None
    
    def CachedGetGameProfileContentListByUsername(self
        , username
    ) :
        return CachedGetGameProfileContentListByUsername(
            false
            , self.CACHE_DEFAULT_HOURS
            , username
        )
        
    def CachedGetGameProfileContentListByUsername(self
        , overrideCache
        , cacheHours
        , username
    ) :
        pass
        """
        List<GameProfileContent> objs;

        string method_name = "CachedGetGameProfileContentListByUsername";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("username".ToLower());
        sb.Append("_");
        sb.Append(username);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileContentListByUsername(
                username
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileContentListByGameIdByProfileIdByPath(self
        , game_id
        , profile_id
        , path
        ) :
            return self.act.GetGameProfileContentListByGameIdByProfileIdByPath(
                game_id
                , profile_id
                , path
            )
        
    def GetGameProfileContentByGameIdByProfileIdByPath(self
        , game_id
        , profile_id
        , path
    ) :
        for item in self.GetGameProfileContentListByGameIdByProfileIdByPath(
        game_id
        , profile_id
        , path
        ) :
            return item
        return None
    
    def CachedGetGameProfileContentListByGameIdByProfileIdByPath(self
        , game_id
        , profile_id
        , path
    ) :
        return CachedGetGameProfileContentListByGameIdByProfileIdByPath(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , profile_id
            , path
        )
        
    def CachedGetGameProfileContentListByGameIdByProfileIdByPath(self
        , overrideCache
        , cacheHours
        , game_id
        , profile_id
        , path
    ) :
        pass
        """
        List<GameProfileContent> objs;

        string method_name = "CachedGetGameProfileContentListByGameIdByProfileIdByPath";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("path".ToLower());
        sb.Append("_");
        sb.Append(path);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileContentListByGameIdByProfileIdByPath(
                game_id
                , profile_id
                , path
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileContentListByGameIdByProfileIdByPathByVersion(self
        , game_id
        , profile_id
        , path
        , version
        ) :
            return self.act.GetGameProfileContentListByGameIdByProfileIdByPathByVersion(
                game_id
                , profile_id
                , path
                , version
            )
        
    def GetGameProfileContentByGameIdByProfileIdByPathByVersion(self
        , game_id
        , profile_id
        , path
        , version
    ) :
        for item in self.GetGameProfileContentListByGameIdByProfileIdByPathByVersion(
        game_id
        , profile_id
        , path
        , version
        ) :
            return item
        return None
    
    def CachedGetGameProfileContentListByGameIdByProfileIdByPathByVersion(self
        , game_id
        , profile_id
        , path
        , version
    ) :
        return CachedGetGameProfileContentListByGameIdByProfileIdByPathByVersion(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , profile_id
            , path
            , version
        )
        
    def CachedGetGameProfileContentListByGameIdByProfileIdByPathByVersion(self
        , overrideCache
        , cacheHours
        , game_id
        , profile_id
        , path
        , version
    ) :
        pass
        """
        List<GameProfileContent> objs;

        string method_name = "CachedGetGameProfileContentListByGameIdByProfileIdByPathByVersion";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("path".ToLower());
        sb.Append("_");
        sb.Append(path);
        sb.Append("_");
        sb.Append("version".ToLower());
        sb.Append("_");
        sb.Append(version);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileContentListByGameIdByProfileIdByPathByVersion(
                game_id
                , profile_id
                , path
                , version
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(self
        , game_id
        , profile_id
        , path
        , version
        , platform
        , increment
        ) :
            return self.act.GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
                game_id
                , profile_id
                , path
                , version
                , platform
                , increment
            )
        
    def GetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(self
        , game_id
        , profile_id
        , path
        , version
        , platform
        , increment
    ) :
        for item in self.GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
        game_id
        , profile_id
        , path
        , version
        , platform
        , increment
        ) :
            return item
        return None
    
    def CachedGetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(self
        , game_id
        , profile_id
        , path
        , version
        , platform
        , increment
    ) :
        return CachedGetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , profile_id
            , path
            , version
            , platform
            , increment
        )
        
    def CachedGetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(self
        , overrideCache
        , cacheHours
        , game_id
        , profile_id
        , path
        , version
        , platform
        , increment
    ) :
        pass
        """
        List<GameProfileContent> objs;

        string method_name = "CachedGetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("path".ToLower());
        sb.Append("_");
        sb.Append(path);
        sb.Append("_");
        sb.Append("version".ToLower());
        sb.Append("_");
        sb.Append(version);
        sb.Append("_");
        sb.Append("platform".ToLower());
        sb.Append("_");
        sb.Append(platform);
        sb.Append("_");
        sb.Append("increment".ToLower());
        sb.Append("_");
        sb.Append(increment);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
                game_id
                , profile_id
                , path
                , version
                , platform
                , increment
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileContentListByGameIdByUsernameByPath(self
        , game_id
        , username
        , path
        ) :
            return self.act.GetGameProfileContentListByGameIdByUsernameByPath(
                game_id
                , username
                , path
            )
        
    def GetGameProfileContentByGameIdByUsernameByPath(self
        , game_id
        , username
        , path
    ) :
        for item in self.GetGameProfileContentListByGameIdByUsernameByPath(
        game_id
        , username
        , path
        ) :
            return item
        return None
    
    def CachedGetGameProfileContentListByGameIdByUsernameByPath(self
        , game_id
        , username
        , path
    ) :
        return CachedGetGameProfileContentListByGameIdByUsernameByPath(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , username
            , path
        )
        
    def CachedGetGameProfileContentListByGameIdByUsernameByPath(self
        , overrideCache
        , cacheHours
        , game_id
        , username
        , path
    ) :
        pass
        """
        List<GameProfileContent> objs;

        string method_name = "CachedGetGameProfileContentListByGameIdByUsernameByPath";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("username".ToLower());
        sb.Append("_");
        sb.Append(username);
        sb.Append("_");
        sb.Append("path".ToLower());
        sb.Append("_");
        sb.Append(path);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileContentListByGameIdByUsernameByPath(
                game_id
                , username
                , path
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileContentListByGameIdByUsernameByPathByVersion(self
        , game_id
        , username
        , path
        , version
        ) :
            return self.act.GetGameProfileContentListByGameIdByUsernameByPathByVersion(
                game_id
                , username
                , path
                , version
            )
        
    def GetGameProfileContentByGameIdByUsernameByPathByVersion(self
        , game_id
        , username
        , path
        , version
    ) :
        for item in self.GetGameProfileContentListByGameIdByUsernameByPathByVersion(
        game_id
        , username
        , path
        , version
        ) :
            return item
        return None
    
    def CachedGetGameProfileContentListByGameIdByUsernameByPathByVersion(self
        , game_id
        , username
        , path
        , version
    ) :
        return CachedGetGameProfileContentListByGameIdByUsernameByPathByVersion(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , username
            , path
            , version
        )
        
    def CachedGetGameProfileContentListByGameIdByUsernameByPathByVersion(self
        , overrideCache
        , cacheHours
        , game_id
        , username
        , path
        , version
    ) :
        pass
        """
        List<GameProfileContent> objs;

        string method_name = "CachedGetGameProfileContentListByGameIdByUsernameByPathByVersion";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("username".ToLower());
        sb.Append("_");
        sb.Append(username);
        sb.Append("_");
        sb.Append("path".ToLower());
        sb.Append("_");
        sb.Append(path);
        sb.Append("_");
        sb.Append("version".ToLower());
        sb.Append("_");
        sb.Append(version);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileContentListByGameIdByUsernameByPathByVersion(
                game_id
                , username
                , path
                , version
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(self
        , game_id
        , username
        , path
        , version
        , platform
        , increment
        ) :
            return self.act.GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
                game_id
                , username
                , path
                , version
                , platform
                , increment
            )
        
    def GetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(self
        , game_id
        , username
        , path
        , version
        , platform
        , increment
    ) :
        for item in self.GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
        game_id
        , username
        , path
        , version
        , platform
        , increment
        ) :
            return item
        return None
    
    def CachedGetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(self
        , game_id
        , username
        , path
        , version
        , platform
        , increment
    ) :
        return CachedGetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , username
            , path
            , version
            , platform
            , increment
        )
        
    def CachedGetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(self
        , overrideCache
        , cacheHours
        , game_id
        , username
        , path
        , version
        , platform
        , increment
    ) :
        pass
        """
        List<GameProfileContent> objs;

        string method_name = "CachedGetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("username".ToLower());
        sb.Append("_");
        sb.Append(username);
        sb.Append("_");
        sb.Append("path".ToLower());
        sb.Append("_");
        sb.Append(path);
        sb.Append("_");
        sb.Append("version".ToLower());
        sb.Append("_");
        sb.Append(version);
        sb.Append("_");
        sb.Append("platform".ToLower());
        sb.Append("_");
        sb.Append(platform);
        sb.Append("_");
        sb.Append("increment".ToLower());
        sb.Append("_");
        sb.Append(increment);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
                game_id
                , username
                , path
                , version
                , platform
                , increment
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameApp(self
    ) :         
        return self.act.CountGameApp(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAppByUuid(self
        , uuid
    ) :         
        return self.act.CountGameAppByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAppByGameId(self
        , game_id
    ) :         
        return self.act.CountGameAppByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAppByAppId(self
        , app_id
    ) :         
        return self.act.CountGameAppByAppId(
        app_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAppByGameIdByAppId(self
        , game_id
        , app_id
    ) :         
        return self.act.CountGameAppByGameIdByAppId(
        game_id
        , app_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameAppListByFilter(self, filter_obj) :
        return self.act.BrowseGameAppListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameAppByUuidType(self, set_type, obj) :
        return self.act.SetGameAppByUuid(set_type, obj)
               
    def SetGameAppByUuid(self, obj) :
        return self.act.SetGameAppByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameAppByUuid(self
        , uuid
    ) :          
        return self.act.DelGameAppByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetGameAppList(self
        ) :
            return self.act.GetGameAppList(
            )
        
    def GetGameApp(self
    ) :
        for item in self.GetGameAppList(
        ) :
            return item
        return None
    
    def CachedGetGameAppList(self
    ) :
        return CachedGetGameAppList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameAppList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameApp> objs;

        string method_name = "CachedGetGameAppList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameApp>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAppList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAppListByUuid(self
        , uuid
        ) :
            return self.act.GetGameAppListByUuid(
                uuid
            )
        
    def GetGameAppByUuid(self
        , uuid
    ) :
        for item in self.GetGameAppListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameAppListByUuid(self
        , uuid
    ) :
        return CachedGetGameAppListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameAppListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameApp> objs;

        string method_name = "CachedGetGameAppListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameApp>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAppListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAppListByGameId(self
        , game_id
        ) :
            return self.act.GetGameAppListByGameId(
                game_id
            )
        
    def GetGameAppByGameId(self
        , game_id
    ) :
        for item in self.GetGameAppListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameAppListByGameId(self
        , game_id
    ) :
        return CachedGetGameAppListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameAppListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameApp> objs;

        string method_name = "CachedGetGameAppListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameApp>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAppListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAppListByAppId(self
        , app_id
        ) :
            return self.act.GetGameAppListByAppId(
                app_id
            )
        
    def GetGameAppByAppId(self
        , app_id
    ) :
        for item in self.GetGameAppListByAppId(
        app_id
        ) :
            return item
        return None
    
    def CachedGetGameAppListByAppId(self
        , app_id
    ) :
        return CachedGetGameAppListByAppId(
            false
            , self.CACHE_DEFAULT_HOURS
            , app_id
        )
        
    def CachedGetGameAppListByAppId(self
        , overrideCache
        , cacheHours
        , app_id
    ) :
        pass
        """
        List<GameApp> objs;

        string method_name = "CachedGetGameAppListByAppId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("app_id".ToLower());
        sb.Append("_");
        sb.Append(app_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameApp>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAppListByAppId(
                app_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAppListByGameIdByAppId(self
        , game_id
        , app_id
        ) :
            return self.act.GetGameAppListByGameIdByAppId(
                game_id
                , app_id
            )
        
    def GetGameAppByGameIdByAppId(self
        , game_id
        , app_id
    ) :
        for item in self.GetGameAppListByGameIdByAppId(
        game_id
        , app_id
        ) :
            return item
        return None
    
    def CachedGetGameAppListByGameIdByAppId(self
        , game_id
        , app_id
    ) :
        return CachedGetGameAppListByGameIdByAppId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , app_id
        )
        
    def CachedGetGameAppListByGameIdByAppId(self
        , overrideCache
        , cacheHours
        , game_id
        , app_id
    ) :
        pass
        """
        List<GameApp> objs;

        string method_name = "CachedGetGameAppListByGameIdByAppId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("app_id".ToLower());
        sb.Append("_");
        sb.Append(app_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameApp>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAppListByGameIdByAppId(
                game_id
                , app_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountProfileGameLocation(self
    ) :         
        return self.act.CountProfileGameLocation(
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameLocationByUuid(self
        , uuid
    ) :         
        return self.act.CountProfileGameLocationByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameLocationByGameLocationId(self
        , game_location_id
    ) :         
        return self.act.CountProfileGameLocationByGameLocationId(
        game_location_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameLocationByProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileGameLocationByProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameLocationByProfileIdByGameLocationId(self
        , profile_id
        , game_location_id
    ) :         
        return self.act.CountProfileGameLocationByProfileIdByGameLocationId(
        profile_id
        , game_location_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileGameLocationListByFilter(self, filter_obj) :
        return self.act.BrowseProfileGameLocationListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameLocationByUuidType(self, set_type, obj) :
        return self.act.SetProfileGameLocationByUuid(set_type, obj)
               
    def SetProfileGameLocationByUuid(self, obj) :
        return self.act.SetProfileGameLocationByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileGameLocationByUuid(self
        , uuid
    ) :          
        return self.act.DelProfileGameLocationByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetProfileGameLocationList(self
        ) :
            return self.act.GetProfileGameLocationList(
            )
        
    def GetProfileGameLocation(self
    ) :
        for item in self.GetProfileGameLocationList(
        ) :
            return item
        return None
    
    def CachedGetProfileGameLocationList(self
    ) :
        return CachedGetProfileGameLocationList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetProfileGameLocationList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<ProfileGameLocation> objs;

        string method_name = "CachedGetProfileGameLocationList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileGameLocation>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileGameLocationList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameLocationListByUuid(self
        , uuid
        ) :
            return self.act.GetProfileGameLocationListByUuid(
                uuid
            )
        
    def GetProfileGameLocationByUuid(self
        , uuid
    ) :
        for item in self.GetProfileGameLocationListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileGameLocationListByUuid(self
        , uuid
    ) :
        return CachedGetProfileGameLocationListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileGameLocationListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileGameLocation> objs;

        string method_name = "CachedGetProfileGameLocationListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileGameLocation>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileGameLocationListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameLocationListByGameLocationId(self
        , game_location_id
        ) :
            return self.act.GetProfileGameLocationListByGameLocationId(
                game_location_id
            )
        
    def GetProfileGameLocationByGameLocationId(self
        , game_location_id
    ) :
        for item in self.GetProfileGameLocationListByGameLocationId(
        game_location_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameLocationListByGameLocationId(self
        , game_location_id
    ) :
        return CachedGetProfileGameLocationListByGameLocationId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_location_id
        )
        
    def CachedGetProfileGameLocationListByGameLocationId(self
        , overrideCache
        , cacheHours
        , game_location_id
    ) :
        pass
        """
        List<ProfileGameLocation> objs;

        string method_name = "CachedGetProfileGameLocationListByGameLocationId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_location_id".ToLower());
        sb.Append("_");
        sb.Append(game_location_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileGameLocation>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileGameLocationListByGameLocationId(
                game_location_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameLocationListByProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileGameLocationListByProfileId(
                profile_id
            )
        
    def GetProfileGameLocationByProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileGameLocationListByProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameLocationListByProfileId(self
        , profile_id
    ) :
        return CachedGetProfileGameLocationListByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileGameLocationListByProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileGameLocation> objs;

        string method_name = "CachedGetProfileGameLocationListByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileGameLocation>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileGameLocationListByProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameLocationListByProfileIdByGameLocationId(self
        , profile_id
        , game_location_id
        ) :
            return self.act.GetProfileGameLocationListByProfileIdByGameLocationId(
                profile_id
                , game_location_id
            )
        
    def GetProfileGameLocationByProfileIdByGameLocationId(self
        , profile_id
        , game_location_id
    ) :
        for item in self.GetProfileGameLocationListByProfileIdByGameLocationId(
        profile_id
        , game_location_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameLocationListByProfileIdByGameLocationId(self
        , profile_id
        , game_location_id
    ) :
        return CachedGetProfileGameLocationListByProfileIdByGameLocationId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_location_id
        )
        
    def CachedGetProfileGameLocationListByProfileIdByGameLocationId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_location_id
    ) :
        pass
        """
        List<ProfileGameLocation> objs;

        string method_name = "CachedGetProfileGameLocationListByProfileIdByGameLocationId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_location_id".ToLower());
        sb.Append("_");
        sb.Append(game_location_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileGameLocation>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileGameLocationListByProfileIdByGameLocationId(
                profile_id
                , game_location_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGamePhoto(self
    ) :         
        return self.act.CountGamePhoto(
        )
        
#------------------------------------------------------------------------------                    
    def CountGamePhotoByUuid(self
        , uuid
    ) :         
        return self.act.CountGamePhotoByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGamePhotoByExternalId(self
        , external_id
    ) :         
        return self.act.CountGamePhotoByExternalId(
        external_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGamePhotoByUrl(self
        , url
    ) :         
        return self.act.CountGamePhotoByUrl(
        url
        )
        
#------------------------------------------------------------------------------                    
    def CountGamePhotoByUrlByExternalId(self
        , url
        , external_id
    ) :         
        return self.act.CountGamePhotoByUrlByExternalId(
        url
        , external_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGamePhotoByUuidByExternalId(self
        , uuid
        , external_id
    ) :         
        return self.act.CountGamePhotoByUuidByExternalId(
        uuid
        , external_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGamePhotoListByFilter(self, filter_obj) :
        return self.act.BrowseGamePhotoListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGamePhotoByUuidType(self, set_type, obj) :
        return self.act.SetGamePhotoByUuid(set_type, obj)
               
    def SetGamePhotoByUuid(self, obj) :
        return self.act.SetGamePhotoByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGamePhotoByExternalIdType(self, set_type, obj) :
        return self.act.SetGamePhotoByExternalId(set_type, obj)
               
    def SetGamePhotoByExternalId(self, obj) :
        return self.act.SetGamePhotoByExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGamePhotoByUrlType(self, set_type, obj) :
        return self.act.SetGamePhotoByUrl(set_type, obj)
               
    def SetGamePhotoByUrl(self, obj) :
        return self.act.SetGamePhotoByUrl('full', obj)
#------------------------------------------------------------------------------                    
    def SetGamePhotoByUrlByExternalIdType(self, set_type, obj) :
        return self.act.SetGamePhotoByUrlByExternalId(set_type, obj)
               
    def SetGamePhotoByUrlByExternalId(self, obj) :
        return self.act.SetGamePhotoByUrlByExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGamePhotoByUuidByExternalIdType(self, set_type, obj) :
        return self.act.SetGamePhotoByUuidByExternalId(set_type, obj)
               
    def SetGamePhotoByUuidByExternalId(self, obj) :
        return self.act.SetGamePhotoByUuidByExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGamePhotoByUuid(self
        , uuid
    ) :          
        return self.act.DelGamePhotoByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGamePhotoByExternalId(self
        , external_id
    ) :          
        return self.act.DelGamePhotoByExternalId(
        external_id
        )
#------------------------------------------------------------------------------                    
    def DelGamePhotoByUrl(self
        , url
    ) :          
        return self.act.DelGamePhotoByUrl(
        url
        )
#------------------------------------------------------------------------------                    
    def DelGamePhotoByUrlByExternalId(self
        , url
        , external_id
    ) :          
        return self.act.DelGamePhotoByUrlByExternalId(
        url
        , external_id
        )
#------------------------------------------------------------------------------                    
    def DelGamePhotoByUuidByExternalId(self
        , uuid
        , external_id
    ) :          
        return self.act.DelGamePhotoByUuidByExternalId(
        uuid
        , external_id
        )
#------------------------------------------------------------------------------                    
    def GetGamePhotoList(self
        ) :
            return self.act.GetGamePhotoList(
            )
        
    def GetGamePhoto(self
    ) :
        for item in self.GetGamePhotoList(
        ) :
            return item
        return None
    
    def CachedGetGamePhotoList(self
    ) :
        return CachedGetGamePhotoList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGamePhotoList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GamePhoto> objs;

        string method_name = "CachedGetGamePhotoList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GamePhoto>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGamePhotoList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGamePhotoListByUuid(self
        , uuid
        ) :
            return self.act.GetGamePhotoListByUuid(
                uuid
            )
        
    def GetGamePhotoByUuid(self
        , uuid
    ) :
        for item in self.GetGamePhotoListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGamePhotoListByUuid(self
        , uuid
    ) :
        return CachedGetGamePhotoListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGamePhotoListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GamePhoto> objs;

        string method_name = "CachedGetGamePhotoListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GamePhoto>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGamePhotoListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGamePhotoListByExternalId(self
        , external_id
        ) :
            return self.act.GetGamePhotoListByExternalId(
                external_id
            )
        
    def GetGamePhotoByExternalId(self
        , external_id
    ) :
        for item in self.GetGamePhotoListByExternalId(
        external_id
        ) :
            return item
        return None
    
    def CachedGetGamePhotoListByExternalId(self
        , external_id
    ) :
        return CachedGetGamePhotoListByExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , external_id
        )
        
    def CachedGetGamePhotoListByExternalId(self
        , overrideCache
        , cacheHours
        , external_id
    ) :
        pass
        """
        List<GamePhoto> objs;

        string method_name = "CachedGetGamePhotoListByExternalId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("external_id".ToLower());
        sb.Append("_");
        sb.Append(external_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GamePhoto>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGamePhotoListByExternalId(
                external_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGamePhotoListByUrl(self
        , url
        ) :
            return self.act.GetGamePhotoListByUrl(
                url
            )
        
    def GetGamePhotoByUrl(self
        , url
    ) :
        for item in self.GetGamePhotoListByUrl(
        url
        ) :
            return item
        return None
    
    def CachedGetGamePhotoListByUrl(self
        , url
    ) :
        return CachedGetGamePhotoListByUrl(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
        )
        
    def CachedGetGamePhotoListByUrl(self
        , overrideCache
        , cacheHours
        , url
    ) :
        pass
        """
        List<GamePhoto> objs;

        string method_name = "CachedGetGamePhotoListByUrl";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("url".ToLower());
        sb.Append("_");
        sb.Append(url);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GamePhoto>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGamePhotoListByUrl(
                url
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGamePhotoListByUrlByExternalId(self
        , url
        , external_id
        ) :
            return self.act.GetGamePhotoListByUrlByExternalId(
                url
                , external_id
            )
        
    def GetGamePhotoByUrlByExternalId(self
        , url
        , external_id
    ) :
        for item in self.GetGamePhotoListByUrlByExternalId(
        url
        , external_id
        ) :
            return item
        return None
    
    def CachedGetGamePhotoListByUrlByExternalId(self
        , url
        , external_id
    ) :
        return CachedGetGamePhotoListByUrlByExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
            , external_id
        )
        
    def CachedGetGamePhotoListByUrlByExternalId(self
        , overrideCache
        , cacheHours
        , url
        , external_id
    ) :
        pass
        """
        List<GamePhoto> objs;

        string method_name = "CachedGetGamePhotoListByUrlByExternalId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("url".ToLower());
        sb.Append("_");
        sb.Append(url);
        sb.Append("_");
        sb.Append("external_id".ToLower());
        sb.Append("_");
        sb.Append(external_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GamePhoto>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGamePhotoListByUrlByExternalId(
                url
                , external_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGamePhotoListByUuidByExternalId(self
        , uuid
        , external_id
        ) :
            return self.act.GetGamePhotoListByUuidByExternalId(
                uuid
                , external_id
            )
        
    def GetGamePhotoByUuidByExternalId(self
        , uuid
        , external_id
    ) :
        for item in self.GetGamePhotoListByUuidByExternalId(
        uuid
        , external_id
        ) :
            return item
        return None
    
    def CachedGetGamePhotoListByUuidByExternalId(self
        , uuid
        , external_id
    ) :
        return CachedGetGamePhotoListByUuidByExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
            , external_id
        )
        
    def CachedGetGamePhotoListByUuidByExternalId(self
        , overrideCache
        , cacheHours
        , uuid
        , external_id
    ) :
        pass
        """
        List<GamePhoto> objs;

        string method_name = "CachedGetGamePhotoListByUuidByExternalId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);
        sb.Append("_");
        sb.Append("external_id".ToLower());
        sb.Append("_");
        sb.Append(external_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GamePhoto>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGamePhotoListByUuidByExternalId(
                uuid
                , external_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameVideo(self
    ) :         
        return self.act.CountGameVideo(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameVideoByUuid(self
        , uuid
    ) :         
        return self.act.CountGameVideoByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameVideoByExternalId(self
        , external_id
    ) :         
        return self.act.CountGameVideoByExternalId(
        external_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameVideoByUrl(self
        , url
    ) :         
        return self.act.CountGameVideoByUrl(
        url
        )
        
#------------------------------------------------------------------------------                    
    def CountGameVideoByUrlByExternalId(self
        , url
        , external_id
    ) :         
        return self.act.CountGameVideoByUrlByExternalId(
        url
        , external_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameVideoByUuidByExternalId(self
        , uuid
        , external_id
    ) :         
        return self.act.CountGameVideoByUuidByExternalId(
        uuid
        , external_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameVideoListByFilter(self, filter_obj) :
        return self.act.BrowseGameVideoListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameVideoByUuidType(self, set_type, obj) :
        return self.act.SetGameVideoByUuid(set_type, obj)
               
    def SetGameVideoByUuid(self, obj) :
        return self.act.SetGameVideoByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameVideoByExternalIdType(self, set_type, obj) :
        return self.act.SetGameVideoByExternalId(set_type, obj)
               
    def SetGameVideoByExternalId(self, obj) :
        return self.act.SetGameVideoByExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameVideoByUrlType(self, set_type, obj) :
        return self.act.SetGameVideoByUrl(set_type, obj)
               
    def SetGameVideoByUrl(self, obj) :
        return self.act.SetGameVideoByUrl('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameVideoByUrlByExternalIdType(self, set_type, obj) :
        return self.act.SetGameVideoByUrlByExternalId(set_type, obj)
               
    def SetGameVideoByUrlByExternalId(self, obj) :
        return self.act.SetGameVideoByUrlByExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameVideoByUuidByExternalIdType(self, set_type, obj) :
        return self.act.SetGameVideoByUuidByExternalId(set_type, obj)
               
    def SetGameVideoByUuidByExternalId(self, obj) :
        return self.act.SetGameVideoByUuidByExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameVideoByUuid(self
        , uuid
    ) :          
        return self.act.DelGameVideoByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameVideoByExternalId(self
        , external_id
    ) :          
        return self.act.DelGameVideoByExternalId(
        external_id
        )
#------------------------------------------------------------------------------                    
    def DelGameVideoByUrl(self
        , url
    ) :          
        return self.act.DelGameVideoByUrl(
        url
        )
#------------------------------------------------------------------------------                    
    def DelGameVideoByUrlByExternalId(self
        , url
        , external_id
    ) :          
        return self.act.DelGameVideoByUrlByExternalId(
        url
        , external_id
        )
#------------------------------------------------------------------------------                    
    def DelGameVideoByUuidByExternalId(self
        , uuid
        , external_id
    ) :          
        return self.act.DelGameVideoByUuidByExternalId(
        uuid
        , external_id
        )
#------------------------------------------------------------------------------                    
    def GetGameVideoList(self
        ) :
            return self.act.GetGameVideoList(
            )
        
    def GetGameVideo(self
    ) :
        for item in self.GetGameVideoList(
        ) :
            return item
        return None
    
    def CachedGetGameVideoList(self
    ) :
        return CachedGetGameVideoList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameVideoList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameVideo> objs;

        string method_name = "CachedGetGameVideoList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameVideo>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameVideoList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameVideoListByUuid(self
        , uuid
        ) :
            return self.act.GetGameVideoListByUuid(
                uuid
            )
        
    def GetGameVideoByUuid(self
        , uuid
    ) :
        for item in self.GetGameVideoListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameVideoListByUuid(self
        , uuid
    ) :
        return CachedGetGameVideoListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameVideoListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameVideo> objs;

        string method_name = "CachedGetGameVideoListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameVideo>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameVideoListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameVideoListByExternalId(self
        , external_id
        ) :
            return self.act.GetGameVideoListByExternalId(
                external_id
            )
        
    def GetGameVideoByExternalId(self
        , external_id
    ) :
        for item in self.GetGameVideoListByExternalId(
        external_id
        ) :
            return item
        return None
    
    def CachedGetGameVideoListByExternalId(self
        , external_id
    ) :
        return CachedGetGameVideoListByExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , external_id
        )
        
    def CachedGetGameVideoListByExternalId(self
        , overrideCache
        , cacheHours
        , external_id
    ) :
        pass
        """
        List<GameVideo> objs;

        string method_name = "CachedGetGameVideoListByExternalId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("external_id".ToLower());
        sb.Append("_");
        sb.Append(external_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameVideo>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameVideoListByExternalId(
                external_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameVideoListByUrl(self
        , url
        ) :
            return self.act.GetGameVideoListByUrl(
                url
            )
        
    def GetGameVideoByUrl(self
        , url
    ) :
        for item in self.GetGameVideoListByUrl(
        url
        ) :
            return item
        return None
    
    def CachedGetGameVideoListByUrl(self
        , url
    ) :
        return CachedGetGameVideoListByUrl(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
        )
        
    def CachedGetGameVideoListByUrl(self
        , overrideCache
        , cacheHours
        , url
    ) :
        pass
        """
        List<GameVideo> objs;

        string method_name = "CachedGetGameVideoListByUrl";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("url".ToLower());
        sb.Append("_");
        sb.Append(url);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameVideo>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameVideoListByUrl(
                url
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameVideoListByUrlByExternalId(self
        , url
        , external_id
        ) :
            return self.act.GetGameVideoListByUrlByExternalId(
                url
                , external_id
            )
        
    def GetGameVideoByUrlByExternalId(self
        , url
        , external_id
    ) :
        for item in self.GetGameVideoListByUrlByExternalId(
        url
        , external_id
        ) :
            return item
        return None
    
    def CachedGetGameVideoListByUrlByExternalId(self
        , url
        , external_id
    ) :
        return CachedGetGameVideoListByUrlByExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
            , external_id
        )
        
    def CachedGetGameVideoListByUrlByExternalId(self
        , overrideCache
        , cacheHours
        , url
        , external_id
    ) :
        pass
        """
        List<GameVideo> objs;

        string method_name = "CachedGetGameVideoListByUrlByExternalId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("url".ToLower());
        sb.Append("_");
        sb.Append(url);
        sb.Append("_");
        sb.Append("external_id".ToLower());
        sb.Append("_");
        sb.Append(external_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameVideo>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameVideoListByUrlByExternalId(
                url
                , external_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameVideoListByUuidByExternalId(self
        , uuid
        , external_id
        ) :
            return self.act.GetGameVideoListByUuidByExternalId(
                uuid
                , external_id
            )
        
    def GetGameVideoByUuidByExternalId(self
        , uuid
        , external_id
    ) :
        for item in self.GetGameVideoListByUuidByExternalId(
        uuid
        , external_id
        ) :
            return item
        return None
    
    def CachedGetGameVideoListByUuidByExternalId(self
        , uuid
        , external_id
    ) :
        return CachedGetGameVideoListByUuidByExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
            , external_id
        )
        
    def CachedGetGameVideoListByUuidByExternalId(self
        , overrideCache
        , cacheHours
        , uuid
        , external_id
    ) :
        pass
        """
        List<GameVideo> objs;

        string method_name = "CachedGetGameVideoListByUuidByExternalId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);
        sb.Append("_");
        sb.Append("external_id".ToLower());
        sb.Append("_");
        sb.Append(external_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameVideo>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameVideoListByUuidByExternalId(
                uuid
                , external_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameRpgItemWeapon(self
    ) :         
        return self.act.CountGameRpgItemWeapon(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameRpgItemWeaponByUuid(self
        , uuid
    ) :         
        return self.act.CountGameRpgItemWeaponByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameRpgItemWeaponByGameId(self
        , game_id
    ) :         
        return self.act.CountGameRpgItemWeaponByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameRpgItemWeaponByUrl(self
        , url
    ) :         
        return self.act.CountGameRpgItemWeaponByUrl(
        url
        )
        
#------------------------------------------------------------------------------                    
    def CountGameRpgItemWeaponByUrlByGameId(self
        , url
        , game_id
    ) :         
        return self.act.CountGameRpgItemWeaponByUrlByGameId(
        url
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameRpgItemWeaponByUuidByGameId(self
        , uuid
        , game_id
    ) :         
        return self.act.CountGameRpgItemWeaponByUuidByGameId(
        uuid
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameRpgItemWeaponListByFilter(self, filter_obj) :
        return self.act.BrowseGameRpgItemWeaponListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemWeaponByUuidType(self, set_type, obj) :
        return self.act.SetGameRpgItemWeaponByUuid(set_type, obj)
               
    def SetGameRpgItemWeaponByUuid(self, obj) :
        return self.act.SetGameRpgItemWeaponByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemWeaponByGameIdType(self, set_type, obj) :
        return self.act.SetGameRpgItemWeaponByGameId(set_type, obj)
               
    def SetGameRpgItemWeaponByGameId(self, obj) :
        return self.act.SetGameRpgItemWeaponByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemWeaponByUrlType(self, set_type, obj) :
        return self.act.SetGameRpgItemWeaponByUrl(set_type, obj)
               
    def SetGameRpgItemWeaponByUrl(self, obj) :
        return self.act.SetGameRpgItemWeaponByUrl('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemWeaponByUrlByGameIdType(self, set_type, obj) :
        return self.act.SetGameRpgItemWeaponByUrlByGameId(set_type, obj)
               
    def SetGameRpgItemWeaponByUrlByGameId(self, obj) :
        return self.act.SetGameRpgItemWeaponByUrlByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemWeaponByUuidByGameIdType(self, set_type, obj) :
        return self.act.SetGameRpgItemWeaponByUuidByGameId(set_type, obj)
               
    def SetGameRpgItemWeaponByUuidByGameId(self, obj) :
        return self.act.SetGameRpgItemWeaponByUuidByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameRpgItemWeaponByUuid(self
        , uuid
    ) :          
        return self.act.DelGameRpgItemWeaponByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameRpgItemWeaponByGameId(self
        , game_id
    ) :          
        return self.act.DelGameRpgItemWeaponByGameId(
        game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameRpgItemWeaponByUrl(self
        , url
    ) :          
        return self.act.DelGameRpgItemWeaponByUrl(
        url
        )
#------------------------------------------------------------------------------                    
    def DelGameRpgItemWeaponByUrlByGameId(self
        , url
        , game_id
    ) :          
        return self.act.DelGameRpgItemWeaponByUrlByGameId(
        url
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameRpgItemWeaponByUuidByGameId(self
        , uuid
        , game_id
    ) :          
        return self.act.DelGameRpgItemWeaponByUuidByGameId(
        uuid
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameRpgItemWeaponList(self
        ) :
            return self.act.GetGameRpgItemWeaponList(
            )
        
    def GetGameRpgItemWeapon(self
    ) :
        for item in self.GetGameRpgItemWeaponList(
        ) :
            return item
        return None
    
    def CachedGetGameRpgItemWeaponList(self
    ) :
        return CachedGetGameRpgItemWeaponList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameRpgItemWeaponList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameRpgItemWeapon> objs;

        string method_name = "CachedGetGameRpgItemWeaponList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameRpgItemWeapon>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameRpgItemWeaponList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameRpgItemWeaponListByUuid(self
        , uuid
        ) :
            return self.act.GetGameRpgItemWeaponListByUuid(
                uuid
            )
        
    def GetGameRpgItemWeaponByUuid(self
        , uuid
    ) :
        for item in self.GetGameRpgItemWeaponListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameRpgItemWeaponListByUuid(self
        , uuid
    ) :
        return CachedGetGameRpgItemWeaponListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameRpgItemWeaponListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameRpgItemWeapon> objs;

        string method_name = "CachedGetGameRpgItemWeaponListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameRpgItemWeapon>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameRpgItemWeaponListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameRpgItemWeaponListByGameId(self
        , game_id
        ) :
            return self.act.GetGameRpgItemWeaponListByGameId(
                game_id
            )
        
    def GetGameRpgItemWeaponByGameId(self
        , game_id
    ) :
        for item in self.GetGameRpgItemWeaponListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameRpgItemWeaponListByGameId(self
        , game_id
    ) :
        return CachedGetGameRpgItemWeaponListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameRpgItemWeaponListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameRpgItemWeapon> objs;

        string method_name = "CachedGetGameRpgItemWeaponListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameRpgItemWeapon>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameRpgItemWeaponListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameRpgItemWeaponListByUrl(self
        , url
        ) :
            return self.act.GetGameRpgItemWeaponListByUrl(
                url
            )
        
    def GetGameRpgItemWeaponByUrl(self
        , url
    ) :
        for item in self.GetGameRpgItemWeaponListByUrl(
        url
        ) :
            return item
        return None
    
    def CachedGetGameRpgItemWeaponListByUrl(self
        , url
    ) :
        return CachedGetGameRpgItemWeaponListByUrl(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
        )
        
    def CachedGetGameRpgItemWeaponListByUrl(self
        , overrideCache
        , cacheHours
        , url
    ) :
        pass
        """
        List<GameRpgItemWeapon> objs;

        string method_name = "CachedGetGameRpgItemWeaponListByUrl";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("url".ToLower());
        sb.Append("_");
        sb.Append(url);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameRpgItemWeapon>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameRpgItemWeaponListByUrl(
                url
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameRpgItemWeaponListByUrlByGameId(self
        , url
        , game_id
        ) :
            return self.act.GetGameRpgItemWeaponListByUrlByGameId(
                url
                , game_id
            )
        
    def GetGameRpgItemWeaponByUrlByGameId(self
        , url
        , game_id
    ) :
        for item in self.GetGameRpgItemWeaponListByUrlByGameId(
        url
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameRpgItemWeaponListByUrlByGameId(self
        , url
        , game_id
    ) :
        return CachedGetGameRpgItemWeaponListByUrlByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
            , game_id
        )
        
    def CachedGetGameRpgItemWeaponListByUrlByGameId(self
        , overrideCache
        , cacheHours
        , url
        , game_id
    ) :
        pass
        """
        List<GameRpgItemWeapon> objs;

        string method_name = "CachedGetGameRpgItemWeaponListByUrlByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("url".ToLower());
        sb.Append("_");
        sb.Append(url);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameRpgItemWeapon>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameRpgItemWeaponListByUrlByGameId(
                url
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameRpgItemWeaponListByUuidByGameId(self
        , uuid
        , game_id
        ) :
            return self.act.GetGameRpgItemWeaponListByUuidByGameId(
                uuid
                , game_id
            )
        
    def GetGameRpgItemWeaponByUuidByGameId(self
        , uuid
        , game_id
    ) :
        for item in self.GetGameRpgItemWeaponListByUuidByGameId(
        uuid
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameRpgItemWeaponListByUuidByGameId(self
        , uuid
        , game_id
    ) :
        return CachedGetGameRpgItemWeaponListByUuidByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
            , game_id
        )
        
    def CachedGetGameRpgItemWeaponListByUuidByGameId(self
        , overrideCache
        , cacheHours
        , uuid
        , game_id
    ) :
        pass
        """
        List<GameRpgItemWeapon> objs;

        string method_name = "CachedGetGameRpgItemWeaponListByUuidByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameRpgItemWeapon>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameRpgItemWeaponListByUuidByGameId(
                uuid
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameRpgItemSkill(self
    ) :         
        return self.act.CountGameRpgItemSkill(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameRpgItemSkillByUuid(self
        , uuid
    ) :         
        return self.act.CountGameRpgItemSkillByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameRpgItemSkillByGameId(self
        , game_id
    ) :         
        return self.act.CountGameRpgItemSkillByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameRpgItemSkillByUrl(self
        , url
    ) :         
        return self.act.CountGameRpgItemSkillByUrl(
        url
        )
        
#------------------------------------------------------------------------------                    
    def CountGameRpgItemSkillByUrlByGameId(self
        , url
        , game_id
    ) :         
        return self.act.CountGameRpgItemSkillByUrlByGameId(
        url
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameRpgItemSkillByUuidByGameId(self
        , uuid
        , game_id
    ) :         
        return self.act.CountGameRpgItemSkillByUuidByGameId(
        uuid
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameRpgItemSkillListByFilter(self, filter_obj) :
        return self.act.BrowseGameRpgItemSkillListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemSkillByUuidType(self, set_type, obj) :
        return self.act.SetGameRpgItemSkillByUuid(set_type, obj)
               
    def SetGameRpgItemSkillByUuid(self, obj) :
        return self.act.SetGameRpgItemSkillByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemSkillByGameIdType(self, set_type, obj) :
        return self.act.SetGameRpgItemSkillByGameId(set_type, obj)
               
    def SetGameRpgItemSkillByGameId(self, obj) :
        return self.act.SetGameRpgItemSkillByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemSkillByUrlType(self, set_type, obj) :
        return self.act.SetGameRpgItemSkillByUrl(set_type, obj)
               
    def SetGameRpgItemSkillByUrl(self, obj) :
        return self.act.SetGameRpgItemSkillByUrl('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemSkillByUrlByGameIdType(self, set_type, obj) :
        return self.act.SetGameRpgItemSkillByUrlByGameId(set_type, obj)
               
    def SetGameRpgItemSkillByUrlByGameId(self, obj) :
        return self.act.SetGameRpgItemSkillByUrlByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemSkillByUuidByGameIdType(self, set_type, obj) :
        return self.act.SetGameRpgItemSkillByUuidByGameId(set_type, obj)
               
    def SetGameRpgItemSkillByUuidByGameId(self, obj) :
        return self.act.SetGameRpgItemSkillByUuidByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameRpgItemSkillByUuid(self
        , uuid
    ) :          
        return self.act.DelGameRpgItemSkillByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameRpgItemSkillByGameId(self
        , game_id
    ) :          
        return self.act.DelGameRpgItemSkillByGameId(
        game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameRpgItemSkillByUrl(self
        , url
    ) :          
        return self.act.DelGameRpgItemSkillByUrl(
        url
        )
#------------------------------------------------------------------------------                    
    def DelGameRpgItemSkillByUrlByGameId(self
        , url
        , game_id
    ) :          
        return self.act.DelGameRpgItemSkillByUrlByGameId(
        url
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameRpgItemSkillByUuidByGameId(self
        , uuid
        , game_id
    ) :          
        return self.act.DelGameRpgItemSkillByUuidByGameId(
        uuid
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameRpgItemSkillList(self
        ) :
            return self.act.GetGameRpgItemSkillList(
            )
        
    def GetGameRpgItemSkill(self
    ) :
        for item in self.GetGameRpgItemSkillList(
        ) :
            return item
        return None
    
    def CachedGetGameRpgItemSkillList(self
    ) :
        return CachedGetGameRpgItemSkillList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameRpgItemSkillList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameRpgItemSkill> objs;

        string method_name = "CachedGetGameRpgItemSkillList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameRpgItemSkill>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameRpgItemSkillList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameRpgItemSkillListByUuid(self
        , uuid
        ) :
            return self.act.GetGameRpgItemSkillListByUuid(
                uuid
            )
        
    def GetGameRpgItemSkillByUuid(self
        , uuid
    ) :
        for item in self.GetGameRpgItemSkillListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameRpgItemSkillListByUuid(self
        , uuid
    ) :
        return CachedGetGameRpgItemSkillListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameRpgItemSkillListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameRpgItemSkill> objs;

        string method_name = "CachedGetGameRpgItemSkillListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameRpgItemSkill>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameRpgItemSkillListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameRpgItemSkillListByGameId(self
        , game_id
        ) :
            return self.act.GetGameRpgItemSkillListByGameId(
                game_id
            )
        
    def GetGameRpgItemSkillByGameId(self
        , game_id
    ) :
        for item in self.GetGameRpgItemSkillListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameRpgItemSkillListByGameId(self
        , game_id
    ) :
        return CachedGetGameRpgItemSkillListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameRpgItemSkillListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameRpgItemSkill> objs;

        string method_name = "CachedGetGameRpgItemSkillListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameRpgItemSkill>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameRpgItemSkillListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameRpgItemSkillListByUrl(self
        , url
        ) :
            return self.act.GetGameRpgItemSkillListByUrl(
                url
            )
        
    def GetGameRpgItemSkillByUrl(self
        , url
    ) :
        for item in self.GetGameRpgItemSkillListByUrl(
        url
        ) :
            return item
        return None
    
    def CachedGetGameRpgItemSkillListByUrl(self
        , url
    ) :
        return CachedGetGameRpgItemSkillListByUrl(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
        )
        
    def CachedGetGameRpgItemSkillListByUrl(self
        , overrideCache
        , cacheHours
        , url
    ) :
        pass
        """
        List<GameRpgItemSkill> objs;

        string method_name = "CachedGetGameRpgItemSkillListByUrl";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("url".ToLower());
        sb.Append("_");
        sb.Append(url);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameRpgItemSkill>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameRpgItemSkillListByUrl(
                url
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameRpgItemSkillListByUrlByGameId(self
        , url
        , game_id
        ) :
            return self.act.GetGameRpgItemSkillListByUrlByGameId(
                url
                , game_id
            )
        
    def GetGameRpgItemSkillByUrlByGameId(self
        , url
        , game_id
    ) :
        for item in self.GetGameRpgItemSkillListByUrlByGameId(
        url
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameRpgItemSkillListByUrlByGameId(self
        , url
        , game_id
    ) :
        return CachedGetGameRpgItemSkillListByUrlByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
            , game_id
        )
        
    def CachedGetGameRpgItemSkillListByUrlByGameId(self
        , overrideCache
        , cacheHours
        , url
        , game_id
    ) :
        pass
        """
        List<GameRpgItemSkill> objs;

        string method_name = "CachedGetGameRpgItemSkillListByUrlByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("url".ToLower());
        sb.Append("_");
        sb.Append(url);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameRpgItemSkill>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameRpgItemSkillListByUrlByGameId(
                url
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameRpgItemSkillListByUuidByGameId(self
        , uuid
        , game_id
        ) :
            return self.act.GetGameRpgItemSkillListByUuidByGameId(
                uuid
                , game_id
            )
        
    def GetGameRpgItemSkillByUuidByGameId(self
        , uuid
        , game_id
    ) :
        for item in self.GetGameRpgItemSkillListByUuidByGameId(
        uuid
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameRpgItemSkillListByUuidByGameId(self
        , uuid
        , game_id
    ) :
        return CachedGetGameRpgItemSkillListByUuidByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
            , game_id
        )
        
    def CachedGetGameRpgItemSkillListByUuidByGameId(self
        , overrideCache
        , cacheHours
        , uuid
        , game_id
    ) :
        pass
        """
        List<GameRpgItemSkill> objs;

        string method_name = "CachedGetGameRpgItemSkillListByUuidByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameRpgItemSkill>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameRpgItemSkillListByUuidByGameId(
                uuid
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameProduct(self
    ) :         
        return self.act.CountGameProduct(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProductByUuid(self
        , uuid
    ) :         
        return self.act.CountGameProductByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProductByGameId(self
        , game_id
    ) :         
        return self.act.CountGameProductByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProductByUrl(self
        , url
    ) :         
        return self.act.CountGameProductByUrl(
        url
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProductByUrlByGameId(self
        , url
        , game_id
    ) :         
        return self.act.CountGameProductByUrlByGameId(
        url
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProductByUuidByGameId(self
        , uuid
        , game_id
    ) :         
        return self.act.CountGameProductByUuidByGameId(
        uuid
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameProductListByFilter(self, filter_obj) :
        return self.act.BrowseGameProductListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameProductByUuidType(self, set_type, obj) :
        return self.act.SetGameProductByUuid(set_type, obj)
               
    def SetGameProductByUuid(self, obj) :
        return self.act.SetGameProductByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProductByGameIdType(self, set_type, obj) :
        return self.act.SetGameProductByGameId(set_type, obj)
               
    def SetGameProductByGameId(self, obj) :
        return self.act.SetGameProductByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProductByUrlType(self, set_type, obj) :
        return self.act.SetGameProductByUrl(set_type, obj)
               
    def SetGameProductByUrl(self, obj) :
        return self.act.SetGameProductByUrl('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProductByUrlByGameIdType(self, set_type, obj) :
        return self.act.SetGameProductByUrlByGameId(set_type, obj)
               
    def SetGameProductByUrlByGameId(self, obj) :
        return self.act.SetGameProductByUrlByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProductByUuidByGameIdType(self, set_type, obj) :
        return self.act.SetGameProductByUuidByGameId(set_type, obj)
               
    def SetGameProductByUuidByGameId(self, obj) :
        return self.act.SetGameProductByUuidByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameProductByUuid(self
        , uuid
    ) :          
        return self.act.DelGameProductByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameProductByGameId(self
        , game_id
    ) :          
        return self.act.DelGameProductByGameId(
        game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameProductByUrl(self
        , url
    ) :          
        return self.act.DelGameProductByUrl(
        url
        )
#------------------------------------------------------------------------------                    
    def DelGameProductByUrlByGameId(self
        , url
        , game_id
    ) :          
        return self.act.DelGameProductByUrlByGameId(
        url
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameProductByUuidByGameId(self
        , uuid
        , game_id
    ) :          
        return self.act.DelGameProductByUuidByGameId(
        uuid
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameProductList(self
        ) :
            return self.act.GetGameProductList(
            )
        
    def GetGameProduct(self
    ) :
        for item in self.GetGameProductList(
        ) :
            return item
        return None
    
    def CachedGetGameProductList(self
    ) :
        return CachedGetGameProductList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameProductList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameProduct> objs;

        string method_name = "CachedGetGameProductList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProduct>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProductList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProductListByUuid(self
        , uuid
        ) :
            return self.act.GetGameProductListByUuid(
                uuid
            )
        
    def GetGameProductByUuid(self
        , uuid
    ) :
        for item in self.GetGameProductListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameProductListByUuid(self
        , uuid
    ) :
        return CachedGetGameProductListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameProductListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameProduct> objs;

        string method_name = "CachedGetGameProductListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProduct>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProductListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProductListByGameId(self
        , game_id
        ) :
            return self.act.GetGameProductListByGameId(
                game_id
            )
        
    def GetGameProductByGameId(self
        , game_id
    ) :
        for item in self.GetGameProductListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameProductListByGameId(self
        , game_id
    ) :
        return CachedGetGameProductListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameProductListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameProduct> objs;

        string method_name = "CachedGetGameProductListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProduct>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProductListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProductListByUrl(self
        , url
        ) :
            return self.act.GetGameProductListByUrl(
                url
            )
        
    def GetGameProductByUrl(self
        , url
    ) :
        for item in self.GetGameProductListByUrl(
        url
        ) :
            return item
        return None
    
    def CachedGetGameProductListByUrl(self
        , url
    ) :
        return CachedGetGameProductListByUrl(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
        )
        
    def CachedGetGameProductListByUrl(self
        , overrideCache
        , cacheHours
        , url
    ) :
        pass
        """
        List<GameProduct> objs;

        string method_name = "CachedGetGameProductListByUrl";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("url".ToLower());
        sb.Append("_");
        sb.Append(url);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProduct>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProductListByUrl(
                url
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProductListByUrlByGameId(self
        , url
        , game_id
        ) :
            return self.act.GetGameProductListByUrlByGameId(
                url
                , game_id
            )
        
    def GetGameProductByUrlByGameId(self
        , url
        , game_id
    ) :
        for item in self.GetGameProductListByUrlByGameId(
        url
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameProductListByUrlByGameId(self
        , url
        , game_id
    ) :
        return CachedGetGameProductListByUrlByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
            , game_id
        )
        
    def CachedGetGameProductListByUrlByGameId(self
        , overrideCache
        , cacheHours
        , url
        , game_id
    ) :
        pass
        """
        List<GameProduct> objs;

        string method_name = "CachedGetGameProductListByUrlByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("url".ToLower());
        sb.Append("_");
        sb.Append(url);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProduct>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProductListByUrlByGameId(
                url
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProductListByUuidByGameId(self
        , uuid
        , game_id
        ) :
            return self.act.GetGameProductListByUuidByGameId(
                uuid
                , game_id
            )
        
    def GetGameProductByUuidByGameId(self
        , uuid
        , game_id
    ) :
        for item in self.GetGameProductListByUuidByGameId(
        uuid
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameProductListByUuidByGameId(self
        , uuid
        , game_id
    ) :
        return CachedGetGameProductListByUuidByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
            , game_id
        )
        
    def CachedGetGameProductListByUuidByGameId(self
        , overrideCache
        , cacheHours
        , uuid
        , game_id
    ) :
        pass
        """
        List<GameProduct> objs;

        string method_name = "CachedGetGameProductListByUuidByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProduct>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProductListByUuidByGameId(
                uuid
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameLeaderboard(self
    ) :         
        return self.act.CountGameLeaderboard(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardByUuid(self
        , uuid
    ) :         
        return self.act.CountGameLeaderboardByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardByGameId(self
        , game_id
    ) :         
        return self.act.CountGameLeaderboardByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardByCode(self
        , code
    ) :         
        return self.act.CountGameLeaderboardByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardByCodeByGameId(self
        , code
        , game_id
    ) :         
        return self.act.CountGameLeaderboardByCodeByGameId(
        code
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :         
        return self.act.CountGameLeaderboardByCodeByGameIdByProfileId(
        code
        , game_id
        , profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :         
        return self.act.CountGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameLeaderboardByProfileIdByGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameLeaderboardListByFilter(self, filter_obj) :
        return self.act.BrowseGameLeaderboardListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameLeaderboardByUuidType(self, set_type, obj) :
        return self.act.SetGameLeaderboardByUuid(set_type, obj)
               
    def SetGameLeaderboardByUuid(self, obj) :
        return self.act.SetGameLeaderboardByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLeaderboardByUuidByProfileIdByGameIdByTimestampType(self, set_type, obj) :
        return self.act.SetGameLeaderboardByUuidByProfileIdByGameIdByTimestamp(set_type, obj)
               
    def SetGameLeaderboardByUuidByProfileIdByGameIdByTimestamp(self, obj) :
        return self.act.SetGameLeaderboardByUuidByProfileIdByGameIdByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLeaderboardByCodeType(self, set_type, obj) :
        return self.act.SetGameLeaderboardByCode(set_type, obj)
               
    def SetGameLeaderboardByCode(self, obj) :
        return self.act.SetGameLeaderboardByCode('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLeaderboardByCodeByGameIdType(self, set_type, obj) :
        return self.act.SetGameLeaderboardByCodeByGameId(set_type, obj)
               
    def SetGameLeaderboardByCodeByGameId(self, obj) :
        return self.act.SetGameLeaderboardByCodeByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLeaderboardByCodeByGameIdByProfileIdType(self, set_type, obj) :
        return self.act.SetGameLeaderboardByCodeByGameIdByProfileId(set_type, obj)
               
    def SetGameLeaderboardByCodeByGameIdByProfileId(self, obj) :
        return self.act.SetGameLeaderboardByCodeByGameIdByProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLeaderboardByCodeByGameIdByProfileIdByTimestampType(self, set_type, obj) :
        return self.act.SetGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(set_type, obj)
               
    def SetGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(self, obj) :
        return self.act.SetGameLeaderboardByCodeByGameIdByProfileIdByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameLeaderboardByUuid(self
        , uuid
    ) :          
        return self.act.DelGameLeaderboardByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameLeaderboardByCode(self
        , code
    ) :          
        return self.act.DelGameLeaderboardByCode(
        code
        )
#------------------------------------------------------------------------------                    
    def DelGameLeaderboardByCodeByGameId(self
        , code
        , game_id
    ) :          
        return self.act.DelGameLeaderboardByCodeByGameId(
        code
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameLeaderboardByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :          
        return self.act.DelGameLeaderboardByCodeByGameIdByProfileId(
        code
        , game_id
        , profile_id
        )
#------------------------------------------------------------------------------                    
    def DelGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :          
        return self.act.DelGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        )
#------------------------------------------------------------------------------                    
    def DelGameLeaderboardByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameLeaderboardByProfileIdByGameId(
        profile_id
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardList(self
        ) :
            return self.act.GetGameLeaderboardList(
            )
        
    def GetGameLeaderboard(self
    ) :
        for item in self.GetGameLeaderboardList(
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardList(self
    ) :
        return CachedGetGameLeaderboardList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameLeaderboardList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameLeaderboard> objs;

        string method_name = "CachedGetGameLeaderboardList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboard>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardListByUuid(self
        , uuid
        ) :
            return self.act.GetGameLeaderboardListByUuid(
                uuid
            )
        
    def GetGameLeaderboardByUuid(self
        , uuid
    ) :
        for item in self.GetGameLeaderboardListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardListByUuid(self
        , uuid
    ) :
        return CachedGetGameLeaderboardListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameLeaderboardListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameLeaderboard> objs;

        string method_name = "CachedGetGameLeaderboardListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboard>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardListByGameId(self
        , game_id
        ) :
            return self.act.GetGameLeaderboardListByGameId(
                game_id
            )
        
    def GetGameLeaderboardByGameId(self
        , game_id
    ) :
        for item in self.GetGameLeaderboardListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardListByGameId(self
        , game_id
    ) :
        return CachedGetGameLeaderboardListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameLeaderboardListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameLeaderboard> objs;

        string method_name = "CachedGetGameLeaderboardListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboard>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardListByCode(self
        , code
        ) :
            return self.act.GetGameLeaderboardListByCode(
                code
            )
        
    def GetGameLeaderboardByCode(self
        , code
    ) :
        for item in self.GetGameLeaderboardListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardListByCode(self
        , code
    ) :
        return CachedGetGameLeaderboardListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameLeaderboardListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameLeaderboard> objs;

        string method_name = "CachedGetGameLeaderboardListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboard>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardListByCodeByGameId(self
        , code
        , game_id
        ) :
            return self.act.GetGameLeaderboardListByCodeByGameId(
                code
                , game_id
            )
        
    def GetGameLeaderboardByCodeByGameId(self
        , code
        , game_id
    ) :
        for item in self.GetGameLeaderboardListByCodeByGameId(
        code
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardListByCodeByGameId(self
        , code
        , game_id
    ) :
        return CachedGetGameLeaderboardListByCodeByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
        )
        
    def CachedGetGameLeaderboardListByCodeByGameId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
    ) :
        pass
        """
        List<GameLeaderboard> objs;

        string method_name = "CachedGetGameLeaderboardListByCodeByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboard>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardListByCodeByGameId(
                code
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardListByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
        ) :
            return self.act.GetGameLeaderboardListByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            )
        
    def GetGameLeaderboardByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        for item in self.GetGameLeaderboardListByCodeByGameIdByProfileId(
        code
        , game_id
        , profile_id
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardListByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        return CachedGetGameLeaderboardListByCodeByGameIdByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
            , profile_id
        )
        
    def CachedGetGameLeaderboardListByCodeByGameIdByProfileId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
        , profile_id
    ) :
        pass
        """
        List<GameLeaderboard> objs;

        string method_name = "CachedGetGameLeaderboardListByCodeByGameIdByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboard>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardListByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
        ) :
            return self.act.GetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            )
        
    def GetGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        for item in self.GetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        return CachedGetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
            , profile_id
            , timestamp
        )
        
    def CachedGetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(self
        , overrideCache
        , cacheHours
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        pass
        """
        List<GameLeaderboard> objs;

        string method_name = "CachedGetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("timestamp".ToLower());
        sb.Append("_");
        sb.Append(timestamp);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboard>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardListByProfileIdByGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetGameLeaderboardListByProfileIdByGameId(
                profile_id
                , game_id
            )
        
    def GetGameLeaderboardByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetGameLeaderboardListByProfileIdByGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetGameLeaderboardListByProfileIdByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetGameLeaderboardListByProfileIdByGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameLeaderboard> objs;

        string method_name = "CachedGetGameLeaderboardListByProfileIdByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboard>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardListByProfileIdByGameId(
                profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameLeaderboardListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            )
        
    def GetGameLeaderboardByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameLeaderboardListByProfileIdByGameIdByTimestamp(
        profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameLeaderboardListByProfileIdByGameIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameLeaderboardListByProfileIdByGameIdByTimestamp(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameLeaderboard> objs;

        string method_name = "CachedGetGameLeaderboardListByProfileIdByGameIdByTimestamp";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("timestamp".ToLower());
        sb.Append("_");
        sb.Append(timestamp);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboard>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardItem(self
    ) :         
        return self.act.CountGameLeaderboardItem(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardItemByUuid(self
        , uuid
    ) :         
        return self.act.CountGameLeaderboardItemByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardItemByGameId(self
        , game_id
    ) :         
        return self.act.CountGameLeaderboardItemByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardItemByCode(self
        , code
    ) :         
        return self.act.CountGameLeaderboardItemByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardItemByCodeByGameId(self
        , code
        , game_id
    ) :         
        return self.act.CountGameLeaderboardItemByCodeByGameId(
        code
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardItemByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :         
        return self.act.CountGameLeaderboardItemByCodeByGameIdByProfileId(
        code
        , game_id
        , profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :         
        return self.act.CountGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardItemByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameLeaderboardItemByProfileIdByGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameLeaderboardItemListByFilter(self, filter_obj) :
        return self.act.BrowseGameLeaderboardItemListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameLeaderboardItemByUuidType(self, set_type, obj) :
        return self.act.SetGameLeaderboardItemByUuid(set_type, obj)
               
    def SetGameLeaderboardItemByUuid(self, obj) :
        return self.act.SetGameLeaderboardItemByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLeaderboardItemByUuidByProfileIdByGameIdByTimestampType(self, set_type, obj) :
        return self.act.SetGameLeaderboardItemByUuidByProfileIdByGameIdByTimestamp(set_type, obj)
               
    def SetGameLeaderboardItemByUuidByProfileIdByGameIdByTimestamp(self, obj) :
        return self.act.SetGameLeaderboardItemByUuidByProfileIdByGameIdByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLeaderboardItemByCodeType(self, set_type, obj) :
        return self.act.SetGameLeaderboardItemByCode(set_type, obj)
               
    def SetGameLeaderboardItemByCode(self, obj) :
        return self.act.SetGameLeaderboardItemByCode('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLeaderboardItemByCodeByGameIdType(self, set_type, obj) :
        return self.act.SetGameLeaderboardItemByCodeByGameId(set_type, obj)
               
    def SetGameLeaderboardItemByCodeByGameId(self, obj) :
        return self.act.SetGameLeaderboardItemByCodeByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLeaderboardItemByCodeByGameIdByProfileIdType(self, set_type, obj) :
        return self.act.SetGameLeaderboardItemByCodeByGameIdByProfileId(set_type, obj)
               
    def SetGameLeaderboardItemByCodeByGameIdByProfileId(self, obj) :
        return self.act.SetGameLeaderboardItemByCodeByGameIdByProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestampType(self, set_type, obj) :
        return self.act.SetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(set_type, obj)
               
    def SetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(self, obj) :
        return self.act.SetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameLeaderboardItemByUuid(self
        , uuid
    ) :          
        return self.act.DelGameLeaderboardItemByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameLeaderboardItemByCode(self
        , code
    ) :          
        return self.act.DelGameLeaderboardItemByCode(
        code
        )
#------------------------------------------------------------------------------                    
    def DelGameLeaderboardItemByCodeByGameId(self
        , code
        , game_id
    ) :          
        return self.act.DelGameLeaderboardItemByCodeByGameId(
        code
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameLeaderboardItemByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :          
        return self.act.DelGameLeaderboardItemByCodeByGameIdByProfileId(
        code
        , game_id
        , profile_id
        )
#------------------------------------------------------------------------------                    
    def DelGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :          
        return self.act.DelGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        )
#------------------------------------------------------------------------------                    
    def DelGameLeaderboardItemByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameLeaderboardItemByProfileIdByGameId(
        profile_id
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardItemList(self
        ) :
            return self.act.GetGameLeaderboardItemList(
            )
        
    def GetGameLeaderboardItem(self
    ) :
        for item in self.GetGameLeaderboardItemList(
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardItemList(self
    ) :
        return CachedGetGameLeaderboardItemList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameLeaderboardItemList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameLeaderboardItem> objs;

        string method_name = "CachedGetGameLeaderboardItemList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboardItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardItemList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardItemListByUuid(self
        , uuid
        ) :
            return self.act.GetGameLeaderboardItemListByUuid(
                uuid
            )
        
    def GetGameLeaderboardItemByUuid(self
        , uuid
    ) :
        for item in self.GetGameLeaderboardItemListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardItemListByUuid(self
        , uuid
    ) :
        return CachedGetGameLeaderboardItemListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameLeaderboardItemListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameLeaderboardItem> objs;

        string method_name = "CachedGetGameLeaderboardItemListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboardItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardItemListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardItemListByGameId(self
        , game_id
        ) :
            return self.act.GetGameLeaderboardItemListByGameId(
                game_id
            )
        
    def GetGameLeaderboardItemByGameId(self
        , game_id
    ) :
        for item in self.GetGameLeaderboardItemListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardItemListByGameId(self
        , game_id
    ) :
        return CachedGetGameLeaderboardItemListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameLeaderboardItemListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameLeaderboardItem> objs;

        string method_name = "CachedGetGameLeaderboardItemListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboardItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardItemListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardItemListByCode(self
        , code
        ) :
            return self.act.GetGameLeaderboardItemListByCode(
                code
            )
        
    def GetGameLeaderboardItemByCode(self
        , code
    ) :
        for item in self.GetGameLeaderboardItemListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardItemListByCode(self
        , code
    ) :
        return CachedGetGameLeaderboardItemListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameLeaderboardItemListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameLeaderboardItem> objs;

        string method_name = "CachedGetGameLeaderboardItemListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboardItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardItemListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardItemListByCodeByGameId(self
        , code
        , game_id
        ) :
            return self.act.GetGameLeaderboardItemListByCodeByGameId(
                code
                , game_id
            )
        
    def GetGameLeaderboardItemByCodeByGameId(self
        , code
        , game_id
    ) :
        for item in self.GetGameLeaderboardItemListByCodeByGameId(
        code
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardItemListByCodeByGameId(self
        , code
        , game_id
    ) :
        return CachedGetGameLeaderboardItemListByCodeByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
        )
        
    def CachedGetGameLeaderboardItemListByCodeByGameId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
    ) :
        pass
        """
        List<GameLeaderboardItem> objs;

        string method_name = "CachedGetGameLeaderboardItemListByCodeByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboardItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardItemListByCodeByGameId(
                code
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardItemListByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
        ) :
            return self.act.GetGameLeaderboardItemListByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            )
        
    def GetGameLeaderboardItemByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        for item in self.GetGameLeaderboardItemListByCodeByGameIdByProfileId(
        code
        , game_id
        , profile_id
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardItemListByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        return CachedGetGameLeaderboardItemListByCodeByGameIdByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
            , profile_id
        )
        
    def CachedGetGameLeaderboardItemListByCodeByGameIdByProfileId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
        , profile_id
    ) :
        pass
        """
        List<GameLeaderboardItem> objs;

        string method_name = "CachedGetGameLeaderboardItemListByCodeByGameIdByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboardItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardItemListByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
        ) :
            return self.act.GetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            )
        
    def GetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        for item in self.GetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        return CachedGetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
            , profile_id
            , timestamp
        )
        
    def CachedGetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(self
        , overrideCache
        , cacheHours
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        pass
        """
        List<GameLeaderboardItem> objs;

        string method_name = "CachedGetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("timestamp".ToLower());
        sb.Append("_");
        sb.Append(timestamp);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboardItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardItemListByProfileIdByGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetGameLeaderboardItemListByProfileIdByGameId(
                profile_id
                , game_id
            )
        
    def GetGameLeaderboardItemByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetGameLeaderboardItemListByProfileIdByGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardItemListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetGameLeaderboardItemListByProfileIdByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetGameLeaderboardItemListByProfileIdByGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameLeaderboardItem> objs;

        string method_name = "CachedGetGameLeaderboardItemListByProfileIdByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboardItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardItemListByProfileIdByGameId(
                profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            )
        
    def GetGameLeaderboardItemByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
        profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameLeaderboardItem> objs;

        string method_name = "CachedGetGameLeaderboardItemListByProfileIdByGameIdByTimestamp";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("timestamp".ToLower());
        sb.Append("_");
        sb.Append(timestamp);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboardItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardRollup(self
    ) :         
        return self.act.CountGameLeaderboardRollup(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardRollupByUuid(self
        , uuid
    ) :         
        return self.act.CountGameLeaderboardRollupByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardRollupByGameId(self
        , game_id
    ) :         
        return self.act.CountGameLeaderboardRollupByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardRollupByCode(self
        , code
    ) :         
        return self.act.CountGameLeaderboardRollupByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardRollupByCodeByGameId(self
        , code
        , game_id
    ) :         
        return self.act.CountGameLeaderboardRollupByCodeByGameId(
        code
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardRollupByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :         
        return self.act.CountGameLeaderboardRollupByCodeByGameIdByProfileId(
        code
        , game_id
        , profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :         
        return self.act.CountGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLeaderboardRollupByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameLeaderboardRollupByProfileIdByGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameLeaderboardRollupListByFilter(self, filter_obj) :
        return self.act.BrowseGameLeaderboardRollupListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameLeaderboardRollupByUuidType(self, set_type, obj) :
        return self.act.SetGameLeaderboardRollupByUuid(set_type, obj)
               
    def SetGameLeaderboardRollupByUuid(self, obj) :
        return self.act.SetGameLeaderboardRollupByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLeaderboardRollupByUuidByProfileIdByGameIdByTimestampType(self, set_type, obj) :
        return self.act.SetGameLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(set_type, obj)
               
    def SetGameLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(self, obj) :
        return self.act.SetGameLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLeaderboardRollupByCodeType(self, set_type, obj) :
        return self.act.SetGameLeaderboardRollupByCode(set_type, obj)
               
    def SetGameLeaderboardRollupByCode(self, obj) :
        return self.act.SetGameLeaderboardRollupByCode('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLeaderboardRollupByCodeByGameIdType(self, set_type, obj) :
        return self.act.SetGameLeaderboardRollupByCodeByGameId(set_type, obj)
               
    def SetGameLeaderboardRollupByCodeByGameId(self, obj) :
        return self.act.SetGameLeaderboardRollupByCodeByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLeaderboardRollupByCodeByGameIdByProfileIdType(self, set_type, obj) :
        return self.act.SetGameLeaderboardRollupByCodeByGameIdByProfileId(set_type, obj)
               
    def SetGameLeaderboardRollupByCodeByGameIdByProfileId(self, obj) :
        return self.act.SetGameLeaderboardRollupByCodeByGameIdByProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestampType(self, set_type, obj) :
        return self.act.SetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(set_type, obj)
               
    def SetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(self, obj) :
        return self.act.SetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameLeaderboardRollupByUuid(self
        , uuid
    ) :          
        return self.act.DelGameLeaderboardRollupByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameLeaderboardRollupByCode(self
        , code
    ) :          
        return self.act.DelGameLeaderboardRollupByCode(
        code
        )
#------------------------------------------------------------------------------                    
    def DelGameLeaderboardRollupByCodeByGameId(self
        , code
        , game_id
    ) :          
        return self.act.DelGameLeaderboardRollupByCodeByGameId(
        code
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameLeaderboardRollupByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :          
        return self.act.DelGameLeaderboardRollupByCodeByGameIdByProfileId(
        code
        , game_id
        , profile_id
        )
#------------------------------------------------------------------------------                    
    def DelGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :          
        return self.act.DelGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        )
#------------------------------------------------------------------------------                    
    def DelGameLeaderboardRollupByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameLeaderboardRollupByProfileIdByGameId(
        profile_id
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardRollupList(self
        ) :
            return self.act.GetGameLeaderboardRollupList(
            )
        
    def GetGameLeaderboardRollup(self
    ) :
        for item in self.GetGameLeaderboardRollupList(
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardRollupList(self
    ) :
        return CachedGetGameLeaderboardRollupList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameLeaderboardRollupList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameLeaderboardRollup> objs;

        string method_name = "CachedGetGameLeaderboardRollupList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboardRollup>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardRollupList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardRollupListByUuid(self
        , uuid
        ) :
            return self.act.GetGameLeaderboardRollupListByUuid(
                uuid
            )
        
    def GetGameLeaderboardRollupByUuid(self
        , uuid
    ) :
        for item in self.GetGameLeaderboardRollupListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardRollupListByUuid(self
        , uuid
    ) :
        return CachedGetGameLeaderboardRollupListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameLeaderboardRollupListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameLeaderboardRollup> objs;

        string method_name = "CachedGetGameLeaderboardRollupListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboardRollup>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardRollupListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardRollupListByGameId(self
        , game_id
        ) :
            return self.act.GetGameLeaderboardRollupListByGameId(
                game_id
            )
        
    def GetGameLeaderboardRollupByGameId(self
        , game_id
    ) :
        for item in self.GetGameLeaderboardRollupListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardRollupListByGameId(self
        , game_id
    ) :
        return CachedGetGameLeaderboardRollupListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameLeaderboardRollupListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameLeaderboardRollup> objs;

        string method_name = "CachedGetGameLeaderboardRollupListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboardRollup>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardRollupListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardRollupListByCode(self
        , code
        ) :
            return self.act.GetGameLeaderboardRollupListByCode(
                code
            )
        
    def GetGameLeaderboardRollupByCode(self
        , code
    ) :
        for item in self.GetGameLeaderboardRollupListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardRollupListByCode(self
        , code
    ) :
        return CachedGetGameLeaderboardRollupListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameLeaderboardRollupListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameLeaderboardRollup> objs;

        string method_name = "CachedGetGameLeaderboardRollupListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboardRollup>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardRollupListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardRollupListByCodeByGameId(self
        , code
        , game_id
        ) :
            return self.act.GetGameLeaderboardRollupListByCodeByGameId(
                code
                , game_id
            )
        
    def GetGameLeaderboardRollupByCodeByGameId(self
        , code
        , game_id
    ) :
        for item in self.GetGameLeaderboardRollupListByCodeByGameId(
        code
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardRollupListByCodeByGameId(self
        , code
        , game_id
    ) :
        return CachedGetGameLeaderboardRollupListByCodeByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
        )
        
    def CachedGetGameLeaderboardRollupListByCodeByGameId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
    ) :
        pass
        """
        List<GameLeaderboardRollup> objs;

        string method_name = "CachedGetGameLeaderboardRollupListByCodeByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboardRollup>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardRollupListByCodeByGameId(
                code
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardRollupListByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
        ) :
            return self.act.GetGameLeaderboardRollupListByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            )
        
    def GetGameLeaderboardRollupByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        for item in self.GetGameLeaderboardRollupListByCodeByGameIdByProfileId(
        code
        , game_id
        , profile_id
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardRollupListByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        return CachedGetGameLeaderboardRollupListByCodeByGameIdByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
            , profile_id
        )
        
    def CachedGetGameLeaderboardRollupListByCodeByGameIdByProfileId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
        , profile_id
    ) :
        pass
        """
        List<GameLeaderboardRollup> objs;

        string method_name = "CachedGetGameLeaderboardRollupListByCodeByGameIdByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboardRollup>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardRollupListByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
        ) :
            return self.act.GetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            )
        
    def GetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        for item in self.GetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        return CachedGetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
            , profile_id
            , timestamp
        )
        
    def CachedGetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(self
        , overrideCache
        , cacheHours
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        pass
        """
        List<GameLeaderboardRollup> objs;

        string method_name = "CachedGetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("timestamp".ToLower());
        sb.Append("_");
        sb.Append(timestamp);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboardRollup>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardRollupListByProfileIdByGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetGameLeaderboardRollupListByProfileIdByGameId(
                profile_id
                , game_id
            )
        
    def GetGameLeaderboardRollupByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetGameLeaderboardRollupListByProfileIdByGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardRollupListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetGameLeaderboardRollupListByProfileIdByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetGameLeaderboardRollupListByProfileIdByGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameLeaderboardRollup> objs;

        string method_name = "CachedGetGameLeaderboardRollupListByProfileIdByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboardRollup>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardRollupListByProfileIdByGameId(
                profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            )
        
    def GetGameLeaderboardRollupByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
        profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameLeaderboardRollup> objs;

        string method_name = "CachedGetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("timestamp".ToLower());
        sb.Append("_");
        sb.Append(timestamp);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLeaderboardRollup>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameLiveQueue(self
    ) :         
        return self.act.CountGameLiveQueue(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLiveQueueByUuid(self
        , uuid
    ) :         
        return self.act.CountGameLiveQueueByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLiveQueueByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameLiveQueueByProfileIdByGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameLiveQueueListByFilter(self, filter_obj) :
        return self.act.BrowseGameLiveQueueListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameLiveQueueByUuidType(self, set_type, obj) :
        return self.act.SetGameLiveQueueByUuid(set_type, obj)
               
    def SetGameLiveQueueByUuid(self, obj) :
        return self.act.SetGameLiveQueueByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLiveQueueByProfileIdByGameIdType(self, set_type, obj) :
        return self.act.SetGameLiveQueueByProfileIdByGameId(set_type, obj)
               
    def SetGameLiveQueueByProfileIdByGameId(self, obj) :
        return self.act.SetGameLiveQueueByProfileIdByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameLiveQueueByUuid(self
        , uuid
    ) :          
        return self.act.DelGameLiveQueueByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameLiveQueueByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameLiveQueueByProfileIdByGameId(
        profile_id
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameLiveQueueList(self
        ) :
            return self.act.GetGameLiveQueueList(
            )
        
    def GetGameLiveQueue(self
    ) :
        for item in self.GetGameLiveQueueList(
        ) :
            return item
        return None
    
    def CachedGetGameLiveQueueList(self
    ) :
        return CachedGetGameLiveQueueList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameLiveQueueList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameLiveQueue> objs;

        string method_name = "CachedGetGameLiveQueueList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLiveQueue>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLiveQueueList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLiveQueueListByUuid(self
        , uuid
        ) :
            return self.act.GetGameLiveQueueListByUuid(
                uuid
            )
        
    def GetGameLiveQueueByUuid(self
        , uuid
    ) :
        for item in self.GetGameLiveQueueListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameLiveQueueListByUuid(self
        , uuid
    ) :
        return CachedGetGameLiveQueueListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameLiveQueueListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameLiveQueue> objs;

        string method_name = "CachedGetGameLiveQueueListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLiveQueue>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLiveQueueListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLiveQueueListByGameId(self
        , game_id
        ) :
            return self.act.GetGameLiveQueueListByGameId(
                game_id
            )
        
    def GetGameLiveQueueByGameId(self
        , game_id
    ) :
        for item in self.GetGameLiveQueueListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameLiveQueueListByGameId(self
        , game_id
    ) :
        return CachedGetGameLiveQueueListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameLiveQueueListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameLiveQueue> objs;

        string method_name = "CachedGetGameLiveQueueListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLiveQueue>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLiveQueueListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLiveQueueListByProfileIdByGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetGameLiveQueueListByProfileIdByGameId(
                profile_id
                , game_id
            )
        
    def GetGameLiveQueueByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetGameLiveQueueListByProfileIdByGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameLiveQueueListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetGameLiveQueueListByProfileIdByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetGameLiveQueueListByProfileIdByGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameLiveQueue> objs;

        string method_name = "CachedGetGameLiveQueueListByProfileIdByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLiveQueue>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLiveQueueListByProfileIdByGameId(
                profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameLiveRecentQueue(self
    ) :         
        return self.act.CountGameLiveRecentQueue(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLiveRecentQueueByUuid(self
        , uuid
    ) :         
        return self.act.CountGameLiveRecentQueueByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLiveRecentQueueByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameLiveRecentQueueByProfileIdByGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameLiveRecentQueueListByFilter(self, filter_obj) :
        return self.act.BrowseGameLiveRecentQueueListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameLiveRecentQueueByUuidType(self, set_type, obj) :
        return self.act.SetGameLiveRecentQueueByUuid(set_type, obj)
               
    def SetGameLiveRecentQueueByUuid(self, obj) :
        return self.act.SetGameLiveRecentQueueByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLiveRecentQueueByProfileIdByGameIdType(self, set_type, obj) :
        return self.act.SetGameLiveRecentQueueByProfileIdByGameId(set_type, obj)
               
    def SetGameLiveRecentQueueByProfileIdByGameId(self, obj) :
        return self.act.SetGameLiveRecentQueueByProfileIdByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameLiveRecentQueueByUuid(self
        , uuid
    ) :          
        return self.act.DelGameLiveRecentQueueByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameLiveRecentQueueByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameLiveRecentQueueByProfileIdByGameId(
        profile_id
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameLiveRecentQueueList(self
        ) :
            return self.act.GetGameLiveRecentQueueList(
            )
        
    def GetGameLiveRecentQueue(self
    ) :
        for item in self.GetGameLiveRecentQueueList(
        ) :
            return item
        return None
    
    def CachedGetGameLiveRecentQueueList(self
    ) :
        return CachedGetGameLiveRecentQueueList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameLiveRecentQueueList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameLiveRecentQueue> objs;

        string method_name = "CachedGetGameLiveRecentQueueList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLiveRecentQueue>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLiveRecentQueueList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLiveRecentQueueListByUuid(self
        , uuid
        ) :
            return self.act.GetGameLiveRecentQueueListByUuid(
                uuid
            )
        
    def GetGameLiveRecentQueueByUuid(self
        , uuid
    ) :
        for item in self.GetGameLiveRecentQueueListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameLiveRecentQueueListByUuid(self
        , uuid
    ) :
        return CachedGetGameLiveRecentQueueListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameLiveRecentQueueListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameLiveRecentQueue> objs;

        string method_name = "CachedGetGameLiveRecentQueueListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLiveRecentQueue>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLiveRecentQueueListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLiveRecentQueueListByGameId(self
        , game_id
        ) :
            return self.act.GetGameLiveRecentQueueListByGameId(
                game_id
            )
        
    def GetGameLiveRecentQueueByGameId(self
        , game_id
    ) :
        for item in self.GetGameLiveRecentQueueListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameLiveRecentQueueListByGameId(self
        , game_id
    ) :
        return CachedGetGameLiveRecentQueueListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameLiveRecentQueueListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameLiveRecentQueue> objs;

        string method_name = "CachedGetGameLiveRecentQueueListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLiveRecentQueue>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLiveRecentQueueListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLiveRecentQueueListByProfileIdByGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetGameLiveRecentQueueListByProfileIdByGameId(
                profile_id
                , game_id
            )
        
    def GetGameLiveRecentQueueByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetGameLiveRecentQueueListByProfileIdByGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameLiveRecentQueueListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetGameLiveRecentQueueListByProfileIdByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetGameLiveRecentQueueListByProfileIdByGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameLiveRecentQueue> objs;

        string method_name = "CachedGetGameLiveRecentQueueListByProfileIdByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLiveRecentQueue>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLiveRecentQueueListByProfileIdByGameId(
                profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameProfileStatistic(self
    ) :         
        return self.act.CountGameProfileStatistic(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticByUuid(self
        , uuid
    ) :         
        return self.act.CountGameProfileStatisticByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticByCode(self
        , code
    ) :         
        return self.act.CountGameProfileStatisticByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticByGameId(self
        , game_id
    ) :         
        return self.act.CountGameProfileStatisticByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticByCodeByGameId(self
        , code
        , game_id
    ) :         
        return self.act.CountGameProfileStatisticByCodeByGameId(
        code
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameProfileStatisticByProfileIdByGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameProfileStatisticByCodeByProfileIdByGameId(
        code
        , profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.act.CountGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(
        code
        , profile_id
        , game_id
        , timestamp
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameProfileStatisticListByFilter(self, filter_obj) :
        return self.act.BrowseGameProfileStatisticListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticByUuidType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticByUuid(set_type, obj)
               
    def SetGameProfileStatisticByUuid(self, obj) :
        return self.act.SetGameProfileStatisticByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestampType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp(set_type, obj)
               
    def SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp(self, obj) :
        return self.act.SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticByProfileIdByCodeType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticByProfileIdByCode(set_type, obj)
               
    def SetGameProfileStatisticByProfileIdByCode(self, obj) :
        return self.act.SetGameProfileStatisticByProfileIdByCode('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticByProfileIdByCodeByTimestampType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticByProfileIdByCodeByTimestamp(set_type, obj)
               
    def SetGameProfileStatisticByProfileIdByCodeByTimestamp(self, obj) :
        return self.act.SetGameProfileStatisticByProfileIdByCodeByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticByCodeByProfileIdByGameIdByTimestampType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(set_type, obj)
               
    def SetGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(self, obj) :
        return self.act.SetGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticByCodeByProfileIdByGameIdType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticByCodeByProfileIdByGameId(set_type, obj)
               
    def SetGameProfileStatisticByCodeByProfileIdByGameId(self, obj) :
        return self.act.SetGameProfileStatisticByCodeByProfileIdByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameProfileStatisticByUuid(self
        , uuid
    ) :          
        return self.act.DelGameProfileStatisticByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileStatisticByCodeByGameId(self
        , code
        , game_id
    ) :          
        return self.act.DelGameProfileStatisticByCodeByGameId(
        code
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileStatisticByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameProfileStatisticByProfileIdByGameId(
        profile_id
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileStatisticByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameProfileStatisticByCodeByProfileIdByGameId(
        code
        , profile_id
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticListByUuid(self
        , uuid
        ) :
            return self.act.GetGameProfileStatisticListByUuid(
                uuid
            )
        
    def GetGameProfileStatisticByUuid(self
        , uuid
    ) :
        for item in self.GetGameProfileStatisticListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticListByUuid(self
        , uuid
    ) :
        return CachedGetGameProfileStatisticListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameProfileStatisticListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameProfileStatistic> objs;

        string method_name = "CachedGetGameProfileStatisticListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileStatistic>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileStatisticListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticListByCode(self
        , code
        ) :
            return self.act.GetGameProfileStatisticListByCode(
                code
            )
        
    def GetGameProfileStatisticByCode(self
        , code
    ) :
        for item in self.GetGameProfileStatisticListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticListByCode(self
        , code
    ) :
        return CachedGetGameProfileStatisticListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameProfileStatisticListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameProfileStatistic> objs;

        string method_name = "CachedGetGameProfileStatisticListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileStatistic>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileStatisticListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticListByGameId(self
        , game_id
        ) :
            return self.act.GetGameProfileStatisticListByGameId(
                game_id
            )
        
    def GetGameProfileStatisticByGameId(self
        , game_id
    ) :
        for item in self.GetGameProfileStatisticListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticListByGameId(self
        , game_id
    ) :
        return CachedGetGameProfileStatisticListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameProfileStatisticListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameProfileStatistic> objs;

        string method_name = "CachedGetGameProfileStatisticListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileStatistic>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileStatisticListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticListByCodeByGameId(self
        , code
        , game_id
        ) :
            return self.act.GetGameProfileStatisticListByCodeByGameId(
                code
                , game_id
            )
        
    def GetGameProfileStatisticByCodeByGameId(self
        , code
        , game_id
    ) :
        for item in self.GetGameProfileStatisticListByCodeByGameId(
        code
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticListByCodeByGameId(self
        , code
        , game_id
    ) :
        return CachedGetGameProfileStatisticListByCodeByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
        )
        
    def CachedGetGameProfileStatisticListByCodeByGameId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
    ) :
        pass
        """
        List<GameProfileStatistic> objs;

        string method_name = "CachedGetGameProfileStatisticListByCodeByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileStatistic>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileStatisticListByCodeByGameId(
                code
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticListByProfileIdByGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetGameProfileStatisticListByProfileIdByGameId(
                profile_id
                , game_id
            )
        
    def GetGameProfileStatisticByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetGameProfileStatisticListByProfileIdByGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetGameProfileStatisticListByProfileIdByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetGameProfileStatisticListByProfileIdByGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameProfileStatistic> objs;

        string method_name = "CachedGetGameProfileStatisticListByProfileIdByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileStatistic>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileStatisticListByProfileIdByGameId(
                profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            )
        
    def GetGameProfileStatisticByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
        profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameProfileStatisticListByProfileIdByGameIdByTimestamp(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameProfileStatistic> objs;

        string method_name = "CachedGetGameProfileStatisticListByProfileIdByGameIdByTimestamp";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("timestamp".ToLower());
        sb.Append("_");
        sb.Append(timestamp);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileStatistic>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticListByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
        ) :
            return self.act.GetGameProfileStatisticListByCodeByProfileIdByGameId(
                code
                , profile_id
                , game_id
            )
        
    def GetGameProfileStatisticByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :
        for item in self.GetGameProfileStatisticListByCodeByProfileIdByGameId(
        code
        , profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticListByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :
        return CachedGetGameProfileStatisticListByCodeByProfileIdByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , profile_id
            , game_id
        )
        
    def CachedGetGameProfileStatisticListByCodeByProfileIdByGameId(self
        , overrideCache
        , cacheHours
        , code
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameProfileStatistic> objs;

        string method_name = "CachedGetGameProfileStatisticListByCodeByProfileIdByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileStatistic>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileStatisticListByCodeByProfileIdByGameId(
                code
                , profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(
                code
                , profile_id
                , game_id
                , timestamp
            )
        
    def GetGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(
        code
        , profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(self
        , overrideCache
        , cacheHours
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameProfileStatistic> objs;

        string method_name = "CachedGetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("timestamp".ToLower());
        sb.Append("_");
        sb.Append(timestamp);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileStatistic>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(
                code
                , profile_id
                , game_id
                , timestamp
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameStatisticMeta(self
    ) :         
        return self.act.CountGameStatisticMeta(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticMetaByUuid(self
        , uuid
    ) :         
        return self.act.CountGameStatisticMetaByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticMetaByCode(self
        , code
    ) :         
        return self.act.CountGameStatisticMetaByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticMetaByCodeByGameId(self
        , code
        , game_id
    ) :         
        return self.act.CountGameStatisticMetaByCodeByGameId(
        code
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticMetaByName(self
        , name
    ) :         
        return self.act.CountGameStatisticMetaByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticMetaByGameId(self
        , game_id
    ) :         
        return self.act.CountGameStatisticMetaByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameStatisticMetaListByFilter(self, filter_obj) :
        return self.act.BrowseGameStatisticMetaListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticMetaByUuidType(self, set_type, obj) :
        return self.act.SetGameStatisticMetaByUuid(set_type, obj)
               
    def SetGameStatisticMetaByUuid(self, obj) :
        return self.act.SetGameStatisticMetaByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticMetaByCodeByGameIdType(self, set_type, obj) :
        return self.act.SetGameStatisticMetaByCodeByGameId(set_type, obj)
               
    def SetGameStatisticMetaByCodeByGameId(self, obj) :
        return self.act.SetGameStatisticMetaByCodeByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameStatisticMetaByUuid(self
        , uuid
    ) :          
        return self.act.DelGameStatisticMetaByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticMetaByCodeByGameId(self
        , code
        , game_id
    ) :          
        return self.act.DelGameStatisticMetaByCodeByGameId(
        code
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameStatisticMetaListByUuid(self
        , uuid
        ) :
            return self.act.GetGameStatisticMetaListByUuid(
                uuid
            )
        
    def GetGameStatisticMetaByUuid(self
        , uuid
    ) :
        for item in self.GetGameStatisticMetaListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameStatisticMetaListByUuid(self
        , uuid
    ) :
        return CachedGetGameStatisticMetaListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameStatisticMetaListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameStatisticMeta> objs;

        string method_name = "CachedGetGameStatisticMetaListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatisticMeta>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticMetaListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticMetaListByCode(self
        , code
        ) :
            return self.act.GetGameStatisticMetaListByCode(
                code
            )
        
    def GetGameStatisticMetaByCode(self
        , code
    ) :
        for item in self.GetGameStatisticMetaListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameStatisticMetaListByCode(self
        , code
    ) :
        return CachedGetGameStatisticMetaListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameStatisticMetaListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameStatisticMeta> objs;

        string method_name = "CachedGetGameStatisticMetaListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatisticMeta>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticMetaListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticMetaListByName(self
        , name
        ) :
            return self.act.GetGameStatisticMetaListByName(
                name
            )
        
    def GetGameStatisticMetaByName(self
        , name
    ) :
        for item in self.GetGameStatisticMetaListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetGameStatisticMetaListByName(self
        , name
    ) :
        return CachedGetGameStatisticMetaListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetGameStatisticMetaListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<GameStatisticMeta> objs;

        string method_name = "CachedGetGameStatisticMetaListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatisticMeta>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticMetaListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticMetaListByGameId(self
        , game_id
        ) :
            return self.act.GetGameStatisticMetaListByGameId(
                game_id
            )
        
    def GetGameStatisticMetaByGameId(self
        , game_id
    ) :
        for item in self.GetGameStatisticMetaListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticMetaListByGameId(self
        , game_id
    ) :
        return CachedGetGameStatisticMetaListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameStatisticMetaListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameStatisticMeta> objs;

        string method_name = "CachedGetGameStatisticMetaListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatisticMeta>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticMetaListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticMetaListByCodeByGameId(self
        , code
        , game_id
        ) :
            return self.act.GetGameStatisticMetaListByCodeByGameId(
                code
                , game_id
            )
        
    def GetGameStatisticMetaByCodeByGameId(self
        , code
        , game_id
    ) :
        for item in self.GetGameStatisticMetaListByCodeByGameId(
        code
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticMetaListByCodeByGameId(self
        , code
        , game_id
    ) :
        return CachedGetGameStatisticMetaListByCodeByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
        )
        
    def CachedGetGameStatisticMetaListByCodeByGameId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
    ) :
        pass
        """
        List<GameStatisticMeta> objs;

        string method_name = "CachedGetGameStatisticMetaListByCodeByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatisticMeta>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticMetaListByCodeByGameId(
                code
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticItem(self
    ) :         
        return self.act.CountGameProfileStatisticItem(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticItemByUuid(self
        , uuid
    ) :         
        return self.act.CountGameProfileStatisticItemByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticItemByCode(self
        , code
    ) :         
        return self.act.CountGameProfileStatisticItemByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticItemByGameId(self
        , game_id
    ) :         
        return self.act.CountGameProfileStatisticItemByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticItemByCodeByGameId(self
        , code
        , game_id
    ) :         
        return self.act.CountGameProfileStatisticItemByCodeByGameId(
        code
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticItemByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameProfileStatisticItemByProfileIdByGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticItemByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameProfileStatisticItemByCodeByProfileIdByGameId(
        code
        , profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.act.CountGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(
        code
        , profile_id
        , game_id
        , timestamp
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameProfileStatisticItemListByFilter(self, filter_obj) :
        return self.act.BrowseGameProfileStatisticItemListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticItemByUuidType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticItemByUuid(set_type, obj)
               
    def SetGameProfileStatisticItemByUuid(self, obj) :
        return self.act.SetGameProfileStatisticItemByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticItemByUuidByProfileIdByGameIdByTimestampType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticItemByUuidByProfileIdByGameIdByTimestamp(set_type, obj)
               
    def SetGameProfileStatisticItemByUuidByProfileIdByGameIdByTimestamp(self, obj) :
        return self.act.SetGameProfileStatisticItemByUuidByProfileIdByGameIdByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticItemByProfileIdByCodeType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticItemByProfileIdByCode(set_type, obj)
               
    def SetGameProfileStatisticItemByProfileIdByCode(self, obj) :
        return self.act.SetGameProfileStatisticItemByProfileIdByCode('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticItemByProfileIdByCodeByTimestampType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticItemByProfileIdByCodeByTimestamp(set_type, obj)
               
    def SetGameProfileStatisticItemByProfileIdByCodeByTimestamp(self, obj) :
        return self.act.SetGameProfileStatisticItemByProfileIdByCodeByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestampType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(set_type, obj)
               
    def SetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(self, obj) :
        return self.act.SetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticItemByCodeByProfileIdByGameIdType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticItemByCodeByProfileIdByGameId(set_type, obj)
               
    def SetGameProfileStatisticItemByCodeByProfileIdByGameId(self, obj) :
        return self.act.SetGameProfileStatisticItemByCodeByProfileIdByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameProfileStatisticItemByUuid(self
        , uuid
    ) :          
        return self.act.DelGameProfileStatisticItemByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileStatisticItemByCodeByGameId(self
        , code
        , game_id
    ) :          
        return self.act.DelGameProfileStatisticItemByCodeByGameId(
        code
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileStatisticItemByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameProfileStatisticItemByProfileIdByGameId(
        profile_id
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileStatisticItemByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameProfileStatisticItemByCodeByProfileIdByGameId(
        code
        , profile_id
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticItemListByUuid(self
        , uuid
        ) :
            return self.act.GetGameProfileStatisticItemListByUuid(
                uuid
            )
        
    def GetGameProfileStatisticItemByUuid(self
        , uuid
    ) :
        for item in self.GetGameProfileStatisticItemListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticItemListByUuid(self
        , uuid
    ) :
        return CachedGetGameProfileStatisticItemListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameProfileStatisticItemListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameProfileStatisticItem> objs;

        string method_name = "CachedGetGameProfileStatisticItemListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileStatisticItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileStatisticItemListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticItemListByCode(self
        , code
        ) :
            return self.act.GetGameProfileStatisticItemListByCode(
                code
            )
        
    def GetGameProfileStatisticItemByCode(self
        , code
    ) :
        for item in self.GetGameProfileStatisticItemListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticItemListByCode(self
        , code
    ) :
        return CachedGetGameProfileStatisticItemListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameProfileStatisticItemListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameProfileStatisticItem> objs;

        string method_name = "CachedGetGameProfileStatisticItemListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileStatisticItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileStatisticItemListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticItemListByGameId(self
        , game_id
        ) :
            return self.act.GetGameProfileStatisticItemListByGameId(
                game_id
            )
        
    def GetGameProfileStatisticItemByGameId(self
        , game_id
    ) :
        for item in self.GetGameProfileStatisticItemListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticItemListByGameId(self
        , game_id
    ) :
        return CachedGetGameProfileStatisticItemListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameProfileStatisticItemListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameProfileStatisticItem> objs;

        string method_name = "CachedGetGameProfileStatisticItemListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileStatisticItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileStatisticItemListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticItemListByCodeByGameId(self
        , code
        , game_id
        ) :
            return self.act.GetGameProfileStatisticItemListByCodeByGameId(
                code
                , game_id
            )
        
    def GetGameProfileStatisticItemByCodeByGameId(self
        , code
        , game_id
    ) :
        for item in self.GetGameProfileStatisticItemListByCodeByGameId(
        code
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticItemListByCodeByGameId(self
        , code
        , game_id
    ) :
        return CachedGetGameProfileStatisticItemListByCodeByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
        )
        
    def CachedGetGameProfileStatisticItemListByCodeByGameId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
    ) :
        pass
        """
        List<GameProfileStatisticItem> objs;

        string method_name = "CachedGetGameProfileStatisticItemListByCodeByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileStatisticItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileStatisticItemListByCodeByGameId(
                code
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticItemListByProfileIdByGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetGameProfileStatisticItemListByProfileIdByGameId(
                profile_id
                , game_id
            )
        
    def GetGameProfileStatisticItemByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetGameProfileStatisticItemListByProfileIdByGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticItemListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetGameProfileStatisticItemListByProfileIdByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetGameProfileStatisticItemListByProfileIdByGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameProfileStatisticItem> objs;

        string method_name = "CachedGetGameProfileStatisticItemListByProfileIdByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileStatisticItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileStatisticItemListByProfileIdByGameId(
                profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            )
        
    def GetGameProfileStatisticItemByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
        profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameProfileStatisticItem> objs;

        string method_name = "CachedGetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("timestamp".ToLower());
        sb.Append("_");
        sb.Append(timestamp);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileStatisticItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticItemListByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
        ) :
            return self.act.GetGameProfileStatisticItemListByCodeByProfileIdByGameId(
                code
                , profile_id
                , game_id
            )
        
    def GetGameProfileStatisticItemByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :
        for item in self.GetGameProfileStatisticItemListByCodeByProfileIdByGameId(
        code
        , profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticItemListByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :
        return CachedGetGameProfileStatisticItemListByCodeByProfileIdByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , profile_id
            , game_id
        )
        
    def CachedGetGameProfileStatisticItemListByCodeByProfileIdByGameId(self
        , overrideCache
        , cacheHours
        , code
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameProfileStatisticItem> objs;

        string method_name = "CachedGetGameProfileStatisticItemListByCodeByProfileIdByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileStatisticItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileStatisticItemListByCodeByProfileIdByGameId(
                code
                , profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(
                code
                , profile_id
                , game_id
                , timestamp
            )
        
    def GetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(
        code
        , profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(self
        , overrideCache
        , cacheHours
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameProfileStatisticItem> objs;

        string method_name = "CachedGetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("timestamp".ToLower());
        sb.Append("_");
        sb.Append(timestamp);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileStatisticItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(
                code
                , profile_id
                , game_id
                , timestamp
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameKeyMeta(self
    ) :         
        return self.act.CountGameKeyMeta(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameKeyMetaByUuid(self
        , uuid
    ) :         
        return self.act.CountGameKeyMetaByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameKeyMetaByCode(self
        , code
    ) :         
        return self.act.CountGameKeyMetaByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameKeyMetaByCodeByGameId(self
        , code
        , game_id
    ) :         
        return self.act.CountGameKeyMetaByCodeByGameId(
        code
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameKeyMetaByName(self
        , name
    ) :         
        return self.act.CountGameKeyMetaByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountGameKeyMetaByKey(self
        , key
    ) :         
        return self.act.CountGameKeyMetaByKey(
        key
        )
        
#------------------------------------------------------------------------------                    
    def CountGameKeyMetaByGameId(self
        , game_id
    ) :         
        return self.act.CountGameKeyMetaByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameKeyMetaByKeyByGameId(self
        , key
        , game_id
    ) :         
        return self.act.CountGameKeyMetaByKeyByGameId(
        key
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameKeyMetaListByFilter(self, filter_obj) :
        return self.act.BrowseGameKeyMetaListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameKeyMetaByUuidType(self, set_type, obj) :
        return self.act.SetGameKeyMetaByUuid(set_type, obj)
               
    def SetGameKeyMetaByUuid(self, obj) :
        return self.act.SetGameKeyMetaByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameKeyMetaByCodeByGameIdType(self, set_type, obj) :
        return self.act.SetGameKeyMetaByCodeByGameId(set_type, obj)
               
    def SetGameKeyMetaByCodeByGameId(self, obj) :
        return self.act.SetGameKeyMetaByCodeByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameKeyMetaByKeyByGameIdType(self, set_type, obj) :
        return self.act.SetGameKeyMetaByKeyByGameId(set_type, obj)
               
    def SetGameKeyMetaByKeyByGameId(self, obj) :
        return self.act.SetGameKeyMetaByKeyByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameKeyMetaByKeyByGameIdByLevelType(self, set_type, obj) :
        return self.act.SetGameKeyMetaByKeyByGameIdByLevel(set_type, obj)
               
    def SetGameKeyMetaByKeyByGameIdByLevel(self, obj) :
        return self.act.SetGameKeyMetaByKeyByGameIdByLevel('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameKeyMetaByUuid(self
        , uuid
    ) :          
        return self.act.DelGameKeyMetaByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameKeyMetaByCodeByGameId(self
        , code
        , game_id
    ) :          
        return self.act.DelGameKeyMetaByCodeByGameId(
        code
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameKeyMetaByKeyByGameId(self
        , key
        , game_id
    ) :          
        return self.act.DelGameKeyMetaByKeyByGameId(
        key
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameKeyMetaListByUuid(self
        , uuid
        ) :
            return self.act.GetGameKeyMetaListByUuid(
                uuid
            )
        
    def GetGameKeyMetaByUuid(self
        , uuid
    ) :
        for item in self.GetGameKeyMetaListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameKeyMetaListByUuid(self
        , uuid
    ) :
        return CachedGetGameKeyMetaListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameKeyMetaListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameKeyMeta> objs;

        string method_name = "CachedGetGameKeyMetaListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameKeyMeta>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameKeyMetaListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameKeyMetaListByCode(self
        , code
        ) :
            return self.act.GetGameKeyMetaListByCode(
                code
            )
        
    def GetGameKeyMetaByCode(self
        , code
    ) :
        for item in self.GetGameKeyMetaListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameKeyMetaListByCode(self
        , code
    ) :
        return CachedGetGameKeyMetaListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameKeyMetaListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameKeyMeta> objs;

        string method_name = "CachedGetGameKeyMetaListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameKeyMeta>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameKeyMetaListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameKeyMetaListByCodeByGameId(self
        , code
        , game_id
        ) :
            return self.act.GetGameKeyMetaListByCodeByGameId(
                code
                , game_id
            )
        
    def GetGameKeyMetaByCodeByGameId(self
        , code
        , game_id
    ) :
        for item in self.GetGameKeyMetaListByCodeByGameId(
        code
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameKeyMetaListByCodeByGameId(self
        , code
        , game_id
    ) :
        return CachedGetGameKeyMetaListByCodeByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
        )
        
    def CachedGetGameKeyMetaListByCodeByGameId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
    ) :
        pass
        """
        List<GameKeyMeta> objs;

        string method_name = "CachedGetGameKeyMetaListByCodeByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameKeyMeta>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameKeyMetaListByCodeByGameId(
                code
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameKeyMetaListByName(self
        , name
        ) :
            return self.act.GetGameKeyMetaListByName(
                name
            )
        
    def GetGameKeyMetaByName(self
        , name
    ) :
        for item in self.GetGameKeyMetaListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetGameKeyMetaListByName(self
        , name
    ) :
        return CachedGetGameKeyMetaListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetGameKeyMetaListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<GameKeyMeta> objs;

        string method_name = "CachedGetGameKeyMetaListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameKeyMeta>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameKeyMetaListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameKeyMetaListByKey(self
        , key
        ) :
            return self.act.GetGameKeyMetaListByKey(
                key
            )
        
    def GetGameKeyMetaByKey(self
        , key
    ) :
        for item in self.GetGameKeyMetaListByKey(
        key
        ) :
            return item
        return None
    
    def CachedGetGameKeyMetaListByKey(self
        , key
    ) :
        return CachedGetGameKeyMetaListByKey(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
        )
        
    def CachedGetGameKeyMetaListByKey(self
        , overrideCache
        , cacheHours
        , key
    ) :
        pass
        """
        List<GameKeyMeta> objs;

        string method_name = "CachedGetGameKeyMetaListByKey";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("key".ToLower());
        sb.Append("_");
        sb.Append(key);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameKeyMeta>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameKeyMetaListByKey(
                key
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameKeyMetaListByGameId(self
        , game_id
        ) :
            return self.act.GetGameKeyMetaListByGameId(
                game_id
            )
        
    def GetGameKeyMetaByGameId(self
        , game_id
    ) :
        for item in self.GetGameKeyMetaListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameKeyMetaListByGameId(self
        , game_id
    ) :
        return CachedGetGameKeyMetaListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameKeyMetaListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameKeyMeta> objs;

        string method_name = "CachedGetGameKeyMetaListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameKeyMeta>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameKeyMetaListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameKeyMetaListByKeyByGameId(self
        , key
        , game_id
        ) :
            return self.act.GetGameKeyMetaListByKeyByGameId(
                key
                , game_id
            )
        
    def GetGameKeyMetaByKeyByGameId(self
        , key
        , game_id
    ) :
        for item in self.GetGameKeyMetaListByKeyByGameId(
        key
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameKeyMetaListByKeyByGameId(self
        , key
        , game_id
    ) :
        return CachedGetGameKeyMetaListByKeyByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
            , game_id
        )
        
    def CachedGetGameKeyMetaListByKeyByGameId(self
        , overrideCache
        , cacheHours
        , key
        , game_id
    ) :
        pass
        """
        List<GameKeyMeta> objs;

        string method_name = "CachedGetGameKeyMetaListByKeyByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("key".ToLower());
        sb.Append("_");
        sb.Append(key);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameKeyMeta>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameKeyMetaListByKeyByGameId(
                key
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameKeyMetaListByCodeByLevel(self
        , code
        , level
        ) :
            return self.act.GetGameKeyMetaListByCodeByLevel(
                code
                , level
            )
        
    def GetGameKeyMetaByCodeByLevel(self
        , code
        , level
    ) :
        for item in self.GetGameKeyMetaListByCodeByLevel(
        code
        , level
        ) :
            return item
        return None
    
    def CachedGetGameKeyMetaListByCodeByLevel(self
        , code
        , level
    ) :
        return CachedGetGameKeyMetaListByCodeByLevel(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , level
        )
        
    def CachedGetGameKeyMetaListByCodeByLevel(self
        , overrideCache
        , cacheHours
        , code
        , level
    ) :
        pass
        """
        List<GameKeyMeta> objs;

        string method_name = "CachedGetGameKeyMetaListByCodeByLevel";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("level".ToLower());
        sb.Append("_");
        sb.Append(level);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameKeyMeta>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameKeyMetaListByCodeByLevel(
                code
                , level
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameLevel(self
    ) :         
        return self.act.CountGameLevel(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLevelByUuid(self
        , uuid
    ) :         
        return self.act.CountGameLevelByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLevelByCode(self
        , code
    ) :         
        return self.act.CountGameLevelByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLevelByCodeByGameId(self
        , code
        , game_id
    ) :         
        return self.act.CountGameLevelByCodeByGameId(
        code
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLevelByName(self
        , name
    ) :         
        return self.act.CountGameLevelByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLevelByGameId(self
        , game_id
    ) :         
        return self.act.CountGameLevelByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameLevelListByFilter(self, filter_obj) :
        return self.act.BrowseGameLevelListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameLevelByUuidType(self, set_type, obj) :
        return self.act.SetGameLevelByUuid(set_type, obj)
               
    def SetGameLevelByUuid(self, obj) :
        return self.act.SetGameLevelByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLevelByCodeByGameIdType(self, set_type, obj) :
        return self.act.SetGameLevelByCodeByGameId(set_type, obj)
               
    def SetGameLevelByCodeByGameId(self, obj) :
        return self.act.SetGameLevelByCodeByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameLevelByUuid(self
        , uuid
    ) :          
        return self.act.DelGameLevelByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameLevelByCodeByGameId(self
        , code
        , game_id
    ) :          
        return self.act.DelGameLevelByCodeByGameId(
        code
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameLevelListByUuid(self
        , uuid
        ) :
            return self.act.GetGameLevelListByUuid(
                uuid
            )
        
    def GetGameLevelByUuid(self
        , uuid
    ) :
        for item in self.GetGameLevelListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameLevelListByUuid(self
        , uuid
    ) :
        return CachedGetGameLevelListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameLevelListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameLevel> objs;

        string method_name = "CachedGetGameLevelListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLevel>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLevelListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLevelListByCode(self
        , code
        ) :
            return self.act.GetGameLevelListByCode(
                code
            )
        
    def GetGameLevelByCode(self
        , code
    ) :
        for item in self.GetGameLevelListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameLevelListByCode(self
        , code
    ) :
        return CachedGetGameLevelListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameLevelListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameLevel> objs;

        string method_name = "CachedGetGameLevelListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLevel>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLevelListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLevelListByCodeByGameId(self
        , code
        , game_id
        ) :
            return self.act.GetGameLevelListByCodeByGameId(
                code
                , game_id
            )
        
    def GetGameLevelByCodeByGameId(self
        , code
        , game_id
    ) :
        for item in self.GetGameLevelListByCodeByGameId(
        code
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameLevelListByCodeByGameId(self
        , code
        , game_id
    ) :
        return CachedGetGameLevelListByCodeByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
        )
        
    def CachedGetGameLevelListByCodeByGameId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
    ) :
        pass
        """
        List<GameLevel> objs;

        string method_name = "CachedGetGameLevelListByCodeByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLevel>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLevelListByCodeByGameId(
                code
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLevelListByName(self
        , name
        ) :
            return self.act.GetGameLevelListByName(
                name
            )
        
    def GetGameLevelByName(self
        , name
    ) :
        for item in self.GetGameLevelListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetGameLevelListByName(self
        , name
    ) :
        return CachedGetGameLevelListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetGameLevelListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<GameLevel> objs;

        string method_name = "CachedGetGameLevelListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLevel>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLevelListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLevelListByGameId(self
        , game_id
        ) :
            return self.act.GetGameLevelListByGameId(
                game_id
            )
        
    def GetGameLevelByGameId(self
        , game_id
    ) :
        for item in self.GetGameLevelListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameLevelListByGameId(self
        , game_id
    ) :
        return CachedGetGameLevelListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameLevelListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameLevel> objs;

        string method_name = "CachedGetGameLevelListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLevel>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLevelListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameProfileAchievement(self
    ) :         
        return self.act.CountGameProfileAchievement(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAchievementByUuid(self
        , uuid
    ) :         
        return self.act.CountGameProfileAchievementByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAchievementByProfileIdByCode(self
        , profile_id
        , code
    ) :         
        return self.act.CountGameProfileAchievementByProfileIdByCode(
        profile_id
        , code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAchievementByUsername(self
        , username
    ) :         
        return self.act.CountGameProfileAchievementByUsername(
        username
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAchievementByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameProfileAchievementByCodeByProfileIdByGameId(
        code
        , profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.act.CountGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(
        code
        , profile_id
        , game_id
        , timestamp
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameProfileAchievementListByFilter(self, filter_obj) :
        return self.act.BrowseGameProfileAchievementListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAchievementByUuidType(self, set_type, obj) :
        return self.act.SetGameProfileAchievementByUuid(set_type, obj)
               
    def SetGameProfileAchievementByUuid(self, obj) :
        return self.act.SetGameProfileAchievementByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAchievementByUuidByCodeType(self, set_type, obj) :
        return self.act.SetGameProfileAchievementByUuidByCode(set_type, obj)
               
    def SetGameProfileAchievementByUuidByCode(self, obj) :
        return self.act.SetGameProfileAchievementByUuidByCode('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAchievementByProfileIdByCodeType(self, set_type, obj) :
        return self.act.SetGameProfileAchievementByProfileIdByCode(set_type, obj)
               
    def SetGameProfileAchievementByProfileIdByCode(self, obj) :
        return self.act.SetGameProfileAchievementByProfileIdByCode('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAchievementByCodeByProfileIdByGameIdType(self, set_type, obj) :
        return self.act.SetGameProfileAchievementByCodeByProfileIdByGameId(set_type, obj)
               
    def SetGameProfileAchievementByCodeByProfileIdByGameId(self, obj) :
        return self.act.SetGameProfileAchievementByCodeByProfileIdByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAchievementByCodeByProfileIdByGameIdByTimestampType(self, set_type, obj) :
        return self.act.SetGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(set_type, obj)
               
    def SetGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(self, obj) :
        return self.act.SetGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameProfileAchievementByUuid(self
        , uuid
    ) :          
        return self.act.DelGameProfileAchievementByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileAchievementByProfileIdByCode(self
        , profile_id
        , code
    ) :          
        return self.act.DelGameProfileAchievementByProfileIdByCode(
        profile_id
        , code
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileAchievementByUuidByCode(self
        , uuid
        , code
    ) :          
        return self.act.DelGameProfileAchievementByUuidByCode(
        uuid
        , code
        )
#------------------------------------------------------------------------------                    
    def GetGameProfileAchievementListByUuid(self
        , uuid
        ) :
            return self.act.GetGameProfileAchievementListByUuid(
                uuid
            )
        
    def GetGameProfileAchievementByUuid(self
        , uuid
    ) :
        for item in self.GetGameProfileAchievementListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameProfileAchievementListByUuid(self
        , uuid
    ) :
        return CachedGetGameProfileAchievementListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameProfileAchievementListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameProfileAchievement> objs;

        string method_name = "CachedGetGameProfileAchievementListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAchievementListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAchievementListByProfileIdByCode(self
        , profile_id
        , code
        ) :
            return self.act.GetGameProfileAchievementListByProfileIdByCode(
                profile_id
                , code
            )
        
    def GetGameProfileAchievementByProfileIdByCode(self
        , profile_id
        , code
    ) :
        for item in self.GetGameProfileAchievementListByProfileIdByCode(
        profile_id
        , code
        ) :
            return item
        return None
    
    def CachedGetGameProfileAchievementListByProfileIdByCode(self
        , profile_id
        , code
    ) :
        return CachedGetGameProfileAchievementListByProfileIdByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , code
        )
        
    def CachedGetGameProfileAchievementListByProfileIdByCode(self
        , overrideCache
        , cacheHours
        , profile_id
        , code
    ) :
        pass
        """
        List<GameProfileAchievement> objs;

        string method_name = "CachedGetGameProfileAchievementListByProfileIdByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAchievementListByProfileIdByCode(
                profile_id
                , code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAchievementListByUsername(self
        , username
        ) :
            return self.act.GetGameProfileAchievementListByUsername(
                username
            )
        
    def GetGameProfileAchievementByUsername(self
        , username
    ) :
        for item in self.GetGameProfileAchievementListByUsername(
        username
        ) :
            return item
        return None
    
    def CachedGetGameProfileAchievementListByUsername(self
        , username
    ) :
        return CachedGetGameProfileAchievementListByUsername(
            false
            , self.CACHE_DEFAULT_HOURS
            , username
        )
        
    def CachedGetGameProfileAchievementListByUsername(self
        , overrideCache
        , cacheHours
        , username
    ) :
        pass
        """
        List<GameProfileAchievement> objs;

        string method_name = "CachedGetGameProfileAchievementListByUsername";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("username".ToLower());
        sb.Append("_");
        sb.Append(username);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAchievementListByUsername(
                username
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAchievementListByCode(self
        , code
        ) :
            return self.act.GetGameProfileAchievementListByCode(
                code
            )
        
    def GetGameProfileAchievementByCode(self
        , code
    ) :
        for item in self.GetGameProfileAchievementListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameProfileAchievementListByCode(self
        , code
    ) :
        return CachedGetGameProfileAchievementListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameProfileAchievementListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameProfileAchievement> objs;

        string method_name = "CachedGetGameProfileAchievementListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAchievementListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAchievementListByGameId(self
        , game_id
        ) :
            return self.act.GetGameProfileAchievementListByGameId(
                game_id
            )
        
    def GetGameProfileAchievementByGameId(self
        , game_id
    ) :
        for item in self.GetGameProfileAchievementListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileAchievementListByGameId(self
        , game_id
    ) :
        return CachedGetGameProfileAchievementListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameProfileAchievementListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameProfileAchievement> objs;

        string method_name = "CachedGetGameProfileAchievementListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAchievementListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAchievementListByCodeByGameId(self
        , code
        , game_id
        ) :
            return self.act.GetGameProfileAchievementListByCodeByGameId(
                code
                , game_id
            )
        
    def GetGameProfileAchievementByCodeByGameId(self
        , code
        , game_id
    ) :
        for item in self.GetGameProfileAchievementListByCodeByGameId(
        code
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileAchievementListByCodeByGameId(self
        , code
        , game_id
    ) :
        return CachedGetGameProfileAchievementListByCodeByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
        )
        
    def CachedGetGameProfileAchievementListByCodeByGameId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
    ) :
        pass
        """
        List<GameProfileAchievement> objs;

        string method_name = "CachedGetGameProfileAchievementListByCodeByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAchievementListByCodeByGameId(
                code
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAchievementListByProfileIdByGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetGameProfileAchievementListByProfileIdByGameId(
                profile_id
                , game_id
            )
        
    def GetGameProfileAchievementByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetGameProfileAchievementListByProfileIdByGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileAchievementListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetGameProfileAchievementListByProfileIdByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetGameProfileAchievementListByProfileIdByGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameProfileAchievement> objs;

        string method_name = "CachedGetGameProfileAchievementListByProfileIdByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAchievementListByProfileIdByGameId(
                profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            )
        
    def GetGameProfileAchievementByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
        profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameProfileAchievementListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameProfileAchievementListByProfileIdByGameIdByTimestamp(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameProfileAchievement> objs;

        string method_name = "CachedGetGameProfileAchievementListByProfileIdByGameIdByTimestamp";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("timestamp".ToLower());
        sb.Append("_");
        sb.Append(timestamp);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAchievementListByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
        ) :
            return self.act.GetGameProfileAchievementListByCodeByProfileIdByGameId(
                code
                , profile_id
                , game_id
            )
        
    def GetGameProfileAchievementByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :
        for item in self.GetGameProfileAchievementListByCodeByProfileIdByGameId(
        code
        , profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileAchievementListByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :
        return CachedGetGameProfileAchievementListByCodeByProfileIdByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , profile_id
            , game_id
        )
        
    def CachedGetGameProfileAchievementListByCodeByProfileIdByGameId(self
        , overrideCache
        , cacheHours
        , code
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameProfileAchievement> objs;

        string method_name = "CachedGetGameProfileAchievementListByCodeByProfileIdByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAchievementListByCodeByProfileIdByGameId(
                code
                , profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(
                code
                , profile_id
                , game_id
                , timestamp
            )
        
    def GetGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(
        code
        , profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(self
        , overrideCache
        , cacheHours
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameProfileAchievement> objs;

        string method_name = "CachedGetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);
        sb.Append("_");
        sb.Append("timestamp".ToLower());
        sb.Append("_");
        sb.Append(timestamp);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileAchievement>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(
                code
                , profile_id
                , game_id
                , timestamp
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameAchievementMeta(self
    ) :         
        return self.act.CountGameAchievementMeta(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAchievementMetaByUuid(self
        , uuid
    ) :         
        return self.act.CountGameAchievementMetaByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAchievementMetaByCode(self
        , code
    ) :         
        return self.act.CountGameAchievementMetaByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAchievementMetaByCodeByGameId(self
        , code
        , game_id
    ) :         
        return self.act.CountGameAchievementMetaByCodeByGameId(
        code
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAchievementMetaByName(self
        , name
    ) :         
        return self.act.CountGameAchievementMetaByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAchievementMetaByGameId(self
        , game_id
    ) :         
        return self.act.CountGameAchievementMetaByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameAchievementMetaListByFilter(self, filter_obj) :
        return self.act.BrowseGameAchievementMetaListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameAchievementMetaByUuidType(self, set_type, obj) :
        return self.act.SetGameAchievementMetaByUuid(set_type, obj)
               
    def SetGameAchievementMetaByUuid(self, obj) :
        return self.act.SetGameAchievementMetaByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameAchievementMetaByCodeByGameIdType(self, set_type, obj) :
        return self.act.SetGameAchievementMetaByCodeByGameId(set_type, obj)
               
    def SetGameAchievementMetaByCodeByGameId(self, obj) :
        return self.act.SetGameAchievementMetaByCodeByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameAchievementMetaByUuid(self
        , uuid
    ) :          
        return self.act.DelGameAchievementMetaByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameAchievementMetaByCodeByGameId(self
        , code
        , game_id
    ) :          
        return self.act.DelGameAchievementMetaByCodeByGameId(
        code
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameAchievementMetaListByUuid(self
        , uuid
        ) :
            return self.act.GetGameAchievementMetaListByUuid(
                uuid
            )
        
    def GetGameAchievementMetaByUuid(self
        , uuid
    ) :
        for item in self.GetGameAchievementMetaListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameAchievementMetaListByUuid(self
        , uuid
    ) :
        return CachedGetGameAchievementMetaListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameAchievementMetaListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameAchievementMeta> objs;

        string method_name = "CachedGetGameAchievementMetaListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAchievementMeta>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAchievementMetaListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAchievementMetaListByCode(self
        , code
        ) :
            return self.act.GetGameAchievementMetaListByCode(
                code
            )
        
    def GetGameAchievementMetaByCode(self
        , code
    ) :
        for item in self.GetGameAchievementMetaListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameAchievementMetaListByCode(self
        , code
    ) :
        return CachedGetGameAchievementMetaListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameAchievementMetaListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameAchievementMeta> objs;

        string method_name = "CachedGetGameAchievementMetaListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAchievementMeta>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAchievementMetaListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAchievementMetaListByCodeByGameId(self
        , code
        , game_id
        ) :
            return self.act.GetGameAchievementMetaListByCodeByGameId(
                code
                , game_id
            )
        
    def GetGameAchievementMetaByCodeByGameId(self
        , code
        , game_id
    ) :
        for item in self.GetGameAchievementMetaListByCodeByGameId(
        code
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameAchievementMetaListByCodeByGameId(self
        , code
        , game_id
    ) :
        return CachedGetGameAchievementMetaListByCodeByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
        )
        
    def CachedGetGameAchievementMetaListByCodeByGameId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
    ) :
        pass
        """
        List<GameAchievementMeta> objs;

        string method_name = "CachedGetGameAchievementMetaListByCodeByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAchievementMeta>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAchievementMetaListByCodeByGameId(
                code
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAchievementMetaListByName(self
        , name
        ) :
            return self.act.GetGameAchievementMetaListByName(
                name
            )
        
    def GetGameAchievementMetaByName(self
        , name
    ) :
        for item in self.GetGameAchievementMetaListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetGameAchievementMetaListByName(self
        , name
    ) :
        return CachedGetGameAchievementMetaListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetGameAchievementMetaListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<GameAchievementMeta> objs;

        string method_name = "CachedGetGameAchievementMetaListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAchievementMeta>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAchievementMetaListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAchievementMetaListByGameId(self
        , game_id
        ) :
            return self.act.GetGameAchievementMetaListByGameId(
                game_id
            )
        
    def GetGameAchievementMetaByGameId(self
        , game_id
    ) :
        for item in self.GetGameAchievementMetaListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameAchievementMetaListByGameId(self
        , game_id
    ) :
        return CachedGetGameAchievementMetaListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameAchievementMetaListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameAchievementMeta> objs;

        string method_name = "CachedGetGameAchievementMetaListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAchievementMeta>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAchievementMetaListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountProfileReward(self
    ) :         
        return self.act.CountProfileReward(
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileRewardByUuid(self
        , uuid
    ) :         
        return self.act.CountProfileRewardByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileRewardByProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileRewardByProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileRewardByRewardId(self
        , reward_id
    ) :         
        return self.act.CountProfileRewardByRewardId(
        reward_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileRewardByProfileIdByRewardId(self
        , profile_id
        , reward_id
    ) :         
        return self.act.CountProfileRewardByProfileIdByRewardId(
        profile_id
        , reward_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileRewardByProfileIdByChannelId(self
        , profile_id
        , channel_id
    ) :         
        return self.act.CountProfileRewardByProfileIdByChannelId(
        profile_id
        , channel_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileRewardByProfileIdByChannelIdByRewardId(self
        , profile_id
        , channel_id
        , reward_id
    ) :         
        return self.act.CountProfileRewardByProfileIdByChannelIdByRewardId(
        profile_id
        , channel_id
        , reward_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileRewardListByFilter(self, filter_obj) :
        return self.act.BrowseProfileRewardListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileRewardByUuidType(self, set_type, obj) :
        return self.act.SetProfileRewardByUuid(set_type, obj)
               
    def SetProfileRewardByUuid(self, obj) :
        return self.act.SetProfileRewardByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileRewardByProfileIdByChannelIdByRewardIdType(self, set_type, obj) :
        return self.act.SetProfileRewardByProfileIdByChannelIdByRewardId(set_type, obj)
               
    def SetProfileRewardByProfileIdByChannelIdByRewardId(self, obj) :
        return self.act.SetProfileRewardByProfileIdByChannelIdByRewardId('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileRewardByUuid(self
        , uuid
    ) :          
        return self.act.DelProfileRewardByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileRewardByProfileIdByRewardId(self
        , profile_id
        , reward_id
    ) :          
        return self.act.DelProfileRewardByProfileIdByRewardId(
        profile_id
        , reward_id
        )
#------------------------------------------------------------------------------                    
    def GetProfileRewardListByUuid(self
        , uuid
        ) :
            return self.act.GetProfileRewardListByUuid(
                uuid
            )
        
    def GetProfileRewardByUuid(self
        , uuid
    ) :
        for item in self.GetProfileRewardListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileRewardListByUuid(self
        , uuid
    ) :
        return CachedGetProfileRewardListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileRewardListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileReward> objs;

        string method_name = "CachedGetProfileRewardListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileReward>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileRewardListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileRewardListByProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileRewardListByProfileId(
                profile_id
            )
        
    def GetProfileRewardByProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileRewardListByProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileRewardListByProfileId(self
        , profile_id
    ) :
        return CachedGetProfileRewardListByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileRewardListByProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileReward> objs;

        string method_name = "CachedGetProfileRewardListByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileReward>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileRewardListByProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileRewardListByRewardId(self
        , reward_id
        ) :
            return self.act.GetProfileRewardListByRewardId(
                reward_id
            )
        
    def GetProfileRewardByRewardId(self
        , reward_id
    ) :
        for item in self.GetProfileRewardListByRewardId(
        reward_id
        ) :
            return item
        return None
    
    def CachedGetProfileRewardListByRewardId(self
        , reward_id
    ) :
        return CachedGetProfileRewardListByRewardId(
            false
            , self.CACHE_DEFAULT_HOURS
            , reward_id
        )
        
    def CachedGetProfileRewardListByRewardId(self
        , overrideCache
        , cacheHours
        , reward_id
    ) :
        pass
        """
        List<ProfileReward> objs;

        string method_name = "CachedGetProfileRewardListByRewardId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("reward_id".ToLower());
        sb.Append("_");
        sb.Append(reward_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileReward>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileRewardListByRewardId(
                reward_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileRewardListByProfileIdByRewardId(self
        , profile_id
        , reward_id
        ) :
            return self.act.GetProfileRewardListByProfileIdByRewardId(
                profile_id
                , reward_id
            )
        
    def GetProfileRewardByProfileIdByRewardId(self
        , profile_id
        , reward_id
    ) :
        for item in self.GetProfileRewardListByProfileIdByRewardId(
        profile_id
        , reward_id
        ) :
            return item
        return None
    
    def CachedGetProfileRewardListByProfileIdByRewardId(self
        , profile_id
        , reward_id
    ) :
        return CachedGetProfileRewardListByProfileIdByRewardId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , reward_id
        )
        
    def CachedGetProfileRewardListByProfileIdByRewardId(self
        , overrideCache
        , cacheHours
        , profile_id
        , reward_id
    ) :
        pass
        """
        List<ProfileReward> objs;

        string method_name = "CachedGetProfileRewardListByProfileIdByRewardId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("reward_id".ToLower());
        sb.Append("_");
        sb.Append(reward_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileReward>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileRewardListByProfileIdByRewardId(
                profile_id
                , reward_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileRewardListByProfileIdByChannelId(self
        , profile_id
        , channel_id
        ) :
            return self.act.GetProfileRewardListByProfileIdByChannelId(
                profile_id
                , channel_id
            )
        
    def GetProfileRewardByProfileIdByChannelId(self
        , profile_id
        , channel_id
    ) :
        for item in self.GetProfileRewardListByProfileIdByChannelId(
        profile_id
        , channel_id
        ) :
            return item
        return None
    
    def CachedGetProfileRewardListByProfileIdByChannelId(self
        , profile_id
        , channel_id
    ) :
        return CachedGetProfileRewardListByProfileIdByChannelId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , channel_id
        )
        
    def CachedGetProfileRewardListByProfileIdByChannelId(self
        , overrideCache
        , cacheHours
        , profile_id
        , channel_id
    ) :
        pass
        """
        List<ProfileReward> objs;

        string method_name = "CachedGetProfileRewardListByProfileIdByChannelId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("channel_id".ToLower());
        sb.Append("_");
        sb.Append(channel_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileReward>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileRewardListByProfileIdByChannelId(
                profile_id
                , channel_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileRewardListByProfileIdByChannelIdByRewardId(self
        , profile_id
        , channel_id
        , reward_id
        ) :
            return self.act.GetProfileRewardListByProfileIdByChannelIdByRewardId(
                profile_id
                , channel_id
                , reward_id
            )
        
    def GetProfileRewardByProfileIdByChannelIdByRewardId(self
        , profile_id
        , channel_id
        , reward_id
    ) :
        for item in self.GetProfileRewardListByProfileIdByChannelIdByRewardId(
        profile_id
        , channel_id
        , reward_id
        ) :
            return item
        return None
    
    def CachedGetProfileRewardListByProfileIdByChannelIdByRewardId(self
        , profile_id
        , channel_id
        , reward_id
    ) :
        return CachedGetProfileRewardListByProfileIdByChannelIdByRewardId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , channel_id
            , reward_id
        )
        
    def CachedGetProfileRewardListByProfileIdByChannelIdByRewardId(self
        , overrideCache
        , cacheHours
        , profile_id
        , channel_id
        , reward_id
    ) :
        pass
        """
        List<ProfileReward> objs;

        string method_name = "CachedGetProfileRewardListByProfileIdByChannelIdByRewardId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("channel_id".ToLower());
        sb.Append("_");
        sb.Append(channel_id);
        sb.Append("_");
        sb.Append("reward_id".ToLower());
        sb.Append("_");
        sb.Append(reward_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileReward>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileRewardListByProfileIdByChannelIdByRewardId(
                profile_id
                , channel_id
                , reward_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountCoupon(self
    ) :         
        return self.act.CountCoupon(
        )
        
#------------------------------------------------------------------------------                    
    def CountCouponByUuid(self
        , uuid
    ) :         
        return self.act.CountCouponByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountCouponByCode(self
        , code
    ) :         
        return self.act.CountCouponByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountCouponByName(self
        , name
    ) :         
        return self.act.CountCouponByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountCouponByOrgId(self
        , org_id
    ) :         
        return self.act.CountCouponByOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseCouponListByFilter(self, filter_obj) :
        return self.act.BrowseCouponListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetCouponByUuidType(self, set_type, obj) :
        return self.act.SetCouponByUuid(set_type, obj)
               
    def SetCouponByUuid(self, obj) :
        return self.act.SetCouponByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelCouponByUuid(self
        , uuid
    ) :          
        return self.act.DelCouponByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelCouponByOrgId(self
        , org_id
    ) :          
        return self.act.DelCouponByOrgId(
        org_id
        )
#------------------------------------------------------------------------------                    
    def GetCouponListByUuid(self
        , uuid
        ) :
            return self.act.GetCouponListByUuid(
                uuid
            )
        
    def GetCouponByUuid(self
        , uuid
    ) :
        for item in self.GetCouponListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetCouponListByUuid(self
        , uuid
    ) :
        return CachedGetCouponListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetCouponListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Coupon> objs;

        string method_name = "CachedGetCouponListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Coupon>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetCouponListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetCouponListByCode(self
        , code
        ) :
            return self.act.GetCouponListByCode(
                code
            )
        
    def GetCouponByCode(self
        , code
    ) :
        for item in self.GetCouponListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetCouponListByCode(self
        , code
    ) :
        return CachedGetCouponListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetCouponListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<Coupon> objs;

        string method_name = "CachedGetCouponListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Coupon>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetCouponListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetCouponListByName(self
        , name
        ) :
            return self.act.GetCouponListByName(
                name
            )
        
    def GetCouponByName(self
        , name
    ) :
        for item in self.GetCouponListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetCouponListByName(self
        , name
    ) :
        return CachedGetCouponListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetCouponListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<Coupon> objs;

        string method_name = "CachedGetCouponListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Coupon>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetCouponListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetCouponListByOrgId(self
        , org_id
        ) :
            return self.act.GetCouponListByOrgId(
                org_id
            )
        
    def GetCouponByOrgId(self
        , org_id
    ) :
        for item in self.GetCouponListByOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetCouponListByOrgId(self
        , org_id
    ) :
        return CachedGetCouponListByOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetCouponListByOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<Coupon> objs;

        string method_name = "CachedGetCouponListByOrgId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Coupon>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetCouponListByOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountProfileCoupon(self
    ) :         
        return self.act.CountProfileCoupon(
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileCouponByUuid(self
        , uuid
    ) :         
        return self.act.CountProfileCouponByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileCouponByProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileCouponByProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileCouponListByFilter(self, filter_obj) :
        return self.act.BrowseProfileCouponListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileCouponByUuidType(self, set_type, obj) :
        return self.act.SetProfileCouponByUuid(set_type, obj)
               
    def SetProfileCouponByUuid(self, obj) :
        return self.act.SetProfileCouponByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileCouponByUuid(self
        , uuid
    ) :          
        return self.act.DelProfileCouponByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileCouponByProfileId(self
        , profile_id
    ) :          
        return self.act.DelProfileCouponByProfileId(
        profile_id
        )
#------------------------------------------------------------------------------                    
    def GetProfileCouponListByUuid(self
        , uuid
        ) :
            return self.act.GetProfileCouponListByUuid(
                uuid
            )
        
    def GetProfileCouponByUuid(self
        , uuid
    ) :
        for item in self.GetProfileCouponListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileCouponListByUuid(self
        , uuid
    ) :
        return CachedGetProfileCouponListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileCouponListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileCoupon> objs;

        string method_name = "CachedGetProfileCouponListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileCoupon>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileCouponListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileCouponListByProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileCouponListByProfileId(
                profile_id
            )
        
    def GetProfileCouponByProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileCouponListByProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileCouponListByProfileId(self
        , profile_id
    ) :
        return CachedGetProfileCouponListByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileCouponListByProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileCoupon> objs;

        string method_name = "CachedGetProfileCouponListByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileCoupon>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileCouponListByProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountOrg(self
    ) :         
        return self.act.CountOrg(
        )
        
#------------------------------------------------------------------------------                    
    def CountOrgByUuid(self
        , uuid
    ) :         
        return self.act.CountOrgByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountOrgByCode(self
        , code
    ) :         
        return self.act.CountOrgByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountOrgByName(self
        , name
    ) :         
        return self.act.CountOrgByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def BrowseOrgListByFilter(self, filter_obj) :
        return self.act.BrowseOrgListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetOrgByUuidType(self, set_type, obj) :
        return self.act.SetOrgByUuid(set_type, obj)
               
    def SetOrgByUuid(self, obj) :
        return self.act.SetOrgByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelOrgByUuid(self
        , uuid
    ) :          
        return self.act.DelOrgByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetOrgListByUuid(self
        , uuid
        ) :
            return self.act.GetOrgListByUuid(
                uuid
            )
        
    def GetOrgByUuid(self
        , uuid
    ) :
        for item in self.GetOrgListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetOrgListByUuid(self
        , uuid
    ) :
        return CachedGetOrgListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetOrgListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Org> objs;

        string method_name = "CachedGetOrgListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Org>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOrgListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOrgListByCode(self
        , code
        ) :
            return self.act.GetOrgListByCode(
                code
            )
        
    def GetOrgByCode(self
        , code
    ) :
        for item in self.GetOrgListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetOrgListByCode(self
        , code
    ) :
        return CachedGetOrgListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetOrgListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<Org> objs;

        string method_name = "CachedGetOrgListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Org>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOrgListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOrgListByName(self
        , name
        ) :
            return self.act.GetOrgListByName(
                name
            )
        
    def GetOrgByName(self
        , name
    ) :
        for item in self.GetOrgListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetOrgListByName(self
        , name
    ) :
        return CachedGetOrgListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetOrgListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<Org> objs;

        string method_name = "CachedGetOrgListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Org>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOrgListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountChannel(self
    ) :         
        return self.act.CountChannel(
        )
        
#------------------------------------------------------------------------------                    
    def CountChannelByUuid(self
        , uuid
    ) :         
        return self.act.CountChannelByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountChannelByCode(self
        , code
    ) :         
        return self.act.CountChannelByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountChannelByName(self
        , name
    ) :         
        return self.act.CountChannelByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountChannelByOrgId(self
        , org_id
    ) :         
        return self.act.CountChannelByOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountChannelByTypeId(self
        , type_id
    ) :         
        return self.act.CountChannelByTypeId(
        type_id
        )
        
#------------------------------------------------------------------------------                    
    def CountChannelByOrgIdByTypeId(self
        , org_id
        , type_id
    ) :         
        return self.act.CountChannelByOrgIdByTypeId(
        org_id
        , type_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseChannelListByFilter(self, filter_obj) :
        return self.act.BrowseChannelListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetChannelByUuidType(self, set_type, obj) :
        return self.act.SetChannelByUuid(set_type, obj)
               
    def SetChannelByUuid(self, obj) :
        return self.act.SetChannelByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelChannelByUuid(self
        , uuid
    ) :          
        return self.act.DelChannelByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelChannelByCodeByOrgId(self
        , code
        , org_id
    ) :          
        return self.act.DelChannelByCodeByOrgId(
        code
        , org_id
        )
#------------------------------------------------------------------------------                    
    def DelChannelByCodeByOrgIdByTypeId(self
        , code
        , org_id
        , type_id
    ) :          
        return self.act.DelChannelByCodeByOrgIdByTypeId(
        code
        , org_id
        , type_id
        )
#------------------------------------------------------------------------------                    
    def GetChannelListByUuid(self
        , uuid
        ) :
            return self.act.GetChannelListByUuid(
                uuid
            )
        
    def GetChannelByUuid(self
        , uuid
    ) :
        for item in self.GetChannelListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetChannelListByUuid(self
        , uuid
    ) :
        return CachedGetChannelListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetChannelListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Channel> objs;

        string method_name = "CachedGetChannelListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Channel>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetChannelListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetChannelListByCode(self
        , code
        ) :
            return self.act.GetChannelListByCode(
                code
            )
        
    def GetChannelByCode(self
        , code
    ) :
        for item in self.GetChannelListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetChannelListByCode(self
        , code
    ) :
        return CachedGetChannelListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetChannelListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<Channel> objs;

        string method_name = "CachedGetChannelListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Channel>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetChannelListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetChannelListByName(self
        , name
        ) :
            return self.act.GetChannelListByName(
                name
            )
        
    def GetChannelByName(self
        , name
    ) :
        for item in self.GetChannelListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetChannelListByName(self
        , name
    ) :
        return CachedGetChannelListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetChannelListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<Channel> objs;

        string method_name = "CachedGetChannelListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Channel>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetChannelListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetChannelListByOrgId(self
        , org_id
        ) :
            return self.act.GetChannelListByOrgId(
                org_id
            )
        
    def GetChannelByOrgId(self
        , org_id
    ) :
        for item in self.GetChannelListByOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetChannelListByOrgId(self
        , org_id
    ) :
        return CachedGetChannelListByOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetChannelListByOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<Channel> objs;

        string method_name = "CachedGetChannelListByOrgId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Channel>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetChannelListByOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetChannelListByTypeId(self
        , type_id
        ) :
            return self.act.GetChannelListByTypeId(
                type_id
            )
        
    def GetChannelByTypeId(self
        , type_id
    ) :
        for item in self.GetChannelListByTypeId(
        type_id
        ) :
            return item
        return None
    
    def CachedGetChannelListByTypeId(self
        , type_id
    ) :
        return CachedGetChannelListByTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , type_id
        )
        
    def CachedGetChannelListByTypeId(self
        , overrideCache
        , cacheHours
        , type_id
    ) :
        pass
        """
        List<Channel> objs;

        string method_name = "CachedGetChannelListByTypeId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("type_id".ToLower());
        sb.Append("_");
        sb.Append(type_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Channel>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetChannelListByTypeId(
                type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetChannelListByOrgIdByTypeId(self
        , org_id
        , type_id
        ) :
            return self.act.GetChannelListByOrgIdByTypeId(
                org_id
                , type_id
            )
        
    def GetChannelByOrgIdByTypeId(self
        , org_id
        , type_id
    ) :
        for item in self.GetChannelListByOrgIdByTypeId(
        org_id
        , type_id
        ) :
            return item
        return None
    
    def CachedGetChannelListByOrgIdByTypeId(self
        , org_id
        , type_id
    ) :
        return CachedGetChannelListByOrgIdByTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
            , type_id
        )
        
    def CachedGetChannelListByOrgIdByTypeId(self
        , overrideCache
        , cacheHours
        , org_id
        , type_id
    ) :
        pass
        """
        List<Channel> objs;

        string method_name = "CachedGetChannelListByOrgIdByTypeId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);
        sb.Append("_");
        sb.Append("type_id".ToLower());
        sb.Append("_");
        sb.Append(type_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Channel>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetChannelListByOrgIdByTypeId(
                org_id
                , type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountChannelType(self
    ) :         
        return self.act.CountChannelType(
        )
        
#------------------------------------------------------------------------------                    
    def CountChannelTypeByUuid(self
        , uuid
    ) :         
        return self.act.CountChannelTypeByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountChannelTypeByCode(self
        , code
    ) :         
        return self.act.CountChannelTypeByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountChannelTypeByName(self
        , name
    ) :         
        return self.act.CountChannelTypeByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def BrowseChannelTypeListByFilter(self, filter_obj) :
        return self.act.BrowseChannelTypeListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetChannelTypeByUuidType(self, set_type, obj) :
        return self.act.SetChannelTypeByUuid(set_type, obj)
               
    def SetChannelTypeByUuid(self, obj) :
        return self.act.SetChannelTypeByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelChannelTypeByUuid(self
        , uuid
    ) :          
        return self.act.DelChannelTypeByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetChannelTypeListByUuid(self
        , uuid
        ) :
            return self.act.GetChannelTypeListByUuid(
                uuid
            )
        
    def GetChannelTypeByUuid(self
        , uuid
    ) :
        for item in self.GetChannelTypeListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetChannelTypeListByUuid(self
        , uuid
    ) :
        return CachedGetChannelTypeListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetChannelTypeListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ChannelType> objs;

        string method_name = "CachedGetChannelTypeListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ChannelType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetChannelTypeListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetChannelTypeListByCode(self
        , code
        ) :
            return self.act.GetChannelTypeListByCode(
                code
            )
        
    def GetChannelTypeByCode(self
        , code
    ) :
        for item in self.GetChannelTypeListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetChannelTypeListByCode(self
        , code
    ) :
        return CachedGetChannelTypeListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetChannelTypeListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<ChannelType> objs;

        string method_name = "CachedGetChannelTypeListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ChannelType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetChannelTypeListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetChannelTypeListByName(self
        , name
        ) :
            return self.act.GetChannelTypeListByName(
                name
            )
        
    def GetChannelTypeByName(self
        , name
    ) :
        for item in self.GetChannelTypeListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetChannelTypeListByName(self
        , name
    ) :
        return CachedGetChannelTypeListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetChannelTypeListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<ChannelType> objs;

        string method_name = "CachedGetChannelTypeListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ChannelType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetChannelTypeListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountReward(self
    ) :         
        return self.act.CountReward(
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardByUuid(self
        , uuid
    ) :         
        return self.act.CountRewardByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardByCode(self
        , code
    ) :         
        return self.act.CountRewardByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardByName(self
        , name
    ) :         
        return self.act.CountRewardByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardByOrgId(self
        , org_id
    ) :         
        return self.act.CountRewardByOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardByChannelId(self
        , channel_id
    ) :         
        return self.act.CountRewardByChannelId(
        channel_id
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardByOrgIdByChannelId(self
        , org_id
        , channel_id
    ) :         
        return self.act.CountRewardByOrgIdByChannelId(
        org_id
        , channel_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseRewardListByFilter(self, filter_obj) :
        return self.act.BrowseRewardListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetRewardByUuidType(self, set_type, obj) :
        return self.act.SetRewardByUuid(set_type, obj)
               
    def SetRewardByUuid(self, obj) :
        return self.act.SetRewardByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelRewardByUuid(self
        , uuid
    ) :          
        return self.act.DelRewardByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelRewardByOrgIdByChannelId(self
        , org_id
        , channel_id
    ) :          
        return self.act.DelRewardByOrgIdByChannelId(
        org_id
        , channel_id
        )
#------------------------------------------------------------------------------                    
    def GetRewardListByUuid(self
        , uuid
        ) :
            return self.act.GetRewardListByUuid(
                uuid
            )
        
    def GetRewardByUuid(self
        , uuid
    ) :
        for item in self.GetRewardListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetRewardListByUuid(self
        , uuid
    ) :
        return CachedGetRewardListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetRewardListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Reward> objs;

        string method_name = "CachedGetRewardListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Reward>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardListByCode(self
        , code
        ) :
            return self.act.GetRewardListByCode(
                code
            )
        
    def GetRewardByCode(self
        , code
    ) :
        for item in self.GetRewardListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetRewardListByCode(self
        , code
    ) :
        return CachedGetRewardListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetRewardListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<Reward> objs;

        string method_name = "CachedGetRewardListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Reward>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardListByName(self
        , name
        ) :
            return self.act.GetRewardListByName(
                name
            )
        
    def GetRewardByName(self
        , name
    ) :
        for item in self.GetRewardListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetRewardListByName(self
        , name
    ) :
        return CachedGetRewardListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetRewardListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<Reward> objs;

        string method_name = "CachedGetRewardListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Reward>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardListByOrgId(self
        , org_id
        ) :
            return self.act.GetRewardListByOrgId(
                org_id
            )
        
    def GetRewardByOrgId(self
        , org_id
    ) :
        for item in self.GetRewardListByOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetRewardListByOrgId(self
        , org_id
    ) :
        return CachedGetRewardListByOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetRewardListByOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<Reward> objs;

        string method_name = "CachedGetRewardListByOrgId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Reward>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardListByOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardListByChannelId(self
        , channel_id
        ) :
            return self.act.GetRewardListByChannelId(
                channel_id
            )
        
    def GetRewardByChannelId(self
        , channel_id
    ) :
        for item in self.GetRewardListByChannelId(
        channel_id
        ) :
            return item
        return None
    
    def CachedGetRewardListByChannelId(self
        , channel_id
    ) :
        return CachedGetRewardListByChannelId(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
        )
        
    def CachedGetRewardListByChannelId(self
        , overrideCache
        , cacheHours
        , channel_id
    ) :
        pass
        """
        List<Reward> objs;

        string method_name = "CachedGetRewardListByChannelId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("channel_id".ToLower());
        sb.Append("_");
        sb.Append(channel_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Reward>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardListByChannelId(
                channel_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardListByOrgIdByChannelId(self
        , org_id
        , channel_id
        ) :
            return self.act.GetRewardListByOrgIdByChannelId(
                org_id
                , channel_id
            )
        
    def GetRewardByOrgIdByChannelId(self
        , org_id
        , channel_id
    ) :
        for item in self.GetRewardListByOrgIdByChannelId(
        org_id
        , channel_id
        ) :
            return item
        return None
    
    def CachedGetRewardListByOrgIdByChannelId(self
        , org_id
        , channel_id
    ) :
        return CachedGetRewardListByOrgIdByChannelId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
            , channel_id
        )
        
    def CachedGetRewardListByOrgIdByChannelId(self
        , overrideCache
        , cacheHours
        , org_id
        , channel_id
    ) :
        pass
        """
        List<Reward> objs;

        string method_name = "CachedGetRewardListByOrgIdByChannelId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);
        sb.Append("_");
        sb.Append("channel_id".ToLower());
        sb.Append("_");
        sb.Append(channel_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Reward>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardListByOrgIdByChannelId(
                org_id
                , channel_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountRewardType(self
    ) :         
        return self.act.CountRewardType(
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardTypeByUuid(self
        , uuid
    ) :         
        return self.act.CountRewardTypeByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardTypeByCode(self
        , code
    ) :         
        return self.act.CountRewardTypeByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardTypeByName(self
        , name
    ) :         
        return self.act.CountRewardTypeByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardTypeByType(self
        , type
    ) :         
        return self.act.CountRewardTypeByType(
        type
        )
        
#------------------------------------------------------------------------------                    
    def BrowseRewardTypeListByFilter(self, filter_obj) :
        return self.act.BrowseRewardTypeListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetRewardTypeByUuidType(self, set_type, obj) :
        return self.act.SetRewardTypeByUuid(set_type, obj)
               
    def SetRewardTypeByUuid(self, obj) :
        return self.act.SetRewardTypeByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelRewardTypeByUuid(self
        , uuid
    ) :          
        return self.act.DelRewardTypeByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetRewardTypeListByUuid(self
        , uuid
        ) :
            return self.act.GetRewardTypeListByUuid(
                uuid
            )
        
    def GetRewardTypeByUuid(self
        , uuid
    ) :
        for item in self.GetRewardTypeListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetRewardTypeListByUuid(self
        , uuid
    ) :
        return CachedGetRewardTypeListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetRewardTypeListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<RewardType> objs;

        string method_name = "CachedGetRewardTypeListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardTypeListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardTypeListByCode(self
        , code
        ) :
            return self.act.GetRewardTypeListByCode(
                code
            )
        
    def GetRewardTypeByCode(self
        , code
    ) :
        for item in self.GetRewardTypeListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetRewardTypeListByCode(self
        , code
    ) :
        return CachedGetRewardTypeListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetRewardTypeListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<RewardType> objs;

        string method_name = "CachedGetRewardTypeListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardTypeListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardTypeListByName(self
        , name
        ) :
            return self.act.GetRewardTypeListByName(
                name
            )
        
    def GetRewardTypeByName(self
        , name
    ) :
        for item in self.GetRewardTypeListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetRewardTypeListByName(self
        , name
    ) :
        return CachedGetRewardTypeListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetRewardTypeListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<RewardType> objs;

        string method_name = "CachedGetRewardTypeListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardTypeListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardTypeListByType(self
        , type
        ) :
            return self.act.GetRewardTypeListByType(
                type
            )
        
    def GetRewardTypeByType(self
        , type
    ) :
        for item in self.GetRewardTypeListByType(
        type
        ) :
            return item
        return None
    
    def CachedGetRewardTypeListByType(self
        , type
    ) :
        return CachedGetRewardTypeListByType(
            false
            , self.CACHE_DEFAULT_HOURS
            , type
        )
        
    def CachedGetRewardTypeListByType(self
        , overrideCache
        , cacheHours
        , type
    ) :
        pass
        """
        List<RewardType> objs;

        string method_name = "CachedGetRewardTypeListByType";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("type".ToLower());
        sb.Append("_");
        sb.Append(type);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardTypeListByType(
                type
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountRewardCondition(self
    ) :         
        return self.act.CountRewardCondition(
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardConditionByUuid(self
        , uuid
    ) :         
        return self.act.CountRewardConditionByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardConditionByCode(self
        , code
    ) :         
        return self.act.CountRewardConditionByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardConditionByName(self
        , name
    ) :         
        return self.act.CountRewardConditionByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardConditionByOrgId(self
        , org_id
    ) :         
        return self.act.CountRewardConditionByOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardConditionByChannelId(self
        , channel_id
    ) :         
        return self.act.CountRewardConditionByChannelId(
        channel_id
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardConditionByOrgIdByChannelId(self
        , org_id
        , channel_id
    ) :         
        return self.act.CountRewardConditionByOrgIdByChannelId(
        org_id
        , channel_id
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardConditionByOrgIdByChannelIdByRewardId(self
        , org_id
        , channel_id
        , reward_id
    ) :         
        return self.act.CountRewardConditionByOrgIdByChannelIdByRewardId(
        org_id
        , channel_id
        , reward_id
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardConditionByRewardId(self
        , reward_id
    ) :         
        return self.act.CountRewardConditionByRewardId(
        reward_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseRewardConditionListByFilter(self, filter_obj) :
        return self.act.BrowseRewardConditionListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetRewardConditionByUuidType(self, set_type, obj) :
        return self.act.SetRewardConditionByUuid(set_type, obj)
               
    def SetRewardConditionByUuid(self, obj) :
        return self.act.SetRewardConditionByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelRewardConditionByUuid(self
        , uuid
    ) :          
        return self.act.DelRewardConditionByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelRewardConditionByOrgIdByChannelIdByRewardId(self
        , org_id
        , channel_id
        , reward_id
    ) :          
        return self.act.DelRewardConditionByOrgIdByChannelIdByRewardId(
        org_id
        , channel_id
        , reward_id
        )
#------------------------------------------------------------------------------                    
    def GetRewardConditionListByUuid(self
        , uuid
        ) :
            return self.act.GetRewardConditionListByUuid(
                uuid
            )
        
    def GetRewardConditionByUuid(self
        , uuid
    ) :
        for item in self.GetRewardConditionListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetRewardConditionListByUuid(self
        , uuid
    ) :
        return CachedGetRewardConditionListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetRewardConditionListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<RewardCondition> objs;

        string method_name = "CachedGetRewardConditionListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardCondition>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardConditionListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardConditionListByCode(self
        , code
        ) :
            return self.act.GetRewardConditionListByCode(
                code
            )
        
    def GetRewardConditionByCode(self
        , code
    ) :
        for item in self.GetRewardConditionListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetRewardConditionListByCode(self
        , code
    ) :
        return CachedGetRewardConditionListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetRewardConditionListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<RewardCondition> objs;

        string method_name = "CachedGetRewardConditionListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardCondition>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardConditionListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardConditionListByName(self
        , name
        ) :
            return self.act.GetRewardConditionListByName(
                name
            )
        
    def GetRewardConditionByName(self
        , name
    ) :
        for item in self.GetRewardConditionListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetRewardConditionListByName(self
        , name
    ) :
        return CachedGetRewardConditionListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetRewardConditionListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<RewardCondition> objs;

        string method_name = "CachedGetRewardConditionListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardCondition>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardConditionListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardConditionListByOrgId(self
        , org_id
        ) :
            return self.act.GetRewardConditionListByOrgId(
                org_id
            )
        
    def GetRewardConditionByOrgId(self
        , org_id
    ) :
        for item in self.GetRewardConditionListByOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetRewardConditionListByOrgId(self
        , org_id
    ) :
        return CachedGetRewardConditionListByOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetRewardConditionListByOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<RewardCondition> objs;

        string method_name = "CachedGetRewardConditionListByOrgId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardCondition>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardConditionListByOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardConditionListByChannelId(self
        , channel_id
        ) :
            return self.act.GetRewardConditionListByChannelId(
                channel_id
            )
        
    def GetRewardConditionByChannelId(self
        , channel_id
    ) :
        for item in self.GetRewardConditionListByChannelId(
        channel_id
        ) :
            return item
        return None
    
    def CachedGetRewardConditionListByChannelId(self
        , channel_id
    ) :
        return CachedGetRewardConditionListByChannelId(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
        )
        
    def CachedGetRewardConditionListByChannelId(self
        , overrideCache
        , cacheHours
        , channel_id
    ) :
        pass
        """
        List<RewardCondition> objs;

        string method_name = "CachedGetRewardConditionListByChannelId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("channel_id".ToLower());
        sb.Append("_");
        sb.Append(channel_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardCondition>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardConditionListByChannelId(
                channel_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardConditionListByOrgIdByChannelId(self
        , org_id
        , channel_id
        ) :
            return self.act.GetRewardConditionListByOrgIdByChannelId(
                org_id
                , channel_id
            )
        
    def GetRewardConditionByOrgIdByChannelId(self
        , org_id
        , channel_id
    ) :
        for item in self.GetRewardConditionListByOrgIdByChannelId(
        org_id
        , channel_id
        ) :
            return item
        return None
    
    def CachedGetRewardConditionListByOrgIdByChannelId(self
        , org_id
        , channel_id
    ) :
        return CachedGetRewardConditionListByOrgIdByChannelId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
            , channel_id
        )
        
    def CachedGetRewardConditionListByOrgIdByChannelId(self
        , overrideCache
        , cacheHours
        , org_id
        , channel_id
    ) :
        pass
        """
        List<RewardCondition> objs;

        string method_name = "CachedGetRewardConditionListByOrgIdByChannelId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);
        sb.Append("_");
        sb.Append("channel_id".ToLower());
        sb.Append("_");
        sb.Append(channel_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardCondition>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardConditionListByOrgIdByChannelId(
                org_id
                , channel_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardConditionListByOrgIdByChannelIdByRewardId(self
        , org_id
        , channel_id
        , reward_id
        ) :
            return self.act.GetRewardConditionListByOrgIdByChannelIdByRewardId(
                org_id
                , channel_id
                , reward_id
            )
        
    def GetRewardConditionByOrgIdByChannelIdByRewardId(self
        , org_id
        , channel_id
        , reward_id
    ) :
        for item in self.GetRewardConditionListByOrgIdByChannelIdByRewardId(
        org_id
        , channel_id
        , reward_id
        ) :
            return item
        return None
    
    def CachedGetRewardConditionListByOrgIdByChannelIdByRewardId(self
        , org_id
        , channel_id
        , reward_id
    ) :
        return CachedGetRewardConditionListByOrgIdByChannelIdByRewardId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
            , channel_id
            , reward_id
        )
        
    def CachedGetRewardConditionListByOrgIdByChannelIdByRewardId(self
        , overrideCache
        , cacheHours
        , org_id
        , channel_id
        , reward_id
    ) :
        pass
        """
        List<RewardCondition> objs;

        string method_name = "CachedGetRewardConditionListByOrgIdByChannelIdByRewardId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);
        sb.Append("_");
        sb.Append("channel_id".ToLower());
        sb.Append("_");
        sb.Append(channel_id);
        sb.Append("_");
        sb.Append("reward_id".ToLower());
        sb.Append("_");
        sb.Append(reward_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardCondition>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardConditionListByOrgIdByChannelIdByRewardId(
                org_id
                , channel_id
                , reward_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardConditionListByRewardId(self
        , reward_id
        ) :
            return self.act.GetRewardConditionListByRewardId(
                reward_id
            )
        
    def GetRewardConditionByRewardId(self
        , reward_id
    ) :
        for item in self.GetRewardConditionListByRewardId(
        reward_id
        ) :
            return item
        return None
    
    def CachedGetRewardConditionListByRewardId(self
        , reward_id
    ) :
        return CachedGetRewardConditionListByRewardId(
            false
            , self.CACHE_DEFAULT_HOURS
            , reward_id
        )
        
    def CachedGetRewardConditionListByRewardId(self
        , overrideCache
        , cacheHours
        , reward_id
    ) :
        pass
        """
        List<RewardCondition> objs;

        string method_name = "CachedGetRewardConditionListByRewardId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("reward_id".ToLower());
        sb.Append("_");
        sb.Append(reward_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardCondition>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardConditionListByRewardId(
                reward_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountRewardConditionType(self
    ) :         
        return self.act.CountRewardConditionType(
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardConditionTypeByUuid(self
        , uuid
    ) :         
        return self.act.CountRewardConditionTypeByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardConditionTypeByCode(self
        , code
    ) :         
        return self.act.CountRewardConditionTypeByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardConditionTypeByName(self
        , name
    ) :         
        return self.act.CountRewardConditionTypeByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardConditionTypeByType(self
        , type
    ) :         
        return self.act.CountRewardConditionTypeByType(
        type
        )
        
#------------------------------------------------------------------------------                    
    def BrowseRewardConditionTypeListByFilter(self, filter_obj) :
        return self.act.BrowseRewardConditionTypeListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetRewardConditionTypeByUuidType(self, set_type, obj) :
        return self.act.SetRewardConditionTypeByUuid(set_type, obj)
               
    def SetRewardConditionTypeByUuid(self, obj) :
        return self.act.SetRewardConditionTypeByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelRewardConditionTypeByUuid(self
        , uuid
    ) :          
        return self.act.DelRewardConditionTypeByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetRewardConditionTypeListByUuid(self
        , uuid
        ) :
            return self.act.GetRewardConditionTypeListByUuid(
                uuid
            )
        
    def GetRewardConditionTypeByUuid(self
        , uuid
    ) :
        for item in self.GetRewardConditionTypeListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetRewardConditionTypeListByUuid(self
        , uuid
    ) :
        return CachedGetRewardConditionTypeListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetRewardConditionTypeListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<RewardConditionType> objs;

        string method_name = "CachedGetRewardConditionTypeListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardConditionType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardConditionTypeListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardConditionTypeListByCode(self
        , code
        ) :
            return self.act.GetRewardConditionTypeListByCode(
                code
            )
        
    def GetRewardConditionTypeByCode(self
        , code
    ) :
        for item in self.GetRewardConditionTypeListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetRewardConditionTypeListByCode(self
        , code
    ) :
        return CachedGetRewardConditionTypeListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetRewardConditionTypeListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<RewardConditionType> objs;

        string method_name = "CachedGetRewardConditionTypeListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardConditionType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardConditionTypeListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardConditionTypeListByName(self
        , name
        ) :
            return self.act.GetRewardConditionTypeListByName(
                name
            )
        
    def GetRewardConditionTypeByName(self
        , name
    ) :
        for item in self.GetRewardConditionTypeListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetRewardConditionTypeListByName(self
        , name
    ) :
        return CachedGetRewardConditionTypeListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetRewardConditionTypeListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<RewardConditionType> objs;

        string method_name = "CachedGetRewardConditionTypeListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardConditionType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardConditionTypeListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardConditionTypeListByType(self
        , type
        ) :
            return self.act.GetRewardConditionTypeListByType(
                type
            )
        
    def GetRewardConditionTypeByType(self
        , type
    ) :
        for item in self.GetRewardConditionTypeListByType(
        type
        ) :
            return item
        return None
    
    def CachedGetRewardConditionTypeListByType(self
        , type
    ) :
        return CachedGetRewardConditionTypeListByType(
            false
            , self.CACHE_DEFAULT_HOURS
            , type
        )
        
    def CachedGetRewardConditionTypeListByType(self
        , overrideCache
        , cacheHours
        , type
    ) :
        pass
        """
        List<RewardConditionType> objs;

        string method_name = "CachedGetRewardConditionTypeListByType";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("type".ToLower());
        sb.Append("_");
        sb.Append(type);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardConditionType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardConditionTypeListByType(
                type
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountQuestion(self
    ) :         
        return self.act.CountQuestion(
        )
        
#------------------------------------------------------------------------------                    
    def CountQuestionByUuid(self
        , uuid
    ) :         
        return self.act.CountQuestionByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountQuestionByCode(self
        , code
    ) :         
        return self.act.CountQuestionByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountQuestionByName(self
        , name
    ) :         
        return self.act.CountQuestionByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountQuestionByChannelId(self
        , channel_id
    ) :         
        return self.act.CountQuestionByChannelId(
        channel_id
        )
        
#------------------------------------------------------------------------------                    
    def CountQuestionByOrgId(self
        , org_id
    ) :         
        return self.act.CountQuestionByOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountQuestionByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :         
        return self.act.CountQuestionByChannelIdByOrgId(
        channel_id
        , org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountQuestionByChannelIdByCode(self
        , channel_id
        , code
    ) :         
        return self.act.CountQuestionByChannelIdByCode(
        channel_id
        , code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseQuestionListByFilter(self, filter_obj) :
        return self.act.BrowseQuestionListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetQuestionByUuidType(self, set_type, obj) :
        return self.act.SetQuestionByUuid(set_type, obj)
               
    def SetQuestionByUuid(self, obj) :
        return self.act.SetQuestionByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetQuestionByChannelIdByCodeType(self, set_type, obj) :
        return self.act.SetQuestionByChannelIdByCode(set_type, obj)
               
    def SetQuestionByChannelIdByCode(self, obj) :
        return self.act.SetQuestionByChannelIdByCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelQuestionByUuid(self
        , uuid
    ) :          
        return self.act.DelQuestionByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelQuestionByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :          
        return self.act.DelQuestionByChannelIdByOrgId(
        channel_id
        , org_id
        )
#------------------------------------------------------------------------------                    
    def GetQuestionListByUuid(self
        , uuid
        ) :
            return self.act.GetQuestionListByUuid(
                uuid
            )
        
    def GetQuestionByUuid(self
        , uuid
    ) :
        for item in self.GetQuestionListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetQuestionListByUuid(self
        , uuid
    ) :
        return CachedGetQuestionListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetQuestionListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Question> objs;

        string method_name = "CachedGetQuestionListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Question>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetQuestionListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetQuestionListByCode(self
        , code
        ) :
            return self.act.GetQuestionListByCode(
                code
            )
        
    def GetQuestionByCode(self
        , code
    ) :
        for item in self.GetQuestionListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetQuestionListByCode(self
        , code
    ) :
        return CachedGetQuestionListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetQuestionListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<Question> objs;

        string method_name = "CachedGetQuestionListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Question>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetQuestionListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetQuestionListByName(self
        , name
        ) :
            return self.act.GetQuestionListByName(
                name
            )
        
    def GetQuestionByName(self
        , name
    ) :
        for item in self.GetQuestionListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetQuestionListByName(self
        , name
    ) :
        return CachedGetQuestionListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetQuestionListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<Question> objs;

        string method_name = "CachedGetQuestionListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Question>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetQuestionListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetQuestionListByType(self
        , type
        ) :
            return self.act.GetQuestionListByType(
                type
            )
        
    def GetQuestionByType(self
        , type
    ) :
        for item in self.GetQuestionListByType(
        type
        ) :
            return item
        return None
    
    def CachedGetQuestionListByType(self
        , type
    ) :
        return CachedGetQuestionListByType(
            false
            , self.CACHE_DEFAULT_HOURS
            , type
        )
        
    def CachedGetQuestionListByType(self
        , overrideCache
        , cacheHours
        , type
    ) :
        pass
        """
        List<Question> objs;

        string method_name = "CachedGetQuestionListByType";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("type".ToLower());
        sb.Append("_");
        sb.Append(type);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Question>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetQuestionListByType(
                type
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetQuestionListByChannelId(self
        , channel_id
        ) :
            return self.act.GetQuestionListByChannelId(
                channel_id
            )
        
    def GetQuestionByChannelId(self
        , channel_id
    ) :
        for item in self.GetQuestionListByChannelId(
        channel_id
        ) :
            return item
        return None
    
    def CachedGetQuestionListByChannelId(self
        , channel_id
    ) :
        return CachedGetQuestionListByChannelId(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
        )
        
    def CachedGetQuestionListByChannelId(self
        , overrideCache
        , cacheHours
        , channel_id
    ) :
        pass
        """
        List<Question> objs;

        string method_name = "CachedGetQuestionListByChannelId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("channel_id".ToLower());
        sb.Append("_");
        sb.Append(channel_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Question>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetQuestionListByChannelId(
                channel_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetQuestionListByOrgId(self
        , org_id
        ) :
            return self.act.GetQuestionListByOrgId(
                org_id
            )
        
    def GetQuestionByOrgId(self
        , org_id
    ) :
        for item in self.GetQuestionListByOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetQuestionListByOrgId(self
        , org_id
    ) :
        return CachedGetQuestionListByOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetQuestionListByOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<Question> objs;

        string method_name = "CachedGetQuestionListByOrgId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Question>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetQuestionListByOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetQuestionListByChannelIdByOrgId(self
        , channel_id
        , org_id
        ) :
            return self.act.GetQuestionListByChannelIdByOrgId(
                channel_id
                , org_id
            )
        
    def GetQuestionByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :
        for item in self.GetQuestionListByChannelIdByOrgId(
        channel_id
        , org_id
        ) :
            return item
        return None
    
    def CachedGetQuestionListByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :
        return CachedGetQuestionListByChannelIdByOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
            , org_id
        )
        
    def CachedGetQuestionListByChannelIdByOrgId(self
        , overrideCache
        , cacheHours
        , channel_id
        , org_id
    ) :
        pass
        """
        List<Question> objs;

        string method_name = "CachedGetQuestionListByChannelIdByOrgId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("channel_id".ToLower());
        sb.Append("_");
        sb.Append(channel_id);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Question>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetQuestionListByChannelIdByOrgId(
                channel_id
                , org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetQuestionListByChannelIdByCode(self
        , channel_id
        , code
        ) :
            return self.act.GetQuestionListByChannelIdByCode(
                channel_id
                , code
            )
        
    def GetQuestionByChannelIdByCode(self
        , channel_id
        , code
    ) :
        for item in self.GetQuestionListByChannelIdByCode(
        channel_id
        , code
        ) :
            return item
        return None
    
    def CachedGetQuestionListByChannelIdByCode(self
        , channel_id
        , code
    ) :
        return CachedGetQuestionListByChannelIdByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
            , code
        )
        
    def CachedGetQuestionListByChannelIdByCode(self
        , overrideCache
        , cacheHours
        , channel_id
        , code
    ) :
        pass
        """
        List<Question> objs;

        string method_name = "CachedGetQuestionListByChannelIdByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("channel_id".ToLower());
        sb.Append("_");
        sb.Append(channel_id);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Question>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetQuestionListByChannelIdByCode(
                channel_id
                , code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountProfileQuestion(self
    ) :         
        return self.act.CountProfileQuestion(
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileQuestionByUuid(self
        , uuid
    ) :         
        return self.act.CountProfileQuestionByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileQuestionByChannelId(self
        , channel_id
    ) :         
        return self.act.CountProfileQuestionByChannelId(
        channel_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileQuestionByOrgId(self
        , org_id
    ) :         
        return self.act.CountProfileQuestionByOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileQuestionByProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileQuestionByProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileQuestionByQuestionId(self
        , question_id
    ) :         
        return self.act.CountProfileQuestionByQuestionId(
        question_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileQuestionByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :         
        return self.act.CountProfileQuestionByChannelIdByOrgId(
        channel_id
        , org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileQuestionByChannelIdByProfileId(self
        , channel_id
        , profile_id
    ) :         
        return self.act.CountProfileQuestionByChannelIdByProfileId(
        channel_id
        , profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileQuestionByQuestionIdByProfileId(self
        , question_id
        , profile_id
    ) :         
        return self.act.CountProfileQuestionByQuestionIdByProfileId(
        question_id
        , profile_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileQuestionListByFilter(self, filter_obj) :
        return self.act.BrowseProfileQuestionListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileQuestionByUuidType(self, set_type, obj) :
        return self.act.SetProfileQuestionByUuid(set_type, obj)
               
    def SetProfileQuestionByUuid(self, obj) :
        return self.act.SetProfileQuestionByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileQuestionByChannelIdByProfileIdType(self, set_type, obj) :
        return self.act.SetProfileQuestionByChannelIdByProfileId(set_type, obj)
               
    def SetProfileQuestionByChannelIdByProfileId(self, obj) :
        return self.act.SetProfileQuestionByChannelIdByProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileQuestionByQuestionIdByProfileIdType(self, set_type, obj) :
        return self.act.SetProfileQuestionByQuestionIdByProfileId(set_type, obj)
               
    def SetProfileQuestionByQuestionIdByProfileId(self, obj) :
        return self.act.SetProfileQuestionByQuestionIdByProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileQuestionByChannelIdByQuestionIdByProfileIdType(self, set_type, obj) :
        return self.act.SetProfileQuestionByChannelIdByQuestionIdByProfileId(set_type, obj)
               
    def SetProfileQuestionByChannelIdByQuestionIdByProfileId(self, obj) :
        return self.act.SetProfileQuestionByChannelIdByQuestionIdByProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileQuestionByUuid(self
        , uuid
    ) :          
        return self.act.DelProfileQuestionByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileQuestionByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :          
        return self.act.DelProfileQuestionByChannelIdByOrgId(
        channel_id
        , org_id
        )
#------------------------------------------------------------------------------                    
    def GetProfileQuestionListByUuid(self
        , uuid
        ) :
            return self.act.GetProfileQuestionListByUuid(
                uuid
            )
        
    def GetProfileQuestionByUuid(self
        , uuid
    ) :
        for item in self.GetProfileQuestionListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileQuestionListByUuid(self
        , uuid
    ) :
        return CachedGetProfileQuestionListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileQuestionListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileQuestion> objs;

        string method_name = "CachedGetProfileQuestionListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileQuestion>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileQuestionListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileQuestionListByChannelId(self
        , channel_id
        ) :
            return self.act.GetProfileQuestionListByChannelId(
                channel_id
            )
        
    def GetProfileQuestionByChannelId(self
        , channel_id
    ) :
        for item in self.GetProfileQuestionListByChannelId(
        channel_id
        ) :
            return item
        return None
    
    def CachedGetProfileQuestionListByChannelId(self
        , channel_id
    ) :
        return CachedGetProfileQuestionListByChannelId(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
        )
        
    def CachedGetProfileQuestionListByChannelId(self
        , overrideCache
        , cacheHours
        , channel_id
    ) :
        pass
        """
        List<ProfileQuestion> objs;

        string method_name = "CachedGetProfileQuestionListByChannelId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("channel_id".ToLower());
        sb.Append("_");
        sb.Append(channel_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileQuestion>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileQuestionListByChannelId(
                channel_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileQuestionListByOrgId(self
        , org_id
        ) :
            return self.act.GetProfileQuestionListByOrgId(
                org_id
            )
        
    def GetProfileQuestionByOrgId(self
        , org_id
    ) :
        for item in self.GetProfileQuestionListByOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetProfileQuestionListByOrgId(self
        , org_id
    ) :
        return CachedGetProfileQuestionListByOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetProfileQuestionListByOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<ProfileQuestion> objs;

        string method_name = "CachedGetProfileQuestionListByOrgId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileQuestion>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileQuestionListByOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileQuestionListByProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileQuestionListByProfileId(
                profile_id
            )
        
    def GetProfileQuestionByProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileQuestionListByProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileQuestionListByProfileId(self
        , profile_id
    ) :
        return CachedGetProfileQuestionListByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileQuestionListByProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileQuestion> objs;

        string method_name = "CachedGetProfileQuestionListByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileQuestion>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileQuestionListByProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileQuestionListByQuestionId(self
        , question_id
        ) :
            return self.act.GetProfileQuestionListByQuestionId(
                question_id
            )
        
    def GetProfileQuestionByQuestionId(self
        , question_id
    ) :
        for item in self.GetProfileQuestionListByQuestionId(
        question_id
        ) :
            return item
        return None
    
    def CachedGetProfileQuestionListByQuestionId(self
        , question_id
    ) :
        return CachedGetProfileQuestionListByQuestionId(
            false
            , self.CACHE_DEFAULT_HOURS
            , question_id
        )
        
    def CachedGetProfileQuestionListByQuestionId(self
        , overrideCache
        , cacheHours
        , question_id
    ) :
        pass
        """
        List<ProfileQuestion> objs;

        string method_name = "CachedGetProfileQuestionListByQuestionId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("question_id".ToLower());
        sb.Append("_");
        sb.Append(question_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileQuestion>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileQuestionListByQuestionId(
                question_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileQuestionListByChannelIdByOrgId(self
        , channel_id
        , org_id
        ) :
            return self.act.GetProfileQuestionListByChannelIdByOrgId(
                channel_id
                , org_id
            )
        
    def GetProfileQuestionByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :
        for item in self.GetProfileQuestionListByChannelIdByOrgId(
        channel_id
        , org_id
        ) :
            return item
        return None
    
    def CachedGetProfileQuestionListByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :
        return CachedGetProfileQuestionListByChannelIdByOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
            , org_id
        )
        
    def CachedGetProfileQuestionListByChannelIdByOrgId(self
        , overrideCache
        , cacheHours
        , channel_id
        , org_id
    ) :
        pass
        """
        List<ProfileQuestion> objs;

        string method_name = "CachedGetProfileQuestionListByChannelIdByOrgId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("channel_id".ToLower());
        sb.Append("_");
        sb.Append(channel_id);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileQuestion>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileQuestionListByChannelIdByOrgId(
                channel_id
                , org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileQuestionListByChannelIdByProfileId(self
        , channel_id
        , profile_id
        ) :
            return self.act.GetProfileQuestionListByChannelIdByProfileId(
                channel_id
                , profile_id
            )
        
    def GetProfileQuestionByChannelIdByProfileId(self
        , channel_id
        , profile_id
    ) :
        for item in self.GetProfileQuestionListByChannelIdByProfileId(
        channel_id
        , profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileQuestionListByChannelIdByProfileId(self
        , channel_id
        , profile_id
    ) :
        return CachedGetProfileQuestionListByChannelIdByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
            , profile_id
        )
        
    def CachedGetProfileQuestionListByChannelIdByProfileId(self
        , overrideCache
        , cacheHours
        , channel_id
        , profile_id
    ) :
        pass
        """
        List<ProfileQuestion> objs;

        string method_name = "CachedGetProfileQuestionListByChannelIdByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("channel_id".ToLower());
        sb.Append("_");
        sb.Append(channel_id);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileQuestion>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileQuestionListByChannelIdByProfileId(
                channel_id
                , profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileQuestionListByQuestionIdByProfileId(self
        , question_id
        , profile_id
        ) :
            return self.act.GetProfileQuestionListByQuestionIdByProfileId(
                question_id
                , profile_id
            )
        
    def GetProfileQuestionByQuestionIdByProfileId(self
        , question_id
        , profile_id
    ) :
        for item in self.GetProfileQuestionListByQuestionIdByProfileId(
        question_id
        , profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileQuestionListByQuestionIdByProfileId(self
        , question_id
        , profile_id
    ) :
        return CachedGetProfileQuestionListByQuestionIdByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , question_id
            , profile_id
        )
        
    def CachedGetProfileQuestionListByQuestionIdByProfileId(self
        , overrideCache
        , cacheHours
        , question_id
        , profile_id
    ) :
        pass
        """
        List<ProfileQuestion> objs;

        string method_name = "CachedGetProfileQuestionListByQuestionIdByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("question_id".ToLower());
        sb.Append("_");
        sb.Append(question_id);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileQuestion>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileQuestionListByQuestionIdByProfileId(
                question_id
                , profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountProfileChannel(self
    ) :         
        return self.act.CountProfileChannel(
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileChannelByUuid(self
        , uuid
    ) :         
        return self.act.CountProfileChannelByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileChannelByChannelId(self
        , channel_id
    ) :         
        return self.act.CountProfileChannelByChannelId(
        channel_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileChannelByProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileChannelByProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileChannelByChannelIdByProfileId(self
        , channel_id
        , profile_id
    ) :         
        return self.act.CountProfileChannelByChannelIdByProfileId(
        channel_id
        , profile_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileChannelListByFilter(self, filter_obj) :
        return self.act.BrowseProfileChannelListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileChannelByUuidType(self, set_type, obj) :
        return self.act.SetProfileChannelByUuid(set_type, obj)
               
    def SetProfileChannelByUuid(self, obj) :
        return self.act.SetProfileChannelByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileChannelByChannelIdByProfileIdType(self, set_type, obj) :
        return self.act.SetProfileChannelByChannelIdByProfileId(set_type, obj)
               
    def SetProfileChannelByChannelIdByProfileId(self, obj) :
        return self.act.SetProfileChannelByChannelIdByProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileChannelByUuid(self
        , uuid
    ) :          
        return self.act.DelProfileChannelByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileChannelByChannelIdByProfileId(self
        , channel_id
        , profile_id
    ) :          
        return self.act.DelProfileChannelByChannelIdByProfileId(
        channel_id
        , profile_id
        )
#------------------------------------------------------------------------------                    
    def GetProfileChannelListByUuid(self
        , uuid
        ) :
            return self.act.GetProfileChannelListByUuid(
                uuid
            )
        
    def GetProfileChannelByUuid(self
        , uuid
    ) :
        for item in self.GetProfileChannelListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileChannelListByUuid(self
        , uuid
    ) :
        return CachedGetProfileChannelListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileChannelListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileChannel> objs;

        string method_name = "CachedGetProfileChannelListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileChannel>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileChannelListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileChannelListByChannelId(self
        , channel_id
        ) :
            return self.act.GetProfileChannelListByChannelId(
                channel_id
            )
        
    def GetProfileChannelByChannelId(self
        , channel_id
    ) :
        for item in self.GetProfileChannelListByChannelId(
        channel_id
        ) :
            return item
        return None
    
    def CachedGetProfileChannelListByChannelId(self
        , channel_id
    ) :
        return CachedGetProfileChannelListByChannelId(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
        )
        
    def CachedGetProfileChannelListByChannelId(self
        , overrideCache
        , cacheHours
        , channel_id
    ) :
        pass
        """
        List<ProfileChannel> objs;

        string method_name = "CachedGetProfileChannelListByChannelId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("channel_id".ToLower());
        sb.Append("_");
        sb.Append(channel_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileChannel>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileChannelListByChannelId(
                channel_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileChannelListByProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileChannelListByProfileId(
                profile_id
            )
        
    def GetProfileChannelByProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileChannelListByProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileChannelListByProfileId(self
        , profile_id
    ) :
        return CachedGetProfileChannelListByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileChannelListByProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileChannel> objs;

        string method_name = "CachedGetProfileChannelListByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileChannel>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileChannelListByProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileChannelListByChannelIdByProfileId(self
        , channel_id
        , profile_id
        ) :
            return self.act.GetProfileChannelListByChannelIdByProfileId(
                channel_id
                , profile_id
            )
        
    def GetProfileChannelByChannelIdByProfileId(self
        , channel_id
        , profile_id
    ) :
        for item in self.GetProfileChannelListByChannelIdByProfileId(
        channel_id
        , profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileChannelListByChannelIdByProfileId(self
        , channel_id
        , profile_id
    ) :
        return CachedGetProfileChannelListByChannelIdByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
            , profile_id
        )
        
    def CachedGetProfileChannelListByChannelIdByProfileId(self
        , overrideCache
        , cacheHours
        , channel_id
        , profile_id
    ) :
        pass
        """
        List<ProfileChannel> objs;

        string method_name = "CachedGetProfileChannelListByChannelIdByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("channel_id".ToLower());
        sb.Append("_");
        sb.Append(channel_id);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileChannel>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileChannelListByChannelIdByProfileId(
                channel_id
                , profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountProfileRewardPoints(self
    ) :         
        return self.act.CountProfileRewardPoints(
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileRewardPointsByUuid(self
        , uuid
    ) :         
        return self.act.CountProfileRewardPointsByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileRewardPointsByChannelId(self
        , channel_id
    ) :         
        return self.act.CountProfileRewardPointsByChannelId(
        channel_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileRewardPointsByOrgId(self
        , org_id
    ) :         
        return self.act.CountProfileRewardPointsByOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileRewardPointsByProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileRewardPointsByProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileRewardPointsByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :         
        return self.act.CountProfileRewardPointsByChannelIdByOrgId(
        channel_id
        , org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileRewardPointsByChannelIdByProfileId(self
        , channel_id
        , profile_id
    ) :         
        return self.act.CountProfileRewardPointsByChannelIdByProfileId(
        channel_id
        , profile_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileRewardPointsListByFilter(self, filter_obj) :
        return self.act.BrowseProfileRewardPointsListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileRewardPointsByUuidType(self, set_type, obj) :
        return self.act.SetProfileRewardPointsByUuid(set_type, obj)
               
    def SetProfileRewardPointsByUuid(self, obj) :
        return self.act.SetProfileRewardPointsByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileRewardPointsByUuid(self
        , uuid
    ) :          
        return self.act.DelProfileRewardPointsByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileRewardPointsByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :          
        return self.act.DelProfileRewardPointsByChannelIdByOrgId(
        channel_id
        , org_id
        )
#------------------------------------------------------------------------------                    
    def GetProfileRewardPointsListByUuid(self
        , uuid
        ) :
            return self.act.GetProfileRewardPointsListByUuid(
                uuid
            )
        
    def GetProfileRewardPointsByUuid(self
        , uuid
    ) :
        for item in self.GetProfileRewardPointsListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileRewardPointsListByUuid(self
        , uuid
    ) :
        return CachedGetProfileRewardPointsListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileRewardPointsListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileRewardPoints> objs;

        string method_name = "CachedGetProfileRewardPointsListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileRewardPoints>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileRewardPointsListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileRewardPointsListByChannelId(self
        , channel_id
        ) :
            return self.act.GetProfileRewardPointsListByChannelId(
                channel_id
            )
        
    def GetProfileRewardPointsByChannelId(self
        , channel_id
    ) :
        for item in self.GetProfileRewardPointsListByChannelId(
        channel_id
        ) :
            return item
        return None
    
    def CachedGetProfileRewardPointsListByChannelId(self
        , channel_id
    ) :
        return CachedGetProfileRewardPointsListByChannelId(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
        )
        
    def CachedGetProfileRewardPointsListByChannelId(self
        , overrideCache
        , cacheHours
        , channel_id
    ) :
        pass
        """
        List<ProfileRewardPoints> objs;

        string method_name = "CachedGetProfileRewardPointsListByChannelId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("channel_id".ToLower());
        sb.Append("_");
        sb.Append(channel_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileRewardPoints>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileRewardPointsListByChannelId(
                channel_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileRewardPointsListByOrgId(self
        , org_id
        ) :
            return self.act.GetProfileRewardPointsListByOrgId(
                org_id
            )
        
    def GetProfileRewardPointsByOrgId(self
        , org_id
    ) :
        for item in self.GetProfileRewardPointsListByOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetProfileRewardPointsListByOrgId(self
        , org_id
    ) :
        return CachedGetProfileRewardPointsListByOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetProfileRewardPointsListByOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<ProfileRewardPoints> objs;

        string method_name = "CachedGetProfileRewardPointsListByOrgId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileRewardPoints>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileRewardPointsListByOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileRewardPointsListByProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileRewardPointsListByProfileId(
                profile_id
            )
        
    def GetProfileRewardPointsByProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileRewardPointsListByProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileRewardPointsListByProfileId(self
        , profile_id
    ) :
        return CachedGetProfileRewardPointsListByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileRewardPointsListByProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileRewardPoints> objs;

        string method_name = "CachedGetProfileRewardPointsListByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileRewardPoints>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileRewardPointsListByProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileRewardPointsListByChannelIdByOrgId(self
        , channel_id
        , org_id
        ) :
            return self.act.GetProfileRewardPointsListByChannelIdByOrgId(
                channel_id
                , org_id
            )
        
    def GetProfileRewardPointsByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :
        for item in self.GetProfileRewardPointsListByChannelIdByOrgId(
        channel_id
        , org_id
        ) :
            return item
        return None
    
    def CachedGetProfileRewardPointsListByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :
        return CachedGetProfileRewardPointsListByChannelIdByOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
            , org_id
        )
        
    def CachedGetProfileRewardPointsListByChannelIdByOrgId(self
        , overrideCache
        , cacheHours
        , channel_id
        , org_id
    ) :
        pass
        """
        List<ProfileRewardPoints> objs;

        string method_name = "CachedGetProfileRewardPointsListByChannelIdByOrgId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("channel_id".ToLower());
        sb.Append("_");
        sb.Append(channel_id);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileRewardPoints>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileRewardPointsListByChannelIdByOrgId(
                channel_id
                , org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileRewardPointsListByChannelIdByProfileId(self
        , channel_id
        , profile_id
        ) :
            return self.act.GetProfileRewardPointsListByChannelIdByProfileId(
                channel_id
                , profile_id
            )
        
    def GetProfileRewardPointsByChannelIdByProfileId(self
        , channel_id
        , profile_id
    ) :
        for item in self.GetProfileRewardPointsListByChannelIdByProfileId(
        channel_id
        , profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileRewardPointsListByChannelIdByProfileId(self
        , channel_id
        , profile_id
    ) :
        return CachedGetProfileRewardPointsListByChannelIdByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
            , profile_id
        )
        
    def CachedGetProfileRewardPointsListByChannelIdByProfileId(self
        , overrideCache
        , cacheHours
        , channel_id
        , profile_id
    ) :
        pass
        """
        List<ProfileRewardPoints> objs;

        string method_name = "CachedGetProfileRewardPointsListByChannelIdByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("channel_id".ToLower());
        sb.Append("_");
        sb.Append(channel_id);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileRewardPoints>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileRewardPointsListByChannelIdByProfileId(
                channel_id
                , profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountRewardCompetitionByUuid(self
        , uuid
    ) :         
        return self.act.CountRewardCompetitionByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardCompetitionByCode(self
        , code
    ) :         
        return self.act.CountRewardCompetitionByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardCompetitionByName(self
        , name
    ) :         
        return self.act.CountRewardCompetitionByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardCompetitionByPath(self
        , path
    ) :         
        return self.act.CountRewardCompetitionByPath(
        path
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardCompetitionByChannelId(self
        , channel_id
    ) :         
        return self.act.CountRewardCompetitionByChannelId(
        channel_id
        )
        
#------------------------------------------------------------------------------                    
    def CountRewardCompetitionByChannelIdByCompleted(self
        , channel_id
        , completed
    ) :         
        return self.act.CountRewardCompetitionByChannelIdByCompleted(
        channel_id
        , completed
        )
        
#------------------------------------------------------------------------------                    
    def BrowseRewardCompetitionListByFilter(self, filter_obj) :
        return self.act.BrowseRewardCompetitionListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetRewardCompetitionByUuidType(self, set_type, obj) :
        return self.act.SetRewardCompetitionByUuid(set_type, obj)
               
    def SetRewardCompetitionByUuid(self, obj) :
        return self.act.SetRewardCompetitionByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelRewardCompetitionByUuid(self
        , uuid
    ) :          
        return self.act.DelRewardCompetitionByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelRewardCompetitionByCode(self
        , code
    ) :          
        return self.act.DelRewardCompetitionByCode(
        code
        )
#------------------------------------------------------------------------------                    
    def DelRewardCompetitionByPathByChannelId(self
        , path
        , channel_id
    ) :          
        return self.act.DelRewardCompetitionByPathByChannelId(
        path
        , channel_id
        )
#------------------------------------------------------------------------------                    
    def DelRewardCompetitionByPath(self
        , path
    ) :          
        return self.act.DelRewardCompetitionByPath(
        path
        )
#------------------------------------------------------------------------------                    
    def DelRewardCompetitionByChannelIdByPath(self
        , channel_id
        , path
    ) :          
        return self.act.DelRewardCompetitionByChannelIdByPath(
        channel_id
        , path
        )
#------------------------------------------------------------------------------                    
    def GetRewardCompetitionListByUuid(self
        , uuid
        ) :
            return self.act.GetRewardCompetitionListByUuid(
                uuid
            )
        
    def GetRewardCompetitionByUuid(self
        , uuid
    ) :
        for item in self.GetRewardCompetitionListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetRewardCompetitionListByUuid(self
        , uuid
    ) :
        return CachedGetRewardCompetitionListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetRewardCompetitionListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<RewardCompetition> objs;

        string method_name = "CachedGetRewardCompetitionListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardCompetition>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardCompetitionListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardCompetitionListByCode(self
        , code
        ) :
            return self.act.GetRewardCompetitionListByCode(
                code
            )
        
    def GetRewardCompetitionByCode(self
        , code
    ) :
        for item in self.GetRewardCompetitionListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetRewardCompetitionListByCode(self
        , code
    ) :
        return CachedGetRewardCompetitionListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetRewardCompetitionListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<RewardCompetition> objs;

        string method_name = "CachedGetRewardCompetitionListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardCompetition>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardCompetitionListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardCompetitionListByName(self
        , name
        ) :
            return self.act.GetRewardCompetitionListByName(
                name
            )
        
    def GetRewardCompetitionByName(self
        , name
    ) :
        for item in self.GetRewardCompetitionListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetRewardCompetitionListByName(self
        , name
    ) :
        return CachedGetRewardCompetitionListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetRewardCompetitionListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<RewardCompetition> objs;

        string method_name = "CachedGetRewardCompetitionListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardCompetition>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardCompetitionListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardCompetitionListByPath(self
        , path
        ) :
            return self.act.GetRewardCompetitionListByPath(
                path
            )
        
    def GetRewardCompetitionByPath(self
        , path
    ) :
        for item in self.GetRewardCompetitionListByPath(
        path
        ) :
            return item
        return None
    
    def CachedGetRewardCompetitionListByPath(self
        , path
    ) :
        return CachedGetRewardCompetitionListByPath(
            false
            , self.CACHE_DEFAULT_HOURS
            , path
        )
        
    def CachedGetRewardCompetitionListByPath(self
        , overrideCache
        , cacheHours
        , path
    ) :
        pass
        """
        List<RewardCompetition> objs;

        string method_name = "CachedGetRewardCompetitionListByPath";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("path".ToLower());
        sb.Append("_");
        sb.Append(path);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardCompetition>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardCompetitionListByPath(
                path
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardCompetitionListByChannelId(self
        , channel_id
        ) :
            return self.act.GetRewardCompetitionListByChannelId(
                channel_id
            )
        
    def GetRewardCompetitionByChannelId(self
        , channel_id
    ) :
        for item in self.GetRewardCompetitionListByChannelId(
        channel_id
        ) :
            return item
        return None
    
    def CachedGetRewardCompetitionListByChannelId(self
        , channel_id
    ) :
        return CachedGetRewardCompetitionListByChannelId(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
        )
        
    def CachedGetRewardCompetitionListByChannelId(self
        , overrideCache
        , cacheHours
        , channel_id
    ) :
        pass
        """
        List<RewardCompetition> objs;

        string method_name = "CachedGetRewardCompetitionListByChannelId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("channel_id".ToLower());
        sb.Append("_");
        sb.Append(channel_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardCompetition>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardCompetitionListByChannelId(
                channel_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardCompetitionListByChannelIdByCompleted(self
        , channel_id
        , completed
        ) :
            return self.act.GetRewardCompetitionListByChannelIdByCompleted(
                channel_id
                , completed
            )
        
    def GetRewardCompetitionByChannelIdByCompleted(self
        , channel_id
        , completed
    ) :
        for item in self.GetRewardCompetitionListByChannelIdByCompleted(
        channel_id
        , completed
        ) :
            return item
        return None
    
    def CachedGetRewardCompetitionListByChannelIdByCompleted(self
        , channel_id
        , completed
    ) :
        return CachedGetRewardCompetitionListByChannelIdByCompleted(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
            , completed
        )
        
    def CachedGetRewardCompetitionListByChannelIdByCompleted(self
        , overrideCache
        , cacheHours
        , channel_id
        , completed
    ) :
        pass
        """
        List<RewardCompetition> objs;

        string method_name = "CachedGetRewardCompetitionListByChannelIdByCompleted";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("channel_id".ToLower());
        sb.Append("_");
        sb.Append(channel_id);
        sb.Append("_");
        sb.Append("completed".ToLower());
        sb.Append("_");
        sb.Append(completed);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardCompetition>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardCompetitionListByChannelIdByCompleted(
                channel_id
                , completed
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetRewardCompetitionListByChannelIdByPath(self
        , channel_id
        , path
        ) :
            return self.act.GetRewardCompetitionListByChannelIdByPath(
                channel_id
                , path
            )
        
    def GetRewardCompetitionByChannelIdByPath(self
        , channel_id
        , path
    ) :
        for item in self.GetRewardCompetitionListByChannelIdByPath(
        channel_id
        , path
        ) :
            return item
        return None
    
    def CachedGetRewardCompetitionListByChannelIdByPath(self
        , channel_id
        , path
    ) :
        return CachedGetRewardCompetitionListByChannelIdByPath(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
            , path
        )
        
    def CachedGetRewardCompetitionListByChannelIdByPath(self
        , overrideCache
        , cacheHours
        , channel_id
        , path
    ) :
        pass
        """
        List<RewardCompetition> objs;

        string method_name = "CachedGetRewardCompetitionListByChannelIdByPath";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("channel_id".ToLower());
        sb.Append("_");
        sb.Append(channel_id);
        sb.Append("_");
        sb.Append("path".ToLower());
        sb.Append("_");
        sb.Append(path);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<RewardCompetition>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetRewardCompetitionListByChannelIdByPath(
                channel_id
                , path
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
        

