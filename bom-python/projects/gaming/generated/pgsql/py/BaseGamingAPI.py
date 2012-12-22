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
    def DelProfileGameByUuid(self
        , uuid
    ) :          
        return self.act.DelProfileGameByUuid(
        uuid
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
    def CountGameStatisticLeaderboard(self
    ) :         
        return self.act.CountGameStatisticLeaderboard(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardByUuid(self
        , uuid
    ) :         
        return self.act.CountGameStatisticLeaderboardByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardByGameId(self
        , game_id
    ) :         
        return self.act.CountGameStatisticLeaderboardByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardByCode(self
        , code
    ) :         
        return self.act.CountGameStatisticLeaderboardByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardByCodeByGameId(self
        , code
        , game_id
    ) :         
        return self.act.CountGameStatisticLeaderboardByCodeByGameId(
        code
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :         
        return self.act.CountGameStatisticLeaderboardByCodeByGameIdByProfileId(
        code
        , game_id
        , profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :         
        return self.act.CountGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameStatisticLeaderboardByProfileIdByGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameStatisticLeaderboardListByFilter(self, filter_obj) :
        return self.act.BrowseGameStatisticLeaderboardListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardByUuidType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardByUuid(set_type, obj)
               
    def SetGameStatisticLeaderboardByUuid(self, obj) :
        return self.act.SetGameStatisticLeaderboardByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestampType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp(set_type, obj)
               
    def SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp(self, obj) :
        return self.act.SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardByCodeType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardByCode(set_type, obj)
               
    def SetGameStatisticLeaderboardByCode(self, obj) :
        return self.act.SetGameStatisticLeaderboardByCode('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardByCodeByGameIdType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardByCodeByGameId(set_type, obj)
               
    def SetGameStatisticLeaderboardByCodeByGameId(self, obj) :
        return self.act.SetGameStatisticLeaderboardByCodeByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardByCodeByGameIdByProfileIdType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardByCodeByGameIdByProfileId(set_type, obj)
               
    def SetGameStatisticLeaderboardByCodeByGameIdByProfileId(self, obj) :
        return self.act.SetGameStatisticLeaderboardByCodeByGameIdByProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestampType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(set_type, obj)
               
    def SetGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(self, obj) :
        return self.act.SetGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardByUuid(self
        , uuid
    ) :          
        return self.act.DelGameStatisticLeaderboardByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardByCode(self
        , code
    ) :          
        return self.act.DelGameStatisticLeaderboardByCode(
        code
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardByCodeByGameId(self
        , code
        , game_id
    ) :          
        return self.act.DelGameStatisticLeaderboardByCodeByGameId(
        code
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :          
        return self.act.DelGameStatisticLeaderboardByCodeByGameIdByProfileId(
        code
        , game_id
        , profile_id
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :          
        return self.act.DelGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameStatisticLeaderboardByProfileIdByGameId(
        profile_id
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardList(self
        ) :
            return self.act.GetGameStatisticLeaderboardList(
            )
        
    def GetGameStatisticLeaderboard(self
    ) :
        for item in self.GetGameStatisticLeaderboardList(
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardList(self
    ) :
        return CachedGetGameStatisticLeaderboardList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameStatisticLeaderboardList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameStatisticLeaderboard> objs;

        string method_name = "CachedGetGameStatisticLeaderboardList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardListByUuid(self
        , uuid
        ) :
            return self.act.GetGameStatisticLeaderboardListByUuid(
                uuid
            )
        
    def GetGameStatisticLeaderboardByUuid(self
        , uuid
    ) :
        for item in self.GetGameStatisticLeaderboardListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardListByUuid(self
        , uuid
    ) :
        return CachedGetGameStatisticLeaderboardListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameStatisticLeaderboardListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameStatisticLeaderboard> objs;

        string method_name = "CachedGetGameStatisticLeaderboardListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardListByGameId(self
        , game_id
        ) :
            return self.act.GetGameStatisticLeaderboardListByGameId(
                game_id
            )
        
    def GetGameStatisticLeaderboardByGameId(self
        , game_id
    ) :
        for item in self.GetGameStatisticLeaderboardListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardListByGameId(self
        , game_id
    ) :
        return CachedGetGameStatisticLeaderboardListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameStatisticLeaderboardListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameStatisticLeaderboard> objs;

        string method_name = "CachedGetGameStatisticLeaderboardListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardListByCode(self
        , code
        ) :
            return self.act.GetGameStatisticLeaderboardListByCode(
                code
            )
        
    def GetGameStatisticLeaderboardByCode(self
        , code
    ) :
        for item in self.GetGameStatisticLeaderboardListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardListByCode(self
        , code
    ) :
        return CachedGetGameStatisticLeaderboardListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameStatisticLeaderboardListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameStatisticLeaderboard> objs;

        string method_name = "CachedGetGameStatisticLeaderboardListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardListByCodeByGameId(self
        , code
        , game_id
        ) :
            return self.act.GetGameStatisticLeaderboardListByCodeByGameId(
                code
                , game_id
            )
        
    def GetGameStatisticLeaderboardByCodeByGameId(self
        , code
        , game_id
    ) :
        for item in self.GetGameStatisticLeaderboardListByCodeByGameId(
        code
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardListByCodeByGameId(self
        , code
        , game_id
    ) :
        return CachedGetGameStatisticLeaderboardListByCodeByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
        )
        
    def CachedGetGameStatisticLeaderboardListByCodeByGameId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
    ) :
        pass
        """
        List<GameStatisticLeaderboard> objs;

        string method_name = "CachedGetGameStatisticLeaderboardListByCodeByGameId";

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

        objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardListByCodeByGameId(
                code
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardListByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
        ) :
            return self.act.GetGameStatisticLeaderboardListByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            )
        
    def GetGameStatisticLeaderboardByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        for item in self.GetGameStatisticLeaderboardListByCodeByGameIdByProfileId(
        code
        , game_id
        , profile_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardListByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        return CachedGetGameStatisticLeaderboardListByCodeByGameIdByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
            , profile_id
        )
        
    def CachedGetGameStatisticLeaderboardListByCodeByGameIdByProfileId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
        , profile_id
    ) :
        pass
        """
        List<GameStatisticLeaderboard> objs;

        string method_name = "CachedGetGameStatisticLeaderboardListByCodeByGameIdByProfileId";

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

        objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardListByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardListByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
        ) :
            return self.act.GetGameStatisticLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            )
        
    def GetGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        for item in self.GetGameStatisticLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardListByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        return CachedGetGameStatisticLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
            , profile_id
            , timestamp
        )
        
    def CachedGetGameStatisticLeaderboardListByCodeByGameIdByProfileIdByTimestamp(self
        , overrideCache
        , cacheHours
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        pass
        """
        List<GameStatisticLeaderboard> objs;

        string method_name = "CachedGetGameStatisticLeaderboardListByCodeByGameIdByProfileIdByTimestamp";

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

        objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
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
    def GetGameStatisticLeaderboardListByProfileIdByGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetGameStatisticLeaderboardListByProfileIdByGameId(
                profile_id
                , game_id
            )
        
    def GetGameStatisticLeaderboardByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetGameStatisticLeaderboardListByProfileIdByGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetGameStatisticLeaderboardListByProfileIdByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetGameStatisticLeaderboardListByProfileIdByGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameStatisticLeaderboard> objs;

        string method_name = "CachedGetGameStatisticLeaderboardListByProfileIdByGameId";

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

        objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardListByProfileIdByGameId(
                profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            )
        
    def GetGameStatisticLeaderboardByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
        profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameStatisticLeaderboard> objs;

        string method_name = "CachedGetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp";

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

        objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardRollup(self
    ) :         
        return self.act.CountGameStatisticLeaderboardRollup(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardRollupByUuid(self
        , uuid
    ) :         
        return self.act.CountGameStatisticLeaderboardRollupByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardRollupByGameId(self
        , game_id
    ) :         
        return self.act.CountGameStatisticLeaderboardRollupByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardRollupByCode(self
        , code
    ) :         
        return self.act.CountGameStatisticLeaderboardRollupByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardRollupByCodeByGameId(self
        , code
        , game_id
    ) :         
        return self.act.CountGameStatisticLeaderboardRollupByCodeByGameId(
        code
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :         
        return self.act.CountGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(
        code
        , game_id
        , profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :         
        return self.act.CountGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardRollupByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameStatisticLeaderboardRollupByProfileIdByGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameStatisticLeaderboardRollupListByFilter(self, filter_obj) :
        return self.act.BrowseGameStatisticLeaderboardRollupListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardRollupByUuidType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardRollupByUuid(set_type, obj)
               
    def SetGameStatisticLeaderboardRollupByUuid(self, obj) :
        return self.act.SetGameStatisticLeaderboardRollupByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardRollupByUuidByProfileIdByGameIdByTimestampType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(set_type, obj)
               
    def SetGameStatisticLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(self, obj) :
        return self.act.SetGameStatisticLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardRollupByCodeType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardRollupByCode(set_type, obj)
               
    def SetGameStatisticLeaderboardRollupByCode(self, obj) :
        return self.act.SetGameStatisticLeaderboardRollupByCode('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardRollupByCodeByGameIdType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardRollupByCodeByGameId(set_type, obj)
               
    def SetGameStatisticLeaderboardRollupByCodeByGameId(self, obj) :
        return self.act.SetGameStatisticLeaderboardRollupByCodeByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(set_type, obj)
               
    def SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(self, obj) :
        return self.act.SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestampType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(set_type, obj)
               
    def SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(self, obj) :
        return self.act.SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardRollupByUuid(self
        , uuid
    ) :          
        return self.act.DelGameStatisticLeaderboardRollupByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardRollupByCode(self
        , code
    ) :          
        return self.act.DelGameStatisticLeaderboardRollupByCode(
        code
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardRollupByCodeByGameId(self
        , code
        , game_id
    ) :          
        return self.act.DelGameStatisticLeaderboardRollupByCodeByGameId(
        code
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :          
        return self.act.DelGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(
        code
        , game_id
        , profile_id
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :          
        return self.act.DelGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardRollupByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameStatisticLeaderboardRollupByProfileIdByGameId(
        profile_id
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardRollupList(self
        ) :
            return self.act.GetGameStatisticLeaderboardRollupList(
            )
        
    def GetGameStatisticLeaderboardRollup(self
    ) :
        for item in self.GetGameStatisticLeaderboardRollupList(
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardRollupList(self
    ) :
        return CachedGetGameStatisticLeaderboardRollupList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameStatisticLeaderboardRollupList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameStatisticLeaderboardRollup> objs;

        string method_name = "CachedGetGameStatisticLeaderboardRollupList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardRollupList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardRollupListByUuid(self
        , uuid
        ) :
            return self.act.GetGameStatisticLeaderboardRollupListByUuid(
                uuid
            )
        
    def GetGameStatisticLeaderboardRollupByUuid(self
        , uuid
    ) :
        for item in self.GetGameStatisticLeaderboardRollupListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardRollupListByUuid(self
        , uuid
    ) :
        return CachedGetGameStatisticLeaderboardRollupListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameStatisticLeaderboardRollupListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameStatisticLeaderboardRollup> objs;

        string method_name = "CachedGetGameStatisticLeaderboardRollupListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardRollupListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardRollupListByGameId(self
        , game_id
        ) :
            return self.act.GetGameStatisticLeaderboardRollupListByGameId(
                game_id
            )
        
    def GetGameStatisticLeaderboardRollupByGameId(self
        , game_id
    ) :
        for item in self.GetGameStatisticLeaderboardRollupListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardRollupListByGameId(self
        , game_id
    ) :
        return CachedGetGameStatisticLeaderboardRollupListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameStatisticLeaderboardRollupListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameStatisticLeaderboardRollup> objs;

        string method_name = "CachedGetGameStatisticLeaderboardRollupListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardRollupListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardRollupListByCode(self
        , code
        ) :
            return self.act.GetGameStatisticLeaderboardRollupListByCode(
                code
            )
        
    def GetGameStatisticLeaderboardRollupByCode(self
        , code
    ) :
        for item in self.GetGameStatisticLeaderboardRollupListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardRollupListByCode(self
        , code
    ) :
        return CachedGetGameStatisticLeaderboardRollupListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameStatisticLeaderboardRollupListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameStatisticLeaderboardRollup> objs;

        string method_name = "CachedGetGameStatisticLeaderboardRollupListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardRollupListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardRollupListByCodeByGameId(self
        , code
        , game_id
        ) :
            return self.act.GetGameStatisticLeaderboardRollupListByCodeByGameId(
                code
                , game_id
            )
        
    def GetGameStatisticLeaderboardRollupByCodeByGameId(self
        , code
        , game_id
    ) :
        for item in self.GetGameStatisticLeaderboardRollupListByCodeByGameId(
        code
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardRollupListByCodeByGameId(self
        , code
        , game_id
    ) :
        return CachedGetGameStatisticLeaderboardRollupListByCodeByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
        )
        
    def CachedGetGameStatisticLeaderboardRollupListByCodeByGameId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
    ) :
        pass
        """
        List<GameStatisticLeaderboardRollup> objs;

        string method_name = "CachedGetGameStatisticLeaderboardRollupListByCodeByGameId";

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

        objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardRollupListByCodeByGameId(
                code
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
        ) :
            return self.act.GetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            )
        
    def GetGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        for item in self.GetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileId(
        code
        , game_id
        , profile_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        return CachedGetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
            , profile_id
        )
        
    def CachedGetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
        , profile_id
    ) :
        pass
        """
        List<GameStatisticLeaderboardRollup> objs;

        string method_name = "CachedGetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileId";

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

        objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
        ) :
            return self.act.GetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            )
        
    def GetGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        for item in self.GetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        return CachedGetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
            , profile_id
            , timestamp
        )
        
    def CachedGetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(self
        , overrideCache
        , cacheHours
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        pass
        """
        List<GameStatisticLeaderboardRollup> objs;

        string method_name = "CachedGetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp";

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

        objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
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
    def GetGameStatisticLeaderboardRollupListByProfileIdByGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetGameStatisticLeaderboardRollupListByProfileIdByGameId(
                profile_id
                , game_id
            )
        
    def GetGameStatisticLeaderboardRollupByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetGameStatisticLeaderboardRollupListByProfileIdByGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardRollupListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetGameStatisticLeaderboardRollupListByProfileIdByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetGameStatisticLeaderboardRollupListByProfileIdByGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameStatisticLeaderboardRollup> objs;

        string method_name = "CachedGetGameStatisticLeaderboardRollupListByProfileIdByGameId";

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

        objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardRollupListByProfileIdByGameId(
                profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            )
        
    def GetGameStatisticLeaderboardRollupByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
        profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameStatisticLeaderboardRollup> objs;

        string method_name = "CachedGetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp";

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

        objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
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
    def CountGameProfileStatisticTimestamp(self
    ) :         
        return self.act.CountGameProfileStatisticTimestamp(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticTimestampByUuid(self
        , uuid
    ) :         
        return self.act.CountGameProfileStatisticTimestampByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticTimestampByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameProfileStatisticTimestampByCodeByProfileIdByGameId(
        code
        , profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.act.CountGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(
        code
        , profile_id
        , game_id
        , timestamp
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameProfileStatisticTimestampListByFilter(self, filter_obj) :
        return self.act.BrowseGameProfileStatisticTimestampListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticTimestampByUuidType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticTimestampByUuid(set_type, obj)
               
    def SetGameProfileStatisticTimestampByUuid(self, obj) :
        return self.act.SetGameProfileStatisticTimestampByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticTimestampByCodeByProfileIdByGameIdType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticTimestampByCodeByProfileIdByGameId(set_type, obj)
               
    def SetGameProfileStatisticTimestampByCodeByProfileIdByGameId(self, obj) :
        return self.act.SetGameProfileStatisticTimestampByCodeByProfileIdByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestampType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(set_type, obj)
               
    def SetGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(self, obj) :
        return self.act.SetGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameProfileStatisticTimestampByUuid(self
        , uuid
    ) :          
        return self.act.DelGameProfileStatisticTimestampByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileStatisticTimestampByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameProfileStatisticTimestampByCodeByProfileIdByGameId(
        code
        , profile_id
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :          
        return self.act.DelGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(
        code
        , profile_id
        , game_id
        , timestamp
        )
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticTimestampListByUuid(self
        , uuid
        ) :
            return self.act.GetGameProfileStatisticTimestampListByUuid(
                uuid
            )
        
    def GetGameProfileStatisticTimestampByUuid(self
        , uuid
    ) :
        for item in self.GetGameProfileStatisticTimestampListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticTimestampListByUuid(self
        , uuid
    ) :
        return CachedGetGameProfileStatisticTimestampListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameProfileStatisticTimestampListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameProfileStatisticTimestamp> objs;

        string method_name = "CachedGetGameProfileStatisticTimestampListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameProfileStatisticTimestamp>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileStatisticTimestampListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticTimestampListByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
        ) :
            return self.act.GetGameProfileStatisticTimestampListByCodeByProfileIdByGameId(
                code
                , profile_id
                , game_id
            )
        
    def GetGameProfileStatisticTimestampByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :
        for item in self.GetGameProfileStatisticTimestampListByCodeByProfileIdByGameId(
        code
        , profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticTimestampListByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :
        return CachedGetGameProfileStatisticTimestampListByCodeByProfileIdByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , profile_id
            , game_id
        )
        
    def CachedGetGameProfileStatisticTimestampListByCodeByProfileIdByGameId(self
        , overrideCache
        , cacheHours
        , code
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameProfileStatisticTimestamp> objs;

        string method_name = "CachedGetGameProfileStatisticTimestampListByCodeByProfileIdByGameId";

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

        objs = CacheUtil.Get<List<GameProfileStatisticTimestamp>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileStatisticTimestampListByCodeByProfileIdByGameId(
                code
                , profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticTimestampListByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameProfileStatisticTimestampListByCodeByProfileIdByGameIdByTimestamp(
                code
                , profile_id
                , game_id
                , timestamp
            )
        
    def GetGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameProfileStatisticTimestampListByCodeByProfileIdByGameIdByTimestamp(
        code
        , profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticTimestampListByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameProfileStatisticTimestampListByCodeByProfileIdByGameIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameProfileStatisticTimestampListByCodeByProfileIdByGameIdByTimestamp(self
        , overrideCache
        , cacheHours
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameProfileStatisticTimestamp> objs;

        string method_name = "CachedGetGameProfileStatisticTimestampListByCodeByProfileIdByGameIdByTimestamp";

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

        objs = CacheUtil.Get<List<GameProfileStatisticTimestamp>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameProfileStatisticTimestampListByCodeByProfileIdByGameIdByTimestamp(
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
              
        

